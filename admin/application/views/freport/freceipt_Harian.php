<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<li>Untuk mencetak klik link/icon cetak pada masing-masing data pembayaran</li>		
	</ul>
</div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myformByr_harian"));?>
<?	
$cek = $this->db->query("SELECT COUNT(*) cek FROM bayar_harian_master WHERE nopendaftaran='$noreg'")->row();
$jumlahTagihan=($resDaftar->lama * ($resDaftar->tarifharian - $resDaftar->diskon));
//pembayaran baru belum ada pembayaran sebelumnya
$jmlBayar=0;$sisa=0;$kembalian=0;$status="Belum Lunas";
	if ($cek->cek >=1){	//proses edit, atau pembayaran belum lunas
		$rs=$this->db->query("SELECT * FROM bayar_harian_master WHERE nopendaftaran='$noreg'")->row();
		$jmlBayar=$rs->jmlBayar;
		$status=($jmlBayar<$jumlahTagihan?"Belum Lunas":"Lunas");
		//$namaKamarLama=$rs->namaKamar;		
		$jumlahTagihan=$jumlahTagihan-$jmlBayar;
		$sisa=0;
		$kembalian=0;

	}
?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title smaller">Form View Pembayaran Tagihan</h4>
	</div><!-- widget-header -->
<div class="row">
	<div class="col-md-8" >
<table class="table table-striped table-bordered table-hover" width="60%">
<tbody>
<tr>
<td >Data Penyewa</td>
<td colspan=3 ><b><?php echo $resDaftar->idpendaftaran.' - '.$resDaftar->nama."<br>".$resDaftar->alamat_asal?></b></td>
</tr>
<tr>
<td >Sewa Kamar</td>
<td  colspan=3><?php echo $resDaftar->labelkamar;?></td>
</tr>	
<tr>
<td >Tgl Check-In</td>
<td><input type="hidden" name="tglCekIn" value="<?php echo $resDaftar->tglcek_in?>" /><B><?php echo $resDaftar->tglcek_in?></B></td>	
<td align=right>Tgl Check-Out</td>
<td><input type="hidden" name="tglCekOut" value="<?php echo $resDaftar->tglcek_out?>" /><b><?php echo $resDaftar->tglcek_out?></b></td></tr> 
<tr valign=top>
<td >Jumlah Tagihan Total</td>
<td colspan=3><input type="hidden" name="lama" id="lama" value="<?php echo $resDaftar->lama?>" />
<?php echo $resDaftar->lama." Hari x ( Rp. ".number_format($resDaftar->tarifharian,2,',','.')." - Diskon Rp. ".number_format($resDaftar->diskon,2,',','.')." )  = <b>Rp. ".number_format(($resDaftar->lama*($resDaftar->tarifharian-$resDaftar->diskon)),2,',','.')."</b>"; ?>


</td></tr>	
</tbody>
</table>
<table class="table table-striped table-bordered table-hover" width="60%">
<tbody>
<tr><th>No Urut</th><th>Tgl Bayar</th> <th>Jumlah Bayar</th><th>Cara Bayar</th><th>Cetak ?</th></tr>

<?	foreach( $resBayar as $row){
		echo "<tr>";
		echo "<td>".$row->noUrut."</td>";
		echo "<td>".$row->tglBayar."</td>";
		echo "<td>".$row->jmlBayar."</td>";
		echo "<td>".$row->metode_bayar."</td>";
		echo '<td><a href="'.base_url('rpt_pembayaran/printReceipt/'.$jenis.'_1_'.$noreg.'_'.$row->noUrut).'"><i class=" glyphicon glyphicon-print" title="Cetak Kuitansi ?"></i></a></td>';
		echo "</tr>";
	}

?>
</table>
	</div>
</div>


</div><!-- widget-box -->

<?php echo form_close();?>
<script type="text/javascript">


</script>
