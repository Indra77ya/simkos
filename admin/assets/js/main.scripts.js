$(document).ready(function(){
	$('#myform input').keydown(function(event) {
		if(event.keyCode == 13) {
		  event.preventDefault();
		  return false;
		}
	});
});
$(document).ready(function(){
	$('#yourform input').keydown(function(event) {
		if(event.keyCode == 13) {
		  event.preventDefault();
		  return false;
		}
	});
});

$.fn.dataTableExt.oApi.fnReloadAjax = function ( oSettings, sNewSource, fnCallback, bStandingRedraw )
{
    // DataTables 1.10 compatibility - if 1.10 then versionCheck exists.
    // 1.10s API has ajax reloading built in, so we use those abilities
    // directly.
    if ( $.fn.dataTable.versionCheck ) {
        var api = new $.fn.dataTable.Api( oSettings );
 
        if ( sNewSource ) {
            api.ajax.url( sNewSource ).load( fnCallback, !bStandingRedraw );
        }
        else {
            api.ajax.reload( fnCallback, !bStandingRedraw );
        }
        return;
    }
 
    if ( sNewSource !== undefined && sNewSource !== null ) {
        oSettings.sAjaxSource = sNewSource;
    }
 
    // Server-side processing should just call fnDraw
    if ( oSettings.oFeatures.bServerSide ) {
        this.fnDraw();
        return;
    }
 
    this.oApi._fnProcessingDisplay( oSettings, true );
    var that = this;
    var iStart = oSettings._iDisplayStart;
    var aData = [];
 
    this.oApi._fnServerParams( oSettings, aData );
 
    oSettings.fnServerData.call( oSettings.oInstance, oSettings.sAjaxSource, aData, function(json) {
        /* Clear the old information from the table */
        that.oApi._fnClearTable( oSettings );
 
        /* Got the data - add it to the table */
        var aData =  (oSettings.sAjaxDataProp !== "") ?
            that.oApi._fnGetObjectDataFn( oSettings.sAjaxDataProp )( json ) : json;
 
        for ( var i=0 ; i<aData.length ; i++ )
        {
            that.oApi._fnAddData( oSettings, aData[i] );
        }
         
        oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
 
        that.fnDraw();
 
        if ( bStandingRedraw === true )
        {
            oSettings._iDisplayStart = iStart;
            that.oApi._fnCalculateEnd( oSettings );
            that.fnDraw( false );
        }
 
        that.oApi._fnProcessingDisplay( oSettings, false );
 
        /* Callback user function - for event handlers etc */
        if ( typeof fnCallback == 'function' && fnCallback !== null )
        {
            fnCallback( oSettings );
        }
    }, oSettings );
};

$.fn.showMessage = function(str,mode,hide)
{
	if (!mode) mode='success';
	if ($('#loading').length==0){
	$('<div/>').attr({
		'class': "modal fade",
		'id': "loading",
		'tabindex': "-1",
		'role': "dialog",
		'aria-labelledby': "myloading",
		'aria-hidden': "true"
	})
	.html('<div class="modal-dialog">' +
		'<div class="modal-content">' +
		'<div class="modal-body alert-'+  mode +'">' +
		'</div>' +
		'</div>' +
		'</div>')
	.appendTo('body');
	
	}
	
	$('#loading .modal-body').removeClass (function (index, css) {
		return (css.match (/\balert-\S+/g) || []).join(' ');
	})
	.addClass('alert-'+mode)
	.html(str);
	$('#loading').modal('show');
	
	if (hide!=undefined) {
		window.setTimeout(function(){
			$('#loading').modal('hide');
		}, hide);
	}
}


$.fn.saveForm = function(url,redirect)
{ 
	var data = $(this).serializeObject();
	$().showMessage('Processing.. Please wait','info');
	
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        dataType: 'json',
        success: function(msg) {
			$().showMessage('','info',1);
            $("#errorHandler").html('&nbsp;').hide();
            if(msg.status =='success'){
                $("#loading").fadeOut();
				//$().showMessage('Data berhasil disimpan.','success');
				
				bootbox.alert("Data berhasil disimpan.", function() {
					if (!redirect=='') {
						window.location.replace(redirect);
					} else {
						window.location.reload();
					}
				});
            } else {
               // $().showMessage('Terjadi kesalahan. Data gagal disimpan.','danger');
				bootbox.alert("Terjadi kesalahan. Data gagal disimpan.");
                $("#errorHandler").html(msg.errormsg).show();
            }
        },
        complete: function(msg){
            $('html,body').animate({
                scrollTop: $('#page-wrapper').offset().top
            }, 500);
			//$('body').scrollTop();
			//console.log('scrollTop');
            return false;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            $("#errorHandler").html('&nbsp;');
            $().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger');
        },
        cache: false
    });
	
}

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

function btback(){
	location.history.back();
	return false;
}



