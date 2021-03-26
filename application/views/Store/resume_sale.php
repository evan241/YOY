
<?php 

$CI =& get_instance();

$SelectShip = "NOMBRE_TIPO_ENVIO,TIEMPO_TIPO_ENVIO,PRECIO_TIPO_ENVIO";
$Shipping = $CI->db->select($SelectShip)->get_where('tipo_envio',array('ID_TIPO_ENVIO'=>$infoSale->ID_TIPO_ENVIO))->row();
$NameShip = $Shipping->NOMBRE_TIPO_ENVIO;
$TimeShip = $Shipping->TIEMPO_TIPO_ENVIO;
$PriceShip= $Shipping->PRECIO_TIPO_ENVIO;

$SelectPayment = "NOMBRE_MEDIO_PAGO,SRC_IMG";
$typePayment= $CI->db->select($SelectPayment)->get_where('medio_pago',array('ID_MEDIO_PAGO'=>$infoSale->ID_MEDIO_PAGO))->row();
$PaypalButton = "<div id='paypal-button-container'></div>";
$BankInformation = "<i class='fas fa-file-signature'></i> Cuenta Bancaria a depositar:<br> 95e4ce70b4qtl43o9x";
$payment = ($infoSale->ID_MEDIO_PAGO == 4) ? $PaypalButton : $BankInformation;

$idProduct = $infoSale->ID_PRODUCTO;
$Product = $CI->db->select('PRECIO_PRODUCTO')->get_where('producto',array('ID_PRODUCTO'=>$idProduct))->row();
$PrecioProduct= $Product->PRECIO_PRODUCTO;

$ID_VENTA = $infoSale->ID_VENTA;
?>
<style>
   
   .style-ship {padding: 8px 0px;}
</style>

<div id="preloder">
   <div class="loader"></div>
</div>
<section class="h2-section set-bg"><br>
</section>
<div class="container mt-container  bg-black">
   <h4>RESUMEN DE COMPRA #<?=$infoSale->ID_SALE;?></h4><br>
   <div class="row fontRoboto">
      <div class="col-lg-8">
         <div class="form-group">            
            <div class="row style-ship details-buy pointer pt-10">
              <!-- PRODUCTO -->
              <div class="col-lg-2 align-middle form-group">                     
               <img src="<?=base_url('assets/img/resources/LogoUser.png');?>" width="50%">
            </div>
            <div class="col-lg-7 form-group">
               <div class="capitalize">
                  <?=$infoSale->NOMBRE?></br>
                  <i class="fa fa-phone"></i> <?=$infoSale->TELEFONO?>
               </div>
            </div>
            <div class="col-lg-3 form-group text-right pdRight40">
               <div class="ResumeDescription" data-toggle="tooltip" title="Nombre de quien recibirá. Se necesitará una identificación">¿Quién recibe?</div>
            </div>
            <!--ENVIO -->
            <div class="col-lg-2 form-group align-middle">                     
               <img src="<?=base_url('assets/img/resources/LogoShip.png');?>" width="50%">
            </div>
            <div class="col-lg-7 form-group">
               <div>
                  <?=$NameShip?><br>
                  <i class="fas fa-clock"></i> 
                  <?=$TimeShip?>
               </div>
            </div>
            <div class="col-lg-3 form-group text-right pdRight40">
               <div class="ResumeDescription" data-toggle="tooltip" title="Información precisa del tipo de envío">Tipo de Envío</div>
            </div>
            <!-- DIRECCION -->
            <div class="col-lg-2 align-middle form-group">                     
               <img src="<?=base_url('assets/img/resources/LogoMap.png');?>" width="50%">

            </div>
            <div class="col-lg-7 form-group capitalize">
               <div>
                  <i class="fas fa-flag"></i> 
                  <?=$infoSale->PAIS_USUARIO." ".$infoSale->ESTADO_USUARIO.", ".$infoSale->CIUDAD_USUARIO?><br>
                  <i class="fas fa-home"></i> 
                  <?=$infoSale->CALLE_DIRECCION." #".$infoSale->NUM_DIRECCION.", ".$infoSale->COLONIA_DIRECCION?>
               </div>
            </div>
            <div class="col-lg-3 form-group text-right pdRight40">
               <div class="ResumeDescription" data-toggle="tooltip" title="Código Postal de la dirección">ZipCode : <?= $infoSale->CP_VENTA ?></div>
            </div>

            <!-- PAYMENT -->
            <div class="col-lg-2 align-middle form-group">                     
              <img src="<?=$typePayment->SRC_IMG?>" width="50%">
           </div>
           <div class="col-lg-7 form-group">
                <?=$payment?>                     
         </div>
         <div class="col-lg-3 form-group text-right pdRight40">
            <font class="ResumeDescription"style="margin-right: 20px;" data-toggle="tooltip" title="Aquí verá el estado actual de su pedido">
               Status
            </font><br>
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
    <?php if($infoSale->ID_MEDIO_PAGO == 4){ ?>
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
   value: '<?=$infoSale->TOTAL_VENTA?>'
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
    <?php } ?>
</script>
