<div class="container">
	<!-- Judul Halaman -->
	<div class="row">
		<div class="col">
			<h1>Welcome, <?= $user->name ?>!</h1>
			<p>Selamat datang di halaman utama, <?= $user->name ?>. Berikut adalah beberapa informasi terkait akun
				Anda.</p>
		</div>
	</div>

	<!-- Menampilkan Pesan Flash Data -->
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> <?= $this->session->flashdata('success') ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<!-- Menu Utama -->
	<div class="row">
		<?php if ($user->role == "admin"): ?>
			<div class="col-md-4 mb-2">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Mahasiswa</h5>
						<p class="card-text">Lihat dan perbarui informasi mahasiswa</p>
						<a href="<?= base_url('mahasiswa') ?>" class="btn btn-primary">Lihat Mahasiswa</a>
					</div>
				</div>
			</div>

			<div class="col-md-4 mb-2">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Peralatan lab</h5>
						<p class="card-text">Lihat dan perbarui informasi Peralatan</p>
						<a href="<?= base_url('tool') ?>" class="btn btn-primary">Lihat Peralatan</a>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
