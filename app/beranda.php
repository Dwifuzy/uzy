<?php
session_start();
$user = $_SESSION['user'];
if ($user == "") {


?>
  <script>
    document.location = '../beranda.php';
  </script>
<?php
} else {

  include "boot.php";

?>

  <body>


   <!-- navbar -->
<div class="container rounded-0">
  <nav class="navbar navbar-expand-lg mt-2" style="background-color:#de3b3b;">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="#">Catering</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-light">&#9776;</span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <form class="d-flex" role="search" method="GET" action="listmenu.php" target="konten">
          <input class="form-control me-2 rounded-0" type="search" name="q" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light rounded-0" type="submit"><i class="bi bi-search"></i></button>
        </form>
      </div>
    </div>
  </nav>

  <!-- navbar penutup -->


      <!-- list group -->
      <div class="row mt-2">
        <div class="col-3">
          <div class="card rounded-0">
            <ul class="list-group list-group-flush">
              </a>
              <a href="menuberanda.php" target="konten" style="text-decoration: none;">
                <li class="list-group-item">Daftar Menu</li>
              </a>
              <a href="inputmenu.php" target="konten" style="text-decoration: none;">
                <li class="list-group-item">Input Menu</li>
              </a>
              <a href="listmenu.php" target="konten" style="text-decoration: none;">
                <li class="list-group-item">List Menu</li>
              </a>
              <a href="listpembeli.php" target="konten" style="text-decoration: none;">
                <li class="list-group-item">List Pembeli</li>
              </a>
              <a href="rekap.php" target="konten" style="text-decoration: none;">
                <li class="list-group-item">Rekap</li>
              </a>
              <a href="log_out.php" style="text-decoration: none;">
                <li class="list-group-item">Keluar</li>
              </a>
            </ul>
          </div>
        </div>


        <div class="col">
          <iframe src="" name="konten" frameborder="0" width="100%" height="800"></iframe>
        </div>
      </div>
      <!-- list group penutup -->
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

  </html>
<?php
}
?>