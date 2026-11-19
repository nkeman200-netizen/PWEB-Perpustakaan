<?php 
    require_once('koneksi.php');

    $sql='select * from anggota';
    $hasil=mysqli_query($koneksi,$sql);
    $rows=mysqli_fetch_all($hasil,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
</head>
<body>
    <h1>Data Anggota Perpustakaan</h1>
    <button><a href="form_anggota.php">Tambah Data</a></button>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>No Anggota</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Tlp</th>
                <th>Jenis Anggota</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;
                foreach($rows as $row){
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['no_anggota']?></td>
                    <td><?php echo $row['nama_lengkap']?></td>
                    <td><?php echo $row["email"]?></td>
                    <td><?php echo $row["no_hp"]?></td>
                    <td><?php echo $row["jenis_anggota"]?></td>
                    <td><?php echo $row["alamat"]?></td>
                </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</body>
</html>