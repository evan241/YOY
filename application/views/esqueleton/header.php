<!DOCTYPE html><?php
/* @mysql_set_charset('utf8'); */
//mysql_query("SET NAMES 'utf8'");
?>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>YOY-Distinción por tradición</title>
        <script type="text/javascript">
            var raiz_url = '<?php echo base_url() ?>';
        </script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link href="<?= base_url() ?>assets/img/favicon.png" rel="shortcut icon" />

        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/flaticon.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/magnific-popup.css" />

        <!-- Main Stylesheets -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />

        <!-- <script src="<?php echo base_url(); ?>assets/js/registro.js" type="text/javascript"></script> -->


        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <style>
    @media (max-width: 1200px) {
        .search-switch{
            display:none;
        }
        .logo-header{
            width:20%;
            left:1%;
            margin-top:10px;
        }
        .mobile-menu{
            margin-top: 45px;
        }
    }
    .xstyle{
        background: #f8f9fa;
    border-radius: 20px;
        margin-right: 8rem;
    }
    </style>
    <body>

        <nav class="header-section " id="myHeader">
            <div class="container">
                <a href="<?= base_url() ?>site/index" class="logo-header">
                    <img src="<?= base_url() ?>assets/img/logo.png"  class="br100" alt="">
                </a>
                <!--<ul class="main-menu-left site-menu-style">

                </ul>-->
                <ul class="main-menu-right site-menu-style">
                    <li><a href="<?= base_url() ?>site/index">Home</a></li>
                    <li><a href="<?= base_url() ?>site/work">Work</a></li>
                    <li><a href="<?= base_url() ?>site/about">About</a></li>
                    <!--<li><a href="<?= base_url() ?>site/provenance">Provenance</a></li>-->
                    <!--<li><a href="<?= base_url() ?>site/press">Press</a></li>-->
                    <!--<li><a href="<?= base_url() ?>site/news">News</a></li>-->
                    <li><a href="<?= base_url() ?>site/store">Store</a></li>
                    <li><a href="<?= base_url() ?>site/contact">Contact</a></li>
                    <?php if($this->session->userdata('YOY_ID_USUARIO') > 0){ ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-cog" aria-hidden="true"></i> <?=$this->session->userdata('YOY_USERNAME_USUARIO');?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" style="background-color: black;">
                            <li><a href="#"><i class="fa fa-user"></i> My account</a></li><br>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> My shops</a></li><br>
                            <li><a href="<?= base_url() ?>site/salir"><i class="fa fa-sign-out"></i> Salir</a></li>
                        </ul>
                    </li>
                    <?php } else{ ?>
                    <li><a href="<?= base_url() ?>Login">Login</a></li>
                     <?php } ?>
                </ul>
            </div>
            <div class="search-switch">
                <img src="<?= base_url() ?>assets/img/search-icon.png" alt="">
            </div>
        </nav>
        <!-- Search model -->
        <!--<div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch">+</div>
                <form class="search-model-form">
                    <input type="text" id="search-input" placeholder="Search here.....">
                </form>
            </div>
        </div>-->
        <!-- Search model end -->

        <div class="push" id="push" ><!--//-->


