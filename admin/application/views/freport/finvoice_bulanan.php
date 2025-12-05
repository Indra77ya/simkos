<? // NOTES utk image kuitansi cetak pdf, dompdf tidak bisa generate image dengan base_url, tp langsung url 
	$rscompro=$this->db->query("select logo from owner where id=1")->row();	
	//for ($i=0; $i<2; $i++){ ?>
<div class="row" style="background-image: url('assets/images/kuitansi.png');background-repeat: no-repeat; background-size: 680px 250px;background-attachment: fixed;">
 <div class="widget-box " style=" border:1px solid #000;">
 <div class="widget-header"> 
<table border="0"><tr valign="bottom">
<td><img src="assets/images/logo/<?php echo ($rscompro->logo ==""?"none.gif":$rscompro->logo);?>"  width="40" height="40" style="float:left; vertical-align:middle; margin-right:5px;">
</td>
<td><b><?php echo strtoupper($this->session->userdata('labelling')->nama)."<br>".$this->session->userdata('labelling')->alamat_usaha?></b></td>
</tr></table>
</div>
 <div class="widget-body "  >
<?	
	$untuk="";$label="";$tagihan=0;$tglmulai="";$tglakhir="";
	$rsKota=$this->db->query("select nama_kota from kuitansi_var where id=1")->row();
	$res_kwh_master = $this->db->query("select * from kwh_var where id=1")->row();
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
		echo "<div class='kwitNo'>No. Invoice :&nbsp;<U>".($jns_sewa=="Bulanan"?$rsData->idpendaftaran.$rsData->thnbln_tagihan:$rsData->idpendaftaran.$rsData->nourut)."</U></div>";
		echo "<table border=0 cellpadding=0 cellspacing=0  ><tr valign='top'><td>";
		echo "<div class='leftBar'>";
		echo "<fieldset>";
		echo "<legend>INVOICE</legend>";
		echo "<table  border=0 >	";
		echo "<tr colspan=3><td>Tanggal</td><td>:</td><td> ".strftime("%d %B %Y", strtotime(date('d-m-Y')))."</td></tr>";
		echo "<tr ><td>Kepada</td><td>:</td><td><B>".$rsData->nama."</B></td></tr>";
		echo "<tr ><td>Perihal</td><td>:</td><td><B>Surat Tagihan/Invoice</B></td></tr>";	
		echo "<tr ><td>Kamar</td><td>:</td><td><B>".$rsKamar->LABELKAMAR."</B></td></tr>";
		echo "</table>";
		echo "<div style='text-alignment:center'><table  class='mydata' width='80%'>	";
		echo "<tr ><td colspan =3 ><b>DETIL ITEM TAGIHAN</B></td></tr>";	
		echo "<tr ><td>No</td><td>Item Tagihan</td><td>Jumlah</td></tr>";
		$strtagihan="";$jumlah=0;
		switch($jns_sewa){
			case "Bulanan": 
				$strtagihan.="Rp. ".number_format($rsKamar->TARIFBULANAN,2,',','.');
				$jumlah=$rsKamar->TARIFBULANAN;
				break;
			case "Mingguan": 
				$strtagihan.=$rsData->jmlminggu." minggu x "."(".$rsKamar->TARIFMINGGUAN." - ".$rsData->diskon.") = Rp. ".number_format(($rsData->jmlminggu * ($rsKamar->TARIFMINGGUAN - $rsData->diskon)),2,',','.')."";
				$jumlah=$rsData->jmlminggu * ($rsKamar->TARIFMINGGUAN - $rsData->diskon);
				break;
			case "Harian": 
				$strtagihan.=$rsData->jmlhari." hari x "."(".$rsKamar->TARIFHARIAN." - ".$rsData->diskon.") = Rp. ".number_format(($rsData->jmlhari * ($rsKamar->TARIFHARIAN - $rsData->diskon)),2,',','.')."";
				$jumlah=$rsData->jmlhari * ($rsKamar->TARIFHARIAN - $rsData->diskon);
				break;
		}
		echo "<tr ><td>1</td><td>Tarif sewa</td><td>".$strtagihan."</td></tr>";
		$idxbiaya=2;
		if ($jns_sewa=="Bulanan" || $jns_sewa=="Mingguan"){
			$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from ".($jns_sewa=="Bulanan"?"detildaftar":"detildaftar_mingguan")." d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='".$rsData->idpendaftaran."'";
			$query=$this->db->query($sBiaya)->result();
			
			if (sizeof($query)>0){
				foreach($query as $row){
						echo "<tr><td>".$idxbiaya."</td><td >".$row->jenisbiaya."</td><td >Rp. ".number_format($row->tarif,2,',','.')."</td></tr>";
						$jumlah+=$row->tarif;
						$idxbiaya++;
				}
			}

			if ($jns_sewa=="Bulanan"){
				//bayar kwh
				$bayar_kwh=$rsData->kwh_terpakai*$rsData->tarif_per_kwh;
				if ($rsData->kwh_terpakai > 0){
					echo "<tr><td>".$idxbiaya."</td><td >Bayar Kwh </td><td > Rp. ".number_format($bayar_kwh,2,',','.')." (Pemakaian Listrik : ".$rsData->kwh_terpakai." Kwh)</td></tr>";
					$jumlah+=$bayar_kwh;
				}
				$idxbiaya++;
				//denda
				if ($rsData->denda>0){
					echo "<tr><td>".$idxbiaya."</td><td >Denda</td><td >  Rp. ".number_format($rsData->denda,2,',','.')."</td></tr>";
					$jumlah+=$rsData->denda;
				}
				$idxbiaya++;
				if ($rsData->pengurangan_denda>0){
					echo "<tr><td>".$idxbiaya."</td><td >Pengurangan Denda</td><td > - Rp. ".number_format($rsData->pengurangan_denda,2,',','.')."</td></tr>";
					$jumlah-=$rsData->pengurangan_denda;
				}
				$idxbiaya++;
				if ($rsData->diskon>0){
					echo "<tr><td>".$idxbiaya."</td><td >Diskon Tarif Kamar</td><td > - Rp. ".number_format($rsData->diskon,2,',','.')."</td></tr>";
					$jumlah-=$rsData->diskon;
				}
			}

			
		}

		echo "<tr><td colspan=2><b>Total</b> :</td><td > <b>Rp. ".number_format($jumlah,2,',','.')."</b></td></tr>";

		echo "</table></div>";
		echo "<table border=0 width='100%'>	";
		echo "<tr><td width='50%' align='left'>&nbsp;</td><td align='right'>".$rsKota->nama_kota.", ".strftime("%d %B %Y", strtotime(date('d-m-Y')))."</td></tr>";
		echo "<tr><td  width='50%' align='left'>&nbsp;</td><td>&nbsp;</td></tr>";
		echo "<tr><td  width='50%' align='left'>&nbsp;</td><td>&nbsp;</td></tr>";
		echo "<tr><td  width='50%' align='left'>Jumlah Tagihan Rp. <B>".number_format($jumlah,0,',','.')."</B></td><td align='right'>(".$this->session->userdata('auth')->USERNAME.")</td></tr>";	
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
<?	// }

