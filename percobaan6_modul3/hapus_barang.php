<?php
include 'koneksi.php';

// 1. Tangkap ID dari URL menggunakan $_GET
if (isset($_GET['id'])) {
    $id_barang = $_GET['id'];

    // 2. PERBAIKAN: Gunakan nama tabel `2-barang` dengan tanda backtick
    $sql = "DELETE FROM `2-barang` WHERE id = '$id_barang'";

    if (mysqli_query($conn, $sql)) {
        // 3. Jika berhasil, lempar kembali ke halaman utama
        header("Location: lihat_barang.php?pesan=terhapus");
        exit(); 
    } else {
        echo "Gagal menghapus: " . mysqli_error($conn);
    }
} else {
    die("Akses dilarang. ID tidak ditemukan.");
}
?>