<div>
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
															<span class="white"><?php echo $this->session->userdata('profil')->nama ?></span>
														</a>
													</div>
												</div>
											</div>

											<div class="space-6"></div>
											<div class="profile-contact-info">
												<div class="profile-contact-links align-left">
													<a href="#" class="btn btn-link">
														<i class="ace-icon fa fa-globe bigger-125 blue"></i>
														Last Login : <?php echo $this->session->userdata('auth')->UPDATED_DATE?>
													</a>
													<a href="#" class="btn btn-link">
														<i class="ace-icon fa fa-cogs bigger-120 green"></i>
														Username : <?php echo $this->session->userdata('auth')->USERNAME?>
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

												
											</div>

											<div class="space-20"></div>
											<div class="hr hr2 hr-double"></div>
											<div class="space-6"></div>
											
										</div>
									</div>
								</div>


<div class="row">
	<div class="col-md-12">
	<h3 class="header blue lighter smaller">
	<i class="ace-icon fa fa-list smaller-90"></i>&nbsp;Informasi & Status</h3>
<div id="accordion" class="accordion-style2">
	
<div class="group">
	<h3 class="accordion-header">Tagihan Terbaru</h3>
<div>
 
<?

echo "<table class='table table-bordered table-hover'>";
$str="";
	if ($jns_sewa=="Bulanan"){
		$str="SELECT p.*, (select nama from anak_kost where idanakkost=p.idanakkost) nmpenghuni, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar FROM pendaftaran p WHERE idlokasi=".$lokasi->id." and idpendaftaran='$noreg'  and checkout=0 ";
		
	}else{
		$str="SELECT p.*,(select nama from anak_kost where idanakkost=p.idanakkost) nmpenghuni, (select labelkamar from kamar where idkamar=p.idkamar) nmkamar FROM pendaftaran_tahunan p WHERE idlokasi=".$lokasi->id." and idpendaftaran='$noreg'  and checkout=0";
	}   $strcek="SELECT count(*) jml FROM ".($jns_sewa=="Bulanan"?"bayar_bulanan":"bayar_tahunan")." WHERE ".($jns_sewa=="Bulanan"?"thnbln_tagihan":"tahun_tagihan")." ='".date('Ym')."' and idpendaftaran='$noreg'  ";
		$jml=$this->db->query($strcek)->row(); 
		//echo "<tr align=center><td colspan=7>$str</td></tr>";
		echo "<tr><th>No</th><th>Periode tagihan</th><th>Status</th><th>Tgl Tagihan</th><th>Tagihan sewa</th><th>Biaya Tambahan</th><th>Denda</th><th>Total</th><th>Keterangan</th></tr>";
		//$sOut=mysql_query($str);
	if ($jml->jml>=1){
		echo "<tr align=center><td colspan=9>Belum ada tagihan</td></tr>";
	}else{
		$rsMaster=$this->db->query($str)->row();
		//echo "kamar=".$rsMaster->IDKAMAR;
		$rsDenda = $this->db->query("select nominal,hari_ke from denda where id=1")->row();
		$qkamar = $this->db->query("select * from kamar where idkamar=".$rsMaster->IDKAMAR)->row();
		$biaya_tamb=0;
		$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from detildaftar".($jns_sewa=="Bulanan"?"":"_tahunan")." d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='".$rsMaster->IDPENDAFTARAN."'";
		$querytarif=$this->db->query($sBiaya)->result();
					
		foreach($querytarif as $rowtarif){							
			$biaya_tamb+=$rowtarif->tarif;							
		}
		$mmdd_mulai=($jns_sewa=="Bulanan"?date('m-d', strtotime($rsMaster->tglMulai)):date('m-d', strtotime($rsMaster->TGLDAFTAR)));
		$hari_ke_denda=$rsDenda->hari_ke;

if ($jns_sewa=="Bulanan"){		
				
				$dd_tglMulai=substr($rsMaster->tglMulai,8,2);
				$mm_tglMulai=substr($rsMaster->tglMulai,5,2);
				$yy_tglMulai=substr($rsMaster->tglMulai,0,4);
				$tag="";
				$x=intval($yy_tglMulai.$mm_tglMulai);
				$i=1;
				for ($x;$x<=intval(date('Ym'));$x++){
                    $x=$yy_tglMulai.$mm_tglMulai;$hariDenda=0;$denda="";
					$ymd_jatuhtempo=$yy_tglMulai."-".$mm_tglMulai."-".$dd_tglMulai;
					$cekRow=$this->db->query("select count(*) cek from bayar_bulanan where idpendaftaran='".$rsMaster->IDPENDAFTARAN."' and thnbln_tagihan='$x'")->row();
					if ($cekRow->cek <=0){
					$muncul_denda=strftime("%Y-%m-%d", strtotime(strftime("%Y-%m-%d", strtotime($ymd_jatuhtempo))." + $hari_ke_denda day"));
					$interval = date_diff(date_create($muncul_denda),date_create() );
							$intervalthn=$interval->format("%Y");
							$intervalbln=$interval->format("%m");
							$intervalhr=$interval->format("%d");
							$denda="";
							if (intval($intervalthn)>=1){
								$hariDenda=12*intval($intervalthn)*30;
								$denda=intval($intervalthn)." tahun atau ".$hariDenda." hari";
							}elseif (intval($intervalbln)>=1){
								//$hariDenda=cal_days_in_month(CAL_GREGORIAN, $mm_tglMulai, $yy_tglMulai);
								$hariDenda=date('t', mktime(0, 0, 0, $mm_tglMulai, 1, $yy_tglMulai)); 
								$denda="1 bulan atau ".$hariDenda." hari";
								
							}else{
								if ($x>date('Y-m-d')){
									$hariDenda=0;
									$denda="Belum telat. (tagihan keluar tgl :".$x.")";
								}else{
									$hariDenda=$intervalhr;
									$denda=" $hariDenda Hari";
								}
							}
						$total=($qkamar->TARIFBULANAN + $biaya_tamb)+($rsDenda->nominal*$hariDenda);
						$tag.=$arrBulan[$mm_tglMulai]." ".$yy_tglMulai."<br>";
						echo "<tr>";
						echo "<td>$i </td>";
						echo "<td>".$x."</td>";
						echo "<td>Belum Lunas</td>";				
						echo "<td>".$dd_tglMulai."-".$mm_tglMulai."-".$yy_tglMulai."</td>";
						echo "<td>".$qkamar->TARIFBULANAN."</td>";
						echo "<td>".$biaya_tamb."</td>";
						echo "<td>".($rsDenda->nominal*$hariDenda)."</td>";
						echo "<td>".$total."</td>";
						echo "<td>".$denda.", Tagihan belum termasuk pembayaran Listrik</td>";
						echo "</tr>";
						$i++;
					}
					

					$mm_tglMulai=intval($mm_tglMulai)+1;
					//$mm_tglMulai++;
					if ($mm_tglMulai>12) {
						$mm_tglMulai=1;
						$yy_tglMulai+=1;
					}
					$mm_tglMulai=(strlen($mm_tglMulai)<=1?"0".$mm_tglMulai:$mm_tglMulai);
					
				}			
		}else{	//tahunan
			$noreg=$rsMaster->IDPENDAFTARAN;
				$qkamar = $this->db->query("select * from kamar where idkamar=".$rsMaster->IDKAMAR)->row();	
				
				$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from detildaftar_tahunan d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='$noreg'";
				$qryby=$this->db->query($sBiaya)->result();
				$jmlby=0;
				foreach($qryby as $rowbiaya){						
						$jmlby+=$rowbiaya->tarif;						
				}
		$tagihan= $qkamar->TARIFTAHUNAN - $rsMaster->diskon;	
		$test="";
		$tgldaftarFull=$rsMaster->TGLDAFTAR;	
		$thnMulai=date('Y', strtotime($tgldaftarFull));
		$mmdd_mulai=date('m-d', strtotime($tgldaftarFull));
		$ymd_jatuhtempo=""; $muncul_denda="";
		$thnloop=$thnMulai;
		
		$k=0;
		for ($thnloop=$thnMulai;$thnloop<=date('Y');$thnloop++){	
			 $hariDenda=0; $denda_ket="";
			$ymd_jatuhtempo=$thnloop."-".$mmdd_mulai;			

			$cekbayar_sewa=$this->db->query("select * from bayar_tahunan where idpendaftaran='$noreg' and idlokasi=".$rsMaster->IDLOKASI." and tahun_tagihan='".$thnloop."'");
			$cekbayar_tag_blnn=$this->db->query("select * from bayar_tahunan_tag_blnan where idpendaftaran='$noreg' and idlokasi=".$rsMaster->IDLOKASI." and periode_tagihan like '".$thnloop."%' order by periode_tagihan");	
			
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

						$denda_ket.=", Denda : ".$hariDenda * $rsDenda->nominal;
					}else{	
						$hariDenda=0;
						$denda_ket="Belum denda. (Denda mulai keluar tgl :".$muncul_denda.")";
						//$denda_ket="Belum denda. (Denda keluar tgl :".($ymd_jatuhtempo+$hari_ke_denda).")";
					}

					$total=($qkamar->TARIFTAHUNAN + $biaya_tamb)+($rsDenda->nominal*$hariDenda);
					//$ket_sewa.="Tagihan : ".number_format($tagihan,0,',','.')."<br>";
					//$ket_sewa.=$denda_ket;
							echo "<tr>";
						echo "<td>$k </td>";
						echo "<td>".$thnloop."</td>";
						echo "<td>Belum Lunas</td>";				
						echo "<td>".$muncul_denda."</td>";
						echo "<td>".$qkamar->TARIFTAHUNAN."</td>";
						echo "<td>".$biaya_tamb."</td>";
						echo "<td>".($rsDenda->nominal*$hariDenda)."</td>";
						echo "<td>".$total."</td>";
						echo "<td>".$denda_ket.", Tagihan belum termasuk pembayaran Listrik & Air</td>";
						echo "</tr>";
			}

					
			$k++;
			
		}


		}
			
	}

	echo "</table>	";

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
