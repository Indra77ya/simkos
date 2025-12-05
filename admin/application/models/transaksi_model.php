<?php
			
class transaksi_model extends MY_Model {
	var $table = 'pinjaman';
	var $primaryID = 'ID';
	
	
	public function comboGetJenisRutin($empty=''){
		$str="select * from itemoption where idcat=2";
		$query=$this->db->query($str)->result();
		$combo = array();
		if (!empty($query)){
			$combo = $this->commonlib->buildcombo($query,'idItem','item',$empty);
		}
		return $combo;
	}
	
	function getLokasi($idlokasi=null){
		$str= "SELECT * from lokasi where id=".$idlokasi;
		$query = $this->db->query($str)->row();           
		return $query;
	}

	function getVal_tagihan($noreg=null, $jenis, $bayar_ke=null){
		if ($jenis=="Bulanan" || $jenis=="Tahunan"){
			$str="select jmltagihan from ".($jenis=="Bulanan"?"bayar_bulanan":"bayar_tahunan")." where idpendaftaran='".$noreg."' and ".($jenis=="Bulanan"?"pembayaran_ke=".$bayar_ke :"tahun_tagihan='".$bayar_ke."'" );
		}else{
			$str= "SELECT ".($jenis=='Mingguan'?"jmlminggu":"jmlhari")." jumlahlama, tarif from ".($jenis=='Mingguan'?"bayar_mingguan_master":"bayar_harian_master")." where nopendaftaran='$noreg'";
		}
		$query = $this->db->query($str)->row();
           
		return $query;
	}

	function hapusBayar($jenis=null, $noreg, $bayar_ke, $nokuit=null, $idlokasi){	//$jenis, $noreg, $bayar_ke, $notrans, $idlokasi);
		$this->db->trans_begin();
		$respon=new StdClass();
		$str="";
		try {
			switch ($jenis){
				case "year_monthlyBill": 
					$str="delete from bayar_tahunan_tag_blnan where idpendaftaran='$noreg' and idlokasi= ".$idlokasi." and periode_tagihan=".$bayar_ke;
					break;
				case "Tahunan": 
					$str="delete from bayar_tahunan_detil where idpendaftaran='$noreg' and idlokasi= ".$idlokasi." and tahun_tagihan=".$bayar_ke." and no_urut=".$nokuit;
					break;
				case "Bulanan": 
					$str="delete from bayar_bulanan_detil where idpendaftaran='$noreg' and idlokasi= ".$idlokasi." and pembayaran_ke=".$bayar_ke." and no_urut=".$nokuit;
					break;
				case "Mingguan": 
					
					$str="delete from bayar_mingguan_detil where nopendaftaran='$noreg' and idlokasi= ".$idlokasi."  and nourut=".$bayar_ke;
					break;
				case "Harian":
					$str="delete from bayar_harian_detil where nopendaftaran='$noreg' and idlokasi= ".$idlokasi."  and nourut=".$bayar_ke;	
				break;
			}

			if ($this->db->query($str) ) {
				$this->db->trans_commit();
				$respon->str = $str;
				$respon->status = 'success';
			} else {
				throw new Exception("gagal simpan");
			}
		} catch (Exception $e) {
			$respon->status = 'error';
			$respon->str = $str;
			$respon->errormsg = $e->getMessage();
				$this->db->trans_rollback();
		}
	
	return $respon;
	}
	

