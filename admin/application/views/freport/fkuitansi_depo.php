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
		echo '<a href="'.base_url("rpt_pembayaran/printDepoReceipt/".$jns_sewa."_1_".$noreg."_".$param_4).'" title="Generate to pdf"><img src="assets/images/logo/<?php echo ($rscompro->logo ==""?"none.gif":$rscompro->logo);?>" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	
	$rsKota=$this->db->query("select nama_kota from kuitansi_var where id=1")->row();
		echo '<div class="row"><div class="col-md-6">';		
		echo "<div class='kwitNo'>No. Kuitansi :&nbsp;<U>".$rsData->id."</U></div>";
		echo "<table border=0 cellpadding=0 cellspacing=0  ><tr valign='top'><td>";
		echo "<div class='leftBar'>";
		echo "<fieldset>";
		echo "<legend>Kuitansi Mutasi Deposit</legend>";
		echo "<table class='mydata' border=0 width='100%'>	";
		echo "<tr valign='top'><td>Sudah Terima Dari</td><td>:</td><td><B>".$rsData->nama."</B></td></tr>";
		
		echo "<tr valign='top'><td  width='30%'>Banyaknya Uang</td><td width='5%'>:</td><td><B>".strtoupper($terbilang)." RUPIAH</B></td></tr>";
		echo "<tr valign='top'><td>Untuk Pembayaran</td><td>:</td><td><B>".$rsData->tipe." Deposit : Rp. ".number_format($rsData->jumlah,2,',','.')." [Note :".$rsData->deskripsi." ] </B></td></tr>";
		echo "<tr valign='top'><td colspan =3 ><b>DETIL MUTASI</B></td></tr>";
		echo "<tr valign='top'><td>Setoran awal </td><td>:</td><td><B>Rp. ".number_format($rsData->setoran_awal,2,',','.')."</B></td></tr>";		
		echo "<tr valign='top'><td>Setoran Masuk</td><td>:</td><td>".number_format($rsMutasi->debet,2,',','.')."</td></tr>";
		echo "<tr valign='top'><td>Penarikan/Pengembalian</td><td>:</td><td>".number_format($rsMutasi->kredit,2,',','.')."</td></tr>";
		$saldo=($rsData->setoran_awal+$rsMutasi->debet)-$rsMutasi->kredit;
		echo "<tr><td ><b>Saldo Deposit</b></td><td>:</td><td > <b>Rp. ".number_format($saldo,2,',','.')."</b></td></tr>";

		echo "</table>";
		echo "<table border=0 width='100%'>	";
		echo "<tr><td width='50%' align='left'>&nbsp;</td><td align='right'>".$rsLokasi->lokasi.", ".strftime("%d %B %Y", strtotime($rsData->tglBayar))."</td></tr>";
		echo "<tr><td  width='50%' align='left'>&nbsp;</td><td>&nbsp;</td></tr>";
		echo "<tr><td  width='50%' align='left'>&nbsp;</td><td>&nbsp;</td></tr>";
		echo "<tr><td  width='50%' align='left'>Jumlah Rp. <B>".number_format($rsData->jumlah,0,',','.')."</B></td><td align='right'>(".$this->session->userdata('auth')->USERNAME.")</td></tr>";	
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
	$param=$jns_sewa."_1_".$id_depo."_".$id_kuit;
?>

<br>
<div class="row" style="text-align:center">
	<div class="col-md-12">	<input type="hidden" name="param" id="param" value="<?=$param?>">
		<!-- <button  id="btToExcel" class="btn btn-success" >Cetak Xls</button>&nbsp; -->
		<a href="<?=base_url("rpt_pembayaran/printDepoReceipt/".$jns_sewa."_1_".$id_depo."_".$id_kuit)?>" class="btn btn-success">Cetak/Download</a><br>		
	</div>
</div>	
<?}?>
