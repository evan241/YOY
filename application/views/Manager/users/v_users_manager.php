<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 text-center">
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading header-primary">
                    <div class="panel-title text-left"><h2 class="heading-primary">Usuarios</h2></div>
                </div>
                <div class="panel-body">
                    <a href="<?= base_url() ?>manager_users/form_config_add_user" class="btn btn-default pull-right" id="btnAddUser">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> Nuevo usuario
                    </a>
                    <div style="clear:both"><br></div>
                    <div class="control-group text-left">
                        <div class="table-responsive">
                            <table id="dataUser"  class="display" style="font-size: 14px; background-color: white;" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="text" name="search_nombre" placeholder="Nombre" class="search_init form-control" size="15" /></th>
                                        <th><input type="text" name="search_apellido" placeholder="Apellido" class="search_init form-control" size="15" /></th>
                                        <th><input type="text" name="search_telefono" placeholder="Telefono" class="search_init form-control" size="15" /></th>
                                        <th><input type="text" name="search_email" placeholder="Email" class="search_init form-control" size="8" /></th>
                                        <th><input type="text" name="search_registro" placeholder="Rol"  class="search_init form-control" size="8" /></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Nombre</th>
                                        <th style="width: 20%">Apellido</th>
                                        <th style="width: 15%">Telefono</th>
                                        <th style="width: 15%">Email</th>
                                        <th style="width: 15%">Rol</th>
                                        <th style="text-align: center; width: 10%;">Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"><br></td>
                                    </tr>
                                </tfoot>
                                <tbody style="font-size:12px;">
                                    <?php
                                    if ($users) {
                                        foreach ($users as $user) {
                                            ?>
                                            <tr>
                                                <td><?= $user['NOMBRE_USUARIO'] ?></td>
                                                <td><?= $user['APELLIDO_USUARIO'] ?></td>
                                                <td><?= $user['TELEFONO_USUARIO'] ?></td>
                                                <td><?= $user['EMAIL_USUARIO'] ?></td>
                                                <td><?= $user['NOMBRE_ROL'] ?></td>
                                                <td>
                                                    <button id="btnEditUser" class="btn btn-primary btn-edit-user" data-original-title="Editar info usuario" data-toggle="tooltip" data-id-user="<?= $user['ID_USUARIO']?>" style=" padding: 2px 5px !important;">
                                                        <i class="fa fa-edit fa-2x" aria-hidden="true"></i>
                                                    </button>
                                                    <button id="btnDeleteUser" class="btn btn-primary btn-delete-user" data-original-title="Borrar usuario" data-toggle="tooltip" data-id-user="<?= $user['ID_USUARIO']?>" style=" padding: 2px 5px !important;">
                                                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div style="clear:both"></div>
                </div>
            </div>
        </div>
    </div>
    
</div><br><br><br><br><br><br><br><br><br>

<!-- modal eliminar -->

<div class="modal fade" id="modDelUser" tabindex="-1" role="dialog" aria-labelledby="modCustomer" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" style="color:#FFF;" aria-label="Close"><span style="color:#FFF;" aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Borrado de usuario</h4>
            </div>
            <div class="modal-body text-center" id="modBodyDelUser">
            </div>
            <div class="clear"></div>
            <div class="modal-footer">
                <div class="btn-group ">
                    <button class="btn btn-default" type="button"  data-dismiss="modal">
                       <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                    </button>
                    <button class="btn btn-primary" type="button"  id="btnDelRowUser">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>  Si, borrar
                    </button>
                </div>       
            </div>
        </div>
    </div>
</div> 