<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<section class="page-info-sectionII set-bg">
    <!-- <h2>Your cart</h2> -->
</section>
<style>
.form-group{margin-bottom:10px}
.style-ship {
  
    padding: 8px 0px;
}
</style>

<div class="container mt-container bg-black">
   <div class="row">
      <div class="col-lg-8">
         <h3>¿Cómo quieres pagar? </h3>
         
         <label class="label-ship">Opciones de pago</label>
         <!-- Medios de pago -->
         <div id="type_payment">
         <?php 
            $CI =& get_instance();
            $Payment = $this->db->get_where('medio_pago',array('VIGENTE_MEDIO_PAGO'=> 1 ))->result_array();
            foreach ($Payment as $key => $row) {
            $id = $row['ID_MEDIO_PAGO'];
            $name = $row['NOMBRE_MEDIO_PAGO'];
            $img =  $row['SRC_IMG'];                  
         
            ?>                                                                                     
            <div class="form-group">            
               <div class="row style-ship details-buy pointer" id="divPayment<?=$key?>">
                  <div class="col-lg-2 align-middle">
                     <div class="circle-opt">
                     <input type="radio" name="payment" data-name="<?=$name?>" id="<?=$id?>">
                     </div>
                  </div>
                  <div class="col-lg-8">
                     <div>
                        <b><?=$name?></b>                        
                     </div>
                  </div>
                  <div class="col-lg-2">
                     <div>
                        <img src="<?=$img?>" width="70%">
                     </div>
                  </div>
               </div>
            </div>
         <?php } ?>
         </div><br>
         <input type="hidden" id="ID_PAGO">
         <input type="hidden" id="NOMBRE_PAGO">
         <button type="button" id="FIN_CHOOSE_PAYMENT" class="btn btn-sale ml--15">confirmar compra</button>
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
