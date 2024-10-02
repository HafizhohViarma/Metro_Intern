<?php
session_start();
include 'koneksi.php';

// Periksa apakah data feedback telah dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari session dan form
    $id_user = $_SESSION['id_user'];
    $feedback = mysqli_real_escape_string($koneksi, $_POST['feedback']);
    
    // Ambil data user dari tabel users berdasarkan id_user
    $query_user = "SELECT nama, profil FROM users WHERE id_user = $id_user";
    $result_user = mysqli_query($koneksi, $query_user);

    if (mysqli_num_rows($result_user) > 0) {
        $user = mysqli_fetch_assoc($result_user);
        $nama_user = $user['nama'];
        $profil_user = $user['profil'];
        
        // Insert data ke tabel tb_testi
        $query_insert = "INSERT INTO tb_testi (nama_peserta, profil, testimoni) VALUES ('$nama_user', '$profil_user', '$feedback')";
        if (mysqli_query($koneksi, $query_insert)) {
            // Jika berhasil, tampilkan alert dengan JavaScript
            echo "<script>
                    alert('Terima Kasih! Testimoni anda berhasil dikirim');
                    window.location.href = 'belanja.php'; // Redirect ke halaman lain setelah alert
                  </script>";
        } else {
            echo "Gagal mengirim testimoni: " . mysqli_error($koneksi);
        }
    } else {
        echo "User tidak ditemukan.";
    }
} else {
    echo "Invalid request.";
}
?>