	function delRegistration($jenis=null, $noreg, $idlokasi){
		$this->db->trans_begin();
		$respon=new StdClass();
		$str="";
		try {	//hapus data pendaftaran blm ada transaksi pembayaran, lgs hapus, hapus idanakkost?

			switch ($jenis){
				case "Tahunan": 
					$nmTabel="pendaftaran_tahunan";
					$str="delete from pendaftaran_tahunan where idpendaftaran='$noreg' and idlokasi= ".$idlokasi;
					$this->db->query("delete from login_penghuni where Jenis_sewa='Tahunan' and idpendaftaran='$noreg' and idlokasi= ".$idlokasi);
					break;
				case "Bulanan": 
					$nmTabel="pendaftaran";
					$str="delete from pendaftaran where idpendaftaran='$noreg' and idlokasi= ".$idlokasi;
					$this->db->query("delete from login_penghuni where Jenis_sewa='Bulanan' and idpendaftaran='$noreg' and idlokasi= ".$idlokasi);
					break;
				case "Mingguan": 
					$nmTabel="daftar_sewa_mingguan";
					$str="delete from daftar_sewa_mingguan where idpendaftaran='$noreg' and idlokasi= ".$idlokasi;
					break;
				case "Harian":
					$nmTabel="daftar_sewa_harian";
					$str="delete from daftar_sewa_harian where idpendaftaran='$noreg' and idlokasi= ".$idlokasi;	
				break;
			}
			
			$strCekkamar="update cekkamar set terisi=terisi-1 where idkamar=(select distinct idkamar from $nmTabel where idpendaftaran='".$noreg."' and idlokasi= ".$idlokasi.")";
			
			if ($this->db->query($strCekkamar)){					
					$this->db->query($str);
					$this->db->trans_commit();
				$respon->status = 'success';
			} else {
				throw new Exception("gagal simpan");
			}

		} catch (Exception $e) {
			$respon->status = 'error';
			$respon->errormsg = $e->getMessage();
				$this->db->trans_rollback();
		}
	
	return $respon;
	}


