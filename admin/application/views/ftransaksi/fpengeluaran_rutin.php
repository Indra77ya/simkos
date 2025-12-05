<div id="errorHandler" class="alert alert-danger no-display"></div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_rutin"));?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title smaller">Form Entri Pengeluaran Rutin</h4>
	</div><!-- widget-header -->
<br>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi/Cabang Kost</label>
			<div class="col-sm-4">
			<?	
				if ($this->session->userdata('auth')->ROLE=="Superadmin"){
					echo form_dropdown('cb_lokasi',$lokasi,($res==""?'':$res->idlokasi),'id="cb_lokasi" class="form-control"');
				}else{
					echo '<input type="hidden" name="cb_lokasi" id ="cb_lokasi" value="'.($res==""?$lokasi->id:$res->idlokasi).'"/>';
					echo '<label  class="control-label">'.($res==""?$lokasi->lokasi:$res->nmlokasi).'</label>';
				}
				
				
				?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">No. Transaksi</label>
			<div class="col-sm-4"><input type="hidden" name="notrans" id ="notrans" size="20" value="<?php echo ($res==""?date('YmdHis'):$res->idTrans)?>"/><label class="col-sm-4 control-label"><B><?php echo ($res==""?date('YmdHis'):$res->idTrans)?></B></label></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Pembayaran</label>
			<div class="col-sm-4"><?=form_dropdown('jenis_rutin',$jenis_rutin,($res==""?'':$res->idItemBayar),'id="jenis_rutin" class="form-control"');?></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Periode</label>
			<div class="col-sm-8 form-inline">	<?=form_dropdown('cbBulan',$arrBulan,date('m'),'id="cbBulan" class="form-control"');?>&nbsp;<?=form_dropdown('cbTahun',$arrThn, date('Y'),'id="cbTahun" class="form-control"');?></div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Sejumlah</label>
			<div class="col-sm-4"><?=form_input(array("name"=>"jumlah","id"=>"jumlah","class"=>"form-control","onkeypress"=>"return numericVal(this,event)", "onblur"=>"blurObj(this)", "onclick"=>"clickObj(this)", "value"=>($res==""?0:$res->besar) ));?>	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Tanggal </label>
			<div class="col-sm-4">
			<div class="input-group input-group-sm">
				<input type="text" id="tanggal" name="tanggal" class="form-control" value="<?php echo ($res==""?date('Y-m-d'):$res->tglBayar)?>"/>
				<span class="input-group-addon" id="tanggal_ico">
				<i class="ace-icon fa fa-calendar"></i>
				</span>
				</div>
			
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Petugas</label>
			<div class="col-sm-8"><?=form_input(array("name"=>"petugas","id"=>"petugas","class"=>"form-control", "value"=>($res==""?"":$res->petugas)));?>	</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12" style="text-align:center">
	<input type="hidden" name="state" id ="state" size="20" value="<?php echo ($res==""?"add":$res->idTrans)?>"/>
	<input type="Button" class="btn  btn-primary " id="btsimpan" value="Simpan">
	<button class="btn  btn-warning" id="btcancel_bln"><i class="ace-icon fa fa-refresh bigger-125"></i>Batal</button>

	</div>
</div>
<br>
</div><!-- widget-box -->







<?php echo form_close();?>
<script type="text/javascript">
$("#tanggal_ico").click(function() {
		$("#tanggal").datepicker("show");
	});

$( "#tanggal" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});


$('#btsimpan').click(function(){		
		var form_data = $('#myform_rutin').serialize();
		$().showMessage('Sedang diproses.. Harap tunggu..');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pengeluaran/savePengeluaran_rutin');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data Pengeluaran Rutin berhasil disimpan.','success',1500);
					if ($("#state").val()=="add"){
						window.location.href="<?php echo base_url('e_pengeluaran/rutin');?>" ;
					}else{
						window.location.href="<?php echo base_url('e_pengeluaran/editing');?>" ;										
					}
				} else {
					
					$().showMessage('Terjadi kesalahan. Data gagal disimpan.<br>'+msg.errormsg ,'danger',700);					
					$("#errorHandler").html(msg.errormsg).show();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {				
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan.<br>"+ textStatus + " - " + errorThrown );
			},
			cache: false
		});
		
	});

</script>
