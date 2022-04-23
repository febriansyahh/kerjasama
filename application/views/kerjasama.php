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
        <table class="table table-bordered mb-0" id="data_tables">
          <thead>
            <tr>
              <th>No</th>
              <th>Jenis MoU</th>
              <th>Nama Kerjasama</th>
              <th>Unit</th>
              <th>Mitra</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $no = 1;
            $urut = 1;
            foreach ($parent as $value) {
            ?>
              <tr>
                <td class="td">
                  <?php
                  echo $no++;
                  ?>
                </td>
                <td class="td">
                  <?php echo 'MOU' ?>
                </td>

                <td class="td">
                  <?php echo $value->nm_ajuan ?>
                </td>

                <td class="td">
                  <?php echo $value->nmUnit ?>
                </td>

                <td class="td">
                  <?php echo $value->mitra ?>
                </td>
                <td class="td"><a href="#" data class="btn btn-custom" onclick="moakerjasama(<?php echo $value->id_ajuan ?>);">Kerjasama</a></td>
              </tr>
            <?php
            }
            ?>

          </tbody>
        </table>
      </div>
    </section>

    <section class="pt-4">
      <div class="container">
        <div id="moa">

        </div>
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

  <?php $this->load->view("_partials/landing/js.php") ?>

</body>

</html>


<div id="groupmou" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Rincian Daftar MOU</h5>
        <a href="" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times" aria-hidden="true"></i>
        </a>
      </div>
      <div class="modal-body">
        <div id="treeview">
        </div>
      </div>
    </div>
  </div>
</div>

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