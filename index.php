<?php include'header.php'; ?>
<script type="text/javascript">
	function pilih() {
		var type = document.opsi.tipe.value;
		var teks = document.getElementById('selek').options[document.getElementById('selek').selectedIndex].text;
		document.opsi.harga.value = type;
		document.opsi.tipex.value = teks;

	}
</script>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Welcome To HotelQu</h1>
    <p class="lead">Website Reservasi Hotel Terbaik.</p>
  </div>
</div>
<div class="container">
<div class="row">
  <div class="col-lg">
    <div class="card">
      <div class="card-body">
        <form action="user/pemesanan.php" method="post" name="opsi">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>Cek in</label>
                <input type="date" name="cekin" class="form-control">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Cek Out</label>
                <input type="date" name="cekout" class="form-control">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Type Kamar</label>
                <select name="tipe" id="selek" class="form-control" required="required" onchange="pilih()">
									<option selected="selected" disabled="disabled">-Pilih-</option>
									<option value="Rp 410.000">Superior</option>
									<option value="Rp 450.000">Deluxe</option>
									<option value="Rp 700.000">Junior Suite</option>
									<option value="Rp 1.200.000">Executive</option>
								</select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Harga/Malam</label>
                <input type="text" class="form-control" name="harga" onchange="pilih()">
								<input type="hidden" name="tipex" class="form-control" onchange="pilih()">
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <input type="submit" name="ok" class="btn btn-primary" id="tombol">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <div class="row">
    <div class="col-lg text-center">
      <h2>About Us</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-lg text-center">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui enim hic eos nobis eveniet temporibus obcaecati sint rerum neque ullam ad error, maiores dolor praesentium. Autem perferendis eius fugit nostrum fuga numquam voluptatem vero! Voluptates maxime eum quam, reprehenderit natus ratione magni iure reiciendis mollitia eius dignissimos error voluptatum fugiat perferendis nihil, enim eaque amet. Aut quidem ea odio commodi enim eligendi accusantium pariatur porro repellat. A, maxime placeat dignissimos consectetur labore sit delectus, facilis nostrum nisi expedita esse minus tenetur dolorem doloribus veniam beatae, aliquam porro sint quibusdam mollitia amet perspiciatis nemo. Sed deleniti, veritatis perspiciatis quo ad tempore.</p>
    </div>
  </div>
  <div class="row" id="fasilitas">
    <div class="col-lg">
      <h2>Fasilitas</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
    <div class="card shadow">
      <img src="assets/img/banner.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
    </div>

  </div>
</div>
<?php include'footer.php'; ?>