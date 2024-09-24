<?php
// Include file koneksi database
session_start();
include 'koneksi.php';

if (isset($_GET['id_kelas'])) {
    $id_kelas = intval($_GET['id_kelas']);
    
    // Ambil data kelas berdasarkan ID
    $query = "SELECT * FROM tb_kelas WHERE id_kelas = $id_kelas";
    $result = $koneksi->query($query);
    
    // Jika data kelas ditemukan
    if (mysqli_num_rows($result) > 0) {
        $kelas = mysqli_fetch_assoc($result);
        $id_kelas = $kelas['id_kelas'];
        $harga = $kelas['harga_kelas'];
        $tipe_produk = 'kelas';
    } else {
        echo "kelas tidak ditemukan.";
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
        echo "ID kelas tidak diberikan.";
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
    <title>Detail Kelas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
<body>
<header class="header_area white-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="index.php">
              <img src="img/mepcons_metro_logo.png" alt="" style="width: 160px;"/>
            </a>
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
              <li class="nav-item">
                <a class="nav-link" href="#">Daftar Kelas</a>
              </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Detail Kelas</h2>
                <div class="page_link">
                  <a href="index.php">Home</a>
                  <a href="daftar_kelas.php">Lihat kelas lainnya</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="course_details_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img src="img/<?php echo $kelas['sampul_kelas']; ?>" class="img-fluid rounded-start" alt="<?php echo $kelas['judul_kelas']; ?>" style="width: 800px; height: 400px;">
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title">Tujuan</h4>
                        <div class="content">
                        <?php echo $kelas['deskripsi_kelas']; ?>
                        </div>
                </div>
                </div>

                <div class="col-lg-4 right-contents">
                    <ul>
                        <li>
                            <a class="justify-content-between d-flex " href="#">
                                <p>Judul Kelas</p>
                                <span class="or"><?php echo $kelas['judul_kelas']; ?></span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Harga Kelas</p>
                                <span class="text-danger"><?php echo $kelas['harga_kelas']; ?></span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Jadwal Kelas</p>
                                <span><?php echo $kelas['jadwal']; ?></span>
                            </a>
                        </li>
                    </ul>
                    <a href="#" data-toggle=modal class="primary-btn ml-sm-1 ml-0" data-target=#modalbeli>
                      <i class="bi bi-plus"></i> Daftar Kelas
                    </a>

                        <div class="feedeback">
                            <h6>Your Feedback</h6>
                            <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                            <div class="mt-10 text-right">
                                <a href="#" class="primary-btn2 text-right rounded-0 text-white">Submit</a>
                            </div>
                            <div class="mt-5 text-right">
                                <a href="daftar_kelas.php" class="primary-btn text-right rounded-0 bi-arrow-right">Daftar Kelas lainnya</a>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    


    <!-- modal -->
    <div class="modal fade" id="modalbeli" tabindex="-1" role="dialog" aria-labelledby="modalbeliLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalbeliLabel">Konfirmasi Pendaftaran</h5>
                </div>
                <div class="modal-body">
                <form id="paymentForm" action="bukti_bayar_kelas.php" method="POST" enctype="multipart/form-data">
                    <p>Detail Pendaftaran</p>
                    <h5 class="card-title">Nama : <?php echo $user['nama']; ?></h5>
                    <h5 class="card-title">Tipe Pembelian : <?php echo $tipe_produk; ?></h5>
                    <h5 class="card-title">Judul : <?php echo $kelas['judul_kelas']; ?></h5>
                    <p class="card-text">Jadwal Kelas : <?php echo $kelas['jadwal']; ?></p>
                    <p class="card-text"><?php echo $kelas['deskripsi_kelas']; ?></p>
                    <p class="card-text text-danger">Total: Rp. <?php echo $kelas['harga_kelas']; ?></p>
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
                                <img src="img/mandiri.png" alt="BSI" class="ml-2 mr-3" style="width: 40px; height: 40px;">
                                0283-0384-2345-098
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="payment" id="dana" value="dana">
                                <img src="img/dana.jpg" alt="dana" class="ml-2 mr-3" style="width: 40px; height: 40px;">
                                0821-7325-6853
                            </label>
                        </div>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="bukti_bayar" class="text-dark">Upload Bukti Pembayaran</label>
                            <input type="file" class="form-control-file" id="bukti_bayar" name="bukti_bayar" required>
                        </div>
                </div>
                    <!-- Hidden fields -->
                    <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>">
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        <input type="hidden" name="id_kelas" value="<?php echo $kelas['id_kelas']; ?>">
                        <input type="hidden" name="tgl_transaksi" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="harga" value="<?php echo $kelas['harga_kelas']; ?>">
                </form>
                <div class="modal-footer"> 
                    <button type="button" class="genric-btn default circle" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="bayarButton" class="genric-btn danger circle" form="paymentForm">Bayar</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-area section_gap">
      <div class="container">
        <div>
          <h4 class="text-white">Hubungi Kami</h4>
          <p>metroindo.software@gmail.com | +62 822-8960-8096 | @metrosoftware</p>
        </div>
        <div class="row footer-bottom d-flex justify-content-between">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by Metro Indonesian Software
          </p>
          <div class="col-lg-4 col-sm-12 footer-social">
            <p>Follow Us</p>
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-twitter"></i></a>
            <a href="#"><i class="ti-dribbble"></i></a>
            <a href="#"><i class="ti-linkedin"></i></a>
          </div>
        </div>
      </div>
    </footer>
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
