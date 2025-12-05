<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_thnn_tagbln"));?>

<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title smaller">Form Pembayaran Tagihan Bulanan</h4>
	</div><!-- widget-header -->

<div class="row">
	<div class="col-md-12" >
<table class="table table-striped table-bordered table-hover" width="90%">
<tbody>
<tr>
<td >Periode Tagihan</td>
<td ><?=form_dropdown('cbBulan',$arrBulan,date('m'),'id="cbBulan" ');?>&nbsp;<?=form_dropdown('cbTahun',$arrThn, date('Y'),'id="cbTahun" ');?></td>
</tr>
<tr>
<td >Tagihan PDAM/Air</td>
<td ><input type="text" name="tag_pdam" id="tag_pdam" size="30" value="0" class="form-control" onblur="updateTagihan(this)" size="30"></td>
</tr>
 
<tr>
<td colspan=2>Tagihan Listrik</td>
</tr>
<tr>
<td >Kwh Awal Bulan</td>
<td ><input type="hidden" name="kwh_awal" id="kwh_awal"  value="<?php echo (sizeof($res_kwh_akhir) >0 ? $res_kwh_akhir->kwhnya:"0");?> " />

<input type="hidden" name="kwh_tdk_kena_tarif" id="kwh_tdk_kena_tarif"  value="<?php echo $res_kwh_master->kwh_tdk_kena_tarif?> " />
<?php echo(sizeof($res_kwh_akhir) >0 ? $res_kwh_akhir->kwhnya:"0").", Kwh Tidak Kena tarif : ".$res_kwh_master->kwh_tdk_kena_tarif?></td>
</tr>
<tr>
<td >Kwh Akhir Bulan</td>
<td ><input type="text" name="kwh_akhir" id="kwh_akhir"  value="0" onblur="updateTagihan(this)"/> x Tarif @ Kwh <input type="text" name="tarif_kwh" id="tarif_kwh"  value=" <?php echo $res_kwh_master->kwh_tarif?>" onblur="updateTagihan(this)" /></td>
</tr>

</tbody>
</table>
	<input type="hidden" name="noreg" id="noreg" value="<?=$noreg?>" />
	<INPUT TYPE="hidden" name="idlokasi" id="idlokasi" value="<?=$idlokasi?>">
	<INPUT TYPE="hidden" name="idKamar" id="idKamar" value="<?=$idkamar?>">
	<INPUT TYPE="hidden" name="idKamar" id="idKamar" value="<?=$idkamar?>">
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


<tr ><td>Total Tagihan </td><td>:</td><td><input type="hidden" name="totTagAwal" id="totTagAwal" size="30" readonly value="0" /> <input type="text" name="tagihan" id="tagihan" size="30" readonly value="0" /> </td></tr>



<tr ><td>Jumlah Bayar</td><td>:</td><td colspan=4><input type="text" name="jmlBayar" id="jmlBayar" size="30" value="0"  onkeypress="return numericVal(this,event)"   onkeyup="countPayment(this.value)"/> *Isi Jumlah yang dibayarkan</td></tr>	

<tr><td>Sisa Tagihan  </td><td>:</td><td colspan=4><input type="text" name="sisa" id="sisa" size="30" value="0" readonly></td></tr>
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
	

	if ( $(obj).attr("name") == "kwh_akhir"){
		 jumkwh =   parseFloat($(obj).val())  - parseFloat( $("#kwh_awal").val())  ;		
	}else{
		jumkwh =   parseFloat( $("#kwh_akhir").val())  -parseFloat( $("#kwh_awal").val())  ;
	}
	
	//tidak kena tarif
	
		if ( jumkwh > parseFloat( $("#kwh_tdk_kena_tarif").val()) ) {
			jumkwh = jumkwh - parseFloat( $("#kwh_tdk_kena_tarif").val());
		}else{
			jumkwh = 0;
			//alert($(obj).attr("name"));
			if ( $(obj).attr("name") == "kwh_akhir"){
				alert("tidak kena tarif");
				}
		}
	
	//alert(jumkwh );
	hasil = jumkwh * parseFloat( $("#tarif_kwh").val());
	//alert("hasil="+hasil + "tagihan" + $("#tagihan").val());
	 $("#tagihan").val( ( hasil + parseFloat( $("#totTagAwal").val() )  + parseFloat( $("#tag_pdam").val() ) ) );
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
