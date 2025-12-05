<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<li>Masukkan data pemakaian Kwh untuk disertakan pada invoice</li>			
	<li>Nominal Tarif @kwh diambil dari data master, jika harga tarif berubah silakan update data master tarif kwh atau bisa langsung di tulis di textbox tarif Kwh </li>		
	</ul>
</div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myformgeninv_bln"));?>
<?	
$jumlah=$tagihan+($hrdenda*$denda);
$cek = $this->db->query("SELECT COUNT(*) cek FROM invoice_bulanan WHERE idpendaftaran='$noreg' and pembayaran_ke=".$byrke)->row();
$jumlahTagihan=$jumlah;
//pembayaran baru belum ada pembayaran sebelumnya
$jmlBayar=0;$sisa=0;$kembalian=0;$status="Belum Lunas"; $kwh_akhir=0;
	if ($cek->cek >=1){	//proses edit, atau pembayaran belum lunas
		$rs=$this->db->query("SELECT *  FROM invoice_bulanan WHERE idpendaftaran='$noreg' and pembayaran_ke=".$byrke)->row();
		$jmlBayar=$rs->jmlBayar;
		$status=($jmlBayar<$jumlahTagihan?"Belum Lunas":"Lunas");
		//$namaKamarLama=$rs->namaKamar;		
		$jumlahTagihan=$jumlahTagihan-$jmlBayar;
		$sisa=0;
		$kembalian=0;
		$kwh_akhir=$rs->kwh_akhir;

	}
?>

<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title smaller">Form Generate Tagihan/Invoice </h4>
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
<td ><input type="hidden" name="thnblnTag" id="thnblnTag" size="30" value="<?=$thnbln?>" /><?php echo $arrBulan[$mmIdk]." ".$yyIdk?></td>
</tr>
<tr>
<td >Tagihan Bulanan</td>
<td ><input type="hidden" name="tagBlnn" id="tagBlnn" value="<?=$tagihan?>" /><?php echo "Rp. ".number_format($tagihan,2,',','.')?></td>
</tr>
<?  if ($cek->cek >=1){ ?>
<? }else{?>


<tr>
<td >Kwh Awal Bulan</td>
<td ><input type="hidden" name="kwh_awal" id="kwh_awal"  value="<?php echo (sizeof($res_kwh_akhir) >0 ? $res_kwh_akhir->kwhnya:"0");?> " />

<input type="hidden" name="kwh_tdk_kena_tarif" id="kwh_tdk_kena_tarif"  value="<?php echo $res_kwh_master->kwh_tdk_kena_tarif?> " />
<?php echo(sizeof($res_kwh_akhir) >0 ? $res_kwh_akhir->kwhnya:"0").", Kwh Tidak Kena tarif : ".$res_kwh_master->kwh_tdk_kena_tarif?></td>
</tr>
<tr>
<td >Kwh Akhir Bulan</td>
<td ><input type="text" name="kwh_akhir" id="kwh_akhir"  value="<?php echo ($byrke==1?$res_kwh_akhir->kwhnya:$kwh_akhir)?>" onblur="updateTagihan(this)"/> x Tarif @ Kwh <input type="text" name="tarif_kwh" id="tarif_kwh"  value=" <?php echo $res_kwh_master->kwh_tarif?>" onblur="updateTagihan(this)" /></td>
</tr>
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
	<INPUT TYPE="hidden" name="bayarKe" id="bayarKe" value="<?=$byrke?>">
	<INPUT TYPE="hidden" name="idKamar" id="idKamar" value="<?=$idkamar?>">
	<INPUT TYPE="hidden" name="nmKamar" id="nmKamar" value="<?=$nmkamar?>">
	</div>
</div>


<table class="table table-striped table-bordered table-hover">
<tbody>

<tr ><td>Total Tagihan </td><td>:</td><td><input type="hidden" name="totTagAwal" id="totTagAwal" size="30" readonly value="<?=($tagihan+($hrdenda*$denda))?>" /> <input type="text" name="tagihan" id="tagihan" size="30" readonly value="<?=($tagihan+($hrdenda*$denda))?>" /> </td></tr>
</tbody>
</table>
</div><!-- widget-box -->


<?php echo form_close();?>
<script type="text/javascript">
$('.input-mask-date').mask('9999-99-99');

function updateTagihan(obj){
	var hasil=0;
	var jumkwh=0;
	

	if (($(obj).attr("name")) == "kwh_akhir"){
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
	
	//alert(jumkwh );
	 hasil = jumkwh * parseFloat( $("#tarif_kwh").val());
	//alert("hasil="+hasil + "tagihan" + $("#tagihan").val());
	 $("#tagihan").val( hasil + parseFloat( $("#totTagAwal").val() ) - parseFloat( $('#kurangiDenda').val()) );
} 


function reduceFine(reducer){
	var tagKwh=0; var obj=$("#kwh_akhir");

	var hasil=0;
	var jumkwh=0;
	if (($(obj).attr("name")) == "kwh_akhir"){
		 jumkwh =   parseFloat($(obj).val())  - parseFloat( $("#kwh_awal").val())  ;		
	}else{
		jumkwh =   parseFloat( $("#kwh_akhir").val())  -parseFloat( $("#kwh_awal").val())  ;
	}
	//alert(jumkwh );
	//tidak kena tarif
	if ( jumkwh > parseFloat( $("#kwh_tdk_kena_tarif").val()) ) {
		jumkwh = jumkwh - parseFloat( $("#kwh_tdk_kena_tarif").val());
	}else{
		jumkwh = 0;
		//alert("tidak kena tarif");
	}
	
	//alert(jumkwh );
	 hasil = jumkwh * parseFloat( $("#tarif_kwh").val());
	tagKwh=hasil;
	$("#tagihan").val( ((parseInt($("#tagBlnn").val() )+parseInt($("#dendaAwal").val()))-parseInt(reducer) ) + tagKwh );	
	$("#sisa").val( parseInt($("#tagihan").val())-parseInt($("#jmlBayar").val() ) );
}  


</script>
