<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_partials/admin/head.php") ?>
</head>

<body>


	<?php $this->load->view("_partials/admin/sidebar.php") ?>


	<main class="content">

		<?php $this->load->view("_partials/admin/navbar.php") ?>
		<br>
		<a data-bs-toggle="modal" data-bs-target="#myUser" class="btn btn-primary btn-sm">Tambah User</a>
		<?php
		if ($this->session->flashdata('gglSimpan')) echo '<script> swal("Gagal!", "Simpan Gagal !!", "error") </script>';
		if ($this->session->flashdata('simpan')) echo '<script> swal("Berhasil!", "Berhasil Menambah Data User Pengguna !!", "success") </script>';
		if ($this->session->flashdata('ubah')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Data User Pengguna !!", "success") </script>';
		if ($this->session->flashdata('terhapus')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Data User Pengguna !!", "success") </script>';
		if ($this->session->flashdata('gglUbah')) echo '<script> swal("Gagal!", "Gagal Mengubah Data User Pengguna !!", "error") </script>';
		?>
		<br><br>
		<!-- <div class="card mb-3">
			<div class="">
			</div><br>
		</div> -->
		<div class="card">
			<div class="box-body">
				<div class="card-body">
					<div class="table-responsive py-4">
						<table id="example" class="display" style="width:100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama User</th>
									<th>Username</th>
									<th>Unit</th>
									<th>Akses View</th>
									<th>Akses Unduh</th>
									<th>Pilihan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($user as $value) : ?>
									<tr>
										<td>
											<?php echo $no++ ?>
										</td>

										<td>
											<?php echo $value->nmUser ?>
										</td>

										<td>
											<?php echo $value->username ?>
										</td>

										<td>
											<?php echo $value->nmUnit ?>
										</td>
										<td>
											<?php
											if ($value->is_view == '1') {
											?>
												Diberikan
											<?php
											} else {
											?> Tidak Diberikan
											<?php
											}
											?>
										</td>
										<td>
											<?php
											if ($value->is_download == '1') {
											?>
												Diberikan
											<?php
											} else {
											?> Tidak Diberikan
											<?php
											}
											?>
										</td>

										<td>
											<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editUser" onclick="editableUser(this)" data-id="<?php echo $value->idUser . "~" . $value->nmUser . "~" . $value->username .  "~" . $value->password . "~" . $value->nmUnit . "~" . $value->idUnit . "~" . $value->levelUser . "~" . $value->is_view . "~" . $value->is_download  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
											<a href="<?php echo site_url('admin/user/delete/' . $value->idUser) ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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
	<?php $this->load->view("_partials/admin/js.php") ?>
	<?php $this->load->view("_partials/admin/modal.php") ?>

</body>

</html>

<div id="editUser" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="">Ubah Data User</h5>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('admin/User/edit') ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="kode">Username</label>
								<input type="hidden" name="id" id="editID" required>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" type="text" name="username" min="0" id="editUsername" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="kode">Nama User Pengguna</label>
								<input class="form-control <?php echo form_error('nama_user') ? 'is-invalid' : '' ?>" type="text" name="nama_user" min="0" id="editnmUser" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_user') ?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- <div class="col-6">
						<div class="form-group">
							<label for="kode">Unit Terkait</label>
							<select name="idUnit" id="editidUnit" class="form-control">
								<option value="">- Pilih -</option>
								<?php
								foreach ($unit as $row) {
									echo "<option value='" . $row->idUnit . "~" . $row->nmUnit . "'>" . $row->nmUnit . "</option>";
								}
								?>
							</select>
							<div class="invalid-feedback">
								<?php echo form_error('idTingkatan') ?>
							</div>
						</div>
					</div> -->
						<div class="col-6">
							<div class="form-group">
								<label for="kode">Password</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="password" name="password" />
								<small><code><em>* Kosongi jika tidak ingin merubah password</em></code></small>
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>
						</div>

						<div class="col-6">
							<div class="form-group">
								<label for="kode">Level Pengguna</label>
								<select name="level" id="editlevelUser" class="form-control">
									<option value="">- Pilih -</option>
									<option value="1">Admin</option>
									<option value="2">Operator / PIC</option>
									<option value="3">Unit</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('level') ?>
								</div>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="kode">Akses View</label>
								<select name="is_view" id="editIsView" class="form-control">
									<option value="">- Pilih -</option>
									<option value="1">Ya</option>
									<option value="0">Tidak</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('is_view') ?>
								</div>
							</div>
						</div>

						<div class="col-6">
							<div class="form-group">
								<label for="kode">Akses Unduh</label>
								<select name="is_download" id="editIsDownload" class="form-control">
									<option value="">- Pilih -</option>
									<option value="1">Ya</option>
									<option value="0">Tidak</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('is_view') ?>
								</div>
							</div>
						</div>
					</div>

					<br><br>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
						<input class="btn btn-success" type="submit" name="btn" value="Ubah" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>