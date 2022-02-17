<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <h4 class="mt-0 header-title">Data FAQ</h4>
                        <p class="text-muted mb-4 font-13">Data FAQ yang ditampilkan di halaman user</p>
                        <table id="datatable" class="table table-bordered dt-responsive bowrap" style="border-collapse:collapse; border-spacing:0; width:100%;">
                            <thead>
                                <tr>
                                    <th>Konsultasi</th>
                                    <th>Tanggapan</th>
                                    <th>Kategori Konsultasi</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($faq as $data) : ?>
                                    <?php if (empty($data)) { ?>
                                        <td><?php echo '<br>Data Masih Kosong</br>'; ?></td>
                                        <td><?php echo '<br>Data Masih Kosong</br>'; ?></td>
                                    <?php
                                    } else { ?>
                                        <td><?= $data['faq_consultation']; ?></td>
                                        <td><?= $data['faq_respon']; ?></td>
                                        <td><?= $data['category_name']; ?></td>
                                        <td>
                                            <button type="button" onclick="edit_faq('<?php echo $data['faq_id']; ?>')" class="btn btn-primary waves-light waves-effect" value="Ubah"><i class="fas fa-edit"></i></button>
                                            <button type="button" onclick="delete_faq('<?php echo $data['faq_id']; ?>')" class="btn btn-primary waves-light waves-effect"><i class="fas fa-trash"></i></button>
                                        </td>
                            </tbody>
                    <?php }
                                endforeach;
                    ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->

    <script>
        function edit_faq(id) {
            //Ajax, Load data from ajax

            console.log(id);
            $.ajax({
                url: "<?php echo site_url('/admin/Admin_faq/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name=ed_faq_id]').val(data.faq_id);
                    $('[name=ed_faq_consultation]').val(data.faq_consultation);
                    $('[name=ed_faq_respon]').val(data.faq_respon);
                    $('#editFaq').modal('show'); //show bootstrap
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }

        function delete_faq(id) {

            console.log(id);
            $.ajax({
                url: "<?php echo site_url('/admin/Admin_faq/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name=del_faq_id]').val(data.faq_id);
                    $('[name=del_faq_consultation]').val(data.faq_consultation);
                    $('[name=del_faq_respon]').val(data.faq_respon);
                    $('#deleteFaq').modal('show'); //load modal bootstrap
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>

    <!-- Modal Edit -->
    <div class="modal fade" id="editFaq" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <?php echo form_open_multipart('admin/Admin_faq/edit_faq'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data FAQ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Konsultasi Masyarakat</label>
                        <input type="hidden" name="ed_faq_id" class="form-control">
                        <textarea class="form-control" name="ed_faq_consultation" rows="5" id="exampleFormControlTextarea1" required></textarea>
                        <!-- <input type="text" name="ed_faq_consultation" class="form-control" autocomplete="off" required> -->
                    </div>
                    <div class="form-group">
                        <label for="name">Tanggapan Pemerintah</label>
                        <textarea class="form-control" name="ed_faq_respon" rows="5" id="exampleFormControlTextarea1" required></textarea>
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
    <div class="modal fade" id="deleteFaq" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <?php echo form_open_multipart('admin/Admin_faq/delete_faq'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus FAQ</h4>
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
                        <input type="hidden" name="del_faq_id">
                        <label for="name">Konsultasi Masyarakat</label>
                        <textarea class="form-control" name="del_faq_consultation" rows="5" id="exampleFormControlTextarea1" required disabled></textarea>
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