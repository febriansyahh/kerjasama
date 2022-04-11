<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unit_model extends CI_Model 
{
    private $_table = "mst_unit";

    public function getAll()
    {
        return $this->db->query("SELECT * FROM mst_unit a, tingkatan b WHERE a.idTingkat=b.idTingkatan")->result();
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM tingkatan")->result();
    }

    public function getUnit()
    {
        return $this->db->query("SELECT * FROM mst_unit WHERE idTIngkat != '1' ")->result();
    }

    public function save()
    {
        $post = $this->input->post();
       
        $date = date("Y-m-d H:i:s");

        $this->nmUnit 	= $post['nmUnit'];
        $this->parentUnit 	= $post['parent'];
        $this->idTingkat 	= $post['idTingkatan'];
        $this->sysInput 	= $date;

		return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $id = $post['id'];
        $nama = $post['nmUnit'];
        $parent = $post['parent'];
        $idTingkat = $post['idTingkatan'];

        $this->db->query("UPDATE mst_unit SET nmUnit = '$nama', parentUnit = '$parent', idTingkat = '$idTingkat' WHERE idUnit = '$id'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idUnit" => $id));
    }
}