<?php
include "koneksi.php";

$sql = "CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jurusan VARCHAR(100) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Tabel mahasiswa berhasil dibuat!";
} else {
    echo "Error membuat tabel: " . mysqli_error($conn);
}

mysqli_close($conn);
?>