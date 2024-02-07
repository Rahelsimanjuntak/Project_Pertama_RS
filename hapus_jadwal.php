<?php
// include database connection file
include 'koneksi.php';
$kode = $_GET['kode'];
$result = mysqli_query($koneksi, "DELETE FROM jadwalkuliah WHERE kode='$kode'") or die(mysqli_error($koneksi));
header("Location: jadwalkuliah.php");
?>