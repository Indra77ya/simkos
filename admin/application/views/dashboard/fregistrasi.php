
<div class="row">
	<div class="col-sm-12 infobox-container">
		<div class="form-group"><label class="col-sm-4 control-label">Jenis Sewa</label>
			<div class="col-sm-4">
			<?php echo form_dropdown('jenis',array('tahunan'=>'tahunan', 'bulanan'=>'bulanan', 'mingguan'=>'mingguan', 'harian'=>'harian'),'','id="jenis" class="form-control"');?>			
			</div>
		</div>
	</div>
</div><br/>
<div class="row">
	<div class="col-sm-12 infobox-container">
		<div class="" id="frmtahunan">
                <?php $this->load->view('dashboard/frmtahunan'); ?>
			</div>
			<div class="no-display" id="frmbulanan">
               <?php $this->load->view('dashboard/frmbulanan'); ?>
			</div>
			<div class="no-display" id="frmmingguan">
				<?php $this->load->view('dashboard/frmmingguan'); ?>
			</div>
			<div class="no-display" id="frmharian">
				<?php $this->load->view('dashboard/frmharian'); ?>
			</div>
 	</div>
</div>    


<script>
 $(document).ready(function() {
	 $('#jenis').val('tahunan');
	 $('#jenis').change(); 
	 
	 /*$("body").delegate("#Datepicker", "focusin", function () {
            
            $(this).datepicker();
        });*/
 });
 
$('#jenis').change(function(){
	switch ($('#jenis').val()){
		case "tahunan":		
			$("#frmtahunan").fadeSlide("show");
			$("#frmbulanan").fadeSlide("hide");
			$("#frmmingguan").fadeSlide("hide");
			$("#frmharian").fadeSlide("hide");
			break;
		
		case "bulanan":		
			$("#frmtahunan").fadeSlide("hide");
			$("#frmbulanan").fadeSlide("show");
			$("#frmmingguan").fadeSlide("hide");
			$("#frmharian").fadeSlide("hide");
			break;
		case "mingguan":		
			$("#frmtahunan").fadeSlide("hide");
			$("#frmbulanan").fadeSlide("hide");
			$("#frmmingguan").fadeSlide("show");
			$("#frmharian").fadeSlide("hide");
			break;
		case "harian":		
			$("#frmtahunan").fadeSlide("hide");
			$("#frmbulanan").fadeSlide("hide");
			$("#frmmingguan").fadeSlide("hide");
			$("#frmharian").fadeSlide("show");
			break;
	}
});
	
	
</script>
