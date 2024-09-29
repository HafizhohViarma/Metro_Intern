<?php
  session_start();

  include 'koneksi.php'; 

  // Cek apakah form telah disubmit
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Ambil data dari form
      $nama = $_POST['nama'];
      $email = $_POST['email'];
      $telp = $_POST['telp'];
      $password = $_POST['password']; 
      $level = 'user'; 

      $password = password_hash($password, PASSWORD_DEFAULT);

      // Masukkan data ke tabel users
      $sql = "INSERT INTO users (nama, email, telp, password, level) VALUES ('$nama' ,'$email','$telp', '$password', '$level')";
      
      if (mysqli_query($koneksi, $sql)) {
          $_SESSION['message'] = "Pendaftaran berhasil! silahkan melakukan login kembali";
          $_SESSION['message_type'] = "success";
          header("Location: login/login-page.php");
          exit();
      } else {
          $_SESSION['message'] = "Pendaftaran gagal: " . mysqli_error($koneksi);
          $_SESSION['message_type'] = "danger";
      }
      

      // Tutup koneksi
      mysqli_close($koneksi);
  }
?>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/mepcons_metro_logo.png" type="image/png" />
    <title>Daftar MepCONS x Metro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <style>
    /* Mengatur latar belakang */
    #intro {
        background: url(img/login.jpeg) no-repeat center center;
        background-size: cover;
    }

    .card-custom {
        background-color: #002347;
        border: none;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan untuk kedalaman */
        margin-bottom: 30px; 
    }

    .card-custom .form-container {
        background-color: white;
        border-radius: 8px;
        padding: 20px;
    }

    /* Mengatur ukuran font placeholder */
    ::placeholder {
        font-size: 0.8em; 
    }


    .container {
        padding: 20px;
    }

    /* Judul login */
    .login {
        color: #002347;
        font-weight: bold;
    }

    .masuk {
        background-color: #002347;
    }
    </style>
  </head>

<body>
<div id="intro" class="bg-image shadow-2-strong">
    <div class="h-100" style="background-color: rgba(0, 0, 0, 0.8);">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5">
            <form class="bg-white rounded shadow-5-strong p-3" method="POST" action="register.php">
              <div class="d-flex justify-content-center align-items-center mb-2 pr-3 pl-3">
                <img src="img/mepcons_metro_logo.png" alt="Metro Mepcons Logo" style="width:150px; max-width: 100%;">
              </div>
              <h3 class="login text-center">Daftar</h3>
              <!-- Nama input -->
              <div class="form-outline mb-2 pr-3 pl-3" data-mdb-input-init>
                <label class="form-label text-dark" for="nama">Nama Lengkap</label>
                <input type="nama" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap Anda"/>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-2 pr-3 pl-3 " data-mdb-input-init>
                <label class="form-label text-dark" for="email">Alamat Email</label>
                <input type="email" id="Email" name="email" class="form-control" placeholder="Contoh:example@gmail.com"/>
              </div>

              <!-- Telpon input -->
              <div class="form-outline mb-2 pr-3 pl-3" data-mdb-input-init>
                <label class="form-label text-dark" for="telp">No. Telp / Telegram</label>
                <input type="telp" id="telp" name="telp" class="form-control" placeholder="Masukkan No.Telp Anda"/>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-2 pr-3 pl-3" data-mdb-input-init>
                <label class="form-label text-dark" for="password">Password</label>
                <input type="password" id="Password" name="password" class="form-control" placeholder="Masukkan Password Anda"/>
              </div>

              <div class="text-right pr-3 pl-3">
                  <!-- Simple link -->
                   <p>Sudah punya akun?
                  <a href="login/login-page.php">Masuk</a></p>
                </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-2">
                <div class="col d-flex justify-content-center">
                </div>
              </div>

              <!-- Submit button -->
              <button class="btn btn-primary btn-block masuk" data-mdb-ripple-init>Daftar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/owl-carousel-thumb.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/theme.js"></script>  
</html>
