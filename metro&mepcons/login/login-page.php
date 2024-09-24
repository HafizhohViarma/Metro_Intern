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
  </head>

<body>
<section class="vh-100" style="background-color: #002347;">
  <div class="container py-5 h-70">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../img/login-page.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width:370px; height:620px;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="proses_login.php">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">
                        <img src="../img/mepcons_metro_logo.png" alt="" style="width:200px;">
                    </span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" name="email" id="Email" class="form-control form-control-lg" Required />
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="Password" class="form-control form-control-lg" Required/>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block">Login</button>
                    <a href="../register.php" class="medium text-primary mt-2">Register?</a>
                  </div>

                  <!-- <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                      style="color: #393f81;">Register here</a></p> -->
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
