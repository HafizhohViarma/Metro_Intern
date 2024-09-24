<?php
session_start();
include '../koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Cek apakah data yang diinputkan sesuai dengan yang ada di database
$query = "SELECT * FROM users WHERE email='$email'";
$users = mysqli_query($koneksi, $query);

// Cek jumlah data yang sesuai
if(mysqli_num_rows($users) > 0) {
    $data = mysqli_fetch_array($users);

    // Verifikasi password yang diinputkan dengan hash password di database
    if (password_verify($password, $data['password'])) {

        // Set session berdasarkan level pengguna
        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['level'] = $data['level'];

        // Redirect sesuai level
        if($data['level'] == "admin") {
            header("Location: ../video.php");
        } else {
            header("Location: ../index.php");
        }
        exit;
    } else {
        echo "<script>
            alert('Email atau password salah');
            window.location.href='login-page.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Email atau password salah');
        window.location.href='login-page.php';
    </script>";
}
