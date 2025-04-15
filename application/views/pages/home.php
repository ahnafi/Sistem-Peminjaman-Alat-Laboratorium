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
		<?php endif; ?>
		<div class="col-md-4 mb-2">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Peralatan lab</h5>
					<p class="card-text">Lihat <?= $user->role == "admin" ? "dan perbarui" : "" ?> informasi
						Peralatan</p>
					<a href="<?= base_url('tool') ?>" class="btn btn-primary">Lihat Peralatan</a>
				</div>
			</div>
		</div>

		<div class="col-md-4 mb-2">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<h5 class="card-title mb-0"><?= $user->role == "admin" ? "Booking" : "Booking Peralatan Lab" ?></h5>
						<?php if ($user->role == "admin"): ?>
							<span class="badge bg-warning text-dark"><?= $pending_count ?></span>
						<?php endif; ?>
					</div>

					<?php if ($user->role == "admin"): ?>
						<p class="card-text mt-2">Lihat dan perbarui informasi Peminjam</p>
						<a href="<?= base_url('booking') ?>" class="btn btn-primary">Lihat Peminjam</a>
					<?php else: ?>
						<p class="card-text mt-2">Pinjam alat laboratorium</p>
						<a href="<?= base_url('booking') ?>" class="btn btn-success">Lihat data peminjam</a>
					<?php endif; ?>
				</div>
			</div>
		</div>

	</div>
	<?php if ($user->role != "admin"): ?>
		<div class="row py-5">
			<div class="row">
				<div class="col">
					<h2>Riwayat pinjam</h2>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
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
						<?php $no = 1;
						foreach ($booking as $row): ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $row['nama_alat'] ?></td>
								<td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
								<td>
									<span
										class="badge bg-<?= $row['status'] == 'disetujui' ? 'success' : ($row['status'] == 'ditolak' ? 'danger' : 'warning') ?>">
                          				  <?= ucfirst($row['status']) ?>
                      				  </span>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="7" class="text-center">Belum ada data.</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	<?php endif; ?>
</div>
