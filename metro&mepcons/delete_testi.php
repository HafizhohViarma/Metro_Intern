<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_testi = $_GET['id'];

    // Ambil data testi untuk mendapatkan nama file gambar
    $query = "SELECT profil FROM tb_testi WHERE id_testi='$id_testi'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $testi = mysqli_fetch_assoc($result);

        // Nama file gambar
        $profil = $testi['profil'];

        // Hapus data dari database
        $delete_query = "DELETE FROM tb_testi WHERE id_testi='$id_testi'";
        $delete_result = mysqli_query($koneksi, $delete_query);

        if ($delete_result) {
            // Hapus file gambar dari server jika ada
            $file_path = 'img/' . $profil;

            if (!empty($profil) && file_exists($file_path)) {
                unlink($file_path);
            }

            // Redirect ke halaman testi dengan pesan sukses
            echo "<script>
                    alert('testimoni berhasil dihapus!');
                    window.location.href='testimoni_admin.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menghapus testimoni: " . mysqli_error($koneksi) . "');
                    window.location.href='testimoni_admin.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('testimoni tidak ditemukan.');
                window.location.href='testimoni_admin.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID testimoni tidak ditemukan.');
            window.location.href='testimoni_admin.php';
          </script>";
}
?>
