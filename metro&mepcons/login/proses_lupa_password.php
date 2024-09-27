<?php
session_start();
include '../koneksi.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    echo "Email yang dimasukkan: " . $email; // Debug email yang dimasukkan

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Email ditemukan di database"; // Debug pesan jika email ditemukan
        $otp = rand(100000, 999999);
        // $otp_expiration = date("Y-m-d H:i:s", strtotime("+3 minutes"));

        $update_query = "UPDATE users SET otp='$otp', otp_expiration='$otp_expiration' WHERE email='$email'";
        mysqli_query($koneksi, $update_query);

        // Konfigurasi PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'viarmahafizhoh@gmail.com'; // Ganti dengan email kamu
            $mail->Password = 'Hafizahviarma18'; // Ganti dengan password email kamu
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->SMTPDebug = 2; // Atau 3 untuk informasi lebih detail
            $mail->Debugoutput = 'html'; // Output debug dalam format HTML


            // Pengirim
            $mail->setFrom('viarmahafizhoh@gmail.com', 'Metro Mepcons');

            // Penerima
            $mail->addAddress($email);

            // Konten Email
            $mail->isHTML(true);
            $mail->Subject = 'VERIFICATION OTP METRO x MEPCONS';
            $mail->Body    = "Kode OTP Anda adalah: $otp";

            $mail->send();
            $_SESSION['message'] = "OTP telah dikirim ke email Anda.";
            $_SESSION['message_type'] = "success";
            header("Location: verifikasi_otp.php");
            exit; // Tambahkan exit setelah header redirect
        } catch (Exception $e) {
            $_SESSION['message'] = "Gagal mengirim OTP. Mailer Error: {$mail->ErrorInfo}";
            $_SESSION['message_type'] = "danger";
            header("Location: forget_password.php");
            exit; // Tambahkan exit setelah header redirect
        }
    } else {
        $_SESSION['message'] = "Email tidak ditemukan.";
        $_SESSION['message_type'] = "danger";
        header("Location: forget_password.php");
        exit; // Tambahkan exit setelah header redirect
    }
}
?>
