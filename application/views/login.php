<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>

  <?php $this->load->view("_partials/landing/head.php") ?>

</head>


<body>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    
    <section id="login" class="content">
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <?php $this->load->view("_partials/landing/navbar.php") ?>
        </nav>
      <br><br><br>
      <?php
      if ($this->session->flashdata('akses')) echo '<script> swal("Gagal!", "Gagal Login, Anda Tidak Memiliki Akses !!", "error") </script>';
      if ($this->session->flashdata('belum')) echo '<script> swal("Gagal!", "Gagal Login, User Anda Belum Aktif !!", "error") </script>';
      if ($this->session->flashdata('salah')) echo '<script> swal("Gagal!", "Gagal Login, Username atau Password Salah !!", "error") </script>';
      if ($this->session->flashdata('tidakterdaftar')) echo '<script> swal("Gagal!", "Gagal Login, Username Belum Terdaftar !!", "error") </script>';
      if ($this->session->flashdata('gglUbah')) echo '<script> swal("Gagal!", "Gagal Mengubah Data User Pengguna !!", "error") </script>';
      ?>
      <div class="card shadow-lg my-5 mx-auto" style="max-width: 500px;">
        <div class="card-body">
          <center>
            <br><img src="<?php echo base_url('assets/img/umk.png') ?>" height="150px" width="150px" align="center"><br>
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

    <!-- ============================================-->
    <!-- <section> begin ============================-->
   

  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->


  <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <iframe class="rounded" style="width:100%;height:500px;" src="https://www.youtube.com/embed/_lhdhL4UDIo" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>


  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <?php $this->load->view("_partials/landing/js.php") ?>

</body>

</html>