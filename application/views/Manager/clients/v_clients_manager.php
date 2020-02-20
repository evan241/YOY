<style>
    #dataClient_filter input {
        outline: 0px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
    }
    #dataClient_length{
        margin-left: 15px ;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>CLIENTES</h2>
            </div>
            <div class="card-body">
                <div class="basic-data-table">
                    <table id="dataClient" class="table nowrap dataTable no-footer" style="font-size: 14px;" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th data-orderable="false" style="text-align: center; width: 20%;">Acciones</th>
                                <th style="width: 20%">Nombre</th>
                                <th style="width: 20%">Apellido</th>
                                <th style="width: 20%">Telefono</th>
                                <th style="width: 20%">Email</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:12px;">
                            <?php
                            if ($users) {
                                foreach ($users as $user) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <button id="btnEditClient" class="btn btn-primary btn-edit-client" data-original-title="Editar cliente" data-toggle="tooltip" data-id-client="<?= $user['ID_USUARIO'] ?>" style=" padding: 2px 5px !important;">
                                                <i class="fa fa-edit fa-1x" aria-hidden="true"></i>
                                            </button>
                                            <button id="btnDeleteClient" class="btn btn-danger btn-delete-client" data-original-title="Borrar cliente" data-toggle="tooltip" data-id-client="<?= $user['ID_USUARIO'] ?>" style=" padding: 2px 5px !important;">
                                                <i class="fa fa-trash fa-1x" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                        <td><?= $user['NOMBRE_USUARIO'] ?></td>
                                        <td><?= $user['APELLIDO_USUARIO'] ?></td>
                                        <td><?= $user['TELEFONO_USUARIO'] ?></td>
                                        <td><?= $user['EMAIL_USUARIO'] ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>   
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>
<!--modal eliminar -->
<div class="modal fade" id="modDelUser" tabindex="-1" role="dialog" aria-labelledby="modCustomer" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" style="color:#FFF;" aria-label="Close"><span style="color:#FFF;" aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Eliminar cliente</h4>
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