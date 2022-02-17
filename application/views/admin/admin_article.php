<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <h4 class="mt-0 header-title">Data Artikel</h4>
                        <p class="text-muted mb-4 font-13">
                        </p>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Judul </th>
                                    <th>Isi</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th>Yang melakukan upload</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($article as $data) { ?>
                                    <tr>
                                        <td><?php $title = $data['article_title'];
                                            echo substr($title, 0, 25); ?>&nbsp;-&nbsp;
                                        </td>
                                        <td><?php $article =  $data['article_content'];
                                            echo substr($article, 0, 20); ?>&nbsp;–&nbsp;</td>
                                        <td><img src="<?= base_url(); ?>assets/images/artikel/<?= $data['article_image']; ?>" style="width:75%; height: 60%; align:center" alt=""></td>
                                        <td><?php $article_status = $data['article_status'];
                                            if ($article_status == 1) {
                                                echo "Terpublikasi";
                                            } elseif ($article_status == 0) {
                                                echo "Disembunyikan";
                                            } ?></td>
                                        <td><?= $data['username']; ?></td>
                                        <td>
                                            <button type="button" onclick="edit_article('<?php echo $data['article_id']; ?>')" class="btn btn-primary waves-light waves-effect" value="Ubah"><i class="fas fa-edit"></i></button>
                                            <button type="button" onclick="delete_article('<?php echo $data['article_id']; ?>')" class="btn btn-primary waves-light waves-effect"><i class="fas fa-trash"></i></button>
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

    <script>
        function edit_article(id) {
            //Ajax Load data from ajax

            console.log(id);
            $.ajax({
                url: "<?php echo site_url('/admin/Admin_article/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name=ed_article_id]').val(data.article_id);
                    $('[name=ed_article_title]').val(data.article_title);
                    $('[name=ed_article_content]').val(data.article_content);
                    $('[name=ed_article_status]').val(data.article_status);
                    $('[name=ed_username]').val(data.username);
                    $('[name=ed_user_id]').val(data.id);
                    $('#editArticle').modal('show'); // show bootstrap modal when complete loaded
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }

        function delete_article(id) {
            //Ajax Load data from ajax

            console.log(id);
            $.ajax({
                url: "<?php echo site_url('/admin/Admin_article/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name=del_article_id]').val(data.article_id);
                    $('[name=del_article_title]').val(data.article_title);
                    $('#deleteArticle').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>

    <!-- Modal edit -->
    <div class="modal fade" id="editArticle" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <?php echo form_open_multipart('admin/Admin_article/edit_article'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Artikel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Judul</label>
                        <input type="hidden" name="ed_article_id" class="form-control">
                        <input type="text" name="ed_article_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Isi Artikel</label>
                        <textarea class="form-control" name="ed_article_content" rows="5" id="exampleFormControlTextarea1" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Status</label>
                        <select class="custom-select" id="inputGroupSelect01" name="ed_article_status">
                            <option selected>Pilih status...</option>
                            <option value="1">Tampilkan artikel</option>
                            <option value="0">Sembunyikan artikel</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Nama Pengunggah</label>
                        <input type="hidden" name="ed_user_id" class="form-group">
                        <input type="text" name="ed_username" class="form-control" disabled>
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
    <div class="modal fade" id="deleteArticle" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <?php echo form_open_multipart('admin/Admin_article/delete_article'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Artikel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Apakah anda yakin ingin menghapus data ini ?</label>
                    </div>
                    <div class="form-group">
                        <label for="name">Judul</label>
                        <input type="hidden" name="del_article_id">
                        <input type="text" name="del_article_title" class="form-control" disabled>
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

    <footer class="footer text-center text-sm-left">
        <?= $footer . " "; ?><img src="<?= base_url(); ?>/assets/images/logo_cleverlabs.png" alt="logo-small" style="width: 4%" class="logo-sm">
    </footer>
</div>
<!-- end page content -->
</div>
<!--end page-wrapper-inner -->
</div>
<!-- end page-wrapper -->