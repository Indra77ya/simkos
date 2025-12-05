<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class e_pembayaran extends MY_App {

	function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->config->set_item('mymenu', 'mn3');
			
		$this->auth->authorize();
	}
	
	public function entri(){	
		$data["proses"]="entri";
		if ($this->session->userdata('auth')->ROLE=="Admin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$this->config->set_item('mysubmenu', 'mn31');	
		$this->template->set('breadcrumbs','<h1>Pembayaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Entri Pembayaran</small></h1>');
		$this->template->set('pagetitle','Form Entri Pembayaran ');
		$this->template->load('default','ftransaksi/fbyrFilter', $data);
	}

	public function editing(){	
		$this->config->set_item('mysubmenu', 'mn32');	
		if ($this->session->userdata('auth')->ROLE=="Admin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data["proses"]="edit";
		$this->template->set('breadcrumbs','<h1>Pembayaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Edit Editing Data Pembayaran</small></h1>');
		$this->template->set('pagetitle','Form Editing Data Pembayaran ');
		$this->template->load('default','ftransaksi/fbyrFilter', $data);
	}

	public function bayar_rapel(){	
		$this->config->set_item('mysubmenu', 'mn33');	
		$data["proses"]="rapel";
		$this->template->set('breadcrumbs','<h1>Pembayaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Pembayaran Rapel</small></h1>');
		$this->template->set('pagetitle','Form Pembayaran Rapel');
		$this->template->load('default','ftransaksi/fbyrFilter', $data);
	}


	public function checkout(){	
		$this->config->set_item('mysubmenu', 'mn34');
		if ($this->session->userdata('auth')->ROLE=="Admin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data["proses"]="checkout";
		$this->template->set('breadcrumbs','<h1>Pembayaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Proses Check Out</small></h1>');
		$this->template->set('pagetitle','Form Proses Check Out');
		$this->template->load('default','ftransaksi/fbyrFilter', $data);
	}
	
	public function forceCheckOut($valkey){
		$this->config->set_item('mysubmenu', 'mn34');
		$arrVal=explode('_', $valkey);
		$jenis=$arrVal[0];		
		$noreg=$arrVal[1];
		$idlokasi=$arrVal[2];
		$nmTabelBayar="";$nmTabel="";$fieldDate="";
		switch ($jenis){
				case "Bulanan":					
					$nmTabel="pendaftaran";
					$fieldDate="tgl_checkout";
					$nmtableBayar="bayar_bulanan";					
					break;
				case "Mingguan":					
					$nmTabel="daftar_sewa_mingguan";
					$fieldDate="tglAkhir";
					$nmTabelBayar="bayar_mingguan_master";
					break;
				case "Harian":
					$nmTabelBayar="bayar_harian_master";
					$nmTabel="daftar_sewa_harian";
					$fieldDate="tglCek_out";
					break;
			}
		$str="update cekkamar set terisi=terisi-1, last_checkout_date='".date('Y-m-d')."' where idkamar=(select distinct idkamar from $nmTabel where idlokasi=".$idlokasi." and  idpendaftaran='".$noreg."')";
		if ($this->db->query($str)){
				$this->db->trans_commit();	
				$strCheckOut="update $nmTabel set checkout=1, ".$fieldDate."='".date('Y-m-d')."' where idlokasi=".$idlokasi." and  idPendaftaran='".$noreg."'"; 
				$this->db->query($strCheckOut);
				$this->db->trans_commit();
		}
		$data["proses"]="checkout";
		$this->template->set('breadcrumbs','<h1>Pembayaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Proses Check Out</small></h1>');
		$this->template->set('pagetitle','Form Proses Check Out');
		$this->template->load('default','ftransaksi/fbyrFilter', $data);

	}
	public function doCheckOut(){	
		$this->config->set_item('mysubmenu', 'mn34');
		$jenis = $this->input->post('jenis');		
		$noreg = $this->input->post('noreg');	
		$idlokasi = $this->input->post('idlokasi');	
		$nmTabelBayar="";$nmTabel="";$fieldDate="";
		switch ($jenis){
				case "Bulanan":					
					$nmTabel="pendaftaran";
					$fieldDate="tgl_checkout";
					$nmtableBayar="bayar_bulanan";					
					break;
				case "Mingguan":					
					$nmTabel="daftar_sewa_mingguan";
					$fieldDate="tglAkhir";
					$nmTabelBayar="bayar_mingguan_master";
					break;
				case "Harian":
					$nmTabelBayar="bayar_harian_master";
					$fieldDate="tglCek_out";
					$nmTabel="daftar_sewa_harian";
					break;
			}
		//cek tagihan status jika belum lunas, blm bisa check out, utk yg bulanan cek pembayaran periode bulan ini
		$cekLunas=($jenis=="Bulanan"?" select count(*) cek from bayar_bulanan where idlokasi = ".$idlokasi." and idpendaftaran = '".$noreg."' and thnbln_tagihan='".date('Ym')."'" : "select status from $nmTabelBayar where idlokasi=".$idlokasi." and nopendaftaran = '".$noreg."'" );
		$respon['cek']=$cekLunas;
		$query = $this->db->query($cekLunas)->row();
		$cek=($jenis=="Bulanan"? $query->cek : (sizeof($query)>0?$query->status:"Belum Lunas"));

		if ($cek=="Lunas" || $cek>=1){
			$str="update cekkamar set terisi=terisi-1, last_checkout_date='".date('Y-m-d')."' where idkamar=(select distinct idkamar from $nmTabel where idlokasi =".$idlokasi." and idpendaftaran='".$noreg."')";
			if ($this->db->query($str)){
				$this->db->trans_commit();	
				$strCheckOut="update $nmTabel set checkout=1, ".$fieldDate."='".date('Y-m-d')."' where idlokasi=".$idlokasi." and idPendaftaran='".$noreg."'"; 
				$this->db->query($strCheckOut);
				$this->db->trans_commit();
				$respon['status'] = 'success';
				$respon['pesan'] = 'Proses Check Out berhasil';
			}else{
				$respon['status'] = 'error';
				$respon['errormsg'] = 'Invalid data';
				$respon['pesan'] = 'Invalid data';
			}
		}else{
			$respon['status'] = 'error';
			$respon['errormsg'] = 'Invalid Data';
			$respon['pesan'] = 'Pembayaran Sewa Belum Lunas. Silahkan melakukan Pembayaran terlebih dahulu';
		}

		echo json_encode($respon);
	}

	public function json_data($proses){
		//if ($this->input->is_ajax_request()){
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
					$str="select p.idpendaftaran, a.nama, a.alamat_asal, a.notelp as nomer_telepon, p.tgldaftar as tgl1, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar from pendaftaran p, anak_kost a  where  p.idlokasi=".$lokasi." and p.idAnakKost=a.idAnakkost and checkout=0 ";
					$nmtableBayar="bayar_bulanan";					

					break;
				case "Mingguan":
					$str="Select idpendaftaran, nama, alamat_asal, telp as nomer_telepon, tglmulai as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_mingguan.idkamar) nmkamar from daftar_sewa_mingguan where idlokasi=".$lokasi." and checkout=0";
					$nmtableBayar="bayar_mingguan_master";
					
					break;
				case "Harian":
					$str="Select idpendaftaran, nama, alamat_asal, telp as nomer_telepon, tglcek_in as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_harian.idkamar) nmkamar from daftar_sewa_harian where  idlokasi=".$lokasi." and checkout=0";
					$nmtableBayar="bayar_harian_master";
					
					break;
			}
			
			switch($proses){
				case "entri": $this->config->set_item('mysubmenu', 'mn31'); break;
				case "edit": $this->config->set_item('mysubmenu', 'mn32'); break;
				case "checkout": $this->config->set_item('mysubmenu', 'mn33'); break;

			}
						
			if ( $_GET['sSearch'] != "" )
			{
				
				if ($jenis=="Bulanan"){
					$str.= " and  (a.nama like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or p.idpendaftaran like '%".mysql_real_escape_string( $_GET['sSearch'] )."%') ";
				}else{
					$str.= " and  (nama like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or idpendaftaran like '%".mysql_real_escape_string( $_GET['sSearch'] )."%') ";
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
					'NAMA'=>($proses=="checkout"?'<a href="javascript:void(0)" onclick="doCheckOut(\''.$jenis.'\', \''.$row->idpendaftaran.'\', \''.$lokasi.'\')" data-id="'.$row->idpendaftaran.'"><b>'.$row->nama.'</b></a> ' : '<a href="'.base_url('e_pembayaran/form_'.$proses.'/'.$jenis.'_'.$row->idpendaftaran.'_'.$lokasi).'">'.$row->nama.'</a> '),
					'idpendaftaran'=>($proses=="checkout"?'<a href="javascript:void(0)" onclick="doCheckOut(\''.$jenis.'\', \''.$row->idpendaftaran.'\', \''.$lokasi.'\')" data-id="'.$row->idpendaftaran.'"><b>'.$row->idpendaftaran.'</b></a> ' : '<a href="'.base_url('e_pembayaran/form_'.$proses.'/'.$jenis.'_'.$row->idpendaftaran.'_'.$lokasi).'">'.$row->idpendaftaran.'</a> '),				
					'ALAMAT'=>$row->alamat_asal,
					'TGLDAFTAR'=>$row->tgl1,
					'NOTELP'=>$row->nomer_telepon,
					'ACTION'=>($proses=="checkout"?'<a href="javascript:void(0)" onclick="doCheckOut(\''.$jenis.'\', \''.$row->idpendaftaran.'\', \''.$lokasi.'\')" data-id="'.$row->idpendaftaran.'"><i class="fa fa-credit-card " title="Edit"></i></a> ' : '<a href="'.base_url('e_pembayaran/form_'.$proses.'/'.$jenis.'_'.$row->idpendaftaran).'_'.$lokasi.'"><i class=" fa fa-credit-card" title="Proses '. $proses .'"?"></i></a> ')


					
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
	
	
	public function form_entri($valkey){
		$this->config->set_item('mysubmenu', 'mn31');	
		$arrVal=explode('_', $valkey);
		$jenis=$arrVal[0];		
		$noreg=$arrVal[1];
		$idlokasi=$arrVal[2];
		$view="";$str="";
		switch ($jenis){
				case "Bulanan":
					$str="select m.idpendaftaran, m.idlokasi, a.nama, a.alamat_asal, k.idkamar, k.labelkamar,k.tarifbulanan,m.tglmulai, m.tgldaftar, day(last_day(tglmulai)) dd_akhir, day(tglmulai) dd_mulai , (day(last_day(tglmulai))-day(tglmulai)) selisih, month(tglmulai) bln, year(tglmulai) xthn, k.tarifmingguan, k.tarifharian, m.diskon, m.kwh_awal from pendaftaran m, anak_kost a, kamar k  where m.`idanakkost` = a.`idanakkost`	and m.idkamar = k.idkamar 	and m.idpendaftaran='$noreg' and m.idlokasi=".$idlokasi;				

					break;
				case "Mingguan":
					$str="select d.idpendaftaran,d.idlokasi, d.nama, d.alamat_asal, k.idkamar, k.labelkamar, k.tarifmingguan, d.tglmulai, d.tglakhir, d.lama, d.diskon from daftar_sewa_mingguan d, kamar k  where d.idkamar=k.idkamar and d.idpendaftaran='$noreg'  and d.idlokasi=".$idlokasi;				
					break;
				case "Harian":
					$str="select d.idpendaftaran,d.idlokasi, d.nama, d.alamat_asal, k.idkamar, k.labelkamar, k.tarifharian, d.tglcek_in, d.tglcek_out, d.lama, d.diskon from daftar_sewa_harian d, kamar k where d.idkamar=k.idkamar and d.idpendaftaran='$noreg' and d.idlokasi=".$idlokasi;
					
					break;
			}
		$query = $this->db->query($str)->row();
		$data["arrIntBln"]=$this->arrIntBln;		
		$data["arrBulan"]=$this->arrBulan;		
		$data["str"]=$str;		
		$data["res"]=$query;		
		$data["noreg"]=$noreg;	
		$data['lokasi'] =$this->transaksi_model->getLokasi($idlokasi);
		$this->template->set('breadcrumbs','<h1>Pembayaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Entri Pembayaran</small></h1>');
		$this->template->set('pagetitle','Form Entri Pembayaran ');
		$this->template->load('default','ftransaksi/fbyr_'.$jenis, $data);
	}

	
	public function form_bulanan_detil(){
		$this->config->set_item('mysubmenu', 'mn31');	
		$noreg=$this->input->post("noreg");
		$data['noreg']=$noreg;
		$data['idlokasi']=$this->input->post("idlokasi");
		$data['idkamar']=$this->input->post("idkamar");
		$data['byrke']=$this->input->post("byrke");
		$data['thnbln']=$this->input->post("thnbln");
		$data['tagihan']=$this->input->post("tagihan");
		//kwh_awal jika pembayaran ke 1, bayar > 1 ambil dari bayar_bulanan
		$res_kwh_master = $this->db->query("select * from kwh_var where id=1")->row();	
		if ($this->input->post("byrke")<=1) {
			$str="select kwh_awal kwhnya from pendaftaran where idpendaftaran='$noreg' ";
		}else{
			//ambil dari tagihan sebelumnya
			$byrke_sblm=$this->input->post("byrke") - 1;
			$str="select ifnull(kwh_akhir,0) kwhnya from bayar_bulanan where idpendaftaran='$noreg' and pembayaran_ke=".$byrke_sblm;
		}
		$data['str']=$str;
		$data['res_kwh_master']=$res_kwh_master;
		$data['res_kwh_akhir']=$this->db->query($str)->row();
		$data['hrdenda']=($this->input->post("byrke")==1?0:$this->input->post("hrdenda"));
		$data["arrIntBln"]=$this->arrIntBln;		
		$data["arrBulan"]=$this->arrBulan;	
		$data["mmIdk"]=substr($this->input->post("thnbln"),4,2);
		$data["yyIdk"]=substr($this->input->post("thnbln"),0,4);

		$query = $this->db->query("select nominal from denda where id=1")->row();		
		$qkamar = $this->db->query("select * from kamar where idkamar=".$this->input->post("idkamar"))->row();		
		$data["denda"]=$query->nominal;
		$data["nmkamar"]=$qkamar->LABELKAMAR;

		if ($this->input->is_ajax_request()){
			
			$this->template->load('ajax','ftransaksi/fbyr_detilbulanan', $data);
		} else {			
			$this->template->set('pagetitle','Form Bayar Bulanan ');
			$this->template->load('default','ftransaksi/fbyr_detilbulanan', $data);
		}
	}

	public function saveBayarBulanan(){
		$cekError="";
		$notrans=date("YmdHis");
		$tglBayarNow=date("Y-m-d");
		$tagihan=($this->input->post('bayarKe')<=1?$this->input->post('tagBlnn'):$this->input->post('tagihan'));
		//$tagihan => total tagihan sdh include denda
		$denda=($this->input->post('bayarKe')<=1?0:($this->input->post('dendaAwal') - $this->input->post('kurangiDenda')));
		$jmlBayar=($this->input->post('jmlBayar') >=$tagihan?$tagihan :$this->input->post('jmlBayar') );

			if ($this->input->is_ajax_request()){	
			
			$this->load->library('form_validation');			
			$rules = array(				
					
						array(
						'field' => 'jmlBayar',
						'label' => 'JUMLAH_BAYAR',
						'rules' => 'trim|xss_clean|required'
					)
			);
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Field %s harus diisi.');
			$this->form_validation->set_message('numeric', 'Field %s harus diisi angka.');
			$respon = new StdClass();
			$detil_insert_id ="";
			if ($this->form_validation->run() == TRUE){
				
				$this->db->trans_begin();
				try {						
					
					$dataDetilBlnn = array();
					//nilai denda sdh include dlm tagihan (biaya sewa kamar+biaya tambahan+denda), bukan tagihan + denda sebagai pemasukan, no_urut auto_increment
					switch ($this->input->post('metodeBayar')){
						case "tunai": 
							$dataDetilBlnn = array(							
							'idPendaftaran' => $this->input->post('noreg'),	
							'idlokasi' => $this->input->post('idlokasi'),
							'pembayaran_ke' => $this->input->post('bayarKe'),
							'thnbln_tagihan' => $this->input->post('thnblnTag'),						
							'tglBayar' =>$tglBayarNow,	
							'jmlBayar' =>$jmlBayar,	
							'petugas' =>$this->session->userdata('auth')->USERNAME,
							'metode_bayar' =>$this->input->post('metodeBayar')							
						);	
							break;
						case "transfer": 
							$dataDetilBlnn = array(							
							'idPendaftaran' => $this->input->post('noreg'),	
							'idlokasi' => $this->input->post('idlokasi'),
							'pembayaran_ke' => $this->input->post('bayarKe'),
							'thnbln_tagihan' => $this->input->post('thnblnTag'),						
							'tglBayar' =>$tglBayarNow,	
							'jmlBayar' =>$jmlBayar,	
							'petugas' =>$this->session->userdata('auth')->USERNAME,
							'metode_bayar' =>$this->input->post('metodeBayar'),	
							'tgl_transfer' =>$this->input->post('tglTransfer'),	
							'dari_bank' =>$this->input->post('trBank'),	
							'norek_pengirim' =>$this->input->post('trNorek1'),	
							'nama_pengirim' =>$this->input->post('trAtasNama'),	
							'idrek_penerima' =>$this->input->post('cbRek')
						);	
							break;
						case "kartu": 
							$dataDetilBlnn = array(							
							'idPendaftaran' => $this->input->post('noreg'),	
							'idlokasi' => $this->input->post('idlokasi'),
							'pembayaran_ke' => $this->input->post('bayarKe'),
							'thnbln_tagihan' => $this->input->post('thnblnTag'),						
							'tglBayar' =>$tglBayarNow,	
							'jmlBayar' =>$jmlBayar,	
							'petugas' =>$this->session->userdata('auth')->USERNAME,
							'metode_bayar' =>$this->input->post('metodeBayar'),									
							'jenis_kartu' =>$this->input->post('krJenis') ,	
							'no_kartu' =>$this->input->post('krNoCard') ,	
							'nmpemilik_kartu' =>$this->input->post('krNama') ,	
							'no_struk' =>$this->input->post('krNoStruk') ,	
							'tgl_struk' =>$this->input->post('krTglStruk')
						);	
							break;
					}
					
					
					if ($this->db->insert('bayar_bulanan_detil', $dataDetilBlnn)){	
						$cekError.="insert bayar detil bulanan<br><br>";
						$detil_insert_id = $this->db->insert_id();
						$this->db->trans_commit();
						$respon->status = 'success';
						
					} else {
						throw new Exception("gagal simpan");
						$respon->errormsg ="error insert bulanan detil";
					}
					
				
					//master
					//cek master
					$rscek=$this->db->query("select ifnull(count(*),0) cek from bayar_bulanan where idPendaftaran='".$this->input->post('noreg')."' and idlokasi =".$this->input->post('idlokasi')." and  pembayaran_ke=".$this->input->post('bayarKe'))->row();
					
					
					if ($rscek->cek <=0){
						$dataMaster= array(		
									'idPendaftaran' => $this->input->post('noreg'),											
									'idlokasi' => $this->input->post('idlokasi'),											
									'pembayaran_ke' => $this->input->post('bayarKe'),
									'thnbln_tagihan' => $this->input->post('thnblnTag'),	
									'jmlTagihan' => $tagihan ,
									'jmlBayar' => $jmlBayar,	
									'idkamar' =>$this->input->post('idKamar'),	
									'namaKamar' =>$this->input->post('nmKamar'),	
									'pengurangan_denda' =>$this->input->post('kurangiDenda'),								
									'kwh_akhir' =>$this->input->post('kwh_akhir'),								
									'tarif_per_kwh' =>$this->input->post('tarif_kwh'),			
									'kwh_terpakai' =>$this->input->post('kwh_akhir') - $this->input->post('kwh_awal'),			
									'denda' =>$denda
								);	
						if ($this->db->insert('bayar_bulanan', $dataMaster)){	
							$ceksql=$this->db->last_query();
							$cekError.="insert bayar_bulanan<br><br>";
							$this->db->trans_commit();
							$respon->status = 'success';
							$respon->ceksql=$ceksql;
							
						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error master bayar bulanan#select count(*) cek from bayar_bulanan where idPendaftaran='".$this->input->post('noreg')."' and  pembayaran_ke=".$this->input->post('bayarKe');
						}

					}else{
						//get akumulasi bayar, update jumlah bayar saja, kwh akhir tidak diupdate-> kwh akhir hanya disimpan pada proses bayar pertama (bukan proses edit/update)
						$getSum=$this->db->query("select sum(jmlbayar) sumjum from  bayar_bulanan_detil where idPendaftaran='".$this->input->post('noreg')."' and idlokasi =".$this->input->post('idlokasi')." and  pembayaran_ke=".$this->input->post('bayarKe'))->row();
						//if ($this->db->query("update bayar_bulanan set jmlBayar=".$getSum->sumjum.", kwh_terpakai=".$this->input->post('kwh_akhir') - $this->input->post('kwh_awal').", kwh_akhir=".$this->input->post('kwh_akhir')."  where idPendaftaran='".$this->input->post('noreg')."' and idlokasi =".$this->input->post('idlokasi')."  and  pembayaran_ke=".$this->input->post('bayarKe')) ){

						if ($this->db->query("update bayar_bulanan set jmlBayar=".$getSum->sumjum." where idPendaftaran='".$this->input->post('noreg')."' and idlokasi =".$this->input->post('idlokasi')."  and  pembayaran_ke=".$this->input->post('bayarKe')) ){	
							$this->db->trans_commit();
							$respon->status = 'success';
							
						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error master bayar bulanan kedua dst";
						}

					}					
				

				} catch (Exception $e) {
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
				}
				
			} else {
				$respon->status = 'error';
				$respon->errormsg = validation_errors();
				
			}
			$respon->data=$cekError;	
			$respon->detil_insert_id=$detil_insert_id ;	
			//$respon->noreg=$this->input->post('bln_noreg');
			echo json_encode($respon);
			//exit;
		
		} 
	}

	public function saveBayarMingguan(){
		$cekError="";
		$tglBayarNow=date("Y-m-d");		
		$tagihan=$this->input->post('tagihan');		
		$jmlBayar=($this->input->post('jmlBayar') >=$tagihan?$tagihan :$this->input->post('jmlBayar') );

		if ($this->input->is_ajax_request()){	
			
			$this->load->library('form_validation');			
			$rules = array(				
					
						array(
						'field' => 'jmlBayar',
						'label' => 'JUMLAH_BAYAR',
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
					$dataMaster = array();
					switch ($this->input->post('metodeBayar')){
						case "tunai": 
							$dataDetail= array(		
								'noPendaftaran' => $this->input->post('noreg'),	
								'idlokasi' => $this->input->post('idlokasi'),
								'tglBayar' =>$tglBayarNow,	
								'jmlBayar' =>$jmlBayar,	
								'petugas' =>$this->session->userdata('auth')->USERNAME,
								'metode_bayar' =>$this->input->post('metodeBayar')	
							);	
							break;
						case "transfer": 
							$dataDetail= array(	
								'noPendaftaran' => $this->input->post('noreg'),	
								'idlokasi' => $this->input->post('idlokasi'),
								'tglBayar' =>$tglBayarNow,	
								'jmlBayar' =>$jmlBayar,	
								'petugas' =>$this->session->userdata('auth')->USERNAME,
								'metode_bayar' =>$this->input->post('metodeBayar'),
								'tgl_transfer' =>$this->input->post('tglTransfer'),	
								'dari_bank' =>$this->input->post('trBank'),	
								'norek_pengirim' =>$this->input->post('trNorek1'),	
								'nama_pengirim' =>$this->input->post('trAtasNama'),	
								'idrek_penerima' =>$this->input->post('cbRek')
							);	
							break;
						case "kartu": 
							$dataDetail= array(							
								'noPendaftaran' => $this->input->post('noreg'),	
								'idlokasi' => $this->input->post('idlokasi'),
								'tglBayar' =>$tglBayarNow,	
								'jmlBayar' =>$jmlBayar,	
								'petugas' =>$this->session->userdata('auth')->USERNAME,
								'metode_bayar' =>$this->input->post('metodeBayar'),									
								'jenis_kartu' =>$this->input->post('krJenis') ,	
								'no_kartu' =>$this->input->post('krNoCard') ,	
								'nmpemilik_kartu' =>$this->input->post('krNama') ,	
								'no_struk' =>$this->input->post('krNoStruk') ,	
								'tgl_struk' =>$this->input->post('krTglStruk')
							);	
							break;
					}
					
					//bayar detil selalu insert, master jg insert dgn sum(jmlbayar) dari detil) tp di del dulu dg noreg
					if ($this->db->insert('bayar_mingguan_detil', $dataDetail)){	
						$cekError.="insert bayar_mingguan_detil<br><br>";
						$detil_insert_id = $this->db->insert_id();
						$this->db->trans_commit();
						$respon->status = 'success';
						
					} else {
						throw new Exception("gagal simpan");
						$respon->errormsg ="error";
					}
					
					//master
					$getSum=$this->db->query("select sum(jmlbayar) sumjum from  bayar_mingguan_detil where noPendaftaran='".$this->input->post('noreg')."' and idlokasi =".$this->input->post('idlokasi')."")->row();
					$lama=$this->input->post('lama');
					$tarif=$this->input->post('tarif');
					$diskon=$this->input->post('diskon');
					$tag_lama_tarif= $lama * ( $tarif - $diskon) ;
					$dataMaster= array(		
								'noPendaftaran' => $this->input->post('noreg'),											
								'idlokasi' => $this->input->post('idlokasi'),											
								'jmlMinggu' =>$this->input->post('lama'),	
								'tarif' => ( $this->input->post('tarif') - $diskon),	
								'jmlBayar' => $getSum->sumjum,	
								'status' =>( $getSum->sumjum >= $tag_lama_tarif ? "Lunas":"Belum Lunas"),
								'petugas' =>$this->session->userdata('auth')->USERNAME,	
								'namaKamar' =>$this->input->post('namaKamar')	
							);	
					
					//proses delete dan insert mengganti proses update shg bisa utk form entri dan edit)
					$this->db->query("delete from bayar_mingguan_master  where noPendaftaran='".$this->input->post('noreg')."' and idlokasi =".$this->input->post('idlokasi')."");
					$this->db->trans_commit();

					if ($this->db->insert('bayar_mingguan_master', $dataMaster)){	
						$cekError.="insert bayar_mingguan_master<br><br>";
						$this->db->trans_commit();
						$respon->status = 'success';
						
					} else {
						throw new Exception("gagal simpan");
						$respon->errormsg ="error";
					}
										
				} catch (Exception $e) {
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
				}
				
			} else {
				$respon->status = 'error';
				$respon->errormsg = validation_errors();
				
			}
			$respon->data=$cekError;	
			$respon->detil_insert_id=$detil_insert_id ;	
			$respon->lokasi=$this->input->post('idlokasi');	
			//$respon->noreg=$this->input->post('bln_noreg');
			echo json_encode($respon);
			//exit;
		
		} 
	}
	public function saveBayarHarian(){
		$cekError="";
		$tglBayarNow=date("Y-m-d");		
		$tagihan=$this->input->post('tagihan');		
		$jmlBayar=($this->input->post('jmlBayar') >=$tagihan?$tagihan :$this->input->post('jmlBayar') );

		if ($this->input->is_ajax_request()){	
			
			$this->load->library('form_validation');			
			$rules = array(				
					
						array(
						'field' => 'jmlBayar',
						'label' => 'JUMLAH_BAYAR',
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
					$dataMaster = array();
					switch ($this->input->post('metodeBayar')){
						case "tunai": 
							$dataDetail= array(		
								'noPendaftaran' => $this->input->post('noreg'),	
								'idlokasi' => $this->input->post('idlokasi'),
								'tglBayar' =>$tglBayarNow,	
								'jmlBayar' =>$jmlBayar,	
								'petugas' =>$this->session->userdata('auth')->USERNAME,
								'metode_bayar' =>$this->input->post('metodeBayar')	
							);	
							break;
						case "transfer": 
							$dataDetail= array(	
								'noPendaftaran' => $this->input->post('noreg'),	
								'idlokasi' => $this->input->post('idlokasi'),
								'tglBayar' =>$tglBayarNow,	
								'jmlBayar' =>$jmlBayar,	
								'petugas' =>$this->session->userdata('auth')->USERNAME,
								'metode_bayar' =>$this->input->post('metodeBayar'),
								'tgl_transfer' =>$this->input->post('tglTransfer'),	
								'dari_bank' =>$this->input->post('trBank'),	
								'norek_pengirim' =>$this->input->post('trNorek1'),	
								'nama_pengirim' =>$this->input->post('trAtasNama'),	
								'idrek_penerima' =>$this->input->post('cbRek')
							);	
							break;
						case "kartu": 
							$dataDetail= array(							
								'noPendaftaran' => $this->input->post('noreg'),
								'idlokasi' => $this->input->post('idlokasi'),
								'tglBayar' =>$tglBayarNow,	
								'jmlBayar' =>$jmlBayar,	
								'petugas' =>$this->session->userdata('auth')->USERNAME,
								'metode_bayar' =>$this->input->post('metodeBayar'),									
								'jenis_kartu' =>$this->input->post('krJenis') ,	
								'no_kartu' =>$this->input->post('krNoCard') ,	
								'nmpemilik_kartu' =>$this->input->post('krNama') ,	
								'no_struk' =>$this->input->post('krNoStruk') ,	
								'tgl_struk' =>$this->input->post('krTglStruk')
							);	
							break;
					}
					
					//bayar detil selalu insert, master jg insert dgn sum(jmlbayar) dari detil) tp di del dulu dg noreg
					if ($this->db->insert('bayar_harian_detil', $dataDetail)){	
						$cekError.="insert bayar_harian_detil<br><br>";
						$detil_insert_id = $this->db->insert_id();
						$this->db->trans_commit();
						$respon->status = 'success';
						
					} else {
						throw new Exception("gagal simpan");
						$respon->errormsg ="error";
					}
					
					//master
					$getSum=$this->db->query("select sum(jmlbayar) sumjum from  bayar_harian_detil where noPendaftaran='".$this->input->post('noreg')."' and idlokasi =".$this->input->post('idlokasi')."")->row();
					$lama=$this->input->post('lama');
					$tarif=$this->input->post('tarif');
					$diskon=$this->input->post('diskon');
					$tag_lama_tarif= $lama * ($tarif-$diskon);
					$dataMaster= array(		
								'noPendaftaran' => $this->input->post('noreg'),											
								'idlokasi' => $this->input->post('idlokasi'),											
								'jmlHari' =>$this->input->post('lama'),	
								'tarif' => ($this->input->post('tarif') - $diskon) ,	
								'jmlBayar' => $getSum->sumjum,	
								'status' =>( $getSum->sumjum >= $tag_lama_tarif ? "Lunas":"Belum Lunas"),
								'petugas' =>$this->session->userdata('auth')->USERNAME,	
								'namaKamar' =>$this->input->post('namaKamar')	
							);	
					
					//proses delete dan insert mengganti proses update shg bisa utk form entri dan edit)
					$this->db->query("delete from bayar_harian_master  where noPendaftaran='".$this->input->post('noreg')."' and idlokasi =".$this->input->post('idlokasi')."");
					$this->db->trans_commit();

					if ($this->db->insert('bayar_harian_master', $dataMaster)){	
						$cekError.="insert bayar_harian_master<br><br>";
						$this->db->trans_commit();
						$respon->status = 'success';
						
					} else {
						throw new Exception("gagal simpan");
						$respon->errormsg ="error";
					}
										
				} catch (Exception $e) {
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
				}
				
			} else {
				$respon->status = 'error';
				$respon->errormsg = validation_errors();
				
			}
			$respon->data=$cekError;	
			$respon->detil_insert_id=$detil_insert_id ;	
			$respon->lokasi=$this->input->post('idlokasi');
			//$respon->noreg=$this->input->post('bln_noreg');
			echo json_encode($respon);
			//exit;
		
		} 
	}

	
	public function form_edit($valkey){
		$this->config->set_item('mysubmenu', 'mn32');	
		$arrVal=explode('_', $valkey);
		$jenis=$arrVal[0];		
		$noreg=$arrVal[1];
		$idlokasi=$arrVal[2];	//tambahkan query idlokasi krn noreg bisa sama tp lokasi beda
		$view="";$str="";$strBayar="";
		switch ($jenis){
				case "Bulanan":
					$str="select m.idpendaftaran, m.idlokasi, a.nama, a.alamat_asal, k.idkamar, k.labelkamar,k.tarifbulanan,m.tglmulai, m.tgldaftar, day(last_day(tglmulai)) dd_akhir, day(tglmulai) dd_mulai , (day(last_day(tglmulai))-day(tglmulai)) selisih, month(tglmulai) bln, year(tglmulai) xthn, k.tarifmingguan, k.tarifharian, m.diskon, m.kwh_awal from pendaftaran m, anak_kost a, kamar k  where m.`idanakkost` = a.`idanakkost`	and m.`idlokasi` = a.`idlokasi` and m.idkamar = k.idkamar and m.idpendaftaran='$noreg' and m.idlokasi=$idlokasi ";	
					$strBayar="SELECT b.kwh_akhir, b.kwh_terpakai, b.pembayaran_ke, d.* FROM bayar_bulanan_detil d, bayar_bulanan b  WHERE b.idpendaftaran='$noreg' and b.idlokasi='$idlokasi' AND b.idlokasi=d.idlokasi AND b.idpendaftaran=d.idpendaftaran AND b.pembayaran_ke=d.pembayaran_ke order by b.pembayaran_ke, no_urut";
					break;
				case "Mingguan":
					$str="select d.idpendaftaran,d.idlokasi, d.nama, d.alamat_asal, k.idkamar, k.labelkamar, k.tarifmingguan, d.tglmulai, d.tglakhir, d.lama, d.diskon from daftar_sewa_mingguan d, kamar k  where d.idkamar=k.idkamar and  d.idlokasi=k.idlokasi and d.idpendaftaran='$noreg' and d.idlokasi=".$idlokasi;	
					$strBayar="select * from bayar_mingguan_detil where nopendaftaran='$noreg' and idlokasi=".$idlokasi;
					break;
				case "Harian":
					$str="select d.idpendaftaran,d.idlokasi, d.nama, d.alamat_asal, k.idkamar, k.labelkamar, k.tarifharian, d.tglcek_in, d.tglcek_out, d.lama, d.diskon from daftar_sewa_harian d, kamar k where d.idkamar=k.idkamar  and  d.idlokasi=k.idlokasi and d.idpendaftaran='$noreg' and d.idlokasi=".$idlokasi;
					$strBayar="select * from bayar_harian_detil where nopendaftaran='$noreg' and idlokasi=".$idlokasi;
					
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
		$data['lokasi'] =$this->transaksi_model->getLokasi($idlokasi);
		$this->template->set('breadcrumbs','<h1>Pembayaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Edit Data Pembayaran</small></h1>');
		$this->template->set('pagetitle','Form Edit Data Pembayaran ');
		$this->template->load('default','ftransaksi/fbyr_edit_'.$jenis, $data);
	}

	public function frmpop_edit(){
		$this->config->set_item('mysubmenu', 'mn32');	
		$jenis=$this->input->post('jenis');
		$noreg=$this->input->post('noreg');
		$idlokasi=$this->input->post('idlokasi');
		$nourut=$this->input->post('nourut');
		$no_kuit=$this->input->post('no_kuit');
		
		switch ($jenis){
			case "Bulanan":
				//$view="ftransaksi/frmEditBulanan";
				$str="select * from bayar_bulanan_detil where  idpendaftaran='$noreg' and idlokasi=".$idlokasi." and pembayaran_ke=".$nourut." and no_urut=".$no_kuit;
				break;
			case "Mingguan":
				$str="select * from bayar_mingguan_detil where nopendaftaran='$noreg' and idlokasi=".$idlokasi." and nourut=".$nourut;
				//$view="ftransaksi/frmEditMingguan";
				break;
			case "Harian":
				$str="select * from bayar_harian_detil where nopendaftaran='$noreg' and idlokasi=".$idlokasi." and nourut=".$nourut;
				//$view="ftransaksi/frmEditHarian";
				break;

		}
		$recordset=$this->db->query($str)->row();
		$data["res"]=$recordset;
		$data["nourut"]=$nourut;
		$data["no_kuit"]=$no_kuit;
		$data["jenis"]=$jenis;
		$data["idlokasi"]=$idlokasi;
		$data["noreg"]=$noreg;
		$view="ftransaksi/frmpop_edit";
		//$data["resKamar"]=$this->db->query("select * from kamar where idkamar='".($jenis=="Bulanan"?$recordset->idkamar:$recordset->idKamar)."'")->row();
		
		if ($this->input->is_ajax_request()){
			$this->template->load('ajax',$view,$data);
		} else {
			$this->template->set('pagetitle','Form Edit Pembayaran '.$jenis);
			$this->template->load('default',$view,$data);
		}
	}


	public function saveEditing(){
		$cekError="";
		$jenis=$this->input->post('jenis');
		$noreg=$this->input->post('noreg');
		$nourut=$this->input->post('nourut'); //bulanan = nourut = pembayaran_ke
		$nokuit=$this->input->post('no_kuit'); //nokuit = nourut 
		$idlokasi=$this->input->post('idlokasi'); //idlokasi = idlokasi 
		$tglBayar=$this->input->post('tglBayar');	
		$jmlBayar=$this->input->post('jmlBayar');	
		$petugas=$this->session->userdata('auth')->USERNAME;	
		$metodeBayar=$this->input->post('metodeBayar');	

		if ($this->input->is_ajax_request()){	
			
			$this->load->library('form_validation');			
			$rules = array(				
					
						array(
						'field' => 'jmlBayar',
						'label' => 'JUMLAH_BAYAR',
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
					$tbBayar="";$fnoreg="";$fnourut="";
					$dataMaster = array(); $tbmaster="";
					$kolomhapus= array();
					switch ($jenis){
						case "Bulanan":
							$tbBayar="bayar_bulanan_detil";
							$tbmaster="bayar_bulanan";
							$fnoreg="idpendaftaran";
							$fnourut="pembayaran_ke";
							$fnokuit="no_urut";
							break;
						case "Mingguan":
							$tbBayar="bayar_mingguan_detil";
							$fnoreg="nopendaftaran";
							$fnourut="noUrut";
							$tbmaster="bayar_mingguan_master";
							break;
							
						case "Harian":
							$tbBayar="bayar_harian_detil";
							$fnoreg="nopendaftaran";
							$fnourut="noUrut";
							$tbmaster="bayar_harian_master";
							break;

					}

					
					switch ($metodeBayar){
						case "tunai": 
							$dataDetail= array(									
								'tglBayar' =>$tglBayar,	
								'jmlBayar' =>$jmlBayar,	
								'petugas' =>$petugas,
								'metode_bayar' =>$metodeBayar	
							);	
							$kolomhapus= array(	
								'tgl_transfer' =>"",	
								'dari_bank' =>"",
								'norek_pengirim' =>"",
								'nama_pengirim' =>"",
								'idrek_penerima' =>"",
								'jenis_kartu' =>"",
								'no_kartu' =>"",
								'nmpemilik_kartu' =>"",	
								'no_struk' =>"",
								'tgl_struk' =>""
								);
							break;
						case "transfer": 
							$dataDetail= array(										
								'tglBayar' =>$tglBayar,	
								'jmlBayar' =>$jmlBayar,	
								'petugas' =>$petugas,
								'metode_bayar' =>$metodeBayar,
								'tgl_transfer' =>$this->input->post('tglTransfer'),	
								'dari_bank' =>$this->input->post('trBank'),	
								'norek_pengirim' =>$this->input->post('trNorek1'),	
								'nama_pengirim' =>$this->input->post('trAtasNama'),	
								'idrek_penerima' =>$this->input->post('cbRek')
							);	
							$kolomhapus= array(
									'jenis_kartu' =>"",
									'no_kartu' =>"",
									'nmpemilik_kartu' =>"",	
									'no_struk' =>"",
									'tgl_struk' =>""
									);
							break;
						case "kartu": 
							$dataDetail= array(										
								'tglBayar' =>$tglBayar,	
								'jmlBayar' =>$jmlBayar,	
								'petugas' =>$petugas,
								'metode_bayar' =>$metodeBayar,									
								'jenis_kartu' =>$this->input->post('krJenis') ,	
								'no_kartu' =>$this->input->post('krNoCard') ,	
								'nmpemilik_kartu' =>$this->input->post('krNama') ,	
								'no_struk' =>$this->input->post('krNoStruk') ,	
								'tgl_struk' =>$this->input->post('krTglStruk')
							);	
							$kolomhapus= array(	
									'tgl_transfer' =>"",	
									'dari_bank' =>"",
									'norek_pengirim' =>"",
									'nama_pengirim' =>"",
									'idrek_penerima' =>""
									
									);
							break;
					}

					//*****
					$getTagihan=$this->db->query("select * from  $tbmaster where ".($jenis=="Bulanan"?"idPendaftaran":"nopendaftaran")."='$noreg' and idlokasi= ".$idlokasi)->row();
					$getSum=$this->db->query("select sum(jmlbayar) sumjum from  $tbBayar where ".($jenis=="Bulanan"?"idPendaftaran":"nopendaftaran")." = '$noreg' and idlokasi= ".$idlokasi)->row();
					$jmltagihan=($jenis=="Bulanan"?$getTagihan->jmlTagihan:($jenis=="Mingguan"?$getTagihan->jmlMinggu * $getTagihan->tarif:$getTagihan->jmlHari * $getTagihan->tarif));
					$jmlbayarAkum=$getSum->sumjum;
					$status=($jmlbayarAkum>=$jmltagihan?"Lunas":"Belum Lunas");


					if ($jenis=="Bulanan"){
				
						if ($this->db->where($fnoreg,$noreg)->where($fnourut,$nourut)->where($fnokuit,$nokuit)->where("idlokasi", $idlokasi)->update($tbBayar,$dataDetail)){					
							$cekError.="update $tbBayar<br><br>";
							$this->db->where($fnoreg,$noreg)->where($fnourut,$nourut)->where("idlokasi", $idlokasi)->update($tbBayar,$kolomhapus);
							$this->db->trans_commit();
							$respon->status = 'success';
							
						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error";
						}

					

						if ($this->db->where($fnourut,$nourut)->where($fnoreg,$noreg)->where("idlokasi", $idlokasi)->update("bayar_bulanan",array("jmlBayar"=>$getSum->sumjum))){	
							$cekError.="update master $tbmaster<br><br>";
							$this->db->trans_commit();
							$respon->status = 'success';
							
						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error";
						}
					
					}else{

						if ($this->db->where($fnoreg,$noreg)->where($fnourut,$nourut)->where("idlokasi", $idlokasi)->update($tbBayar,$dataDetail)){					
							$cekError.="update $tbBayar<br><br>";
							$this->db->where($fnoreg,$noreg)->where($fnourut,$nourut)->where("idlokasi", $idlokasi)->update($tbBayar,$kolomhapus);
							$this->db->trans_commit();
							$respon->status = 'success';
							
						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error";
						}

						//$getSum=$this->db->query("select sum(jmlbayar) sumjum from  $tbBayar where noPendaftaran='$noreg' and idlokasi= ".$idlokasi)->row();
						//$cekError.="select sum(jmlbayar) sumjum from  $tbBayar where noPendaftaran='$noreg' and idlokasi= ".$idlokasi;
						
						if ($this->db->where($fnoreg,$noreg)->where("idlokasi", $idlokasi)->update($tbmaster,array("jmlBayar"=>$getSum->sumjum, "status"=>$status))){	
							$cekError.="update master $tbmaster<br><br>";
							$this->db->trans_commit();
							$respon->status = 'success';
							
						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error";
						}
					}
										
				} catch (Exception $e) {
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
				}
				
			} else {
				$respon->status = 'error';
				$respon->errormsg = validation_errors();
				
			}
			$respon->data=$cekError;	
			//$respon->noreg=$this->input->post('bln_noreg');
			echo json_encode($respon);
			//exit;
		
		} 
	}

	public function delProcess(){
		$jenis=$this->input->post('jenis');
		$noreg=$this->input->post('noreg');
		$bayar_ke=$this->input->post('nourut');
		$idlokasi=$this->input->post('idlokasi'); //$cek="";
		$notrans=0;$res=array();
		if ($jenis=="Bulanan"){
			$notrans=$this->input->post('notrans');
		}
		$rsdel = $this->transaksi_model->hapusBayar($jenis, $noreg, $bayar_ke, $notrans, $idlokasi);
		//if ($jenis=='Mingguan' || $jenis=='Harian'){
			$rsTagihan=$this->transaksi_model->getVal_tagihan($noreg, $jenis, $bayar_ke);
			$akumulasi="select IFNULL(SUM(jmlbayar),0) jml from ".($jenis=='Bulanan'?"bayar_bulanan_detil":($jenis=='Mingguan'?"bayar_mingguan_detil":"bayar_harian_detil"))." where  ".($jenis=="Bulanan"?"idpendaftaran":"nopendaftaran")."='$noreg' and pembayaran_ke=$bayar_ke and idlokasi=".$idlokasi;
			$rsakm=$this->db->query($akumulasi)->row();
			//$cek.=$akumulasi."<br>";
			$strupd="";
			if ($jenis=="Bulanan"){
				//$cek.="masuk bulanan<br>";
				$status= ( $rsakm->jml >= $rsTagihan->jmltagihan ? "Lunas":"Belum Lunas") ;			
				$strupd="update bayar_bulanan set jmlbayar=".$rsakm->jml." where idpendaftaran='".$noreg."' and pembayaran_ke=$bayar_ke and idlokasi=".$idlokasi;
			}else{
				$status= ( $rsakm->jml>= ($rsTagihan->jumlahlama * $rsTagihan->tarif) ? "Lunas":"Belum Lunas") ;			
				$strupd="update ".($jenis=='Mingguan'?"bayar_mingguan_master":"bayar_harian_master")." set jmlbayar=".$rsakm->jml.", status='".$status."' where nopendaftaran='".$noreg."' and idlokasi=".$idlokasi;
			}
			$res["data"]=$akumulasi."#".$strupd;
			
			if ($this->db->query($strupd)){
				$this->db->trans_commit();
				$res["status"]="success";
			}else{
				$res["status"]="error";
			}
		//}
		
		
		echo json_encode($res);		
	}
}
