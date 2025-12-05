<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Informasi</strong>
	<ul>
	<li>Konfirmasi diperlukan jika membayar lewat transfer ATM atau kartu kredit dengen menyertakan bukti transfer/struk CC</li>
	</ul>
</div>
<div class="control-group"><a href="javascript:void(0)" id="btcreate" class="btn btn-primary">Buat Konfirmasi</a>
</div>
<div id="errorHandler" class="alert alert-danger no-display"></div>

<br>
<div id="divformkel" class="no-display">
<?php echo form_open_multipart('administrasi/saveConfirm',array('class'=>'form-horizontal','id'=>'myform'));?>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Untuk jenis Tagihan</label>
			<div class="col-sm-8"><?=form_dropdown('jenis_bayar',$jns_bayar,'','id="jenis_bayar" class="form-control"');?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group">
				<label for="nama" class="col-sm-4   control-label">Periode Tagihan</label>
					<div class="col-sm-8 form-inline">
					<?php echo form_dropdown('cbBulan',$arrBulan,date('m'),'id="cbBulan" ')."&nbsp;".form_dropdown('cbTahun',$arrThn, date('Y'),'id="cbTahun" ');
						?>
					</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Jumlah Bayar</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'jmlbayar','id'=>'jmlbayar','class'=>'form-control','onkeypress'=>"return numericVal(this,event)", 'onblur'=>'blurObj(this)', 'onclick'=>'clickObj(this)', 'value'=>0));?>	</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-8"><label class="col-sm-4 control-label"></label>
<div class="col-sm-8">
<table class="table table-striped table-bordered table-hover">
<tbody>
<tr bgcolor="#a7a7a7"><th >Metode Pembayaran</th>
<td colspan=4><select name="metodeBayar" id="metodeBayar" onchange="showFrmPay(this.value)">
	<option value="transfer" >Transfer ATM/Internet Banking</option>
	<option value="kartu"  >Kartu Debit/Kredit</option>
</select></td>
</tr>
</tbody>
</table>
<!-- sampai sini -->
<div id="div_atm" >
<table class="table table-striped table-bordered table-hover">
<tbody>
	<tr><td>Dari Bank</td><td>:</td><td><input type="text" class="form-control"name="trBank" id="trBank" size="25" value=""></td></tr>
	<tr><td>No.Rekening</td><td>:</td><td><input type="text" class="form-control"name="trNorek1" id="trNorek1" size="25" value=""></td></tr>
	<tr><td>Atas Nama</td><td>:</td><td><input type="text" class="form-control"name="trAtasNama" id="trAtasNama" size="35" value=""></td></tr>
	<tr><td>Dibayar ke</td><td>:</td><td><select name="cbRek" id="cbRek" >
	<?
				$query = $this->db->query("Select * from bank ")->result();				
				$opt="";
				foreach( $query as $rs){	
					$opt.="<option value='".$rs->id."' >".$rs->Nama."-".$rs->NoRekening." a.n ".$rs->atasNama."</option>";
				}
				echo $opt;
			?>	
	</select></td></tr>
	<tr><td>Tgl Transfer</td><td>:</td><td>
	<div class="input-group">
		<input class="form-control input-mask-date" type="text" name="tglTransfer" id="tglTransfer" />
		<span class="input-group-btn">
		<button class="btn btn-sm btn-default" id="btatm" type="button">
		<i class="ace-icon fa fa-calendar bigger-110"></i>Go!</button>
		</span>
	</div>
	</td></tr>
	</tbody>
	</table>
</div>
<div id="div_card" class=" no-display">
<table class="table table-striped table-bordered table-hover" >
<tbody>
	<tr><td>Jenis Kartu</td><td>:</td><td><input type="text" class="form-control"name="krJenis" id="krJenis" size="20" value=""></td></tr>
	<tr><td>No.Kartu</td><td>:</td><td><input type="text" class="form-control"name="krNoCard" id="krNoCard" size="30" value=""></td></tr>
	<tr><td>Nama Pemilik</td><td>:</td><td><input type="text" class="form-control"name="krNama" id="krNama" size="30" value=""></td></tr>
	<tr><td>No.Struk</td><td>:</td><td><input type="text" class="form-control"name="krNoStruk" id="krNoStruk" size="20" value=""></td></tr>
	<tr><td>Tgl Struk</td><td>:</td><td>
	<div class="input-group">
		<input class="form-control input-mask-date" type="text" name="krTglStruk" id="krTglStruk" />
		<span class="input-group-btn">
		<button class="btn btn-sm btn-default" id="bttgl" type="button">
		<i class="ace-icon fa fa-calendar bigger-110"></i>Go!</button>
		</span>
	</div>
	</td></tr>