	function saveBayarTahunan($rsTrans, $petugas,$metode_bayar){
			$html="";
			$respon = new StdClass();
			$noreg=$rsTrans->idPendaftaran;
			$idlokasi=$rsTrans->idlokasi;
			$tglBayar=$rsTrans->tglBayar;
			$jmlBayar=$rsTrans->jmlBayar;
			$metode_bayar=$rsTrans->metode_bayar;
			$petugas=$petugas;
			$periode_tagihan=$rsTrans->periode_tagihan;

			$tgl_transfer=$rsTrans->tgl_transfer;
			$dari_bank=$rsTrans->dari_bank;
			$norek_pengirim=$rsTrans->norek_pengirim;
			$nama_pengirim=$rsTrans->nama_pengirim;
			$idrek_penerima=$rsTrans->idrek_penerima;
			$jenis_kartu=$rsTrans->jenis_kartu;
			$no_kartu=$rsTrans->no_kartu;
			$nmpemilik_kartu=$rsTrans->nmpemilik_kartu;
			$no_struk=$rsTrans->no_struk;
			$tgl_struk=$rsTrans->tgl_struk;

			//data tagihan
			$str="select m.idpendaftaran, m.idlokasi, k.tariftahunan,k.tarifmingguan, k.tarifharian, m.diskon from pendaftaran_tahunan m,  kamar k  where m.idkamar = k.idkamar 	and m.idpendaftaran='".$noreg."' and m.idlokasi=".$idlokasi;
			$res = $this->db->query($str)->row();
			$tagihan=$res->tariftahunan;
			$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from detildaftar_tahunan d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='$noreg'";
			$query=$this->db->query($sBiaya)->result();
			$idxbiaya=1;
			foreach($query as $row){
					$html.= "<tr><td >".$row->jenisbiaya."</td><td >Rp. ".number_format($row->tarif,2,',','.')."</td></tr>";
					$jumlah+=$row->tarif;
					$idxbiaya++;
			}
			$tagihan-=$res->diskon;

			$dataDetilThnn = array();

					switch ($metode_bayar){
						case "tunai":
							$dataDetilThnn = array(
							'idPendaftaran' => $noreg,
							'idlokasi' => $idlokasi,							
							'tahun_tagihan' => $periode_tagihan,
							'tglBayar' =>$tglBayar,
							'jmlBayar' =>$jmlBayar,
							'petugas' =>$petugas,
							'metode_bayar' =>$metode_bayar
						);
							break;
						case "transfer":
							$dataDetilThnn = array(
							'idPendaftaran' => $noreg,
							'idlokasi' => $idlokasi,							
							'tahun_tagihan' => $periode_tagihan,
							'tglBayar' =>$tglBayar,
							'jmlBayar' =>$jmlBayar,
							'petugas' =>$petugas,
							'metode_bayar' =>$metode_bayar,
							'tgl_transfer' =>$tgl_transfer,
							'dari_bank' =>$dari_bank,
							'norek_pengirim' =>$norek_pengirim,
							'nama_pengirim' =>$nama_pengirim,
							'idrek_penerima' =>$idrek_penerima
						);
							break;
						case "kartu":
							$dataDetilThnn = array(
							'idPendaftaran' => $noreg,
							'idlokasi' => $idlokasi,
							//'pembayaran_ke' => $this->input->post('bayarKe'),
							'tahun_tagihan' => $periode_tagihan,
							'tglBayar' =>$tglBayar,
							'jmlBayar' =>$jmlBayar,
							'petugas' =>$petugas,
							'metode_bayar' =>$metode_bayar,
							'jenis_kartu' =>$jenis_kartu ,
							'no_kartu' =>$no_kartu,
							'nmpemilik_kartu' =>$nmpemilik_kartu,
							'no_struk' =>$no_struk ,
							'tgl_struk' =>$tgl_struk
						);
							break;
					}

					
					if ($this->db->insert('bayar_tahunan_detil', $dataDetilThnn)){
						$detil_insert_id = $this->db->insert_id();
						$this->db->trans_commit();
						$respon->status = 'success';
						$html.="masuk insert detil";

					} else {
						throw new Exception("gagal simpan");
						$respon->errormsg ="error insert bulanan detil";
						$html.="error insert detil";
					}


					//master
					//cek master
					$rscek=$this->db->query("select ifnull(count(*),0) cek from bayar_tahunan where idPendaftaran='".$noreg."' and idlokasi =".$idlokasi." and  tahun_tagihan=".$periode_tagihan)->row();


					if ($rscek->cek <=0){
						$rsmst=$this->db->query("select pendaftaran_tahunan.*, (select labelkamar from kamar where idkamar=pendaftaran_tahunan.idkamar and idlokasi=".$idlokasi.") nmkamar from pendaftaran_tahunan where idPendaftaran='".$noreg."' and idlokasi =".$idlokasi)->row();

						$dataMaster= array(
									'idPendaftaran' => $noreg,
									'idlokasi' => $idlokasi,									
									'tahun_tagihan' => $periode_tagihan,
									'jmlTagihan' => $tagihan ,
									'jmlBayar' => $jmlBayar,
									'idkamar' =>$rsmst->IDKAMAR,
									'namaKamar' =>$rsmst->nmkamar,
									'pengurangan_denda' =>0,
									'denda' =>0
								);
						if ($this->db->insert('bayar_tahunan', $dataMaster)){
							$ceksql=$this->db->last_query();
							// $cekError.="insert bayar_bulanan<br><br>";
							$this->db->trans_commit();
							$respon->status = 'success';
							$respon->ceksql=$ceksql;
							$html.="insert master";

						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error master bayar_tahunan#select count(*) cek from bayar_tahunan  where idPendaftaran='".$noreg."' and  tahun_tagihan  =".$periode_tagihan;
							$html.=$respon->errormsg ;
						}

					}else{
						//get akumulasi bayar, update jumlah bayar saja, kwh akhir tidak diupdate-> kwh akhir hanya disimpan pada proses bayar pertama (bukan proses edit/update)
						$getSum=$this->db->query("select sum(jmlbayar) sumjum from  bayar_tahunan_detil where idPendaftaran='".$noreg."' and idlokasi =".$idlokasi." and  tahun_tagihan=".$periode_tagihan)->row();

						if ($this->db->query("update bayar_tahunan set jmlBayar=".$getSum->sumjum." where idPendaftaran='".$noreg."' and idlokasi =".$idlokasi."  and  tahun_tagihan=".$periode_tagihan) ){
							$this->db->trans_commit();
							$respon->status = 'success';
							$html.="update master bayar";

						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error master  bayar_tahunan kedua dst";
						}

					}


				/*} catch (Exception $e) {
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
				}*/

				return true;
	}
	
