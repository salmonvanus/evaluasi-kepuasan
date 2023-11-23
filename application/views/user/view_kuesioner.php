<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('part/head'); ?>


<body>

    <?php $this->load->view('part/topbar'); ?>
    <?php $this->load->view('part/title'); ?>

    <div class="page-wrapper">
        <div class="page-wrapper-inner">

            <?php $this->load->view('part/sidebar'); ?>

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 mb-0 header-title"><?= $layanan['layanan']; ?></h4>
                                </div>
                            </div>
                            <?php
                            if (empty($pertanyaan_harapan) && empty($pertanyaan_persepsi)) { ?>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="name">Nama</label>
                                            <label style="color:red ;">*</label>
                                            <input type="text" name="add_nama" class="form-control" autocomplete="off" required disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Alamat</label>
                                            <label style="color:red">*</label>
                                            <textarea class="form-control" name="add_alamat" cols="30" rows="5" autocomplete="off" required disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo form_open_multipart('kuesioner/input-kuesioner'); ?>
                                        <?php
                                        $random_int = rand();
                                        $responden = "R-" . $random_int;

                                        ?>
                                        <div class="form-group mb-3">
                                            <label for="name">Nama</label>
                                            <label style="color:red ;">*</label>
                                            <input type="hidden" name="add_id_layanan" value="<?= $layanan['id']; ?>">
                                            <input type="hidden" name="add_kode_responden" value="<?= $responden; ?>" required>
                                            <input type="text" name="add_nama" class="form-control" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Alamat</label>
                                            <label style="color:red">*</label>
                                            <textarea class="form-control" name="add_alamat" cols="30" rows="5" autocomplete="off" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (empty($pertanyaan_harapan) && empty($pertanyaan_persepsi)) { ?>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title" style="color:red">Belum terdapat pertanyaan untuk layanan ini.</h4>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title" style="color:red"><u>Pertanyaan Harapan/Pelayanan</u></h4>
                                        <!-- <p class="text-muted">Daftar pertanyaan kuesioner untuk <b>Pertanyaan Harapan/Pelayanan</b>.  -->
                                        </p>
                                        <!-- Start row -->
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <ul class="list-unstyled">
                                                    <?php $no = 1;
                                                    foreach ($pertanyaan_harapan as $val) : ?>
                                                        <li class="mb-5">
                                                            <h6 class=""><?= $no++ . ". " . $val['pertanyaan']; ?></h6>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-check font-16"></i></span>
                                                                </div>
                                                                <input type="hidden" name="add_responden_harapan[]" value="<?= $responden; ?>">
                                                                <input type="hidden" name="add_id_pertanyaan_harapan[]" value="<?= $val['id']; ?>">
                                                                <select class="custom-select" name="add_nilai_harapan[]" required>
                                                                    <option selected disabled> - Wajib pilih jawaban - </option>
                                                                    <option value="1">1. Tidak Baik</option>
                                                                    <option value="2">2. Kurang Baik</option>
                                                                    <option value="3">3. Cukup Baik</option>
                                                                    <option value="4">4. Baik</option>
                                                                    <option value="5">5. Sangat Baik</option>
                                                                </select>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>

                                        </div>
                                        <!-- End row -->

                                        <h4 class="mt-0 header-title" style="color:red"><u>Pertanyaan Persepsi/Pelayanan</u></h4>
                                        <!-- Start row -->
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <ul class="list-unstyled">
                                                    <?php $no = 1;
                                                    foreach ($pertanyaan_persepsi as $val) : ?>
                                                        <li class="mb-5">
                                                            <h6 class=""><?= $no++ . ". " . $val['pertanyaan']; ?></h6>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-check font-16"></i></span>
                                                                </div>
                                                                <input type="hidden" name="add_responden_persepsi[]" value="<?= $responden; ?>">
                                                                <input type="hidden" name="add_id_pertanyaan_persepsi[]" value="<?= $val['id'] ?>">
                                                                <select class="custom-select" name="add_nilai_persepsi[]" required>
                                                                    <option selected disabled> - Wajib pilih jawaban - </option>
                                                                    <option value="1">1. Tidak Baik</option>
                                                                    <option value="2">2. Kurang Baik</option>
                                                                    <option value="3">3. Cukup Baik</option>
                                                                    <option value="4">4. Baik</option>
                                                                    <option value="5">5. Sangat Baik</option>
                                                                </select>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                                Simpan
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <?php echo form_close(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- End row   -->
                                    </div>
                                </div>
                                <!--end card-->
                            <?php } ?>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div><!-- container -->

                <?php $this->load->view('part/foot'); ?>
            </div>
        </div>
    </div>

    <?php $this->load->view('part/script'); ?>
    <?php $this->load->view('part/alert'); ?>


</body>

</html>