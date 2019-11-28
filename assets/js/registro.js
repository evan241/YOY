
$(document).ready(function () {

// $("#formRegistration").submit(function (event) {
    //     event.preventDefault();
    //     var formData = new FormData($(this)[0]);

    //     $.ajax({
    //         url: raiz_url + "Login/insert_user",
    //         type: "POST",
    //         data: formData,
    //         cache: false,
    //         contentType: false,
    //         processData: false
    //     })
    //         .done(function (data) {
    //             let json = JSON.parse(data);
    //             let msj = json.msj;

    //             if (msj == "true") {
    //                 alert("registro exitoso");

    //             } else {
    //                 alert("incorrecto");

    //             }

    //         })
    // });

    $('#formRegistration').submit(function (e) {
        if (!e.isDefaultPrevented()) {
            e.preventDefault();
            // var formData = new FormData($(this)[0]);

            // $('#modAdvice').modal('toggle');
            // $('#modBodyAdvice').html('Enviando...');

            $.ajax({
                url: raiz_url + "registro/validar",
                type: 'POST',
                // data: this,
                data: $(this).serialize(),
                // data: formData,
                success: function (data) {

                    console.log(data);
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


 });