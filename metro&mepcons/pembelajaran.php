<?php
session_start();
include 'koneksi.php'; 

$id_user = $_SESSION['id_user']; 
if(isset($_SESSION['id_user'])){

// Query untuk mengambil transaksi dengan tipe 'video'
$query = "
    SELECT 
        tb_transaksi.id_transaksi,
        tb_transaksi.tgl_transaksi,
        tb_video.id_video,
        tb_video.judul_video,
        tb_video.harga_video,
        tb_video.sampul_video,
        tb_video.video_file
    FROM 
        tb_transaksi
    JOIN tb_video ON tb_transaksi.id_video = tb_video.id_video
    WHERE 
        tb_transaksi.tipe_produk = 'video'
        AND tb_transaksi.id_user = '$id_user'
        AND tb_transaksi.status = 'konfirmasi'
    ORDER BY 
        tb_transaksi.id_transaksi DESC
";

$querykelas = "
    SELECT 
    tb_transaksi.id_transaksi,
    tb_transaksi.tgl_transaksi,
    tb_kelas.id_kelas,
    tb_kelas.judul_kelas,
    tb_kelas.harga_kelas,
    tb_kelas.sampul_kelas,
    tb_kelas.jadwal
    FROM 
        tb_transaksi
    JOIN tb_kelas ON tb_transaksi.id_kelas = tb_kelas.id_kelas
    WHERE 
        tb_transaksi.tipe_produk = 'kelas'
        AND tb_transaksi.id_user = '$id_user'
        AND tb_transaksi.status = 'konfirmasi'
    ORDER BY 
        tb_transaksi.id_transaksi DESC;

";

$queryebook = "
    SELECT 
        tb_transaksi.id_transaksi,
        tb_transaksi.id_ebook,
        tb_transaksi.tgl_transaksi,
        tb_ebook.judul_ebook,
        tb_ebook.harga_ebook,
        tb_ebook.sampul_ebook,
        tb_ebook.ebook_file
    FROM 
        tb_transaksi
    JOIN tb_ebook ON tb_transaksi.id_ebook = tb_ebook.id_ebook
    WHERE 
        tb_transaksi.tipe_produk = 'ebook'
        AND tb_transaksi.id_user = '$id_user'
        AND tb_transaksi.status = 'konfirmasi'
    ORDER BY 
        tb_transaksi.id_transaksi DESC
";
    
// Jalankan query dengan koneksi database
$result = mysqli_query($koneksi, $query);
$resultkelas = mysqli_query($koneksi, $querykelas);
$resultebook = mysqli_query($koneksi, $queryebook);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
    <header class="header_area white-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img class="logo-2" src="img/mepcons_metro_logo.png" alt="" style="width: 160px;" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="index.php">Kembali</a>
                            </li> -->
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
                    <div class="col-lg-8">
                        <div class="banner_content text-center">
                            <h2>Selamat Datang Kembali !</h2>
                            <p>Akses semua materi yang telah Anda beli di sini. Mulai belajar kapan saja dan di mana saja.</p>
                            <div class="page_link">
                                <a href="index.php">Home</a>
                                <a href="belanja.php">Cari Materi Lainnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menampilkan Video -->
    <div class="container">
        <h3>Materi Anda</h3>
        <p>Klik untuk melihat ebook, menonton video, atau melihat jadwal kelas yang Anda ikuti.</p>
        <h4>Video Anda</h4>
        <div class="row">
            <?php while($row = mysqli_fetch_array($result)): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <img src="img/<?php echo $row['sampul_video'] ?>" class="card-img-top" alt="Sampul" style="width: 250px; height: 250px;">
                        <h5 class="card-title mt-1"><?php echo $row['judul_video']; ?></h5>
                        <p class="card-title">Tanggal Pembelian : <?php echo $row['tgl_transaksi']; ?></p>
                        <p class="card-text">Harga: Rp <?php echo $row['harga_video']; ?></p>
                        <a href="akses_video.php?id_video=<?php echo $row['id_video']; ?>" class="genric-btn info circle">Akses</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>


    <!-- Menampilkan Kelas -->
    <div class="container">
    <h4>Kelas yang Anda ikuti</h4>
    <div class="row">
            <?php while($data = mysqli_fetch_array($resultkelas)): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                    <img src="img/<?php echo $data['sampul_kelas'] ?>" class="card-img-top" alt="Sampul" style="width: 250px; height: 250px;">
                        <h5 class="card-title mt-1"><?php echo $data['judul_kelas']; ?></h5>
                        <p class="card-title">Tanggal Pembelian : <?php echo $data['tgl_transaksi']; ?></p>
                        <p class="card-title">Jadwal Kelas : <?php echo $data['jadwal']; ?></p>
                        <p class="card-text">Harga: Rp <?php echo $data['harga_kelas']; ?></p>
                        <!-- <a href="#" class="btn btn-success">Join WhatsApp</a> -->
                        <a href="https://wa.me/1234567890" class="genric-btn primary circle">Join Group</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Menampilkan Ebook -->
    <div class="container">
    <h4>E-Book Anda</h4>
    <div class="row">
            <?php while($array = mysqli_fetch_array($resultebook)): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                    <img src="img/<?php echo $array['sampul_ebook'] ?>" class="card-img-top" alt="Sampul" style="width: 250px; height: 250px;">
                        <h5 class="card-title mt-1"><?php echo $array['judul_ebook']; ?></h5>
                        <p class="card-title">Tanggal Pembelian : <?php echo $array['tgl_transaksi']; ?></p>
                        <p class="card-text">Harga: Rp <?php echo $array['harga_ebook']; ?></p>
                        <a href="akses_ebook.php?id_ebook=<?php echo $array['id_ebook']; ?>" class="genric-btn info circle">Akses</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php
      include 'footer.php';
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="js/theme.js"></script>
</body>
</html>
<?php
} else {
    header("Location: login/login-page.php");
}
