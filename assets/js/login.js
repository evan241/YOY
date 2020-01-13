
$(document).ready(function () {

    $('#RG_PASSWD_USUARIO').on('keydown', function (e) {
        if (e.which == 13) {
            $('#btnEntrar').click();
        }
    });

    $('#RG_USERNAME_USUARIO').on('keydown', function (e) {
        if (e.which == 13) {
            $('#btnEntrar').click();
        }
    });

    $('#btnFormYOY').on('submit', function (e) {
        e.preventDefault();
        // $('#btnLoginYOY').html('<img src="' + raiz_url + 'assets/img/loading.svg" width="20">');
        $.ajax({
            url: raiz_url + "login/ajax_validate_user",
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                if (data == '1') {
                    window.location.href = raiz_url + "site/index";
                }
                else if (data == '2') {
                    alert("datos incorrectos")
                }
                else {
                    $('#messages').html(data);
                    $('#messages').focus();
                }
                $('#btnLoginYOY').html('login');
            }
        });
    });


}); //FIN DE ONREADY

