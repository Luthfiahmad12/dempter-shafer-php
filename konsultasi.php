<?php
include 'koneksi.php';
?>
<section>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Minat Bakat Ekstrakurikuler Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="./img/logofix.png" rel="icon">
  </head>

  <body>

    <?php
    include 'koneksi.php';
    ?>

    <div class="card mt-4 col-md-7 mx-auto">
      <div class="mt-4">
        <a href="index.php" type="button" class="btn btn-outline-danger btn-md ms-3">
          <i class="bi bi-arrow-bar-left"></i>
          Kembali</a>
      </div>
      <h4 class="text-dark d-flex justify-content-center mt-4">Proses Konsultasi Minat Bakat Ekstrakurikuler</h4>
      <div class="card-body">
        <div class="bg-info bg-gradient rounded-1">
          <h3 class="mt-4 ms-2 p-1 warning-heading warning-text">Petunjuk Pengisian!</h3>
          <p class="ms-3 me-2 pb-2">Proses konsultasi terdiri dari beberapa <strong>pernyataan</strong>. Selanjutnya, anda diminta untuk memilih indikator sesuai dengan kebiasaan anda. Bacalah dan pilih setiap indikator dengan teliti dan seksama.</p>
        </div>



        <form action="hasilkonsultasi.php" method="POST">
          <div class="mb-3">
            <label for="namauser" class="form-label">Nama</label>
            <input type="text" name="namauser" class="form-control" id="namauser" aria-describedby="Nama" required>
          </div>
          <div class="mb-3">
            <label for="alamatuser" class="form-label">Alamat</label>
            <textarea name="alamatuser" id="alamatuser" class="form-control" required></textarea>
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="datepicker" required>
          </div>
          <h5 class="text-secondary text-center mt-4">Pilih Indikator</h5>

          <?php
          $sqli = "SELECT * FROM tb_indikator";
          // $result = mysqli_query($koneksi, $sqli);
          $result = $koneksi->query($sqli);
          while ($row = $result->fetch_object()) {
            echo "<hr>";
            echo "<label class='form-check-label' for='checkbox{$row->id}' style='cursor: pointer;'>";
            echo "<input style='cursor: pointer; width:15px;height:15px;' class='form-check-input' type='checkbox' id='checkbox{$row->id}' name='list_indikator[]' value='{$row->id}'";

            if (isset($_POST['list_indikator']) && in_array($row->id, $_POST['list_indikator'])) {
              echo " checked";
            }

            echo ">&ensp; {$row->indikator}</label><br>";
          }
          ?>

          <div class="mt-4 text-center">
            <button class="btn btn-outline-success btn-md" onclick="return validateForm();" style="width: 130px; height: 40px; cursor: pointer; box-shadow: 0 0 10px rgb(255, 250, 240);">
              <i class="bi bi-send-plus"></i></i> Diagnosa</button>

          </div>



        </form>
        <script>
          function validateForm() {
            var boxes = document.getElementsByName("list_indikator[]");
            var checkboxesChecked = 0;
            for (var i = 0; i < boxes.length; i++) {
              if (boxes[i].checked) {
                checkboxesChecked++;
              }
            }
            if (checkboxesChecked < 2) {
              Swal.fire({
                icon: 'warning',
                text: 'Maaf, Anda harus memilih minimal 2 Indikator!',
              });
              return false;
            }
          }
        </script>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
      flatpickr("#datepicker", {
        dateFormat: "Y-m-d",
        enableTime: false,
      });
    </script>
  </body>

  <footer class="footer">Sistem Pakar Minat Bakat Ekstrakurikuler Siswa || 2023</footer>

</section>