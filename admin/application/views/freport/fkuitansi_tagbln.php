<? // NOTES utk image kuitansi cetak pdf, dompdf tidak bisa generate image dengan base_url, tp langsung url 
	$rscompro=$this->db->query("select logo from owner where id=1")->row();	
	for ($i=0; $i<2; $i++){ ?>
<div class="row" style="background-image: url('assets/images/kuitansi.png');background-repeat: no-repeat; background-size: 680px 250px;background-attachment: fixed;">
 <div class="widget-box " style=" border:1px solid #000;">
 <div class="widget-header"> 
<table border="0"><tr valign="bottom">
<td><img src="assets/images/logo/<?php echo ($rscompro->logo ==""?"none.gif":$rscompro->logo);?>"  width="40" height="40" style="float:left; vertical-align:middle; margin-right:5px;">
</td>
<td><b><?php echo strtoupper($this->session->userdata('labelling')->nama)."<br>".$rsLokasi->alamat?></b></td>
</tr></table>
</div>
 <div class="widget-body "  >
<?	if ($display=="0"){
		echo '<a href="'.base_url("rpt_pembayaran/printReceipt_Thnn_tagbln/".$noreg."_".$periode_tagihan."_".$nourut).'" title="Generate to pdf"><img src="assets/images/logo/<?php echo ($rscompro->logo ==""?"none.gif":$rscompro->logo);?>" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	$untuk="";$label="";$tagihan=0;$tglmulai="";$tglakhir="";
	$rsKota=$this->db->query("select nama_kota from kuitansi_var where id=1")->row();
	$periode_tagihan=$periode_tagihan;
	$untuk=" periode ".$periode_tagihan;

		echo '<div class="row"><div class="col-md-6">';		
		echo "<div class='kwitNo'>No. Kuitansi :&nbsp;<U>".$periode_tagihan.$nourut."</U></div>";
		echo "<table border=0 cellpadding=0 cellspacing=0  ><tr valign='top'><td>";
		echo "<div class='leftBar'>";
		echo "<fieldset>";
		echo "<legend>Kuitansi Pembayaran</legend>";
		echo "<table class='mydata' border=0 width='100%'>	";
		echo "<tr valign='top'><td>Sudah Terima Dari</td><td>:</td><td><B>".$rsData->nama."</B></td></tr>";
		
		echo "<tr valign='top'><td  width='30%'>Banyaknya Uang</td><td width='5%'>:</td><td><B>".strtoupper($terbilang)." RUPIAH</B></td></tr>";
		echo "<tr valign='top'><td>Untuk Pembayaran</td><td>:</td><td><B>Tagihan Listrik dan Air".$untuk." </B></td></tr>";
		echo "<tr valign='top'><td colspan =3 ><b>DETIL TAGIHAN</B></td></tr>";
		echo "<tr valign='top'><td>Kamar</td><td>:</td><td><B>".$rsKamar->LABELKAMAR."</B></td></tr>";
		$strtagihan="Listrik : Rp. ".number_format($rsData->jmltag_listrik,2,',','.')."<br>Air/PDAM : Rp. ".number_format($rsData->jmltag_pdam,2,',','.');
		$jumlah=$rsData->jmlBayar;
		
		echo "<tr valign='top'><td>Tagihan </td><td>:</td><td>".$strtagihan."</td></tr>";		

		echo "<tr><td ><b>Total</b></td><td>:</td><td > <b>Rp. ".number_format($jumlah,2,',','.')."</b></td></tr>";

		echo "</table>";
		echo "<table border=0 width='100%'>	";
		echo "<tr><td width='50%' align='left'>&nbsp;</td><td align='right'>".$rsLokasi->lokasi.", ".strftime("%d %B %Y", strtotime($rsData->tglBayar))."</td></tr>";
		echo "<tr><td  width='50%' align='left'>&nbsp;</td><td>&nbsp;</td></tr>";
		echo "<tr><td  width='50%' align='left'>&nbsp;</td><td>&nbsp;</td></tr>";
		echo "<tr><td  width='50%' align='left'>Jumlah Rp. <B>".number_format($rsData->jmlBayar,0,',','.')."</B></td><td align='right'>(".$this->session->userdata('auth')->USERNAME.")</td></tr>";	
		echo "</table></fieldset>";
		echo "</div>";
		echo "</td></tr>";
		echo "</table>";
		
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
		<a href="<?=base_url("rpt_pembayaran/printReceipt_Thnn_tagbln/".$noreg."_".$periode_tagihan."_".$nourut)?>" class="btn btn-success">Cetak/Download</a><br>		
	</div>
</div>	
<?}?>
