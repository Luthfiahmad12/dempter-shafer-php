<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - Sistem Pakar Diagnosa Penyakit Durian Montong</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

  <link rel="stylesheet" href="css/style.css">
  <link href="../img/logofix.png" rel="icon">

  <style>
    .login {
      background-color: #4154f1;
      border: none;
      color: white;
      padding: 7px 15px;
      border-radius: 3px;
    }

    .login:hover {
      background-color: #717ff5;
      border: none;
    }
  </style>
</head>

<body>

  <?php
  include '../koneksi.php';
  ?>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <h5 class="d-none d-lg-block">Login Setting Sistem Pakar</h5>
              </div>

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-2 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login Admin</h5>
                  </div>
                  <form action="./loginkoneksi.php" method="POST" class="row g-3">
                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group">
                        <input type="text" name="username" class="form-control" id="username" required placeholder="Masukkan username">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required placeholder="Masukkan password">
                    </div>

                    <div class="col-12 pt-2">
                      <button class="login w-100 mb-3" type="submit"><i class="bi bi-box-arrow-in-right"></i> Login</button>
                      <a href="../index.php" class="btn btn-danger w-100"><i class="bi bi-arrow-bar-left"></i>
                        Kembali ke Halaman Utama</a>
                    </div>
                  </form>
                </div>
              </div>

              <div class="credits">
                Sistem Pakar <a href="">Dempster Shafer</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    // Cek apakah login gagal
    <?php
    if (isset($_GET['login']) && $_GET['login'] == 'failed') {
    ?>
      Swal.fire({
        icon: 'error',
        title: 'Login Gagal',
        text: 'Username atau password salah. Silahkan coba lagi!',
      });
    <?php
    }
    ?>
  </script>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>