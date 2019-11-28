$(document).ready(function () {
    var oTableUsers = $('#datamyBuys').dataTable({
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "Todos"]],
        "bDestroy": true,
        "bServerSide": false,
        "bProcessing": true,
        "dom": 'T<"clear">lrtip',
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

    $('#btnIHaveAccount').on('click', function () {
        window.location.href = raiz_url + "login/register";
    });

    // $('#formRegistration').validator().on('submit', function (e) {
    //     if (!e.isDefaultPrevented()) {
    //         e.preventDefault();

    //         // $('#modAdvice').modal('toggle');
    //         // $('#modBodyAdvice').html('Enviando...');

    //         $.ajax({
    //             url: raiz_url + "registro/validar",
    //             type: 'POST',
    //             data: $(this).serialize(),
    //             success: function (data) {
    //                 if (data) {
    //                     // $('#modBodyAdvice').html('<b>! La información se envió correctamente, ahora confirma tu correo para poder entrar ¡</b> ');
    //                     // $('#modAdvice').on('hidden.bs.modal', function () {
    //                     // window.location.href = raiz_url;
    //                     // });
    //                     console.log("TRUE");
    //                 }
    //                 else {
    //                     // $('#modBodyAdvice').html('<b>Hubo un error al realizar la operación...</b>');
    //                     // $('#modAdvice').on('hidden.bs.modal', function () {
    //                     // window.location.href = raiz_url + "login/index";
    //                     // });
    //                     console.log("FALSE");
    //                 }
    //             }
    //         });
    //     }
    // });

    $('#formSugiere').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...

        } else {
            // everything looks good!
            e.preventDefault();
            //$('#modEditCategoriaEjercicio').modal('toggle');
            //$('#modBodyEditCategoriaEjercicio').html('');
            $('#modAdvice').modal('toggle');
            $('#modBodyAdvice').html('Enviando...');
            $.ajax({
                url: raiz_url + "principal/ajax_add_sugerencia",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if (parseInt(data) > 0) {
                        console.log(data);
                        $.ajax({
                            url: raiz_url + "principal/ajax_email_sugiere",
                            type: 'POST',
                            data: 'ID_SUGERENCIA=' + data,
                            success: function (dato) {

                                if (dato == true) {
                                    $('#modBodyAdvice').html('<b>! La información se envió correctamente ¡</b> ');
                                } else {
                                    $('#modBodyAdvice').html('<b>Hubo un error al realizar la operación...</b>');
                                }
                            }
                        });
                    } else {
                        $('#modAdvice').modal('toggle');
                        $('#modBodyAdvice').html('<b>Hubo un error al realizar la operación...</b>');
                    }
                }
            });
            //MANDAR AJAXX... 
            $('#modAdvice').on('hidden.bs.modal', function () {
                //window.location.href=raiz_url+"Config/index_categoria_ejercicio";
            });
        }
    });

    $('[data-toggle="tooltip"]').tooltip();
    $('#imgtooltip').on('click', function () {
        $("#imgtooltip").tooltip();
    });

    $('#formHazParo').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...

        } else {
            // everything looks good!
            e.preventDefault();
            $('#modAdvice').modal('toggle');
            $('#modBodyAdvice').html('Enviando...');
            $.ajax({
                url: raiz_url + "principal/ajax_add_haz_paro",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if (parseInt(data) > 0) {
                        console.log(data);
                        $.ajax({
                            url: raiz_url + "principal/ajax_email_haz_paro",
                            type: 'POST',
                            data: 'ID_HAZ_PARO=' + data,
                            success: function (dato) {

                                if (dato == true) {
                                    $('#modBodyAdvice').html('<b>! La información se envió correctamente ¡</b> ');
                                } else {
                                    $('#modBodyAdvice').html('<b>Hubo un error al realizar la operación...</b>');
                                }
                            }
                        });
                    } else {
                        $('#modAdvice').modal('toggle');
                        $('#modBodyAdvice').html('<b>Hubo un error al realizar la operación...</b>');
                    }
                }
            });
            //MANDAR AJAXX... 
            $('#modAdvice').on('hidden.bs.modal', function () {
                //window.location.href=raiz_url+"Config/index_categoria_ejercicio";
            });
        }
    });

    //se envia la información al correo electrónico al olvidar password
    $('#formForgotPassword').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...

        } else {
            e.preventDefault();
            $('#modAdvice').modal('toggle');
            $('#modBodyAdvice').html('Enviando...');
            $.ajax({
                url: raiz_url + "principal/ajax_forgot_password",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if (parseInt(data) > 0) {
                        $('#modBodyAdvice').html('<b>! La información se envió correctamente¡</b> ');
                    } else {
                        $('#modBodyAdvice').html('<b>El correo escrito no es válido...</b>');
                    }
                }
            });
            $('#modAdvice').on('hidden.bs.modal', function () {
                window.location.href = raiz_url + "principal/index";
            });
        }
    });

    $('#myCarousel').carousel();

    $('#form_add_buy').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else {
            e.preventDefault();
            $('#modAddBuy').modal('toggle');
            $('#modBodyAddBuy').html('Se enviara la compra, oprima comprar para continuar.');
            $('#btnAddBuy').on('click', function (e) {
                $('#modBodyAddBuy').html('Enviando compra...');
                $.ajax({
                    url: raiz_url + "principal/ajax_add_buy",
                    type: 'POST',
                    data: 'RG_ID_IMAGEN_EVENTO=' + $('#RG_ID_IMAGEN_EVENTO').val() + '&RG_CANTIDAD_COMPRA=' + $('#RG_CANTIDAD_COMPRA').val() + '&RG_COSTO_EVENTO_COMPRA=' + $('#RG_COSTO_EVENTO_COMPRA').val(),
                    success: function (data) {
                        $('#modAddBuy').modal('toggle');
                        $('#modAdviceBuy').modal('toggle');
                        if (parseInt(data) > 0) {
                            $('#modBodyAdviceBuy').html('<b>¡ La compra se envió correctamente !</b><br>Los detalles se enviaran a tu correo.');
                        } else {
                            $('#modBodyAdviceBuy').html('<b>Hubo un error, intentelo mas tarde.</b>');
                        }
                    }
                });
            });
        }
    });

    $('#modAdviceBuy').on('hidden.bs.modal', function () {
        window.location.href = raiz_url + "principal/mybuys";
    });

    $('body').on("click", ".btn-cancel-buy", function (e) {
        var ID_COMPRA = $(this).attr('data-id-buy');
        if (ID_COMPRA > 0) {
            $('#modCancelBuy').modal('toggle');
            $('#modBodyCancelBuy').html('<b>La compra sera cancelada.<br>¿ Estás seguro ?</b>');
            $('#btnCancel_Buy').on('click', function (e) {
                $.ajax({
                    url: raiz_url + "principal/ajax_cancel_buy",
                    type: 'POST',
                    data: 'ID_COMPRA=' + ID_COMPRA,
                    success: function (data) {
                        console.log(data);
                        if (data > 0) {
                            window.location.reload();
                        } else {
                            $('#modBodyCancelBuy').html('<b>Hubo un error al realizar la operación</b>');
                            $('#btnCancelBuy').attr("disabled", "disabled");
                        }
                    }
                });
            });
        }
    });

    $('body').on("click", ".btn-confirm-buy", function (e) {
        var ID_COMPRA = $(this).attr('data-id-buy');
        if (ID_COMPRA > 0) {
            $('#modConfirmBuy').modal('toggle');
            /*$('#modBodyConfirmBuy').html('<b>se confirmara la compra.<br>¿ Estás seguro ?</b>');*/
            $('#btnConfirm_Buy').on('click', function (e) {
                if (!$('#FECHA_DEPOSITO_COMPRA').val() || !$('#HORA_DEPOSITO_COMPRA').val() || !$('#NO_AUTORIZACION_BANCO_COMPRA').val() || !$('#MONTO_DEPOSITO_COMPRA').val()) {
                    if (!$('#FECHA_DEPOSITO_COMPRA').val())
                        $('#FECHA_DEPOSITO_COMPRA').closest('.form-group').removeClass('has-success').addClass('has-error');
                    if (!$('#HORA_DEPOSITO_COMPRA').val())
                        $('#HORA_DEPOSITO_COMPRA').closest('.form-group').removeClass('has-success').addClass('has-error');
                    if (!$('#NO_AUTORIZACION_BANCO_COMPRA').val())
                        $('#NO_AUTORIZACION_BANCO_COMPRA').closest('.form-group').removeClass('has-success').addClass('has-error');
                    if (!$('#MONTO_DEPOSITO_COMPRA').val())
                        $('#MONTO_DEPOSITO_COMPRA').closest('.form-group').removeClass('has-success').addClass('has-error');
                } else {
                    $.ajax({
                        url: raiz_url + "principal/ajax_confirm_buy",
                        type: 'POST',
                        data: 'ID_COMPRA=' + ID_COMPRA + '&FECHA_DEPOSITO_COMPRA=' + $('#FECHA_DEPOSITO_COMPRA').val() + '&HORA_DEPOSITO_COMPRA=' + $('#HORA_DEPOSITO_COMPRA').val() + '&NO_AUTORIZACION_BANCO_COMPRA=' + $('#NO_AUTORIZACION_BANCO_COMPRA').val() + '&MONTO_DEPOSITO_COMPRA=' + $('#MONTO_DEPOSITO_COMPRA').val(),
                        success: function (data) {
                            console.log(data);
                            if (data > 0) {
                                window.location.reload();
                            } else {
                                $('#modBodyConfirmBuy').html('<b>Hubo un error al realizar la operación</b>');
                                $('#btnConfirm_Buy').attr("disabled", "disabled");
                            }
                        }
                    });
                }
            });
        }
    });

    var oTableNews = $('#dataNew').dataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        //"iDisplayLength": 30,
        //"sSwfPath": "..assets/swf/copy_csv_xls_pdf.swf",
        "iDisplayLength": 25,
        "aLengthMenu": [[15, 25, 50, 100, -1], [15, 25, 50, 100, "Todos"]],
        "bDestroy": true,
        "bServerSide": false,
        "bProcessing": true,
        "dom": 'T<"clear">lfrtip',
        "aaSorting": [],
        "sPaginationType": "full_numbers", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
        "oLanguage": {
            "sLoadingRecords": "Cargando...",
            "sEmptyTable": "No hay registros disponibles",
            "sInfo": "Resultado _START_ - _END_ de _TOTAL_ registros",
            "sLengthMenu": " Mostrar _MENU_ registros",
            "sSearch": "Buscar Artículo:",
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


    $('#pagination-demo').twbsPagination({
        totalPages: 35,
        visiblePages: 7,

        onPageClick: function (event, page) {
            $('#page-content').text('Page ' + page);
        }
    });

    /*var $pagination = $('#pagination-demo');
    var defaultOpts = {
        totalPages: 35
    };
    $pagination.twbsPagination(defaultOpts);
    $.ajax({
        url: raiz_url + "principal/ajax_add_user_for_confirmation",
        type: 'POST',
        data: $(this).serialize(),
        success: function (data) {
            var totalPages = data.newTotalPages;
            var currentPage = $pagination.twbsPagination('getCurrentPage');
            $pagination.twbsPagination('destroy');
            $pagination.twbsPagination($.extend({}, defaultOpts, {
                startPage: currentPage,
                totalPages: totalPages
            }));
        }
    });*/
});