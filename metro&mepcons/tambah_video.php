<?php
    include "koneksi.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Mendapatkan data dari form
      $judul_video = $_POST['judul_video'];
      $keterangan_video = $_POST['keterangan_video'];
      $harga_video = $_POST['harga_video'];

      // Mengambil file sampul video
      $sampul_video = $_FILES['sampul_video']['name'];
      $tmp_name = $_FILES['sampul_video']['tmp_name'];
      
      // Menentukan folder penyimpanan file
      $folder = "img/";
      
      // Pindahkan file ke folder tujuan
      if (move_uploaded_file($tmp_name, $folder.$sampul_video)) {
          // Menyimpan data ke database
          $query = "INSERT INTO tb_video (judul_video, keterangan_video, sampul_video, harga_video) VALUES ('$judul_video', '$keterangan_video', '$sampul_video', '$harga_video')";
          $result = mysqli_query($koneksi, $query);
          
          if ($result) {
              echo "<script>alert('Data berhasil disimpan!'); window.location.href = 'video.php';</script>";
          } else {
              echo "<script>alert('Data gagal disimpan. Coba lagi!'); window.location.href = 'tambah_video.php';</script>";
          }
      } else {
          echo "<script>alert('Gagal mengupload file gambar. Coba lagi!'); window.location.href = 'tambah_video.php';</script>";
      }
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
    <link rel="icon" href="img/mepcons_metro_logo.png" type="image/png" />
    <title>Tambah Video</title>
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
        <div class="search_input" id="search_input_box">
          <div class="container">
            <form class="d-flex justify-content-between" method="" action="">
              <input
                type="text"
                class="form-control"
                id="search_input"
                placeholder="Search Here"
              />
              <button type="submit" class="btn"></button>
              <span
                class="ti-close"
                id="close_search"
                title="Close Search"
              ></span>
            </form>
          </div>
        </div>
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
                <h2>Tambah Video</h2>
                  <a href="video.php">Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->
    
    <!--================Start Table Area =================-->
    <div class="container mt-5">
      <form action="tambah_video.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
              <label for="sampul_video">Sampul Video</label>
              <input type="file" class="form-control" id="sampul_video" name="sampul_video" accept="image/*">
          </div>
          <div class="form-group">
              <label for="judul_video">Judul Video</label>
              <input type="text" class="form-control" id="judul_video" name="judul_video" placeholder="Masukkan Judul">
          </div>
          <div class="form-group">
              <label for="keterangan_video">Deskripsi Video</label>
              <input type="text" class="form-control" id="keterangan_video" name="keterangan_video" placeholder="Masukkan Deskripsi">
          </div>
          <div class="form-group">
              <label for="harga_video">Harga</label>
              <input type="text" class="form-control" id="harga_video" name="harga_video" placeholder="Masukkan Harga">
          </div>
          <div class="mb-3">
              <button type="submit" class="genric-btn info circle">Tambah</button>
          </div>
      </form>
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
