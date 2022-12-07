<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Halo <?= $pengguna['nama']?>!</h3>
                  <h6 class="font-weight-normal mb-0">Selamat datang di aplikasi <span class="text-primary">Survei Kinerja Kepala Sekolah</span>.</h6>
                </div>
                </div>
                </div>
                </div>
        <div class="row">
            <div class="col-12">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h3><?= $pengguna['nama_sekolah']?></h3>
                        <div class="d-flex flex-wrap">
                        <div class="mr-5 mt-3">
                        <p class="text-muted">Jumlah Soal</p>
                        <h3 class="text-primary fs-30 font-weight-medium"><?= $sumquiz?></h3>
                        </div>
                        <div class="mr-5 mt-3">
                        <p class="text-muted">Kategori Soal</p>
                        <h3 class="text-primary fs-30 font-weight-medium"><?= $sumjudul?></h3>
                        </div>
                        <div class="mr-5 mt-3">
                        <p class="text-muted">Responden</p>
                        <h3 class="text-primary fs-30 font-weight-medium"><?= $sumjawab?></h3>
                        </div>
                        <div class="mr-5 mt-3">
                        <p class="text-muted">Quiz terjawab olehmu</p>
                        <h3 class="text-primary fs-30 font-weight-medium"><?=$sumjawabanmu?></h3>
                        </div>
                        <?php
                            foreach($jawaban->result_array() as $row):
                                $nama_quiz = $row['nama_quiz'];
                                $total = $row['total'];
                                ?>
                                <div class="mr-5 mt-3">
                        <p class="text-muted">Nilai <?=$nama_quiz?></p>
                        <h3 class="text-primary fs-30 font-weight-medium"><?=$total?></h3>
                    </div>
                        <?php endforeach; ?>
                    </div>
                    
                    </div>
                    <?php if($this->session->userdata('id_group')=='8'){ ?>
                    <div class="card-body table-responsive">
                        <table class="table table-head-bg-success table-stripped table-hover">
                            <thead>
                                <tr>
                                    <!-- <th></th> -->
                                    <th><center>Judul Quiz</center></th>
                                    <th><center>Tanggal Rilis</center></th>
                                    <th><center>Aksi</center></th>
                                    <!-- <th>
                                        <center>Status</center>
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                        foreach ($histori as $s => $value) { ?>
                                <tr>
                                    <!-- <td><?= $no++ ?></td> -->
                                    <td><center><?= $value->nama_quiz ?></center></td>
                                    <td><center><?= $value->tanggal ?></center></td>
                                    <!-- <td>
                                        <center>
                                            <?php 
                                                if($value->action == 0)
                                                {
                                                    ?>
                                            <span class="badge badge-warning">Null</span>
                                            <?php
                                                }
                                                else
                                                {
                                                   echo $value->action == 1 ? '<span class="badge badge-success">Success</span>' : '<span class="badge badge-danger">Pending</span>';
                                                }
                                            ?>
                                        </center>
                                    </td> -->
                                    <td>
                                        <center>
                                            <a href="<?= base_url('dashboard/get_quiz/'. $value->id_histori) ?>"
                                                type="button" class="btn btn-sm btn-success">Mulai</a>
                                        </center>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php }; ?>
                </div>
            </div>
            </div>

            </div>
