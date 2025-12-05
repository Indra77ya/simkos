<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	
	<li>Pembayaran Deposit di Form Pendaftaran juga dicatat dan ditampilkan disini</li>
	<li>Pembayaran mutasi (setoran dan pengembalian) deposit dengan mengklik tombol "form entri" </li>
	<li>Editing data deposit dengan mengklik link edit di masing-masing link</li>	
	</ul>
</div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_bln"));?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title smaller">Informasi Mutasi Deposit Penghuni</h4>
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
<td ><b><?php echo $res->idpendaftaran.' - '.$res->nama."<br>".$res->alamat_asal?></b></td>
</tr>
<tr>
<td >Sewa Kamar Bulanan</td>
<td ><?php echo $res->labelkamar?></td>
</tr>
<tr>
<td >Status</td>
<td ><b><?php echo ($res->checkout==0?"Check In":"Check Out")?></b></td>
</tr>
</tbody>
</table>
	</div>
</div>

<table class="table table-striped table-bordered table-hover">
<tbody>
<tr ><td colspan=8 ><?php echo '<a class="btn btn-primary" href="javascript:void(0)" onclick="formDepo(this)" data-noreg="'.$res->idpendaftaran.'" data-jenis="Tahunan" data-idkamar="'.$res->idkamar.'"  data-idlokasi="'.$res->idlokasi.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Form Entri Mutasi</a>';?></td></tr>
<tr ><th colspan=8 bgcolor="#a7a7a7">Daftar Mutasi Deposit</th></tr>
<tr><th>No</th><th >Tipe</th><th >Tgl Bayar</th><th>Metode</th><th>Debet</th><th>Kredit</th><th>Keterangan</th><th>Edit/Cetak</th></tr>
<?	
	$strcek="Select * from deposit_detil where deposit_id in (select id from deposit_master where idpendaftaran='".$res->idpendaftaran."' and idlokasi='".$res->idlokasi."' and jenis_sewa='Tahunan')";
	$query = $this->db->query($strcek);
	$cek=$query->num_rows();
	if ($cek<=0){
		echo "<tr><td colspan=8 align=center>Data Mutasi Deposit tidak ada </td></tr>";	
	}else{
		$result=$query->result();
		$i=1; $jumlah=0;
		foreach($result as $rs){
			if ($rs->tipe=='SETORAN'){
				$jumlah+=$rs->jumlah;
			}else{
				$jumlah-=$rs->jumlah;
			}
			echo "<tr>";
			echo "<td>$i</td>";			
			echo "<td>".$rs->tipe."</td>";						
			echo "<td>".$rs->tglBayar."</td>";	
			echo "<td>".$rs->metode_bayar."</td>";					
			echo "<td align=right>".($rs->tipe=='SETORAN'?number_format($rs->jumlah, 2, ',','.'):0)."</td>";						
			echo "<td align=right>".($rs->tipe=='PENARIKAN'?number_format($rs->jumlah, 2, ',','.'):0)."</td>";
			echo "<td>".$rs->deskripsi."</td>";	
			echo '<td><a href="javascript:void(0)" onclick="editThis(\'Tahunan\', \''.$rs->deposit_id.'\', \''.$rs->id.'\')" ><i class="glyphicon glyphicon-edit" title="Edit"></i></a>  | <a href="'.base_url('rpt_pembayaran/printDepoReceipt/Tahunan_1_'.$rs->deposit_id.'_'.$rs->id).'"><i class=" glyphicon glyphicon-print" title="Cetak Kuitansi ?"></i></a></td>';									
			echo "</tr>";
			$i++;
		}
		echo "<tr><td colspan=4 align=left><b>Saldo Akhir</b></td><td colspan=2 align=right><b>Rp. ".number_format($jumlah, 2, ',','.')."</b></td><td colspan=2></td></tr>";
	}
?>
</tbody>
</table>

</div><!-- widget-box -->


<?php echo form_close();?>
<script type="text/javascript">
function formDepo(obj){
		var idlokasi = $(obj).attr('data-idlokasi');
		var noreg = $(obj).attr('data-noreg');
		var idkamar = $(obj).attr('data-idkamar');
		var jenis =  $(obj).attr('data-jenis');			
		
		$.ajax({
			url: "<?php echo base_url('e_pembayaran/form_entri_depo'); ?>",
			dataType: 'html',
			type: 'POST',
			data: {ajax:'true', noreg:noreg, idkamar:idkamar, idlokasi:idlokasi, jenis:jenis},
			success:
				
				function(data){
					
					var thisBox=bootbox.dialog({
					  onEscape	:true,					 
					  message: data,
					  title: "Form Mutasi Deposit",
					  buttons: {
						success: {
						  label: "Simpan",
						  className: "btn-success",
						  callback: function() {
							saveFormDepo(noreg, idkamar, idlokasi, jenis);
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
					thisBox.attr('id','mydialog');
				}
		});
	}


function saveFormDepo(noreg, idkamar, idlokasi, jenis){
	var form_data=$('#myformDepoEntri').serialize();
	var tipe=$('#tipe').val();
	var saldoDeposit=$('#saldoDeposit').val();
	var jmlBayar=$('#jmlBayar').val();
	var sisa=saldoDeposit-jmlBayar;
	if (tipe=='PENARIKAN' && sisa<=0){
		$().showMessage('Jumlah Penarikan dana tidak boleh lebih besar dari Jumlah deposit terakhir <br>'+msg.errormsg ,'danger',700);
	}else{

		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pembayaran/saveMutasiDepo');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				 
				if(msg.status =='success'){
					
					bootbox.dialog({
					  onEscape	:true,					 
					  message: "Data entri mutasi deposit berhasil disimpan. Cetak Kuitansi ?",
					  title: "Konfirmasi",
					  buttons: {
						success: {
						  label: "Cetak Kuitansi",
						  className: "btn-success",
						  callback: function() {							
								//printReceipt();
								window.location.href="<?php echo base_url('rpt_pembayaran/printDepoReceipt/Tahunan');?>"+"_1_"+msg.id_depomaster+"_"+msg.detil_insert_id ;
						  }
						},						
						main: {
						  label: "Tutup",
						  className: "btn-warning",
						  callback: function() {
							console.log("Primary button");
							window.location.reload();
						  }
						}
					  }
					});
				} else {
					
					$().showMessage('Terjadi kesalahan. Data gagal disimpan. <br>'+msg.errormsg ,'danger',700);
					
					$("#errorHandler").html(msg.errormsg).show();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				//$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger');
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan. diluar ajax<br>"+ 	textStatus + " - " + errorThrown );
			},
			cache: false
		});
	}
	
		
}

function editThis(jenis, depo_id, id_detil){
		
		$.ajax({
			url: "<?php echo base_url('e_pembayaran/formDepo_edit'); ?>",
			dataType: 'html',
			type: 'POST',
			data: {ajax:'true', depo_id:depo_id, jenis:jenis, id_detil:id_detil },
			success:
				
				function(data){
					
					bootbox.dialog({
					  onEscape	:true,					 
					  message: data,
					  title: "Form Edit Mutasi Deposit ",
					  buttons: {
						/*success: {
						  label: "Simpan",
						  className: "btn-success",
						  callback: function() {
							saveFormPay(jenis, depo_id, id_detil);
						  }
						},*/
						main: {
						  label: "Tutup",
						  className: "btn-warning",
						  callback: function() {
							console.log("Primary button");
						  }
						}
					  }
					});
					//thisBox.attr('id','mydialog');
				}
		});
	}


</script>
