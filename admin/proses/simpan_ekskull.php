<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>simpa ekskull</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
  <?php
  include "../../koneksi.php";
  $code = $_POST['code_ekskull'];
  $nama_ekskull = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];

  //cek keberadaan data
  $sqlrs = mysqli_query($koneksi, "SELECT code_ekskull FROM tb_ekskull WHERE code_ekskull='$code'");
  $rs = mysqli_num_rows($sqlrs);
  if ($rs == 0) {
    $perintah = "INSERT INTO tb_ekskull(code_ekskull,nama,deskripsi)VALUES('$code','$nama_ekskull','$deskripsi')";
    $berhasil = mysqli_query($koneksi, $perintah);

    //jika data berhasil disimpan
    if ($berhasil) {
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Data Berhasil Disimpan!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '../ekskull/ekskull.php';
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
                  window.location.href = '../ekskull/ekskull.php';
                }
              });
            </script>";
    }
  } else {
    echo "<script>
              Swal.fire({
                icon: 'info',
                title: 'Kode $code Telah Ada di Database!',
                text: 'Maaf kode indikator $code Telah ada di database, Masukkan Kode Eksrakurikuler yang lain!',
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = '../ekskull/ekskull.php';
                }
              });
            </script>";
  }
  ?>
</body>

</html>