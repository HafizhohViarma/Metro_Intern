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
    <title>MepCONS x Metro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
      <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.html"
              ><img src="img/mepcons_metro_logo.png" alt="" style="width: 160px;"
            /></a>
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
                <!-- <li class="nav-item active">
                  <a class="nav-link" href="index_admin.php">Home</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" href="video.php">Video</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ebook.php">E-Book</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="kelas.php">Daftar Kelas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="user.php">Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="penjualan.php">Penjualan</a>
                </li>
                <li class="nav-item">
                  <a id="logoutBtn" class="nav-link" href="#">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
      <div class="banner_inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner_content text-center">
                <h2 class="text-uppercase mt-4 mb-5">
                  Bangun Keahlian Teknik Anda, Taklukkan Tantangan Masa Depan
                </h2>
                <p>
                  Selamat Datang, Admin
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Home Banner Area =================-->

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
    <script>
      $(document).ready(function() {
        // Smooth scrolling to section
        $('a.nav-link').on('click', function(event) {
          if (this.hash !== "") {
            event.preventDefault();
    
            // Store hash
            var hash = this.hash;
    
            // Animate smooth scroll
            $('html, body').animate({
              scrollTop: $(hash).offset().top - 70
            }, 800, function(){
              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
            });
          }
        });

        //Ketika Admin mengklik button logout maka akan ada alert:
        $('#logoutBtn').on('click', function(e) {
          e.preventDefault();
          alert('Anda Berhasil Keluar dari halaman Admin.');
          window.location.href = 'login/login-page.php';
        });
      });
    </script>    
  </body>
</html>
