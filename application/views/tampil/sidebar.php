<div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="<?= base_url('dashboard')?>">
                            <img class="img-fluid" src="<?=base_url()?>assets/new/images/icon.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <?php
                                        $query = "SELECT * FROM pengguna LEFT JOIN guru ON pengguna.id_guru = guru.id_guru LEFT JOIN sekolah ON pengguna.id_sekolah = sekolah.id_sekolah";
                                        $users = $this->db->query($query)->row_array();
                                    ?>
                                    <img src="<?=base_url('assets/foto_user/' . $users['foto'])?>" class="img-radius" alt="User-Profile-Image">
                                    <span>
                                        <?= $users['nama'] ?>
                                    </span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="#!">
                                            <i class="ti-settings"></i> Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-email"></i> My Messages
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-lock"></i> Lock Screen
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>auth/logout">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-search">
                                <span class="searchbar-toggle">  </span>
                                <div class="pcoded-search-box ">
                                    <input type="text" placeholder="Search">
                                    <span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>
                                </div>
                            </div>
<!-- Super Admin -->
                        <?php if($this->session->userdata('id_group')=='1'){ ?>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">SuperAdmin</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="<?php if($this->uri->segment(2)=='dashboard'){echo 'active';};?>">
                                    <a href="<?=base_url()?>dashboard">
                                        <span class="pcoded-micon"><i class="ti-home"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li class="<?php if($this->uri->segment(2)=='quiz'){echo 'active';};?>">
                                    <a href="<?=base_url()?>dashboard/quiz">
                                        <span class="pcoded-micon"><i class="ti-help"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Quiz</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($this->uri->segment(2)=='sekolah'){echo 'active';};?>">
                                    <a href="<?=base_url()?>dashboard/sekolah">
                                        <span class="pcoded-micon"><i class="ti-map"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Sekolah</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($this->uri->segment(2)=='guru'){echo 'active';};?>">
                                    <a href="<?=base_url()?>dashboard/guru">
                                        <span class="pcoded-micon"><i class="ti-id-badge"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Guru</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($this->uri->segment(2)=='kepala_sekolah'){echo 'active';};?>">
                                    <a href="<?=base_url()?>kepala_sekolah">
                                        <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kepala Sekolah</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($this->uri->segment(2)=='transaksi'){echo 'active';};?>">
                                    <a href="<?=base_url()?>transaksi">
                                        <span class="pcoded-micon"><i class="ti-marker-alt"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Transaksi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($this->uri->segment(2)=='opsi'){echo 'active';};?>">
                                    <a href="<?=base_url()?>opsi">
                                        <span class="pcoded-micon"><i class="ti-check"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Opsi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($this->uri->segment(2)=='documents'){echo 'active';};?>">
                                    <a href="<?=base_url()?>dashboard/documents">
                                        <span class="pcoded-micon"><i class="ti-upload"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Data</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($this->uri->segment(2)=='histori'){echo 'active';};?>">
                                    <a href="<?=base_url()?>dashboard/histori">
                                        <span class="pcoded-micon"><i class="ti-time"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Histori</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-user"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">User</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>

                                <ul class="pcoded-submenu">
                                        <li class="<?php if($this->uri->segment(2)=='pengguna'){echo 'active';};?>">
                                            <a href="<?=base_url()?>pengguna">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Users</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if($this->uri->segment(2)=='group'){echo 'active';};?>">
                                            <a href="<?=base_url()?>group">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">User Group</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                            </ul>
                            </ul>


<!-- Admin sekolah -->
    <?php } if($this->session->userdata('id_group')=='2'){ ?>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Admin Sekolah</div>
                            <ul class="pcoded-item pcoded-left-item"> 
                                <li>
                                    <a href="<?=base_url()?>Dashboard">
                                        <span class="pcoded-micon"><i class="ti-home"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>dashboard/guru">
                                        <span class="pcoded-micon"><i class="ti-id-badge"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Guru</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>dashboard/kepala_sekolah">
                                        <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kepala Sekolah</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>dashboard/transaksi">
                                        <span class="pcoded-micon"><i class="ti-marker-alt"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Transaksi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>documents">
                                        <span class="pcoded-micon"><i class="ti-upload"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Data</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>


<!-- Guru -->
<?php } if($this->session->userdata('id_group')=='8'){ ?>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Guru</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="<?=base_url()?>dashboard">
                                        <span class="pcoded-micon"><i class="ti-home"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <?php }; ?>
                    </nav>

        