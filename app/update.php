<?php
include "koneksi.php";
include "boot.php";
$id = $_GET['id'];
$panggil = $konek->query("select * from listmenu where no='$id'");
$a = $panggil->fetch_array();

if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $status = $_POST['status'];

 
  if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != "") {
    $nama_gambar = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $path = "../images/" . $nama_gambar;
    move_uploaded_file($file_tmp, $path);

    
    $update = $konek->query("UPDATE listmenu SET menu='$nama', harga='$harga', gambar='$nama_gambar', status='$status' WHERE no='$id'");
  } else {
    
    $update = $konek->query("UPDATE listmenu SET menu='$nama', harga='$harga', status='$status' WHERE no='$id'");
  }

  if ($update) {
    echo "<script>alert('Data berhasil diupdate');</script>";
    echo "<script>window.location.href = 'listmenu.php';</script>";
  } else {
    echo "<script>alert('Gagal mengupdate data');</script>";
  }
}
?>

<div class="container col-5">
  <form class="form-control mt-3 bg-info" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nama </label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" value="<?= $a['menu'] ?>">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Harga </label>
      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="harga" value="<?= $a['harga'] ?>">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Gambar </label>
      <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="gambar">
    </div>

    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="status1" value="Tersedia" <?= ($a['status'] == 'Tersedia') ? 'checked' : '' ?>>
        <label class="form-check-label" for="status1">
          Tersedia
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="status2" value="Kosong" <?= ($a['status'] == 'Kosong') ? 'checked' : '' ?>>
        <label class="form-check-label" for="status2">
          Kosong
        </label>
      </div>
    </div>

    <div class="text-end">
      <button type="submit" class="btn btn-primary rounded-" name="submit">Simpan</button>
    </div>
  </form>
</div>