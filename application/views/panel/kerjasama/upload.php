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
                        <h2 class="text-center"><b>Upload Kerjasama</b></h2>
                        <hr>
                        <form class="form" action="<?php echo site_url('admin/kerjasama/add_riks') ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Berdasarkan Ajuan :</b></label>
                                <div class="col-sm-12">
                                    <select name="id_ajuan" id="chkerjasama" class="form-control" onchange="kerjaFunc();" required>
                                        <option value="">- Pilih -</option>
                                        <?php
                                        foreach ($ajuan as $value) {
                                            echo "<option value='" . $value->id_ajuan . "'>" . $value->nama_mou . " - " . $value->nm_ajuan . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Upload Kerjasama :</b></label>
                                <div class="col-sm-12">
                                    <select name="jenis" id="chekkerja" class="form-control" onchange="kerjaFunc();" required>
                                        <option value="">- Pilih -</option>
                                        <?php
                                        foreach ($jenis as $value) {
                                            echo "<option value='" . $value->id_mou . "'>" . $value->nama_mou . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div id="mouKerja">
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