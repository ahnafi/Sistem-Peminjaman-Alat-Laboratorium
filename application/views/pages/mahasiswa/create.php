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
			<input type="text" name="nim" id="nim" class="form-control" maxlength="9" required>
		</div>

		<div class="mb-3">
			<label for="nama" class="form-label">Nama</label>
			<input type="text" name="nama" id="nama" class="form-control" required>
		</div>

		<div class="mb-3">
			<label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
			<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
		</div>

		<div class="mb-3">
			<label for="alamat" class="form-label">Alamat</label>
			<textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
		</div>

		<button type="submit" class="btn btn-success">Simpan</button>
		<a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
	</form>
</div>