<?php
  session_start();
  include 'koneksi.php';

  $id_user = $_SESSION['id_user'];

  // Inisialisasi query untuk menampilkan semua kelas
  $query = "SELECT * FROM tb_kelas";

  // Cek apakah form search sudah di-submit
  if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = mysqli_real_escape_string($koneksi, $_POST['search']);
    // Modifikasi query untuk menambahkan filter berdasarkan judul_kelas
    $query .= " WHERE judul_kelas LIKE '%$search%'";
  }

  $result = mysqli_query($koneksi, $query);

  // Query untuk user
  $query_user = "
    SELECT users.nama, tb_transaksi.tipe_produk, tb_kelas.judul_kelas, tb_kelas.deskripsi_kelas, tb_kelas.harga_kelas, tb_kelas.id_kelas, tb_kelas.sampul_kelas
    FROM users 
    JOIN tb_transaksi ON users.id_user = tb_transaksi.id_user
    JOIN tb_kelas ON tb_transaksi.id_kelas = tb_kelas.id_kelas 
    WHERE tb_transaksi.tipe_produk = 'kelas' 
    AND users.id_user = $id_user
  ";

  $result_user = mysqli_query($koneksi, $query_user);
  $user_data = mysqli_fetch_assoc($result_user);
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
              <img src="img/mepcons_metro_logo.png" alt="" style="width: 160px;"/>
            </a>
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
                <h2>Daftar Kelas</h2>
                <div class="page_link">
                  <a href="index.php">Home</a>
                  <a href="courses.php">Opsi Lainnya</a>
                  <!-- <a href="#">Daftar Kelas</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Course Details Area =================-->
    <div class="container">
    <div class="section-top-border">
            <h4>Daftar Kelas untuk Anda</h4>
            <form method="POST" action="" class="input-group mb-3">
              <input type="text" name="search" placeholder="Cari kelas..." class="form-control rounded" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>" />
              <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>


            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-4 mt-3">
                        <div class="single-defination">
                            <img src="img/<?php echo $row['sampul_kelas']; ?>" alt="<?php echo $row['judul_kelas']; ?>" style="width: 350px; height: 200px;" class="mb-2">
                            <h4 class="mb-20"><?php echo $row['judul_kelas']; ?></h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <?php if(isset($_SESSION['email'])): ?>
                                    <a href="detail_kelas.php?id_kelas=<?php echo $row['id_kelas']; ?>" class="btn primary-btn2">Detail</a>
                                <?php else: ?>
                                    <a href="login/login-page.php" class="btn primary-btn2" onclick="return confirm('Silakan login terlebih dahulu untuk melihat detail video.')">Detail</a>
                                <?php endif; ?>
                                <span class="text-danger font-weight-bold"><?php echo 'Rp ' . $row['harga_kelas']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        </div>
        
    <!--================ End Course Details Area =================-->
    
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
          <!-- untuk menampilkan ketika user klik button Bayar dan diarahkan ke halaman pembelajaran -->
          <script>
          document.addEventListener('DOMContentLoaded', function() {
              var bayarButton = document.getElementById('bayarButton');

              bayarButton.addEventListener('click', function(event) {
                  // Tampilkan alert message
                  alert('Pesanan berhasil, menunggu konfirmasi Admin');
              });
          });
          </script>
        </body>
      </html>