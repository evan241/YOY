<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Page info section -->
<section class="page-info-sectionII set-bg">
    <h2>Store</h2>
</section>
<!-- Page info section end -->

<!-- Shop section  -->
<section class="shop-section">
    <div class="container">
        <div class="row">
            <?php
            if(count($products)>NULO) {
                foreach($products as $product){
                    ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="shop-item">
                            <img src="<?= base_url($product['IMAGEN_PRODUCTO']) ?>" alt="">
                            <h3><?= $product['NOMBRE_PRODUCTO'] ?></h3>
                            <h6>$<?= $product['PRECIO_PRODUCTO'] ?></h6>
                            <a href="<?= base_url('site/sales/'.$product['ID_PRODUCTO'])?>" class="add-card">Buy</a>
                        </div>
                    </div>
                    <?php
                }
            } else{
                ?>
                <div class="portfolio-item deisablee" style="color: white;">No hay productos disponibles</div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Shop section end -->


