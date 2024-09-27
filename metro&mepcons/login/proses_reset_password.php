<?php
// proses_reset_password.php
session_start();
include 'koneksi.php'; // Koneksi ke database

$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$email = $_SESSION['email'];

if ($password == $confirm_password) {
    // Update password di database (gunakan hash untuk keamanan)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";
    mysqli_query($conn, $query);

    $_SESSION['message'] = "Password berhasil direset.";
    $_SESSION['message_type'] = "success";
    header("Location: login.php");
} else {
    $_SESSION['message'] = "Password tidak cocok.";
    $_SESSION['message_type'] = "danger";
    header("Location: reset_password.php");
}
?>
