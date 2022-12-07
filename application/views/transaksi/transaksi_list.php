<div class="main-panel">
<div class="content-wrapper">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                


            <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">Transaksi</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <form action="<?= base_url('dashboard/transaksi')?>" method="get">
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
                                        <th scope="col">Sekolah</th>
                                        <th scope="col">Kepala Sekolah</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Hasil</th>
                                        <th scope="col"><center>
                                        <a href="<?= base_url('transaksi/add')?>" type="button" class="btn btn-sm btn-success">
                                        <i class="ti-plus"></i>
                                    </a>
                                        </center></th>
                                    </tr>
                                </thead>
                                <?php if (empty($transaksi)) { ?>
                                    <tr>
                                <td colspan="6" class="text-center">--No Data--</td>
                                </tr>
                                <?php }?>
                                <tbody>
                                    <?php
                                        foreach ($transaksi as $t => $value) { ?>
                                    <tr>
                                        <td><?= ++$start ?></td>
                                        <td><?= $value["nama_sekolah"] ?></td>
                                        <td><?= $value["nama_kepala"] ?></td>
                                        <td><?= $value["nama_quiz"] ?></td>
                                        <td><?= $value["hasil"] ?></td>
                                        <td><center>
                                            <a href="<?= base_url('transaksi/edit/'. $value["id_transaksi"])?>" type="button" class="btn btn-sm btn-warning"><i class="ti-pencil-alt"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#hapus<?= $value["id_transaksi"] ?>"><i class="ti-trash"></i></button>
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
 
<!-- Modal Hapus -->
<?php foreach ($transaksi as $t => $value) { ?>
<div class="modal fade" id="hapus<?= $value["id_transaksi"] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Apakah Anda Yakin Ingin Menghapus <?= $value["nama_quiz"]?> di <?= $value["nama_sekolah"]?> ?</h6>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_url('transaksi/delete/'. $value["id_transaksi"]) ?>" class="btn btn-primary">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>





            
            </div>
        </div>
    </div>
</div>