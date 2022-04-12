<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_partials/admin/head.php") ?>
</head>

<body>


	<?php $this->load->view("_partials/admin/sidebar.php") ?>

	<?php
	$level = $this->session->userdata('levelUser');

	switch ($level) {
		case 1:
	?>
			<main class="content">

				<?php $this->load->view("_partials/admin/navbar.php") ?>
				<br>
				<a href="<?php echo site_url('admin/ajuan/ajukan') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Ajuan Kerjasama</a>
				<?php
				if ($this->session->flashdata('gglsimpan')) echo '<script> swal("Gagal!", "Simpan Gagal !!", "error") </script>';
				if ($this->session->flashdata('simpan')) echo '<script> swal("Berhasil!", "Berhasil Menambah Data Master MoU !!", "success") </script>';
				if ($this->session->flashdata('ubah')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Data Master MoU !!", "success") </script>';
				if ($this->session->flashdata('terhapus')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Data Master MoU !!", "success") </script>';
				if ($this->session->flashdata('gglubah')) echo '<script> swal("Gagal!", "Gagal Mengubah Data Master MoU !!", "error") </script>';
				if ($this->session->flashdata('dua')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Status Pengajuan ke pihak mitra !!", "success") </script>';
				if ($this->session->flashdata('ggldua')) echo '<script> swal("Gagal!", "Gagal Mengubah Status Pengajuan ke pihak mitra !!", "error") </script>';
				if ($this->session->flashdata('tiga')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Status ACC, Menunggu Penandatanganan !!", "success") </script>';
				if ($this->session->flashdata('ggltiga')) echo '<script> swal("Gagal!", "Gagal Mengubah Status ACC, Menunggu Penandatanganan !!", "error") </script>';
				if ($this->session->flashdata('empat')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Status Proses Penandatanganan !!", "success") </script>';
				if ($this->session->flashdata('gglempat')) echo '<script> swal("Gagal!", "Gagal Mengubah Status Proses Penandatanganan !!", "error") </script>';
				if ($this->session->flashdata('lima')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Status Ajuan Selesai !!", "success") </script>';
				if ($this->session->flashdata('ggllima')) echo '<script> swal("Gagal!", "Gagal Mengubah Status Ajuan Selesai !!", "error") </script>';
				?>
				<br><br>

				<div class="card">
					<div class="box-body">
						<div class="card-body">
							<div class="table-responsive py-4">
								<table id="ajuan" class="display" style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Ajuan</th>
											<th>Jenis MoU</th>
											<th>Unit</th>
											<th>Mitra</th>
											<th>Tgl. Mulai</th>
											<th>Tgl. Selesai</th>
											<th>Pilihan</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($getAll as $value) : ?>
											<tr>
												<td>
													<?php echo $no++ ?>
												</td>
												<td>
													<?php echo $value->nm_ajuan ?>
												</td>
												<td>
													<?php echo $value->nama_mou ?>
												</td>
												<td>
													<?php echo $value->nmUnit ?>
												</td>
												<td>
													<?php echo $value->mitra ?>
												</td>
												<td>
													<?php echo date('d-m-Y', strtotime($value->tgl_mulai)) ?>
												</td>
												<td>
													<?php echo date('d-m-Y', strtotime($value->tgl_selesai)) ?>
												</td>

												<td>
													<?php
													switch ($value->id_status) {
														case '1':
													?>
															<a href="<?php echo site_url('admin/ajuan/status_dua/' . $value->id_ajuan) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Status Ajuan Ke Mitra" class="btn btn-secondary btn-sm"><i class="fas fa-angle-double-up"></i></a>

														<?php
															break;
														case '2':
														?>
															<a href="<?php echo site_url('admin/ajuan/status_tiga/' . $value->id_ajuan) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Status Menunggu Penandatangan" class="btn btn-secondary btn-sm"><i class="fas fa-marker"></i></a>

														<?php
															break;
														case '3':
														?>
															<a href="<?php echo site_url('admin/ajuan/status_empat/' . $value->id_ajuan) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Status Proses Penandatangan" class="btn btn-secondary btn-sm"><i class="fas fa-signature"></i></a>

														<?php
															break;
														case '4':
														?>
															<a href="<?php echo site_url('admin/ajuan/status_lima/' . $value->id_ajuan) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Status Ajuan Selesai di Proses" class="btn btn-secondary btn-sm"><i class="fas fa-check-double"></i></a>

															<?php
															break;
															?>
													<?php
													}
													?>
													<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detailajuan" onclick="detailajuan(this)" data-id="<?php echo $value->id_ajuan . "~" . $value->nm_ajuan  . "~" . $value->mitra . "~" . $value->file  . "~" . $value->tgl_mulai . "~" . $value->tgl_selesai  . "~" . $value->nama_mou . "~" . $value->nmUnit ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>
													<a href="<?php echo site_url('admin/ajuan/editable/' . $value->id_ajuan) ?>" onclick="editableAjuan(this)" data-id="<?php echo $value->id_ajuan . "~" . $value->file ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
													<a onclick="deleteConfirm('<?php echo site_url('admin/ajuan/delete/' . $value->id_ajuan) ?>')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
												</td>

											</tr>
										<?php endforeach; ?>
									</tbody>

								</table>
							</div>
						</div>
					</div>
				</div>

			</main>

		<?php
			break;
		case 2:
		?>
			<main class="content">

				<?php $this->load->view("_partials/admin/navbar.php") ?>
				<br>
				<div class="card">
					<div class="box-body">
						<div class="card-body">
							<div class="table-responsive py-4">
								<table id="example" class="display" style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Ajuan</th>
											<th>Jenis MoU</th>
											<th>Unit</th>
											<th>Mitra</th>
											<th>Tgl. Mulai</th>
											<th>Tgl. Selesai</th>
											<th>Pilihan</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($getAll as $value) : ?>
											<tr>
												<td>
													<?php echo $no++ ?>
												</td>
												<td>
													<?php echo $value->nama_mou ?>
												</td>
												<td>
													<?php echo $value->nama_mou ?>
												</td>
												<td>
													<?php echo $value->nmUnit ?>
												</td>
												<td>
													<?php echo $value->mitra ?>
												</td>
												<td>
													<?php echo date('d-m-Y', strtotime($value->tgl_mulai)) ?>
												</td>
												<td>
													<?php echo date('d-m-Y', strtotime($value->tgl_selesai)) ?>
												</td>

												<td>
													<?php
													if ($this->session->userdata('is_down') == '1') {
													?>
														<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detailajuan" onclick="detailajuan(this)" data-id="<?php echo $value->id_ajuan . "~" . $value->nm_ajuan  . "~" . $value->mitra . "~" . $value->file  . "~" . $value->tgl_mulai . "~" . $value->tgl_selesai  . "~" . $value->nama_mou . "~" . $value->nmUnit ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>
														<a href="<?php echo base_url('upload/ajuan/' . $value->file) ?>" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-download"></i></a>
														<?php
													} else {
														if ($this->session->userdata('is_view') == '1') {
														?>
															<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detailajuan" onclick="detailajuan(this)" data-id="<?php echo $value->id_ajuan . "~" . $value->nm_ajuan  . "~" . $value->mitra . "~" . $value->file  . "~" . $value->tgl_mulai . "~" . $value->tgl_selesai  . "~" . $value->nama_mou . "~" . $value->nmUnit ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>
														<?php
														} else {
														?>
															<button class="btn btn-warning btn-sm">Maaf Anda Tidak Memilliki Akses</button>
													<?php
														}
													}
													?>
												</td>

											</tr>
										<?php endforeach; ?>
									</tbody>

								</table>
							</div>
						</div>
					</div>
				</div>

			</main>
		<?php
			break;

		case 3:
		?>
			<main class="content">

				<?php $this->load->view("_partials/admin/navbar.php") ?>
				<br>
				<div class="card">
					<div class="box-body">
						<div class="card-body">
							<div class="table-responsive py-4">
								<table id="example" class="display" style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Ajuan</th>
											<th>Jenis MoU</th>
											<th>Unit</th>
											<th>Mitra</th>
											<th>Tgl. Mulai</th>
											<th>Tgl. Selesai</th>
											<th>Pilihan</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($getAll as $value) : ?>
											<tr>
												<td>
													<?php echo $no++ ?>
												</td>
												<td>
													<?php echo $value->nama_mou ?>
												</td>
												<td>
													<?php echo $value->nama_mou ?>
												</td>
												<td>
													<?php echo $value->nmUnit ?>
												</td>
												<td>
													<?php echo $value->mitra ?>
												</td>
												<td>
													<?php echo date('d-m-Y', strtotime($value->tgl_mulai)) ?>
												</td>
												<td>
													<?php echo date('d-m-Y', strtotime($value->tgl_selesai)) ?>
												</td>

												<td>
													<?php
													if ($this->session->userdata('is_down') == '1') {
													?>
														<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detailajuan" onclick="detailajuan(this)" data-id="<?php echo $value->id_ajuan . "~" . $value->nm_ajuan  . "~" . $value->mitra . "~" . $value->file  . "~" . $value->tgl_mulai . "~" . $value->tgl_selesai  . "~" . $value->nama_mou . "~" . $value->nmUnit ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>
														<a href="<?php echo base_url('upload/ajuan/' . $value->file) ?>" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-download"></i></a>
														<?php
													} else {
														if ($this->session->userdata('is_view') == '1') {
														?>
															<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detailajuan" onclick="detailajuan(this)" data-id="<?php echo $value->id_ajuan . "~" . $value->nm_ajuan  . "~" . $value->mitra . "~" . $value->file  . "~" . $value->tgl_mulai . "~" . $value->tgl_selesai  . "~" . $value->nama_mou . "~" . $value->nmUnit ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>
														<?php
														} else {
														?>
															<button class="btn btn-warning btn-sm">Maaf Anda Tidak Memilliki Akses</button>
													<?php
														}
													}
													?>
												</td>

											</tr>
										<?php endforeach; ?>
									</tbody>

								</table>
							</div>
						</div>
					</div>
				</div>

			</main>
	<?php
			break;
	}
	?>
	<?php $this->load->view("_partials/admin/js.php") ?>
	<?php $this->load->view("_partials/admin/modal.php") ?>

</body>

</html>