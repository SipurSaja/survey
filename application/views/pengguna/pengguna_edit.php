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
                                            <h4 class="card-title">Tambah User</h4>
                                        </div>

                                        <div class="card-body">
                                            <?php 
                            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>','</h5></div>');
                
                if (isset($error_up)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>'.$error_up.'</h5></div>';
                };?>
                                            <?= 
                                            form_open();
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id_user" id="id_user"
                                                            value="<?= $getById['id_user']?>">
                                                        <label for="sekolah">Sekolah</label>
                                                        <select id="sekolah" name="id_sekolah" class="form-control">
                                                            <option value="" selected>Pilih Sekolah</option>
                                                            <?php foreach ($sekolah as $s) { ?>
                                                            <option value="<?= $s['id_sekolah'] ?>">
                                                                <?= $s['nama_sekolah'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="guru">Guru</label>
                                                        <select id="guru" name="id_guru" class="form-control">
                                                            <option selected>Pilih Guru</option>
                                                        </select>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="type">Jabatan</label>
                                                                <select name="id_group" class="form-control" id="type">
                                                                    <option value="">--Pilih--</option>
                                                                    <?php foreach ($user_group as $u => $value) { ?>
                                                                    <option value="<?= $value->id ?>">
                                                                        <?= $value->group_name ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="squareInput">username</label>
                                                        <input name="username" type="username"
                                                            class="form-control input-square" id="squareInput"
                                                            placeholder="Masukkan username"
                                                            value="<?= set_value('username')  ?>">
                                                    </div>
                                                </div>
                                            </div>

                                                    <div class="form-group">
                                                        <label for="squareInput">Password</label>
                                                        <input name="password" type="password"
                                                            class="form-control input-square" id="squareInput"
                                                            placeholder="Masukkan Password"
                                                            value="<?= set_value('user_password')  ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                                                        <a href="<?= base_url('dashboard/pengguna') ?>"
                                                            class="btn btn-danger btn-md">Kembali</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <?= 
                                            form_close();
                                            ?>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {

    $('#sekolah').change(function() {
        var id = $(this).val();
        var id_guru = "<?= $getById['id_guru'] ?>"
        $.ajax({
            url: "<?php echo site_url('pengguna/getNip');?>",
            method: "POST",
            data: {
                id: id,
                id_guru: id_guru
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                $('#guru').html(data);

            }
        });
    });

    var id_user = "<?= $getById['id_user'] ?>"
    $.ajax({
        url: "<?= base_url('pengguna/getId/')?>" + id_user + "/json",
        method: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id_group"]').val(data.id_group)
            $('[name="id_sekolah"]').val(data.id_sekolah).trigger('change')
            $('[name="id_guru"]').val(data.id_guru).trigger('change')
            $('[name="username"]').val(data.username)
            $('[name="password"]').val(data.password)
        }
    });
});
</script>