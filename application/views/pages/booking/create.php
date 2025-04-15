<div class="container mt-4">
	<h2><?= $title ?? "Tambah Booking" ?></h2>

	<?php if (validation_errors()): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= validation_errors() ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('success'); ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('error'); ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<form action="<?= base_url('booking/store') ?>" method="post">

		<div class="mb-3">
			<?php if ($user->role == "admin"): ?>
			<label for="user_id" class="form-label">Nama Peminjam</label>
				<select name="user_id" id="user_id" class="form-select" required>
					<option value="">-- Pilih Pengguna --</option>
					<?php foreach ($users as $user): ?>
						<option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
					<?php endforeach; ?>
				</select>
			<?php else: ?>
				<input type="text" name="user_id" id="user_id" class="form-control" value="<?= $user->id ?>" hidden>
			<?php endif; ?>
		</div>

		<div class="mb-3">
			<label for="alat_id" class="form-label">Nama Alat</label>
			<select name="alat_id" id="alat_id" class="form-select" required>
				<option value="">-- Pilih Alat --</option>
				<?php foreach ($alat as $item): ?>
					<option value="<?= $item['id'] ?>"><?= $item['nama_alat'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="mb-3">
			<label for="tanggal" class="form-label">Tanggal Booking</label>
			<input type="date" name="tanggal" id="tanggal" class="form-control" required>
		</div>

		<div class="mb-3">
			<label for="keterangan" class="form-label">Keterangan</label>
			<textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
		</div>

		<!-- status hidden karena default-nya 'pending' -->
		<input type="hidden" name="status" value="pending">

		<button type="submit" class="btn btn-success">Simpan</button>
		<a href="<?= base_url('booking') ?>" class="btn btn-secondary">Kembali</a>
	</form>
</div>
