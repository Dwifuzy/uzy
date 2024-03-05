<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    @media print {
        .print-button {
            display: none !important;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h1 class="text-center">Receipt</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Waktu Pesanan</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        include "boot.php";

                        // Ambil data pembeli dari tabel 'listpembeli' berdasarkan 'no'
                        $query = "SELECT * FROM listpembeli";
                        $result = $konek->query($query);

                        // Periksa apakah query berhasil dieksekusi
                        if ($result && $result->num_rows > 0) {
                            // Inisialisasi total belanja
                            $total_belanja = 0;
                            $row_count = 1; // Variable to track row count

                            while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row_count++; ?></td> <!-- Increment row count and display -->
                            <td><?php echo $row['waktu']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['menu']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['harga_satuan']; ?></td>
                            <td><?php echo $row['total']; ?></td>
                        </tr>
                        <?php
                                // Menambahkan nilai total belanja
                                $total_belanja += $row['total'];
                            }
                            ?>
                        <tr>
                            <td colspan="6" class="text-right"><strong>Total:</strong></td>
                            <td><?php echo $total_belanja; ?></td>
                        </tr>
                        <?php
                        } else {
                            // Jika parameter 'id' tidak ditemukan atau tidak angka
                            echo "<tr><td colspan='7'>Nomor pembeli tidak valid atau tidak ditemukan.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center mt-4 print-button">
            <div class="col-md-4 text-center">
                <button class="btn btn-primary" onclick="window.print()">Print</button>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>