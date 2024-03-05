<?php include "boot.php"; ?>
<?php include "koneksi.php"; ?>

<?php
$id_menu = $_GET['id'];

$query = "SELECT * FROM listmenu WHERE no = $id_menu";
$result = $konek->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama_menu = $row['menu'];
} else {
    echo "Menu tidak ditemukan.";
}
?>

<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Pembeli</h4>
        </div>
        <div class="card-body">
            <form method="post" action="proses_pesan.php">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pembeli:</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Pembeli" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Tanggal Beli:</label>
                    <input type="date" class="form-control" id="nama" name="waktu" placeholder="Masukkan Nama Pembeli">
                </div>
                <div class="mb-3">
                    <label for="menu" class="form-label">Menu:</label>
                    <select class="form-control" id="menu" name="menu" onchange="updateHarga()">
                        <?php
                        $result = $konek->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $menu = $row['menu'];
                                $harga = $row['harga'];
                                echo "<option value='$menu' data-harga='$harga'>$menu</option>";
                            }
                        } else {
                            echo "<option value='' disabled selected>Tidak ada menu tersedia</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga:</label>
                    <input type="text" class="form-control" id="harga" name="harga_satuan" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Pesanan:</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah Pesanan" onchange="updateTotal()">
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total Harga:</label>
                    <input type="text" class="form-control" id="total" name="total" readonly>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
    function updateHarga() {
        var menuSelect = document.getElementById("menu");
        var hargaInput = document.getElementById("harga");
        var selectedOption = menuSelect.options[menuSelect.selectedIndex];
        hargaInput.value = selectedOption.getAttribute("data-harga");
        updateTotal();
    }

    function updateTotal() {
        var harga = parseFloat(document.getElementById("harga").value);
        var jumlah = parseInt(document.getElementById("jumlah").value);
        var total = harga * jumlah;
        document.getElementById("total").value = total;
    }

    // Panggil fungsi updateHarga saat halaman dimuat ulang
    updateHarga();
</script>
<!-- Bagian lain dari halaman HTML -->

<script>
    // Panggil fungsi updateHarga saat halaman dimuat ulang
    updateHarga();
</script>
</body>
</html>
