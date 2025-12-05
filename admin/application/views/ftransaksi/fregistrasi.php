<div class="row">
	<div class="col-xs-12">
    <!-- Custom Tabs -->
		<div class="nav-tabs-custom" id="tabs">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#frmtahunan" data-toggle="tab">Tahunan</a></li>
				<li ><a href="#frmbulanan" data-toggle="tab">Bulanan</a></li>
                <li><a href="#frmmingguan" data-toggle="tab">Mingguan</a></li>
                <li><a href="#frmharian" data-toggle="tab">Harian</a></li>                
            </ul>
            <div class="tab-content">
				<div class="tab-pane active" id="frmtahunan">
                <?php $this->load->view('ftransaksi/frmtahunan'); ?>
				</div><!-- /.tab-pane -->
				<div class="tab-pane " id="frmbulanan">
                <?php $this->load->view('ftransaksi/frmbulanan'); ?>
				</div><!-- /.tab-pane -->
				<div class="tab-pane" id="frmmingguan">
				<?php $this->load->view('ftransaksi/frmmingguan'); ?>
				</div><!-- /.tab-pane -->
				<div class="tab-pane" id="frmharian">
				<?php $this->load->view('ftransaksi/frmharian'); ?>
				</div><!-- /.tab-pane -->
				
            </div><!-- /.tab-content -->
		</div><!-- nav-tabs-custom -->
	</div><!-- /.col -->
</div><!-- /.row-->