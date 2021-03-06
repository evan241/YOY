<div class="row">
    <div class="col-sm-12 text-left">
        <div class="card card-default">
            <form data-toggle="validator" role="form" id="formEditUser">
                <input type="hidden" value="<?= $user['ID_USUARIO'] ?>" name="RG_ID_USUARIO" id="RG_ID_USUARIO">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>EDITAR USUARIO</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="RG_NOMBRE_USUARIO" class="control-label text-left" >Nombre(s)</label>
                                        <input type="text" style="text-transform:uppercase;" name="RG_NOMBRE_USUARIO" required id="RG_NOMBRE_USUARIO" class="form-control" placeholder="Nombre del usuario" value="<?= $user['NOMBRE_USUARIO'] ?>"
                                               pattern="[a-zA-Z ñÑáéíóúÁÉÍÓÚàÀèÈìÌòÒùÙäÄëËïÏöÖüÜ]{2,}" 
                                               title="No debe incluir números ni símbolos">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"> 
                                        <label for="RG_APELLIDO_USUARIO" class="control-label text-left">Apellido</label>
                                        <input type="text" style="text-transform:uppercase;" name="RG_APELLIDO_USUARIO" required id="RG_APELLIDO_USUARIO" class="form-control" placeholder="Apellidos" value="<?= $user['APELLIDO_USUARIO'] ?>" 
                                               pattern="[a-zA-Z ñÑáéíóúÁÉÍÓÚàÀèÈìÌòÒùÙäÄëËïÏöÖüÜ]{2,}" 
                                               title="No debe incluir números ni símbolos">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <label for="RG_TELEFONO_USUARIO" class="control-label text-left">Telefono</label>
                                        <input type="text" style="text-transform:uppercase;" name="RG_TELEFONO_USUARIO" id="RG_TELEFONO_USUARIO" class="form-control" placeholder="Telefono" value="<?= $user['TELEFONO_USUARIO'] ?>" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_ID_ROL" class="control-label text-left"  >Rol</label>
                                        <select name="RG_ID_ROL" id="RG_ID_ROL" class="form-control">
                                            <?PHP
                                            if ($roles) {
                                                foreach ($roles as $rol) {

                                                    $sel = '';

                                                    if ($rol['ID_ROL'] == $user['ID_ROL'])
                                                        $sel = 'selected';
                                                    ?>
                                                    <option value="<?= $rol['ID_ROL'] ?>" <?= $sel ?>>
                                                        <?= $rol['NOMBRE_ROL'] ?>
                                                    </option>
                                                    <?PHP
                                                }
                                            }
                                            else {
                                                ?>
                                                <option value="">No existen registros</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN DE COL-MD 6 -->
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_EMAIL_USUARIO" class="control-label text-left"  >Email</label>
                                        <input type="email" style="text-transform:uppercase;" name="RG_EMAIL_USUARIO" required id="RG_EMAIL_USUARIO" class="form-control" placeholder="Email" value="<?= $user['EMAIL_USUARIO'] ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_PASSWORD_USUARIO" class="control-label text-left"  >Contraseña</label>
                                        <input type="password" name="RG_PASSWORD_USUARIO" id="RG_PASSWORD_USUARIO" required class="form-control" placeholder="password" value="<?= $user['PASSWD_USUARIO'] ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-danger pull-left" id="btnCancelEditUser">
                        <i class="fa fa-backward" aria-hidden="true"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary pull-right">
                        <i class="fa fa-save" aria-hidden="true"></i> Guardar usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-sm-1">
    <br>
</div>
</div>
<div class="modal fade" id="modEditUser" tabindex="-1" role="dialog" aria-labelledby="modEditUser" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Usuario actualizado</h4>
            </div>
            <div class="modal-body text-center" id="modBodyEditUser">

            </div>
            <div class="clear"></div>
            <div class="modal-footer">
                <div class="btn-group "> 
                    <button class="btn btn-primary" type="button"  id="btnOkAdvice"  data-dismiss="modal">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>  Entiendo
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>