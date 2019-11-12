
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-2 text-center">
            <?php $this->view('Manager/v_navbar_venta'); ?>
        </div>
        <div class="col-sm-10 text-center">
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading header-primary">
                    <div class="panel-title text-left"><h2 class="heading-primary">Ventas</h2></div>
                </div>

                <div class="panel-body">
                    <?php
                    if ($this->session->userdata('YOY_ID_ROL') == ADMINISTRADOR):
                        $disabled = '';
                    else:
                        $disabled = 'disabled';
                    endif;
                    ?>
                    <div style="clear:both"><br></div>
                    <div class="control-group text-left">
                        <div class="table-responsive">  

                            <table id="dataProducts" class="table text-center" style="font-size: 14px;" cellspacing="0" width="100%">
                                <thead>
                                    <tr >
                                        <th class=" text-center">Id de venta</th>
                                        <th class=" text-center">Usuario</th>
                                        <th class=" text-center">Producto</th>
                                        <th class=" text-center">Cantidad</th>
                                        <th class=" text-center">Fecha</th>
                                        <th class=" text-center">Estatus</th>
                                        <th class=" text-center">Medio de pago</th>
                                        <th class=" text-center">Tipo de envío</th>
                                        <th class=" text-center">Activa</th>
                                        <th style="text-align: center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px;">
                                    <?php
                                    if (count($ROW_SALES)):
                                        foreach ($ROW_SALES as $ROW):
                                            $ACTIVA = $ROW['ACTIVA_VENTA']==1?'<i style="color:green" class="fa fa-check fa-2x" aria-hidden="true"></i>':'<i style="color:red" class="fa fa-times fa-2x" aria-hidden="true"></i>';
                                            $ESTATUS = "VALIDANDO PAGO";
                                            ?>
                                            <tr>
                                                <td><b><?= $ROW['ID_VENTA'] ?></b></td>
                                                <td><?= mb_strtoupper($ROW['NOMBRE_USUARIO']." ".$ROW['APELLIDO_USUARIO']) ?></td>
                                                <td><?= mb_strtoupper($ROW['NOMBRE_PRODUCTO']) ?></td>
                                                <td><?= $ROW['CANTIDAD_VENTA'] ?></td> 
                                                <td><?= $ROW['FECHA_VENTA'] ?></td>
                                                <td><?= $ESTATUS ?></td>
                                                <td><?= $ROW['NOMBRE_MEDIO_PAGO'] ?></td>
                                                <td><?= $ROW['NOMBRE_TIPO_ENVIO'] ?></td>
                                                <td><?= $ACTIVA ?></td>
                                                <td style="width: 15%">
                                                    <button id="btnViewUser" class="btn btn-primary btn-view-user " data-original-title="Ver info de usuario" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-sale="<?= $ROW['ID_VENTA'] ?>">
                                                        <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                                                    </button>
                                                    <button id="btnCancelSale" <?= $disabled ?> class="btn btn-primary btn-cancel-sale" data-original-title="Cancelar venta" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-sale="<?= $ROW['ID_VENTA'] ?>" >
                                                        <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer"><br></div>
            </div>
            <div><br></div>
        </div>
    </div>
</div>
<div class="modal fade" id="modCustomer" tabindex="-1" role="dialog" aria-labelledby="modCustomer" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Borrado de producto</h4>
            </div>
            <div class="modal-body text-center" id="modBodyCustomer">
            </div>
            <div class="clear"></div>
            <div class="modal-footer">
                <div class="btn-group "> 

                    <button class="btn btn-default" type="button"  id="btnCancel"  data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                    </button>

                    <button class="btn btn-primary" type="button"  id="btnDelRowClient">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>  Si, borrar
                    </button>
                </div>       
            </div>
        </div>
    </div>
</div>  

