<?php
include "boot.php";
include "koneksi.php";


$row = [];


if (isset($_GET['no'])) {
    
    $id = $_GET['no'];

    
    $query = "SELECT nama, menu,jumlahpesa, total, jumlahbayar, kembalian FROM listpembeli WHERE no = '$id'";

    $result = mysqli_query($konek, $query);

    
    if ($result) {
      
        $row = mysqli_fetch_assoc($result);
    } else {
     
        echo "Error: " . $query . "<br>" . mysqli_error($konek);
    }
}
?>
<!<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bukti Transaksi</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
        .container {
            margin-top: 50px;
        }

        .card {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        @media print {
            .print-button {
                display: none !important;
            }

            #print-date {
                text-align: center !important;
            }
        }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-3" id="print-date"></div>
                            <h4 class="card-title text-center mb-4">Bukti Transaksi</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Nama Pembeli</th>
                                        <td><?php echo isset($row['nama']) ? $row['nama'] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Menu</th>
                                        <td><?php echo isset($row['menu']) ? $row['menu'] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Pesanan</th>
                                        <td><?php echo isset($row['jumlahpesa']) ? $row['jumlahpesa'] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Total Harga</th>
                                        <td><?php echo isset($row['total']) ? "RP. " . $row['total'] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Bayar</th>
                                        <td><?php echo isset($row['jumlahbayar']) ? "RP. " . $row['jumlahbayar'] : ''; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Kembalian</th>
                                        <td><?php echo isset($row['kembalian']) ? "RP. " . $row['kembalian'] : ''; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4 print-button">
                <div class="col-md-8 text-center">
                    <button class="btn btn-primary" onclick="window.print()">Print</button>
                    <a href="listpembeli.php" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>

        <script>
        
        function getCurrentDateTime() {
            var currentDateTime = new Date();
            var date = currentDateTime.toLocaleDateString('id-ID');
            var time = currentDateTime.toLocaleTimeString('id-ID');
            return date + ' ' + time;
        }

        
        document.getElementById('print-date').innerText = 'Tanggal Cetak: ' + getCurrentDateTime();
        </script>
    </body>

    </html>