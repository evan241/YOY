
<section class="page-info-sectionII set-bg">
    <!-- <h2>Your cart</h2> -->
</section>
<style>.form-group{margin-bottom:10px}
.style-ship {
  
    padding: 8px 0px;
}
</style>

<div class="container mt-container">
   <div class="row">
      <div class="col-lg-8">
         <h3>RESUMEN DE COMPRA #135e4b3ad1418c8</h3>
         

         <label class="label-ship">Producto</label>
            <div class="form-group">            
               <div class="row style-ship details-buy pointer" >
                  <div class="col-lg-2 align-middle">
                     <div class="circle-opt checked-input">
                     <input type="radio" name="product" checked>
                     </div>
                  </div>
                  <div class="col-lg-8">
                     <div>
                        <b>Mesa de centro</b>                        
                     </div>
                  </div>
                  <div class="col-lg-2">
                     <div><img src="" width="70%"></div>
                  </div>
               </div>
            </div>
         <label class="label-ship">Tipo de pago</label>
         <!-- Medios de pago -->
         <div id="type_payment">
            <div class="form-group">            
               <div class="row style-ship details-buy pointer" >
                  <div class="col-lg-2 align-middle">
                     <div class="circle-opt checked-input">
                     <input type="radio" name="payment" checked>
                     </div>
                  </div>
                  <div class="col-lg-8">
                     <div>
                        <b>Pago Oxxo</b>                        
                     </div>
                  </div>
                  <div class="col-lg-2">
                     <div><img src="" width="70%"></div>
                  </div>
               </div>
            </div>            
         </div>
          
         <button type="button" id="FIN_CHOOSE_PAYMENT" class="btn btn-sale">Ver mis compras</button>
      </div>
      <div class="col-lg-4">
         <div class="row justify-content-center">
            <div class="col-lg-10 col-lg-offset-1 text-center form-group">
               <img src="<?= base_url($product['IMAGEN_PRODUCTO']) ?>" alt="">
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
               <h4><?=$product['NOMBRE_PRODUCTO'];?></h4>
            </div>
         </div><hr>
         <div class="row justify-content-center">
            <div class="col-lg-10 col-lg-offset-1 border-bottomx">
               <label class="label-ship">Producto</label> 
               <label class="label-ship float-right"><?=$product['PRECIO_PRODUCTO']?></label> 
                        
            </div>
         </div>
           <div class="row justify-content-center">
            <div class="col-lg-10 col-lg-offset-1 border-bottomx">
               <label class="label-ship">Envio</label> 
               <label class="label-ship float-right"><?=$this->session->userdata('TEMP_CHOSSE_PRICE_ENVIO');?></label> 
                        
            </div>
         </div>
         <div class="row justify-content-center">
            <div class="col-lg-10 col-lg-offset-1">
               <label class="label-ship">Pagas</label> 
               <label class="label-ship float-right color-yellow"><?=$this->session->userdata('TEMP_CHOSSE_TOTAL');?></label>                         
            </div>
         </div>
      </div>
   </div>
</div>