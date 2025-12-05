<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<li>Form ini hanya untuk mengedit data pembayaran berupa nominal, tanggal bayar dan metode pembayaran saja sesuai nomer pembayaran yang dipilih.</li>		
	</ul>
</div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myfrmPop_edit"));
$metode_bayar=$res->metode_bayar;

?>

<table class="table table-striped table-bordered table-hover">
<tbody>
<tr bgcolor="#a7a7a7"><th >Metode Pembayaran</th>
<td colspan=4><select name="metodeBayar" id="metodeBayar" onchange="showFrmPay(this.value)">
	<option value="tunai"  <?php echo ($metode_bayar=="tunai"?" selected":"")?> >Cash/Tunai</option>
	<option value="transfer" <?php echo ($metode_bayar=="transfer"?" selected":"")?>>Transfer ATM/Internet Banking</option>
	<option value="kartu"  <?php echo ($metode_bayar=="kartu"?" selected":"")?>>Kartu Debit/Kredit</option>
</select></td>
</tr>
</tbody>
</table>
<!-- sampai sini -->
<div id="div_atm" class="<?php echo ($metode_bayar=="tunai" || $metode_bayar=="kartu" ?" no-display":"")?>">
<table class="table table-striped table-bordered table-hover">
<tbody>
	<tr><td>Dari Bank</td><td>:</td><td><input type="text" class="form-control"name="trBank" id="trBank" size="25" value="<?php echo ($metode_bayar=="transfer" ?$res->dari_bank:"")?>"></td></tr>
	<tr><td>No.Rekening</td><td>:</td><td><input type="text" class="form-control"name="trNorek1" id="trNorek1" size="25" value="<?php echo ($metode_bayar=="transfer" ?$res->norek_pengirim:"")?>"></td></tr>
	<tr><td>Atas Nama</td><td>:</td><td><input type="text" class="form-control"name="trAtasNama" id="trAtasNama" size="35" value="<?php echo ($metode_bayar=="transfer" ?$res->nama_pengirim:"")?>"></td></tr>
	<tr><td>Dibayar ke</td><td>:</td><td><select name="cbRek" id="cbRek" >
	<?		if ($metode_bayar=="transfer"){
				$query = $this->db->query("Select * from bank where id=".$res->idrek_penerima)->result();
		}else{
				$query = $this->db->query("Select * from bank ")->result();				
		}
				$opt="";
				foreach( $query as $rs){	
					$opt.="<option value='".$rs->id."' >".$rs->Nama."-".$rs->NoRekening." a.n ".$rs->atasNama."</option>";
				}
				echo $opt;
			?>	
	</select></td></tr>
	<tr><td>Tgl Transfer</td><td>:</td><td>
	<div class="input-group">
		<input class="form-control input-mask-date" type="text" name="tglTransfer" id="tglTransfer" value="<?php echo ($metode_bayar=="transfer" ?$res->tgl_transfer:"")?>"/>
		<span class="input-group-btn">
		<button class="btn btn-sm btn-default" type="button">
		<i class="ace-icon fa fa-calendar bigger-110"></i>Go!</button>
		</span>
	</div>
	</td></tr>
	</tbody>
	</table>
