<div id="errorHandler" class="alert alert-danger no-display"></div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_bln"));?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title">Form Entri Pendaftaran Bulanan</h4>
	</div><!-- widget-header -->
	<br>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi/Cabang Kost</label>
			<div class="col-sm-4">
			<?	
					echo '<input type="hidden" name="lokasi_bln" id ="lokasi_bln" value="'.$lokasi->id.'"/>';
					echo '<label  class="col-sm-4 control-label">'.$lokasi->lokasi.'</label>';

				?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">No. Registrasi</label>
			<div class="col-sm-4"><input type="hidden" name="bln_noreg" id ="bln_noreg" size="20" value="<?=date('YmdHis')?>"/><label class="col-sm-4 control-label"><B><?=date('YmdHis')?></B></label></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label  class="col-sm-4 control-label">Kamar</label>
			<div class="col-md-7 "><?=form_input(array("name"=>"bln_lblkamar", "value"=>$kamar->LABELKAMAR,"id"=>"bln_lblkamar", "readonly"=>true,"class"=>"form-control"));?>
			<input type="hidden" name="bln_idkamar" id="bln_idkamar"  value="<?php echo $kamar->IDKAMAR?>" />			
			
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label  class="col-sm-4 control-label">Tarif</label>
			<div class="col-sm-3"><?=form_input(array("name"=>"bln_tarif","id"=>"bln_tarif", "value"=>$kamar->TARIFBULANAN,"class"=>"form-control", "readonly"=>true));?></div>
			<label  class="col-sm-2 control-label">&nbsp;Diskon Tarif</label><div class="col-sm-3"><?=form_input(array("name"=>"bln_diskon","id"=>"bln_diskon","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>0));?></div>
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label  class="col-sm-4 control-label">Fasilitas</label>
			<div class="col-sm-8"><?=form_textarea(array("name"=>"bln_fasilitas", "value"=>$kamar->FASILITAS,"id"=>"bln_fasilitas","class"=>"form-control", "readonly"=>true, "rows"=>3, "cols"=>30));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Daftar</label>
			<div class="col-sm-4">
			<div class="input-group input-group-sm">
				<input type="text" id="bln_tgldaftar" name="bln_tgldaftar" class="form-control" value="<?php echo date('Y-m-d')?>" style="position: relative; z-index: 1600;" readonly/>
				<span class="input-group-addon" id="bln_tgldaftar_ico">
				<i class="ace-icon fa fa-calendar"></i>
				</span>
				</div>
			
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Mulai Inap</label>
			
			<div class="col-sm-6">
				<div class="input-group input-group-sm">
					<input type="text" id="bln_tglinap" name="bln_tglinap" class="form-control" value="<?php echo date('Y-m-d')?>" style="position: relative; z-index: 1600;" readonly/>
					<span class="input-group-addon" id="bln_tglinap_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>		
			</div>

		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Posisi Meteran Listrik</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"bln_posisi_meteran","id"=>"bln_posisi_meteran","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>0));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Deposit</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"bln_deposit","id"=>"bln_deposit","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>0));?>	</div>
		</div>
	</div>
</div>

<div class="widget-header">
	<h4 class="widget-title">Data Pribadi</h4>
