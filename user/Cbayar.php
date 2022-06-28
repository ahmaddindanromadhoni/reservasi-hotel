<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../assets/js/sweet.js"></script>
</head>
<body>

<?php
include"sess.php";
$idpesan = $_POST['idpesan'];
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$bank = $_POST['bank'];
$norek = $_POST['norek'];
$namarek = $_POST['namarek'];
$gambar = $_FILES['gambar']['name'];

$sqlsimpan = mysqli_query($koneksi, "INSERT INTO pembayaran VALUES('$idpesan', '$nama', '$jumlah', '$bank', '$norek', '$namarek', '$gambar')");

move_uploaded_file($_FILES['gambar']['tmp_name'],"../gambar/".$_FILES['gambar']['name']);

echo"<script>swal({
	  	type: 'success',
	  	title: 'Konfirmasi Pembayaran Terkirim!',
	  	showConfirmButton: false,
	  	backdrop: 'rgba(0,0,123,0.5)',
		});
		window.setTimeout(function(){
			window.location.replace('../user/datapemesanan.php');
 		} ,1500);</script>";
?>

</body>
</html>