<?php
include "../../koneksi.php";
$kdubahberita = $_GET['kdubahberita'];
if ($kdubahberita != "") {
  #menampilkan data
  $sql = "SELECT * FROM tb_berita WHERE id_berita='$kdubahberita'";
  $qry = mysqli_query($koneksi, $sql)
    or die("SQL ERROR" . mysqli_error($koneksi));
  $data = mysqli_fetch_array($qry);
  #samakan dengan variabel form
  $id_berita = $data['id_berita'];
  $edit_id_berita = $data['id_berita'];
  $edit_judul = $data['judul'];
  $edit_isi = $data['isi'];
  $edit_gambar = $data['gambar'];
  if (empty($edit_gambar)){
    ("UPDATE berita SET judul=:judul, isi=:isi,  WHERE id=:id_berita");
  }
  else{
    $gambar_baru = date ('dmYHis').$edit_gambar;
    $path ="img/".$gambar_baru;
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>Edit Data Berita</title>
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="../../assets/img/durian.png" rel="icon">

</head>

<body>

  <div class="card col-md-6 mx-auto mt-5">
    <div class="card-body">
      <h4 class="text-center">Edit Berita</h4>
      <form method="post" action="./editberita2.php" enctype="multipart/form-data">
       <div class="form-group mb-2">
          <label for="judul">Id Berita :</label>
          <input type="hidden" class="form-control" id="edit_berita" name="id_berita" value="<?php echo $id_berita; ?>">
        </div>
        <div class="form-group mb-2">
          <label for="judul">Judul :</label>
          <input type="text" class="form-control" id="edit_berita" name="edit_judul" value="<?php echo $edit_judul; ?>">
        </div>
        <div class="form-group mb-2">
          <label for="isi">Isi :</label>
          <textarea class="form-control" rows="3" id="edit_isi" name="edit_isi"><?php echo $edit_isi; ?></textarea>
        </div>
        <div class="form-group">
          <label for="gambar">Gambar :</label>
          <input type="file" name="edit_gambar" class="file" <?php echo $edit_gambar; ?>>
        </div>
        <div class="d-grid gap-2">
          <button type="submit" name="simpan" id="simpan" class="btn btn-primary mt-4 btn-sm">Update</button>
          <a href="./berita.php" type="button" class="btn btn-danger btn-sm" name="batal" id="batal">Batal</a>
        </div>
      </form>
    </div>
  </div>

</body>

</html>