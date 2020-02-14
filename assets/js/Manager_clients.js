var asInitVals = new Array();
$(document).ready(function () {

    var oTableUsers = $('#dataUser').dataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        //"iDisplayLength": 30,
        //"sSwfPath": "..assets/swf/copy_csv_xls_pdf.swf",
        "iDisplayLength": 25,
        "aLengthMenu": [[15, 25, 50, 100, -1], [15, 25, 50, 100, "Todos"]],
        "bDestroy": true,
        "bServerSide": false,
        "bProcessing": true,
        "dom": "<'row'<'col-md-5'l><'col-md-5'f><'col-md-2'B>><'row'<'col-md-12't>><'row'<'col-md-12'i>><'row'<'col-md-12'p>>",
        buttons: [
        {
            extend: 'csv',
            text: 'Excel',
            title: 'Clientes',
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
            "sSearch": "Buscar en todas las columnas:",
            "sInfoEmpty": "Mostrando 0 - 0 de 0 registros",
            "sInfoFiltered": "(Filtrado de _MAX_ registros)",
            "sProcessing": "Procesando...",
            "sZeroRecords": "No se localizaron registros",
            "oPaginate": {
                "sNext": "Sig",
                "sLast": "Ultimo",
                "sPrevious": "Ant",
                "sFirst": "Primero"
            }
        }
    });


    $('body').on("click", ".btn-edit-client", function (e) {
        var ID_CLIENTE = $(this).attr('data-id-client');
        window.location.href = raiz_url + "manager_clients/form_config_edit_client/" + ID_CLIENTE;
    });


    $('#btnCancelEditClient').on('click', function () {
        window.location.href = raiz_url + "manager_clients/clients";
    });
    

    //EDIT USUARIO...
    $('#formEditClient').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: raiz_url + "manager_clients/ajax_edit_client",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if (data > 0) {
                        $('#modEditUser').modal('toggle');
                        $('#modBodyEditUser').html('');
                        $('#modBodyEditUser').html('<b>! La información se actualizó correctamente ¡</b> ');
                        window.location.href = raiz_url + "manager_clients/clients";
                    } 
                    else {
                        $('#modEditUser').modal('toggle');
                        $('#modBodyEditUser').html('');
                        $('#modBodyEditUser').html('<b>Hubo un error al realizar la operación...</b>');
                    }
                }
            });
    });
    

    $('body').on("click", ".btn-delete-client", function (e) {
        var ID_USUARIO = $(this).attr('data-id-client');

        if (ID_USUARIO > 0) {
            $('#modDelUser').modal('toggle');
            $('#modBodyDelUser').html('<b>El registro será borrado.   <br> ¿ Estás seguro ?</b>');
            $('#btnDelRowUser').on('click', function (e) {
               
                $.ajax({
                    url: raiz_url + "manager_clients/ajax_disable_client",
                    type: 'POST',
                    data: 'ID_USUARIO=' + ID_USUARIO,
                    success: function (data) {
                        
                        if (data > 0) {
                            window.location.reload();
                        } else {
                            $('#modBodyDelUser').html('<b>Hubo un error al realizar la operación</b>');
                            $('#btnDelRowUser').attr("disabled", "disabled");
                        }
                    }
                });
            });
        }
    });
});
