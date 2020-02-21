
<?php 

$CI =& get_instance();

$SelectUser = "DIRECCION_USUARIO, TELEFONO_USUARIO, CP_USUARIO";
$user = $CI->db->select($SelectUser)->get_where('usuario',array('ID_USUARIO' => $infoSale->ID_USUARIO))->row();
$dir = $user->DIRECCION_USUARIO;
$tel = $user->TELEFONO_USUARIO;
$cp = $user->CP_USUARIO;

$idShip = $infoSale->ID_TIPO_ENVIO;
$SelectShip = "NOMBRE_TIPO_ENVIO,TIEMPO_TIPO_ENVIO,PRECIO_TIPO_ENVIO";
$shipping = $CI->db->select($SelectShip)->get_where('tipo_envio',array('ID_TIPO_ENVIO'=>$idShip))->row();
$ship = $shipping->NOMBRE_TIPO_ENVIO;
$time_ship = $shipping->TIEMPO_TIPO_ENVIO;
$shipPrice = $shipping->PRECIO_TIPO_ENVIO;

$idPayment = $infoSale->ID_MEDIO_PAGO;
$typePayment= $CI->db->select('NOMBRE_MEDIO_PAGO,SRC_IMG')->get_where('medio_pago',array('ID_MEDIO_PAGO'=>$idPayment))->row();
$payment = ($idPayment == 4) ? "<div id='paypal-button-container'></div>" : "Cuenta Bancaria a depositar: 95e4ce70b4qtl43o9x";
$imgPayment = $typePayment->SRC_IMG;

$idProduct = $infoSale->ID_PRODUCTO;
$Product = $CI->db->select('PRECIO_PRODUCTO')->get_where('producto',array('ID_PRODUCTO'=>$idProduct))->row();
$PrecioProduct= $Product->PRECIO_PRODUCTO;

$ID_VENTA = $infoSale->ID_VENTA;
?>
<style>
   .form-group{margin-bottom:10px}
   .style-ship {padding: 8px 0px;}
</style>

<div id="preloder">
   <div class="loader"></div>
</div>
<section class="page-info-sectionII set-bg">
</section>
<div class="container mt-container">
   <h4>RESUMEN DE COMPRA #<?=$infoSale->ID_SALE." "; echo $ID_VENTA;?></h4><br>
   <div class="row">
      <div class="col-lg-8">
         <div class="form-group">            
            <div class="row style-ship details-buy pointer pt-10">
              <!-- PRODUCTO -->
              <div class="col-lg-2 align-middle form-group">                     
               <img src="https://image.flaticon.com/icons/png/512/126/126165.png" width="40%">
            </div>
            <div class="col-lg-8 form-group">
               <div> <p>Mesa de centro</p> </div>
            </div>
            <div class="col-lg-2 form-group">
               <div>$<?=$PrecioProduct?></div>
            </div>
            <!--ENVIO -->
            <div class="col-lg-2 form-group align-middle">                     
               <img src="https://www.bedbathntable.com.au/media/wysiwyg/logos/BBNT-Shipping-Logo-Black_Mobile_.png" width="50%">
            </div>
            <div class="col-lg-8 form-group">
               <div>
                  <p><?=$ship." - ".$time_ship?></p>                        
               </div>
            </div>
            <div class="col-lg-2 form-group">
               <div>$<?=$shipPrice?></div>
            </div>
            <!-- DIRECCION -->
            <div class="col-lg-2 align-middle form-group">                     
               <img src="https://viptanning.com/wp-content/uploads/2016/05/location-icon-map-png-93d693c9-2482-44c1-9073-d95246ce6de3_iconmonstr-location-16-icon.png" width="50%">

            </div>
            <div class="col-lg-8 form-group">
               <div>
                  <p><?=$dir." - Tel.".$tel?></p>                        
               </div>
            </div>
            <div class="col-lg-2 form-group">
               <div>Código Postal <?= $cp ?></div>
            </div>

            <!-- PAYMENT -->
            <div class="col-lg-2 align-middle form-group">                     
              <img src="<?=$imgPayment?>" width="50%">
           </div>
           <div class="col-lg-8 form-group">
            <div class="col-lg-6">
               <?=$payment?>                     
            </div>
         </div>
         <div class="col-lg-2 form-group">
            Status <br>
            <span class="status-pill status-pending">No pagado</span>
         </div>
         <!-- Progress -->

      </div>
   </div>
   <br>
   <div class="">
      <div class="project ml-10 ">
         <div class="task pending"><img src="https://static.thenounproject.com/png/99630-200.png" width="80%" style="margin-top: .3em;margin-left: .2em;"></div>
         <div class="progress"><div> </div> </div>
         <div class="task"></div>
         <div class="progress"><div> </div></div>
         <div class="task"></div>
      </div>
      <label class="label-ships ml-5">Pendiente</label>
   </div>
   <!--  <button type="button" id="" class="btn btn-sale ml--15">Ver mis compras</button> -->
</div>
<div class="col-lg-4">
   <div class="row justify-content-center">
      <div class="col-lg-10 col-lg-offset-1 text-center form-group">
         <img src="<?= base_url($product['IMAGEN_PRODUCTO']) ?>" width="95%">
      </div>
      <div class="col-lg-8 col-lg-offset-2 text-center">
         <h4><?=$product['NOMBRE_PRODUCTO'];?></h4>
      </div>
   </div><hr>


   <div class="row justify-content-center">
      <div class="col-lg-10 col-lg-offset-1 brdr-top">
         <label class="label-ship">Total</label> 
         <label class="label-ship float-right color-yellow">$<?=$infoSale->TOTAL_VENTA;?></label>                         
      </div>
   </div>
</div>
</div>
</div>

<!-- Boton de Paypal -->
<script src=<?php echo "https://www.paypal.com/sdk/js?client-id=" . SANDBOX_ID ."&currency=MXN" ?>></script> <!-- Currency -->

<script>
   paypal.Buttons({

      style: {
         layout: 'horizontal',
         fundingicons: 'false',

         size: 'responsive',
         color: 'gold',
         shape: 'pill',
         label: 'checkout',
         tagline: 'true'
      },

      createOrder: function(data, actions) {

         return actions.order.create({
            purchase_units: [{
               amount: {
   /*  Cantidad a cobrar
   */
   value: '<?=$product['PRECIO_PRODUCTO']?>'
},
   /*  La descripcion que se manda durante la paga
   */
   description: '<?=$product['DESCRIPCION_PRODUCTO']?>'
}]
});
      },
      onApprove: function(data, actions) {
         return actions.order.capture().then(function(details) {

   // alert(data.orderID);
   // var option = d
   // var value = option.options[option.selectedIndex].value;
   // alert(value);

   return fetch('<?=base_url()?>paypal/handleInformation/' +
      data.orderID + '/' + <?=$ID_VENTA?>, {
         method: 'post',
         headers: {
            'content-type': 'application/json'
         },
         body: JSON.stringify({
            orderID: data.orderID
         })
      });
});
      }
   }).render('#paypal-button-container');
</script>
