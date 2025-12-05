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
		echo '<a href="'.base_url("rpt_pembayaran/show_detail/".$jns_sewa."_1_".$noreg."_".$lokasi->id).'" title="Generate to pdf"><img src="'.base_url("assets/images/oficina_pdf.png").'" width=40 ><B><font size="2" style="Courier New" >Cetak ke Pdf</font></B></a>&nbsp;<BR>';
	}
	echo '<div class="row"><div class="col-md-6">';
	echo "<table class='".($display=="0"?"table table-bordered table-hover":"mytable")."'>"; 
	//echo "<tr><th colspan=\"4\">$strData</th></tr>";
	echo "<tr> <td>No. Registrasi</td> <td align=right>:</td> <td colspan=\"3\"><b>".$rsData->idpendaftaran."</b></td> </tr>";
	echo "<tr> <td>Nama</td> <td align=right>:</td> <td colspan=\"3\"><b>".$rsData->nama."</b></td> </tr>";
	echo "<tr valign=top> <td>Alamat/Telp</td> <td align=right>:</td> <td colspan=\"3\"><b>".$rsData->alamat_asal."<br>".($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"?$rsData->notelp:$rsData->telp)."</b></td> </tr>";
	echo "<tr> <td>Sewa Kamar</td> <td align=right>:</td> <td colspan=\"3\"><b>".$rsData->labelkamar."</b></td> </tr> "; 
	if ($jns_sewa=="Harian"|| $jns_sewa=="Mingguan"){
		echo "<tr> <td>Total Tagihan</td> <td align=right>:</td> <td colspan=\"3\"><b>Rp. ".number_format($tagihan,2,',','.')."</b></td> </tr> "; 
	}
	$tglmulai=($jns_sewa=="Harian"?$rsData->tglcek_in:($jns_sewa=="Tahunan"?$rsData->tgldaftar:$rsData->tglmulai));
	echo "<tr> <td>Tanggal Cek In</td> <td align=right>:</td> <td colspan=\"3\"><b>".strftime("%d-%m-%Y", strtotime($tglmulai))."</b></td> </tr>";
	echo "<tr><td>Status</td> <td align=right>:</td> <td colspan=\"3\"><b>".($rsData->checkout=="0"?"Check In":"Check Out").($jns_sewa=="Harian"|| $jns_sewa=="Mingguan"?", ".$status:"")."</b></td> </tr>";
	echo "</table></div></div>";

	echo "<table class='".($display=="0"?"table table-bordered table-hover":"mytable")."'>"; 
	echo "<tr><th ".($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"?"colspan=7":" colspan=4").">DATA PEMBAYARAN</th> </tr>";
	echo "<tr><th>No".($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"?"<th>Periode Tagihan</th>":"")."</th>".($jns_sewa=="Bulanan" || $jns_sewa=="Tahunan"?"<th>Kamar</th><th>Tagihan & Denda</th>":"")."<th>Jml Bayar</th><th>Tgl Bayar</th><th >Data Pembayaran</th></tr>";
	//data pembayaran 
	$jmlBayar=0;$jmlTagihan=0;
	if ($jns_sewa=="Harian"|| $jns_sewa=="Mingguan"){
		$i=1;
		if ( $this->db->query($qryRows)->num_rows <=0){
			echo "<tr><td colspan=6 align=center>Belum Ada pembayaran</td></tr>";
		}else{
			foreach( $resBayar as $rsRows){			
					echo "<tr><td align=center>$i</td><td >Rp. ".number_format($rsRows->jmlBayar,2,',','.')."</td><td >".$rsRows->tglBayar."</td>";
					echo "<td >";
					switch($rsRows->metode_bayar){
						case "tunai": echo $rsRows->metode_bayar; break;
						case "transfer": 
							$keRek=$this->db->query("select * from bank where id=".$rsRows->idrek_penerima)->row();	
							echo  $rsRows->metode_bayar."<br>Tgl Transfer : ".$rsRows->tgl_transfer."<br>Dari : ".$rsRows->dari_bank.", ".$rsRows->norek_pengirim." a.n ".$rsRows->nama_pengirim."<br>Ke Rekening : ".$keRek->Nama." Cabang ".$keRek->Cabang.", Norek : ".$keRek->NoRekening." a.n ".$keRek->atasNama; 
							break;
						case "kartu": 
							echo $rsRows->metode_bayar."<br>Kartu : ".$rsRows->jenis_kartu.", No Kartu: ".$rsRows->no_kartu."<br>A.n :".$rsRows->nmpemilik_kartu." , No/Tgl Struk: ".$rsRows->no_struk."/".$rsRows->tgl_struk; 
							break;
			
					}
					echo "</td>";
					echo "</tr>";				
					$jmlBayar+=$rsRows->jmlBayar;
					$i++;
			}
			echo "<tr><th>Total Bayar </th><th>Rp. ".number_format($jmlBayar,2,',','.')."</th><th colspan=3></th></tr>";
		}

	}else{	//bulanan
		if ($this->db->query($qryRows)->num_rows <=0){
			echo "<tr><td colspan=7 align=center>Belum Ada pembayaran</td></tr>";
		}else{
		
		foreach( $resBayar as $rsMaster){
				if ($jns_sewa=="Bulanan"){
					$idxBln=substr($rsMaster->thnbln_tagihan,4,2);
					$idxThn=substr($rsMaster->thnbln_tagihan,0,4);
					$strDetil="select * from bayar_bulanan_detil where idpendaftaran='".$rsMaster->idPendaftaran."' and pembayaran_ke=".$rsMaster->pembayaran_ke; //edit sini
				}else{
					$idxBln="";
					$idxThn=$rsMaster->tahun_tagihan;
					$strDetil="select * from bayar_tahunan_detil where idpendaftaran='".$rsMaster->idPendaftaran."' and tahun_tagihan=".$rsMaster->tahun_tagihan; //edit sini

				}
					$resDetil=$this->db->query($strDetil)->result();
					//$i=1;
					foreach( $resDetil as $rsRows){	
						echo "<tr><td align=center>".$rsRows->no_urut." </td>";
						echo "<td align=center>".($jns_sewa=="Bulanan"?$arrBulan[$idxBln]." ".$idxThn : $rsMaster->tahun_tagihan)."</td>";
						echo "<td >".$rsMaster->namaKamar."</td>"; //nama kamar
						//$tagihan=($rsRows->jmlTagihan + $rsRows->denda ) + $rsRows->pengurangan_denda;
						$tagihan=$rsMaster->jmlTagihan ;
						//detil bayar
						
						echo "<td >Rp. ".number_format( $tagihan  ,2,',','.')."</td><td >Rp. ".number_format($rsRows->jmlBayar,2,',','.')."</td><td>".$rsRows->tglBayar."</td>";					
						echo "<td >";
						switch($rsRows->metode_bayar){
							case "tunai": echo $rsRows->metode_bayar; break;
							case "transfer": 
								$keRek=$this->db->query("select * from bank where id=".$rsRows->idrek_penerima)->row();
								echo $rsRows->metode_bayar."<br>Tgl Transfer : ".$rsRows->tgl_transfer."<br>Dari : ".$rsRows->dari_bank.", ".$rsRows->norek_pengirim." a.n ".$rsRows->nama_pengirim."<br>Ke Rekening : ".$keRek->Nama." Cabang ".$keRek->Cabang.", Norek : ".$keRek->NoRekening." a.n ".$keRek->atasNama; 
								break;
							case "kartu": 
								echo $rsRows->metode_bayar."<br>Kartu : ".$rsRows->jenis_kartu.", No Kartu: ".$rsRows->no_kartu."<br>A.n :".$rsRows->nmpemilik_kartu." , No/Tgl Struk: ".$rsRows->no_struk."/".$rsRows->tgl_struk; 
								break;
				
						}
						echo "</td>";
						echo "</tr>";				
						$jmlTagihan+=$tagihan;
						$jmlBayar+=$rsRows->jmlBayar;
						//$i++;
					}
		}
			echo "<tr><th  colspan=3>Total </th><th>Rp. ".number_format($jmlTagihan,2,',','.')."</th><th>Rp. ".number_format($jmlBayar,2,',','.')."</th><th colspan=3></th></tr>";
		}
	}

	echo "<tr><td colspan=7 align=center></td></tr>";

	if ($jns_sewa=="Tahunan"){
		foreach( $resBayar as $rsMaster){
			echo "<tr><td colspan=7 align=center></td></tr>";
			echo "<tr><th colspan=7>DATA PEMBAYARAN TAGIHAN BULANAN</th> </tr>";
			echo "<tr><th>No Kuitansi </th><th>Periode</th><th>Listrik</th><th>Air/PDAM</th><th>Jml Bayar</th><th>Tgl Bayar</th><th >Data Pembayaran</th></tr>";
				$tagListrik=0;
				$tagPDAM=0;
				$strTag="select * from bayar_tahunan_tag_blnan where idpendaftaran='".$rsMaster->idPendaftaran."' and idlokasi=".$rsMaster->idlokasi; //edit sini
				$resTag=$this->db->query($strTag)->result();
					$i=1;
					foreach( $resTag as $rows){	
						echo "<tr><td align=center>".$i." </td>";
						echo "<td align=center>".$rows->periode_tagihan."</td>";
						//echo "<td >".$rsMaster->namaKamar."</td>"; //nama kamar
						//$tagihan=$rsMaster->jmltag_listrik ;
						//detil bayar						
						echo "<td >Rp. ".number_format( $rows->jmltag_listrik  ,2,',','.')."</td><td >Rp. ".number_format( $rows->jmltag_pdam  ,2,',','.')."</td><td >Rp. ".number_format($rows->jmlBayar,2,',','.')."</td><td>".$rows->tglBayar."</td>";					
						echo "<td >";
						switch($rows->metode_bayar){
							case "tunai": echo $rows->metode_bayar; break;
							case "transfer": 
								$keRek=$this->db->query("select * from bank where id=".$rows->idrek_penerima)->row();
								echo $rows->metode_bayar."<br>Tgl Transfer : ".$rows->tgl_transfer."<br>Dari : ".$rows->dari_bank.", ".$rows->norek_pengirim." a.n ".$rows->nama_pengirim."<br>Ke Rekening : ".$keRek->Nama." Cabang ".$keRek->Cabang.", Norek : ".$keRek->NoRekening." a.n ".$keRek->atasNama; 
								break;
							case "kartu": 
								echo $rows->metode_bayar."<br>Kartu : ".$rows->jenis_kartu.", No Kartu: ".$rows->no_kartu."<br>A.n :".$rows->nmpemilik_kartu." , No/Tgl Struk: ".$rows->no_struk."/".$rows->tgl_struk; 
								break;
				
						}
						echo "</td>";
						echo "</tr>";				
						$tagListrik+=$rows->jmltag_listrik;
						$tagPDAM+=$rows->jmltag_pdam;
						$jmlBayar+=$rows->jmlBayar;
						$i++;
					}
			echo "<tr><th  colspan=2>Total </th><th>Rp. ".number_format($tagListrik,2,',','.')."</th><th>Rp. ".number_format($tagPDAM,2,',','.')."</th><th>Rp. ".number_format($jmlBayar,2,',','.')."</th><th colspan=2></th></tr>";
				}
	}
	echo "</table>";
	
 
 if ($display==0){
	$param=$jns_sewa."_1_".$noreg."_".$lokasi->id;
?>
</div>
</div>	
</div>
</div>	
<br>
<div class="row" style="text-align:center">
	<div class="col-md-12">	<input type="hidden" name="param" id="param" value="<?=$param?>">
		<!-- <button  id="btToExcel" class="btn btn-success" >Cetak Xls</button>&nbsp; -->
		<a href="<?=base_url("rpt_pembayaran/show_detail/".$jns_sewa."_1_".$noreg."_".$lokasi->id)?>" class="btn btn-success">Cetak/Download</a><br>		
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