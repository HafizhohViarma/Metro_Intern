<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_testi = $_GET['id'];
    $query = "SELECT * FROM tb_testi WHERE id_testi = '$id_testi'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $testi = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href = 'testi.php';</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $nama_peserta = $_POST['nama_peserta'];
    $testimoni = $_POST['testimoni'];

    // Mengambil file sampul Testimoni baru jika ada
    $profil = $_FILES['profil']['name'];
    $tmp_name = $_FILES['profil']['tmp_name'];
    
    // Menentukan folder penyimpanan file
    $folder = "img/";

    // Jika user upload gambar baru, update dengan gambar baru
    if (!empty($profil)) {
        move_uploaded_file($tmp_name, $folder.$profil);
        $query = "UPDATE tb_testi SET nama_peserta = '$nama_peserta', profil = '$profil', testimoni = '$testimoni' WHERE id_testi = '$id_testi'";
    } else {
        // Jika user tidak upload gambar baru, update tanpa mengubah gambar
        $query = "UPDATE tb_testi SET nama_peserta = '$nama_peserta', testimoni = '$testimoni' WHERE id_testi = '$id_testi'";
    }

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href = 'testimoni_admin.php';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate. Coba lagi!'); window.location.href = 'edit_testi.php?id=$id_testi';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/mepcons_metro_logo.png" type="image/png" />
    <title>Edit Testimoni</title>
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
                            <h2>Edit Testimoni</h2>
                            <a href="testimoni_admin.php">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <form action="edit_testi.php?id=<?php echo $id_testi; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_peserta">Nama Peserta</label>
                <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" value="<?php echo $testi['nama_peserta']; ?>" placeholder="Masukkan Nama Peserta">
            </div>
            <div class="form-group">
                <label for="profil">Profil Peserta</label>
                <input type="file" class="form-control" id="profil" name="profil" accept="image/*">
                <img src="img/<?php echo $testi['profil']; ?>" alt="Sampul" width="100" class="mt-3">
            </div>
            <div class="form-group">
                <label for="testimoni">Deskripsi Testimoni</label>
                <input type="text" class="form-control" id="testimoni" name="testimoni" value="<?php echo $testi['testimoni']; ?>" placeholder="Masukkan Deskripsi Testimoni">
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
