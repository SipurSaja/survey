<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?=base_url()?>assets/side/images/survei.png" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <?php 
                            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>','</h5></div>');
                
                if (isset($error_up)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>'.$error_up.'</h5></div>';
                }; ?>
              <?= form_open();?>
                <div class="form-group">
                  <select class="form-control form-control-lg" id="sekolah" name="id_sekolah">
                    <option value="" selected>Pilih Sekolah</option>
                    <?php foreach ($sekolah as $s) { ?>
                      <option value="<?= $s->id_sekolah ?>">
                        <?= $s->nama_sekolah ?></option>
                        <?php } ?>
                      </select> 
                    </div>
                    <div class="form-group">
                      <select class="form-control form-control-lg" id="guru" name="id_guru">
                      <option selected>Pilih NIP</option>
                      </select>
                    </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
                </div>
                <div class="mb-4">
                  <!-- <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div> -->
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SIGN UP</button>
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a> -->
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="<?= base_url('auth/index')?>" class="text-primary">Login</a>
                </div>
              <?= form_close();?>
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
        $.ajax({
            url: "<?php echo site_url('auth/getNip');?>",
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                $('#guru').html(data);

            }
        });
    });

});
</script>
