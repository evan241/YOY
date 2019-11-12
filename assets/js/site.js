String.prototype.trim = function () {
    return this.replace(/^\s+|\s+$/g, "");
};
var asInitVals = new Array();
$(document).ready(function () {

    //inicializar controles clock

    //////////////////////////////////////////////
    //////////// FIN DE INICIALIZACIONES//////////
    //////////////////////////////////////////////   
    
    $('#password').on('keydown', function (e) {
        if (e.which == 13) {
            $('#btnLogin').click();
        }
    });
    
    $('#username').on('keydown', function (e) {
        if (e.which == 13) {
            $('#btnLogin').click();
        }
    });
    
    $('#btnLogin').on('click', function () {
        $('#btnLogin').html('<img src="' + raiz_url + 'assets/img/loading.svg" width="20">');
        $.ajax({
            url: raiz_url + "site/ajax_validate_user",
            type: 'POST',
            data: 'username=' + $('#username').val()+
                  '&password=' + $('#password').val(),  
            success: function (data) {
                console.log(data);
                if (data == 'Ok') {
                    window.location.href = raiz_url + "site/index";
                }
                else {
                    $('#messages').html(data);
                    $('#messages').focus();
                }
                $('#btnLogin').html('login');
            }
        });
    });
    
    
    
}); //FIN DE ONREADY

