<?php
// include database connection file
include 'koneksi.php';
$nim= $_POST['nik'];
$nama=$_POST['nama'];
$jurusan=$_POST['bagian'];
$result = mysqli_query($koneksi, "UPDATE pegawai SET
nama='$nama',bagian='$jurusan' WHERE nik='$nim'");
// Redirect to homepage to display updated user in list
header("Location: pegawai.php");
?>