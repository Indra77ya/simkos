

<div class="row" >
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<img id="avatar"  alt="<?php echo $this->session->userdata('auth')->NAMA?>'s Avatar"   src="<?php echo $nmfile?>" width="140" height="160"/>
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white"><?php echo $this->session->userdata('auth')->NAMA ?></span>
														</a>
													</div>
												</div>
											</div>

											<div class="space-6"></div>
											<div class="profile-contact-info">
												<div class="profile-contact-links align-left">
													<a href="#" class="btn btn-link">
														<i class="ace-icon fa fa-globe bigger-125 blue"></i>
														Last Login : <?php echo $resRole->UPDATED_DATE?>
													</a>
													<a href="#" class="btn btn-link">
														<i class="ace-icon fa fa-cogs bigger-120 green"></i>
														Role Access : <?php echo $resRole->ROLE?>
													</a>

													

													
												</div>
											</div>
										</div>

										<div class="col-xs-12 col-sm-9">
											<div class="space-12"></div>
											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> <?php echo ($statusData=="pusat"?"Nama&nbsp;Usaha&nbsp;Kost":"Kode&nbsp;Kost/Lokasi")?> </div>

													<div class="profile-info-value">
														<span class="editable" ><?php echo ($statusData=="pusat"?$resKostProfil->nama:$resKostProfil->kode_kost."/".$resKostProfil->lokasi)?> </span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> <?php echo ($statusData=="pusat"?"Pemilik&nbsp;Usaha&nbsp;Kost":"Nama&nbsp;Pengurus")?> </div>

													<div class="profile-info-value">
														<span class="editable" ><?php echo ($statusData=="pusat"?$resKostProfil->nama_pemilik:$resKostProfil->nama_pengurus."/".$resKostProfil->lokasi)?> </span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Alamat </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker light-orange bigger-110"></i>
														<span class="editable" id="country"><?php echo $resKostProfil->alamat;?></span>
													</div>
												</div>

												

												<div class="profile-info-row">
													<div class="profile-info-name"> No. Telp/Hp </div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?php echo ($statusData=="pusat"?$resKostProfil->telepon.", ".$resKostProfil->hp:$resKostProfil->telp.", ".$resKostProfil->hp)?> </span>
													</div>
												</div>
<?	 if ($statusData=="pusat") {
	?>
													<div class="profile-info-row">
													<div class="profile-info-name"> Cabang/Lokasi Usaha Kost </div>

													<div class="profile-info-value">
														<span class="editable" id="signup">														
														<?php  $i=1;
														foreach($resAllKost as $rsKost){
															echo $i.". [ ".$rsKost->kode_kost." ] ".$rsKost->lokasi."<br>"; $i++;
													}
														?> </span>
													</div>
												</div>
	<?
		}

?>
												
											</div>

											<div class="space-20"></div>
											<div class="hr hr2 hr-double"></div>
											<div class="space-6"></div>
											
										</div>
									</div>
								</div>
<br/>&nbsp;<br/>
<div class="row" >

<div class="row">
	<div class="col-sm-12 infobox-container">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi/Cabang Kost</label>
			<div class="col-sm-4">
			<?php
				if ($this->session->userdata('auth')->ROLE=="Superadmin"){
					echo form_dropdown('cb_lokasi',$lokasi,'','id="cb_lokasi" class="form-control"');
				}else{
					echo form_dropdown('cb_lokasi',$optlokasi,'','id="cb_lokasi" class="form-control"');
					//echo form_dropdown('cb_lokasi',array($lokasi->kode_kost => $lokasi->kode_kost.' - '.$lokasi->lokasi),'','id="cb_lokasi" class="form-control"');
					
				}
				?>			
			</div>
		</div>
	</div>
</div>
<div class="space-6"></div>		
<div class="col-sm-12 infobox-container " id="mapdiv"></div>									
</div><!-- /.row -->
<div class="hr hr32 hr-dotted"></div>

