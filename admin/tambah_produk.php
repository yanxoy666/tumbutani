<?php
session_start();

if(!isset($_SESSION['admin'])){
header("Location: login.php");
exit();
}
?>



<form method="POST" enctype="multipart/form-data">

Nama Produk
<input type="text" name="nama">

Deskripsi
<textarea name="deskripsi"></textarea>

Harga
<input type="number" name="harga">

Gambar
<input type="file" name="gambar">

<button type="submit" name="simpan">Simpan</button>

</form>

<?php

include "../config/koneksi.php";

if(isset($_POST['simpan'])){

$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmp,"../assets/img/produk/".$gambar);

mysqli_query($conn,"INSERT INTO produk VALUES(
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