
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


    $('body').on("click", ".btn-paypal-sale", function (e) {

        var ID_ORDER = $(this).attr('data-id-paypal');
        if (ID_ORDER > 0) {

            $.ajax({
                url: raiz_url + "manager_sales/ajax_get_user/" + ID_ORDER,
                type: 'POST',
                data: $(this).serialize(),

                success: function (data) {
                    if (data) {
                        console.log(data);
                    } 
                    else {
                        alert("Hubo un error")
                    }
                }
            });
        }
    });


    $('body').on("click", ".btn-view-user", function (e) {

        var ID_USUARIO = $(this).attr('data-id-user');
        if (ID_USUARIO > 0) {

            $.ajax({
                url: raiz_url + "manager_sales/ajax_get_user/" + ID_USUARIO,
                type: 'POST',
                data: $(this).serialize(),

                success: function (data) {
                    if (data) {
                        console.log(data);
                    } 
                    else {
                        alert("Hubo un error")
                    }
                }
            });
        }
    });
    

    $('body').on("click", ".btn-cancel-sale", function (e) {

        var ID_VENTA = $(this).attr('data-id-sale');
        if (ID_VENTA > 0) {

            $('#modDelSale').modal('toggle');
            $('#modBodyDelSale').html('<b>El registro será borrado.   <br> ¿ Estás seguro ?</b>');
            $('#btnDelRowSale').on('click', function (e) {

                $.ajax({
                    url: raiz_url + "manager_sales/ajax_disable_sale",
                    type: 'POST',
                    data: 'ID_VENTA=' + ID_VENTA,
                    success: function (data) {

                        if (data > 0) {
                            window.location.reload();
                        } else {
                            $('#modBodyDelSale').html('<b>Hubo un error al realizar la operación</b>');
                            $('#btnDelRowSale').attr("disabled", "disabled");
                        }
                    }
                });
            });
        }
    });


    $('body').on("click", ".btn-fix-sale", function (e) {

        var ID_ERROR = $(this).attr('data-id-error');
        if (ID_ERROR > 0) {

            $.ajax({
                url: raiz_url + "paypal/requestSaleInformation/" + ID_ERROR,
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {

                    if (data) {
                        window.location.reload();
                    } else {
                        alert("Error al momento de arreglar");
                    }
                }
            });
        }
    });


});
///FUNCIONES JS..