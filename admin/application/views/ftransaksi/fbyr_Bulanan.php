<?	$strDenda="select * from denda where id=1";
	$rsDenda = $this->db->query($strDenda)->row();					
	$denda=$rsDenda->nominal;
	$hari_ke_denda=$rsDenda->hari_ke;
	$tglMulaiFull=$res->tglmulai;
	$dd_akhir=$res->dd_akhir;
	$dd_tglMulai=$res->dd_mulai;
	$dd_selisih=$res->selisih;
	$thnblnskr="";
	//$mm_tglmulai=(strlen($res->bln)>1?$res->bln:"0".$res->bln);
	$mm_tglmulai=$res->bln;
	$yy_tglmulai=$res->xthn;
	
					?>
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<!-- <li><?=$str."<br>".strlen($res->bln)."#".$mm_tglmulai?></li> -->
	<li>Tagihan sewa bulanan akan muncul sesuai tanggal mulai inap</li>
	<li>Pembayaran pertama, denda tidak dihitung</li>
	<li>Terlambat bayar akan dikenai denda, besar denda per hari sesuai setting denda di pusat data. [saat ini besarnya : <b>Rp <?php echo number_format($denda, 2, ',','.')?>]</b> per hari dan akan keluar setelah  <b> <?php echo $hari_ke_denda?></b> hari (sesuai seting data master) setelah tanggal tagihan</li>	
	<li>klik link "invoice" untuk cek dan generate data tagihan sehingga link berubah jadi "print invoice", link "print invoice" untuk download file pdf invoice dan siap di print atau dikirim</li>
	</ul>
</div>
<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_bln"));?>
<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title smaller">Informasi Pembayaran Penghuni</h4>
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
<td >Sewa Kamar</td>
<td ><?php echo $res->labelkamar?></td>
</tr>
<tr>
<td >Tanggal Mulai Inap</td>
<td ><?php echo $res->tglmulai?></td>
</tr>
<tr bgcolor="#a7a7a7"><th colspan=2>Detil Tagihan : </th></tr>
<tr><td >Tarif Kamar</td><td>Rp. <?=number_format($res->tarifbulanan,2,',','.')?>/Bulan</td></tr>
<?	
		 
		$jumlah=$res->tarifbulanan;
		$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from detildaftar d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='$noreg'";
		$query=$this->db->query($sBiaya)->result();
		$idxbiaya=1;
		foreach($query as $row){
				echo "<tr><td >".$row->jenisbiaya."</td><td >Rp. ".number_format($row->tarif,2,',','.')."</td></tr>";
				$jumlah+=$row->tarif;
				$idxbiaya++;
		}
			$jumlah-=$res->diskon;
		?>	
<tr><td >Diskon</td><td><?php echo "Rp. (".number_format($res->diskon,2,',','.').")"?></td></tr>
<tr bgcolor="#a7a7a7"><th bgcolor="#a7a7a7">Total</th><th bgcolor="#a7a7a7"><?php echo "Rp. ".number_format($jumlah,2,',','.')?></th></tr>
</tbody>
</table>
	</div>
