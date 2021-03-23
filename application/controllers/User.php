<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        islogin();
    }
    
    public function index() {
		$data = array();
        $this->layout->display('page/user_vw', $data);
    }

    public function gridview() {
        $where = $this->input->post("where");
        
        $database = "default";
        $column = array('user_id', 'user_name', 'full_name');
        $table = "usertable";
        $list = $this->datatables_mdl->get_datatables($database, $table, $column, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $line) 
        {
            $no++;          
            $row = array();
            $id = md5($line->user_id);
            $link = '';
            if($line->user_id != 1) {
                $link = '
                    <div class="btn-group">
                      <a href="#" data-toggle="dropdown" style="color:#111"><i class="fa fa-folder-open"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#" style="color:#111" onclick="generateModalForm(\'edit\', \''.$line->user_id.'\')">Update</a></li>
                        <li><a href="#" style="color:#111" onclick="doDelete(\''.$line->user_id.'\')">Delete</a></li>
                      </ul>
                    </div>
                ';
            }
            $row[] = '<div style="text-align:center">'.$link.'</div>';
            $row[] = '<div style="text-align:left">'.$line->user_name.'</div>';
            $row[] = '<div style="text-align:left">'.$line->full_name.'</div>';
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

    public function save()
    {
        $txtid = $this->input->post("txtid");
        $txtstate = $this->input->post("txtstate");
        $txtusername = $this->input->post("txtusername");
        $txtfullname = $this->input->post("txtfullname");
        $txtpassword = $this->input->post("txtpassword");

        if($txtstate == 'add')
        {
            $insert = array(
                'user_name' => $txtusername,
                'full_name' => $txtfullname,
                'pswrd' => md5($txtpassword),
                'created_date' => date("Y-m-d H:i:s"), 
                'created_by' => userId()       
            );
            insertData("usertable", $insert);
            $data['msg'] = "Process successful";
            echo json_encode($insert);
        }
        else
        {            
            if($txtpassword != "") {
                $update = array(
                    'user_name' => $txtusername,
                    'full_name' => $txtfullname,
                    'pswrd' => md5($txtpassword),
                    'updated_date' => date("Y-m-d H:i:s"), 
                    'updated_by' => userId()              
                );                
            }
            else {
                $update = array(
                    'user_name' => $txtusername,
                    'full_name' => $txtfullname,
                    'updated_date' => date("Y-m-d H:i:s"), 
                    'updated_by' => userId()              
                ); 
            }

            updateData("usertable", $update, "user_id = '".$txtid."'");
            $data['msg'] = "Process successful";
            echo json_encode($data);
        }
    }

    public function form() {
        $txtstate = $this->input->post("txtstate");
        $txtid = $this->input->post("txtid");
        $user_name = "";
        $full_name = "";

        if($txtstate == "edit") {
            $qry = "select * from usertable where user_id = '".$txtid."'";
            $rs = getByQuery($qry);
            if($rs != "") {
                $user_name = $rs[0]->user_name;
                $full_name = $rs[0]->full_name;

            }
        }

        $table = '
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Fullname</label>
                  <input type="text" id="txtfullname" name="txtfullname" class="form-control" value="'.$full_name.'"/>
                  <input type="hidden" id="txtid" name="txtid" class="form-control" value="'.$txtid.'" />
                  <input type="hidden" id="txtstate" name="txtstate" class="form-control" value="'.$txtstate.'" />
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" id="txtusername" name="txtusername" class="form-control" value="'.$user_name.'"/>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" id="txtpassword" name="txtpassword" class="form-control" />
              </div>
            </div>
        ';

        $data['table'] = $table;
        echo json_encode($data);
    }

    public function delete(){
        $txtid = $this->input->post("txtid");
        deleteData("usertable", "user_id = '".$txtid."'");
        $data['msg'] = "Process successful";
        echo json_encode($data);
    }
}	