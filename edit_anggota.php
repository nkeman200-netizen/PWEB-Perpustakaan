<?php 

$id=isset($_GET['id']) ? $_GET['id'] : null;

// echo $id;
$anggota=null;

if($id!=null){
    require_once("koneksi.php");
    $sql="select * from anggota where id=?";
    $stmt=mysqli_prepare($koneksi,$sql);
    if($stmt){
        mysqli_stmt_bind_param($stmt,"i",$id);
        if(mysqli_stmt_execute($stmt)){
            $result=mysqli_stmt_get_result($stmt);
            $anggota=mysqli_fetch_assoc($result);
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit anggota</title>
</head>
<body>
    <form action="proses_update.php" method="post"> 
        <input type="hidden" name="id" id="id" value="<?= $id?>">
        <label for="no_anggota">Nomor Anggota</label> <br>
        <input type="text" id="no_anggota" name="no_anggota" value="<?= $anggota['no_anggota'] ?>"> <br><br>

        <label for="nama_lengkap">Nama Lengkap</label> <br>
        <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $anggota['nama_lengkap'] ?>"> <br><br>

        <label for="email">Alamat Email</label><br>
        <input type="text" id="email" name="email" value="<?= $anggota['email'] ?>"> <br><br>

        <label for="no_hp">Nomor HP / WhatsApp</label> <br>
        <input type="text" id="no_hp" name="no_hp" value="<?= $anggota['no_hp'] ?>"> <br><br>

        <label for="jenis_anggota">Jenis Anggota</label> <br>
        <select id="jenis_anggota" name="jenis_anggota" > 
            <option value="">-- Pilih Jenis Anggota --</option> 
            <option value="Mahasiswa" 
                <?= $anggota['jenis_anggota'] == "Mahasiswa" ? 'selected' : ''; ?> 
            >
                Mahasiswa
            </option> 

            <option value="Dosen" 
                <?= ($anggota['jenis_anggota'] == "Dosen") ? 'selected' : ""; ?>
            >
                Dosen
            </option> 

            <option value="Tenaga Kependidikan" 
                <?= ($anggota['jenis_anggota'] == "Tenaga Kependidikan") ? 'selected' : ""; ?>
            >
                Tenaga Kependidikan
            </option> 
        </select> <br><br>

        <label for="alamat">Alamat Lengkap</label> <br>
        <textarea id="alamat" name="alamat" rows="4"><?= $anggota['alamat'] ?></textarea> <br><br>

        <button type="submit" name="submit">Simpan Perubahan</button> 
    </form> 
</body>
</html>

<?php 
        }
    }
}
?>