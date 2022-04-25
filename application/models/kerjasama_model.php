<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerjasama_model extends CI_Model
{

    public function moa()
    {
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou ='2' AND a.parent='0'")->result();
    }

    public function riks()
    {
        // $getrks = $this->db->query("SELECT id_kerjasama FROM tr_kerjasama WHERE id_mou='1'")->row();
        // $id = $getrks->id_kerjasama;
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou ='2' AND a.parent='1'")->result();
    }

    public function ar()
    {
        $getrks = $this->db->query("SELECT id_kerjasama FROM tr_kerjasama WHERE id_mou='2' and parent='1'")->result();

        $x = array();
        foreach ($getrks as $value) {
            $l =  $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou ='3' AND a.parent='2' AND a.is_mou='$value->id_kerjasama'")->row();
            $x[] = $l;
        }

        return $x;

        // return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou ='3' AND a.parent='2'")->result();
    }

    public function jumlah_moa()
    {
        return $this->db->query("SELECT COUNT(id_kerjasama) AS jumlah FROM tr_kerjasama WHERE id_mou ='2' ")->row();
    }

    public function jumlah_riks()
    {
        return $this->db->query("SELECT COUNT(id_kerjasama) AS jumlah FROM tr_kerjasama WHERE id_mou ='3' ")->row();
    }

    public function jumlah_ar()
    {
        return $this->db->query("SELECT COUNT(id_kerjasama) AS jumlah FROM tr_kerjasama WHERE id_mou ='4' ")->row();
    }

    public function tree()
    {
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou, a.is_group FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou='2'")->result();
    }

    public function getParentAjuan()
    {
        return $this->db->query("SELECT * FROM tr_ajuan a, mst_unit b WHERE a.id_unit=b.idUnit")->result();
    }

    public function getChild()
    {
        $a = $this->db->query("SELECT * FROM tr_ajuan")->result();

        foreach ($a as $value) {
            return $this->db->query("SELECT * FROM tr_kerjasama a, mst_unit b, jenis_mou c, tr_ajuan d WHERE a.id_unit=b.idUnit AND a.id_mou = c.id_mou AND a.id_mou='2' AND a.id_ajuan=d.id_ajuan AND a.id_ajuan = '$value->id_ajuan'")->result();
        }
    }

    public function changemoa()
    {
        $post = $this->input->post();
        $ts     = $post['is_mou'];

        $data = $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou, a.is_group FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou='2' AND a.id_ajuan='$ts' ")->result();

        $cek = $this->db->query("SELECT id_ajuan FROM tr_kerjasama WHERE id_mou='2' AND id_ajuan ='$ts'")->row();

        if ($cek->id_ajuan != '') {
?>
            <h3 class="h3 mb-3 text-gray-800">Data MOA </h3>
            <table class="table table-bordered mb-0" id="datamoa">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis MoU</th>
                        <th>Nama Kerjasama</th>
                        <th>Unit</th>
                        <th>Mitra</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($data as $value) {
                    ?>
                        <tr>

                            <td class="td">
                                <?php echo $no++ ?>
                            </td>

                            <td class="td">
                                <?php echo $value->nama_mou ?>
                            </td>

                            <td class="td">
                                <?php echo $value->nm_kerjasama ?>
                            </td>

                            <td class="td">
                                <?php echo $value->nmUnit ?>
                            </td>

                            <td class="td">
                                <?php echo $value->mitra ?>
                            </td>
                            <td class="td"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#groupmou" onclick="groupmou(this)" data-id="<?php echo $value->is_group ?>" class="btn btn-custom ">RIKS/IA</a></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        <?php
        } else {
        ?>
             <center>
             <h5><em>Maaf mengenai data untuk kerjasama terkait belum tersedia !</em></h5>
            </center>
        <?php
        }
    }


    public function treeview()
    {
        $post = $this->input->post();
        $ts     = $post['is_group'];

        $data = $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou, a.is_group FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou = '3' AND a.is_group='$ts'")->result();

        ?>


        <section class="pt-4">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0" id="data_table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis MoU</th>
                                <th>Nama Kerjasama</th>
                                <th>Unit</th>
                                <th style="display:none;">id_mou</th>
                                <th>Mitra</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            foreach ($data as $value) {
                            ?>
                                <tr>

                                    <td class="td">
                                        <?php
                                        echo $no++;
                                        ?>
                                    </td>

                                    <td class="td">
                                        <?php echo $value->nama_mou ?>
                                    </td>

                                    <td class="td">
                                        <?php echo $value->nm_kerjasama ?>
                                    </td>

                                    <td class="td">
                                        <?php echo $value->nmUnit ?>
                                    </td>

                                    <td class="td" style="display:none;">
                                        <?php echo $value->id_mou ?>
                                    </td>

                                    <td class="td">
                                        <?php echo $value->mitra ?>
                                    </td>

                                    <!-- <td class="td"><a class="btn btn-custom ">Kerjasama</a></td> -->
                                    <td class="td"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#groupar" onclick="groupar(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->is_group   ?>" class="btn btn-custom ">AR</a></td>

                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <?php
    }

    public function modal_ar()
    {
        $post = $this->input->post();
        $ts     = $post['is_mou'];

        $data_ar = $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou, a.is_group FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou = '4' AND a.is_mou='$ts'")->row();

        if ($data_ar != NULL) {
        ?>
            <div class="row">
                <div class="col-5">
                    Nama Kerjasama
                </div>
                <div class="col-1">
                    :
                </div>
                <div class="col-6">
                    <?php echo $data_ar->nm_kerjasama ?>
                </div>
            </div>

            <div class="row">
                <div class="col-5">
                    Unit Terkait
                </div>
                <div class="col-1">
                    :
                </div>
                <div class="col-6">
                    <?php echo $data_ar->nmUnit ?>
                </div>
            </div>

            <div class="row">
                <div class="col-5">
                    Mitra
                </div>
                <div class="col-1">
                    :
                </div>
                <div class="col-6">
                    <?php echo $data_ar->mitra ?>
                </div>
            </div>

            <div class="row">
                <div class="col-5">
                    Tgl. Mulai
                </div>
                <div class="col-1">
                    :
                </div>
                <div class="col-6">
                    <?php echo date('d-m-Y', strtotime($data_ar->tgl_mulai)) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-5">
                    Tgl. Selesai
                </div>
                <div class="col-1">
                    :
                </div>
                <div class="col-6">
                    <?php echo date('d-m-Y', strtotime($data_ar->tgl_selesai)) ?>
                </div>
            </div>
        <?php

        } else {
        ?>
            <center>
                <p><em>Maaf, Data AR dari RIKS Ini belum tersedia</em></p>
            </center>
<?php
        }
    }
}
