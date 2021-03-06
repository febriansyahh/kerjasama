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
		<a data-bs-toggle="modal" data-bs-target="#myTingkat" class="btn btn-primary btn-sm">Tambah Tingkatan</a>
		<?php
		if ($this->session->flashdata('gglSimpan')) echo '<script> swal("Gagal!", "Simpan Gagal !!", "error") </script>';
		if ($this->session->flashdata('simpan')) echo '<script> swal("Berhasil!", "Berhasil Menambah Data Tingkatan !!", "success") </script>';
		if ($this->session->flashdata('ubah')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Data Tingkatan !!", "success") </script>';
		if ($this->session->flashdata('terhapus')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Data Tingkatan !!", "success") </script>';
		if ($this->session->flashdata('gglUbah')) echo '<script> swal("Gagal!", "Gagal Mengubah Data Tingkatan !!", "error") </script>';
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
									<th>Nama Tingkatan</th>
									<th>Pilihan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($tingkatan as $value) : ?>
									<tr>
										<td>
											<?php echo $no++ ?>
										</td>
										<td>
											<?php echo $value->nmTingkatan ?>
										</td>

										<td>
											<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editTingkatan" onclick="editableTingkatan(this)" data-id="<?php echo $value->idTingkatan . "~" . $value->nmTingkatan ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
											<a href="<?php echo site_url('admin/tingkatan/delete/' . $value->idTingkatan) ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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

<div id="editTingkatan" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="">Ubah Data Unit</h5>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('admin/tingkatan/update') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="kode">Nama Tingkatan*</label>
						<input type="hidden" class="form-control" id="editID" name="id" readonly>
						<input class="form-control <?php echo form_error('nmTingkatan') ? 'is-invalid' : '' ?>" type="text" name="nmTingkatan" id="editNm" />
						<div class="invalid-feedback">
							<?php echo form_error('nmTingkatan') ?>
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