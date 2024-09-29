<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_kelas = $_GET['id'];
    $query = "SELECT * FROM tb_kelas WHERE id_kelas = '$id_kelas'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $kelas = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href = 'kelas.php';</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $judul_kelas = $_POST['judul_kelas'];
    $deskripsi_kelas = $_POST['deskripsi_kelas'];
    $harga_kelas = $_POST['harga_kelas'];
    $jadwal = $_POST['jadwal'];

    // Mengambil file sampul kelas baru jika ada
    $sampul_kelas = $_FILES['sampul_kelas']['name'];
    $tmp_name = $_FILES['sampul_kelas']['tmp_name'];
    
    // Menentukan folder penyimpanan file
    $folder = "img/";

    // Jika user upload gambar baru, update dengan gambar baru
    if (!empty($sampul_kelas)) {
        move_uploaded_file($tmp_name, $folder.$sampul_kelas);
        $query = "UPDATE tb_kelas SET judul_kelas = '$judul_kelas', deskripsi_kelas = '$deskripsi_kelas', sampul_kelas = '$sampul_kelas', harga_kelas = '$harga_kelas', jadwal = '$jadwal' WHERE id_kelas = '$id_kelas'";
    } else {
        // Jika user tidak upload gambar baru, update tanpa mengubah gambar
        $query = "UPDATE tb_kelas SET judul_kelas = '$judul_kelas', deskripsi_kelas = '$deskripsi_kelas', harga_kelas = '$harga_kelas', jadwal = '$jadwal' WHERE id_kelas = '$id_kelas'";
    }

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href = 'kelas.php';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate. Coba lagi!'); window.location.href = 'edit_kelas.php?id=$id_kelas';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/mepcons_metro_logo.png" type="image/png" />
    <title>Edit Kelas</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
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
                            <h2>Edit Kelas</h2>
                            <a href="kelas.php">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <form action="edit_kelas.php?id=<?php echo $id_kelas; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="sampul_kelas">Sampul Kelas</label>
                <input type="file" class="form-control" id="sampul_kelas" name="sampul_kelas" accept="image/*">
                <img src="img/<?php echo $kelas['sampul_kelas']; ?>" alt="Sampul" width="100" class="mt-3">
            </div>
            <div class="form-group">
                <label for="judul_kelas">Judul Kelas</label>
                <input type="text" class="form-control" id="judul_kelas" name="judul_kelas" value="<?php echo $kelas['judul_kelas']; ?>" placeholder="Masukkan Judul">
            </div>
            <div class="form-group">
                <label for="deskripsi_kelas">Deskripsi Kelas</label>
                <input type="text" class="form-control" id="deskripsi_kelas" name="deskripsi_kelas" value="<?php echo $kelas['deskripsi_kelas']; ?>" placeholder="Masukkan Deskripsi">
            </div>
            <div class="form-group">
                <label for="jadwal">Jadwal Kelas</label>
                <input type="text" class="form-control" id="jadwal" name="jadwal" value="<?php echo $kelas['jadwal']; ?>" placeholder="Misal :  ( Senin, 14.00 - 15.00 WIB )">
            </div>
            <div class="form-group">
                <label for="harga_kelas">Harga</label>
                <input type="text" class="form-control" id="harga_kelas" name="harga_kelas" value="<?php echo $kelas['harga_kelas']; ?>" placeholder="Masukkan Harga">
            </div>
            <div class="mb-3">
                <button type="submit" class="genric-btn info circle">Update</button>
            </div>
        </form>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/theme.js"></script>
</body>
</html>
