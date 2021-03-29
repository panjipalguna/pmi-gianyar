<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donor extends CI_Controller {
    function __construct() {
        parent::__construct();
        islogin();
    }

    public $table_db = "ref_donor";
    public $controller = "donor";
    
    public function index() {
        $lbl_controller = str_replace("_", " ", $this->controller);
        $page_url = site_url($this->controller);
		$data = array(
            'controller' => $this->controller,
            'lbl_controller' => $lbl_controller,
            'page_url' => $page_url,
            'rs_jeniskelamin' => getByQuery('select * from jeniskelamin'),
                'rs_status' => getByQuery('select * from status'),
                'rs_kelurahan' => getByQuery('select * from kelurahan'),
                'rs_kecamatan' => getByQuery('select * from kecamatan'),
                'rs_wilayah' => getByQuery('select * from wilayah'),
                'rs_pekerjaan' => getByQuery('select * from pekerjaan'),
                'rs_apharesis' => getByQuery('select * from apharesis'),
                'rs_penghargaan' => getByQuery('select * from penghargaan'),
                'rs_puasa' => getByQuery('select * from puasa'),
                'rs_butuh' => getByQuery('select * from butuh'),
                'rs_dokter' => getByQuery('select * from dokter'),
                'rs_diambilsebanyak' => getByQuery('select * from diambilsebanyak'),
                'rs_kantong' => getByQuery('select * from kantong'),
                'rs_petugasadministrasi' => getByQuery('select * from petugasadministrasi'),
                'rs_petugashb' => getByQuery('select * from petugashb'),
                'rs_macamdonor' => getByQuery('select * from macamdonor'),
                'rs_metode_ambil_darah' => getByQuery('select * from metode_ambil_darah'),
                'rs_goldar' => getByQuery('select * from goldar'),
                'rs_petugasaftar' => getByQuery('select * from petugasaftar'),
                'rs_lengan' => getByQuery('select * from lengan'),
                'rs_penusukanulang' => getByQuery('select * from penusukanulang'),
                'rs_lamapengambilan' => getByQuery('select * from lamapengambilan'),
                
        );
        $this->layout->display('page/donor_vw', $data);
    }

    public function gridview() {
        $where = $this->input->post("where");        
        $database = "default";
        $column = array('row_id', 'donor_id', 'donor_noktp', 'donor_namalengkap', 'donor_jeniskelamin', 'donor_status', 'donor_alamatrumah', 'donor_nohp', 'donor_kelurahan', 'donor_kecamatan', 'donor_wilayah', 'donor_alamatkantor', 'donor_pekerjaan', 'donor_tempatlahir', 'donor_apharesis', 'donor_penghargaan', 'donor_puasa', 'donor_butuh', 'donor_terakhir', 'donor_ke', 'donor_dokter', 'donor_riwayatmedis', 'donor_diambilsebanyak', 'donor_kantong', 'donor_tekanandarah', 'donor_kodetekanandarah', 'donor_nadi', 'donor_beratbadan', 'donor_kodeberatbadan', 'donor_tinggibadan', 'donor_kodetinggibadan', 'donor_suhu', 'donor_kodesuhu', 'donor_keadaanumum', 'donor_petugasadministrasi', 'donor_petugashb', 'donor_macamdonor', 'donor_metode', 'donor_hb', 'donor_goldar', 'donor_petugasaftar', 'donor_lengan', 'donor_kodekantong', 'donor_penusukanulang', 'donor_lamapengambilan', 'donor_nokantong', 'donor_nokantong1', 'donor_nokantong2');
        $table = "vw_ref_donorlist";
        $list = $this->datatables_mdl->get_datatables($database, $table, $column, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $line) 
        {
            $no++;          
            $row = array();
            $link = '
                <div class="btn-group">
                  <a href="javascript:void(0)" data-toggle="dropdown" style="color:#111"><i class="fa fa-folder-open"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0)" style="color:#111" data-toggle="modal" data-target="#modalForm" onclick="generateModalView(\''.$line->row_id.'\')">View</a></li>
                    <li><a href="javascript:void(0)" style="color:#111" onclick="generateModalForm(\'edit\', \''.$line->row_id.'\')">Update</a></li>
                    <li><a href="javascript:void(0)" style="color:#111" onclick="doDelete(\''.$line->row_id.'\')">Delete</a></li>
                  </ul>
                </div>
            ';
            $row[] = '<div style="text-align:center">'.$link.'</div>';
            $row[] = '<div style="text-align:center">'.$line->donor_id.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_noktp.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_namalengkap.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->jeniskelamin_jeniskelamin_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->status_status_nama.'</div>'; 
$row[] = '<div style="text-align:left">'.$line->donor_alamatrumah.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_nohp.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->kelurahan_kelurahan_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->kecamatan_kecamatan_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->wilayah_wilayah_nama.'</div>'; 
$row[] = '<div style="text-align:left">'.$line->donor_alamatkantor.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->pekerjaan_pekerjaan_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_tempatlahir.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->apharesis_apharesis_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->penghargaan_penghargaan_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->puasa_puasa_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->butuh_butuh_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.date("m/d/Y", strtotime($line->donor_terakhir)).'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_ke.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->dokter_dokter_nama.'</div>'; 
$row[] = '<div style="text-align:left">'.$line->donor_riwayatmedis.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->diambilsebanyak_diambilsebanyak_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->kantong_kantong_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_tekanandarah.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_kodetekanandarah.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_nadi.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_beratbadan.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_kodeberatbadan.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_tinggibadan.'</div>'; 
$row[] = '<div style="text-align:left">'.$line->donor_kodetinggibadan.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_suhu.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_kodesuhu.'</div>'; 
$row[] = '<div style="text-align:left">'.$line->donor_keadaanumum.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->petugasadministrasi_petugasadministrasi_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->petugashb_petugashb_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->macamdonor_macamdonor_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->metode_ambil_darah_metode_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_hb.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->goldar_goldar_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->petugasaftar_petugasaftar_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->lengan_lengan_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_kodekantong.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->penusukanulang_penusukanulang_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->lamapengambilan_lamapengambilan_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_nokantong.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_nokantong1.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_nokantong2.'</div>'; 

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatables_mdl->count_all($database, $table, $column),
            "recordsFiltered" => $this->datatables_mdl->count_filtered($database, $table, $column, $where),
            "data" => $data,
        );
        
        echo json_encode($output);
    }

    public function form() {
        $txtstate = $this->input->post("txtstate");
        $txtrowid = $this->input->post("txtrowid");
        $txtdonorid = ''; 
$txtdonornoktp = ''; 
$txtdonornamalengkap = ''; 
$txtdonorjeniskelamin = ''; 
$jeniskelamin_list = "";$txtjeniskelaminjeniskelaminnama = ''; 
$txtdonorstatus = ''; 
$status_list = "";$txtstatusstatusnama = ''; 
$txtdonoralamatrumah = ''; 
$txtdonornohp = ''; 
$txtdonorkelurahan = ''; 
$kelurahan_list = "";$txtkelurahankelurahannama = ''; 
$txtdonorkecamatan = ''; 
$kecamatan_list = "";$txtkecamatankecamatannama = ''; 
$txtdonorwilayah = ''; 
$wilayah_list = "";$txtwilayahwilayahnama = ''; 
$txtdonoralamatkantor = ''; 
$txtdonorpekerjaan = ''; 
$pekerjaan_list = "";$txtpekerjaanpekerjaannama = ''; 
$txtdonortempatlahir = ''; 
$txtdonorapharesis = ''; 
$apharesis_list = "";$txtapharesisapharesisnama = ''; 
$txtdonorpenghargaan = ''; 
$penghargaan_list = "";$txtpenghargaanpenghargaannama = ''; 
$txtdonorpuasa = ''; 
$puasa_list = "";$txtpuasapuasanama = ''; 
$txtdonorbutuh = ''; 
$butuh_list = "";$txtbutuhbutuhnama = ''; 
$txtdonorterakhir = ''; 
$txtdonorke = ''; 
$txtdonordokter = ''; 
$dokter_list = "";$txtdokterdokternama = ''; 
$txtdonorriwayatmedis = ''; 
$txtdonordiambilsebanyak = ''; 
$diambilsebanyak_list = "";$txtdiambilsebanyakdiambilsebanyaknama = ''; 
$txtdonorkantong = ''; 
$kantong_list = "";$txtkantongkantongnama = ''; 
$txtdonortekanandarah = ''; 
$txtdonorkodetekanandarah = ''; 
$txtdonornadi = ''; 
$txtdonorberatbadan = ''; 
$txtdonorkodeberatbadan = ''; 
$txtdonortinggibadan = ''; 
$txtdonorkodetinggibadan = ''; 
$txtdonorsuhu = ''; 
$txtdonorkodesuhu = ''; 
$txtdonorkeadaanumum = ''; 
$txtdonorpetugasadministrasi = ''; 
$petugasadministrasi_list = "";$txtpetugasadministrasipetugasadministrasinama = ''; 
$txtdonorpetugashb = ''; 
$petugashb_list = "";$txtpetugashbpetugashbnama = ''; 
$txtdonormacamdonor = ''; 
$macamdonor_list = "";$txtmacamdonormacamdonornama = ''; 
$txtdonormetode = ''; 
$metode_ambil_darah_list = "";$txtmetodeambildarahmetodenama = ''; 
$txtdonorhb = ''; 
$txtdonorgoldar = ''; 
$goldar_list = "";$txtgoldargoldarnama = ''; 
$txtdonorpetugasaftar = ''; 
$petugasaftar_list = "";$txtpetugasaftarpetugasaftarnama = ''; 
$txtdonorlengan = ''; 
$lengan_list = "";$txtlenganlengannama = ''; 
$txtdonorkodekantong = ''; 
$txtdonorpenusukanulang = ''; 
$penusukanulang_list = "";$txtpenusukanulangpenusukanulangnama = ''; 
$txtdonorlamapengambilan = ''; 
$lamapengambilan_list = "";$txtlamapengambilanlamapengambilannama = ''; 
$txtdonornokantong = ''; 
$txtdonornokantong1 = ''; 
$txtdonornokantong2 = ''; 


        if($txtstate == "edit") {
            $qry = "select * from vw_ref_donorlist where row_id = '".$txtrowid."'";
            $rs = getByQuery($qry);
            if($rs != "") {
                $txtdonorid = $rs[0]->donor_id; 
$txtdonornoktp = $rs[0]->donor_noktp; 
$txtdonornamalengkap = $rs[0]->donor_namalengkap; 
$txtdonorjeniskelamin = $rs[0]->donor_jeniskelamin; 
$txtjeniskelaminjeniskelaminnama = $rs[0]->jeniskelamin_jeniskelamin_nama; 
$txtdonorstatus = $rs[0]->donor_status; 
$txtstatusstatusnama = $rs[0]->status_status_nama; 
$txtdonoralamatrumah = $rs[0]->donor_alamatrumah; 
$txtdonornohp = $rs[0]->donor_nohp; 
$txtdonorkelurahan = $rs[0]->donor_kelurahan; 
$txtkelurahankelurahannama = $rs[0]->kelurahan_kelurahan_nama; 
$txtdonorkecamatan = $rs[0]->donor_kecamatan; 
$txtkecamatankecamatannama = $rs[0]->kecamatan_kecamatan_nama; 
$txtdonorwilayah = $rs[0]->donor_wilayah; 
$txtwilayahwilayahnama = $rs[0]->wilayah_wilayah_nama; 
$txtdonoralamatkantor = $rs[0]->donor_alamatkantor; 
$txtdonorpekerjaan = $rs[0]->donor_pekerjaan; 
$txtpekerjaanpekerjaannama = $rs[0]->pekerjaan_pekerjaan_nama; 
$txtdonortempatlahir = $rs[0]->donor_tempatlahir; 
$txtdonorapharesis = $rs[0]->donor_apharesis; 
$txtapharesisapharesisnama = $rs[0]->apharesis_apharesis_nama; 
$txtdonorpenghargaan = $rs[0]->donor_penghargaan; 
$txtpenghargaanpenghargaannama = $rs[0]->penghargaan_penghargaan_nama; 
$txtdonorpuasa = $rs[0]->donor_puasa; 
$txtpuasapuasanama = $rs[0]->puasa_puasa_nama; 
$txtdonorbutuh = $rs[0]->donor_butuh; 
$txtbutuhbutuhnama = $rs[0]->butuh_butuh_nama; 
$txtdonorterakhir = date('Y-m-d', strtotime($rs[0]->donor_terakhir)); 
$txtdonorke = $rs[0]->donor_ke; 
$txtdonordokter = $rs[0]->donor_dokter; 
$txtdokterdokternama = $rs[0]->dokter_dokter_nama; 
$txtdonorriwayatmedis = $rs[0]->donor_riwayatmedis; 
$txtdonordiambilsebanyak = $rs[0]->donor_diambilsebanyak; 
$txtdiambilsebanyakdiambilsebanyaknama = $rs[0]->diambilsebanyak_diambilsebanyak_nama; 
$txtdonorkantong = $rs[0]->donor_kantong; 
$txtkantongkantongnama = $rs[0]->kantong_kantong_nama; 
$txtdonortekanandarah = $rs[0]->donor_tekanandarah; 
$txtdonorkodetekanandarah = $rs[0]->donor_kodetekanandarah; 
$txtdonornadi = $rs[0]->donor_nadi; 
$txtdonorberatbadan = $rs[0]->donor_beratbadan; 
$txtdonorkodeberatbadan = $rs[0]->donor_kodeberatbadan; 
$txtdonortinggibadan = $rs[0]->donor_tinggibadan; 
$txtdonorkodetinggibadan = $rs[0]->donor_kodetinggibadan; 
$txtdonorsuhu = $rs[0]->donor_suhu; 
$txtdonorkodesuhu = $rs[0]->donor_kodesuhu; 
$txtdonorkeadaanumum = $rs[0]->donor_keadaanumum; 
$txtdonorpetugasadministrasi = $rs[0]->donor_petugasadministrasi; 
$txtpetugasadministrasipetugasadministrasinama = $rs[0]->petugasadministrasi_petugasadministrasi_nama; 
$txtdonorpetugashb = $rs[0]->donor_petugashb; 
$txtpetugashbpetugashbnama = $rs[0]->petugashb_petugashb_nama; 
$txtdonormacamdonor = $rs[0]->donor_macamdonor; 
$txtmacamdonormacamdonornama = $rs[0]->macamdonor_macamdonor_nama; 
$txtdonormetode = $rs[0]->donor_metode; 
$txtmetodeambildarahmetodenama = $rs[0]->metode_ambil_darah_metode_nama; 
$txtdonorhb = $rs[0]->donor_hb; 
$txtdonorgoldar = $rs[0]->donor_goldar; 
$txtgoldargoldarnama = $rs[0]->goldar_goldar_nama; 
$txtdonorpetugasaftar = $rs[0]->donor_petugasaftar; 
$txtpetugasaftarpetugasaftarnama = $rs[0]->petugasaftar_petugasaftar_nama; 
$txtdonorlengan = $rs[0]->donor_lengan; 
$txtlenganlengannama = $rs[0]->lengan_lengan_nama; 
$txtdonorkodekantong = $rs[0]->donor_kodekantong; 
$txtdonorpenusukanulang = $rs[0]->donor_penusukanulang; 
$txtpenusukanulangpenusukanulangnama = $rs[0]->penusukanulang_penusukanulang_nama; 
$txtdonorlamapengambilan = $rs[0]->donor_lamapengambilan; 
$txtlamapengambilanlamapengambilannama = $rs[0]->lamapengambilan_lamapengambilan_nama; 
$txtdonornokantong = $rs[0]->donor_nokantong; 
$txtdonornokantong1 = $rs[0]->donor_nokantong1; 
$txtdonornokantong2 = $rs[0]->donor_nokantong2; 

            }
        }

        
                  $rs_jeniskelamin = getByQuery("select * from jeniskelamin");
                  if($rs_jeniskelamin != "") {
                      foreach($rs_jeniskelamin as $row_jeniskelamin) {
                          $selected = ($row_jeniskelamin->jeniskelamin_id == $txtdonorjeniskelamin) ? "selected" : "";
                          $jeniskelamin_list .= "<option value='".$row_jeniskelamin->jeniskelamin_id."' ".$selected." >".$row_jeniskelamin->jeniskelamin_nama."</option>";
                      }
                  }
                
                  $rs_status = getByQuery("select * from status");
                  if($rs_status != "") {
                      foreach($rs_status as $row_status) {
                          $selected = ($row_status->status_id == $txtdonorstatus) ? "selected" : "";
                          $status_list .= "<option value='".$row_status->status_id."' ".$selected." >".$row_status->status_nama."</option>";
                      }
                  }
                
                  $rs_kelurahan = getByQuery("select * from kelurahan");
                  if($rs_kelurahan != "") {
                      foreach($rs_kelurahan as $row_kelurahan) {
                          $selected = ($row_kelurahan->kelurahan_id == $txtdonorkelurahan) ? "selected" : "";
                          $kelurahan_list .= "<option value='".$row_kelurahan->kelurahan_id."' ".$selected." >".$row_kelurahan->kelurahan_nama."</option>";
                      }
                  }
                
                  $rs_kecamatan = getByQuery("select * from kecamatan");
                  if($rs_kecamatan != "") {
                      foreach($rs_kecamatan as $row_kecamatan) {
                          $selected = ($row_kecamatan->kecamatan_id == $txtdonorkecamatan) ? "selected" : "";
                          $kecamatan_list .= "<option value='".$row_kecamatan->kecamatan_id."' ".$selected." >".$row_kecamatan->kecamatan_nama."</option>";
                      }
                  }
                
                  $rs_wilayah = getByQuery("select * from wilayah");
                  if($rs_wilayah != "") {
                      foreach($rs_wilayah as $row_wilayah) {
                          $selected = ($row_wilayah->wilayah_id == $txtdonorwilayah) ? "selected" : "";
                          $wilayah_list .= "<option value='".$row_wilayah->wilayah_id."' ".$selected." >".$row_wilayah->wilayah_nama."</option>";
                      }
                  }
                
                  $rs_pekerjaan = getByQuery("select * from pekerjaan");
                  if($rs_pekerjaan != "") {
                      foreach($rs_pekerjaan as $row_pekerjaan) {
                          $selected = ($row_pekerjaan->pekerjaan_id == $txtdonorpekerjaan) ? "selected" : "";
                          $pekerjaan_list .= "<option value='".$row_pekerjaan->pekerjaan_id."' ".$selected." >".$row_pekerjaan->pekerjaan_nama."</option>";
                      }
                  }
                
                  $rs_apharesis = getByQuery("select * from apharesis");
                  if($rs_apharesis != "") {
                      foreach($rs_apharesis as $row_apharesis) {
                          $selected = ($row_apharesis->apharesis_id == $txtdonorapharesis) ? "selected" : "";
                          $apharesis_list .= "<option value='".$row_apharesis->apharesis_id."' ".$selected." >".$row_apharesis->apharesis_nama."</option>";
                      }
                  }
                
                  $rs_penghargaan = getByQuery("select * from penghargaan");
                  if($rs_penghargaan != "") {
                      foreach($rs_penghargaan as $row_penghargaan) {
                          $selected = ($row_penghargaan->penghargaan_id == $txtdonorpenghargaan) ? "selected" : "";
                          $penghargaan_list .= "<option value='".$row_penghargaan->penghargaan_id."' ".$selected." >".$row_penghargaan->penghargaan_nama."</option>";
                      }
                  }
                
                  $rs_puasa = getByQuery("select * from puasa");
                  if($rs_puasa != "") {
                      foreach($rs_puasa as $row_puasa) {
                          $selected = ($row_puasa->puasa_id == $txtdonorpuasa) ? "selected" : "";
                          $puasa_list .= "<option value='".$row_puasa->puasa_id."' ".$selected." >".$row_puasa->puasa_nama."</option>";
                      }
                  }
                
                  $rs_butuh = getByQuery("select * from butuh");
                  if($rs_butuh != "") {
                      foreach($rs_butuh as $row_butuh) {
                          $selected = ($row_butuh->butuh_id == $txtdonorbutuh) ? "selected" : "";
                          $butuh_list .= "<option value='".$row_butuh->butuh_id."' ".$selected." >".$row_butuh->butuh_nama."</option>";
                      }
                  }
                
                  $rs_dokter = getByQuery("select * from dokter");
                  if($rs_dokter != "") {
                      foreach($rs_dokter as $row_dokter) {
                          $selected = ($row_dokter->row_id == $txtdonordokter) ? "selected" : "";
                          $dokter_list .= "<option value='".$row_dokter->row_id."' ".$selected." >".$row_dokter->dokter_nama."</option>";
                      }
                  }
                
                  $rs_diambilsebanyak = getByQuery("select * from diambilsebanyak");
                  if($rs_diambilsebanyak != "") {
                      foreach($rs_diambilsebanyak as $row_diambilsebanyak) {
                          $selected = ($row_diambilsebanyak->diambilsebanyak_id == $txtdonordiambilsebanyak) ? "selected" : "";
                          $diambilsebanyak_list .= "<option value='".$row_diambilsebanyak->diambilsebanyak_id."' ".$selected." >".$row_diambilsebanyak->diambilsebanyak_nama."</option>";
                      }
                  }
                
                  $rs_kantong = getByQuery("select * from kantong");
                  if($rs_kantong != "") {
                      foreach($rs_kantong as $row_kantong) {
                          $selected = ($row_kantong->kantong_id == $txtdonorkantong) ? "selected" : "";
                          $kantong_list .= "<option value='".$row_kantong->kantong_id."' ".$selected." >".$row_kantong->kantong_nama."</option>";
                      }
                  }
                
                  $rs_petugasadministrasi = getByQuery("select * from petugasadministrasi");
                  if($rs_petugasadministrasi != "") {
                      foreach($rs_petugasadministrasi as $row_petugasadministrasi) {
                          $selected = ($row_petugasadministrasi->petugasadministrasi_id == $txtdonorpetugasadministrasi) ? "selected" : "";
                          $petugasadministrasi_list .= "<option value='".$row_petugasadministrasi->petugasadministrasi_id."' ".$selected." >".$row_petugasadministrasi->petugasadministrasi_nama."</option>";
                      }
                  }
                
                  $rs_petugashb = getByQuery("select * from petugashb");
                  if($rs_petugashb != "") {
                      foreach($rs_petugashb as $row_petugashb) {
                          $selected = ($row_petugashb->row_id == $txtdonorpetugashb) ? "selected" : "";
                          $petugashb_list .= "<option value='".$row_petugashb->row_id."' ".$selected." >".$row_petugashb->petugashb_nama."</option>";
                      }
                  }
                
                  $rs_macamdonor = getByQuery("select * from macamdonor");
                  if($rs_macamdonor != "") {
                      foreach($rs_macamdonor as $row_macamdonor) {
                          $selected = ($row_macamdonor->macamdonor_id == $txtdonormacamdonor) ? "selected" : "";
                          $macamdonor_list .= "<option value='".$row_macamdonor->macamdonor_id."' ".$selected." >".$row_macamdonor->macamdonor_nama."</option>";
                      }
                  }
                
                  $rs_metode_ambil_darah = getByQuery("select * from metode_ambil_darah");
                  if($rs_metode_ambil_darah != "") {
                      foreach($rs_metode_ambil_darah as $row_metode_ambil_darah) {
                          $selected = ($row_metode_ambil_darah->metode_id == $txtdonormetode) ? "selected" : "";
                          $metode_ambil_darah_list .= "<option value='".$row_metode_ambil_darah->metode_id."' ".$selected." >".$row_metode_ambil_darah->metode_nama."</option>";
                      }
                  }
                
                  $rs_goldar = getByQuery("select * from goldar");
                  if($rs_goldar != "") {
                      foreach($rs_goldar as $row_goldar) {
                          $selected = ($row_goldar->row_id == $txtdonorgoldar) ? "selected" : "";
                          $goldar_list .= "<option value='".$row_goldar->row_id."' ".$selected." >".$row_goldar->goldar_nama."</option>";
                      }
                  }
                
                  $rs_petugasaftar = getByQuery("select * from petugasaftar");
                  if($rs_petugasaftar != "") {
                      foreach($rs_petugasaftar as $row_petugasaftar) {
                          $selected = ($row_petugasaftar->row_id == $txtdonorpetugasaftar) ? "selected" : "";
                          $petugasaftar_list .= "<option value='".$row_petugasaftar->row_id."' ".$selected." >".$row_petugasaftar->petugasaftar_nama."</option>";
                      }
                  }
                
                  $rs_lengan = getByQuery("select * from lengan");
                  if($rs_lengan != "") {
                      foreach($rs_lengan as $row_lengan) {
                          $selected = ($row_lengan->lengan_id == $txtdonorlengan) ? "selected" : "";
                          $lengan_list .= "<option value='".$row_lengan->lengan_id."' ".$selected." >".$row_lengan->lengan_nama."</option>";
                      }
                  }
                
                  $rs_penusukanulang = getByQuery("select * from penusukanulang");
                  if($rs_penusukanulang != "") {
                      foreach($rs_penusukanulang as $row_penusukanulang) {
                          $selected = ($row_penusukanulang->penusukanulang_id == $txtdonorpenusukanulang) ? "selected" : "";
                          $penusukanulang_list .= "<option value='".$row_penusukanulang->penusukanulang_id."' ".$selected." >".$row_penusukanulang->penusukanulang_nama."</option>";
                      }
                  }
                
                  $rs_lamapengambilan = getByQuery("select * from lamapengambilan");
                  if($rs_lamapengambilan != "") {
                      foreach($rs_lamapengambilan as $row_lamapengambilan) {
                          $selected = ($row_lamapengambilan->lamapengambilan_id == $txtdonorlamapengambilan) ? "selected" : "";
                          $lamapengambilan_list .= "<option value='".$row_lamapengambilan->lamapengambilan_id."' ".$selected." >".$row_lamapengambilan->lamapengambilan_nama."</option>";
                      }
                  }
                

        $table = '
            <div class="row">
                <form method="POST" class="formInput" enctype="multipart/form-data">
                    <input type="hidden" id="txtrowid" name="txtrowid" class="form-control" value="'.$txtrowid.'" style="background:#fff" readonly />
                    <input type="hidden" id="txtstate" name="txtstate" class="form-control" value="'.$txtstate.'" />
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No Kartu Donor: <span style="color: #ff0000">*</span></label>
                        <input type="number" step="1" " id="txtdonorid" name="txtdonorid" class="form-control" value="'.$txtdonorid.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No KTP: <span style="color: #ff0000">*</span></label>
                        <input type="number" step="1" " id="txtdonornoktp" name="txtdonornoktp" class="form-control" value="'.$txtdonornoktp.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Lengkap: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtdonornamalengkap" name="txtdonornamalengkap" class="form-control" value="'.$txtdonornamalengkap.'" />
                      </div>
                    </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Kelamin: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorjeniskelamin" name="txtdonorjeniskelamin" class="form-control select2"  required>
                        <option value=""></option>
                        '.$jeniskelamin_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorstatus" name="txtdonorstatus" class="form-control select2"  required>
                        <option value=""></option>
                        '.$status_list.'
                      </select>
                    </div>
                  </div>
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Alamat Rumah: <span style="color: #ff0000">*</span></label>
                        <textarea id="txtdonoralamatrumah" name="txtdonoralamatrumah" rows="4" class="form-control">'.$txtdonoralamatrumah.'</textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No HP: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtdonornohp" name="txtdonornohp" class="form-control" value="'.$txtdonornohp.'" />
                      </div>
                    </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kelurahan: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorkelurahan" name="txtdonorkelurahan" class="form-control select2"  required>
                        <option value=""></option>
                        '.$kelurahan_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kecamatan: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorkecamatan" name="txtdonorkecamatan" class="form-control select2"  required>
                        <option value=""></option>
                        '.$kecamatan_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Wilayah: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorwilayah" name="txtdonorwilayah" class="form-control select2"  required>
                        <option value=""></option>
                        '.$wilayah_list.'
                      </select>
                    </div>
                  </div>
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Alamat Kantor: <span style="color: #ff0000">*</span></label>
                        <textarea id="txtdonoralamatkantor" name="txtdonoralamatkantor" rows="4" class="form-control">'.$txtdonoralamatkantor.'</textarea>
                      </div>
                    </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pekerjaan: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorpekerjaan" name="txtdonorpekerjaan" class="form-control select2"  required>
                        <option value=""></option>
                        '.$pekerjaan_list.'
                      </select>
                    </div>
                  </div>
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tempat Kelahiran: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtdonortempatlahir" name="txtdonortempatlahir" class="form-control" value="'.$txtdonortempatlahir.'" />
                      </div>
                    </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Apharesis: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorapharesis" name="txtdonorapharesis" class="form-control select2"  required>
                        <option value=""></option>
                        '.$apharesis_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Penghargaan: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorpenghargaan" name="txtdonorpenghargaan" class="form-control select2"  required>
                        <option value=""></option>
                        '.$penghargaan_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Puasa: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorpuasa" name="txtdonorpuasa" class="form-control select2"  required>
                        <option value=""></option>
                        '.$puasa_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Donor Saat Dibutuhkan: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorbutuh" name="txtdonorbutuh" class="form-control select2"  required>
                        <option value=""></option>
                        '.$butuh_list.'
                      </select>
                    </div>
                  </div>
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Donor Terakhir: <span style="color: #ff0000">*</span></label>
                        <input type="date" id="txtdonorterakhir" name="txtdonorterakhir" class="form-control" value="'.$txtdonorterakhir.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Donor Ke: <span style="color: #ff0000">*</span></label>
                        <input type="number" step="1" " id="txtdonorke" name="txtdonorke" class="form-control" value="'.$txtdonorke.'" />
                      </div>
                    </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Dokter: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonordokter" name="txtdonordokter" class="form-control select2"  required>
                        <option value=""></option>
                        '.$dokter_list.'
                      </select>
                    </div>
                  </div>
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Riwayat Medis: <span style="color: #ff0000">*</span></label>
                        <textarea id="txtdonorriwayatmedis" name="txtdonorriwayatmedis" rows="4" class="form-control">'.$txtdonorriwayatmedis.'</textarea>
                      </div>
                    </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Diambil Sebanyak: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonordiambilsebanyak" name="txtdonordiambilsebanyak" class="form-control select2"  required>
                        <option value=""></option>
                        '.$diambilsebanyak_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kantong: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorkantong" name="txtdonorkantong" class="form-control select2"  required>
                        <option value=""></option>
                        '.$kantong_list.'
                      </select>
                    </div>
                  </div>
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tekanan Darah: <span style="color: #ff0000">*</span></label>
                        <input type="number" step="1" " id="txtdonortekanandarah" name="txtdonortekanandarah" class="form-control" value="'.$txtdonortekanandarah.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kode Alat Tekanan Darah:</label>
                        <input type="text" id="txtdonorkodetekanandarah" name="txtdonorkodetekanandarah" class="form-control" value="'.$txtdonorkodetekanandarah.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nadi: <span style="color: #ff0000">*</span></label>
                        <input type="number" step="1" " id="txtdonornadi" name="txtdonornadi" class="form-control" value="'.$txtdonornadi.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Berat Badan (kg): <span style="color: #ff0000">*</span></label>
                        <input type="number" step="1" " id="txtdonorberatbadan" name="txtdonorberatbadan" class="form-control" value="'.$txtdonorberatbadan.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kode Alat Berat Badan:</label>
                        <input type="text" id="txtdonorkodeberatbadan" name="txtdonorkodeberatbadan" class="form-control" value="'.$txtdonorkodeberatbadan.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tinggi Badan (cm): <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtdonortinggibadan" name="txtdonortinggibadan" class="form-control" value="'.$txtdonortinggibadan.'" />
                      </div>
                    </div>
                  
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kode Alat Tinggi Badan:</label>
                        <input type="text" id="txtdonorkodetinggibadan" name="txtdonorkodetinggibadan" class="form-control" value="'.$txtdonorkodetinggibadan.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Suhu (Celcius): <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtdonorsuhu" name="txtdonorsuhu" class="form-control" value="'.$txtdonorsuhu.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kode Alat Suhu :</label>
                        <input type="text" id="txtdonorkodesuhu" name="txtdonorkodesuhu" class="form-control" value="'.$txtdonorkodesuhu.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Keadaan Umum:</label>
                        <textarea id="txtdonorkeadaanumum" name="txtdonorkeadaanumum" rows="4" class="form-control">'.$txtdonorkeadaanumum.'</textarea>
                      </div>
                    </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Petugas Administrasi: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorpetugasadministrasi" name="txtdonorpetugasadministrasi" class="form-control select2"  required>
                        <option value=""></option>
                        '.$petugasadministrasi_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Petugas Hemoglobin: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorpetugashb" name="txtdonorpetugashb" class="form-control select2"  required>
                        <option value=""></option>
                        '.$petugashb_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Macam Donor: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonormacamdonor" name="txtdonormacamdonor" class="form-control select2"  required>
                        <option value=""></option>
                        '.$macamdonor_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Metode Pengambilan Darah: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonormetode" name="txtdonormetode" class="form-control select2"  required>
                        <option value=""></option>
                        '.$metode_ambil_darah_list.'
                      </select>
                    </div>
                  </div>
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kadar Hb (g/dL): <span style="color: #ff0000">*</span></label>
                        <input type="number" step="1" " id="txtdonorhb" name="txtdonorhb" class="form-control" value="'.$txtdonorhb.'" />
                      </div>
                    </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Golongan Darah: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorgoldar" name="txtdonorgoldar" class="form-control select2"  required>
                        <option value=""></option>
                        '.$goldar_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Petugas Aftap: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorpetugasaftar" name="txtdonorpetugasaftar" class="form-control select2"  required>
                        <option value=""></option>
                        '.$petugasaftar_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Lengan: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorlengan" name="txtdonorlengan" class="form-control select2"  required>
                        <option value=""></option>
                        '.$lengan_list.'
                      </select>
                    </div>
                  </div>
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kode Timbangan Kantong: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtdonorkodekantong" name="txtdonorkodekantong" class="form-control" value="'.$txtdonorkodekantong.'" />
                      </div>
                    </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Penusukan Ulang Ganti Kantong:</label>
                      <select id="txtdonorpenusukanulang" name="txtdonorpenusukanulang" class="form-control select2"  required>
                        <option value=""></option>
                        '.$penusukanulang_list.'
                      </select>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Lama Pengambilan: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorlamapengambilan" name="txtdonorlamapengambilan" class="form-control select2"  required>
                        <option value=""></option>
                        '.$lamapengambilan_list.'
                      </select>
                    </div>
                  </div>
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No Kantong: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtdonornokantong" name="txtdonornokantong" class="form-control" value="'.$txtdonornokantong.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No Kantong Ganti 1:</label>
                        <input type="text" id="txtdonornokantong1" name="txtdonornokantong1" class="form-control" value="'.$txtdonornokantong1.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No Kantong Ganti 2:</label>
                        <input type="text" id="txtdonornokantong2" name="txtdonornokantong2" class="form-control" value="'.$txtdonornokantong2.'" />
                      </div>
                    </div>
                  
                </form>
            </div>
        ';

        $data['table'] = $table;
        echo json_encode($data);
    }

    public function view() {
        $txtrowid = $this->input->post("txtrowid");
        $txtdonorid = ''; 
$txtdonornoktp = ''; 
$txtdonornamalengkap = ''; 
$txtdonorjeniskelamin = ''; 
$jeniskelamin_list = "";$txtjeniskelaminjeniskelaminnama = ''; 
$txtdonorstatus = ''; 
$status_list = "";$txtstatusstatusnama = ''; 
$txtdonoralamatrumah = ''; 
$txtdonornohp = ''; 
$txtdonorkelurahan = ''; 
$kelurahan_list = "";$txtkelurahankelurahannama = ''; 
$txtdonorkecamatan = ''; 
$kecamatan_list = "";$txtkecamatankecamatannama = ''; 
$txtdonorwilayah = ''; 
$wilayah_list = "";$txtwilayahwilayahnama = ''; 
$txtdonoralamatkantor = ''; 
$txtdonorpekerjaan = ''; 
$pekerjaan_list = "";$txtpekerjaanpekerjaannama = ''; 
$txtdonortempatlahir = ''; 
$txtdonorapharesis = ''; 
$apharesis_list = "";$txtapharesisapharesisnama = ''; 
$txtdonorpenghargaan = ''; 
$penghargaan_list = "";$txtpenghargaanpenghargaannama = ''; 
$txtdonorpuasa = ''; 
$puasa_list = "";$txtpuasapuasanama = ''; 
$txtdonorbutuh = ''; 
$butuh_list = "";$txtbutuhbutuhnama = ''; 
$txtdonorterakhir = ''; 
$txtdonorke = ''; 
$txtdonordokter = ''; 
$dokter_list = "";$txtdokterdokternama = ''; 
$txtdonorriwayatmedis = ''; 
$txtdonordiambilsebanyak = ''; 
$diambilsebanyak_list = "";$txtdiambilsebanyakdiambilsebanyaknama = ''; 
$txtdonorkantong = ''; 
$kantong_list = "";$txtkantongkantongnama = ''; 
$txtdonortekanandarah = ''; 
$txtdonorkodetekanandarah = ''; 
$txtdonornadi = ''; 
$txtdonorberatbadan = ''; 
$txtdonorkodeberatbadan = ''; 
$txtdonortinggibadan = ''; 
$txtdonorkodetinggibadan = ''; 
$txtdonorsuhu = ''; 
$txtdonorkodesuhu = ''; 
$txtdonorkeadaanumum = ''; 
$txtdonorpetugasadministrasi = ''; 
$petugasadministrasi_list = "";$txtpetugasadministrasipetugasadministrasinama = ''; 
$txtdonorpetugashb = ''; 
$petugashb_list = "";$txtpetugashbpetugashbnama = ''; 
$txtdonormacamdonor = ''; 
$macamdonor_list = "";$txtmacamdonormacamdonornama = ''; 
$txtdonormetode = ''; 
$metode_ambil_darah_list = "";$txtmetodeambildarahmetodenama = ''; 
$txtdonorhb = ''; 
$txtdonorgoldar = ''; 
$goldar_list = "";$txtgoldargoldarnama = ''; 
$txtdonorpetugasaftar = ''; 
$petugasaftar_list = "";$txtpetugasaftarpetugasaftarnama = ''; 
$txtdonorlengan = ''; 
$lengan_list = "";$txtlenganlengannama = ''; 
$txtdonorkodekantong = ''; 
$txtdonorpenusukanulang = ''; 
$penusukanulang_list = "";$txtpenusukanulangpenusukanulangnama = ''; 
$txtdonorlamapengambilan = ''; 
$lamapengambilan_list = "";$txtlamapengambilanlamapengambilannama = ''; 
$txtdonornokantong = ''; 
$txtdonornokantong1 = ''; 
$txtdonornokantong2 = ''; 

        
        $qry = "select * from vw_ref_donorlist where row_id = '".$txtrowid."'";
        $rs = getByQuery($qry);
        if($rs != "") {
                $txtdonorid = $rs[0]->donor_id; 
$txtdonornoktp = $rs[0]->donor_noktp; 
$txtdonornamalengkap = $rs[0]->donor_namalengkap; 
$txtdonorjeniskelamin = $rs[0]->donor_jeniskelamin; 
$txtjeniskelaminjeniskelaminnama = $rs[0]->jeniskelamin_jeniskelamin_nama; 
$txtdonorstatus = $rs[0]->donor_status; 
$txtstatusstatusnama = $rs[0]->status_status_nama; 
$txtdonoralamatrumah = $rs[0]->donor_alamatrumah; 
$txtdonornohp = $rs[0]->donor_nohp; 
$txtdonorkelurahan = $rs[0]->donor_kelurahan; 
$txtkelurahankelurahannama = $rs[0]->kelurahan_kelurahan_nama; 
$txtdonorkecamatan = $rs[0]->donor_kecamatan; 
$txtkecamatankecamatannama = $rs[0]->kecamatan_kecamatan_nama; 
$txtdonorwilayah = $rs[0]->donor_wilayah; 
$txtwilayahwilayahnama = $rs[0]->wilayah_wilayah_nama; 
$txtdonoralamatkantor = $rs[0]->donor_alamatkantor; 
$txtdonorpekerjaan = $rs[0]->donor_pekerjaan; 
$txtpekerjaanpekerjaannama = $rs[0]->pekerjaan_pekerjaan_nama; 
$txtdonortempatlahir = $rs[0]->donor_tempatlahir; 
$txtdonorapharesis = $rs[0]->donor_apharesis; 
$txtapharesisapharesisnama = $rs[0]->apharesis_apharesis_nama; 
$txtdonorpenghargaan = $rs[0]->donor_penghargaan; 
$txtpenghargaanpenghargaannama = $rs[0]->penghargaan_penghargaan_nama; 
$txtdonorpuasa = $rs[0]->donor_puasa; 
$txtpuasapuasanama = $rs[0]->puasa_puasa_nama; 
$txtdonorbutuh = $rs[0]->donor_butuh; 
$txtbutuhbutuhnama = $rs[0]->butuh_butuh_nama; 
$txtdonorterakhir = date('Y-m-d', strtotime($rs[0]->donor_terakhir)); 
$txtdonorke = $rs[0]->donor_ke; 
$txtdonordokter = $rs[0]->donor_dokter; 
$txtdokterdokternama = $rs[0]->dokter_dokter_nama; 
$txtdonorriwayatmedis = $rs[0]->donor_riwayatmedis; 
$txtdonordiambilsebanyak = $rs[0]->donor_diambilsebanyak; 
$txtdiambilsebanyakdiambilsebanyaknama = $rs[0]->diambilsebanyak_diambilsebanyak_nama; 
$txtdonorkantong = $rs[0]->donor_kantong; 
$txtkantongkantongnama = $rs[0]->kantong_kantong_nama; 
$txtdonortekanandarah = $rs[0]->donor_tekanandarah; 
$txtdonorkodetekanandarah = $rs[0]->donor_kodetekanandarah; 
$txtdonornadi = $rs[0]->donor_nadi; 
$txtdonorberatbadan = $rs[0]->donor_beratbadan; 
$txtdonorkodeberatbadan = $rs[0]->donor_kodeberatbadan; 
$txtdonortinggibadan = $rs[0]->donor_tinggibadan; 
$txtdonorkodetinggibadan = $rs[0]->donor_kodetinggibadan; 
$txtdonorsuhu = $rs[0]->donor_suhu; 
$txtdonorkodesuhu = $rs[0]->donor_kodesuhu; 
$txtdonorkeadaanumum = $rs[0]->donor_keadaanumum; 
$txtdonorpetugasadministrasi = $rs[0]->donor_petugasadministrasi; 
$txtpetugasadministrasipetugasadministrasinama = $rs[0]->petugasadministrasi_petugasadministrasi_nama; 
$txtdonorpetugashb = $rs[0]->donor_petugashb; 
$txtpetugashbpetugashbnama = $rs[0]->petugashb_petugashb_nama; 
$txtdonormacamdonor = $rs[0]->donor_macamdonor; 
$txtmacamdonormacamdonornama = $rs[0]->macamdonor_macamdonor_nama; 
$txtdonormetode = $rs[0]->donor_metode; 
$txtmetodeambildarahmetodenama = $rs[0]->metode_ambil_darah_metode_nama; 
$txtdonorhb = $rs[0]->donor_hb; 
$txtdonorgoldar = $rs[0]->donor_goldar; 
$txtgoldargoldarnama = $rs[0]->goldar_goldar_nama; 
$txtdonorpetugasaftar = $rs[0]->donor_petugasaftar; 
$txtpetugasaftarpetugasaftarnama = $rs[0]->petugasaftar_petugasaftar_nama; 
$txtdonorlengan = $rs[0]->donor_lengan; 
$txtlenganlengannama = $rs[0]->lengan_lengan_nama; 
$txtdonorkodekantong = $rs[0]->donor_kodekantong; 
$txtdonorpenusukanulang = $rs[0]->donor_penusukanulang; 
$txtpenusukanulangpenusukanulangnama = $rs[0]->penusukanulang_penusukanulang_nama; 
$txtdonorlamapengambilan = $rs[0]->donor_lamapengambilan; 
$txtlamapengambilanlamapengambilannama = $rs[0]->lamapengambilan_lamapengambilan_nama; 
$txtdonornokantong = $rs[0]->donor_nokantong; 
$txtdonornokantong1 = $rs[0]->donor_nokantong1; 
$txtdonornokantong2 = $rs[0]->donor_nokantong2; 

        }        

        $table = '
            <table id="tablelist" class="table table-striped">
              <tbody>
                
                    <tr>
                        <td class="view-title" style="width: 30%">No Kartu Donor:</td>
                        <td class="view-txt">'.$txtdonorid.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">No KTP:</td>
                        <td class="view-txt">'.$txtdonornoktp.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Nama Lengkap:</td>
                        <td class="view-txt">'.$txtdonornamalengkap.'</td>
                    </tr>
                  
                  <tr>
                      <td class="view-title" style="width: 30%">Jenis Kelamin:</td>
                      <td class="view-txt">'.$txtjeniskelaminjeniskelaminnama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Status:</td>
                      <td class="view-txt">'.$txtstatusstatusnama.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Alamat Rumah:</td>
                        <td class="view-txt">'.$txtdonoralamatrumah.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">No HP:</td>
                        <td class="view-txt">'.$txtdonornohp.'</td>
                    </tr>
                  
                  <tr>
                      <td class="view-title" style="width: 30%">Kelurahan:</td>
                      <td class="view-txt">'.$txtkelurahankelurahannama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Kecamatan:</td>
                      <td class="view-txt">'.$txtkecamatankecamatannama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Wilayah:</td>
                      <td class="view-txt">'.$txtwilayahwilayahnama.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Alamat Kantor:</td>
                        <td class="view-txt">'.$txtdonoralamatkantor.'</td>
                    </tr>
                  
                  <tr>
                      <td class="view-title" style="width: 30%">Pekerjaan:</td>
                      <td class="view-txt">'.$txtpekerjaanpekerjaannama.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Tempat Kelahiran:</td>
                        <td class="view-txt">'.$txtdonortempatlahir.'</td>
                    </tr>
                  
                  <tr>
                      <td class="view-title" style="width: 30%">Apharesis:</td>
                      <td class="view-txt">'.$txtapharesisapharesisnama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Penghargaan:</td>
                      <td class="view-txt">'.$txtpenghargaanpenghargaannama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Puasa:</td>
                      <td class="view-txt">'.$txtpuasapuasanama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Donor Saat Dibutuhkan:</td>
                      <td class="view-txt">'.$txtbutuhbutuhnama.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Donor Terakhir:</td>
                        <td class="view-txt">'.$txtdonorterakhir.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Donor Ke:</td>
                        <td class="view-txt">'.$txtdonorke.'</td>
                    </tr>
                  
                  <tr>
                      <td class="view-title" style="width: 30%">Nama Dokter:</td>
                      <td class="view-txt">'.$txtdokterdokternama.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Riwayat Medis:</td>
                        <td class="view-txt">'.$txtdonorriwayatmedis.'</td>
                    </tr>
                  
                  <tr>
                      <td class="view-title" style="width: 30%">Diambil Sebanyak:</td>
                      <td class="view-txt">'.$txtdiambilsebanyakdiambilsebanyaknama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Kantong:</td>
                      <td class="view-txt">'.$txtkantongkantongnama.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Tekanan Darah:</td>
                        <td class="view-txt">'.$txtdonortekanandarah.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Kode Alat Tekanan Darah:</td>
                        <td class="view-txt">'.$txtdonorkodetekanandarah.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Nadi:</td>
                        <td class="view-txt">'.$txtdonornadi.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Berat Badan (kg):</td>
                        <td class="view-txt">'.$txtdonorberatbadan.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Kode Alat Berat Badan:</td>
                        <td class="view-txt">'.$txtdonorkodeberatbadan.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Tinggi Badan (cm):</td>
                        <td class="view-txt">'.$txtdonortinggibadan.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Kode Alat Tinggi Badan:</td>
                        <td class="view-txt">'.$txtdonorkodetinggibadan.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Suhu (Celcius):</td>
                        <td class="view-txt">'.$txtdonorsuhu.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Kode Alat Suhu :</td>
                        <td class="view-txt">'.$txtdonorkodesuhu.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Keadaan Umum:</td>
                        <td class="view-txt">'.$txtdonorkeadaanumum.'</td>
                    </tr>
                  
                  <tr>
                      <td class="view-title" style="width: 30%">Petugas Administrasi:</td>
                      <td class="view-txt">'.$txtpetugasadministrasipetugasadministrasinama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Petugas Hemoglobin:</td>
                      <td class="view-txt">'.$txtpetugashbpetugashbnama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Macam Donor:</td>
                      <td class="view-txt">'.$txtmacamdonormacamdonornama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Metode Pengambilan Darah:</td>
                      <td class="view-txt">'.$txtmetodeambildarahmetodenama.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Kadar Hb (g/dL):</td>
                        <td class="view-txt">'.$txtdonorhb.'</td>
                    </tr>
                  
                  <tr>
                      <td class="view-title" style="width: 30%">Golongan Darah:</td>
                      <td class="view-txt">'.$txtgoldargoldarnama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Petugas Aftap:</td>
                      <td class="view-txt">'.$txtpetugasaftarpetugasaftarnama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Lengan:</td>
                      <td class="view-txt">'.$txtlenganlengannama.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Kode Timbangan Kantong:</td>
                        <td class="view-txt">'.$txtdonorkodekantong.'</td>
                    </tr>
                  
                  <tr>
                      <td class="view-title" style="width: 30%">Penusukan Ulang Ganti Kantong:</td>
                      <td class="view-txt">'.$txtpenusukanulangpenusukanulangnama.'</td>
                  </tr>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Lama Pengambilan:</td>
                      <td class="view-txt">'.$txtlamapengambilanlamapengambilannama.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">No Kantong:</td>
                        <td class="view-txt">'.$txtdonornokantong.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">No Kantong Ganti 1:</td>
                        <td class="view-txt">'.$txtdonornokantong1.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">No Kantong Ganti 2:</td>
                        <td class="view-txt">'.$txtdonornokantong2.'</td>
                    </tr>
                  
              </tbody>
            </table>
        ';

        $data['table'] = $table;
        echo json_encode($data);
    }

    public function save()
    {
        $txtstate = $this->input->post("txtstate");
        $txtrowid = $this->input->post("txtrowid");
        $txtdonorid = $this->input->post("txtdonorid"); $txtdonornoktp = $this->input->post("txtdonornoktp"); $txtdonornamalengkap = $this->input->post("txtdonornamalengkap"); $txtdonorjeniskelamin = $this->input->post("txtdonorjeniskelamin"); $txtdonorstatus = $this->input->post("txtdonorstatus"); $txtdonoralamatrumah = $this->input->post("txtdonoralamatrumah"); $txtdonornohp = $this->input->post("txtdonornohp"); $txtdonorkelurahan = $this->input->post("txtdonorkelurahan"); $txtdonorkecamatan = $this->input->post("txtdonorkecamatan"); $txtdonorwilayah = $this->input->post("txtdonorwilayah"); $txtdonoralamatkantor = $this->input->post("txtdonoralamatkantor"); $txtdonorpekerjaan = $this->input->post("txtdonorpekerjaan"); $txtdonortempatlahir = $this->input->post("txtdonortempatlahir"); $txtdonorapharesis = $this->input->post("txtdonorapharesis"); $txtdonorpenghargaan = $this->input->post("txtdonorpenghargaan"); $txtdonorpuasa = $this->input->post("txtdonorpuasa"); $txtdonorbutuh = $this->input->post("txtdonorbutuh"); $txtdonorterakhir = $this->input->post("txtdonorterakhir"); $txtdonorke = $this->input->post("txtdonorke"); $txtdonordokter = $this->input->post("txtdonordokter"); $txtdonorriwayatmedis = $this->input->post("txtdonorriwayatmedis"); $txtdonordiambilsebanyak = $this->input->post("txtdonordiambilsebanyak"); $txtdonorkantong = $this->input->post("txtdonorkantong"); $txtdonortekanandarah = $this->input->post("txtdonortekanandarah"); $txtdonorkodetekanandarah = $this->input->post("txtdonorkodetekanandarah"); $txtdonornadi = $this->input->post("txtdonornadi"); $txtdonorberatbadan = $this->input->post("txtdonorberatbadan"); $txtdonorkodeberatbadan = $this->input->post("txtdonorkodeberatbadan"); $txtdonortinggibadan = $this->input->post("txtdonortinggibadan"); $txtdonorkodetinggibadan = $this->input->post("txtdonorkodetinggibadan"); $txtdonorsuhu = $this->input->post("txtdonorsuhu"); $txtdonorkodesuhu = $this->input->post("txtdonorkodesuhu"); $txtdonorkeadaanumum = $this->input->post("txtdonorkeadaanumum"); $txtdonorpetugasadministrasi = $this->input->post("txtdonorpetugasadministrasi"); $txtdonorpetugashb = $this->input->post("txtdonorpetugashb"); $txtdonormacamdonor = $this->input->post("txtdonormacamdonor"); $txtdonormetode = $this->input->post("txtdonormetode"); $txtdonorhb = $this->input->post("txtdonorhb"); $txtdonorgoldar = $this->input->post("txtdonorgoldar"); $txtdonorpetugasaftar = $this->input->post("txtdonorpetugasaftar"); $txtdonorlengan = $this->input->post("txtdonorlengan"); $txtdonorkodekantong = $this->input->post("txtdonorkodekantong"); $txtdonorpenusukanulang = $this->input->post("txtdonorpenusukanulang"); $txtdonorlamapengambilan = $this->input->post("txtdonorlamapengambilan"); $txtdonornokantong = $this->input->post("txtdonornokantong"); $txtdonornokantong1 = $this->input->post("txtdonornokantong1"); $txtdonornokantong2 = $this->input->post("txtdonornokantong2"); 
        

        if($txtstate == 'add')
        {
            $insert = array(
                'donor_id' => $txtdonorid, 'donor_noktp' => $txtdonornoktp, 'donor_namalengkap' => $txtdonornamalengkap, 'donor_jeniskelamin' => $txtdonorjeniskelamin, 'donor_status' => $txtdonorstatus, 'donor_alamatrumah' => $txtdonoralamatrumah, 'donor_nohp' => $txtdonornohp, 'donor_kelurahan' => $txtdonorkelurahan, 'donor_kecamatan' => $txtdonorkecamatan, 'donor_wilayah' => $txtdonorwilayah, 'donor_alamatkantor' => $txtdonoralamatkantor, 'donor_pekerjaan' => $txtdonorpekerjaan, 'donor_tempatlahir' => $txtdonortempatlahir, 'donor_apharesis' => $txtdonorapharesis, 'donor_penghargaan' => $txtdonorpenghargaan, 'donor_puasa' => $txtdonorpuasa, 'donor_butuh' => $txtdonorbutuh, 'donor_terakhir' => date("Y-m-d H:i:s", strtotime($txtdonorterakhir)), 'donor_ke' => $txtdonorke, 'donor_dokter' => $txtdonordokter, 'donor_riwayatmedis' => $txtdonorriwayatmedis, 'donor_diambilsebanyak' => $txtdonordiambilsebanyak, 'donor_kantong' => $txtdonorkantong, 'donor_tekanandarah' => $txtdonortekanandarah, 'donor_kodetekanandarah' => $txtdonorkodetekanandarah, 'donor_nadi' => $txtdonornadi, 'donor_beratbadan' => $txtdonorberatbadan, 'donor_kodeberatbadan' => $txtdonorkodeberatbadan, 'donor_tinggibadan' => $txtdonortinggibadan, 'donor_kodetinggibadan' => $txtdonorkodetinggibadan, 'donor_suhu' => $txtdonorsuhu, 'donor_kodesuhu' => $txtdonorkodesuhu, 'donor_keadaanumum' => $txtdonorkeadaanumum, 'donor_petugasadministrasi' => $txtdonorpetugasadministrasi, 'donor_petugashb' => $txtdonorpetugashb, 'donor_macamdonor' => $txtdonormacamdonor, 'donor_metode' => $txtdonormetode, 'donor_hb' => $txtdonorhb, 'donor_goldar' => $txtdonorgoldar, 'donor_petugasaftar' => $txtdonorpetugasaftar, 'donor_lengan' => $txtdonorlengan, 'donor_kodekantong' => $txtdonorkodekantong, 'donor_penusukanulang' => $txtdonorpenusukanulang, 'donor_lamapengambilan' => $txtdonorlamapengambilan, 'donor_nokantong' => $txtdonornokantong, 'donor_nokantong1' => $txtdonornokantong1, 'donor_nokantong2' => $txtdonornokantong2,         
            );
            insertData($this->table_db, $insert);
            $data['msg'] = "Process successful";
            $data['type'] = 1;
            echo json_encode($data);
        }
        else
        {            
            $update = array(
                'donor_id' => $txtdonorid, 'donor_noktp' => $txtdonornoktp, 'donor_namalengkap' => $txtdonornamalengkap, 'donor_jeniskelamin' => $txtdonorjeniskelamin, 'donor_status' => $txtdonorstatus, 'donor_alamatrumah' => $txtdonoralamatrumah, 'donor_nohp' => $txtdonornohp, 'donor_kelurahan' => $txtdonorkelurahan, 'donor_kecamatan' => $txtdonorkecamatan, 'donor_wilayah' => $txtdonorwilayah, 'donor_alamatkantor' => $txtdonoralamatkantor, 'donor_pekerjaan' => $txtdonorpekerjaan, 'donor_tempatlahir' => $txtdonortempatlahir, 'donor_apharesis' => $txtdonorapharesis, 'donor_penghargaan' => $txtdonorpenghargaan, 'donor_puasa' => $txtdonorpuasa, 'donor_butuh' => $txtdonorbutuh, 'donor_terakhir' => date("Y-m-d H:i:s", strtotime($txtdonorterakhir)), 'donor_ke' => $txtdonorke, 'donor_dokter' => $txtdonordokter, 'donor_riwayatmedis' => $txtdonorriwayatmedis, 'donor_diambilsebanyak' => $txtdonordiambilsebanyak, 'donor_kantong' => $txtdonorkantong, 'donor_tekanandarah' => $txtdonortekanandarah, 'donor_kodetekanandarah' => $txtdonorkodetekanandarah, 'donor_nadi' => $txtdonornadi, 'donor_beratbadan' => $txtdonorberatbadan, 'donor_kodeberatbadan' => $txtdonorkodeberatbadan, 'donor_tinggibadan' => $txtdonortinggibadan, 'donor_kodetinggibadan' => $txtdonorkodetinggibadan, 'donor_suhu' => $txtdonorsuhu, 'donor_kodesuhu' => $txtdonorkodesuhu, 'donor_keadaanumum' => $txtdonorkeadaanumum, 'donor_petugasadministrasi' => $txtdonorpetugasadministrasi, 'donor_petugashb' => $txtdonorpetugashb, 'donor_macamdonor' => $txtdonormacamdonor, 'donor_metode' => $txtdonormetode, 'donor_hb' => $txtdonorhb, 'donor_goldar' => $txtdonorgoldar, 'donor_petugasaftar' => $txtdonorpetugasaftar, 'donor_lengan' => $txtdonorlengan, 'donor_kodekantong' => $txtdonorkodekantong, 'donor_penusukanulang' => $txtdonorpenusukanulang, 'donor_lamapengambilan' => $txtdonorlamapengambilan, 'donor_nokantong' => $txtdonornokantong, 'donor_nokantong1' => $txtdonornokantong1, 'donor_nokantong2' => $txtdonornokantong2,              
            );
            updateData($this->table_db, $update, "row_id = '".$txtrowid."'", $txtrowid);
            $data['msg'] = "Process successful";
            $data['type'] = 1;
            echo json_encode($data);
        }
    }

    public function delete(){
        $txtrowid = $this->input->post("txtrowid");
        
        deleteData($this->table_db, "row_id = '".$txtrowid."'");
        $data['msg'] = "Process successful";
        $data['type'] = 1;
        echo json_encode($data);
    }
}	