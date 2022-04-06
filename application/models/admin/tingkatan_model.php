<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tingkatan_model extends CI_Model 
{
    private $_table = "tingkatan";

    public function getAll()
	{
		return $this->db->query("SELECT * FROM tingkatan")->result();
	}

    public function save()
	{
		$post = $this->input->post();
        $this->nmTingkatan 	= $post['nmTingkatan'];

		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$id = $post['id'];
		$nama = $post['nmTingkatan'];

		$this->db->query("UPDATE tingkatan SET nmTingkatan = '$nama' WHERE idTingkatan = '$id'");
	}

	public function delete($id)
    {
        return $this->db->delete($this->_table, array("idTingkatan" => $id));
    }
	
}