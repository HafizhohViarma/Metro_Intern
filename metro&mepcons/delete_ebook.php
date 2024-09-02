<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_ebook = $_GET['id'];

    // Ambil data ebook untuk mendapatkan nama file
    $query = "SELECT sampul_ebook, ebook_file FROM tb_ebook WHERE id_ebook='$id_ebook'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $ebook = mysqli_fetch_assoc($result);

        // Nama file sampul dan file ebook
        $sampul_ebook = $ebook['sampul_ebook'];
        $ebook_file = $ebook['ebook_file'];

        // Hapus data dari database
        $delete_query = "DELETE FROM tb_ebook WHERE id_ebook='$id_ebook'";
        $delete_result = mysqli_query($koneksi, $delete_query);

        if ($delete_result) {
            // Hapus file dari server jika ada
            $sampul_path = 'img/' . $sampul_ebook;
            $file_path = 'files/' . $ebook_file;

            if (!empty($sampul_ebook) && file_exists($sampul_path)) {
                unlink($sampul_path);
            }

            if (!empty($ebook_file) && file_exists($file_path)) {
                unlink($file_path);
            }

            // Redirect ke halaman ebook dengan pesan sukses
            echo "<script>
                    alert('E-Book berhasil dihapus!');
                    window.location.href='ebook.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menghapus E-Book: " . mysqli_error($koneksi) . "');
                    window.location.href='ebook.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('E-Book tidak ditemukan.');
                window.location.href='ebook.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID E-Book tidak ditemukan.');
            window.location.href='ebook.php';
          </script>";
}
?>
