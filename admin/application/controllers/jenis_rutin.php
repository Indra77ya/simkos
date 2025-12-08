<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jenis_rutin extends MY_App {
	var $branch = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
		$this->config->set_item('mymenu', 'mn1');
		$this->config->set_item('mysubmenu', 'mn17');
		$this->auth->authorize();
	}
	
	public function index()
	{	
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Jenis Pengeluaran Rutin</small></h1>');
		$this->template->set('pagetitle','Daftar Jenis Pengeluaran Rutin ');		
		$this->template->load('default','fmaster/vjenisrutin',compact('str'));
	}
	
	
	
	public function json_data(){
		//if ($this->input->is_ajax_request()){
		
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str = "select iditem, item from itemoption where idcat=2";
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				$str.= " and item like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' ";
				
			}
			
			
			/*if ( isset( $_GET['iSortCol_0'] ) )
			{
				$str .= " ORDER BY ".$_GET['mDataProp_'.$_GET['iSortCol_0']]." ".$_GET['sSortDir_0'];
			}else{
				$str .= " ORDER BY iditem";
			}*/
			
			
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
				$strCek="select count(*) cek from pengeluaran_rutin where iditembayar=".$row->iditem;
				$queryCek = $this->db->query($strCek)->row();

				$aaData[] = array(
					'ID'=>$row->iditem,
					'NAMA PENGELUARAN'=>$row->item,
					'ACTION'=>'<a href="javascript:void(0)" onclick="editjenis_rutin(this)" data-id="'.$row->iditem.'"><i class="fa fa-edit" title="Edit"></i></a> '.($queryCek->cek<=0?'| <a href="javascript:void(0)" onclick="deljenis_rutin('.$row->iditem.', \''.$row->item.'\')"><i class="fa fa-power-off" title="Delete"></i></a>':'')


					
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
	
	public function getjenis_rutin(){
		$id = $this->input->post('id');
		$str="select * from itemoption where idcat =2 and iditem=$id";
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
	
	public function savejenis_rutin(){
		$isi="awal<br>";
		if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			$state=$this->input->post('state');
			$rules = array(				
						array(
						'field' => 'nama',
						'label' => 'ITEM_PENGELUARAN',
						'rules' => 'trim|xss_clean|required'
					)
			);
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Field %s harus diisi.');
			
			$respon = new StdClass();
			if ($this->form_validation->run() == TRUE){
				
				$this->db->trans_begin();
				try {						
					
					$data = array(
							'idcat' => '2',
							'item' => $this->input->post('nama')
						);			
					

					if($state=="add"){ 
						$strCek="select count(*) cek from itemoption where idcat=2 and ucase(item)='".strtoupper($this->input->post('nama'))."'";
						$queryCek = $this->db->query($strCek)->row();
						
						if ($queryCek->cek<=0){
							$this->db->insert('itemoption',$data);
							$this->db->trans_commit();
							$respon->status = 'success';
						} else {
							$respon->status = 'error';
							$respon->errormsg = 'Data '.strtoupper($this->input->post('nama')).' sudah ada';
							throw new Exception('Data '.strtoupper($this->input->post('nama')).' sudah ada');
						}
					}else{
											
						if ($this->db->where('iditem',$state)->where('idcat','2')->update('itemoption',$data)){
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
		$res = $this->master_model->hapus($id, 'itemoption', 'iditem');
		return $res;
	}
	
}
