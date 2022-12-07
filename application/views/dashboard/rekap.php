<div class="main-panel">
<div class="content-wrapper">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">Rekapitulasi Quisioner</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-head-bg-success table-stripped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col"><center>No</center></th>
                                        <th scope="col"> <center>Kepala Sekolah</center></th>
                                        <th scope="col"><center>Sekolah</center></th>
                                        <th scope="col"><center>Judul Quiz</center></th>
                                        <th scope="col"><center>Jumlah Quiz</center></th>
                                        <th scope="col"><center>Responden</center></th>
                                        <th scope="col"><center>Hasil</center></th>
                                    </tr>
                                </thead>
                                <?php if (empty($rekap)) { ?>
                                    <tr>
                                <td colspan="6" class="text-center">--No Data--</td>
                                </tr>
                                <?php }?>
                                <tbody>
                                <?php $no = 1;
                                    foreach($rekap->result_array() as $row):
                                        $nama_kepala = $row['nama_kepala'];
                                        $nama_sekolah = $row['nama_sekolah'];
                                        $nama_quiz = $row['nama_quiz'];
                                        $totalquiz = $row['totalquiz'];
                                        $respon = $row['respon'];
                                        $total = $row['total'];
                                        ?>
                                        <td><?= $no++ ?></td>
                                        <td> <center><?= $nama_kepala ?></center></td>
                                        <td><center><?= $nama_sekolah ?></center></td>
                                        <td><center><?= $nama_quiz ?></center></td>
                                        <td><center><?= $totalquiz ?></center></td>
                                        <td><center><?= $respon ?></center></td>
                                       <td><center><?= $total ?></center></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
             
            </div>
        </div>
    </div>
</div>