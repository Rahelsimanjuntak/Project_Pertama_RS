<?php
include 'koneksi.php';
$nim = $_POST['nik'];
$nama = $_POST['nama'];
$jurusan = $_POST['bagian'];
$input = mysqli_query($koneksi,"INSERT INTO pegawai
VALUES('$nim','$nama','$jurusan')") or die(mysql_error());
if($input){
echo "Data Berhasil Disimpan";
header("location:pegawai.php");
}else{
echo "Gagal Disimpan";
}
?>