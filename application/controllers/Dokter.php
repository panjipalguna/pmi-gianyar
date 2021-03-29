<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends CI_Controller {
    function __construct() {
        parent::__construct();
        islogin();
    }

    public $table_db = "dokter";
    public $controller = "Dokter";
    
    public function index() {
        $lbl_controller = str_replace("_", " ", $this->controller);
        $page_url = site_url($this->controller);
		$data = array(
            'controller' => $this->controller,
            'lbl_controller' => $lbl_controller,
            'page_url' => $page_url,
            
        );
        $this->layout->display('page/dokter_vw', $data);
    }

    public function gridview() {
        $where = $this->input->post("where");        
        $database = "default";
        $column = array('row_id', 'dokter_nama', 'dokter_alamat', 'dokter_alamatkantor', 'dokter_instansi', 'dokter_foto');
        $table = "dokter";
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
            $row[] = '<div style="text-align:center">'.$line->dokter_nama.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->dokter_alamat.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->dokter_alamatkantor.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->dokter_instansi.'</div>'; 

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
        $txtdokternama = ''; 
$txtdokteralamat = ''; 
$txtdokteralamatkantor = ''; 
$txtdokterinstansi = ''; 
$txtdokterfoto = ''; 


        if($txtstate == "edit") {
            $qry = "select * from dokter where row_id = '".$txtrowid."'";
            $rs = getByQuery($qry);
            if($rs != "") {
                $txtdokternama = $rs[0]->dokter_nama; 
$txtdokteralamat = $rs[0]->dokter_alamat; 
$txtdokteralamatkantor = $rs[0]->dokter_alamatkantor; 
$txtdokterinstansi = $rs[0]->dokter_instansi; 
$txtdokterfoto = $rs[0]->dokter_foto; 
$txtdokterfoto_hdn = $rs[0]->dokter_foto; 

            }
        }

        

        $table = '
            <div class="row">
                <form method="POST" class="formInput" enctype="multipart/form-data">
                    <input type="hidden" id="txtrowid" name="txtrowid" class="form-control" value="'.$txtrowid.'" style="background:#fff" readonly />
                    <input type="hidden" id="txtstate" name="txtstate" class="form-control" value="'.$txtstate.'" />
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Dokter: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtdokternama" name="txtdokternama" class="form-control" value="'.$txtdokternama.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Dokter: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtdokteralamat" name="txtdokteralamat" class="form-control" value="'.$txtdokteralamat.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Kantor: <span style="color: #ed3e8d">*</span></label>
                        <input type="text" id="txtdokteralamatkantor" name="txtdokteralamatkantor" class="form-control" value="'.$txtdokteralamatkantor.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Instansi : <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtdokterinstansi" name="txtdokterinstansi" class="form-control" value="'.$txtdokterinstansi.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Foto Dokter: <span style="color: #ff0000">*</span> <span style="font-size:10px">(leave it blank if you do not want to update)</span></label>
                        <input type="file" id="txtdokterfoto" name="txtdokterfoto" class="form-control" />
                        <input type="hidden" id="txtdokterfoto_hdn" name="txtdokterfoto_hdn" class="form-control" value="'.$txtdokterfoto.'" />
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
        $txtdokternama = ''; 
$txtdokteralamat = ''; 
$txtdokteralamatkantor = ''; 
$txtdokterinstansi = ''; 
$txtdokterfoto = ''; 

        
        $qry = "select * from dokter where row_id = '".$txtrowid."'";
        $rs = getByQuery($qry);
        if($rs != "") {
                $txtdokternama = $rs[0]->dokter_nama; 
$txtdokteralamat = $rs[0]->dokter_alamat; 
$txtdokteralamatkantor = $rs[0]->dokter_alamatkantor; 
$txtdokterinstansi = $rs[0]->dokter_instansi; 
$txtdokterfoto = $rs[0]->dokter_foto; 
$txtdokterfoto_hdn = $rs[0]->dokter_foto; 

        }        

        $table = '
            <table id="tablelist" class="table table-striped">
              <tbody>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Nama Dokter:</td>
                        <td class="view-txt">'.$txtdokternama.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Alamat Dokter:</td>
                        <td class="view-txt">'.$txtdokteralamat.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Alamat Kantor:</td>
                        <td class="view-txt">'.$txtdokteralamatkantor.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Instansi :</td>
                        <td class="view-txt">'.$txtdokterinstansi.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Foto Dokter:</td>
                        <td class="view-txt"><img style="width:100px" src="'.base_url("uploaded/".$txtdokterfoto).'" /></td>
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
        $txtdokternama = $this->input->post("txtdokternama"); $txtdokteralamat = $this->input->post("txtdokteralamat"); $txtdokteralamatkantor = $this->input->post("txtdokteralamatkantor"); $txtdokterinstansi = $this->input->post("txtdokterinstansi"); $txtdokterfoto = $this->input->post("txtdokterfoto"); $txtdokterfoto_hdn = $this->input->post("txtdokterfoto_hdn"); 
        
                $txtdokterfoto =  $txtdokterfoto_hdn;
                if($_FILES['txtdokterfoto']['name'] != '')
                {
                     $ext = pathinfo($_FILES['txtdokterfoto']['name'], PATHINFO_EXTENSION);
                     $file_name = date('YmdHis').'.'.$ext;
                     $config = array(
                        'upload_path' => 'uploaded',
                        'allowed_types' => 'gif|jpg|png|jpeg|pdf|docx|xls|xlsx|doc|txt',
                        'overwrite' => TRUE,
                        'file_name' =>  $file_name
                    );
                     $this->upload->initialize( $config);
                    if( $this->upload->do_upload('txtdokterfoto'))
                    {
                         $data = $this->upload->data();
                        $txtdokterfoto =  $file_name;
                        if($txtdokterfoto_hdn != '')
                          unlink('uploaded/'.$txtdokterfoto_hdn);
                    }
                    else
                    {
                        $data['msg'] = $this->upload->display_errors();
                        $data['type'] = 0;
                        echo json_encode($data);
                        exit();
                    }
                }
              

        if($txtstate == 'add')
        {
            $insert = array(
                'dokter_nama' => $txtdokternama, 'dokter_alamat' => $txtdokteralamat, 'dokter_alamatkantor' => $txtdokteralamatkantor, 'dokter_instansi' => $txtdokterinstansi, 'dokter_foto' => $txtdokterfoto,         
            );
            insertData($this->table_db, $insert);
            $data['msg'] = "Process successful";
            $data['type'] = 1;
            echo json_encode($data);
        }
        else
        {            
            $update = array(
                'dokter_nama' => $txtdokternama, 'dokter_alamat' => $txtdokteralamat, 'dokter_alamatkantor' => $txtdokteralamatkantor, 'dokter_instansi' => $txtdokterinstansi, 'dokter_foto' => $txtdokterfoto,              
            );
            updateData($this->table_db, $update, "row_id = '".$txtrowid."'", $txtrowid);
            $data['msg'] = "Process successful";
            $data['type'] = 1;
            echo json_encode($data);
        }
    }

    public function delete(){
        $txtrowid = $this->input->post("txtrowid");
        
                $rs_dokter = getByQuery("select * from dokter where row_id = ".$txtrowid);
                if($rs_dokter != "") {
                    foreach($rs_dokter as $row) {
                        unlink('uploaded/'.$row->dokter_foto); 

                    }
                }
              
        deleteData($this->table_db, "row_id = '".$txtrowid."'");
        $data['msg'] = "Process successful";
        $data['type'] = 1;
        echo json_encode($data);
    }
}	