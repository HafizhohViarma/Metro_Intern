<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_video = $_GET['id'];
    $query = "SELECT * FROM tb_video WHERE id_video = '$id_video'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $video = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href = 'video.php';</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $judul_video = $_POST['judul_video'];
    $keterangan_video = $_POST['keterangan_video'];
    $harga_video = $_POST['harga_video'];

    // Mengambil file sampul video baru jika ada
    $sampul_video = $_FILES['sampul_video']['name'];
    $tmp_sampul = $_FILES['sampul_video']['tmp_name'];
    
    // Menentukan folder penyimpanan file
    $folder = "img/";

    // Mulai query update
    $query = "UPDATE tb_video SET 
              judul_video = '$judul_video', 
              keterangan_video = '$keterangan_video', 
              harga_video = '$harga_video'";

    // Update dengan sampul baru jika ada
    if (!empty($sampul_video)) {
        // Pindahkan file sampul ke folder yang ditentukan
        move_uploaded_file($tmp_sampul, $folder.$sampul_video);
        $query .= ", sampul_video = '$sampul_video'";
    }

    // Tambahkan kondisi WHERE untuk menentukan video yang diupdate
    $query .= " WHERE id_video = '$id_video'";

    // Eksekusi query update
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href = 'video.php';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate. Coba lagi!'); window.location.href = 'edit_video.php?id=$id_video';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/mepcons_metro_logo.png" type="image/png" />
    <title>Edit Video</title>
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
                            <a href="video.php">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <form action="edit_video.php?id=<?php echo $id_video; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="sampul_video">Sampul Video</label>
                <input type="file" class="form-control" id="sampul_video" name="sampul_video" accept="image/*">
                <img src="img/<?php echo $video['sampul_video']; ?>" alt="Sampul" width="100" class="mt-3">
            </div>
            <div class="form-group">
                <label for="judul_video">Judul Video</label>
                <input type="text" class="form-control" id="judul_video" name="judul_video" value="<?php echo $video['judul_video']; ?>" placeholder="Masukkan Judul" required>
            </div>
            <div class="form-group">
                <label for="keterangan_video">Deskripsi Video</label>
                <input type="text" class="form-control" id="keterangan_video" name="keterangan_video" value="<?php echo $video['keterangan_video']; ?>" placeholder="Masukkan Deskripsi" required>
            </div>
            <div class="form-group">
                <label for="harga_video">Harga</label>
                <input type="text" class="form-control" id="harga_video" name="harga_video" value="<?php echo $video['harga_video']; ?>" placeholder="Masukkan Harga" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="genric-btn info circle">Update</button>
            </div>
        </form>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
