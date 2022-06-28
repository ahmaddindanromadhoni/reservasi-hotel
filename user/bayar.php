<?php 
include 'header.php';

$id = $_GET['idpesan'];
$data = mysqli_query($koneksi,"SELECT * FROM pemesanan WHERE idpesan = '$id'");
$d = mysqli_fetch_array($data);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5>Konfirmasi Pembayaran</h5></div>
                    <div class="card-body">
                        <form action="Cbayar.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID Transaksi</label>
                            <input type="text" name="idpesan" class="form-control form-control-sm" value="<?= $d['idpesan']?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control form-control-sm" value="<?= $d['nama']?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Bayar</label>
                            <input type="text" name="jumlah" class="form-control form-control-sm" value="Rp.<?= $d['totalbayar']?>">
                        </div>
                        <div class="form-group">
                            <label>Bank</label>
                            <select name="bank" id="bank" class="form-control form-control-sm">
                                <option value="">--Pilih Bank--</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="BCA">BCA</option>
                                <option value="BRI">BRI</option>
                                <option value="BNI">BNI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No Rekening</label>
                            <input type="text" name="norek" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label>Nama Pemilik Rekening</label>
                            <input type="text" name="namarek" class="form-control form-control-sm" >
                        </div>
                        <div class="form-group">
                            <label>Bukti Transfer</label>
                            <input type="file" name="gambar" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="tombol" class="btn btn-primary" value="Kirim Konfirmasi" >
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
include 'footer.php';
?>