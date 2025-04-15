<div class="container mt-4">
	<h2>Tambah Mahasiswa</h2>

	<?php if (validation_errors()): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?= validation_errors() ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<form action="<?= base_url('mahasiswa/store') ?>" method="post">
		<div class="mb-3">
			<label for="nim" class="form-label">NIM</label>
			<input type="text" name="nim" id="nim" class="form-control" maxlength="20" required>
		</div>

		<div class="mb-3">
			<label for="nama" class="form-label">Nama</label>
			<input type="text" name="name" id="nama" class="form-control" required>
		</div>

		<div class="mb-3">
			<label for="email" class="form-label">Email</label>
			<input type="email" name="email" id="email" class="form-control" required>
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="password" name="password" id="password" class="form-control" required>
		</div>

		<div class="mb-3">
			<label for="password_confirm" class="form-label">Konfirmasi Password</label>
			<input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
		</div>


		<button type="submit" class="btn btn-success">Simpan</button>
		<a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
	</form>
</div>
