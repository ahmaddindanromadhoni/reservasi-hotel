<?php
include "../conn/koneksi.php";
$tipe = $_POST['tipe'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$fasilitas = $_POST['fasilitas'];
$gambar = $_FILES['gambar']['name'];

$sqlsimpan = mysqli_query($koneksi,"INSERT INTO kamar VALUES('', '$tipe', '$jumlah', '$harga', '$fasilitas', '$gambar')");
$sqlsimpan2 = mysqli_query($koneksi, "INSERT INTO stokkamar VALUES('', '$tipe', '$jumlah')");
move_uploaded_file($_FILES['gambar']['tmp_name'],'../gambar/'.$_FILES['gambar']['name']);

echo"<script>alert('Data Kamar Tersimpan');document,location.href='kamar.php';</script>";
?>