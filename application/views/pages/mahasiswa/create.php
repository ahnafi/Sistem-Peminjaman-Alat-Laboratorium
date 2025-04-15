<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-lg border-0">
				<div class="card-header bg-success text-white py-3">
					<h4 class="mb-0">Tambah Mahasiswa</h4>
				</div>
				<div class="card-body">

					<?php if (validation_errors()): ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= validation_errors() ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif; ?>

					<form action="<?= base_url('mahasiswa/store') ?>" method="post">
						<div class="mb-3">
							<label for="nim" class="form-label fw-semibold">NIM</label>
							<input type="text" name="nim" id="nim" class="form-control" maxlength="20" required>
						</div>

						<div class="mb-3">
							<label for="nama" class="form-label fw-semibold">Nama</label>
							<input type="text" name="name" id="nama" class="form-control" required>
						</div>

						<div class="mb-3">
							<label for="email" class="form-label fw-semibold">Email</label>
							<input type="email" name="email" id="email" class="form-control" required>
						</div>

						<div class="mb-3">
							<label for="password" class="form-label fw-semibold">Password</label>
							<input type="password" name="password" id="password" class="form-control" required>
						</div>

						<div class="mb-3">
							<label for="password_confirm" class="form-label fw-semibold">Konfirmasi Password</label>
							<input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
						</div>

						<div class="d-flex justify-content-between">
							<a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">
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
