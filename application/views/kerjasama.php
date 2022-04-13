<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <?php $this->load->view("_partials/landing/head.php") ?>

</head>


<body>

  <main class="main" id="top">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">

      <?php $this->load->view("_partials/landing/navbar.php") ?>

    </nav>

    <section class="pt-4">
      <div class="container">
        <h1 class="h3 mb-3 text-gray-800">Daftar Memorandum of Understanding (MoU)</h1>
        <p class="mb-2 desc">Berikut adalah daftar Memorandum of Understanding (MoU) yang ditangani oleh Lembaga Informasi dan Komunikasi (LINFOKOM) berdasarkan ajuan unit masing-masing. Beberapa data MoU dibawah ini terdiri beberapa RIKS atau IA dan AR didalamnya.
        </p>
        <br>
        <table class="table table-bordered mb-0" id="data_table">
          <thead>
            <tr>
              <th>No</th>
              <th>Jenis MoU</th>
              <th>Nama Kerjasama</th>
              <th>Unit</th>
              <th style="display:none;">id_mou</th>
              <th>Mitra</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $no = 1;
            foreach ($getmoa as $value) {
            ?>
              <tr>
                <td class="td">
                  <?php echo $no++ ?>
                </td>

                <td class="td">
                  <?php echo $value->nama_mou ?>
                </td>

                <td class="td">
                  <?php echo $value->nm_kerjasama ?>
                </td>

                <td class="td">
                  <?php echo $value->nmUnit ?>
                </td>

                <td class="td" style="display:none;">
                  <?php echo $value->id_mou ?>
                </td>

                <td class="td">
                  <?php echo $value->mitra ?>
                </td>

                <!-- <td class="td">
                  <?php echo date('d-m-Y', strtotime($value->tgl_mulai)) ?>
                </td>

                <td class="td">
                  <?php echo date('d-m-Y', strtotime($value->tgl_selesai)) ?>
                </td> -->


                <td class="td"><button type="text" class="btn btn-custom">Kerjasama</button></td>

              </tr>
            <?php
            }
            foreach ($getrks as $value) {
            ?>
              <tr>
                <td class="td">
                  -
                </td>

                <td class="td">
                  <?php echo $value->nama_mou ?>
                </td>

                <td class="td">
                  <?php echo $value->nm_kerjasama ?>
                </td>

                <td class="td">
                  <?php echo $value->nmUnit ?>
                </td>

                <td class="td" style="display:none;">
                  <?php echo $value->id_mou ?>
                </td>

                <td class="td">
                  <?php echo $value->mitra ?>
                </td>

                <!-- <td class="td">
                  <?php echo date('d-m-Y', strtotime($value->tgl_mulai)) ?>
                </td>

                <td class="td">
                  <?php echo date('d-m-Y', strtotime($value->tgl_selesai)) ?>
                </td> -->


                <td class="td"><button type="text" class="btn btn-custom">Kerjasama</button></td>

              </tr>
            <?php
            }
            foreach ($getar as $value) {
            ?>
              <tr>
                <td class="td"> </td>

                <td class="td">
                  <?php echo $value->nama_mou ?>
                </td>

                <td class="td">
                  <?php echo $value->nm_kerjasama ?>
                </td>

                <td class="td">
                  <?php echo $value->nmUnit ?>
                </td>

                <td class="td" style="display:none;">
                  <?php echo $value->id_mou ?>
                </td>

                <td class="td">
                  <?php echo $value->mitra ?>
                </td>

                <!-- <td class="td">
                  <?php echo date('d-m-Y', strtotime($value->tgl_mulai)) ?>
                </td>

                <td class="td">
                  <?php echo date('d-m-Y', strtotime($value->tgl_selesai)) ?>
                </td> -->

                <td class="td"><button type="text" class="btn btn-custom">Kerjasama</button></td>

              </tr>
            <?php
            }
            ?>

          </tbody>
        </table>
      </div>
    </section>


    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="text-center py-0">

      <div class="container">
        <div class="container border-top py-3">
          <div class="row justify-content-between">
            <div class="col-12 mb-1 mb-md-0">
              <p class="mb-0">&copy; Support by UPT-PSI</p>
            </div>

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

  <?php $this->load->view("_partials/landing/js.php") ?>

</body>

</html>