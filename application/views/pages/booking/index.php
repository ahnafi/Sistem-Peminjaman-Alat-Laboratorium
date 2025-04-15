<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content shadow">
			<div class="modal-header bg-danger text-white">
				<h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Apakah Anda yakin ingin menghapus data ini?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
				<a id="confirmDeleteBtn" class="btn btn-danger" href="#"><i class="bi bi-trash"></i> Hapus</a>
			</div>
		</div>
	</div>
</div>

<!-- Kontainer Tabel Booking -->
<div class="container py-4">
	<div class="d-flex justify-content-between align-items-center mb-4">
		<h2 class="fw-bold"><?= $title ?? "Daftar Booking" ?></h2>
		<a href="<?= base_url('booking/add') ?>" class="btn btn-primary">
			<i class="bi bi-plus-square me-1"></i> Ajukan Peminjaman
		</a>
	</div>

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<i class="bi bi-check-circle me-2"></i><?= $this->session->flashdata('success'); ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<i class="bi bi-exclamation-triangle me-2"></i><?= $this->session->flashdata('error'); ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<div class="table-responsive shadow-sm rounded">
		<table class="table table-hover align-middle">
			<thead class="table-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nama Peminjam</th>
				<th scope="col">Nama Alat</th>
				<th scope="col">Tanggal</th>
				<th scope="col">Status</th>
				<th scope="col">Keterangan</th>
				<th scope="col">Aksi</th>
			</tr>
			</thead>
			<tbody>
			<?php if (!empty($booking)): ?>
				<?php $no = 1; foreach ($booking as $row): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><strong><?= $row['nama_user'] ?></strong></td>
						<td><?= $row['nama_alat'] ?></td>
						<td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
						<td>
							<span class="badge bg-<?= $row['status'] == 'disetujui' ? 'success' : ($row['status'] == 'ditolak' ? 'danger' : 'warning') ?>">
								<?= ucfirst($row['status']) ?>
							</span>
						</td>
						<td><?= $row['keterangan'] ?? '-' ?></td>
						<td>
							<?php if ($user->role == "admin"): ?>
								<a href="<?= base_url('booking/edit/' . $row['id']) ?>" class="btn btn-sm btn-outline-warning me-1">
									<i class="bi bi-pencil-square"></i> Edit
								</a>
								<a href="<?= base_url('booking/accept/' . $row['id']) ?>" class="btn btn-sm btn-outline-success me-1">
									<i class="bi bi-check2-circle"></i> Terima
								</a>
								<a href="<?= base_url('booking/reject/' . $row['id']) ?>" class="btn btn-sm btn-outline-danger me-1">
									<i class="bi bi-x-circle"></i> Tolak
								</a>
								<a href="#" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
								   onclick="setDeleteUrl('<?= base_url('booking/delete/' . $row['id']) ?>')">
									<i class="bi bi-trash"></i> Hapus
								</a>
							<?php elseif($user->id == $row["user_id"] && $row["status"] == "pending"): ?>
								<a href="#" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
								   onclick="setDeleteUrl('<?= base_url('booking/delete/' . $row['id']) ?>')">
									<i class="bi bi-trash"></i> Hapus
								</a>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="7" class="text-center text-muted">Belum ada data.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<script>
	function setDeleteUrl(url) {
		document.getElementById('confirmDeleteBtn').setAttribute('href', url);
	}
</script>
