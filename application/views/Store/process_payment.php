
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
         <h3>¿Cómo quieres pagar? </h3>
         
         <label class="label-ship">Opciones de pago</label>
         <!-- Medios de pago -->
         <div id="type_payment">
         <?php 
            $CI =& get_instance();
            $shipNacional = $this->db->get_where('medio_pago',array('VIGENTE_MEDIO_PAGO'=> 1 ))->result_array();
            foreach ($shipNacional as $key => $row) {
            $id = $row['ID_MEDIO_PAGO'];
            $name = $row['NOMBRE_MEDIO_PAGO'];
            ?>
            <div class="form-group">            
               <div class="row style-ship details-buy pointer" id="divNacional<?=$key?>">
                  <div class="col-lg-2 align-middle">
                     <div class="circle-opt">
                     <input type="radio" name="shipNacional" data-name="<?=$name?>" id="<?=$id?>">
                     </div>
                  </div>
                  <div class="col-lg-10">
                     <div>
                        <b><?=$name?></b>
                        
                     </div>
                  </div>
                  
               </div>
            </div>
         <?php } ?>
         </div>
         
         <button type="button" id="nextStep" class="btn btn-primary">Continuar</button>
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
               <label class="label-ship float-right">$900.00</label> 
                        
            </div>
         </div>
         <div class="row justify-content-center">
            <div class="col-lg-10 col-lg-offset-1">
               <label class="label-ship">Pagas</label> 
               <label class="label-ship float-right">$900.00</label>                         
            </div>
         </div>
      </div>
   </div>
</div>