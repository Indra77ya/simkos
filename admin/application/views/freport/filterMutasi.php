<?
echo form_open($action,array('class'=>'form-horizontal','id'=>'myformMutasi'));
?>
<div class="row">
	<div class="col-md-4" >
		<div class="form-group"><label class="col-md-4 control-label">Laporan berdasarkan</label>
			<div class="col-md-6"><?	
				echo form_dropdown('myOpsi',$opsi,'','id="myOpsi" class="form-control" ');
				?></div>
		</div>
	</div>
	<div class="col-md-6" >
		<div class="form-group">
			<div class="col-md-6">
				<div class="form-group" id="fstatus" style="display:none">
				<?	
				echo form_dropdown('cbstatus',$status,'','id="cbstatus" class="form-control"');
				?>
				</div>
				<div class="form-group" id="flokasi" style="display:none">
				<?	
				echo form_dropdown('cblokasi',$lokasi,'','id="cblokasi" class="form-control"');
				?>
				</div>
			
				<div class="form-group" id="fjenisSewa" style="display:none">
				<?	
				echo form_dropdown('cbjenisSewa',$jenisSewa,'','id="cbjenisSewa" class="form-control"');
				?>
				</div>
			
				<div class="form-group" id="fperiode"  style="display:none">
					<label for="nama" class="col-sm-2   control-label">BULAN</label>
					<div class="col-sm-4"><?=form_dropdown('cbBulan',$arrBulan,date('m'),'id="cbBulan" class="form-control"');?></div>
					<label for="nama" class="col-sm-2   control-label">TAHUN</label>
					<div class="col-sm-4"><?=form_dropdown('cbTahun',$arrThn, date('Y'),'id="cbTahun" class="form-control"');?></div>
				</div>
				

			</div>
		</div>
	</div>
	<div class="col-md-2" >
		<div class="form-group">			
			<input type="hidden" name="display" id="display" value="0">
			<input type="hidden" name="jenisLap" id="jenisLap" value="<?php echo $jenisLap;?>">
		<input type="submit" class="btn btn-primary" id="btOk" value="Lanjutkan">	
		</div>
	</div>
</div>	
<hr/>
<?php echo form_close();?> 
<script>
$(document).ready(function() {
	 $('#myOpsi').change(function(){
            var selectedValue = $(this).val();

            switch (selectedValue){
            	case 'Lokasi': 
            			$('#flokasi').css('display', 'block');
            			$('#fjenisSewa').css('display', 'none');
            			$('#fperiode').css('display', 'none');
            			$('#fstatus').css('display', 'none');
            		break;
            	case 'Periode': 
            			$('#flokasi').css('display', 'none');
            			$('#fjenisSewa').css('display', 'none');
            			$('#fperiode').css('display', 'block');
            			$('#fstatus').css('display', 'none');
            		break;
            	case 'JenisSewa': 
            			$('#flokasi').css('display', 'none');
            			$('#fjenisSewa').css('display', 'block');
            			$('#fperiode').css('display', 'none');
            			$('#fstatus').css('display', 'none');
            		break;
            	case 'Status': 
            			$('#flokasi').css('display', 'none');
            			$('#fjenisSewa').css('display', 'none');
            			$('#fperiode').css('display', 'none');
            			$('#fstatus').css('display', 'block');
            		break;
            }
                
            });
	 $('#myOpsi').trigger('change');
});

</script>
