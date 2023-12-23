<?php
include('koneksi.php');
if(isset($_GET['id_berita'])) 
{
    $query = mysqli_query($koneksi,"select * from tb_berita where id_berita='".$_GET['id_berita']."'");
    $row = mysqli_fetch_array($query);
    echo $row["gambar"];
}
else
{
    header('location:index.php');
}
?>