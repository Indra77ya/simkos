<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setting extends MY_App {

	function __construct()
	{
		parent::__construct();
		$this->config->set_item('mymenu', 'mn1');		
		$this->load->helper(array('form', 'url'));
		$this->load->model('param_model');
		$this->auth->authorize();
	}
	
	
	
	public function owner(){
		$this->config->set_item('mysubmenu', 'mn11');
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Profil Pemilik Usaha</small></h1>');
		$this->template->set('pagetitle','Profil Pemilik Usaha');
		$this->template->load('default','setting/parameter');
	}
	
	public function savingParams(){
			$id = $this->input->post('id');
						
			$this->db->trans_begin();
			$respon = new StdClass();
		try {
			$nama_file = $_FILES['userfile']['name'];
			
			
			$config['file_name'] = $nama_file;
			$config['upload_path'] = './assets/images/logo';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size']    = '1024';
			$config['max_width']  = '1600';
			$config['max_height']  = '1200';
			$this->load->library('upload', $config);
			$error='';
			$dataUpload='';
			
			if ( ! $this->upload->do_upload('userfile')){
				$error = array('error' => $this->upload->display_errors());
				//throw new Exception("gagal simpan, ".var_dump($error).'#'.print_r($_FILES).'#'.print_r($_POST));
				
				$data= array(
						'nama' => strtoupper($this->input->post('txt1')),		
						'nama_pemilik' => strtoupper($this->input->post('txtpemilik')),
						'alamat' =>$this->input->post('txt2'),
						'telepon' =>$this->input->post('txt3'),
						'hp' =>$this->input->post('txt4')
				);
			}else{
				$dataUpload = $this->upload->data();
				$filenya= $dataUpload['file_name'];		
				$data= array(
						'nama' => strtoupper($this->input->post('txt1')),						
						'nama_pemilik' => strtoupper($this->input->post('txtpemilik')),						
						'alamat' =>$this->input->post('txt2'),
						'telepon' =>$this->input->post('txt3'),
						'hp' =>$this->input->post('txt4'),
						'logo' =>$filenya
						
				);
			}
			
				
					
					$this->db->where('id',$id)->update('owner',$data);				
					$this->db->trans_commit();
					$this->session->set_userdata('labelling',$this->param_model->get('1', true));
					$this->session->set_userdata('param_company',$this->param_model->get('1'));
					$this->session->set_userdata('company_dept',$this->param_model->getDept('1'));
					$this->session->set_userdata('logo',$this->param_model->getLogo('1'));
					$respon->status = 'success';
			//$respon->isi='<br>file='.$dataUpload['file_name'];
			
			//$respon->isi=$error."#".var_dump($_FILES['userfile'])."#".var_dump($this->upload->data());

		}catch (Exception $e) {
				//$respon->isi="error loh";
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
		}
				
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Profil Pemilik Usaha</small></h1>');
		$this->template->set('pagetitle','Profil Pemilik Usaha');
		$this->template->load('default','setting/parameter');

	}
	
	public function getParams(){
		$id = $this->input->post('id');
		$str="select * from owner where id=$id";
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
	public function json(){
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str = "SELECT * FROM owner";
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				$str.= " WHERE nama_kota LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' ";
				
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
				$aaData[] = array(
					'id'=>$row->id,
					'value1'=>$row->nama,
					'pemilik'=>$row->nama_pemilik,
					'value3'=>$row->telepon,
					'value2'=>"<img src=\"".base_url("assets/images/logo/".$row->logo)."\" width=\"100\" height=\"80\">",										
					'ACTION'=>'<a href="javascript:void(0)"	onclick="editParams(this)" data-id="'.$row->id.'" ><i class="fa fa-edit" title="Edit Detail"></i></a> '
				);
			}
			
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => $aaData
			);
			echo json_encode($output);
	}

	public function receipt_var(){
		$this->config->set_item('mysubmenu', 'mn18');
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Setting variabel kuitansi</small></h1>');
		$this->template->set('pagetitle','Setting variabel kuitansi');
		$this->template->load('default','setting/frmreceipt_var');
	}

	public function savingVar(){
			$id = $this->input->post('id');
						
			$this->db->trans_begin();
			$respon = new StdClass();
		try {
			
			$error='';
				$data= array(
						'nama_kota' => strtoupper($this->input->post('txt1')),						
						'notes' =>$this->input->post('txt2')					
				);
					
				$this->db->where('id',$id)->update('kuitansi_var',$data);				
				$this->db->trans_commit();					
				$respon->status = 'success';
			

		}catch (Exception $e) {
				//$respon->isi="error loh";
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
		}
				
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Setting variabel kuitansi</small></h1>');
		$this->template->set('pagetitle','Setting variabel kuitansi');
		$this->template->load('default','setting/frmreceipt_var');

	}
	
	public function getVars(){
		$id = $this->input->post('id');
		$str="select * from kuitansi_var where id=$id";
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
	public function json_var(){
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str = "SELECT * FROM kuitansi_var";
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				$str.= " WHERE nama_kota LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or notes LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' ";
				
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
				$aaData[] = array(
					'id'=>$row->id,
					'notes'=>$row->notes,														
					'ACTION'=>'<a href="javascript:void(0)"	onclick="editVars(this)" data-id="'.$row->id.'" ><i class="fa fa-edit" title="Edit Detail"></i></a> '
				);
			}
			
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => $aaData
			);
			echo json_encode($output);
	}



	public function kwh_listrik(){
		$this->config->set_item('mysubmenu', 'mn19');
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Setting Data Kwh Listrik PLN</small></h1>');
		$this->template->set('pagetitle','Setting Data Kwh Listrik PLN');
		$this->template->load('default','setting/frmkwh_var');
	}

	public function savingKwh_Vars(){
			$id = $this->input->post('id');
						
			$this->db->trans_begin();
			$respon = new StdClass();
		try {
			
			$error='';
				$data= array(
						'kwh_tdk_kena_tarif' => strtoupper($this->input->post('txt1')),						
						'kwh_tarif' =>$this->input->post('txt2')					
				);
					
				$this->db->where('id',$id)->update('kwh_var',$data);				
				$this->db->trans_commit();					
				$respon->status = 'success';
			

		}catch (Exception $e) {
				//$respon->isi="error loh";
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
		}
				
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Setting Data Kwh Listrik PLN</small></h1>');
		$this->template->set('pagetitle','Setting Data Kwh Listrik PLN');
		$this->template->load('default','setting/frmkwh_var');

	}
	
	public function getKwh_vars(){
		$id = $this->input->post('id');
		$str="select * from kwh_var where id=$id";
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
	public function jsonKwh_var(){
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str = "SELECT * FROM kwh_var";
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				$str.= " WHERE kwh_tdk_kena_tarif LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or kwh_tarif LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%'";
				
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
				$aaData[] = array(
					'id'=>$row->id,
					'kwh_tdk_kena_tarif'=>$row->kwh_tdk_kena_tarif,
					'kwh_tarif'=>"Rp. ".number_format($row->kwh_tarif,2,',','.'),														
					'ACTION'=>'<a href="javascript:void(0)"	onclick="editVars(this)" data-id="'.$row->id.'" ><i class="fa fa-edit" title="Edit Detail"></i></a> '
				);
			}
			
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => $aaData
			);
			echo json_encode($output);
	}

	
}
