<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generate extends CI_Controller {
    function __construct() {
        parent::__construct();
        islogin();
    }

    public function index() {
        $controller = $this->uri->segment(1);
        $lbl_controller = str_replace("_", " ", $controller);
        $page_url = base_url($controller);
        $data = array(
                'controller' => $this->uri->segment(1),
                'lbl_controller' => $lbl_controller,
                'page_url' => $page_url
            );
        $this->layout->display('page/generator_vw', $data);
    }

    public function script() {
      $controller = $this->uri->segment(3);
      $data = array(
        'controller' => $controller,
        'lbl_controller' => "Script"
      );
      $this->layout->display('page/generatorresult_vw', $data);
    }

    public function doSave() {
      $hdnCnt = $this->input->post("hdnCnt");
      $txttable = $this->input->post("txttable");
      $txtcontroller = $this->input->post("txtcontroller");
      for($i=1; $i<=$hdnCnt; $i++) {
        $this->loopSave($i, $txttable, $txtcontroller);
      }
      if($this->generateFile($txttable, $txtcontroller)) {
        $this->truncate();
        redirect(site_url('generate/script/'.$txtcontroller));
      }
      else {
        redirect("generate?msg=error");
      }
    }

    public function loopSave($cnt, $table, $controller) {
        $txtfield = $this->input->post('txtfield'.$cnt);
        $txtdescr = $this->input->post('txtdescr'.$cnt);
        $txttype = $this->input->post('txttype'.$cnt);
        $txtindex = $this->input->post('txtindex'.$cnt);
        $txtmandatory = $this->input->post('txtmandatory'.$cnt);
        $txtrelationtable = $this->input->post('txtrelationtable'.$cnt);
        $txtrelationfield = $this->input->post('txtrelationfield'.$cnt);
        $txtrelationfieldtxt = $this->input->post('txtrelationfieldtxt'.$cnt);

        if($txtfield != "") {
          $input = array(
            'generate_controller' => $controller,
            'generate_table' => $table,
            'generate_field' => $txtfield,
            'generate_field_descr' => $txtdescr,
            'generate_type' => $txttype,
            'generate_field_index' => $txtindex,
            'generate_field_mandatory' => $txtmandatory,
            'generate_relation_table' => $txtrelationtable,
            'generate_relation_field' => $txtrelationfield,
            'generate_relation_fieldtxt' => $txtrelationfieldtxt,
          );
          insertData("generatetable", $input);
        }
    }
    
    public function generateFile($table_, $controller) {
      $lbl_controller = str_replace("_", " ", $controller);
      $controller_ucfirst = ucfirst($controller);
      $table = $table_;
      $table_view = "";

      $qry = "select * from generatetable where generate_controller = '".$controller."' order by row_id";
      $rs = getByQuery($qry);
      if($rs != ""){
        if($this->createTable($table, $rs)) {

          $i = 0;
          $gridview_column = "'row_id'";
          $gridview_row = "";
          $gridview_label = "";
          $gridview_total_column = "[";
          $gridview_rs_filter = "";
          $gridview_html_filter = "";
          $gridview_js_filter = "";
          $gridview_function_filter = "";
          $form_declare_parameter = "";
          $form_parameter_value = "";
          $form_input_field = "";
          $form_view_field = "";
          $form_mandatory_field = "";
          $form_declare_select2 = "";
          $form_relation_field = "";
          $save_parameter_value = "";
          $save_input_field = "";
          $save_input_file = "";
          $unlink_file = "";
          $form_input_ajax = "";
          $form_value_ajax = "";
          $form_validation_ajax = "";
          $field_db = "";
          $index_db = "";
          $view_db = "";
          $relation_db = "";
          $viewlist_db = "";
          $has_view = 0;

          $size_form = "col-md-12";
          $size_modal = "";
          $total = 0;
          foreach($rs as $row) {
            $total ++;
          }

          foreach($rs as $row) {
            if($row->generate_field != "") {

              if($total > 5) {
                $size_form = "col-md-6";
                $size_modal = "modal-lg";
              }

              $plain_field = str_replace("_", "", $row->generate_field);
              $lbl_field = ucwords(str_replace("_", " ", $row->generate_field_descr));
              $txtfield = "txt".$plain_field;
              $table = $row->generate_table;

              /* GRIDVIEW */
              $gridview_column .= ", '".$row->generate_field."'";

              if($row->generate_type != "file")
              $gridview_label .= "<th style='width:20%'>".$lbl_field."</th> \n";

              if($i == 1) {
                $gridview_total_column .= $i;
              }
              else if($i > 1) {
                $gridview_total_column .= ",".$i;              
              }
             
              /*if($row->generate_type == "varchar") 
                $gridview_row .= "$"."row[] = '<div style=\"text-align:center\">'."."$"."line->".$row->generate_field.".'</div>'; \n";
              else if($row->generate_type == "text") 
                $gridview_row .= "$"."row[] = '<div style=\"text-align:left\">'."."$"."line->".$row->generate_field.".'</div>'; \n";
              else if($row->generate_type == "date") 
                $gridview_row .= "$"."row[] = '<div style=\"text-align:center\">'.date(\"m/d/Y\", strtotime("."$"."line->".$row->generate_field.")).'</div>'; \n";
              else if($row->generate_type == "int") 
                $gridview_row .= "$"."row[] = '<div style=\"text-align:center\">'."."$"."line->".$row->generate_field.".'</div>'; \n";
              else if($row->generate_type == "double") 
                $gridview_row .= "$"."row[] = '<div style=\"text-align:right\">'."."$"."line->".$row->generate_field.".'</div>'; \n";*/

              /* FORM */
              $form_declare_parameter .= "$".$txtfield." = ''; \n";

              if($row->generate_type == "date")
                $form_parameter_value .= "$".$txtfield." = date('Y-m-d', strtotime("."$"."rs[0]->".$row->generate_field.")); \n";
              else
                $form_parameter_value .= "$".$txtfield." = "."$"."rs[0]->".$row->generate_field."; \n";

              if($row->generate_field_mandatory == 1) 
                $form_mandatory_field = ' <span style="color: #ff0000">*</span>';
              else
                $form_mandatory_field = "";

              if($row->generate_relation_table == "") {
                if($row->generate_type == "varchar") {
                  $form_input_field .= '
                    <div class="'.$size_form.'">
                      <div class="form-group">
                        <label>'.$lbl_field.':'.$form_mandatory_field.'</label>
                        <input type="text" id="'.$txtfield.'" name="'.$txtfield.'" class="form-control" value="\'.'."$".$txtfield.'.\'" />
                      </div>
                    </div>
                  ';

                  $field_db .= $row->generate_field." VARCHAR(255) NULL, ";

                  $view_db .= ",".$row->generate_table.".".$row->generate_field." \n";
                
                  $gridview_row .= "$"."row[] = '<div style=\"text-align:center\">'."."$"."line->".$row->generate_field.".'</div>'; \n";

                  $form_view_field .= '
                    <tr>
                        <td class="view-title" style="width: 30%">'.$lbl_field.':</td>
                        <td class="view-txt">\'.'."$".$txtfield.'.\'</td>
                    </tr>
                  ';
                }
                else if($row->generate_type == "text") {
                  $form_input_field .= '
                    <div class="'.$size_form.'">
                      <div class="form-group">
                        <label>'.$lbl_field.':'.$form_mandatory_field.'</label>
                        <textarea id="'.$txtfield.'" name="'.$txtfield.'" rows="4" class="form-control">\'.'."$".$txtfield.'.\'</textarea>
                      </div>
                    </div>
                  ';

                  $field_db .= $row->generate_field." TEXT NULL, ";

                  $view_db .= ",".$row->generate_table.".".$row->generate_field." \n";

                  $gridview_row .= "$"."row[] = '<div style=\"text-align:left\">'."."$"."line->".$row->generate_field.".'</div>'; \n";

                  $form_view_field .= '
                    <tr>
                        <td class="view-title" style="width: 30%">'.$lbl_field.':</td>
                        <td class="view-txt">\'.'."$".$txtfield.'.\'</td>
                    </tr>
                  ';
                }
                else if($row->generate_type == "date") {
                  $form_input_field .= '
                    <div class="'.$size_form.'">
                      <div class="form-group">
                        <label>'.$lbl_field.':'.$form_mandatory_field.'</label>
                        <input type="date" id="'.$txtfield.'" name="'.$txtfield.'" class="form-control" value="\'.'."$".$txtfield.'.\'" />
                      </div>
                    </div>
                  ';

                  $field_db .= $row->generate_field." DATETIME NULL, ";

                  $view_db .= ",".$row->generate_table.".".$row->generate_field." \n";

                  $gridview_row .= "$"."row[] = '<div style=\"text-align:center\">'.date(\"m/d/Y\", strtotime("."$"."line->".$row->generate_field.")).'</div>'; \n";

                  $form_view_field .= '
                    <tr>
                        <td class="view-title" style="width: 30%">'.$lbl_field.':</td>
                        <td class="view-txt">\'.'."$".$txtfield.'.\'</td>
                    </tr>
                  ';
                }
                else if($row->generate_type == "int") {
                  $form_input_field .= '
                    <div class="'.$size_form.'">
                      <div class="form-group">
                        <label>'.$lbl_field.':'.$form_mandatory_field.'</label>
                        <input type="number" step="1" " id="'.$txtfield.'" name="'.$txtfield.'" class="form-control" value="\'.'."$".$txtfield.'.\'" />
                      </div>
                    </div>
                  ';

                  $field_db .= $row->generate_field." INT NULL, ";

                  $view_db .= ",".$row->generate_table.".".$row->generate_field." \n";

                  $gridview_row .= "$"."row[] = '<div style=\"text-align:center\">'."."$"."line->".$row->generate_field.".'</div>'; \n";

                  $form_view_field .= '
                    <tr>
                        <td class="view-title" style="width: 30%">'.$lbl_field.':</td>
                        <td class="view-txt">\'.'."$".$txtfield.'.\'</td>
                    </tr>
                  ';
                }
                else if($row->generate_type == "double") {
                  $form_input_field .= '
                    <div class="'.$size_form.'">
                      <div class="form-group">
                        <label>'.$lbl_field.':'.$form_mandatory_field.'</label>
                        <input type="number" step="0.01" id="'.$txtfield.'" name="'.$txtfield.'" class="form-control" value="\'.'."$".$txtfield.'.\'" />
                      </div>
                    </div>
                  ';

                  $field_db .= $row->generate_field." DOUBLE NULL, ";

                  $view_db .= ",".$row->generate_table.".".$row->generate_field." \n";

                  $gridview_row .= "$"."row[] = '<div style=\"text-align:right\">'."."number_format($"."line->".$row->generate_field.").'</div>'; \n";

                  $form_view_field .= '
                    <tr>
                        <td class="view-title" style="width: 30%">'.$lbl_field.':</td>
                        <td class="view-txt">\'.'."number_format($".$txtfield.').\'</td>
                    </tr>
                  ';
                }
                else if($row->generate_type == "file") {
                  $form_input_field .= '
                    <div class="'.$size_form.'">
                      <div class="form-group">
                        <label>'.$lbl_field.':'.$form_mandatory_field.' <span style="font-size:10px">(leave it blank if you do not want to update)</span></label>
                        <input type="file" id="'.$txtfield.'" name="'.$txtfield.'" class="form-control" />
                        <input type="hidden" id="'.$txtfield.'_hdn" name="'.$txtfield.'_hdn" class="form-control" value="\'.'."$".$txtfield.'.\'" />
                      </div>
                    </div>
                  ';

                  $form_parameter_value .= "$".$txtfield."_hdn = "."$"."rs[0]->".$row->generate_field."; \n";

                  $field_db .= $row->generate_field." varchar(20) NULL, ";

                  $view_db .= ",".$row->generate_table.".".$row->generate_field." \n";

                  $form_view_field .= '
                    <tr>
                        <td class="view-title" style="width: 30%">'.$lbl_field.':</td>
                        <td class="view-txt"><img style="width:100px" src="\'.base_url("uploaded/".'."$".$txtfield.').\'" /></td>
                    </tr>
                  ';

                  $unlink_file .= "unlink('uploaded/'."."$"."row-".">". $row->generate_field."); \n";
                }     
              }
              else {
                $form_declare_parameter .= '$'.$row->generate_relation_table.'_list = "";';
                $form_declare_select2 .= "$('#".$txtfield."').select2();";

                $form_relation_field .= '
                  $rs_'.$row->generate_relation_table.' = getByQuery("select * from '.$row->generate_relation_table.'");
                  if($rs_'.$row->generate_relation_table.' != "") {
                      foreach($rs_'.$row->generate_relation_table.' as $row_'.$row->generate_relation_table.') {
                          $selected = ($row_'.$row->generate_relation_table.'->'.$row->generate_relation_field.' == $'.$txtfield.') ? "selected" : "";
                          $'.$row->generate_relation_table.'_list .= "<option value=\'".$row_'.$row->generate_relation_table.'->'.$row->generate_relation_field.'."\' ".$selected." >".$row_'.$row->generate_relation_table.'->'.$row->generate_relation_fieldtxt.'."</option>";
                      }
                  }
                ';

                $form_input_field .= '
                  <div class="'.$size_form.'">
                    <div class="form-group">
                      <label>'.$lbl_field.':'.$form_mandatory_field.'</label>
                      <select id="'.$txtfield.'" name="'.$txtfield.'" class="form-control select2"  required>
                        <option value=""></option>
                        \'.$'.$row->generate_relation_table.'_list.\'
                      </select>
                    </div>
                  </div>
                ';

                $field_db .= $row->generate_field." INT NULL, ";

                $view_db .= ",".$row->generate_table.".".$row->generate_field." \n";

                $view_db .= ",".$row->generate_relation_table.".".$row->generate_relation_fieldtxt." as ".$row->generate_relation_table."_".$row->generate_relation_fieldtxt." \n";

                if($row->generate_field_mandatory == 1) {
                  $relation_db .= "inner join ".$row->generate_relation_table." on ".$row->generate_relation_table.".".$row->generate_relation_field." = ".$row->generate_table.".".$row->generate_field." \n";
                }
                else {
                  $relation_db .= "left join ".$row->generate_relation_table." on ".$row->generate_relation_table.".".$row->generate_relation_field." = ".$row->generate_table.".".$row->generate_field." \n";
                }             

                $gridview_row .= "$"."row[] = '<div style=\"text-align:center\">'."."$"."line->".$row->generate_relation_table."_".$row->generate_relation_fieldtxt.".'</div>'; \n";

                $gridview_rs_filter .= "'rs_".$row->generate_relation_table."' => getByQuery('select * from ".$row->generate_relation_table."'),
                ";

                $gridview_html_filter .= '
                <div class="col-md-2" style="padding-left: 0px;">
                  <div class="form-group">
                    <select id="'.$txtfield.'filter" name="'.$txtfield.'filter" class="form-control" onchange="generateTable()">
                      <option value="">View All '.ucfirst($lbl_field).'</option>
                      <?php
                      if($rs_'.$row->generate_relation_table.' != "") {
                          foreach($rs_'.$row->generate_relation_table.' as $row_'.$row->generate_relation_table.') {
                              echo "<option value=\'".$row_'.$row->generate_relation_table.'->'.$row->generate_relation_field.'."\'>".$row_'.$row->generate_relation_table.'->'.$row->generate_relation_fieldtxt.'."</option>";
                          }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                ';

                $gridview_function_filter .= '';

                $gridview_js_filter .= '
                  var '.$txtfield.'filter = $("#'.$txtfield.'filter").val();
                  if('.$txtfield.'filter != "") {
                    if(where == "") {
                      where = "'.$row->generate_field.' = \'"+'.$txtfield.'filter+"\'";
                    }
                    else {
                      where += " and '.$row->generate_field.' = \'"+'.$txtfield.'filter+"\'";                    
                    }
                  }
                ';

                $plain_relation_field = str_replace("_", "", $row->generate_relation_table."_".$row->generate_relation_fieldtxt);
                $txtrelationfield = "txt".$plain_relation_field;
                $form_declare_parameter .= "$".$txtrelationfield." = ''; \n";
                $form_parameter_value .= "$".$txtrelationfield." = "."$"."rs[0]->".$row->generate_relation_table."_".$row->generate_relation_fieldtxt."; \n";

                $form_view_field .= '
                  <tr>
                      <td class="view-title" style="width: 30%">'.$lbl_field.':</td>
                      <td class="view-txt">\'.'."$".$txtrelationfield.'.\'</td>
                  </tr>
                ';

                $has_view = 1;
              }
            }

            $form_input_ajax .= "var ".$txtfield." = $('#".$txtfield."').val(); \n";

            $form_value_ajax .= "'".$txtfield."': ".$txtfield.", \n";

            if($row->generate_field_mandatory == 1) 
              $form_validation_ajax .= "if(".$txtfield." == '') {infoStatus('".$lbl_field." must be filled', 0); exit();}";

            if($unlink_file != "") {
              $unlink_file = '
                $rs_'.$row->generate_table.' = getByQuery("select * from '.$row->generate_table.' where row_id = ".$txtrowid);
                if($rs_'.$row->generate_table.' != "") {
                    foreach($rs_'.$row->generate_table.' as $row) {
                        '.$unlink_file.'
                    }
                }
              ';
            }

            /* SAVE */
            $save_parameter_value .= '$'.$txtfield.' = '.'$'.'this->input->post("'.$txtfield.'"); ';

            if($row->generate_type == "file") {
              $post_file_name = "$"."_FILES".chr(91)."'".$txtfield."'".chr(93).chr(91)."'name'".chr(93);
              $data_array = "$"."data".chr(91)."'msg'".chr(93);
              $panah = "->";
              $save_input_file = "
                $".$txtfield." = "." $".$txtfield."_hdn;
                if(".$post_file_name." != '')
                {
                    "." $"."ext = pathinfo(".$post_file_name.", PATHINFO_EXTENSION);
                    "." $"."file_name = date('YmdHis').'.'."."$"."ext;
                    "." $"."config = array(
                        'upload_path' => 'uploaded',
                        'allowed_types' => 'gif|jpg|png|jpeg|pdf|docx|xls|xlsx|doc|txt',
                        'overwrite' => TRUE,
                        'file_name' => "." $"."file_name
                    );
                    "." $"."this->upload->initialize("." $"."config);
                    if("." $"."this->upload->do_upload('".$txtfield."'))
                    {
                        "." $"."data = "."$"."this->upload->data();
                        $".$txtfield." = "." $"."file_name;
                        if($".$txtfield."_hdn != '')
                          unlink('uploaded/'.$".$txtfield."_hdn);
                    }
                    else
                    {
                        ".$data_array." = "."$"."this->upload->display_errors();
                        "."$"."data['type'] = 0;
                        echo json_encode("."$"."data);
                        exit();
                    }
                }
              ";
              $form_input_ajax .= "var ".$txtfield."_hdn = $('#".$txtfield."_hdn').val(); \n";
              $save_parameter_value .= '$'.$txtfield.'_hdn = '.'$'.'this->input->post("'.$txtfield.'_hdn"); ';
            }

            if($row->generate_type == "date")
              $save_input_field .= "'".$row->generate_field."' => date(\"Y-m-d H:i:s\", strtotime("."$".$txtfield.")), ";
            else
              $save_input_field .= "'".$row->generate_field."' => "."$".$txtfield.", ";

            if($row->generate_field_index == 1) {
              if($index_db == "") {
                $index_db .= $row->generate_field;
              }
              else {
                $index_db .= ",".$row->generate_field;              
              }
            }
          }

          $gridview_total_column .= "]";

          if($index_db != "") {
            $index_db = ', KEY `IDX` ('.$index_db.')';
          }

          if($gridview_html_filter != "") {
            $gridview_html_filter = '
              <div class="col-xs-12">
                <div  style="clear:both; border-top: 3px solid #d2d6de; height: 17px"></div>
                '.$gridview_html_filter.'
              </div>
            ';
          }

          $table_view = $table;
          if($has_view == 1) {
            $viewlist_name = "vw_".$row->generate_table."list";
            $viewlist_db .= "
              create view ".$viewlist_name." as 
              select 
                ".$row->generate_table.".row_id 
                ".$view_db." 
              from ".$row->generate_table." 
              ".$relation_db." 
            ";
            $table_view = $viewlist_name;
          }

          $this->copyFileAndRename($controller, $table, $gridview_column, $gridview_row, 
            $form_declare_parameter, $form_parameter_value, $form_input_field, $save_parameter_value,
            $save_input_field, $form_view_field, $gridview_label, $form_input_ajax, $form_value_ajax,
            $gridview_total_column, $field_db, $index_db, $form_relation_field, $form_declare_select2,
            $save_input_file, $form_validation_ajax, $gridview_rs_filter, $gridview_html_filter,
            $gridview_function_filter, $gridview_js_filter, $viewlist_db, $table_view, $unlink_file,
            $size_modal);

          return true;
        }
        else {
          return false;
        }

      }
    }

    public function copyFileAndRename($controller, $table, $gridview_column, $gridview_row, 
      $form_declare_parameter, $form_parameter_value, $form_input_field, $save_parameter_value,
      $save_input_field, $form_view_field, $gridview_label, $form_input_ajax, $form_value_ajax,
      $gridview_total_column, $field_db, $index_db, $form_relation_field, $form_declare_select2,
      $save_input_file, $form_validation_ajax, $gridview_rs_filter, $gridview_html_filter,
      $gridview_function_filter, $gridview_js_filter, $viewlist_db, $table_view, $unlink_file,
      $size_modal) {
      $fromcontroller = FCPATH.'assets/generate/template/controller.php';
      $filecontroller = FCPATH.'assets/generate/result/'.$controller.'.txt';
      $fromview = FCPATH.'assets/generate/template/view.php';
      $fileview = FCPATH.'assets/generate/result/'.$controller.'_vw.txt';
      $fromtable = FCPATH.'assets/generate/template/table.php';
      $filetable = FCPATH.'assets/generate/result/'.$controller.'_tbl.txt';
      $fromjs = FCPATH.'assets/generate/template/script.js';
      $filejs = FCPATH.'assets/generate/result/'.$controller.'_js.txt';
      
      copy($fromcontroller, $filecontroller);
      copy($fromview, $fileview);
      copy($fromtable, $filetable);
      copy($fromjs, $filejs);

      $replaced = array(
          "[{CONTROLLER_UCFIRST}]" => ucfirst($controller), 
          "[{CONTROLLER}]" => $controller, 
          "[{TABLE}]" => $table, 
          "[{TABLE_VIEW}]" => $table_view, 
          "[{GRIDVIEW_COLUMN}]" => $gridview_column, 
          "[{GRIDVIEW_ROW}]" => $gridview_row, 
          "[{GRIDVIEW_RS_FILTER}]" => $gridview_rs_filter, 
          "[{GRIDVIEW_HTML_FILTER}]" => $gridview_html_filter, 
          "[{GRIDVIEW_FUNCTION_FILTER}]" => $gridview_function_filter, 
          "[{GRIDVIEW_JS_FILTER}]" => $gridview_js_filter, 
          "[{FORM_DECLARE_PARAMETER}]" => $form_declare_parameter, 
          "[{FORM_PARAMETER_VALUE}]" => $form_parameter_value, 
          "[{FORM_INPUT_FIELD}]" => $form_input_field, 
          "[{SAVE_PARAMETER_VALUE}]" => $save_parameter_value, 
          "[{SAVE_INPUT_FIELD}]" => $save_input_field, 
          "[{SAVE_INPUT_FILE}]" => $save_input_file,
          "[{UNLINK_FILE}]" => $unlink_file,
          "[{FORM_VIEW_FIELD}]" => $form_view_field, 
          "[{FORM_RELATION_FIELD}]" => $form_relation_field, 
          "[{FORM_DECLARE_SELECT2}]" => $form_declare_select2,
          "[{GRIDVIEW_LABEL}]" => $gridview_label, 
          "[{FORM_INPUT_AJAX}]" => $form_input_ajax,
          "[{FORM_VALUE_AJAX}]" => $form_value_ajax,
          "[{FORM_VALIDATION_AJAX}]" => $form_validation_ajax,
          "[{GRIDVIEW_TOTAL_COLUMN}]" => $gridview_total_column,
          "[{TABLE}]" => $table,
          "[{FIELD}]" => $field_db,
          "[{IDX}]" => $index_db,
          "[{VIEWLIST}]" => $viewlist_db,
          "[{SIZE_MODAL}]" => $size_modal
      );
      
      file_put_contents($filecontroller, strtr(file_get_contents($filecontroller), $replaced));
      file_put_contents($fileview, strtr(file_get_contents($fileview), $replaced));
      file_put_contents($filetable, strtr(file_get_contents($filetable), $replaced));
      file_put_contents($filejs, strtr(file_get_contents($filejs), $replaced));
    }

    public function createTable($table_name, $rs) {
      /*$this->load->dbforge();
      $attributes = array('ENGINE' => 'InnoDB');

      $this->dbforge->add_field("row_id INT NOT NULL AUTO_INCREMENT");
      $this->dbforge->add_key('row_id', TRUE);

      foreach($rs as $row) {
        if($row->generate_type == "varchar")
          $this->dbforge->add_field($row->generate_field." VARCHAR(255) NULL");
        else if($row->generate_type == "text")
          $this->dbforge->add_field($row->generate_field." TEXT NULL");
        else if($row->generate_type == "date")
          $this->dbforge->add_field($row->generate_field." DATETIME NULL");
        else if($row->generate_type == "int")
          $this->dbforge->add_field($row->generate_field." INT NULL");
        else if($row->generate_type == "double")
          $this->dbforge->add_field($row->generate_field." DOUBLE NULL");
      }

      if($this->dbforge->create_table($table_name, FALSE, $attributes)) {
        return true;
      }
      else {          
        return false;
      }

      file_put_contents($fileview, strtr(file_get_contents($fileview), $replaced));
      */

      return true;
    }

    function truncate() {
        $this->condb  = $this->load->database('default', TRUE);
        $this->condb->query("truncate generatetable");
    }

    function asd ()
    {
      echo "$"."_FILES".chr(91)."'txt'".chr(93).chr(91)."'name'".chr(93);
    }
}	