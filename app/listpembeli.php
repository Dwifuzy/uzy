<?php
include "boot.php";
include "koneksi.php";

$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

$query = "SELECT * FROM listpembeli WHERE menu LIKE '%$searchTerm%'";

$result = $konek->query($query);

?>
<table class="table">
    <thead class="table-info">
        <tr>
            <th scope="col">Waktu Pesan</th>
            <th scope="col">Nama Pembeli</th>
            <th scope="col">Menu</th>
            <th scope="col">Alamat</th>
            <th scope="col">Harga Satuan</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
    while ($s = $result->fetch_assoc()) {
      @$no++;
      $total_harga = $s['harga_satuan'] * $s['total'];
    ?>
        <tr>
            <td><?php echo $s['waktu'] ?? 'waktu pesan tidak tersedia'; ?></td>
            <td><?php echo $s['nama'] ?? 'Nama tidak tersedia'; ?></td>
            <td><?php echo $s['menu'] ?? 'Menu tidak tersedia'; ?></td>
            <td><?php echo $s['alamat'] ?? 'Alamat tidak tersedia'; ?></td>
            <td><?php echo $s['harga_satuan'] ?? 'Harga satuan tidak tersedia'; ?></td>
            <td><?php echo $s['total'] ?? 'Harga satuan tidak tersedia'; ?></td>


            <td>
                <button class="btn btn-success btn-sm rounded-0"
                    onclick="document.location.href='detailpembeli.php?no=<?php echo $s['no'] ?>'">
                    Bayar
                </button>

            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>