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
    <title>Opsi Akses</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
            <!-- Collect the nav links, forms, and other content for toggling -->
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
                  <!-- <a href="">Detail Kelas</a> -->
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
        <p class="text-center">Kelas ini dirancang untuk memberikan pemahaman mendalam tentang teknik terbaru, dipandu oleh pengajar berpengalaman dari MEPCONS. Anda bisa memilih untuk mengikuti seluruh kelas, atau hanya membeli materi video dan ebook sesuai kebutuhan Anda. Pilih paket yang sesuai dengan kebutuhan Anda. Dapatkan diskon khusus jika membeli materi video dan ebook sekaligus, atau ikuti seluruh kelas untuk pengalaman belajar yang lengkap.</p>
        <p class="text-center"></p>
        <div class="d-flex justify-content-center about-generic-area mt-3 mb-3">
          <a href="belanja.php" class="primary-btn2 mb-3 mb-sm-0 mr-3">
            <i class="bi bi-bookmarks mr-2"></i>Akses Video & E-Book
          </a>
          <?php if (isset($_SESSION['email'])): ?>
            <a href="daftar_kelas.php" class="btn primary-btn2 mb-3 mb-sm-0 mr-3">
              <i class="bi bi-journal-plus"></i> Daftar Kelas
            </a>
          <?php else: ?>
            <!-- Mengarahkan ke halaman login jika user belum login -->
            <a href="login/login-page.php" class="btn primary-btn" onclick="return confirm('Silakan login terlebih dahulu untuk mendaftar Kelas.')">
              <i class="bi bi-journal-plus"></i> Daftar Kelas
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
        <!--================ End Content Area =================-->

    <!--================ Start footer Area  =================-->
    <?php
      include 'footer.php';
    ?>
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
