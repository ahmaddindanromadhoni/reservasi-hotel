<?php include'layouts/header.php'; ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pembayaran</h1>
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
                        <th>ID Transaksi</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Bank</th>
                        <th>No Rekening</th>
                        <th>Nama Pemilik</th>
                        <th>Bukti</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $sql = mysqli_query($koneksi, "SELECT * FROM pembayaran ORDER BY idpesan DESC");
                      while($d = mysqli_fetch_assoc($sql)){
                      ?>
                      <tr>
                        <td><?= $d['idpesan'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= number_format($d['jumlah']) ?></td>
                        <td><?= $d['bank'] ?></td>
                        <td><?= $d['norek'] ?></td>
                        <td><?= $d['namarek'] ?></td>
                        <td><img src="../gambar/<?= $d['gambar'] ?>" width="100" alt=""></td> 
                      </tr>
                      <?php  } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
          <!--Row-->
      <?php include'layouts/footer.php'; ?>