<?php errorHandler();
echo form_open_multipart('profil/data_login',array('class'=>'form-horizontal','id'=>'myform'));

?>
<div class="widget-box">
<div class="widget-header">
	<h4 class="widget-title">Data Pribadi</h4>
</div><!-- widget-header -->
<br/>
<div class="row">
	<div class="col-md-8">
	<div class="form-group"><label class="col-sm-4 control-label">&nbsp;</label>
		<div class="col-sm-8"><img id="myimg" name="myimg" src="<?php echo $foto?>" width="170" height="250" ></div>	
		</div>	
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Lengkap*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"nama_lengkap1","id"=>"nama_lengkap1","class"=>"form-control", "value"=>$res->NAMA));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Identitas	(KTP/SIM/NIM)*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"identitas1","id"=>"identitas1","class"=>"form-control", "value"=>$res->NOIDENTITAS));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">&nbsp;</label>
			<div class="col-sm-8"><img id="mycard" name="mycard" src="<?php echo $ktp?>" width="250" height="150">		</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp/HP*</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"notelp1","id"=>"notelp1","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>$res->NOTELP));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">E-mail*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"email1","id"=>"email1","class"=>"form-control", "value"=>$res->EMAIL, "readonly"=>true));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>
			<div class="col-sm-4"><?php	echo form_dropdown('jnskelamin1',array('Pria'=>'Pria', 'Wanita'=>'Wanita'),$res->JENISKELAMIN,'id="jnskelamin1" class="form-control"' );?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"tempatlahir1","id"=>"tempatlahir1","class"=>"form-control", "value"=>$res->TEMPAT_LAHIR));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="tgllahir1" name="tgllahir1" class="form-control" VALUE="<?php echo $res->TGLLAHIR?>"/>
					<span class="input-group-addon" id="tgllahir1_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>	<label class="control-label"><i>Format yyyy-mm-dd</i></label>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Asal* </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"alamat1","id"=>"alamat1","class"=>"form-control", "value"=>$res->ALAMAT_ASAL));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Instansi(Sekolah/Kampus/Kantor)</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"nama_instansi","id"=>"nama_instansi","class"=>"form-control" ,"value"=>$res->NAMA_PT));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Instansi(Sekolah/Kampus/Kantor) </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"alamat_instansi","id"=>"alamat_instansi","class"=>"form-control","value"=>$res->ALAMAT_KERJA_KULIAH));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp Instansi</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"notelp_instansi","id"=>"notelp_instansi","class"=>"form-control","onkeypress"=>"return numericVal(this,event)","value"=>$res->NOTELP_INSTANSI));?>	</div>
		</div>
	</div>
</div>

<div class="widget-header">
	<h4 class="widget-title">Orang yang bisa dihubungi</h4>
</div><!-- widget-header -->
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Lengkap</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"nama_lengkap2","id"=>"nama_lengkap2","class"=>"form-control","value"=>$res->NAMA_PJ));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Hubungah dengan penghuni</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hubungan","id"=>"hubungan","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Identitas	(KTP/SIM/NIM)</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"identitas2","id"=>"identitas2","class"=>"form-control","value"=>$res->NOIDENTITAS_PJ));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp/HP</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"notelp2","id"=>"notelp2","class"=>"form-control","onkeypress"=>"return numericVal(this,event)","value"=>$res->NOTELP_PJ));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">E-mail</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"email2","id"=>"email2","class"=>"form-control","value"=>$res->EMAIL_PJ));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>
			<div class="col-sm-4"><?php	echo form_dropdown('jnskelamin2',array('Pria'=>'Pria', 'Wanita'=>'Wanita'),$res->JENISKELAMIN_PJ,'id="jnskelamin2" class="form-control"');?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"tempat_lahir2","id"=>"tempat_lahir2","class"=>"form-control","value"=>$res->TEMPAT_LAHIR_PJ));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="tgllahir2" name="tgllahir2" class="form-control" value="<?php echo $res->TGL_LAHIR_PJ?>"/>
					<span class="input-group-addon" id="tgllahir2_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>		<label class="control-label"><i>Format yyyy-mm-dd</i></label>	
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"alamat2","id"=>"alamat2","class"=>"form-control","value"=>$res->ALAMAT_PJ));?>	</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-8"><label class="col-sm-4 control-label"></label>
	<input type="hidden" name="id" id="id" value="<?php echo $res->IDANAKKOST?>">
	<input type="hidden" name="idlokasi" id="idlokasi" value="<?php echo $res->IDLOKASI?>">
	<input type="hidden" name="jenis_sewa" id="jenis_sewa" value="<?php echo $res->JENIS_SEWA?>">
	<input type="button" class="btn btn-primary" id="btsimpan" value="Update">
	<button type="button" class="btn btn-default" id="btcancelkel">Batal</button>
	</div>
</div> <hr/>

</div><!-- widget-box -->

<script>

	$('#btsimpan').click(function(){		
		var form_data = $('#myform').serialize();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('profil/data_login');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data  berhasil disimpan.','success',1000);
					
					//window.location.reload();
					
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