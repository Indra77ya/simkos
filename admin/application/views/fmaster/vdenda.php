<div id="errorHandler" class="alert alert-danger no-display"></div>

<br>

<?php echo form_open('',array('class'=>'form-horizontal','id'=>'myform'));?>
<div class="row">
	<div class="col-md-10">
		<div class="form-inline"><label class="col-sm-4 control-label">Nominal Denda</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'nominal','id'=>'nominal','class'=>'form-control','onkeypress'=>"return numericVal(this,event)", 'onblur'=>'blurObj(this)', 'onclick'=>'clickObj(this)', 'value'=>$nom));?>&nbsp;per hari	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-10">
		<div class="form-inline"><label class="col-sm-4 control-label">Setelah Hari Ke*</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'hari_ke','id'=>'hari_ke','class'=>'form-control','onkeypress'=>"return numericVal(this,event)", 'onblur'=>'blurObj(this)', 'onclick'=>'clickObj(this)', 'value'=>$hari_ke));?>&nbsp;	<input type="button" class="btn btn-primary" id="btsimpankel" value="Simpan"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-10">
		<label class="col-sm-10 control-label">Keterangan * : Jumlah hari untuk ditampilkan denda setelah tanggal tagihan muncul</label>			
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
	<input type="hidden" name="id" id="id" value="1">
	<input type="hidden" name="state" id="state" value="1">
	
		
	</div>
</div>

<?php echo form_close();?>
<hr />


<script>
   
	

	
	$('#btsimpankel').click(function(){		
		var form_data = $('#myform').serialize();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('denda/savedenda');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data denda berhasil disimpan.','success',1000);
					
					//window.location.reload();
					
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

	

	
</script>