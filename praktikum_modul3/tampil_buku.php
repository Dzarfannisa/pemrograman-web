<?php include 'koneksi.php'; ?>
<h2>Daftar Buku Perpustakaan</h2>

<form action="tampil_buku.php" method="GET">
    <input type="text" name="cari" placeholder="Cari judul buku..." value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
    <button type="submit">Cari</button>
    <a href="tampil_buku.php">Reset</a>
</form>

<br><a href="tambah_buku.php">+ Tambah Buku Baru</a><br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Tahun Terbit</th>
        <th>Aksi</th>
    </tr>
    <?php
    $search = "";
    if (isset($_GET['cari'])) {
        $search = $_GET['cari'];
        // Query dengan fitur pencarian LIKE
        $query = mysqli_query($conn, "SELECT * FROM buku WHERE judul LIKE '%$search%'");
    } else {
        $query = mysqli_query($conn, "SELECT * FROM buku");
    }

    while ($data = mysqli_fetch_array($query)) {
    ?>
    <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['judul']; ?></td>
        <td><?php echo $data['pengarang']; ?></td>
        <td><?php echo $data['tahun_terbit']; ?></td>
        <td>
            <a href="edit_buku.php?id=<?php echo $data['id']; ?>">Edit</a> | 
            <a href="hapus_buku.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Hapus buku ini?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>