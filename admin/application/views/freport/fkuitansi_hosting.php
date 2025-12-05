<? // NOTES utk image kuitansi cetak pdf, dompdf tidak bisa generate image dengan base_url, tp langsung url 
	$rscompro=$this->db->query("select logo from owner where id=1")->row();	
	for ($i=0; $i<2; $i++){ ?>
<div class="row" style="background-image: url('assets/images/kuitansi.png');background-repeat: no-repeat; background-size: 680px 160px;background-attachment: fixed;">
 <div class="widget-box " style=" border:1px solid #000;">
 <div class="widget-header"> 
<table border="0"><tr valign="bottom">
<td><img src="assets/images/logo/<?php echo ($rscompro->logo ==""?"none.gif":$rscompro->logo);?>"  width="40" height="40" style="float:left; vertical-align:middle; margin-right:5px;">
</td>
<td><b><?php echo strtoupper($this->session->userdata('labelling')->nama)."<br>".$this->session->userdata('labelling')->alamat_usaha?></b></td>
</tr></table>
</div>
 <div class="widget-body "  >
<?	if ($display=="0"){
		echo '<a href="'.base_url("rpt_pembayaran/printReceipt/".$jns_sewa."_1_".$noreg."_".$param_4).'" title="Generate to pdf"><img src="assets/images/logo/<?php echo ($rscompro->logo ==""?"none.gif":$rscompro->logo);?>" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	$untuk="";$label="";$tagihan=0;$tglmulai="";$tglakhir="";
	$rsKota=$this->db->query("select nama_kota from kuitansi_var where id=1")->row();
	switch ($jns_sewa){
		case "Bulanan":
			$bln=substr($thnbln, 4,2);
			$untuk=" periode ".$arrBulan[$bln]." ".substr($thnbln,0,4);
			break;
		case "Mingguan":
			$untuk=" selama ".$rsData->jmlminggu." minggu";
			break;
		case "Harian":
			$untuk=" selama ".$rsData->jmlhari." hari";
		break;

	}

		echo '<div class="row"><div class="col-md-6">';
		if ($jns_sewa=="Bulanan"){
			$bln=substr($thnbln, 4,2);
		}
		echo "<div class='kwitNo'>No. Kuitansi :&nbsp;<U>".($jns_sewa=="Bulanan"?$rsData->notransaksi:$rsData->idpendaftaran.$rsData->nourut)."</U></div>";
		echo "<table border=0 cellpadding=0 cellspacing=0  ><tr valign='top'><td>";
		echo "<div class='leftBar'>";
		echo "<fieldset>";
		echo "<legend>Detil Kuitansi Pembayaran</legend>";
		echo "<table class='mydata' border=0 width='100%'>	";
		echo "<tr valign='top'><td>Sudah Terima Dari</td><td>:</td><td><B>".$rsData->nama."</B></td></tr>";
		
		echo "<tr valign='top'><td  width='30%'>Banyaknya Uang</td><td width='5%'>:</td><td><B>".strtoupper($terbilang)." RUPIAH</B></td></tr>";
		echo "<tr valign='top'><td>Untuk Pembayaran</td><td>:</td><td><B>Sewa Kost ".$jns_sewa." ".$untuk." </B></td></tr>";
		echo "</table>";
		echo "<table border=0 width='100%'>	";
		echo "<tr><td width='50%' align='left'>&nbsp;</td><td align='right'>".$rsKota->nama_kota.", ".strftime("%d %B %Y", strtotime($rsData->tglbayar))."</td></tr>";
		echo "<tr><td  width='50%' align='left'>&nbsp;</td><td>&nbsp;</td></tr>";
		echo "<tr><td  width='50%' align='left'>&nbsp;</td><td>&nbsp;</td></tr>";
		echo "<tr><td  width='50%' align='left'>Jumlah Rp. <B>".number_format($rsData->jmlbayar,0,',','.')."</B></td><td align='right'>(".$this->session->userdata('auth')->USERNAME.")</td></tr>";	
		echo "</table></fieldset>";
		echo "</div>";
		echo "</td><td>";
		echo "<div class='rightBar'>";
		echo "<fieldset>";
		echo "<legend>Informasi Tagihan</legend>";
		echo "<table class='mydata' width='100%'>	";
		echo "<tr valign='top'><td  width='25%'>No Registrasi</td><td width='3%'>:</td><td><B>".$rsData->idpendaftaran."</B></td></tr>";
		echo "<tr valign='top'><td>Tagihan</td><td>:</td><td><B>Rp. ".number_format($rsData->tagihan,0,',','.')."*</B></td></tr>";	
		//echo "<tr valign='top'><td>Diskon</td><td>:</td><td><B>Rp. ".number_format($rsData->8],0,',','.')."</B></td></tr>";	
		if ($jns_sewa=="Bulanan"){
			$jumlah=$rsData->tagihan-$rsData->jmlbayar;
			$status=($jumlah>0?"Belum Lunas":"Lunas");
			echo "<tr valign='top'><td>Denda</td><td>:</td><td><B>Rp. ".number_format($rsData->denda,0,',','.')."</B></td></tr>";	
			echo "<tr valign='top'><td>Jumlah Bayar</td><td>:</td><td><B>Rp. ".number_format($rsData->jmlbayar,0,',','.')."</B></td></tr>";	
			echo "<tr valign='top'><td>Status</td><td>:</td><td><B>$status</B></td></tr>";		
		}else{
			echo "<tr valign=\"top\"><td>Sudah dibayar</td><td>:</td><td><B>Rp. ".number_format($rsData->jmlbayarall,0,',','.')."</B></td></tr>";	
			echo "<tr valign=\"top\"><td>Kekurangan</td><td>:</td><td><B>Rp. ".number_format($rsData->tagihan - $rsData->jmlbayarall,0,',','.')."</B></td></tr>";	
			echo "<tr valign=\"top\"><td>Status</td><td>:</td><td><B>".$rsData->status."</B></td></tr>";		
		}

		echo "<tr valign='top'><td colspan=3>*) Sudah termasuk diskon jika ada</td></tr>";
		echo "</table></fieldset>";
		echo "</div>";
		echo "</td></tr></table>";
		echo "</div></div>";
		echo "<br><br>";
	
?>
	
</div>
</div>	
</div>
</div>	<br/>	
<?	}
 if ($display==0){
	$param=$jns_sewa."_1_".$noreg."_".$param_4;
?>

<br>
<div class="row" style="text-align:center">
	<div class="col-md-12">	<input type="hidden" name="param" id="param" value="<?=$param?>">
		<!-- <button  id="btToExcel" class="btn btn-success" >Cetak Xls</button>&nbsp; -->
		<a href="<?=base_url("rpt_pembayaran/printReceipt/".$jns_sewa."_1_".$noreg."_".$param_4)?>" class="btn btn-success">Cetak/Download</a><br>		
	</div>
</div>	
<?}?>
