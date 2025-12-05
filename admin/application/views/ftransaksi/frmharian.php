<div id="errorHandler3" class="alert alert-danger no-display"></div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_daily"));?>
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
				if ($this->session->userdata('auth')->ROLE=="Superadmin"){
					echo form_dropdown('lokasi_hr',$lokasi,'','id="lokasi_hr" class="form-control"');
				}else{
					echo '<input type="hidden" name="lokasi_hr" id ="lokasi_hr" value="'.$lokasi->id.'"/>';
					echo '<label  class="col-sm-4 control-label">'.$lokasi->lokasi.'</label>';
				}
				
				
				?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Registrasi</label>
			<div class="col-sm-4"><input type="hidden" name="hr_noreg" id ="hr_noreg" size="20" value="<?=date('YmdHis')?>"/><label class="col-sm-4 control-label"><B><?=date('YmdHis')?></B></label></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Kamar*</label>
			<div class="col-sm-4 form-inline"><?=form_input(array("name"=>"hr_lblkamar","id"=>"hr_lblkamar","class"=>"input-small"));?>
			<input type="hidden" name="hr_idkamar" id="hr_idkamar" size="20" readonly />
			&nbsp;
			<? echo '<a href="javascript:void(0)" id="btn_hr_pilihkamar" class="btn btn-purple btn-sm inline" >Pilih Kamar</a>'; ?>
				</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Tarif</label>
			<div class="col-sm-3"><?=form_input(array("name"=>"hr_tarif","id"=>"hr_tarif","class"=>"form-control", "readonly"=>true));?></div>
			<label  class="col-sm-2 control-label">&nbsp;Diskon Tarif</label><div class="col-sm-3"><?=form_input(array("name"=>"hr_diskon","id"=>"hr_diskon","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>0));?></div>
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Fasilitas</label>
			<div class="col-sm-8"><?=form_textarea(array("name"=>"hr_fasilitas","id"=>"hr_fasilitas","class"=>"form-control", "readonly"=>true, "rows"=>3, "cols"=>30));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Check In</label>
			<div class="col-sm-4">
			<div class="input-group input-group-sm">
				<input type="text" id="hr_tglcheckin" name="hr_tglcheckin" class="form-control" />
				<span class="input-group-addon" id="hr_tglcheckin_ico">
				<i class="ace-icon fa fa-calendar"></i>
				</span>
				</div>
			
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Lama</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"hr_lama","id"=>"hr_lama","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "onkeyup"=>"getCheckOutDaily(this.value)", "value"=>0));?>	</div><label  class="col-sm-4 ">Hari</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Check Out</label>
			
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="hr_tglcheckout" name="hr_tglcheckout" class="form-control" readonly/>
					<span class="input-group-addon" id="hr_tglcheckout_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>			
			</div>

		</div>
	</div>
</div>


<div class="widget-header">
	<h4 class="widget-title">Data Pribadi</h4>
</div><!-- widget-header -->
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Lengkap*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hr_nama_lengkap1","id"=>"hr_nama_lengkap1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Identitas	(KTP/SIM/NIM)*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hr_identitas1","id"=>"hr_identitas1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp/HP*</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"hr_notelp1","id"=>"hr_notelp1","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>0));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">E-mail</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hr_email1","id"=>"hr_email1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>
			<div class="col-sm-4"><?php	echo form_dropdown('hr_jnskelamin1',array('Pria'=>'Pria', 'Wanita'=>'Wanita'),'','id="hr_jnskelamin1" class="form-control"');?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"hr_tempatlahir1","id"=>"hr_tempatlahir1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="hr_tgllahir1" name="hr_tgllahir1" class="form-control" />
					<span class="input-group-addon" id="hr_tgllahir1_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>			
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Asal* </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hr_alamat1","id"=>"hr_alamat1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Instansi(Sekolah/Kampus/Kantor)</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hr_nama_instansi","id"=>"hr_nama_instansi","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Instansi(Sekolah/Kampus/Kantor) </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"hr_alamat_instansi","id"=>"hr_alamat_instansi","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp Instansi</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"hr_notelp_instansi","id"=>"hr_notelp_instansi","class"=>"form-control","onkeypress"=>"return numericVal(this,event)"));?>	</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-8" style="text-align:center">
	<input type="Button" class="btn  btn-primary " id="btsimpan_hr" value="Simpan">
	<!-- <button class="btn  btn-primary" id="btsimpan_hr"><i class="ace-icon fa fa-floppy-o bigger-125"></i>Simpan</button> -->
	<button class="btn  btn-warning" id="btcancel_hr"><i class="ace-icon fa fa-refresh bigger-125"></i>Batal</button>
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
$("#btn_hr_pilihkamar").click(function() {
		var idlokasi=$("#lokasi_hr").val();
		openRoomList("<?php echo base_url('kamar/loadRoomList'); ?>", "harian", idlokasi);
	});	

	$('#btsimpan_hr').click(function(){		
		var form_data = $('#myform_daily').serialize();
		$().showMessage('Sedang diproses.. Harap tunggu..');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pendaftaran/saveHarian');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler3").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data pendaftaran sewa harian berhasil disimpan.','success',1000);
					bootbox.dialog({
					  onEscape	:true,					 
					  message: "Data pendaftaran sewa harian berhasil disimpan. Silahkan memilih Proses selanjutnya",
					  title: "Konfirmasi",
					  buttons: {
						success: {
						  label: "Form Pembayaran",
						  className: "btn-success",
						  callback: function() {
							//payForm(msg.noreg,"harian");
							window.location.href="<?php echo base_url('e_pembayaran/form_entri/Harian_');?>"+ $("#hr_noreg").val() +"_"+ $("#lokasi_hr").val();
						  }
						},
						confirm: {
						  label: "Cetak Data Pendaftaran",
						  className: "btn-success",
						  callback: function() {
							//printReg(msg.noreg, "harian");
							window.location.href="<?php echo base_url('rpt_pendaftaran/view_data/Harian_0_');?>"+ $("#hr_noreg").val()+"_"+ $("#lokasi_hr").val();
						  }
						},
						main: {
						  label: "Tutup",
						  className: "btn-warning",
						  callback: function() {
							console.log("Primary button");
						  }
						}
					  }
					});					
					
				} else {
					$().showMessage('Terjadi kesalahan. Data gagal disimpan.','danger',700);
					$("#errorHandler3").html(msg.errormsg).show();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				//$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger');
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});
		//$().showMessage('Data pembelian berhasil disimpan, data order akan dikirim melalui sms','success',1000);
	});
</script>
