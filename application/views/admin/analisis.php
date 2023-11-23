<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('part-admin/head'); ?>


<body>

    <?php $this->load->view('part-admin/topbar'); ?>
    <?php $this->load->view('part-admin/title'); ?>

    <div class="page-wrapper">
        <div class="page-wrapper-inner">

            <?php $this->load->view('part-admin/sidebar'); ?>

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Analisis</h4>
                                    <p class="text-muted mb-0 font-13">Selamat Datang <b><?= $profil['name']; ?></b>. </p>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                        
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-muted mb-0 font-13">Pilih Jenis Layanan. </p>
                                    <form class="user" method="post" action="<?= base_url('admin/analisis/hasil-analisis'); ?>">
                                        <div class="form-group mt-5">
                                            <label for="username">Jenis Layanan</label>
                                            <label style="color:red ;">*</label>
                                            <div class="input-group mb-3">
                                                <div class="col-sm-12">
                                                    <select name="layanan_id" id="layanan_id" class="form-control select2" style="width: 100%;" required>
                                                        <option value="" disabled>- PIlih -</option>
                                                        <?php foreach ($layanan as $d) : ?>
                                                            <option value="<?= $d['id'] ?>"><?= $d['layanan']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mb-4 font-13">Yang memiliki tanda (<label style="color:red ;">*</label>) wajib diisi.
                                        </p>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Lanjutkan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->


                    </div>
                    <!--end row-->
                </div><!-- container -->

                <?php $this->load->view('part-admin/foot'); ?>
            </div>
        </div>
    </div>

    <?php $this->load->view('part-admin/script'); ?>
    <?php $this->load->view('part-admin/alert'); ?>


</body>

</html>