</div>
<table class="table table-striped table-bordered table-hover">
<tbody>
<tr ><th colspan=8 bgcolor="#a7a7a7">Daftar Tagihan</th></tr>
<tr><th>Periode</th><th >Ke</th><th >Status</th><th>Tagihan</th><th>Denda</th><th>Total</th><th>Keterangan</th><th>Bayar ?</th></tr>
<?	
	$hariDenda=0;	
	$data_kwh=0;
	$jmlBlnLoop=$this->db->query("select period_diff(date_format(now(),'%Y%m'), date_format(tglmulai, '%Y%m')) selisih from pendaftaran where idpendaftaran='$noreg'")->row();
	//cek pembayaran pertama
	$cekRow_ke1=$this->db->query("select count(*) cek from bayar_bulanan where idpendaftaran='$noreg' ")->row();
	$rsTarif_kwh=$this->db->query("select *  from kwh_var where id=1")->row();
	//cek bayar ke utk ambil val data-kwh
	if ($jmlBlnLoop->selisih < 0 && $cekRow_ke1->cek > 0  ){		
			echo "<tr><td colspan=8>Belum ada tagihan</td></tr>";
		
	}else{
		$test="";
		for ($i=0;$i<=($jmlBlnLoop->selisih + 12);$i++){
			//echo "<tr><td colspan=8>$mm_tglmulai</td></tr>";
			//$thnbln=$yy_tglmulai.$arrIntBln[$mm_tglmulai];
			$thnbln=$yy_tglmulai.$arrIntBln[$mm_tglmulai];
			//strLoopPeriod = dari tgl mulai per bulannya
			$strLoopPeriod=$yy_tglmulai."-".$arrIntBln[$mm_tglmulai]."-".$dd_tglMulai;
			//strLoopPeriod, setelah penambahan hari keluar denda
			$test="strLoopPeriod=".$strLoopPeriod;
			$strLoopPeriod=date('Y-m-d', strtotime($strLoopPeriod. ' + '.$hari_ke_denda.' days'));
			$test.=" tambah ".$hari_ke_denda." hari jadi :".$strLoopPeriod;
			

		    $scek="select jmlTagihan, (jmlBayar+pengurangan_denda) jmlBayar from bayar_bulanan where idpendaftaran='$noreg' and thnbln_tagihan='$thnbln' order by pembayaran_ke";
			$cekRowStatus=$this->db->query($scek);
	       $rscek=$cekRowStatus->row();
			$thnblnskr=date('Ym');
			//$jmltag=$cekRowStatus->jmlTagihan;
			//echo "<tr valign=top><td colspan=8>";		
			//echo "select * from bayar_bulanan where idpendaftaran='$noreg' and thnbln_tagihan='$thnbln'</td></tr>";
			echo "<tr valign=top>";		
			echo "<td>".$arrBulan[$arrIntBln[$mm_tglmulai]]."  ".$yy_tglmulai."</td>";
			echo "<td>".($i+1)."</td>";	
			$keterangan="";$interval="";
			
			$tagihan=$jumlah;
				$thnblnskr=date('Ym');
				$ddSkr=date('d');		
				//$test.="<br>date_create=".strftime('%d %B %Y',strtotime(date_create()));
				//selisih tgl skr dgn strLoopPeriod yg sdh ditambah hari denda muncul
				$interval = date_diff(date_create($strLoopPeriod),date_create() );
				$intervalbln=$interval->format("%m");
				$intervalhr=$interval->format("%d");
				$iske_1=($i==0?", Pembayaran Ke 1":"");
				$keterangan="";

				if ($thnbln<$thnblnskr){	//denda 1 bulan
					if ($i==0){
						$hariDenda=0;
						$keterangan="Pembayaran ke 1";
					}else{
						if ($intervalbln>=1){						
							$tglx=$yy_tglmulai."-".$arrIntBln[$mm_tglmulai]."-01";
							$ddLastDay=$this->db->query("select day(last_day('$tglx')) as xtgl")->row();	
							$hariDenda=$ddLastDay->xtgl;
							$keterangan="Denda 1 bulan (".$hariDenda." hari)".$iske_1;
						}else{
							if ($strLoopPeriod>date('Y-m-d')){
								$hariDenda=0;
								$keterangan="Belum denda. (Denda keluar tgl :".$strLoopPeriod.")";
							}else{
								$hariDenda=$intervalhr;
								$keterangan="Denda : $hariDenda Hari".$iske_1;
							}
						}
					}	
					
					//echo "<tr><td colspan=8>$tglx</td></tr>";
				}else if ($thnbln==$thnblnskr){						
					if ($i==0){
						$hariDenda=0;
						$keterangan="Pembayaran ke 1";
					}else{
						if ($strLoopPeriod >= date('Y-m-d')){
							$hariDenda=0;
							$keterangan="Belum Denda. (Denda keluar setelah tgl :".$strLoopPeriod.")";
						}else{
							$hariDenda=$interval->format("%d");
							$keterangan="Denda : $hariDenda Hari";
						}
					}
					
				}else{	
					$hariDenda=0;
					if ($i==0){
						$hariDenda=0;
						$keterangan="Pembayaran ke 1";
					}
				}
				
				$jmlDenda=$hariDenda*$denda;


			if ( $cekRowStatus->num_rows() > 0 ){ //jika lunas
				//if ( $cekRowStatus->num_rows() > 0 && ($rscek->jmlBayar >= $rscek->jmlTagihan)){ //jika lunas
				//hanya tulisan dikolom keterangan thnbln mulai inap (baris pertama saja)				
				$rowRes=$this->db->query("select * from bayar_bulanan where idpendaftaran='$noreg' and thnbln_tagihan='$thnbln' order by pembayaran_ke")->row();
				$mydenda=($i==0?0:$rowRes->denda);
				$data_kwh=($i==0?$res->kwh_awal:$rowRes->kwh_akhir);
				$keterangan="Tagihan bulanan : Rp. ".number_format($jumlah,2,',','.');
				$keterangan.="<br>Denda : Rp. ".number_format(($mydenda+$rowRes->pengurangan_denda),2,',','.');
				$keterangan.="<br>Diskon/Pengurangan Denda : Rp. ".number_format($rowRes->pengurangan_denda,2,',','.');
				$keterangan.="<br>Bayar Kwh : Rp. ".number_format($rowRes->kwh_terpakai * $rsTarif_kwh->kwh_tarif,2,',','.');
				echo "<td>".($rscek->jmlBayar >= $rscek->jmlTagihan ?"Lunas":"<font color=\"Red\"><b>Belum Lunas</b></font>")."</td>";
				echo "<td>".number_format($rowRes->jmlTagihan,2,',','.')."</td>";
				echo "<td>".number_format($mydenda,2,',','.')."</td>";
				echo "<td>".number_format(($rowRes->jmlTagihan + $mydenda),2,',','.')."</td>";
				echo "<td>".($i==0?"Pembayaran ke 1 ":$keterangan)."</td>";
				if ($rscek->jmlBayar >= $rscek->jmlTagihan ){
					echo "<td>-</td>";
				}else{
					echo '<td>	<a href="javascript:void(0)" onclick="payThis(this)" data-noreg="'.$rowRes->idPendaftaran.'"  data-idlokasi="'.$res->idlokasi.'" data-idkamar="'.$rowRes->idkamar.'" data-byrke="'.$rowRes->pembayaran_ke.'" data-thnbln="'.$rowRes->thnbln_tagihan.'" data-tagihan="'.$rowRes->jmlTagihan.'" data-hrdenda="'.$hariDenda.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Bayar </a>	</td>';
				}
			}else{
				
				
				echo "<td><font color=\"Red\"><b>Belum Lunas</b></font></td>";
				echo "<td>".number_format($tagihan,2,',','.')."</td>";
				echo "<td>".number_format($jmlDenda,2,',','.')."</td>";
				echo "<td>".number_format(($tagihan+$jmlDenda),2,',','.')."</td>";
				echo "<td>".$keterangan."</td>";

				//cek invoice
					$rcekInv=$this->db->query("select count(*) cnt from invoice_bulanan where idPendaftaran='".$res->idpendaftaran."' and pembayaran_ke=".($i+1)." and thnbln_tagihan='".$thnbln."'")->row();
					$htm="";
					$linkbayar='<td>	<a href="javascript:void(0)" onclick="payThis(this)" data-noreg="'.$res->idpendaftaran.'" data-idkamar="'.$res->idkamar.'" data-idlokasi="'.$res->idlokasi.'" data-byrke="'.($i+1).'" data-thnbln="'.$thnbln.'" data-tagihan="'.$tagihan.'" data-hrdenda="'.$hariDenda.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Bayar </a>';
					if ($rcekInv->cnt<=0){
						//invoice blm entri
						$htm='| &nbsp; <a href="javascript:void(0)" onclick="genInvoice(this)" data-noreg="'.$res->idpendaftaran.'" data-idkamar="'.$res->idkamar.'" data-byrke="'.($i+1).'" data-thnbln="'.$thnbln.'" data-tagihan="'.$tagihan.'" data-hrdenda="'.$hariDenda.'" ><i class=" fa fa-credit-card" title="Generate Invoice ?"></i>&nbsp;Invoice </a>';				
						
					}else{
						//invoice sdh entri
						//$linkbayar='<td>	<a href="javascript:void(0)" onclick="payThis(this)" data-noreg="'.$res->idpendaftaran.'" data-idkamar="'.$res->idkamar.'" data-byrke="'.($i+1).'" data-thnbln="'.$thnbln.'" data-tagihan="'.$tagihan.'" data-hrdenda="'.$hariDenda.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Bayar </a>';
						$htm= '| &nbsp;<a href="'.base_url('rpt_pembayaran/printInvoice/Bulanan_'.$res->idpendaftaran.'_'.$thnbln).'"><i class=" glyphicon glyphicon-print" title="Cetak Invoice ?"></i>&nbsp;Print Invoice</a>';
					}
					
				echo  $linkbayar.$htm.'</td>';
				//echo '<td>	<a href="javascript:void(0)" onclick="payThis(this)" data-noreg="'.$res->idpendaftaran.'" data-idkamar="'.$res->idkamar.'"  data-idlokasi="'.$res->idlokasi.'" data-byrke="'.($i+1).'" data-thnbln="'.$thnbln.'" data-tagihan="'.$tagihan.'" data-hrdenda="'.$hariDenda.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Bayar </a>				</td>';
				//noreg_iloop_idkamar_thnbln_jmltagihan_haridenda
				// <a href="'.base_url('e_pembayaran/form_bulanan_detil/'.$row->idpendaftaran.'_'.($i+1).'_'.$res->idkamar.'_'$thnbln.'_'.$tagihan.'_'.$hariDenda).'"><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Bayar </a>

			}		
			echo "</tr>";
			$mm_tglmulai++;
			if ($mm_tglmulai>12) {
				$mm_tglmulai=1;
				$yy_tglmulai+=1;
			}
		}
	}
