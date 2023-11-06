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
                                    <h4 class="mt-0 header-title">Detail Kuesioner <u><?= $responden['nama']; ?></u></h4>
                                    <p class="text-muted mb-0 font-13">Selamat Datang <b><?= $profil['name']; ?></b>. </p>

                                    <div class="table-responsive pt-3">
                                    <h4 class="mt-3 header-title" style="color:red"><u>Pertanyaan Harapan</u></h4>
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Pertanyaan</th>
													<th>Jenis Pertanyaan</th>
													<th>Nilai</th>
												</tr>
											</thead>
											<tbody>
                                                <?php $no = 1; foreach($detail_responden_harapan as $d):?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $d['pertanyaan']; ?></td>
                                                    <td><?= $d['jenis_pertanyaan']; ?></td>
                                                    <td><?= $d['nilai_harapan']; ?></td>
                                                </tr>
                                                <?php endforeach;?>
											</tbody>
										</table>
                                	</div>

                                    <div class="table-responsive pt-3">
                                    <h4 class="mt-3 header-title" style="color:red"><u>Pertanyaan Persepsi</u></h4>
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Pertanyaan</th>
													<th>Jenis Pertanyaan</th>
													<th>Nilai</th>
												</tr>
											</thead>
											<tbody>
                                                <?php $num=1; foreach($detail_responden_persepsi as $p):?>
                                                <tr>
                                                    <td><?= $num++; ?></td>
                                                    <td><?= $p['pertanyaan']; ?></td>
                                                    <td><?= $p['jenis_pertanyaan']; ?></td>
                                                    <td><?= $p['nilai_persepsi']; ?></td>
                                                </tr>
                                                <?php endforeach;?>
											</tbody>
										</table>
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

    <?php $this->load->view('part-admin/script'); ?>
    <?php $this->load->view('part-admin/alert'); ?>


</body>

</html>