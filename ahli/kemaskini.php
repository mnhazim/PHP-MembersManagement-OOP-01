<?php
  include '../controller/controlahli.php';
  $obj = new controlahli();
    $conf = new config();
    $conn = $conf->open();
    include 'inc/secureahli.php';
    $rsahliupdate = $obj->getahli($ahliid);
    $rowahli = mysqli_fetch_array($rsahliupdate);
?>
<!DOCTYPE html>
<html>
<?php include 'inc/head.php'; ?>
<body>

  <?php include 'inc/nav.php'; ?>

  <div class="container mt-5">
    <?php include 'inc/title.php'; ?>
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card mt-10">
          <div class="card-header">
            <h3>Kemaskini Ahli</h3>
          </div>
          <div class="card-body">
            <form method="post" action="../controller/controlahli.php?mod=kemaskini">
      			  <div class="form-group">
      			    <label>Nama Penuh</label>
      			    <input pattern="[A-Za-z\s]+" title="hanya huruf dibenarkan." name="nama" type="text" class="form-control" placeholder="" required value="<?php echo $rowahli['ahli_nama'] ?>" autocomplete="off">
      			  </div>
      			  <div class="form-group">
      			    <label>No Ic</label>
      			    <input name="ic" type="text" class="form-control" placeholder="98013201****" required pattern="[0-9]{12}" value="<?php echo $rowahli['ahli_ic'] ?>" autocomplete="off">
      			    <small class="text-danger">Tidak perlu simbol ( - )</small>
      			  </div>
      			  <div class="form-group">
      			    <label>Email</label>
      			    <input name="email" type="email" class="form-control" placeholder="" required value="<?php echo $rowahli['ahli_email'] ?>" autocomplete="off">
      			  </div>
      			  <div class="form-group">
      			    <label>Tarikh</label>
      			    <input type="text" name="tarikh" class="form-control" readonly value="<?php echo $rowahli['ahli_tarikhdaftar'] ?>">
      			  </div>
              <input type="hidden" name="idahli" value="<?php echo $rowahli['ahli_id'] ?>">
              <a class="btn btn-primary float-left" href="index.php">Back</a>
              <button type="submit" class="btn btn-success float-left">Kemaskini</button>
      			</form>
            
              <a class="btn btn-danger float-right" href="katalaluan.php">Tukar Kata Laluan</a>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
</body>
</html>