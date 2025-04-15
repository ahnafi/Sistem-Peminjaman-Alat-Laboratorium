<div class="container py-4">
	<h2 class="mb-4"><i class="bi bi-person-circle me-2 text-primary"></i>Edit Profil</h2>

	<!-- Notifikasi Error Validasi -->
	<?php if (validation_errors()): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<i class="bi bi-exclamation-circle-fill me-2"></i><?= validation_errors() ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<!-- Notifikasi Flash -->
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<i class="bi bi-check-circle-fill me-2"></i><?= $this->session->flashdata('success'); ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<i class="bi bi-x-circle-fill me-2"></i><?= $this->session->flashdata('error'); ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<!-- FORM UPDATE PROFILE -->
	<div class="card shadow-sm border-0 mb-5">
		<div class="card-body">
			<h5 class="card-title mb-3"><i class="bi bi-pencil-square me-2 text-info"></i>Update Informasi</h5>
			<form action="<?= base_url('profile/update/' . $user->id) ?>" method="post">
				<?php if ($user->role != "admin") : ?>
					<div class="mb-3">
						<label for="nim" class="form-label">NIM</label>
						<input type="text" name="nim" id="nim" class="form-control" maxlength="20" required
							   value="<?= $user->nim ?>" readonly>
					</div>
				<?php endif; ?>

				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input type="email" name="email" id="email" class="form-control" required
						   value="<?= $user->email ?>" readonly>
				</div>

				<div class="mb-3">
					<label for="nama" class="form-label">Nama</label>
					<input type="text" name="name" id="nama" class="form-control" required
						   value="<?= $user->name ?>">
				</div>

				<div class="d-flex justify-content-between">
					<button type="submit" class="btn btn-primary">
						<i class="bi bi-save me-1"></i>Update
					</button>
					<a href="<?= base_url() ?>" class="btn btn-secondary">
						<i class="bi bi-arrow-left me-1"></i>Kembali
					</a>
				</div>
			</form>
		</div>
	</div>

	<!-- FORM UBAH PASSWORD -->
	<div class="card shadow-sm border-0">
		<div class="card-body">
			<h5 class="card-title mb-3"><i class="bi bi-shield-lock-fill me-2 text-warning"></i>Ubah Password</h5>
			<form action="<?= base_url('profile/update_password/' . $user->id) ?>" method="post">
				<div class="mb-3">
					<label for="password" class="form-label">Password Baru</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div>

				<div class="mb-3">
					<label for="password_confirm" class="form-label">Konfirmasi Password</label>
					<input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
				</div>

				<button type="submit" class="btn btn-warning">
					<i class="bi bi-key-fill me-1"></i> Ubah Password
				</button>
			</form>
		</div>
	</div>
</div>
