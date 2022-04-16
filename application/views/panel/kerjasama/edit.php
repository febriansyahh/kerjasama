<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/admin/head.php") ?>
</head>

<body>


    <?php $this->load->view("_partials/admin/sidebar.php") ?>


    <main class="content">

        <?php $this->load->view("_partials/admin/navbar.php") ?>
        <br>
        <?php
        if ($this->session->flashdata('gglsimpan')) echo '<script> swal("Gagal!", "Simpan Gagal !!", "error") </script>';
        if ($this->session->flashdata('simpan')) echo '<script> swal("Berhasil!", "Berhasil Menambah Data Master MoU !!", "success") </script>';
        if ($this->session->flashdata('ubah')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Data Master MoU !!", "success") </script>';
        if ($this->session->flashdata('terhapus')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Data Master MoU !!", "success") </script>';
        if ($this->session->flashdata('gglubah')) echo '<script> swal("Gagal!", "Gagal Mengubah Data Master MoU !!", "error") </script>';
        ?>
        <br><br>

        <div class="alert alert-success" role="alert">
            Maksimal Size File 2MB !
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center"><b>Perubahan Kerjasama</b></h4>
                        <hr>
                        <form class="form" action="<?php echo site_url('admin/ajuan/edit') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $getData->id_ajuan ?>">
                            <input type="hidden" name="status" value="<?php echo $getData->id_status ?>">
                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Nama Kerjasama :</b></label>
                                <div class="col-sm-12">
                                    <input type="text" name="nm_ajuan" class="form-control" value="<?php echo $getData->nm_kerjasama ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Jenis MoU :</b></label>
                                <div class="col-sm-12">
                                    <select name="id_mou" id="" class="form-control" required>
                                        <?php
                                        foreach ($mou as $value) {
                                            if ($value->id_mou == $getData->id_mou) {
                                        ?> <option value="<?php echo $value->id_mou ?>" selected><?php echo $value->nama_mou ?></option> <?php
                                                                                                                                        } else {
                                                                                                                                            ?> <option value="<?php echo $value->id_mou ?>"><?php echo $value->nama_mou ?>
                                                </option> <?php
                                                                                                                                        }
                                                                                                                                    }
                                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Pengajuan dari unit :</b></label>
                                <div class="col-sm-12">
                                    <select name="id_unit" id="" class="form-control" required>
                                        <?php
                                        foreach ($unit as $value) {
                                            if ($value->idUnit == $getData->idUnit) {
                                        ?> <option value="<?php echo $value->idUnit ?>" selected><?php echo $value->nmUnit ?></option> <?php
                                                                                                                                    } else {
                                                                                                                                        ?> <option value="<?php echo $value->idUnit ?>"><?php echo $value->nmUnit ?></option> <?php
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                ?>
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Mitra Kerjasama :</b></label>
                                <div class="col-sm-12">
                                    <input type="text" name="mitra" class="form-control" value="<?php echo $getData->mitra ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>File Ajuan :</b></label>
                                <div class="col-sm-12">
                                    <input class="form-control<?php echo form_error('file') ? 'is-invalid' : '' ?>" type="file" name="fileAjuan" accept="image/jpeg,image/jpg,image/png,application/pdf" onchange="readURLEdit(this, 'fileAjuan')" />
                                    <input type="hidden" id="fileAjuan" />
                                </div>
                                <p><small><em>*Unggah file untuk mengubah file ajuan lama</em></small></p>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Tanggal Mulai :</b></label>
                                <div class="col-sm-12">
                                    <input type="date" name="tgl_mulai" class="form-control" value="<?php echo $getData->tgl_mulai ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Tanggal Selesai :</b></label>
                                <div class="col-sm-12">
                                    <input type="date" name="tgl_selesai" class="form-control" value="<?php echo $getData->tgl_selesai ?>" required>
                                </div>
                            </div>

                            <br><br>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary" name="btnSimpan">Ajukan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center"><b>Preview Upload File</b></h4>
                        <hr>
                        <div class="col-12">
                            <center>
                                <iframe src="<?php echo base_url('upload/kerjasama/' . $getData->file); ?>" frameborder="0" height="230px" width="470px"></iframe>
                            </center>
                            <hr>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center"><b>Preview File Ubahan</b></h4>
                        <hr>
                        <div class="col-12">
                            <center>
                                <div id="showFile">
                                    <img id="blah" src="#" alt="" />
                                </div>
                            </center>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>

    </main>
    <?php $this->load->view("_partials/admin/js.php") ?>
    <?php $this->load->view("_partials/admin/modal.php") ?>

</body>

</html>