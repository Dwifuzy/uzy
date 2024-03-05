<?php
include "boot.php";
include "koneksi.php";
?>

<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header bg-danger text-white">
        <h4 class="text-center">Form Input Menu</h4>
      </div>
      <div class="card-body">
        <form action="prosesinput.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Menu</label>
            <input type="text" class="form-control" name="nama" id="nama" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga" required>
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar" id="gambar" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="tersedia" value="tersedia" required>
              <label class="form-check-label" for="tersedia">Tersedia</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="kosong" value="kosong" required>
              <label class="form-check-label" for="kosong">Kosong</label>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>