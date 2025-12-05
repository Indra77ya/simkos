<div class="control-group"><a href="javascript:void(0)" id="btcreate" class="btn btn-primary">Tambah Pengguna</a>
</div>
<div id="errorHandler" class="alert alert-danger no-display"></div>
<?php 
echo form_open_multipart('pengguna/saveUser',array('class'=>'form-horizontal','id'=>'myformkel'));
?>
<div id="divformkel" class="no-display">
<div class="control-group span8 m-wrap">
	<h4><u><label id="lbltitle">Tambah Data Pengguna Baru</label></u></h4>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Lokasi/Cabang Kost</label>
			<div class="col-sm-8"><?=form_dropdown('lokasi',$lokasi,'','id="lokasi" class="form-control"');?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Username</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'username','id'=>'username','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Password</label>
			<div class="col-sm-8"><?=form_password(array('name'=>'password','id'=>'password','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label  class="col-sm-4 control-label">Nama</label>
			<div class="col-sm-8"><?=form_input(array('name'=>'nama','id'=>'nama','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8"><div class="form-group">
		<label for="role" class="col-sm-4 control-label">Role Akses</label>
			<div class="col-sm-4">
				<?php $data = array( 'Operator'=>'Operator', 'Admin'=>'Admin Lokasi', 'Superadmin'=>'Superadmin/Owner');
					echo form_dropdown('role',$data,'','id="role" class="form-control"');
					
				?>
			</div>
			
	</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group"><label class="col-sm-4 control-label">Foto</label>
			<div class="col-sm-5"><?=form_upload(array('name'=>'userfile','id'=>'userfile','class'=>'form-control'));?></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group">
			<label for="sex" class="col-sm-4 control-label">Status</label>
			<div class="col-sm-4">
				<?php $data = array('1'=>'Aktif', '0'=>'Tidak Aktif');
					echo form_dropdown('status',$data,'','id="status" class="form-control"  ');
				?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
	<input type="hidden" name="id" id="id">
	<input type="hidden" name="state" id="state" value="add">
	<input type="submit" class="btn btn-primary" id="btsimpankel" value="Simpan">
	<button type="button" class="btn btn-default" id="btcancelkel">Batal</button>
	</div>
	</div> <hr/>
</div><!-- end modal -->

<?php echo form_close();?>  
<br>
<div class="table-header">Results for "Pengguna"</div>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="dataTables">
		<thead>
			<tr>
				<th>ID</th>
				<th>LOKASI/CABANG</th>
				<th>USERNAME</th>				
				<th>PASSWORD</th>
				<th>NAMA</th>
				<th>ROLE AKSES</th>
				<th>FOTO</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>
<!-- /.table-responsive -->
<script>
    $(document).ready(function() {
        $('#dataTables').dataTable({
			"bProcessing": true,
			"bServerSide": true,
			"iDisplayLength": 25,
			"aoColumns": [
				{"mData": "ID" },
				{"mData": "LOKASI" },
				{"mData": "USERNAME" },
				{"mData": "PASSWORD" },
				{"mData": "NAMA" },
				{"mData": "ROLE" },
				{"mData": "FOTO" },
				{"mData": "ACTION", "sortable":false }
			],
			"sAjaxSource": "<?php echo base_url('pengguna/json_data');?>"
		});

		
	$('#userfile').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});

    });


	$('#btcreate').click(function(){
		$("#divformkel").fadeSlide("show");
		$('#state').val('add');
		$('#lbltitle').text('Tambah Data Pengguna Baru');
		$('#username').removeAttr('readonly');		
		$('#myformkel').reset();
		
		
	});
	$('#btcancelkel').click(function(){
		$("#divformkel").fadeSlide("hide");
	});
	
	/*$('#btsimpankel').click(function(e){		
		var form_data = $('#myformkel').serialize();
		e.preventDefault();
		$().showMessage('Sedang diproses.. Harap tunggu..');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('pengguna/saveUser');?>',
			data: form_data,				
			dataType: 'json',
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Data Pengguna berhasil disimpan.','success',1000);
					$("#divformkel").fadeSlide("hide");
					$('#dataTables').dataTable().fnReloadAjax();
					
				} else {
					$().showMessage('Terjadi kesalahan. Data gagal disimpan.','danger',700);
					//bootbox.alert("Terjadi kesalahan. Data gagal disimpan.");
					$("#errorHandler").html(msg.errormsg).show();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				//$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger');
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});
		//$().showMessage('Data pembelian berhasil disimpan, data order akan dikirim melalui sms','success',1000);
	});*/

	function delUser(idx, str){
			var pilih=confirm('Hapus Username = '+str+ ' dilanjutkan ?');
			if (pilih==true) {
					$.ajax({
					type	: "POST",
					url		: "<?php echo base_url('pengguna/delUser');?>",
					data	: "idx="+idx,
					timeout	: 3000,  
					success	: function(res){
						alert("data berhasil dihapus");
						window.location.reload();
						}
					
				});
			}
		}
	function editUser(obj){
		var id = $(obj).attr('data-id');
		$('#myformkel input[name="state"]').val(id);		
		$('#lbltitle').text('Edit Data Pengguna');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('pengguna/getUser');?>',
			data: {
				id:id
			},
			dataType: 'json',
			success: function(msg) {
					$('#username').attr('readonly', true);
				if(msg.status =='success'){
					console.log(msg.data);
					
					$('#username').val(msg.data.USERNAME);
					$('#password').val('');
					$('#nama').val(msg.data.NAMA);					
					$('#role').val(msg.data.ROLE);					
					$('#status').val(msg.data.ISACTIVE);
					$("#divformkel").fadeSlide("show");
					
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger',2000);
			},
			cache: false
		});
	}



    </script>