<?php
// memulai session
session_start();
// menghapus session

session_destroy();

echo "<script>
alert ('anda berhasil keluar')
window.location.href='../?page=home/index'
</script>";
?>
