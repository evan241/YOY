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
    .modal{
        text-align:center;
    }
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
    .pd-right0{padding-right:0px}
    .pick-img{ border-radius:10px;} 
               
   
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
.btn-circle{
        border-radius:50%;
        font-size:12px;
        outline:0
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
    .pick-img{
        border-radius:10px;
    }
    .btn-black{
        background: #333;
        color:white;
    }
    .btn-black:hover{
        background: #333;
        color:#07ff5f;
    }
    #videox{
        border-radius: 10px;
        outline: 0;
    }
   
   .modal-dialog {
      display: inline-block;
      text-align: left;
      vertical-align: middle;
   }
   .bg-black{
        background: #000000bd;
   }
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
            <img src="<?= base_url() ?>assets/img/works/1.jpeg" width="100%"height="545px" id="pick-main" class="pick-img"> 
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->                   
        <div class="col-lg-6"><br>
            <div class="row">            
            <div id="img-1" class="col-lg-6 text-center thumbnail form-group" data-image-id="2" 
             data-toggle="modal" 
             data-title="Mesa perritos 2" 
             data-caption="Mesa perritos 2" 
             data-target="#image-gallery"
             data-image="<?= base_url() ?>assets/img/works/6.jpeg">

                <img src="<?= base_url() ?>assets/img/works/6.jpeg" width="90%" height="340px" class="pick-img">

            </div>
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->                   
            <div id="img-2" class="col-lg-6 text-center thumbnail form-group pRight-img"  data-image-id="3" 
             data-toggle="modal" 
             data-title="Mesa perritos 3" 
             data-caption="Mesa perritos 3" 
             data-target="#image-gallery"
             data-image="<?= base_url() ?>assets/img/works/3.jpeg">

                <img src="<?= base_url() ?>assets/img/works/3.jpeg" width="90%" height="340px" class="pick-img">

            </div>    
            <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->                   
            <div id="img-3" class="col-lg-6 text-center thumbnail form-group" data-image-id="4" 
            data-toggle="modal" 
             data-title="Mesa perritos 4" 
             data-caption="Mesa perritos 4" 
             data-target="#image-gallery"
             data-image="<?= base_url() ?>assets/img/works/4.jpeg">

                <img src="<?= base_url() ?>assets/img/works/4.jpeg" width="90%" height="190px" class="pick-img">

            </div>
            <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->                   
            <div id="img-4" class="col-lg-6 text-center thumbnail form-group pRight-img" data-image-id="5" 
            data-toggle="modal" 
            data-title="Mesa perritos 5" 
            data-caption="Mesa perritos 5" 
            data-target="#image-gallery"
            data-image="<?= base_url() ?>assets/img/works/2.jpeg">

                <img src="<?= base_url() ?>assets/img/works/2.jpeg" width="90%" height="190px" class="pick-img">           
          
            </div>
        </div>
    </div>
