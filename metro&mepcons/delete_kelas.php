<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_kelas = $_GET['id'];

    // Ambil data kelas untuk mendapatkan nama file gambar
    $query = "SELECT sampul_kelas FROM tb_kelas WHERE id_kelas='$id_kelas'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $kelas = mysqli_fetch_assoc($result);

        // Nama file gambar
        $sampul_kelas = $kelas['sampul_kelas'];

        // Hapus data dari database
        $delete_query = "DELETE FROM tb_kelas WHERE id_kelas='$id_kelas'";
        $delete_result = mysqli_query($koneksi, $delete_query);

        if ($delete_result) {
            // Hapus file gambar dari server jika ada
            $file_path = 'img/' . $sampul_kelas;

            if (!empty($sampul_kelas) && file_exists($file_path)) {
                unlink($file_path);
            }

            // Redirect ke halaman kelas dengan pesan sukses
            echo "<script>
                    alert('Kelas berhasil dihapus!');
                    window.location.href='kelas.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menghapus kelas: " . mysqli_error($koneksi) . "');
                    window.location.href='kelas.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Kelas tidak ditemukan.');
                window.location.href='kelas.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID Kelas tidak ditemukan.');
            window.location.href='kelas.php';
          </script>";
}
?>
