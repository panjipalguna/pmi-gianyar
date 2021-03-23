var base_url = window.location + "/";

$(document).ready(function() {
  generateTable();

  $("#btnSave").click(function(){
    doSave();
  });
});

function generateTable()
{   
  var where = "";      
  
                  var txtdonorjeniskelaminfilter = $("#txtdonorjeniskelaminfilter").val();
                  if(txtdonorjeniskelaminfilter != "") {
                    if(where == "") {
                      where = "donor_jenis_kelamin = '"+txtdonorjeniskelaminfilter+"'";
                    }
                    else {
                      where += " and donor_jenis_kelamin = '"+txtdonorjeniskelaminfilter+"'";                    
                    }
                  }
                
                  var txtdonorkelurahanfilter = $("#txtdonorkelurahanfilter").val();
                  if(txtdonorkelurahanfilter != "") {
                    if(where == "") {
                      where = "donor_kelurahan = '"+txtdonorkelurahanfilter+"'";
                    }
                    else {
                      where += " and donor_kelurahan = '"+txtdonorkelurahanfilter+"'";                    
                    }
                  }
                
                  var txtdonorkecamatanfilter = $("#txtdonorkecamatanfilter").val();
                  if(txtdonorkecamatanfilter != "") {
                    if(where == "") {
                      where = "donor_kecamatan = '"+txtdonorkecamatanfilter+"'";
                    }
                    else {
                      where += " and donor_kecamatan = '"+txtdonorkecamatanfilter+"'";                    
                    }
                  }
                
                  var txtdonorwilayahfilter = $("#txtdonorwilayahfilter").val();
                  if(txtdonorwilayahfilter != "") {
                    if(where == "") {
                      where = "donor_wilayah = '"+txtdonorwilayahfilter+"'";
                    }
                    else {
                      where += " and donor_wilayah = '"+txtdonorwilayahfilter+"'";                    
                    }
                  }
                
                  var txtdonorpekerjaanfilter = $("#txtdonorpekerjaanfilter").val();
                  if(txtdonorpekerjaanfilter != "") {
                    if(where == "") {
                      where = "donor_pekerjaan = '"+txtdonorpekerjaanfilter+"'";
                    }
                    else {
                      where += " and donor_pekerjaan = '"+txtdonorpekerjaanfilter+"'";                    
                    }
                  }
                
                  var txtdonorpenghargaanfilter = $("#txtdonorpenghargaanfilter").val();
                  if(txtdonorpenghargaanfilter != "") {
                    if(where == "") {
                      where = "donor_penghargaan = '"+txtdonorpenghargaanfilter+"'";
                    }
                    else {
                      where += " and donor_penghargaan = '"+txtdonorpenghargaanfilter+"'";                    
                    }
                  }
                
                  var txtdonorpuasafilter = $("#txtdonorpuasafilter").val();
                  if(txtdonorpuasafilter != "") {
                    if(where == "") {
                      where = "donor_puasa = '"+txtdonorpuasafilter+"'";
                    }
                    else {
                      where += " and donor_puasa = '"+txtdonorpuasafilter+"'";                    
                    }
                  }
                
                  var txtdonorbutuhfilter = $("#txtdonorbutuhfilter").val();
                  if(txtdonorbutuhfilter != "") {
                    if(where == "") {
                      where = "donor_butuh = '"+txtdonorbutuhfilter+"'";
                    }
                    else {
                      where += " and donor_butuh = '"+txtdonorbutuhfilter+"'";                    
                    }
                  }
                
  var table = $('#tablelist').DataTable( {
    ajax: {
      "url": base_url + "gridview",
      "type": "POST",
      "data" : {'where': where}
    }, 
    processing: true, 
    serverSide: true,
    scrollCollapse: true,
    destroy: true,
    iDisplayLength: 10,
    order: [[ 0, "desc" ]],
    dom: 'Bfrtip',
    buttons: [
        {
            text: '<i class="fa fa-plus"></i> Add New',
            action: function ( e, dt, node, config ) {
                generateModalForm('add', '');
            }
        }
    ]
  });
}



function reloadDatatable()
{
  $('#tablelist').DataTable().ajax.reload();
}

function generateModalForm(state, row_id) {
  $('#modalForm').modal('show');
  $.ajax({
      type: 'post',
      async: true,
      url: base_url + 'form',
      data: {'txtstate': state, 'txtrowid': row_id},
      success: function(ret) {
          var data = JSON.parse(ret); 
          $('#btnSave').show();
          $('#tableModal').html(data['table']);
      }
  });
}

