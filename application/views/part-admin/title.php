<div class="page-wrapper-img">
	<div class="page-wrapper-img-inner">
		<div class="sidebar-user media">
			<?php 
				$image = './assets/uploads/images/' . $this->session->userdata('image');
				if(is_file($image)): 
			?>
				<img src="<?= base_url(); ?>assets/uploads/images/<?=$this->session->userdata('image');?>" alt="profile-user" class="rounded-circle img-thumbnail mb-1"  />
			<?php else: ?>
				<img src="<?= base_url(); ?>assets/images/users/user-1.jpg" alt="profile-user" class="rounded-circle img-thumbnail mb-1" />
			<?php endif; ?>

			<span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
			<div class="media-body">
				<h5 class="text-light"><?= $this->session->userdata('name'); ?></h5>
				<ul class="list-unstyled list-inline mb-0 mt-2">
					<li class="list-inline-item">
						<a href="<?= base_url(); ?>logout" class=""><i class="mdi mdi-power text-danger"></i></a>
					</li>
				</ul>
			</div>
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
