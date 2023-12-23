<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Pakar Diagnosa Penyakit Durian Montong</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


  <link rel="stylesheet" href="css/style.css">
  <link href="img/logofix.png" rel="icon">

</head>

<body>

  <?php
  include 'koneksi.php';
  ?>


  <!-- Navigasi -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top">
    <div class="container">
      <img src="./img/logofix.png" width="50px" style="margin-right:10px">
      <a class="navbar-brand" href="#">Sistem Pakar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <li><a class="nav-link" aria-current="page" href="#">Home</a></li>
          <!-- <li><a class="nav-link" href="#berita">Berita</a></li> -->
          <li><a class="nav-link" href="#tentang">Tentang Kami</a></li>
          </li>
        </ul>
        <!-- ss -->
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <li><a class="nav-link" href="admin/login.php"><strong>Login Admin</strong></a></li>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <!-- Banner -->
  <div class="container-fluid banner">
    <div class="container text-left">
      <h3 class="display-1">Selamat Datang</h3>
      <h4 class="display-6">Website Sistem Pakar Minat Bakat Ekstrakurikuler Siswa</h4>
      <a href="konsultasi.php">
        <button type="button" class="btn- btn-danger btn-lg">
          <i class="bi bi-play"></i>
          Mulai Konsultasi
        </button>
      </a>
    </div>
  </div>

  <!-- Tentang -->
  <div class="container-fluid pt-5 pb-5 bg-light">
    <div class="container text-center">
      <h2 class="display-3 text center" id="tentang">Tentang Kami</h2>
      <div class="clearfix pt-8"><img src="./img/about-us.png" class="col-md-6 float-md-end mb-3 crop-img" width="300" height="300"></div>
      <p class="text center">Website sistem pakar ini dibuat untuk merekomendasikan ekstrakurikuller yang sesuai dengan minat siswa.</p>
      <p>Data diambil dari <strong>Rahminingrum S.Psi</strong></p>
      <p>Mahasiswa Magister Psikologi Universitas Ahmad Dahlan</p>
      <p>Kirim pertanyaan melalui email : <a href="mailto:muhamadrifkytj@gmail.com">muhamadrifkytj@gmail.com</a></p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

</body>

<footer class="footer">Sistem Pakar Minat Bakat Ekstrakurikuler Siswa || 2023</footer>

</html>