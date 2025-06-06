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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <style>
    .table {
      border-radius: 40px;
      overflow: hidden;
      font-family: "Nunito", sans-serif;
      border-radius: 8px;
      overflow: hidden;
    }

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
              <span>Data Ekstrakurikuler</span>
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
            <a href="../laporan/lapIndikator.php">
              <span>Laporan Indikator</span>
            </a>
          </li>
          <li>
            <a href="./lapdiagnosa.php" class="active">
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
      <h1>Laporan Minat Bakat</h1>
      <nav style="--bs-breadcrumb-divider: '>';">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
          <li class="breadcrumb-item">Laporan</li>
          <li class="breadcrumb-item active">Laporan Minat Bakat</li>
        </ol>
      </nav>
      <hr>
    </div><!-- End Page Title -->

    <section>
      <div class="row">
        <div class="col-md-12">

          <!-- Trigger the modal with a button -->
          <!-- <a class="tambah" type="button" data-bs-toggle="modal" data-bs-target="#tambahmodal"><i class="bi bi-pencil-square"></i> Tambah Data</a> -->


          <div class="table-responsive">
            <table id="myTable" class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Indikator</th>
                  <th>Ekstrakurikuler</th>
                  <th>Kepercayaan (%)</th>
                  <th>Delete<input type="hidden" id="texthapus"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "../../koneksi.php";
                $sql = "SELECT * FROM tb_diagnosa  ORDER BY tanggal";
                $qry = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));
                $no = 0;
                while ($data = mysqli_fetch_array($qry)) {
                  $no++;
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['tanggal']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td>
                      <?php
                      $indikatorArray = explode(',', $data['indikator']);
                      // $row = mysqli_fetch_assoc($result);
                      // var_dump($indikatorArray);
                      $namaIndikatorArray = [];
                      // echo "$indikatorArray";
                      foreach ($indikatorArray as $idIndikator) {
                        // var_dump($idIndikator);
                        // ambil indikator berdasar id
                        $sql_ind = "SELECT indikator FROM tb_indikator WHERE kode_indikator = '$idIndikator'";
                        $result = mysqli_query($koneksi, $sql_ind);
                        $row = mysqli_fetch_assoc($result);
                        // var_dump($row);

                        // tambahkan nama indikator ke array
                        if ($row && $row['indikator'] !== null) {
                          $namaIndikatorArray[] = $row['indikator'];
                        }
                      }
                      $htmlList = '<ul>';
                      foreach ($namaIndikatorArray as $indikator) {
                        $htmlList .= '<li>' . $indikator . '</li>';
                      }
                      $htmlList .= '</ul>';

                      echo $htmlList;
                      ?>
                    </td>
                    <td>
                      <?php
                      $ekskullArray = explode(',', $data['ekskull']);
                      $namaEkskullArray = [];
                      foreach ($ekskullArray as $idEkskull) {
                        $sql_eks = "SELECT nama FROM tb_ekskull WHERE id = '$idEkskull'";
                        $result = mysqli_query($koneksi, $sql_eks);
                        $row = mysqli_fetch_assoc($result);

                        $namaEkskullArray[] = $row['nama'];
                        $nama_ekskull = implode(', ', $namaEkskullArray);
                        // var_dump($nama_ekskull);
                      }
                      echo $nama_ekskull;
                      ?>
                    </td>
                    <td><?php echo $data['kepercayaan']; ?>%</td>
                    <td><a onClick="return HapusData('<?php echo $data['id']; ?>');" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusmodal">Delete</a>
                    </td>
                  </tr><?php } ?>
              </tbody>
            </table>
          </div>
        </div>
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

  <!-- hapus Modal -->
  <div class="modal fade" id="hapusmodal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Apakah Anda ingin menghapus data ?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <a onClick="return DropData();" class="btn btn-primary btn-sm"><i class="bi bi-check-lg"></i> Ya</a>
          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x"></i> Tidak</button>
        </div>
      </div>
    </div>
  </div><!-- End hapus Modal-->

  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/jquery.truncatable.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#myTable").dataTable();
    })
  </script>

  <script type="text/javascript">
    function HapusData(xidhapus) {
      var idhapus = xidhapus;
      $("#texthapus").val(idhapus);
    }

    function DropData() {
      var data_hapus = $("#texthapus").val();
      var aksi = "lapdiagnosa";
      var datanya = "&data_hapus=" + data_hapus + "&aksi=" + aksi; //hapus data
      $.ajax({
        url: "./hapus.php",
        data: datanya,
        cache: false,
        success: function(msg) {
          if (msg == "sukses") {
            Swal.fire({
              icon: 'success',
              title: 'Data berhasil dihapus'
            }).then(() => {
              location.reload();
            });
          }
        }
      })
    }
    //expande text
    $(function() {
      $('.text').truncatable({
        limit: 100,
        more: '[<strong style="color:red;">&raquo;&raquo;&raquo;</strong>]',
        less: true,
        hideText: '[<strong>&laquo;&laquo;&laquo;</strong>]'
      });
    });
    // Line chart
    var randomScalingFactor = function() {
      return Math.round(Math.random() * 100)
    };
    var lineChartData = {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [{
          label: "My First dataset",
          fillColor: "rgba(220,220,220,0.2)",
          strokeColor: "rgba(220,220,220,1)",
          pointColor: "rgba(220,220,220,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
        },
        {
          label: "My Second dataset",
          fillColor: "rgba(151,187,205,0.2)",
          strokeColor: "rgba(151,187,205,1)",
          pointColor: "rgba(151,187,205,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(151,187,205,1)",
          data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
        }
      ]

    }

    window.onload = function() {
      var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
      window.myLine = new Chart(ctx_line).Line(lineChartData, {
        responsive: true
      });
    };

    $('#myTab a').click(function(e) {
      e.preventDefault();
      $(this).tab('show');
    });

    $('#loading-example-btn').click(function() {
      var btn = $(this);
      btn.button('loading');
      // $.ajax(...).always(function () {
      //   btn.button('reset');
      // });
    });
  </script>


</body>

</html>