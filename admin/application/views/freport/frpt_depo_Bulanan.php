<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title smaller">Informasi Mutasi Deposit Penghuni</h4>
	</div><!-- widget-header -->
<div class="row">
	<div class="col-md-8" >
<?	if ($display=="0"){
		echo '<a href="'.base_url("rpt_pembayaran/depo_detail/1_".$noreg).'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}

?>		
<table class="<?php echo ($display=='0'?'table table-bordered table-hover':'mytable') ?>"  width="60%">
<tbody>
<tr>
<td >Lokasi/Cabang Kost </td>
<td ><b><?	echo '<label  class="control-label">'.$lokasi->lokasi.'</label>';?></b></td>
</tr>
<tr><td >Data Penyewa</td>
<td ><b><?php echo $res->idpendaftaran.' - '.$res->nama."<br>".$res->alamat_asal?></b></td>
</tr>
<tr>
<td >Sewa Kamar Bulanan</td>
<td ><?php echo $res->labelkamar?></td>
</tr>
<tr>
<td >Status</td>
<td ><b><?php echo ($res->checkout==0?"Check In":"Check Out")?></b></td>
</tr>
</tbody>
</table>
	</div>
</div>

<table class="<?php echo ($display=='0'?'table table-bordered table-hover':'mytable') ?>" >
<tbody>
<tr ><th colspan=7 bgcolor="#a7a7a7">Daftar Mutasi Deposit</th></tr>
<tr><th>No</th><th >Tipe</th><th >Tgl Bayar</th><th>Metode</th><th>Debet</th><th>Kredit</th><th>Keterangan</th></tr>

<?	
	$strcek="Select * from deposit_detil where deposit_id in (select id from deposit_master where idpendaftaran='".$res->idpendaftaran."' and idlokasi='".$res->idlokasi."' and jenis_sewa='Bulanan')";
	$query = $this->db->query($strcek);
	$cek=$query->num_rows();
	if ($cek<=0){
		echo "<tr><td colspan=7 align=center>Data Mutasi Deposit tidak ada </td></tr>";	
	}else{
		$result=$query->result();
		$i=1; $jumlah=0;
		foreach($result as $rs){
			if ($rs->tipe=='SETORAN'){
				$jumlah+=$rs->jumlah;
			}else{
				$jumlah-=$rs->jumlah;
			}
			echo "<tr>";
			echo "<td>$i</td>";			
			echo "<td>".$rs->tipe."</td>";						
			echo "<td>".$rs->tglBayar."</td>";	
			echo "<td>".$rs->metode_bayar."</td>";					
			echo "<td align=right>".($rs->tipe=='SETORAN'?number_format($rs->jumlah, 2, ',','.'):0)."</td>";						
			echo "<td align=right>".($rs->tipe=='PENARIKAN'?number_format($rs->jumlah, 2, ',','.'):0)."</td>";
			echo "<td>".$rs->deskripsi."</td>";												
			echo "</tr>";
			$i++;
		}
		echo "<tr><td colspan=4 align=left><b>Saldo Akhir</b></td><td colspan=2 align=right><b>Rp. ".number_format($jumlah, 2, ',','.')."</b></td><td ></td></tr>";
	}
?>
</tbody>
</table>

</div><!-- widget-box -->

