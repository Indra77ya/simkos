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
		echo '<a href="'.base_url("rpt_keuangan/res_labarugi/labarugi_".$thn."_".$bln."_".$idlokasi."_1").'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	$jumDebet=0;
	echo "<table class='".($display=="0"?"table table-bordered table-hover":"mytable")."'>"; 
	echo "<tr><th colspan=2>Keterangan</th><th >Debet</th><th >Kredit</th></tr>";
	echo "<tr><th>1</th><th>Pendapatan</th><th colspan=2 >&nbsp;</th></tr>";
	//sewa harian
	$str="select sum(jmlBayar) jml from bayar_harian_detil where idlokasi=".$idlokasi." and date_format(tglBayar,'%Y%m')='".$thn.$bln."' "; 	
	$rsH1=$this->db->query($str)->row();
	echo "<tr>";
	echo "<td>1.1</td>";
	echo "<td>Pendapatan Sewa Harian</td>";
	echo "<td>&nbsp;</td>";
	echo "<td align=right>Rp. ".number_format($rsH1->jml,2,',','.')."</td>";
	
	echo "</tr>";
	$jumDebet+=$rsH1->jml;
	//sewa mingguan
	$str="select sum(jmlBayar) jml  from bayar_mingguan_detil where idlokasi=".$idlokasi." and date_format(tglBayar,'%Y%m')='".$thn.$bln."'"; 	
	$rsH2=$this->db->query($str)->row();
	echo "<tr>";
	echo "<td>1.2</td>";
	echo "<td>Pendapatan Sewa Mingguan</td>";
	echo "<td>&nbsp;</td>";
	echo "<td align=right>Rp. ".number_format($rsH2->jml,2,',','.')."</td>";
	
	echo "</tr>";
	$jumDebet+=$rsH2->jml;
	//sewa bulanan
	$strB="select sum(jmlbayar) jmlb from bayar_bulanan_detil where idlokasi=".$idlokasi." and date_format(tglBayar,'%Y%m')='".$thn.$bln."' and idpendaftaran in (select distinct idpendaftaran from pendaftaran)"; 	
	$rsB=$this->db->query($strB)->row();
	echo "<tr>";
	echo "<td>1.3</td>";
	echo "<td>Pendapatan Sewa Bulanan</td>";
	echo "<td>&nbsp;</td>";
	echo "<td align=right>Rp. ".number_format($rsB->jmlb,2,',','.')."</td>";
	echo "</tr>";
	$jumDebet+=$rsB->jmlb;
	

	//sewa tahunan
	$strT="select sum(jmlbayar) jmlb from bayar_tahunan_detil where idlokasi=".$idlokasi." and date_format(tglBayar,'%Y%m')='".$thn.$bln."' and idpendaftaran in (select distinct idpendaftaran from pendaftaran_tahunan)"; 	
	$rsT=$this->db->query($strT)->row();
	echo "<tr>";
	echo "<td>1.4</td>";
	echo "<td>Pendapatan Sewa Tahunan</td>";
	echo "<td>&nbsp;</td>";
	echo "<td align=right>Rp. ".number_format($rsT->jmlb,2,',','.')."</td>";
	echo "</tr>";
	$jumDebet+=$rsT->jmlb;

	//sewa tahunan tagihan bulanan
	$strTTB="select sum(jmlbayar) jmlb from bayar_tahunan_tag_blnan where idlokasi=".$idlokasi." and date_format(tglBayar,'%Y%m')='".$thn.$bln."' and idpendaftaran in (select distinct idpendaftaran from pendaftaran_tahunan)"; 	
	$rsTTB=$this->db->query($strTTB)->row();
	echo "<tr>";
	echo "<td>1.5</td>";
	echo "<td>Pendapatan Tagihan Bulanan(PDAM/PLN) sewa tahunan</td>";
	echo "<td>&nbsp;</td>";
	echo "<td align=right>Rp. ".number_format($rsTTB->jmlb,2,',','.')."</td>";
	echo "</tr>";
	$jumDebet+=$rsTTB->jmlb;



	//pemasukan lain
	$strL="select sum(besar) jmlb from pemasukan_rutin where idlokasi=".$idlokasi." and date_format(tglBayar,'%Y%m')='".$thn.$bln."' "; 
	$rsL=$this->db->query($strL)->row();
	echo "<tr>";
	echo "<td>1.6</td>";
	echo "<td>Pemasukan Lain-lain</td>";
	echo "<td>&nbsp;</td>";
	echo "<td align=right>Rp. ".number_format($rsL->jmlb,2,',','.')."</td>";
	
	echo "</tr>";
	$jumDebet+=$rsL->jmlb;
	

	//Biaya Rutin -detil
	//Biaya Insidentil
	echo "<tr><td colspan=4><BR></td></tr>";
	echo "<tr><td>&nbsp;</td><td><B>Jumlah Pemasukan/Pendapatan</B></td><td  >&nbsp;</td><td align=right ><B>Rp. ".number_format($jumDebet,2,',','.')."</B></td></tr>";	
	
