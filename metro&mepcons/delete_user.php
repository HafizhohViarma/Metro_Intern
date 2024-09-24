<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];

    // Hapus data dari database
    $query = "DELETE FROM users WHERE id_user='$id_user'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Tampilkan alert dan redirect ke halaman user.php
        echo "<script>
                alert('User berhasil dihapus!');
                window.location.href='user.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus user: " . mysqli_error($koneksi) . "');
                window.location.href='user.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID User tidak ditemukan.');
            window.location.href='user.php';
          </script>";
}
?>
