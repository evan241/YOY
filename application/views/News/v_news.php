<style>
   
</style>
<div id="preloder">
    <div class="loader"></div>
</div>

<div class="container">
    <section class="page-info-sectionII">
        <h2 style="margin: 0;">News</h2>
    </section>
    <div class="row">
    <?php
    foreach ($ROWS as $key => $ROW)
    {
        $title = $ROW['TITULO'];
        $contenido =  substr($ROW['CONTENIDO'], 0, 125) .'...'; 
        $img = "background: url(".base_url($ROW['IMG']).") no-repeat center/cover;";
                           
        ?>
        <div class="col-lg-4 col-xl-4 col-sm-12 col-md-12" style="padding:0px">
    
            <li class="cards__item" style="width:100%">
                <div class="card">
                    <div class="card__image" style="<?=$img?>"></div>
                    <div class="card__content">
                        <div class="card__title" data-toggle="tooltip" title="<?=$title?>"><?=$title?></div>
                        <p class="card__text"><?=$ROW['CONTENIDO']?></p>
                        <button class="btn btn--block card__btn">Continuar leyendo..</button>
                    </div>
                </div>
            </li>
    
        </div>
    <?php  
    }?>
    </div>    
</div>


<!-- About Intro section end -->