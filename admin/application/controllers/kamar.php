<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kamar extends MY_App {
	var $branch = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
		$this->config->set_item('mymenu', 'mn1');
		$this->config->set_item('mysubmenu', 'mn13');
		$this->auth->authorize();
	}
	
	public function index()
	{	
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi('- Semua Lokasi -');
		}else{
			//$data['lokasi'] = $this->common_model->comboLokasi();
			$data['lokasi'] =$this->common_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Master kamar</small></h1>');
		$this->template->set('pagetitle','Daftar kamar ');		
		$this->template->load('default','fmaster/vkamar',$data);
	}
	
	
	
	public function json_data(){
		//if ($this->input->is_ajax_request()){
		
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str = "select kamar.*,  (select lokasi from lokasi where id=kamar.idlokasi) NAMALOKASI from kamar where 1 ";
			
			if (!empty($_GET['lokasi'])){
				$str .= " AND idlokasi = ".$_GET['lokasi'];
			}
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				$str.= " and LABELKAMAR like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or fasilitas like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' ";
				
			}
			
			
			
			if ( isset( $_GET['iSortCol_0'] ) )
			{
				$str .= " ORDER BY ".$_GET['mDataProp_'.$_GET['iSortCol_0']]." ".$_GET['sSortDir_0'];
			}
			
			
			$strfilter = $str;
			if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
			{
				$strfilter .= " LIMIT ". mysql_real_escape_string( $_GET['iDisplayStart'] ) .", ". mysql_real_escape_string( $_GET['iDisplayLength'] );
			}
			
			$iFilteredTotal = $this->db->query($str)->num_rows();
			$iTotal = $iFilteredTotal;
			$query = $this->db->query($strfilter)->result();
			
			$aaData = array();
			foreach($query as $row){
				$stsdel=0;
				//CEK JIKA ADA PENDAFTARAN TIDAK BISA DIHAPUS
				$strCek="select count(*) cek from pendaftaran where idkamar=".$row->IDKAMAR;
				$queryCek = $this->db->query($strCek)->row();
				if ($queryCek->cek>0){
					$stsdel=1;
				}				
				
				$strCekHarian="select count(*) cek from daftar_sewa_harian where idkamar=".$row->IDKAMAR;
				$queryCekHarian = $this->db->query($strCekHarian)->row();
				if ($queryCekHarian->cek>0){
					$stsdel=1;
				}
				
				
				$strCekMingguan="select count(*) cek from daftar_sewa_mingguan where idkamar=".$row->IDKAMAR;
				$queryCekMingguan = $this->db->query($strCekMingguan)->row();
				if ($queryCekMingguan->cek>0){
					$stsdel=1;
				}				
								
				$strCekTahunan="select count(*) cek from pendaftaran_tahunan where idkamar=".$row->IDKAMAR;
				$queryCekTahunan = $this->db->query($strCekTahunan)->row();
				if ($queryCekTahunan->cek>0){
					$stsdel=1;
				}

				$aaData[] = array(
					'IDKAMAR'=>$row->IDKAMAR,
					'LOKASI'=>$row->NAMALOKASI,
					'LABELKAMAR'=>$row->LABELKAMAR,
					'KAPASITAS'=>$row->KAPASITAS,
					'LUAS'=>$row->LUAS,
					'FASILITAS'=>$row->FASILITAS,
					'TAHUNAN'=>"Rp. ".number_format($row->TARIFTAHUNAN,2,',','.'),
					'BULANAN'=>"Rp. ".number_format($row->TARIFBULANAN,2,',','.'),
					'MINGGUAN'=>"Rp. ".number_format($row->TARIFMINGGUAN,2,',','.'),
					'HARIAN'=>"Rp. ".number_format($row->TARIFHARIAN,2,',','.'),
					'ACTION'=>'<a href="javascript:void(0)" onclick="editkamar(this)" data-id="'.$row->IDKAMAR.'"><i class="fa fa-edit" title="Edit"></i></a> '.($stsdel==0?'| <a href="javascript:void(0)" onclick="delkamar('.$row->IDKAMAR.', \''.$row->LABELKAMAR.'\')"><i class="fa fa-power-off" title="Delete"></i></a>':'')


					
				);
			}
			
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => $aaData
			);
			echo json_encode($output);
		//}
	}	
	
	public function getkamar(){
		$id = $this->input->post('id');
		$str="select * from kamar where idkamar=$id";
		$query = $this->db->query($str)->row();		

		if(empty($query)){
			$respon['status'] = 'error';
			$respon['errormsg'] = 'Invalid Data';
		} else {
			$respon['status'] = 'success';
			$respon['data'] = $query;
			
		}
		echo json_encode($respon);
	}
	
	public function savekamar(){
		$isi="awal<br>";
		if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			$state=$this->input->post('state');
			$rules = array(				
						array(
						'field' => 'nama',
						'label' => 'NAMA_KAMAR',
						'rules' => 'trim|xss_clean|required'
					),
						array(
						'field' => 'kapasitas',
						'label' => 'KAPASITAS',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'bulanan',
						'label' => 'TARIF_BULANAN',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'mingguan',
						'label' => 'TARIF_MINGGUAN',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'harian',
						'label' => 'TARIF_HARIAN',
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
							'IDLOKASI' => $this->input->post('lokasi'),
							'LABELKAMAR' => $this->input->post('nama'),
							'KAPASITAS' => $this->input->post('kapasitas'),
							'LUAS' => $this->input->post('luas'),
							'FASILITAS' => $this->input->post('fasilitas'),
							'TARIFTAHUNAN' => $this->input->post('tahunan'),							
							'TARIFBULANAN' => $this->input->post('bulanan'),							
							'TARIFMINGGUAN' => $this->input->post('mingguan'),						
							'TARIFHARIAN' => $this->input->post('harian')	
						);			
					
					$id_kamar="";
					if($state=="add"){ 
						$strCek="select count(*) cek from kamar where ucase(LABELKAMAR)='".strtoupper($this->input->post('nama'))."'  and idlokasi=". $this->input->post('lokasi');
						$queryCek = $this->db->query($strCek)->row();
						
						if ($queryCek->cek<=0){
							$this->db->insert('kamar',$data);
							$id_kamar=$this->db->insert_id();
							
							$respon->status = 'success';
						} else {
							$respon->status = 'error';
							$respon->errormsg = 'Data '.strtoupper($this->input->post('nama')).' sudah ada';
							throw new Exception('Data '.strtoupper($this->input->post('nama')).' sudah ada');
						}
		
						//insert cek kamar
						$dataCekkamar = array(
							'idkamar' => $id_kamar,
							'terisi' => 0
						);
						$this->db->insert('cekkamar',$dataCekkamar);
						$this->db->trans_commit();

					}else{
											
						if ($this->db->where('IDKAMAR',$state)->update('kamar',$data)){
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

	public function hapus(){
		$id=$this->input->post('idx');
		//$sts=$this->input->post('status');
		$res = $this->master_model->hapus($id, 'kamar', 'idkamar');
		return $res;
	}
	
	public function loadRoomList(){
		
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi('- Semua Lokasi -');
		}else{
			$data['lokasi'] =$this->common_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		if ($this->input->is_ajax_request()){
			$data['jenis']=$this->input->post("jenis");
			$data['idlokasi']=$this->input->post("idlokasi");
			$this->template->load('ajax','ftransaksi/frmlistkamar', $data);
		} else {
			$data['jenis']=$this->input->post("jenis");
			$data['idlokasi']=$this->input->post("idlokasi");
			$this->template->set('pagetitle','Form Data Kamar');
			$this->template->load('default','ftransaksi/frmlistkamar', $data);
		}
	}


	public function json_data_pilih(){
		//if ($this->input->is_ajax_request()){
		
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str = "SELECT k.idkamar, labelkamar,kapasitas, COALESCE(terisi,0) terisi, luas, fasilitas, tarifharian, tarifbulanan, tariftahunan, tarifmingguan, (select lokasi from lokasi where id=k.idlokasi) namalokasi
					FROM kamar k LEFT JOIN `cekkamar` c ON c.idkamar=k.idkamar
					WHERE 1  ";
			
			if (!empty($_GET['idlokasi'])){
				$str .= " AND k.idlokasi = ".$_GET['idlokasi'];
			}
			if ( $_GET['sSearch'] != "" )
			{
				
				$str.= " and LABELKAMAR like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or fasilitas like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' ";
				
			}
			
			
			if ( isset( $_GET['iSortCol_0'] ) )
			{
				$str .= " ORDER BY ".$_GET['mDataProp_'.$_GET['iSortCol_0']]." ".$_GET['sSortDir_0'];
			}
			
			
			$strfilter = $str;
			if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
			{
				$strfilter .= " LIMIT ". mysql_real_escape_string( $_GET['iDisplayStart'] ) .", ". mysql_real_escape_string( $_GET['iDisplayLength'] );
			}
			
			$iFilteredTotal = $this->db->query($str)->num_rows();
			$iTotal = $iFilteredTotal;
			$query = $this->db->query($strfilter)->result();
			
			$aaData = array();
			foreach($query as $row){
				
				$terisi = $row->terisi ;
				$sisa_val = $row->kapasitas - $terisi;
				$sisa=($sisa_val<=0?"<B>Penuh</B>":$sisa_val);
				$fas=str_replace(array("\r", "\n","\""), '', $row->fasilitas);
				$aaData[] = array(
					'IDKAMAR'=>($sisa_val<=0?$row->idkamar: '<a href="javascript:void(0)" onclick="chooseThis(\''.$row->idkamar.'\',\''.$row->labelkamar.'\', \''.$fas.'\', \''.$row->tariftahunan.'\', \''.$row->tarifbulanan.'\', \''.$row->tarifmingguan.'\', \''.$row->tarifharian.'\')" data-id="'.$row->idkamar.'"  >'.$row->idkamar.'</a>'),
					'LABELKAMAR'=>($sisa_val<=0? $row->labelkamar :'<a href="javascript:void(0)" onclick="chooseThis(\''.$row->idkamar.'\', \''.$row->labelkamar.'\', \''.$fas.'\', \''.$row->tariftahunan.'\', \''.$row->tarifbulanan.'\', \''.$row->tarifmingguan.'\', \''.$row->tarifharian.'\')" data-id="'.$row->idkamar.'"  >'.$row->labelkamar.'</a>'),
					'LOKASI'=>$row->namalokasi,
					'KUOTA'=>$row->kapasitas,
					'TERISI'=>$terisi,
					'SISA'=>$sisa,
					'FASILITAS'=>$row->fasilitas,
					'TAHUNAN'=>"Rp.&nbsp;".number_format($row->tariftahunan,2,',','.'),
					'BULANAN'=>"Rp.&nbsp;".number_format($row->tarifbulanan,2,',','.'),
					'MINGGUAN'=>"Rp.&nbsp;".number_format($row->tarifmingguan,2,',','.'),
					'HARIAN'=>"Rp.&nbsp;".number_format($row->tarifharian,2,',','.')					
				);
			}
			
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => $aaData
			);
			echo json_encode($output);
		//}
	}



}
