<?php
  session_start();
    include "koneksi.php";

    // Query untuk mengambil data dari tabel tb_video
    $query = "SELECT * FROM tb_video";
    $result = mysqli_query($koneksi, $query);
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
    <title>Upgrade Video</title>
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
                <h2>Daftar Video</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->
    
    <!--================Start Table Area =================-->
    <div class="container">
    <div class="mb-3">
        <a href="tambah_video.php" class="genric-btn info circle">Tambah Video</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Video</td>
                <td align="center">Sampul Video</td>
                <td align="center">Video</td>
                <td align="center">Judul Video</td>
                <td align="center">Deskripsi</td>
                <td align="center">Harga</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td align='center'>{$no}</td>";
                    echo "<td align='center'>{$row['id_video']}</td>";
                    echo "<td align='center'><img src='img/{$row['sampul_video']}' width='100'></td>";
                    echo "<td align='center'>
                    <video width='200' height='150' controls>
                        <source src='img/video/{$row['video_file']}' type='video/mp4'>
                        Your browser does not support the video tag.
                    </video>
                    </td>";
                    echo "<td align='center'>{$row['judul_video']}</td>";
                    echo "<td align='center'>{$row['keterangan_video']}</td>";
                    echo "<td align='center'>{$row['harga_video']}</td>";
                    echo "<td align='center'>
                            <a href='edit_video.php?id={$row['id_video']}' class='btn btn-warning'>Edit</a><br><br>
                            <a href='delete_video.php?id={$row['id_video']}' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus video ini?\");'>Hapus</a>
                          </td>";
                    echo "</tr>";
                    $no++;
                }
            ?>
        </tbody>
        </table>
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
