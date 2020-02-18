
var asInitVals = new Array();
$(document).ready(function () {

    $('#formRecordProduct').on('submit', function (e) {
        e.preventDefault();
        $('#modProduct').modal('toggle');
        $('#modBodyProduct').html('');
        $.ajax({
            url: raiz_url + "manager_products/ajax_add_products",
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                if (data) {
                    $('#modBodyProduct').html('<b>! El usuario se agregó correctamente ¡</b> ');
                    window.location.href = raiz_url + "manager_products/products";
                } 
                else {
                    $('#modBodyProduct').html('<b>Hubo un error al realizar la operación...</b>');
                }
            }
        });
    });

    $('#formEditProduct').on('submit', function (e) {
        
            e.preventDefault();
            $.ajax({
                url: raiz_url + "manager_products/ajax_edit_products",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if (data) {
                        $('#modProduct').modal('toggle');
                        $('#modBodyProduct').html('');
                        $('#modBodyProduct').html('<b>! La información se actualizó correctamente ¡</b> ');
                    } 
                    else {
                        $('#modProduct').modal('toggle');
                        $('#modBodyProduct').html('');
                        $('#modBodyProduct').html('<b>Hubo un error al realizar la operación...</b>');
                    }
                }
            });

            $('#modProduct').on('hidden.bs.modal', function () {
                window.location.href = raiz_url + "manager_products/products";
            });
    });

    $('body').on("click", ".btn-edit-product", function (e) {
        var ID_PRODUCT = $(this).attr('data-id-product');
        window.location.href = raiz_url + "manager_products/form_edit_products/" + ID_PRODUCT;
    });


    $('body').on("click", ".btn-delete-product", function (e) {
        var ID_PRODUCT = $(this).attr('data-id-product');
        if (ID_PRODUCT > 0) {

            $('#modProduct').modal('toggle');
            $('#modBodyProduct').html('<b>El registro será borrado.   <br> ¿ Estás seguro ?</b>');
            $('#btnDelProduct').on('click', function (e) {

                $.ajax({
                    url: raiz_url + "manager_products/ajax_disable_products",
                    type: 'POST',
                    data: 'ID_PRODUCT=' + ID_PRODUCT,
                    success: function (data) {

                        if (data) {
                            window.location.reload();
                        } else {
                            $('#modBodyProduct').html('<b>Hubo un error al realizar la operación</b>');
                            $('#btnDelProduct').attr("disabled", "disabled");
                        }
                    }
                });
            });
        }
    });

    
});
///FUNCIONES JS..