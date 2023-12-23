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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <style>
    .setrule {
      background-color: #4154f1;
      border: none;
      color: white;
      padding: 5px 20px;
      border-radius: 3px;
    }

    .setrule:hover {
      background-color: #717ff5;
      border: none;
      color: white;
      padding: 5px 20px;
      border-radius: 3px;
    }

    .reset {
      background-color: #dc3545;
      border: none;
      color: white;
      padding: 5px 20px;
      border-radius: 3px;
    }

    .reset:hover {
      background-color: #d76873;
      border: none;
      color: white;
      padding: 5px 20px;
      border-radius: 3px;
    }

    .cekbok {
      cursor: pointer;
      width: 18px;
      height: 18px;
    }

    .back-to-top {
      display: block;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      /* tambahkan ini untuk membuat bentuk bulat */
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      /* tambahkan ini untuk menambahkan shadow */
      text-align: center;
      line-height: 40px;
    }

    .back-to-top i {
      font-size: 20px;
      color: #fff;
    }
  </style>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.back-to-top').click(function() {
        $('html, body').animate({
          scrollTop: 0
        }, 'slow');
      });
    });
  </script>
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
        <a class="nav-link collapsed " href="../index.php">
          <i class="bi bi-house"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-database"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
        <a class="nav-link" href="../rules/rules.php">
          <i class="bi bi-boxes"></i>
          <span>Rule Dempster Shafer</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../laporan/lapIndikator.php">
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
      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-bs-toggle="modal" data-bs-target="#logoutmodal">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <?php
    include "../../koneksi.php";
    ?>

    <div class="pagetitle">
      <h1>Rule Dempster Shafer</h1>
      <nav style="--bs-breadcrumb-divider: '>';">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Admin</a></li>
          <li class="breadcrumb-item active">Rule Dempster Shafer</li>
        </ol>
      </nav>
      <hr>
    </div><!-- End Page Title -->

    <section>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <div class="konten">
              <form id="form1" name="form1" method="post" action="../proses/simpanrules.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                <h4 class="text-center mt-3 mb-3">Tambah Rule Minat Bakat Ekstrakurikuler</h4>
                <div class="container mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="mb-3 mt-3">
                            <label for="id_indikator" class="form-label"><strong>Pilih Indikator</strong></label>
                            <ul class="list-group">
                              <?php
                              $arrIndikator = array();
                              $query = mysqli_query($koneksi, "SELECT * FROM tb_indikator ORDER BY id") or die("Query Error..!" . mysqli_error($koneksi));
                              while ($row = mysqli_fetch_array($query)) {
                                $arrIndikator["$row[id]"] = $row['kode_indikator'] . "," . $row['indikator'];
                              ?>
                                <li class="list-group-item">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="id_indikator<?php echo $row['id']; ?>" name="id_indikator[]" value="<?php echo $row['id']; ?>">
                                    <label class="form-check-label" for="id_indikator<?php echo $row['id']; ?>">
                                      <?php echo $row['kode_indikator'] . "<strong>&nbsp;|&nbsp;</strong>" . $row['indikator']; ?>
                                    </label>
                                  </div>
                                </li>
                              <?php } ?>
                            </ul>
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="ekskull_list" class="form-label"><strong>Pilih Ekstrakurikuler</strong></label>
                            <select class="form-select" name="ekskull_list" id="ekskull_list" required>
                              <option value="NULL">Daftar Ekstrakurikuler</option>
                              <?php
                              $sqlp = "SELECT * FROM tb_ekskull ORDER BY id";
                              $qryp = mysqli_query($koneksi, $sqlp) or die("SQL Error: " . mysqli_error($koneksi));
                              while ($datap = mysqli_fetch_array($qryp)) {
                                if ($datap['id'] == $kdsakit) {
                                  $cek = "selected";
                                } else {
                                  $cek = "";
                                }
                                $arrEkskull["$datap[id]"] = $datap['nama'];
                                echo "<option value='$datap[id]' $cek>$datap[code_ekskull]&nbsp;|&nbsp;$datap[nama]</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="bobot" class="form-label"><strong>Nilai Belief/Bobot</strong></label>
                            <input type="text" class="form-control" name="bobot" size="5" required>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Tambah Rule</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <table class="table table-striped table-hover table-bordered mt-4">
              <thead>
                <tr>
                  <!-- <th>No</th> -->
                  <th class="text-center">Kode Indikator | Nama Indikator</th>
                  <?php
                  // include "../../koneksi.php";
                  $query_p = mysqli_query($koneksi, "SELECT id_ekskull FROM tb_rules GROUP BY id_ekskull");
                  while ($data_p = mysqli_fetch_array($query_p)) {
                  ?>
                    <th class="text-center">
                      <?php $idp = $data_p['id_ekskull'];
                      $query_code = mysqli_query($koneksi, "SELECT code_ekskull FROM tb_ekskull where id='$idp'");
                      $result_code = mysqli_fetch_assoc($query_code);
                      $code_ekskull = $result_code['code_ekskull'];
                      // var_dump($result_code);
                      echo "$code_ekskull | ";
                      print_r($arrEkskull["$idp"]); ?><br>
                      <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editRuleModal-<?php echo $data_p['id_ekskull']; ?>">
                        Edit
                      </button>

                      <!-- edit modal -->
                      <div class="modal fade" id="editRuleModal-<?php echo $data_p['id_ekskull']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRuleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                          <div class="modal-content">
                            <div class="modal-header" style="background:linear-gradient(to top, #0CC, #09C);">
                              <h5 class="modal-title mx-auto">Edit Rule</h5>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="../proses/updaterules.php" enctype="multipart/form-data">
                                <table class="table">
                                  <tbody>
                                    <tr>
                                      <td colspan="2">
                                        <ul class="list-group mt-3">
                                          <?php
                                          $list_indikator = mysqli_query($koneksi, "SELECT * FROM tb_indikator ORDER BY id ASC") or die("Query Error..!" . mysqli_error($koneksi));
                                          while ($row = mysqli_fetch_array($list_indikator)) {
                                            //mencari data indikator yang di edit
                                            $kd_ekskull = $data_p['id_ekskull'];
                                            $kd_indikator = $row['id'];
                                            $kueri = mysqli_query($koneksi, "SELECT * FROM tb_rules WHERE id_ekskull='$kd_ekskull' AND id_indikator='$kd_indikator' ORDER BY id_indikator desc ");
                                            $edit = mysqli_fetch_array($kueri);
                                            if ($edit) {
                                              $checked = explode(', ', $edit['id_indikator']);
                                            } else {
                                              $checked = [];
                                            }
                                          ?>
                                            <li class="list-group-item">
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="indikator[]" id="indikator<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>" <?php echo (in_array($row['id'], $checked) ? 'checked' : ''); ?>>
                                                <label class="form-check-label" for="indikator<?php echo $row['id']; ?>">
                                                  <?php echo $row['kode_indikator']; ?>&nbsp; |&nbsp;&nbsp;<?php echo $row['indikator']; ?>
                                                </label>
                                              </div>
                                            </li>
                                          <?php }
                                          // var_dump($row['id']);
                                          ?>
                                        </ul>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!-- <div class="card"> -->
                                <div class="card-body text-danger">
                                  <?php
                                  $sqlp = "SELECT * FROM tb_ekskull WHERE id='$kd_ekskull' ";
                                  $qryp = mysqli_query($koneksi, $sqlp) or die("SQL Error: " . mysqli_error($koneksi));
                                  while ($datap = mysqli_fetch_array($qryp)) {
                                    echo "
                                    <h5>
                                    <strong>Ekstrakurikuler = $datap[code_ekskull]&nbsp;|&nbsp;$datap[nama]</strong>
                                    </h5>";
                                  }
                                  ?>
                                  <input type="hidden" name="nama_ekskull" value="<?php echo $kd_ekskull; ?>" />
                                </div>
                                <!-- </div> -->
                                <div class="d-grid gap-2">
                                  <button type="submit" class="btn btn-warning mt-4 btn-md">Update</button>
                                  <button type="button" class="btn btn-danger btn-md" data-bs-dismiss="modal">Batal</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </th><?php
                        } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM tb_rules GROUP BY id_indikator ORDER BY id_indikator ASC ") or die(mysqli_error($koneksi));
                $no = 0;
                if (mysqli_num_rows($query) > 0) {
                  while ($row = mysqli_fetch_array($query)) {
                    $idEkskull = $row['id_ekskull'];
                    $no++;
                ?>
                    <tr>
                      <!-- <td valign="top" class="text-center"><?php echo $no; ?></td> -->
                      <td>
                        <?php
                        $idG = $row['id_indikator'];
                        $arrIndikatorValue = $arrIndikator["$idG"];
                        list($kodeIndikator, $namaIndikator) = explode(",", $arrIndikatorValue);
                        echo "<strong>$kodeIndikator |</strong> $namaIndikator";
                        ?>
                      </td>
                      <?php
                      $query_pb = mysqli_query($koneksi, "SELECT id_ekskull FROM tb_rules GROUP BY id_ekskull ");
                      while ($data_pb = mysqli_fetch_array($query_pb)) {
                      ?>
                        <td>
                          <?php
                          $kdEkskull = $data_pb['id_ekskull'];
                          $kdIndikator = $row['id_indikator'];
                          $Get_rule = mysqli_query($koneksi, "SELECT * FROM tb_rules WHERE id_ekskull='$kdEkskull' AND id_indikator='$kdIndikator' ");
                          // var_dump($Get_rule);
                          while ($data_GB = mysqli_fetch_array($Get_rule)) { ?>
                            <center>
                              <a href="./editbobot.php?id_ekskull=<?php echo $kdEkskull ?>&id_indikator=<?php echo $kdIndikator ?>&bobot=<?php echo $data_GB['bobot'] ?>">
                                <strong><?php echo $data_GB['bobot']; ?></strong>
                              </a>
                            </center>
                          <?php } ?>
                        </td>
                      <?php } ?>
                    </tr>
                  <?php
                  }
                } else { ?>
                  <tr>
                    <td colspan="3" class="text-center">Tidak ada data.</td>
                  </tr>';
                <?php } ?>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    function validateForm() {
      // Ambil semua checkbox yang memiliki nama "gejala[]"
      var checkboxes = document.getElementsByName("id_indikator[]");
      // Inisialisasi counter untuk menghitung jumlah checkbox yang tercentang
      var count = 0;
      // Iterasi setiap checkbox
      for (var i = 0; i < checkboxes.length; i++) {
        // Jika checkbox tercentang, tambah counter
        if (checkboxes[i].checked) count++;
      }
      // Jika tidak ada checkbox yang tercentang, tampilkan pesan error
      if (count == 0) {
        Swal.fire({
          icon: 'error',
          text: 'Maaf, Anda harus memilih minimal 1 Indikator!',
        });
        return false;
      }
      // Jika validasi berhasil, submit form
      return true;
    }
  </script>

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


</body>

</html>