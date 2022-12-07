<div class="main-panel">
<div class="content-wrapper">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title"></h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title">Update Transaksi</h4>
                        </div>


                        <div class="card-body">
                            <?php 
                            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>','</h5></div>');
                
                if (isset($error_up)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>'.$error_up.'</h5></div>';
                };

                        echo form_open_multipart('transaksi/edit/'. $transaksi->id_transaksi) ?>
                         <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type">Pilih Sekolah</label>
                                        <select name="id_sekolah" class="form-control" id="type">
                                            <option value=""><?= $transaksi->nama_sekolah ?></option>
                                            <?php foreach ($sekolah as $s => $value) { ?>
                                            <option value="<?= $value->id_sekolah ?>"><?= $value->nama_sekolah ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type">Judul transaksi</label>
                                        <select name="id_histori" class="form-control" id="type">
                                            <option value=""><?= $transaksi->nama_sekolah ?></option>
                                            <?php foreach ($histori as $h => $value) { ?>
                                            <option value="<?= $value->id_histori ?>"><?= $value->nama_quiz ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                                <a href="<?= base_url('dashboard/transaksi') ?>" class="btn btn-danger btn-md">Kembali</a>
                            </div>
                            <?= form_close() ?>
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