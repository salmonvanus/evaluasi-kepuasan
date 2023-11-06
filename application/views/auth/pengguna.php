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
                                    <h4 class="mt-0 header-title">Pengguna</h4>
                                    <p class="text-muted mb-0 font-13">Selamat Datang <b><?= $profil['name']; ?></b>. </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pengguna</th>
                                                <th>
                                                    <center>Aksi</center>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($pengguna as $row) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['name']; ?></td>
                                                    <td>
                                                        <center>
                                                            <button type="button" onclick="ubah_penyakit('<?php echo $row['id']; ?>')" class="btn btn-sm btn-primary tippy-btn" title="Edit" data-tippy-animation="scale" data-tippy-arrow="true"><i class="fas fa-edit"></i> Edit</button>
                                                            <!-- <button type="button" onclick="hapus_penyakit('<?php echo $row['id']; ?>')" class="btn btn-sm btn-danger tippy-btn" title="Hapus" data-tippy-animation="scale" data-tippy-arrow="true"><i class="fas fa-trash"></i> Hapus</button> -->
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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

    <?php $this->load->view('part-admin/script'); ?>
    <?php $this->load->view('part-admin/alert'); ?>


</body>

</html>