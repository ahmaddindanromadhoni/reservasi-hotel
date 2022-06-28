<?php include 'sess.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <title>Cetak</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4">
            <?php 
            $id = $_GET['idpesan'];
            $ss = mysqli_query($koneksi,"SELECT * FROM pemesanan WHERE idpesan = '$id'");
            $p = mysqli_fetch_array($ss);
            $idkamar = $p['idkamar'];
            ?>
                <div class="border border-dark p-3">
                <table>
                    <tr>
                        <td>Kode Transaksi</td>
                    </tr>
                    <tr>
                    <td>
                        <?php 
                            $dd = mysqli_query($koneksi, "SELECT * FROM kamar WHERE idkamar = $idkamar");
                            while($d = mysqli_fetch_assoc($dd)){
                                $dada = $d['gambar'];
                        ?>
                        <img src="../gambar/<?php echo $dada?>" width='120px' height='120px'>
                        <?php } ?>
                    </td>
                    </tr>
                    <tr>
                        <td width="50%">Tgl Pemesanan</td>
                        <td><?php echo $p['tglpesan'] ?></td>
                    </tr>
                    <tr>
                        <td>Tipe Kamar</td>
                        <td><?php echo $p['tipe'] ?></td>
                    </tr>
                    <tr>
                        <td>Harga/Hari</td>
                        <td><?php echo $p['harga'] ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Kamar</td>
                        <td><?php echo $p['jumlah'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><?php echo $p['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $p['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td><?php  echo $p['telepon'] ?></td>
                    </tr>
                    <tr>
                    <td>Tgl Check In</td>
                    <td><?php echo $p['tglmasuk'] ?></td>
                </tr>
                <tr>
                    <td>Tgl Check Out</td>
                    <td><?php  echo $p['tglkeluar'] ?></td>
                </tr>
                <tr>
                    <td>Lama Menginap</td>
                    <td><?php  echo $p['lamahari'] ?> Hari</td>
                </tr>
                <tr class="bg-danger text-white text-center">
                    <td>Total Bayar</td>
                    <td>Rp.<?php  echo number_format($p['totalbayar']) ?></td>
                </tr>
                <tr class="bg-success text-white text-center">
                    <td>Status Transaksi</td>
                    <td>Rp.<?php  echo $p['status'] ?></td>
                </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
    
    <script>window.print()</script>
</body>
</html>