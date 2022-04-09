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
					<table id="example" class="display" style="width:100%" style="text-align:center;">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal Mou</th>
								<th>Kerjasama</th>
								<th>TENTANG/IMPLEMENTASI KEGIATAN</th>
								<th>Tanggal Berakir Mou</th>
								<th>Detail</th>
							</tr>
						</thead>
						<tbody>
							<?php 
									$no=1;
									foreach ($getAll as $value): ?>
							<tr>
								<td>
									<?php echo $no++ ?>
								</td>
								<td>
									<!-- tanggal mulai -->
									<?php echo $value->tgl_mulai ?>
								</td>
								<td>
									<!-- kerjasama -->
									<?php echo $value->nm_kerjasama ?>
								</td>
								<td>
									<!-- tentang -->
									<?php echo $value->keterangan ?>
								</td>
								<td>
									<!-- tgl berakir -->
									<?php echo $value->tgl_selesai ?>
								</td>
								
								<td>
									<!-- view -->
                                <a href="<?php echo site_url('admin/kerjasama_PUD/detail/'.$value->id_kerjasama) ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-eye"></i>View</a>
                                </td>

							</tr>
							<?php endforeach; ?>
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
