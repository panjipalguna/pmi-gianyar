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
                      where = "donor_jeniskelamin = '"+txtdonorjeniskelaminfilter+"'";
                    }
                    else {
                      where += " and donor_jeniskelamin = '"+txtdonorjeniskelaminfilter+"'";                    
                    }
                  }
                
                  var txtdonorstatusfilter = $("#txtdonorstatusfilter").val();
                  if(txtdonorstatusfilter != "") {
                    if(where == "") {
                      where = "donor_status = '"+txtdonorstatusfilter+"'";
                    }
                    else {
                      where += " and donor_status = '"+txtdonorstatusfilter+"'";                    
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
                
                  var txtdonorapharesisfilter = $("#txtdonorapharesisfilter").val();
                  if(txtdonorapharesisfilter != "") {
                    if(where == "") {
                      where = "donor_apharesis = '"+txtdonorapharesisfilter+"'";
                    }
                    else {
                      where += " and donor_apharesis = '"+txtdonorapharesisfilter+"'";                    
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
                
                  var txtdonordokterfilter = $("#txtdonordokterfilter").val();
                  if(txtdonordokterfilter != "") {
                    if(where == "") {
                      where = "donor_dokter = '"+txtdonordokterfilter+"'";
                    }
                    else {
                      where += " and donor_dokter = '"+txtdonordokterfilter+"'";                    
                    }
                  }
                
                  var txtdonordiambilsebanyakfilter = $("#txtdonordiambilsebanyakfilter").val();
                  if(txtdonordiambilsebanyakfilter != "") {
                    if(where == "") {
                      where = "donor_diambilsebanyak = '"+txtdonordiambilsebanyakfilter+"'";
                    }
                    else {
                      where += " and donor_diambilsebanyak = '"+txtdonordiambilsebanyakfilter+"'";                    
                    }
                  }
                
                  var txtdonorkantongfilter = $("#txtdonorkantongfilter").val();
                  if(txtdonorkantongfilter != "") {
                    if(where == "") {
                      where = "donor_kantong = '"+txtdonorkantongfilter+"'";
                    }
                    else {
                      where += " and donor_kantong = '"+txtdonorkantongfilter+"'";                    
                    }
                  }
                
                  var txtdonorpetugasadministrasifilter = $("#txtdonorpetugasadministrasifilter").val();
                  if(txtdonorpetugasadministrasifilter != "") {
                    if(where == "") {
                      where = "donor_petugasadministrasi = '"+txtdonorpetugasadministrasifilter+"'";
                    }
                    else {
                      where += " and donor_petugasadministrasi = '"+txtdonorpetugasadministrasifilter+"'";                    
                    }
                  }
                
                  var txtdonorpetugashbfilter = $("#txtdonorpetugashbfilter").val();
                  if(txtdonorpetugashbfilter != "") {
                    if(where == "") {
                      where = "donor_petugashb = '"+txtdonorpetugashbfilter+"'";
                    }
                    else {
                      where += " and donor_petugashb = '"+txtdonorpetugashbfilter+"'";                    
                    }
                  }
                
                  var txtdonormacamdonorfilter = $("#txtdonormacamdonorfilter").val();
                  if(txtdonormacamdonorfilter != "") {
                    if(where == "") {
                      where = "donor_macamdonor = '"+txtdonormacamdonorfilter+"'";
                    }
                    else {
                      where += " and donor_macamdonor = '"+txtdonormacamdonorfilter+"'";                    
                    }
                  }
                
                  var txtdonormetodefilter = $("#txtdonormetodefilter").val();
                  if(txtdonormetodefilter != "") {
                    if(where == "") {
                      where = "donor_metode = '"+txtdonormetodefilter+"'";
                    }
                    else {
                      where += " and donor_metode = '"+txtdonormetodefilter+"'";                    
                    }
                  }
                
                  var txtdonorgoldarfilter = $("#txtdonorgoldarfilter").val();
                  if(txtdonorgoldarfilter != "") {
                    if(where == "") {
                      where = "donor_goldar = '"+txtdonorgoldarfilter+"'";
                    }
                    else {
                      where += " and donor_goldar = '"+txtdonorgoldarfilter+"'";                    
                    }
                  }
                
                  var txtdonorpetugasaftarfilter = $("#txtdonorpetugasaftarfilter").val();
                  if(txtdonorpetugasaftarfilter != "") {
                    if(where == "") {
                      where = "donor_petugasaftar = '"+txtdonorpetugasaftarfilter+"'";
                    }
                    else {
                      where += " and donor_petugasaftar = '"+txtdonorpetugasaftarfilter+"'";                    
                    }
                  }
                
                  var txtdonorlenganfilter = $("#txtdonorlenganfilter").val();
                  if(txtdonorlenganfilter != "") {
                    if(where == "") {
                      where = "donor_lengan = '"+txtdonorlenganfilter+"'";
                    }
                    else {
                      where += " and donor_lengan = '"+txtdonorlenganfilter+"'";                    
                    }
                  }
                
                  var txtdonorpenusukanulangfilter = $("#txtdonorpenusukanulangfilter").val();
                  if(txtdonorpenusukanulangfilter != "") {
                    if(where == "") {
                      where = "donor_penusukanulang = '"+txtdonorpenusukanulangfilter+"'";
                    }
                    else {
                      where += " and donor_penusukanulang = '"+txtdonorpenusukanulangfilter+"'";                    
                    }
                  }
                
                  var txtdonorlamapengambilanfilter = $("#txtdonorlamapengambilanfilter").val();
                  if(txtdonorlamapengambilanfilter != "") {
                    if(where == "") {
                      where = "donor_lamapengambilan = '"+txtdonorlamapengambilanfilter+"'";
                    }
                    else {
                      where += " and donor_lamapengambilan = '"+txtdonorlamapengambilanfilter+"'";                    
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
          $('#txtdonorjeniskelamin').select2();$('#txtdonorstatus').select2();$('#txtdonorkelurahan').select2();$('#txtdonorkecamatan').select2();$('#txtdonorwilayah').select2();$('#txtdonorpekerjaan').select2();$('#txtdonorapharesis').select2();$('#txtdonorpenghargaan').select2();$('#txtdonorpuasa').select2();$('#txtdonorbutuh').select2();$('#txtdonordokter').select2();$('#txtdonordiambilsebanyak').select2();$('#txtdonorkantong').select2();$('#txtdonorpetugasadministrasi').select2();$('#txtdonorpetugashb').select2();$('#txtdonormacamdonor').select2();$('#txtdonormetode').select2();$('#txtdonorgoldar').select2();$('#txtdonorpetugasaftar').select2();$('#txtdonorlengan').select2();$('#txtdonorpenusukanulang').select2();$('#txtdonorlamapengambilan').select2();
      }
  });
}

function doSave(){

  var formData = new FormData($('.formInput')[0]);

  var txtdonorid = $('#txtdonorid').val(); 
var txtdonornoktp = $('#txtdonornoktp').val(); 
var txtdonornamalengkap = $('#txtdonornamalengkap').val(); 
var txtdonorjeniskelamin = $('#txtdonorjeniskelamin').val(); 
var txtdonorstatus = $('#txtdonorstatus').val(); 
var txtdonoralamatrumah = $('#txtdonoralamatrumah').val(); 
var txtdonornohp = $('#txtdonornohp').val(); 
var txtdonorkelurahan = $('#txtdonorkelurahan').val(); 
var txtdonorkecamatan = $('#txtdonorkecamatan').val(); 
var txtdonorwilayah = $('#txtdonorwilayah').val(); 
var txtdonoralamatkantor = $('#txtdonoralamatkantor').val(); 
var txtdonorpekerjaan = $('#txtdonorpekerjaan').val(); 
var txtdonortempatlahir = $('#txtdonortempatlahir').val(); 
var txtdonorapharesis = $('#txtdonorapharesis').val(); 
var txtdonorpenghargaan = $('#txtdonorpenghargaan').val(); 
var txtdonorpuasa = $('#txtdonorpuasa').val(); 
var txtdonorbutuh = $('#txtdonorbutuh').val(); 
var txtdonorterakhir = $('#txtdonorterakhir').val(); 
var txtdonorke = $('#txtdonorke').val(); 
var txtdonordokter = $('#txtdonordokter').val(); 
var txtdonorriwayatmedis = $('#txtdonorriwayatmedis').val(); 
var txtdonordiambilsebanyak = $('#txtdonordiambilsebanyak').val(); 
var txtdonorkantong = $('#txtdonorkantong').val(); 
var txtdonortekanandarah = $('#txtdonortekanandarah').val(); 
var txtdonorkodetekanandarah = $('#txtdonorkodetekanandarah').val(); 
var txtdonornadi = $('#txtdonornadi').val(); 
var txtdonorberatbadan = $('#txtdonorberatbadan').val(); 
var txtdonorkodeberatbadan = $('#txtdonorkodeberatbadan').val(); 
var txtdonortinggibadan = $('#txtdonortinggibadan').val(); 
var txtdonorkodetinggibadan = $('#txtdonorkodetinggibadan').val(); 
var txtdonorsuhu = $('#txtdonorsuhu').val(); 
var txtdonorkodesuhu = $('#txtdonorkodesuhu').val(); 
var txtdonorkeadaanumum = $('#txtdonorkeadaanumum').val(); 
var txtdonorpetugasadministrasi = $('#txtdonorpetugasadministrasi').val(); 
var txtdonorpetugashb = $('#txtdonorpetugashb').val(); 
var txtdonormacamdonor = $('#txtdonormacamdonor').val(); 
var txtdonormetode = $('#txtdonormetode').val(); 
var txtdonorhb = $('#txtdonorhb').val(); 
var txtdonorgoldar = $('#txtdonorgoldar').val(); 
var txtdonorpetugasaftar = $('#txtdonorpetugasaftar').val(); 
var txtdonorlengan = $('#txtdonorlengan').val(); 
var txtdonorkodekantong = $('#txtdonorkodekantong').val(); 
var txtdonorpenusukanulang = $('#txtdonorpenusukanulang').val(); 
var txtdonorlamapengambilan = $('#txtdonorlamapengambilan').val(); 
var txtdonornokantong = $('#txtdonornokantong').val(); 
var txtdonornokantong1 = $('#txtdonornokantong1').val(); 
var txtdonornokantong2 = $('#txtdonornokantong2').val(); 

  if(txtdonorid == '') {infoStatus('No Kartu Donor must be filled', 0); exit();}if(txtdonornoktp == '') {infoStatus('No KTP must be filled', 0); exit();}if(txtdonornamalengkap == '') {infoStatus('Nama Lengkap must be filled', 0); exit();}if(txtdonorjeniskelamin == '') {infoStatus('Jenis Kelamin must be filled', 0); exit();}if(txtdonorstatus == '') {infoStatus('Status must be filled', 0); exit();}if(txtdonoralamatrumah == '') {infoStatus('Alamat Rumah must be filled', 0); exit();}if(txtdonornohp == '') {infoStatus('No HP must be filled', 0); exit();}if(txtdonorkelurahan == '') {infoStatus('Kelurahan must be filled', 0); exit();}if(txtdonorkecamatan == '') {infoStatus('Kecamatan must be filled', 0); exit();}if(txtdonorwilayah == '') {infoStatus('Wilayah must be filled', 0); exit();}if(txtdonoralamatkantor == '') {infoStatus('Alamat Kantor must be filled', 0); exit();}if(txtdonorpekerjaan == '') {infoStatus('Pekerjaan must be filled', 0); exit();}if(txtdonortempatlahir == '') {infoStatus('Tempat Kelahiran must be filled', 0); exit();}if(txtdonorapharesis == '') {infoStatus('Apharesis must be filled', 0); exit();}if(txtdonorpenghargaan == '') {infoStatus('Penghargaan must be filled', 0); exit();}if(txtdonorpuasa == '') {infoStatus('Puasa must be filled', 0); exit();}if(txtdonorbutuh == '') {infoStatus('Donor Saat Dibutuhkan must be filled', 0); exit();}if(txtdonorterakhir == '') {infoStatus('Donor Terakhir must be filled', 0); exit();}if(txtdonorke == '') {infoStatus('Donor Ke must be filled', 0); exit();}if(txtdonordokter == '') {infoStatus('Nama Dokter must be filled', 0); exit();}if(txtdonorriwayatmedis == '') {infoStatus('Riwayat Medis must be filled', 0); exit();}if(txtdonordiambilsebanyak == '') {infoStatus('Diambil Sebanyak must be filled', 0); exit();}if(txtdonorkantong == '') {infoStatus('Kantong must be filled', 0); exit();}if(txtdonortekanandarah == '') {infoStatus('Tekanan Darah must be filled', 0); exit();}if(txtdonornadi == '') {infoStatus('Nadi must be filled', 0); exit();}if(txtdonorberatbadan == '') {infoStatus('Berat Badan (kg) must be filled', 0); exit();}if(txtdonortinggibadan == '') {infoStatus('Tinggi Badan (cm) must be filled', 0); exit();}if(txtdonorsuhu == '') {infoStatus('Suhu (Celcius) must be filled', 0); exit();}if(txtdonorpetugasadministrasi == '') {infoStatus('Petugas Administrasi must be filled', 0); exit();}if(txtdonorpetugashb == '') {infoStatus('Petugas Hemoglobin must be filled', 0); exit();}if(txtdonormacamdonor == '') {infoStatus('Macam Donor must be filled', 0); exit();}if(txtdonormetode == '') {infoStatus('Metode Pengambilan Darah must be filled', 0); exit();}if(txtdonorhb == '') {infoStatus('Kadar Hb (g/dL) must be filled', 0); exit();}if(txtdonorgoldar == '') {infoStatus('Golongan Darah must be filled', 0); exit();}if(txtdonorpetugasaftar == '') {infoStatus('Petugas Aftap must be filled', 0); exit();}if(txtdonorlengan == '') {infoStatus('Lengan must be filled', 0); exit();}if(txtdonorkodekantong == '') {infoStatus('Kode Timbangan Kantong must be filled', 0); exit();}if(txtdonorlamapengambilan == '') {infoStatus('Lama Pengambilan must be filled', 0); exit();}if(txtdonornokantong == '') {infoStatus('No Kantong must be filled', 0); exit();}

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
