<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right align-item-center mt-2">
                            <!-- <div class="pull-right">
                                <button type="button" data-toggle="modal" data-target="#tambahPenyakit" class="btn btn-info px-4 align-self-center report-btn" aria-expanded="false">Tambah Penyakit<span class="m-l-5"></i></span></button>
                            </div> -->
                        </div>
                        <h4 class="mt-0 header-title">Aturan</h4>
                        <p class="text-muted mb-4 font-13">Daftar aturan metode Foward Chaining.</p>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="table-responsive">
                            <table class="table mb-0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Aturan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $total_penyakit    = $this->Data_penyakit->total_penyakit();

                                    $this->db->select('id_penyakit');
                                    $ambil_id_penyakit = $this->db->get('penyakit')->result_array();
                                    $id_penyakit = array_column($ambil_id_penyakit, 'id_penyakit');

                                    $i = 0;
                                    $z = 1;
                                    while ($i < $total_penyakit) {
                                        //ambil gejala berdasarkan basis pengetahuan
                                        $this->db->select('gejala.nama_gejala');
                                        $this->db->select('penyakit.nama_penyakit');
                                        $this->db->from('basis_pengetahuan');
                                        $this->db->join('penyakit', 'penyakit.id_penyakit = basis_pengetahuan.id_penyakit');
                                        $this->db->join('gejala', 'gejala.id_gejala = basis_pengetahuan.id_gejala');
                                        $this->db->where('basis_pengetahuan.id_penyakit', $id_penyakit[$i]);
                                        $query = $this->db->get()->result_array();
                                        $nama_gejala = array_column($query, 'nama_gejala');

                                        // Tampilkan Aturan
                                        echo "<tr>";
                                        echo "<td>" . "Aturan ke " . $z++ . "</td>";
                                        echo "<td>" . "<b>" . "JIKA " . "</b>" . $nama_gejala[0] . "<br/>";
                                        for ($j = 1; $j < count($nama_gejala); $j++) {
                                            echo "<b>" . "DAN: " . "</b>" . $nama_gejala[$j] . " <br/>";
                                        }
                                        //ambil nama penyakit
                                        $this->db->select('penyakit.nama_penyakit');
                                        $this->db->from('penyakit');
                                        $this->db->join('basis_pengetahuan', 'penyakit.id_penyakit = basis_pengetahuan.id_penyakit');
                                        $this->db->group_by('penyakit.nama_penyakit');
                                        $this->db->where('basis_pengetahuan.id_penyakit', $id_penyakit[$i]);
                                        $query_penyakit = $this->db->get()->result_array();
                                        $nama_penyakit = array_column($query_penyakit, 'nama_penyakit');
                                        for ($k = 0; $k < count($nama_penyakit); $k++) {
                                            echo "<b>" . "MAKA: " . "</b>" . $nama_penyakit[$k] . " <br/>";
                                        }
                                        echo "</tr>";
                                        // End Tampilkan Aturan

                                        $i++;
                                    } ?>
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