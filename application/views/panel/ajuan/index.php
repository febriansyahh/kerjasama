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
		<a href="<?php echo site_url('admin/ajuan/ajukan') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Ajuan Kerjasama</a>
		<?php
		if ($this->session->flashdata('gglsimpan')) echo '<script> swal("Gagal!", "Simpan Gagal !!", "error") </script>';
		if ($this->session->flashdata('simpan')) echo '<script> swal("Berhasil!", "Berhasil Menambah Data Master MoU !!", "success") </script>';
		if ($this->session->flashdata('ubah')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Data Master MoU !!", "success") </script>';
		if ($this->session->flashdata('terhapus')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Data Master MoU !!", "success") </script>';
		if ($this->session->flashdata('gglubah')) echo '<script> swal("Gagal!", "Gagal Mengubah Data Master MoU !!", "error") </script>';
		?>
		<br><br>
		<!-- <div class="card mb-3">
			<div class="">
			</div><br>
		</div> -->
		<div class="card">
			<div class="box-body">
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
										switch ($value->id_status) {
											case '1':
										?>
												<a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Status Ajuan Ke Mitra" class="btn btn-secondary btn-sm"><i class="fas fa-marker"></i></a>

											<?php
												break;
											case '2':
											?>
												<a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Status Menunggu Penandatangan" class="btn btn-secondary btn-sm"><i class="fas fa-marker"></i></a>

											<?php
												break;
											case '3':
											?>
												<a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Status Proses Penandatangan" class="btn btn-secondary btn-sm"><i class="fas fa-marker"></i></a>

											<?php
												break;
											case '4':
											?>
												<a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Status Ajuan Selesai di Proses" class="btn btn-secondary btn-sm"><i class="fas fa-marker"></i></a>

											<?php
												break;
											?>
										<?php
										}
										?>
										<a href="<?php echo site_url('admin/ajuan/editable/' . $value->id_ajuan) ?>" onclick="editableAjuan(this)" data-id="<?php echo $value->id_ajuan . "~" . $value->file ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
										<a onclick="deleteConfirm('<?php echo site_url('admin/ajuan/delete/' . $value->id_ajuan) ?>')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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

<div id="editMOU" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="">Ubah Data Master MoU</h5>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('admin/mou/update') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="kode">Nama Status*</label>
						<input type="hidden" class="form-control" id="editID" name="id" readonly>
						<input class="form-control <?php echo form_error('nama_mou') ? 'is-invalid' : '' ?>" type="text" name="nama_mou" id="editNm" />
						<div class="invalid-feedback">
							<?php echo form_error('nama_mou') ?>
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