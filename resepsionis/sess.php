<?php
	// memulai session
	session_start();
	// membaca nilai variabel session 
	$chk_sess = $_SESSION['resepsionis'];
	// memanggil file koneksi
	include("../conn/koneksi.php");
	// mengambil data pengguna dari tabel pengguna
	$sql_sess = "SELECT * FROM admin WHERE id='". $chk_sess ."'";
	$ress_sess = mysqli_query($koneksi, $sql_sess);
	$p = mysqli_fetch_array($ress_sess);
	// menyimpan id_pengguna yang sedang login
	$id_res = $p['id'];
	// mengarahkan ke halaman login.php apabila session belum terdaftar
	if(! isset($chk_sess)) {
		header("location: ../admin/login.php?login=gagal");
	}
?>