<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();
    }
    
    public function index()
    {
        $i = rand(1, 9);
        $j = rand(1, 9);
        $data = array(
                'question' => $i." + ".$j,
                'answer' => $i + $j
            );
        $this->load->view('page/login_vw', $data);
    }

    public function doLogin()
    {
        $txtusername = md5($this->input->post("txtusername"));
        $txtpassword = md5($this->input->post("txtpassword"));
        $txtquestion = $this->input->post("txtprovequestion");
        $txtanswer = $this->input->post("txtproveanswer");

        if($txtquestion == $txtanswer) {
            $qry = "select * 
                    from usertable 
                    where md5(user_name) = '".$txtusername."' 
                        and pswrd = '".$txtpassword."'";

            $rs = $this->dataaccess_mdl->getByQuery($qry);
            if($rs != ""){            
                $datalogin = array(
                    'SesIsLogin' => TRUE,
                    'SesUserId' => $rs[0]->user_id,
                    'SesUserName' => $rs[0]->user_name,
                    'SesFullName' => $rs[0]->full_name,
                );   
                $this->session->set_userdata("SessionLogin", $datalogin); 
                redirect(site_url("demo"));
            }
            else {
                redirect(site_url()."?msg=Invalid email or password");
            }
        }
        else {
            redirect(site_url()."?msg=Prove us you are not a robot!");            
        }
    }

    public function logout(){        
        $this->session->sess_destroy();
        redirect(site_url());
    }
}	