<?php
include "koneksi.php";

// Ambil ID pengguna dari parameter URL
$id_user = $_GET['id'];

// Ambil data pengguna dari database berdasarkan ID
$query = "SELECT * FROM users WHERE id_user = '$id_user'";
$result = mysqli_query($koneksi, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    // $password = $_POST['password'];
    $level = $_POST['level'];

    // Update data pengguna di database
    $query = "UPDATE users SET nama = '$nama', email = '$email', telp = '$telp', level = '$level' WHERE id_user = '$id_user'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Set session untuk alert
        $_SESSION['message'] = "Pengguna berhasil diperbarui!";
        $_SESSION['message_type'] = "success";
        header("Location: user.php");
        exit();
    } else {
        $_SESSION['message'] = "Gagal memperbarui pengguna: " . mysqli_error($koneksi);
        $_SESSION['message_type'] = "danger";
        header("Location: user.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/mepcons_metro_logo.png" type="image/png" />
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header class="header_area white-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="index_admin.php">
                        <img class="logo-2" src="img/mepcons_metro_logo.png" alt="" style="width: 160px;" />
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <section class="banner_area mb-5">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Edit Pengguna</h2>
                            <a href="user.php">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="nama" name="nama" class="form-control" id="nama" value="<?php echo $user['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telp">No. Telp / Telegram</label>
                <input type="telp" name="telp" class="form-control" id="telp" value="<?php echo $user['telp']; ?>" required>
            </div>
            <!-- <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" value="<?php echo $user['password']; ?>" required>
            </div> -->
            <div class="form-group d-flex align-items-center mt-4">
                <label for="level" class="mr-3">Pilih Master User</label>
                <select id="level" name="level" class="form-control">
                    <option value="admin" <?php echo ($user['level'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="user" <?php echo ($user['level'] == 'user') ? 'selected' : ''; ?>>User</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="genric-btn info circle">Update</button>
            </div>
        </form>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/owl-carousel-thumb.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/theme.js"></script>
</body>
</html>
