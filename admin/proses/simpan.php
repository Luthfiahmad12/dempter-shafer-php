<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>simpan data</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>

  <?php
  include "../../koneksi.php";
  $kode_indikator = $_POST['kode_indikator'];
  $indikator = $_POST['indikator'];

  //cek keberadaan data
  $sqlrs = mysqli_query($koneksi, "SELECT kode_indikator FROM tb_indikator WHERE kode_indikator='$kode_indikator'");
  $rs = mysqli_num_rows($sqlrs);
  if ($rs == 0) {
    $perintah = "INSERT INTO tb_indikator (kode_indikator,indikator) VALUES ('$kode_indikator','$indikator')";
    $berhasil = mysqli_query($koneksi, $perintah);

    //jika data berhasil disimpan
    if ($berhasil) {
      echo "<script>
              Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Disimpan!'
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
  } else {
    echo "<script>
              Swal.fire({
                icon: 'info',
                title: 'Kode $kode_indikator Telah Ada di Database!',
                text: 'Maaf kode indikator $kode_indikator Telah ada di database, Masukkan Kode Indikator yang lain!',
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