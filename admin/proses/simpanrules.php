<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simpan Rules</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
  <div>
    <?php
    include "../../koneksi.php";
    if (isset($_POST['id_indikator'])) {
      $seleksi   = htmlentities(implode(',', $_POST['id_indikator']));
    }
    $data = $seleksi;
    $input = $data;

    //menampilkan outputnya
    $code_ekskull = $_POST['ekskull_list'];
    $bobot = $_POST['bobot'];
    //menyimpan data kedalam tabel relasi
    $barisinputan = $data;
    $barisinputan = $data;
    $barisinputan = explode(",", $barisinputan);
    $no = 0;
    for ($mulai = 0; $mulai < count($barisinputan); $mulai++) {
      $inputan = $barisinputan[$mulai];

      $sql = "INSERT INTO  tb_rules (id_ekskull,id_indikator,bobot) VALUES ('$code_ekskull','$inputan','$bobot' )";
      $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
      $no++;
    }
    echo "<script>
              Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Disimpan!'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = '../rules/rules.php';
                }
              });
            </script>";
    ?>
  </div>

</body>

</html>