<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from tb_admin where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
  $_SESSION['username'] = $username;
  $_SESSION['nama'] = $nama;
  $_SESSION['status'] = "login";
  header("location:./index.php");
} else {
  header("location:./login.php?login=failed");
}
