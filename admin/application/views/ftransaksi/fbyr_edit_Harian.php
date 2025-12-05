<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<li>Sewa Harian dapat memproses pembayaran dimuka (DP), dan selanjutnya dapat melakukan pelunasan pada halaman yang sama yaitu pada menu entri pembayaran sewa Harian atau pada halaman edit pembayaran ini</li>		
	<li>Karena proses pembayaran bisa dilakukan lebih dari satu kali, maka data pembayaran yang bisa diedit sesuai data yang tersimpan dan yang ditampilkan disini</li>		
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
		<h4 class="widget-title smaller">Form Edit Pembayaran Tagihan</h4>
	</div><!-- widget-header -->
<div class="row">
	<div class="col-md-8" >
<table class="table table-striped table-bordered table-hover" width="60%">
<tbody>
<tr>
<td >Lokasi/Cabang Kost</td>
<td ><b><?				
					echo '<input type="hidden" name="idlokasi" id ="idlokasi" value="'.$lokasi->id.'"/>';
					echo '<label  class="control-label">'.$lokasi->lokasi.'</label>';
							
				
				?></b></td>
</tr>
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
<input type="hidden" name="diskon" id="diskon" value="<?php echo $resDaftar->diskon?>" />
<?php echo $resDaftar->lama." Hari x ( Rp. ".number_format($resDaftar->tarifharian,2,',','.')." - Diskon Rp. ".number_format($resDaftar->diskon,2,',','.')." )  = <b>Rp. ".number_format(($resDaftar->lama* ($resDaftar->tarifharian - $resDaftar->diskon)),2,',','.')."</b>"; ?>


</td></tr>	
</tbody>
</table>
<table class="table table-striped table-bordered table-hover" width="60%">
<tbody>
<tr><th>No Urut</th><th>Tgl Bayar</th> <th>Jumlah Bayar</th><th>Cara Bayar</th><th>Proses</th></tr>

<?	if (sizeof($resBayar)>0){
	foreach( $resBayar as $row){
		echo "<tr>";
		echo "<td>".$row->noUrut."</td>";
		echo "<td>".$row->tglBayar."</td>";
		echo "<td>".$row->jmlBayar."</td>";
		echo "<td>".$row->metode_bayar."</td>";
		echo '<td><a href="javascript:void(0)" onclick="editThis(\''.$jenis.'\', \''.$row->noPendaftaran.'\', \''.$row->noUrut.'\', \''.$row->tglBayar.'\', \''.$lokasi->id.'\')" data-id="'.$row->noPendaftaran.'"><i class="fa fa-edit" title="Edit"></i></a>  |  <a href="javascript:void(0)" onclick="delThis(\''.$jenis.'\', \''.$row->noPendaftaran.'\', \''.$row->noUrut.'\', \''.$row->tglBayar.'\', \''.$lokasi->id.'\')"><i class="fa fa-power-off" title="Delete"></i></a></td>';
		echo "</tr>";
	}
}else {
	echo "<tr><td colspan=5 align=center>Belum ada transaksi pembayaran</td></tr>";
}
?>
</table>
	</div>
</div>


</div><!-- widget-box -->

<?php echo form_close();?>
<script type="text/javascript">
$('.input-mask-date').mask('9999-99-99');
function delThis(jenis,  noreg, nourut, tglbayar, idlokasi){
			var pilih=confirm('Apakah data pembayaran dengan no. registrasi : '+noreg+ ', pada tanggal '+tglbayar+' akan dihapus ?');
			if (pilih==true) {
					$.ajax({
					type	: "POST",
					url		: "<?php echo base_url('e_pembayaran/delProcess');?>",
					data	: "jenis="+jenis+"&noreg="+noreg+"&nourut="+nourut+"&tglbayar="+tglbayar+"&idlokasi="+idlokasi,
					timeout	: 3000,  
					dataType: 'json',
					success	: function(res){
					if (res.status="success")
						{	alert("data berhasil dihapus");
							window.location.reload();
						}else{
							alert("data gagal dihapus");

						}						
					}
					
				});
			}
}

function editThis(jenis, noreg, nourut,tglBayar, idlokasi){
		
		
		$.ajax({
			url: "<?php echo base_url('e_pembayaran/frmpop_edit'); ?>",
			dataType: 'html',
			type: 'POST',
			data: {ajax:'true', noreg:noreg, jenis:jenis, nourut:nourut, tglBayar:tglBayar, idlokasi:idlokasi },
			success:
				
				function(data){
					
					bootbox.dialog({
					  onEscape	:true,					 
					  message: data,
					  title: "Form Edit Pembayaran ",
					  buttons: {
						
						main: {
						  label: "Tutup",
						  className: "btn-warning",
						  callback: function() {
							console.log("Primary button");
						  }
						}
					  }
					});
					//thisBox.attr('id','mydialog');
				}
		});
	}

</script>
