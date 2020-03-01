
var asInitVals = new Array();
$(document).ready(function () {
    $('#dataCategories').dataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
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
                title: 'Categorías',
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
    
    $('#formRecordCategory').on('submit', function (e) {
        e.preventDefault();

        $('#modAddCategory').modal('toggle');
        $('#modBodyAddCategory').html('');

        $.ajax({
            url: raiz_url + "Manager_categories/ajax_edit_categories",
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                if (data) {
                    $('#modBodyAddCategory').html('<b>La categoria se agregó correctamente</b> ');
                    window.location.href = raiz_url + "manager_categories/categories";
                } 
                else {
                    $('#modBodyAddCategory').html('<b>Hubo un error al realizar la operación</b>');
                }
            }
        });

    });


    $('#formEditCategory').on('submit', function (e) {
        
            e.preventDefault();
            $.ajax({
                url: raiz_url + "manager_categories/ajax_edit_categories",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {

                    if (data) {
                        $('#modEditCategory').modal('toggle');
                        $('#modBodyEditCategory').html('');
                        $('#modBodyEditCategory').html('<b>! La información se actualizó correctamente ¡</b> ');
                        window.location.href = raiz_url + "manager_categories/categories";
                    } 
                    else {
                        $('#modEditCategory').modal('toggle');
                        $('#modBodyEditCategory').html('');
                        $('#modBodyEditCategory').html('<b>Hubo un error al realizar la operación...</b>');
                    }
                }
            });
            $('#modEditCategory').on('hidden.bs.modal', function () {
                window.location.href = raiz_url + "manager_categories/categories";
            });
    });

    $('body').on("click", ".btn-edit-category", function (e) {
        var ID_CATEGORY = $(this).attr('data-id-category');
        window.location.href = raiz_url + "manager_categories/form_edit_categories/" + ID_CATEGORY;
    });


    $('body').on("click", ".btn-delete-category", function (e) {
        
        var ID_CATEGORY = $(this).attr('data-id-category');
        if (ID_CATEGORY > 0) {

            $('#modDelCategory').modal('toggle');
            $('#modBodyDelCategory').html('<b>El registro será borrado.   <br> ¿ Estás seguro ?</b>');
            $('#btnDelCategory').on('click', function (e) {

                $.ajax({
                    url: raiz_url + "Manager_categories/ajax_disable_categories",
                    type: 'POST',
                    data: 'ID_CATEGORY=' + ID_CATEGORY,
                    success: function (data) {
                        if (data) {
                            window.location.reload();
                        } else {
                            $('#modBodyDelCategory').html('<b>Hubo un error al realizar la operación</b>');
                            $('#btnDelCategory').attr("disabled", "disabled");
                        }
                    }
                });
            });
        }
    });

    
});
///FUNCIONES JS..