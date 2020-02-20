<style>
    #dataCategories_filter input {
        outline: 0px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
    }
    #dataCategories_length{
        margin-left: 15px ;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>CATEGORIAS</h2>
                <a href="<?= base_url() ?>Manager_categories/form_add_categories" class="btn btn-primary pull-right">
                    <i class="fa fa-plus" aria-hidden="true"></i> Nueva categoria
                </a>
            </div>
            <div class="card-body">
                <div class="basic-data-table">
                    <table id="dataCategories" class="table nowrap dataTable no-footer" style="font-size: 14px;" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th data-orderable="false" style="text-align: center; width: 20%;">Acciones</th>
                                <th style="width: 80%">Categoria</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:12px;">
                            <?php
                            if ($categories) {
                                foreach ($categories as $category) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <button id="btnEditCategory" class="btn btn-primary btn-edit-category" data-original-title="Editar categoria" data-toggle="tooltip" data-id-category="<?= $category['ID_CATEGORIA'] ?>" style=" padding: 2px 5px !important;">
                                                <i class="fa fa-edit fa-1x" aria-hidden="true"></i>
                                            </button>
                                            <button id="btnDeleteCategory" class="btn btn-danger btn-delete-category" data-original-title="Borrar categoria" data-toggle="tooltip" data-id-category="<?= $category['ID_CATEGORIA'] ?>" style=" padding: 2px 5px !important;">
                                                <i class="fa fa-trash fa-1x" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                        <td><?= $category['NOMBRE_CATEGORIA'] ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>   
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>
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
                    <button class="btn btn-danger" type="button"  data-dismiss="modal">
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