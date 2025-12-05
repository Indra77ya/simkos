<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rpt_keuangan extends MY_App {

	function __construct()
	{
		parent::__construct();
		$this->load->model('report_model');
		$this->load->model('transaksi_model');
		$this->config->set_item('mymenu', 'mn6');
		$this->load->helper('file');
		$this->load->library('CI_Pdf');
		$this->auth->authorize();
	}

	public function pemasukan(){
		$this->config->set_item('mysubmenu', 'mn64');		
		$this->filter("pemasukan","rpt_keuangan/res_pemasukan", "Laporan Pemasukan Lain-lain");
	}
	public function pengeluaran(){	
		$this->config->set_item('mysubmenu', 'mn65');		
		$this->filter("pengeluaran","rpt_keuangan/res_pengeluaran", "Laporan Pengeluaran");		
	}
	public function laba_rugi(){	
		$this->config->set_item('mysubmenu', 'mn66');		
		$this->filter("labarugi","rpt_keuangan/res_labarugi","Laporan Laba Rugi");
	}
	public function filter($jenis=null, $action=null, $title=null){	
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data['arrBulan'] = $this->arrBulan;
		$data['arrThn'] = $this->getYearArr();		
		$data["action"]=$action;
		$data["jenis"]=$jenis;
		$this->template->set('breadcrumbs','<h1>Laporan <small> <i class="ace-icon fa fa-angle-double-right"></i> '.$title.'</small></h1>');
		$this->template->set('pagetitle',$title.' (View/Cetak)');
		$this->template->load('default','freport/filter',$data);
	}

	public function res_pemasukan($var=""){
		$this->config->set_item('mysubmenu', 'mn64');		
		$var=($var==""?"pemasukan":$var);
		$this->result($var);
	}
	
	public function res_pengeluaran($var=""){
		$this->config->set_item('mysubmenu', 'mn65');		
		$var=($var==""?"pengeluaran":$var);
		$this->result($var);
	}

	public function res_labarugi($var=""){
		$this->config->set_item('mysubmenu', 'mn66');		
		$var=($var==""?"labarugi":$var);
		$this->result($var);
	}

	public function result($param=null){
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();		
		
		//base url = rpt_keuangan/res_pemasukan/pemasukan_
		$op=""; $title=""; $nmfile="";$display=0; $thn=""; $bln="";$view="";$idlokasi=0;
		if ($param != "pemasukan" && $param !="pengeluaran" && $param!="labarugi"){	//$Param dari display=0 kombinasi op_thn_bln_display
			$arr=explode("_",$param);
			$op=$arr[0];
			$thn=$arr[1];
			$bln=$arr[2];
			$idlokasi=$arr[3];
			$display=$arr[4];	
			
		}else{
			$op=$this->input->post('jenis');
			$display=$this->input->post('display');
			$thn=$this->input->post('cbTahun');
			$bln=$this->input->post('cbBulan');
			$idlokasi=$this->input->post('cb_lokasi');
			
		}
		
		switch ($op){
			case "pemasukan":				
				$title="Laporan Pemasukan Lain-lain";
				$nmfile="pemasukan";
				$view ="freport/frpt_pemasukan";
				break;
			case "pengeluaran":				
				$title="Laporan Pengeluaran";				
				$nmfile="pengeluaran";
				$view ="freport/frpt_pengeluaran";
				break;
			case "labarugi":
				$title="Laporan Laba Rugi Usaha";
				$nmfile="laba_rugi";
				$view ="freport/frpt_labarugi";
				break;
		}		
		$arrBulan =$this->arrBulan;
		$data['arrBulan'] = $arrBulan;
		$rslokasi=$this->transaksi_model->getLokasi($idlokasi);
        $title.=" [ ".$rslokasi->kode_kost." ] ".$rslokasi->lokasi." ".$arrBulan[$bln]." ".$thn;
		$data['title']=$title;
		$data['bln']=$bln;
		$data['thn']=$thn;
		$data['display']=$display;
		$data['idlokasi']=$idlokasi;
		$data['nmfile']=$nmfile."_".$thn."_".$bln;
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
