<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kerjasama_model extends CI_Model
{

    public function moa()
    {
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou ='1' AND a.parent='0'")->result();
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

    public function tree()
    {
        // return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.is_group='1'")->result();
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou, a.is_group FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou='1'")->result();
    }

    // public function treeview()
    // {
    //     $result = $this->db->query("SELECT * FROM tr_kerjasama")->result();

    //     foreach ($result as $row) {
    //             $sub_data["id"] = $row["id_kerjasama"];

    //             $sub_data["name"] = $row["nm_kerjasama"];

    //             $sub_data["text"] = $row["nm_kerjasama"];

    //             $sub_data["parent_id"] = $row["is_mou"];

    //             $data[] = $sub_data;
    //     }


    //     foreach ($data as $key => &$value) {

    //         $output[$value["id"]] = &$value;
    //     }

    //     foreach ($data as $key => &$value) {

    //         if ($value["parent_id"] && isset($output[$value["parent_id"]])) {

    //             $output[$value["parent_id"]]["nodes"][] = &$value;
    //         }
    //     }

    //     foreach ($data as $key => &$value) {

    //         if ($value["parent_id"] && isset($output[$value["parent_id"]])) {

    //             unset($data[$key]);
    //         }
    //     }

    //     echo json_encode($data);

    // }

    public function treeview()
    {
        $post = $this->input->post();
        $ts     = $post['is_group'];

        // $data = $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou, a.is_group FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.is_group='$ts'")->result();
        $data = $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou, a.is_group FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou = '2' AND a.is_group='$ts'")->result();

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

        $data_ar = $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou, a.is_group FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou = '3' AND a.is_mou='$ts'")->row();
        
        if($data_ar != NULL){
    ?>
        <div class="row">
            <div class="col-5">
                Nama Kerjasama :
            </div>
            <div class="col-7">
                <?php echo $data_ar->nm_kerjasama ?>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                Unit Terkait :
            </div>
            <div class="col-7">
                <?php echo $data_ar->nmUnit ?>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                Mitra :
            </div>
            <div class="col-7">
                <?php echo $data_ar->mitra ?>
            </div>
        </div>
<?php

        }else{
?>
    <center>
        <p><em>Maaf, Data AR dari RIKS Ini belum tersedia</em></p>
    </center>
<?php
        }
    }
}
