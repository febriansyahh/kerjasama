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
		<a href="<?php echo site_url('admin/ajuan/ajukan')?>" class="btn btn-primary" ><i class="fas fa-plus"></i> Ajuan Kerjasama</a>
        <?php
                if($this->session->flashdata('gglsimpan')) echo '<script> swal("Gagal!", "Simpan Gagal !!", "error") </script>';
                if($this->session->flashdata('simpan')) echo '<script> swal("Berhasil!", "Berhasil Menambah Data Master MoU !!", "success") </script>';
                if($this->session->flashdata('ubah')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Data Master MoU !!", "success") </script>';
                if($this->session->flashdata('terhapus')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Data Master MoU !!", "success") </script>';
                if($this->session->flashdata('gglubah')) echo '<script> swal("Gagal!", "Gagal Mengubah Data Master MoU !!", "error") </script>';
              ?>
		<br><br>
		
        <div id="main">
      <div class="page-content">
        <section class="content">
          <div class="alert alert-success" role="alert">
            Maksimal Size File 2MB !!
          </div>
          <?php
            if ($this->session->flashdata('kelebihans')) echo '<script> swal("Size File Terlalu Besar, Maksimal 2 Mb !!", "", "error") </script>'; 
          ?>
          <div class="row">
            <div class="col-5">
              <div class="card shadow">
                <div class="card-body">
                  <h2 class="text-center"><b>SURAT IZIN</b></h2>
                  <hr>
                  <form class="form" action="<?php echo site_url('absen/Absen/addIzinAbsen') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-5 control-label pb-2"><b>File Surat Izin :</b></label>
                      <div class="col-sm-12">
                        <input class="form-control<?php echo form_error('fileSurat') ? 'is-invalid' : '' ?>" type="file" name="filesIzinAbsen" accept="image/jpeg,image/jpg,image/png,application/pdf" onchange="readURL(this, 'fileizins')" />
                        <input type="hidden" id="fileizins" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-5 control-label pb-2"><b>Tanggal Mulai :</b></label>
                      <div class="col-sm-12">
                        <input type="date" name="tglMulaiIzinAbsen" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-5 control-label pb-2"><b>Tanggal Selesai :</b></label>
                      <div class="col-sm-12">
                        <input type="date" name="tglSelesaiIzinAbsen" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-5 control-label pb-2"><b>Keterangan :</b></label>
                      <div class="col-sm-12">
                        <select name="AlasanIzinAbsen" id="" class="form-control" required>
                          <option value="">- pilih -</option>
                          <option value="Sakit">Sakit</option>
                          <option value="Izin">Izin</option>
                          <option value="Cuti">Cuti</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-5 control-label pb-2"><b>Catatan :</b></label>
                      <div class="col-sm-12">
                        <textarea name="KeteranganIzinAbsen" id="" cols="30" rows="2" class="form-control" required></textarea>
                      </div>
                    </div>
                    <br>
                    <div class="box-footer text-center">
                      <button type="submit" class="btn btn-primary" name="btnUpload" >Upload</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-7  ">
              <div class="card shadow">
                <div class="card-body">
                  <h2 class="text-center"><b>HASIL UPLOAD FILE</b></h2>
                  <hr>
                  <div class="col-12">
                    <div id="cuok">
                      <img id="blah" src="#" alt="" />
                    </div>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
    </div>

	</main>
	<?php $this->load->view("_partials/admin/js.php") ?>
	<?php $this->load->view("_partials/admin/modal.php") ?>

</body>

</html>