<?
if ($statusData=="cabang"){
	$rsTerisi=$this->db->query("SELECT idlokasi, (SELECT lokasi FROM lokasi WHERE id=k.idlokasi) nmlokasi, COUNT(*) jmlisi FROM kamar k, cekkamar c WHERE k.`IDKAMAR`=c.`idKamar` and idlokasi=".$lokasi->id." AND terisi>0 GROUP BY idlokasi")->row();
		$rsKosong=$this->db->query("SELECT idlokasi, (SELECT lokasi FROM lokasi WHERE id=k.idlokasi) nmlokasi, COUNT(*) jmlisi FROM kamar k, cekkamar c WHERE k.`IDKAMAR`=c.`idKamar` and idlokasi=".$lokasi->id." AND terisi=0 GROUP BY idlokasi")->row();
		$rsTotal=$this->db->query("SELECT COUNT(*) jml FROM kamar WHERE idlokasi =".$lokasi->id)->row();
		?>
		<br>
		<div class="col-xs-2"></div>
		<div class="col-xs-10  center">
		<div class=" col-sm-10 infobox-container ">
			<div class="infobox infobox-grey  infobox-dark">
											<div class="infobox-chart">
												<span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
											</div>

											<div class="infobox-data">
												<div class="infobox-content"><?php echo $lokasi->kode_kost?></div>
												<div class="infobox-content"><?php echo $lokasi->lokasi?></div>
											</div>
			</div>
			

			<div class="infobox infobox-blue">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-home"></i>
				</div>

				<div class="infobox-data">
				<span class="infobox-data-number"><?php echo (sizeof($rsTotal)>0?$rsTotal->jml:0)?></span>
					<div class="infobox-content">Total Kamar</div>
				</div>
				
			</div>

			<div class="infobox infobox-green">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-lock"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number"><?php echo (empty($rsTerisi)?0:$rsTerisi->jmlisi)?></span>
						<div class="infobox-content">Terisi</div>
				</div>
			</div>

					

			
			<div class="infobox infobox-red">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-unlock"></i>
				</div>
				<div class="infobox-data">
					<span class="infobox-data-number"><?php echo (sizeof($rsKosong)>0?$rsKosong->jmlisi:0)?></span>
					<div class="infobox-content">Kosong</div>
				</div>
			</div>
		</div>
	</div>


<div class="row">
	<div class="col-md-12">
	<h3 class="header blue lighter smaller">
	<i class="ace-icon fa fa-list smaller-90"></i>&nbsp;Informasi & Status</h3>
<div id="accordion" class="accordion-style2">
	
<div class="group">
	<h3 class="accordion-header">Tagihan Belum Bayar Sewa Tahunan</h3>
<div>
 
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
				<th>KIRIM PESAN</th>
			</tr>
		</thead>
		<tbody>
			
		
<?	
$strThn="select p.* , a.nama NMPENGHUNI, a.notelp ,(select lokasi from lokasi where id=p.idlokasi) NMLOKASI from pendaftaran_tahunan p, anak_kost a where a.idanakkost=p.idanakkost and idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_tahunan WHERE  tahun_tagihan ='".date('Y')."' )  AND checkout=0 ".($statusData=="pusat"?"":" and p.idlokasi=".$this->session->userdata('auth')->IDLOKASI);

//$strThn="select pendaftaran_tahunan.* , (select lokasi from lokasi where id=pendaftaran_tahunan.idlokasi) NMLOKASI, (select nama from anak_kost where idanakkost=pendaftaran_tahunan.idanakkost) NMPENGHUNI from pendaftaran_tahunan where idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_tahunan WHERE  tahun_tagihan ='".date('Y')."' )  AND checkout=0 ".($statusData=="pusat"?"":" and pendaftaran_tahunan.idlokasi=".$this->session->userdata('auth')->IDLOKASI);

$sqlresthn=$this->db->query($strThn);
$row_thn=$sqlresthn->result();
$html="";
$k=1;
$rsDendaThn = $this->db->query("select nominal, hari_ke from denda where id=1")->row();
$hari_ke_denda=$rsDendaThn->hari_ke;
$denda=$rsDendaThn->nominal;
//echo $strThn;	
if ($sqlresthn->num_rows()<=0){
    $html.='<tr><td colspan=10 align-""center>Data tidak ditemukan atau data tidak ada</td></tr>';
}else{
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
			$tglsekarang=date('Y-m-d');
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
							//$hariDenda=$intervalbln*30;
							//$denda_ket="Telat ".$intervalbln." bulan";
							if ($ymd_jatuhtempo<$tglsekarang){
								$hariDenda=$intervalbln*30;
								$denda_ket.="Telat ".$intervalbln." bulan";
							}else{
								$denda_ket.="Belum Denda";
							}
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
							$html.="<td>".$rsDendaThn->nominal * $hariDenda."</td>";
							$html.="<td>".$denda_ket."</td>";
							$pesan='Mohon maaf *'.$res->NMPENGHUNI.'* kami memberitahukan tagihan sewa kost periode '.$thnloop.' Belum dibayar. Detil : '.str_replace(' ','%20', $denda_ket) ;
							$hp=substr($res->notelp, 1, strlen($res->notelp)-1);
							$nohp='62'.$hp;
							$html.='<td><a href="https://wa.me/'.$nohp.'?text='.$pesan.'" target="_blank"><img src="'.base_url('assets/images/waku.png').'" style="width:25px;height:25px"></a></td>';
							//$html.='<td>	<a href="javascript:void(0)" onclick="yearlyInv(this)" data-noreg="'.$res->IDPENDAFTARAN.'"  data-idlokasi="'.$row_thn->IDLOKASI.'" data-idkamar="'.$res->IDKAMAR.'"  data-thnbln="'.$yy_tglMulai.$arrBulan[$mm_tglMulai].'" data-tagihan="'.($tagihan + $jmlby + ($rsDendaThn->nominal * $hariDenda)).'" data-hrdenda="'.$hariDenda.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Buat Tagihan </a></td>';
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
}
	echo $html;
	echo "";
?>

</tbody>
	</table>
</div>

	</div>
</div>

	
<div class="group">
	<h3 class="accordion-header">Tagihan Belum Bayar Sewa Bulanan</h3>
<div>
 <!-- <div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Info</strong>
	<ul>
		<li>Untuk lihat info detail dan Cetak data tagihan ke .xls lihat ke menu <b>Laporan -> Pembayaran -> Belum Bayar</b></li>
	</ul>
</div> -->
<?
echo "<table class='table table-bordered table-hover'>";
		$str="SELECT pendaftaran.idpendaftaran, pendaftaran.tglmulai,(select nama from anak_kost where idanakkost=pendaftaran.idanakkost) nmpenghuni, (select labelkamar from kamar where idkamar=pendaftaran.idkamar) nmkamar,(select notelp from anak_kost where idanakkost=pendaftaran.idanakkost) notelpon FROM pendaftaran WHERE idlokasi=".$lokasi->id." and idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_bulanan WHERE  thnbln_tagihan ='".date('Ym')."' ) and checkout=0 ".($statusData=="pusat"?"":" and pendaftaran.idlokasi=".$this->session->userdata('auth')->IDLOKASI)." order by nmkamar";

		$jml=$this->db->query("SELECT count(*) jml FROM pendaftaran WHERE idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_bulanan WHERE thnbln_tagihan ='".date('Ym')."' ) ".($statusData=="pusat"?"":" and pendaftaran.idlokasi=".$this->session->userdata('auth')->IDLOKASI)." and checkout=0 ")->row(); 
		//echo "<tr align=center><td colspan=7>$str</td></tr>";
		echo "<tr><th>No</th><th>Kamar</th><th>Nama</th><th>Tgl Mulai</th><th>Tagihan Belum Bayar</th><th>Kirim Pesan</th></tr>";
		//$sOut=mysql_query($str);
	if ($jml->jml<=0){
		echo "<tr align=center><td colspan=8>Data Tidak Ada</td></tr>";
	}else{
		$sql=$this->db->query($str)->result();
		$i=1;
			foreach( $sql as $rsMaster){		
				$dd_tglMulai=substr($rsMaster->tglmulai,8,2);
				$mm_tglMulai=substr($rsMaster->tglmulai,5,2);
				$yy_tglMulai=substr($rsMaster->tglmulai,0,4);
				$tag="";$dettag="";
				$x=intval($yy_tglMulai.$mm_tglMulai);
				for ($x;$x<=intval(date('Ym'));$x++){
                    $x=$yy_tglMulai.$mm_tglMulai;
					$cekRow=$this->db->query("select count(*) cek from bayar_bulanan where idpendaftaran='".$rsMaster->idpendaftaran."' and thnbln_tagihan='$x'")->row();
					if ($cekRow->cek <=0){
						$tag.=$arrBulan[$mm_tglMulai]." ".$yy_tglMulai."<br>";
						$dettag.=$arrBulan[$mm_tglMulai]." ".$yy_tglMulai."|";
					}
					

					$mm_tglMulai=intval($mm_tglMulai)+1;
					//$mm_tglMulai++;
					if ($mm_tglMulai>12) {
						$mm_tglMulai=1;
						$yy_tglMulai+=1;
					}
					$mm_tglMulai=(strlen($mm_tglMulai)<=1?"0".$mm_tglMulai:$mm_tglMulai);
				}

				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$rsMaster->nmkamar."</td>";
				echo "<td>[".$rsMaster->idpendaftaran."] ".$rsMaster->nmpenghuni."</td>";				
				echo "<td>".$rsMaster->tglmulai."</td>";
				echo "<td>".$tag."</td>";
				$pesan='Mohon maaf *'.$rsMaster->nmpenghuni.'* kami memberitahukan tagihan sewa kost periode : '.str_replace(' ','%20', $dettag).' Belum dibayar' ;				
				$hp=substr($rsMaster->notelpon, 1, strlen($rsMaster->notelpon)-1);
				$nohp='62'.$hp;
				//echo '<td><img src="'.base_url('assets/images/waku.png').'"  style="width:25px;height:25px"></td>';
				echo '<td><a href="https://wa.me/'.$nohp.'?text='.$pesan.'" target="_blank"><img src="'.base_url('assets/images/waku.png').'"  style="width:25px;height:25px"></a></td>';
				//echo "<td>".$yy_tglMulai.$mm_tglMulai."</td>";
				echo "</tr>";
				$i++;

			}
			
	}

	echo "</table>	";

?>
	</div>
</div>

<div class="group">
<h3 class="accordion-header">Kamar Kosong</h3>
<div>
<?
echo '<table  class="table table-bordered table-hover">'; 	
	
		
		$str="select * from kamar  where idlokasi=".$lokasi->id." order by labelkamar";
		$jml= $this->db->query("select count(*) cek from kamar where idlokasi=".$lokasi->id." order by labelkamar")->row(); 
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
				echo '<td><B>'.$rs->labelkamar.'</B><br>Luas : '.$rs->luas.' M</td>';
				echo '<td >'.$rsMaster->FASILITAS.'</td>';
				$tglkosong=$rs->last_checkout_date;
				echo '<td>Harian : Rp.'.number_format($rsMaster->TARIFHARIAN,2,',','.').'<br>Mingguan : Rp. '.number_format($rsMaster->TARIFMINGGUAN,2,',','.').'<br>Bulanan : Rp. '.number_format($rsMaster->TARIFBULANAN,2,',','.').'</td>';
				echo '<td align=center>'.$rsMaster->KAPASITAS.' Orang</td>';
				echo '<td align=center '.($sisa>0?' style="background-color:#a9ebbd"':'style="background-color:#ff3366"').'><b>'.$sisa.'</b></td>';
				echo '<td align=center ><b>'.(is_null($tglkosong)|| $tglkosong=="" ?"":strftime("%d %B %Y", strtotime($rs->last_checkout_date))).'</b></td>';
				echo '<td align=center ><b>'.$rs->selisih.'</b></td>';				
				echo '</tr>';
				
				}
				$i++;
			}
	}

	echo '</table>';

