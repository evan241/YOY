<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Hero section -->
<section class="hero-section">
    <div class="hero-social-links">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
    <div class="brand-text">Arts & Crafts Handmade</div>
    <div class="hero-slider owl-carousel">
        <div class="hero-slider-item set-bg" data-setbg="<?= base_url() ?>assets/img/slider-bg-1.jpg">
            <div class="hs-content">
                <div class="container">
                    <h2>Welcome</h2>
                </div>
            </div>
        </div>
        <div class="hero-slider-item set-bg" data-setbg="<?= base_url() ?>assets/img/slider-bg-2.jpg">
            <div class="hs-content">
                <div class="container">
                    <h2>To</h2>
                </div>
            </div>
        </div>
        <div class="hero-slider-item set-bg" data-setbg="<?= base_url() ?>assets/img/slider-bg-3.jpg">
            <div class="hs-content">
                <div class="container">
                    <h2>YOY</h2>
                </div>
            </div>
        </div>
        <div class="hero-slider-item set-bg" data-setbg="<?= base_url() ?>assets/img/slider-bg-4.jpg">
            <div class="hs-content">
                <div class="container">
                    <h2>Welcome</h2>
                </div>
            </div>
        </div>
        <div class="hero-slider-item set-bg" data-setbg="<?= base_url() ?>assets/img/slider-bg-5.jpg">
            <div class="hs-content">
                <div class="container">
                    <h2>To</h2>
                </div>
            </div>
        </div>
        <div class="hero-slider-item set-bg" data-setbg="<?= base_url() ?>assets/img/slider-bg-6.jpg">
            <div class="hs-content">
                <div class="container">
                    <h2>YOY</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero section end -->
   
<style>
 
@media screen and (min-width: 768px)
{ 
    .modal{text-align:center; }
    .pd-left0{padding-left:5px}
    .pd-right0{padding-right:0px}
    .pick-img{ border-radius:10px;} 
   
    .modal:before {
        display: inline-block;
        vertical-align: middle;
        content: " ";
        height: 100%;
    }
    .pRight-img{
        padding-left: 5px;
        padding-right: 25px;
    }
    .img-responsive{
        display: block;
        width: 75%;
        height: auto;
        border-radius: 10px;
    }

}   
@media screen and (max-width: 768px){
    #intro-video{top:20%;}
    #pick-main{ height:280px !important}
    #logo-main{display:none;}
}

.modal-dialog {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
}
.modal-content{
    background: transparent;
    border: 0px;
}
.modal-footer{
    /* background:#b3d7ff; */
    background: #dee2e6;
    border-radius: 10px;
}


#videox{ border-radius: 10px; outline: 0;}

