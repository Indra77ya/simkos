<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notif extends MY_App {

	function __construct()
	{
		parent::__construct();
		$this->auth->authorize();
	}
	
	
	function index(){
		$role=$this->session->userdata('auth')->ROLE;
		$respon = array();
		$respon['status'] = 0;
		
		// query cek jurnal blm validasi jurnal masing2
		$query = $this->db->query("select count(*) cnt from jurnal where status_validasi=0 and sumber_data='tsetoranzis' ".($this->session->userdata('auth')->ID_CABANG==0?'':" and id_cab=".$this->session->userdata('auth')->ID_CABANG))->row();
		if ($query->cnt > 0){
			$respon['status'] = 1;
			$respon['data']['tsetoranzis'] = array(
				'text' => 'Setoran ZIS Rutin ',
				'count'=> $query->cnt,
				'url'=>base_url('validasijurnal/dashboard/tsetoranzis')
			);
		}
		$query = $this->db->query("select count(*) cnt from jurnal where status_validasi=0 and sumber_data='tinsidentil'".($this->session->userdata('auth')->ID_CABANG==0?'':" and id_cab=".$this->session->userdata('auth')->ID_CABANG))->row();
		if ($query->cnt > 0){
			$respon['status'] = 1;
			$respon['data']['tinsidentil'] = array(
				'text' => 'Setoran ZIS Insidentil ',
				'count'=> $query->cnt,
				'url'=>base_url('validasijurnal/dashboard/tinsidentil')
			);
		}
		
		$query = $this->db->query("select count(*) cnt from jurnal where status_validasi=0 and sumber_data='kasmasuk'".($this->session->userdata('auth')->ID_CABANG==0?'':" and id_cab=".$this->session->userdata('auth')->ID_CABANG))->row();
		if ($query->cnt > 0){
			$respon['status'] = 1;
			$respon['data']['kasmasuk'] = array(
				'text' => 'Jurnal Kas Masuk ',
				'count'=> $query->cnt,
				'url'=>base_url('validasijurnal/dashboard/kasmasuk')
			);
		}
		$query = $this->db->query("select count(*) cnt from jurnal where status_validasi=0 and sumber_data='kaskeluar'".($this->session->userdata('auth')->ID_CABANG==0?'':" and id_cab=".$this->session->userdata('auth')->ID_CABANG))->row();
		if ($query->cnt > 0){
			$respon['status'] = 1;
			$respon['data']['kaskeluar'] = array(
				'text' => 'Jurnal Kas Keluar ',
				'count'=> $query->cnt,
				'url'=>base_url('validasijurnal/dashboard/kaskeluar')
			);
		}
		$query = $this->db->query("select count(*) cnt from jurnal where status_validasi=0 and sumber_data='jurnalumum'".($this->session->userdata('auth')->ID_CABANG==0?'':" and id_cab=".$this->session->userdata('auth')->ID_CABANG))->row();
		if ($query->cnt > 0){
			$respon['status'] = 1;
			$respon['data']['jurnalumum'] = array(
				'text' => 'Jurnal Non Kas Insidentil ',
				'count'=> $query->cnt,
				'url'=>base_url('validasijurnal/dashboard/jurnalumum')
			);
		}

		$query = $this->db->query("select count(*) cnt from jurnal where status_validasi=0 and sumber_data='susut'".($this->session->userdata('auth')->ID_CABANG==0?'':" and id_cab=".$this->session->userdata('auth')->ID_CABANG))->row();
		if ($query->cnt > 0){
			$respon['status'] = 1;
			$respon['data']['susut'] = array(
				'text' => 'Jurnal Penyusutan ',
				'count'=> $query->cnt,
				'url'=>base_url('validasijurnal/dashboard/susut')
			);
		}

		
		if ($role!="Manager Keuangan" || $role!="Direktur Keuangan" || $role!="Kasir Pusat" || $role!="Kasir Cabang"){

			if ($respon['status']==1){
			?>
			<li>
			<ul class="menu" id="notifitem">
			<?php 
				foreach ($respon['data'] as $data=>$item){
			?>
				<li>
					<a href="<?php echo $item['url'];?>">
					
							<i class="fa fa-warning danger"></i>  <?php echo $item['text'];?>							
							<span class="label label-warning"><?php echo $item['count'];?></span>
					
					</a>
				</li>
			<?php } ?>
			</ul>
			</li>
			<?php
			} else {
				echo 'none';
			}
		}
		//echo json_encode($respon);
	}
	
}
