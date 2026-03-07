<?php
include 'koneksi.php';
?>

<table border="1">
<tr>
<th>NIM</th>
<th>Nama</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

while($data = mysqli_fetch_array($result)) {
    echo "<tr>
    <td>".$data['nim']."</td>
    <td>".$data['nama']."</td>
    </tr>";
}
?>

</table>