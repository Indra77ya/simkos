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
	
}