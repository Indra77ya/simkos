<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class e_pengeluaran extends MY_App {

	function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->config->set_item('mymenu', 'mn5');
		$this->load->model('master_model');		
		$this->auth->authorize();
	}

	public function insidentil($notrans=""){	
		$res="";
		$this->config->set_item('mysubmenu', 'mn52');	
		if ($notrans<>""){
			$this->config->set_item('mysubmenu', 'mn53');	
			//$res= $this->db->query("select * from pengeluaran_ins where idtrans='$notrans'")->row();
			$res= $this->db->query("select pengeluaran_ins.*, (select concat(kode_kost,'-',lokasi) from lokasi where id=pengeluaran_ins.idlokasi) nmlokasi from pengeluaran_ins where idtrans='$notrans'")->row();
		}
		$data["notrans"]=$notrans;
		$data["res"]=$res;
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		
		$this->template->set('breadcrumbs','<h1>Pengeluaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Pengeluaran Insidentil</small></h1>');
		$this->template->set('pagetitle','Form Pengeluaran Insidentil');
		$this->template->load('default','ftransaksi/fpengeluaran_insidentil', $data);
	}

	public function rutin($notrans=""){	
		$res="";
		if ($notrans<>""){
			$res= $this->db->query("select pengeluaran_rutin.*, (select concat(kode_kost,'-',lokasi) from lokasi where id=pengeluaran_rutin.idlokasi) nmlokasi from pengeluaran_rutin where idtrans='$notrans'")->row();
		}
		$data["notrans"]=$notrans;
		$data["res"]=$res;
		$data['jenis_rutin'] = $this->transaksi_model->comboGetJenisRutin();
		$data["arrIntBln"]=$this->arrIntBln;		
		$data["arrBulan"]=$this->arrBulan;	
		$data["arrThn"]=$this->getYearArr();
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$this->config->set_item('mysubmenu', 'mn51');	
		$this->template->set('breadcrumbs','<h1>Pengeluaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Pengeluaran Rutin</small></h1>');
		$this->template->set('pagetitle','Form Pengeluaran Rutin');
		$this->template->load('default','ftransaksi/fpengeluaran_rutin', $data);
	}
	
	public function editing(){	
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$this->config->set_item('mysubmenu', 'mn53');
		$this->template->set('breadcrumbs','<h1>Pengeluaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Edit Editing Data Pengeluaran</small></h1>');
		$this->template->set('pagetitle','Form Editing Data Pengeluaran ');
		$this->template->load('default','ftransaksi/fpengeluaran_filter', $data);
	}

	

	public function json_data(){

		//if ($this->input->is_ajax_request()){
			$jenis = $this->input->get('jenis');
			$tanggal = $this->input->get('tanggal');
			$lokasi = $this->input->get('lokasi');

			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			$str="";
			if ($jenis=="Rutin") {
				$str="select @nom:=@nom+1 as nomor, pengeluaran_rutin.*, (select item from itemoption where idcat=2 and iditem=pengeluaran_rutin.idItemBayar) keterangan from pengeluaran_rutin where idlokasi=".$lokasi." and tglBayar like '%".$tanggal."%'";
			}else{
				$str="select @nom:=@nom+1 as nomor, pengeluaran_ins.* from pengeluaran_ins where idlokasi=".$lokasi." and tglBayar like '%".$tanggal."%'";
			}


			if ( $_GET['sSearch'] != "" ){	
				if ($jenis=="Rutin") {
					$str.= " and  tanggal like '%".mysql_real_escape_string( $_GET['sSearch'] )."%'  ";	
				}else{
					$str.= " and  keterangan like '%".mysql_real_escape_string( $_GET['sSearch'] )."%'  ";				
				}
			}
						
			if ( isset( $_GET['iSortCol_1'] ) )
			{
				$str .= " ORDER BY ".$_GET['mDataProp_'.$_GET['iSortCol_1']]." ".$_GET['sSortDir_1'];
			}
						
			$strfilter = $str;
			if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
			{
				$strfilter .= " LIMIT ". mysql_real_escape_string( $_GET['iDisplayStart'] ) .", ". mysql_real_escape_string( $_GET['iDisplayLength'] );
			}
			
			$iFilteredTotal = $this->db->query($str)->num_rows();
			$iTotal = $iFilteredTotal;
			$this->db->query("set @nom=0;");
			$query = $this->db->query($strfilter)->result();
			
			$aaData = array();
			foreach($query as $row){
				
					$aaData[] = array(					
						'NO'=>$row->nomor,
						'NOTRANS'=>$row->idTrans,
						'TANGGAL'=>$row->tglBayar,
						'URAIAN'=>$row->keterangan,
						'JUMLAH'=>$row->besar,
						'ACTION'=>($jenis=="Rutin"?'<a href="'.base_url('e_pengeluaran/rutin/'.$row->idTrans).'"><i class="fa fa-edit" title="Edit ?"></i></a>':'<a href="'.base_url('e_pengeluaran/insidentil/'.$row->idTrans).'"><i class="fa fa-edit" title="Edit ?"></i></a>').($jenis=="Rutin"?'| <a href="javascript:void(0)" onclick="delThis('.$row->idTrans.', \''.$row->tglBayar.'\', \'pengeluaran_rutin\')"><i class="fa fa-power-off" title="Delete"></i></a>':'| <a href="javascript:void(0)" onclick="delThis('.$row->idTrans.', \''.$row->tglBayar.'\', \'pengeluaran_ins\')"><i class="fa fa-power-off" title="Delete"></i></a>')
		
					);
				
			}
			
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"jenis" => $jenis,
				"str" => $strfilter,
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => $aaData
			);
			echo json_encode($output);
		//}
	}
	public function hapus(){
		$id=$this->input->post('idx');
		$tbl=$this->input->post('tbl');
		$res = $this->master_model->hapus($id, $tbl, 'idtrans');
		return $res;
	}
	public function savePengeluaran_ins(){
		$isi="awal<br>";
		if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			$state=$this->input->post('state');
			$rules = array(				
						array(
						'field' => 'keterangan',
						'label' => 'URAIAN',
						'rules' => 'trim|xss_clean|required'
					),
						array(
						'field' => 'jumlah',
						'label' => 'JUMLAH',
						'rules' => 'trim|xss_clean|required'
					)
			);
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Field %s harus diisi.');
			$this->form_validation->set_message('numeric', 'Field %s harus diisi angka.');
			$respon = new StdClass();
			if ($this->form_validation->run() == TRUE){
				
				$this->db->trans_begin();
				try {						
					
					$data = array(
							'idTrans' => $this->input->post('notrans'),
							'idlokasi' => $this->input->post('cb_lokasi'),
							'tglBayar' => $this->input->post('tanggal'),
							'keterangan' => $this->input->post('keterangan'),
							'besar' => $this->input->post('jumlah'),
							'petugas' => $this->input->post('petugas')	
						);			
					
					
					if($state=="add"){
						
						
						if ($this->db->insert('pengeluaran_ins',$data)) {
							$this->db->trans_commit();
							$respon->status = 'success';
						} else {
							$respon->status = 'error';
							throw new Exception("gagal simpan");
						}

					}else{
											
						if ($this->db->where('idTrans',$state)->update('pengeluaran_ins',$data)){
									$this->db->trans_commit();
									$respon->status = 'success';
						} else {
							throw new Exception("gagal simpan");
						}

						
					}


					$isi.="Proses query<br>";
					
				} catch (Exception $e) {
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
				}
				
			} else {
				$respon->status = 'error';
				$respon->errormsg = validation_errors();
				
			}
			$respon->data=$isi;	
			echo json_encode($respon);
			//exit;
		
		} 
	}
	
	public function savePengeluaran_rutin(){
		$isi="awal<br>";
		if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			$state=$this->input->post('state');
			$rules = array(				
					
						array(
						'field' => 'jumlah',
						'label' => 'JUMLAH',
						'rules' => 'trim|xss_clean|required'
					)
			);
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Field %s harus diisi.');
			$this->form_validation->set_message('numeric', 'Field %s harus diisi angka.');
			$respon = new StdClass();
			if ($this->form_validation->run() == TRUE){
				
				$this->db->trans_begin();
				try {						
					
					$data = array(
							'idTrans' => $this->input->post('notrans'),
							'idlokasi' => $this->input->post('cb_lokasi'),
							'tglBayar' => $this->input->post('tanggal'),
							'idItemBayar' => $this->input->post('jenis_rutin'),
							'bulan' => $this->input->post('cbBulan'),
							'tahun' => $this->input->post('cbTahun'),
							'besar' => $this->input->post('jumlah'),
							'petugas' => $this->input->post('petugas')	
						);			
					
					
					if($state=="add"){
						
						
						if ($this->db->insert('pengeluaran_rutin',$data)) {
							$this->db->trans_commit();
							$respon->status = 'success';
						} else {
							$respon->status = 'error';
							throw new Exception("gagal simpan");
						}

					}else{
											
						if ($this->db->where('idTrans',$state)->update('pengeluaran_rutin',$data)){
									$this->db->trans_commit();
									$respon->status = 'success';
						} else {
							throw new Exception("gagal simpan");
						}

						
					}


					$isi.="Proses query<br>";
					
				} catch (Exception $e) {
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
				}
				
			} else {
				$respon->status = 'error';
				$respon->errormsg = validation_errors();
				
			}
			$respon->data=$isi;	
			echo json_encode($respon);
			//exit;
		
		} 
	}
}
