<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Halaman Tidak Ditemukan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A premium admin dashboard template by mannatthemes" name="description" />
	<meta content="Mannatthemes" name="author" />

	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/logo_prov.png">

	<!-- DataTables -->
	<link href="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<!-- Responsive datatable examples -->
	<link href="<?= base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<link href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/plugins/custombox/custombox.min.css" rel="stylesheet" type="text/css">

	<!-- Clock css -->
	<link href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

	<!-- Sweet Alert -->
	<link href="<?= base_url(); ?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

	<!-- Plugins css -->
	<link href="<?= base_url(); ?>assets/plugins/timepicker/tempusdominus-bootstrap-4.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/plugins/colorpicker/asColorPicker.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url(); ?>assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

	<link href="<?= base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

	<link href="<?= base_url(); ?>assets/plugins/ticker/jquery.jConveyorTicker.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url(); ?>assets/plugins/dropify/css/dropify.min.css" rel="stylesheet">

	<!-- App css -->
	<link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url(); ?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
	<style id="clock-animations"></style>

</head>

<body>
	<!-- Top Bar Start -->
	<div class="topbar">
		<!-- Navbar -->
		<nav class="navbar-custom">

			<!-- LOGO -->
			<div class="topbar-left">
				<a href="Login" class="logo">
					<span>
						<img src="<?= base_url(); ?>assets/images/logo/logo-kejari-web.png" alt="logo-small" class="logo-sm">
						<img src="<?= base_url(); ?>assets/images/logo/logo-dark.png" alt="logo-large" class="logo-lg">
					</span>
					<span>
					</span>
				</a>
			</div>

			<ul class="list-unstyled topbar-nav float-right mb-0">
				<li class="dropdown">
					<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
					</a>
				</li>
			</ul>

		</nav>
		<!-- end navbar-->
	</div>
	<!-- Top Bar End -->

	<div class="page-wrapper-img" style="box-shadow: inset 0 0 0 2000px rgba(green, 46, 15, 0.8);">
		<div class="page-wrapper-img-inner">
			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<div class="page-title-box">
						<div class="float-right align-item-center mt-2">
						</div>
					</div>
					<!--end page title box-->
				</div>
				<!--end col-->
			</div>
			<!--end row-->
			<!-- end page title end breadcrumb -->
		</div>
		<!--end page-wrapper-img-inner-->
	</div>

	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 mx-auto">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-5 p-0 align-self-center">
									<img src="<?= base_url(); ?>assets/images/error.svg" alt="" class="img-fluid">
								</div>
								<div class="col-md-7">
									<div class="error-content text-center">
										<h2 class="text-primary mb-0">Oppsss</h2>
										<h1 class="mt-0">404!</h1>
										<h4 class="text-primary">Maaf data tidak tersedia.</h4><br>
										<a class="btn btn-primary mb-5 waves-effect waves-light" href="<?= base_url('admin/responden'); ?>">Kembali Ke Halaman Awal</a>
									</div>
								</div>
								<!--end col-->
							</div>
							<!--end row-->
						</div>
						<!--end card-body-->
					</div>
					<!--end card-->
				</div>
				<!--end col-->
			</div> <!-- end row -->
		</div><!-- container -->

		<footer class="footer text-center text-sm-left">
			Evaluasi Kepuasan | Kejaksaan Negeri Tomohon <span class="text-muted d-none d-sm-inline-block float-right"></span>
		</footer>
	</div>
	<!-- end page content -->
	</div>
	<!--end page-wrapper-inner -->
	</div>
	<!-- end page-wrapper -->

	<!-- jQuery  -->
	<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/metisMenu.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/waves.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>

	<!-- Sweet-Alert  -->
	<script src="<?= base_url(); ?>assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
	<script src="<?= base_url(); ?>assets/pages/jquery.sweet-alert.init.js"></script>

	<!-- Required datatable js -->
	<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Buttons examples -->
	<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>

	<!-- Responsive examples -->
	<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>assets/pages/jquery.datatable.init.js"></script>

	<!--Wysiwig js-->
	<script src="<?= base_url(); ?>assets/plugins/tinymce/tinymce.min.js"></script>
	<script src="<?= base_url(); ?>assets/pages/jquery.form-editor.init.js"></script>

	<!--form validation init-->
	<script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>

	<!-- Modal-Effect -->
	<script src="<?= base_url(); ?>assets/plugins/custombox/custombox.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/custombox/custombox.legacy.min.js"></script>

	<script src="<?= base_url(); ?>assets/plugins/parsleyjs/parsley.min.js"></script>
	<script src="<?= base_url(); ?>assets/pages/jquery.validation.init.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.core.js"></script>

	<!-- Plugins js -->
	<script src="<?= base_url(); ?>assets/plugins/moment/moment.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/dropify/js/dropify.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/ticker/jquery.jConveyorTicker.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/peity-chart/jquery.peity.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/chartjs/chart.min.js"></script>
	<script src="<?= base_url(); ?>assets/pages/jquery.profile.init.js"></script>
	<script src="<?= base_url(); ?>assets/pages/jquery.form-upload.init.js"></script>

	<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/colorpicker/jquery-asColor.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/colorpicker/jquery-asGradient.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/colorpicker/jquery-asColorPicker.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/select2/select2.min.js"></script>

	<script src="<?= base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

	<script src="<?= base_url(); ?>assets/pages/jquery.clock-img.init.js"></script>
	<script src="<?= base_url(); ?>assets/pages/jquery.forms-advanced.js"></script>

	<!--Wysiwig js-->
	<script src="<?= base_url(); ?>assets/plugins/tinymce/tinymce.min.js"></script>
	<script src="<?= base_url(); ?>assets/pages/jquery.form-editor.init.js"></script>

	<!--Button tooltip-->
	<script src="<?= base_url(); ?>assets/plugins/tippy/tippy.all.min.js"></script>
	<script src="<?= base_url(); ?>assets/pages/jquery.tooltipster.js"></script>

	<!-- App js -->
	<script src="<?= base_url(); ?>assets/js/app.js"></script>

	<script>
		var resizefunc = [];
	</script>

</body>

</html>