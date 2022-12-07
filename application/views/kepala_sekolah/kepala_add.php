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
                            <h4 class="card-title">Tambah Kepala Sekolah</h4>
                        </div>

                        <div class="card-body">
                            <?php 
                            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>','</h5></div>');
                
                if (isset($error_up)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>'.$error_up.'</h5></div>';
                };

                        echo form_open_multipart('kepala_sekolah/add') ?>
                            <div class="row">
                                <div class="col-md-12">

                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="type">Nama Sekolah</label>
                                                <select name="id_sekolah" class="form-control" id="type">
                                                    <option value="">Pilih Sekolah</option>
                                                    <?php foreach ($sekolah as $s => $value) { ?>
                                                    <option value="<?= $value->id_sekolah ?>"><?= $value->nama_sekolah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="squareInput">NIP</label>
                                        <input name="nip" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan nip" value="<?= set_value('nip')  ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">Nama</label>
                                        <input name="nama_kepala" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan nama lengkap" value="<?= set_value('nama_kepala')  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="squareInput">Periode Mulai</label>
                                        <input name="periode_awal" type="date" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan Periode awal" value="<?= set_value('periode_awal')  ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="squareInput">Hingga</label>
                                        <input name="periode_akhir" type="date" class="form-control input-square"
                                            id="squareInput" placeholder="Masukkan Periode awal" value="<?= set_value('periode_akhir')  ?>">
                                    </div>
                                    <div class="form-group">
                                                <label for="type">Status</label>
                                                <select name="id_status" class="form-control" id="type">
                                                    <option value="">Pilih Status</option>
                                                    <?php foreach ($status as $s => $value) { ?>
                                                    <option value="<?= $value->id_status ?>"><?= $value->jenis_status ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                    <div class="form-group col-3">
                                        <label>Foto</label>
                                        <input type="file" name="foto" class="form-control" id="preview_foto" required>
                                    </div>  
                                    <div class="form-group">
                                        <img src="" id="foto_load" class="img-fluid">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                                        <a href="<?= base_url('kepala_sekolah') ?>" class="btn btn-danger btn-md">Kembali</a>
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