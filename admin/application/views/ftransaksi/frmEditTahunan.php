
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.min.css');?>" />
<script src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>

<div id="errorHandler" class="alert alert-danger no-display"></div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_thn_edit"));?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title">Form Entri Pendaftaran Tahunan</h4>
	</div><!-- widget-header -->
<br>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi/Cabang Kost</label>
			<div class="col-sm-7">
			<?				
					echo '<input type="hidden" name="lokasi_thn" id ="lokasi_thn" value="'.$lokasi->id.'"/>';
					echo '<label  class="control-label">'.$lokasi->lokasi.'</label>';
							
				
				?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Registrasi</label>
			<div class="col-sm-4"><input type="hidden" name="thn_noreg" id ="thn_noreg" size="20" value="<?php echo $res->idpendaftaran?>"/><label class="col-sm-4 control-label"><B><?php echo $res->idpendaftaran?></B></label></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Kamar*</label>
			<div class="col-sm-8 "><?=form_input(array("name"=>"thn_lblkamar","id"=>"thn_lblkamar","class"=>"form-control", "value"=>$res->labelkamar, "readonly"=>true));?>
			<label  style="text-align:left">Gunakan Form Pindah kamar untuk ubah kamar</label>
			<input type="hidden" name="thn_idkamar" id="thn_idkamar"  size="20"  value="<?php echo $res->idkamar?>"/>
			
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Tarif</label>
			<div class="col-sm-3"><?=form_input(array("name"=>"thn_tarif","id"=>"thn_tarif","class"=>"form-control", "readonly"=>true, "value"=>$res->tariftahunan));?></div>
			<label  class="col-sm-2 control-label">&nbsp;Diskon Tarif</label><div class="col-sm-3"><?=form_input(array("name"=>"thn_diskon","id"=>"thn_diskon","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)",  "value"=>$res->diskon));?></div>
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Fasilitas</label>
			<div class="col-sm-8"><?=form_textarea(array("name"=>"thn_fasilitas","id"=>"thn_fasilitas","class"=>"form-control", "readonly"=>true, "rows"=>3, "cols"=>30, "value"=>$res->fasilitas));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Mulai Masuk</label>
			<div class="col-sm-8">
			<div class="input-group input-group-sm ">
				<input type="text" id="thn_tgldaftar" name="thn_tgldaftar" class="form-control" value="<?php echo $res->tgldaftar?>"/>
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
		<div class="form-group"><label class="col-sm-4 control-label">Tahun Mulai </label>
			
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<?=form_input(array("name"=>"thn_mulai","id"=>"thn_mulai","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>$res->thn_mulai));?>
				</div>

		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Posisi Meteran Listrik</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"thn_posisi_meteran","id"=>"thn_posisi_meteran","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>$res->kwh_awal));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Deposit</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"thn_deposit","id"=>"thn_deposit","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>$res->deposit));?>	</div>
		</div>
	</div>
</div>

<div class="widget-header">
	<h4 class="widget-title">Data Pribadi</h4>
</div><!-- widget-header -->
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Lengkap*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_nama_lengkap1","id"=>"thn_nama_lengkap1","class"=>"form-control", "value"=>$res->NAMA));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Foto</label>
			<div class="col-sm-8"><?=form_upload(array('name'=>'userfile','id'=>'userfile','class'=>'form-control', 'onchange'=>"readURL(this,'imgFoto_thn')"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">&nbsp;</label>
			<div class="col-sm-8"><img id="imgFoto_thn" name="imgFoto_thn" src="<?php echo base_url("assets/images/".($res->FOTO==""?"placeholder/none.gif":"foto/".$res->FOTO))?>" width="130" height="130">	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Identitas	(KTP/SIM/NIM)*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_identitas1","id"=>"thn_identitas1","class"=>"form-control", "value"=>$res->NOIDENTITAS));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Upload Kartu Identitas</label>
			<div class="col-sm-8"><?=form_upload(array('name'=>'filecard','id'=>'filecard','class'=>'form-control', 'onchange'=>"readURL(this,'imgCard_thn')"));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">&nbsp;</label>
			<div class="col-sm-8"><img id="imgCard_thn" name="imgCard_thn" src="<?php echo base_url("assets/images/".($res->IMGIDENTITAS==""?"placeholder/none.gif":"foto/".$res->IMGIDENTITAS))?>" width="250" height="150">	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp/HP*</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"thn_notelp1","id"=>"thn_notelp1","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "value"=>$res->NOTELP));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">E-mail*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_email1","id"=>"thn_email1","class"=>"form-control", "value"=>$res->EMAIL, "readonly"=>true));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>
			<div class="col-sm-4"><?php	echo form_dropdown('thn_jnskelamin1',array('Pria'=>'Pria', 'Wanita'=>'Wanita'),$res->JENISKELAMIN,'id="thn_jnskelamin1" class="form-control"' );?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"thn_tempatlahir1","id"=>"thn_tempatlahir1","class"=>"form-control", "value"=>$res->TEMPAT_LAHIR));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="thn_tgllahir1" name="thn_tgllahir1" class="form-control" VALUE="<?php echo $res->TGLLAHIR?>"/>
					<span class="input-group-addon" id="thn_tgllahir1_ico">
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
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_alamat1","id"=>"thn_alamat1","class"=>"form-control", "value"=>$res->ALAMAT_ASAL));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Instansi(Sekolah/Kampus/Kantor)</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_nama_instansi","id"=>"thn_nama_instansi","class"=>"form-control" ,"value"=>$res->NAMA_PT));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Instansi(Sekolah/Kampus/Kantor) </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_alamat_instansi","id"=>"thn_alamat_instansi","class"=>"form-control","value"=>$res->ALAMAT_KERJA_KULIAH));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp Instansi</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"thn_notelp_instansi","id"=>"thn_notelp_instansi","class"=>"form-control","onkeypress"=>"return numericVal(this,event)","value"=>$res->NOTELP_INSTANSI));?>	</div>
		</div>
	</div>
