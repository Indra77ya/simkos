<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<li>Buat/Kirim tagihan ke penghuni agar penghuni bisa melakukan konfirmasi pembayaran</li>
	<li>Tagihan/Invoice dibuat untuk masing-masing penghuni berisi tagihan sewa dan tagihan non sewa</li>	
	<li>Tagihan Non sewa (listrik, Air) harus diisi dulu nominalnya sebelum tagihan dikirim</li>	
	</ul>
</div>
<div class="row">
<div class="col-md-12">
<div class="widget-box" style='overflow-y:scroll;'>
 <div class="widget-header">
<h4 class="smaller">
TAGIHAN JENIS SEWA BULANAN
</h4>
</div>
 <div class="widget-body">

 <div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="mydataTables">
		<thead>
			<tr>
				<th>NO</th>
				<th>LOKASI</th>
				<th>NOREG</th>				
				<th>NAMA</th>				
				<th>PERIODE</th>
				<th>TAGIHAN SEWA</th>
				<th>BIAYA TAMBAHAN</th>
				<th>DENDA</th>
				<th>KETERANGAN</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			
		
<?	
$html="";
$i=1;
$rsDenda = $this->db->query("select nominal from denda where id=1")->row();
//echo $strbln;	
foreach($row_bln as $row){		
				$qkamar = $this->db->query("select * from kamar where idkamar=".$row->IDKAMAR)->row();
				$biaya_tamb=0;
					$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from detildaftar d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='".$row->IDPENDAFTARAN."'";
					$querytarif=$this->db->query($sBiaya)->result();
					
			foreach($querytarif as $rowtarif){							
							$biaya_tamb+=$rowtarif->tarif;							
					}
				
				$dd_tglMulai=substr($row->tglMulai,8,2);
				$mm_tglMulai=substr($row->tglMulai,5,2);
				$yy_tglMulai=substr($row->tglMulai,0,4);
				$tag=""; 
				$strLoopPeriod="";$denda="";$hariDenda=0;
				$x=intval($yy_tglMulai.$mm_tglMulai);
					for ($x;$x<=intval(date('Ym'));$x++){
						$x=$yy_tglMulai.$mm_tglMulai;
						$strLoopPeriod=$yy_tglMulai."-".$mm_tglMulai."-".$dd_tglMulai;
						$cekRow=$this->db->query("select count(*) cek from bayar_bulanan where idpendaftaran='".$row->IDPENDAFTARAN."' and idlokasi=".$row->IDLOKASI." and thnbln_tagihan='$x'")->row();
						if ($cekRow->cek <=0){
							$interval = date_diff(date_create($strLoopPeriod),date_create() );
							$intervalbln=$interval->format("%m");
							$intervalhr=$interval->format("%d");
							$denda="";
							if ($intervalbln>=1){
								$hariDenda=cal_days_in_month(CAL_GREGORIAN, $mm_tglMulai, $yy_tglMulai);
								$denda="1 bulan atau ".$hariDenda." hari";
								
							}else{
								if ($strLoopPeriod>date('Y-m-d')){
									$hariDenda=0;
									$denda="Belum telat. (tagihan keluar tgl :".$strLoopPeriod.")";
								}else{
									$hariDenda=$intervalhr;
									$denda=" $hariDenda Hari";
								}
							}
							$tag.="Tagihan : ".$arrBulan[$mm_tglMulai]." ".$yy_tglMulai.", Telat  : ".$denda."<br>";
							$html.="<tr>";
							$html.="<td>$i</td>";
							$html.="<td>".$row->NMLOKASI."</td>";
							$html.="<td>".$row->IDPENDAFTARAN."</td>";
							$html.="<td>".$row->NMPENGHUNI."</td>";
							$html.="<td>".$arrBulan[$mm_tglMulai]." ".$yy_tglMulai."</td>";
							$html.="<td>".($qkamar->TARIFBULANAN - $row->diskon)."</td>";
							$html.="<td>".$biaya_tamb."</td>";
							$html.="<td>".$rsDenda->nominal * $hariDenda."</td>";
							$html.="<td>".$denda."</td>";
							$html.='<td>	<a href="javascript:void(0)" onclick="monthlyInv(this)" data-noreg="'.$row->IDPENDAFTARAN.'"  data-idlokasi="'.$row->IDLOKASI.'" data-idkamar="'.$row->IDKAMAR.'"  data-thnbln="'.$yy_tglMulai.$arrBulan[$mm_tglMulai].'" data-tagihan="" data-hrdenda="'.$hariDenda.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Buat Tagihan </a></td>';
							$html.="</tr>";
						}
						

						$mm_tglMulai=intval($mm_tglMulai)+1;
						//$mm_tglMulai++;
						if ($mm_tglMulai>12) {
							$mm_tglMulai=1;
							$yy_tglMulai+=1;
						}
						$mm_tglMulai=(strlen($mm_tglMulai)<=1?"0".$mm_tglMulai:$mm_tglMulai);
						$i++;
					}
					$i++;
}
	echo $html;
