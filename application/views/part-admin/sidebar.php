<!-- Left Sidenav -->
<div class="left-sidenav">
	<ul class="metismenu left-sidenav-menu" id="side-nav">

		<!-- 
		################################################
		MAIN
		################################################ 
		-->

		<li class="menu-title">Menu</li>
		<li>
			<a href="<?= base_url(); ?>admin/beranda"><i class="mdi mdi-monitor"></i><span>Beranda</span></a>
		</li>
		<li>
			<a href="javascript: void(0);"><i class="mdi mdi-file-document-box-multiple-outline"></i><span>Kelola Kuesioner</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
			<ul class="nav-second-level" aria-expanded="false">
				<li class="<?= ($parent == "Daftar Pertanyaan") ? "active" : ""; ?>">
					<a href="<?= base_url(); ?>admin/pertanyaan"><span>Daftar Pertanyaan</span></a>
				</li>
				<li class="<?= ($parent == "Responden") ? "active" : ""; ?>">
					<a href="<?= base_url(); ?>admin/responden"><span>Responden</span></a>
				</li>
			</ul>
		</li>
		
		<li class="<?= ($parent == "Analisis") ? "active" : ""; ?>">
			<a href="<?= base_url(); ?>admin/analisis"><i class="mdi mdi-file-chart"></i><span>Analisis</span></a>
		</li>
	</ul>
</div>
<!-- end left-sidenav-->