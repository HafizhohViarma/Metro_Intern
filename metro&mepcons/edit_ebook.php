<?php
  include "koneksi.php";

  if (isset($_GET['id'])) {
      $id_ebook = $_GET['id'];
      $query = "SELECT * FROM tb_ebook WHERE id_ebook = '$id_ebook'";
      $result = mysqli_query($koneksi, $query);

      if (mysqli_num_rows($result) > 0) {
          $ebook = mysqli_fetch_assoc($result);
      } else {
          echo "<script>alert('Data tidak ditemukan!'); window.location.href = 'ebook.php';</script>";
      }
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Mendapatkan data dari form
      $judul_ebook = $_POST['judul_ebook'];
      $deskripsi_ebook = $_POST['deskripsi_ebook'];
      $harga_ebook = $_POST['harga_ebook'];

      //ambil file sampul ebook baru jika ada
      $sampul_ebook = $_FILES['sampul_ebook']['name'];
      $tmp_name_sampul = $_FILES['sampul_ebook']['tmp_name'];
      
      //ambil file ebook baru jika ada
      $ebook_file = $_FILES['ebook_file']['name'];
      $tmp_name_ebook = $_FILES['ebook_file']['tmp_name'];
      
      //folder penyimpanan file
      $folder_sampul = "img/";
      $folder_file = "files/";

      // Update data ebook
      $query = "UPDATE tb_ebook SET judul_ebook = '$judul_ebook', deskripsi_ebook = '$deskripsi_ebook', harga_ebook = '$harga_ebook'";

      // Jika user upload gambar sampul baru, update dengan gambar baru
      if (!empty($sampul_ebook)) {
          move_uploaded_file($tmp_name_sampul, $folder_sampul.$sampul_ebook);
          $query .= ", sampul_ebook = '$sampul_ebook'";
      }

      // Jika user upload file ebook baru, update dengan file baru
      if (!empty($ebook_file)) {
          move_uploaded_file($tmp_name_ebook, $folder_file.$ebook_file);
          $query .= ", ebook_file = '$ebook_file'";
      }

      //query update
      $query .= " WHERE id_ebook = '$id_ebook'";

      $result = mysqli_query($koneksi, $query);

      if ($result) {
          echo "<script>alert('Data berhasil diupdate!'); window.location.href = 'ebook.php';</script>";
      } else {
          echo "<script>alert('Data gagal diupdate. Coba lagi!'); window.location.href = 'edit_ebook.php?id=$id_ebook';</script>";
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
    <title>Edit E-Book</title>
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
                <h2>Edit E-Book</h2>
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
    <form action="edit_ebook.php?id=<?php echo $id_ebook; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="sampul_ebook">Sampul E-Book</label>
            <input type="file" class="form-control" id="sampul_ebook" name="sampul_ebook" accept="image/*">
            <img src="img/<?php echo $ebook['sampul_ebook']; ?>" alt="Sampul" width="100" class="mt-3">
        </div>
        <div class="form-group">
          <label for="ebook_file">File E-Book (PDF)</label>
          <input type="file" class="form-control" id="ebook_file" name="ebook_file" accept=".pdf">
          <?php if (!empty($ebook['ebook_file'])): ?>
              <p class="mt-2">File saat ini: <a href="files/<?php echo $ebook['ebook_file']; ?>" target="_blank">Lihat E-Book</a></p>
          <?php endif; ?>
      </div>
        <div class="form-group">
            <label for="judul_ebook">Judul E-Book</label>
            <input type="text" class="form-control" id="judul_ebook" name="judul_ebook" value="<?php echo $ebook['judul_ebook']; ?>" placeholder="Masukkan Judul">
        </div>
        <div class="form-group">
            <label for="deskripsi_ebook">Deskripsi E-Book</label>
            <input type="text" class="form-control" id="deskripsi_ebook" name="deskripsi_ebook" value="<?php echo $ebook['deskripsi_ebook']; ?>" placeholder="Masukkan Deskripsi">
        </div>
        <div class="form-group">
            <label for="harga_ebook">Harga</label>
            <input type="text" class="form-control" id="harga_ebook" name="harga_ebook" value="<?php echo $ebook['harga_ebook']; ?>" placeholder="Masukkan Harga">
        </div>
        <div class="mb-3">
            <button type="submit" class="genric-btn info circle">Update</button>
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
