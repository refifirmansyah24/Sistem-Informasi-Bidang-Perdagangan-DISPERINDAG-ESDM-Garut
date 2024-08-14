<style>
.container.py-4 {
    text-align: center;
    margin-top: 10px;
    /* Pusatkan teks secara horizontal */
}

.copyright,
.credits {
    margin-top: 0px;
    /* Jarakkan antara kedua teks */
}

.fade-in {
    animation: fadeInAnimation 1s ease-in forwards;
    opacity: 0;
}

@keyframes fadeInAnimation {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}
</style>
<div class="container py-4 fade-in">
    <div class="copyright">
        &copy; Copyright <strong><span>Disperindag ESDM Garut</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by <a href="https://www.instagram.com/disperindagesdm_garut/?hl=en">Disperindag ESDM Garut</a>
    </div>
</div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo base_url() ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/aos/aos.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/waypoints/noframework.waypoints.js"></script>


<!-- Template Main JS File -->
<script src="<?php echo base_url() ?>assets/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".fade-in").css("opacity", "1"); // Mengubah opacity menjadi 1 untuk memulai animasi fade in
});
</script>
</body>

</html>