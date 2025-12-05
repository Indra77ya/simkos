<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pesan extends MY_App {
	var $branch = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
		$this->config->set_item('mymenu', 'mn3');
		$this->auth->authorize();
	}
	
	public function index()
	{	
		if($this->input->post()) {	
						
			$this->db->trans_begin();
			$this->load->library('form_validation');
			
			$rules = array(				
					
					array(
						'field' => 'subjek',
						'label' => 'SUBJEK',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'pesan',
						'label' => 'PESAN',
						'rules' => 'trim|xss_clean|required'
					)
			);
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Field %s harus diisi.');
			$respon = new StdClass();

			if ($this->form_validation->run() == TRUE){
				
			$this->db->trans_begin();
			try {

			$data = array(							
							'id_anak_kost' => $this->session->userdata('auth')->IDANAKKOST,							
							'id_pendaftaran' => $this->session->userdata('auth')->IDPENDAFTARAN,
							'jenis_sewa' => $this->session->userdata('auth')->JENIS_SEWA,
							'waktu_post' => date('Y-m-d H:i:s'),							
							'subject' => $this->input->post('subjek'),						
							'isi' =>$this->input->post('pesan')
						);	
				if ($this->db->insert('pesan_kritik',$data)){
						$this->db->trans_commit();
						$respon->status = 'success';
					}else {
						throw new Exception("gagal update");
					}

			}catch (Exception $e) {
						$respon->status = 'error';
						$respon->errormsg = $e->getMessage();
						$this->db->trans_rollback();
			}
			
			}else {
				$respon->status = 'error';
				$respon->errormsg = validation_errors();
				
			}

		echo json_encode($respon);
		exit;
		}
		
		$this->template->set('breadcrumbs','<h1>Penghuni<small> <i class="ace-icon fa fa-angle-double-right"></i> Kirim Pesan/Kritik/Usulan</small></h1>');
		$this->template->set('pagetitle','Kirim Pesan/Kritik/Usulan ');	
		$this->template->load('default','fadministrasi/vpesan',compact('str'));
	}
	
		
}
