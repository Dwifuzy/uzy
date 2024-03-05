<button class="btn fs-1" onclick="printDiv('div1')">
  <i class="bi bi-printer-fill"></i>
</button>

<div id="div1">
  <!-- tampil  -->
  <?php
  include "boot.php";
  include "koneksi.php";

  $searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

  $query = "SELECT * FROM listmenu WHERE
  menu LIKE'%$searchTerm%' OR
  harga LIKE'%$searchTerm%' OR
  stok LIKE'%$searchTerm%'";

  $result = $konek->query($query);

  ?>
  <table class="table">
    <thead class="table-info">
      <tr>
        <th scope="col">No</th>
        <th scope="col">menu</th>
        <th scope="col">harga</th>
        <th scope="col">stok</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 0; // Inisialisasi nomor
      while ($s = $result->fetch_assoc()) {
        $no++; // Increment nomor pada setiap iterasi
      ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $s['menu'] ?></td>
          <td><?php echo $s['harga'] ?></td>
          <td><?php echo $s['stok'] ?></td>
          <td>
            <button class="btn btn-danger btn-sm rounded-0" onclick="document.location.href='hapus.php?id=<?php echo $s['no'] ?>'">
              <i class="bi bi-trash3 text-light"></i>
            </button>
            <button class="btn btn-info btn-sm rounded-0" onclick="document.location.href='update.php?id=<?php echo $s['no'] ?>'">
              <i class="bi bi-pencil-square"></i>
            </button>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
<!-- tutup tampil -->

<script>
  function printDiv(el) {
    var a = document.body.innerHTML;
    var b = document.getElementById(el).innerHTML;
    document.body.innerHTML = b;
    window.print();
    document.body.innerHTML = a;
  }
</script>
