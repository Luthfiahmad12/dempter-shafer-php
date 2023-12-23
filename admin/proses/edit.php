<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>update data</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
  <?php
  include "../../koneksi.php";

  $id = $_POST['id'];
  $kd_indikator = $_POST['kode_indikator'];
  $indikator = $_POST['indikator'];
  $sql = "UPDATE tb_indikator SET kode_indikator='$kd_indikator', indikator='$indikator' WHERE id='$id'";
  // $sql = "UPDATE tb_indikator SET indikator='$indikator' WHERE id='$kd_indikator'";

  $result = mysqli_query($koneksi, $sql) or die("SQL Error : " . mysqli_error($koneksi));

  if ($result) {
    echo "<script>
              Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Diupdate!'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = '../indikator/indikator.php';
                }
              });
            </script>";
  } else {
    echo "<script>
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Maaf, terjadi kesalahan. Silakan coba lagi!',
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = '../indikator/indikator.php';
                }
              });
            </script>";
  }
  ?>
</body>

</html>