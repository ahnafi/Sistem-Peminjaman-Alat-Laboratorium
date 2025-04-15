<div class="d-flex justify-content-center align-items-center" style="height: 100vh">
	<div class="row w-100 justify-content-center">
		<div class="col-md-6 col-lg-4">
			<div class="card shadow-lg border-0">
				<div class="card-body p-4">
					<h3 class="text-center mb-4">Login Labophase</h3>

					<?php if (isset($error)): ?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Error:</strong> <?= $error ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif; ?>

					<?php if ($this->session->flashdata('success')): ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('success'); ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif; ?>

					<form action="" method="post">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Email</label>
							<div class="input-group">
								<span class="input-group-text"><i class="bi bi-person"></i></span>
								<input type="text" name="email" class="form-control" id="exampleInputEmail1"
									required>
							</div>
						</div>

						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Password</label>
							<div class="input-group">
								<span class="input-group-text"><i class="bi bi-lock"></i></span>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1"
									required>
							</div>
						</div>

						<div class="d-grid">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</form>

<!--					<div class="text-center mt-3">-->
<!--						Belum punya akun? <a href="--><?php //= base_url("auth/register") ?><!--">Register</a>-->
<!--					</div>-->
				</div>
			</div>
		</div>
	</div>
</div>
