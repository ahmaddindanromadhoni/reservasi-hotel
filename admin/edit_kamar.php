<?php
include"../conn/koneksi.php";
$idkamar = $_POST['idkamar'];
$tipe = $_POST['tipe'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$fasilitas = $_POST['fasilitas'];
$gambar = $_FILES['gambar']['name'];

move_uploaded_file($_FILES['gambar']['tmp_name'],'../gambar/'.$gambar);

	if(empty($gambar)) {
        $update = mysqli_query($koneksi, "UPDATE kamar SET  idkamar='$idkamar', tipe='$tipe', jumlah='$jumlah', harga='$harga', fasilitas='$fasilitas', gambar='$gambar' WHERE idkamar='$idkamar'");

        $update2 = mysqli_query($koneksi, "UPDATE stokkamar SET  idkamar='$idkamar',tipe='$tipe'");

		echo "<script>alert ('Data telah diupdate');document.location.href='kamar.php';</script>";
	}
	else if (!empty($gambar)) {
		$update = mysqli_query($koneksi, "UPDATE kamar SET idkamar='$idkamar', tipe='$tipe', jumlah='$jumlah', harga='$harga', gambar='$gambar' WHERE id_kamar=$idkamar'");

        $update2 = mysqli_query($koneksi, "UPDATE stokkamar SET idkamar='$idkamar',tipe='$tipe'");
		
		echo "<script>alert ('Data telah diupdate');document.location.href='kamar.php';</script>";
}

?>
