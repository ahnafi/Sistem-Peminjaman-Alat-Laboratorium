<div class="container my-5">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card shadow-sm border-0">
				<div class="card-body p-4">
					<h3 class="card-title mb-4 text-primary"><?= $title ?? "Edit Alat" ?></h3>

					<?php if (validation_errors()): ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= validation_errors() ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif; ?>

					<form action="<?= base_url('tool/update/' . $alat->id) ?>" method="post">
						<input type="text" hidden id="id" class="form-control" value="<?= $alat->id ?>" readonly>

						<div class="mb-3">
							<label for="nama_alat" class="form-label">Nama Alat</label>
							<input type="text" name="nama_alat" id="nama_alat" class="form-control" required
								   value="<?= $alat->nama_alat ?>">
						</div>

						<div class="mb-3">
							<label for="deskripsi" class="form-label">Deskripsi</label>
							<textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"><?= $alat->deskripsi ?></textarea>
						</div>

						<div class="mb-3">
							<label for="stok" class="form-label">Stok</label>
							<input type="number" name="stok" id="stok" class="form-control" required min="0"
								   value="<?= $alat->stok ?>">
						</div>

						<div class="d-flex justify-content-between">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="<?= base_url('tool') ?>" class="btn btn-outline-secondary">Kembali</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
