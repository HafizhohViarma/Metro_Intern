<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $status = '';

    if (isset($_POST['konfirmasi'])) {
        $status = 'konfirmasi';
        echo "<script>alert('Transaksi berhasil diperbarui, data sudah di akses user !');</script>";
    } elseif (isset($_POST['tolak'])) {
        $status = 'tolak';
        echo "<script>alert('Transaksi berhasil ditolak!');</script>";
        
        // Hapus data transaksi jika ditolak
        $delete_query = "DELETE FROM tb_transaksi WHERE id_transaksi = $id_transaksi";
        $delete_result = mysqli_query($koneksi, $delete_query);

        if ($delete_result) {
            echo "<script>alert('Transaksi berhasil dihapus');</script>";
            echo '<meta http-equiv="refresh" content="0; url=penjualan.php">';
            exit;
        } else {
            echo "<script>alert('Gagal menghapus transaksi: " . mysqli_error($koneksi) . "');</script>";
            echo '<meta http-equiv="refresh" content="0; url=penjualan.php">';
            exit;
        }
    }

    if ($status && $status !== 'tolak') {
        // Update status transaksi jika tidak ditolak
        $query = "UPDATE tb_transaksi SET status = '$status' WHERE id_transaksi = $id_transaksi";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Jika berhasil, beri pesan dan redirect
            echo "<script>alert('Transaksi berhasil diperbarui');</script>";
            echo '<meta http-equiv="refresh" content="0; url=penjualan.php">';
        } else {
            // Jika gagal, beri pesan error
            echo "<script>alert('Gagal memperbarui transaksi: " . mysqli_error($koneksi) . "');</script>";
            echo '<meta http-equiv="refresh" content="0; url=penjualan.php">';
        }
    }
}
?>
