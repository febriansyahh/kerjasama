<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/admin/head.php") ?>
</head>

<body>


    <?php $this->load->view("_partials/admin/sidebar.php") ?>


    <main class="content">

        <?php $this->load->view("_partials/admin/navbar.php") ?>
        <!-- <div class="card mb-3">
			<div class="">
			</div><br>
		</div> -->
        <div class="card">
            <div class="box-body">
                <div class="card-body">
                    <center>
                        <img src="<?php echo base_url('assets/img/umk.png'); ?>" style="width:70px; height:70px;">
                        <br><br><b>Memorandum of Understanding</b><br>
                        <b>"<?php echo $getBy->nm_kerjasama ?>"</b>
                    </center>

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
                                foreach ($getrks as $value) : ?>
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
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#groupar" onclick="groupar(this)" data-id="<?php echo $value->id_kerjasama . "~" . $value->is_group   ?>" class="btn btn-custom btn-sm"><i class="fas fa-file"></i> AR</a>
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

<div id="groupar" class="modal fade">
    <div class="modal-dialog" style="padding-top: 50px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rincian AR</h5>
                <a href="" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times" aria-hidden="true"></i>
                </a>
            </div>
            <div class="modal-body">
                <div id="ar_view">
                </div>
            </div>
        </div>
    </div>
</div>