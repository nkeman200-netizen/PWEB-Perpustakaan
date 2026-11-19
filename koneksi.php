<?php 
// koneksi.php - Menghubungkan PHP dengan database MySQL (MySQLi procedural)
// Khusus Sistem Pendaftaran Anggota Perpustakaan Kampus

mysqli_report(MYSQLI_REPORT_OFF); 

$host     = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "db_perpustakaan"; 

$koneksi = mysqli_connect($host, $username, $password, $database); 

if (!$koneksi) { 
    die("Koneksi gagal: " . htmlspecialchars(mysqli_connect_error())); 
} 

mysqli_set_charset($koneksi, "utf8mb4");
