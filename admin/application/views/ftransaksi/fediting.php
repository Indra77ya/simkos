<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Catatan</strong>
	<ul>
	<!-- <li><?=$str."<br>".strlen($res->bln)."#".$mm_tglmulai?></li> -->
	<li>Proses (tombol) delete hanya muncul jika belum terjadi pembayaran, jika sudah melakukan pembayaran hanya bisa edit data pendaftaran.</li>
	<li>Untuk merubah kamar gunakan menu pindah kamar</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi Kost</label>
			<div class="col-sm-8"><?	
				if ($this->session->userdata('auth')->ROLE=="Superadmin"){
					echo form_dropdown('cb_lokasi',$lokasi,'','id="cb_lokasi" class="form-control"');
				}else{
					echo '<input type="hidden" name="cb_lokasi" id ="cb_lokasi" value="'.$lokasi->id.'"/>';
					echo '<label  class="col-sm-4 control-label">'.$lokasi->lokasi.'</label>';
				}
				
				
				?></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Sewa</label>
			<div class="col-sm-4"><?=form_dropdown('jenis',array("Tahunan"=>"Tahunan","Bulanan"=>"Bulanan", "Mingguan"=>"Mingguan", "Harian"=>"Harian"),'','id="jenis" class="form-control"');?></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group"><label class="col-sm-4 control-label">Status</label>
			<div class="col-sm-4"><?=form_dropdown('status',array("0"=>"Check In", "1"=>"Check Out", ""=>"All"),'0','id="status" class="form-control"');?></div>
		</div>
	</div>
</div>


<br>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="mydatatables">
		<thead>
			<tr>
				<th>KAMAR</th>	
				<th>NAMA</th>	
				<th>NO.&nbsp;REGISTRASI</th>
				<th>ALAMAT</th>				
				<th>TGL DAFTAR</th>				
				<th>NO. TELP</th>				
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>
<!-- /.table-responsive -->


<script>
    $(document).ready(function() {
        $('#mydatatables').dataTable({
			"bProcessing": true,
			"bServerSide": true,
			"iDisplayLength": 25,
			"fnServerParams": function ( aoData ) {
				aoData.push({ "name": "jenis", "value": $('#jenis').val()}, { "name": "status", "value": $('#status').val()}, { "name": "lokasi", "value": $('#cb_lokasi').val() }  
				);
			},
			"aoColumns": [
				{"mData": "nmkamar" },
				{"mData": "NAMA" },
				{"mData": "idpendaftaran" },				
				{"mData": "ALAMAT", "sortable":false },
				{"mData": "TGLDAFTAR" },
				{"mData": "NOTELP", "sortable":false },
				{"mData": "ACTION", "sortable":false }
			],
			"sAjaxSource": "<?php echo base_url('e_pendaftaran/json_data_editing');?>"
		});

		

    });	
	$('#cb_lokasi').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});
	$('#jenis').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});
	$('#status').change(function(){
		$('#mydatatables').dataTable().fnReloadAjax();

	});

	function editRegistration(jenis, noreg, idlokasi){		
		$.ajax({
			url: "<?php echo base_url('e_pendaftaran/editRegistration/'); ?>/"+jenis+"_"+noreg+"_"+idlokasi,
			dataType: 'html',
			type: 'POST',
			data: {ajax:'true'},
			success:
				function(data){
					bootbox.dialog({
					  message: data,
					  title: "Form Edit Data Pendaftaran "+jenis,
					  buttons: {
						button: {
						  label: "Simpan",
						  className: "btn-primary",
						  callback: function(e) {
							updateData(jenis, noreg, e);
						  }
						},						
						main: {
						  label: "Kembali",
						  className: "btn-warning",
						  callback: function() {
							console.log("Primary button");
						  }
						}
					  }
					});
				}
		});
	}

	function delRegistration(jenis, noreg, nama, idlokasi){	
		var pilih=confirm('Apakah data pendaftaran ' +jenis+' : [' +noreg+'] '+nama+ ' akan dihapus ?');
			if (pilih==true) {
					$.ajax({
					type	: "POST",
					url		: "<?php echo base_url('e_pendaftaran/delRegistration');?>",
					data	: "jenis="+jenis+"&noreg="+noreg+"&idlokasi="+idlokasi,
					timeout	: 3000,  
					success	: function(res){
						//alert(res);
						alert("data berhasil dihapus");
						window.location.reload();
						}
					
				});
			}

	}
	function updateData(jenis, noreg, e){	
		e.preventDefault();	
		var formname="";
		var form1 ;
		var form_data;
		
		switch (jenis){
			case "Tahunan":
				formname="thn_edit";
				form1 = $('form')[0];
				form_data = new FormData(form1);
				break;
			case "Bulanan":
				formname="bln_edit";
				form1 = $('form')[0];
				form_data = new FormData(form1);
				break;
			case "Mingguan":
				formname="week_edit";
				form1 = $('form')[0];
				form_data = new FormData(form1);
				//form_data = $('#myform_'+formname).serialize();
				break;
			case "Harian":
				formname="daily_edit";
				form1 = $('form')[0];
				form_data = new FormData(form1);
				//form_data = $('#myform_'+formname).serialize();
				break;

		}
		//var form1 = $('form')[0];
		//console.log(form1);
        //var form_data = new FormData(form1);
		if (jenis=="Bulanan" || jenis=="Tahunan"){
			 var file_data = $('#userfile').prop('files')[0];
			 var file_card = $('#filecard').prop('files')[0];
			form_data.append('file', file_data);
			form_data.append('file_card', file_card);
		}

		//var form_data = $('#myform_'+formname).serialize();
		$().showMessage('Sedang diproses.. Harap tunggu..');
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url('e_pendaftaran/switchSaving');?>/"+jenis+"_"+noreg,
			data: form_data,				
			dataType: 'json',
			contentType: false, 
			processData: false,
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){					
					$().showMessage('Data pendaftaran berhasil disimpan.','success',1000);
				} else {
					$().showMessage('Terjadi kesalahan. Data gagal disimpan.'+msg.errormsg,'danger',2000);
					$("#errorHandler").html(msg.errormsg).show();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});
	}	
</script>