<?php
session_start();

if(isset($_POST['submit'])){
    // 1. Ambil data dan bersihkan spasi di awal/akhir
    $id=isset($_POST["id"])    ? trim($_POST["id"])    : "";
    $no_anggota    = isset($_POST["no_anggota"])    ? trim($_POST["no_anggota"])    : ""; 
    $nama_lengkap  = isset($_POST["nama_lengkap"])  ? trim($_POST["nama_lengkap"])  : ""; 
    $email         = isset($_POST["email"])         ? trim($_POST["email"])         : ""; 
    $no_hp         = isset($_POST["no_hp"])         ? trim($_POST["no_hp"])         : ""; 
    $jenis_anggota = isset($_POST["jenis_anggota"]) ? trim($_POST["jenis_anggota"]) : ""; 
    $alamat        = isset($_POST["alamat"])        ? trim($_POST["alamat"])        : ""; 

    // 2. Validasi di sisi server
    $daftar_jenis = array("Mahasiswa", "Dosen", "Tenaga Kependidikan"); 
    $errors       = array(); 

    // Validasi Nomor Anggota (wajib, hanya angka, maks 15 digit)
    if (empty($no_anggota)) { 
        $errors[] = "Nomor anggota tidak boleh kosong."; 
    } elseif (!ctype_digit($no_anggota)) { 
        $errors[] = "Nomor anggota hanya boleh berisi angka."; 
    } elseif (strlen($no_anggota) > 15) { 
        $errors[] = "Nomor anggota maksimal 15 digit."; 
    } 

    // Validasi Nama Lengkap (wajib, maks 100 karakter)
    if (empty($nama_lengkap)) { 
        $errors[] = "Nama lengkap tidak boleh kosong."; 
    } elseif (strlen($nama_lengkap) > 100) { 
        $errors[] = "Nama lengkap maksimal 100 karakter."; 
    } 

    // Validasi Email (wajib, format valid via filter_var, maks 100 karakter)
    if (empty($email)) { 
        $errors[] = "Email tidak boleh kosong."; 
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $errors[] = "Format email tidak valid."; 
    } elseif (strlen($email) > 100) { 
        $errors[] = "Email maksimal 100 karakter."; 
    } 

    // Validasi Nomor HP (wajib, hanya angka, 10 sampai 13 digit)
    if (empty($no_hp)) { 
        $errors[] = "Nomor HP tidak boleh kosong."; 
    } elseif (!ctype_digit($no_hp)) { 
        $errors[] = "Nomor HP hanya boleh berisi angka."; 
    } elseif (strlen($no_hp) < 10 || strlen($no_hp) > 13) { 
        $errors[] = "Nomor HP harus berupa angka antara 10 hingga 13 digit."; 
    } 

    // Validasi Jenis Anggota (wajib dipilih, harus ada dalam daftar_jenis)
    if (empty($jenis_anggota)) { 
        $errors[] = "Jenis anggota wajib dipilih."; 
    } elseif (!in_array($jenis_anggota, $daftar_jenis, true)) { 
        $errors[] = "Jenis anggota tidak valid."; 
    } 

    // Validasi Alamat (wajib diisi)
    if (empty($alamat)) { 
        $errors[] = "Alamat tidak boleh kosong."; 
    } 

    if(empty($errors)){
        
        require_once("koneksi.php");
        $sql="update anggota set 
            no_anggota=?, 
            nama_lengkap=?, 
            email=?, 
            no_hp=?, 
            jenis_anggota=?, 
            alamat=? 
            where id=?";

        $stmt=mysqli_prepare($koneksi,$sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt,"ssssssi",
                $no_anggota,
                $nama_lengkap,
                $email,
                $no_hp,
                $jenis_anggota,
                $alamat,
                $id
                );
            
            if(mysqli_stmt_execute($stmt)){
                header("Location: index.php?status=sukses&pesan=Berhasil update data");
                exit;
            }else{
                header("Location: index.php?status=gagal&pesan=Gagal update data");
                exit;
            }
        }
    }else{
        $_SESSION['errors']=$errors;
        header("Location: index.php?status=gagal&pesan=Gagal update data");
        exit;
    }
}