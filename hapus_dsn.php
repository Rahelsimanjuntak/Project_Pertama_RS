<?php
// include database connection file
include 'koneksi.php';
$nim = $_GET['nidn'];
$result = mysqli_query($koneksi, "DELETE FROM dosen WHERE nidn='$nim'");
header("Location:dosen.php");
?>