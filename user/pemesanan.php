<?php
include 'header.php';
include '../conn/koneksi.php';

$qqq = mysqli_query($koneksi, "SELECT * FROM tamu WHERE idtamu='$idtamu'");
$q = mysqli_fetch_assoc($qqq);

  if(isset($_POST['ok'])) {
      $in = $_POST['cekin'];
      $out = $_POST['cekout'];
      $type = $_POST['tipex'];

       $aaa = mysqli_query($koneksi, "SELECT * FROM kamar WHERE tipe = '$type'");
      $a = mysqli_fetch_array($aaa);
      

      $bbb = mysqli_query($koneksi,"SELECT * FROM stokkamar WHERE tipe = '$type'");
      $b = mysqli_fetch_array($bbb);

      
    }
    
    date_default_timezone_set("Asia/Jakarta");
    $today = date('Y-m-d H:i:s');
    $jamex = date('Y-m-d H:i:s', strtotime("+5 Hour", strtotime(date("Y-m-d H:i:s"))));


  if(isset($_POST['klik'])) {
        $id = $_GET['idkamar'];
        $ccc = mysqli_query($koneksi, "SELECT * FROM kamar WHERE idkamar = '$id'");
        $c = mysqli_fetch_assoc($ccc);

        $ddd = mysqli_query($koneksi,"SELECT * FROM stokkamar WHERE idkamar = '$id'");
        $d = mysqli_fetch_assoc($ddd);
  }
?>

<script type="text/javascript">
		function hitung(){
			var jumlahstok = parseFloat(document.cekstok.stok.value);
			var jumlahpesan = parseFloat(document.cekstok.jum.value);
			var harga = parseFloat(document.cekstok.harga.value);

      
			var tglsekarang = new Date();
			var dd = tglsekarang.getDate();
			var mm = tglsekarang.getMonth()+1;
			var yy = tglsekarang.getFullYear();
			if (dd<10) {
				dd = '0'+dd;
			}
			if (mm<10) {
				mm = '0'+mm;
			}
			tglsekarang = dd+'/'+mm+'/'+yy;

			var tglin = document.cekstok.tglcekin.value;
			var tglout = document.cekstok.tglcekout.value;

			//var tglin2 = date('Y-m-d H:i:s', tglin);

			var tglcin = tglin.split('-');
			var tglcout = tglout.split('-');
			var tglcekk = tglsekarang.split('-');

			var objektgl = new Date();

			var tglmasuk = objektgl.setFullYear(tglcin[0], tglcin[1], tglcin[2]);
			var tglkeluar = objektgl.setFullYear(tglcout[0], tglcout[1], tglcout[2]);
			var cektgl = objektgl.setFullYear(tglcekk[0], tglcekk[1], tglcekk[2]);
			
			var selisih = (tglkeluar - tglmasuk) / (60*60*24*1000);

			var cek = (tglmasuk - cektgl) / (60*60*24*1000);
			
			if(jumlahstok < jumlahpesan){
				alert("Maaf.. Stok Kamar Tidak Cukup");
				document.cekstok.jum.value="Pilih";
				document.cekstok.total.value="";
				}
			else {

				document.cekstok.lama.value = selisih;
				var hitungharga = harga*jumlahpesan*selisih;
				document.cekstok.total.value = hitungharga;
				if ((selisih || hitungharga || cek) < 0) {
					alert("Pilih Tanggal Dengan Benar!!!");
					document.cekstok.lama.value = 0;
					document.cekstok.total.value = 0;
				}
			}
		}
		</script>

<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-lg-7">
      <div class="card">
        <div class="card-body">