</tbody>
	</table>
</div>

</div>
</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Upload Bukti pembayaran</label>
			<div class="col-sm-5"><?=form_upload(array('name'=>'userfile','id'=>'userfile','class'=>'form-control', 'onchange'=>"readURL(this,'imgFoto')"));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">&nbsp;</label>
			<div class="col-sm-8"><img id="imgFoto" name="imgFoto" src="<?php echo base_url("assets/images/placeholder/none.gif")?>" width="130" height="150">	<label class="control-label">* Max size : 1 Mb, Max Resolusi : 1400x2000</label></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Catatan Tambahan</label>
			<div class="col-sm-8"><?=form_textarea(array('name'=>'keterangan','id'=>'keterangan','class'=>'form-control', 'rows'=>3, 'cols'=>30));?>	</div>
		</div>
	</div>
</div>
<div class="row">
<div class="col-md-8"><label class="col-sm-4 control-label"></label>
	<div class="col-sm-8">
	<input type="hidden" name="id" id="id">
	<input type="hidden" name="state" id="state" value="add">
	<input type="submit" class="btn btn-primary" id="btsimpankel" value="Simpan">
	<button type="button" class="btn btn-default" id="btcancelkel">Batal</button>
	</div>
	</div>
</div>

<?php echo form_close();?>
<hr />
</div>

<br>

<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="dataTables-cab">
		<thead>
			<tr>
				<th>ID</th>
				<th>JENIS PEMBAYARAN</th>
				<th>PERIODE BAYAR</th>				
				<th>METODE BAYAR</th>				
				<th>JUMLAH BAYAR</th>
				<th>BUKTI</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>
<!-- /.table-responsive -->
<script>
    $(document).ready(function() {
        $('#dataTables-cab').dataTable({
			"bProcessing": true,
			"bServerSide": true,
			"iDisplayLength": 25,			
			"aoColumns": [
				{"mData": "ID" },
				{"mData": "JENIS_BAYAR" },
				{"mData": "PERIODE_TAGIHAN" },
				{"mData": "METODE_BAYAR" },
				{"mData": "JMLBAYAR" },
				{"mData": "BUKTI" }
			],
			"sAjaxSource": "<?php echo base_url('administrasi/json_data');?>"
		});

		if ($('#jenis_bayar').val()=="Tagihan Sewa Tahunan"){
			$('#cbBulan').attr("disabled","disabled");
		}else{
			$('#cbBulan').removeAttr("disabled");
		}
    });	
$("#btatm").click(function() {
		$("#tglTransfer").datepicker("show");
	});

$( "#tglTransfer" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});
$("#bttgl").click(function() {
		$("#krTglStruk").datepicker("show");
	});

$( "#krTglStruk" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,				
					
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					
				});
	$('#cb_lokasi').change(function(){
		$('#dataTables-cab').dataTable().fnReloadAjax();
	});

	$('#btcreate').click(function(){
		$("#divformkel").fadeSlide("show");
		$('#state').val('add');
		$('#lbltitle').text('Tambah Data kamar Baru');
		$('#username').removeAttr('readonly');
		$('#myform').reset();
		
		
	});
	$('#btcancelkel').click(function(){
		$("#divformkel").fadeSlide("hide");
	});

	
	
function showFrmPay(metode){
	switch (metode){
	case "tunai": 
		$("#div_atm").fadeSlide("hide");
		$("#div_card").fadeSlide("hide");
		break;
	case "transfer": 
		$("#div_card").fadeSlide("hide");
		$("#div_atm").fadeSlide("show");
		break;
	case "kartu": 
		$("#div_card").fadeSlide("show");
		$("#div_atm").fadeSlide("hide");
		break;	
	}
}

$('#jenis_bayar').change(function(){
		if ($('#jenis_bayar').val()=="Tagihan Sewa Tahunan"){
			$('#cbBulan').attr("disabled","disabled");
		}else{
			$('#cbBulan').removeAttr("disabled");
		}
	});


</script>