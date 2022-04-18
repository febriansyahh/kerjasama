<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    private $_table = "user";

    function userdaftar($username)
	{
		$query= $this->db->query("SELECT * FROM user WHERE username ='$username' ");
		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}


	function ceklogin($username,$password)
	{
		// $query= $this->db->query("SELECT * FROM user a, mst_unit b WHERE a.unitUser=b.idUnit AND a.username ='$username' and a.password = '$password' ");
		$query= $this->db->query("SELECT * FROM `user` WHERE `username` ='$username' AND `password` = '$password' AND `status` ='1' ");
		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}