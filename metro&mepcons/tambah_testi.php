<?php
    include "koneksi.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Mendapatkan data dari form
      $nama_peserta = $_POST['nama_peserta'];
      $testimoni = $_POST['testimoni'];

      // Mengambil file sampul video
      $profil = $_FILES['profil']['name'];
      $tmp_name = $_FILES['profil']['tmp_name'];
      
      // Menentukan folder penyimpanan file
      $folder = "img/";
      
      // Pindahkan file ke folder tujuan
      if (move_uploaded_file($tmp_name, $folder.$profil)) {
          // Menyimpan data ke database
          $query = "INSERT INTO tb_testi (nama_peserta, testimoni, profil) VALUES ('$nama_peserta', '$testimoni', '$profil')";
          $result = mysqli_query($koneksi, $query);
          
          if ($result) {
              echo "<script>alert('Data berhasil disimpan!'); window.location.href = 'testimoni_admin.php';</script>";
          } else {
              echo "<script>alert('Data gagal disimpan. Coba lagi!'); window.location.href = 'tambah_testi.php';</script>";
          }
      } else {
          echo "<script>alert('Gagal mengupload file gambar. Coba lagi!'); window.location.href = 'tambah_testi.php';</script>";
      }
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/mepcons_metro_logo.png" type="image/png" />
    <title>Tambah Testimoni</title>
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
                            <h2>Tambah Testimoni</h2>
                            <a href="testimoni_admin.php">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Start Table Area =================-->
    <div class="container mt-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_peserta">Nama Peserta</label>
                <input type="text" name="nama_peserta" class="form-control" id="nama_peserta" placeholder="Masukkan Nama" required />
            </div>
            <div class="form-group">
              <label for="profil">Profil Peserta</label>
              <input type="file" class="form-control" id="profil" name="profil" accept="image/*">
          </div>
          <div class="form-group">
                <label for="testimoni">Deskripsi Testimoni</label>
                <input type="text" name="testimoni" class="form-control" id="testimoni" placeholder="Masukkan Nama" required />
            </div>
            <div class="mb-3">
                <button type="submit" class="genric-btn info circle mt-5">Tambah</button>
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