<?php
	if(isset($_POST['ok'])) {
?>
            <form action="Cpemesanan.php" method="post" name="cekstok">
              <div class="row justify-content-center mb-2">
                <div class="col-lg-7">
                  <img src="../gambar/<?= $a['gambar'] ?>" width="300" alt="">
                </div>
              </div>
            <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Tipe Kamar</label>
                <input type="hidden" name="tglpesan" readonly="true" value="<?php echo $today ?>">
				        <input type="hidden" name="jamexpire" readonly="true" value="<?php echo $jamex ?>">
				        <input type="text" name="tipe" class="form-control" readonly="true" value="<?php echo $a['tipe'] ?>">
			          <input type="hidden" name="idkamar" readonly="true" value="<?php echo $a['idkamar'] ?>">
             </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Harga/Hari</label>
                <input type="text" class="form-control" name="harga" readonly="true" value="<?= $a['harga'] ?>">
				      <input type="hidden" name="stok" readonly="true" value=" <?php echo $b['stok'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Jumlah Kamar</label>
                <select name="jum" onchange="hitung()" required="required" class="form-control">
                  <option>-Pilih-</option>
                  <script>
                    for(var i=1;i<=50;i++){
                      document.write("<option>"+i+"</option>");
                    }
                  </script>
                </select>
             </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $q['nama'] ?>">
					      <input type="hidden" name="idtamu" readonly="true" value="<?php echo $q['idtamu'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" value="<?= $q['alamat']?>" class="form-control">
             </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>No Telepon</label>
                <input type="text" class="form-control" name="telepon" value="<?= $q['telepon']?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Tgl Check In</label>
                <input type="date" value="<?= $in ?>" min="<?= date('d-m-Y') ?>" required="required" class="form-control" onchange="hitung()" name="tglcekin">
             </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Tgl Check Out</label>
                <input type="date" class="form-control" value="<?= $out ?>" required="required" onchange="hitung()"  name="tglcekout">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Lama Menginap</label>
                <input type="text" class="form-control" name="lama" onchange="hitung()" readonly="true">
             </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Total Biaya</label>
                <input type="text" class="form-control" name="total" onchange="hitung()" readonly="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" value="Pesan" class="btn btn-primary">
          </div>
            </form>
            <?php 
	}
	if(isset($_POST['klik'])) {
?>
          <form action="Cpemesanan.php" method="post" name="cekstok">
              <div class="row justify-content-center mb-2">
                <div class="col-lg-7">
                  <img src="../gambar/<?= $c['gambar']?>" width="300" alt="">
                </div>
              </div>
            <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Tipe Kamar</label>
                <input type="hidden" name="tglpesan" readonly="true" value="<?php echo $today ?>">
				        <input type="hidden" name="jamexpire" readonly="true" value="<?php echo $jamex ?>">
				        <input type="text" class="form-control" name="tipe" readonly="true" value="<?php echo $c['tipe'] ?>">
					    <input type="hidden" name="idkamar" readonly="true" value="<?php echo $c['idkamar'] ?>">
             </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Harga/Hari</label>
                <input type="text" class="form-control" name="harga" readonly="true" value="<?php echo $c['harga'] ?>">
				        <input type="hidden" name="stok" readonly="true" value=" <?php echo $d['stok']?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Jumlah Kamar</label>
                <select name="jum" class="form-control" onchange="hitung()" required="required">
                <option>Pilih</option>
                <script>
                  for(var i=1;i<=50;i++){
                    document.write("<option>"+i+"</option>");
                  }
                </script>
              </select>
             </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $q['nama'] ?>">
				<input type="hidden" name="idtamu" readonly="true" value="<?php echo $q['idtamu'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" value="<?= $q['alamat']?>" class="form-control">
             </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>No Telepon</label>
                <input type="text" class="form-control" name="telepon" value="<?= $q['telepon']?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Tgl Check In</label>
                <input type="date" class="form-control" min="<?= date('d-m-Y') ?>" required="required" onchange="hitung()" name="tglcekin">
             </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Tgl Check Out</label>
                <input type="date" class="form-control" required="required" onchange="hitung()" name="tglcekout">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Lama Menginap</label>
                <input type="text" class="form-control" name="lama" onchange="hitung()" readonly="true">
             </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Total Biaya</label>
                <input type="text" class="form-control" name="total" onchange="hitung()" readonly="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" value="Pesan" class="btn btn-primary">
          </div>
            </form>
            <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php'; ?>