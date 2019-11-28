<style>
body{
    background-image:url('http://localhost/YOY/assets/img/bg.jpg') !important;
    background-attachment: fixed;
	background-position: center center;
	background-repeat: repeat;
}
.footer-section{
    /* position:absolute;
    width:100%;
    bottom:0; */
    display:none !important
}
</style>
<link rel="shortcut icon" href="img/favicon.jpg" />
<script type="text/javascript"></script>
<div class="container-fluid">
    <div class="row" id="pwd-container">
        <!--<div class="col-sm-4"></div>-->
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <br>
            <div class="panel panel-primary"><br><br><br><br><br><br><br>
                <h2 class="text-center mb-3">REGÍSTRATE</h2>
                <center>
                    <form class="formx " data-toggle="validator" role="form" id="formRegistration">

                        <div class="panel-body" style=" padding: 25px">
                            <div class="control-group text-left">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text"
                                                    id="basic-addon1"><i class="fas fa-user-edit"></i></span></div>
                                            <input type='text' class="form-control" id="C_NOMBRE_USUARIO" required
                                                name="C_NOMBRE_USUARIO" placeholder="Nombre(s)" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 text-left">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text"
                                                    id="basic-addon1"><i class="fas fa-user-edit"></i></span></div>
                                            <input type='text' class="form-control" id="C_APELLIDOS_USUARIO" required
                                                name="C_APELLIDOS_USUARIO" placeholder="Apellido(s)" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 text-left">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text"
                                                    id="basic-addon1"><i class="fas fa-lock"></i></span></div>
                                            <input type='password' class="form-control" id="C_PASSWORD_USUARIO" required
                                                name="C_PASSWORD_USUARIO" placeholder="Contraseña" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 text-left">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text"
                                                    id="basic-addon1"><i class="fas fa-phone"></i></span></div>
                                            <input type='text' class="form-control" id="C_TELEFONO_USUARIO"
                                                name="C_TELEFONO_USUARIO" placeholder="Teléfono/Móvil" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-left">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"
                                                    id="basic-addon1"><i class="fas fa-at"></i></span></div>
                                            <input type='email' class="form-control" id="C_EMAIL_USUARIO" required
                                                name="C_EMAIL_USUARIO" placeholder="example@correo.com" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center mt-3">
                                    <div class="form-group">
                                        <button type='submit' class="btn btn-lg button" id="btnEnviarRegisto"
                                            name="btnEnviarRegisto" />
                                        Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center" style="text-align: left">
                                    <font face="Roboto" size="2">¿ Ya tienes una cuenta ? </font> <a class="register"
                                        href="<?= base_url(); ?>Login">Inicia sesión aquí</a>
                                </div>

                            </div>
                        </div>
            </div>
            </form>


            </center>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>