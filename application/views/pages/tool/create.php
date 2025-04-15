<div class="container mt-4">
	<h2><?= $title ?? "Tambah Alat" ?></h2>

	<?php if (validation_errors()): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= validation_errors() ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<form action="<?= base_url('tool/store') ?>" method="post" class="">
		<div class="mb-3">
			<label for="nama" class="form-label">Nama Alat</label>
			<input type="text" name="nama_alat" id="nama" class="form-control" required>
		</div>

		<div class="mb-3">
			<label for="stok" class="form-label">Stok</label>
			<input type="number" name="stok" id="stok" class="form-control" min="0" required>
		</div>

		<div class="mb-3">
			<label for="deskripsi" class="form-label">Deskripsi</label>
			<textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"></textarea>
		</div>
		<button type="submit" class="btn btn-success">Simpan</button>
		<a href="<?= base_url('tool') ?>" class="btn btn-secondary">Kembali</a>
	</form>
</div>
