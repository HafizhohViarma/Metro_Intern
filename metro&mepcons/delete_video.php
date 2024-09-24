<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_video = $_GET['id'];

    // Ambil nama file gambar dari database
    $query = "SELECT sampul_video FROM tb_video WHERE id_video='$id_video'";
    $result = mysqli_query($koneksi, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $sampul_video = $row['sampul_video'];

        // Hapus data dari database
        $query_delete = "DELETE FROM tb_video WHERE id_video='$id_video'";
        $result_delete = mysqli_query($koneksi, $query_delete);

        if ($result_delete) {
            // Hapus foto dari folder img/
            if (file_exists("img/$sampul_video")) {
                unlink("img/$sampul_video");
            }

            // Redirect ke halaman video dengan pesan sukses
            echo "<script>
                    alert('Video berhasil dihapus!');
                    window.location.href='video.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menghapus video: " . mysqli_error($koneksi) . "');
                    window.location.href='video.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Video tidak ditemukan.');
                window.location.href='video.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID video tidak ditemukan.');
            window.location.href='video.php';
          </script>";
}
?>
