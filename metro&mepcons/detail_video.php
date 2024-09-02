<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id_video'])) {
    $id_video = intval($_GET['id_video']);
    
    // Ambil data video berdasarkan ID
    $query = "SELECT * FROM tb_video WHERE id_video = $id_video";
    $result = mysqli_query($koneksi, $query);
    
    // Jika data video ditemukan
    if (mysqli_num_rows($result) > 0) {
        $video = mysqli_fetch_assoc($result);
        $id_video = $video['id_video'];
        $harga = $video['harga_video'];
        $tipe_produk = 'video';
    } else {
        echo "Video tidak ditemukan.";
        exit;
    }

    // Ambil data user berdasarkan id_user dari session
    $id_user = $_SESSION['id_user'];
    $query_user = "SELECT * FROM users WHERE id_user = $id_user";
    $result_user = mysqli_query($koneksi, $query_user);

    // Jika data user ditemukan
    if (mysqli_num_rows($result_user) > 0) {
        $user = mysqli_fetch_assoc($result_user);
        $nama_user = $user['nama'];
    } else {
        echo "User tidak ditemukan.";
        exit;
    }

} else {
    echo "ID video tidak diberikan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
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
<nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.html"
              ><img src="img/mepcons_metro_logo.png" alt="" style="width: 160px;"
            /></a>
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
                
              </ul>
            </div>
          </div>
        </nav>
    <div class="container text-center detail-produk">
        <h1>Detail Video</h1>
    </div>
    <div class="card mb-3 container ">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="img/<?php echo $video['sampul_video']; ?>" class="img-fluid rounded-start mt-4 mb-4" alt="<?php echo $video['judul_video']; ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $video['judul_video']; ?></h5>
                    <p class="card-text"><?php echo $video['keterangan_video']; ?></p>
                    <p class="card-text">Harga: Rp. <?php echo number_format($video['harga_video']); ?>.000</p>
                    <p class="card-text"><i class="fas fa-check"></i>Pelatihan Terpandu</p>
                    <p class="card-text"><i class="fas fa-check"></i> Akses Seumur Hidup</p>
                    <a href="belanja.php" class="genric-btn success circle">Kembali</a>
                    <a class="genric-btn danger circle" data-toggle="modal" data-target="#modalbeli">
                        <i class="fas fa-shopping-cart"></i> Beli Sekarang
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="modalbeli" tabindex="-1" role="dialog" aria-labelledby="modalbeliLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalbeliLabel">Konfirmasi Pembelian</h5>
            </div>
            <div class="modal-body">
            <form id="paymentForm" action="bukti_bayar.php" method="POST" enctype="multipart/form-data">
                <p>Detail Pembelian</p>
                <h5 class="card-title">Nama : <?php echo $user['nama']; ?></h5>
                <h5 class="card-title">Tipe Pembelian : <?php echo $tipe_produk; ?></h5>
                <h5 class="card-title">Judul : <?php echo $video['judul_video']; ?></h5>
                <p class="card-text"><?php echo $video['keterangan_video']; ?></p>
                <p class="card-text text-danger">Total: Rp. <?php echo $video['harga_video']; ?></p>
            </div>

            <div class="modal-body">
                <p class="text-dark">Pilihan Pembayaran</p>
                    <div class="form-check">
                        <label class="form-check-label d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="payment" id="bri" value="BRI">
                            <img src="img/bri.png" alt="BRI" class="ml-2 mr-3" style="width: 40px; height: 40px;">
                            2209-0843-0982-098
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <label class="form-check-label d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="payment" id="bni" value="BNI">
                            <img src="img/bni.png" alt="BNI" class="ml-2 mr-3" style="width: 40px; height: 40px;">
                            2201-0810-0790-987
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <label class="form-check-label d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="payment" id="bca" value="BCA">
                            <img src="img/bca.png" alt="BCA" class="ml-2 mr-3" style="width: 40px; height: 40px;">
                            0982-2345-9274-093
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <label class="form-check-label d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="payment" id="mandiri" value="mandiri">
                            <img src="img/mandiri.png" alt="Mandiri" class="ml-2 mr-3" style="width: 40px; height: 40px;">
                            0283-0384-2345-098
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <label class="form-check-label d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="payment" id="dana" value="dana">
                            <img src="img/dana.jpg" alt="Dana" class="ml-2 mr-3" style="width: 40px; height: 40px;">
                            0821-7325-6853
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="bukti_bayar" class="text-dark">Upload Bukti Pembayaran</label>
                        <input type="file" class="form-control-file" id="bukti_bayar" name="bukti_bayar" required>
                    </div>
                    <!-- Hidden fields -->
                    <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>">
                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                    <input type="hidden" name="id_video" value="<?php echo $video['id_video']; ?>">
                    <input type="hidden" name="tgl_transaksi" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="harga" value="<?php echo $video['harga_video']; ?>">
                </form>
            </div>

            <div class="modal-footer"> 
                <button type="button" class="genric-btn default circle" data-dismiss="modal">Tutup</button>
                <button type="submit" id="bayarButton" class="genric-btn danger circle" form="paymentForm">Bayar</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
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
    <!-- untuk menampilkan ketika user klik button Bayar dan diarahkan ke halaman pembelajaran -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var bayarButton = document.getElementById('bayarButton');

        bayarButton.addEventListener('click', function(event) {
            // Tampilkan alert message
            alert('Pesanan berhasil, menunggu konfirmasi Admin');
        });
    });
    </script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/theme.js"></script>
