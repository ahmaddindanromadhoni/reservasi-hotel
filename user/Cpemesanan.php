<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../assets/js/sweet.js"></script>
</head>
<body>

<?php
include"sess.php";
$tglpesan = $_POST['tglpesan'];
$jamexpire = $_POST['jamexpire'];
$idkamar = $_POST['idkamar'];
$tipe = $_POST['tipe'];
$harga = $_POST['harga'];
$jum = $_POST['jum'];
$idtamu = $_POST['idtamu'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$tglcekin = $_POST['tglcekin'];
$tglcekout = $_POST['tglcekout'];
$lama = $_POST['lama'];
$total = $_POST['total'];

$sqlsimpan = mysqli_query($koneksi, "INSERT INTO pemesanan VALUES('', '$tglpesan', '$jamexpire', '$idkamar', '$tipe', '$harga', '$jum', '$idtamu', '$nama', '$alamat', '$telepon', '$tglcekin', '$tglcekout', '$lama', '$total', 'Pending...')");


    $stokk = mysqli_query($koneksi,"SELECT * FROM stokkamar WHERE idkamar='$idkamar'");
    $ss = mysqli_fetch_assoc($stokk);
    $stok = $ss['stok'];
    $hitung = $stok - $jum;
    $update = mysqli_query($koneksi, "UPDATE stokkamar SET stok='$hitung' WHERE idkamar = '$idkamar'");

echo"<script>swal({
	  	type: 'success',
	  	title: 'Pemesanan Kamar Terkirim',
	  	showConfirmButton: false,
	  	backdrop: 'rgba(0,0,123,0.5)',
		});
		window.setTimeout(function(){
			window.location.replace('../user/datapemesanan.php');
 		} ,1500);</script>";
?>

</body>
</html>