<div class="row">
    <div class="col-sm-12 text-left">
        <div class="card card-default">
            <form data-toggle="validator" role="form" id="formEditCategory">
                <input type="hidden" value="<?= $category['ID_CATEGORIA'] ?>" name="RG_ID_CATEGORIA" id="RG_ID_CATEGORIA" > 
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>EDITAR CATEGORIA</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" style="text-transform:uppercase;" name="RG_NOMBRE_CATEGORIA" required id="RG_NOMBRE_CATEGORIA" class="form-control" placeholder="Nombre de la categoria" value="<?= $category['NOMBRE_CATEGORIA'] ?>">
                                <div class="help-block with-errors"></div>
                            </div>                  
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-danger pull-left" onclick="window.location.href = '<?= base_url() ?>Manager_categories/categories'">
                        <i class="fa fa-backward" aria-hidden="true"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary pull-right">
                        <i class="fa fa-save" aria-hidden="true"></i> Aceptar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modEditCategory" tabindex="-1" role="dialog" aria-labelledby="modEditCategory" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Editar categoría</h4>
            </div>
            <div class="modal-body text-center" id="modBodyEditCategory"></div>
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