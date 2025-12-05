<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rpt_pendaftaran extends MY_App {

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

	public function laporan(){
		$this->config->set_item('mysubmenu', 'mn621');
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data['arrBulan'] = $this->arrBulan;
		$data['arrThn'] = $this->getYearArr();		
		$data['jenis'] = "daftarrekap";		
		$title="Laporan Rekap Pendaftaran Per Bulan";
		$data["action"]="rpt_pendaftaran/result_rekap";		
		$this->template->set('breadcrumbs','<h1>Laporan <small> <i class="ace-icon fa fa-angle-double-right"></i> '.$title.'</small></h1>');
		$this->template->set('pagetitle',$title.' (View/Cetak)');
		$this->template->load('default','freport/filter',$data);
	}
	
	public function result_rekap($param=null){
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();		
		$this->config->set_item('mysubmenu', 'mn621');

		$op=""; $title=""; $nmfile="";$display=0; $thn=""; $bln="";$view="";$orderby="";$lokasi=0;
		if ($param != null){	//$Param dari display=0 kombinasi op_thn_bln_display
			$arr=explode("_",$param);
			$jenis=$arr[0];
			$thn=$arr[1];
			$bln=$arr[2];
			$lokasi=$arr[3];	
			$display=$arr[4];	
			$orderby=$arr[5];	
			
		}else{
			$jenis=$this->input->post('jenis_sewa');
			$display=$this->input->post('display');
			$thn=$this->input->post('cbTahun');
			$bln=$this->input->post('cbBulan');
			$lokasi=$this->input->post('cb_lokasi');
			$orderby=$this->input->post('orderby');
			
		}

		
		
		$lama="";$str="";
		switch ($jenis){
			case "Tahunan":
				$str="select a.nama,a.noidentitas,a.foto, a.alamat_asal,a.notelp Telp, k.labelkamar, p.tgldaftar tglMulai, p.kwh_awal, p.checkout, p.deposit, p.idPendaftaran from pendaftaran_tahunan p, anak_kost a, kamar k where  p.idlokasi=".$lokasi." and  p.idanakkost=a.idanakkost and k.idkamar=p.idkamar and tgldaftar like '".$thn."-".$bln."%'";
				break;
			case "Bulanan":
				$str="select a.nama,a.noidentitas, a.foto,a.alamat_asal,a.notelp Telp, k.labelkamar, p.tglMulai, p.kwh_awal, p.checkout, p.deposit, p.idPendaftaran from pendaftaran p, anak_kost a, kamar k where  p.idlokasi=".$lokasi." and  p.idanakkost=a.idanakkost and k.idkamar=p.idkamar and tglmulai like '".$thn."-".$bln."%'";
				break;
			case "Mingguan":	
				$str="select d.*, k.labelkamar from daftar_sewa_mingguan d, kamar k where  d.idlokasi=".$lokasi." and   d.idkamar=k.idkamar and tglmulai like '".$thn."-".$bln."%'";
				$lama="PEKAN";
				break;
			case "Harian":
				$str="select d.*, k.labelkamar from daftar_sewa_harian d, kamar k where  d.idlokasi=".$lokasi." and   d.idkamar=k.idkamar and tglCek_in like '".$thn."-".$bln."%'";
				$lama="HARI";
				break;
		}	
		$str.=" order by ".$orderby." ASC";
		$arrBulan= $this->arrBulan;
		$title="Laporan Rekap Pendaftaran $jenis Per Bulan ".$arrBulan[$bln]." ".$thn;
		$data['arrBulan'] = $arrBulan;
		$data['title']=$title;
		$data['bln']=$bln;
		$data['thn']=$thn;
		$data['lokasi']=$lokasi;
		$data['reslokasi']=$this->transaksi_model->getLokasi($lokasi);
		$data['display']=$display;
		$data['orderby']=$orderby;
		$nmfile="Laporan_Pendaftaran_".$jenis."_".$thn."_".$bln;
		$data['nmfile']=$nmfile;		
		$data['res']=$this->db->query($str)->result();
		$view="freport/frpt_rekapdaftar";
		
		$data['jenis']=$jenis;
		$data['lama']=$lama;
		
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

	public function status(){
		$this->config->set_item('mysubmenu', 'mn622');
		//$data['arrBulan'] = $this->arrBulan;
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data['arrThn'] = $this->getYearArr();		
		$data['jenis'] = "statuspenghuni";		
		$title="Laporan Status Penghuni ";
		$data["action"]="rpt_pendaftaran/result_status";		
		$this->template->set('breadcrumbs','<h1>Laporan <small> <i class="ace-icon fa fa-angle-double-right"></i> '.$title.'</small></h1>');
		$this->template->set('pagetitle',$title.' (View/Cetak)');
		$this->template->load('default','freport/filter',$data);
	}
	
	public function result_status($param=null){
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();		
		$this->config->set_item('mysubmenu', 'mn622');

		$title=""; $nmfile="";$display=0; $thn=""; $bln="";$view="";$orderby="";$lokasi=0;
		if ($param != null){	//$Param dari display=0 kombinasi op_thn_bln_display
			$arr=explode("_",$param);
			$jenis=$arr[0];
			$thn=$arr[1];
			$status_penghuni=$arr[2];
			$lokasi=$arr[3];	
			$display=$arr[4];	
			$orderby=$arr[5];	
			
		}else{
			$jenis=$this->input->post('jenis_sewa');			
			$thn=$this->input->post('cbTahun');
			$status_penghuni=$this->input->post('status_penghuni');
			$lokasi=$this->input->post('cb_lokasi');
			$display=$this->input->post('display');			
			$orderby=$this->input->post('orderby');
		}
		
		$lama="";$str="";
		switch ($jenis){
			case "Tahunan":
				$str="select a.nama,a.noidentitas,a.foto, a.alamat_asal,a.notelp Telp, k.labelkamar, p.tgldaftar tglMulai, p.kwh_awal, p.checkout, p.deposit, p.idPendaftaran from pendaftaran_tahunan p, anak_kost a, kamar k where p.idlokasi=".$lokasi." and   p.idanakkost=a.idanakkost and k.idkamar=p.idkamar and tgldaftar like '".$thn."%' ".($status_penghuni=="0"?"": ($status_penghuni=="Check In"? " and checkout=0 ":" and checkout=1 ") );
				break;
			case "Bulanan":
				$str="select a.nama,a.noidentitas, a.foto,a.alamat_asal,a.notelp Telp, k.labelkamar, p.tglMulai, p.kwh_awal, p.checkout, p.deposit, p.idPendaftaran from pendaftaran p, anak_kost a, kamar k where p.idlokasi=".$lokasi." and   p.idanakkost=a.idanakkost and k.idkamar=p.idkamar and tglmulai like '".$thn."%' ".($status_penghuni=="0"?"": ($status_penghuni=="Check In"? " and checkout=0 ":" and checkout=1 ") );
				break;
			case "Mingguan":	
				$str="select d.*, k.labelkamar from daftar_sewa_mingguan d, kamar k where  d.idlokasi=".$lokasi." and  d.idkamar=k.idkamar and tglmulai like '".$thn."%'".($status_penghuni=="0"?"": ($status_penghuni=="Check In"? " and checkout=0 ":" and checkout=1 ") );
				$lama="PEKAN";
				break;
			case "Harian":
				$str="select d.*, k.labelkamar from daftar_sewa_harian d, kamar k where  d.idlokasi=".$lokasi." and  d.idkamar=k.idkamar and tglCek_in like '".$thn."%'".($status_penghuni=="0"?"": ($status_penghuni=="Check In"? " and checkout=0 ":" and checkout=1 ") );
				$lama="HARI";
				break;
		}
		
		$str.=" order by ".$orderby." ASC";
		$title="Laporan Status Penghuni per Tahun ".$thn;
		
		$data['title']=$title;
		$data['status_penghuni']=$status_penghuni;
		$data['thn']=$thn;
		$data['lokasi']=$lokasi;
		$data['reslokasi']=$this->transaksi_model->getLokasi($lokasi);
		$data['display']=$display;
		$data['orderby']=$orderby;
		$nmfile="Laporan_status_".$thn;
		$data['nmfile']=$nmfile;
		$view="freport/frpt_statuspenghuni";
		$data['res']=$this->db->query($str)->result();
		
		$data['jenis']=$jenis;
		$data['lama']=$lama;
		
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


	public function cetak(){
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data["proses"]="entri";
		$this->config->set_item('mysubmenu', 'mn623');	
		$this->template->set('breadcrumbs','<h1>Cetak<small> <i class="ace-icon fa fa-angle-double-right"></i> Cetak Data Pendaftaran</small></h1>');
		$this->template->set('pagetitle','Cetak Data Pendaftaran ');
		$this->template->load('default','freport/fjsoncetak', $data);
	}
	
	public function jsoncetak(){
		//if ($this->input->is_ajax_request()){
			$jenis = $this->input->get('jenis');
			$lokasi = $this->input->get('lokasi');
			$nmtableBayar=""; $controller="";
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			$denda=0;
			$this->config->set_item('mysubmenu', 'mn623');
			switch ($jenis){
				case "Tahunan":
					$str="select p.idpendaftaran, a.nama, a.alamat_asal, a.notelp as nomer_telepon, p.tgldaftar as tgl1, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar from pendaftaran_tahunan p, anak_kost a  where p.idlokasi=".$lokasi." and  p.idAnakKost=a.idAnakkost and checkout=0 ";
					$nmtableBayar="bayar_tahunan";					

					break;
				case "Bulanan":
					$str="select p.idpendaftaran, a.nama, a.alamat_asal, a.notelp as nomer_telepon, p.tgldaftar as tgl1, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar from pendaftaran p, anak_kost a  where p.idlokasi=".$lokasi." and  p.idAnakKost=a.idAnakkost and checkout=0 ";
					$nmtableBayar="bayar_bulanan";					

					break;
				case "Mingguan":
					$str="Select idpendaftaran, nama, alamat_asal, telp as nomer_telepon, tglmulai as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_mingguan.idkamar) nmkamar from daftar_sewa_mingguan where  idlokasi=".$lokasi." and checkout=0";
					$nmtableBayar="bayar_mingguan_master";
					
					break;
				case "Harian":
					$str="Select idpendaftaran, nama, alamat_asal, telp as nomer_telepon, tglcek_in as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_harian.idkamar) nmkamar from daftar_sewa_harian where   idlokasi=".$lokasi." and  checkout=0";
					$nmtableBayar="bayar_harian_master";
					
					break;
			}
			
			
						
			if ( $_GET['sSearch'] != "" )
			{
				if ($jenis=="Bulanan"){
					$str.= " and  (a.nama like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or a.alamat_asal like '%".mysql_real_escape_string( $_GET['sSearch'] )."%') ";
				}else{
					$str.= " and  (nama like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or alamat_asal like '%".mysql_real_escape_string( $_GET['sSearch'] )."%') ";
				}
				
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
					'nmkamar'=>$row->nmkamar,
					'NAMA'=>'<a href="'.base_url('rpt_pendaftaran/view_data/'.$jenis.'_0_'.$row->idpendaftaran.'_'.$lokasi).'">'.$row->nama.'</a> ',
					'idpendaftaran'=> '<a href="'.base_url('rpt_pendaftaran/view_data/'.$jenis.'_0_'.$row->idpendaftaran.'_'.$lokasi).'">'.$row->idpendaftaran.'</a> ',
					'ALAMAT'=>$row->alamat_asal,
					'TGLDAFTAR'=>$row->tgl1,
					'NOTELP'=>$row->nomer_telepon,
					'ACTION'=> '<a href="'.base_url('rpt_pendaftaran/view_data/'.$jenis.'_0_'.$row->idpendaftaran.'_'.$lokasi).'"><i class=" glyphicon glyphicon-print" title="View History"?"></i></a> '


					
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
	
	public function view_data($param=null){
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();		
		$this->config->set_item('mysubmenu', 'mn623');
		//base url = rpt_pembayaran/res_pemasukan/pemasukan_
		$op=""; $title=""; $nmfile="";$display=0; $view="";$jns_sewa=""; $strData=""; $qryRows="";$noreg="";
		if ($param != null){	//$Param dari display=0 kombinasi op_display
			$arr=explode("_",$param);			
			$jns_sewa=$arr[0];
			$display=$arr[1];
			$noreg=$arr[2];	
			$lokasi=$arr[3];	
			
		}
		$tagihan=0;$sts="";
		switch($jns_sewa){
			case "Tahunan": 
				$judul="TAHUNAN";
				$strData="select p.`idpendaftaran`, p.`tgldaftar`,  p.`idkamar`,p.diskon,p.kwh_awal, p.deposit, k.LABELKAMAR, k.FASILITAS,  k.TARIFTAHUNAN, a.* from pendaftaran_tahunan p, anak_kost a, kamar k where  p.idlokasi=".$lokasi." and p.`idanakkost`=a.`idanakkost` and p.`idkamar`=k.`idkamar` and p.idpendaftaran='$noreg'";	
				break;
			case "Bulanan": 
				$judul="BULANAN";
				$strData="select p.`idpendaftaran`, p.`tgldaftar`, p.`tglmulai`, p.`idkamar`,p.diskon,p.kwh_awal, p.deposit, k.LABELKAMAR, k.FASILITAS,  k.TARIFBULANAN, a.* from pendaftaran p, anak_kost a, kamar k where  p.idlokasi=".$lokasi." and p.`idanakkost`=a.`idanakkost` and p.`idkamar`=k.`idkamar` and p.idpendaftaran='$noreg'";	
				break;
			case "Mingguan":	
				$judul="MINGGUAN";
				$strData="select daftar_sewa_mingguan.*, kamar.* from daftar_sewa_mingguan, kamar where  daftar_sewa_mingguan.idlokasi=".$lokasi." and kamar.idkamar=daftar_sewa_mingguan.idkamar and idpendaftaran='$noreg'";				
				break;
			case "Harian":	
				$judul="HARIAN";
				$strData="select daftar_sewa_harian.*,  kamar.* from daftar_sewa_harian, kamar  where daftar_sewa_harian.idlokasi=".$lokasi." and kamar.idkamar=daftar_sewa_harian.idkamar and idpendaftaran='$noreg'";		
				break;
		}	
		
		$data['rsData']=$this->db->query($strData)->row();		
		$data['noreg']=$noreg;		
		$data['display']=$display;
		$reslokasi=$this->transaksi_model->getLokasi($lokasi);
		$data['lokasi'] = $reslokasi;
		$data['jns_sewa']=$jns_sewa;
		$data['nmfile']="data_registrasi_".$reslokasi->kode_kost."_".$jns_sewa."_".$noreg;
		$nmfile="data_registrasi_".$reslokasi->kode_kost."_".$jns_sewa."_".$noreg;
		$data["arrBulan"]=$this->arrBulan;
		$title="Cetak Data Pendaftaran ".$reslokasi->kode_kost." ".$jns_sewa;
		$view ="freport/frpt_cetak_registrasi";
		$data['title']=$title;
		if ($display==0){
			$this->template->set('breadcrumbs','<h1>Cetak <small> <i class="ace-icon fa fa-angle-double-right"></i> '.$title.'</small></h1>');
			$this->template->set('pagetitle',$title.' (View/Cetak)');		
			$this->template->load('default',$view ,$data);
		}else{
			$html=$header;
			$html.=$this->load->view($view , $data, true);
			$html.=$footer;
			//echo $html; 
			$this->ci_pdf->pdf_create_report($html, $nmfile, 'a4', 'portrait');
		}

	}

	

	

}
