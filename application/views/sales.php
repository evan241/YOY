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
                        <img src="<?= base_url($product[0]['IMAGEN_PRODUCTO']) ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6  d-lg-flex align-items-center p-0">
                    <div class="about-text-box-warp">
                        <div class="about-text">
                            <h2><?= $product[0]['NOMBRE_PRODUCTO'] ?></h2>
                            <p>
                                <?= $product[0]['DESCRIPCION_PRODUCTO'] ?>
                                <br>
                                $<?= $product[0]['PRECIO_PRODUCTO'] ?>
                            </p>
                            <div class="form-group">
                                <label for="RG_ID_TIPO_ENVIO" class="control-label text-left" style="color: white;">Tipo de envío</label>
                                <select name="RG_ID_TIPO_ENVIO" id="RG_ID_TIPO_ENVIO" class="form-control">
                                    <?php
                                    if (count($ROW_SHIPS) > NULO):
                                        echo '<option value="">Seleccionar</option>';
                                        foreach ($ROW_SHIPS as $ROW):
                                            ?>
                                            <option value="<?= $ROW['ID_TIPO_ENVIO'] ?>"><?= mb_strtoupper($ROW['NOMBRE_TIPO_ENVIO']) . " $" . $ROW['PRECIO_TIPO_ENVIO'] ?></option>
                                            <?php
                                        endforeach;
                                    else:
                                        ?>
                                        <option value="-1">No existen registros</option>
                                    <?php
                                    endif;
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="ship_price" id="ship_price">
                            <p>
                                Total: <div id="total_sale" style="color: white;"><?= $product[0]['PRECIO_PRODUCTO'] ?></div>
                            </p>

                            <button id="btnBuyNow" class="btn btn-primary">Buy now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