?>
		</div>
	</div>

	<div class="group">
	<h3 class="accordion-header">Penghuni Baru Bulan Ini</h3>
	<div>
<?	
	echo "<table class='table table-bordered table-hover'>"; 
	echo "<tr bgcolor='#c6c7ce'><td colspan=8><b>SEWA TAHUNAN	</b></td></tr>";
	echo "<tr><tH>NO</tH><TH>KAMAR HUNI </TH><tH>PENGHUNI</tH><TH>ALAMAT</TH><TH>NO. TELP</TH><th>TGL CHECK IN</tH><th>KWH AWAL</th><th>DEPOSIT</th></tr>";
	if (sizeof($resThn )>0){
	$i=1;
		
		foreach ( $resThn as $row){
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row->labelkamar."</td>";
				echo "<td>[".$row->idPendaftaran."] ".$row->nama."</td>";				
				echo "<td>".$row->alamat_asal."</td>";
				echo "<td>".$row->Telp."</td>";				
				echo "<td>".$row->tgldaftar."</td>";
				echo "<td>".$row->kwh_awal."</td>";
				echo "<td>Rp. ".number_format($row->deposit,2,',','.')."</td>";								
				echo "</tr>";
				$i++;
				
			}
	}else{
		echo "<tr  ><td colspan=8 align=center><b>Tidak Ada Penghuni Baru Bulan ini	</b></td></tr>";
	}
	
	echo "<tr bgcolor='#c6c7ce'><td colspan=8><b>SEWA BULANAN	</b></td></tr>";
	echo "<tr><tH>NO</tH><TH>KAMAR HUNI </TH><tH>PENGHUNI</tH><TH>ALAMAT</TH><TH>NO. TELP</TH><th>TGL CHECK IN</tH><th>KWH AWAL</th><th>DEPOSIT</th></tr>";
	if (sizeof($resMonthly )>0){
	$i=1;
		
		foreach ( $resMonthly as $row){
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row->labelkamar."</td>";
				echo "<td>[".$row->idPendaftaran."] ".$row->nama."</td>";				
				echo "<td>".$row->alamat_asal."</td>";
				echo "<td>".$row->Telp."</td>";				
				echo "<td>".$row->tglMulai."</td>";
				echo "<td>".$row->kwh_awal."</td>";
				echo "<td>Rp. ".number_format($row->deposit,2,',','.')."</td>";								
				echo "</tr>";
				$i++;
				
			}
	}else{
		echo "<tr  ><td colspan=8 align=center><b>Tidak Ada Penghuni Baru Bulan ini	</b></td></tr>";
	}
	echo "<tr bgcolor='#c6c7ce' ><td colspan=8><b>SEWA MINGGUAN	</b></td></tr>";
	echo "<tr><tH>NO</tH><TH>KAMAR HUNI</TH><tH>PENGHUNI</tH><TH>ALAMAT</TH><TH>NO. TELP</TH><th>TGL CHECK IN</tH><TH colspan=2>LAMA (PEKAN)</TH></tr>";
	if (sizeof($resWeek )>0){
	$i=1;
		
		foreach ( $resWeek as $row){
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row->labelkamar."</td>";
				echo "<td>[".$row->idPendaftaran."] ".$row->nama."</td>";				
				echo "<td>".$row->alamat_asal."</td>";
				echo "<td>".$row->Telp."</td>";				
				echo "<td>".$row->tglMulai."</td>";				
				echo "<td colspan=2>".$row->lama."</td>";							
				echo "</tr>";
				$i++;
				
			}
	}else{
		echo "<tr  ><td colspan=8 align=center><b>Tidak Ada Penghuni Baru Bulan ini	</b></td></tr>";
	}
	echo "<tr bgcolor='#c6c7ce' ><td colspan=8><b>SEWA HARIAN	</b></td></tr>";
	echo "<tr><tH>NO</tH><TH>KAMAR HUNI</TH><tH>PENGHUNI</tH><TH>ALAMAT</TH><TH>NO. TELP</TH><th>TGL CHECK IN</tH><TH colspan=2>LAMA (HARI)</TH></tr>";
	if (sizeof($resDay )>0){
	$i=1;
		
		foreach ( $resDay as $row){
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row->labelkamar."</td>";
				echo "<td>[".$row->idPendaftaran."] ".$row->nama."</td>";				
				echo "<td>".$row->alamat_asal."</td>";
				echo "<td>".$row->Telp."</td>";				
				echo "<td>".$row->tglCek_in."</td>";				
				echo "<td colspan=2>".$row->lama."</td>";							
				echo "</tr>";
				$i++;
				
			}
	}else{
		echo "<tr  ><td colspan=8 align=center><b>Tidak Ada Penghuni Baru Bulan ini	</b></td></tr>";
	}
	echo "</table>";
