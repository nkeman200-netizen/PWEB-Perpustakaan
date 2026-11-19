<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Pendaftaran Anggota Perpustakaan</title> 
    <style> 
        body { 
            font-family: Arial, sans-serif; 
            margin: 40px; 
        } 
        h1 { 
            color: #1f3864; 
        } 
        label { 
            display: block; 
            margin-top: 12px; 
            font-weight: bold; 
        } 
        input[type="text"], select, textarea { 
            width: 340px; 
            padding: 7px; 
            margin-top: 4px; 
            box-sizing: border-box; 
        } 
        small { 
            color: #666; 
            font-size: 12px; 
            display: block; 
            margin-top: 2px; 
        } 
        button { 
            margin-top: 18px; 
            padding: 9px 24px; 
            background-color: #1f3864; 
            color: #fff; 
            border: none; 
            cursor: pointer; 
            border-radius: 4px; 
            font-size: 14px; 
        } 
        button:hover { 
            background-color: #152747; 
        } 
        .sukses { 
            background: #e6f4ea; 
            border-left: 5px solid #2e7d32; 
            padding: 12px; 
            width: 340px; 
            box-sizing: border-box; 
            margin-bottom: 16px; 
            color: #1e4620; 
        } 
    </style> 
</head> 
<body> 
    <h1>Pendaftaran Anggota Perpustakaan</h1> 

    <form action="proses_anggota.php" method="post"> 
        <label for="no_anggota">Nomor Anggota</label> 
        <input type="text" id="no_anggota" name="no_anggota" value="20261001"> 
        <small>Hanya angka, maksimal 15 digit.</small> 

        <label for="nama_lengkap">Nama Lengkap</label> 
        <input type="text" id="nama_lengkap" name="nama_lengkap" value="Sofyan Yunus Rohman"> 
        <small>Maksimal 100 karakter.</small> 

        <label for="email">Alamat Email</label> 
        <input type="text" id="email" name="email" value="sofyan@kampus.ac.id"> 
        <small>Format email valid, maksimal 100 karakter.</small> 

        <label for="no_hp">Nomor HP / WhatsApp</label> 
        <input type="text" id="no_hp" name="no_hp" value="081234567890"> 
        <small>Hanya angka, antara 10 hingga 13 digit.</small> 

        <label for="jenis_anggota">Jenis Anggota</label> 
        <select id="jenis_anggota" name="jenis_anggota"> 
            <option value="">-- Pilih Jenis Anggota --</option> 
            <option value="Mahasiswa" selected>Mahasiswa</option> 
            <option value="Dosen">Dosen</option> 
            <option value="Tenaga Kependidikan">Tenaga Kependidikan</option> 
        </select> 

        <label for="alamat">Alamat Lengkap</label> 
        <textarea id="alamat" name="alamat" rows="4">Cilacap, Jawa Tengah</textarea> 

        <button type="submit">Simpan Anggota</button> 
    </form> 
</body> 
</html>
