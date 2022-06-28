<?php include'layouts/header.php'; ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Transaksi Berhasil</h1>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Kamar</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Tgl</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Nama</th>
                        <th>Cek in</th>
                        <th>Cek out</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      include '../conn/koneksi.php';
                      $no = 1;
                      $sql = mysqli_query($koneksi, "SELECT * FROM pemesanan ORDER BY idpesan DESC");
                      while($d = mysqli_fetch_assoc($sql)){
                        $status = $d['status'];
                        if ($status == 'Berhasil') {
                      ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['tglpesan'] ?></td>
                        <td><?= $d['tipe'] ?></td>
                        <td><?= $d['harga'] ?></td>
                        <td><?= $d['jumlah'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['tglmasuk'] ?></td>
                        <td><?= $d['tglkeluar'] ?></td>
                        <td><?= $d['totalbayar'] ?></td>
                      </tr>
                      <?php } } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
          <!--Row-->
      <?php include'layouts/footer.php'; ?>