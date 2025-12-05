<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class denda extends MY_App {
	var $branch = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
		$this->config->set_item('mymenu', 'mn1');
		$this->config->set_item('mysubmenu', 'mn15');
		$this->auth->authorize();
	}
	
	public function index()
	{	
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Master Denda</small></h1>');
		$this->template->set('pagetitle','Data ');	
		$strCek="select * from denda where id=1";
		$queryCek = $this->db->query($strCek)->row();
		$data['nom']=$queryCek->nominal;
		$data['hari_ke']=$queryCek->hari_ke;
		$this->template->load('default','fmaster/vdenda',$data);
	}
	
	
	
	
	
	public function savedenda(){
		$isi="awal<br>";
		if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			$state=$this->input->post('state');
			$rules = array(				
						array(
						'field' => 'nominal',
						'label' => 'NOMINAL',
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
							'nominal' => $this->input->post('nominal'),	
							'hari_ke' => $this->input->post('hari_ke')	
						);	
											
						if ($this->db->where('id',$state)->update('denda',$data)){
									$this->db->trans_commit();
									$respon->status = 'success';
									$isi.="masuk commit<br>";
						} else {
							throw new Exception("gagal simpan");
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
		$res = $this->master_model->hapus($id, 'bank', 'id');
		return $res;
	}
	
}
