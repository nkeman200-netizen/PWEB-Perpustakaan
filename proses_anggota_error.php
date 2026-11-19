<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Hasil Pendaftaran Anggota Perpustakaan</title> 
    <style> 
        body { 
            font-family: Arial, sans-serif; 
            margin: 40px; 
        } 
        h1 { 
            color: #1f3864; 
        } 
        .gagal { 
            background: #fdecea; 
            border-left: 5px solid #c0392b; 
            padding: 12px; 
        } 
        ul { 
            line-height: 1.6; 
        } 
        a { 
            color: #1f3864; 
            text-decoration: none; 
            font-weight: bold; 
        } 
        a:hover { 
            text-decoration: underline; 
        } 
    </style> 
</head> 
<body> 
    <h1>Data Tidak Valid</h1> 
    <p class="gagal">Pendaftaran belum dapat diproses. Silakan perbaiki kesalahan berikut:</p> 
    <ul> 
        <li>Nomor anggota tidak boleh kosong.</li> 
        <li>Nama lengkap tidak boleh kosong.</li> 
        <li>Email tidak boleh kosong.</li> 
        <li>Nomor HP tidak boleh kosong.</li> 
        <li>Jenis anggota wajib dipilih.</li> 
        <li>Alamat tidak boleh kosong.</li> 
    </ul> 

    <p><a href="javascript:history.back()">&larr; Kembali dan perbaiki data</a></p> 
</body> 
</html>
