<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_user = $_SESSION['id_user'];
    $id_video = $_POST['id_video']; // Ambil id_video dari form
    $tanggal_transaksi = date('Y-m-d H:i:s');
    $payment = $_POST['payment'];  // Metode pembayaran
    $bukti_bayar = $_FILES['bukti_bayar'];
    $harga = $_POST['harga'];

    // Tentukan tipe produk
    $tipe_produk = 'video';  

    // Ambil nama user dari tabel users
    $query_user = "SELECT nama FROM users WHERE id_user = $id_user";
    $result_user = mysqli_query($koneksi, $query_user);

    if (mysqli_num_rows($result_user) > 0) {
        $user = mysqli_fetch_assoc($result_user);
        $nama_user = $user['nama'];
    } else {
        echo "User tidak ditemukan.";
        exit;
    }

    // Upload bukti pembayaran
    $upload_dir = 'img/';  // Folder untuk menyimpan file
    $upload_file = $upload_dir . basename($bukti_bayar['name']);
    
    if (move_uploaded_file($bukti_bayar['tmp_name'], $upload_file)) {
        // Jika berhasil diupload, simpan data ke database
        $query = "INSERT INTO tb_transaksi (id_user, nama_user, tipe_produk, tgl_transaksi, harga, bukti_bayar, payment, id_video)
                  VALUES ('$id_user', '$nama_user', '$tipe_produk', '$tanggal_transaksi', '$harga', '$upload_file', '$payment', '$id_video')";

        if (mysqli_query($koneksi, $query)) {
            echo "Transaksi berhasil disimpan.";
            header("Location: pembelajaran.php");  // Redirect ke halaman sukses atau yang sesuai
            exit();
        } else {
            echo "Gagal menyimpan transaksi: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal mengupload bukti pembayaran.";
    }
} else {
    echo "Akses tidak valid.";
}
?>
