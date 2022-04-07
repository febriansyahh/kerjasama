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
					<table id="example" class="display" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Jenis MoU</th>
								<th>Ajuan</th>
								<th>Nama Kerjasama</th>
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
									<?php echo $value->nama_mou ?>
								</td>
								<td>
									<?php echo $value->nm_ajuan ?>
								</td>
								<td>
									<?php echo $value->nm_kerjasama ?>
								</td>
								
								<td>
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
