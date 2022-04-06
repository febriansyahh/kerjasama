<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model
{
    private $_table = 'user';

	// public $nmUser;
	// public $username;
	// public $password;
	// public $idUnit;
	// public $levelUser;
	// public $status;

	// public function rules()
	// {
	// 	return [

	// 		[
	// 			'field' => 'nmUser',
	// 			'label' => 'nmUser',
	// 			'rules' => 'required'
	// 		],

	// 		[
	// 			'field' => 'username',
	// 			'label' => 'username',
	// 			'rules' => 'required'
	// 		],

	// 		[
	// 			'field'  => 'password',
	// 			'label'  => 'password',
	// 			'rules'  => 'trim|md5|min_length[4]'
	// 		],
            
    //         [
    //             'field' => 'idUnit',
    //             'label' => 'idUnit',
    //             'rules' => 'numeric'
    //         ],

	// 		[
	// 			'field' => 'levelUser',
	// 			'label' => 'levelUser',
	// 			'rules' => 'numeric'
	// 		],

	// 	];
	// }


    public function getAll()
    {
        return $this->db->query("SELECT * FROM user a, mst_unit b WHERE a.idUnit=b.idUnit ORDER BY nmUser ASC")->result();
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM mst_unit ORDER BY nmUnit ASC")->result();
    }

    public function save()
    {
        $post = $this->input->post();

        $exp = explode('~', $post["idUnit"]);
        $idUnit = $exp[0];
        $nama = $exp[1];

        // var_dump($post['username']);
        // var_dump(MD5($post['password']));
        // var_dump($post['level']);
        // var_dump($idUnit);
        // var_dump($nama);
        // die();
        
        $this->nmUser 	    = $nama;
        $this->username 	= $post['username'];
        $this->password     = MD5($post['password']);
        $this->idUnit 	    = $idUnit;
        $this->levelUser     = $post['level'];
        $this->is_view     = $post['is_view'];
        $this->is_download     = $post['is_download'];
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
        $passwordEncrypt = MD5($post['password']);
        $is_view     = $post['is_view'];
        $is_download     = $post['is_download'];

        $cekpass = $this->db->query("SELECT `password` FROM `user` WHERE `idUser` = '$id' ")->row();

        if($password != $cekpass->password)
        {
            $this->db->query("UPDATE user SET `username` = '$username', `password` = '$passwordEncrypt', `level` = '$level', `is_view` = '$is_view', `is_download` = '$is_download' WHERE `idUser` ='$id' '");
        }else{
            $this->db->query("UPDATE user SET `username` = '$username', `password` = '$password', `level` = '$level', `is_view` = '$is_view', `is_download` = '$is_download' WHERE `idUser` ='$id' '");
        }

    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idUser" => $id));
    }
}