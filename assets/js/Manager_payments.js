
var asInitVals = new Array();
$(document).ready(function () {
    $('#dataPayment').dataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
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

    $('body').on("click", ".btn-toggle-payment", function (e) {
        if (!e.isDefaultPrevented()) {
            e.preventDefault();
            var ID_PAYMENT = $(this).attr('data-id-payment');
            if (ID_PAYMENT > 0) {+
                $.ajax({
                    url: raiz_url + "Manager_payments/ajax_toggle_payments",
                    type: 'POST',
                    data: 'ID_PAYMENT=' + ID_PAYMENT,
                    success: function (data) {

                        if (data) {
                        window.location.reload();
                    } else {

                    }
                }
            });
            }
        }
    });
    
});
///FUNCIONES JS..