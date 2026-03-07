<?php include 'koneksi.php'; ?>

<h2>Daftar Inventaris Barang</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    
    <?php
    // Mengambil data dari tabel barang
   $query = mysqli_query($conn, "SELECT * FROM `2-barang` ");
    
    while($data = mysqli_fetch_array($query)) {
    ?>
    <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['nama_barang']; ?></td>
        <td><?php echo $data['stok']; ?></td>
        <td><?php echo $data['harga']; ?></td>
<td>
    <a href="edit_barang.php?id=<?php echo $data['id']; ?>">Edit</a> | 
    
    <a href="hapus_barang.php?id=<?php echo $data['id']; ?>" 
       onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
</td>
    </tr>
    <?php } ?>
</table>

<br>
<a href="form-tambah.php">+ Tambah Barang Baru</a>