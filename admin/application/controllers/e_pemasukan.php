<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class e_pemasukan extends MY_App {

	function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->config->set_item('mymenu', 'mn4');
			
		$this->auth->authorize();
	}
	
	public function index($notrans=""){	
		$res="";
		$this->config->set_item('mysubmenu', 'mn41');
		if ($notrans<>""){
			$this->config->set_item('mysubmenu', 'mn42');
			$res= $this->db->query("select pemasukan_rutin.*, ifnull((select item from itemoption where idcat=3 and iditem=pemasukan_rutin.iditem), '') namaitem, (select concat(kode_kost,'-',lokasi) from lokasi where id=pemasukan_rutin.idlokasi) nmlokasi from pemasukan_rutin where idtrans='$notrans'")->row();
		}
		$data["notrans"]=$notrans;
		$data["res"]=$res;
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
			
		$this->template->set('breadcrumbs','<h1>Pemasukan<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Pemasukan Lain-lain</small></h1>');
		$this->template->set('pagetitle','Form Pemasukan Lain-lain');
		$this->template->load('default','ftransaksi/fpemasukan_entri', $data);
	}

	public function editing(){	
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$this->config->set_item('mysubmenu', 'mn42');
		$this->template->set('breadcrumbs','<h1>Pemasukan<small> <i class="ace-icon fa fa-angle-double-right"></i> Edit Editing Data Pemasukan</small></h1>');
		$this->template->set('pagetitle','Form Editing Data Pemasukan ');
		$this->template->load('default','ftransaksi/fpemasukan_filter', $data);
	}

	

	public function json_data(){

		//if ($this->input->is_ajax_request()){
			$tanggal = $this->input->get('tanggal');
			$lokasi = $this->input->get('lokasi');
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str="select @nom:=@nom+1 as nomor, pemasukan_rutin.* from pemasukan_rutin where idlokasi=".$lokasi." and tglBayar like '%".$tanggal."%'";
						
			if ( $_GET['sSearch'] != "" ){				
				$str.= " and  keterangan like '%".mysql_real_escape_string( $_GET['sSearch'] )."%'  ";				
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
					'KETERANGAN'=>$row->keterangan,
					'JUMLAH'=>$row->besar,
					'ACTION'=>'<a href="'.base_url('e_pemasukan/index/'.$row->idTrans).'"><i class="fa fa-edit" title="Edit ?"></i></a>| <a href="javascript:void(0)" onclick="delThis('.$row->idTrans.', \''.$row->tglBayar.'\', \'pemasukan_rutin\')"><i class="fa fa-power-off" title="Delete"></i></a>'
	
				);
			}
			
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"str" => $strfilter,
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => $aaData
			);
			echo json_encode($output);
		//}
	}
	
	public function savePemasukan(){
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
					$insert_id="";
					if ($this->input->post('flag')=='1'){
						$this->db->query("insert into itemoption (idcat, item) values ('3','".$this->input->post('newItem')."')");	//iditem autoincrement
						$insert_id = $this->db->insert_id();
					}
					$data = array(
							'idTrans' => $this->input->post('notrans'),
							'idlokasi' => $this->input->post('cb_lokasi'),
							'tglBayar' => $this->input->post('tanggal'),
							'keterangan' => ($this->input->post('flag')=='1'?$this->input->post('newItem'):$this->input->post('keterangan')),
							'besar' => $this->input->post('jumlah'),
							'uraian' => $this->input->post('uraian'),
							'petugas' => $this->input->post('petugas'),
							'iditem' => ($this->input->post('flag')=='1'?$insert_id:$this->input->post('iditem'))	
						);			
					
					
					if($state=="add"){
						
						
						if ($this->db->insert('pemasukan_rutin',$data)) {
							$this->db->trans_commit();
							$respon->status = 'success';
						} else {
							$respon->status = 'error';
							throw new Exception("gagal simpan");
						}

					}else{
											
						if ($this->db->where('idTrans',$state)->update('pemasukan_rutin',$data)){
									$this->db->trans_commit();
									$respon->status = 'success';
						} else {
							throw new Exception("gagal simpan");
						}

						//jika update kuota, update juga cekkamar ?

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
	
	public function getItem(){
		$keyword = $this->input->post('term');
		$data['response'] = 'false';
		//get stok barang
		

		$str= "SELECT iditem, item ";
		$str.= " from itemoption where	idcat=3 and  item LIKE '%{$keyword}%'";
		$str.= "union select '0', ' Item belum Ada, Klik ini untuk Tambahkan..' ";
		
		$query = $this->db->query($str)->result();

		
		if( ! empty($query) )
		{
			$data['response'] = 'true'; //Set response
			$data['message'] = array(); //Create array
			foreach( $query as $row )
			{
				$data['message'][] = array(
					'id'=>$row->iditem,
					'label' => $row->iditem." - ".$row->item,
					'value' => $row->item,					
					''
				);
			}
		}
		echo json_encode($data);
	}
	
}
