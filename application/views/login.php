<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view("_partials/landing/head.php") ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
     <?php $this->load->view("_partials/landing/navbar.php") ?>

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <br>

  <main id="main">
  <section id="login" class="content">
      <br><br><br>
      <?php
                if($this->session->flashdata('akses')) echo '<script> swal("Gagal!", "Gagal Login, Anda Tidak Memiliki Akses !!", "error") </script>';
                if($this->session->flashdata('belum')) echo '<script> swal("Gagal!", "Gagal Login, User Anda Belum Aktif !!", "error") </script>';
                if($this->session->flashdata('salah')) echo '<script> swal("Gagal!", "Gagal Login, Username atau Password Salah !!", "error") </script>';
                if($this->session->flashdata('tidakterdaftar')) echo '<script> swal("Gagal!", "Gagal Login, Username Belum Terdaftar !!", "error") </script>';
                if($this->session->flashdata('gglUbah')) echo '<script> swal("Gagal!", "Gagal Mengubah Data User Pengguna !!", "error") </script>';
              ?>
  <div class="card shadow-lg my-5 mx-auto" style="max-width: 500px;"  >
        <div class="card-body">
          <center>
            <br><img src="<?php echo base_url('assets/img/umk.png')?>" height="150px" width="150px" align="center"><br>
            <br>
            <form method="post" action="<?php echo base_url('login/cekLogin') ?>" enctype="multipart/form-data">
              <div class="form-group col-sm-7 mb-3  ">
                <input type="text" class="shadow-sm form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>
              <div class="form-group col-sm-7 mb-3">
                <input type="password" class="shadow-sm form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
              </div>
              <div class="form-group col-sm-5">
                <button class="form-control btn btn-primary">Login</button>
              </div>
            </form>
          </center><br>
        </div>
      </div>
  </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  

  <?php $this->load->view("_partials/landing/js.php") ?>


</body>

</html>