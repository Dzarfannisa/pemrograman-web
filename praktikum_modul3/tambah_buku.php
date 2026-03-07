<?php include 'koneksi.php'; ?>
<h2>Tambah Buku</h2>
<form action="" method="POST">
    Judul: <input type="text" name="judul" required><br><br>
    Pengarang: <input type="text" name="pengarang" required><br><br>
    Tahun Terbit: <input type="number" name="tahun_terbit" required><br><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun = $_POST['tahun_terbit'];

    $sql = "INSERT INTO buku (judul, pengarang, tahun_terbit) VALUES ('$judul', '$pengarang', '$tahun')";
    if (mysqli_query($conn, $sql)) {
        header("Location: tampil_buku.php");
    }
}
?>