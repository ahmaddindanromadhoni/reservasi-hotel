<?php 
include 'sess.php';

$id = $_GET['idtamu'];
$ss = mysqli_query($koneksi, "DELETE FROM tamu WHERE idtamu = '$id'");
header("location:datauser.php");

?>