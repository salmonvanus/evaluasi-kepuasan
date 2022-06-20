<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A premium admin dashboard template by mannatthemes" name="description" />
    <meta content="Mannatthemes" name="author" />

    <!-- DataTables -->
    <link href="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/plugins/custombox/custombox.min.css" rel="stylesheet" type="text/css">

    <!-- Clock css -->
    <link href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

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

    <script src="https://kit.fontawesome.com/7c67b5b4a7.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom">
            <!-- LOGO -->
            <div class="topbar-left">
                <a href="<?= base_url('admin/Beranda'); ?>" class="logo">
                    <span>
                        <img src="<?= base_url(); ?>/assets/images/logo-dark.png" alt="logo-small" class="logo-sm">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topbar-nav float-right mb-0">
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?php echo base_url('assets/'); ?>images/users/<?= $profile['image']; ?>" class="rounded-circle" />
                        <span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?= base_url('admin/Profile'); ?>"><i class="dripicons-user text-muted mr-2"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('Login/logout'); ?>"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
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

    <div class="page-wrapper-img" style="box-shadow: inset 0 0 0 2000px rgba(218, 46, 15, 0.8);">
        <div class="page-wrapper-img-inner">
            <div class="sidebar-user media">
                <img src="<?= base_url('assets/'); ?>images/users/<?= $profile['image']; ?>" class="rounded-circle mb-1">
                <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
                <div class="media-body">
                    <h5 class="text-light"><?= $profile['username']; ?></h5>
                    <ul class="list-unstyled list-inline mb-0 mt-2">
                        <li class="list-inline-item">
                            <a href="<?= base_url('Admin/Profile'); ?>" class=""><i class="mdi mdi-account text-light"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class=""><i class="mdi mdi-settings text-light"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="<?= base_url('Login/logout'); ?>" class=""><i class="mdi mdi-power text-light"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title"><i class="mdi mdi-google-pages mr-2"></i><?= $title; ?></h4>
                        <div class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);"><?php $segment_1 = $this->uri->segment(1);
                                                                                            echo ucwords($string = str_replace('_', ' ', $segment_1)); ?></a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0);"><?php echo $title_name; ?></a></li>
                            </ol>
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
    <!--end page-wrapper-img-->

    <script>
        $(document).ready(function() {
            $("#myBtn").click(function() {
                $("#myModal").modal();
            });
        });
    </script>