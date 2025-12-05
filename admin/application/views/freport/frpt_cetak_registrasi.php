<div class="row">
<div class="col-md-12">
 <div class="widget-box">
 <div class="widget-header">
<h4 class="smaller">
<?php echo $title?>
</h4>
</div>
 <div class="widget-body">
<?	
$rscompro=$this->db->query("select logo from owner where id=1")->row();	
if ($display<>"0"){ ?>
	<table border="0"><tr valign="bottom">
   <td><img src="assets/images/logo/<?php echo ($rscompro->logo ==""?"none.gif":$rscompro->logo);?>"  width="80" height="50" style="float:left; vertical-align:middle; margin-right:5px;">
   </td>
   <td><b><?php echo strtoupper($this->session->userdata('labelling')->nama)."<br>".$lokasi->alamat?></b></td>
   </tr></table>
   <?	
	   }else{
		   echo '<a href="'.base_url("rpt_pendaftaran/view_data/".$jns_sewa."_1_".$noreg."_".$lokasi->id).'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	   }

/*if ($display=="0"){
		echo '<a href="'.base_url("rpt_pendaftaran/view_data/".$jns_sewa."_1_".$noreg."_".$lokasi->id).'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}*/
	$tarif=0;$label="";$tagihan=0;$tglmulai="";$tglakhir="";$tbl_detildaftar="";
	switch ($jns_sewa){
		case "Tahunan":
			$tarif=$rsData->TARIFTAHUNAN;
			$label="Tahunan";
			$tglmulai=$rsData->tgldaftar;
			$tbl_detildaftar="detildaftar_tahunan";
			break;
		case "Bulanan":
			$tarif=$rsData->TARIFBULANAN;
			$label="Bulan";
			$tglmulai=$rsData->tglmulai;
			$tbl_detildaftar="detildaftar";
			break;
		case "Mingguan":
			$tarif=$rsData->TARIFMINGGUAN;
			$label="Minggu";
			$tglmulai=$rsData->tglMulai;
			$tglakhir=$rsData->tglAkhir;
			$tbl_detildaftar="detildaftar_mingguan";
			break;
		case "Harian":
			$tarif=$rsData->TARIFHARIAN;
			$label="Hari";
			$tglmulai=$rsData->tglCek_in;
			$tglakhir=$rsData->tglCek_out;
		break;

	}
	echo '<div class="row" ><div class="col-md-10">';
	//echo "<table class='".($display=="0"?"table table-bordered table-hover":"mytable")."'>"; 
	echo "<table class='".($display=="0"?"table ":"mytable")."'>";
	echo "<tr><tH Colspan=3>Data Registrasi</th></tr>";
	if ($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"){
		echo '<tr valign="top"><td>Nomer Registrasi</td> <td > : <B>'.$rsData->idpendaftaran.'</B></td> <td align="right" ><img id="imgFoto" name="imgFoto" src="'. ($display<>"0"?"assets/images/".($rsData->FOTO==""?"placeholder/none.gif":"foto/".$rsData->FOTO):base_url("assets/images/".($rsData->FOTO==""?"placeholder/none.gif":"foto/".$rsData->FOTO))).'" width="100" height="140">'.($display=="0"?"&nbsp":" ").'<img id="imgCard" name="imgCard" src="'. ($display<>"0"?"assets/images/".($rsData->IMGIDENTITAS==""?"placeholder/none.gif":"foto/".$rsData->IMGIDENTITAS):base_url("assets/images/".($rsData->IMGIDENTITAS==""?"placeholder/none.gif":"foto/".$rsData->IMGIDENTITAS))).'" width="140" height="100"	></td></tr>';		
	}else{
		echo '<tr valign="top"><td >Nomer Registrasi</td> <td colspan=2> : <B>'.$rsData->idPendaftaran.'</B></td> </tr>';
	}
	//echo "<tr valign=\"top\"><td>Nomer Registrasi</td> <td colspan=2> : <B>".($jns_sewa<>"Bulanan" && $jns_sewa<>"Tahunan"?$rsData->idPendaftaran:$rsData->idpendaftaran)."</B></td></tr>";
	echo "<tr><td>Kamar </td><td colspan=2> : ".$rsData->LABELKAMAR."</td></tr >";
	echo "<tr valign=top><td>Fasilitas Kamar</td><td colspan=2> : ".$rsData->FASILITAS."</td>   "; 
	echo "<tr ><td>Tarif Kamar</td><td colspan=2> : Rp. ".number_format($tarif,2,',','.')." / $label</td>   "; 
	$tagihan+= ($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"?$tarif:$tarif*$rsData->lama);
	if ($jns_sewa<>"Harian"){  //tahunan, bulann, mingguan ada biaya tambahan
		echo "<tr><tH Colspan=3>Biaya Tambahan</th></tr>";
		$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from ".$tbl_detildaftar." d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='".$noreg."'";
		$query=$this->db->query($sBiaya)->result();
		if (sizeof($query)<=0){
			echo "<tr><td Colspan=3>Tidak ada biaya tambahan</td></tr>";
		}else{
			$idxbiaya=1;
			foreach($query as $row){
					echo "<tr><td >[$idxbiaya] ".$row->jenisbiaya."</td><td colspan=2>Rp. ".number_format($row->tarif,2,',','.')."</td></tr>";
					$tagihan+=$row->tarif;
					$idxbiaya++;
			}
		}
	}
	
	$tagihan-=$rsData->diskon;
	
	echo "<tr ><td>Diskon</td><td colspan=2> : <u>( - )Rp. ".number_format($rsData->diskon,2,',','.')." </u></td>   "; 
    echo "<tr ><td><b>Tagihan</b></td><td colspan=2> : <b>Rp. ".number_format($tagihan,2,',','.')."</b></td>   "; 
	
	echo "<tr><td>Tgl Check In</td><td colspan=2> : ".strftime("%d-%m-%Y", strtotime($tglmulai))."</td></tr>";
	if ($jns_sewa<>"Bulanan" &&  $jns_sewa<>"Tahunan"){
		echo "<tr><td>Lama</td><td colspan=2> : ".$rsData->lama." $label </td></tr>";
		echo "<tr><td>Tanggal Check-Out</td><td colspan=2> : ".strftime("%d-%m-%Y", strtotime($tglakhir))."</td></tr>";
	}
	if ($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"){
		echo "<tr><td>Posisi Meteran Listrik </td><td colspan=2> : ".$rsData->kwh_awal."</td></tr >";
		echo "<tr><td>Deposit</td><td colspan=2> : Rp. ".number_format($rsData->deposit,2,',','.')." </td></tr >";
	}
	echo "<tr><tH Colspan=3>Data Pribadi</th></tr>";
	echo "<tr><td>Nama Langkap</td><td colspan=2> : ".($jns_sewa<>"Bulanan" && $jns_sewa<>"Tahunan"?$rsData->nama:$rsData->NAMA)."</td></tr>";
	echo "<tr><td>No. Identitas (KTP/SIM/NIM)</td><td colspan=2> : ".($jns_sewa<>"Bulanan" && $jns_sewa<>"Tahunan"?$rsData->noIdentitas:$rsData->NOIDENTITAS)."</td></tr> ";
	echo "<tr><td>No. Telp/HP</td><td colspan=2> : ".($jns_sewa<>"Bulanan"  && $jns_sewa<>"Tahunan"?$rsData->Telp:$rsData->NOTELP)."</td></tr>";
	echo "<tr><td>E-mail</td><td colspan=2> : ".($jns_sewa<>"Bulanan"  && $jns_sewa<>"Tahunan"?$rsData->email:$rsData->EMAIL)."</td></tr>";
	echo "<tr><td>Jenis Kelamin</td><td colspan=2> : ".($jns_sewa<>"Bulanan"  && $jns_sewa<>"Tahunan"?$rsData->JK:$rsData->JENISKELAMIN)."</td></tr>";
	echo "<tr><td>Tempat, tanggal lahir</td><td colspan=2> : ".($jns_sewa<>"Bulanan"  && $jns_sewa<>"Tahunan"?$rsData->tempat_lahir.", ".$rsData->tgl_lahir:$rsData->TEMPAT_LAHIR.", ".$rsData->TGLLAHIR)."</td></tr>";
	echo "<tr><td>Alamat Asal</td><td colspan=2> : ".($jns_sewa<>"Bulanan"  && $jns_sewa<>"Tahunan"?$rsData->alamat_asal:$rsData->ALAMAT_ASAL)."</td></tr>";
	echo "<tr><td>Nama Instansi (Sekolah/Kampus/Kantor)</td><td colspan=2> : ".($jns_sewa<>"Bulanan"  && $jns_sewa<>"Tahunan"?$rsData->namaInstansi:$rsData->NAMA_PT)."</td></tr>";
	echo "<tr><td>Alamat Instansi (Sekolah/Kampus/Kantor)</td><td colspan=2> : ".($jns_sewa<>"Bulanan"  && $jns_sewa<>"Tahunan"?$rsData->alamatInstansi:$rsData->ALAMAT_KERJA_KULIAH)."</td></tr>";
	echo "<tr ><td>Telepon Instansi</td><td colspan=2> : ".($jns_sewa<>"Bulanan"  && $jns_sewa<>"Tahunan"?$rsData->telp_instansi:$rsData->NOTELP_INSTANSI)."</td></tr>";
	
	if ($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"){
		echo "<tr><tH Colspan=3>Data Penanggung Jawab</th></tr>";
		echo "<tr><td>Nama Langkap</td><td colspan=2> : ".$rsData->NAMA_PJ."</td></tr>";
		echo "<tr><td>No. Identitas (KTP/SIM/NIM)</td><td colspan=2> : ".$rsData->NOIDENTITAS_PJ."</td></tr> ";
		echo "<tr><td>E-mail</td><td colspan=2> : ".$rsData->EMAIL_PJ."</td></tr>";
		echo "<tr><td>Jenis Kelamin</td><td colspan=2> : ".$rsData->JENISKELAMIN_PJ."</td></tr>";
		echo "<tr><td>Tempat, tanggal lahir (Sekolah/Kampus/Kantor)</td><td colspan=2> : ".$rsData->TEMPAT_LAHIR_PJ.", ".$rsData->TGL_LAHIR_PJ."</td></tr>";
		echo "<tr><td>Alamat Penanggung Jawab</td><td colspan=2> : ".$rsData->ALAMAT_PJ."</td></tr>";
		echo "<tr ><td>Telepon Penanggung Jawab</td><td colspan=2> : ".$rsData->NOTELP_PJ."</td></tr>";
	}	
	
	$rst=$this->db->query("select * from kuitansi_var where id=1")->row();
	
    echo "<tr><tH Colspan=3>Pernyataan</th></tr>";
    	$svar=preg_replace("/(\r?\n)+/","<br/>",$rst->notes);
    	$gvar=preg_replace("/(\t)/","&emsp;",$svar);
    	$nvar=preg_replace("/(\t)/","&nbsp;&nbsp;&nbsp;&nbsp;",$svar);
    	echo "<tr><td Colspan=3 ><i>".($display=="0"?$gvar:$nvar)."</i></td></tr>";
    	/*$svar2=preg_replace("/(\r?\n)+/","<br/>",$rst->notes2);
    	$gvar2=preg_replace("/(\t)/","&emsp;",$svar2);
    	$nvar2=preg_replace("/(\t)/","&nbsp;&nbsp;&nbsp;&nbsp;",$svar2);
    	echo "<tr><td Colspan=3 ><i>".($display=="0"?$gvar2:$nvar2)."</i></td></tr>";*/
	
	echo "<tr><td Colspan=2>&nbsp;</td><td>".$lokasi->lokasi.", ".strftime("%d %B %Y",strtotime(date ("Y-m-d")))."</td></tr>";
	echo "<tr><td Colspan=2>&nbsp;</td><td>Yang bertanda tangan,</td></tr>";	
	echo "<tr><td Colspan=3>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;</td></tr>";
	echo "<tr><td Colspan=2>&nbsp;</td><td>( ".($jns_sewa<>"Bulanan" && $jns_sewa<>"Tahunan"?$rsData->nama:$rsData->NAMA)." )</td></tr>";	
	echo "</table>";
	echo "</div></div>";

	
	
 
 if ($display==0){
	$param=$jns_sewa."_1_".$noreg."_".$lokasi->id;
?>
</div>
</div>	
</div>
</div>	
<br>
<div class="row" style="text-align:center">
	<div class="col-md-12">	<input type="hidden" name="param" id="param" value="<?=$param?>">
		<a href="<?=base_url("rpt_pendaftaran/view_data/".$jns_sewa."_1_".$noreg."_".$lokasi->id)?>" class="btn btn-success">Cetak/Download</a><br>		
	</div>
</div>	
<?}?>
