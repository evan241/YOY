
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


});