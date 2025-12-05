<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<li>Sewa Tahunan saat ini sudah bisa memproses pembayaran dimuka (Mengangsur)</li>		
	</ul>
</div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myformByr_detil_bln"));?>
<?	
$jumlah=$tagihan+($hrdenda*$denda);
$cek = $this->db->query("SELECT COUNT(*) cek, jmlbayar FROM bayar_tahunan WHERE idpendaftaran='$noreg' and tahun_tagihan=".$thn)->row();
$jumlahTagihan=$jumlah;	//$jumlahTagihan -> baru blm disimpan master
//pembayaran baru belum ada pembayaran sebelumnya
$jmlBayar=0;$sisa=0;$kembalian=0;$status="Belum Lunas"; $kwh_akhir=0;
	if ($cek->cek >=1 && $cek->jmlbayar>0){	//proses edit, atau pembayaran belum lunas
		$rs=$this->db->query("SELECT *  FROM bayar_tahunan WHERE idpendaftaran='$noreg' and tahun_tagihan=".$thn)->row();
		$jmlBayar=$rs->jmlBayar;
		$status=($jmlBayar<$rs->jmlTagihan?"Belum Lunas":"Lunas");
		//$namaKamarLama=$rs->namaKamar;		
		$jumlahTagihan=$rs->jmlTagihan-$jmlBayar;
		$tagihan=$rs->jmlTagihan;
		$sisa=0;
		$kembalian=0;
		

	}
?>

<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title smaller">Form <?=($cek->cek >=1 && $cek->jmlbayar>0?" <font style='weight: bold; color:red;'>Angsuran </font>":"")?>Pembayaran Tagihan</h4>
	</div><!-- widget-header -->
<div class="row">
	<div class="col-md-12" >
<table class="table table-striped table-bordered table-hover" width="90%">
<tbody>
<tr>
<td >No Pendaftaran</td>
<td ><input type="hidden" name="noreg" id="noreg" value="<?=$noreg?>" /><b><?php echo $noreg?></b></td>
</tr>
<tr>
<td >Tagihan untuk Periode </td>
<td ><input type="hidden" name="thnTag" id="thnTag" size="30" value="<?=$thn?>" /><?php echo $thn?></td>
</tr>
<tr>
<td >Tagihan Sewa Tahunan</td>
<td ><input type="hidden" name="tagBlnn" id="tagBlnn" value="<?=$tagihan?>" /><?php echo "Rp. ".number_format($tagihan,2,',','.')?></td>
</tr>
<?  if ($cek->cek >=1 && $cek->jmlbayar>0){ ?>

<? }else{?>

<tr>
<td >Denda <?php echo $hrdenda?> Hari</td>
<td ><input type="hidden" name="dendaAwal" id="dendaAwal"  value="<?=($hrdenda*$denda)?>" /><?php echo "Rp. ".number_format(($hrdenda*$denda),2,',','.')?></td>
</tr>
<tr>
<td >Pengurangan Denda</td>
<td ><input type="text" class="form-control" name="kurangiDenda" id="kurangiDenda" size="30" value="0" onkeypress="return numericVal(this,event)" onkeyup="reduceFine(this.value)"/>*Isi Jumlah Pengurangan</td>
</tr>
<?}?>
</tbody>
</table>
	
	<INPUT TYPE="hidden" name="idlokasi" id="idlokasi" value="<?=$idlokasi?>">
	<INPUT TYPE="hidden" name="idKamar" id="idKamar" value="<?=$idkamar?>">
	<INPUT TYPE="hidden" name="nmKamar" id="nmKamar" value="<?=$nmkamar?>">
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

