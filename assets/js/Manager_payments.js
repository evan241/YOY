
var asInitVals = new Array();
$(document).ready(function () {

    $('body').on("click", ".btn-toggle-payment", function (e) {

        if (!e.isDefaultPrevented()) {
            e.preventDefault();

            var ID_PAYMENT = $(this).attr('data-id-payment');
            if (ID_PAYMENT > 0) {

                $.ajax({
                    url: raiz_url + "manager_payments/ajax_toggle_payments",
                    type: 'POST',
                    data: 'ID_PAYMENT=' + ID_PAYMENT,
                    success: function (data) {

                        if (data) {
                        window.location.reload();
                    } else {

                    }
                }
            });
            }
        }
    });
    
});
///FUNCIONES JS..