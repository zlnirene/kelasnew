<form action="" method="post">
    Nama:
    <input type="text" name="nama" placeholder="Masukkan Nama">
    Alamat:
    <input type="text" name="alamat" placeholder="Masukkan Alamat">
    <input type="submit" value="Simpan" name="simpan">
</form>
<?php 

$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'sekolah';

$koneksi = mysqli_connect($host, $user, $password, $database);

if (isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $sql = "INSERT INTO siswa VALUES ('', '$nama', '$alamat')";
    echo $sql;
    mysqli_query($koneksi, $sql);
}

$query = "SELECT * FROM siswa";
// echo $query;

$result = mysqli_query($koneksi, $query);
// var_dump($result);

$nama = mysqli_fetch_assoc($result);
// var_dump($nama);

echo '<h1>Data Siswa</h1>';
echo '<table border=1>';
echo '<thead>
        <tr>
            <th> Id </th>
            <th> Nama </th>
            <th> Alamat </th>
        </tr>
    </thead>
    <tbody>';
while ($row = mysqli_fetch_array($result)){
    echo '<tr>';
    echo '<td>'.$row[0].'</td>';
    echo '<td>'.$row[1].'</td>';
    echo '<td>'.$row[2].'</td>';
    echo '</tr>';
}

echo "</tbody>";
echo "</table>";


echo "<h1>Data Kelas</h1>";
$query = 'SELECT * FROM kelas';
$result = mysqli_query($koneksi, $query);
?>

<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Kelas</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
            <?php 
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>
                            <td>'.$row[0].'</td>';
                        echo '<td>'.$row[1].'</td>';
                        echo '<td>'.$row[2].'</td>
                        </tr>';
                }
            ?>
    </tbody>
</table>