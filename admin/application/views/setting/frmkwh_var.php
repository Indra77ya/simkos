<?php errorHandler();
echo form_open_multipart('setting/savingKwh_Vars',array('class'=>'form-horizontal','id'=>'myformkel'));
?>
<div id="divformkel" class="no-display">
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Kwh Tidak Kena Tarif</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'txt1','id'=>'txt1','class'=>'form-control', 'value'=>0,"onkeypress"=>"return numericVal(this,event)"));?></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tarif Default Kwh</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'txt2','id'=>'txt2','class'=>'form-control',"onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", 'value'=>0));?> Rupiah</div>
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
<div class="table-header">Results for "Data Seting Kwh Listrik"</div>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="tabelku">
		<thead>
			<tr>
				<th>ID</th>
				<th>Kwh Tidak Kena Tarif</th>
				<th>Tarif Default Kwh</th>				
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
				{"mData": "kwh_tdk_kena_tarif" },
				{"mData": "kwh_tarif" },
				{"mData": "ACTION", "sortable":false }
			],
			"sAjaxSource": "<?php echo base_url('setting/jsonKwh_var');?>"
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
			url: '<?php echo base_url('setting/getKwh_vars');?>',
			data: {
				id:id
			},
			dataType: 'json',
			success: function(msg) {
				if(msg.status =='success'){
					console.log(msg.data);
					$('#id').val(msg.data.id);
					$('#txt1').val(msg.data.kwh_tdk_kena_tarif);								
					$('#txt2').val(msg.data.kwh_tarif);										
												
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