<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Informasi</strong>
	<ul>
	<li>Konfirmasi diperlukan jika membayar lewat transfer ATM atau kartu kredit dengen menyertakan bukti transfer/struk CC</li>
	</ul>
</div>
</div>
<br>

<table class="table table-striped table-bordered table-hover">
<tbody>
<tr><td>Jenis Sewa</td><td>:</td><td><?php echo $row->jenis_sewa;?></td></tr>
<tr><td>Lokasi Kost</td><td>:</td><td><?php echo $rowLokasi->lokasi;?></td></tr>
<tr><td>Penghuni</td><td>:</td><td><?php echo "[ ".$row->idPendaftaran." ]".$rowPenghuni->nama;?></td></tr>
<tr><td>Untuk jenis Tagihan</td><td>:</td><td><?php echo $row->jenis_bayar;?></td></tr>
<tr><td>Periode Tagihan</td><td>:</td><td><?php echo $row->periode_tagihan;?></td></tr>
<tr><td>Jumlah Bayar</td><td>:</td><td><?php echo $row->jmlBayar;?></td></tr>
<tr><td>Tanggal Konfirmasi</td><td>:</td><td><?php echo $row->tglBayar;?></td></tr>
<tr><td>Catatan Tambahan</td><td>:</td><td><?php echo $row->jmlBayar;?></td></tr>
<tr><td>Metode Pembayaran</td><td>:</td><td><?php echo $row->metode_bayar;?></td></tr>
</tbody>
</table>
<!-- sampai sini -->
<?  if ($row->metode_bayar=="transfer") { ?>
<table class="table table-striped table-bordered table-hover">
<tbody>
	<tr><td>Dari Bank</td><td>:</td><td><?php echo $row->dari_bank?></td></tr>
	<tr><td>No.Rekening</td><td>:</td><td><?php echo $row->norek_pengirim?></td></tr>
	<tr><td>Atas Nama</td><td>:</td><td><?php echo $row->nama_pengirim?></td></tr>
	<? $qrybank = $this->db->query("Select * from bank where id=".$row->idrek_penerima)->row(); ?>	
	<tr><td>Dibayar ke</td><td>:</td><td><?php echo $qrybank->Nama.", No. Rek : ".$qrybank->NoRekening.", Atas nama : ".$qrybank->atasNama?></td></tr>
	<tr><td>Tgl Transfer</td><td>:</td><td><?php echo $row->tgl_transfer?></td></tr>
	</tbody>
	</table>
<? }else{ ?>
<table class="table table-striped table-bordered table-hover" >
<tbody>
	<tr><td>Jenis Kartu</td><td>:</td><td><?php echo $row->jenis_kartu?></td></tr>
	<tr><td>No.Kartu</td><td>:</td><td><?php echo $row->no_kartu?></td></tr>
	<tr><td>Nama Pemilik</td><td>:</td><td><?php echo $row->nmpemilik_kartu?></td></tr>
	<tr><td>No.Struk</td><td>:</td><td><?php echo $row->no_struk?></td></tr>
	<tr><td>Tgl Struk</td><td>:</td><td><?php echo $row->tgl_struk?></td></tr>
</tbody>
	</table>
	<?}?>
<img src="<?php echo ($row->bukti==""?$myurl."images/none.gif":$myurl."bukti/".$row->bukti)?>" style="max-width:650px">
<hr />


