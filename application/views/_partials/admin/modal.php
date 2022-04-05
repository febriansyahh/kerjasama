<div id="myUser" class="modal fade">
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
						<label for="kode">Tingkatan Unit*</label>
						<select name="idTingkatan" id="" class="form-control">
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
						<input class="btn btn-success" type="submit" name="btn" value="Save" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
