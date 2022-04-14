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
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <?php $this->load->view("_partials/landing/navbar.php") ?>
      </nav>

      <section class="pt-6">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
              <p class="lead text-primary">Selamat Datang di</p>
              <h1 class="mb-4 fs-9 fw-bold">Sistem Kerjasama</h1>
              <!-- <p class="mb-6 lead text-secondary">di lingkungan Universitas Muria Kudus.</p> -->
              <p class="mb-6 lead text-secondary">Layanan informasi dan pendataan data kerjasama Universitas Muria dengan mitra dalam negeri maupun luar negeri.</p>
            </div>
            <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="assets/img/hero/bg-kerjasama.jpg" alt="" /></div>
          </div>
        </div>
      </section>

      <!-- ======= Hero Section ======= -->
      <!-- <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
            <div class="container text-center text-md-left" data-aos="fade-up">
            <h1>Selamat Datang Di <span>Kerjasama</span></h1>
            <h2>Universitas Muria Kudus</h2>
            </div>
        </section> -->
      <!-- End Hero -->


      <section id="what-we-do" class="what-we-do" style="background:#eff2f8;">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="icon-box">
                <div class="icon"> <i class="bx bx-receipt"></i><b><?php echo $moa->jumlah ?></b></div>
                <h4><a href="">MoU</a></h4>
                <p>Memorandum of Understanding</p>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              </div>
            </div>

            <div class="col-lg-4 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bx bxs-report"></i><b><?php echo $riks->jumlah ?></b></div>
                <h4><a href="">IA</a></h4>
                <p>Implementation Arrangement</p>
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              </div>
            </div>

            <div class="col-lg-4 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-hive"></i><b><?php echo $ar->jumlah ?></b></div>
                <h4><a href="">AR</a></h4>
                <p>Archive Report</p>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
              </div>
            </div>

          </div>

        </div>
      </section>

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pb-2 pb-lg-5">

        <?php $this->load->view("_partials/landing/footer.php") ?>

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="text-center py-0">

        <div class="container">
          <div class="container border-top py-3">
            <div class="row justify-content-between">
              <div class="col-12 mb-1 mb-md-0">
                <p class="mb-0">&copy;Support by UPT-PSI</p>
              </div>
              <!-- <div class="col-12 col-md-auto">
                <p class="mb-0">
                  Made with<span class="fas fa-heart mx-1 text-danger"> </span>by <a class="text-decoration-none ms-1" href="https://themewagon.com/" target="_blank">ThemeWagon</a></p>
              </div> -->
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


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