<?php
// Koneksi ke database
include('koneksi.php'); // Sesuaikan dengan file koneksi database yang digunakan

// Ambil id_video dari query string
$id_video = $_GET['id_video'];

// Ambil data video dari database
$query = "SELECT * FROM tb_video WHERE id_video = '$id_video'";
$result = mysqli_query($koneksi, $query);

// Cek apakah data ditemukan
if ($row = mysqli_fetch_assoc($result)) {
    $judul_video = $row['judul_video'];
    $video_file = $row['video_file'];
} else {
    echo "Video tidak ditemukan.";
    exit;
}

?>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/mepcons_metro_logo.png" type="image/png" />
    <title>Upgrade E-Book</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <style>
        body {
    background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('img/cad.jpg');
    background-size: cover;
    background-position: center;
    }
    .detail-produk h1 {
        color: #FFFFFF; 
    }
    .card {
    background-color: #FFFFFF; 
    max-width: 900px;
    margin: 0 auto; 
    }
    .card-body {
        color: black;
    }
    </style>
  </head>
<body>
    <div class="container mt-5">
        <a href="pembelajaran.php" class="text-warning">Kembali</a>
        <h5 class="text-light center"><?php echo $row['judul_video']?></h5>
        <video width="1100" height="540" controls>
        <source src="img/video/<?php echo $row['video_file']?>" type="video/mp4">
        </video>
    </div>
</body>
</html>