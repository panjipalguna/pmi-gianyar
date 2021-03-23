<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends CI_Controller {
    function __construct() {
        parent::__construct();
        islogin();
    }
    
    public function index() {
        $this->layout->display('page/demo_vw');
    }
}	