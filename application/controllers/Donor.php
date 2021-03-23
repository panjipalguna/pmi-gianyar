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
                'rs_kelurahan' => getByQuery('select * from kelurahan'),
                'rs_kecamatan' => getByQuery('select * from kecamatan'),
                'rs_wilayah' => getByQuery('select * from wilayah'),
                'rs_pekerjaan' => getByQuery('select * from pekerjaan'),
                'rs_penghargaan' => getByQuery('select * from penghargaan'),
                'rs_puasa' => getByQuery('select * from puasa'),
                'rs_butuh' => getByQuery('select * from butuh'),
                
        );
        $this->layout->display('page/donor_vw', $data);
    }

    public function gridview() {
        $where = $this->input->post("where");        
        $database = "default";
        $column = array('row_id', 'donor_id', 'donor_no_ktp', 'donor_nama', 'donor_jenis_kelamin', 'donor_telepon', 'donor_kelurahan', 'donor_kecamatan', 'donor_wilayah', 'donor_alamat', 'donor_pekerjaan', 'donor_tempat_lahir', 'donor_tanggal_lahir', 'donor_penghargaan', 'donor_puasa', 'donor_butuh', 'donor_tanggal');
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
$row[] = '<div style="text-align:center">'.$line->donor_no_ktp.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->jeniskelamin_jeniskelamin_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_telepon.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->kelurahan_kelurahan_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->kecamatan_kecamatan_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->wilayah_wilayah_nama.'</div>'; 
$row[] = '<div style="text-align:left">'.$line->donor_alamat.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->pekerjaan_pekerjaan_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_tempat_lahir.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_tanggal_lahir.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->penghargaan_penghargaan_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->puasa_puasa_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->butuh_butuh_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->donor_tanggal.'</div>'; 

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
$txtdonornama = ''; 
$txtdonorjeniskelamin = ''; 
$jeniskelamin_list = "";$txtjeniskelaminjeniskelaminnama = ''; 
$txtdonortelepon = ''; 
$txtdonorkelurahan = ''; 
$kelurahan_list = "";$txtkelurahankelurahannama = ''; 
$txtdonorkecamatan = ''; 
$kecamatan_list = "";$txtkecamatankecamatannama = ''; 
$txtdonorwilayah = ''; 
$wilayah_list = "";$txtwilayahwilayahnama = ''; 
$txtdonoralamat = ''; 
$txtdonorpekerjaan = ''; 
$pekerjaan_list = "";$txtpekerjaanpekerjaannama = ''; 
$txtdonortempatlahir = ''; 
$txtdonortanggallahir = ''; 
$txtdonorpenghargaan = ''; 
$penghargaan_list = "";$txtpenghargaanpenghargaannama = ''; 
$txtdonorpuasa = ''; 
$puasa_list = "";$txtpuasapuasanama = ''; 
$txtdonorbutuh = ''; 
$butuh_list = "";$txtbutuhbutuhnama = ''; 
$txtdonortanggal = ''; 


        if($txtstate == "edit") {
            $qry = "select * from vw_ref_donorlist where row_id = '".$txtrowid."'";
            $rs = getByQuery($qry);
            if($rs != "") {
                $txtdonorid = $rs[0]->donor_id; 
$txtdonornoktp = $rs[0]->donor_no_ktp; 
$txtdonornama = $rs[0]->donor_nama; 
$txtdonorjeniskelamin = $rs[0]->donor_jenis_kelamin; 
$txtjeniskelaminjeniskelaminnama = $rs[0]->jeniskelamin_jeniskelamin_nama; 
$txtdonortelepon = $rs[0]->donor_telepon; 
$txtdonorkelurahan = $rs[0]->donor_kelurahan; 
$txtkelurahankelurahannama = $rs[0]->kelurahan_kelurahan_nama; 
$txtdonorkecamatan = $rs[0]->donor_kecamatan; 
$txtkecamatankecamatannama = $rs[0]->kecamatan_kecamatan_nama; 
$txtdonorwilayah = $rs[0]->donor_wilayah; 
$txtwilayahwilayahnama = $rs[0]->wilayah_wilayah_nama; 
$txtdonoralamat = $rs[0]->donor_alamat; 
$txtdonorpekerjaan = $rs[0]->donor_pekerjaan; 
$txtpekerjaanpekerjaannama = $rs[0]->pekerjaan_pekerjaan_nama; 
$txtdonortempatlahir = $rs[0]->donor_tempat_lahir; 
$txtdonortanggallahir = $rs[0]->donor_tanggal_lahir; 
$txtdonorpenghargaan = $rs[0]->donor_penghargaan; 
$txtpenghargaanpenghargaannama = $rs[0]->penghargaan_penghargaan_nama; 
$txtdonorpuasa = $rs[0]->donor_puasa; 
$txtpuasapuasanama = $rs[0]->puasa_puasa_nama; 
$txtdonorbutuh = $rs[0]->donor_butuh; 
$txtbutuhbutuhnama = $rs[0]->butuh_butuh_nama; 
$txtdonortanggal = $rs[0]->donor_tanggal; 

            }
        }

        
                  $rs_jeniskelamin = getByQuery("select * from jeniskelamin");
                  if($rs_jeniskelamin != "") {
                      foreach($rs_jeniskelamin as $row_jeniskelamin) {
                          $selected = ($row_jeniskelamin->jeniskelamin_id == $txtdonorjeniskelamin) ? "selected" : "";
                          $jeniskelamin_list .= "<option value='".$row_jeniskelamin->jeniskelamin_id."' ".$selected." >".$row_jeniskelamin->jeniskelamin_nama."</option>";
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
                

        $table = '
            <div class="row">
                <form method="POST" class="formInput" enctype="multipart/form-data">
                    <input type="hidden" id="txtrowid" name="txtrowid" class="form-control" value="'.$txtrowid.'" style="background:#fff" readonly />
                    <input type="hidden" id="txtstate" name="txtstate" class="form-control" value="'.$txtstate.'" />
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Donor: <span style="color: #ff0000">*</span></label>
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
                        <input type="text" id="txtdonornama" name="txtdonornama" class="form-control" value="'.$txtdonornama.'" />
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
                        <label>No Telepon: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtdonortelepon" name="txtdonortelepon" class="form-control" value="'.$txtdonortelepon.'" />
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
                        <label>Alamat: <span style="color: #ff0000">*</span></label>
                        <textarea id="txtdonoralamat" name="txtdonoralamat" rows="4" class="form-control">'.$txtdonoralamat.'</textarea>
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
                        <label>Tempat Lahir: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtdonortempatlahir" name="txtdonortempatlahir" class="form-control" value="'.$txtdonortempatlahir.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal Lahir: <span style="color: #ff0000">*</span></label>
                        <input type="date" id="txtdonortanggallahir" name="txtdonortanggallahir" class="form-control" value="'.$txtdonortanggallahir.'" />
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
                      <label>Kebutuhan: <span style="color: #ff0000">*</span></label>
                      <select id="txtdonorbutuh" name="txtdonorbutuh" class="form-control select2"  required>
                        <option value=""></option>
                        '.$butuh_list.'
                      </select>
                    </div>
                  </div>
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal dan Waktu Donor: <span style="color: #ff0000">*</span></label>
                        <input type="datetime-local" id="txtdonortanggal" name="txtdonortanggal" class="form-control" value="'.$txtdonortanggal.'" />
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
$txtdonornama = ''; 
$txtdonorjeniskelamin = ''; 
$jeniskelamin_list = "";$txtjeniskelaminjeniskelaminnama = ''; 
$txtdonortelepon = ''; 
$txtdonorkelurahan = ''; 
$kelurahan_list = "";$txtkelurahankelurahannama = ''; 
$txtdonorkecamatan = ''; 
$kecamatan_list = "";$txtkecamatankecamatannama = ''; 
$txtdonorwilayah = ''; 
$wilayah_list = "";$txtwilayahwilayahnama = ''; 
$txtdonoralamat = ''; 
$txtdonorpekerjaan = ''; 
$pekerjaan_list = "";$txtpekerjaanpekerjaannama = ''; 
$txtdonortempatlahir = ''; 
$txtdonortanggallahir = ''; 
$txtdonorpenghargaan = ''; 
$penghargaan_list = "";$txtpenghargaanpenghargaannama = ''; 
$txtdonorpuasa = ''; 
$puasa_list = "";$txtpuasapuasanama = ''; 
$txtdonorbutuh = ''; 
$butuh_list = "";$txtbutuhbutuhnama = ''; 
$txtdonortanggal = ''; 

        
        $qry = "select * from vw_ref_donorlist where row_id = '".$txtrowid."'";
        $rs = getByQuery($qry);
        if($rs != "") {
                $txtdonorid = $rs[0]->donor_id; 
$txtdonornoktp = $rs[0]->donor_no_ktp; 
$txtdonornama = $rs[0]->donor_nama; 
$txtdonorjeniskelamin = $rs[0]->donor_jenis_kelamin; 
$txtjeniskelaminjeniskelaminnama = $rs[0]->jeniskelamin_jeniskelamin_nama; 
$txtdonortelepon = $rs[0]->donor_telepon; 
$txtdonorkelurahan = $rs[0]->donor_kelurahan; 
$txtkelurahankelurahannama = $rs[0]->kelurahan_kelurahan_nama; 
$txtdonorkecamatan = $rs[0]->donor_kecamatan; 
$txtkecamatankecamatannama = $rs[0]->kecamatan_kecamatan_nama; 
$txtdonorwilayah = $rs[0]->donor_wilayah; 
$txtwilayahwilayahnama = $rs[0]->wilayah_wilayah_nama; 
$txtdonoralamat = $rs[0]->donor_alamat; 
$txtdonorpekerjaan = $rs[0]->donor_pekerjaan; 
$txtpekerjaanpekerjaannama = $rs[0]->pekerjaan_pekerjaan_nama; 
$txtdonortempatlahir = $rs[0]->donor_tempat_lahir; 
$txtdonortanggallahir = $rs[0]->donor_tanggal_lahir; 
$txtdonorpenghargaan = $rs[0]->donor_penghargaan; 
$txtpenghargaanpenghargaannama = $rs[0]->penghargaan_penghargaan_nama; 
$txtdonorpuasa = $rs[0]->donor_puasa; 
$txtpuasapuasanama = $rs[0]->puasa_puasa_nama; 
$txtdonorbutuh = $rs[0]->donor_butuh; 
$txtbutuhbutuhnama = $rs[0]->butuh_butuh_nama; 
$txtdonortanggal = $rs[0]->donor_tanggal; 

        }        

        $table = '
            <table id="tablelist" class="table table-striped">
              <tbody>
                
                    <tr>
                        <td class="view-title" style="width: 40%">Donor:</td>
                        <td class="view-txt">'.$txtdonorid.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">No KTP:</td>
                        <td class="view-txt">'.$txtdonornoktp.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Nama Lengkap:</td>
                        <td class="view-txt">'.$txtdonornama.'</td>
                    </tr>
                  
                  <tr>
                      <td class="view-title" style="width: 30%">Jenis Kelamin:</td>
                      <td class="view-txt">'.$txtjeniskelaminjeniskelaminnama.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">No Telepon:</td>
                        <td class="view-txt">'.$txtdonortelepon.'</td>
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
                        <td class="view-title" style="width: 30%">Alamat:</td>
                        <td class="view-txt">'.$txtdonoralamat.'</td>
                    </tr>
                  
                  <tr>
                      <td class="view-title" style="width: 30%">Pekerjaan:</td>
                      <td class="view-txt">'.$txtpekerjaanpekerjaannama.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Tempat Lahir:</td>
                        <td class="view-txt">'.$txtdonortempatlahir.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Tanggal Lahir:</td>
                        <td class="view-txt">'.$txtdonortanggallahir.'</td>
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
                      <td class="view-title" style="width: 30%">Kebutuhan:</td>
                      <td class="view-txt">'.$txtbutuhbutuhnama.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Tanggal Donor:</td>
                        <td class="view-txt">'.$txtdonortanggal.'</td>
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
        $txtdonorid = $this->input->post("txtdonorid"); $txtdonornoktp = $this->input->post("txtdonornoktp"); $txtdonornama = $this->input->post("txtdonornama"); $txtdonorjeniskelamin = $this->input->post("txtdonorjeniskelamin"); $txtdonortelepon = $this->input->post("txtdonortelepon"); $txtdonorkelurahan = $this->input->post("txtdonorkelurahan"); $txtdonorkecamatan = $this->input->post("txtdonorkecamatan"); $txtdonorwilayah = $this->input->post("txtdonorwilayah"); $txtdonoralamat = $this->input->post("txtdonoralamat"); $txtdonorpekerjaan = $this->input->post("txtdonorpekerjaan"); $txtdonortempatlahir = $this->input->post("txtdonortempatlahir"); $txtdonortanggallahir = $this->input->post("txtdonortanggallahir"); $txtdonorpenghargaan = $this->input->post("txtdonorpenghargaan"); $txtdonorpuasa = $this->input->post("txtdonorpuasa"); $txtdonorbutuh = $this->input->post("txtdonorbutuh"); $txtdonortanggal = $this->input->post("txtdonortanggal"); 
        

        if($txtstate == 'add')
        {
            $insert = array(
                'donor_id' => $txtdonorid, 'donor_no_ktp' => $txtdonornoktp, 'donor_nama' => $txtdonornama, 'donor_jenis_kelamin' => $txtdonorjeniskelamin, 'donor_telepon' => $txtdonortelepon, 'donor_kelurahan' => $txtdonorkelurahan, 'donor_kecamatan' => $txtdonorkecamatan, 'donor_wilayah' => $txtdonorwilayah, 'donor_alamat' => $txtdonoralamat, 'donor_pekerjaan' => $txtdonorpekerjaan, 'donor_tempat_lahir' => $txtdonortempatlahir, 'donor_tanggal_lahir' => $txtdonortanggallahir, 'donor_penghargaan' => $txtdonorpenghargaan, 'donor_puasa' => $txtdonorpuasa, 'donor_butuh' => $txtdonorbutuh, 'donor_tanggal' => $txtdonortanggal,         
            );
            insertData($this->table_db, $insert);
            $data['msg'] = "Process successful";
            $data['type'] = 1;
            echo json_encode($data);
        }
        else
        {            
            $update = array(
                'donor_id' => $txtdonorid, 'donor_no_ktp' => $txtdonornoktp, 'donor_nama' => $txtdonornama, 'donor_jenis_kelamin' => $txtdonorjeniskelamin, 'donor_telepon' => $txtdonortelepon, 'donor_kelurahan' => $txtdonorkelurahan, 'donor_kecamatan' => $txtdonorkecamatan, 'donor_wilayah' => $txtdonorwilayah, 'donor_alamat' => $txtdonoralamat, 'donor_pekerjaan' => $txtdonorpekerjaan, 'donor_tempat_lahir' => $txtdonortempatlahir, 'donor_tanggal_lahir' => $txtdonortanggallahir, 'donor_penghargaan' => $txtdonorpenghargaan, 'donor_puasa' => $txtdonorpuasa, 'donor_butuh' => $txtdonorbutuh, 'donor_tanggal' => $txtdonortanggal,              
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