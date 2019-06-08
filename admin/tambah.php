<?php
  include '../controller/control.php';
  $obj = new control();
  $conf = new config();
  $conn = $conf->open();
  include 'inc/secureadmin.php';
  $date = date('d M Y');
?>
<!DOCTYPE html>
<html>
<?php include 'inc/head.php'; ?>
<body>

  <?php include 'inc/nav.php'; ?>


  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 mx-auto text-center">
        <h3>SISTEM PENDAFTARAN AHLI</h3>
        <small class="float-right"><strong>Welcome: </strong><span class="text-primary"><?php echo $rowpengurussecure['pengurus_nama']; ?></span></small>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card mt-10">
          <div class="card-header">
            <h3>Tambah Ahli</h3>
          </div>
          <div class="card-body">
            <form method="post" action="../controller/control.php?mod=tambah">
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
			    <label>Tarikh</label>
			    <input type="text" name="tarikh" class="form-control" readonly value="<?php echo $date ?>">
			  </div>
			  <br>
			  <p><small class="text-danger">***Kata laluan ahli akan disetkan dengan No IC ahli. <br>***Ahli perlu log masuk dan tukar kata laluan</small></p>
			  <button class="btn btn-success">Hantar</button>
			  <div class="float-right">
	              <a class="btn btn-danger" href="index.php">Batal</a>
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