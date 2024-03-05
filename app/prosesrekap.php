<?php
include "koneksi.php"; 
include "boot.php";

$query = "SELECT * FROM listpembeli";
$result = $konek->query($query);

// Periksa apakah query berhasil dieksekusi
if($result && $result->num_rows > 0) {
    // Inisialisasi variabel untuk total pembeli
    $total_pembeli = 0;

    // Mengambil data dari setiap baris hasil query
    while($row = $result->fetch_assoc()) {
        // Mengakses data dari setiap baris
        $total_pembeli++; // Menambahkan jumlah pembeli

       
    }

    // Menampilkan hasil rekapitulasi
    echo "<h2>Rekapitulasi Pembeli</h2>";
    echo "<p>Total Pembeli: $total_pembeli</p>";
} else {
    // Jika query tidak mengembalikan hasil, tampilkan pesan bahwa data tidak ditemukan
    echo "Data pembeli tidak ditemukan.";
}

// Menutup koneksi database
$konek->close();
?>
