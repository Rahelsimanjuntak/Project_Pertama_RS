<?php
include 'koneksi.php';

$hari = $_POST['hari'];
$jam = $_POST['jam'];
$matakuliah = $_POST['matakuliah'];
$dosen = $_POST['dosen'];
$ruangan = $_POST['ruangan'];
$kode = $_POST['kode'];

// Tidak perlu menyertakan 'id' dalam query jika itu adalah auto-increment
$query = "INSERT INTO jadwalkuliah (hari, jam, matakuliah, dosen, ruangan, kode) VALUES 
            ('$hari', '$jam', '$matakuliah', '$dosen', '$ruangan','$kode')";

$input = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

if ($input) {
    echo "Data Berhasil Disimpan";
    header("location: jadwalkuliah.php");
} else {
    echo "Gagal Disimpan";
}
?>
