<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>update bobot</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
  <?php
  include "../../koneksi.php";
  $kd_indikator = $_POST['id_indikator'];
  $kd_ekskull = $_POST['id_ekskull'];
  $bobot = $_POST['update_bobot'];
  // jika data nol maka simpan data
  $perintah = "UPDATE tb_rules SET bobot='$bobot' WHERE id_indikator='$kd_indikator' AND id_ekskull='$kd_ekskull' ";
  $berhasil = mysqli_query($koneksi, $perintah) or die(" Data tidak masuk database / data telah ada " . mysqli_error($koneksi));
  if ($berhasil) {
    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Data Berhasil Update!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '../rules/rules.php';
        }
    }); 
    </script>";
  } else {
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal Update!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '../rules/rules.php';
        }
    }); 
    </script>";
  }

  ?>

</body>

</html>