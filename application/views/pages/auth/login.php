<!-- Wrapper dengan background lembut -->
<div class="bg-light d-flex justify-content-center align-items-center" style="min-height: 100vh;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-4">
				<div class="card shadow-lg border-0 rounded-4">
					<div class="card-body p-4">
						<h3 class="text-center mb-4">
							<i class="bi bi-door-open-fill me-2 text-primary"></i>Login Labophase
						</h3>

						<!-- Notifikasi Error -->
						<?php if (isset($error)): ?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
								<i class="bi bi-exclamation-triangle-fill me-2"></i><strong>Error:</strong> <?= $error ?>
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

						<form action="" method="post">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Email</label>
								<div class="input-group">
									<span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
									<input type="text" name="email" class="form-control" id="exampleInputEmail1" required>
								</div>
							</div>

							<div class="mb-3">
								<label for="exampleInputPassword1" class="form-label">Password</label>
								<div class="input-group">
									<span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
									<input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
								</div>
							</div>

							<div class="d-grid">
								<button type="submit" class="btn btn-primary">
									<i class="bi bi-box-arrow-in-right me-1"></i> Login
								</button>
							</div>
						</form>

						<!-- Optional: Register Link -->
						<!-- <div class="text-center mt-3 text-muted">
							Belum punya akun? <a href="<?= base_url("auth/register") ?>">Daftar di sini</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
