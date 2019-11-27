
</div><!-- .push --> 
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-7 order-md-1 order-2">
                <img src="<?= base_url() ?>assets/img/logo-dark.png" alt="" class="footer-logo">
                <div class="copyright">Copyright © All rights reserved. </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 order-md-2 order-1">
                <ul class="footer-contact-list">
                    <li><span>Address:</span>Your Address</li>
                    <li><span>Phone:</span>Yor Phone Number</li>
                    <li><span>Mail:</span>hi@contact.com</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Footer section end -->

<script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/propper.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/js/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/js/circle-progress.min.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>
<script src="<?= base_url('assets/js/login.js')?>"></script>

<script src="<?= base_url() ?>assets/js/site.js"></script>

<script>
    window.onscroll = function () {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("header-nav");
        } else {
            header.classList.remove("header-nav");
        }
    }
</script>

</body>
</html>
