<style>
    #dataProducts_filter input {
        outline: 0px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
    }
    .dt-filter{margin-top:10px;padding-left: 15px;}

    #dataProducts_length{
        margin-left: 15px ;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>PRODUCTOS</h2>
                <?php
                if ($this->session->userdata('YOY_ID_ROL') == (ADMINISTRADOR || VENDEDOR)) {
                    ?>
                    <a href="<?= base_url() ?>manager_products/form_add_products" class="btn btn-primary pull-right" id="btnAddProduct">
                        <i class="fas fa-plus" prescription-bottle aria-hidden="true"></i> Nuevo Poducto
                    </a>
                <?php } ?>
            </div>
            <div class="card-body">
                <?php
                if ($this->session->userdata('YOY_ID_ROL') == (ADMINISTRADOR || VENDEDOR)) $disabled = '';
                else $disabled = 'disabled';
                ?>
                <div class="basic-data-table">
                    <table id="dataProducts" class="table nowrap dataTable no-footer" style="font-size: 14px;" cellspacing="0" width="100%">
                        <thead class="text-center">
                            <tr >
                                <th data-orderable="false" width="15%">Acciones</th>
                                <th width="5%">Código</th>
                                <th width="10%">Nombre</th>
                                <th width="10%">Categoría</th>
                                <th width="25%">Descripción</th>
                                <th width="5%">Costo</th>
                                <th width="5%">Precio</th>
                                <th width="10%">Activo</th>
                                <th width="5%">Stock</th>
                                <th width="10%">Stock Mínimo</th>
                            </tr>
                        </thead>
                        <tbody class="text-center"style="font-size:12px;">
                            <?php
                            if ($products) {
                                foreach ($products as $product) {
                                    $activo = ($product['ACTIVO_PRODUCTO'] == 1)?'<i style="color:green" class="fa fa-check fa-2x" aria-hidden="true"></i>':'<i style="color:red" class="fa fa-times fa-2x" aria-hidden="true"></i>';
                                    $stock_actual = $product['STOCK_PRODUCTO'];
                                    $stock_minimo = $product['STOCK_MINIMO_PRODUCTO'];
                                    $color = "";
                                    if ($stock_actual <= $stock_minimo)
                                        $color = "color:red";
                                    ?>
                                    <tr style="<?= $color ?>">
                                        <td style="width: 15%">
                                            <button id="btnEditProduct" <?= $disabled ?> class="btn btn-primary btn-edit-product" data-original-title="Editar info producto" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-product="<?= $product['ID_PRODUCTO'] ?>">
                                                <i class="fa fa-edit fa-1x" aria-hidden="true"></i>
                                            </button>
                                            <?php if($product['ACTIVO_PRODUCTO'] == 1){ ?>
                                            <button id="btnDesactiveProduct" <?= $disabled ?> class="btn btn-danger btn-Desactive-product" data-original-title="Desactivar producto" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-product="<?= $product['ID_PRODUCTO'] ?>" >
                                                <i class="fa fa-times fa-1x" aria-hidden="true"></i>
                                            </button>
                                            <?php } else{ ?>
                                            <button id="btnActiveProduct" <?= $disabled ?> class="btn btn-success btn-active-product" data-original-title="Activar producto" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-product="<?= $product['ID_PRODUCTO'] ?>" >
                                                <i class="fa fa-check fa-1x" aria-hidden="true"></i>
                                            </button>
                                            <?php } ?>
                                            <button id="btnAddPicProduct" <?= $disabled ?> class="btn btn-primary btn-addpic-product" data-original-title="Agregar imágenes" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-product="<?= $product['ID_PRODUCTO'] ?>" >
                                                <i class="fa fa-images fa-1x" aria-hidden="true"></i>
                                            </button>
                                            <button id="btnDeleteProduct" <?= $disabled ?> class="btn btn-danger btn-delete-product" data-original-title="Borrar producto" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-product="<?= $product['ID_PRODUCTO'] ?>" >
                                                <i class="fa fa-trash fa-1x" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                        <td><b><?= $product['CODIGO_PRODUCTO'] ?></b></td>
                                        <td><?= mb_strtoupper($product['NOMBRE_PRODUCTO']) ?></td>
                                        <td><?= mb_strtoupper($product['NOMBRE_CATEGORIA']) ?></td>
                                        <td><?= mb_strtoupper($product['DESCRIPCION_PRODUCTO']) ?></td> 
                                        <td><?= $product['COSTO_PRODUCTO'] ?></td>
                                        <td><?= $product['PRECIO_PRODUCTO'] ?></td>
                                        <td><?= $activo ?></td>
                                        <td><?= $product['STOCK_PRODUCTO'] ?></td>
                                        <td><?= $product['STOCK_MINIMO_PRODUCTO'] ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>   
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer"><br></div>
        </div>
        <div><br></div>
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

