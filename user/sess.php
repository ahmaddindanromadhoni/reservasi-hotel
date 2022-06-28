<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<script src="../assets/js/sweet.js"></script>
</head>
<body>
<?php
	// memulai session
	session_start();
	// membaca nilai variabel session 
	$chk_sess = $_SESSION['user'];
	// memanggil file koneksi
	include("../conn/koneksi.php");
	// mengambil data pengguna dari tabel pengguna
	$sql_sess = "SELECT * FROM tamu WHERE idtamu='". $chk_sess ."'";
	$ress_sess = mysqli_query($koneksi, $sql_sess);
	$p = mysqli_fetch_array($ress_sess);
	// menyimpan id_pengguna yang sedang login
	$idtamu = $p['idtamu'];
	// mengarahkan ke halaman login.php apabila session belum terdaftar
	if(! isset($chk_sess)) {
		echo"<script>
		swal({
			title: 'Oops...?',
			text: 'Silahkan Login Terlebih Dahulu!',
			showConfirmButton: false,
			type: 'warning',
			backdrop: 'rgba(123,0,0,1)',
	  });
	  window.setTimeout(function(){
		  window.location.replace('../');
	   } ,2000); 
			</script>";
	}
?>

</body>
</html>