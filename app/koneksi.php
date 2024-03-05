<?php

$konek = new mysqli("localhost", "root", "", "catering");


if ($konek->connect_error) {
    die("Koneksi gagal: " . $konek->connect_error);
}
?>


