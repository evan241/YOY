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
                        <!--<div class="panel-heading header-primary">
                            <div class="panel-title text-left"><h2 class="heading-primary">Registro</h2></div>
                        </div>-->
                        <div class="panel-body" style=" padding: 25px">
                            <div class="control-group text-left">
                                <!--<div class="row">
                                    <div class="col-md-12 text-left">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-lg btn-block" style="background-color: #e5e3e9;" id="btnIHaveAccount">
                                                <i class="fa fa-user" aria-hidden="true"></i> Ya tengo mi cuenta
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        <center>
                                                O crea una cuenta nueva
                                        </center>
                                    </div>
                                </div><br>-->
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
                            <!--  <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        <div class="form-group">
                                            <input type='text' class="form-control" id="C_ESTADO_USUARIO"  name="C_ESTADO_USUARIO" placeholder="Estado"/>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        <div class="form-group">
                                            <input type='text' class="form-control" id="C_CIUDAD_USUARIO"  name="C_CIUDAD_USUARIO" placeholder="Ciudad"/>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div> -->
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
            <!--<div class="panel-footer"><br>
                            <div class="btn-group pull-right">
                                <button type="button" class="btn pull-left" id="btnCancelAddMov" >
                                    <i class="fa fa-remove" aria-hidden="true"></i> Cancelar
                                </button>
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-check" aria-hidden="true"></i> Enviar
                                </button>
                            </div>
                            <div style="clear:both"><br></div>
                        </div>-->
            </form>


            </center>
        </div>
        <div class="col-md-3">
        </div>
        <!--<div class="col-sm-4"><br></div>-->
    </div>
</div>