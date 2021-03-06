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
            Maksimal Size File 2MB !!
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center"><b>Upload MoaA</b></h2>
                        <hr>
                        <form class="form" action="<?php echo site_url('admin/kerjasama/add_moa') ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Ajuan :</b></label>
                                <div class="col-sm-12">
                                    <select name="id_ajuan" id="" class="form-control" required>
                                        <option value="">- Pilih -</option>
                                        <?php
                                        foreach ($ajuan as $value) {
                                            echo "<option value='" . $value->id_ajuan . "~" . $value->id_mou . "'>" . $value->nama_mou . " - " . $value->nm_ajuan . "</option>";
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
                                <label class="col-sm-5 control-label pb-2"><b>Pengajuan dari unit :</b></label>
                                <div class="col-sm-12">
                                    <select name="unit" id="" class="form-control" required>
                                        <option value="">- Pilih -</option>
                                        <?php
                                        foreach ($unit as $value) {
                                            echo "<option value='" . $value->idUnit . "'>". $value->nmUnit .  "</option>";
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
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center"><b>Preview Upload File Kerjasama</b></h2>
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