
<br><br><br><br><br><br><br>
<!-- Login -->
<style>
 .form {
    background: #f8f9fa;
    border-radius: 10px;
    margin-bottom: 1rem;
    padding:15px;
    font-family: "Roboto", sans-serif;
}
.register{
    text-decoration: underline;
    color: #ffc107;
}
.forgotpwd{
    text-decoration: underline;
    color: #dc3545;
    float:right
}
body{
    background-image:url('http://localhost/YOY/assets/img/bg.jpg') !important;
}
@media (max-width: 1200px) {

    .logo-header{
        left:36%;
        width:30%;
    }
}
.footer-section{
    /* position:absolute;
    width:100%;
    bottom:0; */
    display:none
}
.link{
	color:white !important;
}
</style>
<section class="shop-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xl-3" ></div>
            <div class="col-lg-4 col-xl-6">
                <h2 class="text-center mb-3">INICIAR SESIÓN</h2>

                <form class="form" id="btnFormYOY" method="POST">


                    <div class="input-group mb-3 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <input class="form-control" type="email" placeholder="Correo" name="email" id="email" required>
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <input class="form-control" type="password" placeholder="Contraseña" name="password" id="password" required>
                    </div>


                    <div class="text-center">
                        <button type="submit" id="btnLoginYOY" class="btn button btn-primary">Acceder</button>

                    </div>
                </form>

                <div class="alert alert-warning" id="messages" style="display:none;"></div>

                <div class="row">
                    <div class="col-lg-6" style="text-align: left">
                        <a class="link hover-2"href="<?= base_url(); ?>registro"><font face="Roboto" size="2">REGISTRATE</font></a>
                    </div>
                    <div class="col-lg-6" style="text-align: left">
                        <a class="link hover-3 float-right" href="<?= base_url(); ?>Login/ForgotPassword"><font face="Roboto" size="2">OLVIDE MI CONTRASEÑA</font></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-4 col-xl-3"></div>
    </div>

</div>
</div>
</section>
<br><br><br><br><br>
<!-- Newslatter section end -->