?>
</tbody>
</table>
<!-- ################################ -->

 <div class="widget-header"><h4 class="smaller">TAGIHAN JENIS SEWA TAHUNAN</h4></div>

 <div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="mydataTables">
		<thead>
			<tr>
				<th>NO</th>
				<th>LOKASI</th>
				<th>NOREG</th>				
				<th>NAMA</th>				
				<th>PERIODE</th>
				<th>TAGIHAN SEWA</th>
				<th>BIAYA TAMBAHAN</th>
				<th>DENDA</th>
				<th>KETERANGAN</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			
		
<?	
$html="";
$k=0;
$rsDendaThn = $this->db->query("select nominal, hari_ke from denda where id=1")->row();
$hari_ke_denda=$rsDendaThn->hari_ke;
$denda=$rsDendaThn->nominal;
//echo $strbln;	
$tagihan=0;
foreach($row_thn as $res){
		$noreg=$res->IDPENDAFTARAN;
				$qkamar = $this->db->query("select * from kamar where idkamar=".$res->IDKAMAR)->row();	
				
				$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from detildaftar_tahunan d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='$noreg'";
				$qryby=$this->db->query($sBiaya)->result();
				$jmlby=0;
				foreach($qryby as $rowbiaya){						
						$jmlby+=$rowbiaya->tarif;						
				}
		$tagihan= $qkamar->TARIFTAHUNAN - $res->diskon;	
		$test="";
		$tgldaftarFull=$res->TGLDAFTAR;	
		$thnMulai=date('Y', strtotime($tgldaftarFull));
		$mmdd_mulai=date('m-d', strtotime($tgldaftarFull));
		$ymd_jatuhtempo=""; $muncul_denda="";
		$thnloop=$thnMulai;
		
		
		for ($thnloop=$thnMulai;$thnloop<=date('Y');$thnloop++){	
			 $hariDenda=0; $denda_ket="";
			$ymd_jatuhtempo=$thnloop."-".$mmdd_mulai;			

			$cekbayar_sewa=$this->db->query("select * from bayar_tahunan where idpendaftaran='$noreg' and idlokasi=".$res->IDLOKASI." and tahun_tagihan='".$thnloop."'");
			$cekbayar_tag_blnn=$this->db->query("select * from bayar_tahunan_tag_blnan where idpendaftaran='$noreg' and idlokasi=".$res->IDLOKASI." and periode_tagihan like '".$thnloop."%' order by periode_tagihan");	
			
			$sts_sewa=""; $ket_sewa=""; $rssewa = $cekbayar_sewa->row(); $link_sewa="";
			$sts_tagbln=""; $ket_tagbln=""; $rs_tagbln=$cekbayar_tag_blnn->result(); $link_tagbln="";

			if ($cekbayar_sewa->num_rows()<=0) {
					$sts_sewa="Belum Lunas";
					//cek denda
					$muncul_denda=strftime("%Y-%m-%d", strtotime(strftime("%Y-%m-%d", strtotime($ymd_jatuhtempo))." + $hari_ke_denda day"));
						$interval = date_diff(date_create($muncul_denda),date_create() );
						$intervalthn=intval($interval->format("%Y"));
						$intervalbln=$interval->format("%m");
						$intervalhr=$interval->format("%d");
					
					if ($thnloop <= date('Y') ) {		
						
						if ($intervalthn >=1){						
							$hariDenda=$intervalthn*12*30;
							$denda_ket="Telat ".$intervalthn." tahun";
						}elseif ($intervalbln>=1){						
							$hariDenda=$intervalbln*30;
							$denda_ket="Telat ".$intervalbln." bulan";
						}else{
							$hariDenda=$intervalhr;
							$denda_ket="Telat : $hariDenda Hari";
						}

						$denda_ket.=", Denda : ".$hariDenda * $denda;
					}else{	
						$hariDenda=0;
						$denda_ket="Belum denda. (Denda mulai keluar tgl :".$muncul_denda.")";
						//$denda_ket="Belum denda. (Denda keluar tgl :".($ymd_jatuhtempo+$hari_ke_denda).")";
					}


					//$link_sewa='<a href="javascript:void(0)" onclick="yearlyInv(this)" data-noreg="'.$res->IDPENDAFTARAN.'" data-idkamar="'.$res->IDKAMAR.'"  data-idlokasi="'.$res->IDLOKASI.'" data-byrke="'.($i+1).'" data-thn="'.$thnloop.'" data-tagihan="'.$tagihan.'" data-hrdenda="'.$hariDenda.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Bayar </a>';
					$ket_sewa.="Tagihan : ".number_format($tagihan,0,',','.')."<br>";
					$ket_sewa.=$denda_ket;
							$html.="<tr>";
							$html.="<td>$k</td>";
							$html.="<td>".$res->NMLOKASI."</td>";
							$html.="<td>".$res->IDPENDAFTARAN."</td>";
							$html.="<td>".$res->NMPENGHUNI."</td>";
							$html.="<td> ".$thnloop."</td>";
							$html.="<td> ".$tagihan."</td>";
							$html.="<td>".$jmlby."</td>";
							$html.="<td>".$rsDenda->nominal * $hariDenda."</td>";
							$html.="<td>".$denda_ket."</td>";
							$html.='<td>	<a href="javascript:void(0)" onclick="yearlyInv(this)" data-noreg="'.$row->IDPENDAFTARAN.'"  data-idlokasi="'.$row->IDLOKASI.'" data-idkamar="'.$row->IDKAMAR.'"  data-thnbln="'.$yy_tglMulai.$arrBulan[$mm_tglMulai].'" data-tagihan="'.($tagihan + $biaya_tamb + ($rsDenda->nominal * $hariDenda)).'" data-hrdenda="'.$hariDenda.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Buat Tagihan </a></td>';
							$html.="</tr>";
			}

			if ($cekbayar_tag_blnn->num_rows() <12){ //open link bayar
				$link_tagbln='<a href="javascript:void(0)" onclick="payThis_tagbln(this)" data-noreg="'.$res->IDPENDAFTARAN.'" data-idkamar="'.$res->IDKAMAR.'"  data-idlokasi="'.$res->IDLOKASI.'"  data-thn="'.$thnloop.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Bayar </a>';
				$ket_tagbln.=($cekbayar_tag_blnn->num_rows()<=0?"Belum ada pembayaran":"");
				$r=1;
				foreach($rs_tagbln as $rows){
					$ket_tagbln.=$r.". ".$rows->periode_tagihan." :  [ Listrik Rp. ". number_format($rows->jmltag_listrik,0,',','.')." ]"." [ PDAM Rp. ". number_format($rows->jmltag_pdam,0,',','.')." ]"."<br>";
					$r++;
				}
				
			}
			
			$k++;
			
		}
				
}
	echo $html;
	echo "";
?>

</tbody>
	</table>
</div>


</div>	
</div>
</div>	
<br>
	