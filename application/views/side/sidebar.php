<div class="container-scroller">
<!-- Atas -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="<?= base_url('dashboard/index')?>"><img src="<?=base_url()?>assets/side/images/survei.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="<?= base_url('dashboard/index')?>"><img src="<?=base_url()?>assets/side/images/survei_mini.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <!-- <img src="<?=base_url()?>" alt="profile"/> -->
              <img src="<?=base_url('assets/foto_users/'. $pengguna['foto'])?>" alt="<?= $pengguna['username']?>"/>

            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <!-- <a class="dropdown-item"> -->
              <a class="dropdown-item"  href="<?= base_url('dashboard/profile/'. $pengguna['id_user']);?>">
                <i class="ti-user text-primary"></i>
                Profile
              </a>
              <a class="dropdown-item" href="<?= base_url('auth/logout')?>">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
</div>

<!-- Side -->
      <div class="container-fluid page-body-wrapper">
      <div class="theme-setting-wrapper">
        <!-- <div id="settings-trigger"><i class="ti-settings"></i></div>  -->
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

<!-- sidebar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <?php if($this->session->userdata('id_group')=='1'){ ?>
          <li class="nav-item <?php if($this->uri->segment(2)=='index'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?= base_url('dashboard/index')?>">
              <i class="bi bi-house-door-fill menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='sekolahan'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?=base_url()?>dashboard/sekolahan">
              <i class="bi bi-building menu-icon"></i>
              <span class="menu-title">Sekolah</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='guru'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?=base_url()?>dashboard/guru">
              <i class="bi bi-person-video3 menu-icon"></i>
              <span class="menu-title">Guru</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='kepala_sekolah'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?=base_url()?>dashboard/kepala_sekolah">
              <i class="bi bi-person-fill menu-icon"></i>
              <span class="menu-title">Kepala Sekolah</span>
            </a>
          </li>
          <!-- <li class="nav-item <?php if($this->uri->segment(2)=='transaksi'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?=base_url()?>dashboard/transaksi">
              <i class="bi bi-file-earmark-medical-fill menu-icon"></i>
              <span class="menu-title">Transaksi</span>
            </a>
          </li> -->
          <li class="nav-item <?php if($this->uri->segment(2)=='histori'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?=base_url()?>dashboard/histori">
              <i class="bi bi-card-heading menu-icon"></i>
              <span class="menu-title">Judul Quiz</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='quiz'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?= base_url('dashboard/quiz')?>">
              <i class="bi bi-question-diamond menu-icon"></i>
              <span class="menu-title">Quiz</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='documents'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?=base_url()?>dashboard/documents">
              <i class="bi bi-clipboard-data-fill menu-icon"></i>
              <span class="menu-title">Data Dukung</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='Rekap'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?=base_url()?>dashboard/Rekap">
              <i class="bi bi-card-checklist menu-icon"></i>
              <span class="menu-title">Rekap Data</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='opsi'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?=base_url()?>dashboard/opsi">
              <i class="bi bi-check-square-fill menu-icon"></i>
              <span class="menu-title">Opsi</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='pengguna'){echo 'nav-item';};?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="bi bi-people-fill menu-icon"></i>
              <span class="menu-title">Pengguna</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item <?php if($this->uri->segment(2)=='pengguna'){echo 'nav-item';};?>"> <a class="nav-link" href="<?=base_url()?>dashboard/pengguna">Users</a></li>
                <!-- <li class="nav-item <?php if($this->uri->segment(2)=='group'){echo 'nav-item';};?>"> <a class="nav-link" href="<?=base_url()?>dashboard/group">User Group</a></li> -->
              </ul>
            </div>
          </li>


          <?php } if($this->session->userdata('id_group')=='2'){ ?>
            <li class="nav-item <?php if($this->uri->segment(2)=='index'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?= base_url('dashboard/index')?>">
              <i class="bi bi-house-door-fill menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='guruid'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?=base_url()?>dashboard/guruid">
              <i class="bi bi-person-video3 menu-icon"></i>
              <span class="menu-title">Guru</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='kepala_sekolah_id'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?=base_url()?>dashboard/kepala_sekolah_id">
              <i class="bi bi-person-fill menu-icon"></i>
              <span class="menu-title">Kepala Sekolah</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='documentsid'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?=base_url()?>dashboard/documentsid">
              <i class="bi bi-clipboard-data-fill menu-icon"></i>
              <span class="menu-title">Data Dukung</span>
            </a>
          </li>
          <?php } if($this->session->userdata('id_group')=='8'){ ?>
            <li class="nav-item <?php if($this->uri->segment(2)=='index'){echo 'nav-item';};?>">
            <a class="nav-link" href="<?= base_url('dashboard/index')?>">
              <i class="bi bi-house-door-fill menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php }; ?>

        </ul>
      </nav>