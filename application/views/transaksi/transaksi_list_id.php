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
                                    <form action="<?= base_url('dashboard/transaksiid')?>" method="get">
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
                                        <!-- <th scope="col"><center>
                                        <a href="<?= base_url('transaksi/add')?>" type="button" class="btn btn-sm btn-success">
                                        <i class="ti-plus"></i>
                                    </a>
                                        </center></th> -->
                                    </tr>
                                </thead>
                                <?php if (empty($transaksiid)) { ?>
                                    <tr>
                                <td colspan="6" class="text-center">--No Data--</td>
                                </tr>
                                <?php }?>
                                <tbody>
                                    <?php
                                        foreach ($transaksiid as $t => $value) { ?>
                                    <tr>
                                        <td><?= ++$start ?></td>
                                        <td><?= $value["nama_sekolah"] ?></td>
                                        <td><?= $value["nama_kepala"] ?></td>
                                        <td><?= $value["nama_quiz"] ?></td>
                                        <td><?= $value["hasil"] ?></td>
                                        <!-- <td><center>
                                            <a href="<?= base_url('transaksi/edit/'. $value["id_transaksi"])?>" type="button" class="btn btn-sm btn-warning"><i class="ti-pencil-alt"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#hapus<?= $value["id_transaksi"] ?>"><i class="ti-trash"></i></button>
                                        </center></td>
                                    </tr> -->
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
            
            </div>
        </div>
    </div>
</div>