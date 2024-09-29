<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header("Location: index.php"); 
        exit;
    }
    if (isset($_SESSION['message'])) {
      echo "<div class='alert alert-{$_SESSION['message_type']}'>";
      echo $_SESSION['message'];
      echo "</div>";
      unset($_SESSION['message']);
      unset($_SESSION['message_type']);
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
    <title>Login MepCONS x Metro</title>
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
<div id="intro" class="bg-image shadow-2-strong">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-md-8">
            <form class="bg-white rounded shadow-5-strong p-5" method="POST" action="proses_login.php">
              <div class="d-flex justify-content-center align-items-center mb-2">
                <img src="../img/mepcons_metro_logo.png" alt="Metro Mepcons Logo" style="width:200px; max-width: 100%;">
              </div>
              <h3 class="login text-center">Login</h3>
              <!-- Email input -->
              <div class="form-outline mb-4" data-mdb-input-init>
                <label class="form-label" for="email">Alamat Email</label>
                <input type="email" id="Email" name="email" class="form-control" placeholder="Masukkan Email Anda"/>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4" data-mdb-input-init>
                <label class="form-label" for="password">Password</label>
                <input type="password" id="Password" name="password" class="form-control" placeholder="Masukkan Password Anda"/>
              </div>

              <div class="text-right">
                  <!-- Simple link -->
                  <!-- <a href="forget_password.php">Lupa Password?</a></p> -->
                </div>
              
              <button class="btn btn-primary btn-block masuk mb-4" data-mdb-ripple-init>Masuk</button>
              <div class="text-right">
                  <!-- Simple link -->
                   <p>Belum punya akun?
                  <a href="../register.php">Daftar Sekarang</a></p>
                </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                </div>
              </div>

              <!-- Submit button -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
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
  </body>
</html>
