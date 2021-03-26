
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
                    Swal.fire({
                        title: '¡Usuario registrado!',
                        text: 'Se ha enviado un correo a su bandeja de entrada',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3500,
                        onClose: function () {
                            window.location.href = raiz_url + "login/";
                        }
                    });
                }
                else if (data == '2') {
                    Swal.fire({
                        title: '¡Usuario existente!',
                        text: 'Puedes recuperar tu contraseña',
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 3500,
                        onClose: function () {
                            window.location.href = raiz_url + "login/ForgotPassword";
                        }
                    });
                }
                else {
                    Swal.fire({
                        title: '¡Error al registrar!',
                        text: 'Verifique los datos',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 3500,
                        onClose: function () {
                            //window.location.href = raiz_url + "login/registro";
                        }
                    });
                }
            }
        });
    });


});