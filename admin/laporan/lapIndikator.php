<?php
session_start();
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
  header("location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin - Sistem Pakar Diagnosa Ekstrakurikuler Siswa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../img/logofix.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <style>
    .tambah {
      background-color: #4154f1;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 3px;
    }

    .tambah:hover {
      background-color: #717ff5;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 3px;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../index.php" class="logo d-flex align-items-center">
        <img src="../../img/logofix.png" alt="logo">
        <span class="d-none d-lg-block">Sistem Pakar</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="../index.php">
          <i class="bi bi-house"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-database"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="../ekskull/ekskull.php">
              <span>Data Eksrakurikuler</span>
            </a>
          </li>
          <li>
            <a href="../indikator/indikator.php">
              <span>Data Indikator</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../rules/rules.php">
          <i class="bi bi-boxes"></i>
          <span>Rule Dempster Shafer</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="../laporan/lapIndikator.php" class="active">
              <span>Laporan Indikator</span>
            </a>
          </li>
          <li>
            <a href="../laporan/lapdiagnosa.php">
              <span>Laporan Minat Bakat</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-bs-toggle="modal" data-bs-target="#logoutmodal">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Laporan Indikator</h1>
      <nav style="--bs-breadcrumb-divider: '>';">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Admin</a></li>
          <li class="breadcrumb-item">Laporan</li>
          <li class="breadcrumb-item active">Laporan Indikator</li>
        </ol>
      </nav>
      <hr>
    </div><!-- End Page Title -->

    <section>

      <div class="dropdown bx-pull-right">
        <button class="tambah dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Pilih Eksrakurikuler
        </button>

        <ul class="dropdown-menu" role="menu">
          <?php
          include "../../koneksi.php";
          $sqlp = "SELECT * FROM tb_ekskull ORDER BY code_ekskull";
          $qryp = mysqli_query($koneksi, $sqlp) or die("SQL Error: " . mysqli_error($koneksi));
          while ($datap = mysqli_fetch_array($qryp)) {
          ?>
            <li><a class="dropdown-item" href="../laporan/lapgejala.php?data=<?php echo $datap['id']; ?>"><?php echo $datap['code_ekskull'] . " " . $datap['nama']; ?></a></li><?php } ?>
        </ul>
      </div> <br> <br>

      <div class="table-responsive mt-2">
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <?php
            if (isset($_GET['data'])) {
              $query = "SELECT nama FROM tb_ekskull where id='$_GET[data]'";
              $sql = mysqli_query($koneksi, $query) or die("SQL Error: " . mysqli_error($koneksi));
              $hasil = mysqli_fetch_array($sql);
              // var_dump($hasil);
              echo "<h5> Ekstrakurikuler <strong>" . $hasil['nama'] . "</strong></h5>";
            }
            ?>
            <tr>
              <th>No</th>
              <th>Kode Indikator</th>
              <th>Nama Indikator</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_GET['data'])) {
              $kd_ekskull = $_GET['data'];
              $sql = "SELECT * FROM tb_rules
                      INNER JOIN tb_indikator ON tb_rules.id_indikator = tb_indikator.id
                      WHERE tb_rules.id_ekskull='$kd_ekskull'";
            } else {
              $sql = "SELECT * FROM tb_indikator ORDER BY id";
            }
            $qry = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));
            $no = 0;
            while ($data = mysqli_fetch_array($qry)) {
              $no++;
            ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['kode_indikator']; ?></td>
                <td><?php echo $data['indikator']; ?></td>
              </tr><?php } ?>
          </tbody>
        </table>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- Logout Modal -->
  <div class="modal fade" id="logoutmodal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Apakah Anda yakin ingin keluar ?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <a href="../login.php" type="button" class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i> Ya</a>
          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x"></i> Tidak</button>
        </div>
      </div>
    </div>
  </div><!-- End Logout Modal-->

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>