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
                        <b>"<?php echo $getById->nm_kerjasama ?>"</b>
                    </center>
                </div>
                <div class="table-responsive py-3">
                    <table class="table">
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($getrks as $data) {
                            ?>
                                <tr class="gradeX">
                                    <td> <b>RIKS/IA</b><br> </td>
                                    <td> <b>Jenis MoU</b><br><?php echo $data->nama_mou ?> </td>
                                    <td><b>Nama Kerjasama </b><br><?php echo $data->nm_kerjasama; ?></td>
                                    <td><b>Unit </b><br><?php echo $data->nmUnit; ?></td>
                                    <td><b>Mitra </b><br><?php echo $data->mitra; ?></td>
                                    <td><b>Tanggal mulai :</b><br><?php echo date('d-m-Y', strtotime($data->tgl_mulai)) ?></td>
                                    <td><b>Tanggal selesai : </b><br><?php echo date('d-m-Y', strtotime($data->tgl_selesai)) ?></td>

                                </tr>
                            <?php
                            }
                            foreach ($getar as $value) {
                            ?>
                                <tr class="gradeX">
                                    <td><b></b><br> </td>
                                    <td> <b>Jenis MoU</b><br><?php echo $value->nama_mou ?> </td>
                                    <td><b>Nama Kerjasama </b><br><?php echo $value->nm_kerjasama; ?></td>
                                    <td><b>Unit </b><br><?php echo $value->nmUnit; ?></td>
                                    <td><b>Mitra </b><br><?php echo $value->mitra; ?></td>
                                    <td><b>Tanggal mulai :</b><br><?php echo date('d-m-Y', strtotime($value->tgl_mulai)) ?></td>
                                    <td><b>Tanggal selesai : </b><br><?php echo date('d-m-Y', strtotime($value->tgl_selesai)) ?></td>

                                </tr>
                            <?php
                            }
                            ?>
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