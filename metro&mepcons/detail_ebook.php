<?php
// Include file koneksi database
session_start();
include 'koneksi.php';

if (isset($_GET['id_ebook'])) {
    $id_ebook = intval($_GET['id_ebook']);
    
    // Ambil data ebook berdasarkan ID
    $query = "SELECT * FROM tb_ebook WHERE id_ebook = $id_ebook";
    $result = $koneksi->query($query);
    
    // Jika data ebook ditemukan
    if (mysqli_num_rows($result) > 0) {
        $ebook = mysqli_fetch_assoc($result);
        $id_ebook = $ebook['id_ebook'];
        $harga = $ebook['harga_ebook'];
        $tipe_produk = 'ebook';
    } else {
        echo "ebook tidak ditemukan.";
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
        echo "ID ebook tidak diberikan.";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/mepcons_metro_logo.png" type="image/png" />
    <title>Detail E-Book</title>
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
    <div class="container mt-5 text-center detail-produk">
        <h1>Detail E-Book</h1>
    </div>
    <div class="card mb-3 container">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="img/<?php echo $ebook['sampul_ebook']; ?>" class="img-fluid rounded-start mt-4 mb-4" alt="<?php echo $ebook['judul_ebook']; ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $ebook['judul_ebook']; ?></h5>
                    <p class="card-text"><?php echo $ebook['deskripsi_ebook']; ?></p>
                    <p class="card-text text-danger">Harga: Rp. <?php echo $ebook['harga_ebook']; ?></p>
                    <p class="card-text"><i class="fas fa-check"></i> E-Book Terpandu</p>
                    <p class="card-text"><i class="fas fa-check"></i> Akses Seumur Hidup</p>
                    <a href="belanja.php" class="genric-btn success circle">Kembali</a>
                    <a href="#" class="genric-btn danger circle" data-toggle="modal" data-target="#modalbeli">
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
                <form id="paymentForm" action="bukti_bayar_ebook.php" method="POST" enctype="multipart/form-data">
                    <p>Detail Pembelian</p>
                    <h5 class="card-title">Nama : <?php echo $user['nama']; ?></h5>
                    <h5 class="card-title">Tipe Pembelian : <?php echo $tipe_produk; ?></h5>
                    <h5 class="card-title">Judul : <?php echo $ebook['judul_ebook']; ?></h5>
                    <p class="card-text"><?php echo $ebook['deskripsi_ebook']; ?></p>
                    <p class="card-text text-danger">Total: Rp. <?php echo $ebook['harga_ebook']; ?></p>
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
                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="payment" id="bni" value="BNI">
                                <img src="img/bni.png" alt="BNI" class="ml-2 mr-3" style="width: 40px; height: 40px;">
                                2201-0810-0790-987
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="payment" id="bca" value="BCA">
                                <img src="img/bca.png" alt="BCA" class="ml-2 mr-3" style="width: 40px; height: 40px;">
                                0982-2345-9274-093
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="payment" id="mandiri" value="mandiri">
                                <img src="img/mandiri.png" alt="Mandiri" class="ml-2 mr-3" style="width: 40px; height: 40px;">
                                0283-0384-2345-098
                            </label>
                        </div>
                        <div class="form-check">
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
                </div>
                        <!-- Hidden fields -->
                        <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>">
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        <input type="hidden" name="tgl_transaksi" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="harga" value="<?php echo $ebook['harga_ebook']; ?>">
                        <input type="hidden" name="id_ebook" value="<?php echo $ebook['id_ebook']; ?>">
                        </form>
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
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/owl-carousel-thumb.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
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
