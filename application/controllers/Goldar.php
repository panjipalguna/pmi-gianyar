<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Goldar extends CI_Controller {
    function __construct() {
        parent::__construct();
        islogin();
    }

    public $table_db = "goldar";
    public $controller = "Goldar";
    
    public function index() {
        $lbl_controller = str_replace("_", " ", $this->controller);
        $page_url = site_url($this->controller);
		$data = array(
            'controller' => $this->controller,
            'lbl_controller' => $lbl_controller,
            'page_url' => $page_url,
            
        );
        $this->layout->display('page/goldar_vw', $data);
    }

    public function gridview() {
        $where = $this->input->post("where");        
        $database = "default";
        $column = array('row_id', 'goldar_nama');
        $table = "goldar";
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
            $row[] = '<div style="text-align:center">'.$line->goldar_nama.'</div>'; 

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
        $txtgoldarnama = ''; 


        if($txtstate == "edit") {
            $qry = "select * from goldar where row_id = '".$txtrowid."'";
            $rs = getByQuery($qry);
            if($rs != "") {
                $txtgoldarnama = $rs[0]->goldar_nama; 

            }
        }

        

        $table = '
            <div class="row">
                <form method="POST" class="formInput" enctype="multipart/form-data">
                    <input type="hidden" id="txtrowid" name="txtrowid" class="form-control" value="'.$txtrowid.'" style="background:#fff" readonly />
                    <input type="hidden" id="txtstate" name="txtstate" class="form-control" value="'.$txtstate.'" />
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Golongan Darah: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtgoldarnama" name="txtgoldarnama" class="form-control" value="'.$txtgoldarnama.'" />
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
        $txtgoldarnama = ''; 

        
        $qry = "select * from goldar where row_id = '".$txtrowid."'";
        $rs = getByQuery($qry);
        if($rs != "") {
                $txtgoldarnama = $rs[0]->goldar_nama; 

        }        

        $table = '
            <table id="tablelist" class="table table-striped">
              <tbody>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Nama Golongan Darah:</td>
                        <td class="view-txt">'.$txtgoldarnama.'</td>
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
        $txtgoldarnama = $this->input->post("txtgoldarnama"); 
        

        if($txtstate == 'add')
        {
            $insert = array(
                'goldar_nama' => $txtgoldarnama,         
            );
            insertData($this->table_db, $insert);
            $data['msg'] = "Process successful";
            $data['type'] = 1;
            echo json_encode($data);
        }
        else
        {            
            $update = array(
                'goldar_nama' => $txtgoldarnama,              
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