</div><!-- widget-header -->
<br>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Lengkap*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"bln_nama_lengkap1","id"=>"bln_nama_lengkap1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Foto</label>
			<div class="col-sm-8"><?=form_upload(array('name'=>'userfile_bln','id'=>'userfile_bln','class'=>'form-control', 'onchange'=>"readURL(this,'imgFoto_bln')"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">&nbsp;</label>
			<div class="col-sm-8"><img id="imgFoto_bln" name="imgFoto_bln" src="<?php echo base_url("assets/images/placeholder/none.gif")?>" width="130" height="150">	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">No. Identitas	(KTP/SIM/NIM)*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"bln_identitas1","id"=>"bln_identitas1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Upload Kartu Identitas</label>
			<div class="col-sm-8"><?=form_upload(array('name'=>'filecard_bln','id'=>'filecard_bln','class'=>'form-control', 'onchange'=>"readURL(this,'imgCard_bln')"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">&nbsp;</label>
			<div class="col-sm-8"><img id="imgCard_bln" name="imgCard_bln" src="<?php echo base_url("assets/images/placeholder/none.gif")?>" width="250" height="150">	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp/HP*</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"bln_notelp1","id"=>"bln_notelp1","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>0));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">E-mail*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"bln_email1","id"=>"bln_email1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>
			<div class="col-sm-4"><?php	echo form_dropdown('bln_jnskelamin1',array('Pria'=>'Pria', 'Wanita'=>'Wanita'),'','id="bln_jnskelamin1" class="form-control"');?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"bln_tempatlahir1","id"=>"bln_tempatlahir1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Lahir</label>
			<div class="col-sm-6">
				<div class="input-group input-group-sm">
					<input type="text" id="bln_tgllahir1" name="bln_tgllahir1" class="form-control" style="position: relative; z-index: 1600;" readonly/>
					<span class="input-group-addon" id="bln_tgllahir1_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>		
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Asal</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"bln_alamat1","id"=>"bln_alamat1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Instansi(Sekolah/Kampus/Kantor)</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"bln_nama_instansi","id"=>"bln_nama_instansi","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Instansi(Sekolah/Kampus/Kantor) </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"bln_alamat_instansi","id"=>"bln_alamat_instansi","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp Instansi</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"bln_notelp_instansi","id"=>"bln_notelp_instansi","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>0));?>	</div>
		</div>
	</div>
</div>

<div class="widget-header">
	<h4 class="widget-title">Orang yang bisa dihubungi</h4>
</div><!-- widget-header -->
<br>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Lengkap</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"bln_nama_lengkap2","id"=>"bln_nama_lengkap2","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Hubungah dengan penghuni</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"bln_hubungan","id"=>"bln_hubungan","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">No. Identitas	(KTP/SIM/NIM)</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"bln_identitas2","id"=>"bln_identitas2","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp/HP</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"bln_notelp2","id"=>"bln_notelp2","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>0));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">E-mail</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"bln_email2","id"=>"bln_email2","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>
			<div class="col-sm-4"><?php	echo form_dropdown('bln_jnskelamin2',array('Pria'=>'Pria', 'Wanita'=>'Wanita'),'','id="bln_jnskelamin2" class="form-control"');?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"bln_tempat_lahir2","id"=>"bln_tempat_lahir2","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Lahir</label>
			<div class="col-sm-6">
				<div class="input-group input-group-sm">
					<input type="text" id="bln_tgllahir2" name="bln_tgllahir2" class="form-control" style="position: relative; z-index: 1600;" readonly/>
					<span class="input-group-addon" id="bln_tgllahir2_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>	
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"bln_alamat2","id"=>"bln_alamat2","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>


<div class="widget-header">
	<h4 class="widget-title">Biaya Tambahan Fasilitas</h4>
</div><!-- widget-header -->
<br>
<div class="row"><label class="control-label">Jika pendaftar membawa perlengkapan pribadi yang mengkonsumsi listrik & tempat selain yang disediakan. Biaya dikenakan per bulan</label></DIV>

<table  border="0" cellspacing=0 id="tbDetil" class="table  table-bordered table-hover">   
  <thead> <tr><th>No</th><th>Biaya</th><th>Tarif</th></tr></thead>
  <tr valign=top>
			<td>1</td>
			<td><select name="cbJnsBiaya_0" id="cbJnsBiaya_0" onchange="displayTarif(this,0)" class="form-control"> 
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
			<td><input type="text" name="txtTarif_0" id="txtTarif_0" size="15" value="0" readonly class="form-control"></td></tr>
</table>
<table width="100%">			
<tr>
    <td align="center">
	
	<INPUT TYPE="button" name="btAddRow" id="btAddRow" value="Tambah Biaya" class="btn btn-purple " onClick="addRow('tbDetil')" >
	<label class=" control-label">&nbsp;&nbsp;&nbsp;</label>
	<input type="Button" class="btn  btn-primary " id="btsimpan_bln" value="Simpan">
	<INPUT TYPE="hidden" id="jmlRow" name="jmlRow" value="1">
	
	</td>
  </tr>
</table>

</div><!-- widget-box -->

<?php echo form_close();?>
<script type="text/javascript">


$("#bln_tglinap_ico").click(function() {
		$("#bln_tglinap").datepicker("show");
	});

$( "#bln_tglinap" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});

$("#bln_tgldaftar_ico").click(function() {
		$("#bln_tgldaftar").datepicker("show");
	});

$( "#bln_tgldaftar" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});

