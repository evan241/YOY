<div class="container-fluid">
    <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-10 text-center">
            <br>
            <div class="panel panel-primary">
                <form data-toggle="validator" role="form" id="formEditUser">
                <input type="hidden" value="<?=$ROW_DATA_USER[0]['ID_USUARIO']?>" name="RG_ID_USUARIO" id="RG_ID_USUARIO" > 
                <div class="panel-heading header-primary">
                    <div class="panel-title text-left"><h2 class="heading-primary">Editar usuario</h2></div>
                </div>
                <div class="panel-body">
                    <div class="control-group text-left">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading text-left"><label class="label-heading-default">Perfíl</label></div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="RG_NOMBRE_USUARIO" class="control-label text-left" >Nombre(s)</label>
                                            <input type="text" style="text-transform:uppercase;" name="RG_NOMBRE_USUARIO" required id="RG_NOMBRE_USUARIO" class="form-control" placeholder="Nombre del usuario" value="<?=$ROW_DATA_USER[0]['NOMBRE_USUARIO']?>">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>      
                                    <div class="col-md-12">
                                        <div class="form-group"> 
                                            <label for="RG_APELLIDO_USUARIO" class="control-label text-left">Apellido</label>
                                            <input type="text" style="text-transform:uppercase;" name="RG_APELLIDO_USUARIO" required id="RG_APELLIDO_USUARIO" class="form-control" placeholder="Apellidos" value="<?=$ROW_DATA_USER[0]['APELLIDO_USUARIO']?>" >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="RG_ID_ROL" class="control-label text-left"  >Rol</label>
                                            <select name="RG_ID_ROL" id="RG_ID_ROL" class="form-control">
                                                <?PHP
                                                if (count($ROW_ROLES) > NULO):
                                                    foreach ($ROW_ROLES as $ROW):
                                                        $sel='';
                                                        if($ROW['ID_ROL']==$ROW_DATA_USER[0]['ID_ROL']) $sel='selected';
                                                        ?>
                                                        <option value="<?= $ROW['ID_ROL'] ?>" <?= $sel ?>>
                                                            <?= $ROW['NOMBRE_ROL'] ?>
                                                        </option>
                                                        <?PHP
                                                    endforeach;
                                                else:
                                                    ?>
                                                    <option value="">No existen registros</option>
                                                <?php
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        &nbsp;
                                    </div>
                                    <div style="clear:both"></div>
                                    
                                    <div style="clear:both"></div>
                                </div>
                            <!--FIN DE COL-MD 6 -->
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading text-left"><label class="label-heading-default">Datos de acceso</label></div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="RG_USERNAME_USUARIO" class="control-label text-left"  >Usuario</label>
                                            <input type="text" style="text-transform:uppercase;" name="RG_USERNAME_USUARIO" id="RG_USERNAME_USUARIO" class="form-control" placeholder="Email" value="<?=$ROW_DATA_USER[0]['USERNAME_USUARIO']?>">
                                             <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="RG_NICKNAME_USUARIO" class="control-label text-left"  >Usuario</label>
                                            <input type="text" name="RG_NICKNAME_USUARIO" required id="RG_NICKNAME_USUARIO" class="form-control" placeholder="nickname" value="<?php //echo $ROW_DATA_USER[0]['NICKNAME_USUARIO']?>">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="RG_PASSWORD_USUARIO" class="control-label text-left"  >Contraseña</label>
                                            <input type="text" name="RG_PASSWORD_USUARIO" id="RG_PASSWORD_USUARIO" required class="form-control" placeholder="password" value="<?=$ROW_DATA_USER[0]['PASSWD_USUARIO']?>">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="btn-group pull-right">
                                               
                        <button type="button" class="btn pull-left" id="btnCancelEditUser">
                            <i class="fa fa-remove" aria-hidden="true"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Actualizar datos
                        </button>
                    </div>
                    <div style="clear:both"></div>
                </div>
                </form>
                
            </div>
        </div>
        <div class="col-sm-1">
            <br>
        </div>
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