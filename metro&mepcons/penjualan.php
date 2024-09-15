<?php
    session_start();
    include "koneksi.php";

    $query = "
        SELECT tb_transaksi.*, users.nama AS nama_user
        FROM tb_transaksi
        INNER JOIN users ON tb_transaksi.id_user = users.id_user
        ORDER BY tb_transaksi.id_transaksi DESC
    ";
    $result = mysqli_query($koneksi, $query);

      if (isset($_SESSION['alert_message'])) {
          echo "<div class='alert {$_SESSION['alert_class']}'>";
          echo $_SESSION['alert_message'];
          echo "</div>";
          unset($_SESSION['alert_message']);
          unset($_SESSION['alert_class']);
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
    <title>Penjualan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <style>
  /* Modal Styles */
  .modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
  }
  .modal-content {
    background-color: #fefefe;
    margin: 15% auto; 
    padding: 20px;
    border: 1px solid #888;
    width: 80%; 
  }
  .close-btn {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
  .close-btn:hover,
  .close-btn:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
</style>
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <?php
      include 'navbar_admin.php';
    ?>
    <!--================ End Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area mb-5">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Penjualan</h2>
                <!-- <div class="page_link">
                  <a href="index.php">Home</a>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->
    
    <!--================Start Table Area =================-->

    <div class="container">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pembelian</td>
                <td align="center">User</td>
                <td align="center">Tanggal Transaksi</td>
                <td align="center">Jenis Produk</td>
                <td align="center">Harga</td>
                <td align="center">Metode Pembayaran</td>
                <td align="center">Bukti Pembayaran</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>
        <tbody>
        <?php
                $no = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td align='center'>{$no}</td>";
                    echo "<td align='center'>{$row['id_transaksi']}</td>";
                    echo "<td align='center'>{$row['nama_user']}</td>";
                    echo "<td align='center'>{$row['tgl_transaksi']}</td>";
                    echo "<td align='center'>{$row['tipe_produk']}</td>";
                    echo "<td align='center'>{$row['harga']}</td>";
                    echo "<td align='center'>{$row['payment']}</td>";
                    // echo "<td align='center'><img src='{$row['bukti_bayar']}' width='100'></td>";
                    echo "<td align='center'><img class='bukti-bayar' src='{$row['bukti_bayar']}' width='100'></td>";
                    echo "<td align='center'>";
                    // Cek status transaksi
                    if ($row['status'] === 'konfirmasi') {
                        // Jika statusnya 'konfirmasi', tampilkan tombol 'Selesai'
                        echo "<button class='btn btn-primary' disabled>Selesai</button>";
                      }    elseif ($row['status'] === 'tolak') {
                          echo "<button class='btn btn-danger' disabled>Ditolak</button>";
                        } 
                     else {
                        // Jika belum dikonfirmasi, tampilkan tombol Konfirmasi dan Tolak
                        echo "<form action='konfirmasi_transaksi.php' method='POST'>
                                <input type='hidden' name='id_transaksi' value='{$row['id_transaksi']}'>
                                <button type='submit' name='konfirmasi' class='btn btn-success mb-2'>Konfirmasi</button>
                                <button type='submit' name='tolak' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menolak transaksi ini?\");'>Tolak</button>
                              </form>";
                    }

                    echo "</td>";
                    echo "</tr>";
                    $no++;
                }
            ?>
        </tbody>
    </div>
    <!--================End Table Area =================-->
    <div class="container">
    <div id="buktiModal" class="modal">
      <div class="modal-content">
        <span class="close-btn">&times;</span>
        <img id="modalImage" src="" alt="Bukti Bayar" style="width: 100%;">
      </div>
    </div>
    </div>

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

    <!-- script untuk menampilkan bukti bayar agar bisa dilihat lebih jelas oleh admin -->
    <script>
    //modal
    var modal = document.getElementById("buktiModal");

    // Get the image and insert it inside the modal
    var img = document.getElementsByClassName("bukti-bayar");
    var modalImg = document.getElementById("modalImage");

    for (var i = 0; i < img.length; i++) {
      img[i].onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
      }
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close-btn")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>
  </body>
</html>
