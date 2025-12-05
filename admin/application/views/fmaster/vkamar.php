<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<li>Jika kapasitas kamar lebih dari 1 orang, maka tarif dasar kamar yang disetting berlaku untuk per orang penghuni kamar</li>
	<li>misal : kamar A kapasitas 2 orang dengan tarif kamar bulanan = Rp. 1.000.000 maka tarif tersebut berlaku untuk 1 orang, bukan 1.000.000 dibagi 2 orang.</li>	
	<li>Proses (tombol) delete hanya muncul jika kamar tersebut belum pernah didaftarkan di form pendaftaran, data hanya bisa diedit. Jika ingin dihapus maka hapus terlebih dahulu data pendaftaran yang memakai kamar tersebut</li>	
	</ul>
</div>
<div class="control-group"><a href="javascript:void(0)" id="btcreate" class="btn btn-primary">Tambah Kamar</a>
</div>
<div id="errorHandler" class="alert alert-danger no-display"></div>

<br>
<div id="divformkel" class="no-display">
<?php echo form_open('kamar/kamarCreate',array('class'=>'form-horizontal','id'=>'myform'));?>

<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi/Cabang Kost</label>
			<div class="col-sm-8">
			<?php
				if ($this->session->userdata('auth')->ROLE=="Superadmin"){
					echo form_dropdown('lokasi',$lokasi,'','id="lokasi" class="form-control"');
				}else{
					echo '<input type="hidden" name="lokasi" id ="lokasi" value="'.$lokasi->id.'"/>';
					echo '<label  class="col-sm-4 control-label">'.$lokasi->kode_kost.' - '.$lokasi->lokasi.'</label>';
				}
				?>			
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label class="col-sm-4 control-label">Label/Nomer Kamar</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'nama','id'=>'nama','class'=>'form-control'));?></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label  class="col-sm-4 control-label">Kapasitas</label>
			<div class="col-sm-4"><?=form_input(array('name'=>'kapasitas','id'=>'kapasitas','class'=>'form-control'));?>&nbsp;Orang	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label  class="col-sm-4 control-label">Luas</label>
			<div class="col-sm-4"><?=form_input(array('name'=>'luas','id'=>'luas','class'=>'form-control'));?>&nbsp;m, Contoh : 4x4 m	</div>
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label  class="col-sm-4 control-label">Fasilitas</label>
			<div class="col-sm-8"><?=form_textarea(array('name'=>'fasilitas','id'=>'fasilitas','class'=>'form-control', 'rows'=>3, 'cols'=>30));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label class="col-sm-4 control-label">Tarif Dasar Tahunan</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'tahunan','id'=>'tahunan','class'=>'form-control','onkeypress'=>"return numericVal(this,event)", 'onblur'=>'blurObj(this)', 'onclick'=>'clickObj(this)', 'value'=>0));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label class="col-sm-4 control-label">Tarif Dasar Bulanan</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'bulanan','id'=>'bulanan','class'=>'form-control','onkeypress'=>"return numericVal(this,event)", 'onblur'=>'blurObj(this)', 'onclick'=>'clickObj(this)', 'value'=>0));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label class="col-sm-4 control-label">Tarif Dasar Mingguan</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'mingguan','id'=>'mingguan','class'=>'form-control','onkeypress'=>"return numericVal(this,event)", 'onblur'=>'blurObj(this)', 'onclick'=>'clickObj(this)', 'value'=>0));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label class="col-sm-4 control-label">Tarif Dasar Harian</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'harian','id'=>'harian','class'=>'form-control','onkeypress'=>"return numericVal(this,event)", 'onblur'=>'blurObj(this)', 'onclick'=>'clickObj(this)', 'value'=>0));?>	</div>
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
</div>

<?php echo form_close();?>
<hr />
</div>

