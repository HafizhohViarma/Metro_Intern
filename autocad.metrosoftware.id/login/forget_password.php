<?php
// forget_password.php
session_start();
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
    <title>Lupa Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/flaticon.css" />
    <link rel="stylesheet" href="../css/themify-icons.css" />
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="../https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <style>
    #intro {
      background: url(../img/login.jpeg) no-repeat center;
      background-size: cover;
    }

    /* Gaya card dengan warna latar belakang #002347 dan konten dalam card warna putih */
    .card-custom {
      background-color: #002347;
      border: none;
      padding: 20px;
      border-radius: 8px;
    }

    /* Bagian dalam card (form) warna putih */
    .card-custom .form-container {
      background-color: white;
      border-radius: 8px;
      padding: 20px;
    }

    /* Mengatur ukuran font placeholder */
    ::placeholder {
        font-size: 0.8em; /* Ubah ukuran font sesuai kebutuhan */
        color: #888; /* Ubah warna placeholder jika diinginkan */
    }


    /* Judul login */
    .login {
      color: #002347;
      font-weight: bold;
    }

    .masuk{
      background-color: #002347;
    }
  </style>
  </head>
<body>
<body>
<div id="intro" class="bg-image shadow-2-strong">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-md-8">
            <form class="bg-white rounded shadow-5-strong p-5" method="POST" action="proses_lupa_password.php">
              <div class="d-flex justify-content-center align-items-center mb-2">
                <img src="../img/mepcons_metro_logo.png" alt="Metro Mepcons Logo" style="width:200px; max-width: 100%;">
              </div>
              <?php
                if (isset($_SESSION['message'])) {
                    echo "<div class='alert alert-{$_SESSION['message_type']} mt-2'>{$_SESSION['message']}</div>";
                    unset($_SESSION['message']);
                    unset($_SESSION['message_type']);
                }
                ?>
              <h3 class="login text-center">Lupa Password</h3>
              <!-- Email input -->
              <div class="form-outline mb-4 mt-4" data-mdb-input-init>
                <label class="form-label" for="email">Alamat Email</label>
                <input type="email" id="Email" name="email" class="form-control" placeholder="Masukkan Email Anda"/>
            </div>
            <button class="btn btn-primary btn-block masuk mb-4 " type="submit" name="submit" data-mdb-ripple-init>Kirim Kode OTP</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>