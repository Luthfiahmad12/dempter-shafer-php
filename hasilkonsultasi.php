<?php
include 'koneksi.php';
// mengaktifkan session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Pakar Minat Bakat Ekstrakurikuler Siswa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Pakar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


  <link rel="stylesheet" href="css/style.css">
  <link href="./img/logofix.png" rel="icon">

  <style>
    .gejala {
      color: red;
      padding: 5px;
      display: flex;
      justify-content: center;
    }

    .form {
      margin-top: 70px;
    }

    .diagnosa {
      margin: 10px;
      max-height: 300px;
      overflow: auto;
      border: 3px solid #a3f0ff;
      letter-spacing: 2px;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="container">
      <h1 class="text-center mt-5">Hasil Diagnosa Minat Bakat Ekstrakurikuler Siswa</h1>
      <br>
      <div class="row">
        <div class="col-4">
          <div class="card">
            <div class="card-header text-center">Detail User</div>
            <div class="card-body">
              <img class="card-img-top text-center" src="./img/user.png" width="10px" alt="Card image cap">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nama:</strong> <?php echo $_POST['namauser'] ?></li>
                <li class="list-group-item"><strong>Alamat:</strong> <?php echo $_POST['alamatuser'] ?></li>
                <li class="list-group-item"><strong>Tanggal:</strong> <?php echo $_POST['tanggal'] ?></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="card">

            <?php
            include 'koneksi.php';

            //Mengambil Nilai Bobot Indikator Yang dipilih
            if (isset($_POST['list_indikator'])) { {
                // var_dump($_POST['list_indikator']); die();
                // Eksekusi query untuk mendapatkan kode dan nama indikator
                $indikatorSelected = $_POST['list_indikator'];
                $indikator = "";
                echo "<div class='card-header text-center'>Indikator yang dipilih User</div>";
                echo "<div class='card-body'>";
                echo '<table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Kode</th>
                    <th>Indikator</th>
                </tr>
            </thead>
            <tbody>';
                foreach ($indikatorSelected as $select) {
                  $qry = mysqli_query($koneksi, "SELECT * FROM tb_indikator WHERE id='$select'");
                  while ($data = mysqli_fetch_array($qry)) {
                    echo '<tr>
                      <td>' . $data['kode_indikator'] . '</td>
                      <td>' . $data['indikator'] . '</td>
                    </tr>';
                    $indikator .= $data['kode_indikator'] . ",";
                  }
                }
                echo '</tbody>';
                echo '</table>';
                echo "</div>";
                echo '</div> </div> </div>';
            ?>
                <?php

                $sql = "SELECT GROUP_CONCAT(b.code_ekskull), a.bobot
          FROM tb_rules a
          JOIN tb_ekskull b ON a.id_ekskull = b.id
          WHERE a.id_indikator IN (" . implode(',', $_POST['list_indikator']) . ")
          GROUP BY a.id_indikator";

                $result = $koneksi->query($sql);

                // var_dump($result);

                // Mengambil hasil query dan menyimpannya dalam array $list_indikator
                $list_indikator = array();
                while ($row = $result->fetch_row()) {
                  $list_indikator[] = $row;
                }

                // Query kedua: Menggabungkan semua code_ekskull dari tb_ekskull
                $sql = "SELECT GROUP_CONCAT(code_ekskull) FROM tb_ekskull";

                $result = $koneksi->query($sql);

                // Mengambil hasil query dan menyimpannya dalam variabel $fod
                $row = $result->fetch_row();
                $fod = $row[0];


                //menentukan nilai densitas
                // echo "<br>";
                // echo "<b>Nilai Densitas </b>\n";
                $densitas_baru = array();
                while (!empty($list_indikator)) {
                  $densitas1[0] = array_shift($list_indikator);
                  $densitas1[1] = array($fod, 1 - $densitas1[0][1]);
                  $densitas2 = array();
                  if (empty($densitas_baru)) {
                    $densitas2[0] = array_shift($list_indikator);
                  } else {
                    foreach ($densitas_baru as $k => $r) {
                      if ($k != "&theta;") {
                        $densitas2[] = array($k, $r);
                      }
                    }
                  }
                  $theta = 1;
                  foreach ($densitas2 as $d) $theta -= $d[1];
                  $densitas2[] = array($fod, $theta);
                  $m = count($densitas2);
                  $densitas_baru = array();
                  for ($y = 0; $y < $m; $y++) {
                    for ($x = 0; $x < 2; $x++) {
                      if (!($y == $m - 1 && $x == 1)) {
                        $v = explode(',', $densitas1[$x][0]);
                        $w = explode(',', $densitas2[$y][0]);
                        sort($v);
                        sort($w);
                        $vw = array_intersect($v, $w);
                        if (empty($vw)) {
                          $k = "&theta;";
                        } else {
                          $k = implode(',', $vw);
                        }
                        if (!isset($densitas_baru[$k])) {
                          $densitas_baru[$k] = $densitas1[$x][1] * $densitas2[$y][1];
                        } else {
                          $densitas_baru[$k] += $densitas1[$x][1] * $densitas2[$y][1];
                        }
                      }
                    }
                  }
                  foreach ($densitas_baru as $k => $d) {
                    if ($k != "&theta;") {
                      $densitas_baru[$k] = $d / (1 - (isset($densitas_baru["&theta;"]) ? $densitas_baru["&theta;"] : 0));
                    }
                  }
                  // print_r($densitas_baru);
                }
                //menentukan urutan ekskull
                // menghancurkan variabel yang ditentukan
                unset($densitas_baru["&theta;"]);
                // mengurutkan array berdasarkan nilai
                arsort($densitas_baru);
                // print_r($densitas_baru);
                ?>

            <?php
                $arrEkskull = array();
                $qry = mysqli_query($koneksi, "SELECT * FROM tb_ekskull");
                while ($data = mysqli_fetch_array($qry)) {
                  $arrEkskull["$data[code_ekskull]"] = $data['nama'];
                }
                $datasolusi = array();
                $datasolusi = array_intersect_key($arrEkskull, $densitas_baru);
                foreach ($datasolusi as $k => $a) {
                  foreach ($densitas_baru as $kdEkskull => $ranking) {
                    if ($k == $kdEkskull) {
                      $strS = mysqli_query($koneksi, "SELECT * FROM tb_ekskull WHERE code_ekskull='$k' ");
                      $dataS = mysqli_fetch_array($strS);
                    }
                  }
                }
                //menampilkan hasil
                echo "<p style = 'text-align:center;'>";
                $codes = array_keys($densitas_baru);
                $final_codes = explode(',', $codes[0]);
                $sql = "SELECT GROUP_CONCAT(nama) FROM tb_ekskull WHERE code_ekskull IN('" . implode("','", $final_codes) . "')";
                $result = $koneksi->query($sql);
                $row = $result->fetch_row();
                $kepercayaan =  round($densitas_baru[$codes[0]] * 100, 2);

                // proses masuk db
                $namauser = $_POST['namauser'];
                $alamatuser = $_POST['alamatuser'];
                $tanggal = $_POST['tanggal'];

                // pisah jika ada 2 diagnosa
                $rowArray = explode(',', $row[0]);
                // $jumlah_row = count($rowArray);
                // var_dump($rowArray);
                foreach ($rowArray as $key => $value) {
                  $h = "SELECT * FROM tb_ekskull WHERE nama='$value'";
                  $r = mysqli_query($koneksi, $h);
                  if ($r) {
                    // jika diagnosa lebih dari 1 boss
                    while ($hasil = mysqli_fetch_assoc($r)) {
                      $hasilArray[] = $hasil;
                      // var_dump($hasil['id']);
                    }
                    if (!empty($hasilArray)) {
                      $idArray = array_map(function ($data) {
                        return $data['id'];
                      }, $hasilArray);
                      // Menggabungkan id dengan koma
                      $ekskullValues = implode(',', $idArray);
                    }
                  }
                }

                // insert data ke db
                $sqlrs = mysqli_query($koneksi, "INSERT INTO tb_diagnosa (nama, alamat, tanggal, ekskull, indikator, kepercayaan) VALUES('$namauser', '$alamatuser', '$tanggal', '$ekskullValues', '$indikator', '$kepercayaan')");

                echo "<div class='card text-center'>";
                echo "<div class='card-header'><b>Kesimpulan Hasil Diagnosa</b></div>";
                echo "<div class='card-body'>";
                echo "<p class='card-text diagnosa'>Saran Ekstrakurikuler berdasarkan nilai bobot masing-masing indikator adalah <strong><u>{$row[0]}</u></strong> dengan presentase sebesar <b><u>{$kepercayaan}%</u></b></p>";
                echo "</div>";
                echo "<div class='card-header text-muted'><b>Deskripsi</b><hr>";
                // menampikan hasil jika ada 2 diagnosa
                foreach ($hasilArray as $hasil) {
                  echo "<strong>$hasil[nama] => </strong>" . $hasil['deskripsi'] . "<hr><br>";
                }
                echo "</div></div>";
              }
            }
            ?>

            <div class=" d-flex justify-content-center">
              <a href="./konsultasi.php" class="btn btn-success mt-2"><i class="bi bi-arrow-clockwise"></i> Klik disini untuk Konsultasi Ulang</a>
            </div>
            <br><br>
          </div>
        </div>

</body>
<footer class="footer">Sistem Pakar Minat Bakat Ekstrakurikuler Siswa || 2023</footer>

</html>