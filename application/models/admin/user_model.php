<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model
{
    private $_table = 'user';

    public function getAll()
    {
        return $this->db->query("SELECT * FROM user ORDER BY nmUser ASC")->result();
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM mst_unit ORDER BY nmUnit ASC")->result();
    }

    public function save()
    {
        $post = $this->input->post();

        $exp = explode('~', $post['nmUnit']);
        $idUnit = $exp[0];
        $nama = $exp[1];
        
        $this->nmUser 	    = $nama;
        $this->username 	= $post['username'];
        $this->password     = $post['password'];
        $this->idUnit 	    = $idUnit;
        $this->levelUser     = $post['level'];
        $this->status       = '1';

		return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        
        $id = $post['id'];
        $level = $post['level'];
        $username = $post['username'];
        $password = $post['password'];

        if($password != '')
        {
            $this->db->query("UPDATE user SET `username` = '$username', `password` = '$password', `level` = '$level WHERE `idUser` ='$id' '");
        }else{
            $this->db->query("UPDATE user SET `username` = '$username', `level` = '$level WHERE `idUser` ='$id' '");
        }

    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idUnit" => $id));
    }
}