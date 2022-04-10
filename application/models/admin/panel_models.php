<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class panel_models extends CI_Model
{
    public function jumlah_moa()
    {
        return $this->db->query("SELECT COUNT(id_kerjasama) AS jumlah FROM tr_kerjasama WHERE id_mou ='1' ")->row();
    }

    public function jumlah_riks()
    {
        return $this->db->query("SELECT COUNT(id_kerjasama) AS jumlah FROM tr_kerjasama WHERE id_mou ='2' ")->row();
    }

    public function jumlah_ar()
    {
        return $this->db->query("SELECT COUNT(id_kerjasama) AS jumlah FROM tr_kerjasama WHERE id_mou ='3' ")->row();
    }
}