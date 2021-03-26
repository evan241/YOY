<!-- Styles-->
<style>
    .divimg{
        min-height: 300px;
        background-size: cover;
        background-position: center;
    }
</style>

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Page info section -->
<section class="page-info-sectionII">
    <h2>Galery</h2>
</section>
<!-- Page info section end -->
<div class="container mt-container pd-container bg-black">
    <div class="row">
        <?php
        if (count($products) > NULO) {
            foreach ($products as $product) {
            $img =  "background-image: url('".base_url($product['IMAGEN_PRODUCTO'])."');";
            ?>              
                <div class="col-lg-4 form-group">
                    <div class="product-card">
                        <div class="badge">Nuevo</div>
                        <div class="product-tumb divimg" style="<?= $img?>"></div>                                                
                        <div class="product-details">
                            <!--<span class="product-catagory">Women,bag</span>-->
                            <h4><a href="Store/sales/<?=$product['ID_PRODUCTO']?>"><?=$product['NOMBRE_PRODUCTO']?></a></h4>
                            <p><?=$product['DESCRIPCION_PRODUCTO']?></p>
                            <div class="product-bottom-details">
                                <div class="product-price"><!--<small>$3,500</small>-->$<?=$product['PRECIO_PRODUCTO']?></div>
                                <div class="product-links">
                                    <a href="<?= base_url("Store/sales/".$product['ID_PRODUCTO']) ?>"><i class="fa fa-shopping-cart"></i> BUY</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="portfolio-item deisablee" style="color: white;">No hay productos disponibles</div>
            <?php
        }
            ?>
    </div>
</div>




