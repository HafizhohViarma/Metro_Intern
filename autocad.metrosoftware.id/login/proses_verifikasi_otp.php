<?php
// proses_verifikasi_otp.php
session_start();
include 'koneksi.php'; // Koneksi ke database

$input_otp = $_POST['otp'];
$email = $_SESSION['email'];

// Cek OTP di database
$query = "SELECT otp FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($input_otp == $row['otp']) {
    $_SESSION['message'] = "Kode OTP benar. Silakan masukkan password baru.";
    $_SESSION['message_type'] = "success";
    header("Location: reset_password.php");
} else {
    $_SESSION['message'] = "Kode OTP salah.";
    $_SESSION['message_type'] = "danger";
    header("Location: verifikasi_otp.php");
}
?>