</div>
<div id="div_card" class=" <?php echo ($metode_bayar=="tunai" || $metode_bayar=="transfer" ?" no-display":"")?>">
<table class="table table-striped table-bordered table-hover" >
<tbody>
	<tr><td>Jenis Kartu</td><td>:</td><td><input type="text" class="form-control"name="krJenis" id="krJenis" size="20" value="<?php echo ($metode_bayar=="kartu" ?$res->jenis_kartu:"")?>"></td></tr>
	<tr><td>No.Kartu</td><td>:</td><td><input type="text" class="form-control"name="krNoCard" id="krNoCard" size="30" value="<?php echo ($metode_bayar=="kartu" ?$res->no_kartu:"")?>"></td></tr>
	<tr><td>Nama Pemilik</td><td>:</td><td><input type="text" class="form-control"name="krNama" id="krNama" size="30" value="<?php echo ($metode_bayar=="kartu" ?$res->nmpemilik_kartu:"")?>"></td></tr>
	<tr><td>No.Struk</td><td>:</td><td><input type="text" class="form-control"name="krNoStruk" id="krNoStruk" size="20" value="<?php echo ($metode_bayar=="kartu" ?$res->no_struk:"")?>"></td></tr>
	<tr><td>Tgl Struk</td><td>:</td><td>
	<div class="input-group">
		<input class="form-control input-mask-date" type="text" name="krTglStruk" id="krTglStruk"  value="<?php echo ($metode_bayar=="kartu" ?$res->tgl_struk:"")?>"/>
		<span class="input-group-btn">
		<button class="btn btn-sm btn-default" type="button">
		<i class="ace-icon fa fa-calendar bigger-110"></i>Go!</button>
		</span>
	</div>
	</td></tr>

</tbody>
	</table>

</div>

<table class="table table-striped table-bordered table-hover">
<tbody>
<tr><td>Tanggal Bayar</td><td>:</td><td>
	<div class="input-group">
		<input class="form-control input-mask-date" type="text" name="tglBayar" id="tglBayar"  value="<?php echo $res->tglBayar?>"/>
		
	</div>
	</td></tr>
<tr><td>Jumlah Dibayarkan</td><td>:</td><td colspan=4><input type="text" name="jmlBayar" id="jmlBayar" size="30" value="<?php echo $res->jmlBayar?>" onkeypress="return numericVal(this,event)" ></td></tr>
<tr ><td colspan=2>&nbsp;</td>
	<td colspan=4>
<?  if ($jenis=="Bulanan") {?>
	<INPUT TYPE="hidden" name="thnbln" id="thnbln" value="<?=$res->thnbln_tagihan?>">
	<?} ?>
	<INPUT TYPE="hidden" name="jenis" id="jenis" value="<?=$jenis?>">
	<INPUT TYPE="hidden" name="nourut" id="nourut" value="<?=$nourut?>">
	<INPUT TYPE="hidden" name="no_kuit" id="no_kuit" value="<?=$no_kuit?>">
	<INPUT TYPE="hidden" name="noreg" id="noreg" value="<?=$noreg?>">
	<INPUT TYPE="hidden" name="idlokasi" id="idlokasi" value="<?=$idlokasi?>">
	<input type="button" class="btn btn-primary" id="btsimpan" value="Simpan" >
	<button type="button" class="btn btn-default" id="btcancelkel">Batal</button>
	</td>

	</tr>

</tbody>
</table>
</div><!-- widget-box -->

<?php echo form_close();?>
<script type="text/javascript">
$('.input-mask-date').mask('9999-99-99');

 
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

$('#btsimpan').click(function(){		
	var form_data=$('#myfrmPop_edit').serialize();
	$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pembayaran/saveEditing');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data Pembayaran berhasil diupdate.','success',1500);
					//window.location.href="<?php echo base_url('e_pembayaran/entri');?>";
					bootbox.dialog({
					  onEscape	:true,					 
					  message: "Data pembayaran berhasil diupdate. Cetak Kuitansi ?",
					  title: "Konfirmasi",
					  buttons: {
						success: {
						  label: "Cetak Kuitansi",
						  className: "btn-success",
						  callback: function() {	
							  if ( $("#jenis").val()=="Bulanan") {
								  window.location.href="<?php echo base_url('rpt_pembayaran/printReceipt/'.$jenis.'_1_');?>"+ $("#noreg").val()+"_"+ $("#thnbln").val()+"_"+ $("#no_kuit").val();

							  }else {							 
								window.location.href="<?php echo base_url('rpt_pembayaran/printReceipt/'.$jenis.'_1_');?>"+ $("#noreg").val()+"_"+ $("#nourut").val();
							  }
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
					
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan.<br>"+ 	textStatus + " - " + errorThrown );
			},
			cache: false
		});
	});
</script>
