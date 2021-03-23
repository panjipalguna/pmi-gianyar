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
  
                  var txtdepartmentidfilter = $("#txtdepartmentidfilter").val();
                  if(txtdepartmentidfilter != "") {
                    if(where == "") {
                      where = "department_id = '"+txtdepartmentidfilter+"'";
                    }
                    else {
                      where += " and department_id = '"+txtdepartmentidfilter+"'";                    
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
          $('#txtdepartmentid').select2();
      }
  });
}

function doSave(){

  var formData = new FormData($('.formInput')[0]);

  var txtdepartmentid = $('#txtdepartmentid').val(); 
var txtname = $('#txtname').val(); 
var txtaddress = $('#txtaddress').val(); 
var txthireddate = $('#txthireddate').val(); 
var txtage = $('#txtage').val(); 
var txtsalary = $('#txtsalary').val(); 
var txtphoto = $('#txtphoto').val(); 
var txtphoto_hdn = $('#txtphoto_hdn').val(); 

  if(txtdepartmentid == '') {infoStatus('Department must be filled', 0); exit();}if(txtname == '') {infoStatus('Employee Name must be filled', 0); exit();}

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