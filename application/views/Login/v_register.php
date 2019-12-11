<!DOCTYPE html><?php
@mysql_set_charset('utf8');
mysql_query("SET NAMES 'utf8'");
?>
<html>

<head>
    <script type="text/javascript">
        var raiz_url = '<?php echo base_url(); ?>';
    </script>
    <meta charset="utf-8">
    <meta content="utf-8" http-equiv="encoding">
    <meta http-equiv="conten-type" content="text/html; charset=UTF-8" />
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css?ver=1.0" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/login.js" type="text/javascript"></script>

    <style type="text/css">
        .form-control {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;


            &:focus {
                z-index: 2;
            }
        }

        .login-form {
            margin-top: 40PX;
        }

        #btnEntrar {
            font-size: 20px !important;
        }

        .body{
            background-image:url('http://localhost/YOY/assets/img/bg.jpg') !important;
        }


    }
    </style>

</head>

<body class="body">
    <div class="container-fluid">
        <div class="row" id="pwd-container">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"><br><br>
                <form class="formx" name="form" autocomplete="off" autocomplete="nope">
                    <section class="login-form">
                        <img src="<?php echo base_url(); ?>assets/img/logo_rolling2.png"
                            class="img-responsive center-block" alt="Logo GNP" />
                        <label class="label-control text-center">
                            <h3>Bienvenido</h3>
                        </label>
                        <input type="text" autocomplete="off" autocomplete="nope" name="RG_USERNAME_USUARIO"
                            id="RG_USERNAME_USUARIO" placeholder="Usuario" required class="form-control input-lg"
                            style=" height: 60px;" value="" />
                        <input type="password" autocomplete="off" autocomplete="nope" class="form-control input-lg"
                            id="RG_PASSWD_USUARIO" name="RG_PASSWD_USUARIO" required style=" height: 60px;"
                            placeholder="Password" value="" />
                        <button type="button" name="btnEntrar" id="btnEntrar" class="btn btn-lg btn-danger btn-block">
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                            Entrar
                        </button>
                        <br>
                        <center>
                            <a href="<?= base_url()?>registro">Registrame</a>
                        </center>

                    </section>
                </form>
                <br>
                <p id="messages" class="pull-right" style="color:#F00;"></p>
            </div>
            <div class="col-sm-4"><br></div>
        </div>
    </div>
</body>

</html>