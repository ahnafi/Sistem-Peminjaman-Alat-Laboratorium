<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content shadow">
			<div class="modal-header bg-danger text-white">
				<h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Apakah Anda yakin ingin menghapus data mahasiswa ini?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
				<a id="confirmDeleteBtn" class="btn btn-danger" href="#"><i class="bi bi-trash"></i> Hapus</a>
			</div>
		</div>
	</div>
</div>

<!-- Kontainer Tabel Mahasiswa -->
<div class="container py-4">
	<div class="d-flex justify-content-between align-items-center mb-4">
		<h2 class="fw-bold"><?= $title ?? "Data Mahasiswa" ?></h2>
		<a href="<?= base_url('mahasiswa/add') ?>" class="btn btn-primary">
			<i class="bi bi-plus-circle me-1"></i> Tambah Mahasiswa
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
				<th scope="col">No</th>
				<th scope="col">NIM</th>
				<th scope="col">Email</th>
				<th scope="col">Nama</th>
				<th scope="col">Aksi</th>
			</tr>
			</thead>
			<tbody>
			<?php if (!empty($mahasiswa)) : ?>
				<?php $no = 1; foreach ($mahasiswa as $mhs) : ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><strong><?= $mhs['nim'] ?></strong></td>
						<td><?= $mhs['email'] ?></td>
						<td><?= $mhs['name'] ?></td>
						<td>
							<a href="<?= base_url('mahasiswa/edit/' . $mhs['id']) ?>" class="btn btn-sm btn-outline-warning me-1">
								<i class="bi bi-pencil-square"></i> Edit
							</a>
							<a href="#" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
							   data-bs-target="#confirmDeleteModal"
							   onclick="setDeleteUrl('<?= base_url('mahasiswa/delete/' . $mhs['id']) ?>')">
								<i class="bi bi-trash"></i> Hapus
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td colspan="5" class="text-center text-muted">Belum ada data mahasiswa.</td>
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
