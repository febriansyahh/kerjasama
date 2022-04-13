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
				<div class="table-responsive py-9">
                <table class="table">
				<tbody>
                    <?php
						$no = 1;
						foreach ($detail as $data) {
						?>
						<tr>
						<td style="border-bottom:3px double #000000;padding-left:200px" valign="left" align="center" width="300">
                            <img src="<?php echo base_url('assets/img/umk.png');?>" >
                        </td>
						<td colspan="5" style="border-bottom:3px double #000000; padding-top: 0px; line-height: 20px; text-align: center; padding-right:300px;">
                            <!-- <center> -->
							<span class="nama1" style="font-weight: bold;">YAYASAN PEMBINA UNIVERSITAS MURIA KUDUS<br></span>
                            <span class="nama1" style="font-weight: bold;">Universitas Muria Kudus<br></span>
                            <span class="nama1" style="font-weight: bold;">Gondangmanis, Bae PO. BOX 53 Telp: 0291 438229 Fax: 0291 437198<br></span>
                            <span class="nama1" style="font-weight: bold;">E-Mail: muria@umk.ac.id  Situs: http://umk.ac.id<br>KUDUS 59352<br></span>
                        	<!-- </center> -->
                        </td>
						</tr>
						<?php
                            $no = 1;
                            foreach ($getrks as $value) { 
                            ?>
							<tr>
                                    <td>
                                      <b> RIKS/AR </b>
                                    </td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
                                    <td>
                                       <b> Jenis MoU</b><br><?php echo $value->nama_mou ?>
                                    </td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
                                    <td>
                                      <b> Kerjasama</b><br><?php echo $value->nm_kerjasama ?>
                                    </td>
                                    <td>
                                       <b>Mitra</b><br> <?php echo $value->mitra ?>
                                    </td>
                                    <td>
                                       <b> Tanggal Mulai </b> <?php echo date('d-m-Y', strtotime($value->tgl_mulai)) ?><br>
										<b> Tanggal Selesai </b> <?php echo date('d-m-Y', strtotime($value->tgl_selesai)) ?>
                                    </td>

                                </tr>
                            <?php
                            }
                            foreach ($getar as $value) {
                            ?>
								<tr>
                                    <td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
                                    <td>
                                       <b> Jenis MoU</b><br> <?php echo $value->nama_mou ?>
                                    </td>
									<td></td>
									<td></td>
								</tr>
								<tr>
								
									<td></td>
                                    <td>
                                       <b>Nama Kerjasama</b><br> <?php echo $value->nm_kerjasama ?>
                                    </td>
                                    <td>
                                      <b> Mitra </b><br> <?php echo $value->mitra ?>
                                    </td>
                                    <td>
                                      <b>Tanggal Mulai</b> <?php echo date('d-m-Y', strtotime($value->tgl_mulai)) ?><br>
								 	  <b>Tanggal Selesai</b><?php echo date('d-m-Y', strtotime($value->tgl_selesai)) ?>
                                    </td>
                            <?php
                            }
                            ?>
						<tr>
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
