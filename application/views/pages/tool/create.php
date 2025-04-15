<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-lg border-0">
				<div class="card-header bg-primary text-white py-3">
					<h4 class="mb-0"><?= $title ?? "Tambah Alat" ?></h4>
				</div>
				<div class="card-body">

					<?php if (validation_errors()): ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= validation_errors() ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif; ?>

					<form action="<?= base_url('tool/store') ?>" method="post">
						<div class="mb-3">
							<label for="nama" class="form-label fw-semibold">Nama Alat</label>
							<input type="text" name="nama_alat" id="nama" class="form-control" required>
						</div>

						<div class="mb-3">
							<label for="stok" class="form-label fw-semibold">Stok</label>
							<input type="number" name="stok" id="stok" class="form-control" min="0" required>
						</div>

						<div class="mb-3">
							<label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
							<textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"></textarea>
						</div>

						<div class="d-flex justify-content-between">
							<a href="<?= base_url('tool') ?>" class="btn btn-secondary">
								<i class="bi bi-arrow-left"></i> Kembali
							</a>
							<button type="submit" class="btn btn-success">
								<i class="bi bi-check-circle"></i> Simpan
							</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
