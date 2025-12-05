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
		echo '<a href="'.base_url("rpt_pembayaran/result/bayarrekap_".$thn."_".$bln."_".$jns_sewa."_".$lokasi."_1_".$orderby).'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	echo "<br>";

	//echo $str;
	echo "<table class='".($display=="0"?"table table-bordered table-hover":"mytable")."'>"; 	
	
	echo "<tr><tH>NO</tH><tH>KAMAR</tH><tH>PENGHUNI</tH>".($jns_sewa=="Bulanan"?"<th>BAYAR KE</th><th>PERIODE</th>":($jns_sewa=="Tahunan"?"<th>PERIODE</th>":"")).($jns_sewa<>"Bulanan" && $jns_sewa<>"Tahunan"?"<tH>METODE BAYAR</tH><tH>TGL BAYAR</tH>":"").($jns_sewa=="Bulanan"?"<th>PENDAPATAN KOST*</th><th>LISTRIK</th>":($jns_sewa=="Tahunan"?"<th>PENDAPATAN KOST*</th>":""))."<th>JUMLAH BAYAR</th></tr>";
	$jumlah=0;
	$i=1;
		$jmlKost=0;
		$jmlListrik=0;
		$res_kwh_master = $this->db->query("select * from kwh_var where id=1")->row();
		foreach ( $res as $row){
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row->labelkamar."</td>";
				echo "<td>[".$row->idPendaftaran."] ".$row->nama."</td>";				
				if ($jns_sewa=="Bulanan"){
					echo "<td>".$row->pembayaran_ke."</td>";
					echo "<td>".$row->thnbln_tagihan."</td>";
				}
				if ($jns_sewa=="Tahunan"){
					echo "<td>".$row->tahun_tagihan."</td>";
				}
				if ($jns_sewa<>"Bulanan" && $jns_sewa<>"Tahunan"){
					echo "<td>".$row->metode_bayar."</td>";
					echo "<td>".$row->tglbayar."</td>";
				}
				$tambahan=0;$listrik=0;$pendapatanKost=0;
				if ($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"){
					//hitung kost - listrik
					//get biaya tambahan bulanan
					$strBiaya="SELECT d.`idPendaftaran`, IFNULL(COUNT(b.id),0) cnt, IFNULL(SUM(b.tarif),0) nominal FROM detildaftar d, biaya_tambahan b WHERE d.idbiaya=b.id and d.idpendaftaran='".$row->idPendaftaran."' GROUP BY d.`idPendaftaran`";
					$rsBiaya=$this->db->query($strBiaya)->row();
					$tambahan=(sizeof($rsBiaya)<=0 || empty($rsBiaya->nominal) ? 0: $rsBiaya->nominal);
					//$listrik = $row->jmlBayar - ($row->denda - $row->pengurangan_denda) - ($row->tarifbulanan - $row->diskon) - $tambahan ;
					
					if ($jns_sewa=="Bulanan"){
						$listrik = ($row->kwh_terpakai -  $res_kwh_master->kwh_tdk_kena_tarif) * $res_kwh_master->kwh_tarif;
						$pendapatanKost=$row->jmlBayar - $listrik;
					}else{
						$pendapatanKost=$row->jmlBayar;
					}

					$strku=$row->jmlBayar."#".$tambahan."#".$row->denda."#".$row->pengurangan_denda."#".$row->tarifbulanan."#".$row->diskon;
					
					echo "<td>Rp. ".number_format($pendapatanKost,2,',','.')."</td>";
					if ($jns_sewa=="Bulanan"){
						echo "<td>Rp. ".number_format($listrik,2,',','.')."</td>";
					}
					$jmlKost+=$pendapatanKost;
					$jmlListrik+=$listrik;

				}
				echo "<td ALIGN=RIGHT>Rp. ".number_format($row->jmlBayar,2,',','.')."</td>";
				//echo "<td>".$row->sts."</td>";
								
				echo "</tr>";
				$i++;
				$jumlah+=$row->jmlBayar;

				//row detil
			}
			//$total=$jmlHari;
	//echo "<tr><th ".($jns_sewa=="Bulanan"?"colspan=5":"colspan=3")." align=right>JUMLAH </th><TH stye='text-align:right;'>Rp. ".number_format($jmlKost,2,',','.')."</TH> <TH stye='text-align:right;'>Rp. ".number_format($jmlListrik,2,',','.')."</TH> <TH stye='text-align:right;'>Rp. ".number_format($jumlah,2,',','.')."</TH> </tr>";
	echo "<tr><th ".($jns_sewa=="Tahunan"?"colspan=4":"colspan=5")." align=right>JUMLAH</th>";
	echo ($jns_sewa=="Harian"||$jns_sewa=="Mingguan"?"":"<TH stye='text-align:right;'>Rp. ".number_format($jmlKost,2,',','.')."</TH> ");
	echo ($jns_sewa=="Bulanan"?"<TH stye='text-align:right;'>Rp. ".number_format($jmlListrik,2,',','.')."</TH> ":"");
	echo "<TH stye='text-align:right;'> Rp. ".number_format($jumlah,2,',','.')."</TH> </tr>";
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
		<a href="<?=base_url("rpt_pembayaran/result/bayarrekap_".$thn."_".$bln."_".$jns_sewa."_".$lokasi."_1_".$orderby)?>" class="btn btn-success">Cetak/Download</a><br>		
	</div>
</div>	
<?}
