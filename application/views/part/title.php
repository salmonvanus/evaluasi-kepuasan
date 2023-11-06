<div class="page-wrapper-img">
	<div class="page-wrapper-img-inner">
		<div class="sidebar-user media">
				<!-- <img src="<?= base_url(); ?>assets/images/logo/logo-kejari-background.jpg" alt="profile-user"   /> -->
		</div>
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<h4 class="page-title mb-2"><?= isset($display) ? $display : ""; ?></h4>
					<div class="">
						<ol class="breadcrumb">
							<?php $no = 0;
							foreach ($level as $t) : ?>
								<li class="breadcrumb-item">
									<a href="<?= (isset($href[$no]) && $href[$no] != "") ? base_url() . $href[$no] : "#"; ?>"><?= $t; ?></a>
								</li>
							<?php $no++;
							endforeach; ?>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!-- end page title end breadcrumb -->
	</div>
</div>
