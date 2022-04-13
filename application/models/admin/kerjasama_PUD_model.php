<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kerjasama_PUD_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->query("SELECT a.id_mou, a.nama_mou, b.id_kerjasama, b.id_ajuan, b.nm_kerjasama, b.file, b.tgl_mulai, b.tgl_selesai, b.keterangan, c.id_ajuan, c.nm_ajuan FROM jenis_mou a, tr_kerjasama b, tr_ajuan c WHERE b.id_mou=a.id_mou AND b.id_ajuan=c.id_ajuan and a.id_mou='1'")->result();
    }

    public function get_detail($id){
		
        return $this->db->query("SELECT a.id_mou, a.nama_mou, b.id_kerjasama, b.id_ajuan,  b.nm_kerjasama, b.tgl_mulai, b.tgl_selesai,b.keterangan, c.id_ajuan, c.nm_ajuan, c.mitra FROM jenis_mou a, tr_kerjasama b, tr_ajuan c WHERE b.id_mou=a.id_mou AND b.id_ajuan=c.id_ajuan AND b.id_kerjasama = '$id'")->result();
	}
    public function getbyid($id)
    {
        return $this->db->query("SELECT a.*, b.nm_ajuan FROM tr_kerjasama a, tr_ajuan b WHERE a.id_ajuan=b.id_ajuan AND a.id_kerjasama='$id' ")->row();
    }

    public function rks($id)
    {
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou ='2' AND a.is_mou ='$id'")->result();
    }

    public function ar($id) {
        $getrks = $this->db->query("SELECT id_kerjasama FROM tr_kerjasama WHERE id_mou='2' AND is_mou='$id'")->row();
        $rks = $getrks->id_kerjasama;
        
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou ='3' AND a.is_mou ='$rks'")->result();

    }
}