<?php
    session_start();
    include "koneksi.php";

    $query = "SELECT * FROM users";
    $result = mysqli_query($koneksi, $query);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nama = $_POST['nama'];
      $email = $_POST['email'];
      $email = $_POST['telp'];
      $password = $_POST['password'];
      $level = $_POST['level'];
  
      // Simpan data ke database
      $query = "INSERT INTO users (nama, email, telp, password, level) VALUES ('$nama','$email', '$telp', '$password', '$level')";
      $result = mysqli_query($koneksi, $query);
  
      if ($result) {
          // Tampilkan alert dan redirect ke halaman user.php
          echo "<script>
                  alert('Pengguna berhasil ditambahkan!');
                  window.location.href='user.php';
                </script>";
      } else {
          echo "Gagal menambahkan pengguna: " . mysqli_error($koneksi);
      }
  }
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
    <title>Manage Users</title>
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
                <li class="nav-item">
                  <a class="nav-link" href="kelas.php">Daftar Kelas</a>
                </li>
                <li class="nav-item active">
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
                <h2>Manage Pengguna</h2>
                <div class="page_link">
                  <a href="index.php">Home</a>
                  <a href="ebook.php">Video</a>
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
    <div class="mt-3 mb-3">
    <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            // Hapus session agar tidak muncul lagi setelah di-refresh
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
            ?>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <a href="tambah_user.php" class="genric-btn info circle">Tambah Pengguna</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID User</td>
                <td align="center">Nama</td>
                <td align="center">Email</td>
                <td align="center">No Telp / Telegram</td>
                <!-- <td align="center">Password</td> -->
                <td align="center">Level User</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>
        <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td align='center'>" . $no++ . "</td>";
                    echo "<td align='center'>" . $row['id_user'] . "</td>";
                    echo "<td align='center'>" . $row['nama'] . "</td>";
                    echo "<td align='center'>" . $row['email'] . "</td>";
                    echo "<td align='center'>" . $row['telp'] . "</td>";
                    // echo "<td align='center'>" . $row['password'] . "</td>";
                    echo "<td align='center'>" . $row['level'] . "</td>";
                    echo "<td align='center'>
                            <a href='edit_user.php?id=" . $row['id_user'] . "' class='btn btn-primary'>Edit</a>
                            <a href='delete_user.php?id=" . $row['id_user'] . "' class='btn btn-danger' onclick=\"return confirm('Anda yakin ingin menghapus user ini?')\">Hapus</a>
                          </td>";
                    echo "</tr>";
                }
                ?> 
    </table>
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
