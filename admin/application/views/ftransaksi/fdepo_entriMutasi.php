<?php
//cek master deposit
$str ="select * from deposit_master where idpendaftaran='".$noreg."' and idlokasi=".$idlokasi." and jenis_sewa='".$jenis."'";
$qMaster = $this->db->query($str);	
$jmlrow=$qMaster->num_rows();
$resMaster=$qMaster->row();
$saldodepo=0;
$isFirstDepo=0;
$id_depomaster="";
if ($jmlrow<=0){
	$isFirstDepo=1;
}else{
	$saldodepo=$resMaster->jumlah_akumulasi;
	$id_depomaster=$resMaster->id;
}
?>
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<li>Form ini menangani setoran masuk dan penarikan/pengembalian dana deposit, pilih sesuai tipe mutasi</li>		
	<li>Nominal mutasi dientri berupa angka saja</li>		
	</ul>
</div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myformDepoEntri"));?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title smaller">Form Mutasi Deposit</h4>
	</div><!-- widget-header -->
<div class="row">
	<div class="col-md-12" >
<table class="table table-striped table-bordered table-hover" width="90%">
<tbody>
<tr>
<td >Data Penghuni</td><td>:</td>
<td ><input type="hidden" name="noreg" id="noreg" value="<?=$noreg?>" /><b><?php echo "[".$noreg."] ".$resDaftar->nama?></b></td>
</tr>
<tr>
<td >Lokasi/Cabang Kost</td><td>:</td>
<td ><b>
<?				
	echo '<input type="hidden" name="idlokasi" id ="idlokasi" value="'.$lokasi->id.'"/>';
	echo '<label  class="control-label">'.$lokasi->lokasi.'</label>';
?></b></td>
</tr>
<tr><td>Jumlah deposit saat ini </td><td>:</td><td ><input type="text" name="saldoDeposit" id="saldoDeposit" size="30" readonly value="<?php echo $saldodepo?>" /></td></tr>
<tr ><td>Tipe mutasi </td><td>:</td><td><?=form_dropdown('tipe',array("SETORAN"=>"Setoran Masuk","PENARIKAN"=>"Penarikan/Pengembalian Dana"),'','id="tipe" class="form-control"');?></td></tr>
<tr ><td>Nominal mutasi</td><td>:</td><td colspan=4><input type="text" name="jmlBayar" id="jmlBayar" size="30" value="0"  onkeypress="return numericVal(this,event)"   /> *Isi Jumlah yang dibayarkan</td></tr>	
<tr ><td>Catatan </td><td>:</td><td><textarea cols=30 rows=4 name="deskripsi" id="deskripsi"></textarea></td></tr>
</tbody>
</table>
	
	<INPUT TYPE="hidden" name="idlokasi" id="idlokasi" value="<?=$idlokasi?>">
	<INPUT TYPE="hidden" name="idKamar" id="idKamar" value="<?=$idkamar?>">
	<INPUT TYPE="hidden" name="jenis" id="jenis" value="<?=$jenis?>">
	<INPUT TYPE="hidden" name="isFirstDepo" id="isFirstDepo" value="<?php echo $isFirstDepo;?>">
	<INPUT TYPE="hidden" name="id_depomaster" id="id_depomaster" value="<?php echo $id_depomaster?>">
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

</script>
