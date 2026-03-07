<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_kampus";

$conn = mysqli_connect("localhost", "root", "", "db_kampus");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "Koneksi Berhasil!";
?>