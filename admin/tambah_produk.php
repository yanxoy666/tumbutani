<?php
session_start();

// Cek login admin
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include "../config/koneksi.php";

// Proses simpan data
if (isset($_POST['simpan'])) {

    $nama       = $_POST['nama'];
    $deskripsi  = $_POST['deskripsi'];
    $harga      = $_POST['harga'];

    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    // Upload gambar
    move_uploaded_file($tmp, "../assets/img/produk/" . $gambar);

    // Insert ke database
    mysqli_query($conn, "INSERT INTO produk VALUES (
        '',
        '$nama',
        '$deskripsi',
        '$harga',
        '$gambar',
        NOW()
    )");

    echo "Produk berhasil ditambahkan";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="css/tambah_produk.css">

</head>
<body>

<form method="POST" enctype="multipart/form-data">

    <label>Nama Produk</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi" required></textarea><br><br>

    <label>Harga</label><br>
    <input type="number" name="harga" required><br><br>

    <label>Gambar</label><br>
    <input type="file" name="gambar" required><br><br>

    <button type="submit" name="simpan">Simpan</button>

</form>


</body>
</html>