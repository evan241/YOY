<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 text-center">
            <?php $this->view('Manager/products/v_navbar_producto'); ?>
        </div>
        <div class="col-sm-10 text-center">
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading header-primary">
                    <div class="panel-title text-left"><h2 class="heading-primary">Categorias</h2></div>
                </div>

                <div class="panel-body">
                    <?php
                    if ($this->session->userdata('ALMACEN_ID_ROL') == ADMINISTRADOR):
                        $disabled = '';
                    else:
                        $disabled = 'disabled';
                    endif;
                    if ($this->session->userdata('ALMACEN_ID_ROL') == ADMINISTRADOR):
                        ?>
                        <a href="<?= base_url() ?>productos/form_add_category" class="btn btn-default pull-right" id="btnAddCategory">
                            <i class="fas fa-plus" prescription-bottle aria-hidden="true"></i> Nueva categoría
                        </a>
                    <?php endif; ?>
                    <div style="clear:both"><br></div>
                    <div class="control-group text-left">
                        <div class="table-responsive">  

                            <table id="dataCategories" class="table text-center" style="font-size: 14px;" cellspacing="0" width="100%">
                                <thead>                               
                                    <tr >
                                        <th class=" text-center">Nombre categoria</th>
                                        <th style="text-align: center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px;">
                                    <?php
                                    if (count($ROW_CATEGORIES)):
                                        foreach ($ROW_CATEGORIES as $ROW):
                                            ?>
                                            <tr>
                                                <td><?= mb_strtoupper($ROW['NOMBRE_CATEGORIA']) ?></td>
                                                <td style="width: 15%">
                                                    <button id="btnEditCategory" class="btn btn-primary btn-edit-category" data-original-title="Editar categoría" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-category="<?= $ROW['ID_CATEGORIA'] ?>">
                                                        <i class="fa fa-edit fa-2x" aria-hidden="true"></i>
                                                    </button>
                                                    <button id="btnDeleteCategory" <?= $disabled ?> class="btn btn-primary btn-delete-category" data-original-title="Borrar categoría" data-toggle="tooltip" style=" padding: 2px 5px !important;" data-id-category="<?= $ROW['ID_CATEGORIA'] ?>" >
                                                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    endif;
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
<div class="modal fade" id="modDeleteCategoria" tabindex="-1" role="dialog" aria-labelledby="modDeleteCategoria" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Borrado de categoría</h4>
            </div>
            <div class="modal-body text-center" id="modBodyDeleteCategoria">
            </div>
            <div class="clear"></div>
            <div class="modal-footer">
                <div class="btn-group ">
                    <button class="btn btn-default" type="button" id="btnCancel"  data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                    </button>
                    <button class="btn btn-primary" type="button" id="btnDelRowCategory">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>  Si, borrar
                    </button>
                </div>       
            </div>
        </div>
    </div>
</div>  

