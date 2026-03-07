<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>

    <h2>Form Input Inventaris Barang</h2>

    <form action="simpan_barang.php" method="POST">

        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" required><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" required><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" required><br><br>

        <button type="submit" name="proses">Simpan Barang</button>

    </form>

    <br>
    <a href="lihat_barang.php">Kembali ke Daftar Barang</a>

</body>
</html>