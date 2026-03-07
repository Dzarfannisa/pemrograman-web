<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM buku WHERE id='$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun = $_POST['tahun_terbit'];

    $sql = "UPDATE buku SET judul='$judul', pengarang='$pengarang', tahun_terbit='$tahun' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: tampil_buku.php");
    }
}
?>
<h2>Edit Buku</h2>
<form action="" method="POST">
    Judul: <input type="text" name="judul" value="<?php echo $data['judul']; ?>"><br><br>
    Pengarang: <input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>"><br><br>
    Tahun Terbit: <input type="number" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>"><br><br>
    <button type="submit" name="update">Update</button>
</form>