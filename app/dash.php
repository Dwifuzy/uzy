
<?php
include "boot.php";
$date= date('Y-m-d');
?>
<div class="row">
    <div class="col">
    <div class="card text-center" style="width: 18rem;">
  <h3 class="mt-3">RPL</h3>
  <div class="card-body">
    <h3 class="card-text">
        <?php
        include "koneksi.php";
        $lihat = $konek->query("select jurusan,waktu from siswa where jurusan like 'rpl' and waktu like '%$date%'");
        $jumlah = $lihat->num_rows;
        echo $jumlah;
        ?>
    </h3>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card text-center" style="width: 18rem;">
  <h3 class="mt-3">Daftar Siswa</h3>
  <div class="card-body">
    <h3 class="card-text">
    <a href=" tampil.php">
    <?php
include "koneksi.php";

$lihat = $konek->query("SELECT nama FROM siswa");
$jumlah = $lihat->num_rows;
echo $jumlah;

?>
    </a>
    <i class="bi bi-person-lines-fill"></i>

    </h3>
  </div>
</div>
    </div>
</div>