
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	
	<li>Untuk mengedit klik link Edit di masing-masing data pembayaran</li>	
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
<td >Lokasi/Cabang Kost</td>
<td ><b><?				
					echo '<input type="hidden" name="idlokasi" id ="idlokasi" value="'.$lokasi->id.'"/>';
					echo '<label  class="control-label">'.$lokasi->lokasi.'</label>';
							
				
				?></b></td>
</tr>
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
<td ><?php echo $resDaftar->tgldaftar?></td>
</tr>
<tr bgcolor="#a7a7a7"><th colspan=2>Detil Tagihan : </th></tr>
<tr><td >Tarif Kamar</td><td>Rp. <?=number_format($resDaftar->tariftahunan,2,',','.')?>/Tahun</td></tr>
<?	
		 
		$jumlah=$resDaftar->tariftahunan;
		$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from detildaftar_tahunan d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='$noreg'";
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
<tr ><th colspan=8 bgcolor="#a7a7a7">Daftar data pembayaran sewa yang tersimpan</th></tr>
<tr><th>Periode</th><th >No. Kuitansi</th><th >Tgl Bayar</th><th>Metode</th><th>Jml Bayar</th><th>Edit ?</th></tr>
<?	
if (sizeof($resBayar)>0){
	foreach( $resBayar as $row){
		echo "<tr>";
		echo "<td>".$row->tahun_tagihan."</td>";
		echo "<td>".$row->no_urut."</td>";
		echo "<td>".$row->tglBayar."</td>";
		echo "<td>".$row->metode_bayar."</td>";
		echo "<td>".$row->jmlBayar."</td>";
		echo '<td><a href="javascript:void(0)" onclick="editThis_yearBill(\'bayarsewa\', \''.$row->idPendaftaran.'\', \''.$row->tahun_tagihan.'\', \''.$row->no_urut.'\', \''.$lokasi->id.'\')" data-id="'.$row->idPendaftaran.'"><i class="fa fa-edit" title="Edit"></i></a>  |  <a href="javascript:void(0)" onclick="delThis_yearBill(\''.$jenis.'\', \''.$row->idPendaftaran.'\', \''.$row->tahun_tagihan.'\', \''.$row->no_urut.'\', \''.$lokasi->id.'\')"><i class="fa fa-power-off" title="Delete"></i></a></td>';
		echo "</tr>";
	}
}else{
	echo "<tr><td align=center colspan=7>Belum Ada transaksi pembayaran</td></tr>";
}

?>
<tr ><th colspan=8 bgcolor="#a7a7a7">Daftar data pembayaran tagihan bulanan sewa tahunan</th></tr>
<tr><th>Periode</th><th >No. Kuitansi</th><th >Tgl Bayar</th><th>Metode</th><th>Tagihan Listrik</th><th>Tagihan PDAM</th><th>Jml Bayar</th><th>Edit ?</th></tr>
<?
$strBayar="SELECT  * from bayar_tahunan_tag_blnan  WHERE idpendaftaran='".$noreg."' and idlokasi=".$lokasi->id." order by periode_tagihan, no_urut";
$rstag=$this->db->query($strBayar)->result();
if (sizeof($rstag)>0){
	foreach( $rstag as $res){
		echo "<tr>";
		echo "<td>".$res->periode_tagihan."</td>";
		echo "<td>".$res->no_urut."</td>";
		echo "<td>".$res->tglBayar."</td>";
		echo "<td>".$res->metode_bayar."</td>";
		echo "<td>".$res->jmltag_listrik."</td>";
		echo "<td>".$res->jmltag_pdam."</td>";
		echo "<td>".$res->jmlBayar."</td>";
		echo '<td><a href="javascript:void(0)" onclick="editThis_yearBill(\'bayarbulanan\', \''.$res->idPendaftaran.'\', \''.$res->periode_tagihan.'\', \''.$res->no_urut.'\', \''.$lokasi->id.'\')" data-id="'.$res->idPendaftaran.'"><i class="fa fa-edit" title="Edit"></i></a>  |  <a href="javascript:void(0)" onclick="delThis_yearBill(\'year_monthlyBill\', \''.$res->idPendaftaran.'\', \''.$res->periode_tagihan.'\', \''.$res->no_urut.'\', \''.$lokasi->id.'\')"><i class="fa fa-power-off" title="Delete"></i></a></td>';
		echo "</tr>";
	}
}else{
	echo "<tr><td align=center colspan=7>Belum Ada transaksi pembayaran</td></tr>";
}
?>
</tbody>
</table>

</div><!-- widget-box -->


<?php echo form_close();?>
<script type="text/javascript">

function delThis_yearBill(jenis,  noreg, bayar_ke, notrans, idlokasi){
			var pilih=confirm('Apakah data pembayaran dengan no. registrasi : '+noreg+ ', pembayaran ke : '+bayar_ke+' akan dihapus ?');
			if (pilih==true) {
					$.ajax({
					type	: "POST",
					url		: "<?php echo base_url('e_pembayaran/delProcess');?>",
					data	: "jenis="+jenis+"&noreg="+noreg+"&nourut="+bayar_ke+"&notrans="+notrans+"&idlokasi="+idlokasi,
					timeout	: 3000, 
					dataType: 'json',
					success	: function(res){
						//console.log(res);
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


function editThis_yearBill(jenis, noreg,periode, notrans, idlokasi){	
		//alert(jenis);
		$.ajax({
			url: "<?php echo base_url('e_pembayaran/frmpop_edit_thnn'); ?>",
			dataType: 'html',
			type: 'POST',
			data: {ajax:'true', noreg:noreg, jenis:jenis, periode:periode,no_kuit:notrans, idlokasi:idlokasi },
			success:
				
				function(data){
					
					bootbox.dialog({
					  onEscape	:true,					 
					  message: data,
					  title: "Form Edit Pembayaran ",
					  buttons: {
						/*success: {
						  label: "Simpan",
						  className: "btn-success",
						  callback: function() {
							saveFormPay(noreg, idkamar, byrke, thnbln, tagihan, hrdenda);
						  }
						},*/
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
