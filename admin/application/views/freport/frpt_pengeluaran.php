<div class="row">
<div class="col-md-12">
 <div class="widget-box">
 <div class="widget-header">
<h4 class="smaller">
<?php echo $title?>
</h4>
</div>
 <div class="widget-body">
<?	if ($display=="0"){
		echo '<a href="'.base_url("rpt_keuangan/res_pengeluaran/pengeluaran_".$thn."_".$bln."_".$idlokasi."_1").'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	
	
	echo "<table class='".($display=="0"?"table table-bordered table-hover":"mytable")."'>"; 	
	
		echo "<tr><th colspan=6>Pengeluaran Rutin</th></tr>";
		
		$colname="<tr><th>No</th>";
		$colname.="<th>Tagihan</th>";
		$colname.="<th>Untuk Periode</th>";
		$colname.="<th>Besar</th>";
		$colname.="<th>Tgl Bayar</th>";
		$colname.="<th>Petugas</th></tr>";
		$tName="pengeluaran_rutin p, itemoption i";
		$cClause="i.item, p.*";
		$wClause="p.idItemBayar=i.idItem and idCat=2 and ";

		$str="select $cClause from $tName where idlokasi=".$idlokasi." and ".$wClause." date_format(tglBayar,'%Y%m')='".$thn.$bln."'  order by tglbayar"; 
		echo  $colname;
		$sOut=$this->db->query($str)->result();
		$jumlah=0;$TOTAL=0;
		if (sizeof($sOut)<=0){
			echo "<tr><td colspan=6>Tidak ada transaksi pengeluaran</td></tr>";
		}else{
		$i=1;
			foreach ( $sOut as $rsOut){		
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$rsOut->item."</td>";
				echo "<td>".$arrBulan[$rsOut->bulan]." ".$rsOut->tahun."</td>";
				echo "<td>Rp. ".number_format($rsOut->besar,2,',','.')."</td>";
				echo "<td>".$rsOut->tglBayar."</td>";
				echo "<td>".$rsOut->petugas."</td>";
				echo "</tr>";
				$i++;
				$jumlah+=$rsOut->besar;
			}
			$TOTAL+=$jumlah;
		}
		echo "<tr><th colspan=3 align=right>Jumlah Pengeluaran Rutin</th><th><B>Rp. ".number_format($jumlah,2,',','.')."</B></th><th colspan=2>&nbsp;</th></tr>";
		echo "<tr><td colspan=6></td></tr>";
		//Insidental
		$colname="<tr><th>No</th>";
		$colname.="<th>Tagihan</th>";
		$colname.="<th>Besar</th>";
		$colname.="<th>Tgl Bayar</th>";
		$colname.="<th>Petugas</th></tr>";
		$tName="pengeluaran_ins";
		$cClause=" * ";
		$wClause="";
		$str="select $cClause from $tName where idlokasi=".$idlokasi." and ".$wClause." date_format(tglBayar,'%Y%m')='".$thn.$bln."' order by tglbayar"; 
		echo  $colname;
		$sOut=$this->db->query($str)->result();
		if (sizeof($sOut)<=0){
			echo "<tr><td colspan=6>Tidak ada transaksi pengeluaran</td></tr>";
		}else{
		$i=1;
		$jumlah=0;
			foreach ( $sOut as $rsOut){		
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$rsOut->keterangan."</td>";
				echo "<td>Rp. ".number_format($rsOut->besar,2,',','.')."</td>";
				echo "<td>".$rsOut->tglBayar."</td>";
				echo "<td>".$rsOut->petugas."</td>";				
				echo "</tr>";
				$i++;
				$jumlah+=$rsOut->besar;
			}
			$TOTAL+=$jumlah;
		}
		echo "<tr><th colspan=2 align=right>Jumlah Pengeluaran Insidentil</th><th><B>Rp. ".number_format($jumlah,2,',','.')."</B></th><th colspan=2>&nbsp;</th></tr>";
		echo "<tr><td colspan=6></td></tr>";
		echo "<tr><th colspan=3 align=right>Total Pengeluaran</th><th colspan=3 align=left><B>Rp. ".number_format($TOTAL,2,',','.')."</B></th> </tr>";
	echo "</table>	";
	
 
 if ($display==0){
	$param="pengeluaran_".$thn."_".$bln."_".$idlokasi."_1";
?>
</div>
</div>	
</div>
</div>	
<br>
<div class="row" style="text-align:center">
	<div class="col-md-12">	<input type="hidden" name="param" id="param" value="<?=$param?>">
		<!-- <button  id="btToExcel" class="btn btn-success" >Cetak Xls</button>&nbsp; -->
		<a href="<?=base_url("rpt_keuangan/res_pengeluaran/pengeluaran_".$thn."_".$bln."_".$idlokasi."_1")?>" class="btn btn-success">Cetak/Download</a><br>		
	</div>
</div>	
<?}?>
<script>
$('#btToExcel').click(function(){		
		//var form_data = $('#myformkel').serialize();
		//alert($('#param').val());
		$().showMessage('Sedang diproses.. Harap tunggu..');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('rpt_kamar/toExcel');?>',
			data: {param:$('#param').val()},				
			dataType: 'json',
			success: function(data,  textStatus, jqXHR){						
					window.open('<?=base_url("'+data.isi+'")?>','_blank');
					$().showMessage('Sukses.','success',1000);
				} ,
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				//$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger');
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});
		//$().showMessage('Data pembelian berhasil disimpan, data order akan dikirim melalui sms','success',1000);
	});
</script>