<div class="main-panel">
<div class="content-wrapper">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center ">
                            <h4 class="card-title">Data sekolah</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <form action="<?= base_url('dashboard/documentsid')?>" method="get">
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
                                        <th scope="col">data</th>
                                        <th scope="col">File</th>
                                        <th scope="col"><center><button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah">
                                        <i class="ti-plus"></i>
                                        </button></center></th>
                                    </tr>
                                </thead>
                                <?php if (empty($documentsid)) { ?>
                            <tr>
                                <td colspan="6" class="text-center">--No Data--</td>
                            </tr>
                            <?php }?>
                                <tbody>
                                    <?php $no=1;
                                        foreach ($documentsid as $d) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $d['nama_file'] ?></td>
                                        <td><?= $d['file'] ?></td>
                                        <td><center>
                                        <a href="<?= base_url('documents/download/' . $d['id_file'] )?>"
                                        class="btn btn-sm btn-info"><i class="ti-download"></i></a>
                                        <!-- <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#edit<?= $d['id_file'] ?>"><i class="ti-pencil-alt"></i></button> -->
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#hapus<?= $d['id_file'] ?>"><i class="ti-trash"></i></button>
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
            <form action="<?= base_url('documents/add_id')?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <input type="hidden" name="id_kepala" value="<?= $pengguna['id_kepala']?>">
                <div class="form-group">
                    <label>Nama data</label>
                    <input type="text" name="nama_file" class="form-control" placeholder="Enter judul data" required>
                </div>
                <div class="form-group">
                    <label>file</label>
                    <input type="file" name="file" class="form-control" id="preview_file" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($documentsid as $d => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_file'] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('documents/edit_id/'. $value['id_file']) ?>

                <div class="form-group">
                    <label>Judul data</label>
                    <input type="text" name="nama_file" value="<?= $value['nama_file'] ?>" class="form-control"
                        placeholder="Enter judul data" required>
                </div>
                <div class="form-group">
                    <label>File</label>
                    <input type="file" name="file" value="<?= $value['file'] ?>" class="form-control"
                        placeholder="file">
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
<?php foreach ($documentsid as $d => $value) { ?>
<div class="modal fade" id="hapus<?= $value['id_file'] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Apakah Anda Yakin Ingin Menghapus <?= $value['file'] ?> Ini ?</h6>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_url('documents/delete_id/'. $value['id_file']) ?>" class="btn btn-primary">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php } ?> 
</div>
</div>
