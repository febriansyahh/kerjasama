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
        <div class="card">
            <div class="box-body">
                <div class="card-body">
                    <h5>Riwayat Ajuan Kerjasama</h5>
                    <br>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Unit</th>
                                <th>Nama Ajuan</th>
                                <th>Mitra</th>
                                <th>Bentuk MoA</th>
                                <th>Tgl. Mulai</th>
                                <th>Tgl. Selesai</th>
                                <th>Status</th>
                                <th>Tgl. Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($detail as $value) : ?>
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
                                            <?php echo date('d-m-Y', strtotime($value->tgl_mulai)) ?>
                                        </td>

                                        <td>
                                            <?php echo date('d-m-Y', strtotime($value->tgl_selesai)) ?>
                                        </td>

                                        <td>
                                            <?php echo $value->nama_status ?>
                                        </td>

                                        <td>
                                            <?php echo date('d-m-Y', strtotime($value->sysInput)) ?>
                                        </td>

                                    </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </main>
    <?php $this->load->view("_partials/admin/js.php") ?>
    <?php $this->load->view("_partials/admin/modal.php") ?>

</body>

</html>