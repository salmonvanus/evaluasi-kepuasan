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

                            <div class="media mb-3">
                                <img class="d-flex mr-3 rounded-circle thumb-md" src="<?= base_url(); ?>assets/images/users/user-5.jpg" alt="Generic placeholder image">
                                <div class="media-body align-self-center">
                                    <h4 class="font-14 m-0"><?= $read_consultation['user_full_name']; ?></h4>
                                    <small class="text-muted"><?= $read_consultation['user_email']; ?></small>
                                </div>
                            </div>

                            <h4 class="mt-0">This Week's Top Stories</h4>

                            <p><?= $read_consultation['consultation_text']; ?></p>
                            <hr />
                            <!-- <a href="#custom-modal" onclick="read_consultation('<?php echo $read_consultation['consultation_id']; ?>');" class="btn btn-primary waves-effect" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="mdi mdi-reply"></i> Reply</a> -->
                            <button onclick="reply_consultation('<?php echo $read_consultation['consultation_id']; ?>');" title="" data-original-title="Balas" class="btn btn-primary waves-effect" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">Balas<i class="mdi mdi-reply"></i></button>
                        </div>

                    </div>
                    <!--end row-->
                </div> <!-- end email-rightbar -->
            </div><!-- end Col -->
        </div><!-- End row -->

    </div><!-- container -->

    <script>
        jQuery(document).ready(function() {

            $('.summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['style']],
                    ['style', ['fontname', 'bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                height: 320, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote

            });

        });
    </script>

    <script>
        function reply_consultation(id) {
            //Ajax Load data from ajax

            console.log(id);
            $.ajax({
                url: "<?php echo site_url('/admin/Admin_consultation/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name=rep_consultation_id]').val(data.consultation_id);
                    $('[name=rep_user_full_name]').val(data.user_full_name);
                    $('#replyConsultation').modal('show'); // show bootstrap modal when complete loaded
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>

    <!-- Modal Custom Vanus -->
    <div class="modal fade" id="replyConsultation" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <?php echo form_open_multipart('admin/Admin_consultation/reply_consultation'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Respon Konsultasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Kepada</label>
                        <input name="rep_consultation_id" type="hidden" class="form-control">
                        <input name="rep_user_full_name" type="text" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <!-- <div class="summernote">
                                <h6>Hallo, Terima kasih telah melakukan konsultasi di aplikasi ini.</h6>
                            </div> -->
                            <textarea class="form-control" name="rep_respon_text" id="exampleFormControlTextarea1" rows="4" placeholder="Tanggapan pemerintah" required>Hallo, Terima kasih telah melakukan konsultasi di aplikasi ini.</textarea>
                        </div>
                        <!--end form-group-->
                    </div>
                    <!-- <div class="form-group mb-3">
                        <label for="name">Foto</label>
                        <input type="file" name="rep_consultation_image" class="form-control" title="" class="filestyle form-control" data-buttonText="pilih file" accept="image/*" required>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info waves-effect waves-light" type="submit"><span>Kirim</span> <i class="far fa-paper-plane ml-3"></i></button>
                    <button class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Batal</span> <i class="far fa-window-close ml-3"></i></button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

    <footer class="footer text-center text-sm-left">
        <?= $footer . " "; ?><img src="<?= base_url(); ?>/assets/images/logo_cleverlabs.png" alt="logo-small" style="width: 4%" class="logo-sm">
    </footer>
    </>
    <!-- end page content -->
</div>
<!--end page-wrapper-inner -->
</div>
<!-- end page-wrapper -->