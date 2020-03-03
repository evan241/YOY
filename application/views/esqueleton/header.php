<!DOCTYPE html><?php

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
   <link href="<?=base_url()?>assets/img/favicon.png" rel="shortcut icon" />

   <!-- Stylesheets -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900">

   <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" />
   <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css" />
   <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.carousel.min.css" />
   <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.theme.default.min.css" />
   <link rel="stylesheet" href="<?=base_url()?>assets/css/flaticon.css" />
   <link rel="stylesheet" href="<?=base_url()?>assets/css/magnific-popup.css" />

   <!-- Main Stylesheets -->
   <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" />
   <link rel="stylesheet" href="<?=base_url()?>assets/css/styles.css" />

</head>
<style>
   #myHeader{position:absolute}
   @media (max-width: 1200px) {
      .search-switch {
         display: none;
      }

      .mobile-menu {
         margin-top: 45px;
      }

      .logo-header {
         width: 20%;
         left: 1%;
         margin-top: 10px;
      }
   }

   .xstyle {
      background: #f8f9fa;
      border-radius: 20px;
      margin-right: 8rem;
   }
   /* Testing header */
   .main-menu-right li a:hover {   
      color:#000;
      border-bottom: 2px solid #000 ;
   }
   .main-menu-right li a {
      color: rgb(0, 0, 0);
   }
   .site-menu-style li a {
      font-weight: 600;
      letter-spacing: 1px;
   }
   .header-section{
      background:#e9ecef
   }
</style>

<body>

   <nav class="header-section " id="myHeader">
      <div class="container">
         <a href="<?=base_url()?>site/index" class="logo-header" style="margin-top: -13.5px;">
            <img src="<?=base_url()?>assets/img/logo-big.png" id="logo-main" class="br100" width="90px" height="90px">
         </a>
     
         <ul class="main-menu-right site-menu-style">
            <li><a href="<?=base_url()?>site/index">Home</a></li>
            <li><a href="<?=base_url()?>site/work">Work</a></li>
            <li><a href="<?=base_url()?>site/about">About</a></li>
            <li><a href="<?=base_url()?>site/news">News</a></li>
            <li><a href="<?=base_url()?>store">Store</a></li>
            <li><a href="<?=base_url()?>site/contact">Contact</a></li>
            <?php if ($this->session->userdata('YOY_ID_USUARIO') > 0) {?>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <i class="fa fa-cog"></i> <?=$this->session->userdata('YOY_EMAIL_USUARIO');?> <span class="caret"></span>                     
               </a>
               <ul class="dropdown-menu DropdownStyle" role="menu">
                  <li><a href="#" class="DropdownLink"><i class="fa fa-user"></i> My account</a></li><br>
                  <li><a href="#" class="DropdownLink"><i class="fa fa-shopping-bag"></i> My shops</a></li><br>
                  <li><a href="<?=base_url()?>Site/salir"  class="DropdownLink"><i class="fa fa-sign-out"></i> Salir</a></li>
               </ul>
            </li>
            <?php } else {?>
            <li><a href="<?=base_url()?>login">Login</a></li>
            <?php }?>
         </ul>
      </div>
      <div class="search-switch">
         <img src="<?=base_url()?>assets/img/search-icon.png" alt="">
      </div>
   </nav>
   <!-- Search model -->
   <!-- <div class="search-model">
      <div class="h-100 d-flex align-items-center justify-content-center">
         <div class="search-close-switch">+</div>
         <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
         </form>
      </div>
   </div> -->
   <!-- Search model end -->

   <div class="push" id="push">
      <!--//-->