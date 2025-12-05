<?php
			
class master_model extends MY_Model {
	var $table = 'kamar';
	var $primaryID = 'IDKAMAR';

	function ubahStatus($id=null, $sts=null){
		$this->db->trans_begin();
		$sts=($sts=="1"?"0":"1");
		try {
			if ($this->db->where('IDKAMAR',$id)->update('kamar', array("ISACTIVE"=>$sts))){
				$this->db->trans_commit();
				$respon->status = 'success';
			} else {
				throw new Exception("gagal simpan");
			}
		} catch (Exception $e) {
			$respon->status = 'error';
			$respon->errormsg = $e->getMessage();;
				$this->db->trans_rollback();
		}
	}

	function hapus($id=null, $nm_table, $nm_field){
		$this->db->trans_begin();
		$str="";
		$respon = new StdClass();
		try {
			if ($nm_table=="itemoption"){ 
				$str= "delete from $nm_table where idcat=2 and $nm_field=".$id;
			}else{
				$str="delete from $nm_table where $nm_field=".$id;
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
}