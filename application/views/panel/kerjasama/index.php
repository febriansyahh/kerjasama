<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/admin/head.php") ?>
</head>

<body>


    <?php $this->load->view("_partials/admin/sidebar.php") ?>

    <?php
    $level = $this->session->userdata('levelUser');
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
                                <table id="example" class="display" style="width:100%">
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
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#preview" onclick="editableFile(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->file ?>" class="btn btn-success btn-sm"><i class="fas fa-info"></i> File</a>
                                                    <a href="<?php echo site_url('admin/kerjasama/detail/' . $value->id_kerjasama) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
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
                    <div class="dropdown">
                        <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-plus-square"></i>
                             &nbsp;Upload Kerjasama
                        </button>
                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                                </svg>
                                Add User
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                                </svg>
                                Add Widget
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"></path>
                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                                </svg>
                                Upload Files
                            </a>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="card">
                    <div class="box-body">
                        <div class="card-body">
                            <div class="table-responsive py-4">
                                <table id="example" class="display" style="width:100%">
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
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#preview" onclick="editableFile(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->file ?>" class="btn btn-success btn-sm"><i class="fas fa-info"></i> File</a>
                                                    <a href="<?php echo site_url('admin/kerjasama/detail/' . $value->id_kerjasama) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
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