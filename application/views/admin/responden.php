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
                                    <h4 class="mt-0 header-title">Lihat Responden</h4>
                                    <p class="text-muted mb-0 font-13">Pilih Periode. </p>
                                    <form>
                                        <div class="col-lg-12">
                                            <div class="form-group row mt-5">
                                                <label for="name" class="col-form-label">Layanan</label>
                                                <div class="col-sm-5">
                                                    <select name="id_layanan" id="layanan" class="form-control select2" style="width: 100%;">
                                                        <?php foreach ($layanan as $d) {
                                                            echo "<option value='" . $d['id'] . "'>" . $d['layanan'] . "</option>";
                                                        } ?>
                                                    </select>
                                                </div>

                                                <label for="name" class="col-form-label">Bulan</label>
                                                <div class="col-sm-2">
                                                    <select name="bulan" class="form-control" id="bulan">
                                                        <?php
                                                        $bulan = array(
                                                            '0'  => '-',
                                                            '01' => 'Januari',
                                                            '02' => 'Februari',
                                                            '03' => 'Maret',
                                                            '04' => 'April',
                                                            '05' => 'Mei',
                                                            '06' => 'Juni',
                                                            '07' => 'Juli',
                                                            '08' => 'Agustus',
                                                            '09' => 'September',
                                                            '10' => 'Oktober',
                                                            '11' => 'November',
                                                            '12' => 'Desember'
                                                        );
                                                        foreach ($bulan as $kode => $nama) {
                                                            echo "<option value='$kode'>$nama</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <label for="name" class="col-form-label">Tahun</label>
                                                <div class="col-sm-2">
                                                    <select name="tahun" id="tahun" class="form-control" id="tahun">
                                                        <?php
                                                        $year = date('Y');
                                                        $min = $year - 7;
                                                        $max = $year;
                                                        for ($i = $max; $i >= $min; $i--) {
                                                            echo '<option value=' . $i . '>' . $i . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->

                            <div class="card">
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="dataResponden">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Responden</th>
                                                        <th>Alamat</th>
                                                        <th>Tanggal Pengisian</th>
                                                        <th>Lihat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div><!-- container -->
                <?php $this->load->view('part-admin/foot'); ?>
            </div>
            <!-- end page content -->

        </div>
    </div>
    <!-- end page wrapper -->

    <?php $this->load->view('part-admin/script'); ?>
    <?php $this->load->view('part-admin/alert'); ?>

    <script>
        $(document).ready(function() {
            var dataTable = $('#dataResponden').DataTable({
                "ajax": {
                    "url": "<?php echo base_url('admin/filter-data'); ?>",
                    "type": "POST",
                    "data": function(d) {
                        d.layanan = $('#layanan').val();
                        d.bulan = $('#bulan').val();
                        d.tahun = $('#tahun').val();
                    },
                },
                "columns": [{
                        "data": "nama"
                    },
                    {
                        "data": "alamat"
                    },
                    {
                        "data": "tanggal"
                    },
                    {
                        "data": "kode_responden",
                        "render": function(data, type, row) {
                            // Tambahkan tombol aksi dengan ID kode responden
                            // return '<button type="button" onclick="lihatRespon(' + data + ')" class="btn btn-sm btn-primary tippy-btn" title="Lihat Respon" data-tippy-animation="scale" data-tippy-arrow="true"><i class="fas fa-eye"></i></button>';
                            return '<a href="<?= base_url(); ?>admin/lihat-responden-pengguna/' + data + '" class="btn btn-sm btn-primary tippy-btn" title="Lihat Respon" data-tippy-animation="scale" data-tippy-arrow="true"><i class="fas fa-eye"></i></button>';
                        }
                    }
                ]
            });

            $('#layanan, #bulan, #tahun').change(function() {
                dataTable.ajax.reload();
            });
        });
    </script>



</body>

</html>