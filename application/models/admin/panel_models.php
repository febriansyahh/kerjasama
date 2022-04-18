<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_models extends CI_Model
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
    
    public function notif()
    {
        $unit = $this->session->userdata('idUnit');
        // return $this->db->query("SELECT a.id_ajuan, a.nm_ajuan, a.id_mou, b.id_kerjasama, b.nm_kerjasama FROM tr_ajuan a LEFT JOIN tr_kerjasama b ON a.id_ajuan=b.id_ajuan WHERE a.id_status='5' AND b.id_kerjasama IS NULL")->row();
        return $this->db->query("SELECT a.id_ajuan, a.nm_ajuan, a.id_mou, b.id_kerjasama, b.nm_kerjasama FROM tr_ajuan a LEFT JOIN tr_kerjasama b ON a.id_ajuan=b.id_ajuan JOIN mst_unit c ON a.id_unit=c.idUnit WHERE a.id_status='5' AND (c.idUnit='$unit' OR c.parentUnit = '$unit') AND b.id_kerjasama IS NULL")->row();
    }

    public function isi_notif()
    {
        $unit = $this->session->userdata('idUnit');
        // return $this->db->query("SELECT a.id_ajuan, a.nm_ajuan, a.id_mou, b.id_kerjasama, b.nm_kerjasama, c.nama_mou, d.nmUnit FROM tr_ajuan a LEFT JOIN tr_kerjasama b ON a.id_ajuan=b.id_ajuan JOIN jenis_mou c ON a.id_mou=c.id_mou JOIN mst_unit d ON a.id_unit=d.idUnit WHERE a.id_status='5' AND b.id_kerjasama IS NULL")->result();
        return $this->db->query("SELECT a.id_ajuan, a.nm_ajuan, a.id_mou, b.id_kerjasama, b.nm_kerjasama, c.nama_mou, d.nmUnit FROM tr_ajuan a LEFT JOIN tr_kerjasama b ON a.id_ajuan=b.id_ajuan JOIN jenis_mou c ON a.id_mou=c.id_mou JOIN mst_unit d ON a.id_unit=d.idUnit WHERE a.id_status='5' AND (d.idUnit='$unit' OR d.parentUnit = '$unit') AND b.id_kerjasama IS NULL")->result();
    }
}