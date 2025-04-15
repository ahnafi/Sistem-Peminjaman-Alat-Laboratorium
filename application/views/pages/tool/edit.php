<div class="container mt-4">
	<h2><?= $title ?? "" ?></h2>

	<?php if (validation_errors()): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?= validation_errors() ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<form action="<?= base_url('controller/update/' . $data->id) ?>" method="post">
		<div class="mb-3">
			<label for="nim" class="form-label">Id</label>
			<input type="text" name="id" id="nim" class="form-control" required
				   value="<?= $data->id_matakuliah ?>" readonly>
		</div>

		<div class="mb-3">
			<label for="nama" class="form-label">Nama</label>
			<input type="text" name="nama" id="nama" class="form-control" required
				   value="<?= $data->nama_matakuliah ?>">
		</div>

		<button type="submit" class="btn btn-primary">Update</button>
		<a href="<?= base_url('controller') ?>" class="btn btn-secondary">Kembali</a>
	</form>
</div>
