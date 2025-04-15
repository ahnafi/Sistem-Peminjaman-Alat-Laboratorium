<div class="container mt-4">
	<h2><?= $title ?? "Edit Alat" ?></h2>

	<?php if (validation_errors()): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= validation_errors() ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<form action="<?= base_url('tool/update/' . $alat->id) ?>" method="post">
		<div class="mb-3">
			<label for="id" class="form-label">ID Alat</label>
			<input type="text" id="id" class="form-control" value="<?= $alat->id ?>" readonly>
		</div>

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

		<button type="submit" class="btn btn-primary">Update</button>
		<a href="<?= base_url('tool') ?>" class="btn btn-secondary">Kembali</a>
	</form>
</div>
