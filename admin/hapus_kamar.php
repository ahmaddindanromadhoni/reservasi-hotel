<?php
include"../conn/koneksi.php";
$id = $_GET['idkamar'];
$sql = mysqli_query($koneksi, "DELETE  FROM kamar WHERE idkamar='$id'");
$sql2 = mysqli_query($koneksi, "DELETE  FROM stokkamar WHERE idkamar='$id'");
echo"<script>document.location.href='kamar.php?delete=berhasil';</script>";
?>