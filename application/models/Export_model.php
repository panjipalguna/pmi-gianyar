<?php defined('BASEPATH') OR die('No direct script access allowed');

class Export_model extends CI_Model {

     public function getAll()
     {
          $this->db->select('*');
          $this->db->from('usertable');

          return $this->db->get();
     }

}