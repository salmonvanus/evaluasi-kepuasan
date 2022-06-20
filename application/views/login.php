<?php
$this->load->view('link.php');
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<script>
    window.history.forward();

    function noBack() {
        window.history.forward();
    }
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" href="<?php echo base_url('assets_login/images/logo-minsel.png'); ?>"> -->
    <title>Si Sinus | <?php $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets_login/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets_login/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets_login/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets_login/css/iofrm-theme12.css">
</head>

<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="<?php echo base_url('login/'); ?>">
                            </a>
                        </div>
                        <h3>SI SINUS (Sistem Informasi Penyakit Sinusitis).</h3>
                        <p>Silahkan masukkan nama akun dan kata sandi untuk masuk ke aplikasi.</p>
                        <div class="page-links">
                            <!-- <a href="<?php echo base_url('login'); ?>" class="active">Masuk</a> -->
                            <!-- <a href="<?php echo base_url('register'); ?>">Daftar</a> -->
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <form method="post" action="<?= base_url('Login'); ?>">
                            <input class="form-control" type="text" name="username" autocomplete="off" placeholder="Nama akun">
                            <input class="form-control" type="password" name="password" autocomplete="off" placeholder="Kata sandi">
                            <div class="form-button">
                                <button id="submit" type="submit" name="login" class="ibtn">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url() ?>assets_login/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets_login/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets_login/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets_login/js/main.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

    <!-- page js -->
    <script src="<?php echo base_url(); ?>assets/pages/jquery.form-pickers.init.js"></script>

    <!-- Modal-Effect -->
    <script src="<?php echo base_url(); ?>assets/plugins/custombox/js/custombox.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/custombox/js/legacy.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/notifyjs/js/notify.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/notifications/notify-metro.js"></script>
    <script type="text/javascript">
        <?php
        $data = $this->session->flashdata('fail');
        if ($data != "") {
        ?>
            $.Notification.autoHideNotify('warning', 'bottom right', 'Gagal', 'Data sudah ada, proses yang anda lakukan gagal');
        <?php }  ?>
        <?php
        $data = $this->session->flashdata('fail_regist');
        if ($data != "") {
        ?>
            $.Notification.autoHideNotify('warning', 'bottom right', 'Gagal', 'Akun sudah ada');
        <?php } ?>
        <?php
        $data = $this->session->flashdata('fail_login');
        if ($data != "") {
        ?>
            $.Notification.autoHideNotify('warning', 'bottom right', 'Gagal', 'Nama akun dan kata sandi salah !!!');
        <?php }  ?>
        <?php
        $data = $this->session->flashdata('welcome');
        if ($data != "") {
        ?>
            $.Notification.autoHideNotify('success', 'bottom right', 'Welcome', 'Selamat Datang!');
        <?php }  ?>
    </script>
    <script type="text/javascript">
        <?php
        $data = $this->session->flashdata('insert');
        if ($data != "") {
        ?>
            $.Notification.autoHideNotify('success', 'bottom right', 'Berhasil', 'Data berhasil terinput');
        <?php }  ?>
        <?php
        $data = $this->session->flashdata('insert_regist');
        if ($data != "") {
        ?>
            $.Notification.autoHideNotify('success', 'bottom right', 'Berhasil', 'Akun anda berhasil di tambahkan!');
        <?php } ?>
    </script>
    <script type="text/javascript">
        <?php
        $data = $this->session->flashdata('edit');
        if ($data != "") {
        ?>
            $.Notification.autoHideNotify('success', 'bottom right', 'Berhasil', 'Data berhasil diubah');
        <?php }  ?>
    </script>
    <script type="text/javascript">
        <?php
        $data = $this->session->flashdata('delete');
        if ($data != "") {
        ?>
            $.Notification.autoHideNotify('success', 'bottom right', 'Berhasil', 'Data berhasil dihapus');
        <?php }  ?>
    </script>
</body>

</html>