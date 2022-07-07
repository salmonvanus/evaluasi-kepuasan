<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right align-item-center mt-2">
                        </div>
                        <h4 class="mt-0 header-title">Laporan Konsultasi</h4>
                        <p class="text-muted mb-4 font-13">Daftar laporan konsultasi pasien.</p>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="table-responsive">
                            <table class="table mb-0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <th>Nama Penyakit</th>
                                        <th>Hasil Analisa</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $this->db->select('nama_pasien');
                                    $this->db->select('id_pasien');
                                    $this->db->from('pasien_konsultasi');
                                    $this->db->order_by('tanggal_konsultasi', 'DESC');
                                    $query = $this->db->get()->result_array();

                                    $z = 1;
                                    for ($i = 0; $i < count($query); $i++) {

                                        $id_pasien = $query[$i]['id_pasien'];
                                        $this->db->select('hasil_analisa_pasien.id_pasien');
                                        $this->db->select('hasil_analisa_pasien.kepercayaan_cf');
                                        $this->db->select('penyakit.nama_penyakit');
                                        $this->db->select('pasien_konsultasi.nama_pasien');
                                        $this->db->from('hasil_analisa_pasien');
                                        $this->db->join('penyakit', 'penyakit.id_penyakit=hasil_analisa_pasien.id_penyakit');
                                        $this->db->join('pasien_konsultasi', 'pasien_konsultasi.id_pasien=hasil_analisa_pasien.id_pasien');
                                        $this->db->where('hasil_analisa_pasien.id_pasien', $id_pasien);
                                        $this->db->order_by('hasil_analisa_pasien.kepercayaan_cf', 'DESC');
                                        $data = $this->db->get()->result_array();
                                        // var_dump(array_unique($data));
                                        // var_dump($data);
                                        // echo count($data);
                                        echo "<tr>";
                                        echo "<td>"  . $query[$i]['nama_pasien'] . "</td>";
                                        echo "<td>";
                                        for ($z = 0; $z < count($data); $z++) {
                                            echo ($data[$z]['nama_penyakit']) . "<br/>";
                                        }
                                        echo "</td>";
                                        echo "<td>";
                                        for ($z = 0; $z < count($data); $z++) {
                                            echo $data[$z]['kepercayaan_cf'] . "<br/>";
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