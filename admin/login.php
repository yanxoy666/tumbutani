<?php
session_start();
include "../config/koneksi.php";

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,"SELECT * FROM admin 
WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($query) > 0){
    $_SESSION['admin'] = $username;
    header("Location: dashboard.php");
}else{
    echo "Login gagal";
}

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Tumbutani Nusantara</title>
    <link rel="stylesheet" href="assets-admin/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <div class="logo-wrapper">
            <img src="../assets/img/logo1.png" alt="Logo Tumbutani Nusantara">
        </div>
        
        <h2>Admin Portal</h2>
        <p>Silahkan masuk untuk mengelola sistem</p>

        <form method="POST">
            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" name="login">LOGIN</button>
            
            <div class="footer-links">
                <a href="#">Lupa Password?</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>