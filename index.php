<?php 
    session_start();
    require_once('koneksi.php');

    $sql='select * from anggota';
    $hasil=mysqli_query($koneksi,$sql);
    $rows=mysqli_fetch_all($hasil,MYSQLI_ASSOC);

    $status=isset($_GET['status']) ? $_GET['status'] : "";
    $pesan=isset($_GET['pesan']) ? $_GET['pesan'] : "";

    $errors=$_SESSION['errors'] ?? '';
    unset($_SESSION['errors']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
    <style>
        h1 { 
            color: #1f3864; 
        } 
        .gagal { 
            background: #fdecea; 
            border-left: 5px solid #c0392b; 
            padding: 12px; 
        }
    </style>
</head>
<body>
    <h1>Data Anggota Perpustakaan</h1>
    <button><a href="form_anggota.php">Tambah Data</a></button>
    <br><br>

    <?php if($status=="sukses"){?>
        <p style="background-color: green; border: 1px solid; border-radius: 3px; color: white; padding: 5px; width: fit-content;"><?= $pesan ?></p>
    <?php }else if($status=="gagal"){?>
        <p style="background-color: red; border: 1px solid; border-radius: 3px; color: white; padding: 5px; width: fit-content;"><?= $pesan ?></p>
    <?php }?>

    <?php if (!empty($errors)) { ?> 
        <h1>Data Tidak Valid</h1> 
        <p class="gagal">Pendaftaran belum dapat diproses. Silakan perbaiki kesalahan berikut:</p> 
        <ul> 
            <?php foreach ($errors as $pesan) { ?> 
                <li><?php echo htmlspecialchars($pesan); ?></li> 
            <?php } ?> 
        </ul> 
    <?php }?> 
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>No Anggota</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Tlp</th>
                <th>Jenis Anggota</th>
                <th>Alamat</th>
                <th>Aksi</th>
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
                    <td>
                        <a href="edit_anggota.php?id=<?php echo $row['id'] ?>"><button>Edit</button></a>
                        <form method="POST" action="hapus_anggota.php" onsubmit="return confirm('yakin hapus?')">
                            <input type="hidden" name="id" value="<?= $row['id'];?>">
                            <button type="submit" name="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</body>
</html>