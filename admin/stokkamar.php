<?php include'layouts/header.php'; ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Kamar</h1>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Tipe Kamar</th>
                        <th>Stok Kamar</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php include'../conn/koneksi.php';
                      $no = 1;
                      $sql = mysqli_query($koneksi, "SELECT * FROM stokkamar ORDER BY idkamar DESC");
                      while($f = mysqli_fetch_assoc($sql)){
                      ?>
                      <tr>
                        <td><?= $no++  ?></td>
                        <td><?= $f['tipe'] ?></td>
                        <td><?= $f['stok'] ?></td>
                        <td>Hapus</td>
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