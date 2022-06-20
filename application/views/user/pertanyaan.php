<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <?php $no = 1;
                $ambil_id_pasien = $this->db->get_where('pasien_konsultasi', ['kode_pasien' => $kode_pasien])->row_array();
                $id_pasien = $ambil_id_pasien['id_pasien']; ?>
                <form class="user" method="POST" action="<?= base_url(); ?><?= $this->uri->segment(1); ?>/show_hasil_konsultasi">
                    <?php foreach ($gejala as $row) : ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <h5 class="card-header bg-info text-white mt-0">Jawablah pertanyaan berikut ini [<?= $row['kode_gejala']; ?>]</h5>
                                <div class="card-body">
                                    <h4 class="card-title mt-0"><?= "Apakah saudara/i merasa " . $row['nama_gejala'] . " ?"; ?></h4>
                                    <br />
                                    <div class="form-group">
                                        <label for="username">Jawab :</label>
                                        <label style="color:red ;">*</label>
                                        <div class="input-group">
                                            <input type="hidden" name="add_id_gejala[]" value="<?= $row['id_gejala']; ?>" class="form-control">
                                            <input type="hidden" name="add_id_pasien" value="<?= $id_pasien; ?>" class="form-control">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-map-marker font-16"></i></span>
                                            </div>
                                            <select class="custom-select" name="add_bobot_nilai[]">
                                                <option selected value="0">Pilih Jawaban...</option>
                                                <option value=" 0.2">Tidak Tahu</option>
                                                <option value="0.4">Mungkin</option>
                                                <option value="0.6">Kemungkinan Besar</option>
                                                <option value="0.8">Hampir</option>
                                                <option value="1">Pasti</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach; ?>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Lanjutkan
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

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