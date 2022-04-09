<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/admin/head.php") ?>
</head>

<body>


    <?php $this->load->view("_partials/admin/sidebar.php") ?>


    <main class="content">

        <?php $this->load->view("_partials/admin/navbar.php") ?>
        <h4>Data Riwayat Kerjasama</h4>
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
                                    <th>Nama Ajuan</th>
                                    <th>Mitra</th>
                                    <th>Bentuk MoA</th>
                                    <th>Tgl. Selesai</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($all as $value) : ?>
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
                                            <?php echo $value->mitra ?>
                                        </td>

                                        <td>
                                            <?php echo $value->nama_mou ?>
                                        </td>

                                        <td>
                                            <?php echo date('d-m-Y', strtotime($value->tgl_selesai)) ?>
                                        </td>

                                        <td>
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#preview" onclick="editableFile(this)" data-id="<?php echo $value->id_ajuan . "~" . $value->file ?>" class="btn btn-success btn-sm"><i class="fas fa-info"></i> File</a>
                                            <a href="<?php echo site_url('admin/history/detail/' . $value->id_ajuan) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
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