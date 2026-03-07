<?php
include 'koneksi.php';

// 1. Tangkap ID dari URL
$id = $_GET['id'];

// 2. Ambil data lama berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM `2-barang` WHERE id = '$id'");
$data = mysqli_fetch_array($query);

// Validasi jika data tidak ditemukan
if (!$data) {
    die("Data tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
    <h2>Edit Inventaris Barang</h2>

    <form action="proses_edit.php" method="POST">
        
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?php echo $data['stok']; ?>" required><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?php echo $data['harga']; ?>" required><br><br>

        <button type="submit" name="update">Simpan Perubahan</button>
        <a href="lihat_barang.php">Batal</a>
    </form>
</body>
</html>