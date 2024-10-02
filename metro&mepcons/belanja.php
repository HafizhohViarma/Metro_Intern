<?php
    session_start();
    include "koneksi.php";

    $search = ""; //inisialisasi utk proses search

    // Cek apakah form pencarian di-submit
    if (isset($_POST['search'])) {
        $search = mysqli_real_escape_string($koneksi, $_POST['search']);

        // Query untuk mengambil data dari tabel tb_video berdasarkan kata kunci pencarian
        $query_video = "SELECT * FROM tb_video WHERE judul_video LIKE '%$search%'";
        $result_video = mysqli_query($koneksi, $query_video);

        // Query untuk mengambil data dari tabel ebook berdasarkan kata kunci pencarian
        $query_ebook = "SELECT * FROM tb_ebook WHERE judul_ebook LIKE '%$search%'";
        $result_ebook = mysqli_query($koneksi, $query_ebook);

        // Query untuk mengambil data dari tabel kelas berdasarkan kata kunci pencarian
        $query_kelas = "SELECT * FROM tb_kelas WHERE judul_kelas LIKE '%$search%'";
        $result_kelas = mysqli_query($koneksi, $query_kelas);
    } else {
        // Query default tanpa pencarian
        $query_video = "SELECT * FROM tb_video";
        $result_video = mysqli_query($koneksi, $query_video);

        $query_ebook = "SELECT * FROM tb_ebook";
        $result_ebook = mysqli_query($koneksi, $query_ebook);

        $query_kelas = "SELECT * FROM tb_kelas";
        $result_kelas = mysqli_query($koneksi, $query_kelas);
    }
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
    <style>
    .input-group-container {
      display: flex;
      justify-content: flex-end; /* Menempatkan input-group di ujung kanan */
      margin-bottom: 20px; /* Jarak bawah jika diperlukan */
    }

    .input-group {
      max-width: 300px; /* Atur lebar maksimum untuk input group */
    }

    .input-group .form-control {
      border-radius: 0.25rem; /* Sudut membulat */
      flex: 1; /* Input mengambil ruang yang tersisa */
      margin-right: 10px;
    }

    .input-group .btn {
      border-radius: 0.25rem; /* Sudut membulat */
      white-space: nowrap; /* Mencegah teks membungkus */
    }
  </style>
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area white-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="index.php">
              <img class="logo-2" src="img/mepcons_metro_logo.png" alt="" style="width: 160px;"/>
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
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Akses Video & E-Book</h2>
                <div class="page_link">
                  <a href="index.php">Home</a>
                  <a href="courses.php">Lihat Daftar Kelas</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

      <div class="container mt-4">
        <h4>Semua pembelajaran</h4>
        <form method="POST" action="">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control rounded" placeholder="Search" value="<?php echo htmlspecialchars($search); ?>" />
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </div>
        </form>
        
        <!-- Menampilkan Video -->
        <div class="section-top-border">
            <h4>Pilihan Video</h4>
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result_video)): ?>
                    <div class="col-md-4 mt-3">
                        <div class="single-defination">
                            <img src="img/<?php echo $row['sampul_video']; ?>" alt="<?php echo $row['judul_video']; ?>" style="width: 250px; height: 250px;" class="mb-2">
                            <h4 class="mb-20"><?php echo $row['judul_video']; ?></h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <?php if(isset($_SESSION['email'])): ?>
                                    <a href="detail_video.php?id_video=<?php echo $row['id_video']; ?>" class="btn primary-btn2">Detail</a>
                                <?php else: ?>
                                    <a href="login/login-page.php" class="btn primary-btn2" onclick="return confirm('Silakan login terlebih dahulu untuk melihat detail video.')">Detail</a>
                                <?php endif; ?>
                                <span class="text-danger font-weight-bold"><?php echo 'Rp ' . number_format($row['harga_video']); ?>.000</span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <!-- Menampilkan E-Book -->
        <div class="section-top-border">
        <h4>Pilihan E-Book</h4>
        <div class="row">
          <?php while ($row = mysqli_fetch_assoc($result_ebook)): ?>
            <div class="col-md-4 d-inline-block mt-3" style="float: none;">
            <div class="single-defination">
              <img src="img/<?php echo $row['sampul_ebook']; ?>" alt="<?php echo $row['judul_ebook']; ?>" style="width: 250px; height: 250px;" class="mb-2">
              <h4 class="mb-20"><?php echo $row['judul_ebook']; ?></h4>
              <div class="d-flex justify-content-between align-items-center">
              <?php if(isset($_SESSION['email'])): ?>
                                    <a href="detail_ebook.php?id_ebook=<?php echo $row['id_ebook']; ?>" class="btn primary-btn2">Detail</a>
                                <?php else: ?>
                                    <a href="login/login-page.php" class="btn primary-btn2" onclick="return confirm('Silakan login terlebih dahulu untuk melihat detail E-Book.')">Detail</a>
                                <?php endif; ?>
                <span class="text-danger font-weight-bold"><?php echo 'Rp ' . number_format($row['harga_ebook']); ?>.000</span>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
                                </div>
                                </div>
                                </div>
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
