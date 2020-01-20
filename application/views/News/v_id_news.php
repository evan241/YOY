<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Page info section -->
<section class="page-info-section set-bg">
    <h2><?php
        foreach ($ROWS as $ROW) {
            if ($ROW['ID'] == $ID) echo $ROW['TITULO'];
        }
    ?></h2>
</section>
<!-- Page info section end -->

<!-- About Intro section -->
<section class="about-intor-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 order-lg-1 order-2">
                <div class="about-text">
                    <p><?php
                        foreach ($ROWS as $ROW) {
                            if($ROW['ID'] == $ID) echo $ROW['CONTENIDO'];
                        }
                    ?></p>
                </div>
            </div>
            <div class="col-lg-5 order-lg-2 order-1">
                <img src="<?= base_url() ?>assets/img/logo-big.png" class="about-logo" alt="">
            </div>
        </div>
    </div>
</section>
<!-- About Intro section end -->