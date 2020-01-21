<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 text-left">
            <br>
            <form data-toggle="validator" role="form" id="formRecordProduct">
                <div class="panel panel-primary">
                    <div class="panel-heading header-primary">
                        <div class="panel-title text-left"><h2 class="heading-primary">Nuevo Producto</h2></div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_ID_CATEGORIA" class="control-label text-left"  >Categoría</label>
                                <select name="RG_ID_CATEGORIA" id="RG_ID_CATEGORIA" class="form-control">

                                    <?php

                                    if ($categories) {

                                        echo '<option value="">Seleccionar</option>';

                                        foreach ($categories as $category) { ?>

                                            <option value="<?= $category['ID_CATEGORIA'] ?>"><?= mb_strtoupper($category['NOMBRE_CATEGORIA']) ?></option>
                                            
                                            <?php
                                        }
                                    }
                                    else {
                                        ?>
                                        <option value="-1">No existen registros</option>
                                        <?php
                                    }
                                    ?>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_CODIGO_PRODUCTO" class="control-label text-left"  >Código</label>
                                <input type="text" name="RG_CODIGO_PRODUCTO" id="RG_CODIGO_PRODUCTO" class="form-control" required placeholder="Código del producto">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_NOMBRE_PRODUCTO" class="control-label text-left"  >Nombre</label>
                                <input type="text" name="RG_NOMBRE_PRODUCTO" onkeyUp="this.value = this.value.toUpperCase()" id="RG_NOMBRE_PRODUCTO" class="form-control" required placeholder="Nombre del producto">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>      
                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label for="RG_DESCRIPCION_PRODUCTO" class="control-label text-left"  >Descripción</label>
                                <input type="text" name="RG_DESCRIPCION_PRODUCTO" onkeyUp="this.value = this.value.toUpperCase()" id="RG_DESCRIPCION_PRODUCTO" class="form-control" placeholder="Descripción del producto">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_COSTO_PRODUCTO" class="control-label text-left"  >Costo</label>
                                <input type="text" name="RG_COSTO_PRODUCTO" id="RG_COSTO_PRODUCTO" class="form-control" placeholder="Costo del producto">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_PRECIO_PRODUCTO" class="control-label text-left"  >Precio</label>
                                <input type="text" name="RG_PRECIO_PRODUCTO" id="RG_PRECIO_PRODUCTO" class="form-control" placeholder="Precio al público">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_STOCK_PRODUCTO" class="control-label text-left"  >Stock</label>
                                <input type="text" name="RG_STOCK_PRODUCTO" id="RG_STOCK_PRODUCTO" class="form-control" placeholder="Existencia del producto">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_STOCK_MINIMO_PRODUCTO" class="control-label text-left"  >Stock Mínimo</label>
                                <input type="text" name="RG_STOCK_MINIMO_PRODUCTO" id="RG_STOCK_MINIMO_PRODUCTO" class="form-control" placeholder="Existencia del producto">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_ACTIVO_PRODUCTO" class="control-label text-left"><input id="RG_ACTIVO_PRODUCTO" name="RG_ACTIVO_PRODUCTO" type="checkbox" value="1" checked> Activo</label>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">

                        <div class="btn-group pull-right"><br>
                            <a href="<?= base_url() ?>productos/index" class="btn btn pull-left" id="btnCloseAddProduct">
                                <i class="fa fa-remove" aria-hidden="true"></i>
                            Cancelar</a>
                            <button type="submit" class="btn btn-default pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Guardar producto</button>
                        </div>
                        <div style="clear:both"><br></div>
                    </div>
                </div> 
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</div>



<div class="modal fade" id="modCustomer" tabindex="-1" role="dialog" aria-labelledby="modCustomer" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Alta de productos</h4>
            </div>
            <div class="modal-body" id="modBodyCustomer">
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

