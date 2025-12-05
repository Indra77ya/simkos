<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rpt_pembayaran extends MY_App {

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

	
	public function rekap(){	
		$this->config->set_item('mysubmenu', 'mn631');
		if ($this->session->userdata('auth')->ROLE=="Admin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data['arrBulan'] = $this->arrBulan;
		$data['arrThn'] = $this->getYearArr();		
		$data['jenis'] = "bayarrekap";		
		$title="Laporan Rekap Pembayaran Bulanan";
		$data["action"]="rpt_pembayaran/result";		
		$this->template->set('breadcrumbs','<h1>Laporan <small> <i class="ace-icon fa fa-angle-double-right"></i> '.$title.'</small></h1>');
		$this->template->set('pagetitle',$title.' (View/Cetak)');
		$this->template->load('default','freport/filter',$data);
	}
	
	public function angsuran(){	
		$this->config->set_item('mysubmenu', 'mn635');
		if ($this->session->userdata('auth')->ROLE=="Admin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data['arrBulan'] = $this->arrBulan;
		$data['arrThn'] = $this->getYearArr();		
		$data['jenis'] = "angsuran";		
		$title="Laporan Rekap Bulanan Untuk Cicilan/Belum Lunas ";
		$data["action"]="rpt_pembayaran/angsuranResult";		
		$this->template->set('breadcrumbs','<h1>Laporan <small> <i class="ace-icon fa fa-angle-double-right"></i> '.$title.'</small></h1>');
		$this->template->set('pagetitle',$title.' (View/Cetak)');
		$this->template->load('default','freport/filter',$data);
	}
	
	public function angsuranResult($param=null){
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();		
		$this->config->set_item('mysubmenu', 'mn635');
		//base url = rpt_pembayaran/res_pemasukan/pemasukan_
		$op=""; $title=""; $nmfile="";$display=0; $thn=""; $bln="";$view="";$jns_sewa=""; $str="";$orderby="";$lokasi=0;
		if ($param != null){	//$Param dari display=0 kombinasi op_thn_bln_display
			$arr=explode("_",$param);
			$op=$arr[0];
			$thn=$arr[1];
			$bln=$arr[2];
			$jns_sewa=$arr[3];
			$lokasi=$arr[4];
			$display=$arr[5];	
			$orderby=$arr[6];
			
		}else{
			$op=$this->input->post('jenis');
			$jns_sewa=$this->input->post('jenis_sewa');
			$display=$this->input->post('display');
			$thn=$this->input->post('cbTahun');
			$bln=$this->input->post('cbBulan');
			$lokasi=$this->input->post('cb_lokasi');
			$orderby=$this->input->post('orderby');
			
		}
		$tdetil="";
		switch ($jns_sewa){
			case "Bulanan":				
				
				$str="SELECT DISTINCT d.idPendaftaran, a.nama, b.idkamar, k.labelkamar,b.thnbln_tagihan, b.pembayaran_ke, b.`jmlTagihan`, b.`jmlBayar` ,   d.diskon,  b.denda, b.pengurangan_denda, b.kwh_terpakai  FROM pendaftaran d, bayar_bulanan b, anak_kost a, bayar_bulanan_detil det, kamar k  WHERE  d.idlokasi=".$lokasi." and  d.idPendaftaran=b.idpendaftaran   AND det.`idPendaftaran`=b.`idPendaftaran`    AND det.`idPendaftaran`=d.`IDPENDAFTARAN`   AND det.`pembayaran_ke`=b.`pembayaran_ke`   AND d.idanakkost=a.idanakkost   AND  k.idkamar=d.idkamar AND tglbayar LIKE  '".$thn."-".$bln."%' ";				
				$tdetil="bayar_bulanan_detil";
				break;
			case "Mingguan":				
								
				$str="select d.idPendaftaran, d.nama, d.idkamar, k.labelkamar, b.tglbayar, b.jmlBayar,b.metode_bayar FROM daftar_sewa_mingguan d,	bayar_mingguan_detil b, kamar k 
					where  d.idlokasi=".$lokasi." and  d.idPendaftaran=b.noPendaftaran and d.idkamar=k.idkamar
					and b.tglbayar like '".$thn."-".$bln."%' order by d.idpendaftaran";
				$tdetil="bayar_mingguan_detil";
				break;
			case "Harian":
				
				$str="select d.idPendaftaran, d.nama, d.idkamar, k.labelkamar, b.tglbayar, b.jmlBayar,b.metode_bayar FROM daftar_sewa_harian d,	bayar_harian_detil b, kamar k
					where d.idlokasi=".$lokasi." and   d.idPendaftaran=b.noPendaftaran and d.idkamar=k.idkamar
					and b.tglbayar like '".$thn."-".$bln."%' order by d.idpendaftaran";
				$tdetil="bayar_harian_detil";
				break;
		}	
		$str.=($jns_sewa=="Bulanan"?" order by ".$orderby." ASC": " , ".$orderby." ASC");
		$data['orderby']=$orderby;
		$arrBulan=$this->arrBulan;
		$data['arrBulan'] = $arrBulan;
		$data['str'] = $str;
		
		$data['res']=$this->db->query($str)->result();
		$data['bln']=$bln;
		$data['thn']=$thn;
		$data['display']=$display;
		$data['jns_sewa']=$jns_sewa;
		$data['tdetil']=$tdetil;
		$data['nmfile']="Bayar_rekap_".$jns_sewa."_".$thn."_".$bln;
		$data['op']=$op;
		$data['lokasi']=$lokasi;
		$reslokasi=$this->transaksi_model->getLokasi($lokasi);
		$title="Laporan Rekap Cicilan/Belum Lunas Untuk Sewa [ ".$reslokasi->kode_kost." ] ".strtoupper($reslokasi->lokasi)." ".$jns_sewa." Periode ".$arrBulan[$bln]." ".$thn;
		$view ="freport/frpt_cicilan";
		$data['title']=$title;
		$nmfile="Bayar_ciclan_".$reslokasi->kode_kost."_".$jns_sewa."_".$thn."_".$bln;
		if ($display==0){
			$this->template->set('breadcrumbs','<h1>Laporan <small> <i class="ace-icon fa fa-angle-double-right"></i> '.$title.'</small></h1>');
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

	public function result($param=null){
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();		
		$this->config->set_item('mysubmenu', 'mn631');
		//base url = rpt_pembayaran/res_pemasukan/pemasukan_
		$op=""; $title=""; $nmfile="";$display=0; $thn=""; $bln="";$view="";$jns_sewa=""; $str="";$orderby="";$lokasi=0;
		if ($param != null){	//$Param dari display=0 kombinasi op_thn_bln_display
			$arr=explode("_",$param);
			$op=$arr[0];
			$thn=$arr[1];
			$bln=$arr[2];
			$jns_sewa=$arr[3];
			$lokasi=$arr[4];
			$display=$arr[5];	
			$orderby=$arr[6];
			
		}else{
			$op=$this->input->post('jenis');
			$jns_sewa=$this->input->post('jenis_sewa');
			$display=$this->input->post('display');
			$thn=$this->input->post('cbTahun');
			$bln=$this->input->post('cbBulan');
			$lokasi=$this->input->post('cb_lokasi');
			$orderby=$this->input->post('orderby');
			
		}

		switch ($jns_sewa){
			case "Bulanan":				
				
				$str="SELECT d.idPendaftaran, a.nama, d.idkamar, k.labelkamar,  b.jmlBayar,  det.pembayaran_ke, det.thnbln_tagihan, d.diskon, k.tarifbulanan,  b.denda, b.pengurangan_denda, b.kwh_terpakai, det.no_urut  FROM pendaftaran d, bayar_bulanan b, anak_kost a, kamar k , bayar_bulanan_detil det WHERE d.idlokasi=".$lokasi." and d.idPendaftaran=b.idpendaftaran AND  det.`idPendaftaran`=b.`idPendaftaran` AND det.`idPendaftaran`=d.`IDPENDAFTARAN` AND det.`pembayaran_ke`=b.`pembayaran_ke` AND b.idkamar=k.idkamar AND d.idanakkost=a.idanakkost  AND tglbayar LIKE '".$thn."-".$bln."%' ";

				
				break;
			case "Mingguan":				
								
				$str="select d.idPendaftaran, d.nama, d.idkamar, k.labelkamar, b.tglbayar, b.jmlBayar,b.metode_bayar FROM daftar_sewa_mingguan d,	bayar_mingguan_detil b, kamar k 
					where d.idlokasi=".$lokasi." and  d.idPendaftaran=b.noPendaftaran and d.idkamar=k.idkamar
					and b.tglbayar like '".$thn."-".$bln."%' order by d.idpendaftaran";
				break;
			case "Harian":
				
				$str="select d.idPendaftaran, d.nama, d.idkamar, k.labelkamar, b.tglbayar, b.jmlBayar,b.metode_bayar FROM daftar_sewa_harian d,	bayar_harian_detil b, kamar k
					where d.idlokasi=".$lokasi." and  d.idPendaftaran=b.noPendaftaran and d.idkamar=k.idkamar
					and b.tglbayar like '".$thn."-".$bln."%' order by d.idpendaftaran";
				break;
		}	
		$str.=($jns_sewa=="Bulanan"?" order by ".$orderby." ASC": " , ".$orderby." ASC");
		$data['orderby']=$orderby;
		$arrBulan=$this->arrBulan;
		$data['arrBulan'] = $arrBulan;
		$data['str'] = $str;
		
		$data['res']=$this->db->query($str)->result();
		$data['bln']=$bln;
		$data['thn']=$thn;
		$data['display']=$display;
		$data['lokasi']=$lokasi;		
		$data['jns_sewa']=$jns_sewa;
		$data['nmfile']="Bayar_rekap_".$reslokasi->kode_kost."_".$jns_sewa."_".$thn."_".$bln;
		$data['op']=$op;
		$reslokasi=$this->transaksi_model->getLokasi($lokasi);
		$title="Laporan Rekap Pembayaran [ ".$reslokasi->kode_kost." ] ".strtoupper($reslokasi->lokasi)." ".$jns_sewa." Periode ".$arrBulan[$bln]." ".$thn;
		$view ="freport/frpt_bayar_rekap";
		$data['title']=$title;
		$nmfile="Bayar_rekap_".$jns_sewa."_".$thn."_".$bln;
		if ($display==0){
			$this->template->set('breadcrumbs','<h1>Laporan <small> <i class="ace-icon fa fa-angle-double-right"></i> '.$title.'</small></h1>');
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
	
	public function history(){	
		$this->config->set_item('mysubmenu', 'mn631');
		if ($this->session->userdata('auth')->ROLE=="Admin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data["proses"]="entri";
		$this->config->set_item('mysubmenu', 'mn632');	
		$this->template->set('breadcrumbs','<h1>Laporan<small> <i class="ace-icon fa fa-angle-double-right"></i> History Pembayaran Penyewa</small></h1>');
		$this->template->set('pagetitle','History Pembayaran Penyewa ');
		$this->template->load('default','freport/fjsonFilter', $data);
	}

	public function json_data(){
		//if ($this->input->is_ajax_request()){
			$this->config->set_item('mysubmenu', 'mn632');	
			$jenis = $this->input->get('jenis');
			$lokasi = $this->input->get('lokasi');
			$nmtableBayar=""; $controller="";
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			$denda=0;
			switch ($jenis){
				case "Bulanan":
					$str="select p.idpendaftaran, a.nama, a.alamat_asal, a.notelp as nomer_telepon, p.tgldaftar as tgl1, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar from pendaftaran p, anak_kost a  where p.idlokasi=".$lokasi." and  p.idAnakKost=a.idAnakkost and checkout=0 ";
					$nmtableBayar="bayar_bulanan";					

					break;
				case "Mingguan":
					$str="Select idpendaftaran, nama, alamat_asal, telp as nomer_telepon, tglmulai as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_mingguan.idkamar) nmkamar from daftar_sewa_mingguan where  idlokasi=".$lokasi." and checkout=0";
					$nmtableBayar="bayar_mingguan_master";
					
					break;
				case "Harian":
					$str="Select idpendaftaran, nama, alamat_asal, telp as nomer_telepon, tglcek_in as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_harian.idkamar) nmkamar from daftar_sewa_harian where  idlokasi=".$lokasi." and  checkout=0";
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
					'nmkamar'=>str_replace(' ','&nbsp;', $row->nmkamar),
					'NAMA'=>'<a href="'.base_url('rpt_pembayaran/show_detail/'.$jenis.'_0_'.$row->idpendaftaran.'_'.$lokasi).'">'.$row->nama.'</a> ',
					'idpendaftaran'=> '<a href="'.base_url('rpt_pembayaran/show_detail/'.$jenis.'_0_'.$row->idpendaftaran.'_'.$lokasi).'">'.$row->idpendaftaran.'</a> ',
					'ALAMAT'=>$row->alamat_asal,
					'TGLDAFTAR'=>$row->tgl1,
					'NOTELP'=>$row->nomer_telepon,
					'ACTION'=> '<a href="'.base_url('rpt_pembayaran/show_detail/'.$jenis.'_0'.'_'.$row->idpendaftaran.'_'.$lokasi).'"><i class=" fa 	fa-book" title="View History"?"></i></a> '


					
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

	public function show_detail($param=null){
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();		
		$this->config->set_item('mysubmenu', 'mn632');
		//base url = rpt_pembayaran/res_pemasukan/pemasukan_
		$op=""; $title=""; $nmfile="";$display=0; $view="";$jns_sewa=""; $strData=""; $qryRows="";$noreg="";$lokasi=0;
		if ($param != null){	//$Param dari display=0 kombinasi op_display
			$arr=explode("_",$param);			
			$jns_sewa=$arr[0];
			$display=$arr[1];
			$noreg=$arr[2];	
			$lokasi=$arr[3];	
			
		}
		$tagihan=0;$sts="";
		switch($jns_sewa){
			case "Bulanan": 
				$judul="BULANAN";
				$strData="select m.idpendaftaran, a.nama, a.alamat_asal, a.notelp,m.checkout, k.idkamar, k.labelkamar, m.tglmulai,k.tarifbulanan, m.tgldaftar, day(last_day(tglmulai)) dd_akhir, day(tglmulai) dd_mulai , (day(last_day(tglmulai))-day(tglmulai)) selisih, month(tglmulai) bln, year(tglmulai), k.tarifmingguan,k.tarifharian
				FROM pendaftaran m, anak_kost a, kamar k
				WHERE m.`idAnakKost` = a.`idAnakKost`
				AND m.idkamar = k.idkamar 
				and m.idlokasi=".$lokasi." and m.idpendaftaran='$noreg'";	
				//$tagihan bulanan -> tarif bulanan idkamar + detildaftar
				$tarifkamar=$this->db->query("select tarifbulanan from kamar where idlokasi=".$lokasi." and  idkamar=(select idkamar from pendaftaran where idpendaftaran='$noreg')")->row();
				$sBiaya="SELECT SUM( b.tarif ) jml from detildaftar d, biaya_tambahan b where d.idlokasi=".$lokasi." and d.idbiaya=b.id and idpendaftaran='$noreg'";
				$biayaTambahan=$this->db->query($sBiaya)->row();
				$tagihan= $tarifkamar->tarifbulanan + $biayaTambahan->jml;
				$qryRows="select * from bayar_bulanan where idlokasi=".$lokasi." and idpendaftaran='$noreg'";
				break;
			case "Mingguan":	
				$judul="MINGGUAN";
				$strData="select d.idpendaftaran, d.nama, d.alamat_asal,d.telp, d.checkout, k.idkamar, k.labelkamar, d.tglmulai, k.tarifmingguan, d.tglakhir, d.lama from daftar_sewa_mingguan d, kamar k where  d.idlokasi=".$lokasi." and d.idkamar=k.idkamar 	and d.idpendaftaran='$noreg' ";
				$rs=$this->db->query("select (tarif*jmlMinggu) tag , status from bayar_mingguan_master where  idlokasi=".$lokasi." and noPendaftaran='$noreg'")->row();
				$tagihan=$rs->tag;
				$sts=$rs->status;
				$qryRows="select * from bayar_mingguan_detil where  idlokasi=".$lokasi." and nopendaftaran='$noreg'";
				break;
			case "Harian":	
				$judul="HARIAN";
				$strData="select d.idpendaftaran, d.nama, d.alamat_asal,d.telp,d.checkout,  k.idkamar, k.labelkamar, d.tglcek_in,k.tarifharian,  d.tglcek_out, d.lama from daftar_sewa_harian d, kamar k where  d.idlokasi=".$lokasi." and  d.idkamar=k.idkamar and d.idpendaftaran='$noreg'";
				$rs=$this->db->query("select (tarif*jmlhari) tag, status from bayar_harian_master where  idlokasi=".$lokasi." and noPendaftaran='$noreg'")->row();
				$tagihan=$rs->tag;
				$sts=$rs->status;
				$qryRows="select * from bayar_harian_detil where  idlokasi=".$lokasi." and nopendaftaran='$noreg'";
				break;
		}	
		
		
		
		$data['rsData']=$this->db->query($strData)->row();
		$data['resBayar']=$this->db->query($qryRows)->result();
		
		$data['qryRows']=$qryRows;
		$data['noreg']=$noreg;
		$data['status']=$sts;
		$data['tagihan']=$tagihan;
		$data['display']=$display;
		$data['jns_sewa']=$jns_sewa;		
		$reslokasi =$this->transaksi_model->getLokasi($lokasi);
		$data['lokasi'] =$reslokasi;
		$data['nmfile']="history_bayar_".$jns_sewa."_".$noreg;
		$nmfile="history_bayar_".$reslokasi->kode_kost."_".$jns_sewa."_".$noreg;
		$data["arrBulan"]=$this->arrBulan;
		$title= "[ ".$reslokasi->kode_kost." ] History Pembayaran Penyewa ".$jns_sewa;
		$view ="freport/frpt_history_sewa";
		$data['title']=$title;
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

	public function notpaid($var=""){	
		$this->config->set_item('mysubmenu', 'mn633');
		$var=($var==""?"kosong_0":$var);
		$this->notpaid_result($var);
		
	}

	public function notpaid_result($param=null){
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();	
		$this->config->set_item('mysubmenu', 'mn633');
		
		$op=""; $title=""; $nmfile="";$display=0;
		if ($param!=null){	//param = status_0 = menu status, display view=0, pdf=1
			$arr=explode("_",$param);
			$op=$arr[0];
			$display=$arr[1];	
			$orderby=" nmkamar ";
			
		}
		
		$title="Laporan Penyewa Bulanan Belum Bayar";
		$view ="freport/frpt_belumbayar";
		$nmfile="belum_bayar";
		
		$data['orderby']=$orderby;
		$data['title']=$title;
		$data['display']=$display;
		$data['nmfile']=$nmfile;
		$data['op']=$op;
		$data["arrBulan"]=$this->arrBulan;
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


	public function freceipt(){
		$data["proses"]="printReceipt";
		$this->config->set_item('mysubmenu', 'mn631');
		if ($this->session->userdata('auth')->ROLE=="Admin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$this->config->set_item('mysubmenu', 'mn634');	
		$this->template->set('breadcrumbs','<h1>Cetak<small> <i class="ace-icon fa fa-angle-double-right"></i> Cetak Kuitansi</small></h1>');
		$this->template->set('pagetitle','Cetak Kuitansi ');
		$this->template->load('default','freport/fjson_receipt', $data);
	}
	public function jsonreceipt(){
		//if ($this->input->is_ajax_request()){
			$this->config->set_item('mysubmenu', 'mn634');
			$jenis = $this->input->get('jenis');
			$lokasi = $this->input->get('lokasi');
			$nmtableBayar=""; $controller="";
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			$denda=0;
			switch ($jenis){
				case "Bulanan":
					$str="select p.idpendaftaran, a.nama, a.alamat_asal, a.notelp as nomer_telepon, p.tgldaftar as tgl1, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar from pendaftaran p, anak_kost a  where p.idlokasi=".$lokasi." and  p.idAnakKost=a.idAnakkost and checkout=0 ";
					$nmtableBayar="bayar_bulanan";					

					break;
				case "Mingguan":
					$str="Select idpendaftaran, nama, alamat_asal, telp as nomer_telepon, tglmulai as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_mingguan.idkamar) nmkamar from daftar_sewa_mingguan where  idlokasi=".$lokasi." and checkout=0";
					$nmtableBayar="bayar_mingguan_master";
					
					break;
				case "Harian":
					$str="Select idpendaftaran, nama, alamat_asal, telp as nomer_telepon, tglcek_in as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_harian.idkamar) nmkamar from daftar_sewa_harian where  idlokasi=".$lokasi." and  checkout=0";
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
					'nmkamar'=>str_replace(' ','&nbsp;', $row->nmkamar),
					'NAMA'=>'<a href="'.base_url('rpt_pembayaran/receipt_list/'.$jenis.'_'.$row->idpendaftaran.'_'.$lokasi).'">'.$row->nama.'</a> ',
					'idpendaftaran'=> '<a href="'.base_url('rpt_pembayaran/receipt_list/'.$jenis.'_'.$row->idpendaftaran.'_'.$lokasi).'">'.$row->idpendaftaran.'</a> ',
					'ALAMAT'=>$row->alamat_asal,
					'TGLDAFTAR'=>$row->tgl1,
					'NOTELP'=>$row->nomer_telepon,
					'ACTION'=> '<a href="'.base_url('rpt_pembayaran/receipt_list/'.$jenis.'_'.$row->idpendaftaran.'_'.$lokasi).'"><i class=" glyphicon glyphicon-print" title="View History"?"></i></a> '


					
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
	public function receipt_list($param=null){
		$this->config->set_item('mysubmenu', 'mn634');
		$arrVal=explode('_', $param);
		$jenis=$arrVal[0];		
		$noreg=$arrVal[1];
		$lokasi=$arrVal[2];
		$view="";$str="";$strBayar="";
		switch ($jenis){
				case "Bulanan":
					$str="select m.idpendaftaran, a.nama, a.alamat_asal, k.idkamar, k.labelkamar,k.tarifbulanan,m.tglmulai, m.tgldaftar, day(last_day(tglmulai)) dd_akhir, day(tglmulai) dd_mulai , (day(last_day(tglmulai))-day(tglmulai)) selisih, month(tglmulai) bln, year(tglmulai) xthn, k.tarifmingguan, k.tarifharian, m.diskon, m.kwh_awal from pendaftaran m, anak_kost a, kamar k  where m.idlokasi=".$lokasi." and m.`idanakkost` = a.`idanakkost`	and m.idkamar = k.idkamar and m.idpendaftaran='$noreg' ";	
					$strBayar="select * from bayar_bulanan where idpendaftaran='$noreg'";
					break;
				case "Mingguan":
					$str="select d.idpendaftaran, d.nama, d.alamat_asal, k.idkamar, k.labelkamar, k.tarifmingguan, d.tglmulai, d.tglakhir, d.lama, d.diskon from daftar_sewa_mingguan d, kamar k  where d.idlokasi=".$lokasi." and  d.idkamar=k.idkamar and d.idpendaftaran='$noreg' ";	
					$strBayar="select * from bayar_mingguan_detil where idlokasi=".$lokasi." and nopendaftaran='$noreg'";
					break;
				case "Harian":
					$str="select d.idpendaftaran, d.nama, d.alamat_asal, k.idkamar, k.labelkamar, k.tarifharian, d.tglcek_in, d.tglcek_out, d.lama, d.diskon from daftar_sewa_harian d, kamar k where d.idlokasi=".$lokasi." and d.idkamar=k.idkamar and d.idpendaftaran='$noreg'";
					$strBayar="select * from bayar_harian_detil where idlokasi=".$lokasi." and  nopendaftaran='$noreg'";
					
					break;
			}
		$rsCek = $this->db->query($str)->num_rows();
		$qdaftar= $this->db->query($str)->row();
		$qbayar = $this->db->query($strBayar)->result();
		$data["arrIntBln"]=$this->arrIntBln;		
		$data["arrBulan"]=$this->arrBulan;		
		$data["str"]=$str;		
		$data["resDaftar"]=$qdaftar;		
		$data["resBayar"]=$qbayar;		
		$data["jenis"]=$jenis;		
		$data["noreg"]=$noreg;		
		$data['lokasi'] =$lokasi;
		$reslokasi =$this->transaksi_model->getLokasi($lokasi);
		$data['reslokasi'] =$reslokasi;
		$this->template->set('breadcrumbs','<h1>Cetak<small> <i class="ace-icon fa fa-angle-double-right"></i> Cetak Kuitansi</small></h1>');
		$this->template->set('pagetitle','Cetak Kuitansi '.$reslokasi->kode_kost);
		$this->template->load('default','freport/freceipt_'.$jenis, $data);
		
	}
	public function printReceipt($param=null){
		$header=$this->commonlib->pdfHeaderKuitansi();
		$footer=$this->commonlib->pdfFooterKuitansi();		
		$this->config->set_item('mysubmenu', 'mn634');
		//base url = rpt_pembayaran/res_pemasukan/pemasukan_
		$op=""; $title=""; $nmfile=""; $display=0; $view="";$jns_sewa=""; $strData=""; $qryRows="";$noreg="";
		$thnbln=""; //klo sewa mingguan/harian $thnbln=no urut
		if ($param != null){	//$Param dari display=0 kombinasi op_display
			$arr=explode("_",$param);			
			$jns_sewa=$arr[0];
			$display=$arr[1];
			$noreg=$arr[2];	
			$thnbln=$arr[3];
			if ($jns_sewa=="Bulanan"){
				$nourut=$arr[4];
			}
			
		}
		//query tanpa filter idlokasi krn nourut/no kuitansi sdh unique/auto increment
		$tagihan=0;$sts="";$strKamar="";$strData="";
		switch($jns_sewa){
			case "Bulanan": 
				$judul="BULANAN";
				$strData="select d.idpendaftaran, a.nama, b.jmltagihan tagihan, bd.jmlbayar, bd.no_urut, bd.tglbayar, b.denda, bd.metode_bayar, d.diskon, b.pengurangan_denda FROM `pendaftaran` d, anak_kost a, bayar_bulanan b,bayar_bulanan_detil bd  WHERE d.IDANAKKOST=a.IDANAKKOST and d.idpendaftaran = b.idpendaftaran and d.idpendaftaran='$noreg' and b.thnbln_tagihan='$thnbln' and b.idpendaftaran=bd.idpendaftaran and b.pembayaran_ke=bd.pembayaran_ke and bd.no_urut=$nourut ";
				
				break;
			case "Mingguan":	
				$judul="MINGGUAN";
				$strData="select df.idpendaftaran, df.nama,m.jmlminggu, m.jmlminggu*(m.tarif-df.diskon) tagihan, m.jmlbayar jmlbayarall, m.status, det.nourut, det.jmlbayar, det.metode_bayar, det.tglbayar, df.diskon FROM `daftar_sewa_mingguan` df, bayar_mingguan_master m, bayar_mingguan_detil det WHERE df.idpendaftaran=m.nopendaftaran and  df.idpendaftaran=det.nopendaftaran and m.nopendaftaran=det.nopendaftaran and det.nopendaftaran='$noreg' and det.nourut='$thnbln' and det.nourut=(select max(nourut) from bayar_mingguan_detil where nopendaftaran='$noreg' and nourut='$thnbln')";				
				break;
			case "Harian":	
				$judul="HARIAN";
				$strData="select df.idpendaftaran, df.nama,m.jmlhari, m.jmlhari*(m.tarif-df.diskon)  tagihan, m.jmlbayar jmlbayarall , m.status, det.nourut, det.jmlbayar, det.metode_bayar, det.tglbayar, df.diskon FROM `daftar_sewa_harian` df, bayar_harian_master m, bayar_harian_detil det 
			WHERE df.idpendaftaran=m.nopendaftaran and 	df.idpendaftaran=det.nopendaftaran and m.nopendaftaran=det.nopendaftaran and det.nopendaftaran='$noreg' and det.nourut='$thnbln' and det.nourut=(select max(nourut) from bayar_harian_detil where nopendaftaran='$noreg' and nourut='$thnbln')";		
				break;
		}	
		
		$rsData=$this->db->query($strData)->row();	
		$data['rsData']=$rsData;
		$strKamar="select * from kamar where idkamar = (select idkamar from ".($jns_sewa=="Bulanan"?"pendaftaran":($jns_sewa=="Mingguan"?"daftar_sewa_mingguan":"daftar_sewa_harian"))." where idpendaftaran='$noreg')";
		$data['rsKamar']=$this->db->query($strKamar)->row();;
		$terbilang=$this->terbilang($rsData->jmlbayar);
		$data['noreg']=$noreg;		
		$data['display']=$display;
		$data['jns_sewa']=$jns_sewa;
		$data['terbilang']=$terbilang;

		$data['param_4']=$thnbln;
		$data['thnbln']=$thnbln;
		$data['strData']=$strData;
		$data['nmfile']="kuitansi_".$jns_sewa."_".$noreg."_".$thnbln;
		$nmfile="kuitansi_".$jns_sewa."_".$noreg."_".$thnbln;
		$data["arrBulan"]=$this->arrBulan;
		$title="Cetak Kuitansi ".$jns_sewa;
		$view ="freport/fkuitansi";
		$data['title']=$title;
		if ($display==0){
			$this->template->set('breadcrumbs','<h1>Cetak <small> <i class="ace-icon fa fa-angle-double-right"></i> '.$title.'</small></h1>');
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
