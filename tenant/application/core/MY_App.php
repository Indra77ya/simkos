<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$menu="pengguna";
class MY_App extends CI_Controller {
	public $arrBulan2=array("1"=>"Januari", 
			"2"=>"Februari",
			"3"=>"Maret",
			"4"=>"April",
			"5"=>"Mei",
			"6"=>"Juni",
			"7"=>"Juli",
			"8"=>"Agustus",
			"9"=>"September",
			"10"=>"Oktober",
			"11"=>"November",
			"12"=>"Desember"
			);
	public $arrBulan=array("01"=>"Januari", 
			"02"=>"Februari",
			"03"=>"Maret",
			"04"=>"April",
			"05"=>"Mei",
			"06"=>"Juni",
			"07"=>"Juli",
			"08"=>"Agustus",
			"09"=>"September",
			"10"=>"Oktober",
			"11"=>"November",
			"12"=>"Desember"
			);
	public $arrIntBln=array("1"=>"01",
				"2"=>"02",
				"3"=>"03",
				"4"=>"04",
				"5"=>"05",
				"6"=>"06",
				"7"=>"07",
				"8"=>"08",
				"9"=>"09",
				"10"=>"10",
				"11"=>"11",
				"12"=>"12"
				);
	public $arrHari=array("1"=>"Senin", 
			"2"=>"Selasa",
			"3"=>"Rabu",
			"4"=>"Kamis",
			"5"=>"Jumat"
			);

	function __construct()
    {
        parent::__construct();
		//$this->auth->authorize('login');
		//$this->load->helper('url');
		$this->initdata();
		$this->load->model('common_model');
		// $this->load->library('template');
		
    }
	
	function getYearArr(){
		$now=date('Y');
		//$j=0;
		for ($i=date('Y')-10; $i<=date('Y')+10; $i++) {	
			$year[$i]=$i;
			

		}
		return $year;
	}

	function initdata(){
		$first = $this->session->userdata('1stvisit');
		if (!$first){
			$this->session->set_userdata('labelling',$this->param_model->get('1', true));
			$this->session->set_userdata('param_company',$this->param_model->get('1'));
			$this->session->set_userdata('company_dept',$this->param_model->getDept('1'));
			$this->session->set_userdata('logo',$this->param_model->getLogo('1'));
			$this->session->set_userdata('1stvisit',true);
		}
	}
	
	function sendEmail($emailTo, $subject, $message, $attach){
		$rsconf=$this->db->query("select * from email_setting where id=1")->row();
		$config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://'.$rsconf->email_host,
            'smtp_port' => $rsconf->email_port,
            'smtp_user' => $rsconf->email_user,
            'smtp_pass' => $rsconf->email_pass,
            'mailtype' => 'html'
        );
 
        // recipient, sender, subject, and you message
        $to = $emailTo;
        $from = $rsconf->email_from;
        //$subject = $subject;
        //$message = "This is a test email using CodeIgniter. If you can view this email, it means you have successfully send an email using CodeIgniter.";
 
        
        $this->load->library('email', $config);
		if ($attach<>"" || !empty($attach)){
			$this->email->attach($attach);
		}
        $this->email->set_newline("\r\n");
        $this->email->from($from, $rsconf->email_from_name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
		
 
        // send your email. if it produce an error it will print 'Fail to send your message!' for you
        if($this->email->send()) {
           return 1;
        }
        else {
            return 0;
        }
	}

	function divTreeFilter($datas, $parent = 0, $depth = 0){
		global $branch;
		if($depth > 1000) return ''; // Make sure not to have an endless recursion
		
		for($i=0, $ni=count($datas); $i < $ni; $i++){
			if($datas[$i]['idparent'] == $parent){
				$val = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $depth);
				$val .= $depth==0?'':'&raquo; ';
				$val .= $datas[$i]['nama'];
				$branch[$datas[$i]['idacc']] = $val;
				$tree = $this->divTree($datas, $datas[$i]['idacc'], $depth+1);
			}
		}
		return $branch;
	}
	function divTree($datas, $parent = 0, $depth = 0){
		global $branch;
		if($depth > 1000) return ''; // Make sure not to have an endless recursion
		
		for($i=0, $ni=count($datas); $i < $ni; $i++){
			if($datas[$i]['idparent'] == $parent){
				$val = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $depth);
				$val .= $depth==0?'':'&raquo; ';
				$val .= $datas[$i]['nama'];
				$branch[$datas[$i]['idacc']] = $val;
				$tree = $this->divTree($datas, $datas[$i]['idacc'], $depth+1);
			}
		}
		return $branch;
	}
	function divTreeKas($datas, $parent = 0, $depth = 0){
		global $branch2;
		if($depth > 1000) return ''; // Make sure not to have an endless recursion
		
		for($i=0, $ni=count($datas); $i < $ni; $i++){
			if($datas[$i]['idparent'] == $parent){
				$val = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $depth);
				$val .= $depth==0?'':'&raquo; ';
				$val .= $datas[$i]['idacc'].' - '.$datas[$i]['nama'];
				$branch2[$datas[$i]['idacc']] = $val;
				$tree = $this->divTreeKas($datas, $datas[$i]['idacc'], $depth+1);
			}
		}
		return $branch2;
	}

	function terbilang($x)	{
	  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	  if ($x < 12)
		return " " . $abil[$x];
	  elseif ($x < 20)
		return $this->terbilang($x - 10) . "belas";
	  elseif ($x < 100)
		return $this->terbilang($x / 10) . " puluh" . $this->terbilang($x % 10);
	  elseif ($x < 200)
		return " seratus" . $this->terbilang($x - 100);
	  elseif ($x < 1000)
		return $this->terbilang($x / 100) . " ratus" . $this->terbilang($x % 100);
	  elseif ($x < 2000)
		return " seribu" . $this->terbilang($x - 1000);
	  elseif ($x < 1000000)
		return $this->terbilang($x / 1000) . " ribu" . $this->terbilang($x % 1000);
	  elseif ($x < 1000000000)
		return $this->terbilang($x / 1000000) . " juta" . $this->terbilang($x % 1000000);
	}
}
