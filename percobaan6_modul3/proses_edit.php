<?php
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id           = $_POST['id'];
    $nama_barang  = $_POST['nama_barang'];
    $stok         = $_POST['stok'];
    $harga        = $_POST['harga'];

    // Gunakan nama tabel `2-barang` sesuai database kamu
    $sql = "UPDATE `2-barang` SET 
            nama_barang = '$nama_barang', 
            stok        = '$stok', 
            harga       = '$harga' 
            WHERE id    = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: lihat_barang.php");
        exit();
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>