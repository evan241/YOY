<?php
    
    $CI =& get_instance();
    $ID_PRODUCT = $this->uri->segment(3);
    $IMG = $CI->db->get_where('img_producto',array('ID_PRODUCTO'=>$ID_PRODUCT))->result_array();
    
?>
<!-- Page Preloder -->
<div id="preloder">
   <div class="loader"></div>
</div>
<style>
   @media (min-width: 1200px) {
      .img {
         margin-right: -15px
      }

      .hover-img {
         cursor: pointer
      }

   }

   footer {
      display: none;
   }
   .input-cant[readonly] {
      background: #1b1b1b;
		border: 0;
		color: white;
		outline:0
   }
  

   .details-buy {
      font-size: 18px;
      color: #60656b;
      line-height: 1.8;
   }

   .pd-left20 {
      padding-left: 27px;
   }
</style>
<!-- Page info section -->
<section class="page-info-sectionII">
   <h2>Your cart</h2>
</section>
<!-- Page info section end -->
<div class="container mt-container bg-black">
   <div class="row fontRoboto">
      <div class="col-sm-12 col-md-12  col-lg-2 col-lg-offset-1 text-right">
         <?php 
            if(count($IMG)){
                foreach ($IMG as $key => $row) {
                    $img = $row['NOMBRE_IMG'];
                    echo "
                    <div class='hover-img' data-img='".base_url('assets/img/store/'.$img)."'>
                    <img class='form-group img' src='".base_url('assets/img/store/'.$img)."' width='90%'>
                    </div>";
                }
            }
        ?>
      </div>
      <!--ESTA ES UNA PRUEBA DE GIT-->
      <!-- Main img description -->
      <div class="col-sm-12 col-md-12  col-lg-6 text-center">
         <img src="<?=base_url($product['IMAGEN_PRODUCTO'])?>" id="main_img" alt="">
      </div>
      <div class="col-sm-12 col-md-12  col-lg-4 ">
         <div class="about-text-box-warp">
            <div class="about-text">
               <h3><?=strtoupper($product['NOMBRE_PRODUCTO'])?></h3>
               <h2> $<?=$product['PRECIO_PRODUCTO']?></h2>
             
                  <div class="details-buy">
                     <i class="fa fa-credit-card"></i> 12 meses de $70 sin intereses
                  </div>
                  <div class="details-buy pd-left20 form-group">
                     <i class="fa fa-cc-visa fa-2x"></i>
                     <i class="fa fa-cc-mastercard fa-2x"></i>
                     <i class="fa fa-cc-amex fa-2x"></i>
                  </div>
                  <div class="details-buy form-group">
                     <i class="fa fa-bus"></i>  Envío a toda la república <br>
                  </div>
                  <div class="details-buy">
                      <i class="fa fa-undo"></i>  Garantía de 30 días <br>
                  </div>
                  <div class="details-cant form-group">
                     <div class="col-lg-5 pd-cant">
                        <div class="input-group mt-3">
                           
                           <div class="input-group-prepend">
                              <button class="input-group-text" id="minus"><i class="fa fa-minus colorBlack"></i></button>
                           </div>

                           <input type="text" class="form-control text-center input-cant" readonly placeholder="0" value="1" id="cant">
                            
                           <div class="input-group-prepend">
                              <button class="input-group-text btn-add" id="add"><i class="fa fa-plus colorBlack"></i></button>
                           </div>
                        </div>
                     </div>
                  </div>
               <div>
               <br>
                  <a id="BUY_NOW" href="<?=base_url('Store/proccess_sale/' . $product['ID_PRODUCTO']);?>"
                     class="btn btn-sale">Comprar ahora</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>