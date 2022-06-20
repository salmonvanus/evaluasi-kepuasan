<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="float-right align-item-center mt-2">
                            <div class="pull-right">
                                <button type="button" data-toggle="modal" data-target="#tambahGejala" class="btn btn-info px-4 align-self-center report-btn" aria-expanded="false">Tambah Gejala<span class="m-l-5"></i></span></button>
                            </div>
                        </div> -->
                        <h4 class="mt-0 header-title">Gejala</h4>
                        <p class="text-muted mb-4 font-13">Daftar gejala pada penyakit sinusitis.</p>
                        <?= $this->session->flashdata('message'); ?>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gejala</th>
                                    <th>Kode Gejala</th>
                                    <th>CF Pakar</th>
                                    <th>
                                        <center>Aksi</center>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                foreach ($gejala as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_gejala']; ?></td>
                                        <td><?= $row['kode_gejala']; ?></td>
                                        <td><?= $row['cf_pakar']; ?></td>
                                        <td>
                                            <center>
                                                <button type="button" onclick="ubah_gejala('<?php echo $row['id_gejala']; ?>')" class="btn btn-sm btn-primary tippy-btn" title="Edit" data-tippy-animation="scale" data-tippy-arrow="true"><i class="fas fa-edit"></i> Edit</button>
                                                <!-- <button type="button" onclick="hapus_gejala('<?php echo $row['id_gejala']; ?>')" class="btn btn-sm btn-danger tippy-btn" title="Hapus" data-tippy-animation="scale" data-tippy-arrow="true"><i class="fas fa-trash"></i> Hapus</button> -->
                                            </center>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <script>
            function ubah_gejala(id) {
                //Ajax Load data from ajax

                console.log(id);
                $.ajax({
                    url: "<?php echo site_url('/admin/Gejala/get') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name=ed_id_gejala]').val(data.id_gejala);
                        $('[name=ed_kode_gejala]').val(data.kode_gejala);
                        $('[name=ed_nama_gejala]').val(data.nama_gejala);
                        $('[name=ed_cf_pakar]').val(data.cf_pakar);
                        $('[name=ed_inisial_gejala]').val(data.inisial_gejala);
                        $('#editGejala').modal('show'); // show bootstrap modal when complete loaded
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }

            function hapus_gejala(id) {
                //Ajax Load data from ajax

                console.log(id);
                $.ajax({
                    url: "<?php echo site_url('/admin/Gejala/get') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name=del_id_gejala]').val(data.id_gejala);
                        $('[name=del_nama_gejala]').val(data.nama_gejala);
                        $('[name=del_kode_gejala]').val(data.kode_gejala);
                        $('#hapusGejala').modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }
        </script>

        <!-- Modal edit -->
        <div class="modal fade" id="editGejala" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/Gejala/edit_gejala'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Gejala</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Kode Gejala</label>
                            <input readonly type="text" name="ed_kode_gejala" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="name">Gejala</label>
                            <input type="hidden" name="ed_id_gejala" class="form-control">
                            <input type="text" name="ed_nama_gejala" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="name">CF Pakar</label>
                            <input type="text" name="ed_cf_pakar" class="form-control" autocomplete="off" required>
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
        <div class="modal fade" id="hapusGejala" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
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
        <div class="modal fade" id="tambahGejala" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/Gejala/tambah_gejala'); ?>
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Gejala</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Kode Gejala</label>
                            <?php
                            $kode = substr($kode_gejala_terakhir, 1);
                            $kode_gejala_baru = $kode + 1;
                            $ambil_kode_gejala_baru = "G" . $kode_gejala_baru;
                            ?>
                            <input readonly type="text" name="add_kode_gejala" placeholder="Masukkan Kode Gejala" class="form-control" value="<?= $ambil_kode_gejala_baru; ?>">
                        </div>

                        <div class="form-group">
                            <label for="name">Nama Gejala</label>
                            <input type="text" name="add_nama_gejala" placeholder="Nama Gejala" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="name">CF Pakar</label>
                            <input type="text" name="add_cf_pakar" placeholder="Nilai CF Pakar" class="form-control" autocomplete="off">
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