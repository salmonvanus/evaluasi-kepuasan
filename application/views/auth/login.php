<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('part/head'); ?>


<body class="account-body">

    <!-- Log In page -->
    <div class="row vh-100">
        <div class="col-lg-3  pr-0">
            <div class="card mb-0 shadow-none">
                <div class="card-body">

                    <div class="px-3">
                        <div class="media">
                            <a href="<?= base_url('beranda'); ?>" class="logo logo-admin"><img src="assets/images/logo/logo-kejari.png" height="55" alt="logo" class="my-3"></a>
                            <div class="media-body ml-3 align-self-center">
                            <h4 class="mt-0 mb-1">Masuk Sebagai <b class="text-primary">Admin</b></h4>
                                <p class="text-muted mb-0">Masuk untuk melanjutkan.</p>
                            </div>
                        </div>

                        <form action="<?= base_url(); ?>login" class="form-horizontal my-4" method="POST">

                            <div class="form-group">
                                <label for="username">Nama Akun</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="username" name="username" autocomplete="off" placeholder="Masukkan nama akun">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Kata Sandi</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" placeholder="Masukkan kata sandi">
                                </div>
                            </div>

                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Masuk <i class="fas fa-sign-in-alt ml-1"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="m-3 text-center bg-light p-3 text-primary">
                        <h5 class="">Belum punya akun ? </h5>
                        <a href="<?= base_url(); ?>registration" class="btn btn-primary btn-round waves-effect waves-light">Daftar</a>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-lg-9 p-0 d-flex justify-content-center">
            <div class="accountbg d-flex align-items-center">
                <div class="account-title text-white text-center">
                    <img src="<?= base_url(); ?>assets/images/logo/logo-only-login-2.png" alt="" width="100%">

                </div>
            </div>
        </div>
    </div>
    <!-- End Log In page -->


    <?php $this->load->view('part/script'); ?>
    <?php $this->load->view('part/alert'); ?>


</body>

</html>