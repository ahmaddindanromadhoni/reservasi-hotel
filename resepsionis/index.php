<?php
include'layouts/header.php'; 
$data = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE status = 'Dibatalkan'");
$d = mysqli_num_rows($data);

$sukses = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE status = 'Berhasil'");
$s = mysqli_num_rows($sukses);

$konfirmasi = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE status = 'Pending...'");
$l = mysqli_num_rows($konfirmasi);

$asd = mysqli_query($koneksi, "SELECT * FROM pembayaran");
$p = mysqli_num_rows($asd);

?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Transaksi Gagal</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $d ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Transaksi Berhasil</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $s ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Menunggu Konfirmasi</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $l ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Data Pembayaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $p ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

    <?php include'layouts/footer.php'; ?>