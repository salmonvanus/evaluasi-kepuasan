                <!DOCTYPE html>
<html lang="en">
<?php $this->load->view('part-admin/head'); ?>


<body>

    <?php $this->load->view('part-admin/topbar'); ?>
    <?php $this->load->view('part-admin/title'); ?>

    <div class="page-wrapper">
        <div class="page-wrapper-inner">

            <?php $this->load->view('part-admin/sidebar'); ?>

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Profil Pengguna</h4>
                                    <p class="text-muted mb-0 font-13">Selamat Datang <b><?= $profil['name']; ?></b>. </p>

                                    <div class="row">
                                            <div class="col-lg-6">
                                                <img src="<?= base_url(); ?>assets/uploads/images/<?= $profil['image']; ?>" alt="" class=" mx-auto  d-block" height="400">
                                                <div class="row">
                                                    <div class="col-sm-4">

                                                    </div>
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-4"></div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6 align-self-center">
                                                <div class="single-pro-detail">
                                                    <h3 class="pro-title"><?= $profil['name']; ?></h3>
                                                    <p class="text-muted mb-2"><?= "Username : " . $profil['username']; ?></p>
                                                    <div class="quantity mt-3 ">
                                                        <button type="button" onclick="edit_profil('<?= $profil['id']; ?>')" class="btn btn-success text-white px-4 d-inline-block" value="Ubah"><i class="fas fa-edit"></i> Ubah Data</button>
                                                        <button type="button" data-toggle="modal" data-target="#ubahPassword" class="btn btn-warning text-white px-4 d-inline-block" value="Ubah"><i class="fas fa-key"></i> Ubah Password</button>
                                                        <!-- <button type="button" data-toggle="modal" onclick="edit_password('<?= $profil['id']; ?>')" class="btn btn-warning text-white px-4 d-inline-block" value="Ubah"><i class="fas fa-key"></i> Ubah Password</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div><!-- container -->

                <?php $this->load->view('part-admin/foot'); ?>
            </div>
        </div>
    </div>

    <?php $this->load->view('part-admin/script'); ?>
    <?php $this->load->view('part-admin/alert'); ?>


</body>

</html>
                
    <script>
        function edit_profil(id) {

            console.log(id);
            $.ajax({
                url: "<?= site_url('admin/profil/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name=ed_id]').val(data.id);
                    $('[name=ed_username]').val(data.username);
                    $('[name=ed_name]').val(data.name);
                    $('[name=add_images]');
                    $('#editprofil').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error data get from ajax');
                }
            });
        }

        function edit_password(id) {

            console.log(id);
            $.ajax({
                url: "<?= site_url('/admin/profil/get'); ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name=ed_id]').val(data.id);
                    $('#editPassword').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error data get from ajax');
                }
            });
        }
    </script>

    <div class="modal fade" id="editprofil" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <?= form_open_multipart('admin/profil/edit_profil'); ?>
            <div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Akun</label>
                            <input type="hidden" name="ed_id" class="form-control">
                            <input type="text" name="ed_username" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="ed_name" class="form-control" required>
                        </div>
                        <div class="form-group row">
                            <div class=" col-lg-12">
                                <label for="nama">Foto Profil</label>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="<?= base_url(); ?>assets/uploads/images/<?= $profil['image']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="file" name="add_images" title="" class="filestyle form-control" data-buttonText="pilih file" accept="image/*">
                                            </div>
                                            <p>* Format foto harus jpeg, jpg, png (Size Max: 10 MB)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info waves-effect waves-light" type="submit"><span>Ubah</span><i class="fas fa-edit ml-3"></i></button>
                        <button class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Batal</span> <i class="far fa-window-close ml-3"></i></button>
                    </div>
                </div>
            </div>
            <?= form_close();  ?>
        </div>
    </div>

    <div class="modal fade" id="ubahPassword" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close"><span arial-hidden="true">&times;</span></button>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('admin/profil/changepassword'); ?>" method="POST" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Password Lama</label>
                            <input type="hidden" name="ed_id" value="<?= $profil['id']; ?>" class="form-control">
                            <input type="password" name="ed_current_password" class="form-control" autocomplete="off" required>
                            <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" id="pass2" class="form-control" required placeholder="Password" />
                            <div class="mt-2">
                                <input type="password" name="ed_new_password" class="form-control" required data-parsley-equalto="#pass2" placeholder="Tulis Ulang Password" />
                            </div>
                        </div>
                        <!--end form-group-->
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info waves-effect waves-light" type="submit"><span>Ubah</span><i class="fas fa-edit ml-3"></i></button>
                        <button class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Batal</span> <i class="far fa-window-close ml-3"></i></button>
                    </div>
            </div>
        </div>
    </div>