<div class="row">
<div class="col-md-12">
 <div class="widget-box">
 <div class="widget-header">
<h4 class="smaller">
<?php echo $title?>
</h4>
</div>
 <div class="widget-body">
<?	if ($display=="0"){
		echo '<a href="'.base_url("rpt_pembayaran/angsuranResult/angsuran_".$thn."_".$bln."_".$jns_sewa."_".$lokasi."_1_".$orderby).'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	echo "<br>";
	?>
	<!-- <div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Keterangan</strong>
	<ul>
	<li>PENDAPATAN KOST : ( Tarif sewa + biaya tambahan ) - (diskon+listrik)</li>	
	</ul>
</div> -->
	<?
	//echo $str;
	echo "<table class='".($display=="0"?"table table-bordered table-hover":"mytable")."'>"; 	
	
	echo "<tr><tH>NO</tH><tH>KAMAR</tH><tH>PENGHUNI</tH>".($jns_sewa=="Bulanan" ||  $jns_sewa=="Tahunan"?"<th>PERIODE</th>":"")."<th>JUMLAH TAGIHAN</th><th>SUDAH BAYAR</th><th>KURANG</th><th>DETIL</th></tr>";
	$jumlah=0;
	$i=1;
		$jmlKost=0;
		$jmlTagihan=0;$tagihan=0;
		$sumBayar=0;$sumKurang=0;
		$res_kwh_master = $this->db->query("select * from kwh_var where id=1")->row();
		foreach ( $res as $row){
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row->labelkamar."</td>";
				echo "<td>[".$row->idPendaftaran."] ".$row->nama."</td>";				
				if ($jns_sewa=="Bulanan" ){					
					echo "<td>".$row->thnbln_tagihan."</td>";
					$tagihan=$row->jmlTagihan + ($row->tarif_per_kwh * $row->kwh_terpakai);
				}
				if (  $jns_sewa=="Tahunan"){					
					echo "<td>".$row->tahun_tagihan."</td>";
					$tagihan=$row->jmlTagihan;
				}
				if ($jns_sewa<>"Bulanan" &&  $jns_sewa<>"Tahunan"){	
					$tagihan=$row->tarif;
				}
				echo "<td ALIGN=RIGHT>Rp. ".number_format($tagihan,2,',','.')."</td>";
				echo "<td ALIGN=RIGHT>Rp. ".number_format($row->jmlBayar,2,',','.')."</td>";
				echo "<td ALIGN=RIGHT>Rp. ".number_format( $tagihan- $row->jmlBayar,2,',','.')."</td>";
				//echo "<td>".$strDet."</td>";
				$strDet="select * from ".$tdetil." where idlokasi=".$lokasi." and ".($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"?" idpendaftaran ":" nopendaftaran ")." ='".$row->idPendaftaran."'".($jns_sewa=="Bulanan" ?" and pembayaran_ke=".$row->pembayaran_ke:( $jns_sewa=="Tahunan"?" and tahun_tagihan=".$row->tahun_tagihan:""));	
				//echo "<td>".$strDet."</td>";
				$rsDet=$this->db->query($strDet)->result();
				echo "<td>";
				$x=1;
				foreach ( $rsDet as $rowDet){
					echo "Cicilan ke ".$x." [ ".$rowDet->tglBayar."] = Rp.".number_format(  $rowDet->jmlBayar,2,',','.')."<br>";
					$x++;
				}
				echo "</td></tr>";
				$i++;
				$jmlTagihan+=$tagihan;
				$sumBayar+=$row->jmlBayar;
				$sumKurang+=$tagihan - $row->jmlBayar;

				//row detil
				switch ($jns_sewa){
					case "":
						break;
				}


				
			}
			//$total=$jmlHari;
	echo "<tr><th ".($jns_sewa=="Bulanan" ||  $jns_sewa=="Tahunan"?"colspan=4":"colspan=2")." align=right>JUMLAH </th><TH stye='text-align:right;'>Rp. ".number_format($jmlTagihan,2,',','.')."</TH> <TH stye='text-align:right;'>Rp. ".number_format($sumBayar,2,',','.')."</TH> <TH stye='text-align:right;'>Rp. ".number_format($sumKurang,2,',','.')."</TH> <TH ></th> </tr>";
	echo "</table>";
	
 
 
?>
</div>
</div>	
</div>
</div>	
<br>
<? if ($display==0){
	$param="bayarrekap_".$thn."_".$bln."_".$jns_sewa."_".$lokasi."_1_".$orderby; 
?>
<div class="row" style="text-align:center">
	<div class="col-md-12">	<input type="hidden" name="param" id="param" value="<?=$param?>">
		<a href="<?=base_url("rpt_pembayaran/angsuranResult/angsuran_".$thn."_".$bln."_".$jns_sewa."_".$lokasi."_1_".$orderby)?>" class="btn btn-success">Cetak/Download</a><br>		
	</div>
</div>	
<?}
