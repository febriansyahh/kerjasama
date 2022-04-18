<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mou_model extends CI_Model
{
    private $_table = 'jenis_mou';

    public function getAll()
    {
        return $this->db->query("SELECT * FROM jenis_mou")->result();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->nama_mou = $post['nama_mou'];
		return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $id  = $post['id'];
        $nama  = $post['nama_mou'];

        $this->db->query("UPDATE jenis_mou SET nama_mou = '$nama' WHERE id_mou = '$id' ");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_mou" => $id));
    }
}