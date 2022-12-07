<html lang="en">

<head>
    <title>SURVEI</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="CodedThemes">
      <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="CodedThemes">
      <!-- Favicon icon -->
      <link rel="icon" href="<?=base_url()?>assets/new/images/kemdikbud.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/new/css/bootstrap/css/bootstrap.min.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/new/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/new/icon/icofont/css/icofont.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/new/css/style.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/new/css/jquery.mCustomScrollbar.css">
      <!-- select2 -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
  </head>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>


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
            