echo "<tr><th>2</th><th>Pengeluaran</th><th colspan=2 >&nbsp;</th></tr>";
echo "<tr><td>2.1</td><td>Pengeluaran Rutin</td><td colspan=2 >&nbsp;</td	></tr>";
//Pengeluaran rutin
	$strO="select i.item, p.* from pengeluaran_rutin p, itemoption i where idlokasi=".$idlokasi." and p.idItemBayar=i.idItem and idCat=2 and date_format(tglBayar,'%Y%m')='".$thn.$bln."'"; 
	$sOut=$this->db->query($strO)->result();
		$i=1; $jumlahOR=0;
			foreach ( $sOut as $rsOut){
				echo "<tr>";
				echo "<td>2.1.$i</td>";
				echo "<td>".$rsOut->item."</td>";
				
				echo "<td align=right>Rp. ".number_format($rsOut->besar,2,',','.')."</td>";
				echo "<td>&nbsp;</td>";
				echo "</tr>";
				$i++;
				$jumlahOR+=$rsOut->besar;
			}
		echo "<tr><td>&nbsp;</td><td><B>Jumlah Pengeluaran rutin</B></td><td align=right ><B>Rp. ".number_format($jumlahOR,2,',','.')."</B></td><td  >&nbsp;</td></tr>";
	

echo "<tr><td>2.2</td><td>Pengeluaran Insidentil</td><td colspan=2 >&nbsp;</td></tr>";
	//Pengeluaran rutin
	$strOI="select sum(besar) jmlins from pengeluaran_ins where idlokasi=".$idlokasi." and  date_format(tglBayar,'%Y%m')='".$thn.$bln."'"; 
	$rsOutI=$this->db->query($strOI)->row();
	echo "<tr>";
	echo "<td>2.2.1</td>";
	echo "<td>Pengeluran Insidentil ".strtoupper($arrBulan[$bln])." ".$thn."</td>";
	
	echo "<td align=right>Rp. ".number_format($rsOutI->jmlins,2,',','.')."</td>";
	echo "<td>&nbsp;</td>";
	echo "</tr>";
	echo "<tr><td>&nbsp;</td><td><B>Jumlah Pengeluaran Insidentil</B></td><td align=right ><B>Rp. ".number_format($rsOutI->jmlins,2,',','.')."</B></td><td  >&nbsp;</td></tr>";
	echo "<tr><td colspan=4><BR></td></tr>";
	echo "<tr><td>&nbsp;</td><td><B>Total Pengeluaran/Biaya</B></td><td align=right ><B>Rp. ".number_format($jumlahOR+$rsOutI->jmlins,2,',','.')."</B></td><td  >&nbsp;</td></tr>";
echo "<tr><td colspan=4 >&nbsp;</td></tr>";
$saldo=$jumDebet-($jumlahOR+$rsOutI->jmlins);
echo "<tr><th colspan=2><B>Laba/Rugi</B></th><th colspan=2 ><B>".($saldo<0?"(Rp. ".number_format($saldo,2,',','.').")":"Rp. ".number_format($saldo,2,',','.'))."</B></th></tr></table>";	
	
 
 if ($display==0){
	$param="labarugi_".$thn."_".$bln."_".$idlokasi."_1";
?>
</div>
</div>	
</div>
</div>	
<br>
<div class="row" style="text-align:center">
	<div class="col-md-12">	<input type="hidden" name="param" id="param" value="<?=$param?>">
		<!-- <button  id="btToExcel" class="btn btn-success" >Cetak Xls</button>&nbsp; -->
		<a href="<?=base_url("rpt_keuangan/res_labarugi/labarugi_".$thn."_".$bln."_".$idlokasi."_1")?>" class="btn btn-success">Cetak/Download</a><br>		
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