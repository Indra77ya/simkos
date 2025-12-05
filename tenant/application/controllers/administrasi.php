<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class administrasi extends MY_App {
	var $branch = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->config->set_item('mymenu', 'mn2');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('file');
		$this->load->library('CI_Pdf');
		$this->auth->authorize();
	}
	
	public function history($param=null){
		$header=$this->commonlib->reportHeader();
		$footer=$this->commonlib->reportFooter();		
		$this->config->set_item('mysubmenu', 'mn22');

		$tagihan=0;$sts="";
		$display=0;
		if ($param != null){	//$Param dari display=0 kombinasi op_display
			$display=1;	
		}
		$noreg=$this->session->userdata('auth')->IDPENDAFTARAN;
		$jns_sewa=$this->session->userdata('auth')->JENIS_SEWA;
		$lokasi=$this->session->userdata('auth')->IDLOKASI;
		$idanakkost=$this->session->userdata('auth')->IDANAKKOST;
		switch($jns_sewa){
			case "Tahunan": 
				$judul="TAHUNAN";
				$strData="select m.idpendaftaran, a.nama, a.alamat_asal, a.notelp,m.checkout, k.idkamar, k.labelkamar, m.tgldaftar,k.tariftahunan, m.tgldaftar, day(last_day(tgldaftar)) dd_akhir, day(tgldaftar) dd_mulai , (day(last_day(tgldaftar))-day(tgldaftar)) selisih, month(tgldaftar) bln, year(tgldaftar), k.tarifmingguan,k.tarifharian
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
		
		$data['strData']=$strData;
		$data['sBiaya']=$sBiaya;
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
		$view ="fadministrasi/vhistory";
		$data['title']=$title;
		if ($display==0){
			$this->template->set('breadcrumbs','<h1>Administrasi <small> <i class="ace-icon fa fa-angle-double-right"></i> '.$title.'</small></h1>');
			$this->template->set('pagetitle',$title.' (View/Cetak)');		
			$this->template->load('default',$view ,$data);
		}else{
			$html=$header;
			$html.=$this->load->view($view , $data, true);
			$html.=$footer;
			$this->ci_pdf->pdf_create_report($html, $nmfile, 'a4', 'portrait');
		}
	}
	public function index()
	{	$this->config->set_item('mysubmenu', 'mn21');
		$jns_sewa=$this->session->userdata('auth')->JENIS_SEWA;		
		$noreg=$this->session->userdata('auth')->IDPENDAFTARAN;		
		$idlokasi=$this->session->userdata('auth')->IDLOKASI;	
		$arrJns_blnn=array("Tagihan Sewa Bulanan" => "Tagihan Sewa Bulanan");
		$arrJns_thnn=array("Tagihan Sewa Tahunan" => "Tagihan Sewa Tahunan", "Tagihan Air & Listrik"=>"Tagihan Air & Listrik");
		$data['jns_bayar']=($jns_sewa=="Bulanan"?$arrJns_blnn:$arrJns_thnn);		
		
		$data['jns_sewa']=$jns_sewa;		
		$data['noreg']=$noreg;		
		$data['idlokasi']=$idlokasi;	
		$data['row']=$this->db->query("select * from ".($jns_sewa=="Bulanan"?"pendaftaran":"pendaftaran_tahunan")." where idpendaftaran='".$noreg."' and idlokasi=".$idlokasi)->row();
		$data['arrBulan'] = $this->arrBulan;
		$data['arrThn'] = $this->getYearArr();
		
		$this->template->set('breadcrumbs','<h1>Administrasi <small> <i class="ace-icon fa fa-angle-double-right"></i> Konfirmasi Pembayaran</small></h1>');
		$this->template->set('pagetitle',"Konfirmasi Pembayaran");		
		$this->template->load('default',"fadministrasi/vconfirm" ,$data);
	}

public function json_data(){

			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str="select * from konfirmasi where jenis_sewa='".$this->session->userdata('auth')->JENIS_SEWA."' and idPendaftaran='".$this->session->userdata('auth')->IDPENDAFTARAN."' and idlokasi=".$this->session->userdata('auth')->IDLOKASI." and status_cek=0";
			

						
			if ( $_GET['sSearch'] != "" )
			{
				$str.= " and  (periode_tagihan like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' ";				
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
					'JENIS_BAYAR'=>$row->jenis_bayar,
					'PERIODE_TAGIHAN'=>$row->periode_tagihan,
					'METODE_BAYAR'=>$row->metode_bayar,
					'JMLBAYAR'=>$row->jmlBayar,
					'BUKTI'=>'<img src="'.($row->bukti==""?base_url('assets/images/none.gif'):base_url('assets/bukti/'.$row->bukti)).'" width="150" height="150">'				
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


	public function saveConfirm(){
		$isi="awal<br>";
		
			$this->load->library('form_validation');
			$state=$this->input->post('state');
			
				$rules = array(				
					array(
						'field' => 'jmlbayar',
						'label' => 'JUMLAH_BAYAR',
						'rules' => 'trim|xss_clean|required|numeric'
					)
						);

		

			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Field %s harus diisi.');
			$this->form_validation->set_message('numeric', 'Field %s harus diisi angka.');
			$respon = new StdClass();
			if ($this->form_validation->run() == TRUE){
				$isi.="masuk form valid<br>";
				$state=$this->input->post('state');
				
				$nama_file = $_FILES['userfile']['name'];			
				$config['file_name'] = $nama_file;
				$config['upload_path'] = './assets/bukti';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['max_size']    = '1024';
				$config['max_width']  = '1400';
				$config['max_height']  = '2000';
				$this->load->library('upload', $config);
				$error='';
				$dataUpload='';
				
				$this->db->trans_begin();
				try {	
					$filenya="";
					$data=array();
					$periode=$this->input->post('cbTahun').$this->input->post('cbBulan');
					if ($this->input->post('jenis_bayar')=="Tagihan Sewa Tahunan"){
						$periode=$this->input->post('cbTahun');
					}
				if (  $this->upload->do_upload('userfile')){
						$dataUpload = $this->upload->data();
						$filenya= $dataUpload['file_name'];	
					
				
				switch ($this->input->post('metodeBayar')){
						
						case "transfer":
							$data = array(
							'jenis_sewa' => $this->session->userdata('auth')->JENIS_SEWA,
							'jenis_bayar' => $this->input->post('jenis_bayar'),
							'periode_tagihan' => $periode ,
							'idPendaftaran' => $this->session->userdata('auth')->IDPENDAFTARAN,
							'idlokasi' => $this->session->userdata('auth')->IDLOKASI,							
							'tglBayar' =>date('Y-m-d'),		//as tgl buat konfirmasi
							'jmlBayar' => $this->input->post('jmlbayar'),
							'bukti' => $filenya,	
							'keterangan' => $this->input->post('keterangan'),
							'metode_bayar' =>$this->input->post('metodeBayar'),
							'tgl_transfer' =>$this->input->post('tglTransfer'),
							'dari_bank' =>$this->input->post('trBank'),
							'norek_pengirim' =>$this->input->post('trNorek1'),
							'nama_pengirim' =>$this->input->post('trAtasNama'),
							'idrek_penerima' =>$this->input->post('cbRek')
						);
							break;
						case "kartu":
							$data = array(
							'jenis_sewa' => $this->session->userdata('auth')->JENIS_SEWA,
							'jenis_bayar' => $this->input->post('jenis_bayar'),
							'periode_tagihan' => $periode ,
							'idPendaftaran' => $this->session->userdata('auth')->IDPENDAFTARAN,
							'idlokasi' => $this->session->userdata('auth')->IDLOKASI,							
							'tglBayar' =>date('Y-m-d'),
							'jmlBayar' => $this->input->post('jmlbayar'),
							'bukti' => $filenya,	
							'keterangan' => $this->input->post('keterangan'),
							'metode_bayar' =>$this->input->post('metodeBayar'),
							'jenis_kartu' =>$this->input->post('krJenis') ,
							'no_kartu' =>$this->input->post('krNoCard') ,
							'nmpemilik_kartu' =>$this->input->post('krNama') ,
							'no_struk' =>$this->input->post('krNoStruk') ,
							'tgl_struk' =>$this->input->post('krTglStruk')
						);
							break;
					}
					
				}
					//$this->db->set($data);
						if ($this->db->insert('konfirmasi',$data) ){
							$this->db->trans_commit();
							$respon->status = 'success';
						} else {
							throw new Exception("gagal simpan");
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
			
			redirect('administrasi/index');
		//} 
		
	}
		
}
