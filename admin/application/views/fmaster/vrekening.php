<div class="control-group"><a href="javascript:void(0)" id="btcreate" class="btn btn-primary"><label class="lbltitle">Tambah Nomer Rekening</label></a>
</div>
<div id="errorHandler" class="alert alert-danger no-display"></div>

<br>
<div id="divformkel" class="no-display">
<?php echo form_open('',array('class'=>'form-horizontal','id'=>'myform'));?>
<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Bank</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'nama','id'=>'nama','class'=>'form-control'));?></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label class="col-sm-4 control-label">Cabang Bank </label>
			<div class="col-sm-8"><?=form_input(array('name'=>'cabang','id'=>'cabang','class'=>'form-control'));?>	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label class="col-sm-4 control-label">No Rekening</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'norekening','id'=>'norekening','class'=>'form-control'));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label class="col-sm-4 control-label">Atas Nama</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'atasnama','id'=>'atasnama','class'=>'form-control'));?>	</div>
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
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="dataTables-cab">
		<thead>
			<tr>
				<th>ID</th>
				<th>NAMA BANK</th>				
				<th>BANK CABANG</th>	
				<th>NO. REKENING</th>	
				<th>ATAS NAMA</th>	
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
				{"mData": "id" },
				{"mData": "nama" },
				{"mData": "cabang" },
				{"mData": "norekening" },
				{"mData": "atasnama" },
				{"mData": "ACTION", "sortable":false }
			],
			"sAjaxSource": "<?php echo base_url('rekening/json_data');?>"
		});

		

    });	

	$('#btcreate').click(function(){
		$("#divformkel").fadeSlide("show");
		$('#state').val('add');
		$('#lbltitle').text('Tambah Data No Rekening Bank Baru');
		$('#username').removeAttr('readonly');
		$('#myform').reset();
		
		
	});
	$('#btcancelkel').click(function(){
		$("#divformkel").fadeSlide("hide");
	});

	
	$('#btsimpankel').click(function(){		
		var form_data = $('#myform').serialize();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('rekening/saverekening');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data Nomer Rekening berhasil disimpan.','success',1000);
					$("#divformkel").fadeSlide("hide");
					//$('#dataTables-cab').dataTable().fnReloadAjax();
					window.location.reload();
					
				} else{
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

	function delrekening(idx,  str){
			var pilih=confirm('Apakah data Nomre Rekening '+str+ ' akan dihapus ?');
			if (pilih==true) {
					$.ajax({
					type	: "POST",
					url		: "<?php echo base_url('rekening/hapus');?>",
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
	function editrekening(obj){
		var id = $(obj).attr('data-id');
		$('#myform input[name="state"]').val(id);		
		$('#lbltitle').text('Edit Data Nomer Rekening Bank');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('rekening/getrekening');?>',
			data: {
				id:id
			},
			dataType: 'json',
			success: function(msg) {
				
				if(msg.status =='success'){
					console.log(msg.data);
					
					$('#nama').val(msg.data.Nama);
					$('#cabang').val(msg.data.Cabang);
					$('#norekening').val(msg.data.NoRekening);
					$('#atasnama').val(msg.data.atasNama);
					$("#divformkel").fadeSlide("show");
					
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger',2000);
			},
			cache: false
		});
	}

	
</script>