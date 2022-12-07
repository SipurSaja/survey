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
                            <h4 class="card-title">Edit Guru</h4>
                        </div>

                        <div class="card-body">
                            <?php 
                            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>','</h5></div>');
                
                if (isset($error_up)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>'.$error_up.'</h5></div>';
                };

                        echo form_open_multipart('guru/edit/'. $guru->id_guru) ?>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                        <label for="type">Sekolah</label>
                                        <select name="id_sekolah" class="form-control" id="type">
                                        <option value=""><?= $guru->nama_sekolah ?></option>
                                            <?php foreach ($sekolah as $s => $value) { ?>
                                            <option value="<?= $value->id_sekolah ?>"><?= $value->nama_sekolah ?></option>
                                            <?php } ?>
                                        </select>
                                            </div>
                                    <div class="form-group">
                                        <label for="squareInput">NIP</label>
                                        <input name="nip" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan nip" value="<?= $guru->nip ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">Nama</label>
                                        <input name="nama" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan nama lengkap" value="<?= $guru->nama ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">No telp</label>
                                        <input name="telp" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan no telp" value="<?= $guru->telp ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="squareInput">email</label>
                                        <input name="email" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan Email" value="<?= $guru->email ?>">
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="squareInput">Jabatan</label>
                                        <input name="jabatan" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan Jabatan" value="<?= $guru->jabatan ?>">
                                    </div> -->

                                    <div class="form-group">
                                        <label for="squareInput">Jenis kelamin</label>
                                            <p class="font-italic"><input type='radio' name='jenis_kelamin' value='Laki-laki' />Laki laki</p>
                                            <p class="font-italic"><input type='radio' name='jenis_kelamin'value='Perempuan' />Perempuan</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="foto" class="form-control" id="preview_foto" value="<?= $guru->foto ?>" >
                                    </div>  
                                    <div class="form-group">
                                <img src="<?= base_url('assets/foto_users/'. $guru->foto)?>" id="gambar_load"
                                    class="img-fluid" width="75px" height="75px" >
                            </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-md">Simpan</button>
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