<?  if ($cek->cek >=1 && $cek->jmlbayar>0){
	//get jmltagihan di master baya

	?>

<tr><td>Sudah dibayarkan</td><td>:</td><td >Rp. <?php echo number_format($jmlBayar,2,',','.')?></td></tr>
<tr ><td>Sisa Tagihan Awal </td><td>:</td><td><input type="hidden" name="totTagAwal" id="totTagAwal" size="30" readonly value="<?=($tagihan - $jmlBayar)?>" /> <input type="text" name="tagihan" id="tagihan" size="30" readonly value="<?=$tagihan - $jmlBayar?>" /> </td></tr>

<?}else{?>
<tr ><td>Total Tagihan </td><td>:</td><td><input type="hidden" name="totTagAwal" id="totTagAwal" size="30" readonly value="<?=($tagihan+($hrdenda*$denda))?>" /> <input type="text" name="tagihan" id="tagihan" size="30" readonly value="<?=($tagihan+($hrdenda*$denda))?>" /> </td></tr>

<?}?>

<tr ><td>Jumlah Bayar</td><td>:</td><td colspan=4><input type="text" name="jmlBayar" id="jmlBayar" size="30" value="0"  onkeypress="return numericVal(this,event)"   onkeyup="countPayment(this.value)"/> *Isi Jumlah yang dibayarkan</td></tr>	

<tr><td>Sisa Tagihan <?=($cek->cek >=1 && $cek->jmlbayar>0?" <font style='weight: bold; color:red;'>Akhir </font>":"")?> </td><td>:</td><td colspan=4><input type="text" name="sisa" id="sisa" size="30" value="0" readonly></td></tr>
<tr><td>Kembalian</td><td>:</td><td colspan=4><input type="text" name="kembalian" id="kembalian" size="30" value="0" readonly></td></tr>
<tr><td>Status</td><td>:</td><td colspan=4><input type="text" name="status" id="status" size="20" readonly value="" readonly></td></tr>
</tbody>
</table>
</div><!-- widget-box -->


<?php echo form_close();?>
<script type="text/javascript">
$('.input-mask-date').mask('9999-99-99');

function updateTagihan(obj){
	var hasil=0;
	var jumkwh=0;
	

	/*if (($(obj).attr("name")) == "kwh_akhir"){
		 jumkwh =   parseFloat($(obj).val())  - parseFloat( $("#kwh_awal").val())  ;		
	}else{
		jumkwh =   parseFloat( $("#kwh_akhir").val())  -parseFloat( $("#kwh_awal").val())  ;
	}
	
	//tidak kena tarif
	if ( jumkwh > parseFloat( $("#kwh_tdk_kena_tarif").val()) ) {
		jumkwh = jumkwh - parseFloat( $("#kwh_tdk_kena_tarif").val());
	}else{
		jumkwh = 0;
		alert("tidak kena tarif");
	}
	*/
	//alert(jumkwh );
	 //hasil = jumkwh * parseFloat( $("#tarif_kwh").val());
	//alert("hasil="+hasil + "tagihan" + $("#tagihan").val());
	 $("#tagihan").val( hasil + parseFloat( $("#totTagAwal").val() ) - parseFloat( $('#kurangiDenda').val()) );
} 
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

function reduceFine(reducer){
	var tagKwh=0; var obj=$("#kwh_akhir");

	var hasil=0;
	var jumkwh=0;
	/*if (($(obj).attr("name")) == "kwh_akhir"){
		 jumkwh =   parseFloat($(obj).val())  - parseFloat( $("#kwh_awal").val())  ;		
	}else{
		jumkwh =   parseFloat( $("#kwh_akhir").val())  -parseFloat( $("#kwh_awal").val())  ;
	}*/
	//alert(jumkwh );
	//tidak kena tarif
	/*if ( jumkwh > parseFloat( $("#kwh_tdk_kena_tarif").val()) ) {
		jumkwh = jumkwh - parseFloat( $("#kwh_tdk_kena_tarif").val());
	}else{
		jumkwh = 0;
		//alert("tidak kena tarif");
	}*/
	
	//alert(jumkwh );
	// hasil = jumkwh * parseFloat( $("#tarif_kwh").val());
	//tagKwh=hasil;
	$("#tagihan").val( ((parseInt($("#tagBlnn").val() )+parseInt($("#dendaAwal").val()))-parseInt(reducer) ) );	
	$("#sisa").val( parseInt($("#tagihan").val())-parseInt($("#jmlBayar").val() ) );
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

</script>
