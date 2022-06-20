<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right align-item-center mt-2">
                            <div class="pull-right">
                                <button type="button" data-toggle="modal" data-target="#tambahBasisPengetahuan" class="btn btn-info px-4 align-self-center report-btn" aria-expanded="false">Tambah Basis Pengetahuan<span class="m-l-5"></i></span></button>
                            </div>
                        </div>
                        <h4 class="mt-0 header-title">Basis Pengetahuan</h4>
                        <p class="text-muted mb-4 font-13">Daftar basis pengetahuan metode certain factor.</p>
                        <?= $this->session->flashdata('message'); ?>

                        <div class="table-responsive">
                            <table class="table mb-0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penyakit</th>
                                        <th>Gejala</th>
                                        <th>CF Pakar</th>
                                        <th>
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;
                                    foreach ($basis_pengetahuan as $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= "["  . $row['kode_penyakit'] . "]" . " - " . $row['nama_penyakit']; ?></td>
                                            <td><?= "["  . $row['kode_gejala'] . "]" . " - " . $row['nama_gejala']; ?></td>
                                            <td><?= $row['cf_pakar_basis_pengetahuan']; ?></td>
                                            <td>
                                                <center>
                                                    <button type="button" onclick="ubah_basis_pengetahuan('<?php echo $row['id_basis_pengetahuan']; ?>')" class="btn btn-sm btn-primary tippy-btn" title="Edit" data-tippy-animation="scale" data-tippy-arrow="true"><i class="fas fa-edit"></i> Edit</button>
                                                    <!-- <button type="button" onclick="hapus_basis_pengetahuan('<?php echo $row['id_basis_pengetahuan']; ?>')" class="btn btn-sm btn-danger tippy-btn" title="Hapus" data-tippy-animation="scale" data-tippy-arrow="true"><i class="fas fa-trash"></i> Hapus</button> -->
                                                </center>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <script>
            function ubah_basis_pengetahuan(id) {
                //Ajax Load data from ajax

                console.log(id);
                $.ajax({
                    url: "<?php echo site_url('/admin/BasisPengetahuan/get') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name=ed_id_basis_pengetahuan]').val(data.id_basis_pengetahuan);
                        $('[name=ed_id_penyakit]').val(data.id_penyakit);
                        $('[name=ed_id_gejala]').val(data.id_gejala);
                        $('[name=ed_cf_pakar_basis_pengetahuan]').val(data.cf_pakar_basis_pengetahuan);
                        $('#editBasisPengetahuan').modal('show'); // show bootstrap modal when complete loaded
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }

            function hapus_basis_pengetahuan(id) {
                //Ajax Load data from ajax

                console.log(id);
                $.ajax({
                    url: "<?php echo site_url('/admin/Basis_pengetahuan/get') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name=del_id_basis_pengetahuan]').val(data.id_basis_pengetahuan);
                        $('#hapusBasisPengetahuan').modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }
        </script>

        <!-- Modal edit -->
        <div class="modal fade" id="editBasisPengetahuan" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/BasisPengetahuan/edit_basis_pengetahuan'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Basis Pengetahuan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="ed_id_basis_pengetahuan" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="name">Penyakit</label>
                            <select class="custom-select" name="ed_id_penyakit">
                                <option selected disabled value="">Pilih Penyakit</option>
                                <?php foreach ($penyakit as $data) : ?>
                                    <option value="<?= $data['id_penyakit']; ?>"><?php echo "[" . $data['kode_penyakit'] . "]" . " - " . $data['nama_penyakit']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Gejala</label>
                            <select class="custom-select" name="ed_id_gejala">
                                <option selected disabled value="">Pilih Gejala</option>
                                <?php foreach ($gejala as $data) : ?>
                                    <option value="<?= $data['id_gejala']; ?>"><?php echo "[" . $data['kode_gejala'] . "]" . " - " . $data['nama_gejala']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">CF Pakar</label>
                            <input type="text" name="ed_cf_pakar_basis_pengetahuan" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info waves-effect waves-light" type="submit"><span>Edit</span> <i class="fas fa-edit ml-3"></i></button>
                        <button class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Batal</span> <i class="far fa-window-close ml-3"></i></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

        <!-- Modal hapus -->
        <div class="modal fade" id="hapusBasisPengetahuan" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/Penyakit/hapus_penyakit'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Penyakit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Apakah anda yakin ingin menghapus penyakit ini ?</label>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="del_id_penyakit">
                            <input type="text" name="del_nama_penyakit" class="form-control" disabled>
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
        <div class="modal fade" id="tambahBasisPengetahuan" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/BasisPengetahuan/tambah_basis_pengetahuan'); ?>
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Basis Pengetahuan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Gejala</label>
                            <select class="custom-select" name="add_id_gejala">
                                <option selected disabled value="">Pilih Gejala</option>
                                <?php foreach ($gejala as $data) : ?>
                                    <option value="<?= $data['id_gejala']; ?>"><?php echo "[" . $data['kode_gejala'] . "]" . " - " . $data['nama_gejala']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Penyakit</label>
                            <select class="custom-select" name="add_id_penyakit">
                                <option selected disabled value="">Pilih Penyakit</option>
                                <?php foreach ($penyakit as $data) : ?>
                                    <option value="<?= $data['id_penyakit']; ?>"><?php echo "[" . $data['kode_penyakit'] . "]" . " - " . $data['nama_penyakit']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">CF Pakar</label>
                            <input type="text" name="add_cf_pakar_basis_pengetahuan" class="form-control" autocomplete="off" required>
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
        <?= $footer; ?>
    </footer>
</div>
<!-- end page content -->


</div>
<!--end page-wrapper-inner -->
</div>
<!-- end page-wrapper -->