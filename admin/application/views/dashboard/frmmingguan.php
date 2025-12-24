<div id="errorHandler2" class="alert alert-danger no-display"></div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_week"));?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title">Form Entri Pendaftaran Mingguan</h4>
	</div><!-- widget-header -->
<br>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi/Cabang Kost</label>
			<div class="col-sm-4">
			<?	
					echo '<input type="hidden" name="lokasi_mgg" id ="lokasi_mgg" value="'.$lokasi->id.'"/>';
					echo '<label  class="col-sm-4 control-label">'.$lokasi->lokasi.'</label>';
								
				
				?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">No. Registrasi</label>
			<div class="col-sm-4"><input type="hidden" name="mgg_noreg" id ="mgg_noreg" size="20" value="<?=date('YmdHis')?>"/><label class="col-sm-4 control-label"><B><?=date('YmdHis')?></B></label></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label  class="col-sm-4 control-label">Kamar</label>
			<div class="col-sm-7 "><?=form_input(array("name"=>"mgg_lblkamar", "value"=>$kamar->LABELKAMAR, "readonly"=>true,"id"=>"mgg_lblkamar","class"=>"form-control"));?>
			<input type="hidden" name="mgg_idkamar" id="mgg_idkamar" size="20" value="<?php echo $kamar->IDKAMAR?>" readonly /></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label  class="col-sm-4 control-label">Tarif</label>
			<div class="col-sm-3"><?=form_input(array("name"=>"mgg_tarif","id"=>"mgg_tarif", "value"=>$kamar->TARIFMINGGUAN,"class"=>"form-control", "readonly"=>true));?></div>
			<label  class="col-sm-2 control-label">&nbsp;Diskon Tarif</label><div class="col-sm-3"><?=form_input(array("name"=>"mgg_diskon","id"=>"mgg_diskon","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>0));?></div>
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label  class="col-sm-4 control-label">Fasilitas</label>
			<div class="col-sm-8"><?=form_textarea(array("name"=>"mgg_fasilitas", "value"=>$kamar->FASILITAS,"id"=>"mgg_fasilitas","class"=>"form-control", "readonly"=>true, "rows"=>3, "cols"=>30));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Check In*</label>
			<div class="col-sm-4">
			<div class="input-group input-group-sm">
				<input type="text" id="mgg_tglcheckin" name="mgg_tglcheckin" class="form-control" style="position: relative; z-index: 1600;" readonly/>
				<span class="input-group-addon" id="mgg_tglcheckin_ico">
				<i class="ace-icon fa fa-calendar"></i>
				</span>
				</div>
			*yyyy-mm-dd
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Lama*</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"mgg_lama","id"=>"mgg_lama","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)","onkeyup"=>"getCheckOut(this.value)", "value"=>0));?>	</div><label  class="control-label">Pekan</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Check Out</label>
			
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="mgg_tglcheckout" name="mgg_tglcheckout" class="form-control" style="position: relative; z-index: 1600;" readonly/>
					<span class="input-group-addon" id="mgg_tglcheckout_ico">
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
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Lengkap*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"mgg_nama_lengkap1","id"=>"mgg_nama_lengkap1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">No. Identitas	(KTP/SIM/NIM)*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"mgg_identitas1","id"=>"mgg_identitas1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp/HP*</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"mgg_notelp1","id"=>"mgg_notelp1","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>0));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">E-mail</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"mgg_email1","id"=>"mgg_email1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>
			<div class="col-sm-4"><?php	echo form_dropdown('mgg_jnskelamin1',array('Pria'=>'Pria', 'Wanita'=>'Wanita'),'','id="mgg_jnskelamin1" class="form-control"');?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"mgg_tempatlahir1","id"=>"mgg_tempatlahir1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Lahir</label>
			<div class="col-sm-6">
				<div class="input-group input-group-sm">
					<input type="text" id="mgg_tgllahir1" name="mgg_tgllahir1" class="form-control" style="position: relative; z-index: 1600;" readonly/>
					<span class="input-group-addon" id="mgg_tgllahir1_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>			
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Asal* </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"mgg_alamat1","id"=>"mgg_alamat1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Instansi(Sekolah/Kampus/Kantor)</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"mgg_nama_instansi","id"=>"mgg_nama_instansi","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Instansi(Sekolah/Kampus/Kantor) </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"mgg_alamat_instansi","id"=>"mgg_alamat_instansi","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp Instansi</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"mgg_notelp_instansi","id"=>"mgg_notelp_instansi","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>0));?>	</div>
		</div>
	</div>
</div>


<div class="widget-header">
	<h4 class="widget-title">Biaya Tambahan Fasilitas</h4>
</div><!-- widget-header -->
<br>
<div class="row"><label class="control-label">Jika pendaftar membawa perlengkapan pribadi yang mengkonsumsi listrik & tempat selain yang disediakan. Biaya dikenakan per bulan</label></DIV>

