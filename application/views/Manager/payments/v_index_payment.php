<style>
    #dataPayment_filter input {
        outline: 0px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
    }
    #dataPayment_length{
        margin-left: 15px ;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>MEDIOS DE PAGO</h2>
            </div>
            <div class="card-body">
                <div class="basic-data-table">
                    <table id="dataPayment"  class="display" style="font-size: 14px; background-color: white;" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th data-orderable="false" style="text-align: center; width: 20%;">Activar / Desactivar</th>
                                <th style="width: 50%">Tipo</th>
                                <th style="width: 30%">Status</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:12px;">
                            <?php
                            if ($payments) {
                                foreach ($payments as $payment) {
                                    $status = ($payment['ACTIVO_MEDIO_PAGO'] == 0) ? 'DESACTIVADO' : 'ACTIVADO';
                                    $class_btn = ($payment['ACTIVO_MEDIO_PAGO'] == 0) ? 'btn-success' : 'btn-danger';
                                    $tooltip = ($payment['ACTIVO_MEDIO_PAGO'] == 0) ? 'Activar' : 'Desactivar';
                                    ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <button id="btnTogglePayment" class="btn <?=$class_btn?> btn-toggle-payment" data-original-title="<?= $tooltip ?>" data-toggle="tooltip" data-id-payment="<?= $payment['ID_MEDIO_PAGO'] ?>" style=" padding: 2px 5px !important;">
                                                <i class="fa fa-sync fa-1x" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                        <td><?= $payment['NOMBRE_MEDIO_PAGO'] ?></td>
                                        <td><?= $status ?></td>
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
<div class="modal fade" id="modDelCategory" tabindex="-1" role="dialog" aria-labelledby="modCategory" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" style="color:#FFF;" aria-label="Close"><span style="color:#FFF;" aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Tipo de pago</h4>
            </div>
            <div class="modal-body text-center" id="modBodyDelCategory"></div>
            <div class="clear"></div>
            <div class="modal-footer">
                <div class="btn-group ">
                    <button class="btn btn-default" type="button"  data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                    </button>
                    <button class="btn btn-primary" type="button"  id="btnDelCategory">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>  Si, hacer
                    </button>
                </div>       
            </div>
        </div>
    </div>
</div> 