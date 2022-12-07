<div class="main-panel">
<div class="content-wrapper">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">Judul Quiz</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <form action="<?= base_url('dashboard/histori')?>" method="get">
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
                            <table class="table table-head-bg-success table-stripped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Date</th>
                                        <th scope="col"><center><button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah">
                                        <i class="ti-plus"></i>
                                        </button></center></th>
                                    </tr>
                                </thead>
                                <?php if (empty($histori)) { ?>
                                    <tr>
                                <td colspan="6" class="text-center">--No Data--</td>
                                </tr>
                                <?php }?>
                                <tbody>
                                    <?php
                                        foreach ($histori as $h => $value) { ?>
                                    <tr>
                                        <td><?= ++$start ?></td>
                                        <td><?= $value["nama_quiz"] ?></td>
                                        <td><?= $value["tanggal"] ?></td>
                                        <td><center>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#edit<?= $value["id_histori"] ?>"><i class="ti-pencil-alt"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#hapus<?= $value["id_histori"] ?>"><i class="ti-trash"></i></button>
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
                <?php echo form_open('histori/add') ?>

                <div class="form-group">
                    <label>histori</label>
                    <input type="text" name="nama_quiz" class="form-control" placeholder="Enter Quiz" required>
                </div>
                <div class="form-group">
                    <label>histori</label>
                    <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required>
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
<?php foreach ($histori as $h => $value) { ?>
<div class="modal fade" id="edit<?= $value["id_histori"] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Judul Quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('histori/edit/'. $value["id_histori"]) ?>

                <div class="form-group">
                    <label>Nama histori</label>
                    <input type="text" name="nama_quiz" value="<?= $value['nama_quiz'] ?>" class="form-control"
                        placeholder="Enter histori" required>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" value="<?= $value['tanggal'] ?>" class="form-control"
                        placeholder="Tanggal" required>
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
<?php foreach ($histori as $h => $value) { ?>
<div class="modal fade" id="hapus<?= $value["id_histori"] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Judul Quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Apakah Anda Yakin Ingin Menghapus <?= $value['nama_quiz']?> Ini ?</h6>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_url('histori/delete/'. $value["id_histori"]) ?>" class="btn btn-primary">Delete</a>
            </div>
        </div>
    </div>
</div>       
<?php } ?>

            </div>
        </div>
    </div>
</div>