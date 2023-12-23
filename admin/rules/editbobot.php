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

  <title>Edit Nilai Bobot</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../img/logofix.png" rel="icon">

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

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body>
  <?php include "../../koneksi.php"; ?>
  <section>
    <div class="row mt-5 mx-auto">
      <div class="col-md-8 mt-2 mx-auto">
        <h3 class="text-center mb-4">Edit Nilai Bobot</h3>
        <?php
        $queryP = mysqli_query($koneksi, "SELECT * FROM tb_ekskull WHERE id='$_GET[id_ekskull]' ");
        $dataP = mysqli_fetch_array($queryP);
        // var_dump($dataP);
        ?>
        <div class="card-header">Nama Ekstrakurikuler : <strong><?php echo $dataP['nama'] ?></strong></div>
        <table class="table table-striped table-bordered mt-2">
          <thead>
            <tr class="text-center">
              <th>Kode Indikator</th>
              <th>Nama Indikator</th>
              <th>Bobot</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM tb_indikator WHERE id='$_GET[id_indikator]'") or die(mysqli_error($koneksi));
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <form action="../proses/updatebobot.php" method="post" enctype="multipart/form-data">
                <tr class="text-center">
                  <td><?php echo $row['kode_indikator']; ?></td>
                  <td><?php echo $row['indikator']; ?> </td>
                  <td>
                    <input type="hidden" name="id_indikator" value="<?php echo $_GET['id_indikator'] ?>">
                    <input type="hidden" name="id_ekskull" value="<?php echo $_GET['id_ekskull'] ?>">
                    <input name="update_bobot" type="text" class="form-control" size="2" value="<?php echo $_GET['bobot']; ?>">
                  </td>
                  <td>
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="./rules.php" class="btn btn-danger ms-2">Batal</a>
                  </td>
                </tr>
              </form>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
  </section>

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