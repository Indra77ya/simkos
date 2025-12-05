<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class e_pembayaran extends MY_App {

	function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('master_model');
		$this->config->set_item('mymenu', 'mn3');

		$this->auth->authorize();
	}

	public function entri(){
		$data["proses"]="entri";
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
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
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
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
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$data["proses"]="checkout";
		$this->template->set('breadcrumbs','<h1>Pembayaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Proses Check Out</small></h1>');
		$this->template->set('pagetitle','Form Proses Check Out');
		$this->template->load('default','ftransaksi/fbyrFilter', $data);
	}
	
	public function konfirmasi(){
		$this->config->set_item('mysubmenu', 'mn21');

		$this->template->set('breadcrumbs','<h1>Pembayaran <small> <i class="ace-icon fa fa-angle-double-right"></i> Daftar konfirmasi pembayaran masuk</small></h1>');
		$this->template->set('pagetitle',"Daftar konfirmasi pembayaran masuk");		
		$this->template->load('default',"ftransaksi/fkonfirmasi" ,compact('str'));
	}

	public function forceCheckOut($valkey){
		$this->config->set_item('mysubmenu', 'mn34');
		$arrVal=explode('_', $valkey);
		$jenis=$arrVal[0];
		$noreg=$arrVal[1];
		$idlokasi=$arrVal[2];
		$nmTabelBayar="";$nmTabel="";$fieldDate="";
		switch ($jenis){
				case "Tahunan":
					$nmTabel="pendaftaran_tahunan";
					$fieldDate="tgl_checkout";
					$nmtableBayar="bayar_tahunan";
					break;
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
			
		$rscek=$this->db->query("select terisi isi from cekkamar where idkamar=(select distinct idkamar from ".$nmTabel." where idpendaftaran='".$noreg."')")->row();
        $cekTerisi=$rscek->isi;
        $terisi=($cekTerisi<=0?"0":"terisi-1");
		
		$str="update cekkamar set terisi=".$terisi.", last_checkout_date='".date('Y-m-d')."' where idkamar=(select distinct idkamar from $nmTabel where idlokasi=".$idlokasi." and  idpendaftaran='".$noreg."')";
		if ($this->db->query($str)){
				$this->db->trans_commit();
				$strCheckOut="update $nmTabel set checkout=1, ".$fieldDate."='".date('Y-m-d')."' where idlokasi=".$idlokasi." and  idPendaftaran='".$noreg."'";
				$this->db->query($strCheckOut);
				$this->db->trans_commit();
		}
		
		if ($jenis=="Bulanan" || $jenis=="Tahunan"){
            	$strTenantLog="update login_penghuni set isactive=0  where jenis_sewa='".$jenis."' and idPendaftaran='".$noreg."'";
                $this->db->query($strTenantLog);
                $this->db->trans_commit();
            
        }
        
		$data["proses"]="checkout";
		redirect('e_pembayaran/checkout');
		/*$this->template->set('breadcrumbs','<h1>Pembayaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Proses Check Out</small></h1>');
		$this->template->set('pagetitle','Form Proses Check Out');
		$this->template->load('default','ftransaksi/fbyrFilter', $data);*/

	}
	public function doCheckOut(){
		$this->config->set_item('mysubmenu', 'mn34');
		$jenis = $this->input->post('jenis');
		$noreg = $this->input->post('noreg');
		$idlokasi = $this->input->post('idlokasi');
		$nmTabelBayar="";$nmTabel="";$fieldDate="";
		switch ($jenis){
				case "Tahunan":
					$nmTabel="pendaftaran_tahunan";
					$fieldDate="tgl_checkout";
					$nmTabelBayar="bayar_tahunan";
					break;
				case "Bulanan":
					$nmTabel="pendaftaran";
					$fieldDate="tgl_checkout";
					$nmTabelBayar="bayar_bulanan";
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
		$cekLunas=($jenis=="Bulanan" || $jenis=="Tahunan"?" select count(*) cek from ".$nmTabelBayar." where idlokasi = ".$idlokasi." and idpendaftaran = '".$noreg."' and ".( $jenis=="Tahunan"?"tahun_tagihan  ='".date('Y')."'":"thnbln_tagihan  ='".date('Ym')."'") : "select status from $nmTabelBayar where idlokasi=".$idlokasi." and nopendaftaran = '".$noreg."'" );
		$respon['cek']=$cekLunas;
		$query = $this->db->query($cekLunas)->row();
		$cek=($jenis=="Bulanan" || $jenis=="Tahunan"? $query->cek : (sizeof($query)>0?$query->status:"Belum Lunas"));
		
		$rscek=$this->db->query("select terisi isi from cekkamar where idkamar=(select distinct idkamar from ".$nmTabel." where idpendaftaran='".$noreg."')")->row();
        $cekTerisi=$rscek->isi;
        $terisi=($cekTerisi<=0?"0":"terisi-1");
		
		if ($cek=="Lunas" || $cek>=1){
			$str="update cekkamar set terisi=".$terisi.", last_checkout_date='".date('Y-m-d')."' where idkamar=(select distinct idkamar from $nmTabel where idlokasi =".$idlokasi." and idpendaftaran='".$noreg."')";
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
			if ($jenis=="Tahunan"){
		        $str="select tgldaftar, YEAR(tgldaftar) thn,YEAR(CURDATE()) thnnow  from pendaftaran_tahunan where idpendaftaran='".$noreg."'";
		        $sql = $this->db->query($str);
		        if ($sql->num_rows()>0){
		            $rsr=$sql->row();
		            $tgltagihan=str_replace($rsr->thn,date('Y'), $rsr->tgldaftar);
		            if ( $tgltagihan > date ('Y-m-d')){
		                	$str="update cekkamar set terisi=".$terisi.", last_checkout_date='".date('Y-m-d')."' where idkamar=(select distinct idkamar from $nmTabel where idlokasi =".$idlokasi." and idpendaftaran='".$noreg."')";
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
            			$respon['pesan'] = "Pembayaran Sewa Belum Lunas. Tagihan & jatuh tempo tanggal : ".$tgltagihan." Silahkan melakukan Pembayaran terlebih dahulu";
		            }
		        }
		    }else {
		         $respon['status'] = 'error';
            			$respon['errormsg'] = 'Invalid Data';
            			$respon['pesan'] = 'Pembayaran Sewa Belum Lunas. Silahkan melakukan Pembayaran terlebih dahulu';
		    }
		}

        if ($jenis=="Bulanan" || $jenis=="Tahunan"){
            	$strTenantLog="update login_penghuni set isactive=0  where jenis_sewa='".$jenis."' and idPendaftaran='".$noreg."'";
                $this->db->query($strTenantLog);
                $this->db->trans_commit();
            
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
				case "Tahunan":
					$str="select p.idpendaftaran, a.nama, a.alamat_asal, a.notelp as nomer_telepon, p.tgldaftar as tgl1, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar from pendaftaran_tahunan p, anak_kost a  where  p.idlokasi=".$lokasi." and  a.jenis_sewa='Tahunan' and p.idAnakKost=a.idAnakkost and checkout=0 ";
					$nmtableBayar="bayar_tahunan";

					break;
				case "Bulanan":
					$str="select p.idpendaftaran, a.nama, a.alamat_asal, a.notelp as nomer_telepon, p.tgldaftar as tgl1, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar from pendaftaran p, anak_kost a  where  p.idlokasi=".$lokasi." and p.idAnakKost=a.idAnakkost and  a.jenis_sewa='Bulanan'	 and checkout=0 ";
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
				case "checkout": $this->config->set_item('mysubmenu', 'mn34'); break;
				case "deposit": $this->config->set_item('mysubmenu', 'mn33'); break;

			}

			if ( $_GET['sSearch'] != "" )
			{

				if ($jenis=="Bulanan" || $jenis=="Tahunan"){
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
					'ACTION'=>($proses=="checkout"?'<a href="javascript:void(0)" onclick="doCheckOut(\''.$jenis.'\', \''.$row->idpendaftaran.'\', \''.$lokasi.'\')" data-id="'.$row->idpendaftaran.'"><i class="fa fa-credit-card " title="Check Out?"></i></a> ' : '<a href="'.base_url('e_pembayaran/form_'.$proses.'/'.$jenis.'_'.$row->idpendaftaran).'_'.$lokasi.'"><i class=" fa fa-credit-card" title="Proses '. $proses .'"?"></i></a> ')



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
				case "Tahunan":
					$str="select m.idpendaftaran, m.idlokasi, a.nama, a.alamat_asal, k.idkamar, k.labelkamar,k.tarifbulanan,k.tariftahunan,m.thn_mulai, m.tgldaftar, year(thn_mulai) xthn, k.tarifmingguan, k.tarifharian, m.diskon, m.kwh_awal from pendaftaran_tahunan m, anak_kost a, kamar k  where m.`idanakkost` = a.`idanakkost`	  and  a.jenis_sewa='Tahunan' and m.idkamar = k.idkamar 	and m.idpendaftaran='$noreg' and m.idlokasi=".$idlokasi;

					break;
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

	public function form_tahunan_tagihan_bln(){
		$noreg=$this->input->post("noreg");
		$data['noreg']=$noreg;
		$data['idlokasi']=$this->input->post("idlokasi");
		$data['idkamar']=$this->input->post("idkamar");
		$data['thn']=$this->input->post("thn");

		//kwh_awal jika pembayaran ke 1, bayar > 1 ambil dari bayar_bulanan
		$res_kwh_master = $this->db->query("select * from kwh_var where id=1")->row();
		//cek
		$strcek="select count(*) jml from bayar_tahunan_tag_blnan where idPendaftaran='".$noreg."' and idlokasi=".$this->input->post("idlokasi");
		$rscek=$this->db->query($strcek)->row();
		if ($rscek->jml<=0) {
			$str="select kwh_awal kwhnya from pendaftaran_tahunan where idpendaftaran='$noreg' ";
		}else{
			//ambil dari tagihan sebelumnya
			$byrke_sblm=$this->input->post("byrke") - 1;
			$str="select ifnull(kwh_akhir,0) kwhnya from bayar_tahunan_tag_blnan where idpendaftaran='$noreg' and idlokasi=".$this->input->post("idlokasi")." order by periode_tagihan desc limit 1";
		}
		$data['strcek']=$strcek;
		$data['str']=$str;
		$data['res_kwh_master']=$res_kwh_master;
		$data['res_kwh_akhir']=$this->db->query($str)->row();
		$data['arrBulan'] = $this->arrBulan;
		$data['arrThn'] = $this->getYearArr();
		if ($this->input->is_ajax_request()){

			$this->template->load('ajax','ftransaksi/fbyr_tahunan_tagbulanan', $data);
		} else {
			$this->template->set('pagetitle','Form Pembayaran Tagihan Bulanan Untuk Sewa Tahunan');
			$this->template->load('default','ftransaksi/fbyr_tahunan_tagbulanan', $data);
		}

	}
	public function form_tahunan_detil(){
		$noreg=$this->input->post("noreg");
		$data['noreg']=$noreg;
		$data['idlokasi']=$this->input->post("idlokasi");
		$data['idkamar']=$this->input->post("idkamar");
		$data['thn']=$this->input->post("thn");
		$data['tagihan']=$this->input->post("tagihan");

		$data['hrdenda']=$this->input->post("hrdenda");
		$data["mmIdk"]=substr($this->input->post("thnbln"),4,2);
		$data["yyIdk"]=substr($this->input->post("thnbln"),0,4);

		$query = $this->db->query("select nominal from denda where id=1")->row();
		$qkamar = $this->db->query("select * from kamar where idkamar=".$this->input->post("idkamar"))->row();
		$data["denda"]=$query->nominal;
		$data["nmkamar"]=$qkamar->LABELKAMAR;

		if ($this->input->is_ajax_request()){

			$this->template->load('ajax','ftransaksi/fbyr_detiltahunan', $data);
		} else {
			$this->template->set('pagetitle','Form Bayar Sewa Tahunan dan Tagihan Bulanan');
			$this->template->load('default','ftransaksi/fbyr_detiltahunan', $data);
		}
	}

	public function saveYY_MonthlyBill(){
		$tglBayarNow=date("Y-m-d");
		$tagListrik=round( ($this->input->post('kwh_akhir') - ($this->input->post('kwh_awal')+$this->input->post('kwh_tdk_kena_tarif'))) * $this->input->post('tarif_kwh') ,0);
		$tagPDAM=$this->input->post('tag_pdam');
		$jmlBayar=($this->input->post('jmlBayar') >=($tagListrik+$tagPDAM)?$tagListrik+$tagPDAM :$this->input->post('jmlBayar') );
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
							'periode_tagihan' => $this->input->post('cbTahun'). $this->input->post('cbBulan'),
							'kwh_awal' =>intval($this->input->post('kwh_awal')),
							'kwh_akhir' =>intval($this->input->post('kwh_akhir')),
							'tarif_per_kwh' =>intval($this->input->post('tarif_kwh')),
							'kwh_terpakai' =>$this->input->post('kwh_akhir') - $this->input->post('kwh_awal'),
							'jmltag_listrik' =>$tagListrik,
							'jmltag_pdam' =>$tagPDAM,
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
							'periode_tagihan' => $this->input->post('cbTahun'). $this->input->post('cbBulan'),
							'kwh_awal' =>intval($this->input->post('kwh_awal')),
							'kwh_akhir' =>intval($this->input->post('kwh_akhir')),
							'tarif_per_kwh' =>intval($this->input->post('tarif_kwh')),
							'kwh_terpakai' =>$this->input->post('kwh_akhir') - $this->input->post('kwh_awal'),
							'jmltag_listrik' =>$tagListrik,
							'jmltag_pdam' =>$tagPDAM,
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
							'periode_tagihan' => $this->input->post('cbTahun'). $this->input->post('cbBulan'),
							'kwh_awal' =>intval($this->input->post('kwh_awal')),
							'kwh_akhir' =>intval($this->input->post('kwh_akhir')),
							'tarif_per_kwh' =>intval($this->input->post('tarif_kwh')),
							'kwh_terpakai' =>$this->input->post('kwh_akhir') - $this->input->post('kwh_awal'),
							'jmltag_listrik' =>$tagListrik,
							'jmltag_pdam' =>$tagPDAM,
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


					if ($this->db->insert('bayar_tahunan_tag_blnan', $dataDetilBlnn)){
						//$cekError.="insert bayar detil bulanan<br><br>";
						$detil_insert_id = $this->db->insert_id();
						$this->db->trans_commit();
						$respon->status = 'success';

					} else {
						throw new Exception("gagal simpan");
						$respon->errormsg ="error insert bulanan detil";
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
			//$respon->data=$cekError;
			$respon->detil_insert_id=$detil_insert_id ;
			$respon->noreg=$this->input->post('noreg');
			$respon->periode_tagihan= $this->input->post('cbTahun'). $this->input->post('cbBulan');
			echo json_encode($respon);
			//exit;

		}

	}
	public function saveBayarBulanan(){
		$cekError="";
		$notrans=date("YmdHis");
		$tglBayarNow=date("Y-m-d");
		$tagihan=($this->input->post('bayarKe')<=1?$this->input->post('tagBlnn'):$this->input->post('tagihan'));
		//$tagihan => total tagihan sdh include denda
		$denda=($this->input->post('bayarKe')<=1?0:($this->input->post('dendaAwal')));
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

	public function saveBayarTahunan(){
		$cekError="";
		//$notrans=date("YmdHis");
		$tglBayarNow=date("Y-m-d");
		$tagihan=$this->input->post('tagihan');
		//$tagihan => total tagihan sdh include denda
		$denda=$this->input->post('dendaAwal') - $this->input->post('kurangiDenda');
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

					$dataDetilThnn = array();

					switch ($this->input->post('metodeBayar')){
						case "tunai":
							$dataDetilThnn = array(
							'idPendaftaran' => $this->input->post('noreg'),
							'idlokasi' => $this->input->post('idlokasi'),
							//'pembayaran_ke' => $this->input->post('bayarKe'),
							'tahun_tagihan' => $this->input->post('thnTag'),
							'tglBayar' =>$tglBayarNow,
							'jmlBayar' =>$jmlBayar,
							'petugas' =>$this->session->userdata('auth')->USERNAME,
							'metode_bayar' =>$this->input->post('metodeBayar')
						);
							break;
						case "transfer":
							$dataDetilThnn = array(
							'idPendaftaran' => $this->input->post('noreg'),
							'idlokasi' => $this->input->post('idlokasi'),
							//'pembayaran_ke' => $this->input->post('bayarKe'),
							'tahun_tagihan' => $this->input->post('thnTag'),
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
							$dataDetilThnn = array(
							'idPendaftaran' => $this->input->post('noreg'),
							'idlokasi' => $this->input->post('idlokasi'),
							//'pembayaran_ke' => $this->input->post('bayarKe'),
							'tahun_tagihan' => $this->input->post('thnTag'),
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


					if ($this->db->insert('bayar_tahunan_detil', $dataDetilThnn)){
						$detil_insert_id = $this->db->insert_id();
						$this->db->trans_commit();
						$respon->status = 'success';

					} else {
						throw new Exception("gagal simpan");
						$respon->errormsg ="error insert bulanan detil";
					}


					//master
					//cek master
					$rscek=$this->db->query("select ifnull(count(*),0) cek from bayar_tahunan where idPendaftaran='".$this->input->post('noreg')."' and idlokasi =".$this->input->post('idlokasi')." and  tahun_tagihan=".$this->input->post('thnTag'))->row();


					if ($rscek->cek <=0){
						$dataMaster= array(
									'idPendaftaran' => $this->input->post('noreg'),
									'idlokasi' => $this->input->post('idlokasi'),
									//'pembayaran_ke' => $this->input->post('bayarKe'),
									'tahun_tagihan' => $this->input->post('thnTag'),
									'jmlTagihan' => $tagihan ,
									'jmlBayar' => $jmlBayar,
									'idkamar' =>$this->input->post('idKamar'),
									'namaKamar' =>$this->input->post('nmKamar'),
									'pengurangan_denda' =>$this->input->post('kurangiDenda'),
									'denda' =>$denda
								);
						if ($this->db->insert('bayar_tahunan', $dataMaster)){
							$ceksql=$this->db->last_query();
							// $cekError.="insert bayar_bulanan<br><br>";
							$this->db->trans_commit();
							$respon->status = 'success';
							$respon->ceksql=$ceksql;

						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error master bayar_tahunan#select count(*) cek from bayar_tahunan  where idPendaftaran='".$this->input->post('noreg')."' and  tahun_tagihan  =".$this->input->post('thnTag');
						}

					}else{
						//get akumulasi bayar, update jumlah bayar saja, kwh akhir tidak diupdate-> kwh akhir hanya disimpan pada proses bayar pertama (bukan proses edit/update)
						$getSum=$this->db->query("select sum(jmlbayar) sumjum from  bayar_tahunan_detil where idPendaftaran='".$this->input->post('noreg')."' and idlokasi =".$this->input->post('idlokasi')." and  tahun_tagihan=".$this->input->post('thnTag'))->row();

						if ($this->db->query("update bayar_tahunan set jmlBayar=".$getSum->sumjum." where idPendaftaran='".$this->input->post('noreg')."' and idlokasi =".$this->input->post('idlokasi')."  and  tahun_tagihan=".$this->input->post('thnTag')) ){
							$this->db->trans_commit();
							$respon->status = 'success';

						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error master  bayar_tahunan kedua dst";
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


	public function form_edit($valkey){
		$this->config->set_item('mysubmenu', 'mn32');
		$arrVal=explode('_', $valkey);
		$jenis=$arrVal[0];
		$noreg=$arrVal[1];
		$idlokasi=$arrVal[2];	//tambahkan query idlokasi krn noreg bisa sama tp lokasi beda
		$view="";$str="";$strBayar="";
		switch ($jenis){
				case "Tahunan":
					$str="select m.idpendaftaran, m.idlokasi, a.nama, a.alamat_asal, k.idkamar, k.labelkamar,k.tariftahunan, m.tgldaftar, day(last_day(tgldaftar)) dd_akhir, day(tgldaftar) dd_mulai , (day(last_day(tgldaftar))-day(tgldaftar)) selisih, month(tgldaftar) bln, year(tgldaftar) xthn, k.tarifmingguan, k.tarifharian, m.diskon, m.kwh_awal from pendaftaran_tahunan m, anak_kost a, kamar k  where m.`idanakkost` = a.`idanakkost`	and  a.jenis_sewa='Tahunan' and m.`idlokasi` = a.`idlokasi` and m.idkamar = k.idkamar and m.idpendaftaran='$noreg' and m.idlokasi=$idlokasi ";
					$strBayar="SELECT  d.* FROM bayar_tahunan_detil d, bayar_tahunan b  WHERE b.idpendaftaran='$noreg' and b.idlokasi='$idlokasi' AND b.idlokasi=d.idlokasi AND b.idpendaftaran=d.idpendaftaran AND b.tahun_tagihan=d.tahun_tagihan order by b.tahun_tagihan, no_urut";
					break;
				case "Bulanan":
					$str="select m.idpendaftaran, m.idlokasi, a.nama, a.alamat_asal, k.idkamar, k.labelkamar,k.tarifbulanan,m.tglmulai, m.tgldaftar, day(last_day(tglmulai)) dd_akhir, day(tglmulai) dd_mulai , (day(last_day(tglmulai))-day(tglmulai)) selisih, month(tglmulai) bln, year(tglmulai) xthn, k.tarifmingguan, k.tarifharian, m.diskon, m.kwh_awal from pendaftaran m, anak_kost a, kamar k  where m.`idanakkost` = a.`idanakkost` and  a.jenis_sewa='Bulanan'	and m.`idlokasi` = a.`idlokasi` and m.idkamar = k.idkamar and m.idpendaftaran='$noreg' and m.idlokasi=$idlokasi ";
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
			case "Tahunan":
				//$view="ftransaksi/frmEditBulanan";
				$str="select * from bayar_tahunan_detil where  idpendaftaran='$noreg' and idlokasi=".$idlokasi." and pembayaran_ke=".$nourut." and no_urut=".$no_kuit;
				break;
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
		$data["str"]=$str;
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

	public function frmpop_edit_thnn(){
		$this->config->set_item('mysubmenu', 'mn32');
		$jenis=$this->input->post('jenis');
		$noreg=$this->input->post('noreg');
		$idlokasi=$this->input->post('idlokasi');
		$periode=$this->input->post('periode');
		$no_kuit=$this->input->post('no_kuit');
		$view="";
		switch ($jenis){
			case "bayarsewa":
				//$view="ftransaksi/frmEditBulanan";
				$str="select * from bayar_tahunan_detil where  idpendaftaran='$noreg' and idlokasi=".$idlokasi." and tahun_tagihan=".$periode." and no_urut=".$no_kuit;
				$view="ftransaksi/frmpop_edit_yearbill";
				break;
			case "bayarbulanan":
				//$view="ftransaksi/frmEditBulanan";
				$str="select * from bayar_tahunan_tag_blnan where  idpendaftaran='$noreg' and idlokasi=".$idlokasi." and periode_tagihan=".$periode." and no_urut=".$no_kuit;
				$view="ftransaksi/frmpop_edit_monthlybill";
				break;
		}
		$recordset=$this->db->query($str)->row();
		$data["res"]=$recordset;
		$data["periode"]=$periode;
		$data["no_kuit"]=$no_kuit;
		$data["jenis"]=$jenis;
		$data["idlokasi"]=$idlokasi;
		$data["noreg"]=$noreg;
		//$view="ftransaksi/frmpop_edit";
		if ($this->input->is_ajax_request()){
			$this->template->load('ajax',$view,$data);
		} else {
			$this->template->set('pagetitle','Form Edit Pembayaran '.$jenis);
			$this->template->load('default',$view,$data);
		}
	}
	public function saveEditing_thnn(){
		$jenis=$this->input->post('jenis');
		$noreg=$this->input->post('noreg');
		$nourut=$this->input->post('periode'); 
		$nokuit=$this->input->post('no_kuit'); //nokuit = nourut
		$idlokasi=$this->input->post('idlokasi'); //idlokasi = idlokasi
		$tglBayar=$this->input->post('tglBayar');
		$jmlBayar=$this->input->post('jmlBayar');
		$petugas=$this->session->userdata('auth')->USERNAME;
		$metodeBayar=$this->input->post('metodeBayar');
		$cekError="";
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
						case "bayarsewa":
							$tbBayar="bayar_tahunan_detil";
							$tbmaster="bayar_tahunan";
							$fnoreg="idpendaftaran";
							$fnourut="tahun_tagihan";
							$fnokuit="no_urut";
							break;
						case "bayarbulanan":
							$tbBayar="bayar_tahunan_tag_blnan";
							$tbmaster="";
							$fnoreg="idpendaftaran";
							$fnourut="periode_tagihan";
							$fnokuit="no_urut";
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
								'tgl_transfer' =>null,
								'dari_bank' =>"",
								'norek_pengirim' =>"",
								'nama_pengirim' =>"",
								'idrek_penerima' =>null,
								'jenis_kartu' =>"",
								'no_kartu' =>"",
								'nmpemilik_kartu' =>"",
								'no_struk' =>"",
								'tgl_struk' =>null
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
									'tgl_struk' =>null
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
									'tgl_transfer' =>null,
									'dari_bank' =>"",
									'norek_pengirim' =>"",
									'nama_pengirim' =>"",
									'idrek_penerima' =>null

									);
							break;
					}

				
					if ($jenis=="bayarsewa"){
						$getTagihan=$this->db->query("select * from  $tbmaster where idPendaftaran='$noreg' and idlokasi= ".$idlokasi)->row();
					
						$jmltagihan=$getTagihan->jmlTagihan;

						if ($this->db->where($fnoreg,$noreg)->where($fnourut,$nourut)->where($fnokuit,$nokuit)->where("idlokasi", $idlokasi)->update($tbBayar,$dataDetail)){
							$cekError.="update $tbBayar<br><br>";
							$this->db->where($fnoreg,$noreg)->where($fnourut,$nourut)->where("idlokasi", $idlokasi)->update($tbBayar,$kolomhapus);
							$this->db->trans_commit();
							$respon->status = 'success';

						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error";
						}
						
						$getSum=$this->db->query("select sum(jmlbayar) sumjum from  $tbBayar where idPendaftaran = '$noreg' and idlokasi= ".$idlokasi)->row();
						$jmlbayarAkum=$getSum->sumjum;
						$status=($jmlbayarAkum>=$jmltagihan?"Lunas":"Belum Lunas");

						if ($this->db->where($fnourut,$nourut)->where($fnoreg,$noreg)->where("idlokasi", $idlokasi)->update($tbmaster,array("jmlBayar"=>$getSum->sumjum))){
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
						case "Tahunan":
							$tbBayar="bayar_tahunan_detil";
							$tbmaster="bayar_tahunan";
							$fnoreg="idpendaftaran";
							$fnourut="tahun_tagihan";
							$fnokuit="no_urut";
							break;
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
								'tgl_transfer' =>null,
								'dari_bank' =>"",
								'norek_pengirim' =>"",
								'nama_pengirim' =>"",
								'idrek_penerima' =>"",
								'jenis_kartu' =>"",
								'no_kartu' =>"",
								'nmpemilik_kartu' =>"",
								'no_struk' =>"",
								'tgl_struk' =>null
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
									'tgl_struk' =>null
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
									'tgl_transfer' =>null,
									'dari_bank' =>"",
									'norek_pengirim' =>"",
									'nama_pengirim' =>"",
									'idrek_penerima' =>""

									);
							break;
					}

					//*****
					$getTagihan=$this->db->query("select * from  $tbmaster where ".($jenis=="Bulanan" || $jenis=="Tahunan"?"idPendaftaran":"nopendaftaran")."='$noreg' and idlokasi= ".$idlokasi)->row();
					
					$jmltagihan=($jenis=="Bulanan" || $jenis=="Tahunan"?$getTagihan->jmlTagihan:($jenis=="Mingguan"?$getTagihan->jmlMinggu * $getTagihan->tarif:$getTagihan->jmlHari * $getTagihan->tarif));
					


					if ($jenis=="Bulanan" || $jenis=="Tahunan"){

						if ($this->db->where($fnoreg,$noreg)->where($fnourut,$nourut)->where($fnokuit,$nokuit)->where("idlokasi", $idlokasi)->update($tbBayar,$dataDetail)){
							$cekError.="update $tbBayar<br><br>";
							$this->db->where($fnoreg,$noreg)->where($fnourut,$nourut)->where("idlokasi", $idlokasi)->update($tbBayar,$kolomhapus);
							$this->db->trans_commit();
							$respon->status = 'success';

						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error";
						}
						
						$getSum=$this->db->query("select sum(jmlbayar) sumjum from  $tbBayar where ".($jenis=="Bulanan" || $jenis=="Tahunan"?"idPendaftaran":"nopendaftaran")." = '$noreg' and idlokasi= ".$idlokasi)->row();
						$jmlbayarAkum=$getSum->sumjum;
						$status=($jmlbayarAkum>=$jmltagihan?"Lunas":"Belum Lunas");

						if ($this->db->where($fnourut,$nourut)->where($fnoreg,$noreg)->where("idlokasi", $idlokasi)->update($tbmaster,array("jmlBayar"=>$getSum->sumjum))){
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

						$getSum=$this->db->query("select sum(jmlbayar) sumjum from  $tbBayar where noPendaftaran='$noreg' and idlokasi= ".$idlokasi)->row();
						$jmlbayarAkum=$getSum->sumjum;
						$status=($jmlbayarAkum>=$jmltagihan?"Lunas":"Belum Lunas");
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
		$notrans=0;
		$res=array();
		if ($jenis=="Bulanan" || $jenis=="Tahunan"){
			$notrans=$this->input->post('notrans');
		}
		$rsdel = $this->transaksi_model->hapusBayar($jenis, $noreg, $bayar_ke, $notrans, $idlokasi);
		$tbdetil="";$field="";
		switch($jenis){
			case "year_monthlyBill": $tbdetil="bayar_tahunan_tag_blnan"; $field="idpendaftaran"; break;
			case "Tahunan": $tbdetil="bayar_tahunan_detil"; $field="idpendaftaran"; break;
			case "Bulanan": $tbdetil="bayar_bulanan_detil";$field="idpendaftaran"; break;			
			case "Mingguan": $tbdetil="bayar_mingguan_detil"; $field="nopendaftaran"; break;
			case "Harian": $tbdetil="bayar_harian_detil"; $field="nopendaftaran"; break;
		}

		if ($jenis<>"year_monthlyBill"){
			
			$rsTagihan=$this->transaksi_model->getVal_tagihan($noreg, $jenis, $bayar_ke);
			$akumulasi="select IFNULL(SUM(jmlbayar),0) jml from ".$tbdetil." where  ".$field."='$noreg' and ".($jenis=="Bulanan"?"pembayaran_ke=".$bayar_ke : "tahun_tagihan='".$bayar_ke."'")." and idlokasi=".$idlokasi;
			$rsakm=$this->db->query($akumulasi)->row();
			$strupd="";
			if ($jenis=="Tahunan"){
				//$cek.="masuk bulanan<br>";
				$status= ( $rsakm->jml >= $rsTagihan->jmltagihan ? "Lunas":"Belum Lunas") ;
				$strupd="update bayar_tahunan set jmlbayar=".$rsakm->jml." where idpendaftaran='".$noreg."' and tahun_tagihan='".$bayar_ke."' and idlokasi=".$idlokasi;
			}elseif ($jenis=="Bulanan"){
				//$cek.="masuk bulanan<br>";
				$status= ( $rsakm->jml >= $rsTagihan->jmltagihan ? "Lunas":"Belum Lunas") ;
				$strupd="update bayar_bulanan set jmlbayar=".$rsakm->jml." where idpendaftaran='".$noreg."' and pembayaran_ke=$bayar_ke and idlokasi=".$idlokasi;
			}else{
				$status= ( $rsakm->jml>= ($rsTagihan->jumlahlama * $rsTagihan->tarif) ? "Lunas":"Belum Lunas") ;
				$strupd="update ".($jenis=='Mingguan'?"bayar_mingguan_master":"bayar_harian_master")." set jmlbayar=".$rsakm->jml.", status='".$status."' where nopendaftaran='".$noreg."' and idlokasi=".$idlokasi;
			}
			
			$res["data"]=$akumulasi."#".$strupd;
			if ($this->db->query($strupd)){
				if ($jenis=="Tahunan" || $jenis=="Bulanan"){
					$rsm=$this->db->query("select jmlbayar from ".($jenis=="Bulanan"?"bayar_bulanan":"bayar_tahunan")." where  idpendaftaran='".$noreg."' and ".($jenis=="Bulanan"?"thnbln_tagihan":"tahun_tagihan")."='".$bayar_ke."' and idlokasi=".$idlokasi)->row();
					if ($rsm->jmlbayar<=0){
						$this->db->query("delete from ".($jenis=="Bulanan"?"bayar_bulanan":"bayar_tahunan")." where  idpendaftaran='".$noreg."' and ".($jenis=="Bulanan"?"thnbln_tagihan":"tahun_tagihan")."='".$bayar_ke."' and idlokasi=".$idlokasi);
					}
				}
				$this->db->trans_commit();
				$res["status"]="success";
			}else{
				$res["status"]="error";
			}
		}else{
			if ($rsdel->status=="success"){
				$this->db->trans_commit();
				$res["status"]="success";
			}else{
				$res["status"]="error";
			}
		}
			
		//}

		$res["strku"]=$rsdel->str;
		echo json_encode($res);
	}


	public function tagihan()
	{
		$strbln="select pendaftaran.*, (select lokasi from lokasi where id=pendaftaran.idlokasi) NMLOKASI, (select nama from anak_kost where idanakkost=pendaftaran.idanakkost) NMPENGHUNI from pendaftaran where idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_bulanan WHERE  thnbln_tagihan ='".date('Ym')."' )  AND checkout=0 ";
		$strThn="select pendaftaran_tahunan.* , (select lokasi from lokasi where id=pendaftaran_tahunan.idlokasi) NMLOKASI, (select nama from anak_kost where idanakkost=pendaftaran_tahunan.idanakkost) NMPENGHUNI from pendaftaran_tahunan where idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_tahunan WHERE  tahun_tagihan ='".date('Y')."' )  AND checkout=0 ";
		$data['row_bln']=$this->db->query($strbln)->result();
		$data['row_thn']=$this->db->query($strThn)->result();
		$data["arrIntBln"]=$this->arrIntBln;
		$data["arrBulan"]=$this->arrBulan;
		$data["strbln"]=$strbln;
		$data["strThn"]=$strThn;
		$this->template->set('breadcrumbs','<h1>Pembayaran <small> <i class="ace-icon fa fa-angle-double-right"></i> Buat/Kirim Tagihan</small></h1>');
		$this->template->set('pagetitle',"Buat/Kirim Tagihan");
		$this->template->load('default',"ftransaksi/ftagihan" ,$data);
	}

	public function json_data_konfirmasi(){
			$myurl=$this->config->item('tenant_url')."/assets/";
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			
			$str="select * from konfirmasi where  status_cek=0 ".($this->session->userdata('auth')->ROLE=="Superadmin"?"":" and idlokasi=".$this->session->userdata('auth')->IDLOKASI);
			

						
			if ( $_GET['sSearch'] != "" )
			{
				$str.= " and  (periode_tagihan like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' ";				
			}
			
			
			if ( isset( $_GET['iSortCol_0'] ) )
			{
				$str .= " ORDER BY ".$_GET['mDataProp_'.$_GET['iSortCol_0']]." ".$_GET['sSortDir_0'];
			}else{
				$str .= " order by tglbayar";
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
				$rsnama=$this->db->query("select nama from anak_kost where idanakkost=(select idanakkost from ".($row->jenis_sewa=="Bulanan"?"pendaftaran":"pendaftaran_tahunan")." where idpendaftaran='".$row->idPendaftaran."')")->row();
				$rslokasi=$this->db->query("select lokasi from lokasi where id=".$row->idlokasi)->row();
				
				//alur hitung jml tagihan, tarif kamar+biaya lain2 (denda tidak dihitung)				
				$tblbayar=($row->jenis_sewa=="Bulanan"?"bayar_bulanan":"bayar_tahunan");
				$tblMasterDaftar=($row->jenis_sewa=="Bulanan"?"pendaftaran":"pendaftaran_tahunan");
				$tblDetilDaftar=($row->jenis_sewa=="Bulanan"?"detildaftar":"detildaftar_tahunan");
				$strb="SELECT  sum(b.tarif) jmlb from ".$tblDetilDaftar." d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='".$row->idPendaftaran."'";
				$strtarif="select tarifbulanan, tariftahunan from kamar where idkamar = (select idkamar from ".$tblMasterDaftar." where idpendaftaran='".$row->idPendaftaran."')";
				$rsTarif=$this->db->query($strtarif)->row();
				$rsBiaya=$this->db->query($strb)->row();
				
				$tarif=($row->jenis_sewa=="Bulanan"?$rsTarif->tarifbulanan: $rsTarif->tariftahunan);
				$biaya=$rsBiaya->jmlb;
				$tagihan=$tarif+$biaya;
				
				//cek status, belum bayar, lunas, belum lunas
				$scek="select jmlTagihan, (jmlBayar+pengurangan_denda) jmlBayar from ".$tblbayar." where idpendaftaran='".$row->idPendaftaran."' and ".($row->jenis_sewa=="Bulanan"?"thnbln_tagihan":"tahun_tagihan")."='".$row->periode_tagihan."' ";
				$cekRowStatus=$this->db->query($scek);
				$rscek=$cekRowStatus->row();
				$stsTagihan="";
				$periodeSblm="";
				if ($cekRowStatus->num_rows() <= 0){
					//jika cek tidak ada, maka cari periode sebelumnya, jika sblmnya blm ada maka belum pernah ada pembayaran
					$stsTagihan="Belum Bayar";
					//cari periode sebelumnya
					$sqlKonfirmasi=$this->db->query("SELECT ".($row->jenis_sewa=="Bulanan"?"thnbln_tagihan":"tahun_tagihan")." periode  FROM `".$tblbayar."` WHERE `idPendaftaran` LIKE '".$row->idPendaftaran."' order by pembayaran_ke desc limit 1");
					if ($sqlKonfirmasi->num_rows() > 0){
						$rsPeriode=$sqlKonfirmasi->row();
						$periodeSblm=$rsPeriode->periode;
					}else{
						$periodeSblm="Pembayaran pertama belum lunas";
					}
				}else{
					$stsTagihan=($rscek->jmlBayar >= $rscek->jmlTagihan ?"Lunas":"Belum Lunas");
					$periodeSblm=$row->periode_tagihan;
				}
							
				
				$aaData[] = array(
					'ID'=>$row->id,
					'JENIS_SEWA'=>$row->jenis_sewa,
					'LOKASI'=>$rslokasi->lokasi,
					'PENGHUNI'=>"[ ".$row->idPendaftaran." ] ".$rsnama->nama,
					'JENIS_BAYAR'=>$row->jenis_bayar,
					'PERIODE_TAGIHAN'=>$row->periode_tagihan,
					'PERIODE_SBLM'=>$periodeSblm,
					'METODE_BAYAR'=>$row->metode_bayar,
					'JMLBAYAR'=>$row->jmlBayar,
					'JMLTAGIHAN'=>$tagihan,
					'STSTAGIHAN'=>$stsTagihan,
					'BUKTI'=>'<img src="'.($row->bukti==""?$myurl."images/none.gif":$myurl."bukti/".$row->bukti).'" width="150" height="150">',
					'DETIL'=>'<a href="javascript:void(0)" onclick="viewThis(this)" data-id="'.$row->id.'" ><i class=" fa fa-eye " title="View"></i>&nbsp;Lihat Detil </a> <br/> <a href="javascript:void(0)" onclick="delkonfirmasi('.$row->id.', \''.str_replace("'"," ",$rsnama->nama).'\')"><i class="fa fa-power-off" title="Delete"></i>&nbsp;Hapus</a>'
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
	
	public function delConfirm(){
		$id=$this->input->post('idx');
		//$sts=$this->input->post('status');
		$res = $this->master_model->hapus($id, 'konfirmasi', 'id');
		return $res;
	}
	
	public function view_konfir(){
		$id=$this->input->post("id");
		$row = $this->db->query("select * from konfirmasi where id= ".$id)->row();
		$rowPenghuni = $this->db->query("select nama from anak_kost where idanakkost=(select idanakkost from ".($row->jenis_sewa=="Bulanan"?"pendaftaran":"pendaftaran_tahunan")." where idpendaftaran='".$row->idPendaftaran."')")->row();
		$rowLokasi = $this->db->query("select lokasi from lokasi where id=".$row->idlokasi)->row();
		$data["row"]=$row;
		$data["rowPenghuni"]=$rowPenghuni;
		$data["rowLokasi"]=$rowLokasi;
		$data["myurl"]=$this->config->item('tenant_url')."/assets/";
		if ($this->input->is_ajax_request()){

			$this->template->load('ajax','ftransaksi/fkonfirmasi_detil', $data);
		} else {
			$this->template->set('pagetitle','Lihat Detil Konfirmasi');
			$this->template->load('default','ftransaksi/fkonfirmasi_detil', $data);
		}
	}
	public function confirmOk(){
		$id = $this->input->post('id');
		$detTrans=$this->db->query("select * from konfirmasi where id=".$id);
		$rsTrans="";
		if ($detTrans->num_rows()>0){
			$rsTrans=$detTrans->row();			
			$petugas=$this->session->userdata('auth')->USERNAME;
			$metode_bayar =$rsTrans->metode_bayar;
			if ($rsTrans->jenis_sewa=="Tahunan" && $rsTrans->jenis_bayar=="Tagihan Sewa Tahunan"){
				//Tagihan Sewa Tahunan, Tagihan Air & Listrik
				$res=$this->transaksi_model->saveBayarTahunan($rsTrans, $petugas,$metode_bayar);
			}else{
				$res=$this->transaksi_model->saveBayarBulanan($rsTrans, $petugas,$metode_bayar);
			}

		}
		if($this->db->query("update konfirmasi set status_cek=1 where id=".$id)){
			
			$respon['status'] = 'success';

		} else {
			$respon['status'] = 'error';
			$respon['errormsg'] = 'Invalid Data';
			
			
		}
		echo json_encode($respon);	
	}

	public function form_geninv_bulanan(){
		$this->config->set_item('mysubmenu', 'mn31');	
		$noreg=$this->input->post("noreg");
		$data['noreg']=$noreg;
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
			
			$this->template->load('ajax','ftransaksi/finv_bulanan', $data);
		} else {			
			$this->template->set('pagetitle','Form Generate Invoice ');
			$this->template->load('default','ftransaksi/finv_bulanan', $data);
		}
	}
	
	public function saveInvFormBulanan(){
		$cekError="";
		$notrans=date("YmdHis");		
		$tagihan=$this->input->post('tagBlnn');
		$denda=($this->input->post('bayarKe')<=1?0:$this->input->post('dendaAwal') );
		$jmlBayar=0;
			if ($this->input->is_ajax_request()){	
			
			$this->load->library('form_validation');			
			$rules = array(				
					
						array(
						'field' => 'kwh_akhir',
						'label' => 'KWH_AKHIR',
						'rules' => 'trim|xss_clean|required'
					)
			);
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Field %s harus diisi.');
			$this->form_validation->set_message('numeric', 'Field %s harus diisi angka.');
			$respon = new StdClass();
			$detil_insert_id ="";
			$respon->errormsg="awal";
			if ($this->form_validation->run() == TRUE){
				
				$this->db->trans_begin();
				try {						
					
					//cek master
					$rscek=$this->db->query("select ifnull(count(*),0) cek from invoice_bulanan where idPendaftaran='".$this->input->post('noreg')."' and  pembayaran_ke=".$this->input->post('bayarKe'))->row();
					
					
					if ($rscek->cek <=0){
						$dataMaster= array(		
									'idPendaftaran' => $this->input->post('noreg'),											
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
						if ($this->db->insert('invoice_bulanan', $dataMaster)){	
							$ceksql=$this->db->last_query();							
							$this->db->trans_commit();
							$respon->status = 'success';
							$respon->ceksql=$ceksql;
							$cekError =$ceksql;
						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error master invoice bulanan#select count(*) cek from invoice_bulanan where idPendaftaran='".$this->input->post('noreg')."' and  pembayaran_ke=".$this->input->post('bayarKe');
						}

					}else{
						
						if ($this->db->query("update invoice_bulanan set jmlTagihan=".$tagihan.", kwh_terpakai=".$this->input->post('kwh_akhir') - $this->input->post('kwh_awal').", kwh_akhir=".$this->input->post('kwh_akhir')."  where idPendaftaran='".$this->input->post('noreg')."' and  pembayaran_ke=".$this->input->post('bayarKe')) ){	
							$this->db->trans_commit();
							$respon->status = 'success';
							$ceksql=$this->db->last_query();
							$cekError =$ceksql;
						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error master bayar bulanan kedua dst";
							$cekError = $respon->errormsg;
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
			//$respon->detil_insert_id=$detil_insert_id ;	
			//$respon->noreg=$this->input->post('bln_noreg');
			echo json_encode($respon);
			//exit;
		
		} 
	}

	
	public function deposit(){
		$data["proses"]="deposit";
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$this->config->set_item('mysubmenu', 'mn33');
		$this->template->set('breadcrumbs','<h1>Pembayaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Kelola Deposit</small></h1>');
		$this->template->set('pagetitle','Form Kelola Deposit ');
		$this->template->load('default','ftransaksi/fdepoFilter', $data);
	}

	public function form_deposit($valkey){
		$this->config->set_item('mysubmenu', 'mn33');
		$arrVal=explode('_', $valkey);
		$jenis=$arrVal[0];
		$noreg=$arrVal[1];
		$idlokasi=$arrVal[2];
		$view="";$str="";
		switch ($jenis){
				case "Tahunan":
					$str="select m.idpendaftaran, m.idlokasi, a.nama, m.checkout, a.alamat_asal, k.idkamar, k.labelkamar,k.tarifbulanan,k.tariftahunan,m.thn_mulai, m.tgldaftar, year(thn_mulai) xthn, k.tarifmingguan, k.tarifharian, m.diskon, m.kwh_awal from pendaftaran_tahunan m, anak_kost a, kamar k  where m.`idanakkost` = a.`idanakkost`	  and  a.jenis_sewa='Tahunan' and m.idkamar = k.idkamar 	and m.idpendaftaran='$noreg' and m.idlokasi=".$idlokasi;

					break;
				case "Bulanan":
					$str="select m.idpendaftaran, m.idlokasi, a.nama, m.checkout,a.alamat_asal, k.idkamar, k.labelkamar,k.tarifbulanan,m.tglmulai, m.tgldaftar, day(last_day(tglmulai)) dd_akhir, day(tglmulai) dd_mulai , (day(last_day(tglmulai))-day(tglmulai)) selisih, month(tglmulai) bln, year(tglmulai) xthn, k.tarifmingguan, k.tarifharian, m.diskon, m.kwh_awal from pendaftaran m, anak_kost a, kamar k  where m.`idanakkost` = a.`idanakkost`	and m.idkamar = k.idkamar 	and m.idpendaftaran='$noreg' and m.idlokasi=".$idlokasi;

					break;
				
			}
		$query = $this->db->query($str)->row();		
		$data["str"]=$str;
		$data["res"]=$query;
		$data["noreg"]=$noreg;
		$data['lokasi'] =$this->transaksi_model->getLokasi($idlokasi);
		$this->template->set('breadcrumbs','<h1>Pembayaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Kelola Mutasi Deposit</small></h1>');
		$this->template->set('pagetitle','Form Kelola Mutasi Deposit ');
		$this->template->load('default','ftransaksi/fdepo_'.$jenis, $data);
	}

	

	public function form_entri_depo(){
		$this->config->set_item('mysubmenu', 'mn33');
		$noreg=$this->input->post("noreg");
		$data['noreg']=$noreg;
		
		$idlokasi=$this->input->post("idlokasi");
		$data['idlokasi']=$idlokasi;
		$data['lokasi'] =$this->transaksi_model->getLokasi($idlokasi);
		
		$data['idkamar']=$this->input->post("idkamar");
		$qkamar = $this->db->query("select * from kamar where idkamar=".$this->input->post("idkamar"))->row();		
		$data["nmkamar"]=$qkamar->LABELKAMAR;
		
		$jenis=$this->input->post("jenis");
		$data["jenis"]=$jenis;
		$str="";
		if ($jenis=="Bulanan"){
			$str="select a.nama, p.deposit from pendaftaran p, anak_kost a where p.idanakkost=a.idanakkost";
		}else{
		
			$str="select a.nama, p.deposit from pendaftaran_tahunan p, anak_kost a where p.idanakkost=a.idanakkost";
		}
		$qregData = $this->db->query($str)->row();	
		$data["resDaftar"]=$qregData;

		if ($this->input->is_ajax_request()){

			$this->template->load('ajax','ftransaksi/fdepo_entriMutasi', $data);
		} else {
			$this->template->set('pagetitle','Form Entri Mutasi Deposit ');
			$this->template->load('default','ftransaksi/fdepo_entriMutasi', $data);
		}
	}


	public function saveMutasiDepo(){
		$cekError="";
		
		$tglBayarNow=date("Y-m-d");
		$noreg=$this->input->post('noreg');
		$idlokasi=$this->input->post('idlokasi');
		$jenis=$this->input->post('jenis');
		$isFirstDepo=$this->input->post('isFirstDepo');
		$tipe=$this->input->post('tipe');
		$jmlBayar=$this->input->post('jmlBayar');
		$deskripsi=$this->input->post('deskripsi');
		

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
			$master_insert_id =""; 	//untuk isFirstDepo 
			$detil_insert_id ="";
			if ($this->form_validation->run() == TRUE){

				$this->db->trans_begin();
				try {
					if ($isFirstDepo==1){	//depo pertama kali : setoran_awal, deposit_master
						$dataMaster= array(
									'idPendaftaran' => $noreg,
									'idlokasi' => $idlokasi,
									'jenis_sewa' => $jenis,
									'setoran_awal' => $this->input->post('jmlBayar'),
									'jumlah_akumulasi' => $this->input->post('jmlBayar') 
									
								);
						$ceksql="";
						if ($this->db->insert('deposit_master', $dataMaster)){
							$ceksql=$this->db->last_query();
							$master_insert_id = $this->db->insert_id();
							$this->db->trans_commit();
							$respon->status = 'success';
							$respon->ceksql=$ceksql;

						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error simpan data master #".$ceksql;
						}


					}else{
						$master_insert_id=$this->input->post('id_depomaster');
					}

					$dataDetil = array();					
					switch ($this->input->post('metodeBayar')){
						case "tunai":
							$dataDetil = array(
							'deposit_id' =>$master_insert_id,
							'tipe' => $this->input->post('tipe'),
							'deskripsi' => $this->input->post('deskripsi'),		
							'isFirstDepo' => $isFirstDepo,	
							'tglBayar' =>$tglBayarNow,
							'jumlah' =>$jmlBayar,
							'petugas' =>$this->session->userdata('auth')->USERNAME,
							'metode_bayar' =>$this->input->post('metodeBayar')
						);
							break;
						case "transfer":
							$dataDetil = array(
							'deposit_id' =>$master_insert_id,
							'tipe' => $this->input->post('tipe'),
							'deskripsi' => $this->input->post('deskripsi'),
							'isFirstDepo' => $isFirstDepo,
							'tglBayar' =>$tglBayarNow,
							'jumlah' =>$jmlBayar,
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
							$dataDetil = array(
							'deposit_id' =>$master_insert_id,
							'tipe' => $this->input->post('tipe'),
							'deskripsi' => $this->input->post('deskripsi'),	
							'isFirstDepo' => $isFirstDepo,
							'tglBayar' =>$tglBayarNow,
							'jumlah' =>$jmlBayar,
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

					$ceksqlD="";
					if ($this->db->insert('deposit_detil', $dataDetil)){
						$ceksqlD=$this->db->last_query();
						$cekError.="insert bayar detil bulanan<br><br>";
						$detil_insert_id = $this->db->insert_id();
						$this->db->trans_commit();
						$respon->status = 'success';

					} else {
						throw new Exception("gagal simpan");
						$respon->errormsg ="error insert deposit_detil";
					}


					//if isFirstDepo!= 1, update data deposit_master
					if ($isFirstDepo != 1){
						$getSum=$this->db->query("SELECT SUM( CASE             WHEN tipe = 'SETORAN' THEN jumlah WHEN tipe = 'PENARIKAN' THEN -jumlah END  ) AS sumjum from  deposit_detil where deposit_id=".$this->input->post('id_depomaster'))->row();

						if ($this->db->query("update deposit_master set jumlah_akumulasi=".$getSum->sumjum." where id=".$this->input->post('id_depomaster')) ){
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
			$respon->id_depomaster=$master_insert_id ;	//untuk cetak kuitansi terakhir
			echo json_encode($respon);
			

		}
	}

	public function formDepo_edit(){
		$this->config->set_item('mysubmenu', 'mn33');
		$jenis=$this->input->post('jenis');
		$depo_id=$this->input->post('depo_id');
		$id_detil=$this->input->post('id_detil');
		
		$str="select * from deposit_detil where deposit_id=".$depo_id." and id=".$id_detil;

		$recordset=$this->db->query($str)->row();
		$data["res"]=$recordset;
		$data["str"]=$str;
		$data["depo_id"]=$depo_id;
		$data["id_detil"]=$id_detil;
		$data["jenis"]=$jenis;		
		$view="ftransaksi/fdepoPop_Edit";		

		if ($this->input->is_ajax_request()){
			$this->template->load('ajax',$view,$data);
		} else {
			$this->template->set('pagetitle','Form Edit Pembayaran '.$jenis);
			$this->template->load('default',$view,$data);
		}
	}

	public function saveDepoEdit(){
		$cekError="";
		$jenis=$this->input->post('jenis');
		$depo_id=$this->input->post('depo_id');
		$id_detil=$this->input->post('id_detil'); 
		$tglBayar=$this->input->post('tglBayar');
		$jmlBayar=$this->input->post('jmlBayar');
		$tipe=$this->input->post('tipe');
		$deskripsi=$this->input->post('deskripsi');
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
					
					$dataMaster = array(); 
					$kolomhapus= array();
					$tbBayar="deposit_detil";
					$tbmaster="deposit_master";
					switch ($metodeBayar){
						case "tunai":
							$dataDetail= array(
								'tglBayar' =>$tglBayar,
								'jumlah' =>$jmlBayar,
								'tipe' =>$tipe,
								'deskripsi' =>$deskripsi,
								'petugas' =>$petugas,
								'metode_bayar' =>$metodeBayar
							);
							$kolomhapus= array(
								'tgl_transfer' =>null,
								'dari_bank' =>"",
								'norek_pengirim' =>"",
								'nama_pengirim' =>"",
								'idrek_penerima' =>"",
								'jenis_kartu' =>"",
								'no_kartu' =>"",
								'nmpemilik_kartu' =>"",
								'no_struk' =>"",
								'tgl_struk' =>null
								);
							break;
						case "transfer":
							$dataDetail= array(
								'tglBayar' =>$tglBayar,
								'jumlah' =>$jmlBayar,
								'tipe' =>$tipe,
								'deskripsi' =>$deskripsi,
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
									'tgl_struk' =>null
									);
							break;
						case "kartu":
							$dataDetail= array(
								'tglBayar' =>$tglBayar,
								'jumlah' =>$jmlBayar,
								'tipe' =>$tipe,
								'deskripsi' =>$deskripsi,
								'petugas' =>$petugas,
								'metode_bayar' =>$metodeBayar,
								'jenis_kartu' =>$this->input->post('krJenis') ,
								'no_kartu' =>$this->input->post('krNoCard') ,
								'nmpemilik_kartu' =>$this->input->post('krNama') ,
								'no_struk' =>$this->input->post('krNoStruk') ,
								'tgl_struk' =>$this->input->post('krTglStruk')
							);
							$kolomhapus= array(
									'tgl_transfer' =>null,
									'dari_bank' =>"",
									'norek_pengirim' =>"",
									'nama_pengirim' =>"",
									'idrek_penerima' =>""

									);
							break;
					}

					//*****
										
					if ($this->db->where('deposit_id',$depo_id)->where('id',$id_detil)->update($tbBayar,$dataDetail)){
						
						$this->db->where('deposit_id',$depo_id)->where('id',$id_detil)->update($tbBayar,$kolomhapus);
							$this->db->trans_commit();
							$respon->status = 'success';

						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error";
						}
						
					
					$getSum=$this->db->query("SELECT SUM( CASE WHEN tipe = 'SETORAN' THEN jumlah WHEN tipe = 'PENARIKAN' THEN -jumlah END  ) AS sumjum from  deposit_detil where deposit_id=".$depo_id)->row();

						if ($this->db->query("update deposit_master set jumlah_akumulasi=".$getSum->sumjum." where id=".$depo_id) ){
							$this->db->trans_commit();
							$respon->status = 'success';

						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error master bayar bulanan kedua dst";
						}

					$getFirstDepo=$this->db->query("select * from  $tbBayar where id='".$id_detil."' and deposit_id= ".$depo_id)->row();
					if ($getFirstDepo->isFirstDepo==1){
						$this->db->query("update  $tbmaster set setoran_awal=".$jmlBayar." where jenis_sewa='".$jenis."' and id=".$depo_id);
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
}
