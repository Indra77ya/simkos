<!-- page specific plugin scripts -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>
<div id="errorHandler2" class="alert alert-danger no-display"></div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_week_edit"));?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title">Form Entri Pendaftaran Mingguan</h4>
	</div><!-- widget-header -->
<br>
<div class="row">
	<div class="col-md-8">
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
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Registrasi</label>
			<div class="col-sm-4"><input type="hidden" name="mgg_noreg" id ="mgg_noreg" size="20" value="<?php echo $res->idPendaftaran?>"/><label class="col-sm-4 control-label"><B><?php echo $res->idPendaftaran?></B></label></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Kamar*</label>
			<div class="col-sm-6 "><?=form_input(array("name"=>"bln_lblkamar","id"=>"bln_lblkamar","class"=>"form-control", "value"=>$resKamar->LABELKAMAR, "readonly"=>true));?>
			<label  style="text-align:left">Gunakan Form Pindah kamar untuk ubah kamar</label>
			<input type="hidden" name="mgg_idkamar" id="mgg_idkamar"  size="20"  value="<?php echo $resKamar->IDKAMAR?>"/>
			
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Tarif</label>
			<div class="col-sm-3"><?=form_input(array("name"=>"mgg_tarif","id"=>"mgg_tarif","class"=>"form-control", "readonly"=>true, "value"=>$resKamar->TARIFMINGGUAN));?></div>
			<label  class="col-sm-2 control-label">&nbsp;Diskon Tarif</label><div class="col-sm-3"><?=form_input(array("name"=>"mgg_diskon","id"=>"mgg_diskon","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>$res->diskon));?></div>
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Fasilitas</label>
			<div class="col-sm-8"><?=form_textarea(array("name"=>"mgg_fasilitas","id"=>"mgg_fasilitas","class"=>"form-control", "readonly"=>true, "rows"=>3, "cols"=>30, "value"=>$resKamar->FASILITAS));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Check In*</label>
			<div class="col-sm-4">
			<div class="input-group input-group-sm">
				<input type="text" id="mgg_tglcheckin" name="mgg_tglcheckin" class="form-control"  value="<?php echo $res->tglMulai?>"/>
				<span class="input-group-addon" id="mgg_tglcheckin_ico">
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
		<div class="form-group"><label class="col-sm-4 control-label">Lama*</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"mgg_lama","id"=>"mgg_lama","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)","onkeyup"=>"getCheckOut(this.value)","value"=>$res->lama));?>	</div><label  class="control-label">Pekan</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Check Out</label>
			
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="mgg_tglcheckout" name="mgg_tglcheckout" class="form-control" readonly value="<?php echo $res->tglAkhir?>"/>
					<span class="input-group-addon" id="mgg_tglcheckout_ico">
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
			<div class="col-sm-8"><?=form_input(array("name"=>"mgg_nama_lengkap1","id"=>"mgg_nama_lengkap1","class"=>"form-control","value"=>$res->nama));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Identitas	(KTP/SIM/NIM)*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"mgg_identitas1","id"=>"mgg_identitas1","class"=>"form-control","value"=>$res->noIdentitas));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp/HP*</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"mgg_notelp1","id"=>"mgg_notelp1","class"=>"form-control","onkeypress"=>"return numericVal(this,event)","value"=>$res->Telp));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">E-mail*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"mgg_email1","id"=>"mgg_email1","class"=>"form-control","value"=>$res->email));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>
			<div class="col-sm-4"><?php	echo form_dropdown('mgg_jnskelamin1',array('Pria'=>'Pria', 'Wanita'=>'Wanita'),$res->JK,'id="mgg_jnskelamin1" class="form-control"');?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>
			<div class="col-sm-6"><?=form_input(array("name"=>"mgg_tempatlahir1","id"=>"mgg_tempatlahir1","class"=>"form-control","value"=>$res->tempat_lahir));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<div class="input-group input-group-sm">
					<input type="text" id="mgg_tgllahir1" name="mgg_tgllahir1" class="form-control" value="<?php echo $res->tgl_lahir?>"/>
					<span class="input-group-addon" id="mgg_tgllahir1_ico">
					<i class="ace-icon fa fa-calendar"></i>
					</span>
				</div>		<label class="control-label"><i>Format yyyy-mm-dd</i></label>	
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Asal</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"mgg_alamat1","id"=>"mgg_alamat1","class"=>"form-control","value"=>$res->alamat_asal));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Nama Instansi(Sekolah/Kampus/Kantor)</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"mgg_nama_instansi","id"=>"mgg_nama_instansi","class"=>"form-control","value"=>$res->namaInstansi));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Alamat Instansi(Sekolah/Kampus/Kantor) </label>
			<div class="col-sm-8"><?=form_input(array("name"=>"mgg_alamat_instansi","id"=>"mgg_alamat_instansi","class"=>"form-control","value"=>$res->alamatInstansi));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No.Telp Instansi</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"mgg_notelp_instansi","id"=>"mgg_notelp_instansi","class"=>"form-control","onkeypress"=>"return numericVal(this,event)","value"=>$res->telp_instansi));?>	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8" style="text-align:center">
	<input type="hidden" name="kamarAsal"  id="kamarAsal" size="20" readonly value="<?php echo $res->idKamar?>"/>
	</div>
