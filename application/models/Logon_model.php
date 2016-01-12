<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logon_model extends CI_Model {

    function __construct()
    {
         parent::__construct();
    }
    
    function record_count() {
        return $this->db->count_all("bloginfo");
    }
    
    function myFunc($limit, $start)
    {
      $this->db->limit($limit, $start);
      $data = $this->db->get('bloginfo');
      return $data->result_array();
    }
     function allblogs()
    {
      $data = $this->db->get('bloginfo');
      return $data->result_array();
    }
}