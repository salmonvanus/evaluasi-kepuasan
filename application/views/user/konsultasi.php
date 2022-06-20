<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Masukkan Data Diri</h4>
                        <p class="text-muted mb-4 font-13">Data Pribadi Konsultasi Penyakit Sinusitis.</p>
                        <form class="user" method="post" action="<?= base_url(); ?><?= $this->uri->segment(1); ?>/add_pasien">
                            <div class="form-group">
                                <label for="username">Nama</label>
                                <label style="color:red ;">*</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account font-16"></i></span>
                                    </div>
                                    <input type="text" name="add_nama_pasien" class="form-control" placeholder="Masukkan nama lengkap" value="<?= set_value('add_nama_pasien'); ?>">
                                </div>
                                <?= form_error('add_nama_pasien', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="username">Jenis Kelamin</label>
                                <label style="color:red ;">*</label>
                                <div class="input-group mb-3">
                                    <div class="radio form-check-inline">
                                        <input type="radio" id="inlineRadio1" value="L" <?php
                                                                                        echo set_value('add_jenis_kelamin') == 'L' ? "checked" : "";
                                                                                        ?> name="add_jenis_kelamin">
                                        <label for="inlineRadio1"> Laki-laki </label>
                                    </div>
                                    <div class="radio radio-pink form-check-inline">
                                        <input type="radio" id="inlineRadio2" value="P" <?php
                                                                                        echo set_value('add_jenis_kelamin') == 'P' ? "checked" : "";
                                                                                        ?> name="add_jenis_kelamin">
                                        <label for="inlineRadio2"> Perempuan </label>
                                    </div>
                                </div>
                                <?= form_error('add_jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="username">Alamat</label>
                                <label style="color:red ;">*</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-home-map-marker font-16"></i></span>
                                    </div>
                                    <textarea class="form-control" rows="5" name="add_alamat"><?= set_value('add_alamat'); ?></textarea>
                                </div>
                                <?= form_error('add_alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="username">No Telp</label>
                                <label style="color:red ;">*</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-phone font-16"></i></span>
                                    </div>
                                    <input type="text" name="add_no_telp" class="form-control" placeholder="No Telp" onkeypress="return hanyaAngka(event)" value="<?= set_value('add_no_telp'); ?>">
                                </div>
                                <?= form_error('add_no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <p class="text-muted mb-4 font-13">Yang memiliki tanda (<label style="color:red ;">*</label>) wajib diisi.
                            </p>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Lanjutkan
                            </button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->

    <footer class="footer text-center text-sm-left">
        <?= $footer . " "; ?>
    </footer>
</div>
<!-- end page content -->
</div>
<!--end page-wrapper-inner -->
</div>
<!-- end page-wrapper -->