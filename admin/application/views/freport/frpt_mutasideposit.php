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
		echo '<a href="'.base_url("rpt_pembayaran/result_mutasi/1_".$jenisLap."_".$myOpsi."_".$status."_".$lokasi."_".$jenisSewa."_".$thn."_".$bln).'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	
	
	echo "<table class='".($display=="0"?"table table-bordered table-hover":"mytable")."'>"; 
	
	echo "<tr><tH>NO</tH><tH>ID REGISTRASI</tH><tH width='15%'>NAMA PENGHUNI</tH><TH>KAMAR HUNI</TH><TH>PERIODE SEWA</TH><TH>JENIS SEWA</TH><th>AWAL</tH><th>SETORAN</tH><tH>PENGEMBALIAN</TH><tH>SALDO</TH></tr>";
	if (sizeof($res )>0){
	$i=1;		
		foreach ( $res as $row){
				//jumlah mutasi debet - kredit
				$strawal="SELECT ifnull(jumlah,0) jml FROM deposit_detil
					where isfirstdepo=1 and deposit_id=(select id from deposit_master where idpendaftaran='".$row->idpendaftaran."')";
				$sqlAwal=$this->db->query($strawal);
				$jmlawal=0;$debet=0;$kredit=0;
				if ($sqlAwal->num_rows>0){
					$rsAwal=$sqlAwal->row();
					$jmlawal=$rsAwal->jml;
				}

				$strmutasi="SELECT 			    
					    ifnull(SUM(CASE WHEN tipe = 'SETORAN' THEN jumlah ELSE 0 END),0) AS debet,
					    ifnull(SUM(CASE WHEN tipe = 'PENARIKAN' THEN jumlah ELSE 0 END),0) AS kredit
					FROM 
					    deposit_detil
					where isfirstdepo<=0 and deposit_id=(select id from deposit_master where idpendaftaran='".$row->idpendaftaran."')";
				$sqlMutasi=$this->db->query($strmutasi);				
				if ($sqlMutasi->num_rows>0){
					$rsMutasi=$sqlMutasi->row();
					$debet=$rsMutasi->debet;
					$kredit=$rsMutasi->kredit;
				}
				
				echo "<tr>";
				echo "<td>$i</td>";				
				echo "<td>".$row->idpendaftaran."</td>";				
				echo "<td>".$row->nama."</td>";
				echo "<td>".str_replace(' ','&nbsp;', $row->labelkamar)."</td>";				
				echo "<td>".($row->jenissewa=='Bulanan'? date('d F ', strtotime($row->periodesewa)) : $row->periodesewa)."</td>";
				echo "<td>".$row->jenissewa."</td>";
				echo "<td>Rp. ".number_format($jmlawal,2,',','.')."</td>";
				echo "<td>Rp. ".number_format($debet,2,',','.')."</td>";
				echo "<td>Rp. ".number_format($kredit,2,',','.')."</td>";
				echo "<td>Rp. ".number_format( ($jmlawal+$debet)-$kredit,2,',','.')."</td>";
				//echo "<td>".($row->status==1?"Check Out":"Check In")."</td>";
				
				echo "</tr>";
				$i++;
				
			}
	echo "</table>";
	}else{
		echo "<tr  ><td colspan=8 align=center><b>Data tidak ditemukan	</b></td></tr>";
	}
 
 //if ($display==0){
	//$param="1_".$jenisLap."_".$myOpsi."_".$status."_".$lokasi."_".$jenisSewa."_".$thn."_".$bln;
?>
</div>
</div>	
</div>
</div>	
<br>
<!-- <div class="row" style="text-align:center">
	<div class="col-md-12">	<input type="hidden" name="param" id="param" value="<?=$param?>">
		
		<a href="<?=base_url("rpt_pembayaran/result_mutasi/1_".$jenisLap."_".$myOpsi."_".$status."_".$lokasi."_".$jenisSewa."_".$thn."_".$bln)?>" class="btn btn-success">Cetak/Download</a><br>		
	</div>
</div>	-->
<?	// }?>
