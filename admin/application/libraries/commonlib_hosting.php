<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class commonlib {
		
	
	
	function buildcombo($arr, $key, $value,$empty='')
	{
		$combo = array();
		if (!empty($empty)){
			$combo[''] = $empty;
		}
		foreach ($arr as $item){
			$combo[$item->$key] = $item->$key." - ".$item->$value;
		}
		return $combo;
	}
	function buildcombo2($arr, $key, $value1, $value2,$empty='')
	{
		$combo = array();
		if (!empty($empty)){
			$combo[''] = $empty;
		}
		foreach ($arr as $item){
			$combo[$item->$key] = $item->$value1.' - '.$item->$value2;
		}
		return $combo;
	}
	public function gencode($reff,$tanggal=null){
		$CI =& get_instance();
		if ($tanggal==null) $tanggal = date('Y-m-d');
		$tanggal = strtotime($tanggal);
		$pdate = getdate($tanggal);
		$code = $CI->db->select()
			->where('REFF',$reff)
			->get('codegen')
			->row();
		if(empty($code)){
			header($_SERVER['SERVER_PROTOCOL'] . ' REFF CODE belum ditentukan', true, 500);
			echo ' REFF CODE belum ditentukan';
			exit;
		}
		$cond = array();
		$cond['REFF'] = $reff;
		switch ($code->PERIODE) {
			case 'HARIAN' :
				$cond['TAHUN'] = $pdate['year'];
				$cond['BULAN'] = $pdate['mon'];
				$cond['TANGGAL'] = $pdate['mday'];
				break;
			case 'BULANAN' :
				$cond['TAHUN'] = $pdate['year'];
				$cond['BULAN'] = $pdate['mon'];
				break;
			case 'TAHUNAN' :
				$cond['TAHUN'] = $pdate['year'];
				break;
		}	
		
		$query = $CI->db->select()
			->where($cond)
			->get('codegen_d')
			->row();
			
		if (empty($query)){
			$num = 1;
			$value = $this->formatcode($code,$tanggal,$num);
		} else {
			$num = $query->NOMOR + 1;
			$value = $this->formatcode($code,$tanggal,$num);
		}
		$data = array(
			'REFF' => $reff,
			'TAHUN' => $pdate['year'],
			'BULAN' => $pdate['mon'],
			'TANGGAL' => $pdate['mday'],
			'NOMOR' => $num,
			'VALUE' => $value
		);
		if (empty($query)){
			$CI->db->insert('codegen_d',$data);
		} else {
			$CI->db->where('id',$query->ID)->update('codegen_d',$data);
		}
		return $value;
	}
	
	public function formatcode($query,$tanggal,$num){
		//$tanggal = strtotime($tanggal);
		$patterns = array('/\%YY\%/','/\%YYYY\%/','/\%MM\%/','/\%M\%/','/\%D\%/','/\%DD\%/','/\%N\%/');
		$replacements = array(date('y',$tanggal),date('Y',$tanggal),date('m',$tanggal),date('n',$tanggal),date('j',$tanggal),date('d',$tanggal),str_pad($num,$query->DIGIT,'0',STR_PAD_LEFT));
		return preg_replace($patterns, $replacements, $query->FORMAT);
	}
	
	function fileupload($config, $file) {
		$CI =& get_instance();
        $CI->load->library('upload', $config);

        if (!$CI->upload->do_upload($file)) {
            $status = 'error';
            $msg = $CI->upload->display_errors('', '');
        } else {
            $status = 'success';
            $msg = $CI->upload->data();
        }
        //
        $result = array(
            'status' => $status,
            'msg' => $msg
        );
        return $result;
    }
	
	function dateformat1($date,$t=0){
		// 31 Desember 2013
		$timestamp = strtotime($date);
		$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember"); 
		$bulan = $array_bulan[date("n",$timestamp)];
		if ($t==1){
			return date('j',$timestamp)." bulan ".$bulan." tahun ".date('Y',$timestamp);
		} else {
			return date('j',$timestamp)." ".$bulan." ".date('Y',$timestamp);
		}
	}

	function pdfHeadertemplate() {
		$sHtml="";
		$sHtml.="<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
		$sHtml.="<html \"http://www.w3.org/1999/xhtml\">\n";	
		$sHtml.="<head>\n";
		$sHtml.="<style>";
		$sHtml.="	body { "; 
		$sHtml.="	    font-family: 'trebuchet MS', 'Lucida sans', Arial;";
		$sHtml.="	     font-size: 9px;}";
		$sHtml.="	table {"; 
		$sHtml.="	    border-collapse: collapse; /* IE7 and lower */";
		$sHtml.="	    border-spacing: 0;";
		$sHtml.="	    width: 100%;     ";
		$sHtml.="	    font-family: 'trebuchet MS', 'Lucida sans', Arial;";
		$sHtml.="	     font-size: 9px;}";
		$sHtml.="	    margin-left:auto;margin-right:auto;    }";
		$sHtml.="	.mydata {";		
		$sHtml.="	   border: solid #ccc 1px;}";

				
		$sHtml.="	.mydata td, .mydata th {";
		$sHtml.="	    border-left: 1px solid #ccc;";
		$sHtml.="	    border-top: 1px solid #ccc;";
		$sHtml.="	    padding: 2px;";
		$sHtml.="	    text-align: left;    }";

		$sHtml.="	.mydata th {";
		$sHtml.="	    background-color: #dce9f9;";
		$sHtml.="	    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));";
		$sHtml.="	    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);";
		$sHtml.="	    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);";
		$sHtml.="	    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);";
		$sHtml.="	    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);";
		$sHtml.="	    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);";
		$sHtml.="	    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; ";
		$sHtml.="	    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  ";
		$sHtml.="	    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        ";
		$sHtml.="	    border-top: none; ";
		$sHtml.="	    text-shadow: 0 1px 0 rgba(255,255,255,.5); }";

		$sHtml.="	.mydata td:first-child, .mydata th:first-child {";
		$sHtml.="	    border-left: none;}";

		$sHtml.="	.mydata th:first-child {";
		$sHtml.="	    -moz-border-radius: 3px 0 0 0;";
		$sHtml.="	    -webkit-border-radius: 3px 0 0 0;";
		$sHtml.="	    border-radius: 3px 0 0 0; }";

		$sHtml.="	.mydata th:last-child {";
		$sHtml.="	    -moz-border-radius: 0 3px 0 0;";
		$sHtml.="	    -webkit-border-radius: 0 3px 0 0;";
		$sHtml.="	    border-radius: 0 3px 0 0;}";

		$sHtml.="	.mydata th:only-child{";
		$sHtml.="	   -moz-border-radius: 3px 3px 0 0;";
		$sHtml.="	    -webkit-border-radius: 3px 3px 0 0;";
		$sHtml.="	    border-radius: 3px 6px 0 0;}";

		$sHtml.="	.mydata tr:last-child td:first-child {";
		$sHtml.="	    -moz-border-radius: 0 0 0 3px;";
		$sHtml.="	    -webkit-border-radius: 0 0 0 3px;";
		$sHtml.="	    border-radius: 0 0 0 3px;}";

		$sHtml.="	.mydata tr:last-child td:last-child {";
		$sHtml.="	    -moz-border-radius: 0 0 3px 0;";
		$sHtml.="	    -webkit-border-radius: 0 0 3px 0;";
		$sHtml.="	    border-radius: 0 0 3px 0;}";
		$sHtml.="</style></head>\n";
		
		$sHtml.=" <body>\n";
		return $sHtml; 
	}
	
	function pdfFooterTemplate() {
		$sHtml="";
		$sHtml.="</body>\n";
		$sHtml.="</html>";
		return $sHtml; 

	}
	
	function pdfHeaderKuitansi() {
	$sHtml="";
	$sHtml.="<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
	$sHtml.="<html \"http://www.w3.org/1999/xhtml\">\n";
	$sHtml.="<head>\n";
	$sHtml.="<title>SI Kelola Usaha Kost-kostan</title>\n";
	$sHtml.="<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
	$sHtml.="<meta http-equiv=\"Copyright\" content=\"amanahsolution.com Webdesign: siKos Creative Crew, modified by ummu Ifan \">\n";
	$sHtml.="<meta name=\"description\" content=\"Sistem Informasi Pengelolaan Usaha Kos-kosan\">\n";
	$sHtml.="<meta name=\"keywords\" content=\"kelola, sistem informasi, Usaha Kos\">\n";
	$sHtml.="<meta name=\"author\" content=\"Webdesign: Amanahsolution.com Creative Crew \">\n";
	$sHtml.="<meta name=\"language\" content=\"Bahasa Indonesia\">\n";
	$sHtml.="<link rel=\"shortcut icon\" href=\"themes/images/favicon.ico\"> \n";
	//$sHtml.="<link rel=\"stylesheet\" type=\"text/css\" href=\"themes/css/mos-style.css\"> \n";
	$sHtml.="<style>";
	$sHtml.=" body { ";
	$sHtml.=" font-family: Arial; font-size: 9px; "; 
	$sHtml.=" width:680px; height: 160px; 	 }";
	$sHtml.=".kwitNo{";
	$sHtml.="	margin:10px 10px 5px 20px;";
	$sHtml.="	text-align:left;";
	$sHtml.="	font-size: 10px; font-weight:Bold;color:#2626BF	}";	
	$sHtml.=".leftBar{";
	$sHtml.=" width:430px; ";
	//$sHtml.=" float:left;";
	$sHtml.=" margin:5px 5px 10px 20px;";
	$sHtml.=" /*border:1px solid #000;*/";
	$sHtml.="}";
	$sHtml.=".rightBar{";
	$sHtml.="width:200px;";
	$sHtml.="margin:5px 20px 10px 5px;";
	//$sHtml.="float:left;";
	$sHtml.="}";
	$sHtml.=".rptHeader{ text-align:center; font-size:16px; font-weight:bold; ";
	$sHtml.="}	";
	
	$sHtml.=".mydata {border: 1px solid #dcdcdc; margin: 10px 0px 0px 0px;  border-collapse: collapse;font-size: 9px;}";
	$sHtml.=".mydata th{padding: 4px 2px 4px 2px;border: 1px solid #dcdcdc; background: #88bc1a; }";
	$sHtml.=".mydata td{padding: 2px; border: 1px solid #dcdcdc;color: #5b5b5b;vertical-align: top;}";
	$sHtml.=".mydata tr{background: #fff}";
	$sHtml.=".mydata tr:hover {background: #feffdc;}";
	$sHtml.=".mydata tr small a{color: #fff;}";
	$sHtml.=".mydata tr small{color: #fff;}";
	$sHtml.=".mydata tr:hover small a{color: #527e19;}";
	$sHtml.=".mydata tr:hover small a:hover{color: #000;}";
	$sHtml.=".mydata tr:hover small {color: #5b5b5b;}";
	$sHtml.="</style></head>\n";
	
	$sHtml.=" <body>\n";
	return $sHtml; 
}
function pdfFooterKuitansi() {
	$sHtml="";
	$sHtml.="</body>\n";
	$sHtml.="</html>";
	return $sHtml; 

}

	function reportHeader() {
		$sHtml="";
		$sHtml.="<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
		$sHtml.="<html \"http://www.w3.org/1999/xhtml\">\n";	
		$sHtml.="<head>\n";	
		$sHtml.= "<meta http-equiv=\"content-type\" content=\"text/html; charset=iso-8859-1\" />\n";
		$sHtml.= "<link href=\"".base_url("assets/css/AdminLTE.css")."\" rel=\"stylesheet\" type=\"text/css\" />";	
		$sHtml.= "<STYLE>";
		$sHtml.= ".alert-info { color: #31708f; background-color: #d9edf7;  border-color: #bce8f1; }";
		$sHtml.= " body{padding-bottom:0;font-family:'Calibri';font-size:10px;line-height:1.5}";
		$sHtml.=".mytable {margin: 10px 0px 20px 0px; border: 1px solid #1e5e88; border-collapse: collapse;font-size: 11px; width:100%}";
		$sHtml.=".mytable th {padding: 4px 2px 4px 2px; background-color: #2980b9; font-weight:bold; color:#fff }";
		$sHtml.=".mytable td{padding: 2px;  vertical-align: top;border: 1px solid #1e5e88;}";		
		$sHtml.=".mytable tr:nth-child(even) {background-color: #f2f2f2;} ";
		$sHtml.=".mytable tr:nth-child(odd) {background-color: #e9e9e9;} ";
	
		$sHtml.= "</STYLE>";
		$sHtml.= "</head>\n";		
		$sHtml.=" <body>\n";
		return $sHtml; 
	}
	
	function reportFooter() {
		$sHtml="";
		$sHtml.="</body>\n";
		$sHtml.="</html>";
		return $sHtml; 

	}

	function tableKop($depN="KEU", $docTitle=null, $noRev="00", $page1=1, $page2=1, $company, $logo){
		
		$sHtml="<table border=\"0\" class=\"mytable mytable-bordered\" >";
		$sHtml.=" <tr>";
		$sHtml.="	<td width=\"28%\" rowspan=\"4\" style=\"text-align:center\"> <img src=\"".base_url('assets/img/'.$logo)."\"  width=\"150\" height=\"120\"  /> </td>";
		$sHtml.="	<td width=\"70%\" colspan=\"4\" style=\"text-align:center\"><h3>".strtoupper($company)."</h3></td>";
		$sHtml.="  </tr>";
		$sHtml.="  <tr>";
		$sHtml.="	<td width=\"20%\" rowspan=\"3\" style=\"text-align:center\">".strtoupper($depN)."</td>";
		$sHtml.="	<td width=\"20%\" rowspan=\"3\" style=\"text-align:center\">".strtoupper($docTitle)."</td>";
		$sHtml.="	<td width=\"15%\" >Diterbitkan </td>";
		$sHtml.="	<td width=\"20%\" >".strftime('%d %B %Y',strtotime(date('Y-m-d')))."</td>";
		$sHtml.="  </tr>";
		$sHtml.="  <tr>";
		$sHtml.="	<td width=\"15%\" valign=\"top\">Revisi </td>";
		$sHtml.="	<td width=\"20%\" valign=\"top\">".$noRev."</td>";
		$sHtml.="  </tr>";
		$sHtml.="  <tr>";
		$sHtml.="	<td width=\"15%\" valign=\"top\">Halaman </td>";
		$sHtml.="	<td width=\"20%\" valign=\"top\">$page1 dari $page2</td>";
		$sHtml.="  </tr>";
		$sHtml.="</table>";
		return $sHtml; 
	}
	
	function printXLS($title,$result,$headertext,$rowitem,$xlsfile){
		$CI =& get_instance();
		$CI->load->library('PHPExcel');
		$xls = new PHPExcel();
		$xls->setActiveSheetIndex(0);
		$sheet = $xls->getActiveSheet();
		$sheet->mergeCells('A1:Z1');
		$sheet->setCellValue('A1',$title);
		$sheet->getStyle('A1')->getFont()->setBold(true);
		$col = "A";
		$row = 2;
		foreach($headertext as $item){
			$sheet->setCellValue($col.$row,$item);
			$sheet->getColumnDimension($col)->setAutoSize(true);
			$sheet->getStyle($col.$row)->getFont()->setBold(true);
			$col = $CI->common_model->nextcol($col);
			
		}
		$row = 3;
		$rownum=1;
		foreach($result as $data){
			$col = 0;
			$sheet->getCellByColumnAndRow($col,$row)->setValueExplicit($rownum, PHPExcel_Cell_DataType::TYPE_NUMERIC);
			$col++;
			foreach($rowitem as $item){
				$sheet->getCellByColumnAndRow($col,$row)->setValueExplicit($data->$item, PHPExcel_Cell_DataType::TYPE_STRING);$col++;
			}
			$row++;
			$rownum++;
		}
		$col--;
		$row--;
		$sheet->getStyle('A2:'.chr($col+65).$row)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$xlsfile.'"');
		header('Cache-Control: max-age=0');
		$xlsoutput = PHPExcel_IOFactory::createWriter($xls, 'Excel5');
		$xlsoutput->save('php://output');
	}
	
}
