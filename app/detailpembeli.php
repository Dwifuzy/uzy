<?php
include "koneksi.php";
include "boot.php";


if (isset($_GET['no'])) {
  
  $id = $_GET['no'];

  
  $query = "SELECT nama, total, menu FROM listpembeli WHERE no = '$id'";
  $result = mysqli_query($konek, $query); 
  $row = mysqli_fetch_assoc($result);

  $nama_pembeli = $row['nama'];
  $total_harga = $row['total'];
  $menu = $row['menu'];
}


$kembalian = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $bayar = $_POST['bayar'];

  
  $kembalian = $bayar - $total_harga;

  
  $nama_pembeli = $_POST['nama_pembeli'];
  $menu = $_POST['menu'];
  $total_belanja = $_POST['total_belanja'];

  
  $query = "UPDATE listpembeli SET jumlahbayar = '$bayar', kembalian = '$kembalian' WHERE no = '$id'";
  $result = mysqli_query($konek, $query); 

  if ($result) {
    
    header("Location: nota.php?no=" . $id);
    exit;
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($konek); 
  }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nama_pembeli" class="form-label">Nama Pembeli:</label>
                    <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli"
                        value="<?php echo isset($nama_pembeli) ? $nama_pembeli : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="menu" class="form-label">Menu:</label>
                    <input type="text" class="form-control" id="menu" name="menu"
                        value="<?php echo isset($menu) ? $menu : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="total_belanja" class="form-label">Total Harga:</label>
                    <input type="text" class="form-control" id="total_belanja" name="total_belanja"
                        value="<?php echo isset($total_harga) ? $total_harga : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="jumlah_bayar" class="form-label">Jumlah Bayar:</label>
                    <input type="text" class="form-control" id="jumlah_bayar" name="bayar" required>
                </div>

                <div class="mb-3">
                    <label for="kembalian" class="form-label">Kembalian:</label>
                    <input type="text" class="form-control" id="kembalian" name="kembalian"
                        value="<?php echo $kembalian; ?>" readonly>
                </div>

                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
        </div>
    </div>
</div>