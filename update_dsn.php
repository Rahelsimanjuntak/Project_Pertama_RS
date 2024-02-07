<?php
// include database connection file
include 'koneksi.php';
$nim= $_POST['nidn'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jurusan=$_POST['jabatan'];
$result = mysqli_query($koneksi, "UPDATE dosen SET
nama='$nama',alamat='$alamat',jabatan='$jurusan' WHERE nidn='$nim'");
// Redirect to homepage to display updated user in list
header("Location: dosen.php");
?>