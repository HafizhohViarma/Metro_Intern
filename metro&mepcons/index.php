<?php
  include "koneksi.php";

  // Query untuk mengambil data dari tabel tb_kelas
  $query = "SELECT * FROM tb_kelas LIMIT 3";
  $result = mysqli_query($koneksi, $query);
  $query_book = "SELECT * FROM tb_ebook LIMIT 3";
  $result_book = mysqli_query($koneksi, $query_book);
  $query_video = "SELECT * FROM tb_video LIMIT 3";
  $result_video = mysqli_query($koneksi, $query_video);
  $query_t = "SELECT * FROM tb_testi";
  $result_t = mysqli_query($koneksi, $query_t);
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
    <meta name="keywords" content="AutoCAD, tutorial AutoCAD, tips AutoCAD, sumber daya desain, software desain, belajar AutoCAD, panduan AutoCAD, Metro Software, kursus AutoCAD">
      <meta name="description" content="Temukan tutorial AutoCAD, tips, dan sumber daya terbaru di Metro Software. Tingkatkan keterampilan desain teknis Anda dengan panduan lengkap dan tips praktis dari para ahli.">
    <link rel="icon" href="img/autocad.png" type="image/png" />
    <title>AutoCAD Tutorial dan Sumber Daya Terbaik - Metro Software</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <style>
      .icon i {
    font-size: 3rem; 
    color : #002347;
    }

    .carousel-control-prev-icon {
      background-color: #002347 !important;
      border-radius: 50%; 
      border-radius: 50%; 
      width: 100px; 
      height: 100px; 
    }

    .carousel-control-next-icon {
      background-color: #002347 !important; /* Warna yang sama untuk tombol next */
      border-radius: 50%;
    } 
    </style>
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
      <div class="main_menu">
        <?php
          include 'navbar_user.php';
        ?>
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
                <h2 class="mt-4 mb-2">
                  Belajar AutoCAD dari Dasar hingga Mahir!
                </h2>
                <p>
                  Apakah anda ingin menguasai AutoCAD untuk kebutuhan desain teknis, arsitektur, teknik sipil, mekanikal, dan elektrikal? Belajarlah bersama kami!
                </p>
                <div>
                  <a href="courses.php" class="primary-btn mt-3 mb-sm-0">Lihat Daftar Kelas</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!-- Start Daftar Kelas -->
    <div class="container" id="daftar">
        <div class="main_title mt-5">
            <h2 class="mb-3">Daftar Kelas</h2>
            <p>Temukan Kelas yang Tepat untuk Anda</p>
        </div>
        <p class="text-center">Kami menawarkan kelas yang dirancang khusus untuk meningkatkan keahlian teknik Anda. Baik Anda mencari pengetahuan dasar atau ingin mendalami topik spesifik, kami punya solusinya.</p>
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-lg-4 col-md-6 mb-4">';
                echo '<div class="single-defination">';
                echo '<img src="img/' . $row['sampul_kelas'] . '" alt="" style="width:350px; height:350px;" class="mb-2">';
                echo '<h4 class="mb-20">' . $row['judul_kelas'] . '</h4>';
                // Cek apakah user sudah login
                if (isset($_SESSION['email'])) {
                  // Jika sudah login, tampilkan link detail
                  echo '<a href="detail_kelas.php?id_kelas=' . $row['id_kelas'] . '" class="btn primary-btn2">Detail</a>';
                } else {
                  // Jika belum login, tampilkan alert dan redirect ke login
                  echo '<a href="#" onclick="alertLogin()" class="btn primary-btn2">Detail</a>';
                }
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="mb-5 row justify-content-center mt-4">
        <?php if(isset($_SESSION['email'])): ?>
            <a href="daftar_kelas.php" class="primary-btn arrow mb-3 mb-sm-0 mr-5">
                <span class="icon-class"></span> Lihat Kelas lainnya
            </a>
        <?php else: ?>
            <a href="login/login-page.php" class="btn primary-btn" onclick="return confirm('Silakan login terlebih dahulu untuk melihat daftar kelas.')">Lihat Kelas lainnya</a>
        <?php endif; ?>
            <!-- <a href="courses.php" class="primary-btn2 mb-3 mb-sm-0">
              <i class="fas fa-shopping-cart"></i> Belanja Sekarang
            </a> -->
        </div>
    </div>
        <!-- End Daftar Kelas -->

        <!-- Start e-book Kelas -->
        <section class="title-bg" id="e-book">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-7">
                <div class="main_title">
                  <h2 class="mb-3 mt-5 text-white">Ebook dan Video Materi Eksklusif</h2>
                  <p>
                    Tingkatkan pembelajaran Anda dengan ebook dan video yang kami sediakan. Setiap materi disusun dengan teliti oleh para ahli, mencakup teori mendalam, studi kasus nyata, dan contoh praktis.
                  </p>
                  <div class="mt-4 mb-4">
                    <a href="belanja.php" class="btn primary-btn">
                      <i class="bi bi-bookmarks mr-2"></i>Akses E-Book dan Video
                    </a>
                  </div>                           
                </div>
              </div>
            </div>
            <h5 class="text-light text-center mb-3">Daftar Ebook</h5>
            <div class="row">
              <?php
              while ($data = mysqli_fetch_assoc($result_book)) {
                  echo '<div class="col-lg-4 col-md-6 mb-4">';
                  echo '<div class="single-defination">';
                  echo '<img src="img/' . $data['sampul_ebook'] . '" alt="" style="width:350px; height:350px;" class="mb-2">';
                  echo '<h4 class="mb-20 text-light">' . $data['judul_ebook'] . '</h4>';
                  // Cek apakah user sudah login
                  if (isset($_SESSION['email'])) {
                    // Jika sudah login, tampilkan link detail
                    echo '<a href="detail_ebook.php?id_ebook=' . $data['id_ebook'] . '" class="btn primary-btn">Detail</a>';
                  } else {
                    // Jika belum login, tampilkan alert dan redirect ke login
                    echo '<a href="#" onclick="alertLogin()" class="btn primary-btn">Detail</a>';
                  }
                  echo '</div>';
                  echo '</div>';
              }
              ?>
          </div>        
          <h5 class="text-light text-center mb-3">Daftar Video</h5> 
            <div class="row">
              <?php
              while ($show = mysqli_fetch_assoc($result_video)) {
                  echo '<div class="col-lg-4 col-md-6 mb-4">';
                  echo '<div class="single-defination">';
                  echo '<img src="img/' . $show['sampul_video'] . '" alt="" style="width:350px; height:350px;" class="mb-2">';
                  echo '<h4 class="mb-20 text-light">' . $show['judul_video'] . '</h4>';
                  // Cek apakah user sudah login
                  if (isset($_SESSION['email'])) {
                    // Jika sudah login, tampilkan link detail
                    echo '<a href="detail_video.php?id_video=' . $show['id_video'] . '" class="btn primary-btn">Detail</a>';
                  } else {
                    // Jika belum login, tampilkan alert dan redirect ke login
                    echo '<a href="#" onclick="alertLogin()" class="btn primary-btn">Detail</a>';
                  }
                  echo '</div>';
                  echo '</div>';
              }
              ?>
          </div>         
          </div>
        </section><br>
        <!-- End e-book Kelas -->

    <!--================ Start About Us Area =================-->
    <div class="feature_area mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="main_title" id="tentang-kami">
          <h2 class="mb-3">About Us</h2>
          <p>
            Tentang Kami
          </p>
        </div>
        <p class="mb-5 text-center">
          Metro Indonesian Software dan MEPCONS SolusiCAD telah bekerja sama untuk menghadirkan pendidikan teknik yang berkualitas tinggi. Dengan pengalaman panjang dalam dunia teknik dan pendidikan, kami berkomitmen untuk menyediakan pembelajaran yang mendalam dan praktis bagi semua peserta. Dari teori hingga praktik, kami memastikan bahwa setiap materi yang kami tawarkan relevan dengan kebutuhan industri saat ini.
        </p>
      </div>
    </div>

    <!-- 3 kotak untuk foto -->
    <div class="row text-center">
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="image-box">
          <img src="img/personal1.png" alt="Foto 1" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="image-box">
          <img src="img/personal2.png" alt="Foto 2" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="image-box">
          <img src="img/personal3.png" alt="Foto 3" class="img-fluid">
        </div>
      </div>
      </div>
    </div>
  </div>
        <!--================ End About Us Area =================-->

        <!-- Start Manfaat -->
         <section class="feature_area title-bg" id="manfaat">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5">
                <div class="main_title" id="manfaat">
                  <h2 class="mb-3 mt-4 text-white">Kenapa memilih kami?</h2>
                  <p>
                    Manfaat yang Anda Dapatkan
                  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- Baris pertama dengan 3 card -->
              <div class="col-lg-4 col-md-6">
                <div class="single_feature">
                  <div class="icon"><span class="flaticon-student"></span></div>
                  <div class="desc">
                    <h4 class="mt-3 mb-2">Pengajaran oleh Para Ahli</h4>
                    <p>
                      Semua pengajar kami adalah profesional berpengalaman di bidang teknik, siap membimbing Anda melalui materi yang komprehensif.
                    </p>
                    <br><br>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6">
                <div class="single_feature">
                  <div class="icon"><span class="flaticon-book"></span></div>
                  <div class="desc">
                    <h4 class="mt-3 mb-2">Materi yang Selalu Diperbarui</h4>
                    <p>
                      Kami selalu memperbarui materi kami agar sesuai dengan perkembangan terbaru di industri teknik, memastikan Anda mendapatkan informasi yang paling relevan.
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6">
                <div class="single_feature">
                  <div class="icon"><span class="flaticon-earth"></span></div>
                  <div class="desc">
                    <h4 class="mt-3 mb-2">Akses Fleksibel</h4>
                    <p>
                      Belajar dengan kecepatan Anda sendiri. Akses video, ebook, dan kelas kapan saja dan di mana saja.
                    </p>
                    <br><br><br>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Baris kedua dengan 2 card -->
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="single_feature">
                  <div class="icon"><span class="flaticon-earth"></span></div>
                  <div class="desc">
                    <h4 class="mt-3 mb-2">Komunitas yang Mendukung</h4>
                    <p>
                      Bergabunglah dengan komunitas profesional teknik yang aktif dan berdedikasi untuk terus belajar dan berkembang bersama.
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-6">
              <div class="single_feature">
                  <div class="icon">
                  <span class="flaticon-book"></span>
                  </div>
                  <div class="desc">
                      <h4 class="mt-3">Sertifikasi Resmi</h4>
                      <p>
                          Dapatkan sertifikat resmi yang diakui secara luas setelah menyelesaikan kursus dan ujian yang disediakan.
                      </p>
                  </div>
              </div>
          </div>
            </div>
          </div>
        </section>
        <!-- End Manfaat -->

        <!-- Start Testimoni Kelas -->
        <div class="container" id="testimoni">
          <div class="main_title mt-5 justify-content-center">
            <h2 class="mb-3">Apa Kata Mereka?</h2>
            <p>
              Dengarkan kisah sukses dari para peserta yang telah meningkatkan keahlian mereka bersama kami.
            </p>
          </div>
          <!-- Bootstrap Carousel -->
              <div id="testimoniCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php 
        $active = true; 
        $counter = 0;   
        ?>
        <div class="carousel-item <?php if ($active) { echo 'active'; $active = false; } ?>">
          <div class="row">
            
            <?php while($tes = mysqli_fetch_array($result_t)): ?>
            
            <div class="col-12 col-md-6"> 
              <div class="card border-0">
                <div class="card-body p-4 text-center shadow-sm mb-5"> 
                  <figure>
                    <img class="img-fluid" loading="lazy" src="img/<?php echo $tes['profil']?>" alt="Profil <?php echo $tes['nama_peserta']?>" style="width: 100%;">
                  </figure>
                </div>
              </div>
            </div>
            <?php 
            $counter++;
            // Setiap 2 card, buat slide baru
            if ($counter % 2 == 0): ?>
              </div> 
            </div> 
            
            <div class="carousel-item">
              <div class="row">
            <?php endif; ?>

            <?php endwhile; ?>
          </div>
        </div> 
      </div> 

      <!-- Kontrol Carousel -->
      <a class="carousel-control-prev" href="#testimoniCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#testimoniCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- Akhir Carousel -->
        </div>
      </div>
    </div>
        </div>        
        <!-- End Testimoni Kelas -->
    <!--================ Start footer Area  =================-->
    <?php
      include 'footer.php';
    ?>
    
  </body>
  </html>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
      });
    </script>  
    <script>
      function alertLogin() {
        alert("Anda belum login, silahkan login terlebih dahulu.");
        window.location.href = "login/login-page.php";
      }
    </script>
