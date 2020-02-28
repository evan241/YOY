<div id="preloder">
   <div class="loader"></div>
</div>
<section class="page-info-sectionII set-bg">
    <h2>News</h2>
</section><br><br>

<!-- About Intro section -->
<div class="container">
    <?php
    foreach ($ROWS as $key => $ROW)
    {
        if ($key % 2 == 0){
            $order = "order-2xx";
            $marco = "borderPar";
            $Title = "";
        }else{
            $order = "";
            $marco = "borderImpar";
            $Title = "AbsoluteRightx";
        }
        ?>
        
        <div class="row form-group RowNews">
            <div class="col-lg-2 <?=$order." ".$marco?> pd0">
                <img class="ImgNews" src="<?=base_url('assets/img/works/1.jpeg')?>">
            </div>
            <div class="col-lg-10">
                <span class="TitleNews <?=$Title?>"><i class="fas fa-rss-square"></i> LOREM IPSUM IS SIMPLY DUMMY TEXT</span>
                <p class="pNews">

                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
            </div>
        </div>
    <?php  }?>
                
        <div class="col-lg-5 order-lg-2 order-1">
            <img src="<?= base_url() ?>assets/img/logo-big.png" class="about-logo" alt="">
        </div>
    
</div>
<!-- About Intro section end -->
