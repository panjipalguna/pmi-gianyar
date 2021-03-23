<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class [{CONTROLLER_UCFIRST}] extends CI_Controller {
    function __construct() {
        parent::__construct();
        islogin();
    }

    public $table_db = "[{TABLE}]";
    public $controller = "[{CONTROLLER}]";
    
    public function index() {
        $lbl_controller = str_replace("_", " ", $this->controller);
        $page_url = site_url($this->controller);
		$data = array(
            'controller' => $this->controller,
            'lbl_controller' => $lbl_controller,
            'page_url' => $page_url,
            [{GRIDVIEW_RS_FILTER}]
        );
        $this->layout->display('page/[{CONTROLLER}]_vw', $data);
    }

    public function gridview() {
        $where = $this->input->post("where");        
        $database = "default";
        $column = array([{GRIDVIEW_COLUMN}]);
        $table = "[{TABLE_VIEW}]";
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
            [{GRIDVIEW_ROW}]
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
        [{FORM_DECLARE_PARAMETER}]

        if($txtstate == "edit") {
            $qry = "select * from [{TABLE_VIEW}] where row_id = '".$txtrowid."'";
            $rs = getByQuery($qry);
            if($rs != "") {
                [{FORM_PARAMETER_VALUE}]
            }
        }

        [{FORM_RELATION_FIELD}]

        $table = '
            <div class="row">
                <form method="POST" class="formInput" enctype="multipart/form-data">
                    <input type="hidden" id="txtrowid" name="txtrowid" class="form-control" value="'.$txtrowid.'" style="background:#fff" readonly />
                    <input type="hidden" id="txtstate" name="txtstate" class="form-control" value="'.$txtstate.'" />
                    [{FORM_INPUT_FIELD}]
                </form>
            </div>
        ';

        $data['table'] = $table;
        echo json_encode($data);
    }

    public function view() {
        $txtrowid = $this->input->post("txtrowid");
        [{FORM_DECLARE_PARAMETER}]
        
        $qry = "select * from [{TABLE_VIEW}] where row_id = '".$txtrowid."'";
        $rs = getByQuery($qry);
        if($rs != "") {
                [{FORM_PARAMETER_VALUE}]
        }        

        $table = '
            <table id="tablelist" class="table table-striped">
              <tbody>
                [{FORM_VIEW_FIELD}]
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
        [{SAVE_PARAMETER_VALUE}]
        [{SAVE_INPUT_FILE}]

        if($txtstate == 'add')
        {
            $insert = array(
                [{SAVE_INPUT_FIELD}]        
            );
            insertData($this->table_db, $insert);
            $data['msg'] = "Process successful";
            $data['type'] = 1;
            echo json_encode($data);
        }
        else
        {            
            $update = array(
                [{SAVE_INPUT_FIELD}]             
            );
            updateData($this->table_db, $update, "row_id = '".$txtrowid."'", $txtrowid);
            $data['msg'] = "Process successful";
            $data['type'] = 1;
            echo json_encode($data);
        }
    }

    public function delete(){
        $txtrowid = $this->input->post("txtrowid");
        [{UNLINK_FILE}]
        deleteData($this->table_db, "row_id = '".$txtrowid."'");
        $data['msg'] = "Process successful";
        $data['type'] = 1;
        echo json_encode($data);
    }
}	