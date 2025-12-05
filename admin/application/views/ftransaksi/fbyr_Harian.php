<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<li>Sewa Harian dapat memproses pembayaran dimuka (DP), dan selanjutnya dapat melakukan pelunasan pada halaman yang sama yaitu pada menu entri pembayaran sewa Harian</li>		
	</ul>
</div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myformByr_harian"));?>
<?	
$cek = $this->db->query("SELECT COUNT(*) cek FROM bayar_harian_master WHERE nopendaftaran='$noreg'")->row();
$jumlahTagihan=($res->lama * ($res->tarifharian - $res->diskon));
//pembayaran baru belum ada pembayaran sebelumnya
$jmlBayar=0;$sisa=0;$kembalian=0;$status="Belum Lunas";
	if ($cek->cek >=1){	//proses edit, atau pembayaran belum lunas
		$rs=$this->db->query("SELECT * FROM bayar_harian_master WHERE nopendaftaran='$noreg'")->row();
		$jmlBayar=$rs->jmlBayar;
		$status=($jmlBayar<$jumlahTagihan?"Belum Lunas":"Lunas");
		//$namaKamarLama=$rs->namaKamar;		
		$jumlahTagihan=$jumlahTagihan-$jmlBayar;
		$sisa=0;
		$kembalian=0;

	}
?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title smaller">Form Pembayaran Tagihan</h4>
	</div><!-- widget-header -->
<div class="row">
	<div class="col-md-8" >
<table class="table table-striped table-bordered table-hover" width="60%">
<tbody>
<tr>
<td >Lokasi/Cabang Kost</td>
<td ><b><?				
					echo '<input type="hidden" name="idlokasi" id ="idlokasi" value="'.$lokasi->id.'"/>';
					echo '<label  class="control-label">'.$lokasi->lokasi.'</label>';
							
				
				?></b></td>
</tr>
<tr>
<td >Data Penyewa</td>
<td colspan=3 ><b><?php echo $res->idpendaftaran.' - '.$res->nama."<br>".$res->alamat_asal?></b></td>
</tr>
<tr>
<td >Sewa Kamar</td>
<td  colspan=3><?php echo $res->labelkamar;?></td>
</tr>	
<tr>
<td >Tgl Check-In</td>
<td><input type="hidden" name="tglCekIn" value="<?php echo $res->tglcek_in?>" /><B><?php echo $res->tglcek_in?></B></td>	
<td align=right>Tgl Check-Out</td>
<td><input type="hidden" name="tglCekOut" value="<?php echo $res->tglcek_out?>" /><b><?php echo $res->tglcek_out?></b></td></tr> 
<tr valign=top>
<td >Jumlah Tagihan Total</td>
<td colspan=3><input type="hidden" name="lama" id="lama" value="<?php echo $res->lama?>" />
<input type="hidden" name="diskon" id="diskon" value="<?php echo $res->diskon?>" />
<?php echo $res->lama." Hari x ( Rp. ".number_format($res->tarifharian,2,',','.')." - Diskon Rp. ".number_format($res->diskon,2,',','.')." )  = <b>Rp. ".number_format(($res->lama* ($res->tarifharian - $res->diskon)),2,',','.')."</b>"; ?>


</td></tr>	
	<?  if ($cek->cek >=1){?>
		<tr><td>Sudah dibayarkan</td><td colspan=4>Rp. <?php echo number_format($jmlBayar,2,',','.')?></td></tr>
	<?}?>
	 <tr><td colspan=7>&nbsp;</td></tr>
</tbody>
</table>

	</div>
</div>


<table class="table table-striped table-bordered table-hover">
<tbody>
<tr bgcolor="#a7a7a7"><th >Metode Pembayaran</th>
<td colspan=4><select name="metodeBayar" id="metodeBayar" onchange="showFrmPay(this.value)">
	<option value="tunai"  >Cash/Tunai</option>
	<option value="transfer" >Transfer ATM/Internet Banking</option>
	<option value="kartu"  >Kartu Debit/Kredit</option>
