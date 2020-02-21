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

    $('#formContact').on('submit', function (e) { console.log('hola')
        if (e.isDefaultPrevented()) {
// handle the invalid form...

        } else {
// everything looks good!
            e.preventDefault();
            $('#modAdvice').modal('toggle');
            $('#modBodyAdvice').html('Enviando...');

            $.ajax({
                url: raiz_url + "Site/send_mail",
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if (parseInt(data) > 0) {
                        console.log(data);
                        $('#modBodyAdvice').html('<b>! La información se envió correctamente ¡</b> ');
                    } else {
                        $('#modBodyAdvice').html('<b>Hubo un error al realizar la operación...</b>');
                    }

                }
            });
            //MANDAR AJAXX... 
            $('#modAdvice').on('hidden.bs.modal', function () {
                window.location.reload();
            });
        }
    });

}); //FIN DE ONREADY

