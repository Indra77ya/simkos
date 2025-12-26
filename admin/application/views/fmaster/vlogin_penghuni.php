<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Informasi</strong>
	<ul>
	<li>Halaman ini digunakan untuk proses reset password saja, password diset default <b>12345</b></li>
	<li>Tidak ada proses editing di halaman ini</li>
	<li>Data login penghuni otomatis dibuat dari proses pendaftaran penghuni kost untuk sewa bulanan dan tahunan saja (mingguan dan harian tidak termasuk)</li>	
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
<div class="table-header">Results for "Data Login Penghuni"</div>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="mydatatables">
		<thead>
			<tr>
				<th>ID</th>
				<th>LOKASI/CABANG</th>
				<th>NAMA</th>
				<th>NO. REGISTRASI</th>				
				<th>USERNAME</th>				
				<th>PASSWORD</th>
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
				{"mData": "LOKASI" },
				{"mData": "NAMA" },
				{"mData": "IDPENDAFTARAN" },
				{"mData": "USERNAME" },
				{"mData": "PASSWORD" },
				{"mData": "ACTION", "sortable":false }
			],
			"sAjaxSource": "<?php echo base_url('pengguna/json_data_penghuni');?>"
		});

		
    });

	$('#jenis').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});
	$('#status').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});

function doReset(jenis,nama, noreg, idx){
	var x = confirm("Reset Password penghuni sewa "+jenis+" : [ "+noreg+" ] "+nama+" ?");
	if (x)	{
	
	$.ajax({
			type: 'POST',
			url: "<?php echo base_url('pengguna/doReset');?>",
			data: { jenis : jenis,  id:idx},				
			dataType: 'json',
			success: function(msg) {				
				console.log(msg);
				if(msg.status =='success'){
					$().showMessage(msg.pesan,'success',2000);									
					//window.location="<?php echo base_url('pengguna/penghuni');?>";
				} else {
					$().showMessage(msg.pesan,'success',2000);
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				bootbox.alert("Terjadi kesalahan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});
	}
}
    </script>