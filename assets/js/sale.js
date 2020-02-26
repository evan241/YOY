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
            total: total_final,
            envio: precio_envio,
            product: id_product,
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
             send_mail();
             window.location.replace(raiz_url + "Store/resume/" + res);
            }
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
      $.ajax({
         type: "POST",
         url: "Store/",
         data: "data",
         dataType: "dataType",
         success: function (response) {
            
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
   function send_mail(){
      $.ajax({
         type: "POST",
         url: raiz_url+"Store/send_mail",
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
