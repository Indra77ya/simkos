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
	
	
	public function index()
	{	
		$this->config->set_item('mymenu', 'mn01');
		if ($this->auth->is_login()){

		$data=array();
	
			$reslokasi=$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
			$data['lokasi'] =$reslokasi;
			$data['resKostProfil'] = $reslokasi;
			
			/*$strTahunan="select a.nama,a.noidentitas, a.alamat_asal,a.notelp Telp, k.labelkamar, p.tglMulai,p.tgldaftar, p.kwh_awal, p.checkout, p.deposit, p.idPendaftaran from pendaftaran_tahunan p, anak_kost a, kamar k where a.jenis_sewa='Tahunan' and p.idlokasi=".$reslokasi->id." and p.idanakkost=a.idanakkost and k.idkamar=p.idkamar and tglMulai like '".date('Y')."-".date('m')."%' order by k.labelkamar";

			$strBulan="select a.nama,a.noidentitas, a.alamat_asal,a.notelp Telp, k.labelkamar, p.tglMulai,p.tgldaftar, p.kwh_awal, p.checkout, p.deposit, p.idPendaftaran from pendaftaran p, anak_kost a, kamar k where a.jenis_sewa='Bulanan' and p.idlokasi=".$reslokasi->id." and p.idanakkost=a.idanakkost and k.idkamar=p.idkamar and tglMulai like '".date('Y')."-".date('m')."%' order by k.labelkamar";

			$strMinggu="select d.*, k.labelkamar from daftar_sewa_mingguan d, kamar k where d.idlokasi=".$reslokasi->id." and d.idkamar=k.idkamar and tglmulai like '".date('Y')."-".date('m')."%' order by labelkamar";

			$strHari="select d.*, k.labelkamar from daftar_sewa_harian d, kamar k where d.idlokasi=".$reslokasi->id." and  d.idkamar=k.idkamar and tglCek_in like '".date('Y')."-".date('m')."%' order by labelkamar";
			
			$data['resThn']=$this->db->query($strTahunan)->result();
			$data['res']=$this->db->query($strBulan)->result();
			$data['resWeek']=$this->db->query($strMinggu)->result();
			$data['resDay']=$this->db->query($strHari)->result();*/
			$data['statusData'] = "cabang";
			//$data['strBulan'] = $strBulan;
			
	
			//$str = "select anak_kost.*, (select lokasi from lokasi where id=anak_kost.idlokasi) NAMALOKASI from anak_kost where idanakkost= (select idanakkost from ".($this->session->userdata('auth')->JENIS_SEWA=="Bulanan"?"pendaftaran":"pendaftaran_tahunan")." where idpendaftaran='".$this->session->userdata('auth')->IDPENDAFTARAN."')";
			//$row=$this->db->query($str)->row();
			$link_admin=$this->config->item('link_admin');
			$res=$link_admin."/assets/images/foto/".$this->session->userdata('profil')->foto;
			$nmfile=base_url("assets/images/none.gif");
				if (  file_exists($res) && $this->session->userdata('profil')->foto<>""){
					$nmfile=$res;
				}
		
			$data["arrBulan"]=$this->arrBulan;
			$data["nmfile"]=$res;
			//$data["resRole"]=$row;
			$data["jns_sewa"]=$this->session->userdata('auth')->JENIS_SEWA;
			$data["noreg"]=$this->session->userdata('auth')->IDPENDAFTARAN;

			$this->template->set('pagetitle','Beranda '.$this->session->userdata('auth')->NAMA);	
			$this->template->set('breadcrumbs','<h1>Dashboard<small> <i class="ace-icon fa fa-angle-double-right"></i> overview &amp; stats</small></h1>');
			$this->template->load('default','dashboard/index',$data);
			
		}else{
			$this->load->view('login');
		}
	}
	
	public function logout(){
		$str="update login_penghuni set updated_date='".date('Y-m-d H:i:s')."' where ID='".$this->session->userdata('auth')->ID."'";
		$this->db->query($str);
		$this->db->trans_commit();
		$this->auth->logout();
		redirect('/');
	}
	
}
