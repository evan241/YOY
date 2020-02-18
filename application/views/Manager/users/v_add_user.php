<div class="row">
    <div class="col-sm-12 text-left">
        <div class="card card-default">
            <form data-toggle="validator" role="form" id="formRecordUser">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>NUEVO USUARIO</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="RG_NOMBRE_USUARIO" class="control-label text-left" >Nombre(s)</label>
                                        <input type="text" style="text-transform:uppercase;" name="RG_NOMBRE_USUARIO" required id="RG_NOMBRE_USUARIO" class="form-control" placeholder="Nombre(s)"
                                               pattern="[a-zA-Z ñÑáéíóúÁÉÍÓÚàÀèÈìÌòÒùÙäÄëËïÏöÖüÜ]{2,}" 
                                               title="No debe incluir números ni símbolos">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"> 
                                        <label for="RG_APELLIDOS_USUARIO" class="control-label text-left">Apellidos</label>
                                        <input type="text" style="text-transform:uppercase;" name="RG_APELLIDOS_USUARIO" required id="RG_APELLIDOS_USUARIO" class="form-control" placeholder="Apellidos" 
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
                                        <input type="text" style="text-transform:uppercase;" name="RG_TELEFONO_USUARIO" id="RG_TELEFONO_USUARIO" class="form-control" placeholder="Telefono">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_ID_ROL" class="control-label text-left"  >Rol</label>
                                        <select required name="RG_ID_ROL" id="RG_ID_ROL" class="form-control">
                                            <option value="">Seleccionar</option>
                                            <?PHP
                                            if ($roles) {
                                                foreach ($roles as $rol) {
                                                    if ($rol['ID_ROL'] != 3) {
                                                        ?>
                                                        <option value="<?= $rol['ID_ROL'] ?>">
                                                            <?= $rol['NOMBRE_ROL'] ?>
                                                        </option>
                                                        <?PHP
                                                    }
                                                }
                                            } else {
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
                                        <input type="email" style="text-transform:uppercase;" name="RG_EMAIL_USUARIO" id="RG_EMAIL_USUARIO" class="form-control" placeholder="Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_PASSWORD_USUARIO" class="control-label text-left"  >Contraseña</label>
                                        <input type="password" name="RG_PASSWORD_USUARIO" id="RG_PASSWORD_USUARIO" required class="form-control" placeholder="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-danger pull-left" id="btnCancelAddUser">
                        <i class="fa fa-backward" aria-hidden="true"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary pull-right">
                        <i class="fa fa-save" aria-hidden="true"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modAddUser" tabindex="-1" role="dialog" aria-labelledby="modAddUser" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Usuario dado de alta</h4>
            </div>
            <div class="modal-body text-center" id="modBodyAddUser"></div>
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