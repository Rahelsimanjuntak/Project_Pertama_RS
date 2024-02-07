<?php
// include database connection file
include 'koneksi.php';
$nim = $_GET['nim'];
$result = mysqli_query($koneksi, "DELETE FROM pegawai WHERE nik='$nim'");
header("Location:pegawai.php");
?>