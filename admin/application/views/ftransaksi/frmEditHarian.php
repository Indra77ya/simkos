<div id="errorHandler3" class="alert alert-danger no-display"></div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_daily_edit"));?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title">Form Entri Pendaftaran Harian</h4>
	</div><!-- widget-header -->
<br>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi/Cabang Kost</label>
			<div class="col-sm-4">
			<?	
				
					echo '<input type="hidden" name="lokasi_hr" id ="lokasi_hr" value="'.$lokasi->id.'"/>';
					echo '<label  class="col-sm-4 control-label">'.$lokasi->lokasi.'</label>';
				
				?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Registrasi</label>
			<div class="col-sm-4"><input type="hidden" name="hr_noreg" id ="hr_noreg" size="20" value="<?php echo $res->idPendaftaran?>"/><label class="col-sm-4 control-label"><B><?php echo $res->idPendaftaran?></B></label></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Kamar*</label>
			<div class="col-sm-6 "><?=form_input(array("name"=>"bln_lblkamar","id"=>"bln_lblkamar","class"=>"form-control", "value"=>$resKamar->LABELKAMAR, "readonly"=>true));?>
			<label  style="text-align:left">Gunakan Form Pindah kamar untuk ubah kamar</label>
			<input type="hidden" name="hr_idkamar" id="hr_idkamar"  size="20"  value="<?php echo $resKamar->IDKAMAR?>"/>
			
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Tarif</label>
			<div class="col-sm-3"><?=form_input(array("name"=>"hr_tarif","id"=>"hr_tarif","class"=>"form-control", "readonly"=>true, "value"=>$resKamar->TARIFHARIAN));?></div>
			<label  class="col-sm-2 control-label">&nbsp;Diskon Tarif</label><div class="col-sm-3"><?=form_input(array("name"=>"hr_diskon","id"=>"hr_diskon","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>$res->diskon));?></div>
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Fasilitas</label>
			<div class="col-sm-8"><?=form_textarea(array("name"=>"hr_fasilitas","id"=>"hr_fasilitas","class"=>"form-control", "readonly"=>true, "rows"=>3, "cols"=>30, "value"=>$resKamar->FASILITAS));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Check In</label>
			<div class="col-sm-4">
			<div class="input-group input-group-sm">
				<input type="text" id="hr_tglcheckin" name="hr_tglcheckin" class="form-control" value="<?php echo $res->tglCek_in?>"/>
				<span class="input-group-addon" id="hr_tglcheckin_ico">
				<i class="ace-icon fa fa-calendar"></i>
				</span>
				</div>
			<label class="control-label"><i>Format yyyy-mm-dd</i></label>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Lama</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"hr_lama","id"=>"hr_lama","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "onkeyup"=>"getCheckOutDaily(this.value)","value"=>$res->lama));?>	</div><label  class="col-sm-4 ">Hari</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Check Out</label>
			
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="hr_tglcheckout" name="hr_tglcheckout" class="form-control"  value="<?php echo $res->tglCek_out?>" readonly/>
					<span class="input-group-addon" id="hr_tglcheckout_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>		<label class="control-label"><i>Format yyyy-mm-dd</i></label>	
			</div>

		</div>
	</div>
</div>


<div class="widget-header">
	<h4 class="widget-title">Data Pribadi</h4>
</div><!-- widget-header -->
<br>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Lengkap*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hr_nama_lengkap1","id"=>"hr_nama_lengkap1","class"=>"form-control","value"=>$res->nama));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Identitas	(KTP/SIM/NIM)*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hr_identitas1","id"=>"hr_identitas1","class"=>"form-control" ,"value"=>$res->noIdentitas));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp/HP*</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"hr_notelp1","id"=>"hr_notelp1","class"=>"form-control","onkeypress"=>"return numericVal(this,event)","value"=>$res->Telp));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">E-mail*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hr_email1","id"=>"hr_email1","class"=>"form-control","value"=>$res->email));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>
			<div class="col-sm-4"><?php	echo form_dropdown('hr_jnskelamin1',array('Pria'=>'Pria', 'Wanita'=>'Wanita'),$res->JK,'id="hr_jnskelamin1" class="form-control"');?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"hr_tempatlahir1","id"=>"hr_tempatlahir1","class"=>"form-control","value"=>$res->tempat_lahir));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="hr_tgllahir1" name="hr_tgllahir1" class="form-control" value="<?php echo $res->tgl_lahir?>"/>
					<span class="input-group-addon" id="hr_tgllahir1_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>			<label class="control-label"><i>Format yyyy-mm-dd</i></label>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Asal</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hr_alamat1","id"=>"hr_alamat1","class"=>"form-control","value"=>$res->alamat_asal));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Instansi(Sekolah/Kampus/Kantor)</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hr_nama_instansi","id"=>"hr_nama_instansi","class"=>"form-control","value"=>$res->namaInstansi));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Instansi(Sekolah/Kampus/Kantor) </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hr_alamat_instansi","id"=>"hr_alamat_instansi","class"=>"form-control","value"=>$res->alamatInstansi));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp Instansi</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"hr_notelp_instansi","id"=>"hr_notelp_instansi","class"=>"form-control","onkeypress"=>"return numericVal(this,event)","value"=>$res->telp_instansi));?>	</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-8" style="text-align:center">
	<input type="hidden" name="kamarAsal"  id="kamarAsal" size="20" readonly value="<?php echo $res->idKamar?>"/
	</div>
</div>

</div><!-- widget-box -->


<?php echo form_close();?>
<script type="text/javascript">


$("#hr_tglcheckin_ico").click(function() {
		$("#hr_tglcheckin").datepicker("show");
	});

$( "#hr_tglcheckin" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});


$("#hr_tgllahir1_ico").click(function() {
		$("#hr_tgllahir1").datepicker("show");
	});

$( "#hr_tgllahir1" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});

$("#hr_tgllahir2_ico").click(function() {
		$("#hr_tgllahir2").datepicker("show");
	});

$( "#hr_tgllahir2" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});

function getCheckOutDaily(lama){
	var tglIn=$("#hr_tglcheckin").val();
	$.ajax({
			type: 'POST',
			url: "<?php echo base_url('e_pendaftaran/getCheckOutDaily');?>",
			data: { lama : lama, tglIn: tglIn },				
			dataType: 'json',
			success: function(msg) {				
				console.log(msg);
				if(msg.status =='success'){
					$("#hr_tglcheckout").val(msg.tglOut);
									
				} else {
					$().showMessage('Terjadi kesalahan. Data gagal load.','danger',700);
				
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				bootbox.alert("Terjadi kesalahan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});
}	

</script>
