<?php
// verifikasi_otp.php
session_start();
?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Verifikasi OTP</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Masukkan Kode OTP</h5>
                        <form action="proses_verifikasi_otp.php" method="POST">
                            <div class="form-group">
                                <label for="otp">Kode OTP</label>
                                <input type="text" class="form-control" name="otp" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Verifikasi</button>
                        </form>
                        <?php
                        if (isset($_SESSION['message'])) {
                            echo "<div class='alert alert-{$_SESSION['message_type']} mt-2'>{$_SESSION['message']}</div>";
                            unset($_SESSION['message']);
                            unset($_SESSION['message_type']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
