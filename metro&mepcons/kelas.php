<?php
    include "koneksi.php";

    // Query untuk mengambil data dari tabel tb_video
    $query = "SELECT * FROM tb_kelas";
    $result = mysqli_query($koneksi, $query);

    // if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    //   // Jika belum login, arahkan ke halaman login
    //   header("Location: login/login-page.php");
    //   exit(); // Pastikan tidak ada kode lain yang dieksekusi setelah redirect
    // }
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
    <title>Upgrade Kelas</title>
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
    <header class="header_area white-header">
      <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="index.php">
              <img class="logo-2" src="img/mepcons_metro_logo.png" alt="" style="width: 160px;"/>
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
                <!-- <li class="nav-item">
                  <a class="nav-link" href="index_admin.php">Home</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" href="video.php">Video</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ebook.php">E-Book</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="kelas.php">Daftar Kelas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="user.php">Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="penjualan.php">Penjualan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login/login-page.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area mb-5">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Daftar Kelas</h2>
                <div class="page_link">
                  <a href="index.php">Home</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->
    
    <!--================Start Table Area =================-->
    <div class="container">
    <div class="mb-3">
        <a href="tambah_kelas.php" class="genric-btn info circle">Tambah Kelas</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Kelas</td>
                <td align="center">Sampul Kelas</td>
                <td align="center">Judul Kelas</td>
                <td align="center">Deskripsi</td>
                <td align="center">Jadwal</td>
                <td align="center">Harga</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>
        <tbody>
        <?php
                $no = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td align='center'>{$no}</td>";
                    echo "<td align='center'>{$row['id_kelas']}</td>";
                    echo "<td align='center'><img src='img/{$row['sampul_kelas']}' width='100'></td>";
                    echo "<td align='center'>{$row['judul_kelas']}</td>";
                    echo "<td align='center'>{$row['deskripsi_kelas']}</td>";
                    echo "<td align='center'>{$row['jadwal']}</td>";
                    echo "<td align='center'>{$row['harga_kelas']}</td>";
                    echo "<td align='center'>
                            <a href='edit_kelas.php?id={$row['id_kelas']}' class='btn btn-warning'>Edit</a><br><br>
                            <a href='delete_kelas.php?id={$row['id_kelas']}' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus kelas ini?\");'>Hapus</a>
                          </td>";
                    echo "</tr>";
                    $no++;
                }
            ?>
        </tbody>
    </div>
    <!--================End Table Area =================-->

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
