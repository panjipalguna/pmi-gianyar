<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {
    function __construct() {
        parent::__construct();
        islogin();
    }

    public $table_db = "employeetable";
    public $controller = "employee";
    
    public function index() {
        $lbl_controller = str_replace("_", " ", $this->controller);
        $page_url = site_url($this->controller);
		$data = array(
            'controller' => $this->controller,
            'lbl_controller' => $lbl_controller,
            'page_url' => $page_url,
            'rs_departmenttable' => getByQuery('select * from departmenttable'),
                
        );
        $this->layout->display('page/employee_vw', $data);
    }

    public function gridview() {
        $where = $this->input->post("where");        
        $database = "default";
        $column = array('row_id', 'department_id', 'name', 'address', 'hired_date', 'age', 'salary', 'photo');
        $table = "vw_employeetablelist";
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
            $row[] = '<div style="text-align:center">'.$line->departmenttable_name.'</div>'; 
$row[] = '<div style="text-align:center">'.$line->name.'</div>'; 
$row[] = '<div style="text-align:left">'.$line->address.'</div>'; 
$row[] = '<div style="text-align:center">'.date("m/d/Y", strtotime($line->hired_date)).'</div>'; 
$row[] = '<div style="text-align:center">'.$line->age.'</div>'; 
$row[] = '<div style="text-align:right">'.number_format($line->salary).'</div>'; 

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
        $txtdepartmentid = ''; 
$departmenttable_list = "";$txtdepartmenttablename = ''; 
$txtname = ''; 
$txtaddress = ''; 
$txthireddate = ''; 
$txtage = ''; 
$txtsalary = ''; 
$txtphoto = ''; 


        if($txtstate == "edit") {
            $qry = "select * from vw_employeetablelist where row_id = '".$txtrowid."'";
            $rs = getByQuery($qry);
            if($rs != "") {
                $txtdepartmentid = $rs[0]->department_id; 
$txtdepartmenttablename = $rs[0]->departmenttable_name; 
$txtname = $rs[0]->name; 
$txtaddress = $rs[0]->address; 
$txthireddate = date('Y-m-d', strtotime($rs[0]->hired_date)); 
$txtage = $rs[0]->age; 
$txtsalary = $rs[0]->salary; 
$txtphoto = $rs[0]->photo; 
$txtphoto_hdn = $rs[0]->photo; 

            }
        }

        
                  $rs_departmenttable = getByQuery("select * from departmenttable");
                  if($rs_departmenttable != "") {
                      foreach($rs_departmenttable as $row_departmenttable) {
                          $selected = ($row_departmenttable->row_id == $txtdepartmentid) ? "selected" : "";
                          $departmenttable_list .= "<option value='".$row_departmenttable->row_id."' ".$selected." >".$row_departmenttable->name."</option>";
                      }
                  }
                

        $table = '
            <div class="row">
                <form method="POST" class="formInput" enctype="multipart/form-data">
                    <input type="hidden" id="txtrowid" name="txtrowid" class="form-control" value="'.$txtrowid.'" style="background:#fff" readonly />
                    <input type="hidden" id="txtstate" name="txtstate" class="form-control" value="'.$txtstate.'" />
                    
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Department: <span style="color: #ff0000">*</span></label>
                      <select id="txtdepartmentid" name="txtdepartmentid" class="form-control select2"  required>
                        <option value=""></option>
                        '.$departmenttable_list.'
                      </select>
                    </div>
                  </div>
                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Employee Name: <span style="color: #ff0000">*</span></label>
                        <input type="text" id="txtname" name="txtname" class="form-control" value="'.$txtname.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Address:</label>
                        <textarea id="txtaddress" name="txtaddress" rows="4" class="form-control">'.$txtaddress.'</textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Hired Date:</label>
                        <input type="date" id="txthireddate" name="txthireddate" class="form-control" value="'.$txthireddate.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Age:</label>
                        <input type="number" step="1" " id="txtage" name="txtage" class="form-control" value="'.$txtage.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Salary:</label>
                        <input type="number" step="0.01" id="txtsalary" name="txtsalary" class="form-control" value="'.$txtsalary.'" />
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Photo: <span style="font-size:10px">(leave it blank if you do not want to update)</span></label>
                        <input type="file" id="txtphoto" name="txtphoto" class="form-control" />
                        <input type="hidden" id="txtphoto_hdn" name="txtphoto_hdn" class="form-control" value="'.$txtphoto.'" />
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
        $txtdepartmentid = ''; 
$departmenttable_list = "";$txtdepartmenttablename = ''; 
$txtname = ''; 
$txtaddress = ''; 
$txthireddate = ''; 
$txtage = ''; 
$txtsalary = ''; 
$txtphoto = ''; 

        
        $qry = "select * from vw_employeetablelist where row_id = '".$txtrowid."'";
        $rs = getByQuery($qry);
        if($rs != "") {
                $txtdepartmentid = $rs[0]->department_id; 
$txtdepartmenttablename = $rs[0]->departmenttable_name; 
$txtname = $rs[0]->name; 
$txtaddress = $rs[0]->address; 
$txthireddate = date('Y-m-d', strtotime($rs[0]->hired_date)); 
$txtage = $rs[0]->age; 
$txtsalary = $rs[0]->salary; 
$txtphoto = $rs[0]->photo; 
$txtphoto_hdn = $rs[0]->photo; 

        }        

        $table = '
            <table id="tablelist" class="table table-striped">
              <tbody>
                
                  <tr>
                      <td class="view-title" style="width: 30%">Department:</td>
                      <td class="view-txt">'.$txtdepartmenttablename.'</td>
                  </tr>
                
                    <tr>
                        <td class="view-title" style="width: 30%">Employee Name:</td>
                        <td class="view-txt">'.$txtname.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Address:</td>
                        <td class="view-txt">'.$txtaddress.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Hired Date:</td>
                        <td class="view-txt">'.$txthireddate.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Age:</td>
                        <td class="view-txt">'.$txtage.'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Salary:</td>
                        <td class="view-txt">'.number_format($txtsalary).'</td>
                    </tr>
                  
                    <tr>
                        <td class="view-title" style="width: 30%">Photo:</td>
                        <td class="view-txt"><img style="width:100px" src="'.base_url("uploaded/".$txtphoto).'" /></td>
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
        $txtdepartmentid = $this->input->post("txtdepartmentid"); $txtname = $this->input->post("txtname"); $txtaddress = $this->input->post("txtaddress"); $txthireddate = $this->input->post("txthireddate"); $txtage = $this->input->post("txtage"); $txtsalary = $this->input->post("txtsalary"); $txtphoto = $this->input->post("txtphoto"); $txtphoto_hdn = $this->input->post("txtphoto_hdn"); 
        
                $txtphoto =  $txtphoto_hdn;
                if($_FILES['txtphoto']['name'] != '')
                {
                     $ext = pathinfo($_FILES['txtphoto']['name'], PATHINFO_EXTENSION);
                     $file_name = date('YmdHis').'.'.$ext;
                     $config = array(
                        'upload_path' => 'uploaded',
                        'allowed_types' => 'gif|jpg|png|jpeg|pdf|docx|xls|xlsx|doc|txt',
                        'overwrite' => TRUE,
                        'file_name' =>  $file_name
                    );
                     $this->upload->initialize( $config);
                    if( $this->upload->do_upload('txtphoto'))
                    {
                         $data = $this->upload->data();
                        $txtphoto =  $file_name;
                        if($txtphoto_hdn != '')
                          unlink('uploaded/'.$txtphoto_hdn);
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
                'department_id' => $txtdepartmentid, 'name' => $txtname, 'address' => $txtaddress, 'hired_date' => date("Y-m-d H:i:s", strtotime($txthireddate)), 'age' => $txtage, 'salary' => $txtsalary, 'photo' => $txtphoto,         
            );
            insertData($this->table_db, $insert);
            $data['msg'] = "Process successful";
            $data['type'] = 1;
            echo json_encode($data);
        }
        else
        {            
            $update = array(
                'department_id' => $txtdepartmentid, 'name' => $txtname, 'address' => $txtaddress, 'hired_date' => date("Y-m-d H:i:s", strtotime($txthireddate)), 'age' => $txtage, 'salary' => $txtsalary, 'photo' => $txtphoto,              
            );
            updateData($this->table_db, $update, "row_id = '".$txtrowid."'", $txtrowid);
            $data['msg'] = "Process successful";
            $data['type'] = 1;
            echo json_encode($data);
        }
    }

    public function delete(){
        $txtrowid = $this->input->post("txtrowid");
        
                $rs_employeetable = getByQuery("select * from employeetable where row_id = ".$txtrowid);
                if($rs_employeetable != "") {
                    foreach($rs_employeetable as $row) {
                        unlink('uploaded/'.$row->photo); 

                    }
                }
              
        deleteData($this->table_db, "row_id = '".$txtrowid."'");
        $data['msg'] = "Process successful";
        $data['type'] = 1;
        echo json_encode($data);
    }
}	