?>
		</div>
</div>
	</div><!-- #accordion -->
</div><!-- ./span -->
</div><!-- ./span -->

<script type="text/javascript">

				//jquery accordion
				$( "#accordion" ).accordion({
					collapsible: true ,
					heightStyle: "content",
					animate: 250,
					header: ".accordion-header"
				}).sortable({
					axis: "y",
					handle: ".accordion-header",
					stop: function( event, ui ) {
						// IE doesn't register the blur when sorting
						// so trigger focusout handlers to remove .ui-state-focus
						ui.item.children( ".accordion-header" ).triggerHandler( "focusout" );
					}
				});
</script>

<? }else{
	foreach($resAllKost as $rows){
		$rsTerisi=$this->db->query("SELECT idlokasi, (SELECT lokasi FROM lokasi WHERE id=k.idlokasi) nmlokasi, COUNT(*) jmlisi FROM kamar k, cekkamar c WHERE k.`IDKAMAR`=c.`idKamar` and idlokasi=".$rows->id." AND terisi>0 GROUP BY idlokasi")->row();
		$rsKosong=$this->db->query("SELECT idlokasi, (SELECT lokasi FROM lokasi WHERE id=k.idlokasi) nmlokasi, COUNT(*) jmlisi FROM kamar k, cekkamar c WHERE k.`IDKAMAR`=c.`idKamar` and idlokasi=".$rows->id." AND terisi=0 GROUP BY idlokasi")->row();
		$rsTotal=$this->db->query("SELECT COUNT(*) jml FROM kamar WHERE idlokasi =".$rows->id)->row();
		?>
		<div class="col-xs-2"></div>
		<div class="col-xs-10  center">
		<div class=" col-sm-10 infobox-container ">
			<div class="infobox infobox-grey  infobox-dark">
											<div class="infobox-chart">
												<span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
											</div>

											<div class="infobox-data">
												<div class="infobox-content"><?php echo $rows->kode_kost?></div>
												<div class="infobox-content"><?php echo $rows->lokasi?></div>
											</div>
			</div>
			

			<div class="infobox infobox-blue">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-home"></i>
				</div>

			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo (sizeof($rsTotal)>0?$rsTotal->jml:0)?></span>
					<div class="infobox-content">Total Kamar</div>
					</div>
				
			</div>

			<div class="infobox infobox-green">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-lock"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number"><?php echo (empty($rsTerisi)?0:$rsTerisi->jmlisi)?></span>
						<div class="infobox-content">Terisi</div>
				</div>
			</div>

					

			
			<div class="infobox infobox-red">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-unlock"></i>
				</div>
				<div class="infobox-data">
					<span class="infobox-data-number"><?php echo (sizeof($rsKosong)>0?$rsKosong->jmlisi:0)?></span>
					<div class="infobox-content">Kosong</div>
				</div>
			</div>
		</div>
	</div>
		<?
	}

	//info
	?>
<div class="row">
<div class="col-md-12">
<h3 class="header blue lighter smaller">
	<i class="ace-icon fa fa-list smaller-90"></i>&nbsp;Informasi & Status</h3>
<div id="accordion" class="accordion-style2">

<div class="group">
	<h3 class="accordion-header">Tagihan Belum Bayar Sewa Tahunan</h3>
<div>
 
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
				<th>KIRIM PESAN</th>
			</tr>
		</thead>
		<tbody>
			
		
<?	

$strThn="select p.* , (select lokasi from lokasi where id=p.idlokasi) NMLOKASI, a.nama NMPENGHUNI, a.notelp from pendaftaran_tahunan p, anak_kost a where a.idanakkost=p.idanakkost and idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_tahunan WHERE  tahun_tagihan ='".date('Y')."' )  AND checkout=0 ";

//$strThn="select pendaftaran_tahunan.* , (select lokasi from lokasi where id=pendaftaran_tahunan.idlokasi) NMLOKASI, (select nama from anak_kost where idanakkost=pendaftaran_tahunan.idanakkost) NMPENGHUNI from pendaftaran_tahunan where idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_tahunan WHERE  tahun_tagihan ='".date('Y')."' )  AND checkout=0 ";
$row_thn=$this->db->query($strThn)->result();
$html="";
$k=0;
$rsDenda = $this->db->query("select nominal, hari_ke from denda where id=1")->row();
$hari_ke_denda=$rsDenda->hari_ke;
$denda=$rsDenda->nominal;
//echo $strThn;	
$tagihan=0;
//echo "<tr><td colspan=9>$strThn</td></tr>"; 
if (sizeof($row_thn)>0){ 
foreach($row_thn as $res) {
		$noreg=$res->IDPENDAFTARAN;
		 
		 //$sqlkamar->num_rows()<=0 ||
		 if ( $res->IDKAMAR==""){
		    	$html.="<tr><td colspan=9>Data Kamar Pada nomer registrasi ".$noreg." Tidak valid</td></tr>";
		 }else{
		     $sqlkamar = $this->db->query("select * from kamar where idkamar=".$res->IDKAMAR);
				$qkamar = $sqlkamar->row();	
				
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
							$pesan='Mohon maaf *'.$res->NMPENGHUNI.'* kami memberitahukan tagihan sewa kost periode '.$thnloop.' Belum dibayar. Detil : '.str_replace(' ','%20', $denda_ket) ;
							$hp=substr($res->notelp, 1, strlen($res->notelp)-1);
							$nohp='62'.$hp;
							$html.='<td><a href="https://wa.me/'.$nohp.'?text='.$pesan.'" target="_blank"><img src="'.base_url('assets/images/waku.png').'" style="width:25px;height:25px"></a></td></tr>';
							
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
				
}
}else{
	$html.="<tr><td colspan=10>Belum ada tagihan</td></tr>";
}
	echo $html;
	echo "";
?>

</tbody>
	</table>
</div>

	</div>
</div>

<div class="group">
	<h3 class="accordion-header">Tagihan Belum Bayar  Sewa Bulanan</h3>
<div>
 <!-- <div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Info</strong>
	<ul>
	<li>Untuk lihat info detail dan Cetak data tagihan ke .xls lihat ke menu <b>Laporan -> Pembayaran -> Belum Bayar</b></li>
	</ul>
</div> -->
<?
foreach($resAllKost as $rows){
echo '<div class="widget-header widget-header-flat"><h4 class="widget-title lighter"><i class="ace-icon fa fa-home blue"></i>'."[ ".$rows->kode_kost." ] ".$rows->lokasi.'</h4></div>';

echo "<table class='table table-bordered table-hover'>";
		$str="SELECT pendaftaran.idpendaftaran, pendaftaran.tglmulai,(select nama from anak_kost where idanakkost=pendaftaran.idanakkost) nmpenghuni, (select labelkamar from kamar where idkamar=pendaftaran.idkamar) nmkamar,(select notelp from anak_kost where idanakkost=pendaftaran.idanakkost) notelpon FROM pendaftaran WHERE idlokasi=".$rows->id." and idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_bulanan WHERE  thnbln_tagihan ='".date('Ym')."' ) and checkout=0 order by nmkamar";

		$jml=$this->db->query("SELECT count(*) jml FROM pendaftaran WHERE idlokasi=".$rows->id." and idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_bulanan WHERE thnbln_tagihan ='".date('Ym')."' ) and checkout=0 ")->row(); 
		//echo "<tr align=center><td colspan=7>$str</td></tr>";
		echo "<tr><th>No</th><th>Kamar</th><th>Nama</th><th>Tgl Mulai</th><th>Tagihan Belum Bayar</th><th>Kirim Pesan</th></tr>";
		//$sOut=mysql_query($str);
	if ($jml->jml<=0){
		echo "<tr align=center><td colspan=8>Data Tidak Ada</td></tr>";
	}else{
		$sql=$this->db->query($str)->result();
		$i=1;
			foreach( $sql as $rsMaster){		
				$dd_tglMulai=substr($rsMaster->tglmulai,8,2);
				$mm_tglMulai=substr($rsMaster->tglmulai,5,2);
				$yy_tglMulai=substr($rsMaster->tglmulai,0,4);
				$tag="";$dettag="";
				$x=intval($yy_tglMulai.$mm_tglMulai);
				for ($x;$x<=intval(date('Ym'));$x++){
                    $x=$yy_tglMulai.$mm_tglMulai;
					$cekRow=$this->db->query("select count(*) cek from bayar_bulanan where idpendaftaran='".$rsMaster->idpendaftaran."' and thnbln_tagihan='$x'")->row();
					if ($cekRow->cek <=0){
						$tag.=$arrBulan[$mm_tglMulai]." ".$yy_tglMulai."<br>";
						$dettag.=$arrBulan[$mm_tglMulai]." ".$yy_tglMulai."|";
					}
					

					$mm_tglMulai=intval($mm_tglMulai)+1;
					//$mm_tglMulai++;
					if ($mm_tglMulai>12) {
						$mm_tglMulai=1;
						$yy_tglMulai+=1;
					}
					$mm_tglMulai=(strlen($mm_tglMulai)<=1?"0".$mm_tglMulai:$mm_tglMulai);
				}

				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$rsMaster->nmkamar."</td>";
				echo "<td>[".$rsMaster->idpendaftaran."] ".$rsMaster->nmpenghuni."</td>";				
				echo "<td>".$rsMaster->tglmulai."</td>";
				echo "<td>".$tag."</td>";
				$pesan='Mohon maaf *'.$rsMaster->nmpenghuni.'* kami memberitahukan tagihan sewa kost periode : '.str_replace(' ','%20', $dettag).' Belum dibayar' ;				
				$hp=substr($rsMaster->notelpon, 1, strlen($rsMaster->notelpon)-1);
				$nohp='62'.$hp;
				//echo '<td><img src="'.base_url('assets/images/waku.png').'"  style="width:25px;height:25px"></td>';
				echo '<td><a href="https://wa.me/'.$nohp.'?text='.$pesan.'" target="_blank"><img src="'.base_url('assets/images/waku.png').'"  style="width:25px;height:25px"></a></td>';
				//echo "<td>".$yy_tglMulai.$mm_tglMulai."</td>";
				echo "</tr>";
				$i++;

			}
			
	}

	echo "</table>	";
}
?>
	</div>
</div>

<div class="group">
	<h3 class="accordion-header">Kamar Kosong</h3>
<div>
<?
foreach($resAllKost as $rows2){
echo '<div class="widget-header widget-header-flat"><h4 class="widget-title lighter"><i class="ace-icon fa fa-home blue"></i>'."[ ".$rows2->kode_kost." ] ".$rows2->lokasi.'</h4></div>';

echo '<table  class="table table-bordered table-hover">'; 	
	
		
		$str="select * from kamar  where idlokasi=".$rows2->id." order by labelkamar";
		$jml= $this->db->query("select count(*) cek from kamar where idlokasi=".$rows2->id." order by labelkamar")->row(); 
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
				echo '<td><B>'.$rs->labelkamar.'</B><br>Luas : '.$rs->luas.' M</td>';
				echo '<td >'.$rsMaster->FASILITAS.'</td>';
				
				echo '<td>Harian : Rp.'.number_format($rsMaster->TARIFHARIAN,2,',','.').'<br>Mingguan : Rp. '.number_format($rsMaster->TARIFMINGGUAN,2,',','.').'<br>Bulanan : Rp. '.number_format($rsMaster->TARIFBULANAN,2,',','.').'</td>';
				echo '<td align=center>'.$rsMaster->KAPASITAS.' Orang</td>';
				echo '<td align=center '.($sisa>0?' style="background-color:#a9ebbd"':'style="background-color:#ff3366"').'><b>'.$sisa.'</b></td>';
				$tglkosong=$rs->last_checkout_date;
				echo '<td align=center ><b>'.(is_null($tglkosong)|| $tglkosong=="" ?"":strftime("%d %B %Y", strtotime($rs->last_checkout_date))).'</b></td>';
				//echo '<td align=center ><b>'.strftime("%d %B %Y", strtotime($rs->last_checkout_date)).'</b></td>';
				echo '<td align=center ><b>'.$rs->selisih.'</b></td>';				
				echo '</tr>';
				
				}
				$i++;
			}
	}

	echo '</table>';
}
?>
	</div>
