<div class="container-fluid">
    <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-10 text-center">
            <br>
            <div class="panel panel-primary">
                <form data-toggle="validator" role="form" id="formRecordShipment">
                    <div class="panel-heading header-primary">
                        <div class="panel-title text-left"><h2 class="heading-primary">Agregar tipo de envio</h2></div>
                    </div>
                    <div class="panel-body">
                        <div class="control-group text-left">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" style="text-transform:uppercase;" name="RG_NOMBRE_ENVIO" required id="RG_NOMBRE_ENVIO" class="form-control" placeholder="Nombre del envio">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>  

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" style="text-transform:uppercase;" name="RG_PRECIO_ENVIO" required id="RG_PRECIO_ENVIO" class="form-control" placeholder="Precio del envio">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>  

                                    </div>
                                </div>
                                <div class="panel-footer"><br>
                                    <div class="btn-group pull-right">

                                        <button type="button" class="btn " id="btnCancelAddShipment" onclick="window.location.href='<?= base_url() ?>manager_shipments/shipments'">
                                            <i class="fa fa-remove" aria-hidden="true"></i> Cancelar
                                        </button>

                                        <button type="submit" class="btn btn-primary pull-right">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar
                                        </button>

                                    </div>
                                    <div style="clear:both"><br></div>
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="col-sm-1">
                        <br>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modAddShipment" tabindex="-1" role="dialog" aria-labelledby="modAddShipment" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalTitleAdvice">Tipo de envio dado de alta</h4>
                        </div>
                        <div class="modal-body text-center" id="modBodyAddShipment">

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