<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rekening extends MY_App {
	var $branch = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
		$this->config->set_item('mymenu', 'mn1');
		$this->config->set_item('mysubmenu', 'mn16');
		$this->auth->authorize();
	}
	
	public function index()
	{	
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Master Data Rekening Bank</small></h1>');
		$this->template->set('pagetitle','Daftar Data Rekening Bank ');		
		$this->template->load('default','fmaster/vrekening',compact('str'));
	}
	
	
	
	public function json_data(){
		//if ($this->input->is_ajax_request()){
		
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str = "select * from bank ";
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				$str.= " where nama like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or norekening like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or atasnama like '%".mysql_real_escape_string( $_GET['sSearch'] )."%'";
				
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
				//CEK JIKA ADA PENDAFTARAN TIDAK BISA DIHAPUS
				//$strCek="select count(*) cek from bank where norekening=".$row->norekening;
				//$queryCek = $this->db->query($strCek)->row();

				$aaData[] = array(
					'id'=>$row->id,
					'nama'=>$row->Nama,
					'cabang'=>$row->Cabang,
					'norekening'=>$row->NoRekening,
					'atasnama'=>$row->atasNama,
					'ACTION'=>'<a href="javascript:void(0)" onclick="editrekening(this)" data-id="'.$row->id.'"><i class="fa fa-edit" title="Edit"></i></a>  | <a href="javascript:void(0)" onclick="delrekening('.$row->id.', \''.$row->Nama.'\')"><i class="fa fa-power-off" title="Delete"></i></a>'
					
				);
			}
			
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => $aaData
			);
			echo json_encode($output);
		//}
	}	
	
	public function getrekening(){
		$id = $this->input->post('id');
		$str="select * from bank where id=$id";
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
	
	public function saverekening(){
		$isi="awal<br>";
		if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			$state=$this->input->post('state');
			$rules = array(				
						array(
						'field' => 'nama',
						'label' => 'NAMA_REKENING',
						'rules' => 'trim|xss_clean|required'
					),
						array(
						'field' => 'norekening',
						'label' => 'NOMER_REKENING',
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
					
					$data = array(
							'nama' => $this->input->post('nama'),
							'cabang' => $this->input->post('cabang'),	
							'norekening' => $this->input->post('norekening'),	
							'atasnama' => $this->input->post('atasnama')	
						);			
					

					if($state=="add"){ 
						$strCek="select count(*) cek from bank where ucase(norekening)='".strtoupper($this->input->post('norekening'))."'";
						$queryCek = $this->db->query($strCek)->row();
						if ($queryCek->cek<=0){
							$this->db->insert('bank',$data);
							$this->db->trans_commit();
							$respon->status = 'success';
						} else {
							$respon->status = 'error';
							$respon->errormsg = 'Data '.strtoupper($this->input->post('norekening')).' sudah ada';
							throw new Exception('Data '.strtoupper($this->input->post('norekening')).' sudah ada');
						}
					}else{
											
						if ($this->db->where('id',$state)->update('bank',$data)){
									$this->db->trans_commit();
									$respon->status = 'success';
						} else {
							throw new Exception("gagal simpan");
						}
					}
					$isi.="Proses query<br>";
					
				} catch (Exception $e) {
					$respon->status = 'error';
					$respon->errormsg = $e->getMessage();
					$this->db->trans_rollback();
				}
				
			} else {
				$respon->status = 'error';
				$respon->errormsg = validation_errors();
				
			}
			$respon->data=$isi;	
			echo json_encode($respon);
			//exit;
		
		} 
	}

	public function hapus(){
		$id=$this->input->post('idx');
		//$sts=$this->input->post('status');
		$res = $this->master_model->hapus($id, 'bank', 'id');
		return $res;
	}
	
}
