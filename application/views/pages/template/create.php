<div class="container mt-4">
	<h2><?= $title ?? "" ?></h2>
	<?php if (validation_errors()): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= validation_errors() ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>
	<form action="<?= base_url('controller/store') ?>" method="post">
		<div class="mb-3">
			<label for="nama" class="form-label">Nama</label>
			<input type="text" name="nama" id="nama" class="form-control" required>
		</div>
		<button type="submit" class="btn btn-success">Simpan</button>
		<a href="<?= base_url('controller') ?>" class="btn btn-secondary">Kembali</a>
	</form>
</div>
