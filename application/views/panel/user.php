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
		<a data-bs-toggle="modal" data-bs-target="#myUnit" class="btn btn-primary btn-sm">Tambah User</a>
        <?php
                if($this->session->flashdata('gglSimpan')) echo '<script> swal("Gagal!", "Simpan Gagal !!", "error") </script>';
                if($this->session->flashdata('simpan')) echo '<script> swal("Berhasil!", "Berhasil Menambah Data Unit !!", "success") </script>';
                if($this->session->flashdata('ubah')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Data Unit !!", "success") </script>';
                if($this->session->flashdata('terhapus')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Data Unit !!", "success") </script>';
                if($this->session->flashdata('gglUbah')) echo '<script> swal("Gagal!", "Gagal Mengubah Data Unit !!", "error") </script>';
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
								<th>Nama User</th>
								<th>Username</th>
								<th>Unit</th>
								<th>Pilihan</th>
							</tr>
						</thead>
						<tbody>
							<?php 
									$no=1;
									foreach ($user as $value): ?>
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
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editUnit"
                                    onclick="editableUnit(this)"
                                    data-id="<?php echo $value->idUser . "~" . $value->nmUser . "~" . $value->username . "~" . $value->nmUnit . "~" . $value->idUnit . "~" . $value->levelUser ?>"
                                    class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/' . $value->idUser) ?>')"
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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

<div id="editUnit" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="">Ubah Data User</h5>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('admin/unit/edit') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="kode">Nama Unit*</label>
                        <input type="hidden" class="form-control" id="editID" name="id" readonly>
						<input class="form-control <?php echo form_error('nmUnit') ? 'is-invalid' : '' ?>" type="text" name="nmUnit" id="editNm"/>
						<div class="invalid-feedback">
							<?php echo form_error('nmUnit') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="kode">Tingkatan Unit*</label>
						<select name="idTingkatan" id="editIdTingkat" class="form-control">
							<option value="">- Pilih -</option>
							<?php
								foreach($tingkatan as $row){
									echo "<option value='" . $row->idTingkatan . "'>" . $row->nmTingkatan ."</option>";
								}
							?>
						</select>
						<div class="invalid-feedback">
							<?php echo form_error('idTingkatan') ?>
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