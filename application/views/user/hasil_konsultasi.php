<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header bg-info text-white mt-0"><?= "BIODATA PASIEN"; ?></h5>
                    <div class="card-body">
                        <table class="table mb-0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <tr>
                                <td>Nama Pasien</td>
                                <td><?= $pasien['nama_pasien']; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td><?php if ($pasien['jenis_kelamin'] == 'P') {
                                        echo "Perempuan";
                                    } elseif ($pasien['jenis_kelamin'] == 'L') {
                                        echo "Laki-laki";
                                    } ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?= $pasien['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td>No Telp</td>
                                <td><?= $pasien['no_telp']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Konsultasi</td>
                                <td><?= $pasien['tanggal_konsultasi']; ?></td>
                            </tr>
                        </table>
                        <p class="card-text"></p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <h5 class="card-header bg-info text-white mt-0">RIWAYAT PERTANYAAN</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;
                                    for ($k = 0; $k < $count_gejala; $k++) {
                                        $this->db->select('cf_pakar');
                                        $this->db->select('nama_gejala');
                                        $this->db->from('gejala');
                                        $this->db->where('id_gejala', $id_gejala[$k]);
                                        $query = $this->db->get()->result_array();
                                        $cf_pakar = array_column($query, 'cf_pakar');
                                        $nama_gejala = array_column($query, 'nama_gejala');


                                        echo "<tr>";
                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . "Apakah saudara/i merasa " . $nama_gejala[0] . "  --  ";
                                        $option = $cf_user[$k];
                                        if ($option == 0) {
                                            echo " <b style = color:red> TIDAK DIJAWAB </b>";
                                        }
                                        if ($option == 0.2) {
                                            echo " <b style = color:#8A2BE2> TIDAK TAHU </b>";
                                        }
                                        if ($option == 0.4) {
                                            echo " <b style = color:#FFA500> MUNGKIN </b>";
                                        }
                                        if ($option == 0.6) {
                                            echo " <b style = color:#3CB371> KEMUNGKINAN BESAR </b>";
                                        }
                                        if ($option == 0.8) {
                                            echo " <b style = color:#008B8B> HAMPIR </b>";
                                        }
                                        if ($option == 1) {
                                            echo " <b style = color:#A52A2A> PASTI </b>";
                                        }
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <h5 class="card-header bg-info text-white mt-0">GEJALA TERPILIH</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Gejala</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;
                                    for ($row = 0; $row < $count_gejala; $row++) {
                                        if ($cf_user[$row] != 0) {
                                            $this->db->select('nama_gejala');
                                            $this->db->from('gejala');
                                            $this->db->where('id_gejala', $id_gejala[$row]);
                                            $query = $this->db->get()->result_array();
                                            $nama_gejala = array_column($query, 'nama_gejala');

                                            // Menghitung CF Combine
                                            echo "<tr>";
                                            echo "<td>" . $no++ . "</td>";
                                            echo "<td>" . $nama_gejala[0];
                                            echo "</tr>";
                                            // var_dump($data);
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <h5 class="card-header bg-info text-white mt-0">Hasil Analisa</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php
                            // if (count($cek_pasien) > 1) {
                            //     $this->db->where('id_pasien', $id_pasien);
                            //     $this->db->from('gejala_pasien');
                            //     $this->db->delete();
                            // }

                            // if (count($cek_hasil_pasien) > 1) {
                            //     $this->db->where('id_pasien', $id_pasien);
                            //     $this->db->from('hasil_analisa_pasien');
                            //     $this->db->delete();
                            // }

                            for ($i = 0; $i < count($id_gejala); $i++) {
                                if ($cf_user[$i] != 0) {
                                    $this->db->select('id_basis_pengetahuan');
                                    $this->db->select('id_penyakit');
                                    $this->db->select('id_gejala');
                                    $this->db->select('cf_pakar_basis_pengetahuan');
                                    $this->db->from('basis_pengetahuan');
                                    $this->db->where('id_gejala', $id_gejala[$i]);
                                    $q = $this->db->get()->result_array();

                                    $cf_pakar = array_column($q, 'cf_pakar_basis_pengetahuan');

                                    foreach ($q as $key) {
                                        $cf_gejala[$i] = $cf_pakar[0] * $cf_user[$i];
                                        $data['id_pasien']      = $id_pasien;
                                        $data['id_gejala']      = $id_gejala[$i];
                                        $data['id_penyakit']    = $key['id_penyakit'];
                                        $data['cf_pakar']       = $cf_pakar[0];
                                        $data['cf_user']        = $cf_user[$i];
                                        $data['cf_gejala']      = $cf_gejala[$i];

                                        $insert = $this->db->insert('gejala_pasien', $data);
                                    }
                                }
                            }

                            $this->db->select('*');
                            $this->db->from('gejala_pasien');
                            $this->db->where('gejala_pasien.id_pasien', $id_pasien);
                            $show_gp = $this->db->get()->result_array();

                            $id_penyakit    = array_column($show_gp, 'id_penyakit');

                            // var_dump($id_penyakit);
                            $total_penyakit    = $this->db->get('penyakit')->result_array();

                            // var_dump($id_penyakit[$l]);
                            for ($l = 0; $l < count($total_penyakit); $l++) {
                                // var_dump($id_penyakit[$l]);
                                $this->db->select('*');
                                $this->db->from('gejala_pasien');
                                $this->db->where('gejala_pasien.id_penyakit', $id_penyakit[$l]);
                                $this->db->where('gejala_pasien.id_pasien', $id_pasien);
                                $result = $this->db->get()->result_array();
                                // var_dump($result);

                                $cf_gejala      = array_column($result, 'cf_gejala');
                                $nama_penyakit  = array_column($result, 'nama_penyakit');

                                $cf_1_2 = $cf_gejala[0] + $cf_gejala[1] * (1 - $cf_gejala[0]);
                                // var_dump($cf_1_2);

                                $g = 2;
                                $cf_old[$g] = $cf_1_2;

                                for ($v = 2; $v < count($result); $v++) {

                                    $cf_old[$g] = $cf_old[$g] + $cf_gejala[$v] * (1 - $cf_old[$g]);


                                    if ($v == (count($result) - 1)) {
                                        $datax['id_pasien']     = $id_pasien;
                                        $datax['id_penyakit']   = $id_penyakit[$l];
                                        $datax['hasil_analisa'] = $cf_old[$g];
                                        $hasil = $cf_old[$g] * 100;
                                        $hasil_analisa = round($hasil, 4);
                                        $datax['kepercayaan_cf'] = $hasil_analisa;
                                        // var_dump($datax);
                                        $insert_data = $this->db->insert('hasil_analisa_pasien', $datax);
                                    }
                                }
                            }
                            ?>
                            <table class="table mb-0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penyakit</th>
                                        <th>Kepercayaan CF</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $this->db->select('*');
                                    $this->db->from('hasil_analisa_pasien');
                                    $this->db->order_by('hasil_analisa_pasien.kepercayaan_cf', 'DESC');
                                    $this->db->join('penyakit', 'penyakit.id_penyakit = hasil_analisa_pasien.id_penyakit');
                                    $this->db->where('hasil_analisa_pasien.id_pasien', $id_pasien);
                                    $show_hasil_analisa = $this->db->get()->result_array();

                                    $norut = 1;
                                    foreach ($show_hasil_analisa as $baris) {
                                        echo "<tr>";
                                        echo "<td>" . $norut++ . "</td>";
                                        echo "<td>" . $baris['nama_penyakit'];
                                        echo "<td>" . round($baris['kepercayaan_cf'], 2) . " %";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <h5 class="card-header bg-info text-white mt-0">Penyakit Yang Dialami Pasien</h5>
                    <div class="card-body">
                        <?php
                        $this->db->select('*');
                        $this->db->from('hasil_analisa_pasien');
                        $this->db->order_by('hasil_analisa_pasien.kepercayaan_cf', 'DESC');
                        $this->db->join('penyakit', 'penyakit.id_penyakit = hasil_analisa_pasien.id_penyakit');
                        $this->db->where('hasil_analisa_pasien.id_pasien', $id_pasien);
                        $show_hasil_analisa = $this->db->get()->result_array();

                        $f = array_column($show_hasil_analisa, 'kepercayaan_cf');
                        $t = array_count_values($f);
                        $u = (max($t));
                        // print_r(($u));

                        for ($z = 0; $z < $u; $z++) {
                            $this->db->select('*');
                            $this->db->from('hasil_analisa_pasien');
                            $this->db->order_by('hasil_analisa_pasien.kepercayaan_cf', 'DESC');
                            $this->db->join('penyakit', 'penyakit.id_penyakit = hasil_analisa_pasien.id_penyakit');
                            $this->db->where('hasil_analisa_pasien.id_pasien', $id_pasien);
                            $this->db->where('hasil_analisa_pasien.kepercayaan_cf', $f[$z]);
                            $s_data = $this->db->get()->result_array();
                            // var_dump($s_data);

                            if ($u > 1) {
                                echo '<h4 style="color:red">' . "<b>" . $s_data[$z]['nama_penyakit'] . "</b>" . "</h4>";
                                // echo "<br/>";
                            } else {
                                echo '<h4 style="color:red">' . "<b>" . $s_data[$z]['nama_penyakit'] . "</b>" . "</h4>";
                            }
                        }
                        ?>
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