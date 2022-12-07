<div class="main-panel">
        <div class="content-wrapper">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                


<!-- <div class="main-panel"> -->
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title"></h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">Profile Guru</h4>
                        </div>

                        <div class="card-body">
                            <?php 
                            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>','</h5></div>');
                
                if (isset($error_up)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>'.$error_up.'</h5></div>';
                };

                        echo form_open_multipart('guru/detail/'. $guru->id_guru) ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                <img src="<?= base_url('assets/foto_users/'. $guru->foto)?>" id="gambar_load"
                                    class="img-fluid" width="100px" height="100px" >
                            </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sekolah</label>
                                    <div class="col-sm-10">
                                        <div class="form-control-static">: <?= $guru->nama_sekolah ?>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <div class="form-control-static">: <?= $guru->nama ?>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIP</label>
                                    <div class="col-sm-10">
                                        <div class="form-control-static">: <?= $guru->nip ?>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No Telp</label>
                                    <div class="col-sm-10">
                                        <div class="form-control-static">: <?= $guru->telp ?>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <div class="form-control-static">: <?= $guru->email ?>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <div class="form-control-static">: <?= $guru->jenis_kelamin ?>
                                        </div>
                                    </div>
                            </div>                           
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jabatan</label>
                                    <div class="col-sm-10">
                                        <div class="form-control-static">: <?= $guru->jabatan ?>
                                        </div>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                <a href="<?= base_url('dashboard/guru') ?>" class="btn btn-danger btn-md">Kembali</a>
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