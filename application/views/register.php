<?php $this->load->view('link.php'); ?>

<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo-kominfo.png">
    <title>Promo Bitung</title>
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
                            <a href="<?php echo base_url('Home/'); ?>">
                                <div class="logo">
                                    <img class="logo-size" src="<?php echo base_url(); ?>assets_login/images/logo-umkm-bitung.png" alt="">
                                </div>
                            </a>
                        </div>
                        <h3>Selamat Datang di Aplikasi Promo Bitung.</h3>
                        <p>Daftar untuk membuat akun.</p>
                        <div class="page-links">
                            <a href="<?php echo base_url('login'); ?>">Masuk</a><a href="<?php base_url(''); ?>images<?php echo base_url('login'); ?>" class="active">Daftar</a>
                        </div>
                        <form method="post" action="<?php echo base_url('Register/insert_user'); ?>">
                            <input class="form-control" type="text" name="username" autocomplete="off" placeholder="Nama Akun" required>
                            <input class="form-control" type="password" id="pass" name="password" placeholder="Kata Sandi" required>
                            <input data-parsley-equalto="#pass1" class="form-control" type="password" placeholder="Konfirmasi Kata Sandi" id="pass2" required>
                            <input class="form-control" type="text" autocomplete="off" name="full_name" placeholder="Nama Lengkap" required>
                            <input class="form-control" type="text" autocomplete="off" name="nik" placeholder="No KTP" onkeypress="return hanyaAngka(event)" required>
                            <input class="form-control" type="text" autocomplete="off" name="npwp" placeholder="No NPWP" onkeypress="return hanyaAngka(event)" required>
                            <input class="form-control" type="text" autocomplete="off" name="phone_number" placeholder="No Telepon" onkeypress="return hanyaAngka(event)" required>
                            <!-- <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat Toko</label>
                            <textarea class="form-control" name id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div> -->
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                        <!-- <div class="other-links">
                            <span>Or register with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submit').click(function() {
                var pass = $('#pass').val();
                var pass2 = $('#pass2').val();
                if (pass != pass2) {
                    alert("password tidak sama!");
                }
            });
        });
    </script>



    <script>
        var resizefunc = [];
    </script>
    <script src="<?php echo base_url() ?>assets_login/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets_login/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets_login/js/main.js"></script>
    <!-- jQuery  -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>
    <script src="<?php echo base_url(); ?>assets/pages/jquery.form-pickers.init.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/custombox/js/custombox.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/custombox/js/legacy.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/notifyjs/js/notify.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/notifications/notify-metro.js"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>


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
        $data = $this->session->flashdata('fail2');
        if ($data != "") {
        ?>
            $.Notification.autoHideNotify('warning', 'bottom right', 'Gagal', 'Data Kabupaten/Kota Belum Dimasukkan!');
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