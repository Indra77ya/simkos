<?php errorHandler();
echo form_open_multipart('pesan/index',array('class'=>'form-horizontal','id'=>'myform'));

?>
<div class="widget-box">
<div class="widget-header">
	<h4 class="widget-title">Kirim Pesan</h4>
</div><!-- widget-header -->
<br>
<div class="row">
	<div class="col-md-12" >
		<div class="form-group"><label class="col-sm-2 control-label " >Subjek Pesan</label>
			<div class="col-sm-4" ><?=form_input(array("name"=>"subjek","id"=>"pesan","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group"><label class="col-sm-2 control-label" >Isi Pesan</label>
			<div class="col-sm-8" ><?=form_textarea(array('name'=>'pesan','id'=>'pesan','class'=>'form-control', 'rows'=>10, 'cols'=>30));?>	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12"><label class="col-sm-4 control-label"></label>
	<input type="button" class="btn btn-primary" id="btsimpan" value="Simpan">
	<button type="button" class="btn btn-default" id="btcancelkel">Batal</button>
	</div>
</div> <hr/>

</div><!-- widget-box -->
</div>
<script>

	$('#btsimpan').click(function(){		
		var form_data = $('#myform').serialize();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('pesan/index');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Pesan berhasil dikirim.','success',1000);					
					$("#myform").reset();
					//window.reload();
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