<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<script src="assets/js/sweet.js"></script>
</head>
<body>
<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'conn/koneksi.php';

// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = md5($_POST['password']);

// menyeleksi data admin dengan email dan password yang sesuai
$data = mysqli_query($koneksi,"SELECT * FROM tamu WHERE email='$email' AND password='$password'");
// menghitung jumlah data yang ditemukan
if(mysqli_num_rows($data) > 0){
	$d = mysqli_fetch_object($data);
	$_SESSION['status_login'] = true;
	$_SESSION['a_global'] = $d;
	$_SESSION['user'] = $d->idtamu;

	echo "<script>swal({
		type: 'success',
		title: 'Login Sukses!',
		showConfirmButton: false,
		backdrop: 'rgba(0,0,123,0.5)',
	  });
	  window.setTimeout(function(){
		  window.location.replace('user/');
	   } ,1500); </script>";
}else{
	echo "<script>swal({
		type: 'error',
		title: 'Login Gagal!',
		showConfirmButton: false,
		backdrop: 'rgba(123,0,0,0.5)',
	  });
	  window.setTimeout(function(){
		  window.location.replace('login.php');
	   } ,1500); </script>";
}
?>	
</body>
</html>