<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kerjasama_model extends CI_Model {

    public function moa()
    {
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou ='1'")->result();
    }

    public function riks()
    {
        $getrks = $this->db->query("SELECT id_kerjasama FROM tr_kerjasama WHERE id_mou='1'")->row();
        $id = $getrks->id_kerjasama;
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou ='2' AND a.is_mou ='$id'")->result();
    }

    public function ar()
    {
        $getrks = $this->db->query("SELECT id_kerjasama FROM tr_kerjasama WHERE id_mou='2'")->row();
        $rks = $getrks->id_kerjasama;

        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou ='3' AND a.is_mou ='$rks'")->result();
    }
}