</div>

   <!--  <div class="portfolio-gallery">
        <div class="portfolio-item set-bg" data-setbg="<?= base_url() ?>assets/img/works/1.jpg">
            <a href="<?= base_url() ?>assets/img/works/1.jpg" class="portfolio-view">Equipal Pavo</a>
        </div>
        <div class="portfolio-item set-bg" data-setbg="<?= base_url() ?>assets/img/works/2copy.jpg">
            <a href="<?= base_url() ?>assets/img/works/2copy.jpg" class="portfolio-view">Equipal Arco</a>
        </div>
        <div class="portfolio-item set-bg" data-setbg="<?= base_url() ?>assets/img/works/2.jpg">
            <a href="<?= base_url() ?>assets/img/works/2.jpg" class="portfolio-view">Equipal Pavo</a>
        </div>


        <div class="portfolio-item --big set-bg" data-setbg="<?= base_url() ?>assets/img/works/6.jpg">
            <a href="<?= base_url() ?>assets/img/works/6.jpg" class="portfolio-view">Equipal Pavo</a>
        </div>
        <div class="portfolio-item set-bg" data-setbg="<?= base_url() ?>assets/img/works/3.jpg">
            <a href="<?= base_url() ?>assets/img/works/3.jpg" class="portfolio-view">Equipal Arco</a>
        </div>
        <div class="portfolio-item set-bg" data-setbg="<?= base_url() ?>assets/img/works/5.jpg">
            <a href="<?= base_url() ?>assets/img/works/5.jpg"></a>
        </div>
        <div class="portfolio-item set-bg" data-setbg="<?= base_url() ?>assets/img/works/4.jpg">
            <a href="<?= base_url() ?>assets/img/works/4.jpg" class="portfolio-view">Equipal Arco</a>
        </div>
        <div class="portfolio-item --big set-bg" data-setbg="<?= base_url() ?>assets/img/works/7.jpg">
            <a href="<?= base_url() ?>assets/img/works/7.jpg" class="portfolio-view">Equipal Arco</a>
        </div>
        <div class="portfolio-item set-bg" data-setbg="<?= base_url() ?>assets/img/works/8.jpg">
            <a href="<?= base_url() ?>assets/img/works/8.jpg" class="portfolio-view">Silla Lienzo</a>
        </div>
        <div class="portfolio-item set-bg" data-setbg="<?= base_url() ?>assets/img/works/9.jpg">
            <a href="<?= base_url() ?>assets/img/works/9.jpg" class="portfolio-view">Silla Lienzo</a>
        </div>
        <div class="portfolio-item set-bg" data-setbg="<?= base_url() ?>assets/img/works/10.jpg">
            <a href="<?= base_url() ?>assets/img/works/10.jpg" class="portfolio-view">Silla Lienzo</a>
        </div>
        <div class="portfolio-item set-bg" data-setbg="<?= base_url() ?>assets/img/works/11.jpg">
            <a href="<?= base_url() ?>assets/img/works/11.jpg" class="portfolio-view">Silla Lienzo</a>
        </div>
         <div class="portfolio-item set-bg" data-setbg="<?= base_url() ?>assets/img/works/5.jpg">
            <a href="<?= base_url() ?>assets/img/works/5.jpg"></a>
        </div>
    </div> -->

<!-- Portfilio section end -->
<br>


<!-- Shop section  -->
<section class="shop-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="shop-item">
                    <img src="<?= base_url() ?>assets/img/shop/1.jpg" alt="">
                    <h3>Black Coat</h3>
                    <h6>$235</h6>
                    <a href="" class="add-card">Buy</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="shop-item">
                    <img src="<?= base_url() ?>assets/img/shop/2.jpg" alt="">
                    <h3>Black Dress</h3>
                    <h6>$235</h6>
                    <a href="" class="add-card">Buy</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="shop-item">
                    <img src="<?= base_url() ?>assets/img/shop/3.jpg" alt="">
                    <h3>White Shirt</h3>
                    <h6>$235</h6>
                    <a href="" class="add-card">Buy</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="shop-item">
                    <img src="<?= base_url() ?>assets/img/shop/4.jpg" alt="">
                    <h3>Trousers</h3>
                    <h6>$235</h6>
                    <a href="" class="add-card">Buy</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop section end -->


<!-- Newslatter section -->
<section class="newsletter-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-white">
                <h3>Sign up to our Newsletter</h3>
            </div>
            <div class="col-lg-9">
                <form class="newsletter-form">
                    <input type="text" placeholder="Your E-mail">
                    <button class="site-btn sb-white">subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Newslatter section end -->
<div class="modal fade bg-black" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <!--   <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div> -->
            <div class="modal-body">
			<center>
                <img id="image-gallery-image" class="img-responsive" src="">
			</center>
            </div>
            <div class="modal-footer">

                <div class="col-md-2">
                    <button type="button" class="btn btn-black btn-circle" id="show-previous-image"><i class="fas fa-chevron-left"></i></button>
                </div>

                <div class="col-md-8 text-justify" id="image-gallery-caption">
                    This text will be overwritten by jQuery
                </div>

                <div class="col-md-2 text-right pd-right0">
                    <button type="button" id="show-next-image" class="btn btn-black btn-circle"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bg-black" id="intro-video" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!--   <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div> -->
            <div class="modal-body text-cemter">
              
               <!--  <video  controls autoplay="autoplay">
                    <source src="<?= base_url('assets/img/Yoy.mp4');?>"  type="video/mp4">                               
                </video>  -->
             
                <video id="videox" width="100%" autoplay controls>
                    <source src="<?= base_url('assets/img/Yoy.mp4');?>" type="video/mp4" />
                    Your browser does not support the video tag or the file format of this video.
                </video>
            </div> 
          
        </div>
    </div>
</div>
