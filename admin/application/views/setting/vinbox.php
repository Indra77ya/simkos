<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Informasi</strong>
	<ul>
	<li>Daftar pesan berasal dari penghuni di aplikasi Tenant, bisa berisi kritik, usul, dan pesan lain</li>
	<li>Pesan dilihat di view detail</li>
	</ul>
</div>
<br>
<div class="row">
	<div class="col-md-4">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Sewa</label>
			<div class="col-sm-4"><?=form_dropdown('jenis',array("Tahunan"=>"Tahunan","Bulanan"=>"Bulanan"),'','id="jenis" class="form-control"');?></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group"><label class="col-sm-4 control-label">Status</label>
			<div class="col-sm-4"><?=form_dropdown('status',array("0"=>"Check In", "1"=>"Check Out"),'0','id="status" class="form-control"');?></div>
		</div>
	</div>
</div>

&nbsp;<br>
<div class="table-header">Results for "Pesan Masuk"</div>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="mydatatables">
		<thead>
			<tr>
				<th>ID</th>
				<th>NO. REGISTRASI</th>				
				<th>NAMA</th>
				<th>SUBJEK PESAN</th>
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
				aoData.push({ "name": "jenis", "value": $('#jenis').val()}, { "name": "status", "value": $('#status').val()}  
				);
			},
			"aoColumns": [
				{"mData": "ID" },
				{"mData": "ID_PENDAFTARAN" },
				{"mData": "NAMA" },
				{"mData": "SUBJEK" },
				{"mData": "ACTION", "sortable":false }
			],
			"sAjaxSource": "<?php echo base_url('email/json_data_pesan');?>"
		});

		
    });

	$('#jenis').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});
	$('#status').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});

function view(obj){
	var id = $(obj).attr('data-id');
		
	$.ajax({
				type: 'POST',
				url: "<?php echo base_url('email/viewpesan/'); ?>/"+id,
				data: {ajax:'true'},
				dataType: 'html',
				success: 	function(data){					 
					
					bootbox.dialog({
					  message: data,
					  title: "Lihat Pesan",
					  buttons: {
						
						main: {
						  label: "Tutup",
						  className: "btn-warning",
						  callback: function() {
							console.log("Primary button");
						  }
						}
					  }
					});					

				},
				complete: function(msg){
					
					$('html').animate({
						scrollTop: $('#page-wrapper').offset().top
					}, 500);
					
					return false;
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger',2000);
				},
				cache: false
			});


}

    </script>