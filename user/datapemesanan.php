<?php include'header.php'; 
$id = $idtamu;
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg">
            <h2>Data Reservasi <?php echo $p['nama'] ?></h2>
        </div>
    </div>
    <div class="row mt-4">
            <?php 
                $data = mysqli_query($koneksi,"SELECT * FROM pemesanan WHERE idtamu = '$id' ORDER BY idpesan DESC");
                while($p = mysqli_fetch_assoc($data)){
                $idpesan = $p['idpesan'];
                $idkamar = $p['idkamar'];
                $status = $p['status'];
                $tglpesan = $p['tglpesan'];
                $tgllpes = date('Y-m-d', strtotime($p['tglpesan']));
                $batasbayar = $p['batasbayar'];
                $batasbayarr = date('Y-m-d', strtotime($p['batasbayar']));
				$batasjam = date('H:i:s', strtotime($p['batasbayar']));
            ?>
        <div class="col-lg-4">
            <div class="border px-5  p-3 border-dark">
            <table>
                <tr>
                    <h5 class="text-center">Bukti Reservasi Hotel HotelQu</h5>
                </tr>
                <hr>
                <tr>
                    <td>Kode Transaksi</td>
                    <td><?php echo $idpesan ?></td>
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
                    <td><?php echo $tgllpes ?></td>
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
                <tr style="background: #B40301;" align="center">
				<td style="color: white">Total Bayar</td>
				<td style="color: white">Rp. <?php echo number_format($p['totalbayar']) ?>
					<input type="hidden" name="total" value="<?php echo number_format($p['totalbayar']) ?>">
				</td>
			</tr>
            <tr>
				<?php
					if ($status == "Berhasil") {
				
				echo '<td colspan="2" align="center" style="background: green;color: white;">Status Transaksi :';
					}
					else if ($status == "Pending...") {
						echo '<td colspan="2" align="center" style="background: blue;color: white;">Status Transaksi :';
					}
					else {
						echo '<td colspan="2" align="center" style="background: black;color: white;">Status Transaksi :';
					}
					date_default_timezone_set("Asia/Jakarta");
					$tglsekarang = date('Y-m-d H:i:s');
					if ($tglsekarang > $batasbayar) {
						echo "Dibatalkan";
                        $updatestatus = mysqli_query($koneksi,"UPDATE pemesanan SET status='Dibatalkan' WHERE idpesan = '$idpesan'");
					}

					else {
						echo $status ;
						if ($status == "Pending...") {
                            $dddd = $p['idpesan'];
                            $sqly = mysqli_query($koneksi,"SELECT * FROM pembayaran WHERE idpesan='$dddd'");
                            $xx = mysqli_fetch_array($sqly);
                            $idbayar = $xx['idpesan'];
                            if ($idbayar == $idpesan) {
                                echo "<br><p style='background: yellow; color: black'>Menunggu Verifikasi Pembayaran</p>";
                            }else {
							echo "<br>Menunggu Proses Pembayaran<br>
							<p style='background:#B40301;'>Segera Lakukan Pembayaran Sebelum :</p>
							<p style='background:#B40301;'>Tanggal : $batasbayarr <br>Jam : $batasjam</p>
							Jika Tidak Transaksi Anda Dibatalkan<br>";
				?>
						<a href="bayar.php?idpesan=<?=$p['idpesan'] ?>" ><button id="bbayar" style="width:150px;background:yellow;color:black;font-weight:bold;padding:4px;border:2px solid white; margin-bottom: 3px;">Konfirmasi Pembayaran</button></a>
				<?php
							}
						}
                    }
				?>
				</td>
			</tr>
            <tr>
                <td>
                    <a target="_blank" href="cetak.php?idpesan=<?= $p['idpesan']?>"  class="btn btn-info btn-sm btn-block"><i class="fas fa-print"></i> Cetak</a>

                </td>
            </tr>
        </table>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include'footer.php'; ?>