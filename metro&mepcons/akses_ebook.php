<?php
session_start();
include 'koneksi.php'; 

if (isset($_GET['id_ebook'])) {
    $id_ebook = $_GET['id_ebook'];

    // Query untuk mendapatkan file PDF berdasarkan ID
    $query = "
        SELECT ebook_file
        FROM tb_ebook
        WHERE id_ebook = '$id_ebook'
    ";
    
    $result = mysqli_query($koneksi, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $file = $row['ebook_file'];
        
        // Tentukan path file PDF
        $filePath = 'files/' . $file;
        
        if (file_exists($filePath)) {
            // Set header untuk membuka file PDF di browser
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . $file . '"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);
            exit;
        } else {
            echo "File tidak ditemukan.";
        }
    } else {
        echo "ID ebook tidak valid.";
    }
} else {
    echo "ID ebook tidak diberikan.";
}
?>
