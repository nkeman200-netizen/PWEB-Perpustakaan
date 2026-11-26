<?php 

if(isset($_POST['submit'])){
    $id=isset($_POST['id']) ? trim($_POST['id']) : null;

    if($id!=null){
        require_once("koneksi.php");
        $sql="delete from anggota where id=?";
        $stmt=mysqli_prepare($koneksi,$sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt,"i",$id);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                mysqli_close($koneksi);
                header("Location: index.php?status=sukses&pesan=Berhasil menghapus data");
                exit;
            }else{
                mysqli_stmt_close($stmt);
                mysqli_close($koneksi);
                header("Location: index.php?status=gagal&pesan=Gagal menghapus data");
                exit;
            }
        }
        mysqli_close($koneksi);
    }
}