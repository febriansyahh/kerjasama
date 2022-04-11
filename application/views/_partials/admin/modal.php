<div id="myTingkat" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tingkatan Unit</h5>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('admin/tingkatan/add') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="kode">Nama Tingkatan*</label>
						<input class="form-control <?php echo form_error('nmUnit') ? 'is-invalid' : '' ?>" type="text" name="nmTingkatan" min="0" placeholder="Example : Progdi, Unit, Fakultas" />
						<div class="invalid-feedback">
							<?php echo form_error('nmUnit') ?>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
						<input class="btn btn-success" type="submit" name="btn" value="Save" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="myUnit" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Data Unit</h5>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('admin/unit/add') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="kode">Nama Unit*</label>
						<input class="form-control <?php echo form_error('nmUnit') ? 'is-invalid' : '' ?>" type="text" name="nmUnit" min="0" placeholder="Example : Progdi, Unit, Fakultas" />
						<div class="invalid-feedback">
							<?php echo form_error('nmUnit') ?>
						</div>
					</div>


					<div class="form-group">
						<label for="kode">Unit Terkait*</label>
						<select name="parent" id="" class="form-control">
							<option value="0">- Pilih -</option>
							<?php
							foreach ($parent as $row) {
								echo "<option value='" . $row->idUnit . "'>" . $row->nmUnit . "</option>";
							}
							?>
						</select>
						<div class="invalid-feedback">
							<?php echo form_error('idTingkatan') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="kode">Tingkatan Unit*</label>
						<select name="idTingkatan" id="" class="form-control">
							<option value="">- Pilih -</option>
							<?php
							foreach ($tingkatan as $row) {
								echo "<option value='" . $row->idTingkatan . "'>" . $row->nmTingkatan . "</option>";
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
						<input class="btn btn-success" type="submit" name="btn" value="Save" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="myUser" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Data User</h5>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('admin/user/add') ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="kode">Username</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" type="text" name="username" min="0" placeholder="Username Sistem" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="kode">Password</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="password" name="password" min="0" placeholder="Password Sistem" />
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="kode">Unit Terkait</label>
								<select name="idUnit" id="" class="form-control">
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
						</div>

						<div class="col-6">
							<div class="form-group">
								<label for="kode">Level Pengguna</label>
								<select name="level" id="" class="form-control">
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
								<select name="is_view" id="" class="form-control">
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
								<select name="is_download" id="" class="form-control">
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
						<input class="btn btn-success" type="submit" name="btn" value="Save" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="myStatus" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Status MoU</h5>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('admin/status_ajuan/add') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="kode">Nama Status*</label>
						<input class="form-control <?php echo form_error('nama_status') ? 'is-invalid' : '' ?>" type="text" name="nama_status" min="0" placeholder="Status Pengajuan MoU" />
						<div class="invalid-feedback">
							<?php echo form_error('nama_status') ?>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
						<input class="btn btn-success" type="submit" name="btn" value="Save" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="myMOU" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Master Jenis MoU</h5>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('admin/mou/add') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="kode">Nama MoU*</label>
						<input class="form-control <?php echo form_error('nama_mou') ? 'is-invalid' : '' ?>" type="text" name="nama_mou" min="0" placeholder="MoA, RKS/IA, AR" />
						<div class="invalid-feedback">
							<?php echo form_error('nama_mou') ?>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
						<input class="btn btn-success" type="submit" name="btn" value="Save" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>