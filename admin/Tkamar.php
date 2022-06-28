<?php include'layouts/header.php'; ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Kamar</h1>
          </div>

          <!-- Row -->
          <div class="row">
          <div class="col-lg-6">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kamar</h6>
                </div>
                <div class="card-body">
                  <form action="tambah_kamar.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Tipe Kamar</label>
                      <select class="form-control" name="tipe">
                          <option value="">Pilih Tipe Kamar</option>
                        <option value="Standard">Standard</option>
                        <option value="Superior">Superior</option>
                        <option value="Deluxe">Deluxe</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Kamar</label>
                      <input type="text" name="jumlah" class="form-control" placeholder="Masukan Jumlah Kamar">
                    </div>
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="text" name="harga" class="form-control" placeholder="Masukan Harga Kamar">
                    </div>
                    <div class="form-group">
                      <label>Fasilitas</label>
                      <textarea name="fasilitas" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                    <label>Gambar Kamar</label>
                      <input type="file" name="gambar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>

            </div>
            
          </div>
          <!--Row-->

      <?php include'layouts/footer.php'; ?>