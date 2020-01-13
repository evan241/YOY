
var asInitVals = new Array();
$(document).ready(function () {
    //Products
    $('#dataVentas').dataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        //"iDisplayLength": 30,
        //"sSwfPath": "/swf/copy_csv_xls_pdf.swf",
        "iDisplayLength": 25,
        "aLengthMenu": [[15, 25, 50, 100, -1], [15, 25, 50, 100, "Todos"]],
        "bDestroy": true,
        "bServerSide": false,
        "bProcessing": true,
        "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information dt-filter"ip><"clear">',
        buttons: [
            {
                extend: 'csv',
                text: 'Excel',
                title: 'Productos',
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                }
            }
        ],
        "aaSorting": [],
        "sPaginationType": "full_numbers", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
        "oLanguage": {
            "sLoadingRecords": "Cargando...",
            "sEmptyTable": "No hay registros disponibles",
            "sInfo": "Resultado _START_ - _END_ de _TOTAL_ registros",
            "sLengthMenu": " Mostrar _MENU_ registros",
            "sSearch": "Buscar :",
            "sInfoEmpty": "Mostrando 0 - 0 de 0 registros",
            "sInfoFiltered": "(Filtrado de _MAX_ registros)",
            "sProcessing": "Procesando...",
            "sZeroRecords": "No se localizaron registros",
            "oPaginate": {
                "sNext": "Sig",
                "sLast": "",
                "sPrevious": "Ant",
                "sFirst": ""
            }
        }
    });
    
    //filtros--
    $("thead input").keyup(function () {
        /* Filter on the column (the index) of this element */
        oTableUsers.fnFilter(this.value, $("thead input").index(this));
        pTable.fnFilter(this.value, $("thead input").index(this));
    });

    
    /*
     * Support functions to provide a little bit of 'user friendlyness' to the textboxes in
     * the footer
     */
    $("thead input").each(function (i) {
        asInitVals[i] = this.value;
    });


    $("thead input").focus(function () {
        if (this.className == "search_init")
        {
            this.className = "";
            this.value = "";
        }
    });


    $("thead input").blur(function (i) {
        if (this.value == "")
        {
            this.className = "search_init";
            this.value = asInitVals[$("thead input").index(this)];
        }
    });


    $('#DIV_FECHA_VIGENCIA_PASSWORD').datepicker({
        'isRTL': false,
        'format': 'dd/mm/yyyy',
        'autoclose': true,
        'language': 'es'
    });

    
    
    //FIN USUARIO...//
});
///FUNCIONES JS..