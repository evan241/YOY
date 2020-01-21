<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 text-center">
            <?php $this->view('Manager/products/v_navbar_producto'); ?>
        </div>
        <div class="col-sm-10 text-center">
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading header-primary">
                    <div class="panel-title text-left"><h2 class="heading-primary">Productos</h2></div>
                </div>
                <div class="panel-body">

                    <?php

                    if ($this->session->userdata('YOY_ID_ROL') == (ADMINISTRADOR || VENDEDOR)) $disabled = '';
                    else $disabled = 'disabled';
                    
                    if ($this->session->userdata('YOY_ID_ROL') == (ADMINISTRADOR || VENDEDOR)) { ?>

                        <a href="<?= base_url() ?>manager_products/form_add_products" class="btn btn-default pull-right" id="btnAddProduct">
                            <i class="fas fa-plus" prescription-bottle aria-hidden="true"></i> Nuevo Poducto
                        </a>

                    <?php } ?>

                    <div style="clear:both"><br></div>
                    <div class="control-group text-left">
                        <div class="table-responsive">  

                            <table id="dataProducts" class="table text-center" style="font-size: 14px;" cellspacing="0" width="100%">
                                <thead>
                                    <tr >
                                        <th class=" text-center">Código</th>
                                        <th class=" text-center">Nombre</th>
                                        <th class=" text-center">Categoría</th>
                                        <th class=" text-center">Descripción</th>
                                        <th class=" text-center">Costo</th>
                                        <th class=" text-center">Precio</th>
                                        <th class=" text-center">Stock</th>
                                        <th class=" text-center">Stock Mínimo</th>
                                        <th class=" text-center">Activo</th>
                                        <th style="text-align: center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px;">

                                    <?php

                                    if ($products) {

                                        foreach ($products as $product) {

                                            $activo = ($product['ACTIVO_PRODUCTO']==1) ? 
                                            '<i style="color:green" class="fa fa-check fa-2x" aria-hidden="true"></i>' : 
                                            '<i style="color:red" class="fa fa-times fa-2x" aria-hidden="true"></i>';

                                            $stock_actual = $product['STOCK_PRODUCTO'];
                                            $stock_minimo = $product['STOCK_MINIMO_PRODUCTO'];
                                            $color="";

                                            if ($stock_actual <= $stock_minimo) $color = "color:red";

                                            ?>

                                            <tr style="<?= $color ?>">
                                                <td><b><?= $product['CODIGO_PRODUCTO'] ?></b></td>
                                                <td><?= mb_strtoupper($product['NOMBRE_PRODUCTO']) ?></td>
                                                <td><?= mb_strtoupper($product['NOMBRE_CATEGORIA']) ?></td>
                                                <td><?= mb_strtoupper($product['DESCRIPCION_PRODUCTO']) ?></td> 
                                                <td><?= $product['COSTO_PRODUCTO'] ?></td>
                                                <td><?= $product['PRECIO_PRODUCTO'] ?></td>
                                                <td><?= $product['STOCK_PRODUCTO'] ?></td>
                                                <td><?= $product['STOCK_MINIMO_PRODUCTO'] ?></td>
                                                <td><?= $activo ?></td>
                                                <td style="width: 15%">

                                                    <button id="btnEditProduct" class="btn btn-primary btn-edit-product " data-original-title="Editar info producto" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-product="<?= $product['ID_PRODUCTO'] ?>">
                                                        <i class="fa fa-edit fa-2x" aria-hidden="true"></i>
                                                    </button>

                                                    <button id="btnDeleteProduct" <?= $disabled ?> class="btn btn-primary btn-delete-product" data-original-title="Borrar producto" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-product="<?= $product['ID_PRODUCTO'] ?>" >
                                                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                                    </button>

                                                </td>
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
                <div class="panel-footer"><br></div>
            </div>
            <div><br></div>
        </div>
    </div>
</div>
<div class="modal fade" id="modProduct" tabindex="-1" role="dialog" aria-labelledby="modCustomer" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Borrado de producto</h4>
            </div>
            <div class="modal-body text-center" id="modBodyProduct">
            </div>
            <div class="clear"></div>
            <div class="modal-footer">
                <div class="btn-group "> 

                    <button class="btn btn-default" type="button"  id="btnCancel"  data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                    </button>

                    <button class="btn btn-primary" type="button"  id="btnDelProduct">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>  Si, borrar
                    </button>
                </div>       
            </div>
        </div>
    </div>
</div>  