	function saveBayarBulanan($rsTrans, $petugas,$metode_bayar){
		$respon = new StdClass();
		$html="";
		$noreg=$rsTrans->idPendaftaran;
			$idlokasi=$rsTrans->idlokasi;
			$tglBayar=$rsTrans->tglBayar;
			$jmlBayar=$rsTrans->jmlBayar;
			$metode_bayar=$rsTrans->metode_bayar;
			$petugas=$this->session->userdata('auth')->USERNAME;
			$periode_tagihan=$rsTrans->periode_tagihan;

			$tgl_transfer=$rsTrans->tgl_transfer;
			$dari_bank=$rsTrans->dari_bank;
			$norek_pengirim=$rsTrans->norek_pengirim;
			$nama_pengirim=$rsTrans->nama_pengirim;
			$idrek_penerima=$rsTrans->idrek_penerima;
			$jenis_kartu=$rsTrans->jenis_kartu;
			$no_kartu=$rsTrans->no_kartu;
			$nmpemilik_kartu=$rsTrans->nmpemilik_kartu;
			$no_struk=$rsTrans->no_struk;
			$tgl_struk=$rsTrans->tgl_struk;

			//data tagihan
			$str="select m.idpendaftaran, m.idlokasi, k.tarifbulanan, m.diskon from pendaftaran m,  kamar k  where	 m.idkamar = k.idkamar 	and m.idpendaftaran='".$noreg."' and m.idlokasi=".$idlokasi;
			$res = $this->db->query($str)->row();
			$tagihan=$res->tarifbulanan;
			$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from detildaftar d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='$noreg'";
			$query=$this->db->query($sBiaya)->result();
			$idxbiaya=1;
			foreach($query as $row){
					$html.= "<tr><td >".$row->jenisbiaya."</td><td >Rp. ".number_format($row->tarif,2,',','.')."</td></tr>";
					$jumlah+=$row->tarif;
					$idxbiaya++;
			}
			$tagihan-=$res->diskon;

			//cari pembayaran_ke
			//cek master
			$rscek=$this->db->query("select ifnull(count(*),0) cek from bayar_bulanan where idPendaftaran='".$noreg."' and idlokasi =".$idlokasi." and  thnbln_tagihan=".$periode_tagihan)->row();
			$byr_ke=1;
			if ($rscek->cek <=0){
				$rsbyrke=$this->db->query("SELECT ifnull(MAX(pembayaran_ke), 0) + 1 byr_ke FROM bayar_bulanan WHERE idPendaftaran='".$noreg."' and idlokasi =".$idlokasi."")->row();
				$byr_ke=$rsbyrke->byr_ke;
			}else{
				$rsbyrke=$this->db->query("select * from bayar_bulanan where idPendaftaran='".$noreg."' and idlokasi =".$idlokasi." and  thnbln_tagihan=".$periode_tagihan)->row();
				$byr_ke=$rsbyrke->pembayaran_ke;
			}

			$dataDetilBlnn = array();

					switch ($metode_bayar){
						case "tunai":
							$dataDetilBlnn = array(
							'idPendaftaran' => $noreg,
							'idlokasi' => $idlokasi,							
							'thnbln_tagihan' => $periode_tagihan,
							'pembayaran_ke' =>$byr_ke,
							'tglBayar' =>$tglBayar,
							'jmlBayar' =>$jmlBayar,
							'petugas' =>$petugas,
							'metode_bayar' =>$metode_bayar
						);
							break;
						case "transfer":
							$dataDetilBlnn = array(
							'idPendaftaran' => $noreg,
							'idlokasi' => $idlokasi,							
							'thnbln_tagihan' => $periode_tagihan,
							'pembayaran_ke' =>$byr_ke,
							'tglBayar' =>$tglBayar,
							'jmlBayar' =>$jmlBayar,
							'petugas' =>$petugas,
							'metode_bayar' =>$metode_bayar,
							'tgl_transfer' =>$tgl_transfer,
							'dari_bank' =>$dari_bank,
							'norek_pengirim' =>$norek_pengirim,
							'nama_pengirim' =>$nama_pengirim,
							'idrek_penerima' =>$idrek_penerima
						);
							break;
						case "kartu":
							$dataDetilBlnn = array(
							'idPendaftaran' => $noreg,
							'idlokasi' => $idlokasi,
							'pembayaran_ke' =>$byr_ke,
							'thnbln_tagihan' => $periode_tagihan,
							'tglBayar' =>$tglBayar,
							'jmlBayar' =>$jmlBayar,
							'petugas' =>$petugas,
							'metode_bayar' =>$metode_bayar,
							'jenis_kartu' =>$jenis_kartu ,
							'no_kartu' =>$no_kartu,
							'nmpemilik_kartu' =>$nmpemilik_kartu,
							'no_struk' =>$no_struk ,
							'tgl_struk' =>$tgl_struk
						);
							break;
					}


					if ($this->db->insert('bayar_bulanan_detil', $dataDetilBlnn)){
						$detil_insert_id = $this->db->insert_id();
						$this->db->trans_commit();
						$respon->status = 'success';

					} else {
						throw new Exception("gagal simpan");
						$respon->errormsg ="error insert bulanan detil";
					}


					//master
					

					if ($rscek->cek <=0){
						$rsmst=$this->db->query("select pendaftaran.*, (select labelkamar from kamar where idkamar=pendaftaran.idkamar and idlokasi=".$idlokasi.") nmkamar from pendaftaran where idPendaftaran='".$noreg."' and idlokasi =".$idlokasi)->row();

						$dataMaster= array(
									'idPendaftaran' => $noreg,
									'idlokasi' => $idlokasi,									
									'thnbln_tagihan' => $periode_tagihan,
									'pembayaran_ke' =>$byr_ke,
									'jmlTagihan' => $tagihan ,
									'jmlBayar' => $jmlBayar,
									'idkamar' =>$rsmst->IDKAMAR,
									'namaKamar' =>$rsmst->nmkamar,
									'pengurangan_denda' =>0,
									'denda' =>0
								);
						if ($this->db->insert('bayar_bulanan', $dataMaster)){
							$ceksql=$this->db->last_query();
							// $cekError.="insert bayar_bulanan<br><br>";
							$this->db->trans_commit();
							$respon->status = 'success';
							$respon->ceksql=$ceksql;

						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error master bayar_bulanan#select count(*) cek from bayar_bulanan  where idPendaftaran='".$noreg."' and  thnbln_tagihan  =".$periode_tagihan;
						}

					}else{
						//get akumulasi bayar, update jumlah bayar saja, kwh akhir tidak diupdate-> kwh akhir hanya disimpan pada proses bayar pertama (bukan proses edit/update)
						$getSum=$this->db->query("select sum(jmlbayar) sumjum from  bayar_bulanan_detil where idPendaftaran='".$noreg."' and idlokasi =".$idlokasi." and  thnbln_tagihan=".$periode_tagihan)->row();

						if ($this->db->query("update bayar_bulanan set jmlBayar=".$getSum->sumjum." where idPendaftaran='".$noreg."' and idlokasi =".$idlokasi."  and  thnbln_tagihan=".$periode_tagihan) ){
							$this->db->trans_commit();
							$respon->status = 'success';

						} else {
							throw new Exception("gagal simpan");
							$respon->errormsg ="error master  bayar_bulanan kedua dst";
						}

					}


				return true;
				//return $html;
	}

}
