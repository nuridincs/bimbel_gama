<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
    }	
    
    function getData($email){
        $sql = "SELECT * FROM app_users WHERE email = '$email'";
        $result = $this->db->query($sql);
        
        return $result->result_array();
    }
}