function approve(obj){
	bootbox.confirm("Anda yakin menyetujui data ini?", function(result) {
		if (result==true){
			if($('#myModal').hasClass('in')){
				$('#myModal').modal('hide');
			}
			$().showMessage('Sedang diproses.. Harap tunggu..','info');
			$.ajax({
				type: 'POST',
				url: $(obj).attr('data-url'),
				data: {approve:'true',notrans:$(obj).attr('data-id')},
				dataType: 'json',
				success: function(msg) {
					if(msg.status =='success'){
						$("#loading").fadeOut();
						$().showMessage('Data berhasil disimpan.','success',2000);
						$('#loading').on('hidden.bs.modal', function () {
							//alert(msg.sts);
							//window.location.reload();
							$('#dataTables').dataTable().fnReloadAjax();
						});
					} else {
						$().showMessage('Terjadi kesalahan. Data gagal disimpan.','danger',2000);
					}
				},
				complete: function(msg){
					$('html').animate({
						scrollTop: $('#page-wrapper').offset().top
					}, 500);
					
					return false;
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger',2000);
				},
				cache: false
			});
		}
	});
}



$.fn.fadeSlide = function(state,speed){
	if(!state) state = "toggle";
	if (!speed) speed = "normal";
	this.animate({"height": state, "opacity": state},speed);
}

$.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}




function backTo(url){
	bootbox.confirm("Anda yakin akan meninggalkan halaman ini?", function(result) {
		if (result==true){window.location.replace(url);}
	});
}

function bayarTagihan(obj){
	var base_url=$(obj).attr('data-base');
	var form_data = $('#myform').serialize();
	//alert(base_url);
	//alert($(obj).attr('data-url'));
	bootbox.confirm("Anda yakin meneruskan pembayaran ini?", function(result) {
		if (result==true){
			if($('#myModal').hasClass('in')){
				$('#myModal').modal('hide');
			}
			$().showMessage('Sedang diproses.. Harap tunggu..','info');
			$.ajax({
				type: 'POST',
				url: $(obj).attr('data-url'),
				data: form_data,
				dataType: 'json',
				success: function(msg) {
					if(msg.status =='success'){
						$("#loading").fadeOut();
						$().showMessage('Data berhasil disimpan.','success',1000);
						$('#loading').on('hidden.bs.modal', function () {
							//alert(msg.status);
							window.location.reload();
						});
					} else {
						$().showMessage('Terjadi kesalahan. Data gagal disimpan.','danger',2000);
					}
				},
				complete: function(msg){
					$('html').animate({
						scrollTop: $('#content-header').offset().top
					}, 500);
					
					return false;
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger',2000);
				},
				cache: false
			});
		}
	});
}


function print_down(obj){
	bootbox.confirm("Anda yakin mendownload data ini?", function(result) {
		if (result==true){
			if($('#myModal').hasClass('in')){
				$('#myModal').modal('hide');
			}
			$().showMessage('Sedang diproses.. Harap tunggu..','info');
			$.ajax({
				type: 'GET',
				url: $(obj).attr('data-url'),
				data: {param : $(obj).attr('data-id')},
				dataType: 'json',
				success: function(data) {
					$("#loading").fadeOut();
					$().showMessage('Slip berhasil Didownload.','success',2000);					
				},
				complete: function(data){
					$('html').animate({
						scrollTop: $('#page-wrapper').offset().top
					}, 500);
					
					return false;
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$().showMessage('Terjadi kesalahan.<br />'+	textStatus + ' - ' + errorThrown ,'danger',2000);
				},
				cache: false
			});
		}
	});
}

function numericVal(object, evt) {
		evt = (evt) ? evt : window.event
		var chr = (evt.charCode) ? evt.charCode : evt.keyCode	
		return !(chr > 31 && (chr < 48 || chr > 57) )
	}
function blurObj(obj) {
	$(obj).val($(obj).unmask());
}

function clickObj(obj) {
	$(obj).priceFormat({
                    prefix: '',
                    centsSeparator: ',',
                    thousandsSeparator: '.',
					centsLimit: 0
    });	
}

//override dialog's title function to allow for HTML titles
				$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
					_title: function(title) {
						var $title = this.options.title || '&nbsp;'
						if( ("title_html" in this.options) && this.options.title_html == true )
							title.html($title);
						else title.text($title);
					}
				}));
function addRowThn(tName){	
	var tbl = document.getElementById(tName);
  var lastRow = tbl.rows.length;
 
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow-1;
 // alert(lastRow);
 // alert(iteration);
  var row = tbl.insertRow(lastRow);  
  row.setAttribute('valign','top'); 
  // left cell
  var cell1 = row.insertCell(0);
  var textNode = document.createTextNode((iteration+1));
  cell1.appendChild(textNode);
  
	//get options off old select element
	var first = document.getElementById('cbJnsBiayaThn_0');
	var foptions = first.innerHTML;

   // jns koleksi select cell
  var cell2 = row.insertCell(1);
  var sel = document.createElement('select');
  sel.name = 'cbJnsBiayaThn' + iteration;
  sel.id = 'cbJnsBiayaThn' + iteration;
  //sel.class="form-control";
  sel.innerHTML=foptions;
  sel.setAttribute("onChange","displayTarifThn(this,"+iteration+")");
  sel.setAttribute("class","form-control");
  cell2.appendChild(sel);
  //alert(sel.name);
  // tarif cell
  var cell3 = row.insertCell(2);
  var el1 = document.createElement('input');
  el1.type = 'text';
  el1.name = 'txtTarifThn_' + iteration;
  el1.id = 'txtTarifThn_' + iteration;
  //el1.class="form-control";
  el1.value = '0';
  el1.size = 15;
  el1.setAttribute("readonly", true);
  el1.setAttribute("class","form-control");
  //el1.onkeypress = getKoleksi(event,el1,iteration);
  cell3.appendChild(el1);

//alert(gobj("jmlRow").value);
var jum=parseInt(document.getElementById("jmlRowThn").value);
document.getElementById("jmlRowThn").value=jum+1;
}

