<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Page info section -->
<section class="page-info-sectionII set-bg">
    <h2>Your cart</h2>
</section>
<!-- Page info section end -->

<section class="">
    <div class="about-img-box-warp">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="about-img-box">
                        <img src="<?= base_url($product['IMAGEN_PRODUCTO']) ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6  d-lg-flex align-items-center p-0">
                    <div class="about-text-box-warp">
                        <div class="about-text">
                            <h2><?= $product['NOMBRE_PRODUCTO'] ?></h2>
                            <p>
                                <?= $product['DESCRIPCION_PRODUCTO'] ?>
                                <br>
                                $<?= $product['PRECIO_PRODUCTO'] ?>
                            </p>
                            <div class="form-group">
                                <label for="RG_ID_TIPO_ENVIO" class="control-label text-left" style="color: white;">Tipo de envío</label>
                                <select name="RG_ID_TIPO_ENVIO" id="RG_ID_TIPO_ENVIO" class="form-control">
                                    <?php
                                    if ($ROW_SHIPS) {
                                        echo '<option value="">Seleccionar</option>';
                                        foreach ($ROW_SHIPS as $ROW) {
                                            ?>
                                            <option value="<?= $ROW['ID_TIPO_ENVIO'] ?>"><?= mb_strtoupper($ROW['NOMBRE_TIPO_ENVIO']) . " $" . $ROW['PRECIO_TIPO_ENVIO'] ?></option>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <option value="-1">No existen registros</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="ship_price" id="ship_price">
                            <p>
                                Total: <div id="total_sale" style="color: white;"><?= $product['PRECIO_PRODUCTO'] ?></div>
                            </p>


                            <!-- Boton de Paypal -->


                            <script src=<?php echo "https://www.paypal.com/sdk/js?client-id=" .
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
                                                    value: '<?= $product['PRECIO_PRODUCTO'] ?>'
                                                },
                                                /*  La descripcion que se manda durante la paga
                                                */
                                                description: '<?= $product['DESCRIPCION_PRODUCTO'] ?>'
                                            }]
                                        });
                                    },
                                    onApprove: function(data, actions) {
                                        return actions.order.capture().then(function(details) {

                                            // alert(data.orderID);
                                            // var option = d
                                            // var value = option.options[option.selectedIndex].value;
                                            // alert(value);

                                            return fetch('<?= base_url() ?>paypal/handleInformation/' +
                                                data.orderID + '/' +
                                                <?= $product['ID_PRODUCTO'] ?> + '/' +
                                                '1' + '/' +
                                                <?= $this->session->userdata("YOY_ID_USUARIO") ?>, {
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
    </div>
</section>