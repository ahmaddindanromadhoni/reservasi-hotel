<?php
include "sess.php";
$id = $_GET['idpesan'];

$ssl = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE idpesan = '$id'");
while($data = mysqli_fetch_assoc($ssl)){
    $idpesan = $data['idpesan'];

$sqlupdate = mysqli_query($koneksi,"UPDATE pemesanan SET status='Berhasil' WHERE idpesan=$idpesan");
echo"<script>alert('Transaksi Dikonfirmasi!');document.location.href='transaksisukses.php';</script>";
}
?>
