<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Page info section -->
<section class="page-info-section set-bg">
    <h2>News</h2>
</section>
<!-- Page info section end -->


<!-- About Intro section -->
<section class="about-intor-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 order-lg-1 order-2">
                <div class="about-text">
                    <?php
                        foreach ($ROWS as $ROW) {?>
                            <div>
                                <h2><a href="news/<?= $ROW['ID'] ?>"><?= $ROW['TITULO']; ?></a></h2>
                                <?php $contenido = str_replace('contenteditable="true"', '', $ROW['CONTENIDO']); ?>
                                <div><?= substr($contenido, 0, 300) .'...</div>'; ?>
                            </div>
                        <?php }
                    ?>
                </div>
            </div>
            <div class="col-lg-5 order-lg-2 order-1">
                <img src="<?= base_url() ?>assets/img/logo-big.png" class="about-logo" alt="">
            </div>
        </div>
    </div>
</section>
<!-- About Intro section end -->
