var asInitVals = new Array();
$(document).ready(function () {
    $('#dataUser').dataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
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
                title: 'Usuarios',
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

    //GUARDAR USUARIO
    $('#formRecordUser').on('submit', function (e) {
        e.preventDefault();
        $('#modAddUser').modal('toggle');
        $('#modBodyAddUser').html('');
        $.ajax({
            url: raiz_url + "manager_users/ajax_add_user",
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                if (data) {
                    $('#modBodyAddUser').html('<b>! El usuario se agregó correctamente ¡</b> ');
                    window.location.href = raiz_url + "manager_users/users";
                } else {
                    $('#modBodyAddUser').html('<b>Hubo un error al realizar la operación...</b>');
                }
            }
        });
    });

    $('#btnCancelAddUser').on('click', function () {
        window.location.href = raiz_url + "Manager_users/users";
    });

    $('body').on("click", ".btn-edit-user", function (e) {
        var ID_USUARIO = $(this).attr('data-id-user');
        window.location.href = raiz_url + "Manager_users/form_config_edit_users/" + ID_USUARIO;
    });

    $('#btnCancelEditUser').on('click', function () {
        window.location.href = raiz_url + "Manager_users/users";
    });

    //EDIT USUARIO...
    $('#formEditUser').on('submit', function (e) {
        e.preventDefault();
        $('#modEditUser').modal('toggle');
        $('#modBodyEditUser').html('Guardando');
        $.ajax({
            url: raiz_url + "Manager_users/ajax_edit_user",
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                if (data > 0) {
                    $('#modBodyEditUser').html('<b>! La información se actualizó correctamente ¡</b> ');
                } else {
                    $('#modBodyEditUser').html('<b>Hubo un error al realizar la operación...</b>');
                }
            }
        });

        $('#modEditUser').on('hidden.bs.modal', function () {
            window.location.href = raiz_url + "Manager_users/users";
        });
    });

    ///btnDeleteUser..
    $('body').on("click", ".btn-delete-user", function (e) {
        var ID_USUARIO = $(this).attr('data-id-user');
        if (ID_USUARIO > 0) {
            $('#modDelUser').modal('toggle');
            $('#modBodyDelUser').html('<b>El registro será borrado.   <br> ¿ Estás seguro ?</b>');
            $('#btnDelRowUser').on('click', function (e) {

                $.ajax({
                    url: raiz_url + "Manager_users/ajax_disable_user",
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