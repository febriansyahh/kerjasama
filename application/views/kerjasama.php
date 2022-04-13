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

    <section class="pt-4">
      <div class="container">
        <h1 class="h3 mb-3 text-gray-800">Daftar Renovasi</h1>
        <p class="mb-4 desc">Berikut adalah daftar renovasi yang ditangani Unit Maintenance berdasarkan ajuan unit. Jika Anda ingin melaporkan kerusakan sarana dan prasarana kampus untuk diperbaiki, silakan melakukan login. Pengerjaan renovasi mayor bisa dilakukan pihak luar atau rekanan melalui proses tender/lelang. Bagi Anda yang berminat mengerjakan renovasi mayor yang ditawarkan, silakan melakukan login untuk mengajukan penawaran.
        </p>
        <table class="table table-bordered mb-0" id="data_table">
          <thead>
            <tr>
              <th>No</th>
              <th>Jenis Renovasi</th>
              <th>Lokasi</th>
              <th>Pemohon</th>
              <th>Tanggal Permohonan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="td">1</td>
              <td class="td">Mohon Bantuan merapikan kabel listrik</td>
              <td class="td">Ruang Kaprodi Fisioterapi Gedung D Lanti 2 FIK</td>
              <td class="td">Fakultas Ilmu Kesehatan</td>
              <td class="td">11-04-2022 <br>10:03:15</td>
              <td class="td"><button type="text" class="btn btn-custom">
                  Ajuan
                </button></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Mohon Bantuan merapikan kabel listrik</td>
              <td>Ruang Kaprodi Fisioterapi Gedung D Lanti 2 FIK</td>
              <td>Fakultas Ilmu Kesehatan</td>
              <td>11-04-2022 <br>10:03:15</td>
              <td><button type="text" class="btn btn-proses">
                  Dalam Proses
                </button></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Mohon Bantuan merapikan kabel listrik</td>
              <td>Ruang Kaprodi Fisioterapi Gedung D Lanti 2 FIK</td>
              <td>Fakultas Ilmu Kesehatan</td>
              <td>11-04-2022 <br>10:03:15</td>
              <td><button type="text" class="btn btn-selesai-renov">
                  Selesai Renovasi
                </button></td>
            </tr>

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
              <p class="mb-0">&copy; 2022 BAU UMK | Support by UPT-PSI</p>
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