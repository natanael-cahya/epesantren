<?php date_default_timezone_set("Asia/Jakarta"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-PESANTREN | <?= $judul ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url('assets'); ?>/img/logo.png" type="image/x-icon" />
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        rel="stylesheet" />
    <!-- Fonts and icons -->
    <script src="<?= base_url('assets'); ?>/template/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['<?= base_url('assets'); ?>/template/css/fonts.min.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"
        integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"
        integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg=="
        crossorigin="anonymous" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/template/css/atlantis.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/template/css/datepicker.css">
    <style>
    body::-webkit-scrollbar {
        width: 7px;
    }

    body::-webkit-scrollbar-track {
        background-color: white;
    }

    body::-webkit-scrollbar-thumb {
        background-color: #029C4E;
    }
    </style>

</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="white">
                <?php $a1 = $this->uri->segment(1);
                $a2 = $this->uri->segment(1); ?>
                <a href="<?= base_url($a1 . '/' . $a2 . '/'); ?>" class="logo">
                    <img src="<?= base_url('assets'); ?>/img/log.png" alt="E-PESANTREN" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="green2">

                <div class="container-fluid">
                    <!-- JAM -->

                    <div class="text-white text-right btn btn-info mx-auto toggle-nav-search mb-2 hidden-caret"><i
                            class="fa fa-calendar mr-2"></i><?= date('d-m-Y') ?><i class=" fa fa-clock ml-2 mr-2"></i>
                        <b class="hari"></b><b class="text-white" id="jam"></b> : <b class="text-white" id="menit"></b>
                        : <b class="text-white" id="detik"></b>
                    </div>
                    <!-- END JAM -->
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <!--   <li class="nav-item toggle-nav-search  hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li> -->

                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="notification"><?php $a = $this->db->query("SELECT count(*) as hs FROM `perizinan` where stat = '1'")->result();
                                                            echo $a[0]->hs ?></span>
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title"><?= $a[0]->hs ?> Notifikasi Baru!</div>
                                </li>
                                <li>
                                    <?php foreach ($this->data as $key) { ?>
                                    <div class="notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-icon notif-primary"> <i class="fa fa-user"></i>
                                                </div>

                                                <div class="notif-content">
                                                    <span class="block">
                                                        <?= $key->nama ?>
                                                    </span>
                                                    <span class="time">Deadline Izin
                                                        <b><?= $key->tgl_selesai ?></b></span>
                                                </div>
                                            </a>

                                        </div>
                                    </div>

                                    <?php } ?>
                                </li>
                                <li>
                                    <a class="see-all" href="<?= base_url('admin/perizinan') ?>">Lihat Semua
                                        Notifikasi<i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="<?= base_url('assets'); ?>/img/logo.png" alt="..."
                                        class="avatar-img rounded-circle bg-white">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="<?= base_url('assets'); ?>/img/logo.png"
                                                    alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4><?= $admin['nama'] ?></h4>
                                                <p class="text-muted">PP AL-MASHDUQIAH</p><a href="#profile"
                                                    data-toggle="modal" data-target="#profile"
                                                    class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">My Profile</a>
                                        <a class="dropdown-item" href="#">My Balance</a>
                                        <a class="dropdown-item" href="#">Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= base_url('login/logout') ?>">Logout</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>