</div>

<div class="group">
	<h3 class="accordion-header">Penghuni Baru Bulan Ini</h3>
<div>
<?
foreach($resAllKost as $rows3){
	$strTahun="select a.nama,a.noidentitas, a.alamat_asal,a.notelp Telp, k.labelkamar, p.tgldaftar, p.kwh_awal, p.checkout, p.deposit, p.idPendaftaran from pendaftaran_tahunan p, anak_kost a, kamar k where p.idlokasi=".$rows3->id." and p.idanakkost=a.idanakkost and k.idkamar=p.idkamar and tgldaftar like '".date('Y')."-".date('m')."%' order by k.labelkamar";
	$strBulan="select a.nama,a.noidentitas, a.alamat_asal,a.notelp Telp, k.labelkamar, p.tglMulai,p.tgldaftar, p.kwh_awal, p.checkout, p.deposit, p.idPendaftaran from pendaftaran p, anak_kost a, kamar k where p.idlokasi=".$rows3->id." and p.idanakkost=a.idanakkost and k.idkamar=p.idkamar and tglMulai like '".date('Y')."-".date('m')."%' order by k.labelkamar";
			$strMinggu="select d.*, k.labelkamar from daftar_sewa_mingguan d, kamar k where d.idlokasi=".$rows3->id." and d.idkamar=k.idkamar and tglmulai like '".date('Y')."-".date('m')."%' order by labelkamar";
			$strHari="select d.*, k.labelkamar from daftar_sewa_harian d, kamar k where d.idlokasi=".$rows3->id." and  d.idkamar=k.idkamar and tglCek_in like '".date('Y')."-".date('m')."%' order by labelkamar";
			
			$resThn=$this->db->query($strTahun)->result();
			$res=$this->db->query($strBulan)->result();
			$resWeek=$this->db->query($strMinggu)->result();
			$resDay=$this->db->query($strHari)->result();
echo '<div class="widget-header widget-header-flat"><h4 class="widget-title lighter"><i class="ace-icon fa fa-home blue"></i>'."[ ".$rows3->kode_kost." ] ".$rows3->lokasi.'</h4></div>';

echo "<table class='table table-bordered table-hover'>"; 
echo "<tr bgcolor='#c6c7ce'><td colspan=8><b>SEWA TAHUNAN	</b></td></tr>";
	echo "<tr><tH>NO</tH><TH>KAMAR HUNI </TH><tH>PENGHUNI</tH><TH>ALAMAT</TH><TH>NO. TELP</TH><th>TGL CHECK IN</tH><th>KWH AWAL</th><th>DEPOSIT</th></tr>";
	if (sizeof($resThn )>0){
	$i=1;
		
		foreach ( $resThn as $row){
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row->labelkamar."</td>";
				echo "<td>[".$row->idPendaftaran."] ".$row->nama."</td>";				
				echo "<td>".$row->alamat_asal."</td>";
				echo "<td>".$row->Telp."</td>";				
				echo "<td>".$row->tgldaftar."</td>";
				echo "<td>".$row->kwh_awal."</td>";
				echo "<td>Rp. ".number_format($row->deposit,2,',','.')."</td>";								
				echo "</tr>";
				$i++;
				
			}
	}else{
		echo "<tr  ><td colspan=8 align=center><b>Tidak Ada Penghuni Baru Bulan ini	</b></td></tr>";
	}
	echo "<tr bgcolor='#c6c7ce'><td colspan=8><b>SEWA BULANAN	</b></td></tr>";
	echo "<tr><tH>NO</tH><TH>KAMAR HUNI </TH><tH>PENGHUNI</tH><TH>ALAMAT</TH><TH>NO. TELP</TH><th>TGL CHECK IN</tH><th>KWH AWAL</th><th>DEPOSIT</th></tr>";
	if (sizeof($res )>0){
	$i=1;
		
		foreach ( $res as $row){
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row->labelkamar."</td>";
				echo "<td>[".$row->idPendaftaran."] ".$row->nama."</td>";				
				echo "<td>".$row->alamat_asal."</td>";
				echo "<td>".$row->Telp."</td>";				
				echo "<td>".$row->tglMulai."</td>";
				echo "<td>".$row->kwh_awal."</td>";
				echo "<td>Rp. ".number_format($row->deposit,2,',','.')."</td>";								
				echo "</tr>";
				$i++;
				
			}
	}else{
		echo "<tr  ><td colspan=8 align=center><b>Tidak Ada Penghuni Baru Bulan ini	</b></td></tr>";
	}
	echo "<tr bgcolor='#c6c7ce' ><td colspan=8><b>SEWA MINGGUAN	</b></td></tr>";
	echo "<tr><tH>NO</tH><TH>KAMAR HUNI</TH><tH>PENGHUNI</tH><TH>ALAMAT</TH><TH>NO. TELP</TH><th>TGL CHECK IN</tH><TH colspan=2>LAMA (PEKAN)</TH></tr>";
	if (sizeof($resWeek )>0){
	$i=1;
		
		foreach ( $resWeek as $row){
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row->labelkamar."</td>";
				echo "<td>[".$row->idPendaftaran."] ".$row->nama."</td>";				
				echo "<td>".$row->alamat_asal."</td>";
				echo "<td>".$row->Telp."</td>";				
				echo "<td>".$row->tglMulai."</td>";				
				echo "<td colspan=2>".$row->lama."</td>";							
				echo "</tr>";
				$i++;
				
			}
	}else{
		echo "<tr  ><td colspan=8 align=center><b>Tidak Ada Penghuni Baru Bulan ini	</b></td></tr>";
	}
	echo "<tr bgcolor='#c6c7ce' ><td colspan=8><b>SEWA HARIAN	</b></td></tr>";
	echo "<tr><tH>NO</tH><TH>KAMAR HUNI</TH><tH>PENGHUNI</tH><TH>ALAMAT</TH><TH>NO. TELP</TH><th>TGL CHECK IN</tH><TH colspan=2>LAMA (HARI)</TH></tr>";
	if (sizeof($resDay )>0){
	$i=1;
		
		foreach ( $resDay as $row){
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row->labelkamar."</td>";
				echo "<td>[".$row->idPendaftaran."] ".$row->nama."</td>";				
				echo "<td>".$row->alamat_asal."</td>";
				echo "<td>".$row->Telp."</td>";				
				echo "<td>".$row->tglCek_in."</td>";				
				echo "<td colspan=2>".$row->lama."</td>";							
				echo "</tr>";
				$i++;
				
			}
	}else{
		echo "<tr  ><td colspan=8 align=center><b>Tidak Ada Penghuni Baru Bulan ini	</b></td></tr>";
	}
	echo "</table>";
}
?>
	</div>
