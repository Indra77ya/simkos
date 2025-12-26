<div id="errorHandler" class="alert alert-danger no-display"></div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_thn"));?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title">Form Entri Pendaftaran Tahunan</h4>
	</div><!-- widget-header -->
	<br>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi/Cabang Kost</label>
			<div class="col-sm-4">
			<?	
				if ($this->session->userdata('auth')->ROLE=="Superadmin"){
					echo form_dropdown('lokasi_thn',$lokasi,'','id="lokasi_thn" class="form-control"');
				}else{
					echo '<input type="hidden" name="lokasi_thn" id ="lokasi_thn" value="'.$lokasi->id.'"/>';
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
			<div class="col-sm-4"><input type="hidden" name="thn_noreg" id ="thn_noreg" size="20" value="<?=date('YmdHis')?>"/><label class="col-sm-4 control-label"><B><?=date('YmdHis')?></B></label></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Kamar*</label>
			<div class="col-md-6 form-inline"><?=form_input(array("name"=>"thn_lblkamar","id"=>"thn_lblkamar","class"=>"form-control"));?>
			<input type="hidden" name="thn_idkamar" id="thn_idkamar"   />			
			&nbsp;
			<? echo '<a href="javascript:void(0)" id="btn_thn_pilihkamar" class="btn btn-purple btn-sm inline" >Pilih Kamar</a>'; ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Tarif</label>
			<div class="col-sm-3"><?=form_input(array("name"=>"thn_tarif","id"=>"thn_tarif","class"=>"form-control", "readonly"=>true));?></div>
			<label  class="col-sm-2 control-label">&nbsp;Diskon Tarif</label><div class="col-sm-3"><?=form_input(array("name"=>"thn_diskon","id"=>"thn_diskon","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>0));?></div>
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Fasilitas</label>
			<div class="col-sm-8"><?=form_textarea(array("name"=>"thn_fasilitas","id"=>"thn_fasilitas","class"=>"form-control", "readonly"=>true, "rows"=>3, "cols"=>30));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Mulai Masuk</label>
			<div class="col-sm-8">
			<div class="input-group input-group-sm">
				<input type="text" id="thn_tgldaftar" name="thn_tgldaftar" class="form-control" value="<?php echo date('Y-m-d')?>"/>
				<span class="input-group-addon" id="thn_tgldaftar_ico">
				<i class="ace-icon fa fa-calendar"></i>
				</span>
				</div>
				<label class="control-label"><i>Format yyyy-mm-dd, Sebagai patokan tanggal muncul tagihan berikutnya</i></label>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tahun Mulai (YYYY)</label>
			
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<?=form_input(array("name"=>"thn_mulai","id"=>"thn_mulai","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>date('Y')));?>
				</div>			
			</div>

		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Posisi Meteran Listrik</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"thn_posisi_meteran","id"=>"thn_posisi_meteran","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>0));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Deposit</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"thn_deposit","id"=>"thn_deposit","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>0));?>	</div>
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
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_nama_lengkap1","id"=>"thn_nama_lengkap1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Foto</label>
			<div class="col-sm-8"><?=form_upload(array('name'=>'userfile_thn','id'=>'userfile_thn','class'=>'form-control', 'onchange'=>"readURL(this,'imgFoto_thn')"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">&nbsp;</label>
			<div class="col-sm-8"><img id="imgFoto_thn" name="imgFoto_thn" src="<?php echo base_url("assets/images/placeholder/none.gif")?>" width="130" height="150">	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Identitas	(KTP/SIM/NIM)*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_identitas1","id"=>"thn_identitas1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Upload Kartu Identitas</label>
			<div class="col-sm-8"><?=form_upload(array('name'=>'filecard_thn','id'=>'filecard_thn','class'=>'form-control', 'onchange'=>"readURL(this,'imgCard_thn')"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">&nbsp;</label>
			<div class="col-sm-8"><img id="imgCard_thn" name="imgCard_thn" src="<?php echo base_url("assets/images/placeholder/none.gif")?>" width="250" height="150">	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp/HP*</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"thn_notelp1","id"=>"thn_notelp1","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>0));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">E-mail</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_email1","id"=>"thn_email1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>
			<div class="col-sm-4"><?php	echo form_dropdown('thn_jnskelamin1',array('Pria'=>'Pria', 'Wanita'=>'Wanita'),'','id="thn_jnskelamin1" class="form-control"');?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"thn_tempatlahir1","id"=>"thn_tempatlahir1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="thn_tgllahir1" name="thn_tgllahir1" class="form-control" />
					<span class="input-group-addon" id="thn_tgllahir1_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>			
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Asal </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_alamat1","id"=>"thn_alamat1","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Instansi(Sekolah/Kampus/Kantor)</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_nama_instansi","id"=>"thn_nama_instansi","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Instansi(Sekolah/Kampus/Kantor) </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_alamat_instansi","id"=>"thn_alamat_instansi","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp Instansi</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"thn_notelp_instansi","id"=>"thn_notelp_instansi","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>0));?>	</div>
		</div>
	</div>
</div>

<div class="widget-header">
	<h4 class="widget-title">Orang yang bisa dihubungi</h4>
</div><!-- widget-header -->
<br>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Lengkap</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_nama_lengkap2","id"=>"thn_nama_lengkap2","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Hubungah dengan penghuni</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_hubungan","id"=>"thn_hubungan","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Identitas	(KTP/SIM/NIM)</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_identitas2","id"=>"thn_identitas2","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp/HP</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"thn_notelp2","id"=>"thn_notelp2","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>0));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">E-mail</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_email2","id"=>"thn_email2","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>
			<div class="col-sm-4"><?php	echo form_dropdown('thn_jnskelamin2',array('Pria'=>'Pria', 'Wanita'=>'Wanita'),'','id="thn_jnskelamin2" class="form-control"');?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"thn_tempat_lahir2","id"=>"thn_tempat_lahir2","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="thn_tgllahir2" name="thn_tgllahir2" class="form-control" />
					<span class="input-group-addon" id="thn_tgllahir2_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>			
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_alamat2","id"=>"thn_alamat2","class"=>"form-control"));?>	</div>
		</div>
	</div>
</div>


<div class="widget-header">
	<h4 class="widget-title">Biaya Tambahan Fasilitas</h4>
</div><!-- widget-header -->
<br>
<div class="row"><label class="control-label">Jika pendaftar membawa perlengkapan pribadi yang mengkonsumsi listrik & tempat selain yang disediakan. Biaya dikenakan per bulan</label></DIV>

<table  border="0" cellspacing=0 id="tbDetil_thn" class="table  table-bordered table-hover">   
  <thead> <tr><th>No</th><th>Biaya</th><th>Tarif</th></tr></thead>
  <tr valign=top>
			<td>1</td>
			<td><select name="cbJnsBiaya_thn_0" id="cbJnsBiaya_thn_0" onchange="displayTarifThn(this,0)" class="form-control"> 
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
			<td><input type="text" name="txtTarifThn_0" id="txtTarifThn_0" size="15" value="0" readonly class="form-control"></td></tr>
</table>
<table width="100%">			
<tr>
    <td align="center">
	<INPUT TYPE="button" name="btAddRowThn" id="btAddRowThn" value="Tambah Biaya" class="btn btn-purple btn-sm" onClick="addRowThn('tbDetil_thn',)" >&nbsp;
	<INPUT TYPE="hidden" id="jmlRowThn" name="jmlRowThn" value="1">
	</td>
  </tr>
</table>
<br>
<div class="row">
	<div class="col-md-12" style="text-align:center">
	
	<input type="Button" class="btn  btn-primary " id="btsimpan_thn" value="Simpan">
	<button class="btn  btn-warning" id="btcancel_thn"><i class="ace-icon fa fa-refresh bigger-125"></i>Batal</button>

	</div>
</div>
<br>
</div><!-- widget-box -->
<?php echo form_close();?>


<script type="text/javascript">
$("#thn_tglinap_ico").click(function() {
		$("#thn_tglinap").datepicker("show");
	});

$( "#thn_tglinap" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});

$("#thn_tgldaftar_ico").click(function() {
		$("#thn_tgldaftar").datepicker("show");
	});

$( "#thn_tgldaftar" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					onSelect: function(date) {
						var mydate = $(this).datepicker('getDate'), year = mydate .getFullYear();
						$("#thn_mulai").val(year);
					},
					
				});

$("#thn_tgllahir1_ico").click(function() {
		$("#thn_tgllahir1").datepicker("show");
	});

$( "#thn_tgllahir1" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});

$("#thn_tgllahir2_ico").click(function() {
		$("#thn_tgllahir2").datepicker("show");
	});

$( "#thn_tgllahir2" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});

function displayTarifThn(oFee,idx){
	$.ajax({
			type: 'POST',
			url: "<?php echo base_url('e_pendaftaran/getfee');?>",
			data: { idFee : oFee.value },				
			dataType: 'json',
			success: function(msg) {				
				console.log(msg);
				if(msg.status =='success'){
				
					$("#txtTarifThn_"+idx).val(msg.tarif);	
					$("#btAddRowThn").attr("disabled", false);
									
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

$("#thn_email1").blur(function() {
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
					$("#thn_email1").val('');
					$("#thn_email1").focus();
					
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger',2000);
			},
			cache: false
		});
});
$('#btsimpan_thn').click(function(e){	
		e.preventDefault();
         var file_data = $('#userfile_thn').prop('files')[0];
         var file_card = $('#filecard_thn').prop('files')[0];
		 var form1 = $('form')[0];
         var form_data = new FormData(form1);
 
        form_data.append('file', file_data);
		form_data.append('file_card', file_card);
			
		//var form_data = $('#myform_thn').serialize();
		$().showMessage('Sedang diproses.. Harap tunggu..');
		var notelp=$("#thn_notelp1").val(); 
		var nohp;
		if (notelp.startsWith('0')) {
		    nohp = '+62' + notelp.substring(1);
		} else {
		    nohp = notelp;
		}
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pendaftaran/saveTahunan');?>',
			data: form_data,				
			dataType: 'json',
			contentType: false, 
			processData: false,
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data pendaftaran sewa tahunan berhasil disimpan.','success',1000);
					bootbox.dialog({
					  onEscape	:true,					 
					  message: "Data pendaftaran sewa tahunan berhasil disimpan. Silahkan memilih Proses selanjutnya",
					  title: "Konfirmasi",
					  buttons: {
						success: {
						  label: "Form Pembayaran",
						  className: "btn-success",
						  callback: function() {							
							window.location.href="<?php echo base_url('e_pembayaran/form_entri/Tahunan_');?>"+ $("#thn_noreg").val()+"_"+ $("#lokasi_thn").val();
						  }
						},
						confirm: {
						  label: "Cetak Data Pendaftaran",
						  className: "btn-success",
						  callback: function() {
							
							window.location.href="<?php echo base_url('rpt_pendaftaran/view_data/Tahunan_0_');?>"+ $("#thn_noreg").val()+"_"+ $("#lokasi_thn").val();
						  }
						},
						primary: {
						  label: "Kirim Data Login",
						  className: "btn-success",
						  callback: function() {
												
							window.location.href="https://wa.me/"+nohp+"?text=Login aplikasi penghuni : username: "+$("#thn_email1").val()+", password: 12345";
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

	$("#btn_thn_pilihkamar").click(function() {
		var idlokasi=$("#lokasi_thn").val();
		openRoomList("<?php echo base_url('kamar/loadRoomList'); ?>", "tahunan", idlokasi);
	});
	
</script>
