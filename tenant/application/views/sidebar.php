<?
$setMenu=$this->config->item('mymenu');
$setSubMenu=$this->config->item('mysubmenu');

?>
<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
					
						<?php echo anchor('profil/data_login','<i class="ace-icon fa fa-key"></i>', array('class'=>'btn  btn-purple'));?>	
						<?php echo anchor('administrasi/index','<i class="ace-icon fa	fa-credit-card "></i>', array('class'=>'btn btn-warning'));?>
						<?php echo anchor('administrasi/history','<i class="ace-icon fa fa-desktop "></i>', array('class'=>'btn btn-info'));?>						
						<?php echo anchor('pesan/index','<i class="ace-icon fa  fa-book"></i>', array('class'=>'btn btn-success'));?>
						
						
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
			
					<li class="<?=($setMenu=="mn01"?"active":"")?>">
						<?php echo anchor('dashboard/index','<i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> Dashboard </span>','class="ajax-link"');?>
						<b class="arrow"></b>
					</li>
			
					<li class="<?=($setMenu=="mn1"?"active open":"")?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cogs"></i>
							<span class="menu-text">
								Data Penghuni
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?=($setSubMenu=="mn11"?"active":'')?>" >
								<?php echo anchor('profil/data_login','<i class="menu-icon fa fa-caret-right"></i>Data Login');?>
								<b class="arrow"></b>
							</li>

							<li class="<?=($setSubMenu=="mn12"?"active":'')?>">
								<?php echo anchor('profil/data_pribadi','<i class="menu-icon fa fa-caret-right"></i>Data Pribadi');?>
								<b class="arrow"></b>
							</li>
							<li class="<?=($setSubMenu=="mn20"?"active":'')?>" >
								<?php echo anchor('profil/data_sewa','<i class="menu-icon fa fa-caret-right"></i>Data Sewa');?>
								<b class="arrow"></b>
							</li>
							</ul>
					</li>
	
					<li class="<?=($setMenu=="mn2"?"active open":"")?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Administrasi </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="<?=($setSubMenu=="mn21"?"active":"")?>" >
								<?php echo anchor('administrasi/index','<i class="menu-icon fa fa-caret-right"></i>Konfirmasi Pembayaran');?>
								<b class="arrow"></b>
							</li>

							<li class="<?=($setSubMenu=="mn22"?"active":"")?>">
								<?php echo anchor('administrasi/history','<i class="menu-icon fa fa-caret-right"></i>History Pembayaran');?>
								<b class="arrow"></b>
							</li>
							
						</ul>
						
					</li>

					
					<li class="<?=($setMenu=="mn3"?"active":"")?>">
						<?php echo anchor('pesan/index','<i class="menu-icon fa fa-envelope-o"></i> <span class="menu-text"> Kirim Saran-Kritik</span>','class="ajax-link"');?>
						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>