<?php
session_start();
include "koneksi/ceksession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ARSIP SURAT PUSDATARU</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="shortcut icon" href="img/icon.ico">
  <style>
    .carousel {
      position: relative;
      width: 100%;
      max-width: 100%;
      overflow: hidden;
    }

    .carousel-item {
      display: none;
      width: 100%;
      height: auto;
    }

    .carousel-item img {
      width: 100%;
      height: auto;
    }

    .carousel .active {
      display: block;
    }

    .carousel .prev,
    .carousel .next {
      position: absolute;
      top: 50%;
      font-size: 30px;
      color: white;
      padding: 16px;
      cursor: pointer;
      user-select: none;
      z-index: 1000;
    }

    .carousel .prev {
      left: 0;
      transform: translateY(-50%);
    }

    .carousel .next {
      right: 0;
      transform: translateY(-50%);
    }

    .carousel .prev:hover,
    .carousel .next:hover {
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 50%;
    }

    .carousel .logo img {
      width: 80%;
      max-width: 200px;
      height: auto;
    }
  </style>
</head>

<body>

  <div class="loader"></div>
  <div id="myDiv">
    <!--HEADER-->
    <div class="header">
      <div class="bg-color">
        <header id="main-header">
          <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ARSIP SURAT <span class="logo-dec">PUSDATARU</span></a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="#main-header">Beranda</a></li>
                  <li><a href="#feature">Profile</a></li>
                  <li><a href="#portfolio">Galeri</a></li>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="" alt="">Masuk
                        <span class=" fa fa-angle-down"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="admin/login"><i class="fa fa-sign-out pull-right"></i> Admin</a></li>
                        <li><a href="bagian/login"><i class="fa fa-sign-out pull-right"></i> Bagian</a></li>
                      </ul>
                    </li>
                  </ul>
                </ul>
              </div>
            </div>
          </nav>
        </header>
        <div class="wrapper">
          <div class="container">
            <div class="carousel">
              <div class="carousel-item active">
                <div class="row">
                  <div class="banner-info text-center wow fadeIn delay-05s">
                    <h2 class="bnr-sub-title"></h2>
                    <div class="logo">
                      <img src="img/pusdataru_jateng.png" alt="" />
                    </div>
                    <h3 class="bnr-sub-title">SISTEM INFORMASI PENGARSIPAN SURAT</h3>
                    <h3 class="bnr-sub-title"><span class="logo-dec">DINAS PEKERJAAN UMUM SUMBER DAYA AIR DAN PENATAAN RUANG </span></h3>
                    <h3 class="bnr-sub-title"><span class="logo-dec">PROVINSI JAWA TENGAH</span></h3>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="banner-info text-center wow fadeIn delay-05s">
                    <h2 class="bnr-sub-title"></h2>
                    <div class="logo">
                      <img src="img/pusdataru_jateng.png" alt="" />
                    </div>
                    <h3 class="bnr-sub-title">sdfgfsdg</h3>
                    <h3 class="bnr-sub-title"><span class="logo-dec">DINAS PEKERJAAN UMUM SUMBER DAYA AIR DAN PENATAAN RUANG </span></h3>
                    <h3 class="bnr-sub-title"><span class="logo-dec">PROVINSI JAWA TENGAH</span></h3>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="banner-info text-center wow fadeIn delay-05s">
                    <h2 class="bnr-sub-title"></h2>
                    <div class="logo">
                      <img src="img/pusdataru_jateng.png" alt="" />
                    </div>
                    <h3 class="bnr-sub-title">fdsgfdsg</h3>
                    <h3 class="bnr-sub-title"><span class="logo-dec">DINAS PEKERJAAN UMUM SUMBER DAYA AIR DAN PENATAAN RUANG </span></h3>
                    <h3 class="bnr-sub-title"><span class="logo-dec">PROVINSI JAWA TENGAH</span></h3>
                  </div>
                </div>
              </div>
              <!-- Carousel Controls -->
              <a href="javascript:void(0);" class="prev" onclick="moveSlide(-1)">&#10094;</a>
              <a href="javascript:void(0);" class="next" onclick="moveSlide(1)">&#10095;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ HEADER-->
    <!---->
    <section id="feature" class="section-padding wow fadeIn delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Profile</h2>
            <p class="sub-title pad-bt15">Dinas Pekerjaan Umum Sumber Daya Air dan Penataan Ruang (DINAS PUSDATARU) Provinsi Jawa Tengah dibentuk berdasarkan Peraturan Gubernur Jawa Tengah Nomor 60 Tahun 2016 tentang Organisasi dan Tata Kerja Dinas Pekerjaan Umum dan Penataan Ruang Provinsi Jawa Tengah.
            </p>
            <p class="sub-title pad-bt15">Potensi sumber daya air di Provinsi Jawa Tengah meliputi antara lain 128 buah sungai induk dengan panjang 4.116,89 Km, 38 buah waduk, 1.141 buah embung, 20 long storage dan 602 mata air. Potensi air permukaan sebesar 65,812 Milyar M3 per tahun, yang berasal dari mata air 682 Juta M3 per tahun, sungai utama 65,13 Milyar M3 per tahun. Potensi tersebut baru dimanfaatkan sebesar 12,786 Milyar M3 per tahun atau 20% dan yang belum dimanfaatkan serta terbuang ke laut sebesar 53,03 Milyar M3 atau 80%. Sawah yang dilayani jaringan irigasi seluas 953.804 Ha atau sebanyak 11.546 Daerah Irigasi (DI), terdiri atas 37 DI dengan luas 347.9674 Ha menjadi kewenangan pusat, 108 DI dengan luas 86.865 Ha menjadi kewenangan provinsi, dan 11.401 DI dengan luas 519.265 Ha adalah kewenangan kabupaten/kota.</p>

            <p class="sub-title pad-bt15">Website ini berguna untuk pengarsipan Surat Masuk dan Surat Keluar di PUSDATARU JAWA TENGAH</p>
            <p>Surat diarsipkan dalam format PDF lalu disesuaikan nomor urutnya.</p>
            <hr class="bottom-line">
            <p class="sub-title pad-bt15">Pengarsipan Surat itu<strong> PENTING</strong></p>
            <hr class="bottom-line">
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/inbox.png">
              </div>
              <h3 class="pad-bt15">Surat Masuk</h3>
            </div>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/outbox.png">
              </div>
              <h3 class="pad-bt15">Surat Keluar</h3>
            </div>
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
    </section>
    <!---->
    <!---->
    <section id="portfolio" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Galeri</h2>
            <p class="sub-title pad-bt15">

            </p>
            <hr class="bottom-line">
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-6 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/" class="img-responsive">
              <figcaption>
                <h2></h2>
                <p></p>
                <p></p>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-3"></div>
        </div>
        <hr class="bottom-line">
      </div>
    </section>
    <!---->
    <!---->
    <section id="testimonial" class="wow fadeInUp delay-05s">
      <div class="bg-testicolor">
        <div class="container section-padding">
          <div class="row">
            <div class="testimonial-item">
              <ul class="bxslider">
                <li>
                  <blockquote>
                    <img src="img/Pak-Hanung-merah.jpg">
                    <p>Plt. Kepala Dinas</p>
                  </blockquote>
                  <small>Dr. Ir. AR Hanung Triyono, M.Si</small>
                </li>
                <li>
                  <blockquote>
                    <img src="img/radito2023.jpg">
                    <p>Ka. Bid IAB </p>
                  </blockquote>
                  <small>Ir. Radito, MT</small>
                </li>
                <li>
                  <blockquote>
                    <img src="img/agung2023.jpg">
                    <p>Ka. Bid PPT</p>
                  </blockquote>
                  <small>Agung Prihantono, ST,M.Tech</small>
                </li>
                <li>
                  <blockquote>
                    <img src="img/andis2023.jpg">
                    <p>Ka. Bid SBP</p>
                  </blockquote>
                  <small>Andis Setiyo Septiyantok, ST,M.Eng</small>
                </li>
                <li>
                  <blockquote>
                    <img src="img/kabid_taru_23.jpg">
                    <p>Ka. Bid TARU</p>
                  </blockquote>
                  <small>Ir. Dyah Purbandari MU, MT</small>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!---->
    <!---->
    <!---->
    <!---->
    <footer id="footer">
      <div class="container">
        <div class="row text-center">
          <p>&copy; Lulu. All Rights Reserved.</p>
          <div class="credits">
            <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Baker
            -->
            Designed by <a href="https://bootstrapmade.com/">Bootstrap Themes</a>
          </div>
        </div>
      </div>
    </footer>
    <!---->
  </div>
  <script>
    let slideIndex = 0;

    function showSlides() {
      let slides = document.querySelectorAll('.carousel-item');
      slides.forEach((slide, index) => {
        slide.classList.remove('active');
        if (index === slideIndex) {
          slide.classList.add('active');
        }
      });
    }

    function moveSlide(n) {
      slideIndex += n;
      if (slideIndex < 0) slideIndex = 2; // Adjust for 3 slides (0, 1, 2)
      if (slideIndex > 2) slideIndex = 0; // Adjust for 3 slides (0, 1, 2)
      showSlides();
    }

    // Initial setup
    showSlides();

    // Optional: Auto slide
    setInterval(() => {
      moveSlide(1);
    }, 5000); // 5 seconds interval
  </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>