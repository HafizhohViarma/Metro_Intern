<?php
    session_start();
    include 'koneksi.php';
  
    $result = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
    $row = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/mepcons_metro_logo.png" type="image/png" />
    <title>Detail Kelas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area white-header">
      <div class="main_menu"> 
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="index.php">
              <img class="logo-2" src="img/mepcons_metro_logo.png" alt="" style="width: 160px;" />
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
            <ul class="nav navbar-nav menu_nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#tentang-kami">Detail Kelas</a>
              </li>
            </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-9">
              <div class="banner_content text-center">
                <h2>Tingkatkan Keahlian Teknik Anda dengan Kelas Terintegrasi</h2>
                <div class="page_link">
                  <a href="index.php">Home</a>
                  <a href="courses.html">Detail Kelas</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Content Courses Area =================-->
    <div class="mt-5">
      <div class="container">
        <p class="text-center">Kelas ini dirancang untuk memberikan pemahaman mendalam tentang teknik terbaru, dipandu oleh pengajar berpengalaman dari MEPCONS. Anda bisa memilih untuk mengikuti seluruh kelas, atau hanya membeli materi video dan ebook sesuai kebutuhan Anda.</p>
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="desc">
                <img src="img/about.png" alt="" style="width: 275px;">
                <h4 class="mt-3 mb-2">Beli Video</h4>
                <p>
                  Dapatkan akses eksklusif ke materi video yang mendalam dan praktis, langsung dari para ahli.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="desc">
                <img src="img/about.png" alt="" style="width: 275px;">
                <h4 class="mt-3 mb-2">Beli E-book</h4>
                <p>
                  Beli ebook komprehensif yang mencakup teori, studi kasus, dan ilustrasi yang mudah dipahami.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="desc">
                <img src="img/about.png" alt="" style="width: 275px;">
                <h4 class="mt-3 mb-2">Join Kelas</h4>
                <p>
                  Ikuti kelas penuh secara online atau offline untuk pengalaman belajar yang menyeluruh dan interaktif.
                </p>
              </div>
            </div>
          </div>
          <p class="text-center">Pilih paket yang sesuai dengan kebutuhan Anda. Dapatkan diskon khusus jika membeli materi video dan ebook sekaligus, atau ikuti seluruh kelas untuk pengalaman belajar yang lengkap.</p>
          <div class="mt-3 mb-3">
            <a href="belanja.php" class="primary-btn2 mb-3 mb-sm-0">
              <i class="fas fa-shopping-cart"></i> Belanja Sekarang
            </a>
            <?php if (isset($_SESSION['email'])): ?>
                <!-- Mengarahkan ke daftar_kelas.php tanpa menambahkan id_kelas -->
                <a href="daftar_kelas.php" class="btn primary-btn2">Daftar Kelas</a>
            <?php else: ?>
                <!-- Mengarahkan ke halaman login jika user belum login -->
                <a href="login/login-page.php" class="btn primary-btn" onclick="return confirm('Silakan login terlebih dahulu untuk mendaftar Kelas.')">Daftar Kelas</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <!--================ End Content Area =================-->

    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
      <div class="container">
        <div>
          <h4 class="text-white">Hubungi Kami</h4>
          <p>metroindo.software@gmail.com | +62 822-8960-8096 | @metrosoftware</p>
        </div>
        <div class="row footer-bottom d-flex justify-content-between">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by Metro Indonesian Software
          </p>
          <div class="col-lg-4 col-sm-12 footer-social">
            <p>Follow Us</p>
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-twitter"></i></a>
            <a href="#"><i class="ti-dribbble"></i></a>
            <a href="#"><i class="ti-linkedin"></i></a>
          </div>
        </div>
      </div>
    </footer>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/owl-carousel-thumb.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/theme.js"></script>
  </body>
</html>
