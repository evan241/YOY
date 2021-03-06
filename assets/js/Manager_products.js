
var asInitVals = new Array();
$(document).ready(function () {
    $('#dataProducts').dataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "iDisplayLength": 25,
        "aLengthMenu": [[15, 25, 50, 100, -1], [15, 25, 50, 100, "Todos"]],
        "bDestroy": true,
        "bServerSide": false,
        "bProcessing": true,
        "dom": '<"row justify-content-between top-information"lf><"row resp"rt><"row justify-content-between bottom-information dt-filter"ip><"clear">',
        buttons: [
            {
                extend: 'csv',
                text: 'Excel',
                title: 'Productos',
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                }
            }
        ],
        "aaSorting": [],
        "sPaginationType": "full_numbers", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
        "oLanguage": {
            "sLoadingRecords": "Cargando...",
            "sEmptyTable": "No hay registros disponibles",
            "sInfo": "Resultado _START_ - _END_ de _TOTAL_ registros",
            "sLengthMenu": " Mostrar _MENU_ registros",
            "sSearch": "Buscar :",
            "sInfoEmpty": "Mostrando 0 - 0 de 0 registros",
            "sInfoFiltered": "(Filtrado de _MAX_ registros)",
            "sProcessing": "Procesando...",
            "sZeroRecords": "No se localizaron registros",
            "oPaginate": {
                "sNext": "Sig",
                "sLast": "",
                "sPrevious": "Ant",
                "sFirst": ""
            }
        }
    });

    $('#formRecordProduct').on('submit', function (e) {
        e.preventDefault();
        $('#modProduct').modal('toggle');
        $('#modBodyProduct').html('Guardando');
        $.ajax({
            url: raiz_url + "manager_products/ajax_add_products",
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                if (data) {
                    $('#modBodyProduct').html('<b>! El producto se agregó correctamente ¡</b> ');
                    //Se agrega para que el usuario pueda ver el modal y al cerrarlo reedireccione a productos
                    $('#modProduct').on('hidden.bs.modal', function () {
                        window.location.href = raiz_url + "manager_products/products";
                    });
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