<style>
    #dataShipment_filter input {
        outline: 0px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
    }
    #dataShipment_length{
        margin-left: 15px ;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>TIPOS DE ENVIO</h2>
                <a href="<?= base_url() ?>Manager_shipments/form_add_shipments" class="btn btn-primary pull-right">
                    <i class="fa fa-user-plus" aria-hidden="true"></i> Nuevo tipo
                </a>
            </div>
            <div class="card-body">
                <div class="basic-data-table">
                    <table id="dataShipment" class="table nowrap dataTable no-footer" style="font-size: 14px;" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th data-orderable="false" style="text-align: center; width: 20%;">Acciones</th>
                                <th style="width: 40%">Tipo</th>
                                <th style="width: 40%">Precio</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:12px;">
                            <?php
                            if ($shipments) {
                                foreach ($shipments as $shipment) {
                                    ?>

                                    <tr>
                                        <td style="text-align: center;">
                                            <button id="btnEditShipment" class="btn btn-primary btn-edit-shipment" data-original-title="Editar informacion" data-toggle="tooltip" data-id-shipment="<?= $shipment['ID_TIPO_ENVIO'] ?>" style=" padding: 2px 5px !important;">
                                                <i class="fa fa-edit fa-1x" aria-hidden="true"></i>
                                            </button>
                                            <button id="btnDeleteShipment" class="btn btn-danger btn-delete-shipment" data-original-title="Borrar registro" data-toggle="tooltip" data-id-shipment="<?= $shipment['ID_TIPO_ENVIO'] ?>" style=" padding: 2px 5px !important;">
                                                <i class="fa fa-trash fa-1x" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                        <td><?= $shipment['NOMBRE_TIPO_ENVIO'] ?></td>
                                        <td><?= $shipment['PRECIO_TIPO_ENVIO'] ?></td>
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
<!-- modal eliminar -->
<div class="modal fade" id="modDelShipment" tabindex="-1" role="dialog" aria-labelledby="modCategory" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" style="color:#FFF;" aria-label="Close"><span style="color:#FFF;" aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Borrado de envio</h4>
            </div>
            <div class="modal-body text-center" id="modBodyDelShipment"></div>
            <div class="clear"></div>
            <div class="modal-footer">
                <div class="btn-group ">
                    <button class="btn btn-default" type="button"  data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                    </button>
                    <button class="btn btn-primary" type="button"  id="btnDelShipment">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>  Si, borrar
                    </button>
                </div>       
            </div>
        </div>
    </div>
</div> 