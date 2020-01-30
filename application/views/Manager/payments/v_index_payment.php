<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 text-center">
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading header-primary">
                    <div class="panel-title text-left"><h2 class="heading-primary">Categorias</h2></div>
                </div>
                <div class="panel-body">
                    <a href="<?= base_url() ?>manager_categories/form_add_categories" class="btn btn-default pull-right" id="btnAddUser">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> Nueva categoria
                    </a>
                    <div style="clear:both"><br></div>
                    <div class="control-group text-left">
                        <div class="table-responsive">
                            <table id="dataUser"  class="display" style="font-size: 14px; background-color: white;" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="text" name="search_nombre" placeholder="Categoria" class="search_init form-control" size="15" /></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Categoria</th>
                                        <th style="text-align: center; width: 10%;">Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"><br></td>
                                    </tr>
                                </tfoot>
                                <tbody style="font-size:12px;">
                                    <?php
                                    if ($categories) {
                                        foreach ($categories as $category) {
                                            ?>
                                            <tr>
                                                <td><?= $category['NOMBRE_CATEGORIA'] ?></td>
                                                <td>
                                                    <button id="btnEditCategory" class="btn btn-primary btn-edit-category" data-original-title="Editar info categoria" data-toggle="tooltip" data-id-category="<?= $category['ID_CATEGORIA']?>" style=" padding: 2px 5px !important;">
                                                        <i class="fa fa-edit fa-2x" aria-hidden="true"></i>
                                                    </button>
                                                    <button id="btnDeleteCategory" class="btn btn-primary btn-delete-category" data-original-title="Borrar categoria" data-toggle="tooltip" data-id-category="<?= $category['ID_CATEGORIA']?>" style=" padding: 2px 5px !important;">
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
                <div class="panel-footer">
                    <div style="clear:both"></div>
                </div>
            </div>
        </div>
    </div>
    
</div><br><br><br><br><br><br><br><br><br>

<!-- modal eliminar -->

<div class="modal fade" id="modDelCategory" tabindex="-1" role="dialog" aria-labelledby="modCategory" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header header-primary" id="modalHeaderAdvice"  >
                <button type="button" class="close" data-dismiss="modal" style="color:#FFF;" aria-label="Close"><span style="color:#FFF;" aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitleAdvice">Borrado de categoria</h4>
            </div>
            <div class="modal-body text-center" id="modBodyDelCategory">
            </div>
            <div class="clear"></div>
            <div class="modal-footer">
                <div class="btn-group ">
                    <button class="btn btn-default" type="button"  data-dismiss="modal">
                       <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                    </button>
                    <button class="btn btn-primary" type="button"  id="btnDelCategory">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>  Si, borrar
                    </button>
                </div>       
            </div>
        </div>
    </div>
</div> 