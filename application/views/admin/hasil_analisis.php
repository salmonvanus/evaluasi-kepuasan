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
                                    <h4 class="mt-0 header-title">Analisis</h4>
                                    <p class="text-muted mb-0 font-13">Selamat Datang <b><?= $profil['name']; ?></b>. </p>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->

                            <?php
                            $banyak_pertanyaan = (count($pertanyaan_harapan) + count($pertanyaan_persepsi)) / 2;
                            ?>

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title" style="color:red"><u>Pertanyaan Harapan/Pelayanan</u></h4>
                                    <hr />
                                    <?php
                                    if ($count_responden_layanan == 0) {
                                        echo "Tidak ada responden";
                                    } else { ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped" style="font-size:10px" id="example">
                                                <thead>
                                                    <tr>
                                                        <th style="font-size:10px;">#</th>
                                                        <th style="font-size:10px;">Pertanyaan</th>
                                                        <?php for ($j = 1; $j <= $count_responden_layanan; $j++) {
                                                            echo "<th style='font-size:10px;'>R-" . $j . "</th>";
                                                        } ?>
                                                        <th></th>
                                                        <th style="font-size:10px;">MIS</th>
                                                    </tr>
                                                </thead>
                                                <?php $no = 1;
                                                $no_pertanyaan = 1;
                                                foreach ($pertanyaan_harapan as $data_harapan) : ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td><?= "P - " . $no_pertanyaan++; ?></td>
                                                            <?php
                                                            foreach ($responden_layanan as $rl) {
                                                                $this->db->select('data_responden_harapan.nilai_harapan');
                                                                $this->db->from('data_responden_harapan');
                                                                $this->db->join('data_pertanyaan', 'data_pertanyaan.id = data_responden_harapan.id_pertanyaan_harapan');
                                                                $this->db->where('data_responden_harapan.id_pertanyaan_harapan', $data_harapan['id']);
                                                                $this->db->where('data_responden_harapan.responden_harapan', $rl['kode_responden']);
                                                                $data_responden_harapan = $this->db->get()->result_array(); ?>
                                                                <td><?= $data_responden_harapan[0]['nilai_harapan']; ?></td>
                                                            <?php }
                                                            $this->db->select('SUM(nilai_harapan) as nilai');
                                                            $this->db->from('data_responden_harapan');
                                                            $this->db->where('id_pertanyaan_harapan', $data_harapan['id']);
                                                            $data_hasil = $this->db->get()->result_array(); ?>
                                                            <td><?= $data_hasil[0]['nilai']; ?></td>
                                                            <?php $mis_harapan = $data_hasil[0]['nilai'] / $count_responden_layanan;
                                                            echo '<td><b>' . $mis_harapan . '</b></td>';
                                                            $mis_val[] = $mis_harapan;
                                                            ?>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    <?php $mis_sum = array_sum($mis_val); ?>
                                                    <td colspan="<?= $count_responden_layanan + 3; ?>"></td>
                                                    <td><?= '<b>' . $mis_sum . '</b>'; ?></td>
                                                    </tbody>
                                            </table>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title" style="color:red"><u>Pertanyaan Persepsi/Layanan</u></h4>
                                    <hr />
                                    <?php
                                    if ($count_responden_layanan == 0) {
                                        echo "Tidak ada responden";
                                    } else { ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped" style="font-size:10px" id="example">
                                                <thead>
                                                    <tr>
                                                        <th style="font-size:10px;">#</th>
                                                        <th style="font-size:10px;">Pertanyaan</th>
                                                        <?php for ($i = 1; $i <= $count_responden_layanan; $i++) {
                                                            echo "<th style='font-size:10px;'>R-" . $i . "</th>";
                                                        } ?>
                                                        <th style="font-size:10px;"></th>
                                                        <th style="font-size:10px;">MSS</th>
                                                    </tr>
                                                </thead>
                                                <?php $no = 1;
                                                $no_pertanyaan = 1;
                                                foreach ($pertanyaan_persepsi as $data_persepsi) : ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td><?= "P - " . $no_pertanyaan++; ?></td>
                                                            <?php foreach ($responden_layanan as $rl) { ?>
                                                                <?php
                                                                $this->db->select('*');
                                                                $this->db->from('data_responden_persepsi');
                                                                $this->db->join('data_pertanyaan', 'data_pertanyaan.id = data_responden_persepsi.id_pertanyaan_persepsi');
                                                                $this->db->where('data_responden_persepsi.id_pertanyaan_persepsi', $data_persepsi['id']);
                                                                $this->db->where('data_responden_persepsi.responden_persepsi', $rl['kode_responden']);
                                                                $data_responden_persepsi = $this->db->get()->result_array();
                                                                echo '<td>' . $data_responden_persepsi[0]['nilai_persepsi'] . '</td>';
                                                                ?>
                                                            <?php } ?>
                                                            <?php
                                                            $this->db->select('SUM(nilai_persepsi) as nilai');
                                                            $this->db->from('data_responden_persepsi');
                                                            $this->db->where('id_pertanyaan_persepsi', $data_persepsi['id']);
                                                            $data_hasil = $this->db->get()->result_array();
                                                            echo '<td>' . $data_hasil[0]['nilai'] . '</td>';
                                                            $mss_persepsi = $data_hasil[0]['nilai'] / $count_responden_layanan;
                                                            echo '<td><b>' . $mss_persepsi . '</b></td>';
                                                            $mss_val[] = $mss_persepsi;
                                                            ?>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    <?php $mss_sum = array_sum($mss_val); ?>
                                                    <td colspan="<?= $count_responden_layanan + 3; ?>"></td>
                                                    <td><?= '<b>' . $mss_sum . '</b>'; ?></td>
                                                    </tbody>
                                            </table>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">WF & WS</h4>
                                            <div class="table-responsive">
                                                <?php
                                                if ($count_responden_layanan == 0) {
                                                    echo "Data tidak ditemukan";
                                                } else { ?>
                                                    <table class="table table-bordered" style="font-size:10px;" id="data-table">
                                                        <thead>
                                                            <tr>
                                                                <th style="font-size:10px;">WF</th>
                                                                <th style="font-size:10px;">WS</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            for ($jp = 0; $jp < $banyak_pertanyaan; $jp++) {
                                                                echo '<tr>';
                                                                $mis_snh = $sum_nilai_harapan[$jp]['nilai'] / $count_responden_layanan;
                                                                $wf_harapan = ($mis_snh / $mis_sum) * 100;
                                                                $mss_snp = $sum_nilai_persepsi[$jp]['nilai'] / $count_responden_layanan;
                                                                echo '<td>' . number_format($wf_harapan, 2) . '</td>';
                                                                $ws = $wf_harapan * $mss_snp;
                                                                echo '<td>' . number_format($ws, 2) . '</td>';
                                                                $wf_val[] = $wf_harapan;
                                                                $ws_val[] = $ws;
                                                            }
                                                            echo '</tr>';
                                                            ?>
                                                            <?php $wf_sum = array_sum($wf_val); ?>
                                                            <?php $ws_sum = array_sum($ws_val); ?>
                                                            <td><?= "<b>WF Total : " . $wf_sum . "</b>"; ?></td>
                                                            <td><?= "<b>WAT : " . number_format($ws_sum, 2) . "</b>"; ?></td>
                                                        </tbody>
                                                    </table>
                                                    <!-- end table -->
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">
                                                <center>Customer Satisfaction Index</center>
                                            </h4>
                                            <?php
                                            if ($count_responden_layanan == 0) {
                                                echo "<center>Data tidak ditemukan</center>";
                                            } else { ?>
                                                <?php
                                                $csi = $ws_sum / 5;
                                                $data_sisa = 100 - $csi;
                                                $labels = ['Customer Satisfaction Index', 'Blank'];
                                                $data = [number_format($csi, 2), number_format($data_sisa, 2)];
                                                ?>
                                                <canvas id="csiCharts" width="50" height="50"></canvas>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Metode IPA</h4>
                                    <hr />
                                    <?php
                                    if ($count_responden_layanan == 0) {
                                        echo "Data tidak ditemukan";
                                    } else { ?>
                                        <?php
                                        // mencari nilai rata-rata kinerja
                                        for ($jh = 0; $jh < $banyak_pertanyaan; $jh++) {
                                            $mis_snh = $sum_nilai_harapan[$jh]['nilai'] / $count_responden_layanan;
                                            $mis_snh_val[] = $mis_snh;
                                        }
                                        $nilai_rata2_kinerja =  array_sum($mis_snh_val) / $banyak_pertanyaan;
                                        if ($count_responden_layanan == 0) {
                                            echo "Nilai rata-rata kinerja : - <br/>";
                                        } else {
                                            echo "<h5><u>Nilai rata-rata kinerja : <b>" . $nilai_rata2_kinerja . "</b></u></h5>";
                                        }

                                        // mencari nilai rata-rata kepentingan
                                        for ($jp = 0; $jp < $banyak_pertanyaan; $jp++) {
                                            $mis_snp = $sum_nilai_persepsi[$jp]['nilai'] / $count_responden_layanan;
                                            $mis_snp_val[] = $mis_snp;
                                        }
                                        $nilai_rata2_kepentingan =  array_sum($mis_snp_val) / count($pertanyaan_persepsi);
                                        if ($count_responden_layanan == 0) {
                                            echo "Nilai rata-rata kepentingan : - ";
                                        } else {
                                            echo "<h5><u>Nilai rata-rata kepentingan : <b>" . $nilai_rata2_kepentingan . "</b></u></h5>";
                                        }

                                        // menentukan kuadrant
                                        // $quadrant_1 = [];
                                        // $quadrant_2 = [];
                                        // $quadrant_3 = [];
                                        // $quadrant_4 = [];

                                        for ($p = 0; $p < $banyak_pertanyaan; $p++) {

                                            $x = $sum_nilai_persepsi[$p]['nilai'] / $count_responden_layanan;
                                            $y = $sum_nilai_harapan[$p]['nilai'] / $count_responden_layanan;
                                            echo '<br/>';
                                            echo '<br/>';
                                            // echo $x." ";
                                            // echo $y;

                                            $y_rata2 = $nilai_rata2_kinerja;
                                            $x_rata2 = $nilai_rata2_kepentingan;

                                            $no = $p + 1;

                                            if ($x > $x_rata2 && $y > $y_rata2) {
                                                $quadrant = "Kuadran I";
                                            } elseif ($x > $x_rata2 && $y < $y_rata2) {
                                                $quadrant = "Kuadran II";
                                            } elseif ($x < $x_rata2 && $y < $y_rata2) {
                                                $quadrant = "Kuadran III";
                                            } elseif ($x < $x_rata2 && $y > $y_rata2) {
                                                $quadrant = "Kuadran IV";
                                            } else {
                                                $quadrant = "Di tengah (rata-rata)";
                                            }

                                            echo "<u>Pertanyaan $no</u> <br/> <b>x$no</b> = $x dengan x(rata-rata) = $x_rata2 dan <b>y$no</b> = $y dengan y(rata-rata) = $y_rata2 berada di $quadrant.";
                                        }
                                        ?>

                                    <?php } ?>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="mt-0 header-title">Grafik Kuadran</h4> -->
                                    <!-- <hr/> -->

                                    <?php
                                    // mencari nilai rata-rata kinerja
                                    for ($jh = 0; $jh < $banyak_pertanyaan; $jh++) {
                                        $mis_snh2 = $sum_nilai_harapan[$jh]['nilai'] / $count_responden_layanan;
                                        $mis_snh2_val[] = $mis_snh2;
                                    }
                                    $nilai_rata2_kinerja =  array_sum($mis_snh2_val) / $banyak_pertanyaan;

                                    // mencari nilai rata-rata kepentingan
                                    for ($jp = 0; $jp < $banyak_pertanyaan; $jp++) {
                                        $mis_snp2 = $sum_nilai_persepsi[$jp]['nilai'] / $count_responden_layanan;
                                        $mis_snp2_val[] = $mis_snp2;
                                    }
                                    $nilai_rata2_kepentingan =  array_sum($mis_snp2_val) / count($pertanyaan_persepsi);

                                    for ($p = 0; $p < $banyak_pertanyaan; $p++) {

                                        $x = $sum_nilai_persepsi[$p]['nilai'] / $count_responden_layanan;
                                        $y = $sum_nilai_harapan[$p]['nilai'] / $count_responden_layanan;

                                        $y_rata2 = $nilai_rata2_kinerja;
                                        $x_rata2 = $nilai_rata2_kepentingan;

                                        $nomor = $p + 1;
                                        if ($x > $x_rata2 && $y > $y_rata2) {
                                            $q1[] = "Pertanyaan $nomor, \t" . "nilai <b>x$nomor</b> : " . $x . " dan " . "<b>y$nomor</b> : " . $y . "<br/>";
                                        } elseif ($x > $x_rata2 && $y < $y_rata2) {
                                            $q2[] = "Pertanyaan $nomor, \t" . "nilai <b>x$nomor</b> : " . $x . " dan " . "<b>y$nomor</b> : " . $y . "<br/>";
                                        } elseif ($x < $x_rata2 && $y < $y_rata2) {
                                            $q3[] = "Pertanyaan $nomor, \t" . "nilai <b>x$nomor</b> : " . $x . " dan " . "<b>y$nomor</b> : " . $y . "<br/>";
                                        } elseif ($x_rata2 && $y > $y_rata2) {
                                            $q4[] = "Pertanyaan $nomor, \t" . "nilai <b>x$nomor</b> : " . $x . " dan " . "<b>y$nomor</b> : " . $y . "<br/>";
                                        }
                                    }
                                    ?>
                                    <center>
                                        <table border="1" style="width: 80%; height: 100%;">
                                            <th>
                                                <center>KUADRAN 1</center>
                                            </th>
                                            <th>
                                                <center>KUADRAN 2</center>
                                            </th>
                                            <tr>
                                                <td>
                                                    <?php foreach ($q1 as $dx1) : ?>
                                                        <center><?= $dx1; ?></center>
                                                    <?php $no++;
                                                    endforeach; ?>
                                                    <br />
                                                </td>
                                                <td>
                                                    <?php foreach ($q2 as $dx2) : ?>
                                                        <center><?= $dx2; ?></center>
                                                    <?php $no++;
                                                    endforeach; ?>
                                                    <br />
                                                </td>
                                            </tr>
                                            <th>
                                                <center>KUADRAN 3</center>
                                            </th>
                                            <th>
                                                <center>KUADRAN 4</center>
                                            </th>
                                            <tr>
                                                <td>
                                                    <?php foreach ($q3 as $dx3) : ?>
                                                        <center><?= $dx3; ?></center>
                                                    <?php $no++;
                                                    endforeach; ?>
                                                    <br />
                                                </td>
                                                <td>
                                                    <?php foreach ($q4 as $dx4) : ?>
                                                        <center><?= $dx4; ?></center>
                                                    <?php $no++;
                                                    endforeach; ?>
                                                    <br />
                                                </td>
                                            </tr>
                                        </table>
                                    </center>
                                    <!-- end table -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div><!-- container -->

                <?php $this->load->view('part-admin/foot'); ?>
            </div>
        </div>
    </div>

    <?php $this->load->view('part-admin/script'); ?>
    <?php $this->load->view('part-admin/alert'); ?>

    <script>
        var pieLabels = <?php echo json_encode($labels); ?>;
        var pieData = <?php echo json_encode($data); ?>;
    </script>

    <script>
        var ctx = document.getElementById('csiCharts').getContext('2d');
        var csiCharts = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: pieLabels,
                datasets: [{
                    data: pieData,
                    backgroundColor: ['#FF6384', '#36A2EB'],
                }],
            },
        });
    </script>

</body>

</html>