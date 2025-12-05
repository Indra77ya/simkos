<?php
			
class common_model extends MY_Model {
	
	
	public function comboLokasi($empty=''){
		$str="select * from lokasi where isactive=1 ";
		$query=$this->db->query($str)->result();
		$combo = array();
		if (!empty($query)){
			$combo = $this->commonlib->buildcombo_combine($query,'id','kode_kost','lokasi',$empty);
		}
		return $combo;
	}
	
	public function comboLokasiSingle($id){
		$empty='';
		$str="select * from lokasi where isactive=1 and id= ".$id;
		$query=$this->db->query($str)->result();
		$combo = array();
		if (!empty($query)){
			$combo = $this->commonlib->buildcombo_combine($query,'id','kode_kost','lokasi',$empty);
		}
		return $combo;
	}
	public function getLokasi($id){
		$query = $this->db->query("select * from lokasi where id=".$id)->row();		
		return $query;
	}
	
	public function nextcol($cur="A"){ // generate next column di XLS: A,B,C, dst.
		$int = ord($cur);
		$int++;
		$chr = chr($int);
		return $chr;
	}

	
	public function getUnpaidNotif($jenis=''){
		$str="";
		$statusData=($this->session->userdata('auth')->ROLE=="Superadmin"?"pusat":"cabang");
		switch ($jenis){ 
				case "Tahunan":
					$str="select p.* , a.nama nmpenghuni, a.notelp ,(select lokasi from lokasi where id=p.idlokasi) NMLOKASI,  p.thn_mulai,(select nama from anak_kost where idanakkost=p.idanakkost) nmpenghuni, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar from pendaftaran_tahunan p, anak_kost a where a.idanakkost=p.idanakkost and idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_tahunan WHERE  tahun_tagihan ='".date('Y')."' )  AND checkout=0 ".($statusData=="pusat"?"":" and p.idlokasi=".$this->session->userdata('auth')->IDLOKASI);
					break;
				case "Bulanan":					
					$str="SELECT pendaftaran.idpendaftaran, pendaftaran.idlokasi, pendaftaran.tglmulai,(select nama from anak_kost where idanakkost=pendaftaran.idanakkost) nmpenghuni, (select labelkamar from kamar where idkamar=pendaftaran.idkamar) nmkamar,(select notelp from anak_kost where idanakkost=pendaftaran.idanakkost) notelpon FROM pendaftaran WHERE idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_bulanan WHERE  thnbln_tagihan ='".date('Ym')."' ) and checkout=0 ".($statusData=="pusat"?"":" and pendaftaran.idlokasi=".$this->session->userdata('auth')->IDLOKASI)." order by nmkamar";
					break;
				case "Mingguan":
					$str="SELECT d.idpendaftaran,d.idlokasi, d.tglmulai,d.tglakhir,  d.nama, (select labelkamar from kamar where idkamar=d.idkamar) nmkamar FROM daftar_sewa_mingguan d WHERE d.idpendaftaran NOT IN (SELECT DISTINCT nopendaftaran FROM bayar_mingguan_master) and checkout=0 ".($statusData=="pusat"?"":" and d.idlokasi=".$this->session->userdata('auth')->IDLOKASI)." order by nmkamar";
					break;
				case "Harian":
					$str="SELECT d.idpendaftaran,d.idlokasi, d.tglcek_in,d.tglcek_out, lama,  d.nama, (select labelkamar from kamar where idkamar=d.idkamar) nmkamar FROM daftar_sewa_harian d WHERE d.idpendaftaran NOT IN (SELECT DISTINCT nopendaftaran FROM bayar_harian_master) and checkout=0 ".($statusData=="pusat"?"":" and d.idlokasi=".$this->session->userdata('auth')->IDLOKASI)." order by nmkamar";
					break;
		}

		$query=$this->db->query($str);
		
		return $query;
	}
	
}