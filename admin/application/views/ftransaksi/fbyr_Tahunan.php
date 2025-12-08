<?	$strDenda="select * from denda where id=1";
	$rsDenda = $this->db->query($strDenda)->row();					
	$denda=$rsDenda->nominal;
	$hari_ke_denda=$rsDenda->hari_ke;
	$tgldaftarFull=$res->tgldaftar;	
	?>
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<!-- <li><?=$str."<br>".strlen($res->bln)."#".$mm_tgldaftar?></li> -->
	<li>Tagihan sewa tahunan akan muncul sesuai tanggal mulai masuk</li>
	<li>Pembayaran pertama, denda tidak dihitung</li>
	<li>Terlambat bayar akan dikenai denda, besar denda per hari sesuai setting denda di pusat data. <b>[saat ini besarnya : Rp <?php echo number_format($denda, 2, ',','.')?>]</b> per hari dan akan keluar <b>setelah <?php echo $hari_ke_denda?> hari</b> (sesuai seting data master) setelah tanggal tagihan</li>	
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
<td >Tanggal Mulai Masuk</td>
<td ><?php echo $res->tgldaftar?></td>
</tr>
<tr bgcolor="#a7a7a7"><th colspan=2>Detil Tagihan : </th></tr>
<tr><td >Tarif Kamar</td><td>Rp. <?=number_format($res->tariftahunan,2,',','.')?>/Tahun</td></tr>
<?			 
		$jumlah=$res->tariftahunan;
		$sBiaya="SELECT b.id, b.jenisbiaya, b.tarif from detildaftar_tahunan d, biaya_tambahan b where d.idbiaya=b.id and idpendaftaran='$noreg'";
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
<tr><th rowspan=2>Tahun</th><th rowspan=2>Ke</th><th colspan=3>Bayar Sewa</th><th colspan=2>Bayar Tagihan Bulanan(PDAM/PLN)</th></tr>
<tr><th >Status</th><th>Keterangan</th><th>Proses</th><th>Keterangan</th><th>Proses</th></tr>
<?	
	$hariDenda=0;	
	$data_kwh=0;
	$jmlThnLoop=$this->db->query("select period_diff(date_format(now(),'%Y%'), date_format(tgldaftar, '%Y%')) selisih from pendaftaran_tahunan where idpendaftaran='$noreg'")->row();
	//cek pembayaran pertama
	$cekRow_ke1=$this->db->query("select count(*) cek from bayar_tahunan where idpendaftaran='$noreg' ")->row();
	$rsTarif_kwh=$this->db->query("select *  from kwh_var where id=1")->row();
	//cek bayar ke utk ambil val data-kwh
	$tagihan=$jumlah;
	//if ($jmlThnLoop->selisih <= 0 && $cekRow_ke1->cek > 0  ){		
	//		echo "<tr><td colspan=8>Belum ada tagihan</td></tr>";
		
	//}else{
		$test="";
		$thnMulai=date('Y', strtotime($tgldaftarFull));
		$mmdd_mulai=date('m-d', strtotime($tgldaftarFull));
		$yymm_mulai=date('Ym', strtotime($tgldaftarFull));//utk tag bulanan
		$ymd_jatuhtempo=""; $muncul_denda="";
		$thnloop=$thnMulai;
		for ($i=0;$i<=($jmlThnLoop->selisih + 6);$i++){	
			 $hariDenda=0; $denda_ket="";
			$ymd_jatuhtempo=$thnloop."-".$mmdd_mulai;

			$cekbayar_sewa=$this->db->query("select * from bayar_tahunan where idpendaftaran='$noreg' and idlokasi=".$res->idlokasi." and tahun_tagihan='".$thnloop."'");
			$cekbayar_tag_blnn=$this->db->query("select * from bayar_tahunan_tag_blnan where idpendaftaran='$noreg' and idlokasi=".$res->idlokasi." and periode_tagihan like '".$thnloop."%' order by periode_tagihan");	
			
			$sts_sewa=""; $ket_sewa=""; $rssewa = $cekbayar_sewa->row(); $link_sewa="";
			$sts_tagbln=""; $ket_tagbln=""; $rs_tagbln=$cekbayar_tag_blnn->result(); $link_tagbln="";

			echo "<tr valign=top>";		
			echo "<td>".$thnloop."</td>";
			echo "<td>".($i+1)."</td>";	
			
			if ($cekbayar_sewa->num_rows()<=0 || $rssewa->jmlBayar < $rssewa->jmlTagihan ) {
					$sts_sewa="Belum Lunas";
					//$ket_sewa.="#".$rssewa->jmlBayar."#".$rssewa->jmlTagihan;
					//cek denda
					$muncul_denda=strftime("%Y-%m-%d", strtotime(strftime("%Y-%m-%d", strtotime($ymd_jatuhtempo))." + $hari_ke_denda day"));
						$interval = date_diff(date_create($muncul_denda),date_create() );
						$intervalthn=$interval->format("%Y");
						$intervalbln=$interval->format("%m");
						$intervalhr=$interval->format("%d");
					if ($thnloop <= date('Y') && strtotime($muncul_denda)<=strtotime(date('Y-m-d'))) {		
						 
						if ($intervalthn>=1){						
							$hariDenda=$intervalthn*12*30;
							$denda_ket="Telat ".$intervalthn." tahun";
						}elseif ($intervalbln>=1){						
							$hariDenda=$intervalbln*30;
							$denda_ket="Telat ".$intervalbln." bulan";
						}else{
							//$muncul_denda<=$ymd_jatuhtempo
							$hariDenda=$intervalhr;
							$denda_ket="Telat : $hariDenda Hari";
						}

						$denda_ket.=", Denda : ".$hariDenda * $denda;
					}else{	
						$hariDenda=0;
						$denda_ket="Belum denda. (Denda mulai keluar tgl :".$muncul_denda.")";
						//$denda_ket="Belum denda. (Denda keluar tgl :".($ymd_jatuhtempo+$hari_ke_denda).")";
					}
					$link_sewa='<a href="javascript:void(0)" onclick="payThis(this)" data-noreg="'.$res->idpendaftaran.'" data-idkamar="'.$res->idkamar.'"  data-idlokasi="'.$res->idlokasi.'" data-byrke="'.($i+1).'" data-thn="'.$thnloop.'" data-tagihan="'.$tagihan.'" data-hrdenda="'.$hariDenda.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Bayar </a>| &nbsp; <a href="'.base_url('rpt_pembayaran/printInvoice/Tahunan_'.$res->idpendaftaran.'_'.$thnloop).'"><i class=" glyphicon glyphicon-print" title="Cetak Invoice ?"></i>&nbsp;Print Invoice</a>';
					if (sizeof($rssewa)>=1){
						$ket_sewa.="Tagihan : ".number_format($rssewa->jmlTagihan,0,',','.')."<br>";
						$ket_sewa.="Sudah Bayar : ".number_format($rssewa->jmlBayar,0,',','.')."<br>";
					}else{
						$ket_sewa.="Tagihan : ".number_format($tagihan,0,',','.')."<br>";
						$ket_sewa.=$denda_ket;
					}
					
					
			}else{	
				if ($rssewa->jmlBayar < $rssewa->jmlTagihan){
					$sts_sewa="Belum Lunas";

				}else{
					$sts_sewa="Sudah Lunas";
					$link_sewa=" - ";									
					$ket_sewa.="Tagihan : ".($rssewa->jmlTagihan - $rssewa->denda)."<br>";					
					$ket_sewa.="Jumlah Denda : ".$rssewa->denda."<br>";
					$ket_sewa.="Jumlah Bayar : ".$rssewa->jmlBayar."<br>";
				}
			}

			if ($cekbayar_tag_blnn->num_rows() <12){ //open link bayar
				$link_tagbln='<a href="javascript:void(0)" onclick="payThis_tagbln(this)" data-noreg="'.$res->idpendaftaran.'" data-idkamar="'.$res->idkamar.'"  data-idlokasi="'.$res->idlokasi.'"  data-thn="'.$thnloop.'" ><i class=" fa fa-credit-card" title="Bayar?"></i>&nbsp;Bayar </a>';
				$ket_tagbln.=($cekbayar_tag_blnn->num_rows()<=0?"Belum ada pembayaran":"");
				$r=1;
				foreach($rs_tagbln as $rows){
					$ket_tagbln.=$r.". ".$rows->periode_tagihan." :  [ Listrik Rp. ". number_format($rows->jmltag_listrik,0,',','.')." ]"." [ PDAM Rp. ". number_format($rows->jmltag_pdam,0,',','.')." ]"."<br>";
					$r++;
				}

				for ($periode=$yymm_mulai; $periode<=date('Ym');$periode++){
				}
				
			}else{
				$link_tagbln=" - ";
				$sts_tagbln = "Sudah Lunas 1 tahun";
				$ket_tagbln=$sts_tagbln;
			}			

			echo "<td>".$sts_sewa."</td>";
			echo "<td>".$ket_sewa."</td>";
			echo "<td>".$link_sewa."</td>";
			echo "<td>".$ket_tagbln."</td>";
			echo "<td>".$link_tagbln."</td>";	
			echo "</tr>";
			$thnloop++;
			
		}
	//}
