<!-- Modal Confirm Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Apakah Anda yakin ingin menghapus data ini?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				<a id="confirmDeleteBtn" class="btn btn-danger" href="#">Hapus</a>
			</div>
		</div>
	</div>
</div>
<!-- modal end -->

<div class="container mt-4">
	<div class="row mb-3">
		<div class="col">
			<h1><?= $title ?? "" ?></h1>
		</div>
		<div class="col text-end">
			<a href="<?= base_url('booking/add') ?>" class="btn btn-primary"><i class="bi bi-plus-square"></i> Ajukan
				Peminjaman </a>
		</div>
	</div>

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

	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead class="table-dark">
			<tr>
				<th>No</th>
				<th>Nama Peminjam</th>
				<th>Nama Alat</th>
				<th>Tanggal</th>
				<th>Status</th>
				<th>Keterangan</th>
				<th>Aksi</th>
			</tr>
			</thead>
			<tbody>
			<?php if (!empty($booking)): ?>
				<?php $no = 1;
				foreach ($booking as $row): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $row['nama_user'] ?></td>
						<td><?= $row['nama_alat'] ?></td>
						<td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
						<td><span
								class="badge bg-<?= $row['status'] == 'disetujui' ? 'success' : ($row['status'] == 'ditolak' ? 'danger' : 'warning') ?>">
                            <?= ucfirst($row['status']) ?>
                        </span></td>
						<td><?= $row['keterangan'] ?? '-' ?></td>
						<td>
							<?php if ($user->role == "admin"): ?>
								<a href="<?= base_url('booking/edit/' . $row['id']) ?>"
								   class="btn btn-sm btn-warning">Edit</a>

								<a href="<?= base_url('booking/accept/' . $row['id']) ?>"
								   class="btn btn-success btn-sm">Terima</a>
								<a href="<?= base_url('booking/reject/' . $row['id']) ?>" class="btn btn-danger btn-sm">Tolak</a>
							<?php elseif($user->id == $row["user_id"] && $row["status"] == "pending" ): ?>

								<a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
								   data-bs-target="#confirmDeleteModal"
								   onclick="setDeleteUrl('<?= base_url('booking/delete/' . $row['id']) ?>')">Hapus</a>

							<?php endif; ?>
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

<script>
	function setDeleteUrl(url) {
		document.getElementById('confirmDeleteBtn').setAttribute('href', url);
	}
</script>
