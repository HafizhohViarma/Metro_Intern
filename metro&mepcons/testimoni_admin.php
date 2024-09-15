<?php
    session_start();
    include 'koneksi.php';

    $query = "SELECT * FROM tb_testi";
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
    <title>Testimoni</title>
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
                <h2>Testimoni</h2>
                <!-- <div class="page_link">
                  <a href="index.php">Home</a>
                  <a href="ebook.php">Video</a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->
    
    <!--================Start Table Area =================-->
    <div class="container">
    <div class="mt-3 mb-3">
    <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            // Hapus session agar tidak muncul lagi setelah di-refresh
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
            ?>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <a href="tambah_testi.php" class="genric-btn info circle">Tambah Testimoni</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Testimoni</td>
                <td align="center">Nama Peserta</td>
                <td align="center">Profil</td>
                <td align="center">Testimoni</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>
        <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td align='center'>" . $no++ . "</td>";
                    echo "<td align='center'>" . $row['id_testi'] . "</td>";
                    echo "<td align='center'>" . $row['nama_peserta'] . "</td>";
                    echo "<td align='center'>" . $row['profil'] . "</td>";
                    echo "<td align='center'>" . $row['testimoni'] . "</td>";
                    echo "<td align='center'>
                            <a href='edit_testi.php?id=" . $row['id_testi'] . "' class='btn btn-warning mb-2'>Edit</a>
                            <a href='delete_testi.php?id=" . $row['id_testi'] . "' class='btn btn-danger' onclick=\"return confirm('Anda yakin ingin menghapus Testimoni ini?')\">Hapus</a>
                          </td>";
                    echo "</tr>";
                }
                ?> 
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
