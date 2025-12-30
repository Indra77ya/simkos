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
		$pdf_param = "kosong_1" . ($id_lokasi != "" ? "_".$id_lokasi : "");
		echo '<div class="row" style="margin-bottom: 10px;">';
		echo '<div class="col-md-6">';
		echo '<a href="'.base_url("rpt_kamar/kamar_kosong/".$pdf_param).'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>';
		echo '</div>';

		if(isset($list_lokasi) && count($list_lokasi) > 1) {
			echo '<div class="col-md-6 text-right">';
			echo '<form class="form-inline">';
			echo '<label>Filter Lokasi: </label> ';
			echo '<select id="filter_lokasi" class="form-control" onchange="window.location.href=\''.base_url("rpt_kamar/kamar_kosong/kosong_0_").'\' + this.value">';
			echo '<option value="">- Semua Lokasi -</option>';
			foreach($list_lokasi as $loc) {
				$selected = ($id_lokasi == $loc->id) ? 'selected' : '';
				echo '<option value="'.$loc->id.'" '.$selected.'>'.$loc->lokasi.'</option>';
			}
			echo '</select>';
			echo '</form>';
			echo '</div>';
		}

		echo '</div>';
	}
	
	if (sizeof($lokasi)<=1){
	echo '<table  class="'.($display=="0"?"table table-bordered table-hover data-table":"mytable").'">';
		
		$str="select * from kamar  where idlokasi=".(isset($lokasi->id) ? $lokasi->id : 0)." order by labelkamar";
		$jml= $this->db->query("select count(*) cek from kamar where idlokasi=".(isset($lokasi->id) ? $lokasi->id : 0)." order by labelkamar")->row();
		echo '<thead>';
		echo '<tr><th>No</th><th>Kamar</th><th width="25%">Fasilitas</th><th>Tarif</th><th>Kuota</th><th>Sisa</th><th>Kosong Sejak</th><th>Lama Kosong(Hari)</th></tr>';
		echo '</thead>';
	if ($jml->cek<=0){
		echo '<tr align=center><td colspan=7>Data Kamar Lokasi kost ini Tidak Ada</td></tr>';
	}else{
		$sql= $this->db->query($str)->result();
		$i=1;$sisa="";
			foreach ( $sql as $rsMaster){
				$strCek="SELECT k.idkamar, labelkamar,kapasitas, terisi,luas, fasilitas, tarifharian, tarifbulanan, last_checkout_date, (TIMESTAMPDIFF(DAY,last_checkout_date,NOW())) selisih
					FROM `cekkamar` c, kamar k
					WHERE c.idkamar=k.idkamar and k.idKamar='".$rsMaster->IDKAMAR."'";
				$cx=$this->db->query(" select count(*) cek from `cekkamar` c, kamar k where c.idkamar=k.idkamar and k.idKamar='".$rsMaster->IDKAMAR."'")->row();
				if ($cx->cek <=0){
					$terisi=0;
					$sisa=$rsMaster->KAPASITAS;
				}else{
					//$sqlC=mysql_query($strCek);
					$rs=$this->db->query($strCek)->row();
					$terisi=$rs->terisi;
					$sisa=(($rsMaster->KAPASITAS - $terisi)<=0?'<B>Penuh</B>':($rsMaster->KAPASITAS - $terisi));
					
				}
				if ($sisa!='<B>Penuh</B>'){
				
				echo '<tr valign=top >';
				echo '<td align="center">'.$i.'</td>';
				echo '<td><B>'.$rsMaster->LABELKAMAR.'</B><br>Luas : '.$rsMaster->LUAS.' M</td>';
				echo '<td >'.$rsMaster->FASILITAS.'</td>';
				
				echo '<td>Harian : Rp.'.number_format($rsMaster->TARIFHARIAN,2,',','.').'<br>Mingguan : Rp. '.number_format($rsMaster->TARIFMINGGUAN,2,',','.').'<br>Bulanan : Rp. '.number_format($rsMaster->TARIFBULANAN,2,',','.').'</td>';
				echo '<td align=center>'.$rsMaster->KAPASITAS.' Orang</td>';
				echo '<td align=center '.($sisa>0?' style="background-color:#a9ebbd"':'style="background-color:#ff3366"').'><b>'.$sisa.'</b></td>';
				echo '<td align=center ><b>'.((isset($rs) && !empty($rs)) ? strftime("%d %B %Y", strtotime($rs->last_checkout_date)) : '-').'</b></td>';
				echo '<td align=center ><b>'.((isset($rs) && !empty($rs)) ? $rs->selisih : '-').'</b></td>';
				echo '</tr>';
				
				}
				$i++;
			}
	}

	echo '</table>';
	}else{
		
	foreach ( $lokasi as $rsLokasi){
		echo '<H4>Lokasi/Cabang Kost : [ '.$rsLokasi->kode_kost.' ]  '.strtoupper($rsLokasi->lokasi).'</H4>';
		echo '<table  class="'.($display=="0"?"table table-bordered table-hover data-table":"mytable").'">';
		
		$str="select * from kamar  where idlokasi=".$rsLokasi->id." order by labelkamar";
		$jml= $this->db->query("select count(*) cek from kamar where idlokasi=".$rsLokasi->id." order by labelkamar")->row(); 
		echo '<thead>';
		echo '<tr><th>No</th><th>Kamar</th><th width="25%">Fasilitas</th><th>Tarif</th><th>Kuota</th><th>Sisa Kosong</th><th>Kosong Sejak</th><th>Lama Kosong(Hari)</th></tr>';
		echo '</thead>';
	if ($jml->cek<=0){
		echo '<tr align=center><td colspan=7>Data Kamar Lokasi kost ini Tidak Ada</td></tr>';
	}else{
		$sql= $this->db->query($str)->result();
		$i=1;$sisa="";
			foreach ( $sql as $rsMaster){
				$strCek="SELECT k.idkamar, labelkamar,kapasitas, terisi,luas, fasilitas, tarifharian, tarifbulanan, last_checkout_date, (TIMESTAMPDIFF(DAY,last_checkout_date,NOW())) selisih
					FROM `cekkamar` c, kamar k
					WHERE c.idkamar=k.idkamar and k.idKamar='".$rsMaster->IDKAMAR."'";
				$rs=$this->db->query($strCek)->row();
				$cx=$this->db->query(" select count(*) cek from `cekkamar` c, kamar k where c.idkamar=k.idkamar and k.idKamar='".$rsMaster->IDKAMAR."'")->row();
				if ($cx->cek <=0){
					$terisi=0;
					$sisa=$rsMaster->KAPASITAS;
				}else{
					
					
					$terisi=$rs->terisi;
					$sisa=(($rsMaster->KAPASITAS - $terisi)<=0?'<B>Penuh</B>':($rsMaster->KAPASITAS - $terisi));
					
				}
				if ($sisa!='<B>Penuh</B>'){
				echo '<tr valign=top >';
				echo '<td align="center">'.$i.'</td>';
				echo '<td><B>'.$rsMaster->LABELKAMAR.'</B><br>Luas : '.$rsMaster->LUAS.' M</td>';
				echo '<td >'.$rsMaster->FASILITAS.'</td>';
				
				echo '<td>Harian : Rp.'.number_format($rsMaster->TARIFHARIAN,2,',','.').'<br>Mingguan : Rp. '.number_format($rsMaster->TARIFMINGGUAN,2,',','.').'<br>Bulanan : Rp. '.number_format($rsMaster->TARIFBULANAN,2,',','.').'</td>';
				echo '<td align=center>'.$rsMaster->KAPASITAS.' Orang</td>';
				echo '<td align=center '.($sisa>0?' style="background-color:#a9ebbd"':'style="background-color:#ff3366"').'><b>'.$sisa.'</b></td>';
				echo '<td align=center ><b>'.((isset($rs) && !empty($rs)) ? strftime("%d %B %Y", strtotime($rs->last_checkout_date)) : '-').'</b></td>';
				echo '<td align=center ><b>'.((isset($rs) && !empty($rs)) ? $rs->selisih : '-').'</b></td>';
				//echo '<td>'.$rsMaster[4].'</td>';
				
				echo '</tr>';
				
				}
				$i++;
			}
	}

	echo '</table>';

		}
	}
 
 if ($display==0){
	//$param=$thn."_".$bln."_1";
	$param="status_1_";
	
?>
</div>
</div>	
</div>
</div>	
<br>
<div class="row" style="text-align:center">
	<div class="col-md-12">	<input type="hidden" name="param" id="param" value="<?=$param?>">
		<!-- <button  id="btToExcel" class="btn btn-success" >Cetak Xls</button>&nbsp; -->
		<?php $pdf_param = "kosong_1" . ($id_lokasi != "" ? "_".$id_lokasi : ""); ?>
		<a href="<?=base_url("rpt_kamar/kamar_kosong/".$pdf_param)?>" class="btn btn-success">Cetak/Download</a><br>
	</div>
</div>
<script>
$(document).ready(function(){
	$('.data-table').DataTable();
});
</script>
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