<div id="errorHandler3" class="alert alert-danger no-display"></div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myformRoom"));?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title">Form Pindah Kamar <?php echo $jenis?></h4>
	</div><!-- widget-header -->
<br>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi/Cabang Kost</label>
			<div class="col-sm-4">
			<?				
					echo '<input type="hidden" name="cb_lokasi" id ="cb_lokasi" value="'.$lokasi->id.'"/>';
					echo '<label  class="col-sm-5 control-label">'.$lokasi->lokasi.'</label>';
							
				
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
		<div class="form-group"><label class="col-sm-4 control-label">Nama Lengkap*</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"nama_lengkap","id"=>"nama_lengkap","class"=>"form-control", "value"=>$res->nama));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Kamar*</label>
			<div class="col-sm-6 form-inline"><?=form_input(array("name"=>"lblkamar","id"=>"lblkamar","class"=>"form-control", "value"=>$resKamar->LABELKAMAR));?>
			<input type="hidden" name="idkamar" id="idkamar"  value="<?php echo $res->idkamar?>" />
			&nbsp;
			<? echo '<a href="javascript:void(0)" id="btn_pilihkamar" class="btn btn-purple btn-sm inline" >Pilih Kamar</a>'; ?>
				</div>
		</div>
	</div>
</div>
<?	switch ($jenis){
	case "Tahunan": $tarif=$resKamar->TARIFTAHUNAN; break;
	case "Bulanan": $tarif=$resKamar->TARIFBULANAN; break;
	case "Mingguan": $tarif=$resKamar->TARIFMINGGUAN; break;
	case "Harian": $tarif=$resKamar->TARIFHARIAN; break;
	}
	
?>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Tarif</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"tarif","id"=>"tarif","class"=>"form-control", "readonly"=>true, "value"=>"Rp. ".number_format($tarif,2,',','.')));?></div>
			
		</div>
	</div>
</div> 
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Fasilitas</label>
			<div class="col-sm-8"><?=form_textarea(array("name"=>"fasilitas","id"=>"fasilitas","class"=>"form-control", "readonly"=>true, "rows"=>3, "cols"=>30, "value"=>$resKamar->FASILITAS));?>	</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8" style="text-align:center">
	<input type="Button" class="btn  btn-primary " id="btupdpindah" value="Update Pindah">
	<input type="hidden" name="jenis_pindah" id ="jenis_pindah" value="<?php echo $jenis?>"/>
	<input type="hidden" name="kamarasal" id ="kamarasal"  value="<?php echo $res->idkamar?>"/>
	<a href="<?php echo base_url('e_pendaftaran/pindah_kamar')?>" class="btn  btn-warning"><i class="ace-icon fa fa-refresh bigger-125"></i>Kembali</a>	
	</div>
</div>

</div><!-- widget-box -->


<?php echo form_close();?>
<script type="text/javascript">


$("#btn_pilihkamar").click(function() {
		var idlokasi=$("#cb_lokasi").val();
		openRoomList("<?php echo base_url('kamar/loadRoomList'); ?>", "<?php echo 'pindah_'.strtolower($jenis)?>", idlokasi);
	});	

$('#btupdpindah').click(function(){		
		var form_data = $('#myformRoom').serialize();
		$().showMessage('Sedang diproses.. Harap tunggu..');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pendaftaran/updatePindah');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler3").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data perubahan kamar berhasil disimpan.','success',1000);									
					
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
