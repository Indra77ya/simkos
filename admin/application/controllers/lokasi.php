
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lokasi extends MY_App {
	var $branch = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
		$this->config->set_item('mymenu', 'mn1');
		$this->config->set_item('mysubmenu', 'mn113');
		$this->auth->authorize();
	}
	
	public function index()
	{	
		$this->template->set('breadcrumbs','<h1>Pusat Data<small> <i class="ace-icon fa fa-angle-double-right"></i> Master Lokasi Kos</small></h1>');
		$this->template->set('pagetitle','Daftar Lokasi Kos');		
		$this->template->load('default','fmaster/vlokasi',compact('str'));
	}
	
	
	
	public function json_data(){
		//if ($this->input->is_ajax_request()){
		
			$start = $this->input->get('iDisplayStart');
			$limit = $this->input->get('iDisplayLength');
			$sortby = $this->input->get('iSortCol_0');
			$srotdir = $this->input->get('sSortDir_0');
			
			$str = "select * from lokasi ";
			
						
			if ( $_GET['sSearch'] != "" )
			{
				
				$str.= " where lokasi like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' or alamat like '%".mysql_real_escape_string( $_GET['sSearch'] )."%' ";
				
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
				$strCek="select count(*) cek from kamar where idlokasi=".$row->id;
				$queryCek = $this->db->query($strCek)->row();

				$aaData[] = array(
					'ID'=>$row->id,
					'KODE_KOST'=>$row->kode_kost,
					'LOKASI'=>$row->lokasi,
					'NAMA_PENGURUS'=>$row->nama_pengurus,
					'ALAMAT'=>$row->alamat,
					'TELP'=>$row->hp,
					'HP'=>$row->telp,
					'ACTION'=>'<a href="javascript:void(0)" onclick="editlokasi(this)" data-id="'.$row->id.'"><i class="fa fa-edit" title="Edit"></i></a> '.($queryCek->cek<=0?'| <a href="javascript:void(0)" onclick="dellokasi('.$row->id.', \''.$row->lokasi.'\')"><i class="fa fa-power-off" title="Delete"></i></a>':'')


					
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
	
	public function getlokasi(){
		$id = $this->input->post('id');
		$str="select * from lokasi where id=$id";
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
	
	public function savelokasi(){
		$isi="awal<br>";
		if ($this->input->is_ajax_request()){	
			$this->load->library('form_validation');
			$state=$this->input->post('state');
			$rules = array(				
						array(
						'field' => 'lokasi',
						'label' => 'NAMA_LOKASI',
						'rules' => 'trim|xss_clean|required'
						),
						array(
						'field' => 'kode_kost',
						'label' => 'KODE_KOST',
						'rules' => 'trim|xss_clean|required'
						),
						array(
							'field' => 'nama_pengurus',
							'label' => 'NAMA_PENGURUS',
							'rules' => 'trim|xss_clean|required'
							),
						array(
							'field' => 'alamat',
							'label' => 'ALAMAT',
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
							'lokasi' => $this->input->post('lokasi'),
							'alamat' => $this->input->post('alamat'),
							'kode_kost' => $this->input->post('kode_kost'),
							'nama_pengurus' => $this->input->post('nama_pengurus'),
							'nama_asisten1' => $this->input->post('nama_asisten1'),
							'nama_asisten2' => $this->input->post('nama_asisten2'),
							'status_tanah' => $this->input->post('status_tanah'),
							'pbb' => $this->input->post('pbb'),
							'telp' => $this->input->post('telp'),
							'hp' => $this->input->post('hp')	
						);			
					
					$id_lokasi="";
					if($state=="add"){ 
						$strCek="select count(*) cek from lokasi where ucase(kode_kost)='".strtoupper($this->input->post('kode_kost'))."'";
						$queryCek = $this->db->query($strCek)->row();
						$isi="masuk add<br>".$queryCek->cek;
						if ($queryCek->cek<=0){
							$this->db->insert('lokasi',$data);
							$id_lokasi=$this->db->insert_id();
							$isi="masuk add<br>".$this->db->last_query();
							$respon->status = 'success';
						} else {
							$respon->status = 'error';
							$respon->errormsg = 'Data '.strtoupper($this->input->post('kode_kost')).' sudah ada';
							throw new Exception('Data '.strtoupper($this->input->post('kode_kost')).' sudah ada');
						}
		
						

					}else{
											
						if ($this->db->where('id',$state)->update('lokasi',$data)){
									$this->db->trans_commit();
									$respon->status = 'success';
						} else {
							throw new Exception("gagal simpan");
						}

						//jika update kuota, update juga ceklokasi ?

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
		$res = $this->master_model->hapus($id, 'lokasi', 'id');
		return $res;
	}
	


}
