<?php
include "boot.php";
include "koneksi.php"; 

$query = "SELECT * FROM listmenu";
$result = $konek->query($query);

if ($result->num_rows > 0) {
  $count = 0; 
  echo '<div class="row">'; 
  
  while ($row = $result->fetch_assoc()) {
    
    $id_menu = $row['no']; 
    $nama = $row['menu'];
    $harga = $row['harga'];
    $gambar = $row['gambar'];
    $stok = $row['status'];
    
   
    if ($stok > 0) {
?>
    <div class="col-3">
      <div class="card mx-auto mb-3" style="width: 13rem; height: 22rem;">
        <img src="../images/<?php echo $gambar; ?>" class="card-img-top" alt="<?php echo $nama; ?>" style="width: 100%; height: 10rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $nama; ?></h5>
          <p class="card-text"><b>Rp.<?php echo number_format($harga); ?></b></p>
          <p class="card-text"><b>Stock: <?php echo $stok; ?></b></p>
          <a href="pesan.php?id=<?php echo $id_menu; ?>" class="btn btn-primary">Pesan</a>
        </div>
      </div>
    </div>
<?php
    } 
    $count++; 
    if ($count % 4 == 0) {
      echo '</div><div class="row">'; 
    }
  }
  echo '</div>'; 
} else {
  echo "Tidak ada data menu.";
}
?>
