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
    <h2>Store</h2>
</section>
<!-- Page info section end -->

<div class="container mt-container pd-container bg-black">
    <div class="row">
        <?php
        if (count($products) > NULO) {
            foreach ($products as $product) {
            $img =  "background-image: url('".base_url($product['IMAGEN_PRODUCTO'])."');";
            ?>
                <!-- <div class="col-lg-3 col-sm-6">
                    <div class="shop-item">
                        <img src="<?=base_url($product['IMAGEN_PRODUCTO'])?>" alt="">
                        <h3><?=$product['NOMBRE_PRODUCTO']?></h3>
                        <h6>$<?=$product['PRECIO_PRODUCTO']?></h6>
                        <a href="<?=$this->session->userdata('YOY_ID_USUARIO') ? base_url('store/sales/' . $product['ID_PRODUCTO']) : base_url('login')?>" class="add-card">Buy</a>
                    </div>
                </div> -->
                <div class="col-lg-4 form-group">
                    <div class="product-card">
                        <div class="badge">Nuevo</div>
                        <div class="product-tumb divimg" style="<?= $img?>">
                            <!-- <img src="<?=base_url($product['IMAGEN_PRODUCTO'])?>" alt=""> -->
                        </div>
                        <div class="product-details">
                            <span class="product-catagory">Women,bag</span>
                            <h4><a href="Store/sales/2"><?=$product['NOMBRE_PRODUCTO']?></a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                            <div class="product-bottom-details">
                                <div class="product-price"><small>$3,500</small>$<?=$product['PRECIO_PRODUCTO']?></div>
                                <div class="product-links">
                                    <a href=""><i class="fa fa-shopping-cart"></i></a>
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




