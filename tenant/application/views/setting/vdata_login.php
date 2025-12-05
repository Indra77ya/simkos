<?php errorHandler();
echo form_open_multipart('profil/data_login',array('class'=>'form-horizontal','id'=>'myform'));

?>

<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Username</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'username','id'=>'username','class'=>'form-control', "value"=>$row->USERNAME, "readonly"=>true));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Password Lama</label>
			<div class="col-sm-8"><?=form_password(array('name'=>'password','id'=>'password','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Password Baru</label>
			<div class="col-sm-8"><?=form_password(array('name'=>'password2','id'=>'password2','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Ulangi Password Baru</label>
			<div class="col-sm-8"><?=form_password(array('name'=>'password3','id'=>'password3','class'=>'form-control'));?></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8"><label class="col-sm-4 control-label"></label>
	<input type="hidden" name="id" id="id" value="<?php echo $row->ID?>">
	<input type="button" class="btn btn-primary" id="btsimpan" value="Update">
	<button type="button" class="btn btn-default" id="btcancelkel">Batal</button>
	</div>
</div> <hr/>


<script>

	$('#btsimpan').click(function(){		
		var form_data = $('#myform').serialize();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('profil/data_login');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data  berhasil disimpan.','success',1000);
					
					//window.location.reload();
					
				} else{
					bootbox.alert( msg.errormsg);				
					$("#errorHandler").html(msg.errormsg).show();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});
	});
</script>