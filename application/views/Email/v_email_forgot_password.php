<html>

<head>
    <center><img src="<?= base_url(); ?>assets/img/logo_rolling2.png" width="200" class=" img-responsive"
            alt="izquierda"></center>

</head>

<body>
    <div>
        <div style=" background-color:#00afef; color: white;">
            Hola <?= $ROW_USUARIO[0]['NOMBRE_USUARIO'] ?>
        </div>
        <div>




            <br>




            tu contraseña es: <?= $ROW_USUARIO[0]['PASSWORD_USUARIO'] ?>

        </div>
    </div>
</body>

</html>