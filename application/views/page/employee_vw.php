<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <span class="title-page"><?= strtoupper($lbl_controller) ?></span>
      <small>List of Data</small>
    </h1>
  </section>

  <section class="content">
    <div class="row">
    
              <div class="col-xs-12">
                <div  style="clear:both; border-top: 3px solid #d2d6de; height: 17px"></div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdepartmentidfilter" name="txtdepartmentidfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Department</option>
                      <?php
                      if($rs_departmenttable != "") {
                          foreach($rs_departmenttable as $row_departmenttable) {
                              echo "<option value='".$row_departmenttable->row_id."'>".$row_departmenttable->name."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
              </div>
            
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div id='callback_msg'></div>
            <table id="tablelist" class="table table-bordered table-striped" style="width: 100%">
              <thead>
                <tr>
                  <th style="width:3%"></th>
                  <th style='width:20%'>Department</th> 
<th style='width:20%'>Employee Name</th> 
<th style='width:20%'>Address</th> 
<th style='width:20%'>Hired Date</th> 
<th style='width:20%'>Age</th> 
<th style='width:20%'>Salary</th> 

                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="modalForm" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= strtoupper($lbl_controller) ?> FORM</h4>
      </div>
      <div class="modal-body">
        <div id="tableModal"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
        <button type="button" id="btnSave" class="btn btn-success">SAVE</button>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url("controller") ?>/employee.js"></script>