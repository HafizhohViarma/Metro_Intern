<?php
    session_start();
    include "koneksi.php";

    // Query untuk mengambil data dari tabel tb_video
    $query = "SELECT * FROM tb_ebook";
    $result = mysqli_query($koneksi, $query);

    // if (!isset($_SESSION['id_user']) || $_SESSION['id_user'] !== true) {
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
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <?php
      include 'navbar_admin.php';
    ?>
    <!--================ End Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area mb-5">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Daftar E-Book</h2>
                <!-- <div class="page_link">
                  <a href="index.php">Home</a>
                  <a href="ebook.php">E-Book</a>
                </div> -->
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
        <a href="tambah_ebook.php" class="genric-btn info circle">Tambah E-Book</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID E-Book</td>
                <td align="center">Sampul E-Book</td>
                <td align="center">File</td>
                <td align="center">Judul E-Book</td>
                <td align="center">Deskripsi</td>
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
                    echo "<td align='center'>{$row['id_ebook']}</td>";
                    echo "<td align='center'><img src='img/{$row['sampul_ebook']}' width='100'></td>";
                    echo "<td align='center'>{$row['ebook_file']}</td>";
                    echo "<td align='center'>{$row['judul_ebook']}</td>";
                    echo "<td align='center'>{$row['deskripsi_ebook']}</td>";
                    echo "<td align='center'>{$row['harga_ebook']}</td>";
                    echo "<td align='center'>
                            <a href='edit_ebook.php?id={$row['id_ebook']}' class='genric-btn warning circle'>Edit</a><br><br>
                            <a href='delete_ebook.php?id={$row['id_ebook']}' class='genric-btn danger circle' onclick='return confirm(\"Apakah Anda yakin ingin menghapus ebook ini?\");'>Hapus</a>
                          </td>";
                    echo "</tr>";
                    $no++;
                }
            ?>
        </tbody>
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
