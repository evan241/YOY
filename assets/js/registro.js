
$(document).ready(function () {


    $('#formRegistration').submit(function (e) {
        e.preventDefault();

        var formdata = new FormData($(this)[0]);
        $.ajax({
            url: raiz_url + "login/ajax_registrar_usuario",
            type: 'POST',
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == '1') {
                    alert("Usuario registrado");
                }
                else if (data == '2') {
                    alert("Email ya esta registrado");
                }
                else {
                    alert("Error en los campos");      
                }
            }
        });
    });


});