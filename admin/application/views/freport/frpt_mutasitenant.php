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
		echo '<a href="'.base_url("rpt_pendaftaran/result_mutasi/1_".$jenisLap."_".$myOpsi."_".$status."_".$lokasi."_".$jenisSewa."_".$thn."_".$bln).'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	
	
	echo "<table class='".($display=="0"?"table table-bordered table-hover":"mytable")."'>"; 
	
	echo "<tr><tH>NO</tH><tH>ID REGISTRASI</tH><tH>NAMA PENGHUNI</tH><TH>KAMAR HUNI</TH><TH>PERIODE SEWA</TH><TH>JENIS SEWA</TH><th>STATUS</tH><tH>TANGGAL CHECK OUT</TH></tr>";
	if (sizeof($res )>0){
	$i=1;		
		foreach ( $res as $row){
				echo "<tr>";
				echo "<td>$i</td>";				
				echo "<td>".$row->idpendaftaran."</td>";				
				echo "<td>".$row->nama."</td>";
				echo "<td>".str_replace(' ','&nbsp;', $row->labelkamar)."</td>";				
				echo "<td>".($row->jenissewa=='Bulanan'? date('d F', strtotime($row->periodesewa)) : $row->periodesewa)."</td>";
				echo "<td>".$row->jenissewa."</td>";
				echo "<td>".($row->status==1?"Check Out":"Check In")."</td>";
				echo "<td>".$row->tglcheckout."</td>";				
				echo "</tr>";
				$i++;
				
			}
	echo "</table>";
	}else{
		echo "<tr  ><td colspan=8 align=center><b>Data tidak ditemukan	</b></td></tr>";
	}
 
 //if ($display==0){
//	$param="1_".$jenisLap."_".$myOpsi."_".$status."_".$lokasi."_".$jenisSewa."_".$thn."_".$bln;
?>
</div>
</div>	
</div>
</div>	
<br>
<!--<div class="row" style="text-align:center">
	<div class="col-md-12">	<input type="hidden" name="param" id="param" value="<?=$param?>">
		 <button  id="btToExcel" class="btn btn-success" >Cetak Xls</button>&nbsp; 
		<a href="<?=base_url("rpt_pendaftaran/result_mutasi/1_".$jenisLap."_".$myOpsi."_".$status."_".$lokasi."_".$jenisSewa."_".$thn."_".$bln)?>" class="btn btn-success">Cetak/Download</a><br>		
	</div>
</div>	-->
<?	//}?>
<script>

</script>