<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <span class="title-page"><?= "Donor"?></span>
      <small>List of Data</small>
    </h1>
  </section>

  <section class="content">
    <div class="row">
    
              <div class="col-xs-12">
                <div  style="clear:both; border-top: 3px solid #d2d6de; height: 17px"></div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorjeniskelaminfilter" name="txtdonorjeniskelaminfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Jenis Kelamin</option>
                      <?php
                      if($rs_jeniskelamin != "") {
                          foreach($rs_jeniskelamin as $row_jeniskelamin) {
                              echo "<option value='".$row_jeniskelamin->jeniskelamin_id."'>".$row_jeniskelamin->jeniskelamin_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorkelurahanfilter" name="txtdonorkelurahanfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Kelurahan</option>
                      <?php
                      if($rs_kelurahan != "") {
                          foreach($rs_kelurahan as $row_kelurahan) {
                              echo "<option value='".$row_kelurahan->kelurahan_id."'>".$row_kelurahan->kelurahan_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorkecamatanfilter" name="txtdonorkecamatanfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Kecamatan</option>
                      <?php
                      if($rs_kecamatan != "") {
                          foreach($rs_kecamatan as $row_kecamatan) {
                              echo "<option value='".$row_kecamatan->kecamatan_id."'>".$row_kecamatan->kecamatan_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorwilayahfilter" name="txtdonorwilayahfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Wilayah</option>
                      <?php
                      if($rs_wilayah != "") {
                          foreach($rs_wilayah as $row_wilayah) {
                              echo "<option value='".$row_wilayah->wilayah_id."'>".$row_wilayah->wilayah_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorpekerjaanfilter" name="txtdonorpekerjaanfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Pekerjaan</option>
                      <?php
                      if($rs_pekerjaan != "") {
                          foreach($rs_pekerjaan as $row_pekerjaan) {
                              echo "<option value='".$row_pekerjaan->pekerjaan_id."'>".$row_pekerjaan->pekerjaan_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorpenghargaanfilter" name="txtdonorpenghargaanfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Penghargaan</option>
                      <?php
                      if($rs_penghargaan != "") {
                          foreach($rs_penghargaan as $row_penghargaan) {
                              echo "<option value='".$row_penghargaan->penghargaan_id."'>".$row_penghargaan->penghargaan_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorpuasafilter" name="txtdonorpuasafilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Puasa</option>
                      <?php
                      if($rs_puasa != "") {
                          foreach($rs_puasa as $row_puasa) {
                              echo "<option value='".$row_puasa->puasa_id."'>".$row_puasa->puasa_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorbutuhfilter" name="txtdonorbutuhfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Kebutuhan</option>
                      <?php
                      if($rs_butuh != "") {
                          foreach($rs_butuh as $row_butuh) {
                              echo "<option value='".$row_butuh->butuh_id."'>".$row_butuh->butuh_nama."</option>";
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
                  <th style='width:20%'>Donor</th> 
<th style='width:20%'>No KTP</th> 
<th style='width:20%'>Nama Lengkap</th> 
<th style='width:20%'>Jenis Kelamin</th> 
<th style='width:20%'>No Telepon</th> 
<th style='width:20%'>Kelurahan</th> 
<th style='width:20%'>Kecamatan</th> 
<th style='width:20%'>Wilayah</th> 
<th style='width:20%'>Alamat</th> 
<th style='width:20%'>Pekerjaan</th> 
<th style='width:20%'>Tempat Lahir</th> 
<th style='width:20%'>Tanggal Lahir</th> 
<th style='width:20%'>Penghargaan</th> 
<th style='width:20%'>Puasa</th> 
<th style='width:20%'>Kebutuhan</th> 
<th style='width:20%'>Tanggal Donor</th> 

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

<script src="<?= base_url("controller") ?>/donor.js"></script>