?>
</tbody>
</table>

</div><!-- widget-box -->


<?php echo form_close();?>
<script type="text/javascript">

function saveFormPay(noreg, idkamar, byrke, thn, tagihan, hrdenda){
	var form_data=$('#myformByr_detil_bln').serialize();
	$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pembayaran/saveBayarTahunan');?>',
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
					  message: "Data pembayaran sewa tahunan berhasil disimpan. Cetak Kuitansi ?",
					  title: "Konfirmasi",
					  buttons: {
						success: {
						  label: "Cetak Kuitansi",
						  className: "btn-success",
						  callback: function() {							
								//printReceipt();
								window.location.href="<?php echo base_url('rpt_pembayaran/printReceipt/Tahunan_1_');?>"+ noreg+"_"+thn+"_"+msg.detil_insert_id ;
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
					$().showMessage('Terjadi kesalahan. Data gagal disimpan.<br>'+msg.errormsg ,'danger',700);					
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
		var thn = $(obj).attr('data-thn');
		var tagihan = $(obj).attr('data-tagihan');
		var hrdenda = $(obj).attr('data-hrdenda');
		
		$.ajax({
			url: "<?php echo base_url('e_pembayaran/form_tahunan_detil'); ?>",
			dataType: 'html',
			type: 'POST',
			data: {ajax:'true', noreg:noreg, idkamar:idkamar, byrke:byrke, thn:thn, tagihan:tagihan,  hrdenda:hrdenda, idlokasi:idlokasi},
			success:
				
				function(data){
					
					var thisBox=bootbox.dialog({
					  onEscape	:true,					 
					  message: data,
					  title: "Form Pembayaran Uang Sewa Tahunan",
					  buttons: {
						success: {
						  label: "Simpan",
						  className: "btn-success",
						  callback: function() {
							saveFormPay(noreg, idkamar, byrke, thn, tagihan, hrdenda);
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

function payThis_tagbln(obj){
		var idlokasi = $(obj).attr('data-idlokasi');
		var noreg = $(obj).attr('data-noreg');
		var idkamar = $(obj).attr('data-idkamar');
		var thn = $(obj).attr('data-thn');
		
		$.ajax({
			url: "<?php echo base_url('e_pembayaran/form_tahunan_tagihan_bln'); ?>",
			dataType: 'html',
			type: 'POST',
			data: {ajax:'true', noreg:noreg, idkamar:idkamar, thn:thn, idlokasi:idlokasi},
			success:
				
				function(data){
					
					var thisBox=bootbox.dialog({
					  onEscape	:true,					 
					  message: data,
					  title: "Form Pembayaran Tagihan Bulanan Untuk Sewa Tahunan",
					  buttons: {
						success: {
						  label: "Simpan",
						  className: "btn-success",
						  callback: function() {
							  //data
							saveMonthlyBill();
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


function saveMonthlyBill(){
	var form_data=$('#myform_thnn_tagbln').serialize();
	$.ajax({
			type: 'POST',
			url: '<?php echo base_url('e_pembayaran/saveYY_MonthlyBill');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					bootbox.dialog({
					  onEscape	:true,					 
					  message: "Data pembayaran tagihan bulanan untuk sewa tahunan berhasil disimpan. Cetak Kuitansi ?",
					  title: "Konfirmasi",
					  buttons: {
						success: {
						  label: "Cetak Kuitansi",
						  className: "btn-success",
						  callback: function() {							
								//printReceipt();
								//alert(msg);
								window.location.href="<?php echo base_url('rpt_pembayaran/printReceipt_Thnn_tagbln/');?>"+"/"+ msg.noreg+"_"+msg.periode_tagihan+"_"+msg.detil_insert_id ;
								window.location.reload();
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
					$().showMessage('Terjadi kesalahan. Data gagal disimpan.<br>'+msg.errormsg ,'danger',700);					
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
</script>
