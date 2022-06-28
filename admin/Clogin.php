<?php
// memulai session
session_start();
// memanggil file koneksi
include '../conn/koneksi.php';

// mengecek apakah tombol login sudah di tekan atau belum
if(isset($_POST['login'])) {
	// mengecek apakah email dan password sudah di isi atau belum
	if(empty($_POST['email']) || empty($_POST['password'])) {
		// mengarahkan ke halaman login.php
		header("location: login.php?err=empty");
	}
	else {
		// membaca nilai variabel email dan password
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$level = $_POST['level'];
		// mencegah sql injection
		$email = htmlentities(trim(strip_tags($email)));
		$password = htmlentities(trim(strip_tags($password)));
			// memeriksa email di tabel admin

			if($level=="resepsionis"){		
				$aks = "resepsionis";
				$sql = "SELECT * FROM admin WHERE level='".$aks."' AND email='". $email ."' AND password='". $password ."'";
				$ress = mysqli_query($koneksi, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika email di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['resepsionis'] = strtolower($dataku['id']);
					// mengarahkan ke halaman indeks.php
					header("location: ../resepsionis/index.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}else{			
				$aks = "admin";
				$sql = "SELECT * FROM admin WHERE level='".$aks."' AND email='". $email ."' AND password='". $password ."'";
				$ress = mysqli_query($koneksi, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika email di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['admin'] = strtolower($dataku['id']);
					// mengarahkan ke halaman indeks.php
					header("location: index.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}
        }
    }
    ?>