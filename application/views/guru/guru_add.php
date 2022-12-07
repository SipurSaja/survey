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
                            <h4 class="card-title">Tambah Guru</h4>
                        </div>

                        <div class="card-body">
                            <?php 
                            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>','</h5></div>');
                
                if (isset($error_up)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>'.$error_up.'</h5></div>';
                };

                        echo form_open_multipart('guru/add') ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type">Sekolah</label>
                                        <select name="id_sekolah" class="form-control" id="type">
                                            <option value="">--Pilih Sekolah--</option>
                                            <?php foreach ($sekolah as $s => $value) { ?>
                                            <option value="<?= $value->id_sekolah ?>"><?= $value->nama_sekolah ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="squareInput">NIP</label>
                                        <input name="nip" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan nip" value="<?= set_value('nip')  ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">Nama</label>
                                        <input name="nama" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan nama lengkap" value="<?= set_value('nama')  ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">No telp</label>
                                        <input name="telp" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan no telp" value="<?= set_value('telp')  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="squareInput">email</label>
                                        <input name="email" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan Email" value="<?= set_value('email')  ?>">
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="squareInput">Jabatan</label>
                                        <input name="jabatan" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan Jabatan" value="<?= set_value('jabatan')  ?>">
                                    </div> -->

                                    <div class="form-group">
                                        <label for="squareInput">Jenis kelamin</label>

                                        <p><input type='radio' name='jenis_kelamin' value='Laki-laki' />Laki laki</p>
                                         <p><input type='radio' name='jenis_kelamin'value='Perempuan' />Perempuan</p>

                                    </div> 
                                        <!-- <input name="jenis_kelamin" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan Jenis kelamin" value="<?= set_value('jenis_kelamin')  ?>">
                                    </div> -->

                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="foto" class="form-control" id="preview_foto" required>
                                    </div>  
                                    <div class="form-group">
                                        <img src="" id="foto_load" class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                                <!-- <a href="<?= base_url('dashboard/guru') ?>" class="btn btn-danger btn-md">Kembali</a> -->
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
