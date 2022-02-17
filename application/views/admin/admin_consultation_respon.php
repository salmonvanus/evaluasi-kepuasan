<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Daftar Konsultasi || Sudah Direspon</h4>
                        <p class="text-muted mb-4 font-13">
                        </p>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <th>Konsultasi</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($consultation as $data) { ?>
                                    <tr>
                                        <td><?= $data['user_full_name']; ?></td>
                                        <td><?php $konsultasi = $data['consultation_text'];
                                            echo substr($konsultasi, 0, 50); ?>&nbsp;–&nbsp;</td>
                                        <td><?php $consultation_date = $data['consultation_date_created'];
                                            echo date("d-m-Y", strtotime($consultation_date)); ?></td>
                                        <td>
                                            <center>
                                                <a class="btn btn-primary waves-light waves-effect" href="<?= base_url(); ?>admin/Admin_consultation/detail_consultation/<?= $data['consultation_id']; ?>" value="Lihat Detail" role="button"><i class="fas fa-eye"></i>
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container -->

    <footer class=" footer text-center text-sm-left">
        <?= $footer . " "; ?><img src="<?= base_url(); ?>/assets/images/logo_cleverlabs.png" alt="logo-small" style="width: 4%" class="logo-sm">
    </footer>
</div>
<!-- end page content -->
</div>
<!--end page-wrapper-inner -->
</div>
<!-- end page-wrapper -->