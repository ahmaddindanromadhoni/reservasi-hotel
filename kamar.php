<?php include'header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg">
            <h2>All Kamar</h2>
        </div>
    </div>
    <div class="row">
    <?php 
    include 'conn/koneksi.php';
    $asd = mysqli_query($koneksi,"SELECT * FROM kamar");
    while($d = mysqli_fetch_assoc($asd)){
    ?>
        <div class="col-lg-4">
        <div class="card border"><div class="position-absolute px-3 py-2" style="background-color: rgba(0, 225, 0, 1)"><a href=""  class="text-white text-decoration-none"><?= $d['tipe'] ?></a></div>
        <img src="gambar/<?=$d ['gambar']?>" class="card-img-top" alt="...">
        <ul class="list-group list-group-flush text-center">
            <li class="list-group-item">Rp.<?php echo $d['harga'] ?></li>
            <li class="list-group-item">Tersedia <?php echo $d['jumlah'] ?> kamar</li><a href="user/pemesanan.php" class="btn btn-success btn-block">Pesan</a>
        </ul>
        </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include'footer.php'; ?>