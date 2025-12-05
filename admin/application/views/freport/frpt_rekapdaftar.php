<div class="row">
<div class="col-md-12">
 <div class="widget-box">
 <div class="widget-header">
<h4 class="smaller">
<?php echo $title?>
</h4>
</div>
 <div class="widget-body">
 <div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<li>Laporan Pendaftaran  <?php echo "[ ".$reslokasi->kode_kost." ] ".strtoupper($reslokasi->lokasi)?> yang terjadi selama periode <?php echo $arrBulan[$bln]." ".$thn?></li>		
	</ul>
</div>
<?	if ($display=="0"){
		echo '<a href="'.base_url("rpt_pendaftaran/result_rekap/".$jenis."_".$thn."_".$bln."_".$lokasi."_1_".$orderby).'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	
	
	echo "<table class='".($display=="0"?"table table-bordered table-hover":"mytable")."'>"; 
	
	echo "<tr><tH>NO</tH><TH>KAMAR HUNI</TH><tH>PENGHUNI</tH><TH>ALAMAT</TH><TH>NO. TELP</TH><th>TGL CHECK IN</tH>".($jenis=="Bulanan"?"<th>KWH AWAL</th><th>DEPOSIT</th>":($jenis=="Tahunan"?"<th>DEPOSIT</th>":"<TH>LAMA ".$lama."</TH>" ))."</tr>";
	if (sizeof($res )>0){
	$i=1;
		
		foreach ( $res as $row){
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".str_replace(' ','&nbsp;', $row->labelkamar)."</td>";
				// "<td>[".$row->idPendaftaran."] ".$row->nama."</td>";				
				echo "<td>".$row->nama."<br>[".$row->idPendaftaran."] ";
				if ($jenis=="Bulanan" || $jenis=="Tahunan"){
					echo '<br><img id="imgFoto" name="imgFoto" src="'.base_url("assets/images/".($row->foto==""?"placeholder/none.gif":"foto/".$row->foto)).'" width="130" height="150">';	
				}
				echo "</td>";
				echo "<td>".$row->alamat_asal."</td>";
				echo "<td>".$row->Telp."</td>";				
				echo "<td>".($jenis=="Harian"?$row->tglCek_in:$row->tglMulai)."</td>";
				if ($jenis=="Bulanan"){
					echo "<td>".$row->kwh_awal."</td>";
					echo "<td>Rp. ".number_format($row->deposit,2,',','.')."</td>";
				}elseif($jenis=="Tahunan"){
					echo "<td>Rp. ".number_format($row->deposit,2,',','.')."</td>";
				}else{
					echo "<td>".$row->lama."</td>";
				}	
				
								
				echo "</tr>";
				$i++;
				
			}
	echo "</table>";
	}else{
		echo "<tr  ><td colspan=8 align=center><b>Tidak Ada Penghuni Baru Bulan ini	</b></td></tr>";
	}
 
 if ($display==0){
	$param=$jenis."_".$thn."_".$bln."_".$lokasi."_1_".$orderby;
?>
</div>
</div>	
</div>
</div>	
<br>
<div class="row" style="text-align:center">
	<div class="col-md-12">	<input type="hidden" name="param" id="param" value="<?=$param?>">
		<!-- <button  id="btToExcel" class="btn btn-success" >Cetak Xls</button>&nbsp; -->
		<a href="<?=base_url("rpt_pendaftaran/result_rekap/".$jenis."_".$thn."_".$bln."_".$lokasi."_1_".$orderby)?>" class="btn btn-success">Cetak/Download</a><br>		
	</div>
</div>	
<?}?>
<script>

</script>