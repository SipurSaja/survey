<div class="main-panel">
        <div class="content-wrapper">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
            <div class="col-md-12">
                    <div class="card">        
                    <div class="card-body ">
                        <h3></h3>
                    <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="nama" value="<?= $pengguna['nama'] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">NIP</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="nip" value="<?= $pengguna['nip'] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">Kepala Sekolah</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="nama_kepala" name="id_kepala" value="<?= $pengguna['nama_kepala'] ?>" readonly>
                      </div>
                    </div>
                        <div class="card-body table-responsive">
                                <?php echo form_open_multipart('jawaban/jawab'); ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th><center>Quiz</center></th>
                                        <th><a><center>Sangat Baik</center></a></th>
                                        <th><a><center>Baik</center></a></th>
                                        <th><a><center>Cukup</center></a></th>
                                        <th><a><center>Kurang</center></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" name="id_kepala" value="<?= $pengguna['id_kepala']?>">
                                    <?php $i=1;
                                        foreach ($jawaban as $j => $value) { ?>
                                    <tr>
                                        <input type="hidden" name="id_quiz<?= $i ?>" value="<?= $value->id_quiz?>">
                                        <td><?= $i ?></td>
                                        <td><?= $value->quiz ?></td>
                                        <td><center><label><input type="radio" name="jawab<?= $i ?>" value="4" required></label></center></td>
                                        <td><center><label><input type="radio" name="jawab<?= $i ?>" value="3"required></label></center></td>
                                        <td><center><label><input type="radio" name="jawab<?= $i ?>" value="2"required></label></center></td>
                                        <td><center><label><input type="radio" name="jawab<?= $i ?>" value="1"required></label></center></td>
                                    </tr>
                                    <?php 
                                $i++;
                                } ?>
                                </tbody>
                            </table>
                            <br>
                            <div class="form-group text-right">
                                <input type="submit" class="btn btn-success btn-round"></input>
                            </div>
                        <?= 
                        form_close();
                        ?>
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