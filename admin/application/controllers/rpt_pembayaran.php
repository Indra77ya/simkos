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
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
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
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
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
			case "Tahunan":				
				
				$str="SELECT DISTINCT d.idPendaftaran, a.nama, b.idkamar, k.labelkamar,b.tahun_tagihan,  b.`jmlTagihan`, b.`jmlBayar` ,   d.diskon,  b.denda, b.pengurangan_denda FROM pendaftaran_tahunan d, bayar_tahunan b, anak_kost a, bayar_tahunan_detil det, kamar k  WHERE  d.idlokasi=".$lokasi." and  d.idPendaftaran=b.idpendaftaran   AND det.`idPendaftaran`=b.`idPendaftaran`    AND det.`idPendaftaran`=d.`IDPENDAFTARAN`   AND det.`tahun_tagihan`=b.`tahun_tagihan`   AND d.idanakkost=a.idanakkost   AND  k.idkamar=d.idkamar AND tglbayar LIKE  '".$thn."-".$bln."%' ";				
				$tdetil="bayar_tahunan_detil";
				break;
			case "Bulanan":				
				
				$str="SELECT DISTINCT d.idPendaftaran, a.nama, b.idkamar, k.labelkamar,b.thnbln_tagihan, b.pembayaran_ke, b.`jmlTagihan`, b.`jmlBayar` ,   d.diskon,  b.denda, b.pengurangan_denda, b.kwh_terpakai, b.tarif_per_kwh  FROM pendaftaran d, bayar_bulanan b, anak_kost a, bayar_bulanan_detil det, kamar k  WHERE  d.idlokasi=".$lokasi." and  d.idPendaftaran=b.idpendaftaran   AND det.`idPendaftaran`=b.`idPendaftaran`    AND det.`idPendaftaran`=d.`IDPENDAFTARAN`   AND det.`pembayaran_ke`=b.`pembayaran_ke`   AND d.idanakkost=a.idanakkost   AND  k.idkamar=d.idkamar AND tglbayar LIKE  '".$thn."-".$bln."%' ";				
				$tdetil="bayar_bulanan_detil";
				break;
			case "Mingguan":				
								
				$str="select d.idPendaftaran, d.nama, d.idkamar, k.labelkamar, b.tglbayar, (k.tarifmingguan*d.lama) tarif, b.jmlBayar,b.metode_bayar FROM daftar_sewa_mingguan d,	bayar_mingguan_detil b, kamar k 
					where  d.idlokasi=".$lokasi." and  d.idPendaftaran=b.noPendaftaran and d.idkamar=k.idkamar
					and b.tglbayar like '".$thn."-".$bln."%' order by d.idpendaftaran";
				$tdetil="bayar_mingguan_detil";
				break;
			case "Harian":
				
				$str="select d.idPendaftaran, d.nama, d.idkamar, k.labelkamar, b.tglbayar, (k.tarifharian*d.lama) tarif, b.jmlBayar,b.metode_bayar FROM daftar_sewa_harian d,	bayar_harian_detil b, kamar k
					where d.idlokasi=".$lokasi." and   d.idPendaftaran=b.noPendaftaran and d.idkamar=k.idkamar
					and b.tglbayar like '".$thn."-".$bln."%' order by d.idpendaftaran";
				$tdetil="bayar_harian_detil";
				break;
		}	
		$str.=($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"?" order by ".$orderby." ASC": " , ".$orderby." ASC");
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
			case "Tahunan":				
				
				$str="SELECT d.idPendaftaran, a.nama, d.idkamar, k.labelkamar,  det.jmlBayar,  det.pembayaran_ke,det.tahun_tagihan, det.tahun_tagihan, d.diskon, k.tarifbulanan,  b.denda, b.pengurangan_denda,  det.no_urut  FROM pendaftaran_tahunan d, bayar_tahunan b, anak_kost a, kamar k , bayar_tahunan_detil det WHERE d.idlokasi=".$lokasi." and d.idPendaftaran=b.idpendaftaran AND  det.`idPendaftaran`=b.`idPendaftaran` AND det.`idPendaftaran`=d.`IDPENDAFTARAN` AND det.`tahun_tagihan`=b.`tahun_tagihan` AND b.idkamar=k.idkamar AND d.idanakkost=a.idanakkost  AND tglbayar LIKE '".$thn."-".$bln."%' ";

				
				break;
			case "Bulanan":				
				
				$str="SELECT d.idPendaftaran, a.nama, d.idkamar, k.labelkamar,  det.jmlBayar,  det.pembayaran_ke, det.thnbln_tagihan, d.diskon, k.tarifbulanan,  b.denda, b.pengurangan_denda, b.kwh_terpakai, det.no_urut  FROM pendaftaran d, bayar_bulanan b, anak_kost a, kamar k , bayar_bulanan_detil det WHERE d.idlokasi=".$lokasi." and d.idPendaftaran=b.idpendaftaran AND  det.`idPendaftaran`=b.`idPendaftaran` AND det.`idPendaftaran`=d.`IDPENDAFTARAN` AND det.`pembayaran_ke`=b.`pembayaran_ke` AND b.idkamar=k.idkamar AND d.idanakkost=a.idanakkost  AND tglbayar LIKE '".$thn."-".$bln."%' ";

				
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
		$str.=($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"?" order by ".$orderby." ASC": " , ".$orderby." ASC");
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
		$reslokasi=$this->transaksi_model->getLokasi($lokasi);
		$data['nmfile']="Bayar_rekap_".$reslokasi->kode_kost."_".$jns_sewa."_".$thn."_".$bln;
		$data['op']=$op;
		
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
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data["proses"]="history";
		$this->config->set_item('mysubmenu', 'mn632');	
		$this->template->set('breadcrumbs','<h1>Laporan<small> <i class="ace-icon fa fa-angle-double-right"></i> History Pembayaran Penyewa</small></h1>');
		$this->template->set('pagetitle','History Pembayaran Penyewa ');
		$this->template->load('default','freport/fjsonFilter', $data);
	}

	public function json_notpaid(){
		$this->config->set_item('mysubmenu', 'mn632');	
			$arrBulan=$this->arrBulan;
			$lokasi = $this->input->get('lokasi');
			$jenis_sewa = $this->input->get('jenis_sewa');
			$nmtableBayar=""; $controller="";
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			$denda=0;
			
			if ($jenis_sewa=="Bulanan"){
				$str="select  @nom:=@nom+1 as NO,p.idpendaftaran, p.tglmulai,a.`nama`, k.labelkamar  FROM pendaftaran p, kamar k, anak_kost a WHERE  p.`IDKAMAR`=k.`IDKAMAR` AND p.`IDANAKKOST`=a.`IDANAKKOST` AND   p.`IDLOKASI`=".$lokasi." AND  p.idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_bulanan WHERE  thnbln_tagihan ='".date('Ym')."' )  AND checkout=0 ";
				$nmtableBayar="bayar_bulanan";
			}else{
				$str="select  @nom:=@nom+1 as NO,p.*,a.`nama`, k.labelkamar  FROM pendaftaran_tahunan p, kamar k, anak_kost a WHERE  p.`IDKAMAR`=k.`IDKAMAR` AND p.`IDANAKKOST`=a.`IDANAKKOST` AND   p.`IDLOKASI`=".$lokasi." AND  p.idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_tahunan WHERE  tahun_tagihan ='".date('Y')."' )  AND checkout=0 ";
			$nmtableBayar="bayar_tahunan";
			}
			//$strBulan="select ";
						
			if ( $_GET['sSearch'] != "" )
			{
				
					$str.= " and  (a.nama like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or a.alamat_asal like '%".mysql_real_escape_string( $_GET['sSearch'] )."%') ";
				
					$str.= " and  (nama like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or alamat_asal like '%".mysql_real_escape_string( $_GET['sSearch'] )."%') ";
				
				
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
			$this->db->query("set @nom=0;");
			$query = $this->db->query($strfilter)->result();
			
			$aaData = array(); $detil="";
			foreach($query as $row){
			
			if ($jenis_sewa=="Bulanan"){
				$dd_tglMulai=substr($row->tglmulai,8,2);
				$mm_tglMulai=substr($row->tglmulai,5,2);
				$yy_tglMulai=substr($row->tglmulai,0,4);
				$tag="";
				$x=intval($yy_tglMulai.$mm_tglMulai);
					for ($x;$x<=intval(date('Ym'));$x++){
						$x=$yy_tglMulai.$mm_tglMulai;
						$strLoopPeriod=$yy_tglMulai."-".$mm_tglMulai."-".$dd_tglMulai;
						$cekRow=$this->db->query("select count(*) cek from bayar_bulanan where idpendaftaran='".$row->idpendaftaran."' and thnbln_tagihan='$x'")->row();
						if ($cekRow->cek <=0){
							$interval = date_diff(date_create($strLoopPeriod),date_create() );
							$intervalbln=$interval->format("%m");
							$intervalhr=$interval->format("%d");
							$denda="";
							if ($intervalbln>=1){
								$denda="1 bulan";
							}else{
								if ($strLoopPeriod>date('Y-m-d')){
									$hariDenda=0;
									$denda="Belum telat. (tagihan keluar tgl :".$strLoopPeriod.")";
								}else{
									$hariDenda=$intervalhr;
									$denda=" $hariDenda Hari";
								}
							}
							$tag.="Tagihan : ".$arrBulan[$mm_tglMulai]." ".$yy_tglMulai.", Telat  : ".$denda."<br>";
						}
						

						$mm_tglMulai=intval($mm_tglMulai)+1;
						//$mm_tglMulai++;
						if ($mm_tglMulai>12) {
							$mm_tglMulai=1;
							$yy_tglMulai+=1;
						}
						$mm_tglMulai=(strlen($mm_tglMulai)<=1?"0".$mm_tglMulai:$mm_tglMulai);
					}
			}else{
				
				$noreg=$row->IDPENDAFTARAN;
				$qkamar = $this->db->query("select * from kamar where idkamar=".$row->IDKAMAR)->row();	
				$rsDendaThn = $this->db->query("select nominal, hari_ke from denda where id=1")->row();
				$hari_ke_denda=$rsDendaThn->hari_ke;
				$denda=$rsDendaThn->nominal;
				$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from detildaftar_tahunan d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='$noreg'";
				$qryby=$this->db->query($sBiaya)->result();
				$jmlby=0;
				foreach($qryby as $rowbiaya){						
						$jmlby+=$rowbiaya->tarif;						
				}
		$tagihan= $qkamar->TARIFTAHUNAN - $row->diskon;	
		$test="";
		$tgldaftarFull=$row->TGLDAFTAR;	
		$thnMulai=date('Y', strtotime($tgldaftarFull));
		$mmdd_mulai=date('m-d', strtotime($tgldaftarFull));
		$ymd_jatuhtempo=""; $muncul_denda="";
		$thnloop=$thnMulai;
		
		
		for ($thnloop=$thnMulai;$thnloop<=date('Y');$thnloop++){	
			 $hariDenda=0; $denda_ket="";
				$ymd_jatuhtempo=$thnloop."-".$mmdd_mulai;			

				$cekbayar_sewa=$this->db->query("select * from bayar_tahunan where idpendaftaran='$noreg' and idlokasi=".$row->IDLOKASI." and tahun_tagihan='".$thnloop."'");
				$cekbayar_tag_blnn=$this->db->query("select * from bayar_tahunan_tag_blnan where idpendaftaran='$noreg' and idlokasi=".$row->IDLOKASI." and periode_tagihan like '".$thnloop."%' order by periode_tagihan");	
				
				$sts_sewa=""; $tag=""; $rssewa = $cekbayar_sewa->row(); $link_sewa="";
				$sts_tagbln=""; $ket_tagbln=""; $rs_tagbln=$cekbayar_tag_blnn->result(); $link_tagbln="";

				if ($cekbayar_sewa->num_rows()<=0) {
						$sts_sewa="Belum Lunas";
						//cek denda
						$muncul_denda=strftime("%Y-%m-%d", strtotime(strftime("%Y-%m-%d", strtotime($ymd_jatuhtempo))." + $hari_ke_denda day"));
							$interval = date_diff(date_create($muncul_denda),date_create() );
							$intervalthn=intval($interval->format("%Y"));
							$intervalbln=$interval->format("%m");
							$intervalhr=$interval->format("%d");
						
						if ($thnloop <= date('Y') ) {		
							
							if ($intervalthn >=1){						
								$hariDenda=$intervalthn*12*30;
								$denda_ket="Telat ".$intervalthn." tahun";
							}elseif ($intervalbln>=1){						
								$hariDenda=$intervalbln*30;
								$denda_ket="Telat ".$intervalbln." bulan";
							}else{
								$hariDenda=$intervalhr;
								$denda_ket="Telat : $hariDenda Hari";
							}

							$denda_ket.=", Denda : ".$hariDenda * $denda;
						}else{	
							$hariDenda=0;
							$denda_ket="Belum denda. (Denda mulai keluar tgl :".$muncul_denda.")";
							//$denda_ket="Belum denda. (Denda keluar tgl :".($ymd_jatuhtempo+$hari_ke_denda).")";
						}


						//$link_sewa='<a href="javascript:void(0)" onclick="yearlyInv(this)" data-noreg="'.$row->IDPENDAFTARAN.'" data-idkamar="'.$row->IDKAMAR.'"  data-idlokasi="'.$row->IDLOKASI.'" data-byrke="'.($i+1).'" data-thn="'.$thnloop.'" data-tagihan="'.$tagihan.'" data-hrdenda="'.$hariDenda.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Bayar </a>';
						$tag.="Tagihan : ".number_format($tagihan,0,',','.')."<br>";
						$tag.=$denda_ket;
						
				}

					
				}

			}
				$aaData[] = array(
					'NO'=>$row->NO,
					'LABEL_KAMAR'=>str_replace(' ','&nbsp;', $row->labelkamar),
					'NAMA'=>$row->nama,					
					'TGLMULAI'=>($jenis_sewa=="Bulanan"?$row->tglmulai:$row->TGLDAFTAR),					
					'DETIL'=>$tag
					
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
	public function json_data(){
		//if ($this->input->is_ajax_request()){
			$this->config->set_item('mysubmenu', 'mn632');	
			$jenis = $this->input->get('jenis');
			$lokasi = $this->input->get('lokasi');
			$proses = $this->input->get('proses');
			$nmtableBayar=""; $controller="";
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			$denda=0;
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
					$str="Select idpendaftaran, nama, alamat_asal, telp as nomer_telepon, tglcek_in as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_harian.idkamar) nmkamar from daftar_sewa_harian where  idlokasi=".$lokasi." and  checkout=0";
					$nmtableBayar="bayar_harian_master";
					
					break;
			}
			
			
						
			if ( $_GET['sSearch'] != "" )
			{
				if ($jenis=="Bulanan" ||$jenis=="Tahunan"){
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
				$cekdepo=$this->db->query("select * from deposit_master where idpendaftaran='".$row->idpendaftaran."'")->num_rows();

				$nameLink=($proses=='history'?'<a href="'.base_url('rpt_pembayaran/show_detail/'.$jenis.'_0_'.$row->idpendaftaran.'_'.$lokasi).'">'.$row->nama.'</a> '  :  ($cekdepo>0?'<a href="'.base_url('rpt_pembayaran/depo_detail/0_'.$row->idpendaftaran).'">'.$row->nama.'</a>':$row->nama)) ;


				$regLink=($proses=='history'?'<a href="'.base_url('rpt_pembayaran/show_detail/'.$jenis.'_0_'.$row->idpendaftaran.'_'.$lokasi).'">'.$row->idpendaftaran.'</a>' :  ($cekdepo>0?'<a href="'.base_url('rpt_pembayaran/depo_detail/0_'.$row->idpendaftaran).'">'.$row->idpendaftaran.'</a>':$row->idpendaftaran)) ;

				$iconLink=($proses=='history'?'<a href="'.base_url('rpt_pembayaran/show_detail/'.$jenis.'_0'.'_'.$row->idpendaftaran.'_'.$lokasi).'"><i class=" fa fa-book" title="View Payment History?"></i></a>' :  ($cekdepo>0?'<a href="'.base_url('rpt_pembayaran/depo_detail/0_'.$row->idpendaftaran).'"><i class=" fa fa-book" title="View Deposit Detil Report ?"></i></a>':'')) ;
				
				$aaData[] = array(
					'nmkamar'=>str_replace(' ','&nbsp;', $row->nmkamar),
					'NAMA'=> $nameLink ,
					'idpendaftaran'=> $regLink,
					'ALAMAT'=>$row->alamat_asal,
					'TGLDAFTAR'=>$row->tgl1,
					'NOTELP'=>$row->nomer_telepon,
					'ACTION'=> $iconLink
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
			case "Tahunan": 
				$judul="TAHUNAN";
				$strData="select m.idpendaftaran, a.nama, a.alamat_asal, a.notelp,m.checkout, k.idkamar, k.labelkamar, m.tgldaftar,k.tariftahunan,  day(last_day(tgldaftar)) dd_akhir, day(tgldaftar) dd_mulai , (day(last_day(tgldaftar))-day(tgldaftar)) selisih, month(tgldaftar) bln, year(tgldaftar), k.tarifmingguan,k.tarifharian, m.idlokasi
				FROM pendaftaran_tahunan m, anak_kost a, kamar k
				WHERE m.`idAnakKost` = a.`idAnakKost`
				AND m.idkamar = k.idkamar 
				and m.idlokasi=".$lokasi." and m.idpendaftaran='$noreg'";	
				//$tagihan bulanan -> tarif bulanan idkamar + detildaftar
				$tarifkamar=$this->db->query("select tariftahunan from kamar where idlokasi=".$lokasi." and  idkamar=(select idkamar from pendaftaran_tahunan where idpendaftaran='$noreg')")->row();
				$sBiaya="SELECT SUM( b.tarif ) jml from detildaftar_tahunan d, biaya_tambahan b where d.idlokasi=".$lokasi." and d.idbiaya=b.id and idpendaftaran='$noreg'";
				$biayaTambahan=$this->db->query($sBiaya)->row();
				$tagihan= $tarifkamar->tariftahunan + $biayaTambahan->jml;
				$qryRows="select * from bayar_tahunan where idlokasi=".$lokasi." and idpendaftaran='$noreg'";
				break;
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
		//buat filter lokasi, search nama anak kost & datatable , sort jml hari telat, dll
		$data=array();
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
			$data['statusData'] = "pusat";
		}else{
			$reslokasi=$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
			$data['lokasi'] =$reslokasi;			
			$data['statusData'] = "cabang";
			
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
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
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
				case "Tahunan":
					$str="select m.idpendaftaran, a.nama, a.alamat_asal, k.idkamar, k.labelkamar,k.tariftahunan, m.tgldaftar, day(last_day(tgldaftar)) dd_akhir, day(tgldaftar) dd_mulai , (day(last_day(tgldaftar))-day(tgldaftar)) selisih, month(tgldaftar) bln, year(tgldaftar) xthn, k.tarifbulanan, k.tarifmingguan, k.tarifharian, m.diskon, m.kwh_awal from pendaftaran_tahunan m, anak_kost a, kamar k  where m.idlokasi=".$lokasi." and m.`idanakkost` = a.`idanakkost`	and m.idkamar = k.idkamar and m.idpendaftaran='$noreg' ";	
					$strBayar="select * from bayar_tahunan where idpendaftaran='$noreg'";
					break;
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
	public function printReceipt_Thnn_tagbln($param=null){
		$header=$this->commonlib->pdfHeaderKuitansi();
		$footer=$this->commonlib->pdfFooterKuitansi(); 
		$noreg="";$periode_tagihan=""; $display=1;$urut=0;
		if ($param != null){	//msg.noreg+"_"+msg.periode_tagihan+"_"+msg.detil_insert_id 
			$arr=explode("_",$param);	
			$noreg=$arr[0];	
			$periode_tagihan=$arr[1];
			$nourut=$arr[2];			
		}
		
		$judul="TAHUNAN";	//$thnbln as thn
		$strData="select bd.*,b.idlokasi idloc a.nama FROM  anak_kost a, pendaftaran_tahunan b, bayar_tahunan_tag_blnan bd  WHERE b.idanakkost=a.idanakkost and b.idpendaftaran = bd.idpendaftaran and bd.idpendaftaran='$noreg' and bd.periode_tagihan='$periode_tagihan' and bd.no_urut=$nourut ";
		$rsData=$this->db->query($strData)->row();	
		$data['rsData']=$rsData;
		$strKamar="select * from kamar where idkamar = (select idkamar from pendaftaran_tahunan where idpendaftaran='$noreg')";
		$data['rsKamar']=$this->db->query($strKamar)->row();
		$data['rsLokasi']=$this->db->query("select * from lokasi where id=".$rsData->idloc)->row();
		$terbilang=$this->terbilang($rsData->jmlBayar);
		$data['noreg']=$noreg;		
		$data['periode_tagihan']=$periode_tagihan;
		$data['nourut']=$nourut;
		$data['display']=$display;
		$data['terbilang']=$terbilang;

		$data['strData']=$strData;
		$data['nmfile']="kuitansi_tagihanbulanan_"."_".$noreg."_".$periode_tagihan;
		$nmfile="kuitansi_tagbulanan_sewatahunan_".$noreg."_".$periode_tagihan;
		$data["arrBulan"]=$this->arrBulan;
		$title="Cetak Kuitansi Tagihan Bulanan Sewa Tahunan";
		$view ="freport/fkuitansi_tagbln";
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
			if ($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"){
				$nourut=$arr[4];
			}
			
		}
		//query tanpa filter idlokasi krn nourut/no kuitansi sdh unique/auto increment
		$tagihan=0;$sts="";$strKamar="";$strData="";
		switch($jns_sewa){
			case "Tahunan": 
				$judul="TAHUNAN";	//$thnbln as thn
				$strData="select d.idlokasi idloc, d.idpendaftaran, a.nama, b.jmltagihan tagihan, b.idkamar, d.tgldaftar, bd.jmlbayar, bd.no_urut, bd.tglbayar, b.denda, bd.metode_bayar, d.diskon, b.pengurangan_denda FROM `pendaftaran_tahunan` d, anak_kost a, bayar_tahunan b,bayar_tahunan_detil bd  WHERE d.IDANAKKOST=a.IDANAKKOST and d.idpendaftaran = b.idpendaftaran and d.idpendaftaran='$noreg' and b.tahun_tagihan='$thnbln' and b.idpendaftaran=bd.idpendaftaran and bd.no_urut=$nourut ";
				
				break;
			case "Bulanan": 
				$judul="BULANAN";
				$strData="select d.idlokasi idloc, d.idpendaftaran, a.nama, b.jmltagihan tagihan, b.idkamar, d.tglmulai,  day(tglmulai) dd_mulai , bd.jmlbayar, bd.no_urut, bd.tglbayar, b.denda, bd.metode_bayar, d.diskon, b.pengurangan_denda FROM `pendaftaran` d, anak_kost a, bayar_bulanan b,bayar_bulanan_detil bd  WHERE d.IDANAKKOST=a.IDANAKKOST and d.idpendaftaran = b.idpendaftaran and d.idpendaftaran='$noreg' and b.thnbln_tagihan='$thnbln' and b.idpendaftaran=bd.idpendaftaran and b.pembayaran_ke=bd.pembayaran_ke and bd.no_urut=$nourut ";
				
				break;
			case "Mingguan":	
				$judul="MINGGUAN";
				$strData="select df.idlokasi idloc, df.idpendaftaran, df.nama,m.jmlminggu, m.jmlminggu*(m.tarif-df.diskon) tagihan, df.tglmulai, df.tglakhir, m.jmlbayar jmlbayarall, m.status, det.nourut, det.jmlbayar, det.metode_bayar, det.tglbayar, df.diskon FROM `daftar_sewa_mingguan` df, bayar_mingguan_master m, bayar_mingguan_detil det WHERE df.idpendaftaran=m.nopendaftaran and  df.idpendaftaran=det.nopendaftaran and m.nopendaftaran=det.nopendaftaran and det.nopendaftaran='$noreg' and det.nourut='$thnbln' and det.nourut=(select max(nourut) from bayar_mingguan_detil where nopendaftaran='$noreg' and nourut='$thnbln')";				
				break;
			case "Harian":	
				$judul="HARIAN";
				$strData="select df.idlokasi idloc, df.idpendaftaran, df.nama,m.jmlhari, m.jmlhari*(m.tarif-df.diskon)  tagihan, df.tglcek_in, df.tglcek_out,  m.jmlbayar jmlbayarall , m.status, det.nourut, det.jmlbayar, det.metode_bayar, det.tglbayar, df.diskon 
				FROM `daftar_sewa_harian` df, bayar_harian_master m, bayar_harian_detil det WHERE df.idpendaftaran=m.nopendaftaran and 	df.idpendaftaran=det.nopendaftaran and m.nopendaftaran=det.nopendaftaran and det.nopendaftaran='$noreg' and det.nourut='$thnbln' and det.nourut=(select max(nourut) from bayar_harian_detil where nopendaftaran='$noreg' and nourut='$thnbln')";		
				break;
		}	
		
		$rsData=$this->db->query($strData)->row();	
		$data['rsData']=$rsData;
		//$strKamar="select * from kamar where idkamar = (select idkamar from ".($jns_sewa=="Bulanan"?"pendaftaran":($jns_sewa=="Tahunan"?"pendaftaran_tahunan": ($jns_sewa=="Mingguan"?"daftar_sewa_mingguan":"daftar_sewa_harian") ))." where idpendaftaran='$noreg')";
		$strKamar="";
		if ($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan" ){
			$strKamar="select * from kamar where idkamar = ".$rsData->idkamar;
		}else{
			$strKamar="select * from kamar where idkamar = (select idkamar from ".($jns_sewa=="Mingguan"?"daftar_sewa_mingguan":"daftar_sewa_harian") ." where idpendaftaran='$noreg')";
		}
		
		$data['rsKamar']=$this->db->query($strKamar)->row();
		$data['rsLokasi']=$this->db->query("select * from lokasi where id=".$rsData->idloc)->row();
		$terbilang=$this->terbilang($rsData->jmlbayar);
		$data['noreg']=$noreg;		
		$data['display']=$display;
		$data['jns_sewa']=$jns_sewa;
		$data['terbilang']=$terbilang;

		$data['param_4']=$thnbln;	//thnbln in tahunan as thn
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

	public function unpaidToPdf(){
		$arrBulan=$this->arrBulan;
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();	
		$arr=explode('_',$this->uri->segment('3'));
		
		//$data["lokasi"]=$this->input->post('lokasi');
		//$data["jenis_sewa"]=$this->input->post('jenis_sewa');
		
		$data["lokasi"]=$arr[0];
		$data["jenis_sewa"]=$arr[1];
		
		$data["arrBulan"]=$arrBulan;
		
		//$reslokasi =$this->transaksi_model->getLokasi($this->input->post('lokasi'));
		$reslokasi =$this->transaksi_model->getLokasi($arr[0]);
		
		$data["title"]='Daftar Tagihan Penghuni belum bayar '.($this->input->post('jenis_sewa')=="Bulanan"?"Bulanan ":"Tahunan ").$reslokasi->lokasi.' Periode '.date('m-Y');
		$view="freport/frpt_belumbayarPdf";

		$html=$header;
		$html.=$this->load->view($view , $data, true);
		$html.=$footer;
		$nmfile="tagihanList_".$reslokasi->lokasi."_".date('Y-m');
		//echo $html;
		$this->ci_pdf->pdf_create_report($html, $nmfile, 'a4', 'portrait');

	}

	public function unpaidToExcel(){
		// Prevent any output until we are ready
		ini_set('display_errors', 0);
		ini_set('memory_limit', '512M');
		// Clean all output buffers to ensure valid JSON
		while (ob_get_level()) {
			ob_end_clean();
		}

		$arrBulan=$this->arrBulan;
		$lokasi=$this->input->post('lokasi');
		$jenis_sewa=$this->input->post('jenis_sewa');
		$reslokasi =$this->transaksi_model->getLokasi($lokasi);
		$namafile="tagihanList_".$reslokasi->lokasi."_".date('Y-m');

        // Check for ZipArchive support (Required for Excel2007 .xlsx)
        if (class_exists('ZipArchive') && class_exists('XMLWriter')) {
            $writerType = 'Excel2007';
            $fileExt = '.xlsx';
        } else {
            $writerType = 'Excel5';
            $fileExt = '.xls';
        }

        $filepath = 'public/report/'.$namafile.$fileExt;

        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("SIMKOS System")
                                     ->setLastModifiedBy("SIMKOS System")
                                     ->setTitle("Unpaid Bills Report")
                                     ->setSubject("Unpaid Bills Report")
                                     ->setDescription("Report of unpaid bills generated by SIMKOS.")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Report");

        // Add Header Data
        $objPHPExcel->setActiveSheetIndex(0);
        $sheet = $objPHPExcel->getActiveSheet();
        $sheet->setTitle('Daftar Tagihan');

        // Style: Header Title
        $sheet->setCellValue('A1', 'DAFTAR TAGIHAN BELUM BAYAR');
        $sheet->setCellValue('A2', 'Lokasi: ' . $reslokasi->lokasi);
        $sheet->setCellValue('A3', 'Periode: ' . date('F Y'));

        $sheet->mergeCells('A1:E1');
        $sheet->mergeCells('A2:E2');
        $sheet->mergeCells('A3:E3');

        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(12);

        // Table Header
        $row = 5;
        $headers = array('NO', 'Nama Kamar', 'Nama Penghuni', 'Tgl Mulai Inap', 'Detil Tagihan');
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col.$row, $header);
            $col++;
        }

        // Set Column Widths
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setWidth(50); // Fixed width for description to force wrapping

        // Style: Table Header Row (Blue background, White text, Bold)
        $headerStyle = array(
            'font' => array('bold' => true, 'color' => array('rgb' => 'FFFFFF')),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '438EB9') // Matching Ace Admin Blue
            ),
            'borders' => array(
                'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
        $sheet->getStyle('A'.$row.':E'.$row)->applyFromArray($headerStyle);

        $row++;

        // Fetch Data
		$str="";
		if ($jenis_sewa=="Bulanan"){
			$str="select  @nom:=@nom+1 as NO,p.idpendaftaran, p.tglmulai,a.`nama`, k.labelkamar  FROM pendaftaran p, kamar k, anak_kost a WHERE  p.`IDKAMAR`=k.`IDKAMAR` AND p.`IDANAKKOST`=a.`IDANAKKOST` AND   p.`IDLOKASI`=".$lokasi." AND  p.idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_bulanan WHERE  thnbln_tagihan ='".date('Ym')."' )  AND checkout=0 order by NO";
		}else{
			$str="select  @nom:=@nom+1 as NO,p.*,a.`nama`, k.labelkamar  FROM pendaftaran_tahunan p, kamar k, anak_kost a WHERE  p.`IDKAMAR`=k.`IDKAMAR` AND p.`IDANAKKOST`=a.`IDANAKKOST` AND   p.`IDLOKASI`=".$lokasi." AND  p.idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_tahunan WHERE  tahun_tagihan ='".date('Y')."' )  AND checkout=0 ";
		}

		$this->db->query("set @nom=0;");
		$query = $this->db->query($str)->result();
		
		if ($jenis_sewa=="Bulanan"){
			foreach($query as $rowXls){
				$dd_tglMulai=substr($rowXls->tglmulai,8,2);
				$mm_tglMulai=substr($rowXls->tglmulai,5,2);
				$yy_tglMulai=substr($rowXls->tglmulai,0,4);
				$tag="";
				$x=intval($yy_tglMulai.$mm_tglMulai);
				for ($x;$x<=intval(date('Ym'));$x++){
					$x=$yy_tglMulai.$mm_tglMulai;
					$strLoopPeriod=$yy_tglMulai."-".$mm_tglMulai."-".$dd_tglMulai;
					$cekRow=$this->db->query("select count(*) cek from bayar_bulanan where idpendaftaran='".$rowXls->idpendaftaran."' and thnbln_tagihan='$x'")->row();
					if ($cekRow->cek <=0){
						$interval = date_diff(date_create($strLoopPeriod),date_create() );
						$intervalbln=$interval->format("%m");
						$intervalhr=$interval->format("%d");
						$denda="";
						if ($intervalbln>=1){
							$denda="1 bulan";
						}else{
							if ($strLoopPeriod>date('Y-m-d')){
								$hariDenda=0;
								$denda="Belum telat. (tagihan keluar tgl :".$strLoopPeriod.")";
							}else{
								$hariDenda=$intervalhr;
								$denda=" $hariDenda Hari";
							}
						}
                        // Use string key for arrBulan because keys are "01", "02", etc.
						$tag.="Tagihan : ". (isset($arrBulan[$mm_tglMulai]) ? $arrBulan[$mm_tglMulai] : $mm_tglMulai) ." ".$yy_tglMulai.", Telat  : ".$denda." \n";
					}
					
					$mm_tglMulai=intval($mm_tglMulai)+1;
					if ($mm_tglMulai>12) {
						$mm_tglMulai=1;
						$yy_tglMulai+=1;
					}
					$mm_tglMulai=(strlen($mm_tglMulai)<=1?"0".$mm_tglMulai:$mm_tglMulai);
				}
				
                $sheet->setCellValue('A'.$row, $rowXls->NO);
                $sheet->setCellValue('B'.$row, strtoupper($rowXls->labelkamar));
                $sheet->setCellValue('C'.$row, $rowXls->nama);
                $sheet->setCellValue('D'.$row, $rowXls->tglmulai);
                $sheet->setCellValue('E'.$row, $tag);
                $row++;
			}
		} else { // Tahunan
			foreach($query as $rowXls){
				$noreg=$rowXls->IDPENDAFTARAN;
				$qkamar = $this->db->query("select * from kamar where idkamar=".$rowXls->IDKAMAR)->row();	
				$rsDendaThn = $this->db->query("select nominal, hari_ke from denda where id=1")->row();
				$hari_ke_denda=$rsDendaThn->hari_ke;
				$denda=$rsDendaThn->nominal;

				$tagihan= $qkamar->TARIFTAHUNAN - $rowXls->diskon;	
				$tgldaftarFull=$rowXls->TGLDAFTAR;	
				$thnMulai=date('Y', strtotime($tgldaftarFull));
				$mmdd_mulai=date('m-d', strtotime($tgldaftarFull));
				$ymd_jatuhtempo=""; $muncul_denda="";
				$thnloop=$thnMulai;
				$tag="";
				
				for ($thnloop=$thnMulai;$thnloop<=date('Y');$thnloop++){	
					$hariDenda=0; $denda_ket="";
					$ymd_jatuhtempo=$thnloop."-".$mmdd_mulai;

					$cekbayar_sewa=$this->db->query("select * from bayar_tahunan where idpendaftaran='$noreg' and idlokasi=".$rowXls->IDLOKASI." and tahun_tagihan='".$thnloop."'");

					if ($cekbayar_sewa->num_rows()<=0) {
						$sts_sewa="Belum Lunas";
						$muncul_denda=strftime("%Y-%m-%d", strtotime(strftime("%Y-%m-%d", strtotime($ymd_jatuhtempo))." + $hari_ke_denda day"));
						$interval = date_diff(date_create($muncul_denda),date_create() );
						$intervalthn=intval($interval->format("%Y"));
						$intervalbln=$interval->format("%m");
						$intervalhr=$interval->format("%d");

						if ($thnloop <= date('Y') ) {
							if ($intervalthn >=1){
								$hariDenda=$intervalthn*12*30;
								$denda_ket="Telat ".$intervalthn." tahun";
							}elseif ($intervalbln>=1){
								$hariDenda=$intervalbln*30;
								$denda_ket="Telat ".$intervalbln." bulan";
							}else{
								$hariDenda=$intervalhr;
								$denda_ket="Telat : $hariDenda Hari";
							}
							$denda_ket.=", Denda : ".$hariDenda * $denda;
						}else{
							$hariDenda=0;
							$denda_ket="Belum denda. (Denda mulai keluar tgl :".$muncul_denda.")";
						}

						$tag.="Tagihan : ".number_format($tagihan,0,',','.')."\n";
						$tag.=$denda_ket;
					}
				}

                $sheet->setCellValue('A'.$row, $rowXls->NO);
                $sheet->setCellValue('B'.$row, strtoupper($rowXls->labelkamar));
                $sheet->setCellValue('C'.$row, $rowXls->nama);
                $sheet->setCellValue('D'.$row, $rowXls->TGLDAFTAR);
                $sheet->setCellValue('E'.$row, $tag);
                $row++;
			}
		}

        // Apply styles to data cells
        $lastRow = $row - 1;
        $dataRange = 'A5:E'.$lastRow;

        // Borders
        $sheet->getStyle($dataRange)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

        // Vertical Alignment (Center) for all
        $sheet->getStyle($dataRange)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        // Horizontal Alignment
        $sheet->getStyle('A5:A'.$lastRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // NO
        $sheet->getStyle('D5:D'.$lastRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Date

        // Wrap Text for Details
        $sheet->getStyle('E5:E'.$lastRow)->getAlignment()->setWrapText(true);

        // Save
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $writerType);
        $objWriter->save($filepath);

		$data['isi']=$filepath;
		$data['status']='success';

		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}
		
		
	public function printInvoice($param=null){
		$header=$this->commonlib->pdfHeaderKuitansi();
		$footer=$this->commonlib->pdfFooterKuitansi();		
		$this->config->set_item('mysubmenu', 'mn634');
		//base url = rpt_pembayaran/res_pemasukan/pemasukan_
		$op=""; $title=""; $nmfile=""; $display=0; $view="";$jns_sewa=""; $strData=""; $qryRows="";$noreg="";
		$thnbln=""; //klo sewa mingguan/harian $thnbln=no urut
		if ($param != null){	//$Param dari display=0 kombinasi op_display
			$arr=explode("_",$param);			
			$jns_sewa=$arr[0];
			//$display=$arr[1];
			$noreg=$arr[1];	
			$thnbln=$arr[2];
			//if ($jns_sewa=="Bulanan"){
			//	$nourut=$arr[4];
			//}
			
		}
		$tagihan=0;$sts="";$strKamar="";$strData=""; $finvoice="";
		switch($jns_sewa){
			case "Tahunan": 
				$judul="TAHUNAN";
				$strData="select d.idpendaftaran, d.diskon,d.idkamar,d.tgldaftar, a.nama FROM `pendaftaran_tahunan` d, anak_kost a WHERE d.IDANAKKOST=a.IDANAKKOST  and d.idpendaftaran='$noreg'  ";
				//$finvoice="finvoice_tahunan";
				break;
			case "TahunanTagblnn": 
				$judul="TAGIHANBULANAN";
				$strData="select d.idpendaftaran, d.idkamar,d.diskon, a.nama, b.* FROM `pendaftaran` d, anak_kost a, invoice_bulanan b WHERE d.IDANAKKOST=a.IDANAKKOST and d.idpendaftaran = b.idpendaftaran and d.idpendaftaran='$noreg' and b.thnbln_tagihan='$thnbln'  ";
				//$finvoice="finvoice_bulanan";
				break;
			case "Bulanan": 
				$judul="BULANAN";
				$strData="select d.idpendaftaran, d.idkamar,d.diskon, a.nama, b.* FROM `pendaftaran` d, anak_kost a, invoice_bulanan b WHERE d.IDANAKKOST=a.IDANAKKOST and d.idpendaftaran = b.idpendaftaran and d.idpendaftaran='$noreg' and b.thnbln_tagihan='$thnbln'  ";
				//$finvoice="finvoice_bulanan";
				break;
			case "Mingguan":	
				$judul="MINGGUAN";
				$strData="select df.idpendaftaran, df.nama,m.jmlminggu, m.jmlminggu*(m.tarif-df.diskon) jmlTagihan, m.jmlbayar jmlbayarall, m.status, df.diskon FROM `daftar_sewa_mingguan` df, bayar_mingguan_master m WHERE df.idpendaftaran=m.nopendaftaran and   m.nopendaftaran='$noreg'";		
				//$finvoice="finvoice_mingguan";				
				break;
			case "Harian":	
				$judul="HARIAN";
				$strData="select df.idpendaftaran, df.nama,m.jmlhari, m.jmlhari*(m.tarif-df.diskon)  jmlTagihan, m.jmlbayar jmlbayarall , m.status, df.diskon FROM `daftar_sewa_harian` df, bayar_harian_master m	WHERE df.idpendaftaran=m.nopendaftaran and m.nopendaftaran=m.nopendaftaran and m.nopendaftaran='$noreg' ";	
				//$finvoice="finvoice_harian";
				break;
		}	
		
		$rsData=$this->db->query($strData)->row();	
		$data['rsData']=$rsData;
		//$strKamar="select * from kamar where idkamar = (select idkamar from ".($jns_sewa=="Bulanan"?"pendaftaran":($jns_sewa=="Mingguan"?"daftar_sewa_mingguan":"daftar_sewa_harian"))." where idpendaftaran='$noreg')";
		$strKamar="";
		if ($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"){
			$strKamar="select * from kamar where idkamar = ".$rsData->idkamar;
		}else{
			$strKamar="select * from kamar where idkamar = (select idkamar from ".($jns_sewa=="Mingguan"?"daftar_sewa_mingguan":"daftar_sewa_harian") ." where idpendaftaran='$noreg')";
		}
		$data['rsKamar']=$this->db->query($strKamar)->row();
		//$terbilang=$this->terbilang($rsData->jmlTagihan);
		$data['noreg']=$noreg;		
		//$data['display']=$display;
		$data['jns_sewa']=$jns_sewa;
		//$data['terbilang']=$terbilang;

		$data['param_4']=$thnbln;
		$data['thnbln']=$thnbln;
		$data['strData']=$strData;
		$data['nmfile']="invoice_".$jns_sewa."_".$noreg."_".$thnbln;
		$nmfile="kuitansi_".$jns_sewa."_".$noreg."_".$thnbln;
		$data["arrBulan"]=$this->arrBulan;
		$title="Cetak Invoice ".$jns_sewa;
		$view ="freport/finvoice";
		$data['title']=$title;
		
			$html=$header;
			$html.=$this->load->view($view , $data, true);
			$html.=$footer;
			$this->ci_pdf->pdf_create_report($html, $nmfile, 'a4', 'portrait');
			//echo $html;
		

	}

	public function mutasiDepo(){
		$this->config->set_item('mysubmenu', 'mn636');
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data['arrBulan'] = $this->arrBulan;
		$data['arrThn'] = $this->getYearArr();		
		$data['jenisLap'] = "mutasiDepo";		
		$data['jenisSewa'] = array ("Tahunan"=>"Tahunan", "Bulanan"=>"Bulanan`","Mingguan"=>"Mingguan", "Harian"=>"Harian");
		$data['opsi'] = array("Status"=>"Status" , "Lokasi"=> "Lokasi", "Periode"=> "Periode Daftar/Mulai Inap", "JenisSewa"=>"Jenis Sewa");
		$data['status'] = array("0"=> "Check In", "1"=> "Check Out");
		$title="Laporan Rekap Mutasi Deposit";
		$data["action"]="rpt_pembayaran/result_mutasi";		
		$this->template->set('breadcrumbs','<h1>Laporan <small> <i class="ace-icon fa fa-angle-double-right"></i> '.$title.'</small></h1>');
		$this->template->set('pagetitle',$title.' (View/Cetak)');
		$this->template->load('default','freport/filterMutasi',$data);
	}

	public function result_mutasi($param=null){
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();		
		$this->config->set_item('mysubmenu', 'mn636');

		$op=""; $title=""; $nmfile="";$display=0;$jenisLap="";$myOpsi=""; $jenisSewa="";$lokasi=0; $thn=""; $bln="";$view="";
		if ($param != null){	//$Param dari display=0 kombinasi op_thn_bln_display
			$arr=explode("_",$param);
			$display=$arr[0];
			$jenisLap=$arr[1];
			$myOpsi=$arr[2];
			$status=$arr[3];
			$lokasi=$arr[4];
			$jenisSewa=$arr[5];
			$thn=$arr[6];
			$bln=$arr[7];
			
		}else{			
			$display=$this->input->post('display');
			$jenisLap=$this->input->post('jenisLap');
			$myOpsi=$this->input->post('myOpsi');
			$status=$this->input->post('cbstatus');
			$lokasi=$this->input->post('cblokasi');
			$jenisSewa=$this->input->post('cbjenisSewa');
			$thn=$this->input->post('cbTahun');
			$bln=$this->input->post('cbBulan');
		}
		
		$lama="";$str="";
		$reslokasi=$this->transaksi_model->getLokasi($lokasi);
		//$arrField=array();
		//ID Reg, Nama, kamar (id, tipe?), periode sewa, status, tgl checkout
		$title="Laporan Mutasi Penghuni berdasarkan ";
		switch ($myOpsi){
			case "Lokasi":
			$title.="Lokasi ". $reslokasi->lokasi;
				$str="SELECT p.idpendaftaran, a.nama, k.labelkamar, 'Tahunan' `jenissewa`, p.thn_mulai `periodesewa`, p.checkout `status`, p.tgl_checkout `tglcheckout`
					FROM pendaftaran_tahunan p, anak_kost a, kamar k
					WHERE p.idanakkost = a.idanakkost and p.idkamar=k.IDKAMAR and p.idlokasi= ".$lokasi."
					 union                  
					SELECT p.idpendaftaran, a.nama, k.labelkamar, 'Bulanan' `jenissewa`, p.tglmulai `periodesewa`, p.checkout `status`, p.tgl_checkout `tglcheckout`
										FROM pendaftaran p, anak_kost a, kamar k
										WHERE p.idanakkost = a.idanakkost and p.idkamar=k.IDKAMAR and p.idlokasi= ".$lokasi."
					UNION
					SELECT p.idpendaftaran, p.nama, k.labelkamar, 'Mingguan' `jenissewa`, concat(p.tglmulai,' s.d ',p.tglakhir) `periodesewa`, p.checkout `status`, p.tglakhir `tglcheckout`
										FROM daftar_sewa_mingguan p , kamar k
										WHERE p.idkamar=k.IDKAMAR and p.idlokasi=  ".$lokasi."
					UNION
					SELECT p.idpendaftaran, p.nama, k.labelkamar, 'Harian' `jenissewa`, concat(tglcek_in,' s.d ',tglcek_out) `periodesewa`, p.checkout `status`, p.tglcek_out `tglcheckout`
										FROM daftar_sewa_harian p , kamar k
										WHERE p.idkamar=k.IDKAMAR and p.idlokasi= ".$lokasi;
				break;
			case "Periode":
				$str="SELECT p.idpendaftaran, a.nama, k.labelkamar, 'Tahunan' `jenissewa`, p.thn_mulai `periodesewa`, p.checkout `status`, p.tgl_checkout `tglcheckout`
					FROM pendaftaran_tahunan p, anak_kost a, kamar k
					WHERE p.idanakkost = a.idanakkost and p.idkamar=k.IDKAMAR and (p.thn_mulai = '".$thn."' or tgldaftar like '".$thn."-".$bln."%') 
					 union                  
					SELECT p.idpendaftaran, a.nama, k.labelkamar, 'Bulanan' jenissewa, tglmulai periodesewa, p.checkout `status`, p.tgl_checkout tglcheckout
										FROM pendaftaran p, anak_kost a, kamar k
										WHERE p.idanakkost = a.idanakkost and p.idkamar=k.IDKAMAR and (p.tglmulai like '".$thn."-".$bln."%'  or tgldaftar like '".$thn."-".$bln."%')
					UNION
					SELECT p.idpendaftaran, nama, k.labelkamar, 'Mingguan' jenissewa, concat(tglmulai,' - ',tglakhir) periodesewa, p.checkout `status`, p.tglakhir tglcheckout
										FROM daftar_sewa_mingguan p , kamar k
										WHERE p.idkamar=k.IDKAMAR and p.tglmulai like '".$thn."-".$bln."%'
					UNION
					SELECT p.idpendaftaran, nama, k.labelkamar, 'Harian' jenissewa, concat(tglcek_in,' - ',tglcek_out) periodesewa, p.checkout `status`, p.tglcek_out tglcheckout
										FROM daftar_sewa_harian p , kamar k
										WHERE p.idkamar=k.IDKAMAR and p.tglcek_in like '".$thn."-".$bln."%'";
				break;
			case "JenisSewa":	
				switch($jenisSewa){	
					case 'Tahunan': 
						$str="SELECT p.idpendaftaran, a.nama, k.labelkamar, 'Tahunan' `jenissewa`, p.thn_mulai `periodesewa`, p.checkout `status`, p.tgl_checkout `tglcheckout`
					FROM pendaftaran_tahunan p, anak_kost a, kamar k
					WHERE p.idanakkost = a.idanakkost and p.idkamar=k.IDKAMAR ";
						break;				
					case 'Bulanan': 
						$str="SELECT p.idpendaftaran, a.nama, k.labelkamar, 'Bulanan' `jenissewa`, p.tglmulai `periodesewa`, p.checkout `status`, p.tgl_checkout `tglcheckout`
										FROM pendaftaran p, anak_kost a, kamar k
										WHERE p.idanakkost = a.idanakkost and p.idkamar=k.IDKAMAR";
						break;
					case 'Mingguan': 
						$str="SELECT p.idpendaftaran, p.nama, k.labelkamar, 'Mingguan' `jenissewa`, concat(p.tglmulai,' s.d ',p.tglakhir) `periodesewa`, p.checkout `status`, p.tglakhir `tglcheckout`
										FROM daftar_sewa_mingguan p , kamar k
										WHERE p.idkamar=k.IDKAMAR ";
						break;
					case 'Harian': 
						$str="SELECT p.idpendaftaran, p.nama, k.labelkamar, 'Harian' `jenissewa`, concat(tglcek_in,' s.d ',tglcek_out) `periodesewa`, p.checkout `status`, p.tglcek_out `tglcheckout`
										FROM daftar_sewa_harian p , kamar k
										WHERE p.idkamar=k.IDKAMAR";
						break;
				}
				
				break;
			case "Status":	
				$str="SELECT p.idpendaftaran, a.nama, k.labelkamar, 'Tahunan' `jenissewa`, p.thn_mulai `periodesewa`, p.checkout `status`, p.tgl_checkout `tglcheckout`
					FROM pendaftaran_tahunan p, anak_kost a, kamar k
					WHERE p.idanakkost = a.idanakkost and p.idkamar=k.IDKAMAR and p.checkout= ".$status."
					 union                  
					SELECT p.idpendaftaran, a.nama, k.labelkamar, 'Bulanan' `jenissewa`, p.tglmulai `periodesewa`, p.checkout `status`, p.tgl_checkout `tglcheckout`
										FROM pendaftaran p, anak_kost a, kamar k
										WHERE p.idanakkost = a.idanakkost and p.idkamar=k.IDKAMAR and p.checkout= ".$status."
					UNION
					SELECT p.idpendaftaran, p.nama, k.labelkamar, 'Mingguan' `jenissewa`, concat(p.tglmulai,' s.d ',p.tglakhir) `periodesewa`, p.checkout `status`, p.tglakhir `tglcheckout`
										FROM daftar_sewa_mingguan p , kamar k
										WHERE p.idkamar=k.IDKAMAR and p.checkout= ".$status."
					UNION
					SELECT p.idpendaftaran, p.nama, k.labelkamar, 'Harian' `jenissewa`, concat(tglcek_in,' s.d ',tglcek_out) `periodesewa`, p.checkout `status`, p.tglcek_out `tglcheckout`
										FROM daftar_sewa_harian p , kamar k
										WHERE p.idkamar=k.IDKAMAR and p.checkout= ".$status;
				break;
		}	
		//$str.=" order by idpendaftaran ASC";
		$arrBulan= $this->arrBulan;
		
		$data['arrBulan'] = $arrBulan;
		$data['title']=$title;
		$data['bln']=$bln;
		$data['thn']=$thn;
		$data['lokasi']=$lokasi;
		$data['status']=$status;
		$data['jenisLap']=$jenisLap;
		$data['myOpsi']=$myOpsi;
		$data['jenisSewa']=$jenisSewa;
		$data['reslokasi']=$reslokasi;
		$data['display']=$display;		
		$nmfile="Laporan_mutasipenghuni_".$myOpsi.date('Ymd');
		$data['nmfile']=$nmfile;		
		$data['res']=$this->db->query($str)->result();
		$view="freport/frpt_mutasideposit";
		
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

	public function depoFilter(){	
		$this->config->set_item('mysubmenu', 'mn637');
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data["proses"]="depoRes";		
		$this->template->set('breadcrumbs','<h1>Laporan<small> <i class="ace-icon fa fa-angle-double-right"></i> Riwayat Mutasi Deposit Penyewa</small></h1>');
		$this->template->set('pagetitle','Riwayat Mutasi Deposit Penyewa');
		$this->template->load('default','freport/fjsonFilter', $data);
	}


	public function depo_detail($valkey){
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();		
		$this->config->set_item('mysubmenu', 'mn637');
		$arr=explode("_",$valkey);
		$display=$arr[0];
		$noreg=$arr[1];
		$res=$this->db->query("select * from deposit_master where idpendaftaran='".$noreg."'")->row();
		$jenis=$res->jenis_sewa;	
		$view="";$str="";
		switch ($jenis){
				case "Tahunan":

					$str="select m.idpendaftaran, m.idlokasi, a.nama, m.checkout, a.alamat_asal, k.idkamar, k.labelkamar,k.tarifbulanan,k.tariftahunan,m.thn_mulai, m.tgldaftar, year(thn_mulai) xthn, k.tarifmingguan, k.tarifharian, m.diskon, m.kwh_awal from pendaftaran_tahunan m, anak_kost a, kamar k  where m.`idanakkost` = a.`idanakkost`	  and  a.jenis_sewa='Tahunan' and m.idkamar = k.idkamar and m.idpendaftaran='$noreg'";
					break;
				case "Bulanan":
					$str="select m.idpendaftaran, m.idlokasi, a.nama, m.checkout,a.alamat_asal, k.idkamar, k.labelkamar,k.tarifbulanan,m.tglmulai, m.tgldaftar, day(last_day(tglmulai)) dd_akhir, day(tglmulai) dd_mulai , (day(last_day(tglmulai))-day(tglmulai)) selisih, month(tglmulai) bln, year(tglmulai) xthn, k.tarifmingguan, k.tarifharian, m.diskon, m.kwh_awal from pendaftaran m, anak_kost a, kamar k  where m.`idanakkost` = a.`idanakkost`	and m.idkamar = k.idkamar 	and m.idpendaftaran='$noreg'";

					break;
				
			}
		$query = $this->db->query($str)->row();		
		$data["str"]=$str;
		$data["res"]=$query;
		$data["noreg"]=$noreg;
		$data["display"]=$display;
		$data['lokasi'] =$this->transaksi_model->getLokasi($query->idlokasi);
		$nmfile="Laporan_detilmutasipenghuni_".$noreg;
		$data['nmfile']=$nmfile;		
		
		$view='freport/frpt_depo_'.$jenis;

		if ($display==0){
			$this->template->set('breadcrumbs','<h1>Laporan<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Kelola Mutasi Deposit</small></h1>');
			$this->template->set('pagetitle','Form Kelola Mutasi Deposit ');
			$this->template->load('default',$view, $data);
		}else{
			$html=$header;
			$html.=$this->load->view($view , $data, true);
			$html.=$footer;
			$this->ci_pdf->pdf_create_report($html, $nmfile, 'a4', 'portrait');
		}		
	}

public function printDepoReceipt($param=null){	//jenis, id_depo, id_detil/nokuit
		$header=$this->commonlib->pdfHeaderKuitansi();
		$footer=$this->commonlib->pdfFooterKuitansi();		
		$this->config->set_item('mysubmenu', 'mn635');
		
		$op=""; $title=""; $nmfile="";  $view=""; $strData=""; $qryRows="";
		$id_kuit=""; $jns_sewa=""; $id_depo="";$display=0;
		$sts="";$strKamar="";$strData="";
		if ($param != null){	//$Param dari display=0 kombinasi op_display
			$arr=explode("_",$param);			
			$jns_sewa=$arr[0];
			$display=$arr[1];
			$id_depo=$arr[2];	
			$id_kuit=$arr[3];						
		}
				
		switch($jns_sewa){
			case "Tahunan": 
				$judul="TAHUNAN";	
				$strData="select d.idlokasi, d.idpendaftaran, a.nama, d.idkamar,d.idlokasi, d.tgldaftar,  dm.jumlah_akumulasi, dm.setoran_awal, dm.status, dt.*  FROM `pendaftaran_tahunan` d, anak_kost a, deposit_master dm, deposit_detil dt  WHERE d.idPendaftaran=dm.idPendaftaran and d.idlokasi=dm.idlokasi and dm.id=dt.deposit_id and dm.jenis_sewa = 'Tahunan' and dm.id=".$id_depo." and  dt.id=".$id_kuit;
				
				break;
			case "Bulanan": 
				$judul="BULANAN";
				$strData="select d.idlokasi, d.idpendaftaran, a.nama, d.idkamar,d.idlokasi, d.tgldaftar,  dm.jumlah_akumulasi, dm.setoran_awal, dm.status, dt.*  FROM `pendaftaran` d, anak_kost a, deposit_master dm, deposit_detil dt  WHERE d.idPendaftaran=dm.idPendaftaran and d.idlokasi=dm.idlokasi and dm.id=dt.deposit_id and dm.jenis_sewa = 'Bulanan' and dm.id=".$id_depo." and  dt.id=".$id_kuit;
				
				break;
			
		}	
		
		//jumlah mutasi debet - kredit
		$strmutasi="SELECT 			    
			    SUM(CASE WHEN tipe = 'SETORAN' THEN jumlah ELSE 0 END) AS debet,
			    SUM(CASE WHEN tipe = 'PENARIMAN' THEN jumlah ELSE 0 END) AS kredit
			FROM 
			    deposit_detil
			where isfirstdepo<=0 and deposit_id=".$id_depo;
		$rsMutasi=$this->db->query($strmutasi)->row();
		$data['rsMutasi']=$rsMutasi;
		$rsData=$this->db->query($strData)->row();	
		$data['rsData']=$rsData;		
		$strKamar="";
		if ($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan" ){
			$strKamar="select * from kamar where idkamar = ".$rsData->idkamar;
		}else{
			$strKamar="select * from kamar where idkamar = (select idkamar from ".($jns_sewa=="Mingguan"?"daftar_sewa_mingguan":"daftar_sewa_harian") ." where idpendaftaran='$noreg')";
		}
		
		$data['rsKamar']=$this->db->query($strKamar)->row();
		$data['rsLokasi']=$this->db->query("select * from lokasi where id=".$rsData->idlokasi)->row();
		$terbilang=$this->terbilang($rsData->jumlah);			
		$data['display']=$display;
		$data['id_kuit']=$id_kuit;
		$data['id_depo']=$id_depo;	
		$data['terbilang']=$terbilang;

		
		$data['strData']=$strData;
		$nmfile="kuitansiDepo_".$jns_sewa."_".$id_depo."_".$id_kuit;
		$data['nmfile']=$nmfile;
		
		//$data["arrBulan"]=$this->arrBulan;
		$title="Cetak Kuitansi Mutasi Deposit ";
		$view ="freport/fkuitansi_depo";
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
