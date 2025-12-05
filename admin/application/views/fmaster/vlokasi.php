<div class="control-group"><a href="javascript:void(0)" id="btcreate" class="btn btn-primary">Tambah Lokasi</a>
</div>

<?php errorHandler();
echo form_open_multipart('lokasi/savelokasi',array('class'=>'form-horizontal','id'=>'myform'));
?>

<div id="divformkel" class="no-display">
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Kota Lokasi Kost</label>
			<div class="col-sm-6"><?=form_input(array('name'=>'lokasi','id'=>'lokasi','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Kode Kost</label>
			<div class="col-sm-4"><?=form_input(array('name'=>'kode_kost','id'=>'kode_kost','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Alamat Lokasi Kost</label>
			<div class="col-sm-4"><?=form_textarea(array('name'=>'alamat','id'=>'alamat','class'=>'form-control', 'rows'=>5, 'cols'=>45));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Nama Pengurus</label>
			<div class="col-sm-4"><?=form_input(array('name'=>'nama_pengurus','id'=>'nama_pengurus','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Nama Asisten 1</label>
			<div class="col-sm-4"><?=form_input(array('name'=>'nama_asisten1','id'=>'nama_asisten1','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Nama Asisten 2</label>
			<div class="col-sm-4"><?=form_input(array('name'=>'nama_asisten2','id'=>'nama_asisten2','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Telp. Kost</label>
			<div class="col-sm-4"><?=form_input(array('name'=>'telp','id'=>'telp','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">No HP Pengurus</label>
			<div class="col-sm-4"><?=form_input(array('name'=>'hp','id'=>'hp','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">PBB</label>
			<div class="col-sm-4"><?=form_input(array('name'=>'pbb','id'=>'pbb','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Status Tanah</label>
			<div class="col-sm-4"><?=form_input(array('name'=>'status_tanah','id'=>'status_tanah','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
	<input type="hidden" name="id" id="id">
	<input type="hidden" name="state" id="state" value="add">
	<input type="button" class="btn btn-primary" id="btsimpankel" value="Simpan">
	<button type="button" class="btn btn-default" id="btcancelkel">Batal</button>
	</div>
</div> <hr/>

</div><!-- end modal -->

<?php echo form_close();?>  
<br>
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Informasi</strong>
	<ul>
	<li>Tombol hapus akan muncul jika data lokasi belum dipakai di data master kamar</li>
	</ul>
</div>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="dataTables-cab">
		<thead>
			<tr>
				<th>ID</th>
				<th>KODE KOST</th>				
				<th>KOTA LOKASI</th>				
				<th>NAMA PENGURUS</th>				
				<th>ALAMAT</th>				
				<th>TELP</th>
				<th>HP</th>
				<th>ACTION</th>
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
				{"mData": "KODE_KOST" },
				{"mData": "LOKASI" },
				{"mData": "NAMA_PENGURUS" },
				{"mData": "ALAMAT" },
				{"mData": "TELP" },
				{"mData": "HP" },				
				{"mData": "ACTION", "sortable":false }
			],
			"sAjaxSource": "<?php echo base_url('lokasi/json_data');?>"
		});

		

    });	

	$('#btcreate').click(function(){
		$("#divformkel").fadeSlide("show");
		$('#state').val('add');
		$('#lbltitle').text('Tambah Data lokasi Baru');
		$('#username').removeAttr('readonly');
		$('#myform').reset();
		
		
	});
	$('#btcancelkel').click(function(){
		$("#divformkel").fadeSlide("hide");
	});

	
	$('#btsimpankel').click(function(){		
		var form_data = $('#myform').serialize();
		//$().showMessage('Sedang diproses.. Harap tunggu..');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('lokasi/savelokasi');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data lokasi berhasil disimpan.','success',1000);
					$("#divformkel").fadeSlide("hide");
					//window.location.reload();
					$('#dataTables-cab').dataTable().fnReloadAjax();
					//window.location.reload();
					
				} else {					
					bootbox.alert("Terjadi kesalahan. "+ msg.errormsg+". Data gagal disimpan.");
					$("#errorHandler").html(msg.errormsg).show();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				//$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger');
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});
		//$().showMessage('Data pembelian berhasil disimpan, data order akan dikirim melalui sms','success',1000);
	});

	function dellokasi(idx,  str){
			var pilih=confirm('Apakah data lokasi '+str+ ' akan dihapus ?');
			if (pilih==true) {
					$.ajax({
					type	: "POST",
					url		: "<?php echo base_url('lokasi/hapus');?>",
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
	function editlokasi(obj){
		var id = $(obj).attr('data-id');
		$('#myform input[name="state"]').val(id);		
		$('#lbltitle').text('Edit Data lokasi');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('lokasi/getlokasi');?>',
			data: {
				id:id
			},
			dataType: 'json',
			success: function(msg) {
				
				if(msg.status =='success'){
					//console.log(msg.data);
					
					$('#lokasi').val(msg.data.lokasi);
					$('#alamat').val(msg.data.alamat);
					$('#kode_kost').val(msg.data.kode_kost);
					$('#nama_pengurus').val(msg.data.nama_pengurus);
					$('#nama_asisten1').val(msg.data.nama_asisten1);
					$('#nama_asisten2').val(msg.data.nama_asisten2);
					$('#telp').val(msg.data.telp);					
					$('#hp').val(msg.data.hp);					
					$('#pbb').val(msg.data.pbb);					
					$('#status_tanah').val(msg.data.status_tanah);					
					$("#divformkel").fadeSlide("show");

				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger',2000);
			},
			cache: false
		});
	}

	function ubahStatus(idx, sts){
			var pilih=confirm('Apakah data lokasi '+idx+ ' akan '+(sts=='1'?"dinon-aktifkan":"diaktifkan")+' ?');
			if (pilih==true) {
					$.ajax({
					type	: "POST",
					url		: "<?php echo base_url('lokasi/ubahStatus');?>",
					data	: "idx="+idx+"&status="+sts,
					timeout	: 3000,  
					success	: function(res){
						//alert(res);
						alert("data berhasil "+(sts=='1'?"dinon-aktifkan":"diaktifkan"));
						window.location.reload();
						}
					
				});
			}
		}
</script>