.pick-img{border-radius:10px;}
.bg-black{ background: #000000bd;}
.btn-black{background: #333; color:white;}
.btn-black:hover{background: #333;color:#07ff5f;}
.btn-circle{border-radius:50%; font-size:12px; outline:0} 


</style>
<!-- Portfilio section -->
<div class="container-fluid">
    <div class="row">
        <div  class="col-lg-6 pd-right0 thumbnail"data-image-id="1" 
             data-toggle="modal" 
             data-title="Mesa perritos 1" 
             data-caption="Mesa perritos 1" 
             data-target="#image-gallery"
             data-image="<?= base_url() ?>assets/img/works/1.jpeg"> <br>
            <img src="<?= base_url() ?>assets/img/works/1.jpeg" width="100%"height="545px" id="pick-main" class="BorderSmoke"> 
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->                   
        <div class="col-lg-6 pd-left0"><br>
            <div class="row">            
            <div id="img-1" class="col-lg-6 text-right thumbnail form-group" data-image-id="2" 
             data-toggle="modal" 
             data-title="Mesa perritos 2" 
             data-caption="Mesa perritos 2" 
             data-target="#image-gallery"
             data-image="<?= base_url() ?>assets/img/works/6.jpeg">

                <img src="<?= base_url() ?>assets/img/works/6.jpeg" width="90%" height="340px" class="BorderSmoke">

            </div>
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->                   
            <div id="img-2" class="col-lg-6 text-center thumbnail form-group pRight-img"  data-image-id="3" 
            data-toggle="modal" 
            data-title="Mesa perritos 3" 
            data-caption="Mesa perritos 3" 
            data-target="#image-gallery"
            data-image="<?= base_url() ?>assets/img/works/3.jpeg">

                <img src="<?= base_url() ?>assets/img/works/3.jpeg" width="90%" height="340px" class="BorderSmoke">

            </div>    
            <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->                   
            <div id="img-3" class="col-lg-6 text-right thumbnail form-group" data-image-id="4" 
            data-toggle="modal" 
             data-title="Mesa perritos 4" 
             data-caption="Mesa perritos 4" 
             data-target="#image-gallery"
             data-image="<?= base_url() ?>assets/img/works/4.jpeg">

                <img src="<?= base_url() ?>assets/img/works/4.jpeg" width="90%" height="190px" class="BorderSmoke">

            </div>
            <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->                   
            <div id="img-4" class="col-lg-6 text-center thumbnail form-group pRight-img" data-image-id="5" 
            data-toggle="modal" 
            data-title="Mesa perritos 5" 
            data-caption="Mesa perritos 5" 
            data-target="#image-gallery"
            data-image="<?= base_url() ?>assets/img/works/2.jpeg">

                <img src="<?= base_url() ?>assets/img/works/2.jpeg" width="90%" height="190px" class="BorderSmoke">           
          
            </div>
        </div>
    </div>
</div>

<br>

<!-- Shop section  -->
<section class="">
    <div class="container">
        <div class="row">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="shop-item">
                    <img src="<?= base_url() ?>assets/img/shop/1.jpg" class="">
                    <h3>Black Coat</h3>
                    <h6>$235</h6>
                    <a href="<?=base_url("Store/sales/1");?>" class="add-card">Buy</a>
                </div>
            </div>
            <div class="item">
                <div class="shop-item">
                    <img src="<?= base_url("assets/img/shop/2.jpg");?>" class="">
                    <h3>Black Dress</h3>
                    <h6>$235</h6>
                    <a href="<?=base_url("Store/sales/2");?>" class="add-card">Buy</a>
                </div>
            </div>
            <div class="item">
                <div class="shop-item">
                    <img src="<?= base_url() ?>assets/img/shop/3.jpg" class="">
                    <h3>White Shirt</h3>
                    <h6>$235</h6>
                    <a href="<?=base_url("Store/sales/3");?>" class="add-card">Buy</a>
                </div>
            </div>
            <div class="item">
                <div class="shop-item">
                    <img src="<?= base_url() ?>assets/img/shop/4.jpg" class="">
                    <h3>Trousers</h3>
                    <h6>$235</h6>
                    <a href="<?=base_url("Store/sales/4");?>" class="add-card">Buy</a>
                </div>
            </div>
            <div class="item">
                <div class="shop-item">
                    <img src="<?= base_url() ?>assets/img/shop/4.jpg" class="">
                    <h3>Trousers</h3>
                    <h6>$235</h6>
                    <a href="<?=base_url("Store/sales/4");?>" class="add-card">Buy</a>
                </div>
            </div>
            <div class="item">
                <div class="shop-item">
                    <img src="<?= base_url() ?>assets/img/shop/4.jpg" class="">
                    <h3>Trousers</h3>
                    <h6>$235</h6>
                    <a href="<?=base_url("Store/sales/4");?>" class="add-card">Buy</a>
                </div>
            </div>
            <div class="item">
                <div class="shop-item">
                    <img src="<?= base_url() ?>assets/img/shop/4.jpg" class="">
                    <h3>Trousers</h3>
                    <h6>$235</h6>
                    <a href="<?=base_url("Store/sales/4");?>" class="add-card">Buy</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Shop section end -->


<div class="modal fade bg-black" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <!--   <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div> -->
            <div class="modal-body">
			<center>
                <img id="image-gallery-image" class="img-responsive BoxShadow" src="">
			</center>
            </div>
            <div class="modal-footer GalleryModalFooter">

                <div class="col-md-2">
                    <button type="button" class="btn btn-black btn-circle btn-nextprev" id="show-previous-image"><i class="fa fa-chevron-left fa-2x"></i></button>
                </div>

                <div class="col-md-8 text-justify" id="image-gallery-caption">
                    Descripción
                </div>

                <div class="col-md-2 text-right pd-right0">
                    <button type="button" id="show-next-image" class="btn btn-black btn-circle BtnNext"><i class="fa fa-chevron-right fa-2x"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($this->session->YOY_ID_USUAIRO):?>
<div class="modal fade bg-black" id="intro-video" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!--   <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div> -->
            <div class="modal-body text-cemter">                          
                <video id="videox" width="100%" autoplay controls>
                    <source src="<?= base_url('assets/img/Yoy.mp4');?>" type="video/mp4" />
                    Your browser does not support the video tag or the file format of this video.
                </video>
            </div>           
        </div>
    </div>
</div>
<?php endif; ?>
