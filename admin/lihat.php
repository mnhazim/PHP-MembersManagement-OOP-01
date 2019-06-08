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
            <h3>Detail Ahli</h3>
          </div>
          <div class="card-body">
      			  <div class="form-group">
      			    <label>Nama Penuh</label>
      			    <input class="form-control" value="<?php echo $rowahli['ahli_nama'] ?>" readonly>
      			  </div>
      			  <div class="form-group">
      			    <label>No Ic</label>
      			    <input class="form-control" value="<?php echo $rowahli['ahli_ic'] ?>" readonly>
      			  </div>
      			  <div class="form-group">
      			    <label>Email</label>
      			    <input class="form-control" value="<?php echo $rowahli['ahli_email'] ?>" readonly>
      			  </div>
      			  <div class="form-group">
      			    <label>Tarikh</label>
      			    <input class="form-control" value="<?php echo $rowahli['ahli_tarikhdaftar'] ?>" readonly>
      			  </div>
              <a class="btn btn-primary float-left" href="index.php">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
</body>
</html>