<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<div class="error-container">
									<div class="well">
										<h1 class="grey lighter smaller">
											<span class="blue bigger-125">
												<i class="ace-icon fa  fa-cloud-upload"></i>
												Restore
											</span>
											Database 
										</h1>

										<hr />
										<h3 class="lighter smaller">
											Keterangan :											
										</h3>

										<div class="space"></div>

										<div >										
										<h5 class=" smaller">
										<ul>
											<li>Pastikan untuk benar-benar akan merestore database, karena jika sudah ter restore maka database yang lama akan ter-replace</b>
											<li>File yang diupload adalah file hasil backup dari aplikasi ini</b>
											<li>Ekstrak file .zip hingga menjadi file berakhiran .sql</b>
											<li>Pilih file berakhiran .sql tersebut, lalu klik tombol <b>"Restore"</b>
											<li>Tunggu proses sampai selesai
										</ul>
										</h5>
										</div>
										


<div id="errorHandler" class="alert alert-danger no-display"></div>
<?php 
echo form_open_multipart('dbtools/dorestore',array('class'=>'form-horizontal','id'=>'myformkel'));
?>									
									<div class="widget-box" >
												<div class="widget-header">
													<h4 class="widget-title">Restore File Input</h4>

													<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</div>
												</div>

												<div class="widget-body" style="height:100px">
													<div class="widget-main">
														<div class="form-group">
															<div class="col-xs-12">
															<?=form_upload(array('name'=>'inputfile','id'=>'inputfile','class'=>'form-control'));?>
															</div>
														</div>

													</div>
												</div>
											</div>


										<hr />
										<div class="space"></div>

										<div class="center">
											<a href="javascript:history.back()" class="btn btn-grey">
												<i class="ace-icon fa fa-arrow-left"></i>
												Go Back
											</a>
											<button type="submit" class="btn btn-primary" id="btrestore">
												<i class="ace-icon fa fa-cloud-upload bigger-120 white"></i>
												Restore
											</button>											
										</div>
								
<?php echo form_close();?>  

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->

<script type="text/javascript">
$('#inputfile').ace_file_input({
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







</script>