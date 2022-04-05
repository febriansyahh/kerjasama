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
  <div class="card shadow-lg my-5 mx-auto" style="max-width: 500px;" >
        <div class="card-body">
          <center>
            <br><img src="<?php echo base_url('assets/img/umk.png')?>" height="150px" width="150px" align="center"><br>
            <br>
            <form method="post" action="<?php echo base_url('admin/overview') ?>" enctype="multipart/form-data">
              <div class="form-group col-sm-7 mb-3  ">
                <input type="text" class="shadow-sm form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-7 mb-3">
                <input type="password" class="shadow-sm form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
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