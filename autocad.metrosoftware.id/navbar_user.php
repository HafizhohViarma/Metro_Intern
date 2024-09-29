<?php
    session_start();

?>

<nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.php"
              ><img src="img/mepcons_metro_logo.png" alt="" style="width: 160px;"
            /></a>
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
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#daftar">Daftar Kelas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#e-book">E-Book</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#tentang-kami">Tentang Kami</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#manfaat">Manfaat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#testimoni">Testimoni</a>
                </li>
                <?php if (isset($_SESSION['id_user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="pembelajaran.php">Pembelajaran Saya</a>
                    </li>
                <?php endif; ?>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#testi">Testimoni</a>
                </li> -->
                <?php
                    if (isset($_SESSION['id_user'])):
                ?> 
                    <li class="nav-item">
                        <a class="nav-link" href="login/logout.php">Logout</a>
                    </li>
                <?php else: ?>
                  <li class="nav-item">
                    <a class="nav-link mr-5" href="login/login-page.php">Login</a>
                  </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </nav>