$("#bln_tgllahir1_ico").click(function() {
		$("#bln_tgllahir1").datepicker("show");
	});

$( "#bln_tgllahir1" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});

$("#bln_email1").blur(function() {
	//cek email
	$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pendaftaran/checkEmail');?>',
			data: {
				email:$(this).val()
			},
			dataType: 'json',
			success: function(msg) {
				if(msg.status !='success'){					
					bootbox.alert(msg.errormsg );	
					$("#bln_email1").val('');
					$("#bln_email1").focus();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger',2000);
			},
			cache: false
		});
});
$("#bln_tgllahir2_ico").click(function() {
		$("#bln_tgllahir2").datepicker("show");
	});

$( "#bln_tgllahir2" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});

function displayTarif(oFee,idx){
	$.ajax({
			type: 'POST',
			url: "<?php echo base_url('e_pendaftaran/getfee');?>",
			data: { idFee : oFee.value },				
			dataType: 'json',
			success: function(msg) {				
				console.log(msg);
				if(msg.status =='success'){
				
					$("#txtTarif_"+idx).val(msg.tarif);	
					$("#btAddRow").attr("disabled", false);
									
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

$('#btsimpan_bln').click(function(e){	
		e.preventDefault();
         var file_data = $('#userfile_bln').prop('files')[0];
         var file_card = $('#filecard_bln').prop('files')[0];
		 var form1 = $('form')[1];
         var form_data = new FormData(form1);
 
        form_data.append('file', file_data);
        form_data.append('file_card', file_card);	
		//var form_data = $('#myform_bln').serialize();
		$().showMessage('Sedang diproses.. Harap tunggu..');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pendaftaran/saveBulanan');?>',
			data: form_data,				
			dataType: 'json',
			contentType: false, 
			processData: false,
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data pendaftaran sewa bulanan berhasil disimpan.','success',1000);
					bootbox.dialog({
					  onEscape	:true,					 
					  message: "Data pendaftaran sewa bulanan berhasil disimpan. Silahkan memilih Proses selanjutnya",
					  title: "Konfirmasi",
					  buttons: {
						success: {
						  label: "Form Pembayaran",
						  className: "btn-success",
						  callback: function() {							
							window.location.href="<?php echo base_url('e_pembayaran/form_entri/Bulanan_');?>"+ $("#bln_noreg").val()+"_"+ $("#lokasi_bln").val();
						  }
						},
						confirm: {
						  label: "Cetak Data Pendaftaran",
						  className: "btn-success",
						  callback: function() {
							//printReg(msg.noreg, "bulanan");
							window.location.href="<?php echo base_url('rpt_pendaftaran/view_data/Bulanan_0_');?>"+ $("#bln_noreg").val()+"_"+ $("#lokasi_bln").val();
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
					
					$().showMessage('Terjadi kesalahan. Data gagal disimpan.<br>'+msg.errormsg ,'danger',700);
					
					$("#errorHandler").html(msg.errormsg).show();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				//$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger');
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan.<br>" +	textStatus + " - " + errorThrown );
			},
			cache: false
		});
		//$().showMessage('Data pembelian berhasil disimpan, data order akan dikirim melalui sms','success',1000);
	});

	$("#btn_bln_pilihkamar").click(function() {
		var idlokasi=$("#lokasi_bln").val();
		openRoomList("<?php echo base_url('kamar/loadRoomList'); ?>", "bulanan", idlokasi);
	});
	
</script>
