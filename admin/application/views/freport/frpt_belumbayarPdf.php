<div class="row">
<div class="col-md-12">
 <div class="widget-box">
	 <div class="widget-header">
	<h4 class="smaller">
	<?php echo $title?>
	</h4>
	</div>
 <div class="widget-body">

	<table class="mytable" >
		<thead>
			<tr>
				<th>NO</th>	
				<th>KAMAR</th>	
				<th>NAMA</th>
				<th>TGL MULAI INAP</th>
				<th>DETIL TAGIHAN</th>	
			</tr>
		</thead>
		<tbody>
<?
	if ($jenis_sewa=="Bulanan"){
	$str="select  @nom:=@nom+1 as NO,p.idpendaftaran, p.tglmulai,a.`nama`, k.labelkamar  FROM pendaftaran p, kamar k, anak_kost a WHERE  p.`IDKAMAR`=k.`IDKAMAR` AND p.`IDANAKKOST`=a.`IDANAKKOST` AND   p.`IDLOKASI`=".$lokasi." AND  p.idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_bulanan WHERE  thnbln_tagihan ='".date('Ym')."' )  AND checkout=0 order by NO";
	}else{
		$str="select  @nom:=@nom+1 as NO,p.*,a.`nama`, k.labelkamar  FROM pendaftaran_tahunan p, kamar k, anak_kost a WHERE  p.`IDKAMAR`=k.`IDKAMAR` AND p.`IDANAKKOST`=a.`IDANAKKOST` AND   p.`IDLOKASI`=".$lokasi." AND  p.idpendaftaran NOT IN (SELECT DISTINCT idpendaftaran FROM bayar_tahunan WHERE  tahun_tagihan ='".date('Y')."' )  AND checkout=0 ";
			$nmtableBayar="bayar_tahunan";
	}
	
		$this->db->query("set @nom=0;");
		$query = $this->db->query($str)->result();
		$detil="";
		
	if ($jenis_sewa=="Bulanan"){
		foreach($query as $rowXls){
				$dd_tglMulai=substr($rowXls->tglmulai,8,2);
				$mm_tglMulai=substr($rowXls->tglmulai,5,2);
				$yy_tglMulai=substr($rowXls->tglmulai,0,4);
				$tag="";
				$x=intval($yy_tglMulai.$mm_tglMulai);
					for ($x;$x<=intval(date('Ym'));$x++){
						$x=$yy_tglMulai.$mm_tglMulai;
						$strLoopPeriod=$yy_tglMulai."-".$mm_tglMulai."-".$dd_tglMulai;
						$cekRow=$this->db->query("select count(*) cek from bayar_bulanan where idpendaftaran='".$rowXls->idpendaftaran."' and thnbln_tagihan='$x'")->row();
						if ($cekRow->cek <=0){
							$interval = date_diff(date_create($strLoopPeriod),date_create() );
							$intervalbln=$interval->format("%m");
							$intervalhr=$interval->format("%d");
							$denda="";
							if ($intervalbln>=1){
								$denda="1 bulan";
							}else{
								if ($strLoopPeriod>date('Y-m-d')){
									$hariDenda=0;
									$denda="Belum telat. (tagihan keluar tgl :".$strLoopPeriod.")";
								}else{
									$hariDenda=$intervalhr;
									$denda=" $hariDenda Hari";
								}
							}
							$tag.="Tagihan : ".$arrBulan[$mm_tglMulai]." ".$yy_tglMulai.", Telat  : ".$denda." <br> ";
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
					echo "<td>".$rowXls->NO."</td>";
					echo "<td>".str_replace(' ','&nbsp;', $rowXls->labelkamar)."</td>";
					echo "<td>".$rowXls->nama."</td>";
					echo "<td>".$rowXls->tglmulai."</td>";
					echo "<td>".$tag."</td>";
					echo "</tr>";

				
		}
		}else{	//tahunan
				foreach($query as $rowXls){
					
				$noreg=$rowXls->IDPENDAFTARAN;
				$qkamar = $this->db->query("select * from kamar where idkamar=".$rowXls->IDKAMAR)->row();	
				$rsDendaThn = $this->db->query("select nominal, hari_ke from denda where id=1")->row();
				$hari_ke_denda=$rsDendaThn->hari_ke;
				$denda=$rsDendaThn->nominal;
				$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from detildaftar_tahunan d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='$noreg'";
				$qryby=$this->db->query($sBiaya)->result();
				$jmlby=0;
				foreach($qryby as $rowbiaya){						
						$jmlby+=$rowbiaya->tarif;						
				}
				$tagihan= $qkamar->TARIFTAHUNAN - $rowXls->diskon;	
				$test="";
				$tgldaftarFull=$rowXls->TGLDAFTAR;	
				$thnMulai=date('Y', strtotime($tgldaftarFull));
				$mmdd_mulai=date('m-d', strtotime($tgldaftarFull));
				$ymd_jatuhtempo=""; $muncul_denda="";
				$thnloop=$thnMulai;
				
		
				for ($thnloop=$thnMulai;$thnloop<=date('Y');$thnloop++){	
					 $hariDenda=0; $denda_ket="";
						$ymd_jatuhtempo=$thnloop."-".$mmdd_mulai;			

						$cekbayar_sewa=$this->db->query("select * from bayar_tahunan where idpendaftaran='$noreg' and idlokasi=".$rowXls->IDLOKASI." and tahun_tagihan='".$thnloop."'");
						$cekbayar_tag_blnn=$this->db->query("select * from bayar_tahunan_tag_blnan where idpendaftaran='$noreg' and idlokasi=".$rowXls->IDLOKASI." and periode_tagihan like '".$thnloop."%' order by periode_tagihan");	
						
						$sts_sewa=""; $tag=""; $rssewa = $cekbayar_sewa->row(); $link_sewa="";
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


								
								$tag.="Tagihan : ".number_format($tagihan,0,',','.')."\n\r";
								$tag.=$denda_ket;
								
						}

							
						}
						
						echo "<tr>";
						echo "<td>".$rowXls->NO."</td>";
						echo "<td>".str_replace(' ','&nbsp;', $rowXls->labelkamar)."</td>";
						echo "<td>".$rowXls->nama."</td>";
						echo "<td>".$rowXls->TGLDAFTAR."</td>";
						echo "<td>".$tag."</td>";
						echo "</tr>";
						
				}
			}
?>			
		</tbody>
	</table>
</div>
</div>
</div>	
</div>

