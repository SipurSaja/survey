<div class="main-panel">
<div class="content-wrapper">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                


            <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">Kepala Sekolah</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <form action="<?= base_url('dashboard/kepala_sekolah')?>" method="get">
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
                                        <th scope="col">Foto</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col"><center>Periode</center></th>
                                        <th scope="col">Sekolah</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"><center><a href="<?= base_url('kepala_sekolah/add')?>" type="button" class="btn btn-sm btn-success">
                                        <i class="ti-plus"></i>
                                    </a>
                                </center></th>
                                    </tr>
                                </thead>
                                <?php if (empty($kepala_sekolah)) { ?>
                                    <tr>
                                <td colspan="6" class="text-center">--No Data--</td>
                                </tr>
                                <?php }?>
                                <tbody>
                                    <?php
                                        foreach ($kepala_sekolah as $k => $value) { ?>
                                    <tr>
                                        <td><?= ++$start ?></td>
                                        <td><img src="<?= base_url('assets/foto_users/'. $value["foto"])?>"
                                                class="img-fluid elevation-2" width="70px" height="70px">
                                        </td>
                                        <td><?= $value["nip"] ?></td>
                                        <td><?= $value["nama_kepala"] ?></td>
                                        <td><center><?= $value["periode_awal"] ?> sampai <?= $value["periode_akhir"] ?></center></td>
                                       <td><?= $value["nama_sekolah"] ?></td>
                                       <td> <center>
                                       <?php 
                                                if($value["id_status"] == 0)
                                                {
                                                    ?>
                                            <span class="badge badge-warning">Tidak diketahui</span>
                                            <?php
                                                }
                                                else
                                                {
                                                   echo $value["id_status"] == 1 ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Non aktif</span>';
                                                }
                                            ?>
                                       </center>
                                       </td>
                                        <td><center>
                                            <a href="<?= base_url('kepala_sekolah/edit/'. $value["id_kepala"])?>" type="button" class="btn btn-sm btn-warning"><i class="ti-pencil-alt"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#hapus<?= $value["id_kepala"] ?>"><i class="ti-trash"></i></button>
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
<?php foreach ($kepala_sekolah as $k => $value) { ?>
<div class="modal fade" id="hapus<?= $value["id_kepala"] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete kepala sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Apakah Anda Yakin Ingin Menghapus <?= $value["nama_kepala"] ?> Ini ?</h6>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_url('kepala_sekolah/delete/'. $value["id_kepala"]) ?>" class="btn btn-primary">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>





            
            </div>
        </div>
    </div>
</div>