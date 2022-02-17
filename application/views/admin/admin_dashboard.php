<div class="page-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="dripicons-user-group font-24 text-secondary"></i>
                        </div>
                        <span class="badge badge-info">Konsultasi Yang Masuk</span>
                        <h3 class="font-weight-bold"><?= $consultation_total; ?></h3>
                        <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span>Up From Yesterday</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="dripicons-cart  font-20 text-secondary"></i>
                        </div>
                        <span class="badge badge-danger">Belum di Respon</span>
                        <h3 class="font-weight-bold"><?= $unrespon_total; ?></h3>
                        <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>1.5%</span> Up From Last Week</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="dripicons-jewel font-20 text-secondary"></i>
                        </div>
                        <span class="badge badge-success">Sudah di Respon</span>
                        <h3 class="font-weight-bold"><?= $respon_total; ?></h3>
                        <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>3%</span> Down From Last Month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="dripicons-wallet font-20 text-secondary"></i>
                        </div>
                        <span class="badge badge-info">Total Artikel</span>
                        <h3 class="font-weight-bold"><?= $article_total; ?></h3>
                        <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Up From Last Week</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Daftar Konsultasi || Sudah Direspon</h4>
                        <div class="table-responsive dash-social">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama </th>
                                        <th>Tanggal Masuk</th>
                                        <th>Konsultasi</th>
                                        <th>Status</th>
                                    </tr>
                                    <!--end tr-->
                                </thead>

                                <tbody>
                                    <tr>
                                        <?php foreach ($respon_consultation as $data) { ?>
                                            <td><?= $data['user_full_name'];  ?></td>
                                            <td><?php $consultation_date = $data['consultation_date_created'];
                                                echo date("d-m-Y", strtotime($consultation_date)); ?></td>
                                            <td><?php $consultation_text = $data['consultation_text'];
                                                echo substr($consultation_text, 0, 20) . ' ...'; ?></td>
                                            <td>
                                                <? $consultation_status = $data['consultation_status'];
                                                if ($consultation_status == 1) {
                                                    echo '<a class="btn btn-success btn-square" style="color: white;">Sudah direspon</a>';
                                                }
                                                if ($consultation_status == 0) {
                                                    echo '<a class="btn btn-danger btn-square" style="color: white;">Belum direspon</a>';
                                                }
                                                ?>
                                            </td>
                                    </tr>
                                <?php } ?>
                                <!--end tr-->

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->

            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Daftar Konsultasi || Belum Direspon</h4>
                        <div class="table-responsive dash-social">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama </th>
                                        <th>Tanggal Masuk</th>
                                        <th>Konsultasi</th>
                                        <th>Status</th>
                                    </tr>
                                    <!--end tr-->
                                </thead>

                                <tbody>
                                    <tr>
                                        <?php foreach ($unrespon_consultation as $data) { ?>
                                            <td><?= $data['user_full_name'];  ?></td>
                                            <td><?php $consultation_date = $data['consultation_date_created'];
                                                echo date("d-m-Y", strtotime($consultation_date)); ?></td>
                                            <td><?php $consultation_text = $data['consultation_text'];
                                                echo substr($consultation_text, 0, 20) . ' ...'; ?></td>
                                            <td>
                                                <? $consultation_status = $data['consultation_status'];
                                                if ($consultation_status == 1) {
                                                    echo '<a class="btn btn-success btn-square" style="color: white;">Sudah direspon</a>';
                                                }
                                                if ($consultation_status == 0) {
                                                    echo '<a class="btn btn-danger btn-square" style="color: white;">Belum direspon</a>';
                                                }
                                                ?>
                                            </td>
                                    </tr>
                                <?php } ?>
                                <!--end tr-->

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
            <?php foreach ($article as $article_data) {
            ?>
                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top img-fluid" style="height: 300px;" src="<?= base_url(); ?>assets/images/artikel/<?= $article_data['article_image']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title mt-0"><?php $title = $article_data['article_title'];
                                                        echo substr($title, 0, 20); ?>...</h4>
                            <p class="card-text text-muted font-13"><?php $konten = $article_data['article_content'];
                                                                    echo substr($konten, 0, 80); ?>...</p>
                            <?php $article_status = $article_data['article_status'];
                            if ($article_status == 1) {
                                echo '<div class="alert alert-outline-success mb-0" role="alert">
                                            <h4 class="alert-heading font-18">Terpublikasi!</h4>
                                        </div>';
                            }
                            if ($article_status == 0) {
                                echo '<div class="alert alert-outline-pink mb-0" role="alert">
                                            <h4 class="alert-heading font-18">Disembunyikan!</h4>
                                        </div>';
                            } ?>
                        </div>
                        <!--end card -body-->
                    </div>
                    <!--end card-->
                </div>
            <?php } ?>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!-- end container fluid -->

    <footer class="footer text-center text-sm-left">
        <?= $footer . " "; ?><img src="<?= base_url(); ?>/assets/images/logo_cleverlabs.png" alt="logo-small" style="width: 4%" class="logo-sm">
    </footer>
</div>
<!-- end page content -->
</div>
<!--end page-wrapper-inner -->
</div>
<!-- end page-wrapper -->