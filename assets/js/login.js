
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
            success: function (response) {
                if (response == 'Ok') {
                    window.location.href = raiz_url + "site/index";
                }
                else {
                    $('#messages').html(response);
                    $('#messages').focus();
                }
                $('#btnLoginYOY').html('login');
            }
        });
    });


}); //FIN DE ONREADY