</div>
<br>

<div class="widget-header">
	<h4 class="widget-title">Biaya Tambahan Fasilitas</h4>
</div><!-- widget-header -->
<br>
<div class="row"><label class="control-label">Jika pendaftar membawa perlengkapan pribadi yang mengkonsumsi listrik & tempat selain yang disediakan. Biaya dikenakan per bulan</label></DIV>

<table  border="0" cellspacing=0 id="tbDetil_mgg" class="table  table-bordered table-hover">   
  <thead> <tr><th>No</th><th>Biaya</th><th>Tarif</th></tr></thead>
<?	$strCek=" select count(*) cek from detildaftar_mingguan where idpendaftaran ='".$res->idPendaftaran."' and idBiaya<>0";
	$queryCek = $this->db->query($strCek)->row();
	if ($queryCek->cek <=0){
		$k=1;
?>
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
<?
	}else{
		$sqlBiaya=" select d.*, b.tarif from detildaftar_mingguan d, biaya_tambahan b where d.idBiaya=b.id and idpendaftaran ='".$res->idPendaftaran."' ";
		$queryRows = $this->db->query($sqlBiaya)->result();
		$k=0;
		foreach($queryRows as $rows){
			?>
			
		<tr valign=top>
			<td><?php echo $k+1;?></td>
			<td><select name="mgg_cbJnsBiaya_<?php echo $k?>" id="mgg_cbJnsBiaya_<?php echo $k?>" onchange="displayTarif_mgg(this,<?php echo $k?>)" class="form-control"> 
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
			<td><input type="text" name="mgg_txtTarif_<?php echo $k?>" id="mgg_txtTarif_<?php echo $k?>" size="15" value="<?php echo $rows->tarif?>" readonly class="form-control"></td></tr>	
			<?
			$k++;

		}

	}
			
			?>
</table>
<table width="100%">			
<tr>
    <td align="center">
	<INPUT TYPE="button" name="btAddRow_mgg" id="btAddRow_mgg" value="Tambah Biaya" class="btn btn-purple btn-sm" onClick="addRow_mgg('tbDetil_mgg')" >&nbsp;
	<INPUT TYPE="hidden" id="jmlRow_mgg" name="jmlRow_mgg" value="<?php echo $k?>">
	<!-- <input type="hidden" name="kamarAsal"  id="kamarAsal" size="20" readonly value="<?php echo $res->idkamar?>"/>
 -->	</td>
  </tr>
</table>
<br>
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
</script>
