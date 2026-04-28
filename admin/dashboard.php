<?php 
// Cek apakah yang diminta cuma kontennya saja
$isAjax = isset($_GET['content_only']); 
?>

<?php if (!$isAjax): ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="admin-wrapper">
    <?php include 'layout/sidebar.php'; ?>
    <div class="admin-content">
        <div id="main-content">
<?php endif; ?>

            <h2>Dashboard</h2>
            <p>Selamat datang di Admin Panel TumbuTani</p>
            <?php if (!$isAjax): ?>
        </div> 
    </div>
</div>
<script src="js/dashboard.js"></script>
</body>
</html>
<?php endif; ?>

<?php
include "../config/koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
?>

<h3>Data Produk</h3>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Gambar</th>
    </tr>

    <?php $no = 1; ?>
    <?php while($row = mysqli_fetch_assoc($data)) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['deskripsi']; ?></td>
        <td><?= $row['harga']; ?></td>
        <td>
            <img src="../assets/img/produk/<?= $row['gambar']; ?>" width="80">
        </td>
    </tr>
    <?php endwhile; ?>
</table>