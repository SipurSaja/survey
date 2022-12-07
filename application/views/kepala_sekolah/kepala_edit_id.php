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
                        <div class="card-body ">
                            <h4 class="card-title">Edit Status Kepala Sekolah</h4>
                        </div>

                        <div class="card-body">
                            <?php 
                            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>','</h5></div>');
                
                if (isset($error_up)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>'.$error_up.'</h5></div>';
                };

                        echo form_open_multipart('kepala_sekolah/edit_id/'. $kepala_sekolah->id_kepala) ?>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="<?= $kepala_sekolah->nama_kepala ?>" readonly/>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Sekolah</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="<?= $kepala_sekolah->nama_sekolah ?>" readonly/>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">NIP</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="<?= $kepala_sekolah->nip ?>" readonly/>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jabatan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="<?php echo $kepala_sekolah->periode_awal;?> Sampai <?php echo $kepala_sekolah->periode_akhir;?>" readonly/>
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                <select name="id_status" class="form-control" id="id_status">
                                                <?php foreach ($status as $s => $value) { ?>
                                                    <option value="<?= $value->id_status ?>"><?= $value->jenis_status ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                        <a href="<?= base_url('dashboard/kepala_sekolah_id') ?>" class="btn btn-danger btn-md">Kembali</a>
                                            <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
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