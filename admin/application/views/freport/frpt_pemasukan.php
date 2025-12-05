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
		echo '<a href="'.base_url("rpt_keuangan/res_pemasukan/pemasukan_".$thn."_".$bln."_".$idlokasi."_1").'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	
	
	echo "<table class='".($display=="0"?"table table-bordered table-hover":"mytable")."'>"; 	
	
		$colname="<tr><th>No</th>";
		$colname.="<th>Item Pemasukan</th>";
		$colname.="<th>Uraian</th>";
		$colname.="<th>Tanggal</th>";
		$colname.="<th>Besar</th>";		
		$colname.="<th>Petugas</th></tr>";
		$tName="pemasukan_rutin";
		$cClause=" * ";
		$wClause="";
		$str="select ".$tName.".".$cClause.", ifnull((select item from itemoption where idlokasi=".$idlokasi." and idcat=3 and iditem=pemasukan_rutin.iditem), keterangan) namaitem from $tName where idlokasi=".$idlokasi." and ".$wClause." date_format(tglBayar,'%Y%m')='".$thn.$bln."' order by tglbayar"; 
		echo  $colname;
		$sOut=$this->db->query($str)->result();
		$jumlah=0;
		if (sizeof($sOut)<=0){
			echo "<tr><td colspan=6>Tidak ada transaksi pemasukan</td></tr>";
		}else{
		$i=1;
		
			foreach ( $sOut as $rsOut){			
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$rsOut->namaitem."</td>";
				echo "<td>".$rsOut->uraian."</td>";
				echo "<td>".$rsOut->tglBayar."</td>";
				echo "<td>Rp. ".number_format($rsOut->besar,2,',','.')."</td>";				
				echo "<td>".$rsOut->petugas."</td>";				
				echo "</tr>";
				$i++;
				$jumlah+=$rsOut->besar;
			}
		}
			//$TOTAL+=$jumlah;
		//echo "<tr><th colspan=2 align=right>Jumlah Pemasukan</th><th><B>Rp. ".number_format($jumlah,2,',','.')."</B></th><th colspan=2>&nbsp;</th></tr>";
		//echo "<tr><td colspan=6></td></tr>";
		echo "<tr><th colspan=3 align=right>Total Pemasukan</th><th colspan=3 align=left><B>Rp. ".number_format($jumlah,2,',','.')."</B></th> </tr>";

	echo "</table>	";
	
 
 if ($display==0){
	$param="pemasukan_".$thn."_".$bln."_".$idlokasi."_1";
?>
</div>
</div>	
</div>
</div>	
<br>
<div class="row" style="text-align:center">
	<div class="col-md-12">	<input type="hidden" name="param" id="param" value="<?=$param?>">
		<a href="<?=base_url("rpt_keuangan/res_pemasukan/pemasukan_".$thn."_".$bln."_".$idlokasi."_1")?>" class="btn btn-success">Cetak/Download</a><br>		
	</div>
</div>	
<?}?>
