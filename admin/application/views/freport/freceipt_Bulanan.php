
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<!-- <li><?=$str."<br>".strlen($res->bln)."#".$mm_tglmulai?></li> -->
	<li>Untuk mencetak klik link/icon cetak pada masing-masing data pembayaran</li>	
	</ul>
</div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_bln"));?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title smaller">Informasi Pembayaran Penghuni</h4>
	</div><!-- widget-header -->
<div class="row">
	<div class="col-md-8" >
<table class="table table-striped table-bordered table-hover" width="60%">
<tbody>
<tr>
<td >Data Penyewa</td>
<td ><b><?php echo $resDaftar->idpendaftaran.' - '.$resDaftar->nama."<br>".$resDaftar->alamat_asal?></b></td>
</tr>
<tr>
<td >Sewa Kamar</td>
<td ><?php echo $resDaftar->labelkamar?></td>
</tr>
<tr>
<td >Tanggal Mulai Inap</td>
<td ><?php echo $resDaftar->tglmulai?></td>
</tr>
<tr bgcolor="#a7a7a7"><th colspan=2>Detil Tagihan : </th></tr>
<tr><td >Tarif Kamar</td><td>Rp. <?=number_format($resDaftar->tarifbulanan,2,',','.')?>/Bulan</td></tr>
<?	
		 
		$jumlah=$resDaftar->tarifbulanan;
		$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from detildaftar d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='$noreg'";
		$query=$this->db->query($sBiaya)->result();
		$idxbiaya=1;
		foreach($query as $row){
				echo "<tr><td >".$row->jenisbiaya."</td><td >Rp. ".number_format($row->tarif,2,',','.')."</td></tr>";
				$jumlah+=$row->tarif;
				$idxbiaya++;
		}
			$jumlah-=$resDaftar->diskon;
		?>	
<tr><td >Diskon</td><td><?php echo "Rp. (".number_format($resDaftar->diskon,2,',','.').")"?></td></tr>
<tr bgcolor="#a7a7a7"><th bgcolor="#a7a7a7">Total</th><th bgcolor="#a7a7a7"><?php echo "Rp. ".number_format($jumlah,2,',','.')?></th></tr>
</tbody>
</table>
	</div>
</div>
<table class="table table-striped table-bordered table-hover">
<tbody>
<tr ><th colspan=8 bgcolor="#a7a7a7">Daftar data pembayaran yang tersimpan</th></tr>
<tr><th>Periode</th><th >No. Kuitansi</th><th >Tgl Bayar</th><th>Metode</th><th>Jml Bayar</th><th>Kwh Akhir</th><th>Cetak ?</th></tr>
<?	foreach( $resBayar as $rsMaster){
		$strDetil="select * from bayar_bulanan_detil where idpendaftaran='".$rsMaster->idPendaftaran."' and pembayaran_ke=".$rsMaster->pembayaran_ke; //edit sini
		$resDetil=$this->db->query($strDetil)->result();
		foreach( $resDetil as $row){	
			echo "<tr>";
			echo "<td>".$row->thnbln_tagihan."</td>";
			//echo "<td>".$row->pembayaran_ke."</td>";
			echo "<td>".$row->no_urut."</td>";
			echo "<td>".$row->tglBayar."</td>";
			echo "<td>".$row->metode_bayar."</td>";
			echo "<td>".$row->jmlBayar."</td>";
			echo "<td>".$rsMaster->kwh_akhir."</td>";
			echo '<td><a href="'.base_url('rpt_pembayaran/printReceipt/'.$jenis.'_1_'.$noreg.'_'.$row->thnbln_tagihan.'_'.$row->no_urut).'"><i class=" glyphicon glyphicon-print" title="Cetak Kuitansi ?"></i></a></td>';
			echo "</tr>";
		}
	}

?>
</tbody>
</table>

</div><!-- widget-box -->


<?php echo form_close();?>
<script type="text/javascript">

</script>
