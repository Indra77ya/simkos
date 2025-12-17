<div class="row">
<div class="col-md-12">
 <div class="widget-box">
	 <div class="widget-header">
	<h4 class="smaller">
	<?php echo $title?>
	</h4>
	</div>
 <div class="widget-body">
 <div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<li>Laporan Tagihan belum bayar hanya untuk jenis sewa bulanan, sewa harian dan mingguan bisa dilihat di detil modul pembayaran masing-masing</li>
	<li>Export ke .Xls dan pdf berisi data seluruh tagihan sesuai lokasi/cabang kost</li>
	</ul>
</div>
<?php echo form_open('rpt_pembayaran/unpaidToPdf',array('class'=>'form-horizontal','id'=>'myform'));?>
<br>
<div class="row" style="text-align:center">
	<div class="col-md-12">
		<!--<button  id="btToExcel" class="btn btn-success" >Cetak Xls</button>&nbsp;-->
		<button type="submit" id="btToPdf" class="btn btn-warning" >Cetak Pdf</button>&nbsp;
			
	</div>
</div>	
<br>
	
<div class="row">
	<div class="col-md-5">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi Kost :</label>
			<div class="col-sm-8"><?	
				if ($this->session->userdata('auth')->ROLE=="Superadmin"){
					echo form_dropdown('cb_lokasi',$lokasi,'','id="cb_lokasi" class="form-control"');
				}else{
					echo '<input type="hidden" name="cb_lokasi" id ="cb_lokasi" value="'.$lokasi->id.'"/>';
					echo '<label  class="col-sm-6 control-label">'.$lokasi->lokasi.'</label>';
				}
				
				
				?>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Sewa :</label>
			<div class="col-sm-8"><?=form_dropdown('jenis_sewa',array("Tahunan"=>"Tahunan", "Bulanan"=>"Bulanan"),'','id="jenis_sewa" class="form-control"');?>
			</div>
		</div>
	</div>
	<!-- <div class="col-md-2 form-inline">
		<button  id="btToExcel" class="btn btn-success" >Cetak Xls</button>&nbsp;
		<button type="submit" id="btToPdf" class="btn btn-warning" >Cetak Pdf</button>&nbsp;
	</div> -->
</div>

<?php echo form_close();?>
<br>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="mydatatables">
		<thead>
			<tr>
				<th>NO</th>	
				<th>KAMAR</th>	
				<th>NAMA</th>
				<th>TGL MULAI INAP</th>
				<th>DETIL TAGIHAN</th>	
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>
<!-- /.table-responsive -->
</div>
</div>	
</div>
<br>&nbsp;<br>&nbsp;
<script>
$(document).ready(function() {
		
        $('#mydatatables').dataTable({
			"bProcessing": true,	
			"bServerSide": true,
			"iDisplayLength": 25,
			"fnServerParams": function ( aoData ) {
				aoData.push( { "name": "lokasi", "value": $('#cb_lokasi').val() }, { "name": "jenis_sewa", "value": $('#jenis_sewa').val() }
				);
			},
			"aoColumns": [
				{"mData": "NO" },
				{"mData": "LABEL_KAMAR" },
				{"mData": "NAMA" },				
				{"mData": "TGLMULAI" },				
				{"mData": "DETIL" }
			],
			"sAjaxSource": "<?php echo base_url('rpt_pembayaran/json_notpaid');?>"
		});

		

    });	


	$('#cb_lokasi').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});
	$('#jenis_sewa').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});
$('#btToPdf').click(function(e){	
	 e.preventDefault();
	 window.location.href='<?php echo base_url('rpt_pembayaran/unpaidToPdf');?>'+'/'+$('#cb_lokasi').val()+'_'+$('#jenis_sewa').val();
	

});

$('#btToExcel').click(function(e){		
	 e.preventDefault();
		$().showMessage('Sedang diproses.. Harap tunggu..');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('rpt_pembayaran/unpaidToExcel');?>',
			data: {lokasi:$('#cb_lokasi').val(), jenis_sewa:$('#jenis_sewa').val()},				
			dataType: 'json',
			success: function(data,  textStatus, jqXHR){	
					console.log(data);			
					//window.open('<?=base_url("'+data.isi+'")?>','_blank');
					bootbox.alert('<?php echo "<a href=\"".base_url("'+data.isi+'")."\">Klik file excel disini</a>"?>' );
					$().showMessage('Sukses.','success',1000);
				} ,
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});
	});
</script>