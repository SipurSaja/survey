<div class="main-panel">
        <div class="content-wrapper">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                


            <div class="col-12">
                    <div class="card">
                        <div class="card-body ">
                            <h3 class="card-title text-center">Sekolah</h3>
                                </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <form action="<?= base_url('dashboard/sekolahan')?>" method="get">
                                        <div class="input-group sm-2">
                                            <input type="text" class="form-control" placeholder="Search..."
                                                name="keyword" autocomplete="off">
                                            <div class="input-group-append">
                                                <input class="btn btn-sm btn-primary" type="submit" name="submit" value="Search">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                            <table class="table table-stripped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>sekolah</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th><center>
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah">
                                            <i class="ti-plus"></i>
                                            </button>
                            </center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sekolah as $s => $value) { ?>
                                    <tr>
                                        <td><?= ++$start ?></td>
                                        <td><?= $value['nama_sekolah'] ?></td>
                                        <td><?= $value['email_sekolah'] ?></td>
                                        <td><?= $value['alamat_sekolah'] ?></td>
                                        <td><center>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#edit<?= $value['id_sekolah'] ?>"><i class="ti-pencil-alt"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#hapus<?= $value['id_sekolah'] ?>"><i class="ti-trash"></i></button>
                                        </center></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="mb-2">
                                <?= $this->pagination->create_links();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('sekolah/add') ?>

                <div class="form-group">
                    <label>sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" placeholder="Masukkan Nama Sekolah" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email_sekolah" class="form-control" placeholder="Masukkan Email Sekolah" required>
                </div>
                <div class="form-group">
                    <label>sekolah</label>
                    <textarea name="alamat_sekolah" rows="5" cols="5" class="form-control" placeholder="Masukkan Alamat Sekolah"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($sekolah as $s => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_sekolah'] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('sekolah/edit/'. $value['id_sekolah']) ?>

                <div class="form-group">
                    <label>Nama sekolah</label>
                    <input type="text" name="nama_sekolah" value="<?= $value['nama_sekolah'] ?>" class="form-control"
                        placeholder="Enter Sekolah" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email_sekolah" value="<?= $value['email_sekolah'] ?>" class="form-control"
                        placeholder="Email Sekolah" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat_sekolah" rows="5" cols="5" class="form-control" placeholder="Masukkan Alamat Sekolah">
                    <?php echo $value['alamat_sekolah'];?></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?php } ?>

<!-- Modal Hapus -->
<?php foreach ($sekolah as $h => $value) { ?>
<div class="modal fade" id="hapus<?= $value['id_sekolah'] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Apakah Anda Yakin Ingin Menghapus sekolah Ini ?</h6>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_url('sekolah/delete/'. $value['id_sekolah']) ?>" class="btn btn-primary">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>