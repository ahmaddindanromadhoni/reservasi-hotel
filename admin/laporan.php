<?php include'layouts/header.php'; ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Tgl Pesan</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Nama</th>
                        <th>Tgl Check In</th>
                        <th>Tgl Check Out</th>
                        <th>Total</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no=1;
                      $ssql = mysqli_query($koneksi,"SELECT * FROM pemesanan ORDER BY idpesan DESC");
                      while($gg = mysqli_fetch_assoc($ssql)){
                      ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $gg['tglpesan'] ?></td>
                        <td><?= $gg['tipe'] ?></td>
                        <td><?= $gg['harga'] ?></td>
                        <td><?= $gg['jumlah'] ?></td>
                        <td><?= $gg['nama'] ?></td>
                        <td><?= $gg['tglmasuk'] ?></td>
                        <td><?= $gg['tglkeluar'] ?></td>
                        <td><?= $gg['totalbayar'] ?></td>
                        <td><?= $gg['status'] ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
            
          </div>
          <!--Row-->
      <?php include'layouts/footer.php'; ?>