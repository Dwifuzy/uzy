<?php
include "boot.php";
include "koneksi.php";

$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

$query = "SELECT * FROM listmenu WHERE
menu LIKE '%$searchTerm%'";

$result = $konek->query($query);

?>
<table class="table">
  <thead class="table-info">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Menu</th>
      <th scope="col">Harga</th>
      <th scope="col">Gambar</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($s = $result->fetch_assoc()) {
      @$no++;
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $s['menu'] ?></td>
        <td><?php echo $s['harga'] ?></td>
        <td><img src="../images/<?php echo $s['gambar'] ?>" alt="gambar" style="width: 100px; height: auto;"></td>
        <td><?php echo $s['status'] ?></td>
        <td>
          <button class="btn btn-danger btn btn-sm rounded-0" onclick="document.location.href='hapus.php?id=<?php echo $s['no'] ?>'"><i class="bi bi-trash3 text-light"></i></button>
          <button class="btn btn-info btn btn-sm rounded-0" onclick="document.location.href='update.php?id=<?php echo $s['no'] ?>'"><i class="bi bi-pencil-square"></i></button>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>