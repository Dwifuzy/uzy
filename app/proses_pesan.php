<?php
include "boot.php";
include "koneksi.php";

// Ambil data dari form
$nama = $_POST["nama"];
$waktu = $_POST["waktu"];
$menu = $_POST["menu"];
$alamat = $_POST["alamat"];
$harga_satuan = $_POST["harga_satuan"];
$jumlah = $_POST["jumlah"];
$total = $harga_satuan * $jumlah;

// Buat query untuk menyimpan data pembeli ke database
$query = "INSERT INTO listpembeli (waktu, nama, menu, alamat,jumlahpesa, harga_satuan, total) VALUES ('$waktu','$nama', '$menu', '$alamat', '$jumlah', '$harga_satuan', $total)";

// Jalankan query
if ($konek->query($query) === TRUE) {
    echo "<script>alert('Pesanan berhasil ditambahkan');</script>";
    echo "<script>window.location.href = 'listpembeli.php';</script>";
} else {
    echo "Error: " . $query . "<br>" . $konek->error;
}

$konek->close();
?>
