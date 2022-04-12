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
        <h4 style="font-family : Helvetica">Data Ajuan MoA</h4>
        <br><br>
        <!-- <div class="card mb-3">
			<div class="">
			</div><br>
		</div> -->
        <div class="card">
            <div class="box-body">
                <div class="card-body">
                    <div class="table-responsive py-4">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ajuan</th>
                                    <th>Unit</th>
                                    <th>Mitra</th>
                                    <th>Tgl. Mulai</th>
                                    <th>Tgl. Selesai</th>
                                    <th>St. Ajuan</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($getmoa as $value) : ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++ ?>
                                        </td>
                                        <td>
                                            <?php echo $value->nama_mou ?>
                                        </td>
                                        <td>
                                            <?php echo $value->nmUnit ?>
                                        </td>
                                        <td>
                                            <?php echo $value->mitra ?>
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
                                            <a href="<?php echo site_url('admin/ajuan/editable/' . $value->id_ajuan) ?>" onclick="editableAjuan(this)" data-id="<?php echo $value->id_ajuan . "~" . $value->file ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
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