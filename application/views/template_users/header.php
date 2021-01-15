
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/assets_admin/') ?>/assets/img/stisla-fill.svg" type="image/x-icon" />

    <title>Wisata - Susur Sungai Banjarmasin</title>

    <!--=== Bootstrap CSS ===-->
    <link href="<?php echo base_url()?>/assets/assets_users/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Vegas Min CSS ===-->
    <link href="<?php echo base_url()?>/assets/assets_users/css/plugins/vegas.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="<?php echo base_url()?>/assets/assets_users/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="<?php echo base_url()?>/assets/assets_users/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="<?php echo base_url()?>/assets/assets_users/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="<?php echo base_url()?>/assets/assets_users/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="<?php echo base_url()?>/assets/assets_users/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="<?php echo base_url()?>/assets/assets_users/css/reset.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/DataTables/datatables.min.css')?>">

    <!--=== Main Style CSS ===-->
    <link href="<?php echo base_url()?>/assets/assets_users/css/style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="<?php echo base_url()?>/assets/assets_users/css/responsive.css" rel="stylesheet">



    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="<?php echo base_url('assets/assets_admin/') ?>/assets/img/stisla-fill.svg" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-left">
                        <i class="fa fa-map-marker"></i> 70116, Banjarmasin, Kal-Sel
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-mobile"></i> 08981120898
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-clock-o"></i> CS : 09.00 - 17.00 WITA
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Social Icons Start ==-->
                    <div class="col-lg-3 text-right">
                        <div class="header-social-icons">
                            <a href="#"><i class="fa fa-behance"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!--== Social Icons End ==-->
                </div>
            </div>
        </div>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="#" class="logo">
                            <img width="200px;" src="<?php echo base_url()?>assets/image/logo.png" alt="JSOFT">
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li class=""><a href="<?php echo base_url('users/dashboard') ?>">Beranda</a></li>
                                <li><a href="<?php echo base_url('users/data_wisata') ?>">Daftar Wisata</a></li>
                                <li><a href="<?php echo base_url('users/bantuan') ?>">Bantuan</a></li>

                                <?php if($this->session->userdata('username')) { ?> <!-- Apabila ada yg login maka akan diambil data nama_users nya-->
                                <li><a href="<?php echo base_url('users/transaksi') ?>">Transaksi</a></li>
                                <?php }else { ?>
                                    <li><a href="<?php echo base_url('daftar') ?>">Register</a></li>
                                <?php } ?>


                                <?php if($this->session->userdata('nama_users')) { ?> <!-- Apabila ada yg login maka akan diambil data nama_users nya-->
                                <li><a>Hi, <?php echo $this->session->userdata('nama_users') ?></a>
                                    <ul>
                                        <li><a href="<?php echo base_url('auth/ganti_password') ?>">Ganti Password</a></li>
                                        <li><a href="<?php echo base_url('auth/logout') ?>"">Keluar</a></li>
                                    </ul>
                                </li>
                                <?php }else { ?>
                                    <li><a href="<?php echo base_url('auth/login') ?>">Login</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->
