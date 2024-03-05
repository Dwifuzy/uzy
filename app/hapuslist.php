<?php
$id = $_GET['id'];
include "koneksi.php";
$hapuslist= $konek->query("delete from listpembeli where no='$id'");
?>
<script>
    document.location.href = 'listpembeli.php';