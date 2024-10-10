<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $judul_video = $_POST['judul_video'];
    $keterangan_video = $_POST['keterangan_video'];
    $harga_video = $_POST['harga_video'];

    // Mengambil file sampul video
    $sampul_video = $_FILES['sampul_video']['name'];
    $sampul_tmp_name = $_FILES['sampul_video']['tmp_name'];
    $sampul_error = $_FILES['sampul_video']['error'];

    // Mengambil file video (multiple)
    $video_files = $_FILES['video_file']['name'];
    $video_tmp_names = $_FILES['video_file']['tmp_name'];
    $video_errors = $_FILES['video_file']['error'];

    // Menentukan folder penyimpanan file
    $folder_sampul = "img/";
    $folder_video = "img/video/";

    // Validasi file upload
    if ($sampul_error === UPLOAD_ERR_OK) {
        // Pindahkan file sampul ke folder tujuan
        if (move_uploaded_file($sampul_tmp_name, $folder_sampul . $sampul_video)) {
            // Menyimpan data video ke tb_video
            $query_video = "INSERT INTO tb_video (judul_video, keterangan_video, sampul_video, harga_video) 
                            VALUES ('$judul_video', '$keterangan_video', '$sampul_video', '$harga_video')";
            $result_video = mysqli_query($koneksi, $query_video);
            
            // Mendapatkan ID dari video yang baru saja dimasukkan
            $id_video = mysqli_insert_id($koneksi);

            // Menyimpan data file video ke video_file
            if ($result_video) {
                // Loop melalui file video untuk menyimpannya
                for ($i = 0; $i < count($video_files); $i++) {
                    if ($video_errors[$i] === UPLOAD_ERR_OK) {
                        // Pindahkan file video ke folder tujuan
                        if (move_uploaded_file($video_tmp_names[$i], $folder_video . $video_files[$i])) {
                            // Menyimpan data file video ke tabel video_file
                            $query_file = "INSERT INTO video_file (id_video, video_file) 
                                           VALUES ('$id_video', '$video_files[$i]')";
                            mysqli_query($koneksi, $query_file);
                        } else {
                            echo "<script>alert('Gagal mengupload file video ke folder.'); window.location.href = 'tambah_video.php';</script>";
                            exit;
                        }
                    }
                }

                echo "<script>alert('Data berhasil disimpan!'); window.location.href = 'video.php';</script>";
            } else {
                echo "<script>alert('Data gagal disimpan. Coba lagi!'); window.location.href = 'tambah_video.php';</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload file gambar. Coba lagi!'); window.location.href = 'tambah_video.php';</script>";
        }
    } else {
        echo "<script>alert('Ada kesalahan saat mengupload file. Silakan coba lagi!'); window.location.href = 'tambah_video.php';</script>";
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

    <div class="container mt-5">
        <form action="tambah_video.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="sampul_video">Sampul Video</label>
                <input type="file" class="form-control" id="sampul_video" name="sampul_video" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="video_file">File Video (.Mp4)</label>
                <input type="file" class="form-control" id="video_file" name="video_file[]" accept="video/*" multiple required>
            </div>
            <div class="form-group">
                <label for="judul_video">Judul Video</label>
                <input type="text" class="form-control" id="judul_video" name="judul_video" placeholder="Masukkan Judul" required>
            </div>
            <div class="form-group">
                <label for="keterangan_video">Deskripsi Video</label>
                <input type="text" class="form-control" id="keterangan_video" name="keterangan_video" placeholder="Masukkan Deskripsi" required>
            </div>
            <div class="form-group">
                <label for="harga_video">Harga</label>
                <input type="text" class="form-control" id="harga_video" name="harga_video" placeholder="Masukkan Harga" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="genric-btn info circle">Tambah</button>
            </div>
        </form>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
