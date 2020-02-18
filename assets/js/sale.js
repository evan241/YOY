$(document).ready(function () {
   /* SALE VIEW */
   $(".hover-img").hover(function () {
      let img = $(this).data('img');

      $('#main_img').fadeOut(300, function(){
         $(this).attr('src',img).bind('onreadystatechange load', function(){
               if (this.complete) $(this).fadeIn(100);
         });
      });   
   })
   $("#FIN_CHOOSE_SHIP").click(function (e) {
      e.preventDefault();

      if ($('input[name=type_ship]:checked').val() == 1) { checked("input[name='shipNacional']") }
      else { checked("input[name='shipInternacional']") }

      let id = $("#ID_SHIP").val();
      let type_ship = $("#TYPE_SHIP").val();
      let id_product = $("#ID_PRODUCT").val();
      let total_final = $("#TOTAL_FINAL").html();
      let precio_envio = $("#PRECIO_ENVIO").html();

      $.ajax({
         type: "POST",
         url: raiz_url + "Store/ajax_choose_ship",
         data: {
            id: id,
            type: type_ship,
            product: id_product,
            envio: precio_envio,
            total: total_final
         },
         success: function (res) {
            if (res === 'error') {
               alert('No selecciono cómo le enviamos a enviar su pedido')
            } else {
               window.location.replace(raiz_url + "Store/proccess_payment/" + res);
            }
         }
      });
   })
   $("#FIN_CHOOSE_PAYMENT").click(function (e) {

      checked_payment("input[name='payment']");

      let id_pago = $("#ID_PAGO").val();
      let nombre_pago = $("#NOMBRE_PAGO").val();

       $.ajax({
         type: "POST",
         url: raiz_url + "Store/ajax_choose_payment",
         data: {
            id: id_pago,
            nombre: nombre_pago
         },
         success: function (res) {
            if (res === 'error') {
               alert('No seleccionó el tipo de pago');
            } else {
               window.location.replace(raiz_url + "Store/resume/" + res);
            }
         }
      }); 
   })
   /* PROCCESS SALE */
      let precio_product = $("#PRECIO_PRODUCTO").html();
      get_total(precio_product,0);

   $('input[name=type_ship]').on('change', function() {
      let val = $('input[name=type_ship]:checked').val();
      if (val === 1){
         if ($("#Nacional").hasClass('hide')) {
            $(this).removeClass('hide');
            $("#Internacional").addClass('hide');
            $("#labelNacional").addClass('color-yellow');
            $("input[name=shipInternacional]").prop('checked',false);
            $(".circle-opt").removeClass('checked-input');
         }else{
            $(this).addClass('hide');
            $("#Internacional").removeClass('hide');
         }
      }else{
         if ($("#Internacional").hasClass('hide')) {
            $("#Nacional").addClass('hide');
            $("#Internacional").removeClass('hide');
            $("input[name=shipNacional]").prop('checked',false);
            $(".circle-opt").removeClass('checked-input');

         } else {
            $("#Nacional").removeClass('hide');
            $("#Internacional").addClass('hide');
         }
      }
   })

   $("#FIN_CHOOSE_PAYMENT").click(function(e){        
     
      checked_payment("input[name='payment']") ;

      let id_pago = $("#ID_PAGO");
      let nombre_pago = $("#NOMBRE_PAGO");

     $.ajax({
         type: "POST",
         url: raiz_url+"Store/ajax_choose_payment",
         data: {id:id_pago,           
            nombre:nombre_pago},
         success: function (res) {
            if (res === 'error'){
               alert('No seleccionó el tipo de pago');
            }else{
               window.location.replace(raiz_url + "Store/resume/" + res);
            }
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
      
      get_total(precio_producto,precio_envio);
   });

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
   function get_total(product,ship){
      ship = parseInt(ship);
      product = parseInt(product);
      let total = product + ship;
      $("#TOTAL_FINAL").html("$"+total);
   }
})