</div>

<div class="widget-header">
	<h4 class="widget-title">Orang yang bisa dihubungi</h4>
</div><!-- widget-header -->
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Lengkap</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_nama_lengkap2","id"=>"thn_nama_lengkap2","class"=>"form-control","value"=>$res->NAMA_PJ));?>	</div>
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
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_identitas2","id"=>"thn_identitas2","class"=>"form-control","value"=>$res->NOIDENTITAS_PJ));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp/HP</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"thn_notelp2","id"=>"thn_notelp2","class"=>"form-control","onkeypress"=>"return numericVal(this,event)","value"=>$res->NOTELP_PJ));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">E-mail</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_email2","id"=>"thn_email2","class"=>"form-control","value"=>$res->EMAIL_PJ));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>
			<div class="col-sm-4"><?php	echo form_dropdown('thn_jnskelamin2',array('Pria'=>'Pria', 'Wanita'=>'Wanita'),$res->JENISKELAMIN_PJ,'id="thn_jnskelamin2" class="form-control"');?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"thn_tempat_lahir2","id"=>"thn_tempat_lahir2","class"=>"form-control","value"=>$res->TEMPAT_LAHIR_PJ));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="thn_tgllahir2" name="thn_tgllahir2" class="form-control" value="<?php echo $res->TGL_LAHIR_PJ?>"/>
					<span class="input-group-addon" id="thn_tgllahir2_ico">
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
			<div class="col-sm-8"><?=form_input(array("name"=>"thn_alamat2","id"=>"thn_alamat2","class"=>"form-control","value"=>$res->ALAMAT_PJ));?>	</div>
		</div>
	</div>
</div>


<div class="widget-header">
	<h4 class="widget-title">Biaya Tambahan Fasilitas</h4>
</div><!-- widget-header -->

<div class="row"><label class="col-md-10 control-label">Jika pendaftar membawa perlengkapan pribadi yang mengkonsumsi listrik & tempat selain yang disediakan. Biaya dikenakan per bulan</label></DIV>

<table  border="0" cellspacing=0 id="tbDetil" class="table  table-bordered table-hover">   
  <thead> <tr><th>No</th><th>Biaya</th><th>Tarif</th></tr></thead>
<?	$strCek=" select count(*) cek from detildaftar_tahunan where idpendaftaran ='".$res->idpendaftaran."' and idanakkost='".$res->IDANAKKOST."' and idBiaya<>0";
	$queryCek = $this->db->query($strCek)->row();
	if ($queryCek->cek <=0){
		$k=1;
?>
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
<?
	}else{
		$sqlBiaya=" select d.*, b.tarif from detildaftar_tahunan d, biaya_tambahan b where d.idBiaya=b.id and idpendaftaran ='".$res->idpendaftaran."' and idanakkost='".$res->IDANAKKOST."'";
		$queryRows = $this->db->query($sqlBiaya)->result();
		$k=0;
		
		foreach($queryRows as $rows){
			?>
			
		<tr valign=top>
			<td><?php echo $k+1;?></td>
			<td><select name="cbJnsBiaya_<?php echo $k?>" id="cbJnsBiaya_<?php echo $k?>" onchange="displayTarif(this,<?php echo $k?>)" class="form-control"> 
			<option value="0">-</option>
			<?
				$strB="Select * from biaya_tambahan order by id";
				$queryB = $this->db->query($strB)->result();
				
				$opt="";
				$i=0;
				
				foreach($queryB as $rs){
					$opt.="<option value='".$rs->id."' ".($rs->id == $rows->idBiaya?" selected":"").">".$rs->jenisbiaya."</option>";
					$biaya[$i]=$rs->tarif;
					$i++;
				}
				echo $opt;
			?>	
			</select></td>
			<td><input type="text" name="txtTarif_<?php echo $k?>" id="txtTarif_<?php echo $k?>" size="15" value="<?php echo $rows->tarif?>" readonly class="form-control"></td></tr>	
			<?
			$k++;

		}

	}
			
			?>
</table>
<table width="100%">			
<tr>
    <td align="center">
	<INPUT TYPE="button" name="btAddRow" id="btAddRow" value="Tambah Biaya" class="btn btn-purple btn-sm" onClick="addRow('tbDetil')" >&nbsp;
	<INPUT TYPE="hidden" id="jmlRow" name="jmlRow" value="<?php echo $k?>">
	<input type="hidden" name="idanakkost"  id="idanakkost" size="20" readonly value="<?php echo $res->IDANAKKOST?>"/>
	<input type="hidden" name="kamarAsal"  id="kamarAsal" size="20" readonly value="<?php echo $res->idkamar?>"/>
	</td>
  </tr>
</table>
<br>
<div class="row">
	<div class="col-md-12" style="text-align:center">
	
	<!-- <input type="Button" class="btn  btn-primary " id="btsimpan_thn" value="Simpan">
	<button class="btn  btn-warning" id="btcancel_thn"><i class="ace-icon fa fa-refresh bigger-125"></i>Batal</button> -->

	</div>
</div>
<br>
</div><!-- widget-box -->







<?php echo form_close();?>
<script type="text/javascript">
 $(document).ready(function() {


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
					selectOtherMonths: false, //isRTL:true,			
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					onSelect: function(date) {
						var mydate = $(this).datepicker('getDate'), year = mydate .getFullYear();
						$("#thn_mulai").val(year);
					}
								
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



</script>
