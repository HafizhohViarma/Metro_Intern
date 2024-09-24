<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $status = '';

    // Cek apakah admin memilih konfirmasi atau tolak
    if (isset($_POST['konfirmasi'])) {
        $status = 'selesai'; // Status diubah menjadi 'selesai' setelah dikonfirmasi
        $_SESSION['alert_message'] = 'Transaksi berhasil dikonfirmasi!';
        $_SESSION['alert_class'] = 'alert-success';
    } elseif (isset($_POST['tolak'])) {
        $status = 'tolak'; // Status diubah menjadi 'ditolak'
        $_SESSION['alert_message'] = 'Transaksi berhasil ditolak!';
        $_SESSION['alert_class'] = 'alert-danger';
    }

    // Update status transaksi di database
    if ($status) {
        $query = "UPDATE tb_transaksi SET status = '$status' WHERE id_transaksi = $id_transaksi";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Redirect kembali ke halaman penjualan setelah berhasil memperbarui
            echo '<meta http-equiv="refresh" content="0; url=penjualan.php">';
            exit;
        } else {
            // Jika terjadi error saat update, tampilkan pesan error
            $_SESSION['alert_message'] = 'Gagal memperbarui transaksi: ' . mysqli_error($koneksi);
            $_SESSION['alert_class'] = 'alert-danger';
            echo '<meta http-equiv="refresh" content="0; url=penjualan.php">';
            exit;
        }
    }
}
?>
