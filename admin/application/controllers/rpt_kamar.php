<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rpt_kamar extends MY_App {

	function __construct()
	{
		parent::__construct();
		$this->config->set_item('mymenu', 'mn6');
		$this->load->model('transaksi_model');
		$this->load->helper('file');
		$this->load->library('CI_Pdf');
		$this->auth->authorize();
	}

	public function status_kamar($var=""){
		$this->config->set_item('mysubmenu', 'mn611');
		$var=($var==""?"status_0":$var);
		$this->result($var);
	}
	public function kamar_kosong($var=""){	
		$this->config->set_item('mysubmenu', 'mn612');
		$var=($var==""?"kosong_0":$var);
		$this->result($var);
		
	}

	public function result($param=null){
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();		
		
		$op=""; $title=""; $nmfile="";$display=0;$id_lokasi="";$sort_order="asc";
		if ($param!=null){	//param = status_0 = menu status, display view=0, pdf=1
			$arr=explode("_",$param);
			$op=$arr[0];
			$display=$arr[1];	
			if(isset($arr[2])) $id_lokasi=$arr[2];
			if(isset($arr[3])) $sort_order=$arr[3];
		}

		// Security Validation
		if ($id_lokasi != "" && !is_numeric($id_lokasi)) {
			$id_lokasi = "";
		}
		if ($sort_order !== 'asc' && $sort_order !== 'desc') {
			$sort_order = 'asc';
		}
		
		switch ($op){
			case "status":
				$title="Laporan Status Kamar";
				$view ="freport/fkamar_status";
				$nmfile="kamar_status";
				break;
			case "kosong":
				$title="Laporan Daftar Kamar Yang Tersedia";
				$view ="freport/fkamar_kosong";
				$nmfile="kamar_kosong";
				break;
		}
		
		$data['list_lokasi'] = array();
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['list_lokasi'] = $this->db->query("SELECT * from lokasi where isactive=1")->result();

			if ($id_lokasi != ""){
				$data['lokasi'] = $this->db->query("SELECT * from lokasi where isactive=1 and id=?", array($id_lokasi))->row();
			} else {
				if ($this->db->query("SELECT * from lokasi where isactive=1")->num_rows()<=1){
					$data['lokasi'] = $this->db->query("SELECT * from lokasi where isactive=1")->row();
				}else{
					$data['lokasi'] = $this->db->query("SELECT * from lokasi where isactive=1")->result();
				}
			}
		}else{
			$data['lokasi'] = $this->db->query("SELECT * from lokasi where isactive=1 and id=".$this->session->userdata('auth')->IDLOKASI)->row(); 
			//$data['lokasi']=$this->session->userdata('auth')->IDLOKASI;
		}

		$data['id_lokasi'] = $id_lokasi;
		$data['sort_order'] = $sort_order;
		$data['title']=$title;
		$data['display']=$display;
		$data['nmfile']=$nmfile;
		$data['op']=$op;
		
		if ($display==0){
			$this->template->set('breadcrumbs','<h1>Laporan <small> <i class="ace-icon fa fa-angle-double-right"></i> '.$title.'</small></h1>');
			$this->template->set('pagetitle',$title.' (View/Cetak)');		
			$this->template->load('default',$view ,$data);
		}else{
			$html=$header;
			$html.=$this->load->view($view , $data, true);
			$html.=$footer;
			$this->ci_pdf->pdf_create_report($html, $nmfile, 'a4', 'portrait');
		}

	}

}
