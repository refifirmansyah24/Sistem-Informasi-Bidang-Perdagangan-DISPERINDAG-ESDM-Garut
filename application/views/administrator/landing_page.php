<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bidang Perdagangan Disperindag Garut</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url() ?>assets/img/garut.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/img/garut.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizLand
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="<?php echo base_url('')?>">Disperindag ESDM Garut</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="<?php echo base_url('')?>">Home</a></li>
                    <li class="dropdown"><a href="#"><span>List Data</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?php echo base_url('administrator/l_spbu/')?>">Data SPBU</a></li>
                            <li><a href="<?php echo base_url('administrator/l_spbe/')?>">Data SPBE</a></li>
                            <li><a href="<?php echo base_url('administrator/l_agen/')?>">Data Agen</a></li>
                            <li><a href="<?php echo base_url('administrator/l_pangkalan/')?>">Data Pangkalan</a></li>
                            <li><a href="<?php echo base_url('administrator/l_tdg/')?>">Data Tanda Daftar Gudang</a>
                            </li>
                            <li><a href="<?php echo base_url('administrator/l_kpl/')?>">Data Kios Pupuk Lengkap</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="<?php echo base_url('administrator/auth/')?>">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center"
        style="background-image: url('assets/img/disperindag.jpg'); background-size: cover; background-position: top left; background-repeat: no-repeat;">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Selamat Datang di Sistem Informasi <span>Bidang Perdagangan</span></h1>
            <h2>Dinas Perindustrian, Perdagangan Energi Dan Sumber Daya Mineral Garut</h2>
            <div class="d-flex">
                <a href="<?php echo base_url('administrator/auth/')?>" class="btn-get-started scrollto">Login</a>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bx bx-gas-pump"></i></div>
                            <h4 class="title"><a href="<?php echo base_url('administrator/l_spbu/')?>">SPBU</a></h4>
                            <p class="description">Data SPBU Garut</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-water"></i></div>
                            <h4 class="title"><a href="<?php echo base_url('administrator/l_spbe/')?>">SPBE</a></h4>
                            <p class="description">Data SPBE Garut</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="bx bx-buildings"></i></div>
                            <h4 class="title"><a href="<?php echo base_url('administrator/l_agen/')?>">Agen</a></h4>
                            <p class="description">Dat Agen Gas Elpiji Garut </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="bx bx-store-alt"></i></div>
                            <h4 class="title"><a
                                    href="<?php echo base_url('administrator/l_pangkalan/')?>">Pangkalan</a></h4>
                            <p class="description">Data Pangkalan Gas Elpiji Garut</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="bx bx-building-house"></i></div>
                            <h4 class="title"><a href="<?php echo base_url('administrator/l_tdg/')?>">Tanda Daftar
                                    Gudang</a></h4>
                            <p class="description">Data Tanda Daftar Gudang Garut</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="bx bx-leaf"></i></div>
                            <h4 class="title"><a href="<?php echo base_url('administrator/l_kpl/')?>">Kios Pupuk
                                    Lengkap</a></h4>
                            <p class="description"> Data Kios Pupuk Lengkap (KPL) Garut</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Featured Services Section -->

        <div class="container py-4">
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
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

</body>

</html>