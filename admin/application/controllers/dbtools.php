<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dbtools extends MY_App {
	var $branch = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
		$this->config->set_item('mymenu', 'mn7');		
		$this->auth->authorize();
	}
	
	public function backup()
	{	
		$this->config->set_item('mysubmenu', 'mn71');
		$this->template->set('breadcrumbs','<h1>Database Tools<small> <i class="ace-icon fa fa-angle-double-right"></i> Back Up Database</small></h1>');
		$this->template->set('pagetitle','Halaman Backup Database');		
		$this->template->load('default','setting/vbackup',compact('str'));
	}
	
	
	 public  function dobackup(){
		 $this->config->set_item('mysubmenu', 'mn71');
        // Load Clas Utilitas Database
        $this->load->dbutil();
		 $nama = 'backup_sikos_'. date("Y-m-d") ;
        // nyiapin aturan untuk file backup
        $aturan = array(    
                'format'      => 'zip',            
                'filename'    =>  $nama.'.sql'
              );
 
 
        $backup =& $this->dbutil->backup($aturan);
 
        $nama_database = 'backup_sikos_'. date("Y-m-d") .'.zip';
        $simpan = 'public/backup/'.$nama_database;
 
        $this->load->helper('file');
        write_file($simpan, $backup);
 
 
        $this->load->helper('download');
        force_download($nama_database, $backup);
       
	   }

	  
	   public function restore()
	{	
		$this->config->set_item('mysubmenu', 'mn72');
		$this->template->set('breadcrumbs','<h1>Database Tools<small> <i class="ace-icon fa fa-angle-double-right"></i> Restore Database</small></h1>');
		$this->template->set('pagetitle','Halaman Restore Database');		
		$this->template->load('default','setting/vrestore',compact('str'));
	}
	 public function dorestore(){
			$nama_file = $_FILES['inputfile']['name'];			
			$config['file_name'] = $nama_file;
			$config['upload_path'] = './public/upload_restore';
			$config['allowed_types'] = 'sql';
			$config['max_size']    = '1024';
			
			$this->load->library('upload', $config);

			if (  $this->upload->do_upload('inputfile')){
				$dataUpload = $this->upload->data();
				$filenya= $dataUpload['file_name'];	
				$isi_file = file_get_contents('./public/upload_restore/' . $filenya); //PANGGIL FILE YANG TERUPLOAD
				$string_query = rtrim( $isi_file, "\n;" );
				$array_query = explode(";", $string_query);   //JALANKAN QUERY MERESTORE KEDATABASE
					foreach($array_query as $query){
							$this->db->query($query);
					}
					redirect('dbtools/restore');
			}else{
				 $error = array('error' => $this->upload->display_errors());
				 echo "GAGAL UPLOAD";
				 var_dump($error);
				 exit();


			}
		
	 }
	
}
