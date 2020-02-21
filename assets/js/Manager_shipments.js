
var asInitVals = new Array();
$(document).ready(function () {
    $('#dataShipment').dataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
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
    
    $('#formRecordShipment').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            e.preventDefault();

            $.ajax({
                url: raiz_url + "Manager_shipments/ajax_add_shipments",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {

                    if (data) {         
                        window.location.href = raiz_url + "Manager_shipments/shipments";
                    } 
                    else {

                    }
                }
            });
        }
    });

    $('#formEditShipment').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            e.preventDefault();
            $('#modEditShipment').modal('toggle');
            $('#modBodyEditShipment').html('Guardando');
            $.ajax({
                url: raiz_url + "Manager_shipments/ajax_edit_shipments",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {

                    if (data) {
                        $('#modBodyEditShipment').html('<b>! La información se actualizó correctamente ¡</b> ');
                    } 
                    else {
                        $('#modBodyEditShipment').html('<b>Hubo un error al realizar la operación...</b>');
                    }
                }
            });
            $('#modEditShipment').on('hidden.bs.modal', function () {
                window.location.href = raiz_url + "Manager_shipments/shipments";
            });
        }
    });

    $('body').on("click", ".btn-edit-shipment", function (e) {
        var ID_SHIPMENT = $(this).attr('data-id-shipment');
        window.location.href = raiz_url + "Manager_shipments/form_edit_shipments/" + ID_SHIPMENT;
    });

    $('body').on("click", ".btn-delete-shipment", function (e) {
        var ID_SHIPMENT = $(this).attr('data-id-shipment');
        if (ID_SHIPMENT > 0) {
            $('#modDelShipment').modal('toggle');
            $('#modBodyDelShipment').html('<b>El registro será borrado.   <br> ¿ Estás seguro ?</b>');
            $('#btnDelShipment').on('click', function (e) {
                $.ajax({
                    url: raiz_url + "Manager_shipments/ajax_disable_shipments/" + ID_SHIPMENT,
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