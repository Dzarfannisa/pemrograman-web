<?php
include 'koneksi.php';

$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] . " - Nama: " . $row["nama"] . " [" . $row["jurusan"] . "]<br>";
    }
} else {
    echo "0 hasil";
}
?>