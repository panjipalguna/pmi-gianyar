<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Petugasaftar extends CI_Controller {
    function __construct() {
        parent::__construct();
        islogin();
    }

    public $table_db = "petugasaftar";
    public $controller = "petugasaftar";
    
    public function index() {
        $lbl_controller = str_replace("_", " ", $this->controller);
        $page_url = site_url($this->controller);
		$data = array(
            'controller' => $this->controller,
            'lbl_controller' => $lbl_controller,
            'page_url' => $page_url,
            
        );
        $this->layout->display('page/petugasaftar_vw', $data);
    }

    public function gridview() {
        $where = $this->input->post("where");        
        $database = "default";
        $column = array('row_id', 'petugasaftar_nama', 'petugasaftar_no_hp', 'petugasaftar_alamat');
        $table = "petugasaftar";
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
            $row[] = '<div style="text-align:center">'.$line->petugasaftar_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->petugasaftar_no_hp.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->petugasaftar_alamat.'</div>'; 

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
        $txtpetugasaftarnama = ''; 
$txtpetugasaftarnohp = ''; 
$txtpetugasaftaralamat = ''; 


        if($txtstate == "edit") {
            $qry = "select * from petugasaftar where row_id = '".$txtrowid."'";
            $rs = getByQuery($qry);
            if($rs != "") {
                $txtpetugasaftarnama = $rs[0]->petugasaftar_nama; 
$txtpetugasaftarnohp = $rs[0]->petugasaftar_no_hp; 
$txtpetugasaftaralamat = $rs[0]->petugasaftar_alamat; 

            }
        }

        

        $table = '
            <div class="row">
                <form method="POST" class="formInput" enctype="multipart/form-data">
                    <input type="hidden" id="txtrowid" name="txtrowid" class="form-control" value="'.$txtrowid.'" style="background:#fff" readonly />
                    <input type="hidden" id="txtstate" name="txtstate" class="form-control" value="'.$txtstate.'" />
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Petugas Aftar: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtpetugasaftarnama" name="txtpetugasaftarnama" class="form-control" value="'.$txtpetugasaftarnama.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No HP Petugas Aftar: <span style="color: #ff0000">*</span></label>
                        <input type="number" step="1" " id="txtpetugasaftarnohp" name="txtpetugasaftarnohp" class="form-control" value="'.$txtpetugasaftarnohp.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Petugas Aftar: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtpetugasaftaralamat" name="txtpetugasaftaralamat" class="form-control" value="'.$txtpetugasaftaralamat.'" />
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
        $txtpetugasaftarnama = ''; 
$txtpetugasaftarnohp = ''; 
$txtpetugasaftaralamat = ''; 

        
        $qry = "select * from petugasaftar where row_id = '".$txtrowid."'";
        $rs = getByQuery($qry);
        if($rs != "") {
                $txtpetugasaftarnama = $rs[0]->petugasaftar_nama; 
$txtpetugasaftarnohp = $rs[0]->petugasaftar_no_hp; 
$txtpetugasaftaralamat = $rs[0]->petugasaftar_alamat; 

        }        

        $table = '
            <table id="tablelist" class="table table-striped">
              <tbody>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Nama Petugas Aftar:</td>
                        <td class="view-txt">'.$txtpetugasaftarnama.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">No HP Petugas Aftar:</td>
                        <td class="view-txt">'.$txtpetugasaftarnohp.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Alamat Petugas Aftar:</td>
                        <td class="view-txt">'.$txtpetugasaftaralamat.'</td>
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
        $txtpetugasaftarnama = $this->input->post("txtpetugasaftarnama"); $txtpetugasaftarnohp = $this->input->post("txtpetugasaftarnohp"); $txtpetugasaftaralamat = $this->input->post("txtpetugasaftaralamat"); 
        

        if($txtstate == 'add')
        {
            $insert = array(
                'petugasaftar_nama' => $txtpetugasaftarnama, 'petugasaftar_no_hp' => $txtpetugasaftarnohp, 'petugasaftar_alamat' => $txtpetugasaftaralamat,         
            );
            insertData($this->table_db, $insert);
            $data['msg'] = "Process successful";
            $data['type'] = 1;
            echo json_encode($data);
        }
        else
        {            
            $update = array(
                'petugasaftar_nama' => $txtpetugasaftarnama, 'petugasaftar_no_hp' => $txtpetugasaftarnohp, 'petugasaftar_alamat' => $txtpetugasaftaralamat,              
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