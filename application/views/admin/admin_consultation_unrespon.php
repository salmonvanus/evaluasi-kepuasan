<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Left sidebar -->
                <!-- <div class="email-leftbar">
                    <a href="#custom-modal" class="btn btn-danger btn-rounded btn-custom btn-block waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="fas fa-feather-alt mr-2"></i>Compose
                    </a>
                </div> -->
                <!-- End Left sidebar -->


                <!-- Right Sidebar -->
                <div class="email">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Daftar Konsultasi || Belum Direspon</h4>
                        </div>
                    </div>
                    <!-- end toolbar -->

                    <div class="card">
                        <ul class="message-list">
                            <?php echo $this->session->flashdata('message'); ?>
                            <?php $i = 1;
                            foreach ($consultation as $c) { ?>
                                <li>
                                    <div class="col-mail col-mail-1">
                                        <a href="<?= base_url(); ?>admin/Admin_consultation/read_consultation/<?= $c['consultation_id']; ?>">
                                            <p class="title">
                                                <?= $c['user_email']; ?>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="<?= base_url(); ?>admin/Admin_consultation/read_consultation/<?= $c['consultation_id']; ?>" class="subject">
                                            <?php $email = $c['user_full_name'];
                                            echo substr($email, 0, 6); ?> &nbsp;–&nbsp;
                                            <span class="teaser">
                                                <?php $consultation_text =  $c['consultation_text'];
                                                echo substr($consultation_text, 0, 50); ?>&nbsp;-&nbsp;
                                            </span>
                                        </a>
                                        <div class="date">
                                            <?php $consultation_date = $c['consultation_date_created'];
                                            echo date("d-m-Y", strtotime($consultation_date));
                                            ?>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>

                        </ul>
                    </div> <!-- panel -->
                </div> <!-- end email-rightbar -->
            </div><!-- end Col -->
        </div><!-- End row -->

    </div><!-- container -->

    <!-- Modal -->
    <div id="custom-modal" class="modal-demo text-left">
        <button type="button" class="close" onclick="Custombox.modal.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Compose Mail</h4>
        <div class="card mb-0 p-3">
            <form role="form">
                <div class="form-group mb-3">
                    <input type="email" class="form-control" placeholder="To">
                </div>
                <!--end form-group-->
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Cc">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Bcc">
                        </div>
                    </div>
                </div>
                <!--end form-group-->
                <div class="form-group mb-3">
                    <input type="text" class="form-control" placeholder="Subject">
                </div>
                <!--end form-group-->
                <div class="form-group mb-3">
                    <div class="summernote">
                        <h6>Hello Summernote</h6>
                        <ul>
                            <li>
                                Select a text to reveal the toolbar.
                            </li>
                            <li>
                                Edit rich document on-the-fly, so elastic!
                            </li>
                        </ul>
                        <p>
                            End of air-mode area
                        </p>

                    </div>
                </div>
                <!--end form-group-->

                <div class="btn-toolbar form-group mb-0">
                    <div class="pull-right">
                        <button type="button" class="btn btn-success waves-effect waves-light mr-2"><i class="far fa-save"></i></button>
                        <button type="button" class="btn btn-success waves-effect waves-light mr-2"><i class="far fa-trash-alt"></i></button>
                        <button class="btn btn-info waves-effect waves-light"><span>Send</span> <i class="far fa-paper-plane ml-3"></i></button>
                    </div>
                </div>
                <!--end form-group-->
            </form>
            <!--end form-->
        </div>
        <!--end card-->
    </div>
    <!--end custom-modal-->

    <footer class="footer text-center text-sm-left">
        <?= $footer . " "; ?><img src="<?= base_url(); ?>/assets/images/logo_cleverlabs.png" alt="logo-small" style="width: 4%" class="logo-sm">
    </footer>
</div>
<!-- end page content -->
</div>
<!--end page-wrapper-inner -->
</div>
<!-- end page-wrapper -->