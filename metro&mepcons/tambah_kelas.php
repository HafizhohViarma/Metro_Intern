<?php
    include "koneksi.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Mendapatkan data dari form
      $judul_kelas = $_POST['judul_kelas'];
      $deskripsi_kelas = $_POST['deskripsi_kelas'];
      $harga_kelas = $_POST['harga_kelas'];
      $jadwal = $_POST['jadwal'];

      // Mengambil file sampul video
      $sampul_kelas = $_FILES['sampul_kelas']['name'];
      $tmp_name = $_FILES['sampul_kelas']['tmp_name'];
      
      // Menentukan folder penyimpanan file
      $folder = "img/";
      
      // Pindahkan file ke folder tujuan
      if (move_uploaded_file($tmp_name, $folder.$sampul_kelas)) {
          // Menyimpan data ke database
          $query = "INSERT INTO tb_kelas (judul_kelas, deskripsi_kelas, sampul_kelas, harga_kelas, jadwal) VALUES ('$judul_kelas', '$deskripsi_kelas', '$sampul_kelas', '$harga_kelas', '$jadwal')";
          $result = mysqli_query($koneksi, $query);
          
          if ($result) {
              echo "<script>alert('Data berhasil disimpan!'); window.location.href = 'kelas.php';</script>";
          } else {
              echo "<script>alert('Data gagal disimpan. Coba lagi!'); window.location.href = 'tambah_kelas.php';</script>";
          }
      } else {
          echo "<script>alert('Gagal mengupload file gambar. Coba lagi!'); window.location.href = 'tambah_kelas.php';</script>";
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
    <title>Tambah Kelas</title>
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
    <!--================Home Banner Area =================-->
    <section class="banner_area mb-5">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Tambah Kelas</h2>
                  <a href="ebook.php">Kembali</a>
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
      <form action="tambah_kelas.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
              <label for="sampul_kelas">Sampul Kelas</label>
              <input type="file" class="form-control" id="sampul_kelas" name="sampul_kelas" accept="image/*">
          </div>
          <div class="form-group">
              <label for="judul_kelas">Judul Kelas</label>
              <input type="text" class="form-control" id="judul_kelas" name="judul_kelas" placeholder="Masukkan Judul">
          </div>
          <div class="form-group">
              <label for="deskripsi_kelas">Deskripsi Kelas</label>
              <input type="text" class="form-control" id="deskripsi_kelas" name="deskripsi_kelas" placeholder="Masukkan Deskripsi">
          </div>
          <div class="form-group">
              <label for="jadwal">Jadwal Kelas</label>
              <input type="text" class="form-control" id="jadwal" name="jadwal" placeholder="Misal ( Senin, 14.00-15.00 WIB )">
          </div>
          <div class="form-group">
              <label for="harga_kelas">Harga</label>
              <input type="text" class="form-control" id="harga_kelas" name="harga_kelas" placeholder="Masukkan Harga">
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