</div>

</div><!-- #accordion -->
<?
}

?>
<script type="text/javascript">
 $(document).ready(function() {
	 $('#cb_lokasi').change();	
 });
	
 $('#cb_lokasi').change(function(){
		
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('dashboard/roomMap');?>',
			data: { lokasi: $('#cb_lokasi').val() },				
			dataType: 'json',
			success: function(msg) {				 
				 console.log(msg);
				if(msg.status =='success'){					
					$("#mapdiv").html(msg.html);					
					
				} else {					
					bootbox.alert("Terjadi kesalahan. "+ msg.errormsg+". Data gagal disimpan.");
					$("#errorHandler").html(msg.errormsg).show();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				//$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger');
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});	//jquery accordion
				$( "#accordion" ).accordion({
					collapsible: true ,
					heightStyle: "content",
					animate: 250,
					header: ".accordion-header"
				}).sortable({
					axis: "y",
					handle: ".accordion-header",
					stop: function( event, ui ) {
						// IE doesn't register the blur when sorting
						// so trigger focusout handlers to remove .ui-state-focus
						ui.item.children( ".accordion-header" ).triggerHandler( "focusout" );
					}
				});
				
	
		
	});
	
	
	function chooseNext(obj){
		var idlokasi = $(obj).attr('data-idlokasi');		
		var idkamar = $(obj).attr('data-idkamar');	
				
		$.ajax({
			url: "<?php echo base_url('dashboard/frontRegForm'); ?>",
			dataType: 'html',
			type: 'POST',
			data: {ajax:'true', idkamar:idkamar, idlokasi:idlokasi},
			success:
				
				function(data){
					
					var thisBox=bootbox.dialog({
					  onEscape	:true,					 
					  message: data,
					  title: "Form Entri Pendaftaran",
					 
					  buttons: {
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

$('#mydialog').on('shown.bs.modal', function(e) {
    //$('.ui-datepicker').css('z-index', 99999);
	$('#ui-datepicker-div').css('z-index', 99999);
	
});
	
	</script>
