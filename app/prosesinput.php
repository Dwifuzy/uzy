<?php

include "koneksi.php";


$nama = $_POST["nama"];
$harga = $_POST["harga"];
$status = $_POST["status"];
$nama_gambar = $_FILES["gambar"]["name"];
$file_tmp = $_FILES["gambar"]["tmp_name"];

$target_dir = "../images/"; 
$target_file = $target_dir . basename($nama_gambar); 


$gambar_valid = getimagesize($file_tmp);
if ($gambar_valid !== false) {
    
    if (move_uploaded_file($file_tmp, $target_file)) {
       
        $add = $konek->query("INSERT INTO listmenu (menu, harga, gambar, status) VALUES ('$nama', '$harga', '$nama_gambar', '$status')");

        if ($add) {
            header("location:listmenu.php"); 
        } else {
            echo "Gagal menambahkan data ke database.";
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload gambar.";
    }
} else {
    echo "File yang diupload bukan file gambar yang valid.";
}