<table  border="0" cellspacing=0 id="tbDetil_mgg" class="table  table-bordered table-hover">   
  <thead> <tr><th>No</th><th>Biaya</th><th>Tarif</th></tr></thead>
  <tr valign=top>
			<td>1</td>
			<td><select name="mgg_cbJnsBiaya_0" id="mgg_cbJnsBiaya_0" onchange="displayTarif_mgg(this,0)" class="form-control"> 
			<option value="0">-</option>
			<?
				$str="Select * from biaya_tambahan order by id";
				$query = $this->db->query($str)->result();
				//$sql=mysql_query($str);
				$opt="";
				$i=0;
				//while ( $rs=mysql_fetch_row($sql)){	
				foreach($query as $rs){
					$opt.="<option value='".$rs->id."'>".$rs->jenisbiaya."</option>";
					$biaya[$i]=$rs->tarif;
					$i++;
				}
				echo $opt;
			?>	
			</select></td>
			<td><input type="text" name="mgg_txtTarif_0" id="mgg_txtTarif_0" size="15" value="0" readonly class="form-control"></td></tr>
</table>
<table width="100%">			
<tr>
    <td align="center">
	<INPUT TYPE="button" name="btAddRow_mgg" id="btAddRow_mgg" value="Tambah Biaya" class="btn btn-purple " onClick="addRow_mgg('tbDetil_mgg')" >
	<label class=" control-label">&nbsp;&nbsp;&nbsp;</label>
	<INPUT TYPE="hidden" id="jmlRow_mgg" name="jmlRow_mgg" value="1">
	<input type="Button" class="btn  btn-primary " id="btsimpan_mgg" value="Simpan">
	</td>
  </tr>
</table>
</div><!-- widget-box -->

<?php echo form_close();?>
<script type="text/javascript">

function getCheckOut(lama){
	var tglIn=$("#mgg_tglcheckin").val();
	$.ajax({
			type: 'POST',
			url: "<?php echo base_url('e_pendaftaran/getCheckOut');?>",
			data: { lama : lama, tglIn: tglIn },				
			dataType: 'json',
			success: function(msg) {				
				console.log(msg);
				if(msg.status =='success'){
					$("#mgg_tglcheckout").val(msg.tglOut);
									
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
$("#mgg_tglcheckin_ico").click(function() {
		$("#mgg_tglcheckin").datepicker("show");
	});

$( "#mgg_tglcheckin" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});


$("#mgg_tgllahir1_ico").click(function() {
		$("#mgg_tgllahir1").datepicker("show");
	});

$( "#mgg_tgllahir1" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});

$("#mgg_tgllahir2_ico").click(function() {
		$("#mgg_tgllahir2").datepicker("show");
	});

$( "#mgg_tgllahir2" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});

$("#btn_mgg_pilihkamar").click(function() {
		var idlokasi=$("#lokasi_mgg").val();
		openRoomList("<?php echo base_url('kamar/loadRoomList'); ?>", "mingguan", idlokasi);
	});	
	
$('#btsimpan_mgg').click(function(event){	
		event.preventDefault();
		var form_data = $('#myform_week').serialize();
		$().showMessage('Sedang diproses.. Harap tunggu..');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pendaftaran/saveMingguan');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler2").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data pendaftaran sewa mingguan berhasil disimpan.','success',1000);
					bootbox.dialog({
					  onEscape	:true,					 
					  message: "Data pendaftaran sewa mingguan berhasil disimpan. Silahkan memilih Proses selanjutnya",
					  title: "Konfirmasi",
					  buttons: {
						success: {
						  label: "Form Pembayaran",
						  className: "btn-success",
						  callback: function() {
							window.location.href="<?php echo base_url('e_pembayaran/form_entri/Mingguan_');?>"+ $("#mgg_noreg").val() +"_"+ $("#lokasi_mgg").val();
						  }
						},
						confirm: {
						  label: "Cetak Data Pendaftaran",
						  className: "btn-success",
						  callback: function() {
							window.location.href="<?php echo base_url('rpt_pendaftaran/view_data/Mingguan_0_');?>"+ $("#mgg_noreg").val() +"_"+ $("#lokasi_mgg").val();
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
					alert('masuk sini');
					$().showMessage('Terjadi kesalahan. Data gagal disimpan.','danger',700);
					$("#errorHandler2").html(msg.errormsg).show();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				//$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger');
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan.<br>"+ msg.errormsg +	 " - " + errorThrown );
			},
			cache: false
		});
		//$().showMessage('Data pembelian berhasil disimpan, data order akan dikirim melalui sms','success',1000);
	});


	function displayTarif_mgg(oFee,idx){
		$.ajax({
				type: 'POST',
				url: "<?php echo base_url('e_pendaftaran/getfee');?>",
				data: { idFee : oFee.value },				
				dataType: 'json',
				success: function(msg) {				
					console.log(msg);
					if(msg.status =='success'){
					
						$("#mgg_txtTarif_"+idx).val(msg.tarif);	
						$("#btAddRow_mgg").attr("disabled", false);
										
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
	
	btAddRow_mgg
</script>
