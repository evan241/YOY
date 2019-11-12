
$(document).ready(function () {

    //inicializar controles clock

    //////////////////////////////////////////////
    //////////// FIN DE INICIALIZACIONES//////////
    //////////////////////////////////////////////   
    
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
    
    $('#btnEntrar').on('click', function () {
        $('#btnEntrar').html('<img src="' + raiz_url + 'assets/img/loading.svg" width="20">');
        $.ajax({
            url: raiz_url + "login/ajax_validate_user",
            type: 'POST',
            data: 'USERNAME_USUARIO=' + $('#RG_USERNAME_USUARIO').val()+
                  '&PASSWD_USUARIO=' + $('#RG_PASSWD_USUARIO').val(),  
            success: function (data) {
                console.log(data);
                if (data == 'Ok') {
                    window.location.href = "inicio/index";
                }
                else {
                    $('#messages').html(data);
                    $('#messages').focus();
                }
                $('#btnEntrar').html('<i class="fa fa-sign-in" aria-hidden="true"></i> Entrar');
            }
        });
    });
    
    
    
}); //FIN DE ONREADY

