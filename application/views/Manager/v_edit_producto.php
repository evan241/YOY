<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 text-center">
            <br>
            <form data-toggle="validator" role="form" id="formEditProduct">
                <input type="hidden" value="<?= $ROW_DATA_PRODUCT[0]['ID_PRODUCTO'] ?>" name="RG_ID_PRODUCTO" id="RG_ID_PRODUCTO" >
                <div class="control-group text-left">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading header-primary">
                                <div class="panel-title text-left"><h2 class="heading-primary">Editando producto</h2></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_ID_CATEGORIA" class="control-label text-left"  >Categoría</label>
                                        <select name="RG_ID_CATEGORIA" id="RG_ID_CATEGORIA" class="form-control">
                                            <?PHP
                                            if (count($ROW_DATA_CATEGORIES) > NULO):
                                                foreach ($ROW_DATA_CATEGORIES as $ROW):
                                                    $selected = "";
                                                    $selected = ($ROW['ID_CATEGORIA'] == $ROW_DATA_PRODUCT[0]['ID_CATEGORIA']) ? 'selected="selected"' : '';
                                                    ?>
                                                    <option <?= $selected ?> value="<?= $ROW['ID_CATEGORIA'] ?>">
                                                        <?= mb_strtoupper($ROW['NOMBRE_CATEGORIA']) ?>
                                                    </option>
                                                    <?PHP
                                                endforeach;
                                            else:
                                                ?>
                                                <option value="">No existen registros</option>
                                            <?php
                                            endif;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_ID_ALMACEN" class="control-label text-left"  >Almacen</label>
                                        <select name="RG_ID_ALMACEN" id="RG_ID_ALMACEN" class="form-control">
                                           <?PHP
                                            if (count($ROW_DATA_ALMACEN) > NULO):
                                                foreach ($ROW_DATA_ALMACEN as $ROW):
                                                    $selected = "";
                                                    $selected = ($ROW['ID_ALMACEN'] == $ROW_DATA_PRODUCT[0]['ID_ALMACEN']) ? 'selected="selected"' : '';
                                                    ?>
                                                    <option <?= $selected ?> value="<?= $ROW['ID_ALMACEN'] ?>">
                                                        <?= mb_strtoupper( $ROW['NOMBRE_ALMACEN']) ?>
                                                    </option>
                                                    <?PHP
                                                endforeach;
                                            else:
                                                ?>
                                                <option value="">No existen registros</option>
                                            <?php
                                            endif;
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_CODIGO_PRODUCTO" class="control-label text-left"  >Código Primario</label>
                                        <input type="text" name="RG_CODIGO_PRODUCTO" id="RG_CODIGO_PRODUCTO" class="form-control" required placeholder="Código del producto" value="<?= $ROW_DATA_PRODUCT[0]['CODIGO_PRODUCTO'] ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_CODIGO_PRODUCTO_SECUNDARIO" class="control-label text-left"  >Código Secundario</label>
                                        <input type="text" name="RG_CODIGO_PRODUCTO_SECUNDARIO" id="RG_CODIGO_PRODUCTO_SECUNDARIO" class="form-control" required placeholder="Código del producto" value="<?= $ROW_DATA_PRODUCT[0]['CODIGO_PRODUCTO_SECUNDARIO'] ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_NOMBRE_PRODUCTO" class="control-label text-left"  >Nombre</label>
                                        <input type="text" name="RG_NOMBRE_PRODUCTO" onkeyUp="this.value = this.value.toUpperCase()" id="RG_NOMBRE_PRODUCTO" class="form-control" required placeholder="Nombre del producto" value="<?= $ROW_DATA_PRODUCT[0]['NOMBRE_PRODUCTO'] ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>      
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <label for="RG_DESCRIPCION_PRODUCTO" class="control-label text-left"  >Descripción</label>
                                        <input type="text" name="RG_DESCRIPCION_PRODUCTO" onkeyUp="this.value = this.value.toUpperCase()" id="RG_DESCRIPCION_PRODUCTO" class="form-control" placeholder="Descripción producto" value="<?= $ROW_DATA_PRODUCT[0]['DESCRIPCION_PRODUCTO'] ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_COSTO_PRODUCTO" class="control-label text-left"  >Costo</label>
                                        <input type="text" name="RG_COSTO_PRODUCTO" id="RG_COSTO_PRODUCTO" class="form-control" placeholder="Costo del producto" value="<?= $ROW_DATA_PRODUCT[0]['COSTO_PRODUCTO'] ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_STOCK_PRODUCTO" class="control-label text-left"  >Stock</label>
                                        <input type="text" name="RG_STOCK_PRODUCTO" id="RG_STOCK_PRODUCTO" class="form-control" placeholder="Existencia del producto" value="<?= $ROW_DATA_PRODUCT[0]['STOCK_PRODUCTO'] ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_STOCK_MINIMO_PRODUCTO" class="control-label text-left"  >Stock Mínimo</label>
                                        <input type="text" name="RG_STOCK_MINIMO_PRODUCTO" id="RG_STOCK_MINIMO_PRODUCTO" class="form-control" placeholder="Existencia del producto" value="<?= $ROW_DATA_PRODUCT[0]['STOCK_MINIMO_PRODUCTO'] ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <?php
                                if ($ROW_DATA_PRODUCT[0]['PRESTAMO_PRODUCTO'] == 1)
                                    $check1 = "checked";
                                else
                                    $check1 = "";
                                if ($ROW_DATA_PRODUCT[0]['CONSUMO_PRODUCTO'] == 1)
                                    $check2 = "checked";
                                else
                                    $check2 = "";
                                ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_PRESTAMO_PRODUCTO" class="control-label text-left"><input id="RG_PRESTAMO_PRODUCTO" name="RG_PRESTAMO_PRODUCTO" type="checkbox" value="<?= $ROW_DATA_PRODUCT[0]['PRESTAMO_PRODUCTO'] ?>" <?= $check1 ?>> Préstamos</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RG_CONSUMO_PRODUCTO" class="control-label text-left"><input id="RG_CONSUMO_PRODUCTO" name="RG_CONSUMO_PRODUCTO" type="checkbox" value="<?= $ROW_DATA_PRODUCT[0]['CONSUMO_PRODUCTO'] ?>" <?= $check2 ?>> Consumo</label>
                                    </div>
                                </div>
                                <!--FIN DE COL-MD 6 -->
                            </div>  
                            <div class="panel-footer">

                                <div class="btn-group pull-right"><br>
                                    <a href="<?= base_url() ?>Productos/index" class="btn btn pull-left" id="btnCloseAddAgent">
                                        <i class="fa fa-remove" aria-hidden="true"></i>
                                        Cancelar</a>
                                    <button type="submit" class="btn btn-default pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        Guardar Producto</button>
                                </div>
                                <div style="clear:both"><br></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

<div class="modal fade" id="modCustomer" tabindex="-1" role="dialog" aria-labelledby="modCustomer" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Editando Prductos</h4>
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
