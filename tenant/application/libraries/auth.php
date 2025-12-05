<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth{
	
	public $allowedActions = array();
	protected $_methods = array();
	
	function __construct()
	{
		$this->CI =& get_instance();
		$this->_methods = $this->CI->router->method;
		$this->CI->load->model('param_model');
	}
	
	function do_login($username,$password)
	{
		$this->CI->db->select(" *  ",false)
			->from('login_penghuni',false)			
			->where(array('username'=>$username,'password'=>$password,'isactive'=>1))
			->limit(1);
		$result = $this->CI->db->get();
       
                
		if($result->num_rows() == 0) 
		{
			return false;
		}
		else	
		{
			$userdata = $result->row();
			$session = array();
			$session['auth'] = $userdata;
			$str = "select a.nama, a.foto,a.email,a.imgidentitas, (select lokasi from lokasi where id=a.idlokasi) NAMALOKASI from anak_kost a where idanakkost= (select idanakkost from ".($userdata->JENIS_SEWA=="Bulanan"?"pendaftaran":"pendaftaran_tahunan")." where idpendaftaran='".$userdata->IDPENDAFTARAN."')";
			$row=$this->CI->db->query($str)->row();
			$session['profil'] = $row;
			$this->CI->session->set_userdata($session);
			/*$this->CI->session->set_userdata('labelling',$this->CI->param_model->get('1', true));
			$this->CI->session->set_userdata('param_company',$this->CI->param_model->get('1'));
			$this->CI->session->set_userdata('company_dept',$this->CI->param_model->getDept('1'));
			$this->CI->session->set_userdata('logo',$this->CI->param_model->getLogo('1'));*/
			/*if ($this->CI->session->set_userdata($session)){
				return true;
			}else{
				return false;
			}*/
			return true;
		}
	}
	
	function is_login()
	{
		if(empty($this->CI->session->userdata('auth')->ID))
		{
			return false;
		} else 
		{
			return true;
		}
	}
	
	
	function authorize(){
		$args = func_get_args();
		if ((!in_array($this->CI->router->method,$args)) && (@$args[0]<>'*') ){
			if ($this->is_login()==false){
				$this->CI->session->set_userdata(array('flashmsg'=>'Anda tidak memiliki hak untuk mengakses.<br />Silakan login terlebih dahulu.','flashtype'=>'danger'));
				//debug('auth error');
				redirect('login');
			}
		}
	}
	
	
	function cek_menu($idmenu)
	{
		$this->CI->load->model('usermodel');
		$status_user = $this->CI->session->userdata('ROLE');
		$allowed_level = $this->CI->usermodel->get_array_menu($idmenu);
		//if(in_array($status_user,$allowed_level) == false)
                if ($allowed_level == false)
		{
			die("Maaf, Anda tidak berhak untuk mengakses halaman ini. ");
			
		}
	}
	// untuk logout
	function logout()
	{
		$this->CI->session->unset_userdata('auth');
	}
	
}