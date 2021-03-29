<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Petugashb extends CI_Controller {
    function __construct() {
        parent::__construct();
        islogin();
    }

    public $table_db = "print";
    public $controller = "Print";
    
    public function index() {
        $lbl_controller = str_replace("_", " ", $this->controller);
        $page_url = site_url($this->controller);
		$data = array(
            'controller' => $this->controller,
            'lbl_controller' => $lbl_controller,
            'page_url' => $page_url,
            
        );
        $this->layout->display('page/print_vw', $data);
    }
}