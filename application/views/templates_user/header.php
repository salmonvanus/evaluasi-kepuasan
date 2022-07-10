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

    <!-- Sweet Alert -->
    <link href="<?= base_url(); ?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">


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
                <a href="<?= base_url('Landing'); ?>" class="logo">
                    <span>
                        <img src="<?= base_url(); ?>/assets/images/logo-dark.png" alt="logo-small" class="logo-sm">
                    </span>
                </a>
            </div>
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->

    <div class="page-wrapper-img" style="box-shadow: inset 0 0 0 2000px rgba(218, 46, 15, 0.8);">
    </div>
    <!--end page-wrapper-img-->

    <script>
        $(document).ready(function() {
            $("#myBtn").click(function() {
                $("#myModal").modal();
            });
        });
    </script>