<br>
<div class="row">
<div class="col-sm-6">
		<div class="form-group">
			<label for="divisi" class="col-sm-4 control-label">Pilih Lokasi/Cabang Kost</label>
			<div class="col-sm-8">
			<?php
				if ($this->session->userdata('auth')->ROLE=="Superadmin"){
					echo form_dropdown('cb_lokasi',$lokasi,'','id="cb_lokasi" class="form-control"');
				}else{
					echo '<input type="hidden" name="cb_lokasi" id ="cb_lokasi" value="'.$lokasi->id.'"/>';
					echo '<label  class="col-sm-4 control-label">'.$lokasi->kode_kost.' - '.$lokasi->lokasi.'</label>';
				}
				?>	
				
			</div>
		</div>
	</div>
</div><br>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="dataTables-cab">
		<thead>
			<tr>
				<th>ID</th>
				<th>LOKASI</th>
				<th>KAMAR</th>				
				<th>KAPASITAS</th>				
				<th>LUAS</th>
				<th>FASILITAS</th>
				<th>TAHUNAN</th>
				<th>BULANAN</th>
				<th>MINGGUAN</th>
				<th>HARIAN</th>
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
			"fnServerParams": function ( aoData ) {
				aoData.push( { "name": "lokasi", "value": $('#cb_lokasi').val() });
			},
			"aoColumns": [
				{"mData": "IDKAMAR" },
				{"mData": "LOKASI" },
				{"mData": "LABELKAMAR" },
				{"mData": "KAPASITAS" },
				{"mData": "LUAS" },
				{"mData": "FASILITAS" },
				{"mData": "TAHUNAN" },
				{"mData": "BULANAN" },
				{"mData": "MINGGUAN" },
				{"mData": "HARIAN" },
				{"mData": "ACTION", "sortable":false }
			],
			"sAjaxSource": "<?php echo base_url('kamar/json_data');?>"
		});

		

    });	
	
	$('#cb_lokasi').change(function(){
		$('#dataTables-cab').dataTable().fnReloadAjax();
	});

	$('#btcreate').click(function(){
		$("#divformkel").fadeSlide("show");
		$('#state').val('add');
		$('#lbltitle').text('Tambah Data kamar Baru');
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
			url: '<?php echo base_url('kamar/savekamar');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data kamar berhasil disimpan.','success',1000);
					$("#divformkel").fadeSlide("hide");
					//$('#dataTables-cab').dataTable().fnReloadAjax();
					window.location.reload();
					
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

	function delkamar(idx,  str){
			var pilih=confirm('Apakah data kamar '+str+ ' akan dihapus ?');
			if (pilih==true) {
					$.ajax({
					type	: "POST",
					url		: "<?php echo base_url('kamar/hapus');?>",
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
	function editkamar(obj){
		var id = $(obj).attr('data-id');
		$('#myform input[name="state"]').val(id);		
		$('#lbltitle').text('Edit Data kamar');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('kamar/getkamar');?>',
			data: {
				id:id
			},
			dataType: 'json',
			success: function(msg) {
				
				if(msg.status =='success'){
					console.log(msg.data);
					
					$('#lokasi').val(msg.data.IDLOKASI);
					$('#nama').val(msg.data.LABELKAMAR);
					$('#kapasitas').val(msg.data.KAPASITAS);
					$('#luas').val(msg.data.LUAS);					
					$('#fasilitas').val(msg.data.FASILITAS);					
					$('#tahunan').val(msg.data.TARIFTAHUNAN);
					$('#bulanan').val(msg.data.TARIFBULANAN);
					$('#mingguan').val(msg.data.TARIFMINGGUAN);
					$('#harian').val(msg.data.TARIFHARIAN);
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
			var pilih=confirm('Apakah data kamar '+idx+ ' akan '+(sts=='1'?"dinon-aktifkan":"diaktifkan")+' ?');
			if (pilih==true) {
					$.ajax({
					type	: "POST",
					url		: "<?php echo base_url('kamar/ubahStatus');?>",
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