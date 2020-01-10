<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>YOY | ADMIN</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
    rel="stylesheet" />

  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">


  <!-- PLUGINS CSS STYLE -->
  <link rel="stylesheet" href="<?=base_url();?>assets/ADMIN/plugins/toaster/toastr.min.css" />
  <link rel="stylesheet" href="<?=base_url();?>assets/ADMIN/plugins/nprogress/nprogress.css" />
  <link rel="stylesheet" href="<?=base_url();?>assets/ADMIN/plugins/flag-icons/css/flag-icon.min.css" />
  <link rel="stylesheet" href="<?=base_url();?>assets/ADMIN/plugins/jvectormap/jquery-jvectormap-2.0.3.css" />
  <link rel="stylesheet" href="<?=base_url();?>assets/ADMIN/plugins/ladda/ladda.min.css" />
  <link rel="stylesheet" href="<?=base_url();?>assets/ADMIN/plugins/select2/css/select2.min.css" />
  <link rel="stylesheet" href="<?=base_url();?>assets/ADMIN/plugins/daterangepicker/daterangepicker.css" />
  <!-- <link rel="stylesheet" href="<?=base_url();?>assets/ADMIN/plugins/data-tables/datatables.bootstrap4.min.css" /> -->
  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="<?=base_url();?>assets/ADMIN/css/sleek.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">



  <!-- FAVICON -->
  <link href="<?=base_url();?>assets/ADMIN/img/favicon.png" rel="shortcut icon" />


  <script src="<?=base_url();?>assets/ADMIN/plugins/nprogress/nprogress.js"></script>
</head>
<style>
.btn-logout{
    background: #fb2939;
    padding: 10px;
    border-radius: 5px;
    color: white;
    letter-spacing: 1px;
}
</style>

