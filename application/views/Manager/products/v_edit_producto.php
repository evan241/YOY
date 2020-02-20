<div class="row">
    <div class="col-sm-12 text-left">
        <form data-toggle="validator" role="form" id="formEditProduct">
            <input type="hidden" value="<?= $product['ID_PRODUCTO'] ?>" name="RG_ID_PRODUCTO" id="RG_ID_PRODUCTO">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>EDITAR PRODUCTO</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_ID_CATEGORIA" class="control-label text-left"  >Categoría</label>
                                <select name="RG_ID_CATEGORIA" id="RG_ID_CATEGORIA" class="form-control">

                                    <?PHP
                                    if ($product) {

                                        foreach ($categories as $category) {

                                            $selected = "";
                                            $selected = ($category['ID_CATEGORIA'] == $product['ID_CATEGORIA']) ? 'selected="selected"' : '';
                                            ?>
                                            <option <?= $selected ?> value="<?= $category['ID_CATEGORIA'] ?>">
                                                <?= mb_strtoupper($category['NOMBRE_CATEGORIA']) ?>
                                            </option>
                                            <?PHP
                                        }
                                    } else {
                                        ?>
                                        <option value="">No existen registros</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_CODIGO_PRODUCTO" class="control-label text-left"  >Código Primario</label>
                                <input type="text" name="RG_CODIGO_PRODUCTO" id="RG_CODIGO_PRODUCTO" class="form-control" required placeholder="Código del producto" value="<?= $product['CODIGO_PRODUCTO'] ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_NOMBRE_PRODUCTO" class="control-label text-left"  >Nombre</label>
                                <input type="text" name="RG_NOMBRE_PRODUCTO" onkeyUp="this.value = this.value.toUpperCase()" id="RG_NOMBRE_PRODUCTO" class="form-control" required placeholder="Nombre del producto" value="<?= $product['NOMBRE_PRODUCTO'] ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label for="RG_DESCRIPCION_PRODUCTO" class="control-label text-left"  >Descripción</label>
                                <input type="text" name="RG_DESCRIPCION_PRODUCTO" onkeyUp="this.value = this.value.toUpperCase()" id="RG_DESCRIPCION_PRODUCTO" class="form-control" placeholder="Descripción producto" value="<?= $product['DESCRIPCION_PRODUCTO'] ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_COSTO_PRODUCTO" class="control-label text-left"  >Costo</label>
                                <input type="text" name="RG_COSTO_PRODUCTO" id="RG_COSTO_PRODUCTO" class="form-control" placeholder="Costo del producto" value="<?= $product['COSTO_PRODUCTO'] ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_PRECIO_PRODUCTO" class="control-label text-left"  >Costo</label>
                                <input type="text" name="RG_PRECIO_PRODUCTO" id="RG_PRECIO_PRODUCTO" class="form-control" placeholder="Precio del producto" value="<?= $product['PRECIO_PRODUCTO'] ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_STOCK_PRODUCTO" class="control-label text-left"  >Stock</label>
                                <input type="text" name="RG_STOCK_PRODUCTO" id="RG_STOCK_PRODUCTO" class="form-control" placeholder="Existencia del producto" value="<?= $product['STOCK_PRODUCTO'] ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG_STOCK_MINIMO_PRODUCTO" class="control-label text-left"  >Stock Mínimo</label>
                                <input type="text" name="RG_STOCK_MINIMO_PRODUCTO" id="RG_STOCK_MINIMO_PRODUCTO" class="form-control" placeholder="Existencia del producto" value="<?= $product['STOCK_MINIMO_PRODUCTO'] ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="text-align: left;">
                    <a href="<?= base_url() ?>manager_products/products" class="btn btn-danger pull-left">
                        <i class="fa fa-remove" aria-hidden="true"></i>Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary pull-right">
                        <i class="fa fa-save" aria-hidden="true"></i> Guardar Producto
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="modProduct" tabindex="-1" role="dialog" aria-labelledby="modCustomer" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Editando Prductos</h4>
            </div>
            <div class="modal-body" id="modBodyProduct">
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

