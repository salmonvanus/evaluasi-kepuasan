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
			<a href="<?= base_url(); ?>beranda"><i class="mdi mdi-monitor"></i><span>Beranda</span></a>
		</li>
		<li class="<?= ($parent == "Kuesioner") ? "active" : ""; ?>">
			<a href="<?= base_url(); ?>kuesioner"><i class="mdi mdi-library"></i><span>Kuesioner</span></a>
		</li>
	</ul>
</div>
<!-- end left-sidenav-->