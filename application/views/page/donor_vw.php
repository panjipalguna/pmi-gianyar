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
                    <select id="txtdonorstatusfilter" name="txtdonorstatusfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Status</option>
                      <?php
                      if($rs_status != "") {
                          foreach($rs_status as $row_status) {
                              echo "<option value='".$row_status->status_id."'>".$row_status->status_nama."</option>";
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
                    <select id="txtdonorapharesisfilter" name="txtdonorapharesisfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Apharesis</option>
                      <?php
                      if($rs_apharesis != "") {
                          foreach($rs_apharesis as $row_apharesis) {
                              echo "<option value='".$row_apharesis->apharesis_id."'>".$row_apharesis->apharesis_nama."</option>";
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
                      <option value="">View All Mau Donor Saat Dibutuhkan</option>
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
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonornamadokterfilter" name="txtdonornamadokterfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Nama Dokter</option>
                      <?php
                      if($rs_dokter != "") {
                          foreach($rs_dokter as $row_dokter) {
                              echo "<option value='".$row_dokter->row_id."'>".$row_dokter->dokter_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonordiambilfilter" name="txtdonordiambilfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Diambil Sebanyak</option>
                      <?php
                      if($rs_diambilsebanyak != "") {
                          foreach($rs_diambilsebanyak as $row_diambilsebanyak) {
                              echo "<option value='".$row_diambilsebanyak->diambilsebanyak_id."'>".$row_diambilsebanyak->diambilsebanyak_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorkantongfilter" name="txtdonorkantongfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Kantong</option>
                      <?php
                      if($rs_kantong != "") {
                          foreach($rs_kantong as $row_kantong) {
                              echo "<option value='".$row_kantong->kantong_id."'>".$row_kantong->kantong_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorpetugasadministrasifilter" name="txtdonorpetugasadministrasifilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Petugas Administrasi</option>
                      <?php
                      if($rs_petugasadministrasi != "") {
                          foreach($rs_petugasadministrasi as $row_petugasadministrasi) {
                              echo "<option value='".$row_petugasadministrasi->petugasadministrasi_id."'>".$row_petugasadministrasi->petugasadministrasi_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorpetugashbfilter" name="txtdonorpetugashbfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Petugas Hemoglobin</option>
                      <?php
                      if($rs_petugashb != "") {
                          foreach($rs_petugashb as $row_petugashb) {
                              echo "<option value='".$row_petugashb->row_id."'>".$row_petugashb->petugashb_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonormacamdonorfilter" name="txtdonormacamdonorfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Macam Donor</option>
                      <?php
                      if($rs_macamdonor != "") {
                          foreach($rs_macamdonor as $row_macamdonor) {
                              echo "<option value='".$row_macamdonor->macamdonor_id."'>".$row_macamdonor->macamdonor_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonormetodefilter" name="txtdonormetodefilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Metode Pengambilan Darah</option>
                      <?php
                      if($rs_metode_ambil_darah != "") {
                          foreach($rs_metode_ambil_darah as $row_metode_ambil_darah) {
                              echo "<option value='".$row_metode_ambil_darah->metode_id."'>".$row_metode_ambil_darah->metode_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorgoldarfilter" name="txtdonorgoldarfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Golongan Darah</option>
                      <?php
                      if($rs_goldar != "") {
                          foreach($rs_goldar as $row_goldar) {
                              echo "<option value='".$row_goldar->row_id."'>".$row_goldar->goldar_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorpetugasaftapfilter" name="txtdonorpetugasaftapfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Petugas Aftap</option>
                      <?php
                      if($rs_petugasaftar != "") {
                          foreach($rs_petugasaftar as $row_petugasaftar) {
                              echo "<option value='".$row_petugasaftar->row_id."'>".$row_petugasaftar->petugasaftar_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorlenganfilter" name="txtdonorlenganfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Lengan</option>
                      <?php
                      if($rs_lengan != "") {
                          foreach($rs_lengan as $row_lengan) {
                              echo "<option value='".$row_lengan->lengan_id."'>".$row_lengan->lengan_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorpenusukanulangfilter" name="txtdonorpenusukanulangfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Penusukan Ulang Ganti Kantong</option>
                      <?php
                      if($rs_penusukanulang != "") {
                          foreach($rs_penusukanulang as $row_penusukanulang) {
                              echo "<option value='".$row_penusukanulang->penusukanulang_id."'>".$row_penusukanulang->penusukanulang_nama."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="txtdonorlamapengambilanfilter" name="txtdonorlamapengambilanfilter" class="form-control" onchange="generateTable()">
                      <option value="">View All Lama Pengambilan</option>
                      <?php
                      if($rs_lamapengambilan != "") {
                          foreach($rs_lamapengambilan as $row_lamapengambilan) {
                              echo "<option value='".$row_lamapengambilan->lamapengambilan_id."'>".$row_lamapengambilan->lamapengambilan_nama."</option>";
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
<th style='width:20%'>Status</th> 
<th style='width:20%'>Alamat</th> 
<th style='width:20%'>No Telepon/HP</th> 
<th style='width:20%'>Kelurahan</th> 
<th style='width:20%'>Kecamatan</th> 
<th style='width:20%'>Wilayah</th> 
<th style='width:20%'>Alamat Kantor</th> 
<!-- <th style='width:20%'>Pekerjaan</th> 
<th style='width:20%'>Tempat Kelahiran</th> 
<th style='width:20%'>Apharesis</th> 
<th style='width:20%'>Penghargaan</th> 
<th style='width:20%'>Puasa</th> 
<th style='width:20%'>Mau Donor Saat Dibutuhkan</th> 
<th style='width:20%'>Donor Terakhir Tanggal</th> 
<th style='width:20%'>Donor Ke-</th> 
<th style='width:20%'>Nama Dokter</th> 
<th style='width:20%'>Riwayat Medis</th> 
<th style='width:20%'>Diambil Sebanyak</th> 
<th style='width:20%'>Kantong</th> 
<th style='width:20%'>Tekanan Darah</th> 
<th style='width:20%'>Kode Alat Tekanan Darah</th> 
<th style='width:20%'>Nadi</th> 
<th style='width:20%'>Berat Badan</th> 
<th style='width:20%'>Kode Alat Berat Badan</th> 
<th style='width:20%'>Tinggi Badan</th> 
<th style='width:20%'>Kode Alat Tinggi Badan</th> 
<th style='width:20%'>Suhu</th> 
<th style='width:20%'>Kode Alat Suhu </th> 
<th style='width:20%'>Keadaan Umum</th> 
<th style='width:20%'>Petugas Administrasi</th> 
<th style='width:20%'>Riwayat Donor</th> 
<th style='width:20%'>Petugas Hemoglobin</th> 
<th style='width:20%'>Macam Donor</th> 
<th style='width:20%'>Metode Pengambilan Darah</th> 
<th style='width:20%'>Kadar Hb</th> 
<th style='width:20%'>Golongan Darah</th> 
<th style='width:20%'>Petugas Aftap</th> 
<th style='width:20%'>Lengan</th> 
<th style='width:20%'>Kode Timbangan Kantong</th> 
<th style='width:20%'>Penusukan Ulang Ganti Kantong</th> 
<th style='width:20%'>Lama Pengambilan</th> 
<th style='width:20%'>No Kantong</th> 
<th style='width:20%'>No Kantong Ganti 1</th> 
<th style='width:20%'>No Kantong Ganti 2</th> 
<th style='width:20%'>Tanggal Donor</th>  -->

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