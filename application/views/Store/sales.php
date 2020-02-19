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
    .img{margin-right:-15px}
    .hover-img{cursor:pointer}

}
 
    footer{display:none;}
    .page-info-sectionII{height:195px !important}
    .details-buy{font-size: 18px;
    color: #60656b;
    line-height: 1.8;}
    
    .pd-left20{padding-left: 27px;}
</style>
<!-- Page info section -->
<section class="page-info-sectionII">
    <h2>Your cart</h2>
</section>
<!-- Page info section end -->
<div class="container mt-container">
    <div class="row">
        <div class="col-lg-2 col-lg-offset-1 text-right">
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
        <div class="col-lg-6 text-center">
            <img src="<?=base_url($product['IMAGEN_PRODUCTO'])?>" id="main_img" alt="">
        </div>
        <div class="col-lg-4">
            <div class="about-text-box-warp">
                <div class="about-text">
                    <h3><?=$product['NOMBRE_PRODUCTO']?></h3>
                    <h2> $<?=$product['PRECIO_PRODUCTO']?></h2>
                    <p>
                        <div class="details-buy">
                            <i class="fas fa-credit-card"></i>  12 meses de $70 sin intereses
                        </div>
                        <div class="details-buy pd-left20 form-group">
                            <i class="fab fa-cc-visa fa-2x"></i>
                            <i class="fab fa-cc-mastercard fa-2x"></i>
                            <i class="fab fa-cc-amex fa-2x"></i>
                        </div>
                       <div class="details-buy form-group">
                           <i class="fas fa-shipping-fast"></i> Envío a toda la república <br>
                       </div>
                       <div class="details-buy">
                           <i class="fas fa-undo"></i> Garantía de 30 días <br>
                       </div>
                    </p>
                    <div>
                        
                        <a href="<?=base_url('Store/proccess_sale/' . $product['ID_PRODUCTO']);?>" class="btn btn-sale">Comprar ahora</a>
                    </div>
             


                    <!-- Boton de Paypal -->


                    <!-- <script src=<?php echo "https://www.paypal.com/sdk/js?client-id=" .
                    SANDBOX_ID .
                    "&currency=MXN" ?>></script> <!-- Currency -->

                    <div id="paypal-button-container"></div>


                    <script>
                        paypal.Buttons({

                            style: {
                                layout: 'horizontal',
                                fundingicons: 'false',
                                shape: 'pill',
                                size: 'responsive'
                            },



                            createOrder: function(data, actions) {

                                var shipment = document.getElementById("RG_ID_TIPO_ENVIO");
                                var shipmentPrice = shipment.options[shipment.selectedIndex].value;

                                var itemPrice = <?php echo json_encode($product['PRECIO_PRODUCTO'], JSON_HEX_TAG); ?>;

                                var total = parseInt(shipmentPrice) + parseInt(itemPrice);

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
                                        data.orderID + '/' +
                                        <?=$product['ID_PRODUCTO']?> + '/' +
                                        '1' + '/' +
                                        <?=$this->session->userdata("YOY_ID_USUARIO")?>, {
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

                </div>
            </div>
        </div>
    </div>
</div>

