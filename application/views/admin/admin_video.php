<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right align-item-center mt-2">
                            <div class="pull-right">
                                <button type="button" data-toggle="modal" data-target="#inputVideo" class="btn btn-info px-4 align-self-center report-btn" aria-expanded="false">Tambah Link Video<span class="m-l-5"></i></span></button>
                            </div>
                        </div>
                        <br />
                        <h4 class="mt-0 header-title">Link Video</h4>
                        <?= $this->session->flashdata('message'); ?>
                        <p class="text-muted mb-4 font-13">
                        </p>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Video</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($video as $data) { ?>
                                    <tr>
                                        <td>
                                            <center><iframe width="350" height="215" alt="video" src="<?= $data['video_link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
                                        </td>
                                        <td>
                                            <button type="button" onclick="edit_video('<?php echo $data['video_id']; ?>')" class="btn btn-primary waves-light waves-effect" value="Ubah"><i class="fas fa-edit"></i></button>
                                            <button type="button" onclick="delete_video('<?php echo $data['video_id']; ?>')" class="btn btn-primary waves-light waves-effect"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <script>
            function edit_video(id) {
                //Ajax Load data from ajax

                console.log(id);
                $.ajax({
                    url: "<?php echo site_url('/admin/Admin_video/get') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name=ed_video_id]').val(data.video_id);
                        $('[name=ed_video_link]').val(data.video_link);
                        $('#editVideo').modal('show'); // show bootstrap modal when complete loaded
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }

            function delete_video(id) {
                //Ajax Load data from ajax

                console.log(id);
                $.ajax({
                    url: "<?php echo site_url('/admin/Admin_video/get') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name=del_video_id]').val(data.video_id);
                        $('[name=del_video_link]').val(data.video_link);
                        $('#deleteVideo').modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }
        </script>

        <!-- Modal edit -->
        <div class="modal fade" id="editVideo" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/Admin_video/edit_video'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Link Video</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="name">Link Video</label>
                            <input type="hidden" name="ed_video_id" class="form-control">
                            <div class="form-group">
                                <textarea name="ed_video_link" class="form-control" id="exampleFormControlTextarea1" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info waves-effect waves-light" type="submit"><span>Ubah</span> <i class="fas fa-edit ml-3"></i></button>
                        <button class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Batal</span> <i class="far fa-window-close ml-3"></i></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

        <!-- Modal hapus -->
        <div class="modal fade" id="deleteVideo" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/Admin_video/delete_video'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Link Video</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Apakah anda yakin ingin menghapus video ini ?</label>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="del_video_id">
                            <input type="text" name="del_video_link" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect waves-light"><span>Hapus</span><i class="fas fa-trash ml-3"></i></button>
                        <button class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Batal</span><i class="far fa-window-close ml-3"></i></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="inputVideo" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/Admin_video/insert_video'); ?>
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Link Video</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Tempel Link</label>
                            <div class="form-group">
                                <textarea name="add_video_link" placeholder="Masukkan link video" class="form-control" autocomplete="off" id="exampleFormControlTextarea1" rows="5" required></textarea>
                            </div>
                            <!-- <input type="text" name="add_video_link" placeholder="Link video" class="form-control" autocomplete="off" required> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info waves-effect waves-light" type="submit"><span>Tambah</span><i class="fas fa-plus ml-3"></i></button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Tutup</span><i class="far fa-window-close ml-3"></i></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div><!-- container -->

    <footer class="footer text-center text-sm-left">
        <?= $footer . " "; ?><img src="<?= base_url(); ?>/assets/images/logo_cleverlabs.png" alt="logo-small" style="width: 4%" class="logo-sm">
    </footer>
</div>
<!-- end page content -->


</div>
<!--end page-wrapper-inner -->
</div>
<!-- end page-wrapper -->