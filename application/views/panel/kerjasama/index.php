<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/admin/head.php") ?>
</head>

<body>


    <?php $this->load->view("_partials/admin/sidebar.php") ?>

    <?php
    $level = $this->session->userdata('levelUser');
    if ($this->session->flashdata('gglsimpan')) echo '<script> swal("Gagal!", "Simpan Gagal !!", "error") </script>';
    if ($this->session->flashdata('simpan')) echo '<script> swal("Berhasil!", "Berhasil Menambah Data Master MoU !!", "success") </script>';
    if ($this->session->flashdata('ubah')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Data Master MoU !!", "success") </script>';
    if ($this->session->flashdata('terhapus')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Data Master MoU !!", "success") </script>';
    if ($this->session->flashdata('gglubah')) echo '<script> swal("Gagal!", "Gagal Mengubah Data Master MoU !!", "error") </script>';
    switch ($level) {
        case 1:
    ?>
            <main class="content">

                <?php $this->load->view("_partials/admin/navbar.php") ?>
                <h4>Data Kerjasama</h4>
                <br><br>
                <div class="card">
                    <div class="box-body">
                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <table id="kerjasama" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Unit</th>
                                            <th>Nama Kerjasama</th>
                                            <th>Nama Ajuan</th>
                                            <th>Mitra</th>
                                            <th>Bentuk MoA</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($getAll as $value) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++ ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->nmUnit ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->nm_ajuan ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->nm_kerjasama ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->mitra ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->nama_mou ?>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detmoa" onclick="detmoa(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->is_group  ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i>Modal</a>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detailkerja" onclick="detailkerja(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->nm_ajuan  . "~" . $value->nm_kerjasama . "~" . $value->mitra  . "~" . $value->nmUnit . "~" . $value->file . "~" . $value->tgl_mulai . "~" . $value->tgl_selesai  . "~" . $value->keterangan . "~" . $value->nama_mou ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        <?php
            break;
        case 2:
        ?>
            <main class="content">

                <?php $this->load->view("_partials/admin/navbar.php") ?>
                <div class="py-4">
                    <a href="<?php echo site_url('admin/kerjasama/upload') ?>" class="btn btn-primary"><i class="fas fa-plus-square"></i> Upload Kerjasama</a>

                </div>
                <!-- <div class="py-4">
                    <div class="dropdown">
                        <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-plus-square"></i>
                            &nbsp;Upload Kerjasama
                        </button>
                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('admin/kerjasama/moa') ?>">
                                <i class="fas fa-upload"></i>&nbsp;
                                Upload MoA
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('admin/kerjasama/riks') ?>">
                                <i class="fas fa-upload"></i>&nbsp;
                                Upload RIKS / IA
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="fas fa-upload"></i>&nbsp;
                                Upload AR
                            </a>
                        </div>
                    </div>
                </div> -->
                <br><br>
                <div class="card">
                    <div class="box-body">
                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <table id="kerjasama" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Unit</th>
                                            <th>Nama Kerjasama</th>
                                            <th>Nama Ajuan</th>
                                            <th>Mitra</th>
                                            <th>Bentuk MoA</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($getAll as $value) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++ ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->nmUnit ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->nm_ajuan ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->nm_kerjasama ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->mitra ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->nama_mou ?>
                                                </td>

                                                <td>
                                                    <?php
                                                    if ($this->session->userdata('is_down') == '1') {
                                                    ?>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detailkerja" onclick="detailkerja(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->nm_ajuan  . "~" . $value->nm_kerjasama . "~" . $value->mitra  . "~" . $value->nmUnit . "~" . $value->file . "~" . $value->tgl_mulai . "~" . $value->tgl_selesai  . "~" . $value->keterangan . "~" . $value->nama_mou ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detmoa" onclick="detmoa(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->is_group  ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i>Modal</a>

                                                        <?php
                                                    } else {
                                                        if ($this->session->userdata('is_view') == '1') {
                                                        ?>
                                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detmoa" onclick="detmoa(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->is_group  ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i>Modal</a>
                                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detkernon" onclick="detkernon(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->nm_ajuan  . "~" . $value->nm_kerjasama . "~" . $value->mitra  . "~" . $value->nmUnit . "~" . $value->file . "~" . $value->tgl_mulai . "~" . $value->tgl_selesai  . "~" . $value->keterangan . "~" . $value->nama_mou ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <button class="btn btn-warning btn-sm">Maaf Anda Tidak Memilliki Akses</button>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        <?php
            break;

        case 3:
        ?>
            <main class="content">

                <?php $this->load->view("_partials/admin/navbar.php") ?>
                <div class="card">
                    <div class="box-body">
                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <table id="kerjasama" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Unit</th>
                                            <th>Nama Kerjasama</th>
                                            <th>Nama Ajuan</th>
                                            <th>Mitra</th>
                                            <th>Bentuk MoA</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($getAll as $value) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++ ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->nmUnit ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->nm_ajuan ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->nm_kerjasama ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->mitra ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->nama_mou ?>
                                                </td>

                                                <td>
                                                    <?php
                                                    if ($this->session->userdata('is_down') == '1') {
                                                    ?>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detailkerja" onclick="detailkerja(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->nm_ajuan  . "~" . $value->nm_kerjasama . "~" . $value->mitra  . "~" . $value->nmUnit . "~" . $value->file . "~" . $value->tgl_mulai . "~" . $value->tgl_selesai  . "~" . $value->keterangan . "~" . $value->nama_mou ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detmoa" onclick="detmoa(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->is_group  ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i>Modal</a>
                                                        <a href="<?php echo base_url('upload/kerjasama/' . $value->file) ?>" target="_blank" class="btn btn-secondary btn-sm"><i class="fas fa-download"></i></a>
                                                        <a href="<?php echo site_url('admin/kerjasama/v_detail/' . $value->id_kerjasama) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>

                                                        <?php
                                                    } else {
                                                        if ($this->session->userdata('is_view') == '1') {
                                                        ?>
                                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detkernon" onclick="detkernon(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->nm_ajuan  . "~" . $value->nm_kerjasama . "~" . $value->mitra  . "~" . $value->nmUnit . "~" . $value->file . "~" . $value->tgl_mulai . "~" . $value->tgl_selesai  . "~" . $value->keterangan . "~" . $value->nama_mou ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                                            <!-- <a href="<?php echo site_url('admin/kerjasama/detail/' . $value->id_kerjasama) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a> -->
                                                            <a href="<?php echo site_url('admin/kerjasama/v_detail/' . $value->id_kerjasama) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <button class="btn btn-warning btn-sm">Maaf Anda Tidak Memilliki Akses</button>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
    <?php
            break;
    }
    ?>
    <?php $this->load->view("_partials/admin/js.php") ?>
    <?php $this->load->view("_partials/admin/modal.php") ?>

</body>

</html>

<div id="preview" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="">Preview File Ajuan</h5>
                <a href="" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times" aria-hidden="true"></i>
                </a>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div id="showFile">
                        <img id="blah" src="#" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>