<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>update Ekskull</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
  <?php
  include "../../koneksi.php";

  $id = $_POST['id'];
  $code = $_POST['code_ekskull'];
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $sql = "UPDATE tb_ekskull SET code_ekskull='$code',nama='$nama',deskripsi='$deskripsi' WHERE id='$id'";
  $result = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));

  if ($result) {
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Data Berhasil Diupdate!'
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