<div class="container my-5">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card shadow-sm border-0 mb-4">
				<div class="card-body p-4">
					<h3 class="card-title mb-4 text-primary">Edit Data Mahasiswa</h3>

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

					<form action="<?= base_url('mahasiswa/update/' . $mahasiswa->id) ?>" method="post">
						<div class="mb-3">
							<label for="nim" class="form-label">NIM</label>
							<input type="text" name="nim" id="nim" class="form-control" maxlength="20" required value="<?= $mahasiswa->nim ?>" readonly>
						</div>

						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" name="email" id="email" class="form-control" required value="<?= $mahasiswa->email ?>" readonly>
						</div>

						<div class="mb-3">
							<label for="nama" class="form-label">Nama</label>
							<input type="text" name="name" id="nama" class="form-control" required value="<?= $mahasiswa->name ?>">
						</div>

						<div class="d-flex justify-content-between">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="<?= base_url('mahasiswa') ?>" class="btn btn-outline-secondary">Kembali</a>
						</div>
					</form>
				</div>
			</div>

			<div class="card shadow-sm border-0">
				<div class="card-body p-4">
					<h4 class="card-title text-warning mb-4">Ubah Password</h4>

					<form action="<?= base_url('mahasiswa/update_password/' . $mahasiswa->id) ?>" method="post">
						<div class="mb-3">
							<label for="password" class="form-label">Password Baru</label>
							<input type="password" name="password" id="password" class="form-control" required>
						</div>

						<div class="mb-3">
							<label for="password_confirm" class="form-label">Konfirmasi Password</label>
							<input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
						</div>

						<button type="submit" class="btn btn-warning">Ubah Password</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
