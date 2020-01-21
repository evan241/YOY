<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 text-center">
            <br>
            <form data-toggle="validator" role="form" id="formRecordCategory">
                <div class="control-group text-left">
                    <div class="panel panel-default">
                        <div class="panel-heading header-primary">
                            <div class="panel-title text-left"><h2 class="heading-primary">Nueva categoría</h2></div>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="RG_NOMBRE_CATEGORIA" class="control-label text-left"  >Nombre categoría</label>
                                    <input type="text" name="RG_NOMBRE_CATEGORIA" id="RG_NOMBRE_CATEGORIA" class="form-control" required placeholder="Nombre del producto">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="btn-group pull-right"><br>
                                <a href="<?= base_url() ?>productos/categorias" class="btn btn pull-left" id="btnCloseAddCategory">
                                    <i class="fa fa-remove" aria-hidden="true"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-default pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Guardar categoría
                                </button>
                            </div>
                            <div style="clear:both"><br></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</div>

<div class="modal fade" id="modAddCategory" tabindex="-1" role="dialog" aria-labelledby="modAddCategory" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Alta de categorías</h4>
            </div>
            <div class="modal-body" id="modBodyAddCategory">
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

