<div class="row">
	<div class="col-md-4">
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
		<div class="form-group"><label class="col-sm-4 control-label">Pilih Jenis Pendaftaran</label>
			<div class="col-sm-4">
				<?php 				
				$arrJns=array("Tahunan"=>"Tahunan", "Bulanan"=>"Bulanan", "Mingguan"=>"Mingguan", "Harian"=>"Harian");
				if ($proses=='depoRes'){
					$arrJns=array("Tahunan"=>"Tahunan", "Bulanan"=>"Bulanan");
				}
				echo form_dropdown('jenis',$arrJns,'','id="jenis" class="form-control"');?>				
				<input type="hidden" name="proses" id="proses" value="<?php echo $proses?>">
			</div>
		</div>
	</div>
</div>


<br>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="mydatatables">
		<thead>
			<tr>
				<th>KAMAR</th>
				<th>NAMA</th>	
				<th>NO.&nbsp;REGISTRASI</th>
				<th>ALAMAT</th>				
				<th>TGL DAFTAR</th>				
				<th>NO. TELP</th>				
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
				aoData.push( {"name": "jenis", "value": $('#jenis').val()}  , { "name": "lokasi", "value": $('#cb_lokasi').val()}, { "name": "proses", "value": $('#proses').val() }); 
			},
			"aoColumns": [
				{"mData": "nmkamar" },
				{"mData": "NAMA" },
				{"mData": "idpendaftaran" },				
				{"mData": "ALAMAT", "sortable":false },
				{"mData": "TGLDAFTAR" },
				{"mData": "NOTELP" , "sortable":false},
				{"mData": "ACTION", "sortable":false }
			],
			"sAjaxSource": "<?php echo base_url('rpt_pembayaran/json_data');?>"
		});

		

    });	

	$('#jenis').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});
	$('#cb_lokasi').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});
function doCheckOut(jenis,noreg){
	$.ajax({
			type: 'POST',
			url: "<?php echo base_url('rpt_pembayaran/doCheckOut');?>",
			data: { jenis : jenis,  noreg:noreg},				
			dataType: 'json',
			success: function(msg) {				
				console.log(msg);
				if(msg.status =='success'){
					$().showMessage(msg.pesan,'success',2000);									
					window.location="<?php echo base_url('rpt_pembayaran/checkout');?>";
				} else {
					$().showMessage(msg.pesan,'danger',2000);
					$("#errorHandler3").html(msg.errormsg).show();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				bootbox.alert("Terjadi kesalahan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});
}
</script>