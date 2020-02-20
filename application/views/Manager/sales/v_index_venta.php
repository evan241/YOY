<style>
    #dataVentas_filter input {
        outline: 0px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
    }
    #dataVentas_length{
        margin-left: 15px ;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>VENTAS</h2>
            </div>
            <div class="card-body">
                <form id="formSearchCuentas" action="<?= base_url(); ?>Manager_sales/sales" method="post">
                    <input type="hidden" name="RG_BUSCAR" id="RG_BUSCAR" value="1">
                    <div class="row">
                        <div class='col-md-4' style="text-align: left">
                            <label for="RG_FECHA_INICIAL" class="control-label text-left"  >Fecha inicial</label>
                        </div>
                        <div class='col-md-4' style="text-align: left">
                            <label for="RG_FECHA_FINAL" class="control-label text-left"  >Fecha final</label>
                        </div>
                        <div class='col-md-2'></div>
                        <div class='col-md-2'></div>
                    </div>
                    <div class="row">
                        <div class='col-md-4'>
                            <div class='input-group'>
                                <span class="input-group-addon"><i class="fas fa-calendar"></i>&nbsp;</span>
                                <input type='text' readonly data-type="datepicker" class="form-control" id="RG_FECHA_INICIAL" required name="RG_FECHA_INICIAL" placeholder="Desde" value="<?= $fechaini ?>" />
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class='input-group'>
                                <span class="input-group-addon"><i class="fas fa-calendar"></i>&nbsp;</span>
                                <input type='text' readonly data-type="datepicker" class="form-control" id="RG_FECHA_FINAL" required name="RG_FECHA_FINAL" placeholder="Hasta" value="<?= $fechafin ?>" />
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class="btn-group pull-left">
                                <button type="submit" id="btnCargaVentas" class="btn btn-primary" >
                                    <i class="fa fa-cloud-download" aria-hidden="true"></i>  Cargar
                                </button>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </form>
                <div class="basic-data-table">
                    <table id="dataVentas" class="table nowrap dataTable no-footer" style="font-size: 14px;" cellspacing="0" width="100%">
                        <thead class="text-center">
                            <tr>
                                <th data-orderable="false" width="5%">#</th>
                                <th data-orderable="false" width="15%">Acciones</th>
                                <th width="10%">Usuario</th>
                                <th width="10%">Producto</th>
                                <th width="10%">Cant</th>
                                <!--<th width="10%">Precio</th>
                                <th width="10%">Costo Envío</th>-->
                                <th width="10%">Total</th>
                                <th width="10%">Fecha</th>
                                <th width="10%">Estatus</th>
                                <th width="10%">Medio de pago</th>
                                <th width="10%">Tipo de envío</th>
                            </tr>
                        </thead>
                        <tbody class="text-center"style="font-size:12px;">
                            <?php
                            if ($sales) {
                                foreach ($sales as $sale) {
                                    $style = 'style="background:' . $sale['status_back'] . "; " . "color:" . $sale['status_color'] . ';"';
                                    ?>
                                    <tr>
                                        <td><b><?= $sale['ID_VENTA'] ?></b></td>
                                        <td>
                                            <button id="btnViewSale" class="btn btn-primary btn-view-sale " data-original-title="Ver info de venta" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-sale="<?= $sale['ID_VENTA'] ?>">
                                                <i class="fa fa-eye fa-1x" aria-hidden="true"></i>
                                            </button>
                                            <?php if ($sale['STATUS_VENTA'] != CANCELADA) { ?>
                                                <button id="btnCancelSale" class="btn btn-danger btn-cancel-sale" data-original-title="Cancelar venta" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-sale="<?= $sale['ID_VENTA'] ?>">
                                                    <i class="fa fa-times-circle fa-1x" aria-hidden="true"></i>
                                                </button>
                                            <?php } ?>
                                            <?php if ($sale['paypal_error_id'] > 0) { ?>
                                                <button id="btnFixSale" class="btn btn-warning btn-fix-sale" data-original-title="Arreglar venta" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-error="<?= $sale['paypal_error_id'] ?>">
                                                    <i class="fa fa-exclamation-triangle fa-1x" aria-hidden="true"></i>
                                                </button>
                                            <?php } ?>
                                            <?php if ($sale['paypal_order_id']) { ?>
                                                <button id="btnPaypalSale" class="btn btn-default btn-paypal-sale" data-original-title="Informacion Paypal" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-paypal="<?= $sale['paypal_order_id'] ?>">
                                                    <i class="fa fa-info fa-1x" aria-hidden="true"></i>
                                                </button>
                                            <?php } ?>
                                        </td>
                                        <td><?= mb_strtoupper($sale['EMAIL_USUARIO']) ?></td>
                                        <td><?= mb_strtoupper($sale['NOMBRE_PRODUCTO']) ?></td>
                                        <td><?= mb_strtoupper($sale['CANTIDAD_VENTA']) ?></td>
                                        <!--<td><?= to_currency($sale['PRECIO_PRODUCTO_VENTA']) ?></td>
                                        <td><?= to_currency($sale['COSTO_ENVIO_VENTA']) ?></td>-->
                                        <td><?= to_currency($sale['TOTAL_VENTA']) ?></td>
                                        <td><?= $sale['FECHA_VENTA']; ?></td>
                                        <td><span class="status-span" <?= $style ?>><?= $sale['status'] ?></span></td>
                                        <td><?= $sale['NOMBRE_MEDIO_PAGO'] ?></td>
                                        <td><?= $sale['NOMBRE_TIPO_ENVIO'] ?></td>
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
    </div>
</div>

<div class="modal fade" id="modDelSale" tabindex="-1" role="dialog" aria-labelledby="modDelSale" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Cancelar venta</h4>
            </div>
            <div class="modal-body text-center" id="modBodyDelSale">
            </div>
            <div class="clear"></div>
            <div class="modal-footer">
                <div class="btn-group ">
                    <button class="btn btn-default " type="button" id="btnCancel" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                    </button>
                    <button class="btn btn-primary" type="button" id="btnDelRowSale">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Si, cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>