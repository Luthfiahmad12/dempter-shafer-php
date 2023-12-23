<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>Edit Data Berita</title>
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="../../assets/img/durian.png" rel="icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>

<body>
  <?php
  include "../../koneksi.php";
 
  $id_berita = $_POST['id_berita'];
  $judul = $_POST['edit_judul'];
  $isi = $_POST['edit_isi'];
 
  $gambar=$_FILES['edit_gambar']['name'];
  $tempname = $_FILES['edit_gambar']['tmp_name'];
  $target_file = 'img/' .$gambar;
  $ektensi=strtolower(pathinfo($gambar, PATHINFO_EXTENSION)); //dapatkan info gambar
  $valid_ektensi=array('jpeg','jpg','png','gif'); //ektensi yang dibloehin
  move_uploaded_file($_FILES["edit_gambar"]["tmp_name"], $target_file);

  if (empty($_FILES['edit_gambar']['name'])) {
    $sql = "UPDATE tb_berita SET judul='$judul',isi='$isi' WHERE id_berita='$id_berita'";
  } else {
    $sql = "UPDATE tb_berita SET judul='$judul',isi='$isi', gambar='$gambar' WHERE id_berita='$id_berita'";
  }
  $result = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));

  if ($result) {
    echo "<table style='margin-top:150px;' align='center'><tr><td>";
    echo "<div style='width:500px; height:50px auto; border:1px solid #CCC; font-family:Poppins; padding:3px 3px 3px 3px;'>";
    echo "<center>terima kasih, data berhasil diubah</center><br>";
    echo "<center><a href='./berita.php' class='btn btn-primary btn-sm'>OK</a></center>";
    echo "</div>";
    echo "</td></tr></table>";
  } else {
    echo "<center><font color='#ff0000'><strong>Maaf gagal mengupdate data</strong></font></center><br>";
    echo "<center><a href='./berita.php' class='btn btn-danger btn-sm'>Kembali</a></center>";
  }
  ?>
</body>

</html>