$(document).ready(function(){
  $('#intro-video').modal('show'); 
   $('#intro-video').on('shown.bs.modal', function () {
    $('#videox')[0].play();
  })
  $('#intro-video').on('hidden.bs.modal', function () {
    $('#videox')[0].pause();
  })
   loadGallery(true, 'div.thumbnail');
   //This function disables buttons when needed
   function disableButtons(counter_max, counter_current){
       $('#show-previous-image, #show-next-image').show();
       if(counter_max == counter_current){
           $('#show-next-image').hide();
       } else if (counter_current == 1){
           $('#show-previous-image').hide();
       }
   }

   function loadGallery(setIDs, setClickAttr){
       var current_image,
           selector,
           counter = 0;

       $('#show-next-image, #show-previous-image').click(function(){
           if($(this).attr('id') == 'show-previous-image'){
               current_image--;
           } else {
               current_image++;
           }

           selector = $('[data-image-id="' + current_image + '"]');
           updateGallery(selector);
       });

       function updateGallery(selector) {
           var $sel = selector;
           current_image = $sel.data('image-id');
           $('#image-gallery-caption').text($sel.data('caption'));
           $('#image-gallery-title').text($sel.data('title'));
           $('#image-gallery-image').attr('src', $sel.data('image'));
           disableButtons(counter, $sel.data('image-id'));
       }

       if(setIDs == true){
           $('[data-image-id]').each(function(){
               counter++;
               $(this).attr('data-image-id',counter);
           });
       }
       $(setClickAttr).on('click',function(){
           updateGallery($(this));
       });
   }
});