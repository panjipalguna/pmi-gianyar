<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <span class="title-page"><?= "Golongan Darah"?></span>
      <small>List of Data</small>
    </h1>
  </section>

  <section class="content">
    <div class="row">
    
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div id='callback_msg'></div>
            <table id="tablelist" class="table table-bordered table-striped" style="width: 100%">
              <thead>
                <tr>
                  <th style="width:3%"></th>
                  <th style='width:20%'>Nama Golongan Darah</th> 

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
  <div class="modal-dialog " role="document">
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

<script src="<?= base_url("controller") ?>/goldar.js"></script>