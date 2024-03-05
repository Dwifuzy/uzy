<?php
include "koneksi.php";
$id = $_GET['id'];
$hapus = $konek->query("delete from listmenu where no='$id'");



?>
<script>
    document.location.href = 'listmenu.php';
</script>