?>
</tbody>
</table>

</div><!-- widget-box -->


<?php echo form_close();?>
<script type="text/javascript">

function saveFormPay(noreg, idkamar, byrke, thnbln, tagihan, hrdenda){
	var form_data=$('#myformByr_detil_bln').serialize();
	$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pembayaran/saveBayarBulanan');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				 //detil_insert_id as no_urut or no_kuit
				if(msg.status =='success'){
					//$().showMessage('Data Pembayaran berhasil disimpan.','success',1500);
					//window.location.reload();
					bootbox.dialog({
					  onEscape	:true,					 
					  message: "Data pembayaran sewa bulanan berhasil disimpan. Cetak Kuitansi ?",
					  title: "Konfirmasi",
					  buttons: {
						success: {
						  label: "Cetak Kuitansi",
						  className: "btn-success",
						  callback: function() {							
								//printReceipt();
								window.location.href="<?php echo base_url('rpt_pembayaran/printReceipt/Bulanan_1_');?>"+ noreg+"_"+thnbln+"_"+msg.detil_insert_id ;
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
					
					$().showMessage('Terjadi kesalahan. Data gagal disimpan. Masuk ajax<br>'+msg.errormsg ,'danger',700);
					
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

function payThis(obj){
		var idlokasi = $(obj).attr('data-idlokasi');
		var noreg = $(obj).attr('data-noreg');
		var idkamar = $(obj).attr('data-idkamar');
		var byrke = $(obj).attr('data-byrke');
		var thnbln = $(obj).attr('data-thnbln');
		var tagihan = $(obj).attr('data-tagihan');
		var hrdenda = $(obj).attr('data-hrdenda');
		
		
		
		$.ajax({
			url: "<?php echo base_url('e_pembayaran/form_bulanan_detil'); ?>",
			dataType: 'html',
			type: 'POST',
			data: {ajax:'true', noreg:noreg, idkamar:idkamar, byrke:byrke, thnbln:thnbln, tagihan:tagihan,  hrdenda:hrdenda, idlokasi:idlokasi},
			success:
				
				function(data){
					
					var thisBox=bootbox.dialog({
					  onEscape	:true,					 
					  message: data,
					  title: "Form Pembayaran Bulanan",
					  buttons: {
						success: {
						  label: "Simpan",
						  className: "btn-success",
						  callback: function() {
							saveFormPay(noreg, idkamar, byrke, thnbln, tagihan, hrdenda);
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

	function genInvoice(obj){
		var noreg = $(obj).attr('data-noreg');
		var idkamar = $(obj).attr('data-idkamar');
		var byrke = $(obj).attr('data-byrke');
		var thnbln = $(obj).attr('data-thnbln');
		var tagihan = $(obj).attr('data-tagihan');
		var hrdenda = $(obj).attr('data-hrdenda');
		
		
		
		$.ajax({
			url: "<?php echo base_url('e_pembayaran/form_geninv_bulanan'); ?>",
			dataType: 'html',
			type: 'POST',
			data: {ajax:'true', noreg:noreg, idkamar:idkamar, byrke:byrke, thnbln:thnbln, tagihan:tagihan,  hrdenda:hrdenda},
			success:
				
				function(data){
					
					var thisBox=bootbox.dialog({
					  onEscape	:true,					 
					  message: data,
					  title: "Form Generate Invoice",
					  buttons: {
						success: {
						  label: "Simpan",
						  className: "btn-success",
						  callback: function() {
							saveFormInv(noreg, idkamar, byrke, thnbln, tagihan, hrdenda);
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

	function saveFormInv(noreg, idkamar, byrke, thnbln, tagihan, hrdenda){
	
	var form_data=$('#myformgeninv_bln').serialize();
	$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pembayaran/saveInvFormBulanan');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				 //detil_insert_id as no_urut or no_kuit
				if(msg.status =='success'){
					//$().showMessage('Data Pembayaran berhasil disimpan.','success',1500);
					//window.location.reload();
					bootbox.dialog({
					  onEscape	:true,					 
					  message: "Data Generate Invoice bulanan berhasil disimpan. Cetak Invoice ?",
					  title: "Konfirmasi",
					  buttons: {
						success: {
						  label: "Cetak Invoice",
						  className: "btn-success",
						  callback: function() {							
								//printReceipt();
								window.location.href="<?php echo base_url('rpt_pembayaran/printInvoice/Bulanan_');?>"+ noreg+"_"+thnbln;
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
					window.location.reload();
				} else {
					console.log(msg);
					$().showMessage('Terjadi kesalahan. Data gagal disimpan. '+msg.errormsg ,'danger',700);
					
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest);
				
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan. "+ 	textStatus + " - " + errorThrown );
			},
			cache: false
		});
}
</script>
