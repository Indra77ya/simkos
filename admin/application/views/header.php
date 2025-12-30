<?
$setMenu=$this->config->item('mymenu');
$setSubMenu=$this->config->item('mysubmenu');
$role=$this->session->userdata('auth')->ROLE;
$qryNotifYearly=$this->common_model->getUnpaidNotif("Tahunan");
$yearUnpaidNotif=$qryNotifYearly->num_rows();
$qryNotifMonthly=$this->common_model->getUnpaidNotif("Bulanan");
$monthUnpaidNotif=$qryNotifMonthly->num_rows();
$qryNotifWeekly=$this->common_model->getUnpaidNotif("Mingguan");
$weekUnpaidNotif=$qryNotifWeekly->num_rows();
$qryNotifDayly=$this->common_model->getUnpaidNotif("Harian");
$dayUnpaidNotif=$qryNotifDayly->num_rows();

$resDaily=$qryNotifDayly->result();
$resMonthly=$qryNotifMonthly->result();
$resWeekly=$qryNotifWeekly->result();
$resYearly=$qryNotifYearly->result();
$total=$monthUnpaidNotif+$yearUnpaidNotif+$weekUnpaidNotif+$dayUnpaidNotif;
?>
<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container" >
				<div class="navbar-header pull-left">
					<a href="<?php echo base_url();?>" class="navbar-brand">
						<small>
							SIMKOS
						</small>
					</a>

					<button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
						<span class="sr-only">Toggle user menu</span>

						<?php if (!empty($this->session->userdata('auth')->FOTO)) { ?>
						<img class="nav-user-photo" src="<?php echo base_url('assets/images/avatars/'.$this->session->userdata('auth')->FOTO);?>" alt="<?php echo $this->session->userdata('auth')->NAMA."'s Photo"?>" />
						<?php } ?>
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $this->session->userdata('auth')->NAMA?>
								</span>
					</button>

					<button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
						<span class="sr-only">Toggle sidebar</span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation" >


					<ul class="nav ace-nav" >
						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important"><?php echo ($total>0?$total:"")?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
						<?php if ($dayUnpaidNotif>0) { ?>
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									<?php echo $dayUnpaidNotif ?> tenant harian belum bayar
								</li>
							<?php foreach($resDaily as $resD){ ?>
								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-exclamation-triangle"></i>
														<?php echo '<a href="'.base_url('e_pembayaran/form_entri/Harian_'.$resD->idpendaftaran.'_'.$resD->idlokasi).'"><B>'.$resD->nama.'</B></a>'?>
													</span>
													<span class="pull-right badge badge-info"><?php echo $resD->nmkamar ?></span>
												</div>
											</a>
										</li>										
									</ul>
								</li>
							<?php } ?>
						<?php } ?>
						<?php if ($weekUnpaidNotif>0) { ?>
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									<?php echo $weekUnpaidNotif ?> tenant mingguan belum bayar
								</li>
							<?php foreach($resWeekly as $resW){ ?>
								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-exclamation-triangle"></i>
														<?php echo '<a href="'.base_url('e_pembayaran/form_entri/Mingguan_'.$resW->idpendaftaran.'_'.$resW->idlokasi).'"><B>'.$resW->nama.'</B></a>'?>
													</span>
													<span class="pull-right badge badge-info"><?php echo $resW->nmkamar?></span>
												</div>
											</a>
										</li>										
									</ul>
								</li>
							<?php } ?>
						<?php } ?>
						<?php if ($monthUnpaidNotif>0) { ?>
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									<?php echo $monthUnpaidNotif ?> tenant bulanan belum bayar
								</li>
							<?php foreach($resMonthly as $resM){ ?>
								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-exclamation-triangle"></i>
														<?php echo '<a href="'.base_url('e_pembayaran/form_entri/Bulanan_'.$resM->idpendaftaran.'_'.$resM->idlokasi).'"><b>'.$resM->nmpenghuni.'</b></a>'?>
													</span>
													<span class="pull-right badge badge-info"><?php echo $resM->nmkamar?></span>
												</div>
											</a>
										</li>										
									</ul>
								</li>
							<?php } ?>
						<?php } ?>
								
								<?php if ($yearUnpaidNotif>0) { ?>
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									<?php echo $yearUnpaidNotif ?> tenant tahunan belum bayar
								</li>
							<?php foreach($resYearly as $resY){ ?>
								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-exclamation-triangle"></i>
														<?php echo '<a href="'.base_url('e_pembayaran/form_entri/Tahunan_'.$resY->IDPENDAFTARAN.'_'.$resY->IDLOKASI).'"><B>'.$resY->nmpenghuni.'</B></a>'?>
													</span>
													<span class="pull-right badge badge-info"><?php echo $resY->nmkamar?></span>
												</div>
											</a>
										</li>										
									</ul>
								</li>
							<?php } ?>
						<?php } ?>
							</ul>
						</li>


						<li class="light-blue dropdown-modal ">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<?php if (!empty($this->session->userdata('auth')->FOTO)) { ?>
								<img class="nav-user-photo" src="<?php echo base_url('assets/images/avatars/'.$this->session->userdata('auth')->FOTO);?>" alt="<?php echo $this->session->userdata('auth')->NAMA."'s Photo"?>" />
								<?php } ?>
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $this->session->userdata('auth')->NAMA?>
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<!--<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>-->

								<? if ($this->session->userdata('auth')->ROLE == "Admin" || $this->session->userdata('auth')->ROLE == "Superadmin") { ?>
								<!--<li>
									<?php echo anchor('pengguna/index','<i class="ace-icon fa fa-user"></i>Profile');?>									
								</li>-->
<!--								<li class="divider"></li>-->
								<?}?>
								

								<li>
									<a href="<?php echo base_url('dashboard/logout');?>"><i class="ace-icon fa fa-power-off"></i>Logout</a>
									
								</li>
							</ul>
						</li>
					</ul>
				</div>

				<nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="ace-icon fa fa-cogs bigger-110"></i>
								Pusat Data&nbsp;
								<b class="arrow fa fa-angle-down"></b>
							</a>

							<ul class="dropdown-menu dropdown-light-blue dropdown-caret">
							<?php if ($role=="Superadmin" ){ ?>
								<li class="<?=($setSubMenu=="mn112"?"active":'')?>"><?php echo anchor('setting/owner','<i class="ace-icon fa fa-caret-right bigger-110 blue bigger-110 blue"></i>Owner Profil');?></li>
								<li class="<?=($setSubMenu=="mn112"?"active":'')?>"><?php echo anchor('pengguna/index','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Pengguna');?></li>
								<li class="<?=($setSubMenu=="mn112"?"active":'')?>"><?php echo anchor('lokasi/index','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Lokasi Kos');?></li>
								<li class="<?=($setSubMenu=="mn112"?"active":'')?>"><?php echo anchor('setting/email','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>E-mail Setting');?></li>
								<li class="<?=($setSubMenu=="mn13"?"active":"")?>">
								<?php echo anchor('kamar/index','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Kamar');?>
								
							    </li>
							<? } ?>
							<li class="<?=($setSubMenu=="mn112"?"active":'')?>">
								<?php echo anchor('pengguna/penghuni','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Login Penghuni');?>								
							</li>							
							
							<li class="<?=($setSubMenu=="mn15"?"active":"")?>">
								<?php echo anchor('denda/index','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Denda');?>								
							</li>
							<li class="<?=($setSubMenu=="mn16"?"active":"")?>">
								<?php echo anchor('rekening/index','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Info Rekening');?>								
							</li>
							<li class="<?=($setSubMenu=="mn18"?"active":"")?>">
								<?php echo anchor('setting/receipt_var','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Setting Pernyataan');?>								
							</li>
							<li class="<?=($setSubMenu=="mn19"?"active":"")?>">
								<?php echo anchor('setting/kwh_listrik','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Variabel Kwh PLN');?>								
							</li>
							<li class="<?=($setSubMenu=="mn14"?"active":"")?>">
								<?php echo anchor('biaya_tambahan/index','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Biaya Tambahan Kamar');?>								
							</li>
							<li class="<?=($setSubMenu=="mn17"?"active":"")?>">
								<?php echo anchor('jenis_rutin/index','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Jenis Pengeluaran Rutin');?>								
							</li>
							</ul>
						</li>
						
						<li >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="ace-icon fa fa-envelope-o"></i>

							<span class="menu-text">Pesan</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						
						<ul class="dropdown-menu dropdown-light-blue dropdown-caret">
							<li class="<?=($setSubMenu=="mn81"?"active":"")?>">								
								<?php echo anchor('email/inbox','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Pesan Masuk');?>
								
							</li>
							<?php if ($role=="Admin" || $role=="Superadmin"){ ?>
							<!--<li class="<?=($setSubMenu=="mn82"?"active":"")?>">								
								<?php echo anchor('email/index','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Kirim E-mail');?>
								
							</li>-->
							<?php } ?>
						</ul>
					</li>


					<!--<li >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="ace-icon fa 	fa-download"></i>

							<span class="menu-text">Database Tools</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						
						<ul class="dropdown-menu dropdown-light-blue dropdown-caret">
							<li class="<?=($setSubMenu=="mn71"?"active open":"")?>" >
								<?php echo anchor('dbtools/backup','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Back Up');?>
									
							</li>
							<?php if ($role=="Superadmin"){ ?>
							<li class="<?=($setSubMenu=="mn72"?"active open":"")?>" >
								<?php echo anchor('dbtools/restore','<i class="ace-icon fa fa-caret-right bigger-110 blue"></i>Restore');?>
									
							</li>
							<?php } ?>
						</ul>
					</li>-->
					<li>
						<?php echo anchor('dashboard/eula','<i class="ace-icon fa 	fa-gavel"></i> <span class="menu-text"> EULA</span>','class="ajax-link"');?>
						

					</li>					
					
						
					</ul>

					
				</nav>
			</div><!-- /.navbar-container -->
		</div>