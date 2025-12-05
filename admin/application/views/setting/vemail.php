<div id="errorHandler" class="alert alert-danger no-display"></div>

<?php echo form_open_multipart('',array('class'=>'form-horizontal','id'=>'myform'));?>

<div class="row">
      <div class="col-lg-10">
        <div class="widget-box">
          <div class="widget-header">  <h3 class="widget-title">Kirim Email</h3></div>
          <div class="widget-body">
			<div class="widget-main">
				<div class="row form-group ">
						<label class="control-label col-sm-4 ">Tipe Email :</label>
						<div class="col-sm-8">
						<?php echo form_dropdown('opsi',array('1'=>'Email Tunggal', '2'=>'Email Massal'),'','id="opsi" class="form-control  "');					
				?>
						 </div>
					 </div>
				
			<div class="form-group " id="single_mail" >
              <label class="control-label col-sm-4 ">Penerima (Nama) :</label>			 
              <div class="col-sm-8  form-inline">
				 <?=form_input(array('name'=>'nama','id'=>'nama','class'=>'form-control '));?>
				 <?=form_input(array('name'=>'email_addr','id'=>'email_addr','class'=>'form-control '));?>
				 <input type="hidden" name="nim" id="nim"><input type="hidden" name="id" id="id">
              </div>
            </div>

			<div class="no-display" id="mass_mail" >
				<div class="form-group">
				<label class="control-label col-sm-4 ">Jenis Sewa :</label>
				<div class="col-sm-4"  >
					  <?=form_dropdown('jenis',array("Tahunan"=>"Tahunan","Bulanan"=>"Bulanan", "Mingguan"=>"Mingguan", "Harian"=>"Harian"),'','id="jenis" class="form-control"');?>				 
				</div>			
				</div>			
            </div>

			<div class="form-group">
					<label class="control-label col-sm-4 ">Subject :</label>
					<div class="col-sm-8">
					<?=form_input(array('name'=>'title','id'=>'title','class'=>'form-control',' placeholder'=>'Title'));?>
				  </div>
			</div>

			<div class="form-group">
              <label class="control-label col-sm-4 ">Message :</label>
              <div class="col-sm-8">
			  <?php echo form_textarea(array('name'=>'content','id'=>'content','class'=>'form-control', 'rows'=>5, 'cols'=>45));?>
              </div>
            </div>	
			
			
			<div class="form-group">
              <label class="control-label col-sm-4 ">Attachment:</label>
              <div class="col-sm-8">
			  <?php echo form_upload(array('name'=>'attachfile','id'=>'attachfile','class'=>'form-control '));?>
			  <!-- <input type="text" name="urlfile" id="urlfile"> -->
              </div>
            </div>


			 <div class="form-actions">				
				<input type="button" class="btn btn-primary" id="btsend" value="Kirim Email" >				
            </div>
			<div class="row">
			<div class="col-md-6">&nbsp;<br>
				<div class="progress no-display">
					<div class="progress-bar" id="progressBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
					0%
					</div>
					</div>
				</div>
			</div> 
            
          </div>
        </div>
        </div>
      </div>
    </div>

<?php echo form_close();?>  

<script>
    $(document).ready(function() {
			$('#btsend').attr('disabled', 'disabled');

		});
	$('#btsend').click(function(e){
		var form = $('#myform')[0]; // You need to use standard javascript object here
		var formData = new FormData(form);
		var importFiles = $('#attachfile')[0].files;
        formData.append('attachfile', importFiles);

		e.preventDefault();
		$().showMessage('Sedang diproses.. Harap tunggu..');
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("email/sendProcess");?>',
			data: formData,				
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function(msg) {
				 $("#errorHandler").html('&nbsp;').hide();
				 console.log(msg);
				if(msg.status =='success'){
					$().showMessage('Email Berhasil dikirim.','success',1000);
					
				} else {
					$().showMessage('Terjadi kesalahan. Email gagal dikirim.','danger',700);
					$("#errorHandler").html(msg.errormsg).show();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan."+	textStatus + " - " + errorThrown );
			},
			cache: false
		});

		

	});
	$('#opsi').change(function(){
		if($(this).val()=="1"){
			$("#single_mail").fadeSlide("show");
			$("#mass_mail").fadeSlide("hide");
			$('#btsend').attr('disabled', 'disabled');
		}else{
			$("#single_mail").fadeSlide("hide");
			$("#mass_mail").fadeSlide("show");
			$('#btsend').removeAttr('disabled');
		}
	});


	$("#nama").autocomplete({
	minLength: 2,
	source:
	function(req, add){
		$.ajax({
			url: "<?php echo base_url('email/getRecipient'); ?>",
			dataType: 'json',
			type: 'POST',
			data: req,
			success:   
			function(data){
				if(data.response =="true"){
					add(data.message);
				}
			}
		});
	},
	select:
	function(event, ui) {                   
		$("#id").val(ui.item.id);  
		$("#nim").val(ui.item.nim);  
		$("#email_addr").val(ui.item.email); 
		if (ui.item.email != "")
		{
			$('#btsend').removeAttr('disabled');
		}
	
	}
});


    </script>