<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kerjasama_PUD_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->query("SELECT a.id_mou, a.nama_mou, b.id_ajuan, b.nm_kerjasama, c.id_ajuan, c.nm_ajuan FROM jenis_mou a, tr_kerjasama b, tr_ajuan c WHERE b.id_mou=a.id_mou AND b.id_ajuan=c.id_ajuan")->result();
    }

}