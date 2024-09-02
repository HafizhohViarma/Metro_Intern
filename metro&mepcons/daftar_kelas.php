<?php
  session_start();
  include 'koneksi.php';

  $id_user = $_SESSION['id_user'];

  // syntax untuk menampilkan 1 data di bagian atas halaman
  $query_top = "SELECT * FROM tb_kelas ORDER BY id_kelas ASC LIMIT 1";
  $result_top = mysqli_query($koneksi, $query_top);
  $top_class = mysqli_fetch_assoc($result_top);

  //query untuk mengambil semua data untuk ditampilkan
  $query = "SELECT * FROM tb_kelas ORDER BY id_kelas ASC";
  $result = mysqli_query($koneksi, $query);
  
  $query_user = "
    SELECT users.nama, tb_transaksi.tipe_produk, tb_kelas.judul_kelas, tb_kelas.deskripsi_kelas, tb_kelas.harga_kelas, tb_kelas.id_kelas
    FROM users 
    JOIN tb_transaksi ON users.id_user = tb_transaksi.id_user
    JOIN tb_kelas ON tb_transaksi.id_kelas = tb_kelas.id_kelas 
    WHERE tb_transaksi.tipe_produk = 'kelas' 
    AND users.id_user = $id_user
  ";

  $result_user = mysqli_query($koneksi, $query_user);
  $user_data = mysqli_fetch_assoc($result_user);

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
    <title>Daftar Kelas Sekarang</title>
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
    <!--================ End Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Daftar Kelas</h2>
                <div class="page_link">
                  <a href="index.php">Home</a>
                  <a href="courses.html">Detail Kelas</a>
                  <a href="#">Daftar Kelas</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="img/courses/course-details.jpg" alt="">
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title">Tujuan</h4>
                        <div class="content">
                            <?php echo $top_class['deskripsi_kelas']; ?>
                            <br>
                        </div>

                        <h4 class="title">Daftar Kelas lainnya</h4>
                        <div class="content">
                            <ul class="course_list">
                                <?php while($kelas = mysqli_fetch_assoc($result)) { ?>
                                  <li class="justify-content-between d-flex">
                                      <p><?php echo $kelas['judul_kelas']; ?></p>
                                      <a class="primary-btn text-uppercase" href="detail_kelas.php?id_kelas=<?php echo $kelas['id_kelas']?>">View Details</a>
                                  </li>
                                <?php } ?>
                            </ul>
                        </div>
                </div>
                </div>

                <div class="col-lg-4 right-contents">
                    <ul>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Judul Kelas</p>
                                <span class="or"><?php echo $top_class['judul_kelas']; ?></span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Harga Kelas</p>
                                <span class="text-danger"><?php echo $top_class['harga_kelas']; ?></span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Jadwal Kelas</p>
                                <span><?php echo $top_class['jadwal']; ?></span>
                            </a>
                        </li>
                    </ul>
                    <a href="#modal-daftar" data-toggle=modal class="primary-btn ml-sm-1 ml-0" data-target=#modal-daftar>
                      <i class="bi bi-plus"></i> Daftar Kelas
                    </a>

                        <div class="feedeback">
                            <h6>Your Feedback</h6>
                            <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                            <div class="mt-10 text-right">
                                <a href="#" class="primary-btn2 text-right rounded-0 text-white">Submit</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->
    <div class="modal fade" id="modal-daftar" tabindex="-1" role="dialog" aria-labelledby="modalDaftarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDaftarLabel">Konfirmasi Pendaftaran</h5>
                </div>
                <div class="modal-body">
                <form id="paymentForm" action="bukti_bayar_kelas.php" method="POST" enctype="multipart/form-data">
                    <p>Detail Pendaftaran</p>
                    <h5 class="card-title">Nama : <?php echo $user_data['nama']; ?></h5>
                    <h5 class="card-title">Tipe Pembelian : <?php echo $user_data['tipe_produk']; ?></h5>
                    <h5 class="card-title">Judul : <?php echo $user_data['judul_kelas']; ?></h5>
                    <p class="card-text"><?php echo $user_data['deskripsi_kelas']; ?></p>
                    <p class="card-text text-danger">Total: Rp. <?php echo $user_data['harga_kelas']; ?></p>
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
                        <input type="hidden" name="id_kelas" value="<?php echo $user_data['id_kelas']; ?>">
                        <input type="hidden" name="tgl_transaksi" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="harga" value="<?php echo $user_data['harga_kelas']; ?>">
                </form>
                <div class="modal-footer"> 
                    <button type="button" class="genric-btn default circle" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="bayarButton" class="genric-btn danger circle" form="paymentForm">Bayar</button>
                </div>
            </div>
        </div>
    </div>

    <!--================ Start footer Area  =================-->
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
          <!--================ End footer Area  =================-->
      
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
        </body>
      </html>