<?php
    
    include "koneksi.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
<header class="header_area white-header">
      <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="index.php">
              <img class="logo-2" src="img/mepcons_metro_logo.png" alt="" style="width: 160px;"/>
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
              <ul class="nav navbar-nav menu_nav ml-auto">
                <!-- <li class="nav-item">
                  <a class="nav-link" href="index_admin.php">Home</a>
                </li> -->
                
                <li class="nav-item">
                  <a class="nav-link" href="video.php">Video</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ebook.php">E-Book</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="kelas.php">Daftar Kelas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="user.php">Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="testimoni_admin.php">Testimoni</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="penjualan.php">Penjualan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login/login-page.php">Logout</a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>
      </div>
    </header>
</body>
</html>