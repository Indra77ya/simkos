<div class="row">
	<div class="col-md-6">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi Kost</label>
			<div class="col-sm-8"><?	
				if ($this->session->userdata('auth')->ROLE=="Superadmin"){
					echo form_dropdown('cb_lokasi',$lokasi,'','id="cb_lokasi" class="form-control"');
				}else{
					echo '<input type="hidden" name="cb_lokasi" id ="cb_lokasi" value="'.$lokasi->id.'"/>';
					echo '<label  class="col-sm-4 control-label">'.$lokasi->lokasi.'</label>';
				}
				
				
				?></div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal </label>
			<div class="col-sm-4">
			<div class="input-group input-group-sm">
				<input type="text" id="tanggal" name="tanggal" class="form-control" value="<?php echo date('Y-m-d')?>"/>
				<span class="input-group-addon" id="tanggal_ico">
				<i class="ace-icon fa fa-calendar"></i>
				</span>
				</div>
			
			</div>
		</div>
	</div>
</div>

<br>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="mydatatables">
		<thead>
			<tr>
				<th>NO</th>
				<th>NO. TRANSAKSI</th>
				<th>TANGGAL</th>				
				<th>ITEM PEMASUKAN</th>				
				<th>JUMLAH</th>	
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
		
        $('#mydatatables').dataTable({
			"bProcessing": true,	
			"bServerSide": true,
			"iDisplayLength": 25,
			"fnServerParams": function ( aoData ) {
				aoData.push({ "name": "tanggal", "value": $('#tanggal').val()}, { "name": "lokasi", "value": $('#cb_lokasi').val() }  
				);
			},
			"aoColumns": [
				{"mData": "NO" },
				{"mData": "NOTRANS" },
				{"mData": "TANGGAL" },
				{"mData": "KETERANGAN" },				
				{"mData": "JUMLAH" },			
				{"mData": "ACTION", "sortable":false }
			],
			"sAjaxSource": "<?php echo base_url('e_pemasukan/json_data');?>"
		});

		
	$("#tanggal_ico").click(function() {
		$("#tanggal").datepicker("show");
	});

	$( "#tanggal" ).datepicker({
						showOtherMonths: true,
						selectOtherMonths: false,
						//isRTL:true,				
						
						changeMonth: true,
						changeYear: true,
						dateFormat: "yy-mm-dd",
						
					});
    });	

	$('#tanggal').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});

	$('#cb_lokasi').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});
	function delThis(idx,  str, tbl){
			var pilih=confirm('Apakah data transaksi tanggal '+str+ ' akan dihapus ?');
			if (pilih==true) {
					$.ajax({
					type	: "POST",
					url		: "<?php echo base_url('e_pengeluaran/hapus');?>",
					data	: "idx="+idx+"&tbl="+tbl,
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