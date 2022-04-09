<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class history_model extends CI_Model
{
    private $_table = 'tr_history';

    public function all()
    {
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.file, b.mitra, c.nmUnit, d.nama_mou, b.tgl_mulai, b.tgl_selesai FROM tr_history a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND b.id_mou=d.id_mou AND b.id_unit=c.idUnit GROUP BY a.id_ajuan ORDER BY a.id_history ASC")->result();
    }

    public function detail($id)
    {
        return $this->db->query("SELECT a.id_history, a.id_ajuan, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou, b.tgl_mulai, b.tgl_selesai, e.nama_status, a.sysInput 
        FROM tr_history a, tr_ajuan b, mst_unit c, jenis_mou d, status_mou e WHERE a.id_ajuan=b.id_ajuan AND b.id_mou=d.id_mou AND b.id_unit=c.idUnit AND a.id_status=e.id_status 
        AND a.id_ajuan ='$id' ORDER BY a.id_history ASC")->result();
    }
}