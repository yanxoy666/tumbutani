<?php
session_start();

// menghancurkan semua session
session_destroy();

// kembali ke halaman login
header("Location: login.php");
exit();
?>