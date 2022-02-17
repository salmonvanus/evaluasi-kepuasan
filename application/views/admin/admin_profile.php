                <!-- Page Content-->
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('message'); ?>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img src="<?= base_url(); ?>assets/images/users/<?= $profile['image']; ?>" alt="" class=" mx-auto  d-block" height="400">
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
                                                    <h3 class="pro-title"><?= $profile['name']; ?></h3>
                                                    <p class="text-muted mb-2"><?= "Username : " . $profile['username']; ?></p>
                                                    <div class="quantity mt-3 ">
                                                        <button type="button" onclick="edit_profile('<?= $profile['id']; ?>')" class="btn btn-success text-white px-4 d-inline-block" value="Ubah"><i class="fas fa-edit"></i> Ubah Data</button>
                                                        <button type="button" data-toggle="modal" data-target="#ubahPassword" class="btn btn-warning text-white px-4 d-inline-block" value="Ubah"><i class="fas fa-key"></i> Ubah Password</button>
                                                        <!-- <button type="button" data-toggle="modal" onclick="edit_password('<?= $profile['id']; ?>')" class="btn btn-warning text-white px-4 d-inline-block" value="Ubah"><i class="fas fa-key"></i> Ubah Password</button> -->
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

                    <script>
                        function edit_profile(id) {

                            console.log(id);
                            $.ajax({
                                url: "<?= site_url('/admin/Admin_profile/get') ?>/" + id,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data) {
                                    $('[name=ed_id]').val(data.id);
                                    $('[name=ed_username]').val(data.username);
                                    $('[name=ed_name]').val(data.name);
                                    $('[name=add_images]');
                                    $('#editProfile').modal('show');
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    alert('Error data get from ajax');
                                }
                            });
                        }

                        function edit_password(id) {

                            console.log(id);
                            $.ajax({
                                url: "<?= site_url('/admin/Admin_profile/get'); ?>/" + id,
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

                    <div class="modal fade" id="editProfile" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
                        <div class="modal-dialog" role="document">
                            <?= form_open_multipart('Admin/Admin_profile/edit_profile'); ?>
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
                                                        <img src="<?= base_url(); ?>assets/images/users/<?= $profile['image']; ?>" class="img-thumbnail">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <!-- <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="image" name="image">
                                                            <input type="file" name="add_article_image" title="" id="image" class="custom-file-input" data-buttonText="pilih file" accept="image/*">
                                                            <label class="custom-file-label" for="image">Pilih foto</label>
                                                        </div> -->
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
                                <form action="<?= base_url('admin/Admin_profile/changepassword'); ?>" method="POST" autocomplete="off">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Password Lama</label>
                                            <input type="hidden" name="ed_id" value="<?= $profile['id']; ?>" class="form-control">
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

                    <footer class="footer text-center text-sm-left">
                        <?= $footer . " "; ?><img src="<?= base_url(); ?>/assets/images/logo_cleverlabs.png" alt="logo-small" style="width: 4%" class="logo-sm">
                    </footer>
                </div>
                <!-- end page content -->
                </div>
                <!--end page-wrapper-inner -->
                </div>
                <!-- end page-wrapper -->