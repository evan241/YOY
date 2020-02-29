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
            $order = "order-2";
            $marco = "borderPar";
            $Title = "";
        }else{
            $order = "";
            $marco = "borderImpar";
            $Title = "AbsoluteRightx";
        }
        ?>
        
      <!--   <div class="row form-group RowNews">
            <div class="col-lg-2 <?=$order." ".$marco?> pd0">
                <img class="ImgNews" src="<?=base_url('assets/img/works/1.jpeg')?>">
            </div>
            <div class="col-lg-10">
                <span class="TitleNews <?=$Title?>"><i class="fas fa-rss-square"></i> LOREM IPSUM IS SIMPLY DUMMY TEXT</span>
                <p class="pNews">

                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
            </div>
        </div> -->
        <?php  
    }?>
                
       <style>
       .titleN{
            position: absolute;
            color: black !important;
            font-size: 28px;
            top: -20px;
            text-transform: uppercase;
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
            background: #e9ecef;
            border-radius: 5px;
            padding: 5px 10px;
       }
       .pnews{
                position: absolute;
    bottom: 0em;
    background: #00000014;
    left: 0;
    right: 0;
    color: black;
    padding: 10px;
    box-shadow: 0 -5px 10px -8px #333;
       }
    

img {
  height: auto;
  max-width: 100%;
  vertical-align: middle;
}
.btn {
  background-color: white;
  border: 1px solid #cccccc;
  color: #696969;
  padding: 0.5rem;
  text-transform: lowercase;
}
.btn--block {
  display: block;
  width: 100%;
}
.cards {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
}
.cards__item {
  display: flex;
  padding: 1rem;
}
@media (min-width: 40rem) {
  .cards__item {
    width: 50%;
  }
}
@media (min-width: 56rem) {
  .cards__item {
    width: 33.3333%;
  }
}
.card {
  background-color: white;
  border-radius: 0.25rem;
  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}
.card:hover .card__image {
  filter: contrast(100%);
}
.card__content {
  display: flex;
  flex: 1 1 auto;
  flex-direction: column;
  padding: 1rem;
}
.card__image {
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
  filter: contrast(70%);
  overflow: hidden;
  position: relative;
  transition: filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
}
.card__image::before {
  content: "";
  display: block;
  padding-top: 56.25%;
}
@media (min-width: 40rem) {
  .card__image::before {
    padding-top: 66.6%;
  }
}
.card__image--flowers {
  background-image: url(https://unplash.it/800/600?image=82);
}
.card__image--river {
  background-image: url(https://unsplash.it/800/600?image=11);
}
.card__image--record {
  background-image: url(https://unsplash.it/800/600?image=39);
}
.card__image--fence {
  background-image: url(<?=base_url('assets/img/works/1.jpeg');?>);
}
.card__title {
  color: #696969;
  font-size: 1.25rem;
  font-weight: 300;
  letter-spacing: 2px;
  text-transform: uppercase;
}
.card__text {
  flex: 1 1 auto;
  font-size: 0.875rem;
  line-height: 1.5;
  margin-bottom: 1.25rem;
}

       </style>

   <br>
    

<ul class="cards">
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--fence"></div>
      <div class="card__content">
        <div class="card__title">Flex</div>
        <p class="card__text">This is the shorthand for flex-grow, flex-shrink and flex-basis combined. The second and third parameters (flex-shrink and flex-basis) are optional. Default is 0 1 auto. </p>
        <button class="btn btn--block card__btn">Button</button>
      </div>
    </div>
  </li>

</ul></div>
<!-- About Intro section end -->
