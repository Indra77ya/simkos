<?
echo form_open($action,array('class'=>'form-horizontal','id'=>'myform'));

?>

<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-md-2 control-label">Lokasi Kost</label>
			<div class="col-sm-4"><?	
				if ($this->session->userdata('auth')->ROLE=="Superadmin"){
					echo form_dropdown('cb_lokasi',$lokasi,'','id="cb_lokasi" class="form-control"');
				}else{
					echo '<input type="hidden" name="cb_lokasi" id ="cb_lokasi" value="'.$lokasi->id.'"/>';
					echo '<label  class="col-sm-4 control-label">'.$lokasi->lokasi.'</label>';
				}
				
				
				?></div>
		</div>
	</div>
	</div>
<?

	if ($jenis<>"statuspenghuni"){
?>
<div class="row">
	<div class="col-md-8">
		<div class="form-group">
				<label for="nama" class="col-md-2   control-label">BULAN</label>
					<div class="col-sm-4"><?=form_dropdown('cbBulan',$arrBulan,date('m'),'id="cbBulan" class="form-control"');?></div>
		</div>
	</div>
</div>
<? } ?>
<div class="row">
	<div class="col-md-8">
		<div class="form-group">
			<label for="nama" class="col-md-2   control-label">TAHUN</label>
			<div class="col-sm-4"><?=form_dropdown('cbTahun',$arrThn, date('Y'),'id="cbTahun" class="form-control"');?></div>
	</div>
	</div>
</div>
<? if ($jenis=="bayarrekap" || $jenis=="daftarrekap" || $jenis=="statuspenghuni" || $jenis=="angsuran"){
	?>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-2 control-label">JENIS SEWA</label>
			<div class="col-sm-4"><?=form_dropdown('jenis_sewa',array("Tahunan"=>"Tahunan", "Bulanan"=>"Bulanan", "Mingguan"=>"Mingguan", "Harian"=>"Harian"),'','id="jenis_sewa" class="form-control"');?></div>
		</div>
	</div>
</div>
<? }

if ($jenis=="statuspenghuni"){
	?>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-2 control-label">STATUS</label>
			<div class="col-sm-4"><?=form_dropdown('status_penghuni',array("0"=>"-- All --", "Check In"=>"Check In", "Check Out"=>"Check Out"),'','id="status_penghuni" class="form-control"');?></div>
		</div>
	</div>
</div>
<?
}
	
	if (substr($this->config->item('mysubmenu'),0,4 )=='mn62' || substr($this->config->item('mysubmenu'),0,4 )=='mn63'){
	?>
	<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-2 control-label">PENGURUTAN</label>
			<div class="col-sm-4"><?=form_dropdown('orderby',array(  "labelkamar"=>"Kamar",  "nama"=>"Nama Penghuni"),'','id="orderby" class="form-control"');?></div>
		</div>
	</div>
	</div>
	<?	
	}
	?>
<!-- Button -->
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-md-2 control-label">&nbsp;</label>
			<div class="col-sm-8">
			<input type="hidden" name="display" id="display" value="0">
			<input type="hidden" name="jenis" id="jenis" value="<?php echo $jenis;?>">
		<input type="submit" class="btn btn-primary" id="btOk" value="Lanjutkan">	</div>
		</div>
	</div>
</div>

<hr/>

<?php echo form_close();?>  

<script>
$(document).ready(function() {
});

</script>
