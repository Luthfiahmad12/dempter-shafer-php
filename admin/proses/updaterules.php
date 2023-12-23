<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Rule</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
  <?php
  include "../../koneksi.php";

  $kd_ekskull = $_POST['nama_ekskull'];
  $selectedIndikators = isset($_POST['indikator']) ? $_POST['indikator'] : [];

  // Hapus data yang tidak terdapat dalam array dari form
  $queryDel = "DELETE FROM tb_rules WHERE id_ekskull='$kd_ekskull' AND id_indikator NOT IN (" . implode(',', $selectedIndikators) . ")";
  $resultDel = mysqli_query($koneksi, $queryDel);

  // var_dump($kd_ekskull);

  // Proses inputan indikator
  foreach ($selectedIndikators as $indikator) {
    // Cek apakah data indikator
    $query = "SELECT * FROM tb_rules WHERE id_ekskull='$kd_ekskull' AND id_indikator='$indikator'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_array($result);

    // mulai masuk ke db
    if (!$row) {
      $sql = "INSERT INTO tb_rules (id_ekskull, id_indikator, bobot) VALUES ('$kd_ekskull', '$indikator', '0')";
    } else {
      $sql = "UPDATE tb_rules SET bobot='{$row['bobot']}' WHERE id_ekskull='$kd_ekskull' AND id_indikator='$indikator'";
    }
    $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
  }

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
  ?>

</body>

</html>