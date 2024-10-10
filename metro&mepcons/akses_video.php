<?php
session_start();
include "koneksi.php";

// Ambil id_video dari URL
if (isset($_GET['id_video'])) {
    $id_video = $_GET['id_video'];

    // Query untuk mengambil data video berdasarkan id_video
    $query = "SELECT * FROM video_file WHERE id_video = '$id_video'";
    $result = mysqli_query($koneksi, $query);
} else {
    echo "<script>alert('ID Video tidak ditemukan!'); window.location.href = 'pembelajaran.php';</script>";
    exit;
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
    <title>Akses Video</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <style>
      .icon i {
    font-size: 3rem; 
    color : #002347;
    }

    .carousel-control-prev-icon {
      background-color: #002347 !important;
      border-radius: 50%; 
      border-radius: 50%; 
      width: 100px; 
      height: 100px; 
    }

    .carousel-control-next-icon {
      background-color: #002347 !important; /* Warna yang sama untuk tombol next */
      border-radius: 50%;
    } 
    </style>
  </head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand logo_h" href="index.php"
            ><img src="img/mepcons_metro_logo.png" alt="" style="width: 160px;"
        /></a>
        </div>
    </nav>

    <div class="container mt-5">
        <a href="pembelajaran.php" class="genric-btn warning circle mb-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <h3 class="text-center">Selamat Belajar!</h3>
        <p class="text-center">Pastikan untuk menyelesaikan seluruh materi agar mendapatkan manfaat penuh dari video ini. Jika ada pertanyaan atau butuh bantuan, jangan ragu untuk menghubungi tim kami.</p>
        <div class="row">
        <?php 
            while ($row = mysqli_fetch_assoc($result)): 
            ?>
                <div class="col-md-4"> <!-- Setiap card akan memakan 1/3 dari lebar baris -->
                    <div class="card mb-4">
                        <div class="card-body">
                        <video width="100%" controls>
                                <source src="img/video/<?php echo $row['video_file']; ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <h5 class="card-title"><?php echo $row['sub_judul']; ?></h5>
                        </div>
                    </div>
                </div>
            <?php 
            endwhile; 
            ?>
        </div>
    </div>

    <?php
    include 'footer.php';

    ?>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
