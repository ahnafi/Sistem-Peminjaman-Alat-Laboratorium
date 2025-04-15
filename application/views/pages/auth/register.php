<div class="d-flex justify-content-center align-items-center" style="height: 100vh">
	<div class="row w-100 justify-content-center">
		<div class="col-md-6 col-lg-4">
			<div class="card shadow-lg border-0">
				<div class="card-body p-4">
					<h3 class="text-center mb-4">Register</h3>

					<?php if (isset($error)) : ?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Error:</strong> <?= $error ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif; ?>

					<form action="" method="post" onsubmit="return validatePassword()">
						<div class="mb-3">
							<label for="username" class="form-label">Username</label>
							<div class="input-group">
								<span class="input-group-text"><i class="bi bi-person"></i></span>
								<input type="text" name="email" class="form-control" id="username" required>
							</div>
						</div>

						<div class="mb-3">
							<label for="password" class="form-label">Password</label>
							<div class="input-group">
								<span class="input-group-text"><i class="bi bi-lock"></i></span>
								<input type="password" name="password" class="form-control" id="password" required>
							</div>
						</div>

						<div class="mb-3">
							<label for="confirm_password" class="form-label">Verifikasi Password</label>
							<div class="input-group">
								<span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
								<input type="password" class="form-control" id="confirm_password" required>
							</div>
							<div id="passwordHelp" class="form-text text-danger mt-1" style="display: none;">Password tidak sama!</div>
						</div>

						<div class="d-grid">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</form>

					<div class="text-center mt-3">
						Sudah punya akun? <a href="<?= base_url('auth/login') ?>">Login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function validatePassword() {
		const password = document.getElementById('password').value;
		const confirm = document.getElementById('confirm_password').value;
		const help = document.getElementById('passwordHelp');

		if (password !== confirm) {
			help.style.display = 'block';
			return false;
		}

		help.style.display = 'none';
		return true;
	}
</script>
