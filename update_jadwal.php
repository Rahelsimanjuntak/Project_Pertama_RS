<?php
// Include database connection file
include 'koneksi.php';

$hari = $_POST['hari'];
$jam = $_POST['jam'];
$matakuliah = $_POST['matakuliah'];
$dosen = $_POST['dosen'];
$ruangan = $_POST['ruangan'];
$kode = $_POST['kode'];

$result = mysqli_query($koneksi, "UPDATE jadwalkuliah SET hari='$hari', jam='$jam', matakuliah='$matakuliah', dosen='$dosen', ruangan='$ruangan'  
          WHERE kode='$kode'");

// Redirect to homepage to display updated user in the list
header("Location: jadwalkuliah.php");
?>
