<?php
			
class param_model extends MY_Model {
	
	public function get($id=1,$all=false){
		$query = $this->db->select()
			->where('LOWER(id)',strtolower($id))
			->get('owner')
			->row();
		if ($all){
			return $query;
		} else {
			return $query->nama;
			
		}
	}
	public function getLogo($nama,$all=false){		
		$mylogo="";		
		$query = $this->db->select()
			->where('LOWER(id)',strtolower($nama))
			->get('owner');
			
		if ($query->num_rows()>0){
				$res=$query->row();
				$mylogo=$res->logo;
		}
		return $mylogo;
	}
	public function getDept($nama,$all=false){		
		$mydept="";		
		$query = $this->db->select()
			->where('LOWER(id)',strtolower($nama))
			->get('owner');
			
		if ($query->num_rows()>0){
				$res=$query->row();
				$mydept=$res->nama;
		}
		return $mydept;
	}
	function getLokasi($idlokasi=null){
		$str= "SELECT * from lokasi where id=".$idlokasi;
		$query = $this->db->query($str)->row();           
		return $query;
	}
}