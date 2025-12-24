<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengguna extends MY_App {
	var $branch = array();	

	function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model');
		$this->config->set_item('mymenu', 'mn1');
		
		$this->load->helper(array('form', 'url'));
		$this->auth->authorize('login','logout','dologin');

	}
	
	public function index()
	{	$data['lokasi'] = $this->common_model->comboLokasi();
		$this->config->set_item('mysubmenu', 'mn12');
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Daftar Pengguna Aplikasi</small></h1>');		
		$this->template->set('pagetitle','Daftar Pengguna Aplikasi');		
		$this->template->load('default','fmaster/vpengguna',$data);
		
	}
	
	public function penghuni()
	{	$data['lokasi'] = $this->common_model->comboLokasi();
		$this->config->set_item('mysubmenu', 'mn112');
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Daftar Data Login Penghuni (Tenant App)</small></h1>');		
		$this->template->set('pagetitle','Daftar Data Login Penghuni');		
		$this->template->load('default','fmaster/vlogin_penghuni',$data);
		
	}
	
	public function json_data(){
		//if ($this->input->is_ajax_request()){
		    
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str = "select pengguna.*, (select lokasi from lokasi where id=pengguna.idlokasi) NAMALOKASI from pengguna ";
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				$str .= "where `NAMA` like '%".mysql_real_escape_string( $_GET['sSearch'] )."' or `USERNAME` like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' ";
				
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
				$res=file_exists("assets/images/avatars/".$row->FOTO);
				$nmfile=base_url("assets/images/none.gif");
				if (  file_exists("assets/images/avatars/".$row->FOTO) && $row->FOTO<>""){
					$nmfile=base_url("assets/images/avatars/".$row->FOTO);
				}
				//$res=is_file(trim(base_url("assets/images/avatars/".$row->FOTO)));
				//$res=base_url("assets/images/avatars/".$row->FOTO);
				$aaData[] = array(
					'ID'=>$row->ID,
					'LOKASI'=>$row->NAMALOKASI,
					'USERNAME'=>$row->USERNAME,
					'PASSWORD'=>"***",
					'NAMA'=>$row->NAMA,					
					'ROLE'=>$row->ROLE,
					'FOTO'=>"<img src=\"".$nmfile."\" width=\"100\" height=\"80\">",					
					'ACTION'=>"<a href='javascript:void(0)' onclick='editUser(this)' data-id='".$row->ID."'><i class='fa fa-edit' title='Edit'></i></a> | <a href='javascript:void()' onclick=\"delUser(".$row->ID.",'".$row->USERNAME."')\"><i class='fa fa-trash-o' title='Delete'></i></a>"
					
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
	
	public function json_data_penghuni(){
			$jenis = $this->input->get('jenis');
			$status = $this->input->get('status');
			$statusData=($this->session->userdata('auth')->ROLE=="Superadmin"?"pusat":"cabang");

			$nmtableBayar=""; $field="";
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
		
			$str="select login_penghuni.*, (select lokasi from lokasi where id=login_penghuni.idlokasi)  nmlokasi from login_penghuni where jenis_sewa='".$jenis."' and idpendaftaran in (select idpendaftaran from ".($jenis=="Tahunan"?"pendaftaran_tahunan":"pendaftaran")." where checkout=".$status.")".($statusData=="pusat"?"":" and idlokasi=".$this->session->userdata('auth')->IDLOKASI);;
				
			
						
			if ( $_GET['sSearch'] != "" )
			{
				$str.= " and  (nama like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or username like '%".mysql_real_escape_string( $_GET['sSearch'] )."%') ";
				
				
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
				$rsnotelp=$this->db->query("select notelp, nama from anak_kost where idanakkost=(select idanakkost from ".($jenis=="Tahunan"?"pendaftaran_tahunan":"pendaftaran")." where idPendaftaran='".$row->IDPENDAFTARAN."')")->row();
				$notelp=$rsnotelp->notelp;
				$nama_penghuni=$rsnotelp->nama;
				$hp=substr($notelp, 1, strlen($notelp)-1);
				$nohp='+62'.$hp;
				$aaData[] = array(
					'ID'=>$row->ID,
					'LOKASI'=>$row->nmlokasi,
					'IDPENDAFTARAN'=>$row->IDPENDAFTARAN,
					'USERNAME'=>$row->USERNAME,
					'PASSWORD'=>"***",
					'NAMA'=>$nama_penghuni,
					'ACTION'=>'<a href="javascript:void(0)" onclick="doReset(\''.$jenis.'\', \''.$nama_penghuni.'\', \''.$row->IDPENDAFTARAN.'\','.$row->ID.')" data-id="'.$row->ID.'"><i class="fa fa-bolt  " title="Reset Password?"></i> Reset Password</a> | <a href="https://wa.me/'.$nohp.'?text=Login aplikasi penghuni : username: '.$row->USERNAME.', password: 12345" target="_blank"><img src="'.base_url('assets/images/waku.png').'" style="width:25px;height:25px">Kirim Data Login</a>'


					
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

	public function doReset(){	
		
		$jenis = $this->input->post('jenis');		
		$id = $this->input->post('id');	
		
		if ($this->db->query("update login_penghuni set password='".md5("12345")."' where id=".$id." and jenis_sewa='".$jenis."'")){			
				$this->db->trans_commit();
				$respon['status'] = 'success';
				$respon['pesan'] = 'Reset Password berhasil';
			
		}else{
			$respon['status'] = 'error';
			$respon['errormsg'] = 'Invalid Data';
			$respon['pesan'] = 'Reset Password Gagal';
		}

		echo json_encode($respon);
	}
	public function delUser(){
		$id=$this->input->post('idx');
		$res = $this->pengguna_model->deleteUser($id);
		return $res;
	}
	public function saveUser(){
		$isi="awal<br>";
		//if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			$state=$this->input->post('state');
			if ($state=='add'){
				$rules = array(				
					array(
						'field' => 'username',
						'label' => 'USERNAME',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'password',
						'label' => 'PASSWORD',
						'rules' => 'trim|xss_clean|required'
					),
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
				$config['upload_path'] = './assets/images/avatars';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['max_size']    = '1024';
				$config['max_width']  = '1600';
				$config['max_height']  = '1200';
				$this->load->library('upload', $config);
				$error='';
				$dataUpload='';
				
				$this->db->trans_begin();
				try {	
					
					$data = array(
							'IDLOKASI' => $this->input->post('lokasi'),
							'USERNAME' => $this->input->post('username'),
							'PASSWORD' => md5($this->input->post('password')),
							'NAMA' => $this->input->post('nama'),
							'ROLE' => $this->input->post('role'),							
							'ISACTIVE' => $this->input->post('status'),						
							'CREATED_BY' =>'admin',
							'CREATED_DATE' =>date('Y-m-d H:i:s'),
							'UPDATED_BY' =>'admin',
							'UPDATED_DATE' =>date('Y-m-d H:i:s')
						);
					//if ( ! $this->upload->do_upload('userfile')){
						
						
						
						//note empty ganti is_null utk 
						if ($this->input->post('password')==''  ) {
							$data = array(
								'IDLOKASI' => $this->input->post('lokasi'),
								'USERNAME' => $this->input->post('username'),							
								'NAMA' => $this->input->post('nama'),								
								'ROLE' => $this->input->post('role'),
								'ISACTIVE' => $this->input->post('status'),						
								'CREATED_BY' =>'admin',
								'CREATED_DATE' =>date('Y-m-d H:i:s'),
								'UPDATED_BY' =>'admin',
								'UPDATED_DATE' =>date('Y-m-d H:i:s')
							);	
						}
					//}else{
					if (  $this->upload->do_upload('userfile')){
						$dataUpload = $this->upload->data();
						$filenya= $dataUpload['file_name'];	
						$data = array(
							'IDLOKASI' => $this->input->post('lokasi'),
							'USERNAME' => $this->input->post('username'),
							'PASSWORD' => md5($this->input->post('password')),
							'NAMA' => $this->input->post('nama'),
							'ROLE' => $this->input->post('role'),							
							'FOTO' => $filenya,							
							'ISACTIVE' => $this->input->post('status'),						
							'CREATED_BY' =>'admin',
							'CREATED_DATE' =>date('Y-m-d H:i:s'),
							'UPDATED_BY' =>'admin',
							'UPDATED_DATE' =>date('Y-m-d H:i:s')
						);
						
						//note empty ganti is_null utk 
						if ($this->input->post('password')=='' || is_null($this->input->post('password'))) {
							$data = array(
								'IDLOKASI' => $this->input->post('lokasi'),
								'USERNAME' => $this->input->post('username'),							
								'NAMA' => $this->input->post('nama'),
								'ROLE' => $this->input->post('role'),
								'FOTO' => $filenya,
								'ISACTIVE' => $this->input->post('status'),						
								'CREATED_BY' =>'admin',
								'CREATED_DATE' =>date('Y-m-d H:i:s'),
								'UPDATED_BY' =>'admin',
								'UPDATED_DATE' =>date('Y-m-d H:i:s')
							);	
						}
					}
								
					

					if($state=="add"){ 
						
						if ($this->db->insert('pengguna',$data)){
							$this->db->trans_commit();
							$respon->status = 'success';
						} else {
							throw new Exception("gagal simpan");
						}
					}else{
												
						if ($this->db->where('ID',$state)->update('pengguna',$data)){
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
			
			redirect('pengguna/index');
		//} 
		
	}
	
	public function getUser(){
		$id = $this->input->post('id');
		$str="select * from pengguna where ID=$id";
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
	
		
	public function login(){
		if ($this->auth->is_login()){
			redirect('/');
		}		
		$this->load->view('login');
	}
	
	public function dologin(){
		$data['response']='true';
		if ($this->input->is_ajax_request()){
			$user = trim(strip_tags($this->input->post('username')));
			$password = md5(stripslashes(trim($this->input->post('password'))));
			if($this->auth->do_login($user,$password)){
				$data['response']='true';
			} else {
				$data['response']='false';
			}
			echo json_encode($data); 
			//echo json_encode(array('response'=>'true'));
		} else {
			redirect('/');
		}
	}
	
	public function logout(){
		$this->auth->logout();
		redirect('/');
	}
}
