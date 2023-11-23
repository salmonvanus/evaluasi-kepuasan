<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('part-admin/head'); ?>

<script>
    // Gunakan JavaScript untuk mencegah penggunaan tombol "Back"
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
        history.go(1);
    };
</script>

<body>

    <?php $this->load->view('part-admin/topbar'); ?>
    <?php $this->load->view('part-admin/title'); ?>

    <div class="page-wrapper">
        <div class="page-wrapper-inner">
            <?php $this->load->view('part-admin/sidebar'); ?>

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Beranda</h4>
                                    <p class="text-muted mb-0 font-13">Selamat Datang <b><?= $profil['name']; ?></b>. </p>

                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <?php $this->load->view('part-admin/foot'); ?>
                </div><!-- container -->

            </div>
            <!-- end page content -->
        </div>
    </div>
    <!-- end page-wrapper -->

    <?php $this->load->view('part-admin/script'); ?>
    <?php $this->load->view('part-admin/alert'); ?>

</body>

</html>