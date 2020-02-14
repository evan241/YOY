
var asInitVals = new Array();
$(document).ready(function () {
    
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


    $('#formEditShipment').on('submit', function (e) {

        if (!e.isDefaultPrevented()) {
            e.preventDefault();

            $.ajax({
                url: raiz_url + "manager_shipments/ajax_edit_shipments",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {

                    if (data) {
                        $('#modEditShipment').modal('toggle');
                        $('#modBodyEditShipment').html('');
                        $('#modBodyEditShipment').html('<b>! La información se actualizó correctamente ¡</b> ');
                    } 
                    else {
                        $('#modEditShipment').modal('toggle');
                        $('#modBodyEditShipment').html('');
                        $('#modBodyEditShipment').html('<b>Hubo un error al realizar la operación...</b>');
                    }
                }
            });
            $('#modEditShipment').on('hidden.bs.modal', function () {
                window.location.href = raiz_url + "manager_shipments/shipments";
            });
        }
    });

    $('body').on("click", ".btn-edit-shipment", function (e) {
        var ID_SHIPMENT = $(this).attr('data-id-shipment');
        window.location.href = raiz_url + "manager_shipments/form_edit_shipments/" + ID_SHIPMENT;
    });


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