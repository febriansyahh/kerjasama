<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    private $_table ="tr_kerjasama";
    
    public function moa()
    {
        // return $this->db->query("SELECT COUNT(id_kerjasama) as jumlah FROM tr_kerjasama WHERE id_mou = '1' ")->row();
        return $this->db->query("SELECT COUNT(id_mou) as jumlah FROM jenis_mou ")->result();
    }

    public function riks()
    {
        // return $this->db->query("SELECT COUNT(id_kerjasama) as jumlah FROM tr_kerjasama WHERE id_mou = '2' ")->row();
        return $this->db->query("SELECT COUNT(id_mou) as jumlah FROM jenis_mou ")->row();
    }

    public function ar()
    {
        // return $this->db->query("SELECT COUNT(id_kerjasama) as jumlah FROM tr_kerjasama WHERE id_mou = '3' ")->row();
        return $this->db->query("SELECT COUNT(id_mou) as jumlah FROM jenis_mou ")->row();
    }
}