<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
  <script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
  </script>

  <div class="mobile-sticky-body-overlay"></div>

  <div class="wrapper">

    <!--
      ====================================
        LEFT SIDEBAR WITH FOOTER
      ===================================== 
    -->
   
    <aside class="left-sidebar bg-sidebar">
      <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
          <a href="<?= base_url();?>manager/index">
            <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
              height="33" viewBox="0 0 30 33">
              <g fill="none" fill-rule="evenodd">
                <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
              </g>
            </svg>
            <span class="brand-name">YOY | ADMIN</span>
          </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">
          <!-- sidebar menu -->
          <ul class="nav sidebar-inner" id="sidebar-menu">
            <li class="has-sub">
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#index"
                aria-expanded="false" aria-controls="index">
                <i class="mdi mdi-view-dashboard-outline"></i>
                <span class="nav-text">Inicio</span> <b class="caret"></b>
              </a>
              <ul class="collapse" id="index" data-parent="#sidebar-menu">
                <div class="sub-menu">
                  <li>
                    <a class="sidenav-item-link" href="<?= base_url() ?>Reportes/index">
                      <span class="nav-text">Index</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="<?= base_url() ?>Reportes/cortes">
                      <span class="nav-text">Por envíar</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="<?= base_url() ?>Reportes/cuentas">
                      <span class="nav-text">Verificar Pagos</span>
                    </a>
                  </li>
                </div>
              </ul>
            </li>
            <li class="has-sub">
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-currency-usd"></i>
                <span class="nav-text">Ventas</span> <b class="caret"></b>
              </a>
              <ul class="collapse" id="dashboard" data-parent="#sidebar-menu">
                <div class="sub-menu">
                  <li>
                    <a class="sidenav-item-link" href="<?=base_url()?>manager/sales">
                      <span class="nav-text">Ventas</span>
                      <span class="badge badge-success">5</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="<?=base_url()?>manager/shipment_types">
                      <span class="nav-text">Tipos de envío</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="<?=base_url()?>manager/payment_types">
                      <span class="nav-text">Medios de Pago</span>
                    </a>
                  </li>
                </div>
              </ul>
            </li>
            <li class="has-sub">
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-products"
                aria-expanded="false" aria-controls="ui-products">
                <i class="mdi mdi-cube-outline"></i>
                <span class="nav-text">Productos</span> <b class="caret"></b>
              </a>
              <ul class="collapse" id="ui-products" data-parent="#sidebar-menu">
                <div class="sub-menu">
                  <li class="has-sub">
                    <a class="sidenav-item-link" href="<?=base_url()?>productos/index" >
                      <span class="nav-text">Productos</span>
                    </a>                   
                  </li>
                  <li class="has-sub">
                    <a class="sidenav-item-link" href="<?=base_url()?>productos/categorias">                     
                      <span class="nav-text">Categorías</span> <b class="caret"></b>
                    </a>
                  </li>
                </div>
              </ul>
            </li>        
            <li class="has-sub">
              <a class="sidenav-item-link" href="<?= base_url(); ?>manager/users">
                <i class="mdi mdi-account-group"></i>
                <span class="nav-text">Usuarios</span>
              </a>            
            </li>
            <li class="has-sub">
              <a class="sidenav-item-link" href="<?= base_url();?>manager/customers">
                <i class="mdi mdi-account-multiple-check"></i>
                <span class="nav-text">Clientes</span>
              </a> 
            </li>
          </ul>
        </div>

        <hr class="separator" />

        <div class="sidebar-footer">
          <div class="sidebar-footer-content">
          <a class="btn-logout"href="<?= base_url() ?>site/salir" > <i class="mdi mdi-logout"></i> Cerrar Sesión </a>
          </div>
        </div>
      </div>
    </aside>



    <div class="page-wrapper">
      <!-- Header -->
      <header class="main-header " id="header">
        <nav class="navbar navbar-static-top navbar-expand-lg">
          <!-- Sidebar toggle button -->
          <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <!-- search form -->
          <div class="search-form d-none d-lg-inline-block">
            <div class="input-group">
              <button type="button" name="search" id="search-btn" class="btn btn-flat">
                <i class="mdi mdi-magnify"></i>
              </button>
              <input type="text" name="query" id="search-input" class="form-control"
                placeholder="'button', 'chart' etc." autofocus autocomplete="off" />
            </div>
            <div id="search-results-container">
              <ul id="search-results"></ul>
            </div>
          </div>

          <div class="navbar-right ">
            <ul class="nav navbar-nav">
              <!-- Github Link Button -->
              <li class="github-link mr-3">
                <a class="btn btn-outline-secondary btn-sm" href="<?=base_url('Site');?>"
                  target="_blank">
                  <span class="d-none d-md-inline-block mr-2">Ver página</span>
                  <i class="mdi mdi-page-next-outline"></i>
                </a>

              </li>
              <li class="dropdown notifications-menu">
                <button class="dropdown-toggle" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-header">You have 5 notifications</li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-account-plus"></i> New user registered
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10
                        AM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-account-remove"></i> User deleted
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07
                        AM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12
                        PM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-account-supervisor"></i> New client
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10
                        AM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-server-network-off"></i> Server overloaded
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05
                        AM</span>
                    </a>
                  </li>
                  <li class="dropdown-footer">
                    <a class="text-center" href="#"> View All </a>
                  </li>
                </ul>
              </li>
              <!-- User Account -->
              <li class="dropdown user-menu">
                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <img src="<?=base_url();?>assets/ADMIN/img/user/user.png" class="user-image" alt="User Image" />
                  <span class="d-none d-lg-inline-block">Admin YOY</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <!-- User image -->
                  <li class="dropdown-header">
                    <img src="<?=base_url();?>assets/ADMIN/img/user/user.png" class="img-circle" alt="User Image" />
                    <div class="d-inline-block">
                    Admin YOY <small class="pt-1">admin@gmail.com</small>
                    </div>
                  </li>

                  <li>
                    <a href="profile.html">
                      <i class="mdi mdi-account"></i> My Profile
                    </a>
                  </li>
                  <li>
                    <a href="email-inbox.html">
                      <i class="mdi mdi-email"></i> Message
                    </a>
                  </li>
                  <li>
                    <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                  </li>
                  <li>
                    <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
                  </li>

                  <li class="dropdown-footer">
                    <a href="signin.html"> <i class="mdi mdi-logout"></i> Log Out </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>


      </header>
      <div class="content-wrapper">
        <div class="content">