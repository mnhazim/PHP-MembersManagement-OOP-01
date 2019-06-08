<?php
	include '../controller/controlahli.php';
	$obj = new controlahli();

	$date = date('d M Y')

?>
<!DOCTYPE html>
<html>
<?php include 'inc/head.php'; ?>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card mt-10">
          <div class="card-header">
            <h3>Daftar Ahli</h3>
          </div>
          <div class="card-body">
            <form method="post" action="../controller/controlahli.php?mod=daftar">
			  <div class="form-group">
			    <label>Nama Penuh</label>
			    <input pattern="[A-Za-z\s]+" title="hanya huruf dibenarkan." name="nama" type="text" class="form-control" placeholder="" required autocomplete="off">
			  </div>
			  <div class="form-group">
			    <label>No Ic</label>
			    <input name="ic" type="text" class="form-control" placeholder="98013201****" required pattern="[0-9]{12}" autocomplete="off">
			    <small class="text-danger">Tidak perlu simbol ( - )</small>
			  </div>
			  <div class="form-group">
			    <label>Email</label>
			    <input name="email" type="email" class="form-control" placeholder="" required autocomplete="off">
			  </div>
			  <div class="form-group">
			    <label>Password</label>
			    <input name="password" type="Password" class="form-control" placeholder="" required>
			  </div>
			  <div class="form-group">
			    <label>Tarikh</label>
			    <input type="text" name="tarikh" class="form-control" readonly value="<?php echo $date ?>">
			  </div>
			  <button class="btn btn-success">Daftar</button>
			  <div class="float-right">
	              <a class="btn btn-danger" href="../index.php">Batal / Log Masuk</a>
	          </div>
			</form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
</body>
</html>