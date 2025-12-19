<?php echo form_open(null,array("class"=>"form-horizontal","id"=>"myform_roomList"));?>
<br>
<div class="row">
	<div class="col-md-8"><div class="form-group">
		<label for="role" class="col-sm-4 control-label">Lokasi</label>
			<div class="col-sm-4">
			<?	
				if ($this->session->userdata('auth')->ROLE=="Superadmin"){
					echo form_dropdown('lokasi',$lokasi,'','id="lokasi" class="form-control"');
				}else{
					echo '<input type="hidden" name="lokasi" id ="lokasi" value="'.$lokasi->id.'"/>';
					echo '<label  class="col-sm-4 control-label">'.$lokasi->lokasi.'</label>';
				}
				
				
			?>
				
			</div>
			
	</div>
	</div>
</div>
<br>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover " id="dataTables-cab">
		<thead>
			<tr>
				<th>ID</th>							
				<th>KAMAR</th>	
				<th>LOKASI</th>	
				<th>KUOTA</th>				
				<th>TERISI</th>
				<th>SISA</th>
				<th>FASILITAS</th>
				<th>TAHUNAN</th>
				<th>BULANAN</th>
				<th>MINGGUAN</th>
				<th>HARIAN</th>
				
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<input type="hidden" name="jenis" id ="jenis" value="<?php echo $jenis;?>">
	
</div>


<?php echo form_close();?>

<script>

	$('#lokasi').change(function(){
		$('#dataTables-cab').dataTable().fnReloadAjax();
	});
	$(document).ready(function() {
        $('#dataTables-cab').dataTable({
			"bProcessing": true,
			"bServerSide": true,
			"iDisplayLength": 25,
			"fnServerParams": function ( aoData ) {
				aoData.push( { "name": "idlokasi", "value": $('#lokasi').val() });
			},
			"aoColumns": [
				{"mData": "IDKAMAR" },				
				{"mData": "LABELKAMAR" },
				{"mData": "LOKASI" },
				{"mData": "KUOTA" },
				{"mData": "TERISI" },
				{"mData": "SISA" },
				{"mData": "FASILITAS" },
				{"mData": "TAHUNAN" },
				{"mData": "BULANAN" },
				{"mData": "MINGGUAN" },
				{"mData": "HARIAN" }
			],
			"sAjaxSource": "<?php echo base_url('kamar/json_data_pilih');?>"
		});

		$('#dataTables-cab').closest('.modal-dialog').addClass('modal-lg');

    });	

	function display(lt){
	
		myurl='<?php echo base_url('kamar/genRoomList');?>';
		$.ajax({
			type: 'POST',
			url: myurl,
			data: { lokasi_id:lt},				
			dataType: 'json',
			success: function(msg) {
				console.log(msg);
				if (msg.status=='success')
				{
					$( "#divRes" ).html(msg.html);					
					$( "#divRes" ).fadeSlide("show");
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				bootbox.alert("Terjadi kesalahan. Data gagal ditampilkan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});
	}	

	function chooseThis(idx, lblroom, fas, trfthnn, trfbln, trfmgg, trfhr){
		//alert($("#jenis").val()+"trfbln="+trfbln+", trfthnn="+trfthnn);
		switch ( $("#jenis").val() ){
			case "tahunan":
				$("#thn_idkamar").val(idx);
				$("#thn_lblkamar").val(lblroom);
				$("#thn_tarif").val(trfthnn);
				$("#thn_fasilitas").val(fas.replace( /#+/g, '\n'));
				break;
			case "bulanan":
				$("#bln_idkamar").val(idx);
				$("#bln_lblkamar").val(lblroom);
				$("#bln_tarif").val(trfbln);
				$("#bln_fasilitas").val(fas.replace( /#+/g, '\n'));
				break;
			case "mingguan":
				$("#mgg_idkamar").val(idx);
				$("#mgg_lblkamar").val(lblroom);
				$("#mgg_tarif").val(trfmgg);
				$("#mgg_fasilitas").val(fas.replace( /#+/g, '\n'));
				break;
			case "harian":
				$("#hr_idkamar").val(idx);
				$("#hr_lblkamar").val(lblroom);
				$("#hr_tarif").val(trfhr);
				$("#hr_fasilitas").val(fas.replace( /#+/g, '\n'));
				break;
			case "pindah_tahunan":
				$("#idkamar").val(idx);
				$("#lblkamar").val(lblroom);
				$("#tarif").val(trfthnn);
				$("#fasilitas").val(fas.replace( /#+/g, '\n'));
				break;
			case "pindah_bulanan":
				$("#idkamar").val(idx);
				$("#lblkamar").val(lblroom);
				$("#tarif").val(trfbln);
				$("#fasilitas").val(fas.replace( /#+/g, '\n'));
				break;
			case "pindah_mingguan":
				$("#idkamar").val(idx);
				$("#lblkamar").val(lblroom);
				$("#tarif").val(trfmgg);
				$("#fasilitas").val(fas.replace( /#+/g, '\n'));
				break;
			case "pindah_harian":
				$("#idkamar").val(idx);
				$("#lblkamar").val(lblroom);
				$("#tarif").val(trfhr);
				$("#fasilitas").val(fas.replace( /#+/g, '\n'));
				break;
		
		}
		
		$('.bootbox.modal').modal('hide');	
	
	}

	
</script>