function addRow(tName){	
var tbl = document.getElementById(tName);
  var lastRow = tbl.rows.length;
 
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow-1;
 // alert(lastRow);
 // alert(iteration);
  var row = tbl.insertRow(lastRow);  
  row.setAttribute('valign','top'); 
  // left cell
  var cell1 = row.insertCell(0);
  var textNode = document.createTextNode((iteration+1));
  cell1.appendChild(textNode);
  
	//get options off old select element
	var first = document.getElementById('cbJnsBiaya_0');
	var foptions = first.innerHTML;

   // jns koleksi select cell
  var cell2 = row.insertCell(1);
  var sel = document.createElement('select');
  sel.name = 'cbJnsBiaya_' + iteration;
  sel.id = 'cbJnsBiaya_' + iteration;
  //sel.class="form-control";
  sel.innerHTML=foptions;
  sel.setAttribute("onChange","displayTarif(this,"+iteration+")");
  sel.setAttribute("class","form-control");
  cell2.appendChild(sel);
  //alert(sel.name);
  // tarif cell
  var cell3 = row.insertCell(2);
  var el1 = document.createElement('input');
  el1.type = 'text';
  el1.name = 'txtTarif_' + iteration;
  el1.id = 'txtTarif_' + iteration;
  //el1.class="form-control";
  el1.value = '0';
  el1.size = 15;
  el1.setAttribute("readonly", true);
  el1.setAttribute("class","form-control");
  //el1.onkeypress = getKoleksi(event,el1,iteration);
  cell3.appendChild(el1);

//alert(gobj("jmlRow").value);
var jum=parseInt(document.getElementById("jmlRow").value);
document.getElementById("jmlRow").value=jum+1;

//alert(document.getElementById("jmlRow").value);
}

function addRow_mgg(tName){	
var tbl = document.getElementById(tName);
  var lastRow = tbl.rows.length;
 
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow-1;
 // alert(lastRow);
 // alert(iteration);
  var row = tbl.insertRow(lastRow);  
  row.setAttribute('valign','top'); 
  // left cell
  var cell1 = row.insertCell(0);
  var textNode = document.createTextNode((iteration+1));
  cell1.appendChild(textNode);
  
	//get options off old select element
	var first = document.getElementById('mgg_cbJnsBiaya_0');
	var foptions = first.innerHTML;

   // jns koleksi select cell
  var cell2 = row.insertCell(1);
  var sel = document.createElement('select');
  sel.name = 'mgg_cbJnsBiaya_' + iteration;
  sel.id = 'mgg_cbJnsBiaya_' + iteration;
  //sel.class="form-control";
  sel.innerHTML=foptions;
  sel.setAttribute("onChange","displayTarif_mgg(this,"+iteration+")");
  sel.setAttribute("class","form-control");
  cell2.appendChild(sel);
  //alert(sel.name);
  // tarif cell
  var cell3 = row.insertCell(2);
  var el1 = document.createElement('input');
  el1.type = 'text';
  el1.name = 'mgg_txtTarif_' + iteration;
  el1.id = 'mgg_txtTarif_' + iteration;
  //el1.class="form-control";
  el1.value = '0';
  el1.size = 15;
  el1.setAttribute("readonly", true);
  el1.setAttribute("class","form-control");
  //el1.onkeypress = getKoleksi(event,el1,iteration);
  cell3.appendChild(el1);

//alert(gobj("jmlRow").value);
var jum=parseInt(document.getElementById("jmlRow_mgg").value);
document.getElementById("jmlRow_mgg").value=jum+1;

//alert(document.getElementById("jmlRow").value);
}

function openRoomList(myurl, jenis, idlokasi){		
		$.ajax({
			url: myurl,
			dataType: 'html',
			type: 'POST',
			data: {ajax:'true', jenis:jenis, idlokasi:idlokasi},
			success:
				
				function(data){
					
					var thisBox=bootbox.dialog({
					  onEscape	:true,				 
					  message: data,
					  title: "Daftar Kamar",
					  buttons: {
				
						main: {
						  label: "Tutup",
						  className: "btn-warning",
						  callback: function() {
							console.log("Primary button");
						  }
						}
					  }
					});
					thisBox.attr('id','mydialog');
				}
		});
	}

	function readURL(input,nmfile) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
			$('#'+nmfile)
			.attr('src', e.target.result)
			.width(150)
			.height(200);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}