<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends MY_App {
	var $branch = array();

	function __construct()
	{
		parent::__construct();
		$this->load->model('report_model');		
		$this->load->model('transaksi_model');		
		$this->auth->authorize('index');
	}
	
	public function eula(){
		$this->config->set_item('mymenu', 'mn02');
		if ($this->auth->is_login()){
			$this->template->set('pagetitle','End User License Agreement ');	
			$this->template->set('breadcrumbs','<h1>Dashboard<small> <i class="ace-icon fa fa-angle-double-right"></i> End User License Agreement</h1>');
			$this->template->load('default','dashboard/eula',compact('str'));
			
		}else{
			$this->load->view('login');
		}
	}
	public function roomMap()
	{
		$lokasi = $this->input->post('lokasi');
		if (empty($lokasi)) {
			$respon['status'] = 'error';
			$respon['errormsg'] = 'Lokasi belum dipilih';
			echo json_encode($respon);
			return;
		}

		$str = "select kamar.*,  (select lokasi from lokasi where id=kamar.idlokasi) NAMALOKASI from kamar where idlokasi = ? order by labelkamar";
		$query = $this->db->query($str, array($lokasi))->result();
		$i=1;
		$html="";
		$nama_m="";
		$data_strm="";
		$interval_m="";
		$badge="";
		foreach($query as $row){
			$rsterisi = $this->db->query("select terisi from cekkamar where idkamar= ?", array($row->IDKAMAR))->row();

			$terisi_val = ($rsterisi) ? $rsterisi->terisi : 0;

			$color=($terisi_val<=0?"infobox-grey":"infobox-blue");
			$ava=($terisi_val<=0?1:0);
			if ($terisi_val >0){
				//daily
				
				$strd="select * from daftar_sewa_harian where idkamar= ? and checkout=0";
				$rsdaily = $this->db->query($strd, array($row->IDKAMAR))->result();
					foreach($rsdaily as $rowd){						
						$nama_d=explode(" ",$rowd->nama);
						$dd_mulai=date('d', strtotime($rowd->tglCek_in));
						$ymd_jatuhtempo=$rowd->tglCek_out;
						$badge=(strtotime($ymd_jatuhtempo)<=strtotime(date('Y-m-d'))?"badge-warning":"badge-success");
						$data_strm.="H: ".$nama_d[0].", ".$rowd->tglCek_in."<br/>";
						
					$tgl=date('Y-m-d', strtotime($ymd_jatuhtempo));			
					$interval=date_diff(date_create($tgl),date_create() );
					$interval_m.=$interval->format("%d")." hari<br/>";
					}
				
				//weekly
				$strw="select * from daftar_sewa_mingguan where idkamar= ? and checkout=0";
				$rsweekly = $this->db->query($strw, array($row->IDKAMAR))->result();
					foreach($rsweekly as $roww){						
						$nama_w=explode(" ",$roww->nama);
						$dd_mulai=date('d', strtotime($roww->tglMulai));
						$ymd_jatuhtempo=$roww->tglAkhir;
						$badge=(strtotime($ymd_jatuhtempo)<=strtotime(date('Y-m-d'))?"badge-warning":"badge-success");
						$data_strm.="M: ".$nama_w[0].", ".$roww->tglMulai."<br/>";
						
					$tgl=date('Y-m-d', strtotime($ymd_jatuhtempo));			
					$interval=date_diff(date_create($tgl),date_create() );
					$interval_m.=$interval->format("%d")." hari<br/>";
					}
				//monthly
				$strm="select * from pendaftaran where idkamar= ? and checkout=0";
				$rsmonthly = $this->db->query($strm, array($row->IDKAMAR))->result();
				$ymd_jatuhtempo="";
					foreach($rsmonthly as $rowm){
						$rspenghuni = $this->db->query("select nama from anak_kost where idanakkost=".$rowm->IDANAKKOST)->row();
						$nama_m=explode(" ",$rspenghuni->nama);
						$dd_mulai=date('d', strtotime($rowm->tglMulai));
						$thnblnskr=date('Ym');
						$thnbln=date('Ym', strtotime($rowm->tglMulai));
						if ($thnblnskr==$thnbln){
						    $ymd_jatuhtempo=date("Y-m-d", strtotime("+1 month", strtotime($rowm->tglMulai)));
						}else{
						    $ymd_jatuhtempo=date('Y-m')."-".$dd_mulai;
						}
						
						
						$badge=(strtotime($ymd_jatuhtempo)<=strtotime(date('Y-m-d'))?"badge-warning":"badge-success");
						$data_strm.="B: ".$nama_m[0].", ".$rowm->tglMulai."<br/>";
						
					$tgl=date('Y-m-d', strtotime($ymd_jatuhtempo));			
					$interval=date_diff(date_create($tgl),date_create() );
					$interval_m.=$interval->format("%d")." hari<br/>";
					}
				
				
				
				//yearly
				$strt="select * from pendaftaran_tahunan where idkamar= ? and checkout=0";
				$rsyearly = $this->db->query($strt, array($row->IDKAMAR))->result();
					foreach($rsyearly as $rowt){
						$rspenghuni = $this->db->query("select nama from anak_kost where idanakkost=".$rowt->IDANAKKOST)->row();
						$nama_t=explode(" ",$rspenghuni->nama);
						$dd_mulai=date('d', strtotime($rowt->TGLDAFTAR));
						$mm_mulai=date('m', strtotime($rowt->TGLDAFTAR));
						$ymd_jatuhtempo=(date('Y')+1)."-".$mm_mulai."-".$dd_mulai;
						$badge=(strtotime($ymd_jatuhtempo)<=strtotime(date('Y-m-d'))?"badge-warning":"badge-success");
						$data_strm.="T : ".$nama_t[0].", ".$rowt->TGLDAFTAR."<br/>";
					$tglt=date('Y-m-d', strtotime($ymd_jatuhtempo));			
					$interval=date_diff(date_create($tglt),date_create() );					
					$interval_m.=$interval->format("%m")." bln, ".$interval->format("%d")." hari<br/>";
					}
					
			}
			$link='';
			$html.='<div class="infobox '.$color.'">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-bed"></i>
					</div>
					
					<div class="infobox-data">
						<span class="infobox-data-number">'.($ava==1?'<a href="javascript:void(0)" onclick="chooseNext(this)" data-idlokasi="'.$this->input->post('lokasi').'" data-idkamar="'.$row->IDKAMAR.'">':'').$row->LABELKAMAR.($ava==1?'</a>':'').'</span>
						<div class="infobox-content">'.$data_strm.'</div>
						
					</div>
					
					<div class="badge '.$badge.'">'.$interval_m.'</div>
				</div>';
			$i++;
			$data_strm="";
			$interval_m="";
		}
		
		$respon['status'] = 'success';
		$respon['html'] = $html;
		
		echo json_encode($respon);
	}
	public function index()
	{	
		$this->config->set_item('mymenu', 'mn01');
		if ($this->auth->is_login()){

		$data=array();
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
			$data['statusData'] = "pusat";
			$data['resKostProfil'] = $this->db->query("select * from owner")->row();
			$data['resAllKost'] = $this->db->query("select * from lokasi where isactive=1")->result();
		}else{
			$reslokasi=$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
			//$data['lokasi'] =$reslokasi;
			
			$data['resKostProfil'] = $reslokasi;
			
			$strTahun="select a.nama,a.noidentitas, a.alamat_asal,a.notelp Telp, k.labelkamar, p.tgldaftar, p.kwh_awal, p.checkout, p.deposit, p.idPendaftaran from pendaftaran_tahunan p, anak_kost a, kamar k where p.idlokasi=".$reslokasi->id." and p.idanakkost=a.idanakkost and k.idkamar=p.idkamar and tgldaftar like '".date('Y')."-".date('m')."%' order by k.labelkamar";
			$strBulan="select a.nama,a.noidentitas, a.alamat_asal,a.notelp Telp, k.labelkamar, p.tglMulai,p.tgldaftar, p.kwh_awal, p.checkout, p.deposit, p.idPendaftaran from pendaftaran p, anak_kost a, kamar k where p.idlokasi=".$reslokasi->id." and p.idanakkost=a.idanakkost and k.idkamar=p.idkamar and tglMulai like '".date('Y')."-".date('m')."%' order by k.labelkamar";
			$strMinggu="select d.*, k.labelkamar from daftar_sewa_mingguan d, kamar k where d.idlokasi=".$reslokasi->id." and d.idkamar=k.idkamar and tglmulai like '".date('Y')."-".date('m')."%' order by labelkamar";
			$strHari="select d.*, k.labelkamar from daftar_sewa_harian d, kamar k where d.idlokasi=".$reslokasi->id." and  d.idkamar=k.idkamar and tglCek_in like '".date('Y')."-".date('m')."%' order by labelkamar";
			
			$data['resThn']=$this->db->query($strTahun)->result();
			$data['resMonthly']=$this->db->query($strBulan)->result();
			$data['resWeek']=$this->db->query($strMinggu)->result();
			$data['resDay']=$this->db->query($strHari)->result();
			$data['statusData'] = "cabang";
			$data['strBulan'] = $strBulan;
			$data['strTahun'] = $strTahun;
			
		}
			$str = "select pengguna.*, (select lokasi from lokasi where id=pengguna.idlokasi) NAMALOKASI from pengguna where id =".$this->session->userdata('auth')->ID;
			$row=$this->db->query($str)->row();
			$res=file_exists("assets/images/avatars/".$row->FOTO);
			$nmfile=base_url("assets/images/none.gif");
				if (  file_exists("assets/images/avatars/".$row->FOTO) && $row->FOTO<>""){
					$nmfile=base_url("assets/images/avatars/".$row->FOTO);
				}
		
			$data["arrBulan"]=$this->arrBulan;
			$data["nmfile"]=$nmfile;
			$data["resRole"]=$row;
			
			if ($this->session->userdata('auth')->ROLE=="Superadmin"){
				$data['lokasi'] = $this->common_model->comboLokasi();
			}else{
				$data['optlokasi'] = $this->common_model->comboLokasiSingle($this->session->userdata('auth')->IDLOKASI);
				$data['lokasi'] =$this->common_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
			}

			$this->template->set('pagetitle','Beranda '.$this->session->userdata('auth')->NAMA);	
			$this->template->set('breadcrumbs','<h1>Dashboard<small> <i class="ace-icon fa fa-angle-double-right"></i> overview &amp; stats</small></h1>');
			$this->template->load('default','dashboard/index',$data);
			
		}else{
			$this->load->view('login');
		}
	}
	
	public function logout(){
		$str="update pengguna set updated_date='".date('Y-m-d H:i:s')."' where ID='".$this->session->userdata('auth')->ID."'";
		$this->db->query($str);
		$this->db->trans_commit();
		$this->auth->logout();
		redirect('/');
	}
		
	public function frontRegForm(){
		$this->config->set_item('mysubmenu', 'mn31');
		$idkamar=$this->input->post("idkamar");
		$idlokasi=$this->input->post("idlokasi");
		$data['idkamar']=$idkamar;
		$data['idlokasi']=$idlokasi;
		$data['lokasi'] =$this->transaksi_model->getLokasi($idlokasi);
		$query = $this->db->query("select * from kamar where idkamar=".$idkamar)->row();		
		$data['kamar']=$query ;
		if ($this->input->is_ajax_request()){

			$this->template->load('ajax','dashboard/fregistrasi', $data);
		} else {
			$this->template->set('pagetitle','Form Entri Pendaftara');
			$this->template->load('default','dashboard/fregistrasi', $data);
		}
	}
}
