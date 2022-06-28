<?php
include"sess.php";
$ambil = $_GET['idpesan'];

$sql = mysqli_query($koneksi,"SELECT * FROM pemesanan WHERE idpesan=$ambil");
while($data = mysqli_fetch_array($sql)) {
	$idpesan = $data['idpesan'];

$sqlupdate = mysqli_query($koneksi,"UPDATE pemesanan SET status='Dibatalkan' WHERE idpesan=$idpesan");
echo"<script>alert('Transaksi Dibatalkan!');document.location.href='transaksigagal.php';</script>";
}
?>
