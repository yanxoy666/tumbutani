<?php
require_once '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM produk WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    mysqli_query($conn,"UPDATE produk SET
        nama_produk='$nama',
        deskripsi='$deskripsi',
        harga='$harga'
        WHERE id='$id'
    ");

    header("Location: produk.php");
}
?>

<h2>Edit Produk</h2>

<form method="POST">

<input type="text" name="nama" value="<?= $d['nama_produk'] ?>">

<textarea name="deskripsi"><?= $d['deskripsi'] ?></textarea>

<input type="number" name="harga" value="<?= $d['harga'] ?>">

<button type="submit" name="update">Update</button>

</form>