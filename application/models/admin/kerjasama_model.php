<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerjasama_model extends CI_Model
{

    private $_table = "tr_kerjasama";

    public function getAll()
    {
        $level = $this->session->userdata('levelUser');
        $unit = $this->session->userdata('idUnit');

        switch ($level) {
            case '1':
                return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, b.sysInput, c.nama_mou, d.idUnit, d.nmUnit FROM tr_kerjasama a, tr_ajuan b, jenis_mou c, mst_unit d WHERE a.id_ajuan=b.id_ajuan AND a.id_mou=c.id_mou AND a.id_unit=d.idUnit ORDER BY a.sysInput DESC")->result();

                break;

            case '2':
                return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, b.sysInput, c.nama_mou, d.idUnit, d.nmUnit FROM tr_kerjasama a, tr_ajuan b, jenis_mou c, mst_unit d WHERE a.id_ajuan=b.id_ajuan AND a.id_mou=c.id_mou AND a.id_unit=d.idUnit AND (d.idUnit = '$unit' OR d.parentUnit = '$unit') ORDER BY a.sysInput DESC")->result();

                break;

            case '3':
                return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, b.sysInput, c.nama_mou, d.idUnit, d.nmUnit FROM tr_kerjasama a, tr_ajuan b, jenis_mou c, mst_unit d WHERE a.id_ajuan=b.id_ajuan AND a.id_mou=c.id_mou AND a.id_unit=d.idUnit AND d.idUnit = '$unit' AND a.id_mou='1' ORDER BY a.sysInput DESC")->result();
                // return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, b.sysInput, c.nama_mou, d.idUnit, d.nmUnit FROM tr_kerjasama a, tr_ajuan b, jenis_mou c, mst_unit d WHERE a.id_ajuan=b.id_ajuan AND a.id_mou=c.id_mou AND a.id_unit=d.idUnit GROUP BY id ORDER BY a.sysInput DESC")->result();

                break;
        }
    }

    public function result()
    {
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, b.sysInput, c.nama_mou, d.idUnit, d.nmUnit FROM tr_kerjasama a, tr_ajuan b, jenis_mou c, mst_unit d WHERE a.id_ajuan=b.id_ajuan AND a.id_mou=c.id_mou AND a.id_unit=d.idUnit AND a.id_mou='1' ORDER BY a.sysInput DESC")->result();
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
        $unit = $this->session->userdata('idUnit');
        return $this->db->query("SELECT a.*, b.nama_mou FROM tr_ajuan a, jenis_mou b, mst_unit c WHERE a.id_mou = b.id_mou AND a.id_unit=c.idUnit AND (c.parentUnit='$unit' OR c.idUnit ='$unit') AND a.id_status='5' ORDER BY id_ajuan ASC ")->result();
    }

    public function getMou()
    {
        return $this->db->query("SELECT * FROM jenis_mou")->result();
    }

    public function getID($id)
    {
        return $this->db->query("SELECT a.*, b.mitra FROM tr_kerjasama a, tr_ajuan b WHERE a.id_ajuan=b.id_ajuan AND a.id_kerjasama ='$id' ")->row();
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
        // $cekid = $this->db->query("SELECT is_group FROM tr_kerjasama WHERE `id_kerjasama` = '$id'")->row();
        // $sql = $this->db->query("DELETE FROM tr_kerjasama WHERE is_group = '$cekid->is_group'");

        $data = $this->db->query("SELECT `file` FROM `tr_kerjasama` WHERE `id_kerjasama` = '$id' ")->row();
        $file = $data->file;

        if (isset($file))
        unlink('./upload/kerjasama/' . $file);
       
        return $this->db->query("DELETE FROM tr_kerjasama WHERE `id_kerjasama` = '$id'");
    }

    public function getUsulan()
    {
        $unit = $this->session->userdata('idUnit');
        return $this->db->query("SELECT * FROM kerjasama a, mst_unit b WHERE a.id_unit=b.idUnit AND (b.id_unit ='$unit' OR b.parentUnit ='$unit') ")->result();
    }

    public function getUnitId()
    {
        $unit = $this->session->userdata('idUnit');
        return $this->db->query("SELECT * FROM mst_unit WHERE parentUnit = '$unit' OR idUnit='$unit' ")->result();
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
    public function save_kerja()
    {
        $post = $this->input->post();

        $exp = explode('~', $post["id_ajuan"]);
        $exps = explode('~', $post["is_mou"]);
        $id_ajuan = $exp[0];
        $id_mou = $exp[1];
        $is_mou = $exps[0];
        $is_group = $exps[1];
        $nama = $post["nama"];
        $unit = $post["unit"];
        $tgl_mulai = $post["tgl_mulai"];
        $tgl_selesai = $post["tgl_selesai"];
        $ket = $post["ket"];
        $sys = date("Y-m-d H:i:s");

        $cu = $this->db->query("SELECT nmUnit FROM mst_unit WHERE idUnit = '$unit'")->row();

        $a = $this->db->query("SELECT is_group FROM tr_kerjasama WHERE id_mou = '1' ORDER BY id_kerjasama DESC LIMIT 1 ")->row();

        $res_group = $a->is_group + 1;

        switch ($id_mou) {
            case '1':
                $result = '0';
                break;
            case '2':
                $result = '1';
                break;
            case '3':
                $result = '2';
                break;
        }


        if ($id_mou == '1') {
            $sql =  "INSERT INTO `tr_kerjasama`(`id_mou`, `id_ajuan`, `is_mou`, `nm_kerjasama`, `id_unit`, `file`, `tgl_mulai`, `tgl_selesai`, `keterangan`, `status`, `parent`, `is_group`, `sysInput`) VALUES(
            '" . $id_mou . "',
            '" . $id_ajuan . "',
            '" . $is_mou . "',
            '" . $nama . "',
            '" . $unit . "',
            '" . $this->_uploadKerjasama($nama, $cu->nmUnit) . "',
            '" . $tgl_mulai . "',
            '" . $tgl_selesai . "',
            '" . $ket . "',
            '1',
            '" . $result . "',
            '" . $res_group . "',
            '" . $sys . "'
        )";
        } else {
            $sql =  "INSERT INTO `tr_kerjasama`(`id_mou`, `id_ajuan`, `is_mou`, `nm_kerjasama`, `id_unit`, `file`, `tgl_mulai`, `tgl_selesai`, `keterangan`, `status`, `parent`, `is_group`, `sysInput`) VALUES(
            '" . $id_mou . "',
            '" . $id_ajuan . "',
            '" . $is_mou . "',
            '" . $nama . "',
            '" . $unit . "',
            '" . $this->_uploadKerjasama($nama, $cu->nmUnit) . "',
            '" . $tgl_mulai . "',
            '" . $tgl_selesai . "',
            '" . $ket . "',
            '1',
            '" . $result . "',
            '" . $is_group . "',
            '" . $sys . "'
        )";
        }

        return $this->db->query($sql);
    }

    public function changeKerjasama()
    {
        $post = $this->input->post();
        $ts     = $post['id_mou'];
        $unit = $this->session->userdata('idUnit');
        $dataUnit = $this->db->query("SELECT * FROM mst_unit WHERE parentUnit = '$unit'  OR idUnit= '$unit' ")->result();

        $data_moa = $this->db->query("SELECT a.*, b.nmUnit FROM tr_kerjasama a, mst_unit b WHERE a.id_unit=b.idUnit AND a.id_mou = '1' ORDER BY a.sysInput DESC ")->result();
        // $data_riks = $this->db->query("SELECT a.*, b.nmUnit FROM tr_kerjasama a, mst_unit b WHERE a.id_unit=b.idUnit AND a.id_mou = '2' ORDER BY a.sysInput DESC ")->result();

        switch ($ts) {
            case '1':
?>
                <div class="form-group">
                    <input type="hidden" name="is_mou" value="0">
                    <input type="hidden" name="id_mou" value="1">
                    <input type="hidden" name="parent" class="form-control" value="0" required>
                    <label class="col-sm-5 control-label pb-2"><b>Nama Kerjasama :</b></label>
                    <div class="col-sm-12">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Kerjasama" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label pb-2"><b>Pengajuan dari unit :</b></label>
                    <div class="col-sm-12">
                        <select name="unit" id="" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            foreach ($dataUnit as $value) {
                                echo "<option value='" . $value->idUnit . "~" . $value->is_group . "'>" . $value->nmUnit .  "</option>";
                            }
                            ?>
                        </select>
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

            case '2':
            ?>
                <div class="form-group">
                    <input type="hidden" name="id_mou" value="2">
                    <input type="hidden" name="parent" class="form-control" value="1" required>
                    <label class="col-sm-5 control-label pb-2"><b>Berdasarkan MOA :</b></label>
                    <div class="col-sm-12">
                        <select name="is_mou" id="" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            foreach ($data_moa as $value) {
                                echo "<option value='" . $value->id_kerjasama . "~" . $value->is_group . "'>" . $value->nm_kerjasama . " - " . $value->nmUnit .  "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label pb-2"><b>Pengajuan dari unit :</b></label>
                    <div class="col-sm-12">
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
                    <input type="hidden" name="id_mou" value="3">
                    <input type="hidden" name="parent" class="form-control" value="2" required>
                    <label class="col-sm-5 control-label pb-2"><b>Berdasarkan MOA :</b></label>
                    <div class="col-sm-12">
                        <select name="moa_id" id="moa" class="form-control" onchange="moaFunc();" required>
                            <option value="">- Pilih -</option>
                            <?php
                            foreach ($data_moa as $value) {
                                echo "<option value='" . $value->id_kerjasama . "'>" . $value->nm_kerjasama . " - " . $value->nmUnit .  "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div id="result">
                </div>

                <div id="riks_kerjasama">

                </div>
        <?php
                break;
        }
    }

    public function changeMoa()
    {
        $post = $this->input->post();
        $ts     = $post['moa'];
        $data_riks = $this->db->query("SELECT a.*, b.nmUnit FROM tr_kerjasama a, mst_unit b WHERE a.id_unit=b.idUnit AND a.id_mou = '2' AND a.is_mou='$ts' ORDER BY a.sysInput DESC ")->result();
        ?>
        <div class="form-group">
            <label class="col-sm-5 control-label pb-2"><b>Berdasarkan RIKS :</b></label>
            <div class="col-sm-12" id="result">
                <select name="is_mou" id="riks" class="form-control" onchange="riksFunc();" required>
                    <option value="">- Pilih -</option>
                    <?php
                    foreach ($data_riks as $value) {
                        echo "<option value='" . $value->id_kerjasama . "~" . $value->is_group . "'>" . $value->nm_kerjasama . " - " . $value->nmUnit .  "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <?php
    }

    public function changeRiks()
    {
        $post = $this->input->post();
        $ts     = $post['rks'];


        $unit = $this->session->userdata('idUnit');
        $dataUnit = $this->db->query("SELECT * FROM mst_unit WHERE parentUnit = '$unit' OR idUnit= '$unit'")->result();

        $cekar = $this->db->query("SELECT id_kerjasama FROM tr_kerjasama WHERE is_mou = '$ts' ")->row();

        if ($cekar->id_kerjasama != '') {
        ?>
            <br>
            <span style="color: red"><em><b>Maaf, data RIKS yang dipilih telah memiliki AR</b></em></span>
        <?php
        } else {
        ?>

            <div class="form-group">
                <label class="col-sm-5 control-label pb-2"><b>Pengajuan dari unit :</b></label>
                <div class="col-sm-12">
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
        }
        ?>

    <?php
    }

    public function getbyid($id)
    {
        return $this->db->query("SELECT a.*, b.nm_ajuan FROM tr_kerjasama a, tr_ajuan b WHERE a.id_ajuan=b.id_ajuan AND a.id_kerjasama='$id' ")->row();
    }

    public function getDataMoa($id)
    {
        $getid = $this->db->query("SELECT is_group FROM tr_kerjasama WHERE id_kerjasama='$id' ")->row();
        $ts = $getid->is_group;
        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou, a.is_group FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.is_group='$ts'")->result();
    }

    public function rks($id)
    {

        return $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.id_mou ='2' AND a.parent='1' AND a.is_mou='$id'")->result();
    }

    public function ar($id)
    {

        $getrks = $this->db->query("SELECT id_kerjasama FROM tr_kerjasama WHERE id_mou='2' AND parent='1' AND is_mou='$id'")->result();

        $x = array();
        foreach ($getrks as $key => $value) {
            $l = $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.parent='2' AND a.id_mou='3' AND a.is_mou='$value->id_kerjasama' order by a.is_mou")->row();
            $x[] = $l;
        }

        return $x;
    }

    public function modal()
    {
        $post = $this->input->post();
        $ts     = $post['is_group'];

        $data = $this->db->query("SELECT a.*, b.nm_ajuan, b.mitra, c.nmUnit, d.nama_mou, a.is_group FROM tr_kerjasama a, tr_ajuan b, mst_unit c, jenis_mou d WHERE a.id_ajuan=b.id_ajuan AND a.id_unit=c.idUnit AND a.id_mou=d.id_mou AND a.is_group='$ts'")->result();

    ?>


        <section class="pt-4">
            <div class="container">
                <div class="table-responsive py-4">
                    <table id="example1" class="display" style="width:100%">
                        <thead>
                            <tr>
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

                                    <td class="td"><a class="btn btn-custom ">Kerjasama</a></td>

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

        if ($data_ar != NULL) {
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

        } else {
        ?>
            <center>
                <p><em>Maaf, Data AR dari RIKS Ini belum tersedia</em></p>
            </center>
<?php
        }
    }

    public function delete_ar($id)
    {
        $data = $this->db->query("SELECT `file` FROM `tr_kerjasama` WHERE `id_kerjasama` = '$id' OR `is_mou` = '$id' ")->result();

        foreach ($data as $value) {
            if (isset($value->file))
            unlink('./upload/kerjasama/' . $value->file);
        }

        return $this->db->query("DELETE FROM tr_kerjasama WHERE id_kerjasama = '$id' OR is_mou ='$id' ");
    }
}
