<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?=base_url()?>assets/side/images/survei.png" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <?php 
              $this->session->flashdata('msg');
              
                            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>','</h5></div>');
                
                if (isset($error_up)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>'.$error_up.'</h5></div>';
                }; ?>
              <form class="pt-3" method="POST" id="login-form" action="<?php echo site_url('auth/autentikasi');?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="nip" id="nip" placeholder="NIP / USERNAME">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="user_password" placeholder="Password">
                </div>
                <div class="mt-3">
                <input type="submit" name="signin" id="signin" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN"/>
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="signin" id="signin" href="<?= base_url('auth/autentikasi')?>">SIGN IN</a> -->
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <!-- <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" required>
                      Keep me signed in
                    </label>
                  </div> -->
                  <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                </div>
                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div> -->
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="<?= base_url('auth/register')?>" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>