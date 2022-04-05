<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tingkatan_model extends CI_Model 
{
    private $_table = "tingkatan";

    public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

    public function save()
	{
		$post = $this->input->post();
		
        $this->nmTingkatan 	= $post['nmTingkatan'];

		return $this->db->insert($this->_table, $this);
	}
}