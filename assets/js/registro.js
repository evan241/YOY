
$(document).ready(function () {


    $('#formRegistration').submit(function (e) {
        e.preventDefault();

        var formdata = new FormData($(this)[0]);
        $.ajax({
            url: raiz_url + "registro/ajax_registrar_usuario",
            type: 'POST',
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    // Aqui mostramos el mensaje de email
                }
                else {
                    // Aqui va el pop-up de error       
                }

            }
        });

    });



    // $('#formRegistration').validator().on('submit', function (e) {
    //     if (e.isDefaultPrevented()) {
    //         // handle the invalid form...

    //     } else {
    //         // everything looks good!
    //         e.preventDefault();
    //         //$('#modEditCategoriaEjercicio').modal('toggle');
    //         //$('#modBodyEditCategoriaEjercicio').html('');
    //         $('#modAdvice').modal('toggle');
    //         $('#modBodyAdvice').html('Enviando...');
    //         $.ajax({ 
    //             url: raiz_url + "principal/ajax_add_user_for_confirmation",
    //             type: 'POST',
    //             data: $(this).serialize(),
    //             success: function (data) {
    //                 if (parseInt(data) > 0) {
    //                     $.ajax({
    //                         url: raiz_url + "principal/ajax_email_confirmation",
    //                         type: 'POST',
    //                         data: 'ID_USER=' + data,
    //                         success: function (dato) {
    //                             if (dato == true) {
    //                                 $('#modBodyAdvice').html('<b>! La información se envió correctamente, ahora confirma tu correo para poder entrar ¡</b> ');
    //                                 $('#modAdvice').on('hidden.bs.modal', function () {
    //                                     window.location.href = raiz_url;
    //                                 });
    //                             } else {
    //                                 $('#modBodyAdvice').html('<b>Hubo un error al realizar la operación...</b>');
    //                                 $('#modAdvice').on('hidden.bs.modal', function () {
    //                                     window.location.href = raiz_url + "login/registration";
    //                                 });
    //                             }
    //                         }
    //                     });
    //                 } else {
    //                     if (parseInt(data) == 0) {
    //                         $('#modBodyAdvice').html('<b>Este email ya fue registrado...</b>');
    //                         $('#modAdvice').on('hidden.bs.modal', function () {
    //                             window.location.href = raiz_url + "login/ForgotPassword";
    //                         });
    //                     } else {
    //                         $('#modBodyAdvice').html('<b>Hubo un error al realizar la operación...</b>');
    //                         $('#modAdvice').on('hidden.bs.modal', function () {
    //                             window.location.href = raiz_url + "login/registration";
    //                         });
    //                     }
    //                 }
    //             }
    //         });
    //     }
    // });


});