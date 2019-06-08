<?php
  include '../controller/control.php';
  $obj = new control();
  $id = "-1";
  if (isset($_GET['idahli'])) {
    $conf = new config();
    $conn = $conf->open();
    include 'inc/secureadmin.php';
    $id = mysqli_escape_string($conn, $_GET['idahli']);
    $rsahliupdate = $obj->update($id);
    $rowahli = mysqli_fetch_array($rsahliupdate);
  } else {
    header("Location: index.php");
  }
  
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
            <h3>Kemaskini Ahli</h3>
          </div>
          <div class="card-body">
            <form method="post" action="../controller/control.php?mod=kemaskini">
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

            

            <form action="../controller/control.php?mod=rstpass" method="post">
              <input type="hidden" name="idahli" value="<?php echo $rowahli['ahli_id'] ?>">
              <button type="submit" class="btn btn-danger float-right" href="index.php">Reset Password</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
</body>
</html>