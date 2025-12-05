<?php errorHandler();
echo form_open_multipart('profil/data_login',array('class'=>'form-horizontal','id'=>'myform'));

?>
<div class="widget-box">
<div class="widget-header">
	<h4 class="widget-title">Data Sewa</h4>
</div><!-- widget-header -->
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi/Cabang Kost</label>
			<div class="col-sm-7">
			<?				
					echo '<input type="hidden" name="lokasi" id ="lokasi" value="'.$lokasi->id.'"/>';
					echo '<label  class="control-label">'.$lokasi->lokasi.'</label>';
							
				
				?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Registrasi</label>
			<div class="col-sm-4"><input type="hidden" name="noreg" id ="noreg" size="20" value="<?php echo $res->idpendaftaran?>"/><label class="col-sm-4 control-label"><B><?php echo $res->idpendaftaran?></B></label></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Kamar*</label>
			<div class="col-sm-8 "><?=form_input(array("name"=>"lblkamar","id"=>"lblkamar","class"=>"form-control", "value"=>$res->labelkamar, "readonly"=>true));?>
			<label  style="text-align:left">Gunakan Form Pindah kamar untuk ubah kamar</label>
			<input type="hidden" name="idkamar" id="idkamar"  size="20"  value="<?php echo $res->idkamar?>"/>
			
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Tarif</label>
			<div class="col-sm-3"><?=form_input(array("name"=>"tarif","id"=>"tarif","class"=>"form-control", "readonly"=>true, "value"=>$res->tarifbulanan));?></div>
			<label  class="col-sm-2 control-label">&nbsp;Diskon Tarif</label><div class="col-sm-3"><?=form_input(array("name"=>"diskon","id"=>"diskon","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)",  "value"=>$res->diskon));?></div>
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Fasilitas</label>
			<div class="col-sm-8"><?=form_textarea(array("name"=>"fasilitas","id"=>"fasilitas","class"=>"form-control", "readonly"=>true, "rows"=>3, "cols"=>30, "value"=>$res->fasilitas));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Daftar</label>
			<div class="col-sm-4">
			<div class="input-group input-group-sm ">
				<input type="text" id="tgldaftar" name="tgldaftar" class="form-control" value="<?php echo $res->tgldaftar?>"/>
				<span class="input-group-addon" id="tgldaftar_ico">
				<i class="ace-icon fa fa-calendar"></i>
				</span>				
				</div>
			<label class="control-label"><i>Format yyyy-mm-dd</i></label>
			</div>
		</div>
	</div>
</div>
<?
	if ($jenis=="Tahunan"){
		?>
		
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tahun Mulai </label>
			
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<?=form_input(array("name"=>"thn_mulai","id"=>"thn_mulai","class"=>"form-control","onkeypress"=>"return numericVal(this,event)","readonly"=>true, "value"=>$res->thn_mulai));?>
				</div>

		</div>
	</div>
</div>		
		<?
}else{
?>

<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Mulai Inap</label>
			
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="tglinap" name="tglinap" class="form-control" value="<?php echo $res->tglmulai?>" />
					<span class="input-group-addon" id="tglinap_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
					
				</div>
				<label class="control-label"><i>Format yyyy-mm-dd</i></label>		
			</div>

		</div>
	</div>
</div>
<? } ?>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Posisi Meteran Listrik</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"posisi_meteran","id"=>"posisi_meteran","class"=>"form-control","readonly"=>true,"onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>$res->kwh_awal));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Deposit</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"deposit","id"=>"deposit","class"=>"form-control","readonly"=>true,"onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>$res->deposit));?>	</div>
		</div>
	</div>
</div>

 <hr/>

</div><!-- widget-box -->
</div>
<script>


</script>