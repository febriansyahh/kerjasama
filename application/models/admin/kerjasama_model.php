<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kerjasama_model extends CI_Model
{

    private $_table = "tr_kerjasama";

    public function getAll()
    {
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, b.sysInput, c.nama_mou, d.idUnit, d.nmUnit FROM tr_kerjasama a, tr_ajuan b, jenis_mou c, mst_unit d WHERE a.id_ajuan=b.id_ajuan AND a.id_mou=c.id_mou AND a.id_unit=d.idUnit ORDER BY a.sysInput DESC")->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $mou = $post['id_mou'];
        $id_ajuan = $post['id_ajuan'];
        $nm_kerjasama = $post['nm_kerja'];
        $id_unit = $post['unit'];
        $tgl_mulai = $post['tgl_mulai'];
        $tgl_selesai = $post['tgl_selesai'];
        $ket = $post['keterangan'];
        // $status = $post['status']; // status untuk publish dan arsip
        $sys = date("Y-m-d H:i:s");

        $idUnit = $this->session->userdata('idUnit');

        $cu = $this->db->query("SELECT nmUnit FROM mst_unit WHERE idUnit = '$idUnit'")->row();


        $sql =  "INSERT INTO `tr_kerjasama`(`id_mou`, `id_ajuan`, `nm_kerjasama`, `id_unit`, `file`, `tgl_mulai`, `tgl_selesai`, `keterangan`, `status`, `sysInput`) VALUES(
            '" . $mou . "',
            '" . $id_ajuan . "',
            '" . $nm_kerjasama . "',
            '" . $id_unit . "',
            '" . $this->_uploadKerjasama($nm_kerjasama, $cu->nmUnit) . "',
            '" . $tgl_mulai . "',
            '" . $tgl_selesai . "',
            '" . $ket . "',
            '1',
            '" . $sys . "'
        )";

        return $this->db->query($sql);
    }

    private function _uploadKerjasama($a, $b)
    {
        $aj = str_replace(' ', '_', $a);
        $kerja = str_replace('.', '_', $aj);
        $unit = str_replace(' ', '_', $b);
        $c = 'Kerjasama_' . $kerja . '_' . $unit;

        $config['upload_path']          = './upload/kerjasama/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['file_name']            = $c;
        $config['overwrite']            = true;
        $config['max_size']             = 2048;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
    }

    public function getUnit()
    {
        return $this->db->query("SELECT * FROM mst_unit ORDER BY nmUnit ASC")->result();
    }

    public function getAjuan()
    {
        return $this->db->query("SELECT * FROM tr_ajuan ORDER BY id_ajuan ASC")->result();
    }

    public function getAjuanPIC()
    {
        return $this->db->query("SELECT a.*, b.nama_mou FROM tr_ajuan a, jenis_mou b, mst_unit c WHERE a.id_mou = b.id_mou AND a.id_unit=c.idUnit AND c.parentUnit='1' AND a.id_status='5' ORDER BY id_ajuan ASC ")->result();
    }

    public function getMou()
    {
        return $this->db->query("SELECT * FROM jenis_mou")->result();
    }

    public function update()
    {
        $post = $this->input->post();

        $id = $post['id'];
        $nm_ajuan = $post['nm_ajuan'];
        $id_mou = $post['id_mou'];
        $id_ajuan = $post['id_ajuan'];
        $nama = $post['nm_kerjasama'];
        $tgl_mulai = $post['tgl_mulai'];
        $tgl_selesai = $post['tgl_selesai'];
        $ket = $post['keterangan'];


        $f = $this->db->query("SELECT `file` FROM `tr_kerjasama` WHERE `id_kerjasama` = '$id'")->row();
        $idUnit = $this->session->userdata('idUnit');
        $cu = $this->db->query("SELECT * FROM mst_unit WHERE idUnit = '$idUnit'")->row();

        $file = $this->_uploadKerjasama($nm_ajuan, $cu->nmUnit);

        if ($_FILES['fileAjuan']['name'] != '') {
            unlink('./upload/ajuan/' . $f->file);
            $this->db->query("UPDATE tr_kerjasama SET `id_mou`= '$id_mou' ,`id_ajuan`= '$id_ajuan' ,`nm_kerjasama`= '$nama' ,`file`= '$file', `tgl_mulai`= '$tgl_mulai' ,`tgl_selesai`= '$tgl_selesai', `keterangan` = '$ket' WHERE `id_kerjasama` = '$id' ");
        } else {
            $this->db->query("UPDATE tr_kerjasama SET `id_mou`= '$id_mou' ,`id_ajuan`= '$id_ajuan' ,`nm_kerjasama`= '$nama' ,`tgl_mulai`= '$tgl_mulai' ,`tgl_selesai`= '$tgl_selesai', `keterangan` = '$ket' WHERE `id_kerjasama` = '$id' ");
        }
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kerjasama", $id));
    }

    public function getUsulan()
    {
        $unit = $this->session->userdata('idUnit');
        return $this->db->query("SELECT * FROM kerjasama a, mst_unit b WHERE a.id_unit=b.idUnit AND (b.id_unit ='$unit' OR b.parentUnit ='$unit') ")->result();
    }

    public function getUnitId()
    {
        $unit = $this->session->userdata('idUnit');
        return $this->db->query("SELECT * FROM mst_unit WHERE parentUnit = '$unit' ")->result();
    }

    public function save_moa()
    {
        $post = $this->input->post();

        $exp = explode('~', $post["id_ajuan"]);
        $id_ajuan = $exp[0];
        $id_mou = $exp[1];
        $nama = $post["nama"];
        $unit = $post["unit"];
        $tgl_mulai = $post["tgl_mulai"];
        $tgl_selesai = $post["tgl_selesai"];
        $ket = $post["ket"];
        $sys = date("Y-m-d H:i:s");

        $cu = $this->db->query("SELECT nmUnit FROM mst_unit WHERE idUnit = '$unit'")->row();


        $sql =  "INSERT INTO `tr_kerjasama`(`id_mou`, `id_ajuan`, `nm_kerjasama`, `id_unit`, `file`, `tgl_mulai`, `tgl_selesai`, `keterangan`, `status`, `sysInput`) VALUES(
            '" . $id_mou . "',
            '" . $id_ajuan . "',
            '" . $nama . "',
            '" . $unit . "',
            '" . $this->_uploadKerjasama($nama, $cu->nmUnit) . "',
            '" . $tgl_mulai . "',
            '" . $tgl_selesai . "',
            '" . $ket . "',
            '1',
            '" . $sys . "'
        )";

        return $this->db->query($sql);
    }

    public function changeKerjasama()
    {
        $post = $this->input->post();
        $ts     = $post['id_mou'];
        $unit = $this->session->userdata('idUnit');
        $dataUnit = $this->db->query("SELECT * FROM mst_unit WHERE parentUnit = '$unit'")->result();

        $data_moa = $this->db->query("SELECT a.*, b.nmUnit FROM tr_kerjasama a, mst_unit b WHERE a.id_unit=b.idUnit AND a.id_mou = '1' ORDER BY a.sysInput DESC ")->result();
        $data_riks = $this->db->query("SELECT a.*, b.nmUnit FROM tr_kerjasama a, mst_unit b WHERE a.id_unit=b.idUnit AND a.id_mou = '2' ORDER BY a.sysInput DESC ")->result();

        switch ($ts) {
            case '1':
?>
                <div class="form-group">
                    <label class="col-sm-5 control-label pb-2"><b>Pengajuan dari unit satu:</b></label>
                    <div class="col-sm-12">
                        <!-- <input type="text" class="form-control" placeholder="Unit"> -->
                        <select name="unit" id="" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            foreach ($dataUnit as $value) {
                                echo "<option value='" . $value->idUnit . "'>" . $value->nmUnit .  "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            <?php
                break;

            case '2':
            ?>
                <div class="form-group">
                    <label class="col-sm-5 control-label pb-2"><b>Berdasarkan MOA :</b></label>
                    <div class="col-sm-12">
                        <select name="is_mou" id="" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            foreach ($data_moa as $value) {
                                echo "<option value='" . $value->id_kerjasama . "'>" . $value->nm_kerjasama . " - " . $value->nmUnit .  "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label pb-2"><b>Pengajuan dari unit satu:</b></label>
                    <div class="col-sm-12">
                        <!-- <input type="text" class="form-control" placeholder="Unit"> -->
                        <select name="unit" id="" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            foreach ($dataUnit as $value) {
                                echo "<option value='" . $value->idUnit . "'>" . $value->nmUnit .  "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label pb-2"><b>Nama Kerjasama :</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Kerjasama" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label pb-2"><b>Tanggal Mulai :</b></label>
                    <div class="col-sm-12">
                        <input type="date" name="tgl_mulai" class="form-control" placeholder="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label pb-2"><b>Tanggal Selesai :</b></label>
                    <div class="col-sm-12">
                        <input type="date" name="tgl_selesai" class="form-control" placeholder="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label pb-2"><b>File Kerjasama :</b></label>
                    <div class="col-sm-12">
                        <input class="form-control<?php echo form_error('file') ? 'is-invalid' : '' ?>" type="file" name="file" accept="image/jpeg,image/jpg,image/png,application/pdf" onchange="readURL(this, 'fileAjuan')" />
                        <input type="hidden" id="fileAjuan" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label pb-2"><b>Keterangan :</b></label>
                    <div class="col-sm-12">
                        <textarea name="ket" cols="45" rows="3" class="form-control"></textarea>
                    </div>
                </div>

                <br>
                <div class="box-footer text-center">
                    <button type="submit" class="btn btn-primary" name="btnSimpan">Upload</button>
                </div>
            <?php
                break;

            case '3':
            ?>
                <div class="form-group">
                    <label class="col-sm-5 control-label pb-2"><b>Berdasarkan MOA :</b></label>
                    <div class="col-sm-12">
                        <select name="is_mou" id="" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            foreach ($data_moa as $value) {
                                echo "<option value='" . $value->id_kerjasama . "'>" . $value->nm_kerjasama . " - " . $value->nmUnit .  "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label pb-2"><b>Berdasarkan RIKS :</b></label>
                    <div class="col-sm-12">
                        <select name="is_mou" id="riks" class="form-control" onchange="riksFunc();" required>
                            <option value="">- Pilih -</option>
                            <?php
                            foreach ($data_riks as $value) {
                                echo "<option value='" . $value->id_kerjasama . "'>" . $value->nm_kerjasama . " - " . $value->nmUnit .  "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div id="riks_kerjasama">

                </div>
        <?php
                break;
        }
    }

    public function changeRiks()
    {
        $post = $this->input->post();
        $ts     = $post['rks'];
        $data_ar = $this->db->query("SELECT a.*, b.nmUnit FROM tr_kerjasama a, mst_unit b WHERE a.id_unit=b.idUnit AND a.id_mou = '3' ORDER BY a.sysInput DESC ")->result();

        ?>
        <div class="form-group">
            <label class="col-sm-5 control-label pb-2"><b>Nama Kerjasama :</b></label>
            <div class="col-sm-12">
                <input type="text" name="nama" class="form-control" placeholder="Nama Kerjasama" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-5 control-label pb-2"><b>Tanggal Mulai :</b></label>
            <div class="col-sm-12">
                <input type="date" name="tgl_mulai" class="form-control" placeholder="" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-5 control-label pb-2"><b>Tanggal Selesai :</b></label>
            <div class="col-sm-12">
                <input type="date" name="tgl_selesai" class="form-control" placeholder="" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-5 control-label pb-2"><b>File Kerjasama :</b></label>
            <div class="col-sm-12">
                <input class="form-control<?php echo form_error('file') ? 'is-invalid' : '' ?>" type="file" name="file" accept="image/jpeg,image/jpg,image/png,application/pdf" onchange="readURL(this, 'fileAjuan')" />
                <input type="hidden" id="fileAjuan" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-5 control-label pb-2"><b>Keterangan :</b></label>
            <div class="col-sm-12">
                <textarea name="ket" cols="45" rows="3" class="form-control"></textarea>
            </div>
        </div>

        <br>
        <div class="box-footer text-center">
            <button type="submit" class="btn btn-primary" name="btnSimpan">Upload</button>
        </div>

<?php
    }
}
