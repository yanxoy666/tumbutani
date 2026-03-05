<?php
$conn = new mysqli("localhost", "root", "", "tumbutani");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>