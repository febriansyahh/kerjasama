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
				<div class="table-responsive py-6">
                <table class="table">
				<tbody>
                    <?php
						$no = 1;
						foreach ($detail as $data) {
						?>
						<tr class="gradeX">
						<!-- <td width="170"><b>Jenis MoU </b></td> -->
						<td with="10"> </td>
						<td with="170"><?php echo $data->nama_mou ?> </td>

						</tr>
						<tr class="gradeX">
						<!-- <td width="170"><b>Nama Ajuan</b></td> -->
						<td with="200"> </td>
						<td><?php echo $data->nm_ajuan?></td>

						</tr>
						<tr class="gradeX">
						<!-- <td width="170"><b>Nama Kerjasama </b></td> -->
						<td><?php echo $data->nm_kerjasama; ?></td>

						</tr>
						</tr>
						<tr class="gradeX">
						<!-- <td width="170"><b>Tanggal mulai </b></td> -->
						<td width="10">Tanggal mulai : <?php echo $data->tgl_mulai ?></td>
						<td>Tanggal selesai : <?php echo $data->tgl_selesai ?></td>

						</tr>
						</tr>
						<tr class="gradeX">
						<!-- <td width="170"><b>Tanggal selesai </b></td> -->
						<td with="200"> </td>
						<td><?php echo $data->keterangan ?></td>

						</tr>
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
