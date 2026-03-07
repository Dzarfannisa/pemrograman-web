<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php'; //

// Pastikan 'proses' sesuai dengan name pada button di form
if (isset($_POST['proses'])) {
    
    // 1. Menangkap data dari form
    $nama = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // 2. Query Insert
    // Pastikan nama kolom (nama_barang, stok, harga) sama dengan di database
   $sql = "INSERT INTO `2-barang` (nama_barang, stok, harga) VALUES ('$nama', '$stok', '$harga')";
    if (mysqli_query($conn, $sql)) {
        // 3. Jika berhasil, langsung lempar ke halaman tabel
        header("Location: lihat_barang.php");
        exit();
    } else {
        echo "Gagal menyimpan: " . mysqli_error($conn);
    }
} else {
    echo "Akses langsung dilarang!";
}
?>