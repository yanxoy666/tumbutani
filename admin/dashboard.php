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