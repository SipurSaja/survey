<div class="main-panel">
        <div class="content-wrapper">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

            <div class="col-md-12">
                    <div class="card">
                        <div class="card-body  text-center">
                            <h4 class="card-title">Quiz</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <form action="<?= base_url('dashboard/quiz')?>" method="get">
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
                        </div>

                        <div class="card-body table-responsive">
                            <table class="table table-head-bg-success table-stripped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Quiz</th>
                                        <th scope="col"><center><a href="<?= base_url('quiz/add')?>" type="button" class="btn btn-sm btn-success"><i class="ti-plus"></i></a></center></th>
                                    </tr>
                                </thead>
                                <?php if (empty($quiz)) { ?>
                                    <tr>
                                <td colspan="6" class="text-center">--No Data--</td>
                                </tr>
                                <?php }?>
                                <tbody>
                                    <?php foreach($quiz as $q => $value) { ?>
                                    <tr>
                                        <td><?= ++$start ?></td>
                                        <td><?= $value["quiz"] ?></td>
                                        <td><center>
                                            <a href="<?= base_url('quiz/edit/'. $value["id_quiz"])?>" type="button" class="btn btn-sm btn-warning"><i class="ti-pencil-alt"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#hapus<?= $value["id_quiz"] ?>"><i class="ti-trash"></i></button>
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
<?php foreach ($quiz as $q => $value) { ?>
<div class="modal fade" id="hapus<?= $value["id_quiz"]?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Apakah Anda Yakin Ingin Menghapus Pertanyaan "<?= $value["quiz"] ?>" ?</h6>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_url('quiz/delete/'. $value["id_quiz"]) ?>" class="btn btn-primary">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>
        </div>
    </div>
</div>