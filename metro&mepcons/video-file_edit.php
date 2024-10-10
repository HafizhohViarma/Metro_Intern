<?php
session_start();
include "koneksi.php";

// Ambil id_video dari URL
if (isset($_GET['id_video'])) {
    $id_video = $_GET['id_video'];

    // Query untuk mengambil data file video berdasarkan id_video
    $query = "SELECT * FROM video_file WHERE id_video = '$id_video'";
    $result = mysqli_query($koneksi, $query);
    $video_data = mysqli_fetch_assoc($result);

    if (!$video_data) {
        echo "<script>alert('Data video tidak ditemukan!'); window.location.href = 'video.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID Video tidak ditemukan!'); window.location.href = 'video.php';</script>";
    exit;
}

// Proses update video
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_video = $_POST['id_video']; // Ambil id_video dari form POST
    $video_file_name = $_FILES['video_file']['name'];
    $video_folder = "img/video/";

    // Jika file video baru diupload
    if (!empty($video_file_name)) {
        $tmp_video = $_FILES['video_file']['tmp_name'];
        $target_file = $video_folder . basename($video_file_name);

        // Memindahkan file video ke folder tujuan
        if (move_uploaded_file($tmp_video, $target_file)) {
            // Query untuk mengupdate data video di database
            $query = "UPDATE video_file SET video_file = '$video_file_name' WHERE id_video = '$id_video'";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                echo "<script>alert('Video berhasil diperbarui!'); window.location.href = 'video-file.php?id_video=$id_video';</script>";
            } else {
                echo "<script>alert('Gagal memperbarui video.');</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload file: $video_file_name.');</script>";
        }
    } else {
        // Jika tidak ada file baru, tetap perbarui informasi lain jika diperlukan
        echo "<script>alert('Tidak ada file baru yang diupload.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/autocad.png" type="image/png" />
    <title>Edit Video - Metro Software</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <section class="banner_area mb-5">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Edit Video</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="mb-3">
            <a href="video.php" class="genric-btn warning circle">Kembali</a>
        </div>

        <form action="video-file_edit.php?id_video=<?php echo $id_video; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_video" value="<?php echo $video_data['id_video']; ?>">
            <div class="form-group">
                <label for="video_file">Upload Video Baru (opsional)</label>
                <input type="file" name="video_file" class="form-control" accept="video/mp4">
            </div>
            <button type="submit" class="btn btn-primary">Update Video</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
