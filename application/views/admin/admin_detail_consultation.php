<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Detail Konsultasi</h4>
                        <p></p>
                        <div class="row">
                            <div class="col-md-12 col-lg">
                                <ul class="list-unstyled">
                                    <li class="mb-5">
                                        <p style="font-size: medium;">
                                            <?= $detail_consultation_row['consultation_text']; ?>
                                        </p>
                                        <h6 class="text-muted" style="font-size: smaller;">Yang bertanya : <?php echo $detail_consultation_row['user_full_name']; ?></h6>
                                        <h6 class="text-muted" style="font-size: smaller;">Alamat email : <?php echo $detail_consultation_row['user_email']; ?></h6>
                                        <h6 class="text-muted" style="font-size: smaller;">Tanggal masuk : <?php echo $detail_consultation_row['consultation_date_created']; ?></h6>
                                        <h5>
                                            <?php $consultation_status = $detail_consultation_row['consultation_status'];
                                            if ($consultation_status == 1) {
                                                echo '<span style="color: #1ecab8;"><i class="fas fa-check-square"></i> Konsultasi sudah direspon | </i></span>';
                                                if ($detail_consultation_row['consultation_status_faq'] == 1) {
                                                    echo '<span style="color: #1ecab8;"><i class="fas fa-check-square"></i> Data sudah ada di FAQ</i></span>';
                                                }
                                                if ($detail_consultation_row['consultation_status_faq'] == 0) {
                                                    echo '<span style="color: #f93b7a;"><i class="fas fa-window-close"></i> Belum dimasukkan ke FAQ. Tambah ke <a href="#" data-toggle="modal" data-target="#addToFAQ" aria-expanded="false" style="color: #1ecab8;">FAQ</a> ?</i></span>';
                                                }
                                            }
                                            if ($consultation_status == 0) {
                                                echo '<span style="color: red;">Konsultasi belum direspon</span>';
                                            } ?>
                                        </h5>
                                        <h4>Tanggapan Pemerintah</h4>
                                        <div class="card">
                                            <?php echo $this->session->flashdata('message_respon'); ?>
                                            <div class="card-body">
                                                <div class="table">
                                                    <table class="table table-bordered mb-0 table-centered">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal dijawab</th>
                                                                <th>Tanggapan</th>
                                                                <th>Menu</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($detail_consultation as $data) : ?>
                                                                <tr>
                                                                    <td><?= $data['respon_date_created']; ?></td>
                                                                    <td><?= $data['respon_text']; ?></td>
                                                                    <td>
                                                                        <div class="dropdown d-inline-block float-right">
                                                                            <a class="nav-link dropdown-toggle arrow-none" id="dLabel8" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                                                <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel8">
                                                                                <buttton type="button" onclick="edit_respon('<?= $data['respon_id']; ?>')" class="dropdown-item" href="#">Ubah</buttton>
                                                                                <button type="button" onclick="delete_respon('<?= $data['respon_id']; ?>')" class="dropdown-item" href="#">Hapus</button>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                        </tbody>
                                                    <?php endforeach; ?>
                                                    </table>
                                                    <!--end /table-->
                                                </div>
                                                <!--end /tableresponsive-->
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block px-4" data-toggle="modal" data-target="#sendToWa">Kirim balasan ke whatsapp <i class="fab fa-whatsapp"></i></button>
                                        <!--end card-->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Tambah Tanggapan</h4>
                        <p class="text-muted">Masukkan tanggapan terkait konsultasi yang masuk dari masyarakat.</p>
                        <form method="POST" action="<?= base_url('admin/Admin_respon/add_respon'); ?>">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input class="form-control" type="hidden" name="add_consultation_id" value="<?php echo $detail_consultation_row['consultation_id']; ?>">
                                    <input class="form-control" type="text" id="subject2" value="<?php echo $detail_consultation_row['user_full_name']; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" id="subject2" value="<?php echo $detail_consultation_row['user_email']; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="add_respon_text" id="exampleFormControlTextarea1" name="add_respon_text" rows="4" placeholder="Tanggapan pemerintah" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block px-4">Kirim Tanggapan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function edit_respon(id) {
                console.log(id);
                $.ajax({
                    url: "<?php echo site_url('/admin/Admin_respon/get') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name=ed_respon_id]').val(data.respon_id);
                        $('[name=ed_respon_text]').val(data.respon_text);
                        $('#editRespon').modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }

            function delete_respon(id) {
                console.log(id);
                $.ajax({
                    url: "<?php echo site_url('/admin/Admin_respon/get') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name=del_respon_id]').val(data.respon_id);
                        $('[name=del_respon_text]').val(data.respon_text);
                        $('#deleteRespon').modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });

            }
        </script>

        <div class="modal fade" id="addToFAQ" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/Admin_faq/add_faq'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Apakah konsultasi ini akan di masukkan ke FAQ ?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="add_consultation_id" value="<?= $detail_consultation_row['consultation_id']; ?>" class="form-control">
                        <input type="hidden" name="add_respon_id" value="<?= $detail_consultation_row['respon_id']; ?>" class="form-control">
                        <div class="form-group">
                            <label for="name">Konsultasi dari <?= $detail_consultation_row['user_full_name']; ?></label>
                            <textarea class="form-control" name="add_consultation_text" rows="5" id="exampleFormControlTextarea1"><?php $consultation_text = $detail_consultation_row['consultation_text'];
                                                                                                                                    echo $consultation_text; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Tanggapan Pemerintah</label>
                            <textarea name="add_respon_text" class="form-control" id="exampleFormControlTextarea1" rows="5"><?php foreach ($detail_consultation as $data_consultation) : echo $data_consultation['respon_text'] . ".";
                                                                                                                                echo " ";
                                                                                                                            endforeach; ?>
                        </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Topik</label>
                            <select class="custom-select" id="inputGroupSelect01" name="add_category_id" required>
                                <option selected disabled value="">Pilih topik...</option>
                                <?php foreach ($category as $data) : ?>
                                    <option value="<?php echo $data['category_id']; ?>"><?php echo $data['category_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect waves-light"><span>Ya</span><i class="fas fa-check ml-2"></i></button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Tidak</span><i class="fas fa-times ml-2"></i></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

        <div class="modal fade" id="sendToWa" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/Admin_consultation/reply_wa_consultation'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Kirim balasan ke <?= $detail_consultation_row['user_full_name']; ?> ?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="consultation_id" value="<?= $detail_consultation_row['consultation_id']; ?>" class="form-control">
                        <input type="hidden" name="respon_id" value="<?= $detail_consultation_row['respon_id']; ?>" class="form-control">
                        <input type="hidden" name="user_id" value="<?= $detail_consultation_row['user_id']; ?>" class="form-control">
                        <div class="form-group">
                            <label for="name">Konsultasi dari <?= $detail_consultation_row['user_full_name']; ?></label>
                            <input type="text" class="form-control" name="consultation_text" rows="5" id="exampleFormControlTextarea1" value="<?= $detail_consultation_row['consultation_text']; ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="name">Tanggapan Pemerintah</label>
                            <textarea name="respon_text" class="form-control" id="exampleFormControlTextarea1" rows="5" word-spacing: 5px;><?php foreach ($detail_consultation as $data_consultation) : echo $data_consultation['respon_text'] . ".";
                                                                                                                                                echo " ";
                                                                                                                                            endforeach; ?>
                        </textarea>
                            <div class="form-group">
                                <input type="hidden" name="wa_number" value="<?= $detail_consultation_row['user_phone_number']; ?>">
                            </div>
                            <!-- <div class="form-group mb-3">
                            <label for="name">Topik</label>
                            <select class="custom-select" id="inputGroupSelect01" name="add_category_id" required>
                                <option selected disabled value="">Pilih topik...</option>
                                <?php foreach ($category as $data) : ?>
                                    <option value="<?php echo $data['category_id']; ?>"><?php echo $data['category_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light"><span>Kirim </span><i class="fa-solid fa-paper-plane"></i></i></button>
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Batal</span><i class="fas fa-times ml-2"></i></button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editRespon" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/Admin_respon/edit_respon'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Tanggapan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="name">Tanggapan</label>
                        <div class="form-group">
                            <input type="hidden" name="consultation_id" value="<?php echo $detail_consultation_row['consultation_id']; ?>">
                            <input type="hidden" name="ed_respon_id" class="form-control">
                            <textarea class="form-control" name="ed_respon_text" id="exampleFormControlTextarea1" rows="4" placeholder="Tanggapan pemerintah" required></textarea>
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

        <div class="modal fade" id="deleteRespon" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/Admin_respon/delete_respon'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Tanggapan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="name">Apakah anda yakin ingin menghapus tanggapan ini ?</label>
                        <div class="form-group">
                            <input type="hidden" name="del_consultation_id" value="<?php echo $detail_consultation_row['consultation_id']; ?>">
                            <input type="hidden" name="del_respon_id" class="form-control">
                            <input type="text" name="del_respon_text" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info waves-effect waves-light" type="submit"><span>Hapus</span> <i class="fas fa-trash ml-3"></i></button>
                        <button class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Batal</span> <i class="far fa-window-close ml-3"></i></button>
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