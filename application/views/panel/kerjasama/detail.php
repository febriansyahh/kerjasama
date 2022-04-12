<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/admin/head.php") ?>
</head>

<body>


    <?php $this->load->view("_partials/admin/sidebar.php") ?>


    <main class="content">

        <?php $this->load->view("_partials/admin/navbar.php") ?>
        <br><br>
        <!-- <div class="card mb-3">
			<div class="">
			</div><br>
		</div> -->
        <!-- <div class="card">
            <div class="box-body">
                <div class="card-body">
                    <h5>Detail Kerjasama</h5>
                    <br>
               
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-sm">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center"><b>Ajuan Kerjasama</b></h2>
                        <hr>
                        <form class="form" action="<?php echo site_url('admin/ajuan/add') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Nama Ajuan :</b></label>
                                <div class="col-sm-12">
                                    <input type="text" name="nm_ajuan" class="form-control" placeholder="Ajuan kerjasama" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Jenis MoU :</b></label>
                                <div class="col-sm-12">
                                    <select name="id_mou" id="" class="form-control" required>
                                        <!-- <option value="">- Pilih -</option>
                                        <?php
                                        foreach ($mou as $value) {
                                            echo "<option value='" . $value->id_mou . "'>" . $value->nama_mou . "</option>";
                                        }
                                        ?> -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Pengajuan dari unit :</b></label>
                                <div class="col-sm-12">
                                    <select name="unit" id="" class="form-control" required>
                                        <!-- <option value="">- Pilih -</option>
                                        <?php
                                        foreach ($unit as $value) {
                                            echo "<option value='" . $value->idUnit . "'>" . $value->nmUnit . "</option>";
                                        }
                                        ?> -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>Mitra Kerjasama :</b></label>
                                <div class="col-sm-12">
                                    <input type="text" name="mitra" class="form-control" placeholder="Nama Mitra" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label pb-2"><b>File Ajuan :</b></label>
                                <div class="col-sm-12">
                                    <input class="form-control<?php echo form_error('file') ? 'is-invalid' : '' ?>" type="file" name="file" accept="image/jpeg,image/jpg,image/png,application/pdf" onchange="readURL(this, 'fileAjuan')" />
                                    <input type="hidden" id="fileAjuan" />
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

                            <br>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary" name="btnSimpan">Ajukan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- <div class="col-sm">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center"><b>HASIL UPLOAD FILE</b></h2>
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
            </div> -->
        </div>
        <br><br>

    </main>
    <?php $this->load->view("_partials/admin/js.php") ?>
    <?php $this->load->view("_partials/admin/modal.php") ?>

</body>

</html>