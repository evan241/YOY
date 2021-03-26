$(document).ready(function () {
   /* SALE VIEW */
   $(".hover-img").hover(function () {
      let img = $(this).data('img');
      $("#main_img").attr('src',img);

     /*  $('#main_img').fadeOut(300, function(){
         $(this).attr('src',img).bind('onreadystatechange load', function(){
               if (this.complete) $(this).fadeIn(100);
         });
      });    */
   })
   $("#BUY_NOW").click(function(e)
   {
      e.preventDefault();

      let attr = $(this).attr('href');
      let cant = $("#cant").val();

      $.ajax({
         type: "POST",
         url: raiz_url+"Store/ajax_BuyNow",
         data: {cant:cant},         
         success: function (res) {
            window.location.href = attr;
         }
      });
   })
   $("#FIN_CHOOSE_SHIP").click(function (e) {
      e.preventDefault();
      
      if ($('input[name=type_ship]:checked').val() == 1)
           { checked("input[name='shipNacional']") }
      else { checked("input[name='shipInternacional']") }
      
      var DataShip = new FormData($("#ADDRESS_FORM")[0]);

      DataShip.append('id',$("#ID_SHIP").val());
      DataShip.append('type',$("#TYPE_SHIP").val());
      DataShip.append('product',$("#ID_PRODUCT").val());
      DataShip.append('total',$("#TOTAL_FINAL").html());
      DataShip.append('envio',$("#PRECIO_ENVIO").html());

      $.ajax({
         type: "POST",
         url: raiz_url + "Store/ajax_choose_ship",
         data: DataShip,
         cache: false,
         contentType: false,
         processData: false,
         success: function (res) {
            if (res === 'error') {
               alert('No selecciono cómo le vamos a enviar su pedido')
            } else {
               window.location.replace(raiz_url + "Store/proccess_payment/" + res);
            }
         }
      });
   })
   $("#FIN_CHOOSE_PAYMENT").click(function (e) {
       $("#FIN_CHOOSE_PAYMENT").html("Wait a moment...");
       $("#FIN_CHOOSE_PAYMENT").prop( "disabled", true );
      checked_payment("input[name='payment']");
      let id_pago = $("#ID_PAGO").val();
      let nombre_pago = $("#NOMBRE_PAGO").val();
      
       $.ajax({
         type: "POST",
         url: raiz_url + "Store/ajax_choose_payment",
         data: {
            id: id_pago,
            nombre: nombre_pago,
         },
         success: function (res) {
            if (res === 'error') {
                alert('No seleccionó el tipo de pago');
            } else {
                send_mail(res);
                setTimeout(() => {  window.location.replace(raiz_url + "Store/resume/" + res); }, 10000);
            }
         },
         error: function(e){
             alert('Error!');
         }
      }); 
   })
   /* PROCCESS SALE */
      let precio_product = $("#PRECIO_PRODUCTO").html();
      var cant_temp = $("#CANT_TEMP").val();
      get_total(precio_product,0,cant_temp);

   $('input[name=type_ship]').on('change', function() {
      let val = $('input[name=type_ship]:checked').val();
      if (val === 1){

         if ($("#Nacional").hasClass('hide'))
         {
            $(this).removeClass('hide');
            $("#Internacional").addClass('hide');           
            $("input[name=shipInternacional]").prop('checked',false);
            $(".circle-opt").removeClass('checked-input');
            
            $("#typeShip1").addClass('checked');
            $("#typeShip2").removeClass('checked');

            $("#PRECIO_ENVIO").html('$0.00');
            get_total(precio_product,0,cant_temp);
         }else{
            $(this).addClass('hide');
            $("#Internacional").removeClass('hide');

            $("#PRECIO_ENVIO").html('$0.00');
            get_total(precio_product,0,cant_temp);
         }
      }else{
         
         if ($("#Internacional").hasClass('hide'))
         {
            $("#Nacional").addClass('hide');
            $("#Internacional").removeClass('hide');
            $(".circle-opt").removeClass('checked-input');
            $("input[name=shipNacional]").prop('checked',false);
            $("input[name=shipInternacional]").prop('checked',false);
            
            $("#typeShip2").addClass('checked');
            $("#typeShip1").removeClass('checked');

            $("#PRECIO_ENVIO").html('$0.00');
            get_total(precio_product,0,cant_temp);
         } else {
            $("#typeShip1").addClass('checked');
            $("#typeShip2").removeClass('checked');
             
            $("#Nacional").removeClass('hide');
            $("#Internacional").addClass('hide');

            $("#PRECIO_ENVIO").html('$0.00');
            get_total(precio_product,0,cant_temp);
         }
      }
   })

   $("#ADDRESS_FORM").submit(function(e){
      e.preventDefault();
      var formData = new FormData($(this)[0]);

      $.ajax({
         type: "POST",
         url: raiz_url+"Store/ajax_SaveInfoSale",
         data: formData,
         cache: false,
         contentType: false,
         processData: false,
         success: function (res) {
            
            $("#MODAL_DIRECCION").modal('hide');

            let direccion = "<i class='fas fa-home'></i> "+$("#CALLE_EDIT").val()+" #"+$("#NUM_EDIT").val()+", "+$("#COLONIA_EDIT").val();
            $("#DIR_CLIENT").html(direccion);
            $("#PAIS_CLIENT").html("<i class='fas fa-flag'></i> "+$("#PAIS_EDIT").val());
            $("#ESTADO_CLIENT").html($("#ESTADO_EDIT").val());
            $("#CIUDAD_CLIENT").html($("#CIUDAD_EDIT").val());
            $("#CP_CLIENT").html("C.P. "+$("#CP_EDIT").val());
            $("#TELEFONO_CLIENT").html($("#TEL_EDIT").val());
            $("#NOMBRE_CLIENT").html($("#NOMBRE_EDIT").val()+" "+$("#APE_EDIT").val());
         
         }
      });
   })

   $("body").on('click','.pointer',function()
   {      
      var divID = "#"+$(this).attr('id');
      var input = divID +" input"; 
      var circle = divID + " .circle-opt";
      var checked = "checked-input";
      
      var precio_producto = $("#PRECIO_PRODUCTO").html();
      var precio_envio = $(input).data('price');
    
      $(input).prop('checked', true);
      //$(circle).addClass(checked);
      $("#PRECIO_ENVIO").html("$"+precio_envio);
      
      $.each($(".circle-opt"), function () {        
         $(this).removeClass(checked);
      });
      $(circle).addClass(checked);       
      
      get_total(precio_producto,precio_envio,cant_temp);

      
   });
   $("#minus").click(function(){
      var oldValue = $("#cant").val();
      var sum=0;

      if(oldValue <= 1){
         sum = 1;
      }else{
         sum = parseInt(oldValue) - 1;
      }
      $("#cant").val(sum)
   
   })
   $("#add").click(function(){
      var oldValue = $("#cant").val();
      var sum=0;

      if(oldValue < 1){
         sum = 1;
      }else{
         sum = parseInt(oldValue) + 1;
      }
      $("#cant").val(sum);
   
   })
   function send_mail(id){
      $.ajax({
         type: "POST",
         url: raiz_url + "Store/send_mail/" + id,
         data: {data:"data"},
         success: function (response) {
            
         }
      });
   }
   function checked(name){
      $(name).each(function (i) {
         if (this.checked) {
            $("#ID_SHIP").val($(this).attr('id'));
            $("#TYPE_SHIP").val($(this).attr('name'));            
         }
      });
   }
   function checked_payment(name) {
      $(name).each(function (i) {
         if (this.checked) {
            $("#NOMBRE_PAGO").val($(this).data('name'));
            $("#ID_PAGO").val($(this).attr('id'));
         }
      });
   }
   function get_total(product,ship,cant){
      ship = parseInt(ship);
      product = parseInt(product);
      cant = parseInt(cant);

      let total = (product*cant) + ship;
      
      $("#TOTAL_FINAL").html("$"+total);


   }
})
