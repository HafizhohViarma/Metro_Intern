<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $status = '';

    if (isset($_POST['konfirmasi'])) {
        $status = 'konfirmasi';
        echo "<script>alert('Transaksi berhasil diperbarui, data sudah diakses user!');</script>";
    } elseif (isset($_POST['tolak'])) {
        $status = 'tolak';
        echo "<script>alert('Transaksi berhasil ditolak!');</script>";
    }

    // Update status transaksi (baik konfirmasi atau tolak)
    if ($status) {
        $query = "UPDATE tb_transaksi SET status = '$status' WHERE id_transaksi = $id_transaksi";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Jika berhasil, beri pesan dan redirect ke halaman penjualan
            echo "<script>alert('Transaksi berhasil diperbarui');</script>";
            echo '<meta http-equiv="refresh" content="0; url=penjualan.php">';
        } else {
            echo "<script>alert('Gagal memperbarui transaksi: " . mysqli_error($koneksi) . "');</script>";
            echo '<meta http-equiv="refresh" content="0; url=penjualan.php">';
        }
        exit;
    }
}
?>
