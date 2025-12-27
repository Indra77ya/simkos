<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class e_pendaftaran extends MY_App {

	function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->config->set_item('mymenu', 'mn2');			
		$this->auth->authorize();
	}
	
	public function index(){	
		//$data["action"]="e_pendaftaran/showForm";
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$this->config->set_item('mysubmenu', 'mn21');	
		$this->template->set('breadcrumbs','<h1>Pendaftaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Entri Pendaftaran</small></h1>');
		$this->template->set('pagetitle','Form Entri Pendaftaran ');
		$this->template->load('default','ftransaksi/fregistrasi', $data);
	}

	public function editing(){	
		$this->config->set_item('mysubmenu', 'mn22');	
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$this->template->set('breadcrumbs','<h1>Pendaftaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Edit Data Pendaftaran</small></h1>');
		$this->template->set('pagetitle','Form Editing Data Pendaftaran ');
		$this->template->load('default','ftransaksi/fediting', $data);
	}

	public function pindah_kamar(){	
		$this->config->set_item('mysubmenu', 'mn23');	
		if ($this->session->userdata('auth')->ROLE=="Superadmin"){
			$data['lokasi'] = $this->common_model->comboLokasi();
		}else{
			$data['lokasi'] =$this->transaksi_model->getLokasi($this->session->userdata('auth')->IDLOKASI);
		}
		$this->template->set('breadcrumbs','<h1>Pendaftaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Proses Pindah Kamar</small></h1>');
		$this->template->set('pagetitle','Form Proses Pindah Kamar ');
		$this->template->load('default','ftransaksi/flist_pindahkamar', $data);
	}
	public function saveTahunan($proses=""){
		$cekError="";$pesan="";
			if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			
			$rules = array(				
					
					array(
						'field' => 'thn_nama_lengkap1',
						'label' => 'NAMA_LENGKAP_PENGHUNI',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'thn_notelp1',
						'label' => 'NO_TELP_PENGHUNI',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'thn_alamat1',
						'label' => 'ALAMAT_ASAL',
						'rules' => 'trim|xss_clean'
					),
					array(
						'field' => 'thn_posisi_meteran',
						'label' => 'POSISI_METERAN',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'thn_email1',
						'label' => 'EMAIL_PENGHUNI',
						'rules' => 'trim|xss_clean'
					),
					array(
						'field' => 'thn_deposit',
						'label' => 'DEPOSIT',
						'rules' => 'trim|xss_clean|required'
					)
			);
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Field %s harus diisi.');
			//$this->form_validation->set_message('numeric', 'Field %s harus diisi angka.');
			$respon = new StdClass();
			if ($this->form_validation->run() == TRUE){
				
				$this->db->trans_begin();
				try {	
					$foto="";
					$gbrkartu="";
					$error="";
					if (!empty($_FILES['file']['name'])){
						$nama_file = $_FILES['file']['name'];			
					
						$config['file_name'] = $nama_file;
						$config['upload_path'] = './assets/images/foto';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
						$config['max_size']    = '1024';
						$config['max_width']  = '1600';
						$config['max_height']  = '1400';
						$this->load->library('upload', $config);
						
						if ( ! $this->upload->do_upload('file')){
							$error = array('error' => $this->upload->display_errors());
							$foto="";

						}else{
							$dataUpload = $this->upload->data();
							$foto= $dataUpload['file_name'];	
							$error="ndak error";
						}

					}

					if (!empty($_FILES['file_card']['name'])){
						$nama_file = $_FILES['file_card']['name'];			
					
						$config2['file_name'] = $nama_file;
						$config2['upload_path'] = './assets/images/kartu';
						$config2['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
						$config2['max_size']    = '1024';
						$config2['max_width']  = '1600';
						$config2['max_height']  = '1400';
						$this->load->library('upload', $config2);
						
						if ( ! $this->upload->do_upload('file_card')){
							$error = array('error' => $this->upload->display_errors());
							$gbrkartu="";

						}else{
							$dataUpload = $this->upload->data();
							$gbrkartu= $dataUpload['file_name'];	
							$error="ndak error";
						}

					}					
					$id_anakkost="";
					$dataPenghuni = array(							
							'NOIDENTITAS' => $this->input->post('thn_identitas1'),							
							'IDLOKASI' => $this->input->post('lokasi_thn'),
							'NAMA' => $this->input->post('thn_nama_lengkap1'),
							'JENISKELAMIN' => $this->input->post('thn_jnskelamin1'),							
							'TEMPAT_LAHIR' => $this->input->post('thn_tempatlahir1'),						
							'TGLLAHIR' =>($this->input->post('thn_tgllahir1')==""?null:$this->input->post('thn_tgllahir1')),	
							'ALAMAT_ASAL' => ($this->input->post('thn_alamat1') ? $this->input->post('thn_alamat1') : '') ,
							'NOTELP' =>$this->input->post('thn_notelp1'),	
							'EMAIL' =>$this->input->post('thn_email1'),	
							'FOTO' =>$foto,		
							'NAMA_PT' =>$this->input->post('thn_nama_instansi'),	
							'ALAMAT_KERJA_KULIAH' =>$this->input->post('thn_alamat_instansi'),	
							'NOTELP_INSTANSI' =>$this->input->post('thn_notelp_instansi'),	
							'NAMA_PJ' =>$this->input->post('thn_nama_lengkap2'),	
							'NOIDENTITAS_PJ' =>$this->input->post('thn_identitas2'),	
							'NOTELP_PJ' =>$this->input->post('thn_notelp2'),	
							'EMAIL_PJ' =>$this->input->post('thn_email2'),	
							'JENISKELAMIN_PJ' =>$this->input->post('thn_jnskelamin2'),	
							'TEMPAT_LAHIR_PJ' =>$this->input->post('thn_tempat_lahir2'),	
							'TGL_LAHIR_PJ' =>($this->input->post('thn_tgllahir2')==""?null:$this->input->post('thn_tgllahir2')),	
							'ALAMAT_PJ' =>$this->input->post('thn_alamat2'),
							'HUBUNGAN' =>$this->input->post('thn_hubungan'),
							'JENIS_SEWA' =>'Tahunan',
							'IMGIDENTITAS' =>$gbrkartu
						);	

				if ($proses=="editing"){
					if ($this->db->where('idanakkost',$this->input->post('idanakkost'))->update('anak_kost',$dataPenghuni)){

						$this->db->where('IDANAKKOST',$this->input->post('idanakkost'))->update('login_penghuni', array('USERNAME' => $this->input->post('thn_email1')));

						$this->db->trans_commit();
						$respon->status = 'success';
					}else {
						throw new Exception("gagal update");
					}
				}else{
					//lastinsert_id
						if ($this->db->insert('anak_kost', $dataPenghuni)){
							
							$id_anakkost=$this->db->insert_id();
							$cekError.="insert anak_kost<br>".$id_anakkost."<br>";
							$this->db->trans_commit();
						} else {
							throw new Exception("gagal simpan");
						}

						//login penghuni
						$dataLogin = array(							
									'IDLOKASI' => $this->input->post('lokasi_thn'),							
									'IDANAKKOST' => ($proses=="editing"?$this->input->post('idanakkost'):$id_anakkost),
									'JENIS_SEWA' => 'Tahunan',		
									'IDPENDAFTARAN' => $this->input->post('thn_noreg'),	
									'USERNAME' => $this->input->post('thn_email1'),						
									'PASSWORD' =>md5('12345')
								);
						$this->db->insert('login_penghuni', $dataLogin);
				}

				


					$dataMaster = array(							
							'IDPENDAFTARAN' => $this->input->post('thn_noreg'),							
							'IDLOKASI' => $this->input->post('lokasi_thn'),							
							'IDANAKKOST' => ($proses=="editing"?$this->input->post('idanakkost'):$id_anakkost),
							'IDKAMAR' => $this->input->post('thn_idkamar'),							
							'TGLDAFTAR' => $this->input->post('thn_tgldaftar'),						
							'thn_mulai' =>$this->input->post('thn_mulai'),	
							'checkout' => 0 ,	
							'diskon' =>$this->input->post('thn_diskon'),	
							'kwh_awal' =>$this->input->post('thn_posisi_meteran'),	
							'deposit' =>$this->input->post('thn_deposit')
						);	

				if ($proses=="editing"){
					if ($this->db->where('idpendaftaran',$this->input->post('thn_noreg') )->update('pendaftaran_tahunan',$dataMaster)){
						$this->db->trans_commit();
						$respon->status = 'success';
					}else {
						throw new Exception("gagal update");
					}
				}else{
					if ($this->db->insert('pendaftaran_tahunan', $dataMaster)){		
						$cekError.="insert  master  pendaftaran<br>";
						$this->db->trans_commit();

						//entri deposit setoran awal
						if ($this->input->post('thn_deposit')>0) {	
							$master_insert_id='';					
							$dataMaster= array(
										'idPendaftaran' => $this->input->post('thn_noreg'),
										'idlokasi' => $this->input->post('lokasi_thn'),
										'jenis_sewa' => 'Tahunan',
										'setoran_awal' => $this->input->post('thn_deposit'),
										'jumlah_akumulasi' => $this->input->post('thn_deposit') 
										
									);

							if ($this->db->insert('deposit_master', $dataMaster)){
								$ceksql=$this->db->last_query();
								$master_insert_id = $this->db->insert_id();
								$this->db->trans_commit();
								$respon->status = 'success';								

							} else {
								throw new Exception("gagal simpan");
								$respon->errormsg ="error simpan data master #".$ceksql;
							}

								$dataDetil = array(
									'deposit_id' =>$master_insert_id,
									'tipe' => 'SETORAN',
									'deskripsi' => 'Setoran awal',
									'isFirstDepo' => 1,				
									'tglBayar' =>$this->input->post('thn_tgldaftar'),
									'jumlah' =>$this->input->post('thn_deposit'),
									'petugas' =>$this->session->userdata('auth')->USERNAME,
									'metode_bayar' =>'tunai'
								);								
							
							if ($this->db->insert('deposit_detil', $dataDetil)){
								$ceksqlD=$this->db->last_query();
								$this->db->trans_commit();
								$respon->status = 'success';

							} else {
								throw new Exception("gagal simpan");
								$respon->errormsg ="error insert deposit_detil";
							}

						}
						
					} else {
						throw new Exception("gagal simpan");
					}
				}	
					$jmlRow=$this->input->post('jmlRowThn');
					$cekError.="jmlRow=".$jmlRow."<br>";
					if ($jmlRow>=1){
						$cekError.="jmlrow>1<br>";

						if ($proses=="editing"){
								$this->db->query("delete from detildaftar_tahunan where idpendaftaran='".$this->input->post('thn_noreg')."' and idanakkost='".$this->input->post('idanakkost')."'");
								$this->db->trans_commit();
								$respon->status = 'success';
							}

						for ($i=0; $i<$jmlRow; $i++){
							$cekError.="masuk loop<br>";
							if ($this->input->post('cbJnsBiaya_thn_'.$i)<>"0"){
								$dataDetil= array(							
									'idPendaftaran' => $this->input->post('thn_noreg'),		
									'idlokasi' => $this->input->post('lokasi_thn'),
									'idAnakKost' => ($proses=="editing"?$this->input->post('idanakkost'):$id_anakkost),
									'idBiaya' => $this->input->post('cbJnsBiaya_thn_'.$i)
								);

							
								
								if ($this->db->insert('detildaftar_tahunan', $dataDetil)){	
									$cekError.="insert  detildaftar_tahunan $i <br>";
									$this->db->trans_commit();
								} else {
									throw new Exception("gagal simpan");
								}
							

							}
						}
					}

				if ($proses<>"editing"){
					$sql3="update cekkamar set terisi=terisi+1 where idkamar='".$this->input->post('thn_idkamar')."'";
					$this->db->query($sql3);
					$cekError.="update cekkamar  <br>";
					$this->db->trans_commit();	
				}
				
				/*if ($proses<>"editing"){
					$subject="Informasi Account Login Penghuni Kost";
					$msg="Selamat, Proses Pendaftaran Kost Sewa Tahunan Atas Nama  :".$this->input->post('thn_nama_lengkap1')." Pada tanggal  ".$this->input->post('thn_tgldaftar')." telah berhasil. <br>Berikut data informasi Account Login aplikasi SIKOS. <br><br>Username : ".$this->input->post('thn_email1')."<br>Password : 12345<br><br> Silahkan dicatat/diingat data detail Account Login Anda. Segera setelah Login ubah password Anda. <br><br> Di halaman Dashboard anda dapat mengakses profil, data administrasi, konfirmasi pembayaran, dan kirik komplain/saran/kritik. Terima kasih telah menjadi pelanggan di Kost Kami. ";
					$email=$this->input->post('thn_email1');
					//respon->isi_email = $email."<br>".$subject."<br>".$msg;
						$sts_send=$this->sendEmail($email, $subject, $msg, "");							
							if ($sts_send){
                                $pesan.="sukses kirim email";
							}else{ $pesan.="gagal kirim email". $this->email->print_debugger(); }
						
						    $respon->status = 'success';
						    $respon->pesan =$pesan ;

				}*/
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
			$respon->noreg=$this->input->post('thn_noreg');
			$respon->data=$cekError;	
			echo json_encode($respon);
			//exit;
		
		} 
	}
	public function saveBulanan($proses=""){
		$cekError="";$pesan="";
			if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			
			$rules = array(				
					
					array(
						'field' => 'bln_nama_lengkap1',
						'label' => 'NAMA_LENGKAP_PENGHUNI',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'bln_notelp1',
						'label' => 'NO_TELP_PENGHUNI',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'bln_alamat1',
						'label' => 'ALAMAT_ASAL',
						'rules' => 'trim|xss_clean'
					),
					array(
						'field' => 'bln_posisi_meteran',
						'label' => 'POSISI_METERAN',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'bln_email1',
						'label' => 'EMAIL_PENGHUNI',
						'rules' => 'trim|xss_clean'
					),
					array(
						'field' => 'bln_deposit',
						'label' => 'DEPOSIT',
						'rules' => 'trim|xss_clean|required'
					)
			);
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Field %s harus diisi.');
			//$this->form_validation->set_message('numeric', 'Field %s harus diisi angka.');
			$respon = new StdClass();
			if ($this->form_validation->run() == TRUE){
				
				$this->db->trans_begin();
				try {	
					$foto="";
					$gbrkartu="";
					$error="";
					if (!empty($_FILES['file']['name'])){
						$nama_file = $_FILES['file']['name'];			
					
						$config['file_name'] = $nama_file;
						$config['upload_path'] = './assets/images/foto';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
						$config['max_size']    = '1024';
						$config['max_width']  = '1600';
						$config['max_height']  = '1400';
						$this->load->library('upload', $config);
						
						if ( ! $this->upload->do_upload('file')){
							$error = array('error' => $this->upload->display_errors());
							$foto="";

						}else{
							$dataUpload = $this->upload->data();
							$foto= $dataUpload['file_name'];	
							$error="ndak error";
						}

					}

					if (!empty($_FILES['file_card']['name'])){
						$nama_file = $_FILES['file_card']['name'];			
					
						/*$config2['file_name'] = $nama_file;
						$config2['upload_path'] = './assets/images/kartu';
						$config2['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
						$config2['max_size']    = '1024';
						$config2['max_width']  = '1600';
						$config2['max_height']  = '1400';
						$this->load->library('upload', $config2);*/
						
						if ( ! $this->upload->do_upload('file_card')){
							$error = array('error' => $this->upload->display_errors());
							$gbrkartu="";

						}else{
							$dataUpload = $this->upload->data();
							$gbrkartu= $dataUpload['file_name'];	
							$error="ndak error";
						}

					}

					$id_anakkost="";
					$dataPenghuni = array(							
							'NOIDENTITAS' => $this->input->post('bln_identitas1'),							
							'IDLOKASI' => $this->input->post('lokasi_bln'),
							'NAMA' => $this->input->post('bln_nama_lengkap1'),
							'JENISKELAMIN' => $this->input->post('bln_jnskelamin1'),							
							'TEMPAT_LAHIR' => $this->input->post('bln_tempatlahir1'),						
							'TGLLAHIR' =>($this->input->post('bln_tgllahir1')==""?null:$this->input->post('bln_tgllahir1')),	
							'ALAMAT_ASAL' => ($this->input->post('bln_alamat1') ? $this->input->post('bln_alamat1') : '') ,
							'NOTELP' =>$this->input->post('bln_notelp1'),	
							'EMAIL' =>$this->input->post('bln_email1'),	
							'FOTO' =>$foto,		
							'NAMA_PT' =>$this->input->post('bln_nama_instansi'),	
							'ALAMAT_KERJA_KULIAH' =>$this->input->post('bln_alamat_instansi'),	
							'NOTELP_INSTANSI' =>$this->input->post('bln_notelp_instansi'),	
							'NAMA_PJ' =>$this->input->post('bln_nama_lengkap2'),	
							'NOIDENTITAS_PJ' =>$this->input->post('bln_identitas2'),	
							'NOTELP_PJ' =>$this->input->post('bln_notelp2'),	
							'EMAIL_PJ' =>$this->input->post('bln_email2'),	
							'JENISKELAMIN_PJ' =>$this->input->post('bln_jnskelamin2'),	
							'TEMPAT_LAHIR_PJ' =>$this->input->post('bln_tempat_lahir2'),	
							'TGL_LAHIR_PJ' =>($this->input->post('bln_tgllahir2')==""?null:$this->input->post('bln_tgllahir2')),	
							'ALAMAT_PJ' =>$this->input->post('bln_alamat2'),
							'HUBUNGAN' =>$this->input->post('bln_hubungan'),
							'JENIS_SEWA' =>'Bulanan',
							'IMGIDENTITAS' =>$gbrkartu
						);	

				if ($proses=="editing"){
					if ($this->db->where('idanakkost',$this->input->post('idanakkost'))->update('anak_kost',$dataPenghuni)){

						$this->db->where('IDANAKKOST',$this->input->post('idanakkost'))->update('login_penghuni', array('USERNAME' => $this->input->post('bln_email1')));

						$this->db->trans_commit();
						$respon->status = 'success';
					}else {
						throw new Exception("gagal update");
					}
				}else{
					//lastinsert_id
						if ($this->db->insert('anak_kost', $dataPenghuni)){
							
							$id_anakkost=$this->db->insert_id();
							$cekError.="insert anak_kost<br>".$id_anakkost."<br>";
							$this->db->trans_commit();
						} else {
							throw new Exception("gagal simpan");
						}

						//login penghuni
						$dataLogin = array(							
									'IDLOKASI' => $this->input->post('lokasi_bln'),							
									'IDANAKKOST' => ($proses=="editing"?$this->input->post('idanakkost'):$id_anakkost),
									'JENIS_SEWA' => 'Bulanan',	
									'IDPENDAFTARAN' => $this->input->post('bln_noreg'),	
									'USERNAME' => $this->input->post('bln_email1'),						
									'PASSWORD' =>md5('12345')
								);
						$this->db->insert('login_penghuni', $dataLogin);
				}

				


					$dataMaster = array(							
							'IDPENDAFTARAN' => $this->input->post('bln_noreg'),							
							'IDLOKASI' => $this->input->post('lokasi_bln'),							
							'IDANAKKOST' => ($proses=="editing"?$this->input->post('idanakkost'):$id_anakkost),
							'IDKAMAR' => $this->input->post('bln_idkamar'),							
							'TGLDAFTAR' => $this->input->post('bln_tgldaftar'),						
							'tglMulai' =>$this->input->post('bln_tglinap'),	
							'checkout' => 0 ,	
							'diskon' =>$this->input->post('bln_diskon'),	
							'kwh_awal' =>$this->input->post('bln_posisi_meteran'),	
							'deposit' =>$this->input->post('bln_deposit')
						);	

				if ($proses=="editing"){
					if ($this->db->where('idpendaftaran',$this->input->post('bln_noreg') )->update('pendaftaran',$dataMaster)){
						$this->db->trans_commit();
						$respon->status = 'success';
					}else {
						throw new Exception("gagal update");
					}
				}else{
					if ($this->db->insert('pendaftaran', $dataMaster)){		
						$cekError.="insert  master  pendaftaran<br>";
						$this->db->trans_commit();

						//entri deposit setoran awal
						if ($this->input->post('bln_deposit')>0) {	
							$master_insert_id='';					
							$dataMaster= array(
										'idPendaftaran' => $this->input->post('bln_noreg'),
										'idlokasi' => $this->input->post('lokasi_bln'),
										'jenis_sewa' => 'Bulanan',
										'setoran_awal' => $this->input->post('bln_deposit'),
										'jumlah_akumulasi' => $this->input->post('bln_deposit') 
										
									);

							if ($this->db->insert('deposit_master', $dataMaster)){
								$ceksql=$this->db->last_query();
								$master_insert_id = $this->db->insert_id();
								$this->db->trans_commit();
								$respon->status = 'success';								

							} else {
								throw new Exception("gagal simpan");
								$respon->errormsg ="error simpan data master #".$ceksql;
							}

								$dataDetil = array(
									'deposit_id' =>$master_insert_id,
									'tipe' => 'SETORAN',
									'deskripsi' => 'Setoran awal',	
									'isFirstDepo' => 1,			
									'tglBayar' =>$this->input->post('bln_tgldaftar'),
									'jumlah' =>$this->input->post('bln_deposit'),
									'petugas' =>$this->session->userdata('auth')->USERNAME,
									'metode_bayar' =>'tunai'
								);								
							
							if ($this->db->insert('deposit_detil', $dataDetil)){
								$ceksqlD=$this->db->last_query();
								$this->db->trans_commit();
								$respon->status = 'success';

							} else {
								throw new Exception("gagal simpan");
								$respon->errormsg ="error insert deposit_detil";
							}

						}
						

					} else {
						throw new Exception("gagal simpan");
					}
				}	
					$jmlRow=$this->input->post('jmlRow');
					$cekError.="jmlRow=".$jmlRow."<br>";
					if ($jmlRow>=1){
						$cekError.="jmlrow>1<br>";

						if ($proses=="editing"){
								$this->db->query("delete from detildaftar where idpendaftaran='".$this->input->post('bln_noreg')."' and idanakkost='".$this->input->post('idanakkost')."'");
								$this->db->trans_commit();
								$respon->status = 'success';
							}

						for ($i=0; $i<$jmlRow; $i++){
							$cekError.="masuk loop<br>";
							if ($this->input->post('cbJnsBiaya_'.$i)<>"0"){
								$dataDetil= array(							
									'idPendaftaran' => $this->input->post('bln_noreg'),		
									'idlokasi' => $this->input->post('lokasi_bln'),
									'idAnakKost' => ($proses=="editing"?$this->input->post('idanakkost'):$id_anakkost),
									'idBiaya' => $this->input->post('cbJnsBiaya_'.$i)
								);

							
								
								if ($this->db->insert('detildaftar', $dataDetil)){	
									$cekError.="insert  detildaftar $i <br>";
									$this->db->trans_commit();
								} else {
									throw new Exception("gagal simpan");
								}
							

							}
						}
					}

				if ($proses<>"editing"){
					$sql3="update cekkamar set terisi=terisi+1 where idkamar='".$this->input->post('bln_idkamar')."'";
					$this->db->query($sql3);
					$cekError.="update cekkamar  <br>";
					$this->db->trans_commit();	
				}
				
				/*if ($proses<>"editing"){
					$subject="Informasi Account Login Penghuni Kost";
					$msg="Selamat, Proses Pendaftaran Kost Sewa Bulanan Atas Nama  :".$this->input->post('bln_nama_lengkap1')." Pada tanggal  ".$this->input->post('bln_tgldaftar')." telah berhasil. <br>Berikut data informasi Account Login aplikasi SIKOS. <br><br>Username : ".$this->input->post('bln_email1')."<br>Password : 12345<br><br> Silahkan dicatat/diingat data detail Account Login Anda. Segera setelah Login ubah password Anda. <br><br> Di halaman Dashboard anda dapat mengakses profil, data administrasi, konfirmasi pembayaran, dan kirik komplain/saran/kritik. Terima kasih telah menjadi pelanggan di Kost Kami. ";
					$sts_send=$this->sendEmail($this->input->post('bln_email1'), $subject, $msg, "");
							//$respon["isi_email"] = $this->input->post('bln_email1')."<br>".$subject."<br>".$msg;
							if ($sts_send){
                                $pesan.="sukses kirim email";
							}else{ $pesan.="gagal kirim email". $this->email->print_debugger(); }
						
						    $respon->status = 'success';
						    $respon->pesan =$pesan ;

				}*/
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
			$respon->noreg=$this->input->post('bln_noreg');
			//$respon->data=$cekError;	
			echo json_encode($respon);
			//exit;
		
		} 
	}
	
	public function saveMingguan($proses=""){
		$cekError="";
			if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			
			$rules = array(				
					
						array(
						'field' => 'mgg_nama_lengkap1',
						'label' => 'NAMA_LENGKAP_PENGHUNI',
						'rules' => 'trim|xss_clean|required'
					),
						array(
						'field' => 'mgg_identitas1',
						'label' => 'NO_IDENTITAS',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'mgg_notelp1',
						'label' => 'NO_TELP_PENGHUNI',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'mgg_email1',
						'label' => 'EMAIL_PENGHUNI',
						'rules' => 'trim|xss_clean'
					),
					array(
						'field' => 'mgg_alamat1',
						'label' => 'ALAMAT_ASAL',
						'rules' => 'trim|xss_clean'
					),
					array(
						'field' => 'mgg_tglcheckin',
						'label' => 'TANGGAL_CHECK_IN',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'mgg_lama',
						'label' => 'LAMA_PEKAN',
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
					

					$dataMaster = array(							
							'idPendaftaran' => $this->input->post('mgg_noreg'),	
							'idlokasi' => $this->input->post('lokasi_mgg'),	
							'idKamar' => $this->input->post('mgg_idkamar'),	
							'nama' => $this->input->post('mgg_nama_lengkap1'),
							'noIdentitas' => $this->input->post('mgg_identitas1'),						
							'telp' =>$this->input->post('mgg_notelp1'),	
							'email' => $this->input->post('mgg_email1') ,	
							'alamat_asal' => ($this->input->post('mgg_alamat1') ? $this->input->post('mgg_alamat1') : ''),
							'jk' =>$this->input->post('mgg_jnskelamin1'),
							'tempat_lahir' =>$this->input->post('mgg_tempatlahir1'),	
							'tgl_lahir' =>($this->input->post('mgg_tgllahir1')==""?null:$this->input->post('mgg_tgllahir1')),	
							'namaInstansi' =>$this->input->post('mgg_nama_instansi'),	
							'alamatInstansi' =>$this->input->post('mgg_alamat_instansi'),	
							'telp_instansi' =>$this->input->post('mgg_notelp_instansi'),	
							'tglMulai' =>$this->input->post('mgg_tglcheckin'),	
							'lama' =>$this->input->post('mgg_lama'),	
							'tglAkhir' =>$this->input->post('mgg_tglcheckout'),	
							'checkout' =>0 ,	
							'diskon' =>$this->input->post('mgg_diskon')
						);	
					
				if ($proses=="editing"){
					if ($this->db->where('idpendaftaran',$this->input->post('mgg_noreg') )->update('daftar_sewa_mingguan',$dataMaster)){
						$this->db->trans_commit();
						$respon->status = 'success';
					}else {
						throw new Exception("gagal update");
					}
				}else{
					if ($this->db->insert('daftar_sewa_mingguan', $dataMaster)){	
						$cekError.="insert daftar_sewa_mingguan<br><br>";
						$this->db->trans_commit();
					} else {
						throw new Exception("gagal simpan");
					}
				}

				$jmlRow=$this->input->post('jmlRow_mgg');
					$cekError.="jmlRow=".$jmlRow."<br>";
					if ($jmlRow>=1){
						$cekError.="jmlrow>1<br>";

						if ($proses=="editing"){
								$this->db->query("delete from detildaftar_mingguan where idpendaftaran='".$this->input->post('mgg_noreg')."'");
								$this->db->trans_commit();
								$respon->status = 'success';
							}

						for ($i=0; $i<$jmlRow; $i++){
							$cekError.="masuk loop<br>";
							if ($this->input->post('mgg_cbJnsBiaya_'.$i)<>"0"){
								$dataDetil= array(							
									'idPendaftaran' => $this->input->post('mgg_noreg'),	
									'idlokasi' => $this->input->post('lokasi_mgg'),
									'idBiaya' => $this->input->post('mgg_cbJnsBiaya_'.$i)
								);

							
								
								if ($this->db->insert('detildaftar_mingguan', $dataDetil)){	
									$cekError.="insert  detildaftar_mingguan $i <br>";
									$this->db->trans_commit();
								} else {
									throw new Exception("gagal simpan");
								}
							

							}
						}
					}
				
				if ($proses<>"editing"){
					$sql3="update cekkamar set terisi=terisi+1 where idkamar='".$this->input->post('mgg_idkamar')."'";
					$this->db->query($sql3);
					$this->db->trans_commit();	
					$cekError.="update cekkamar  <br>";
				}
										
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
			$respon->data=$cekError;	
			$respon->noreg=$this->input->post('bln_noreg');
			echo json_encode($respon);
			//exit;
		
		} 
	}
	
	public function saveHarian($proses=""){
		$cekError="";
			if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			
			$rules = array(				
					
						array(
						'field' => 'hr_nama_lengkap1',
						'label' => 'NAMA_LENGKAP_PENGHUNI',
						'rules' => 'trim|xss_clean|required'
					),
						array(
						'field' => 'hr_identitas1',
						'label' => 'NO_IDENTITAS',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'hr_notelp1',
						'label' => 'NO_TELP_PENGHUNI',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'hr_email1',
						'label' => 'EMAIL_PENGHUNI',
						'rules' => 'trim|xss_clean'
					),
					array(
						'field' => 'hr_alamat1',
						'label' => 'ALAMAT_ASAL',
						'rules' => 'trim|xss_clean'
					),
					array(
						'field' => 'hr_tglcheckin',
						'label' => 'TANGGAL_CHECK_IN',
						'rules' => 'trim|xss_clean|required'
					),
					array(
						'field' => 'hr_lama',
						'label' => 'LAMA_PEKAN',
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
					

					$dataMaster = array(							
							'idPendaftaran' => $this->input->post('hr_noreg'),
							'idlokasi' => $this->input->post('lokasi_hr'),
							'idKamar' => $this->input->post('hr_idkamar'),	
							'nama' => $this->input->post('hr_nama_lengkap1'),
							'noIdentitas' => $this->input->post('hr_identitas1'),						
							'telp' =>$this->input->post('hr_notelp1'),	
							'email' => $this->input->post('hr_email1') ,	
							'alamat_asal' => ($this->input->post('hr_alamat1') ? $this->input->post('hr_alamat1') : ''),
							'jk' =>$this->input->post('hr_jnskelamin1'),
							'tempat_lahir' =>$this->input->post('hr_tempatlahir1'),	
							'tgl_lahir' =>($this->input->post('hr_tgllahir1')==""?null:$this->input->post('hr_tgllahir1')),	
							'namaInstansi' =>$this->input->post('hr_nama_instansi'),	
							'alamatInstansi' =>$this->input->post('hr_alamat_instansi'),	
							'telp_instansi' =>$this->input->post('hr_notelp_instansi'),	
							'tglCek_in' =>$this->input->post('hr_tglcheckin'),	
							'lama' =>$this->input->post('hr_lama'),	
							'tglCek_out' =>$this->input->post('hr_tglcheckout'),	
							'checkout' =>0 ,	
							'diskon' =>$this->input->post('hr_diskon')
						);	
					
				if ($proses=="editing"){
					if ($this->db->where('idpendaftaran',$this->input->post('hr_noreg') )->update('daftar_sewa_harian',$dataMaster)){
						$this->db->trans_commit();
						$respon->status = 'success';
					}else {
						throw new Exception("gagal update");
					}
				}else{
					if ($this->db->insert('daftar_sewa_harian', $dataMaster)){		
						$cekError.="insert  daftar_sewa_harian<br>";
						$this->db->trans_commit();
					} else {
						throw new Exception("gagal simpan");
					}
				}
				
				if ($proses<>"editing"){
					$sql3="update cekkamar set terisi=terisi+1 where idkamar='".$this->input->post('hr_idkamar')."'";
					$this->db->query($sql3);
					$this->db->trans_commit();	
					$cekError.="update cekkamar  <br>";
				}
										
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
			
			$respon->data=$cekError;	
			$respon->noreg=$this->input->post('bln_noreg');
			echo json_encode($respon);
			//exit;
		
		} 
	}
	public function checkEmail(){
		$keyword = $this->input->post('email');		
		if (empty($keyword)) {
			$respon['status'] = 'success';
			echo json_encode($respon);
			return;
		}
		$str="select count(*) jml from login_penghuni where username='".$keyword."'";
		$query = $this->db->query($str)->row();
		if($query->jml<=0){
			$respon['status'] = 'success';			
			
		} else {
			
			$respon['status'] = 'error';
			$respon['errormsg'] = 'Alamat Email sudah terdaftar';
		}
		echo json_encode($respon);
	}
	public function getfee(){
		$keyword = $this->input->post('idFee');		
		$str="select * from biaya_tambahan where id=".$keyword;
		$query = $this->db->query($str)->row();
		if(empty($query)){
			$respon['status'] = 'error';
			$respon['errormsg'] = 'Invalid Data';
		} else {
			$respon['status'] = 'success';
			$respon['tarif'] = $query->tarif;
			
		}
		echo json_encode($respon);
	}

	public function getCheckOut(){

		$lama = $this->input->post('lama');		
		$tglIn = $this->input->post('tglIn');	
		$tglOut= strftime("%Y-%m-%d", strtotime(strftime("%Y-%m-%d", strtotime($tglIn))." + $lama week"));
		
		if(empty($tglOut)){
			$respon['status'] = 'error';
			$respon['errormsg'] = 'Invalid Data';
		} else {
			$respon['status'] = 'success';
			$respon['tglOut'] = $tglOut;
			
		}
		echo json_encode($respon);
	}

	public function getCheckOutDaily(){

		$lama = $this->input->post('lama');		
		$tglIn = $this->input->post('tglIn');	
		$tglOut= strftime("%Y-%m-%d", strtotime(strftime("%Y-%m-%d", strtotime($tglIn))." + $lama day"));
		
		if(empty($tglOut)){
			$respon['status'] = 'error';
			$respon['errormsg'] = 'Invalid Data';
		} else {
			$respon['status'] = 'success';
			$respon['tglOut'] = $tglOut;
			
		}
		echo json_encode($respon);
	}
	
	public function json_data_editing(){
		//if ($this->input->is_ajax_request()){
			$jenis = $this->input->get('jenis');
			$status = $this->input->get('status');
			$lokasi = $this->input->get('lokasi');

			$nmtableBayar=""; $field="";
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			switch ($jenis){
				case "Tahunan":
					$str="select p.idpendaftaran, a.nama, a.alamat_asal, a.notelp as nomer_telepon, p.tgldaftar as tgl1, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar, p.idlokasi from pendaftaran_tahunan p, anak_kost a  where p.idlokasi=".$lokasi." and a.jenis_sewa='Tahunan' and p.idAnakKost=a.idAnakkost ".($status==""?"":" and checkout=$status ");
					$nmtableBayar="bayar_tahunan";
					$field="idpendaftaran";
					break;
				case "Bulanan":
					$str="select p.idpendaftaran, a.nama, a.alamat_asal, a.notelp as nomer_telepon, p.tgldaftar as tgl1, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar, p.idlokasi from pendaftaran p, anak_kost a  where p.idlokasi=".$lokasi." and a.jenis_sewa='Bulanan' and p.idAnakKost=a.idAnakkost ".($status==""?"":" and checkout=$status ");
					$nmtableBayar="bayar_bulanan";
					$field="idpendaftaran";
					break;
				case "Mingguan":
					$str="Select idpendaftaran, nama, alamat_asal, telp as nomer_telepon, tglmulai as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_mingguan.idkamar) nmkamar, idlokasi from daftar_sewa_mingguan where idlokasi=".$lokasi.($status==""?"":" and checkout=$status ");
					$nmtableBayar="bayar_mingguan_master";
					$field="nopendaftaran";
					break;
				case "Harian":
					$str="Select idpendaftaran, nama, alamat_asal, telp as nomer_telepon, tglcek_in as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_harian.idkamar) nmkamar, idlokasi from daftar_sewa_harian  where idlokasi=".$lokasi.($status==""?"":" and checkout=$status ");
					$nmtableBayar="bayar_harian_master";
					$field="nopendaftaran";
					break;
			}
			
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				if ($jenis=="Bulanan" || $jenis=="Tahunan"){
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
				//CEK JIKA ADA Pembayaran tidak bisa dihapus
				$strCek="select count(*) cek from $nmtableBayar where $field ='".$row->idpendaftaran."'";
				$queryCek = $this->db->query($strCek)->row();

				$aaData[] = array(
					'nmkamar'=>str_replace(' ','&nbsp;', $row->nmkamar),
					'NAMA'=>$row->nama,
					'idpendaftaran'=>$row->idpendaftaran,
					'ALAMAT'=>$row->alamat_asal,
					'TGLDAFTAR'=>$row->tgl1,
					'NOTELP'=>$row->nomer_telepon,
					'ACTION'=>'<a href="javascript:void(0)" onclick="editRegistration(\''.$jenis.'\', \''.$row->idpendaftaran.'\', \''.$row->idlokasi.'\')" data-id="'.$row->idpendaftaran.'"><i class="fa fa-edit" title="Edit"></i></a> '.($queryCek->cek<=0?'| <a href="javascript:void(0)" onclick="delRegistration(\''.$jenis.'\', \''.$row->idpendaftaran.'\', \''.$row->nama.'\', \''.$row->idlokasi.'\')"><i class="fa fa-power-off" title="Delete"></i></a>':'')


					
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

	public function json_data_pindah(){
		//if ($this->input->is_ajax_request()){
			$jenis = $this->input->get('jenis');
			$lokasi = $this->input->get('lokasi');

			$nmtableBayar=""; $field="";
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			switch ($jenis){
				case "Tahunan":
					$str="select p.idpendaftaran,p.idlokasi, a.nama, a.alamat_asal, a.notelp as nomer_telepon, p.tgldaftar as tgl1, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar from pendaftaran_tahunan p, anak_kost a  where  p.idlokasi=".$lokasi." and a.jenis_sewa='Tahunan' and  p.idAnakKost=a.idAnakkost and checkout=0 ";
					$nmtableBayar="bayar_tahunan";
					$field="idpendaftaran";
					break;
				case "Bulanan":
					$str="select p.idpendaftaran,p.idlokasi, a.nama, a.alamat_asal, a.notelp as nomer_telepon, p.tgldaftar as tgl1, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar from pendaftaran p, anak_kost a  where  p.idlokasi=".$lokasi." and  p.idAnakKost=a.idAnakkost and checkout=0 ";
					$nmtableBayar="bayar_bulanan";
					$field="idpendaftaran";
					break;
				case "Mingguan":
					$str="Select idpendaftaran,idlokasi, nama, alamat_asal, telp as nomer_telepon, tglmulai as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_mingguan.idkamar) nmkamar from daftar_sewa_mingguan where idlokasi=".$lokasi." and checkout=0";
					$nmtableBayar="bayar_mingguan_master";
					$field="nopendaftaran";
					break;
				case "Harian":
					$str="Select idpendaftaran,idlokasi, nama, alamat_asal, telp as nomer_telepon, tglcek_in as tgl1, (select labelkamar from kamar where idkamar=daftar_sewa_harian.idkamar) nmkamar from daftar_sewa_harian where  idlokasi=".$lokasi." and checkout=0";
					$nmtableBayar="bayar_harian_master";
					$field="nopendaftaran";
					break;
			}
			
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				if ($jenis=="Bulanan" || $jenis=="Tahunan" ){
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
				//CEK JIKA ADA Pembayaran tidak bisa dihapus
				$strCek="select count(*) cek from $nmtableBayar where $field ='".$row->idpendaftaran."'";
				$queryCek = $this->db->query($strCek)->row();

				$aaData[] = array(
					'nmkamar'=>str_replace(' ','&nbsp;', $row->nmkamar),
					'NAMA'=>$row->nama,
					'idpendaftaran'=>$row->idpendaftaran,
					'ALAMAT'=>$row->alamat_asal,
					'TGLDAFTAR'=>$row->tgl1,
					'NOTELP'=>$row->nomer_telepon,
					'ACTION'=>'<a href="'.base_url('e_pendaftaran/pindahKamar/'.$jenis.'_'.$row->idpendaftaran.'_'.$row->idlokasi).'"><i class="fa 	fa-exchange" title="Proses Pindah Kamar ?"></i></a> '


					
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


	public function editRegistration($valkey){
		
		$arrVal=explode('_', $valkey);
		$jenis=$arrVal[0];		
		$noreg=$arrVal[1];
		$idlokasi=$arrVal[2];
		
		switch ($jenis){
			case "Tahunan":
				$view="ftransaksi/frmEditTahunan";
				$str="select p.`idpendaftaran`,p.idlokasi, p.`tgldaftar`, p.`thn_mulai`, p.`idkamar`, p.diskon,p.kwh_awal, p.deposit, k.labelkamar, k.fasilitas,k.tariftahunan, a.* from pendaftaran_tahunan p, anak_kost a, kamar k 	where p.`idanakkost`=a.`idanakkost` and a.jenis_sewa='Tahunan' and p.`idkamar`=k.`idkamar` and p.`idanakkost`=a.`idanakkost` and p.`idkamar`=k.`idkamar` and p.idpendaftaran='$noreg' and p.idlokasi=".$idlokasi;
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
		$data["res"]=$recordset;
		$data["resKamar"]=$this->db->query("select * from kamar where idkamar='".($jenis=="Bulanan" || $jenis=="Tahunan"?$recordset->idkamar:$recordset->idKamar)."'")->row();
		$data['lokasi'] =$this->transaksi_model->getLokasi($idlokasi);
		
		if ($this->input->is_ajax_request()){
			$this->template->load('ajax',$view,$data);
		} else {
			$this->template->set('pagetitle','Form Edit Pendaftaran ');
			$this->template->load('default',$view,$data);
		}
	}


	public function switchSaving($valkey){
		
		$arrVal=explode('_', $valkey);
		$jenis=$arrVal[0];		
		$noreg=$arrVal[1];
		
		switch ($jenis){
			case "Tahunan":
				$view="ftransaksi/frmEditTahunan";	
				$this->saveTahunan("editing");
				break;
			case "Bulanan":
				$view="ftransaksi/frmEditBulanan";	
				$this->saveBulanan("editing");
				break;
			case "Mingguan":				
				$view="ftransaksi/frmEditMingguan";
				$this->saveMingguan("editing");
				break;
			case "Harian":
				$view="ftransaksi/frmEditHarian";
				$this->saveHarian("editing");
				break;

		}

	}

	public function updatePindah(){
		$jenis=$this->input->post('jenis_pindah');
		$idlokasi=$this->input->post('cb_lokasi');
		$idkamar=$this->input->post('idkamar');
		$noreg=$this->input->post('noreg');
		$kamarasal=$this->input->post('kamarasal');
		$respon=new StdClass();
		switch ($jenis){
		case "Harian": 
			$str="update daftar_sewa_harian set idKamar='".$idkamar."' where idpendaftaran='".$noreg."' and idlokasi=".$idlokasi;
			break;
		case "Mingguan": 
			$str="update daftar_sewa_mingguan set idKamar='".$idkamar."' where idpendaftaran='".$noreg."' and idlokasi=".$idlokasi;
			break;
		case "Bulanan": 
			$str="update pendaftaran set idKamar='".$idkamar."' where idpendaftaran='".$noreg."' and idlokasi=".$idlokasi;
			break;
		case "Tahunan": 
			$str="update pendaftaran_tahunan set idKamar='".$idkamar."' where idpendaftaran='".$noreg."' and idlokasi=".$idlokasi;
			break;
	}
		$this->db->query($str);
		$this->db->trans_commit();

		$upCekAsal="update cekkamar set terisi=terisi-1 where idKamar='".$kamarasal."'";
		if ($this->db->query($upCekAsal) ){		
			$this->db->trans_commit();
			$upCekBaru="update cekkamar set terisi=terisi+1 where idKamar='".$idkamar."'";
			$this->db->query($upCekBaru);
			$this->db->trans_commit();
			$respon->status = 'success';
		}else{
			$respon->status = 'error';
		}
		echo json_encode($respon);
	}

	public function pindahKamar($valkey){
		
		$arrVal=explode('_', $valkey);
		$jenis=$arrVal[0];		
		$noreg=$arrVal[1];
		$idlokasi=$arrVal[2];
		
		switch ($jenis){
			case "Tahunan":				
				$str="select p.idpendaftaran, a.nama, a.alamat_asal, a.notelp, p.tgldaftar, p.idkamar from pendaftaran_tahunan p, anak_kost a  where a.idAnakKost=p.idanakkost and a.jenis_sewa='Tahunan' and  p.idPendaftaran='$noreg' and p.idlokasi=".$idlokasi;
				break;
			case "Bulanan":				
				$str="select p.idpendaftaran, a.nama, a.alamat_asal, a.notelp, p.tgldaftar, p.idkamar from pendaftaran p, anak_kost a  where a.idAnakKost=p.idanakkost and a.jenis_sewa='Bulanan' and  p.idPendaftaran='$noreg' and p.idlokasi=".$idlokasi;
				break;
			case "Mingguan":
				$str="select idpendaftaran, nama, alamat_asal, telp, tglmulai, idkamar from daftar_sewa_mingguan where idPendaftaran='$noreg' and idlokasi=".$idlokasi;
				break;
			case "Harian":
				$str="select idpendaftaran, nama, alamat_asal, telp, tglcek_in, idkamar from daftar_sewa_harian where idPendaftaran='".$noreg."' and idlokasi=".$idlokasi;
				break;
		}

		
		
		$view="ftransaksi/frmpindahkamar";
		$recordset=$this->db->query($str)->row();
		$data["jenis"]=$jenis;
		$data["res"]=$recordset;
		$data["resKamar"]=$this->db->query("select * from kamar where idkamar='".$recordset->idkamar."'")->row();
		$data['lokasi'] =$this->transaksi_model->getLokasi($idlokasi);
		
		$this->template->set('breadcrumbs','<h1>Pendaftaran<small> <i class="ace-icon fa fa-angle-double-right"></i> Form Pindah Kamar </small></h1>');
		$this->template->set('pagetitle','Form Pindah Kamar ');
		$this->template->load('default',$view,$data);
		
	}

	public function delRegistration(){
		$jenis=$this->input->post('jenis');
		$noreg=$this->input->post('noreg');
		$idlokasi=$this->input->post('idlokasi');
		if ($jenis=="Bulanan" || $jenis=="Tahunan"){
			$this->db->query("delete from anak_kost where jenis_sewa='$jenis' and  idanakkost=(select distinct idanakkost from pendaftaran where idpendaftaran='$noreg' )");
		}
		$res = $this->transaksi_model->delRegistration($jenis, $noreg, $idlokasi);
		return $res;
	}
	

}
