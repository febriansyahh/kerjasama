<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model
{
    private $_table = 'status_mou';

    public function getAll()
    {
        return $this->db->query("SELECT * FROM status_mou")->result();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->nama_status = $post['nama_status'];
		return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $id  = $post['id'];
        $nama  = $post['nama_status'];

        $this->db->query("UPDATE status_mou SET nama_status = '$nama' WHERE id_status = '$id' ");

    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_status" => $id));
    }
}