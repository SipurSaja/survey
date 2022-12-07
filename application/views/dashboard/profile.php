<div class="main-panel">
<div class="content-wrapper">
<?php 
                            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>','</h5></div>');
                
                if (isset($error_up)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>'.$error_up.'</h5></div>';
                };

                        echo form_open_multipart('dashboard/profile/'. $pengguna['id_user']); ?>

     <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Profile</h4>
                  <p class="card-description">
                  <div class="col-md-12">
                                    <div class="form-group">
                                <img src="<?= base_url('assets/foto_users/'. $pengguna['foto'])?>" id="gambar_load"
                                    class="img-fluid" width="100px" height="100px" >
                            </div>

                            <div class="row">
                    <div class="col-md-6">
                      <address>
                        <p class="font-weight-bold">Nama</p>
                        <p>
                        <?= $pengguna['nama'] ?>
                        </p>
                      </address>

                      <address>
                        <p class="font-weight-bold">NIP</p>
                        <p>
                        <?= $pengguna['nip'] ?>
                        </p>
                      </address>

                      <address>
                        <p class="font-weight-bold">Jabatan</p>
                        <p>
                        <?= $pengguna['jabatan'] ?>
                        </p>
                      </address>

                      <address>
                        <p class="font-weight-bold">Jenis Kelamin</p>
                        <p>
                        <?= $pengguna['jenis_kelamin'] ?>
                        </p>
                      </address>

                      <address>
                        <p class="font-weight-bold">Sekolah</p>
                        <p>
                        <?= $pengguna['nama_sekolah'] ?>
                        </p>
                      </address>
                      <address>
                        <p class="font-weight-bold">Kepala Sekolah</p>
                        <p>
                        <?= $pengguna['nama_kepala'] ?>
                        </p>
                      </address>

                    </div>
                    <div class="col-md-6">
                      <address class="text-primary">
                        <p class="font-weight-bold">
                          E-mail
                        </p>
                        <p class="mb-2">
                        <?= $pengguna['email'] ?>
                        </p>
                        </address>
                        <address class="text-primary">
                        <p class="font-weight-bold">
                          No Telp
                        </p>
                        <p>
                        <?= $pengguna['telp'] ?>
                        </p>
                        </address>
                        <address class="text-primary">
                        <p class="font-weight-bold">
                          Username
                        </p>
                        <p>
                        <?= $pengguna['username'] ?>
                        </p>
                      </address>
                    </div>
                  </div>
                      </div>
                  </p>
                  <div class="form-group text-right">  
                  <a href="<?= base_url('dashboard') ?>" class="btn btn-danger btn-md">Kembali</a>
                </div>
                </div>
              </div>
            </div>
        </div>
        </div>  