<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="assets/js/sweet.js"></script>
</head>
<body>

<?php
include 'conn/koneksi.php';

$email = $_POST['email'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$password = md5($_POST['password']);

$dindan = mysqli_query($koneksi, "INSERT INTO tamu VALUES('','$email','$nama','$alamat','$telepon','$password')");
 if($dindan){
    echo "<script>swal({
		type: 'success',
		title: 'Registrasi Sukses!',
		showConfirmButton: false,
		backdrop: 'rgba(0,0,123,0.5)',
	  });
	  window.setTimeout(function(){
		  window.location.replace('login.php');
	   } ,1500); </script>";
}else{
	echo "<script>swal({
		type: 'error',
		title: 'Registrasi Gagal!',
		showConfirmButton: false,
		backdrop: 'rgba(123,0,0,0.5)',
	  });
	  window.setTimeout(function(){
		  window.location.replace('register.php');
	   } ,1500); </script>";
}

?>

    
</body>
</html>