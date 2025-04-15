<div class="container py-4">
	<!-- Judul Halaman -->
	<div class="row mb-4">
		<div class="col">
			<h1 class="display-5 fw-bold">
				<i class="bi bi-person-circle me-2"></i>
				Welcome, <?= $user->name?? "guest" ?>!
			</h1>
			<p class="text-muted">Selamat datang di halaman utama, <?= $user->name ?>. Berikut adalah beberapa informasi terkait akun Anda.</p>
		</div>
	</div>

	<!-- Flash Message -->
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<i class="bi bi-check-circle-fill me-2"></i><strong>Success!</strong> <?= $this->session->flashdata('success') ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<!-- Menu Cards -->
	<div class="row g-4">
		<?php if ($user->role == "admin"): ?>
			<div class="col-md-4">
				<div class="card shadow-sm border-0 h-100">
					<div class="card-body">
						<h5 class="card-title"><i class="bi bi-people-fill me-2 text-primary"></i>Mahasiswa</h5>
						<p class="card-text">Lihat dan perbarui informasi mahasiswa</p>
						<a href="<?= base_url('mahasiswa') ?>" class="btn btn-outline-primary w-100">Lihat Mahasiswa</a>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="col-md-4">
			<div class="card shadow-sm border-0 h-100">
				<div class="card-body">
					<h5 class="card-title"><i class="bi bi-tools me-2 text-success"></i>Peralatan Lab</h5>
					<p class="card-text">Lihat <?= $user->role == "admin" ? "dan perbarui" : "" ?> informasi Peralatan</p>
					<a href="<?= base_url('tool') ?>" class="btn btn-outline-success w-100">Lihat Peralatan</a>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card shadow-sm border-0 h-100">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<h5 class="card-title mb-0">
							<i class="bi bi-journal-text me-2 text-warning"></i>
							<?= $user->role == "admin" ? "Booking" : "Booking Peralatan Lab" ?>
						</h5>
						<?php if ($user->role == "admin"): ?>
							<span class="badge bg-warning text-dark"><?= $pending_count ?? "0" ?></span>
						<?php endif; ?>
					</div>
					<p class="card-text mt-2">
						<?= $user->role == "admin" ? "Lihat dan perbarui informasi Peminjam" : "Pinjam alat laboratorium" ?>
					</p>
					<a href="<?= base_url('booking') ?>" class="btn btn-outline-warning w-100">
						<?= $user->role == "admin" ? "Lihat Peminjam" : "Lihat Data Peminjam" ?>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Riwayat Pinjam -->
	<?php if ($user->role != "admin"): ?>
		<div class="row py-5">
			<div class="col">
				<h2 class="mb-3"><i class="bi bi-clock-history me-2"></i>Riwayat Pinjam</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-striped align-middle">
						<thead class="table-dark">
						<tr>
							<th>No</th>
							<th>Nama Alat</th>
							<th>Tanggal</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
						<?php if (!empty($booking)): ?>
							<?php $no = 1; foreach ($booking as $row): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $row['nama_alat'] ?></td>
									<td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
									<td>
											<span class="badge bg-<?= $row['status'] == 'disetujui' ? 'success' : ($row['status'] == 'ditolak' ? 'danger' : 'warning') ?>">
												<i class="bi <?= $row['status'] == 'disetujui' ? 'bi-check-circle-fill' : ($row['status'] == 'ditolak' ? 'bi-x-circle-fill' : 'bi-hourglass-split') ?>"></i>
												<?= ucfirst($row['status']) ?>
											</span>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="4" class="text-center">Belum ada data.</td>
							</tr>
						<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
