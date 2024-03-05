<form enctype="multipart/form-data" action="" method="post">
    NAMA :<input type="text" name="nama">
    GAMBAR :<input type="file" name="gambar">
    <input type="sumbit" name="simpan" value="simpan">
</form>

<?php
$konek= new mysqli ("localhost","root","","catering") or die ("error");

if (isset($_POST['simpan'])){
    $nama=$_FILES['gambar']['name'];

    move_uploaded_file($file,"../img/$nama");
    $konek-> query("insert into gambar(nama,gambar) values ('$_POST[nama]','$nama')");
}

$tampil = $konek -> query ("select* from gambar");

while ($a= $tampil->fetch_array()){

    echo " <img src='../img/".$a['gambar']."' width=500 height=300>";
}

?>