<?php
include 'koneksi.php';

$sql = "INSERT INTO mahasiswa (nim, nama, jurusan)
VALUES ('2024001', 'Budi Santoso', 'Informatika')";

if (mysqli_query($conn, $sql)) {
    echo "Data baru berhasil ditambahkan";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>