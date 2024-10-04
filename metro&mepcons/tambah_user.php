<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $password = $_POST['password'];
    $profil = $_POST['profil'];
    $level = $_POST['level'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan data ke database
    $query = "INSERT INTO users (nama, email, telp, profil, password, level) VALUES ('$nama','$email', '$telp', '$profil','$password', '$level')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Set session untuk alert
        $_SESSION['message'] = "Pengguna berhasil ditambahkan!";
        $_SESSION['message_type'] = "success"; // Jenis alert
        header("Location: user.php");
        exit();
    } else {
        $_SESSION['message'] = "Gagal menambahkan pengguna: " . mysqli_error($koneksi);
        $_SESSION['message_type'] = "danger"; // Jenis alert
        header("Location: user.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/mepcons_metro_logo.png" type="image/png" />
    <title>Tambah Users</title>
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
    
    <!--================ End Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area mb-5">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Tambah Pengguna</h2>
                            <a href="user.php">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Start Table Area =================-->
    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="nama" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required />
            </div>
            <div class="form-group">
                <label for="profil">Profil (Foto Profil)</label>
                <input type="file" name="profil" class="form-control" id="profil" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" required />
            </div>
            <div class="form-group">
                <label for="telp">No. Telp / Telegram</label>
                <input type="telp" name="telp" class="form-control" id="telp" placeholder="Masukkan No.Telp (terhubung Telegram)" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password" required />
            </div>
            <div class="form-group">
            <label for="level" class="ml-3">Pilih Level User</label>
                <select id="level" name="level" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="genric-btn info circle mt-5">Tambah</button>
            </div>
        </form>
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