function generateModalView(row_id) {
  $.ajax({
      type: 'post',
      async: true,
      url: base_url + 'view',
      data: {'txtrowid': row_id},
      success: function(ret) {
          var data = JSON.parse(ret); 
          $('#btnSave').hide();
          $('#tableModal').html(data['table']);
          $('#txtdonorjeniskelamin').select2();$('#txtdonorkelurahan').select2();$('#txtdonorkecamatan').select2();$('#txtdonorwilayah').select2();$('#txtdonorpekerjaan').select2();$('#txtdonorpenghargaan').select2();$('#txtdonorpuasa').select2();$('#txtdonorbutuh').select2();
      }
  });
}

function doSave(){

  var formData = new FormData($('.formInput')[0]);

  var txtdonorid = $('#txtdonorid').val(); 
var txtdonornoktp = $('#txtdonornoktp').val(); 
var txtdonornama = $('#txtdonornama').val(); 
var txtdonorjeniskelamin = $('#txtdonorjeniskelamin').val(); 
var txtdonortelepon = $('#txtdonortelepon').val(); 
var txtdonorkelurahan = $('#txtdonorkelurahan').val(); 
var txtdonorkecamatan = $('#txtdonorkecamatan').val(); 
var txtdonorwilayah = $('#txtdonorwilayah').val(); 
var txtdonoralamat = $('#txtdonoralamat').val(); 
var txtdonorpekerjaan = $('#txtdonorpekerjaan').val(); 
var txtdonortempatlahir = $('#txtdonortempatlahir').val(); 
var txtdonortanggallahir = $('#txtdonortanggallahir').val(); 
var txtdonorpenghargaan = $('#txtdonorpenghargaan').val(); 
var txtdonorpuasa = $('#txtdonorpuasa').val(); 
var txtdonorbutuh = $('#txtdonorbutuh').val(); 
var txtdonortanggal = $('#txtdonortanggal').val(); 

  if(txtdonorid == '') {infoStatus('Donor must be filled', 0); exit();}if(txtdonornoktp == '') {infoStatus('No KTP must be filled', 0); exit();}if(txtdonornama == '') {infoStatus('Nama Lengkap must be filled', 0); exit();}if(txtdonorjeniskelamin == '') {infoStatus('Jenis Kelamin must be filled', 0); exit();}if(txtdonortelepon == '') {infoStatus('No Telepon must be filled', 0); exit();}if(txtdonorkelurahan == '') {infoStatus('Kelurahan must be filled', 0); exit();}if(txtdonorkecamatan == '') {infoStatus('Kecamatan must be filled', 0); exit();}if(txtdonorwilayah == '') {infoStatus('Wilayah must be filled', 0); exit();}if(txtdonoralamat == '') {infoStatus('Alamat must be filled', 0); exit();}if(txtdonorpekerjaan == '') {infoStatus('Pekerjaan must be filled', 0); exit();}if(txtdonortempatlahir == '') {infoStatus('Tempat Lahir must be filled', 0); exit();}if(txtdonortanggallahir == '') {infoStatus('Tanggal Lahir must be filled', 0); exit();}if(txtdonorpenghargaan == '') {infoStatus('Penghargaan must be filled', 0); exit();}if(txtdonorpuasa == '') {infoStatus('Puasa must be filled', 0); exit();}if(txtdonorbutuh == '') {infoStatus('Kebutuhan must be filled', 0); exit();}if(txtdonortanggal == '') {infoStatus('Tanggal Donor must be filled', 0); exit();}

  $("#btnSave").html("Loading...");

  $.ajax({
    type: 'post',
      async: true,
    url: base_url + 'save',
    data: formData,
    mimeType: "multipart/form-data",
    contentType: false,
    cache: false,
    processData: false,
    success: function(ret) {
      var data = JSON.parse(ret); 
      $('#modalForm').modal('hide');
      $("#btnSave").html("SAVE");
      reloadDatatable();
      infoStatus(data['msg'], data['type']);
    }
  });
}

function doDelete(row_id) {
  bootbox.confirm({
    message: "<span class='alert-txt'><i class='fa fa-question-circle'></i>&nbsp;&nbsp;  Are you sure?<span>",
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
      if(result == true) {
        $.ajax({
            type: 'post',
            async: false,
            url: base_url + 'delete',
            data: {'txtrowid': row_id},
            success: function(ret) {
              var data = JSON.parse(ret); 
              reloadDatatable();
              infoStatus(data['msg'], data['type']);
            }
        });
      }
    }
  });
}