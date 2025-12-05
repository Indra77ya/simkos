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
		if ($jenis=="Bulanan"){
			$str="select jmltagihan from bayar_bulanan where idpendaftaran='".$noreg."' and pembayaran_ke=$bayar_ke ";
		}else{
			$str= "SELECT ".($jenis=='Mingguan'?"jmlminggu":"jmlhari")." jumlahlama, tarif from ".($jenis=='Mingguan'?"bayar_mingguan_master":"bayar_harian_master")." where nopendaftaran='$noreg'";
		}
		$query = $this->db->query($str)->row();
           
		return $query;
	}

	function hapusBayar($jenis=null, $noreg, $bayar_ke, $nokuit=null, $idlokasi){
		$this->db->trans_begin();
		$respon=new StdClass();
		$str="";
		try {
			switch ($jenis){
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
	

	function delRegistration($jenis=null, $noreg, $idlokasi){
		$this->db->trans_begin();
		$respon=new StdClass();
		$str="";
		try {	//hapus data pendaftaran blm ada transaksi pembayaran, lgs hapus, hapus idanakkost?

			switch ($jenis){
				case "Bulanan": 
					$nmTabel="pendaftaran";
					$str="delete from pendaftaran where idpendaftaran='$noreg' and idlokasi= ".$idlokasi;
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
}
