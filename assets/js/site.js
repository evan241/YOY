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
    
    
    
    
    
}); //FIN DE ONREADY

