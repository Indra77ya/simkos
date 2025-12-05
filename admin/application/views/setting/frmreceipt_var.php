<?php errorHandler();
echo form_open_multipart('setting/savingVar',array('class'=>'form-horizontal','id'=>'myformkel'));
?>
<div id="divformkel" class="no-display">
<!-- <div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Kota Tempat Usaha</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'txt1','id'=>'txt1','class'=>'form-control'));?></div>
		</div>
	</div>
</div> -->

<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Uraian Pernyataan</label>
			<div class="col-sm-8"><?=form_textarea(array('name'=>'txt2','id'=>'txt2','class'=>'form-control', 'rows'=>5, 'cols'=>45));?></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12"><input type="hidden" name="id" id="id">
	<input type="submit" class="btn btn-primary" id="btsimpankel" value="Simpan">
	<button type="button" class="btn btn-default" id="btcancelkel">Batal</button>
	</div>
</div> <hr/>

</div><!-- end modal -->

<?php echo form_close();?>  
<div class="table-header">Results for "Variabel Kuitansi"</div>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="tabelku">
		<thead>
			<tr>
				<th>ID</th>
				<th>Uraian Pernyataan</th>				
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>
<!-- /.table-responsive -->
<script>
    $(document).ready(function() {
        $('#tabelku').dataTable({
			"bProcessing": true,
			"bServerSide": true,
			"iDisplayLength": 25,
			"aoColumns": [
				{"mData": "id" },
				{"mData": "notes" },
				{"mData": "ACTION", "sortable":false }
			],
			"sAjaxSource": "<?php echo base_url('setting/json_var');?>"
		});
    });
$('#btcancelkel').click(function(){
		$("#divformkel").fadeSlide("hide");
	});
/*$('#myformkel').submit(function(event) {
	$(this).saveForm('<?php echo base_url('setting/savingParams');?>','<?php echo base_url('setting/parameter');?>');
	event.preventDefault();
});*/
function editVars(obj){
		var id = $(obj).attr('data-id');
		
		$('#myformkel input[name="state"]').val(id);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('setting/getVars');?>',
			data: {
				id:id
			},
			dataType: 'json',
			success: function(msg) {
				if(msg.status =='success'){
					console.log(msg.data);
					$('#id').val(msg.data.id);
					$('#txt1').val(msg.data.nama_kota);								
					$('#txt2').val(msg.data.notes);										
												
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