</select></td>
</tr>
</tbody>
</table>
<!-- sampai sini -->
<div id="div_atm" class="no-display">
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
		<button class="btn btn-sm btn-default" type="button">
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
<tr><th colspan=6>STATUS BAYAR</tH></tr> 
<tr><td>Jumlah/Sisa Tagihan</td><td>:</td><td colspan=4><input type="hidden" name="tagihan" id="tagihan" value="<?=$jumlahTagihan?>"><?=number_format($jumlahTagihan,2,',','.')?></td></tr>
	
	<tr><td>Jumlah Dibayarkan</td><td>:</td><td colspan=4><input type="text" name="jmlBayar" id="jmlBayar" size="30" value="0" onkeypress="return numericVal(this,event)" onkeyup="countPayment(this.value)" <?=($status=="Lunas"?" disabled":"")?>></td></tr>
	<tr><td>Sisa Tagihan</td><td>:</td><td colspan=4><input type="text" name="sisa" id="sisa" size="30" readonly></td></tr>
	<tr><td>Kembalian</td><td>:</td><td colspan=4><input type="text" name="kembalian" id="kembalian" size="30" readonly></td></tr>
	<tr><td>Status</td><td>:</td><td colspan=4><input type="text" name="status" id="status" size="20" readonly  ></td></tr>

	<tr ><td colspan=2>&nbsp;</td>
	<td colspan=4>
	<INPUT TYPE="hidden" name="sdhdibayar" id="sdhdibayar"  value="<?=($cek->cek >=1?"1":"0")?>">	
	<INPUT TYPE="hidden" name="op" value="<?=($cek->cek >=1?"updatePayDaily":"saveNewPayDaily")?>">
	<INPUT TYPE="hidden" name="idKamar" id="idKamar" value="<?=$res->idkamar?>">
	<INPUT TYPE="hidden" name="tarif" id="tarif" value="<?=$res->tarifharian?>">
	<INPUT TYPE="hidden" name="noreg" id="noreg" value="<?=$noreg?>">
	<INPUT TYPE="hidden" name="namaKamar" id="namaKamar" value="<?=$res->labelkamar?>">
	<input type="button" class="btn btn-primary" id="btsimpan" value="Simpan" <?=($status=="Lunas"?" disabled":"")?>>
	<button type="button" class="btn btn-default" id="btcancelkel">Batal</button>
	</td>

	</tr>

</tbody>
</table>
</div><!-- widget-box -->

<?php echo form_close();?>
<script type="text/javascript">
$('.input-mask-date').mask('9999-99-99');

function countPayment(vbayar){
		var jmlTagihan	= parseInt($("#tagihan").val() );
		var kem	= ((parseInt(vbayar)-jmlTagihan)>0?parseInt(vbayar)-jmlTagihan:0);
		var sisatagihan= jmlTagihan-parseInt(vbayar);
		var sisa=(sisatagihan>0?sisatagihan:0);
		if (vbayar.length!=''){
			$("#kembalian").val(kem);
			$("#sisa").val(sisa) ;
			$("#status").val((sisa>0?"Belum Lunas":"Lunas"));
		}else{
			$("#kembalian").val(0) ;
			$("#sisa").val(0) ;
			$("#status").val("Belum Lunas");
		}
}

 
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
	var form_data=$('#myformByr_harian').serialize();
	$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pembayaran/saveBayarHarian');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data Pembayaran berhasil disimpan.','success',1500);
					//window.location.href="<?php echo base_url('e_pembayaran/entri');?>";
					bootbox.dialog({
					  onEscape	:true,					 
					  message: "Data pembayaran sewa harian berhasil disimpan. Cetak Kuitansi ?",
					  title: "Konfirmasi",
					  buttons: {
						success: {
						  label: "Cetak Kuitansi",
						  className: "btn-success",
						  callback: function() {
							  //alert($("#sdhdibayar").val());
							if ( $("#sdhdibayar").val() =="1") {								 
								  window.location.href="<?php echo base_url('rpt_pembayaran/receipt_list/Harian_');?>"+ $("#noreg").val()+'_'+msg.lokasi;
							  }else{
								  window.location.href="<?php echo base_url('rpt_pembayaran/printReceipt/Harian_1_');?>"+ $("#noreg").val()+"_"+msg.detil_insert_id ;
									
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
