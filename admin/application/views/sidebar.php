<?
$setMenu=$this->config->item('mymenu');
$setSubMenu=$this->config->item('mysubmenu');
$role=$this->session->userdata('auth')->ROLE;
?>
<div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<?	if ($role=="Superadmin"){ ?>
						<?php echo anchor('kamar/index','<i class="ace-icon fa fa-cogs"></i>', array('class'=>'btn  btn-purple'));?>
						<? } ?>
						<?php echo anchor('e_pendaftaran/index','<i class="ace-icon fa fa-pencil"></i>', array('class'=>'btn btn-info'));?>
						<?php echo anchor('rpt_pembayaran/freceipt','<i class="ace-icon glyphicon  glyphicon-print "></i>', array('class'=>'btn btn-warning'));?>
                        <?	if ($role=="Superadmin"){ ?>						
						<?php echo anchor('rpt_keuangan/laba_rugi','<i class="ace-icon fa fa-signal"></i>', array('class'=>'btn btn-success'));?>
						<? }else{ ?>
						    	<?php echo anchor('rpt_keuangan/pemasukan','<i class="ace-icon fa fa-signal"></i>', array('class'=>'btn btn-success'));?>
						<?php } ?>
						
					</div>

					<!--<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div> /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="hover <?=($setMenu=="mn01"?"active open":"")?>">
						<?php echo anchor('dashboard/index','<i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> Dashboard </span>','class="ajax-link"');?>
						<b class="arrow"></b>
					</li>

					<li class=" hover <?=($setMenu=="mn2"?"active open":"")?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">
								Pendaftaran
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?=($setSubMenu=="mn21"?"active open":"")?> hover">
								<?php echo anchor('e_pendaftaran/index','<i class="menu-icon fa fa-caret-right"></i>Entri');?><b class="arrow"></b>
							</li>
                            <?php if ($role<>"Operator" ){ ?> 
							<li class="<?=($setSubMenu=="mn22"?"active open":"")?> hover">
								<?php echo anchor('e_pendaftaran/editing','<i class="menu-icon fa fa-caret-right"></i>Edit');?>
								<b class="arrow"></b>
							</li>
							<?php } ?>
							
							
							<li class="<?=($setSubMenu=="mn23"?"active open":"")?> hover">
								<?php echo anchor('e_pendaftaran/pindah_kamar','<i class="menu-icon fa fa-caret-right"></i>Pindah Kamar');?>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="<?=($setMenu=="mn3"?"active open":"")?> hover">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-credit-card"></i>
							<span class="menu-text"> Pembayaran </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?=($setSubMenu=="mn31"?"active":"")?>  hover" >
								<?php echo anchor('e_pembayaran/entri','<i class="menu-icon fa fa-caret-right"></i>Entri');?>
								<b class="arrow"></b>
							</li>
                            
							<li class="<?=($setSubMenu=="mn32"?"active":"")?> hover">
								<?php echo anchor('e_pembayaran/editing','<i class="menu-icon fa fa-caret-right"></i>Edit ');?>
								<b class="arrow"></b>
							</li>		
							<li class="<?=($setSubMenu=="mn33"?"active":"")?> hover">
								<?php echo anchor('e_pembayaran/deposit','<i class="menu-icon fa fa-caret-right"></i>Deposit');?>
								<b class="arrow"></b>
							</li>
							<?php if ($role=="Superadmin" ){ ?>
							<li class="<?=($setSubMenu=="mn36"?"active":"")?> hover">
								<?php echo anchor('e_pembayaran/konfirmasi','<i class="menu-icon fa fa-caret-right"></i>Konfirmasi bayar');?>
								<b class="arrow"></b>
							</li>	
							<?php } ?>
							<?php if ($role<>"Operator" ){ ?>
							<li class="<?=($setSubMenu=="mn34"?"active":"")?>  hover">
								<?php echo anchor('e_pembayaran/checkout','<i class="menu-icon fa fa-caret-right"></i>Check Out');?>
								<b class="arrow"></b>
							</li>
							<?php } ?>
						</ul>
					</li>

					<li class="<?=($setMenu=="mn4"?"active open":"")?> hover">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-gift"></i>
							<span class="menu-text"> Pemasukan Lain </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="<?=($setSubMenu=="mn41"?"active":"")?> hover" >
								<?php echo anchor('e_pemasukan/index','<i class="menu-icon fa fa-caret-right"></i>Entri');?>
								<b class="arrow"></b>
							</li>
							<?php if ($role<>"Operator" ){ ?>
							<li class="<?=($setSubMenu=="mn42"?"active":"")?> hover">
								<?php echo anchor('e_pemasukan/editing','<i class="menu-icon fa fa-caret-right"></i>Edit');?>
								<b class="arrow"></b>
							</li>
							<?php } ?>
						</ul>
					</li>

					<li class="<?=($setMenu=="mn5"?"active open":"")?> hover">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon glyphicon  glyphicon-barcode"></i>
							<span class="menu-text"> Pengeluaran </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="<?=($setSubMenu=="mn51"?"active":"")?> hover" >
								<?php echo anchor('e_pengeluaran/rutin','<i class="menu-icon fa fa-caret-right"></i>Rutin');?>
								<b class="arrow"></b>
							</li>

							<li class="<?=($setSubMenu=="mn52"?"active":"")?> hover">
								<?php echo anchor('e_pengeluaran/insidentil','<i class="menu-icon fa fa-caret-right"></i>Insidentil');?>
								<b class="arrow"></b>
							</li>
							<?php if ($role<>"Operator" ){ ?>
							<li class="<?=($setSubMenu=="mn53"?"active":"")?> hover">
								<?php echo anchor('e_pengeluaran/editing','<i class="menu-icon fa fa-caret-right"></i>Edit');?>
								<b class="arrow"></b>
							</li>
							<?php } ?>
						</ul>
					</li>
					
					<li class="<?=($setMenu=="mn6"?"active open":"")?> hover">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon glyphicon  glyphicon-print"></i>

							<span class="menu-text">Laporan</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="<?=($setSubMenu=="mn611" || $setSubMenu=="mn612"?"active open":"")?> hover" >
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text">
										Kamar
									</span>

									<b class="arrow fa fa-angle-down"></b>
								</a>								
								<b class="arrow"></b>
								<ul class="submenu">
									<li class="<?=($setSubMenu=="mn611"?"active":"")?> hover" >
									<?php echo anchor('rpt_kamar/status_kamar','<i class="menu-icon fa fa-caret-right"></i>Status Kamar');?>
									<b class="arrow"></b>
									</li>
									<li class="<?=($setSubMenu=="mn612"?"active":"")?> hover" >
									<?php echo anchor('rpt_kamar/kamar_kosong','<i class="menu-icon fa fa-caret-right"></i>Kamar Kosong');?>
									<b class="arrow"></b>
									</li>									
								</ul>

							</li>
							<li class="<?=($setSubMenu=="mn621" || $setSubMenu=="mn622" || $setSubMenu=="mn623"?"active open":"")?> hover" >
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text">
										Pendaftaran
									</span>

									<b class="arrow fa fa-angle-down"></b>
								</a>								
								<b class="arrow"></b>
								<ul class="submenu">
									<li class="<?=($setSubMenu=="mn621"?"active":"")?> hover" >
									<?php echo anchor('rpt_pendaftaran/laporan','<i class="menu-icon fa fa-caret-right"></i>Laporan Pendaftaran');?>
									<b class="arrow"></b>
									</li>
									<li class="<?=($setSubMenu=="mn622"?"active":"")?> hover" >
									<?php echo anchor('rpt_pendaftaran/status','<i class="menu-icon fa fa-caret-right"></i>Status Penghuni');?>
									<b class="arrow"></b>
									</li>
									<li class="<?=($setSubMenu=="mn623"?"active":"")?> hover" >
									<?php echo anchor('rpt_pendaftaran/cetak','<i class="menu-icon fa fa-caret-right"></i>Cetak Pendaftaran');?>
									<b class="arrow"></b>
									</li>		
								</ul>

							</li>

							<li class="<?=($setSubMenu=="mn631" || $setSubMenu=="mn632" || $setSubMenu=="mn633" || $setSubMenu=="mn634"  || $setSubMenu=="mn635"? "active open":"")?> hover">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text">
										Pembayaran
									</span>

									<b class="arrow fa fa-angle-down"></b>
								</a>								
								<b class="arrow"></b>
								<ul class="submenu">
									<li class="<?=($setSubMenu=="mn631"?"active":"")?> hover" >
									<?php echo anchor('rpt_pembayaran/rekap','<i class="menu-icon fa fa-caret-right"></i>Rekap Bulanan');?>
									<b class="arrow"></b>
									</li>
									<li class="<?=($setSubMenu=="mn635"?"active":"")?> hover" >
									<?php echo anchor('rpt_pembayaran/angsuran','<i class="menu-icon fa fa-caret-right"></i>Cicilan/Belum Lunas');?>
									<b class="arrow"></b>
									</li>
									<li class="<?=($setSubMenu=="mn632"?"active":"")?> hover" >
									<?php echo anchor('rpt_pembayaran/history','<i class="menu-icon fa fa-caret-right"></i>Per Penyewa');?>
									<b class="arrow"></b>
									</li>
									<li class="<?=($setSubMenu=="mn633"?"active":"")?> hover" >
									<?php echo anchor('rpt_pembayaran/notpaid','<i class="menu-icon fa fa-caret-right"></i>Belum Bayar');?>
									<b class="arrow"></b>
									</li>
									<li class="<?=($setSubMenu=="mn634"?"active":"")?> hover" >
									<?php echo anchor('rpt_pembayaran/freceipt','<i class="menu-icon fa fa-caret-right"></i>Cetak Kuitansi');?>
									<b class="arrow"></b>
									</li>
									<li class="<?=($setSubMenu=="mn636"?"active":"")?> hover" >
									<?php echo anchor('rpt_pembayaran/mutasiDepo','<i class="menu-icon fa fa-caret-right"></i>Rekap Mutasi Deposit');?>
									<b class="arrow"></b> 
									</li>
									<li class="<?=($setSubMenu=="mn637"?"active":"")?> hover" >
									<?php echo anchor('rpt_pembayaran/depoFilter','<i class="menu-icon fa fa-caret-right"></i>Mutasi Deposit Penghuni');?>
									<b class="arrow"></b> 
									</li>
								</ul>
	

							</li>
							<li class="<?=($setSubMenu=="mn64"?"active":"")?> hover">
								<?php echo anchor('rpt_keuangan/pemasukan','<i class="menu-icon fa fa-caret-right"></i>Pemasukan Lain');?>
								<b class="arrow"></b>
							</li>
							<li class="<?=($setSubMenu=="mn65"?"active":"")?> hover">
								<?php echo anchor('rpt_keuangan/pengeluaran','<i class="menu-icon fa fa-caret-right"></i>Pengeluaran');?>
								<b class="arrow"></b>
							</li>
							<?php if ($role=="Admin" || $role=="Superadmin"){ ?>
							<li class="<?=($setSubMenu=="mn66"?"active":"")?> hover">
								<?php echo anchor('rpt_keuangan/laba_rugi','<i class="menu-icon fa fa-caret-right"></i>Laba Rugi');?>
								<b class="arrow"></b>
							</li>
							<?php } ?>
						</ul>
					</li>
					
				</ul><!-- /.nav-list -->
			</div>
