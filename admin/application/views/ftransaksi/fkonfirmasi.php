<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Informasi</strong>
	<ul>
	<li>Halaman ini untuk menampilkan konfirmasi pembayaran yang masuk dan belum diverifikasi</li>
	<li>Proses Verifikasi disini hanya berlaku untuk pembayaran sewa bulanan dan sewa tahunan dengan perhitungan normal yaitu tagihan tarif kamar dan biaya tambahan jika ada (sehingga denda,pengurangan denda,diskon tarif, kwh listrik sewa bulanan tidak berlaku dan dianggap Rp. 0,-)</li>
	<li>Untuk konfirmasi pembayaran tagihan Listrik dan Air (PDAM) bulanan pada sewa tahunan hanya memverifikasi nominal yang dibayarkan apakah sudah masuk/diterima.   sehingga entri pembayaran tetap dilakukan operator aplikasi tetap melalui menu entri pembayaran seperti biasa</li>	
	<li>Hal ini disebabkan untuk besaraan nominal tagihan Listrik dan Air (PDAM) sesuai penggunaan meter diakhir periode, sehingga nominal tagihan baru diketahui ketika memproses entri form pembayaran tagihan listrik & air</li>

	<!-- <li>Halaman ini untuk menampilkan konfirmasi pembayaran yang masuk dan belum diverifikasi</li>
	<li>Proses Verifikasi disini untuk hanya memverifikasi nominal yang dibayarkan apakah sudah masuk/diterima</li>
	<li>Proses ini tidak otomatis mengupdate transaksi pembayaran, sehingga entri pembayaran tetap dilakukan operator aplikasi tetap melalui menu entri pembayaran seperti biasa</li>
	<li>Hal ini disebabkan untuk besaraan nominal tagihan Listrik dan Air (PDAM) sesuai penggunaan meter diakhir periode, sehingga nominal tagihan baru diketahui ketika memproses entri form pembayaran tagihan listrik & air</li> -->
	</ul>
</div>


<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="dataTables-cab">
		<thead>
			<tr>
				<th>ID</th>
				<th>JENIS SEWA</th>
				<th>PENGHUNI</th>
				<th>JENIS PEMBAYARAN</th>
				<th>PERIODE BAYAR</th>	
				<th>PERIODE SEBELUMNYA</th> <!-- -->				
				<th>METODE BAYAR</th>				
				<th>JML BAYAR</th>
				<th>JML TAGIHAN</th> <!-- -->
				<th>STATUS TAGIHAN</th> <!-- -->
				<th>BUKTI</th>
				<th>DETIL</th>
				
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>
<!-- /.table-responsive -->
<script>
    $(document).ready(function() {		
        $('#dataTables-cab').dataTable({
			"bProcessing": true,
			"bServerSide": true,
			"iDisplayLength": 25,			
			"aoColumns": [
				{"mData": "ID" },
				{"mData": "JENIS_SEWA" },
				{"mData": "PENGHUNI" },
				{"mData": "JENIS_BAYAR" },
				{"mData": "PERIODE_TAGIHAN" },
				{"mData": "PERIODE_SBLM" },
				{"mData": "METODE_BAYAR" },
				{"mData": "JMLBAYAR" },
				{"mData": "JMLTAGIHAN" },
				{"mData": "STSTAGIHAN" },
				{"mData": "BUKTI" },
				{"mData": "DETIL" }
			],
			"sAjaxSource": "<?php echo base_url('e_pembayaran/json_data_konfirmasi');?>"
		});
    });	
function viewThis(obj){
		var id = $(obj).attr('data-id');
		
		$.ajax({
			url: "<?php echo base_url('e_pembayaran/view_konfir'); ?>",
			dataType: 'html',
			type: 'POST',
			data: {ajax:'true', id:id},
			success:
				
				function(data){
					
					var thisBox=bootbox.dialog({
					  onEscape	:true,					 
					  message: data,
					  title: "Form View Konfirmasi Pembayaran",
					  buttons: {
						success: {
						  label: "Konfirmasi OK",
						  className: "btn-success",
						  callback: function() {
							confirmOk(id);
						  }
						},
						main: {
						  label: "Tutup",
						  className: "btn-warning",
						  callback: function() {
							console.log("Primary button");
						  }
						}
					  }
					});
					thisBox.attr('id','mydialog');
				}
		});
	}

function confirmOk(id){
	$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pembayaran/confirmOk');?>',
			data: { id: id},				
			dataType: 'json',
			success: function(msg) {
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data Konfirmasi pembayaran berhasil diverifikasi.','success',1500);
					//window.location.href="<?php echo base_url('e_pembayaran//konfirmasi');?>";
				} else {
					
					$().showMessage('Terjadi kesalahan. Data gagal diupdate. <br>'+msg.errormsg ,'danger',700);
					
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				//$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger');
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan. diluar ajax<br>"+ 	textStatus + " - " + errorThrown );
			},
			cache: false
		});
		
}

function delkonfirmasi(idx,  str){
			var pilih=confirm('Apakah data konfirmasi pembayaran "'+str+ '" akan dihapus ? \r\n Jika data konfirmasi pembayaran dihapus, maka data pembayaran bisa dilakukan melalui menu entri pembayaran');
			if (pilih==true) {
					$.ajax({
					type	: "POST",
					url		: "<?php echo base_url('e_pembayaran/delConfirm');?>",
					data	: "idx="+idx,
					timeout	: 3000,  
					success	: function(res){
						//alert(res);
						alert("data berhasil dihapus");
						window.location.reload();
						}
					
				});
			}

		}
</script>