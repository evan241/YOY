<!DOCTYPE html><?php
//@mysql_set_charset('utf8');
//mysql_query("SET NAMES 'utf8'");
?>
<html>
    <head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>YOY-Distinción por tradición</title>
        <!--<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"  />-->
        <script type="text/javascript">
            var raiz_url = '<?php echo base_url() ?>';
        </script>
        <meta charset="utf-8">
        <meta content="utf-8" http-equiv="encoding">
        <meta http-equiv="conten-type" content="text/html; charset=UTF-8" />
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">

        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>assets/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/printThis/printThis.js" type="text/javascript"></script>
        <link href='<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.css' rel='stylesheet' />
        <link href='<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
        <script src='<?php echo base_url(); ?>assets/fullcalendar/lib/moment.min.js'></script> 
        <script src="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap_validator_master/js/validator.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <!--<link href="<?php //echo base_url(); ?>assets/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>-->
        <link href="<?php echo base_url(); ?>assets/fontawesome-5.0.8/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>assets/bootstrap_fileinput_master/js/fileinput.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap_fileinput_master/js/fileinput_locale_es.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>assets/bootstrap_fileinput_master/css/fileinput.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>assets/jquery_datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/Buttons-1.3.1/js/dataTables.buttons.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>assets/Buttons-1.3.1/css/buttons.dataTables.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>assets/Buttons-1.3.1/js/buttons.flash.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/Buttons-1.3.1/js/buttons.html5.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/Buttons-1.3.1/js/buttons.print.js" type="text/javascript"></script>

        <link href="<?php echo base_url(); ?>assets/jquery_datatables/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/TableTools-2.2.4/css/dataTables.tableTools.css" rel="stylesheet" type="text/css"/>    
        <script src="<?php echo base_url(); ?>assets/TableTools-2.2.4/js/dataTables.tableTools.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/jquery_datatables/media/js/dataTables.bootstrap.js" type="text/javascript"></script>       
        <script src="<?php echo base_url(); ?>assets/timepicker/jquery.timepicker.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>assets/timepicker/jquery.timepicker.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>assets/timepicker/lib/bootstrap-datepicker.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>assets/timepicker/lib/bootstrap-datepicker.css" rel="stylesheet" type="text/css"/>      
        <script src="<?php echo base_url(); ?>assets/timepicker/lib/site.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>assets/timepicker/lib/site.css" rel="stylesheet" type="text/css"/>
        
        <!--<script src="<?php echo base_url(); ?>assets/js/productos.js" type="text/javascript"></script>-->
        <script src="<?php echo base_url(); ?>assets/js/manager.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/filesaver.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/html2canvas.js" type="text/javascript"></script>

        <!--<script src="<?php //echo base_url(); ?>assets/js/lumino.glyphs.js" type="text/javascript"></script>
        <script src="<?php //echo base_url(); ?>assets/js/chart-data.js" type="text/javascript"></script>
        <script src="<?php //echo base_url(); ?>assets/js/chart.min.js" type="text/javascript"></script>
        <script src="<?php //echo base_url(); ?>assets/js/easypiechart-data.js" type="text/javascript"></script>
        <script src="<?php //echo base_url(); ?>assets/js/easypiechart.js" type="text/javascript"></script>-->

        <link href="<?php echo base_url(); ?>assets/css/yoy.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <div class="wrapper" id="wrap"  >
            <div class="container-fluid " id="header_webpage" style="height:100px; background-color: #fff;" >
                <header class="hero-unit">
                    <div class="nav_ma" >
                        <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#000000;">
                            <div class="container">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_ma_toggle">
                                        <span class="sr-only">Navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="#">
                                        <img src="<?= base_url(); ?>/assets/img/logo.png" width="60" class=" img-responsive" alt="ASESORES">
                                    </a>
                                </div>
                                <div id="nav_ma_toggle" class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li <?=$classIni?>> <a href="<?= base_url(); ?>manager/index" style="color: white"><i class="fa fa-home" ></i> Inicio</a></li>
                                        <li <?=$classPro?>> <a href="<?= base_url(); ?>manager/products" style="color: white"><i class="fa fa-shopping-cart" ></i> Productos</a></li>
                                        <li <?=$classSal?>> <a href="<?= base_url(); ?>manager/sales" style="color: white"><i class="fa fa-shopping-bag"></i> Ventas</a></li>
                                        <li <?=$classUser?>> <a href="<?= base_url(); ?>manager/users" style="color: white"><i class="fa fa-user"></i> Usuarios</a></li>
                                        <li <?=$classCustom?>> <a href="<?= base_url(); ?>manager/customers" style="color: white"><i class="fa fa-users"></i> Clientes</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white"> 
                                                <i class="fa fa-cog" aria-hidden="true"></i>
                                                <?= $this->session->userdata('YOY_USERNAME_USUARIO') ?> <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?= base_url() ?>site/salir"><b>Salir</b></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!--/.nav-collapse -->
                            </div>
                            <!--/.container-fluid -->
                        </nav>
                    </div> 
                </header>
            </div>

            <div class="push" id="push" ><!--//-->


