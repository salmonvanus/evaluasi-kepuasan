<!-- Top Bar Start -->
<div class="topbar">
	<!-- Navbar -->
	<nav class="navbar-custom">

		<!-- LOGO -->
		<div class="topbar-left">
			<a href="<?= base_url(); ?>" class="logo">
				<span>
					<img src="<?= base_url(); ?>assets/images/logo/logo-kejari-web.png" alt="logo-small" class="logo-sm">
				</span>
				<span>
					<img src="<?= base_url(); ?>assets/images/logo/logo-dark.png" alt="logo-large" class="logo-lg">
				</span>
			</a>
		</div>

		<ul class="list-unstyled topbar-nav float-right mb-0">

			<li class="dropdown">
				<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
					<?php 
                		$image = './assets/uploads/images/' . $this->session->userdata('image');
						if(is_file($image)): 
					?>
						<img src="<?= base_url(); ?>assets/uploads/images/<?=$this->session->userdata('image');?>" alt="profile-user" class="rounded-circle" />
					<?php else: ?>
						<img src="<?= base_url(); ?>assets/images/users/user-1.jpg" alt="profile-user" class="rounded-circle" />
					<?php endif; ?>

					<span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="<?= base_url(); ?>admin/profil"><i class="dripicons-user text-muted mr-2"></i> Profil</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?= base_url(); ?>logout"><i class="dripicons-exit text-muted mr-2"></i> Keluar</a>
				</div>
			</li>
		</ul>

		<ul class="list-unstyled topbar-nav mb-0">
			<li>
				<button class="button-menu-mobile nav-link waves-effect waves-light">
					<i class="mdi mdi-menu nav-icon"></i>
				</button>
			</li>
		</ul>

	</nav>
	<!-- end navbar-->
</div>
<!-- Top Bar End -->
