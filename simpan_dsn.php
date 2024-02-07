<?php
include 'koneksi.php';
$nim = $_POST['nidn'];
$nama = $_POST['nama'];
$alamat= $_POST['alamat'];
$jurusan = $_POST['jabatan'];
$input = mysqli_query($koneksi,"INSERT INTO dosen
VALUES('$nim','$nama','$alamat','$jurusan')") or die(mysql_error());
if($input){
echo "Data Berhasil Disimpan";
header("location:dosen.php");
}else{
echo "Gagal Disimpan";
}
?>