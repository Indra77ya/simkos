<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class email extends MY_App{
	var $branch = array();
	

	function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model');
		$this->config->set_item('mymenu', 'mn8');		
		$this->load->helper(array('form', 'url'));
		$this->auth->authorize();

	}
	
	public function index()
	{	//$data['jenis'] =$this->common_model->comboJenis();
		$data['arrThn'] = $this->getYearArr();	
		$this->config->set_item('mysubmenu', 'mn82');
		$this->template->set('breadcrumbs','<h1>Pesan<small> <i class="ace-icon fa fa-angle-double-right"></i> Kirim E-mail</small></h1>');
		$this->template->set('pagetitle','Kirim Email');		
		$this->template->load('default','setting/vemail',$data);
	}	
	
	public function inbox()
	{	//$data['jenis'] =$this->common_model->comboJenis();
		$data['arrThn'] = $this->getYearArr();	
		$this->config->set_item('mysubmenu', 'mn81');
		$this->template->set('breadcrumbs','<h1>Pesan<small> <i class="ace-icon fa fa-angle-double-right"></i> Pesan Masuk</small></h1>');
		$this->template->set('pagetitle','Pesan masuk dari penghuni');		
		$this->template->load('default','setting/vinbox',$data);
	}	
	
	public function json_data_pesan(){
			$jenis = $this->input->get('jenis');
			$status = $this->input->get('status');

			$nmtableBayar=""; $field="";
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
		
			$str="select pesan_kritik.*, (select nama from anak_kost where idanakkost=pesan_kritik.id_anak_kost)  nmpenghuni from pesan_kritik where jenis_sewa='".$jenis."' and id_pendaftaran in (select idpendaftaran from ".($jenis=="Tahunan"?"pendaftaran_tahunan":"pendaftaran")." where checkout=".$status.")";
				
			
						
			if ( $_GET['sSearch'] != "" )
			{
				$str.= " and  (idpendaftaran like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or subjek like '%".mysql_real_escape_string( $_GET['sSearch'] )."%') ";
				
				
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
					'ID'=>$row->id,
					'ID_PENDAFTARAN'=>$row->id_pendaftaran,
					'NAMA'=>$row->nmpenghuni,
					'SUBJEK'=>$row->subject,
					'ACTION'=>'<a href="javascript:void(0)" data-url="'.base_url('email/viewpesan/'.$row->id).'" data-id="'.$row->id.'" onclick="view(this)"><i class="fa fa-eye" title="View Detil"></i></a>'					
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
	}

	public function viewpesan($id){		
		$data['row'] = $this->db->query("select pesan_kritik.*, (select nama from anak_kost where idanakkost=pesan_kritik.id_anak_kost)  nmpenghuni from pesan_kritik where id=".$id)->row();		

		/*if (empty($data['row'])){
			flashMessage('Data Invalid','danger');
			redirect('email/inbox');
		}*/
		if ($this->input->is_ajax_request()){			
			$this->template->load('ajax','setting/vdetilpesan',$data);
		} else {
			$this->template->set('pagetitle','View Data Resign');
			$this->template->load('default','fresign/view',$data);
		}
		
	
	}
	public function sendProcess(){
		/*
		Array
(
        [file_name]     => mypic.jpg
        [file_type]     => image/jpeg
        [file_path]     => /path/to/your/upload/
        [full_path]     => /path/to/your/upload/jpg.jpg
        [raw_name]      => mypic
        [orig_name]     => mypic.jpg
        [client_name]   => mypic.jpg
        [file_ext]      => .jpg
        [file_size]     => 22.2
        [is_image]      => 1
        [image_width]   => 800
        [image_height]  => 600
        [image_type]    => jpeg
        [image_size_str] => width="800" height="200"
)
		*/
		if ($this->input->is_ajax_request()){
						
				
				
			try {

				$filenya ="";$dataUpload="";$sts_send=0;$pesan="";
				$config['upload_path'] = './assets/images/uploadMail';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|xls|xlsx|txt|doc|docx|csv';
				$config['max_size']    = '1024';
				$config['max_width']  = '1600';
				$config['max_height']  = '1200';
				$this->load->library('upload', $config);
				$respon = array();
					
					if (  $this->upload->do_upload('attachfile')){
						$dataUpload = $this->upload->data();
						$filenya= $dataUpload['full_path'];	
						//$respon["status"] = 'success';
						$respon["pathfile"]= $filenya;
						$pesan.="sukses upload";
					}else{
						 $error =  $this->upload->display_errors();					 
						//$pesan= $error;
						$pesan.="error upload";
						$respon["errormsg"]= $error;
					}

					$subject=$this->input->post('title');
					$msg=$this->input->post('content');
					$attach=$filenya;

					if ($this->input->post('opsi')=="1"){
						$emailTo=$this->input->post('email_addr');
						
						if(empty($emailTo) || $emailTo==""){
							$pesan.="<br>Empty Email Address";
						}else{
							$sts_send=$this->sendEmail($emailTo, $subject, $msg, $attach);
							if ($sts_send){
								$respon["status"] = 'success';
								$pesan.="<br>Send email succeded";
							}else{
								$respon["status"] = 'error';
								$pesan.="<br>Send email failed";
								$respon["errormsg"]="<br>Send email failed";
							}
						}

					}else{
						$rsdata=$this->db->query("select email from anak_kost  where jenis_sewa='".$this->input->post('jenis')."'")->result();

						foreach ($rsdata as $hasil){
							if(!empty($hasil->email) || $hasil->email != ""){
								$sts_send=$this->sendEmail($hasil->email, $subject, $msg, $attach);
							}
						}

						if ($sts_send){
								$respon["status"] = 'success';
						}else{
								$respon["status"] = 'error';
								$pesan.="<br>Send mass email failed";
								$respon["errormsg"]="<br>Send mass email failed";
						}

					}
					
				}catch (Exception $e) {
					$respon["status"] = 'error';
					$respon["errormsg"] = $e->getMessage();
				}
			
			
			$respon["pesan"]=$pesan;
			echo json_encode($respon);
			//echo var_dump($respon);
		}
	}
	public function getRecipient(){
		$keyword = $this->input->post('term');
		$data['response'] = 'false';
		$data['pesan'] = 'Data Pendaftar yang dicari tidak ada';
		
		$str = "SELECT *  FROM anak_kost where  `nama` LIKE '%{$keyword}%'";
		$query = $this->db->query($str)->result();
		if( ! empty($query) )
		{
			$data['response'] = 'true'; //Set response
			$data['pesan'] = ''; //Set response
			$data['message'] = array(); //Create array
			foreach( $query as $row )
			{
				$data['message'][] = array(
						'id'=>$row->IDANAKKOST,
					'label' => $row->IDANAKKOST.' - '.$row->NAMA,
					'value' => $row->IDANAKKOST.' - '.$row->NAMA,		
					'email' => $row->EMAIL,
					''
				);
			}
		}
		echo json_encode($data);
	}
	

	public function savePosting(){
		$isi="awal<br>";
		//if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			$state=$this->input->post('state');
			if ($state=='add'){
				$rules = array(				
					array(
						'field' => 'jenis',
						'label' => 'JENIS',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'title',
						'label' => 'TITLE',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'content',
						'label' => 'CONTENT',
						'rules' => 'trim|xss_clean|required'
					)
				);
			}else{
				$rules = array(				
					
					array(
						'field' => 'nama',
						'label' => 'NAMA',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'status',
						'label' => 'STATUS',
						'rules' => 'trim|xss_clean|required'
					)
				);
			}

		

			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Field %s harus diisi.');
			$respon = new StdClass();
			if ($this->form_validation->run() == TRUE){
				$isi.="masuk form valid<br>";
				$state=$this->input->post('state');
				
				$nama_file = $_FILES['userfile']['name'];			
				$config['file_name'] = $nama_file;
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['max_size']    = '1024';
				$config['max_width']  = '1600';
				$config['max_height']  = '1200';
				$this->load->library('upload', $config);
				$error='';
				$dataUpload='';
				
				$this->db->trans_begin();
				try {	

					if ($state=='add'){
					
						$data = array(
								'title' => $this->input->post('title'),
								'preview' => $this->input->post('preview'),
								'content' => $this->input->post('content'),
								'create_date' => date('Y-m-d'),							
								'create_by' => $this->session->userdata('auth')->nama,							
								'is_published' => $this->input->post('is_published'),							
								'publish_date' => $this->input->post('publish_date'),
								'category' => $this->input->post('jenis')
							);
					}else{
						$data = array(
								'title' => $this->input->post('title'),
								'preview' => $this->input->post('preview'),
								'content' => $this->input->post('content'),														
								'is_published' => $this->input->post('is_published'),							
								'publish_date' => $this->input->post('publish_date'),
								'category' => $this->input->post('jenis')
							);
					}
				
					if (  $this->upload->do_upload('userfile')){
						$dataUpload = $this->upload->data();
						$filenya= $dataUpload['file_name'];	
						$data["image"]=$filenya;
						
					}
								
					

					if($state=="add"){ 
						
						if ($this->db->insert('posts',$data)){
							$this->db->trans_commit();
							$respon->status = 'success';
						} else {
							throw new Exception("gagal simpan");
						}
					}else{
												
						if ($this->db->where('id',$state)->update('posts',$data)){
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
				$respon->status = 'success';
			} else {
				$respon->status = 'error';
				$respon->errormsg = validation_errors();
				
			}
			$respon->data=$isi;	
			//echo json_encode($respon);
			
			redirect('posting/index');
		//} 
		
	}
	
	public function delThis(){
		$id=$this->input->post('idx');
		$nmtable=$this->input->post('proses');
		$field=$this->input->post('field');
		$res = $this->common_model->delThis($id,$nmtable,$field);
		return $res;
	}

	public function editThis(){
		$id = $this->input->post('id');	//id as nik=>peg_pendidikan
		$nmtable=$this->input->post('tabel');
		$field=$this->input->post('field');
		$str="select * from ".$nmtable."  where ".$field."='".$id."'";
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
}
