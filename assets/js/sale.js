$(document).ready(function () {

   $("#SELECT_TIPO_ENVIO").change(function(){
      if ($(this).val() === 1){
         if ($("#Nacional").hasClass('hide')) {
            $(this).removeClass('hide');
            $("#Internacional").addClass('hide');
         }else{
            $(this).addClass('hide');
            $("#Internacional").removeClass('hide');
         }
      }else{
         if ($("#Internacional").hasClass('hide')) {
            $("#Nacional").addClass('hide');
            $("#Internacional").removeClass('hide');
         } else {
            $("#Nacional").removeClass('hide');
            $("#Internacional").addClass('hide');
         }
      }
   })

   $("body").on('click','.pointer',function()
   {
      var divID = "#"+$(this).attr('id');
      var input = divID +" input"; 
      var circle = divID + " .circle-opt";
      var checked = "checked-input";

      $(input).prop('checked', true);
      $(circle).addClass(checked);
      
      $.each($(".circle-opt"), function () {        
         $(this).removeClass(checked);
         $(circle).addClass(checked)       
      });
        
   });

   $(".hover-img").hover(function () {
      let img = $(this).data('img');
      $('#main_img').attr("src", img);
   })

   $("#nextStep").click(function(){
      if(!$("#Nacional").hasClass('hide'))
      {
         checked("input[name='shipNacional")
      }else{
         checked("input[name='shipInternacional']")
      }
   }) 
   function checked(name){
      $(name).each(function (i) {
         if (this.checked) {
            alert("El ID del input es:  " + $(this).attr('id') + "\nEl name es:  " + $(this).attr('name'))
         }
      });
   }
})
