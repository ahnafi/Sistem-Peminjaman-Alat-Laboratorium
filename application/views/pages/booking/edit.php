<div class="container my-5">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card shadow-sm border-0">
				<div class="card-body p-4">
					<h3 class="card-title mb-4 text-primary"><?= $title ?? "Edit Booking" ?></h3>

					<?php if (validation_errors()): ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= validation_errors() ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif; ?>

					<form action="<?= base_url('booking/update/' . $booking->id) ?>" method="post">
						<input type="hidden" name="id" value="<?= $booking->id ?>">

						<div class="mb-3">
							<label for="user_id" class="form-label">Mahasiswa</label>
							<select name="user_id" id="user_id" class="form-select" required>
								<?php foreach ($users as $user): ?>
									<option value="<?= $user['id'] ?>" <?= $user['id'] == $booking->user_id ? 'selected' : '' ?>>
										<?= $user['name'] ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="mb-3">
							<label for="alat_id" class="form-label">Alat</label>
							<select name="alat_id" id="alat_id" class="form-select" required>
								<?php foreach ($alat as $a): ?>
									<option value="<?= $a['id'] ?>" <?= $a['id'] == $booking->alat_id ? 'selected' : '' ?>>
										<?= $a['nama_alat'] ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="mb-3">
							<label for="tanggal" class="form-label">Tanggal</label>
							<input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $booking->tanggal ?>" required>
						</div>

						<div class="mb-3">
							<label for="keterangan" class="form-label">Keterangan</label>
							<textarea name="keterangan" id="keterangan" class="form-control"><?= $booking->keterangan ?></textarea>
						</div>

						<div class="d-flex justify-content-between">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="<?= base_url('booking') ?>" class="btn btn-outline-secondary">Kembali</a>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
