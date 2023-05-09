<?php
class menu
{
  function __construct()
  {
    include "menu.php";
  }
}
$menu = new menu;

$db = new database();

$user = $db->tampilLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Data User</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="../templates/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <!-- my CSS -->
  <style>
    body {
      background-color: #f5f5f5;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>

<body class="sb-nav-fixed hijauNom">
  <div id="layoutSidenav">
    <div id="layoutSidenav_content">
      <!-- Customisasi di dalam tag main! -->
      <main>
        <div class="container overflow-hidden">
          <h1 class="mt-4 mb-5 display-5"><i class="fa-solid fa-users text-secondary"></i> Data Pengguna</h1>
          <div class="row ms-4 ps-2 pb-5">
            <div class="card  ms-5 p-2 shadow-sm" style=" width: 18rem;">
              <ul class="list-group list-group-flush">
                <?php foreach ($user as $row) : ?>
                  <li class="list-group-item text-uppercase"><strong><?= $row['nama']; ?></strong>
                    <!-- <?php // if (!($row['id_login'] == $_SESSION['id_login'])) : 
                          ?> -->
                    <?php if (!($row['level'] == 'Admin')) : ?>
                      <a href="<?= "prosesEditUser.php?aksi=delete&&id=$row[id_login]"; ?>" class="badge bg-danger rounded-3 float-end text-light" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></a>
                    <?php endif; ?>
                  </li>
                  <li class="list-group-item">Status : <?= $row['level']; ?>
                    <?php
                    //  menampilkan icon ketika beberapa user sedang aktif atau tidak
                    if ($row['id_login'] == $_SESSION['id_login']) {
                      echo "<i class='fa-solid fa-circle text-success'></i>";
                    }  ?>
                  <?php endforeach; ?>
                  </li>
              </ul>
            </div>
          </div>
        </div>
      </main>
      <footer class="py-3 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Ega Permana 2022</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../templates/js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="../templates/assets/demo/chart-area-demo.js"></script>
  <script src="../templates/assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="../templates/js/datatables-simple-demo.js"></script>
  <!-- agar saat mereload halaman tidak memunculkan resubmition form -->
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>