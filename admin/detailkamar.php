<?php include'layouts/header.php'; ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Kamar</h1>
          </div>

          <!-- Row -->
          <div class="row">
          <div class="col-lg-12">
              <?php 
              $id = $_GET['idkamar'];
              $detail = mysqli_query($koneksi, "SELECT * FROM kamar WHERE idkamar = '$id'");
              $s = mysqli_fetch_assoc($detail);
              ?>
          <table class="table table-hover table-bordered">
                      <tr>
                      <td>Tipe Kamar</td>
                      <td><?= $s['tipe'] ?></td>
                      </tr>

                      <tr>
                      <td>Jumlah Kamar</td>
                      <td><?= $s['jumlah']  ?></td>
                      </tr>

                      <tr>
                      <td>Harga</td>
                      <td><?= $s['harga'] ?></td>
                      </tr>
                      <tr>
                      <td>Fasilitas</td></td>
                      <td><?= $s['fasilitas'] ?></td>
                      </tr>
                      <tr>
                      <td>Foto Kamar</td>
                      <td><img src="../gambar/<?= $s['gambar'] ?>" width="200" alt=""></td>
                      </tr>
                      </table>

                      <a href="kamar.php" class="btn btn-primary my-3"><i class="fas fa-angle-left"></i> Kembali</a>

            </div>
            
          </div>
          <!--Row-->

      <?php include'layouts/footer.php'; ?>