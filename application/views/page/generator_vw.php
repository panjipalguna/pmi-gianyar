<div class="content-wrapper">

  <form method="post" action="<?= site_url("generate/doSave") ?>">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

              <table class="table">
                <tr>
                  <td style="width:25%; padding-left: 0px; border: none !important;">
                    <span style="font-weight: bold; text-transform: uppercase">CONTROLLER NAME: </span>
                    <div style="clear:both; height:1px"></div>
                    <input type="text" id="txtcontroller" name="txtcontroller" class="form-control" style="width:100%; float:left" required="required" />
                  </td>
                  <td style="width:25%; padding-left: 0px; border: none !important;">
                    <span style="font-weight: bold; text-transform: uppercase">TABLE NAME: </span>
                    <div style="clear:both; height:1px"></div>
                    <input type="text" id="txttable" name="txttable" class="form-control" style="width:100%; float:left" required="required" />
                  </td>
                  <td style="width:25%; padding-left: 0px; border: none !important;"></td>
                  <td style="width:25%; padding-left: 0px; border: none !important;"></td>
                </tr>
              </table>

              <div style="clear:both; height:20px"></div>
              <table id="tablelist" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width:13%">Field Name</th> 
                    <th style="width:15%">Field Description</th> 
                    <th style="width:12%">Field Type</th> 
                    <th style="width:8%">IDX</th> 
                    <th style="width:8%">Mandatory</th> 
                    <th style="width:13%">Rel. Table</th> 
                    <th style="width:13%">Rel. Field Id</th> 
                    <th style="width:13%">Rel. Field Text</th> 
                    <th style="width:5%"></th> 
                  </tr>
                </thead>
                <tbody id="tbodyline">
                  <?php
                    $i = 1;
                  ?>
                  <tr>
                    <td><input type="text" id="txtfield<?=$i?>" name="txtfield<?=$i?>" class="form-control" /></td>
                    <td><input type="text" id="txtdescr<?=$i?>" name="txtdescr<?=$i?>" class="form-control" /></td>
                    <td>
                      <select id="txttype<?=$i?>" name="txttype<?=$i?>" class="form-control">
                        <option value=""></option>
                        <option value="varchar">Varchar</option>
                        <option value="text">Text</option>
                        <option value="date">Date</option>
                        <option value="int">Integer</option>
                        <option value="double">Float / Double</option>
                        <option value="file">File / Image</option>
                      </select>
                    </td>
                    <td>
                      <select id="txtindex<?=$i?>" name="txtindex<?=$i?>" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                      </select>
                    </td>
                    <td>
                      <select id="txtmandatory<?=$i?>" name="txtmandatory<?=$i?>" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                      </select>
                    </td>
                    <td><input type="text" id="txtrelationtable<?=$i?>" name="txtrelationtable<?=$i?>" class="form-control" /></td>
                    <td><input type="text" id="txtrelationfield<?=$i?>" name="txtrelationfield<?=$i?>" class="form-control" /></td>
                    <td><input type="text" id="txtrelationfieldtxt<?=$i?>" name="txtrelationfieldtxt<?=$i?>" class="form-control" /></td>
                    <td><a href="#" class="btn btn-danger" id="remove"><i class="fa fa-times-circle"></i></a></td>
                  </tr>
                </tbody>
              </table>
              <div style="clear:both; height:20px"></div>
              <input type="hidden" id="hdnCnt" name="hdnCnt" value="<?= $i ?>" />
              <a href="#" id="btnAdd" class="btn btn-primary"><i class="fa fa-plus-circle"></i> ADD FIELD</a>
              <button type="submit" id="btnSave" class="btn btn-success"><i class="fa fa-download"></i> GENERATE</button>
            </div>
          </div>
    </section>
  </form>
</div>

<script type="text/javascript">
    $("#btnAdd").click(function () {
        $("#tablelist").each(function () {
            var tds = '<tr>';
            jQuery.each($('tr:last', this), function () {
                var count = document.getElementById("hdnCnt").value;
                count++;                
                var lastCount = count;
                document.getElementById("hdnCnt").value = lastCount;
                tds += '<td><input name="txtfield'+lastCount+'" class="form-control" type="text" id="txtfield'+lastCount+'" /></td>';
                tds += '<td><input name="txtdescr'+lastCount+'" class="form-control" type="text" id="txtdescr'+lastCount+'" /></td>';
                tds += '<td><select id="txttype'+lastCount+'" name="txttype'+lastCount+'" class="form-control"><option value=""></option><option value="varchar">Varchar</option><option value="text">Text</option><option value="date">Date</option><option value="int">Integer</option><option value="double">Float / Double</option><option value="file">File / Image</option></select></td>';
                tds += '<td><select id="txtindex'+lastCount+'" name="txtindex'+lastCount+'" class="form-control"><option value="0">No</option><option value="1">Yes</option></select></td>';
                tds += '<td><select id="txtmandatory'+lastCount+'" name="txtmandatory'+lastCount+'" class="form-control"><option value="0">No</option><option value="1">Yes</option></select></td>';
                tds += '<td><input name="txtrelationtable'+lastCount+'" class="form-control" type="text" id="txtrelationtable'+lastCount+'" /></td>';
                tds += '<td><input name="txtrelationfield'+lastCount+'" class="form-control" type="text" id="txtrelationfield'+lastCount+'" /></td>';
                tds += '<td><input name="txtrelationfieldtxt'+lastCount+'" class="form-control" type="text" id="txtrelationfieldtxt'+lastCount+'" /></td>';
                tds += '<td><a href="#" class="btn btn-danger" id="remove"><i class="fa fa-times-circle"></i></a></td>';
            });
            tds += '</tr>';
            if ($('tbody', this).length > 0) 
            {
                $('tbody', this).append(tds);
            } 
            else 
            {
                $(this).append(tds);
            }
        });
    });    
    $('#tbodyline').on('click','tr #remove',function(e){
        e.preventDefault();
        $(this).parents('tr').remove();
    });
</script>