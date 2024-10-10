<?php
session_start();
include "koneksi.php";

// Ambil id_video dari URL
if (isset($_GET['id_video'])) {
    $id_video = $_GET['id_video'];

    // Query untuk mengambil data file video berdasarkan id_video
    $query = "SELECT * FROM video_file WHERE id_video = '$id_video'";
    $result = mysqli_query($koneksi, $query);
} else {
    echo "<script>alert('ID Video tidak ditemukan!'); window.location.href = 'video.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses hapus video
    if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['id_file'])) {
        $id_file_to_delete = $_POST['id_file'];  // Ambil id_file dari form POST
        
        // Query untuk menghapus video dari database
        $query = "DELETE FROM video_file WHERE id_file = '$id_file_to_delete'"; // Gunakan id_file
        $result = mysqli_query($koneksi, $query);
        
        if ($result) {
            echo "<script>alert('Video berhasil dihapus!'); window.location.href = 'video-file.php?id_video=$id_video';</script>";
        } else {
            echo "<script>alert('Gagal menghapus video.');</script>";
        }
    }

    // Pastikan id_video diterima dari form POST untuk upload
    if (isset($_POST['id_video'])) {
        $id_video = $_POST['id_video'];  // Ambil id_video dari form POST

        // Menentukan folder penyimpanan file
        $video_folder = "img/video/";

        // Pastikan $_FILES['video_file'] tidak kosong
        if (!empty($_FILES['video_file']['name'][0])) {
            // Proses multiple file upload
            foreach ($_FILES['video_file']['name'] as $key => $video_file) {
                $tmp_video = $_FILES['video_file']['tmp_name'][$key];
                $video_file_name = basename($video_file);
                $target_file = $video_folder . $video_file_name;

                // Memindahkan file video ke folder tujuan
                if (move_uploaded_file($tmp_video, $target_file)) {
                    // Query untuk menambahkan data video ke database
                    $query = "INSERT INTO video_file (id_video, video_file) VALUES ('$id_video', '$video_file_name')";
                    $result = mysqli_query($koneksi, $query);

                    if (!$result) {
                        echo "<script>alert('Gagal menambahkan video: $video_file_name.');</script>";
                    }
                } else {
                    echo "<script>alert('Gagal mengupload file: $video_file_name.');</script>";
                }
            }

            echo "<script>alert('Video berhasil ditambahkan!'); window.location.href = 'video-file.php?id_video=$id_video';</script>";
        } else {
            echo "<script>alert('Tidak ada file yang diupload.');</script>";
        }
    }

    // Proses tambah sub judul
    if (isset($_POST['sub_judul']) && isset($_POST['id_file'])) {
        $sub_judul = $_POST['sub_judul'];  // Ambil sub_judul dari form POST
        $id_file = $_POST['id_file'];  // Ambil id_file dari form POST

        // Query untuk menambahkan sub_judul
        $query = "UPDATE video_file SET sub_judul = '$sub_judul' WHERE id_file = '$id_file'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>alert('Sub Judul berhasil ditambahkan!'); window.location.href = 'video-file.php?id_video=$id_video';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan sub judul.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="AutoCAD, tutorial AutoCAD, tips AutoCAD, sumber daya desain, software desain, belajar AutoCAD, panduan AutoCAD, Metro Software, kursus AutoCAD">
    <meta name="description" content="Temukan tutorial AutoCAD, tips, dan sumber daya terbaru di Metro Software. Tingkatkan keterampilan desain teknis Anda dengan panduan lengkap dan tips praktis dari para ahli.">
    <link rel="icon" href="img/autocad.png" type="image/png" />
    <title>AutoCAD Tutorial dan Sumber Daya Terbaik - Metro Software</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <!--================Home Banner Area =================-->
    <section class="banner_area mb-5">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Detail List Video</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->


    <!--================Start Table Area =================-->
    <div class="container">
        <div class="mb-3">
            <a href="video.php" class="genric-btn warning circle">Kembali</a>
            <button type="button" class="genric-btn info circle" data-toggle="modal" data-target="#tambahVideoModal">Tambah Video</button>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td align="center">No</td>
                    <td align="center">ID File</td>
                    <td align="center">Sub Judul</td>
                    <td align="center">Video</td>
                    <td align="center">Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td align='center'>{$no}</td>";
                    echo "<td align='center'>{$row['id_file']}</td>";
                    echo "<td align='center'>{$row['sub_judul']}</td>";
                    echo "<td align='center'>
                            <video width='320' height='240' controls>
                                <source src='img/video/{$row['video_file']}' type='video/mp4'>
                                Your browser does not support the video tag.
                            </video>
                          </td>";
                      echo "<td align='center'>
                          <a href='#' class='genric-btn info circle' 
                            data-toggle='modal' 
                            data-target='#tambahSubJudulModal' 
                            onclick='document.getElementById(\"id_file\").value=\"{$row['id_file']}\";'>Tambahkan Sub Judul</a>
                          <br><br>
                          <a href='' class='genric-btn danger circle' onclick='event.preventDefault(); document.getElementById(\"delete-form-{$row['id_file']}\").submit();'>Hapus</a> <!-- Ganti id_video menjadi id_file -->
                          <form id='delete-form-{$row['id_file']}' action='video-file.php?id_video={$id_video}' method='POST' style='display: none;'>
                              <input type='hidden' name='id_file' value='{$row['id_file']}'> <!-- Ganti id_video menjadi id_file -->
                              <input type='hidden' name='action' value='delete'>
                          </form>
                        </td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!--================End Table Area =================-->

    <!-- Modal Tambahkan Video -->
    <div class="modal fade" id="tambahVideoModal" tabindex="-1" role="dialog" aria-labelledby="tambahVideoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="tambahVideoModalLabel">Tambahkan Video</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk upload video -->
                    <form action="video-file.php?id_video=<?php echo $id_video; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="id_video">ID Video (readonly)</label>
                            <input type="text" name="id_video" class="form-control" value="<?php echo $id_video; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="video_file">Upload Video</label>
                            <input type="file" name="video_file[]" class="form-control" multiple required>
                        </div>
                        <button type="submit" class="genric-btn info circle">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="genric-btn default circle" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambahkan Sub Judul -->
<div class="modal fade" id="tambahSubJudulModal" tabindex="-1" role="dialog" aria-labelledby="tambahSubJudulModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="tambahSubJudulModalLabel">Tambahkan Sub Judul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menambahkan sub judul -->
                <form action="video-file.php?id_video=<?php echo $id_video; ?>" method="POST">
                    <div class="form-group">
                        <label for="sub_judul">Sub Judul</label>
                        <input type="text" name="sub_judul" class="form-control" required>
                    </div>
                    <input type="hidden" name="id_file" id="id_file" value="">
                    <button type="submit" class="genric-btn info circle">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="genric-btn default circle" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
