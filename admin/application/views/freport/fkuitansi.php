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
		echo '<a href="'.base_url("rpt_pembayaran/printReceipt/".$jns_sewa."_1_".$noreg."_".$param_4).'" title="Generate to pdf"><img src="assets/images/logo/<?php echo ($rscompro->logo ==""?"none.gif":$rscompro->logo);?>" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	$untuk="";$label="";$tagihan=0;$tglmulai="";$tglakhir="";
	$rsKota=$this->db->query("select nama_kota from kuitansi_var where id=1")->row();
	switch ($jns_sewa){
		case "Tahunan":
			$thn=$thnbln;
			$dt=strtotime($rsData->tgldaftar);
			$tmp=date('Y-m-d', strtotime('+1 years', $dt));
			$dt2=strtotime($tmp);
			$nextDate=date('Y-m-d', strtotime('-1 day', $dt2));
			$untuk=" periode tahun ".$thn." mulai ".strftime("%d %B %Y",strtotime($rsData->tgldaftar))." sampai dengan ".strftime("%d %B %Y",strtotime($nextDate));
			break;
		case "Bulanan": //2019-05-07
			$bln=substr($thnbln, 4,2);
			$tglTagihan=strtotime(substr($thnbln,0,4)."-".$bln."-".substr($rsData->tglmulai, 8,2));
			$tmp=date('Y-m-d', strtotime('+1 months', $tglTagihan));
			$dt=strtotime($tmp);
			$nextDate=date('Y-m-d', strtotime('-1 day', $dt));
			$untuk=" periode ".strftime("%d %B %Y",strtotime(date('Y-m-d',$tglTagihan)))." sampai dengan ".strftime("%d %B %Y",strtotime($nextDate));
			break;
		case "Mingguan":
			$untuk=" selama ".$rsData->jmlminggu." minggu mulai ".strftime("%d %B %Y",strtotime($rsData->tglmulai))." sampai dengan ".strftime("%d %B %Y",strtotime($rsData->tglakhir));
			break;
		case "Harian":
			$untuk=" selama ".$rsData->jmlhari." hari mulai ".strftime("%d %B %Y",strtotime($rsData->tglcek_in))." sampai dengan ".strftime("%d %B %Y",strtotime($rsData->tglcek_out));
		break;

	}

		echo '<div class="row"><div class="col-md-6">';
		if ($jns_sewa=="Bulanan"){
			$bln=substr($thnbln, 4,2);
		}
		echo "<div class='kwitNo'>No. Kuitansi :&nbsp;<U>".($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"?$rsData->no_urut:$rsData->idpendaftaran.$rsData->nourut)."</U></div>";
		echo "<table border=0 cellpadding=0 cellspacing=0  ><tr valign='top'><td>";
		echo "<div class='leftBar'>";
		echo "<fieldset>";
		echo "<legend>Kuitansi Pembayaran</legend>";
		echo "<table class='mydata' border=0 width='100%'>	";
		echo "<tr valign='top'><td>Sudah Terima Dari</td><td>:</td><td><B>".$rsData->nama."</B></td></tr>";
		
		echo "<tr valign='top'><td  width='30%'>Banyaknya Uang</td><td width='5%'>:</td><td><B>".strtoupper($terbilang)." RUPIAH</B></td></tr>";
		echo "<tr valign='top'><td>Untuk Pembayaran</td><td>:</td><td><B>Sewa Kost ".$jns_sewa." ".$untuk." </B></td></tr>";
		echo "<tr valign='top'><td colspan =3 ><b>DETIL TAGIHAN</B></td></tr>";
		echo "<tr valign='top'><td>Kamar</td><td>:</td><td><B>".$rsKamar->LABELKAMAR."</B></td></tr>";
		$strtagihan="";$jumlah=0;
		switch($jns_sewa){
			case "Tahunan": 
				$strtagihan.="Rp. ".number_format($rsKamar->TARIFTAHUNAN,2,',','.');
				$jumlah=$rsKamar->TARIFTAHUNAN;
				break;
			case "Bulanan": 
				$strtagihan.="Rp. ".number_format($rsKamar->TARIFBULANAN,2,',','.');
				$jumlah=$rsKamar->TARIFBULANAN;
				break;
			case "Mingguan": 
				$strtagihan.=$rsData->jmlminggu." minggu x "."(".$rsKamar->TARIFMINGGUAN." - ".$rsData->diskon.") = Rp. ".number_format(($rsData->jmlminggu * ($rsKamar->TARIFMINGGUAN - $rsData->diskon)),2,',','.')."";
				$jumlah=$rsData->jmlminggu * ($rsKamar->TARIFMINGGUAN - $rsData->diskon);
				break;
			case "Harian": 
			    $jumlah=$rsData->jmlhari * ($rsKamar->TARIFHARIAN - $rsData->diskon);
				$strtagihan.=$rsData->jmlhari." hari x "."(".$rsKamar->TARIFHARIAN." - ".$rsData->diskon.") = Rp. ".number_format($jumlah,2,',','.')."";
				
				break;
		}
		echo "<tr valign='top'><td>Tarif sewa</td><td>:</td><td>".$strtagihan."</td></tr>";
		if ($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"  || $jns_sewa=="Mingguan"){
			$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from ".($jns_sewa=="Bulanan"?"detildaftar":($jns_sewa=="Tahunan"?"detildaftar_tahunan":"detildaftar_mingguan" ) )." d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='".$rsData->idpendaftaran."'";
			$query=$this->db->query($sBiaya)->result();
			//$idxbiaya=1;
			if (sizeof($query)>0){
				foreach($query as $row){
						echo "<tr><td >".$row->jenisbiaya."</td><td>:</td><td >Rp. ".number_format($row->tarif,2,',','.')."</td></tr>";
						$jumlah+=$row->tarif;
						//$idxbiaya++;
				}
			}

			if ($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan" ){
				if ($jns_sewa=="Bulanan" ){
					//bayar kwh
					$bayar_kwh=($rsData->jmlbayar - ($jumlah + $rsData->denda ));
					if ($bayar_kwh > 0){
						echo "<tr><td >Bayar Kwh </td><td>:</td><td > Rp. ".number_format($bayar_kwh,2,',','.')."</td></tr>";
						$jumlah+=$bayar_kwh;
					}
				}
				//denda
				if ($rsData->denda>0){
					echo "<tr><td >Denda</td><td>:</td><td >  Rp. ".number_format($rsData->denda,2,',','.')."</td></tr>";
					$jumlah+=($rsData->denda);
				}
				
				if ($rsData->pengurangan_denda>0){
					echo "<tr><td >Pengurangan Denda</td><td>:</td><td >  Rp. ".number_format($rsData->pengurangan_denda,2,',','.')."</td></tr>";
					$jumlah-=$rsData->pengurangan_denda;
				}
				if ($rsData->diskon>0){
					echo "<tr><td >Diskon Tarif Kamar</td><td>:</td><td > - Rp. ".number_format($rsData->diskon,2,',','.')."</td></tr>";
					$jumlah-=$rsData->diskon;
				}
			}

			
		}

		echo "<tr><td ><b>Total</b></td><td>:</td><td > <b>Rp. ".number_format($jumlah,2,',','.')."</b></td></tr>";

		echo "</table>";
		echo "<table border=0 width='100%'>	";
		echo "<tr><td width='50%' align='left'>&nbsp;</td><td align='right'>".$rsLokasi->lokasi.", ".strftime("%d %B %Y", strtotime($rsData->tglbayar))."</td></tr>";
		echo "<tr><td  width='50%' align='left'>&nbsp;</td><td>&nbsp;</td></tr>";
		echo "<tr><td  width='50%' align='left'>&nbsp;</td><td>&nbsp;</td></tr>";
		echo "<tr><td  width='50%' align='left'>Jumlah Rp. <B>".number_format($rsData->jmlbayar,0,',','.')."</B></td><td align='right'>(".$this->session->userdata('auth')->USERNAME.")</td></tr>";	
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
		<a href="<?=base_url("rpt_pembayaran/printReceipt/".$jns_sewa."_1_".$noreg."_".$param_4)?>" class="btn btn-success">Cetak/Download</a><br>		
	</div>
</div>	
<?}?>
