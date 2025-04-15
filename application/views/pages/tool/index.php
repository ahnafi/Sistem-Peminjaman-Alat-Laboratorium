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
			<a href="<?= base_url('tool/add') ?>" class="btn btn-primary"><i class="bi bi-plus-square"></i> Tambah data</a>
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
					<th>Id</th>
					<th>Nama</th>
					<th>stok</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($tools)): ?>
					<?php $no = 1;
					foreach ($tools as $row): ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $row['nama_alat'] ?></td>
							<td><?= $row['deskripsi'] ?></td>
							<td><?= $row['stok'] ?></td>
							<td>
								<a href="<?= base_url('tool/edit/' . $row['id']) ?>"
									class="btn btn-sm btn-warning">Edit</a>
								<a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
									data-bs-target="#confirmDeleteModal"
									onclick="setDeleteUrl('<?= base_url('tool/delete/' . $row['id']) ?>')">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="6" class="text-center">Belum ada data.</td>
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
