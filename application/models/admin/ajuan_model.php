<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajuan_model extends CI_Model
{
    private $_table = "tr_ajuan";

    public $id_ajuan;
    public $nm_ajuan;
    public $id_mou;
    public $id_unit;
    public $mitra;
    public $file;
    public $id_status;
    public $tgl_mulai;
    public $tgl_selesai;
    public $sysInput;

    public function rules()
    {
        return[
            [
                'field' => 'nm_ajuan',
				'label' => 'nm_ajuan',
				'rules' => 'varchar'
            ],

            [
                'field' => 'id_mou',
				'label' => 'id_mou',
				'rules' => 'numeric'
            ],

            [
                'field' => 'id_unit',
				'label' => 'id_unit',
				'rules' => 'numeric'
            ],

            [
                'field' => 'mitra',
				'label' => 'mitra',
				'rules' => 'varchar'
            ],

            [
                'field' => 'id_status',
				'label' => 'id_status',
				'rules' => 'numeric'
            ],

            [
                'field' => 'tgl_mulai',
				'label' => 'tgl_mulai',
				'rules' => 'date'
            ],

            [
                'field' => 'tgl_selesai',
				'label' => 'tgl_selesai',
				'rules' => 'date'
            ],
        ];
    }

    public function getAll()
    {   
        $unit = $this->session->userdata('idUnit');
        $level = $this->session->userdata('levelUser');
        
        switch ($level) {
            case '1':
                return $this->db->query("SELECT a.*, b.nama_mou, c.nmUnit, d.id_status, d.nama_status FROM 
                tr_ajuan a, jenis_mou b, mst_unit c, status_mou d WHERE a.id_mou=b.id_mou AND a.id_unit=c.idUnit AND a.id_status=d.id_status ORDER BY a.sysInput DESC")->result();
                break;
            
            case '2':
                return $this->db->query("SELECT a.*, b.nama_mou, c.nmUnit, d.id_status, d.nama_status FROM 
                tr_ajuan a, jenis_mou b, mst_unit c, status_mou d WHERE a.id_mou=b.id_mou AND a.id_unit=c.idUnit AND a.id_status=d.id_status AND (c.idUnit = '$unit' OR c.parentUnit = '$unit') ORDER BY a.sysInput DESC")->result();
                break;

            case '3':
                return $this->db->query("SELECT a.*, b.nama_mou, c.nmUnit, d.id_status, d.nama_status FROM 
                tr_ajuan a, jenis_mou b, mst_unit c, status_mou d WHERE a.id_mou=b.id_mou AND a.id_unit=c.idUnit AND a.id_status=d.id_status AND c.idUnit = '$unit' ORDER BY a.sysInput DESC")->result();
                break;
        }
        
    }

    public function getUnit()
    {
        return $this->db->query("SELECT * FROM mst_unit")->result();
    }

    public function getMou()
    {
        return $this->db->query("SELECT * FROM jenis_mou")->result();
    }

    public function getID($id)
    {
        return $this->db->query("SELECT a.*, b.nama_mou, c.nmUnit, d.id_status, d.nama_status FROM 
        tr_ajuan a, jenis_mou b, mst_unit c, status_mou d WHERE a.id_mou=b.id_mou AND a.id_unit=c.idUnit AND a.id_status=d.id_status AND a.id_ajuan ='$id' ")->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $nm_ajuan = $post['nm_ajuan'];
        // $id_mou = $post['id_mou'];
        $id_unit = $post['unit'];
        $mitra = $post['mitra'];
        // $id_status = $post['id_status'];
        $tgl_mulai = $post['tgl_mulai'];
        $tgl_selesai = $post['tgl_selesai'];

        $sys = date("Y-m-d H:i:s");
        $cu = $this->db->query("SELECT * FROM mst_unit WHERE idUnit = '$id_unit'")->row();

        // pakai id jenis mou
        // $sql = "INSERT INTO `tr_ajuan`(`nm_ajuan`, `id_mou`, `id_unit`, `mitra`, `file`, `id_status`, `tgl_mulai`, `tgl_selesai`, `sysInput`) VALUES(
        //          '". $nm_ajuan ."',
        //          '". $id_mou ."',
        //          '". $id_unit ."',
        //          '". $mitra ."',
        //          '" . $this->_uploadFile($nm_ajuan, $cu->nmUnit) . "',
        //          '1',
        //          '". $tgl_mulai ."',
        //          '". $tgl_selesai ."',
        //          '". $sys ."'
        //          )";
        
        $sql = "INSERT INTO `tr_ajuan`(`nm_ajuan`, `id_mou`, `id_unit`, `mitra`, `file`, `id_status`, `tgl_mulai`, `tgl_selesai`, `sysInput`) VALUES(
                 '". $nm_ajuan ."',
                 '1',
                 '". $id_unit ."',
                 '". $mitra ."',
                 '" . $this->_uploadFile($nm_ajuan, $cu->nmUnit) . "',
                 '1',
                 '". $tgl_mulai ."',
                 '". $tgl_selesai ."',
                 '". $sys ."'
                 )";

                return $this->db->query($sql);
    }

    public function getAI()
    {
        $sql = $this->db->query("SELECT `AUTO_INCREMENT` as id_AI FROM INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'kerjasama' AND TABLE_NAME = 'tr_ajuan'");
        return $sql->row();
    }

    public function saveHistory()
    {
        $post = $this->input->post();
        
        $idAjuan = $post['id'];
        $sys = date("Y-m-d H:i:s");
        // die();
        $sql = "INSERT INTO `tr_history` (`id_ajuan`, `id_status`, `sysInput`) VALUES ('$idAjuan', '1', '$sys')";
        return $this->db->query($sql);
    }

    private function _uploadFile($a, $b)
	{
        $aj = str_replace(' ', '_', $a);
        $ajuan = str_replace('.', '_', $aj);
        $unit = str_replace(' ', '_', $b);
        $c = 'Ajuan_' . $ajuan . '_' . $unit; 
        // $c = 'Ajuan_' . $ajuan; 

        $config['upload_path']          = './upload/ajuan/';
		$config['allowed_types']        = 'pdf|jpg|png';
		$config['file_name']            = $c;
		$config['overwrite']			= true;
		$config['max_size']             = 2048;
        

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('file')) {
			return $this->upload->data("file_name");
		}
	}
    
    public function update()
    {
        $post = $this->input->post();
        
        $id = $post['id'];
        $nm_ajuan = $post['nm_ajuan'];
        $id_mou = $post['id_mou'];
        $id_unit = $post['id_unit'];
        $mitra = $post['mitra'];
        $id_status = $post['status'];
        $tgl_mulai = $post['tgl_mulai'];
        $tgl_selesai = $post['tgl_selesai'];


        $f = $this->db->query("SELECT `file` FROM `tr_ajuan` WHERE `id_ajuan` = '$id'")->row();
        $cu = $this->db->query("SELECT * FROM mst_unit WHERE idUnit = '$id_unit'")->row();

        $file = $this->_uploadFile($nm_ajuan, $cu->nmUnit);

        if($_FILES['fileAjuan']['name'] != ''){
            unlink('./upload/ajuan/' . $f->file);
            $this->db->query("UPDATE tr_ajuan SET `nm_ajuan`= '$nm_ajuan' ,`id_mou`= '$id_mou' ,`id_unit`= '$id_unit' ,`mitra`= '$mitra' ,`file`= '$file' ,`id_status`= '$id_status' ,`tgl_mulai`= '$tgl_mulai' ,`tgl_selesai`= '$tgl_selesai' WHERE `id_ajuan` = '$id' ");
        }else{
            $this->db->query("UPDATE tr_ajuan SET `nm_ajuan`= '$nm_ajuan' ,`id_mou`= '$id_mou' ,`id_unit`= '$id_unit' ,`mitra`= '$mitra' ,`id_status`= '$id_status' ,`tgl_mulai`= '$tgl_mulai' ,`tgl_selesai`= '$tgl_selesai' WHERE `id_ajuan` = '$id' ");
        }
    }

    public function dua($id)
    {
        $sys = date("Y-m-d H:i:s");
        $this->db->query("UPDATE `tr_ajuan` SET `id_status` = '2' WHERE `id_ajuan` = '$id' ");
        $this->db->query("INSERT INTO `tr_history`(`id_ajuan`, `id_status`, `sysInput`) VALUES ('$id', '2', '$sys')");
    }

    public function tiga($id)
    {
        $sys = date("Y-m-d H:i:s");
        $this->db->query("UPDATE `tr_ajuan` SET `id_status` = '3' WHERE `id_ajuan` = '$id' ");
        $this->db->query("INSERT INTO `tr_history`(`id_ajuan`, `id_status`, `sysInput`) VALUES ('$id', '3', '$sys')");
    }

    public function empat($id)
    {
        $sys = date("Y-m-d H:i:s");
        $this->db->query("UPDATE `tr_ajuan` SET `id_status` = '4' WHERE `id_ajuan` = '$id' ");
        $this->db->query("INSERT INTO `tr_history`(`id_ajuan`, `id_status`, `sysInput`) VALUES ('$id', '4', '$sys')");
    }

    public function lima($id)
    {
        $sys = date("Y-m-d H:i:s");
        $this->db->query("UPDATE `tr_ajuan` SET `id_status` = '5' WHERE `id_ajuan` = '$id' ");
        $this->db->query("INSERT INTO `tr_history`(`id_ajuan`, `id_status`, `sysInput`) VALUES ('$id', '5', '$sys')");
    }

    public function delete($id)
    {
        $data = $this->db->query("SELECT `file` FROM `tr_ajuan` WHERE `id_ajuan` = '$id' ")->row();
        $file = $data->file;
        if(isset($file)) 
        unlink('./upload/ajuan/' . $file);
        return $this->db->delete($this->_table, array("id_ajuan" => $id));
    }

    public function deleted($id)
    {
        $sql = "DELETE FROM `tr_history` WHERE id_ajuan='$id'";
        $this->db->query($sql);
    }

    public function get_moa()
    {
        $unit = $this->session->userdata('idUnit');
        return $this->db->query("SELECT a.*, b.nama_mou, c.nmUnit, d.nama_status FROM tr_ajuan a, jenis_mou b, mst_unit c, status_mou d WHERE a.id_mou=b.id_mou AND a.id_unit=c.idUnit AND a.id_status=d.id_status AND a.id_mou='1' AND c.parentUnit= '$unit'")->result();
    }

    public function get_riks()
    {
        $unit = $this->session->userdata('idUnit');
        return $this->db->query("SELECT a.*, b.nama_mou, c.nmUnit, d.nama_status FROM tr_ajuan a, jenis_mou b, mst_unit c, status_mou d WHERE a.id_mou=b.id_mou AND a.id_unit=c.idUnit AND a.id_status=d.id_status AND a.id_mou='2' AND c.parentUnit= '$unit'")->result();
    }

    public function get_ar()
    {
        $unit = $this->session->userdata('idUnit');
        return $this->db->query("SELECT a.*, b.nama_mou, c.nmUnit, d.nama_status FROM tr_ajuan a, jenis_mou b, mst_unit c, status_mou d WHERE a.id_mou=b.id_mou AND a.id_unit=c.idUnit AND a.id_status=d.id_status AND a.id_mou='3' AND c.parentUnit= '$unit'")->result();
    }

}