
var asInitVals = new Array();
$(document).ready(function () {
    //Products
    $('#dataVentas').dataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        //"iDisplayLength": 30,
        //"sSwfPath": "/swf/copy_csv_xls_pdf.swf",
        "iDisplayLength": 25,
        "aLengthMenu": [[15, 25, 50, 100, -1], [15, 25, 50, 100, "Todos"]],
        "bDestroy": true,
        "bServerSide": false,
        "bProcessing": true,
        "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information dt-filter"ip><"clear">',
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

    $('#formRecordShipment').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            e.preventDefault();

            $.ajax({
                url: raiz_url + "manager_shipments/ajax_add_shipments",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {

                    if (data) {         
                        window.location.href = raiz_url + "manager_shipments/shipments";
                    } 
                    else {
                        
                    }
                }
            });
        }
    });


    // $('#formEditCategory').on('submit', function (e) {

    //     e.preventDefault();
    //     $.ajax({
    //         url: raiz_url + "manager_categories/ajax_edit_categories",
    //         type: 'POST',
    //         data: $(this).serialize(),
    //         success: function (data) {

    //             if (data) {
    //                 $('#modEditCategory').modal('toggle');
    //                 $('#modBodyEditCategory').html('');
    //                 $('#modBodyEditCategory').html('<b>! La información se actualizó correctamente ¡</b> ');
    //                 window.location.href = raiz_url + "manager_categories/categories";
    //             } 
    //             else {
    //                 $('#modEditCategory').modal('toggle');
    //                 $('#modBodyEditCategory').html('');
    //                 $('#modBodyEditCategory').html('<b>Hubo un error al realizar la operación...</b>');
    //             }
    //         }
    //     });
    // });

    // $('body').on("click", ".btn-edit-category", function (e) {
    //     var ID_CATEGORY = $(this).attr('data-id-category');
    //     window.location.href = raiz_url + "manager_categories/form_edit_categories/" + ID_CATEGORY;
    // });


    $('body').on("click", ".btn-delete-shipment", function (e) {

        var ID_SHIPMENT = $(this).attr('data-id-shipment');
        if (ID_SHIPMENT > 0) {

            $('#modDelShipment').modal('toggle');
            $('#modBodyDelShipment').html('<b>El registro será borrado.   <br> ¿ Estás seguro ?</b>');
            $('#btnDelShipment').on('click', function (e) {

                $.ajax({
                    url: raiz_url + "manager_shipments/ajax_disable_shipments/" + ID_SHIPMENT,
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (data) {

                        if (data) {
                            window.location.reload();
                        } else {
                            $('#modBodyDelShipment').html('<b>Hubo un error al realizar la operación</b>');
                            $('#btnDelShipment').attr("disabled", "disabled");
                        }
                    }
                });
            });
        }
    });

    
});
///FUNCIONES JS..