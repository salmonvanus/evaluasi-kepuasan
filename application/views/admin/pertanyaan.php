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
                                    <div class="float-right align-item-center mt-2">
                                        <div class="pull-right">
                                            <button type="button" data-toggle="modal" data-target="#tambahPertanyaan" class="btn btn-info px-4 align-self-center report-btn" aria-expanded="false">Tambah Pertanyaan<span class="m-l-5"></i></span></button>
                                        </div>
                                    </div>
                                    <h4 class="mt-0 header-title">Kuesioner</h4>
                                    <p class="text-muted mb-0 font-13">Selamat Datang <b><?= $profil['name']; ?></b>. </p>
                                    
                                    <h4 class="mt-5 header-title">Daftar Layanan</h4>
                                    <div class="accordion" id="accordionExample">
                                            <div class="card border mb-0 shadow-none">
                                                <?php $no = 1; ?>
                                                <?php foreach ($layanan as $d) : ?>
                                                <div class="card-header p-0" id="heading<?= $d['id']; ?>">
                                                    <h5 class="my-1">
                                                        <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapse<?= $d['id']; ?>" aria-expanded="false" aria-controls="collapse<?= $d['id']; ?>">
                                                        <?= $no++.". ". $d['layanan']; ?>
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapse<?= $d['id']; ?>" class="collapse" aria-labelledby="heading<?= $d['id']; ?>" data-parent="#accordionExample">
                                                    <!-- Card body Pertanyaan Harapan/Pelayanan -->
                                                        <div class="card-body">
                                                            <h5 class="header-title">Pertanyaan Harapan/Pelayanan</h5>
                                                            <div class="table-responsive-sm">
                                                                <table class="table table-sm mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">Pertanyaan</th>
                                                                            <th scope="col">Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php 
                                                                        $this->db->select('*');
                                                                        $this->db->where('id_layanan', $d['id']);
                                                                        $this->db->where('jenis_pertanyaan', 'Pertanyaan Harapan/Pelayanan');
                                                                        $this->db->from('data_pertanyaan');
                                                                        $result = $this->db->get()->result_array();
                                                                        ?>
                                                                        <?php $num =1; for ($i=0; $i <count($result) ; $i++) {  ?>
                                                                        <tr>
                                                                            <th scope="row"><?= $num++; ?></th>
                                                                            <td><?= $result[$i]['pertanyaan']; ?></td>
                                                                            <td>
                                                                                <td>
                                                                                    <center>
                                                                                        <button type="button" onclick="ubah_pertanyaan('<?php echo $result[$i]['id']; ?>')" class="btn btn-sm btn-primary tippy-btn" title="Edit" data-tippy-animation="scale" data-tippy-arrow="true"><i class="fas fa-edit"></i></button>
                                                                                        <!-- <button type="button" onclick="hapus_pertanyaan('<?php echo $result[$i]['id']; ?>')" class="btn btn-sm btn-danger tippy-btn" title="Hapus" data-tippy-animation="scale" data-tippy-arrow="true"><i class="fas fa-trash"></i> Hapus</button> -->
                                                                                    </center>
                                                                                </td>
                                                                            </td>
                                                                        </tr>
                                                                            <?php } ?>
                                                                    </tbody>
                                                                </table><!--end /table-->
                                                            </div><!--end /tableresponsive-->
                                                        </div>
                                                    <!-- End card body Pertanyaan Harapan/Pelayanan -->

                                                    <!-- Card Body Pertanyaan Persepsi/Layanan -->
                                                     <div class="card-body">
                                                        <h5 class="header-title">Pertanyaan Persepsi/Layanan</h5>
                                                        <div class="table-responsive-sm">
                                                            <table class="table table-sm mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Pertanyaan</th>
                                                                        <th scope="col">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                    $this->db->select('*');
                                                                    $this->db->where('id_layanan', $d['id']);
                                                                    $this->db->where('jenis_pertanyaan', 'Pertanyaan Persepsi/Layanan');
                                                                    $this->db->from('data_pertanyaan');
                                                                    $result = $this->db->get()->result_array();
                                                                    ?>
                                                                    <?php $num =1; for ($i=0; $i <count($result) ; $i++) {  ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $num++; ?></th>
                                                                        <td><?= $result[$i]['pertanyaan']; ?></td>
                                                                        <td>
                                                                            <td>
                                                                                <center>
                                                                                    <button type="button" onclick="ubah_pertanyaan('<?php echo $result[$i]['id']; ?>')" class="btn btn-sm btn-primary tippy-btn" title="Edit" data-tippy-animation="scale" data-tippy-arrow="true"><i class="fas fa-edit"></i></button>
                                                                                    <!-- <button type="button" onclick="hapus_pertanyaan('<?php echo $result[$i]['id']; ?>')" class="btn btn-sm btn-danger tippy-btn" title="Hapus" data-tippy-animation="scale" data-tippy-arrow="true"><i class="fas fa-trash"></i> Hapus</button> -->
                                                                                </center>
                                                                            </td>
                                                                        </td>
                                                                    </tr>
                                                                        <?php } ?>
                                                                </tbody>
                                                            </table><!--end /table-->
                                                        </div><!--end /tableresponsive-->
                                                    </div>
                                                    <!-- End card body Pertanyaan Persepsi/Layanan -->
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                    </div>
                                    
                                    
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

    <script>
            function ubah_pertanyaan(id) {
                //Ajax Load data from ajax

                console.log(id);
                $.ajax({
                    url: "<?php echo site_url('/admin/pertanyaan/get') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name=ed_id]').val(data.id);
                        $('[name=ed_jenis_pertanyaan]').val(data.jenis_pertanyaan);
                        $('[name=ed_pertanyaan]').val(data.pertanyaan);
                        $('#editPertanyaan').modal('show'); // show bootstrap modal when complete loaded
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }
    </script>

    <?php $this->load->view('part-admin/script'); ?>
    <?php $this->load->view('part-admin/alert'); ?>
    
    <!-- Modal Tambah -->
        <div class="modal fade" id="tambahPertanyaan" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <?php echo form_open_multipart('admin/pertanyaan/create'); ?>
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah pertanyaan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Layanan</label>
                            <select name="add_id_layanan" class="form-control" required>
                                <option value="" selected disabled>Pilih Layanan</option>
                                <?php foreach ($layanan as $d) : ?>
                                    <option value="<?= $d['id'] ?>"><?= $d['layanan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Jenis Pertanyaan</label>
                            <select name="add_jenis_pertanyaan" class="form-control" required>
                                <option value="" selected disabled>Pilih Jenis Pertanyaan</option>
                                <option value="Pertanyaan Harapan/Pelayanan">Pertanyaan Harapan/Pelayanan</option>
                                <option value="Pertanyaan Persepsi/Pelayanan">Pertanyaan Persepsi/Layanan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama pertanyaan</label>
                            <textarea name="add_pertanyaan" placeholder="Masukkan pertanyaan" cols="30" rows="5" class="form-control" autocomplete="off" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info waves-effect waves-light" type="submit"><span>Tambah</span><i class="fas fa-plus ml-3"></i></button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Tutup</span><i class="far fa-window-close ml-3"></i></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    <!-- End Modal Tambah -->

    <!-- Modal edit -->
    <div class="modal fade" id="editPertanyaan" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <?php echo form_open_multipart('admin/pertanyaan/edit'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Penyakit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Jenis Pertanyaan</label>
                        <input type="hidden" name="ed_id" class="form-control">
                        <select name="ed_jenis_pertanyaan" class="form-control" required>
                            <option selected disabled value="">Pilih Jenis Pertanyaan</option>
                            <option value="Pertanyaan Harapan/Pelayanan">Pertanyaan Harapan/Pelayanan</option>
                            <option value="Pertanyaan Persepsi/Layanan">Pertanyaan Persepsi/Layanan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Pertanyaan</label>
                        <textarea name="ed_pertanyaan" class="form-control" cols="30" rows="5" autocomplete="off" required></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-info waves-effect waves-light" type="submit"><span>Edit</span> <i class="fas fa-edit ml-3"></i></button>
                    <button class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Batal</span> <i class="far fa-window-close ml-3"></i></button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <!-- End Modal Edit -->
</body>

</html>