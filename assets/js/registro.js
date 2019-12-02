
$(document).ready(function () {


    $('#formRegistration').submit(function (e) {
        if (!e.isDefaultPrevented()) {
            e.preventDefault();

            // $('#modAdvice').modal('toggle');
            // $('#modBodyAdvice').html('Enviando...');

            $.ajax({
                url: raiz_url + "registro/validar",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    alert(data);

                    // if (data == "Ok") {
                    //     // $('#modBodyAdvice').html('<b>! La información se envió correctamente, ahora confirma tu correo para poder entrar ¡</b> ');
                    //     // $('#modAdvice').on('hidden.bs.modal', function () {
                    //     // window.location.href = raiz_url;
                    //     // });
                    //     console.log("TRUE");
                    // }
                    // else {
                    //     // $('#
                    //     // $('#modAdvice').on('hidden.bs.modal', function () {
                    //     // window.location.href = raiz_url + "login/index";
                    //     // });
                    //     console.log("FALSE");
                    // }
                }
            });
        }
    });



    $('#formRegistration').validator().on('submit', function (e) {
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
                url: raiz_url + "principal/ajax_add_user_for_confirmation",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if (parseInt(data) > 0) {
                        $.ajax({
                            url: raiz_url + "principal/ajax_email_confirmation",
                            type: 'POST',
                            data: 'ID_USER=' + data,
                            success: function (dato) {
                                if (dato == true) {
                                    $('#modBodyAdvice').html('<b>! La información se envió correctamente, ahora confirma tu correo para poder entrar ¡</b> ');
                                    $('#modAdvice').on('hidden.bs.modal', function () {
                                        window.location.href = raiz_url;
                                    });
                                } else {
                                    $('#modBodyAdvice').html('<b>Hubo un error al realizar la operación...</b>');
                                    $('#modAdvice').on('hidden.bs.modal', function () {
                                        window.location.href = raiz_url + "login/registration";
                                    });
                                }
                            }
                        });
                    } else {
                        if (parseInt(data) == 0) {
                            $('#modBodyAdvice').html('<b>Este email ya fue registrado...</b>');
                            $('#modAdvice').on('hidden.bs.modal', function () {
                                window.location.href = raiz_url + "login/ForgotPassword";
                            });
                        } else {
                            $('#modBodyAdvice').html('<b>Hubo un error al realizar la operación...</b>');
                            $('#modAdvice').on('hidden.bs.modal', function () {
                                window.location.href = raiz_url + "login/registration";
                            });
                        }
                    }
                }
            });
        }
    });


 });