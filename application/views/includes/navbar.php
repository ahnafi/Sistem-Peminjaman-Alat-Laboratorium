<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
	<div class="container">
		<a class="navbar-brand fw-bold text-primary" href="<?= base_url() ?>">
			<i class="bi bi-cpu me-1"></i> Labophase
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
				<li class="nav-item mx-1">
					<a class="nav-link" href="<?= base_url() ?>">
						<i class="bi bi-house-door-fill me-1"></i> Home
					</a>
				</li>
				<li class="nav-item mx-1">
					<a class="nav-link" href="<?= base_url("profile") ?>">
						<i class="bi bi-person-circle me-1"></i> Profile
					</a>
				</li>

				<?php if (($user = $this->session->userdata("user")) && isset($user->name)): ?>
					<li class="nav-item mx-1">
						<a class="btn btn-outline-danger btn-sm" href="<?= base_url("auth/logout") ?>">
							<i class="bi bi-box-arrow-right me-1"></i> Logout (<?= $user->name ?>)
						</a>
					</li>
				<?php else: ?>
					<li class="nav-item mx-1">
						<a class="btn btn-outline-primary btn-sm" href="<?= base_url("auth/login") ?>">
							<i class="bi bi-box-arrow-in-right me-1"></i> Login
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
<!-- Navbar End -->
