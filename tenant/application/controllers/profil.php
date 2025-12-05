<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil extends MY_App {

	function __construct()
	{
		parent::__construct();
		$this->config->set_item('mymenu', 'mn1');		
		$this->load->helper(array('form', 'url'));
		$this->load->model('param_model');
		$this->auth->authorize();
	}
	
	
	
	public function data_pribadi(){
		if($this->input->post()) {	
						
			$this->db->trans_begin();
			$this->load->library('form_validation');
			
			$rules = array(				
					
					array(
						'field' => 'nama_lengkap1',
						'label' => 'NAMA_LENGKAP_PENGHUNI',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'notelp1',
						'label' => 'NO_TELP_PENGHUNI',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'alamat1',
						'label' => 'ALAMAT_ASAL',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'posisi_meteran',
						'label' => 'POSISI_METERAN',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'email1',
						'label' => 'EMAIL_PENGHUNI',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'deposit',
						'label' => 'DEPOSIT',
						'rules' => 'trim|xss_clean|required'
					)
			);
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Field %s harus diisi.');
			$respon = new StdClass();

			if ($this->form_validation->run() == TRUE){
				
			$this->db->trans_begin();
			try {

			$dataPenghuni = array(							
							'NOIDENTITAS' => $this->input->post('identitas1'),							
							'IDLOKASI' => $this->input->post('lokasi_bln'),
							'NAMA' => $this->input->post('nama_lengkap1'),
							'JENISKELAMIN' => $this->input->post('jnskelamin1'),							
							'TEMPAT_LAHIR' => $this->input->post('tempatlahir1'),						
							'TGLLAHIR' =>($this->input->post('tgllahir1')==""?null:$this->input->post('tgllahir1')),	
							'ALAMAT_ASAL' => $this->input->post('alamat1') ,	
							'NOTELP' =>$this->input->post('notelp1'),	
							'EMAIL' =>$this->input->post('email1'),	
							//'FOTO' =>$this->input->post('foto'),	
							'NAMA_PT' =>$this->input->post('nama_instansi'),	
							'ALAMAT_KERJA_KULIAH' =>$this->input->post('alamat_instansi'),	
							'NOTELP_INSTANSI' =>$this->input->post('notelp_instansi'),	
							'NAMA_PJ' =>$this->input->post('nama_lengkap2'),	
							'NOIDENTITAS_PJ' =>$this->input->post('identitas2'),	
							'NOTELP_PJ' =>$this->input->post('notelp2'),	
							'EMAIL_PJ' =>$this->input->post('email2'),	
							'JENISKELAMIN_PJ' =>$this->input->post('jnskelamin2'),	
							'TEMPAT_LAHIR_PJ' =>$this->input->post('tempat_lahir2'),	
							'TGL_LAHIR_PJ' =>($this->input->post('tgllahir2')==""?null:$this->input->post('tgllahir2')),	
							'ALAMAT_PJ' =>$this->input->post('alamat2'),
							'HUBUNGAN' =>$this->input->post('hubungan'),
							'JENIS_SEWA' =>'Bulanan'
						);	
				if ($this->db->where('idanakkost',$this->input->post('idanakkost'))->update('anak_kost',$dataPenghuni)){
						$this->db->trans_commit();
						$respon->status = 'success';
					}else {
						throw new Exception("gagal update");
					}

			}catch (Exception $e) {
						$respon->status = 'error';
						$respon->errormsg = $e->getMessage();
						$this->db->trans_rollback();
			}
			
			}else {
				$respon->status = 'error';
				$respon->errormsg = validation_errors();
				
			}

		echo json_encode($respon);
		exit;
		}
		$this->config->set_item('mysubmenu', 'mn12');
		$link_admin=$this->config->item('link_admin');
		$data['foto']=($this->session->userdata('profil')->foto==""?base_url("assets/images/none.gif"):$link_admin."/assets/images/foto/".$this->session->userdata('profil')->foto);
		$data['ktp']=($this->session->userdata('profil')->imgidentitas==""?base_url("assets/images/none.gif"):$link_admin."/assets/images/foto/".$this->session->userdata('profil')->imgidentitas);
		$data['idpendaftaran']=$this->session->userdata('auth')->IDPENDAFTARAN;
		$data['jenis_sewa']=$this->session->userdata('auth')->JENIS_SEWA;
		$data['res'] =$this->db->query("select * from anak_kost where jenis_sewa='".$this->session->userdata('auth')->JENIS_SEWA."' and idanakkost='".$this->session->userdata('auth')->IDANAKKOST."'")->row();
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Data Pribadi</small></h1>');
		$this->template->set('pagetitle','Data Pribadi');
		$this->template->load('default','setting/vdata_pribadi', $data);
	}
	public function data_sewa(){
		

		$this->config->set_item('mysubmenu', 'mn13');

		$jenis=$this->session->userdata('auth')->JENIS_SEWA;		
		$noreg=$this->session->userdata('auth')->IDPENDAFTARAN;
		$idlokasi=$this->session->userdata('auth')->IDLOKASI;		
		

		switch ($jenis){
			case "Tahunan":
				$view="ftransaksi/frmEditTahunan";
				$str="select p.`idpendaftaran`,p.idlokasi, p.`tgldaftar`, p.`thn_mulai`, p.`idkamar`, p.diskon,p.kwh_awal, p.deposit, k.labelkamar, k.fasilitas,k.tarifbulanan, a.* from pendaftaran_tahunan p, anak_kost a, kamar k 	where p.`idanakkost`=a.`idanakkost` and a.jenis_sewa='Tahunan' and p.`idkamar`=k.`idkamar` and p.`idanakkost`=a.`idanakkost` and p.`idkamar`=k.`idkamar` and p.idpendaftaran='$noreg' and p.idlokasi=".$idlokasi;
				break;
			case "Bulanan":
				$view="ftransaksi/frmEditBulanan";
				$str="select p.`idpendaftaran`,p.idlokasi, p.`tgldaftar`, p.`tglmulai`, p.`idkamar`, p.diskon,p.kwh_awal, p.deposit, k.labelkamar, k.fasilitas,k.tarifbulanan, a.* from pendaftaran p, anak_kost a, kamar k 	where p.`idanakkost`=a.`idanakkost` and p.`idkamar`=k.`idkamar` and a.jenis_sewa='Bulanan' and p.`idanakkost`=a.`idanakkost` and p.`idkamar`=k.`idkamar` and p.idpendaftaran='$noreg' and p.idlokasi=".$idlokasi;
				break;
			case "Mingguan":
				$str="select * from daftar_sewa_mingguan where idpendaftaran='$noreg' and idlokasi=".$idlokasi;
				$view="ftransaksi/frmEditMingguan";
				break;
			case "Harian":
				$str="select * from daftar_sewa_harian where idpendaftaran='$noreg' and idlokasi=".$idlokasi;
				$view="ftransaksi/frmEditHarian";
				break;

		}

		$recordset=$this->db->query($str)->row();
		$data["str"]=$str;
		$data["jenis"]=$jenis;
		$data["res"]=$recordset;
		$data["resKamar"]=$this->db->query("select * from kamar where idkamar='".($jenis=="Bulanan" || $jenis=="Tahunan"?$recordset->idkamar:$recordset->idKamar)."'")->row();
		$data['lokasi'] =$this->param_model->getLokasi($idlokasi);

		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Data Sewa</small></h1>');
		$this->template->set('pagetitle','Data Sewa');
		$this->template->load('default','setting/vdata_sewa', $data);
	}


public function data_login(){
	
	if($this->input->post()) {	
			$password = trim($this->input->post('password'));
			$password2 = trim($this->input->post('password2'));
			$password3 = trim($this->input->post('password3'));
						
			$this->db->trans_begin();
			$respon = new StdClass();
			try {
			$respon->status = 'error';
			if ($password=="" || $password2==""){
				$respon->errormsg ="Password tidak boleh kosong. Data tidak berhasil disimpan.";
			}else{
				if ($password2 != $password3){
					$respon->errormsg ="Password yang diinputkan tidak sama. Data tidak berhasil disimpan.";
				}else{
					$rs=$this->db->query("select password from login_penghuni where ID=".$this->session->userdata('auth')->ID)->row();
					$oldpass=$rs->password;
					if (md5($password)!=$oldpass){
						$respon->errormsg ="Password lama yang diinputkan salah. Data tidak berhasil disimpan.";
					}else{
						$this->db->where('id',$this->session->userdata('auth')->ID)->update('login_penghuni',array('password'=>md5($password2) ));				
						$this->db->trans_commit();
						$respon->status = 'success';
						$respon->errormsg  ="Password berhasil disimpan";
					}
				}
			}	

			}catch (Exception $e) {
						$respon->status = 'error';
						$respon->errormsg = $e->getMessage();
						//$respon->errormsg = $respon->pesan;
						$this->db->trans_rollback();
			}		

		echo json_encode($respon);
		exit;
		}
				
		$this->config->set_item('mysubmenu', 'mn11');
		$data['idpendaftaran']=$this->session->userdata('auth')->IDPENDAFTARAN;
		$data['jenis_sewa']=$this->session->userdata('auth')->JENIS_SEWA;
		$data['row'] =$this->db->query("select * from login_penghuni where jenis_sewa='".$this->session->userdata('auth')->JENIS_SEWA."' and idpendaftaran='".$this->session->userdata('auth')->IDPENDAFTARAN."'")->row();
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Data Login</small></h1>');
		$this->template->set('pagetitle','Data Login');
		$this->template->load('default','setting/vdata_login', $data);

	}
	
	public function getParams(){
		$id = $this->input->post('id');
		$str="select * from owner where id=$id";
		$query = $this->db->query($str)->row();
		
		if(empty($query)){
			$respon['status'] = 'error';
			$respon['errormsg'] = 'Invalid Data';
		} else {
			$respon['status'] = 'success';
			$respon['data'] = $query;
		}
		echo json_encode($respon);
	}
	public function json(){
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str = "SELECT * FROM owner";
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				$str.= " WHERE nama_kota LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' ";
				
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
					'id'=>$row->id,
					'value1'=>$row->nama,
					'pemilik'=>$row->nama_pemilik,
					'value3'=>$row->telepon,
					'value2'=>"<img src=\"".base_url("assets/images/logo/".$row->logo)."\" width=\"100\" height=\"80\">",										
					'ACTION'=>'<a href="javascript:void(0)"	onclick="editParams(this)" data-id="'.$row->id.'" ><i class="fa fa-edit" title="Edit Detail"></i></a> '
				);
			}
			
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => $aaData
			);
			echo json_encode($output);
	}

	public function receipt_var(){
		$this->config->set_item('mysubmenu', 'mn18');
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Setting variabel kuitansi</small></h1>');
		$this->template->set('pagetitle','Setting variabel kuitansi');
		$this->template->load('default','setting/frmreceipt_var');
	}

	public function savingVar(){
			$id = $this->input->post('id');
						
			$this->db->trans_begin();
			$respon = new StdClass();
		try {
			
			$error='';
				$data= array(
						'nama_kota' => strtoupper($this->input->post('txt1')),						
						'notes' =>$this->input->post('txt2')					
				);
					
				$this->db->where('id',$id)->update('kuitansi_var',$data);				
				$this->db->trans_commit();					
				$respon->status = 'success';
			

		}catch (Exception $e) {
				//$respon->isi="error loh";
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
		}
				
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Setting variabel kuitansi</small></h1>');
		$this->template->set('pagetitle','Setting variabel kuitansi');
		$this->template->load('default','setting/frmreceipt_var');

	}
	
	public function getVars(){
		$id = $this->input->post('id');
		$str="select * from kuitansi_var where id=$id";
		$query = $this->db->query($str)->row();
		
		if(empty($query)){
			$respon['status'] = 'error';
			$respon['errormsg'] = 'Invalid Data';
		} else {
			$respon['status'] = 'success';
			$respon['data'] = $query;
		}
		echo json_encode($respon);
	}
	public function json_var(){
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str = "SELECT * FROM kuitansi_var";
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				$str.= " WHERE nama_kota LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or notes LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' ";
				
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
					'id'=>$row->id,
					'notes'=>$row->notes,														
					'ACTION'=>'<a href="javascript:void(0)"	onclick="editVars(this)" data-id="'.$row->id.'" ><i class="fa fa-edit" title="Edit Detail"></i></a> '
				);
			}
			
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => $aaData
			);
			echo json_encode($output);
	}



	public function kwh_listrik(){
		$this->config->set_item('mysubmenu', 'mn19');
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Setting Data Kwh Listrik PLN</small></h1>');
		$this->template->set('pagetitle','Setting Data Kwh Listrik PLN');
		$this->template->load('default','setting/frmkwh_var');
	}

	public function savingKwh_Vars(){
			$id = $this->input->post('id');
						
			$this->db->trans_begin();
			$respon = new StdClass();
		try {
			
			$error='';
				$data= array(
						'kwh_tdk_kena_tarif' => strtoupper($this->input->post('txt1')),						
						'kwh_tarif' =>$this->input->post('txt2')					
				);
					
				$this->db->where('id',$id)->update('kwh_var',$data);				
				$this->db->trans_commit();					
				$respon->status = 'success';
			

		}catch (Exception $e) {
				//$respon->isi="error loh";
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
		}
				
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Setting Data Kwh Listrik PLN</small></h1>');
		$this->template->set('pagetitle','Setting Data Kwh Listrik PLN');
		$this->template->load('default','setting/frmkwh_var');

	}
	
	public function getKwh_vars(){
		$id = $this->input->post('id');
		$str="select * from kwh_var where id=$id";
		$query = $this->db->query($str)->row();
		
		if(empty($query)){
			$respon['status'] = 'error';
			$respon['errormsg'] = 'Invalid Data';
		} else {
			$respon['status'] = 'success';
			$respon['data'] = $query;
		}
		echo json_encode($respon);
	}
	public function jsonKwh_var(){
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str = "SELECT * FROM kwh_var";
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				$str.= " WHERE kwh_tdk_kena_tarif LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or kwh_tarif LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%'";
				
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
					'id'=>$row->id,
					'kwh_tdk_kena_tarif'=>$row->kwh_tdk_kena_tarif,
					'kwh_tarif'=>"Rp. ".number_format($row->kwh_tarif,2,',','.'),														
					'ACTION'=>'<a href="javascript:void(0)"	onclick="editVars(this)" data-id="'.$row->id.'" ><i class="fa fa-edit" title="Edit Detail"></i></a> '
				);
			}
			
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => $aaData
			);
			echo json_encode($output);
	}

	
}
